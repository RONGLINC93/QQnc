#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""QQ农场 fnOS 发布：打包 fpk -> 推送代码 -> 创建 GitHub Release 并上传安装包。

用法：
    python tools/release.py --version 1.0.1 --notes "修复面板 IPv6 链接"
    python tools/release.py --bump patch                  # 1.0.0 -> 1.0.1
    python tools/release.py --skip-pack --skip-push      # 复用已有 fpk，只发 Release
    python release.py                                    # 双击：按 manifest 当前版本发布

前置：.env 中 GITHUB_TOKEN（需 repo 权限）、GITHUB_REPO_URL；
      GitHub 仓库 main 分支至少要有一个提交（Release 依赖 tag）。
token 只经 HTTP 头传递，不打印、不落盘。
"""
import argparse
import http.client
import io
import json
import os
import re
import subprocess
import sys
import urllib.parse

ROOT = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
TOOLS = os.path.join(ROOT, "tools")
sys.path.insert(0, TOOLS)
import github_sync as gs  # noqa: E402
import pack_fpk as pk     # noqa: E402

BRANCH = "main"
UPLOAD_HOST = "uploads.github.com"
CHUNK = 1024 * 1024


def log(msg=""):
    print(msg, flush=True)


def fail(msg):
    print("[错误] " + msg, file=sys.stderr, flush=True)
    raise SystemExit(1)


def read_meta():
    appname, version = pk.read_manifest()
    with io.open(os.path.join(ROOT, "fnos", "manifest"), encoding="utf-8") as f:
        data = f.read()
    m = re.search(r"^[ \t]*changelog[ \t]*=[ \t]*([^\r\n]*)", data, re.M)
    return appname, version, (m.group(1).strip().strip('"') if m else "")


def bump(version, part):
    m = re.fullmatch(r"(\d+)\.(\d+)\.(\d+)", version)
    if not m:
        fail("版本号 %s 不是 x.y.z 格式，无法 --bump" % version)
    a, b, c = map(int, m.groups())
    if part == "major":
        a, b, c = a + 1, 0, 0
    elif part == "minor":
        b, c = b + 1, 0
    else:
        c += 1
    return "%d.%d.%d" % (a, b, c)


def run_script(name, args):
    cmd = [sys.executable, "-X", "utf8", os.path.join(TOOLS, name)] + args
    log("> " + " ".join(cmd))
    return subprocess.run(cmd, cwd=ROOT).returncode


def pack(appname, version, changelog, skip):
    path = os.path.join(ROOT, "fnos", pk.versioned_name(appname, version))
    if skip:
        if not os.path.isfile(path):
            fail("--skip-pack 但找不到产物：%s" % path)
        log("[跳过打包] 复用 %s (%.1f MB)" %
            (os.path.basename(path), os.path.getsize(path) / 1048576.0))
        return path
    args = ["--version", version]
    if changelog:
        args += ["--changelog", changelog]
    if run_script("pack_fpk.py", args) != 0:
        fail("打包失败")
    if not os.path.isfile(path):
        fail("打包后找不到产物：%s" % path)
    log("[产物] %s (%.1f MB)" %
        (os.path.basename(path), os.path.getsize(path) / 1048576.0))
    return path


def push_code(version, summary, skip):
    if skip:
        log("[跳过推送] 使用远程现有代码")
        return
    log("[提示] 代码推送可能较慢（首次约 116MB），会显示进度")
    if run_script("github_sync.py", ["push", "-m", "release v%s: %s" %
                                     (version, summary or "发布")]) != 0:
        fail("代码推送失败。可加 --skip-push 仅发布 Release（需远程已有提交）")


def ensure_remote_main():
    r = gs.git(["ls-remote", "--heads", "origin", BRANCH],
               auth=gs.git_auth(), capture=True)
    if r.returncode != 0 or not r.stdout.strip():
        fail("GitHub 仓库的 %s 分支还没有任何提交，无法创建 Release。\n"
             "       请先完成一次代码推送：python tools/github_sync.py push -m \"init: QQ农场 fnOS 工程\"\n"
             "       （或双击 push.py），成功后重新运行本脚本。" % BRANCH)


def get_or_create_release(token, owner, repo, version, notes, draft, prerelease):
    tag = "v" + version
    try:
        rel = gs.api("GET", "/repos/%s/%s/releases/tags/%s" %
                     (owner, repo, urllib.parse.quote(tag)), token)
        log("[Release] 已存在，复用：%s" % rel.get("html_url", tag))
        return rel
    except Exception as e:
        if getattr(e, "code", None) != 404:
            fail("查询 Release 失败：%s" % e)
    payload = {"tag_name": tag, "target_commitish": BRANCH,
               "name": "QQ农场 v%s" % version, "body": notes,
               "draft": draft, "prerelease": prerelease}
    try:
        rel = gs.api("POST", "/repos/%s/%s/releases" % (owner, repo), token, payload)
    except Exception as e:
        fail("创建 Release 失败：%s" % e)
    log("[Release] 已创建：%s" % rel.get("html_url", tag))
    return rel


def delete_existing_asset(token, owner, repo, rel, name):
    for asset in rel.get("assets", []):
        if asset.get("name") == name:
            try:
                gs.api("DELETE", "/repos/%s/%s/releases/assets/%s" %
                       (owner, repo, asset["id"]), token)
                log("[资产] 已删除同名旧资产")
            except Exception as e:
                fail("删除旧资产失败：%s" % e)
            break


def upload_asset(token, owner, repo, rel, path):
    name = os.path.basename(path)
    size = os.path.getsize(path)
    delete_existing_asset(token, owner, repo, rel, name)
    target = "/repos/%s/%s/releases/%s/assets?name=%s" % (
        owner, repo, rel["id"], urllib.parse.quote(name))
    log("[上传] %s -> GitHub Release（%.1f MB）" % (name, size / 1048576.0))
    conn = http.client.HTTPSConnection(UPLOAD_HOST, timeout=600)
    try:
        conn.putrequest("POST", target)
        conn.putheader("Authorization", "Bearer " + token)
        conn.putheader("Content-Type", "application/octet-stream")
        conn.putheader("Content-Length", str(size))
        conn.putheader("Accept", "application/vnd.github+json")
        conn.putheader("User-Agent", "qqfarm-release")
        conn.endheaders()
        sent = 0
        with open(path, "rb") as f:
            while True:
                chunk = f.read(CHUNK)
                if not chunk:
                    break
                conn.send(chunk)
                sent += len(chunk)
                sys.stdout.write("\r[上传] %d/%d MB (%.1f%%)" %
                                 (sent // 1048576, size // 1048576, 100.0 * sent / size))
                sys.stdout.flush()
        sys.stdout.write("\n")
        resp = conn.getresponse()
        body = resp.read().decode("utf-8", "replace")
    finally:
        conn.close()
    if resp.status not in (200, 201):
        fail("资产上传失败：HTTP %s %s" % (resp.status, body[:200]))
    return json.loads(body)


def main(argv=None):
    ap = argparse.ArgumentParser(description="QQ农场 fnOS 发布助手")
    group = ap.add_mutually_exclusive_group()
    group.add_argument("--version", help="发布版本号（默认取 manifest 当前版本）")
    group.add_argument("--bump", choices=["patch", "minor", "major"], help="自动递增版本")
    ap.add_argument("--notes", default="", help="Release 说明（默认用 changelog）")
    ap.add_argument("--changelog", default="", help="同步更新 manifest 的 changelog")
    ap.add_argument("--draft", action="store_true", help="创建为草稿")
    ap.add_argument("--prerelease", action="store_true", help="标记为预发布")
    ap.add_argument("--skip-pack", action="store_true", help="复用已有 fpk，不重新打包")
    ap.add_argument("--skip-push", action="store_true", help="不推送代码，仅发布 Release")
    args = ap.parse_args(argv)

    token = gs.load_env().get("GITHUB_TOKEN", "")
    if not token:
        fail(".env 缺少 GITHUB_TOKEN（创建 Release 需要 repo 权限）")
    owner, repo = gs.owner_repo(gs.repo_url())
    if not owner or not repo:
        fail("无法从 GITHUB_REPO_URL 解析 用户名/仓库名")

    appname, cur_ver, cur_log = read_meta()
    version = args.version or (bump(cur_ver, args.bump) if args.bump else cur_ver)
    if args.skip_pack and (args.version or args.bump):
        log("[提示] --skip-pack 不更新 manifest，忽略 --version/--bump")
        version = cur_ver
    asset_name = pk.versioned_name(appname, version)
    notes = args.notes or args.changelog or cur_log or ("QQ农场 fnOS v%s" % version)
    if not (args.notes or args.changelog):
        notes += "\n\n安装：飞牛 fnOS → 应用中心 → 手动安装 → 选择 `%s`" % asset_name

    log("=== 发布计划 ===")
    log("仓库：%s/%s   版本：%s -> %s   tag：v%s" % (owner, repo, cur_ver, version, version))
    log("安装包：%s" % asset_name)
    log("打包：%s   代码推送：%s   草稿：%s   预发布：%s" %
        ("否" if args.skip_pack else "是", "否" if args.skip_push else "是",
         "是" if args.draft else "否", "是" if args.prerelease else "否"))
    log("说明：%s" % notes.splitlines()[0])

    fp = pack(appname, version, args.changelog, args.skip_pack)
    push_code(version, args.notes or args.changelog or cur_log, args.skip_push)
    ensure_remote_main()
    rel = get_or_create_release(token, owner, repo, version, notes,
                                args.draft, args.prerelease)
    asset = upload_asset(token, owner, repo, rel, fp)

    log("")
    log("=== 发布完成 ===")
    log("Release：%s" % rel.get("html_url", ""))
    log("安装包：%s" % asset.get("browser_download_url", ""))
    return 0


if __name__ == "__main__":
    sys.exit(main())
