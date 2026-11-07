#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""QQnc 工程的 GitHub 拉取 / 推送助手（纯标准库，无第三方依赖）。

用法：
    python tools/github_sync.py status              查看仓库状态（只读）
    python tools/github_sync.py init               初始化本地仓库 + 首次提交（不推送）
    python tools/github_sync.py pull               拉取并变基到 origin/main
    python tools/github_sync.py push -m "说明"     提交 + 变基 + 推送
    python tools/github_sync.py create [--private] 用 token 创建远程仓库

也可用根目录的 pull.py / push.py 双击运行。

凭据来自 .env：GITHUB_TOKEN、GITHUB_REPO_URL。
token 只通过 `git -c http.extraheader` 临时传递：不写进 .git/config、
不出现在打印的命令里，.env 也由 .gitignore 排除。
"""
import argparse
import base64
import io
import json
import os
import subprocess
import sys
import urllib.error
import urllib.parse
import urllib.request

ROOT = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
ENV_FILE = os.path.join(ROOT, ".env")
IGNORE_FILE = os.path.join(ROOT, ".gitignore")
BRANCH = "main"
API = "https://api.github.com"

# 缺一不可的忽略项：尤其 .env，避免 token 入库
REQUIRED_IGNORES = (".env", "*.fpk", "*.fpk.bak", "__pycache__/", "*.py[cod]")


def log(msg=""):
    print(msg, flush=True)


def fail(msg):
    print("[错误] " + msg, file=sys.stderr, flush=True)
    raise SystemExit(1)


def load_env():
    data = {}
    if not os.path.isfile(ENV_FILE):
        return data
    with io.open(ENV_FILE, encoding="utf-8", errors="ignore") as f:
        for line in f:
            s = line.strip()
            if s and not s.startswith("#") and "=" in s:
                k, v = s.split("=", 1)
                data[k.strip()] = v.strip().strip("'").strip('"')
    return data


def git_auth():
    """token 走一次性 extraheader，不落到 .git/config，也不打印。"""
    tok = load_env().get("GITHUB_TOKEN", "")
    if not tok:
        return []
    b64 = base64.b64encode(("x-access-token:" + tok).encode("utf-8")).decode("ascii")
    return ["-c", "http.https://github.com/.extraheader=AUTHORIZATION: basic " + b64]


def repo_url():
    """返回去掉 userinfo 的 https 仓库 URL（避免 token 写进 remote 配置）。"""
    raw = load_env().get("GITHUB_REPO_URL", "").strip()
    if not raw:
        return ""
    if raw.startswith("git@"):
        raw = "https://" + raw.split("@", 1)[1].replace(":", "/", 1)
    if "://" not in raw:
        raw = "https://" + raw
    p = urllib.parse.urlsplit(raw)
    if not p.hostname:
        return ""
    path = p.path.rstrip("/")
    if path.endswith(".git"):
        path = path[:-4]
    return urllib.parse.urlunsplit((p.scheme or "https", p.hostname, path, "", ""))


def owner_repo(url):
    parts = [x for x in urllib.parse.urlsplit(url).path.split("/") if x]
    if len(parts) < 2:
        return "", ""
    name = parts[-1]
    if name.endswith(".git"):
        name = name[:-4]
    return parts[-2], name


def git(args, auth=None, capture=False):
    cmd = ["git"] + (auth or []) + list(args)
    shown = ["git"] + (["-c", "<凭据已隐藏>"] if auth else []) + list(args)
    log("> " + " ".join(shown))
    if capture:
        return subprocess.run(cmd, cwd=ROOT, stdout=subprocess.PIPE,
                              stderr=subprocess.PIPE, text=True, errors="replace")
    return subprocess.run(cmd, cwd=ROOT)


def is_repo():
    return git(["rev-parse", "--is-inside-work-tree"], capture=True).returncode == 0


def ensure_gitignore():
    text = ""
    if os.path.isfile(IGNORE_FILE):
        with io.open(IGNORE_FILE, encoding="utf-8", errors="replace") as f:
            text = f.read()
    lines = [x.strip() for x in text.splitlines()]
    missing = [x for x in REQUIRED_IGNORES if x not in lines]
    if missing:
        with io.open(IGNORE_FILE, "a", encoding="utf-8", newline="\n") as f:
            if text and not text.endswith("\n"):
                f.write("\n")
            f.write("\n# 由 github_sync.py 补充\n" + "\n".join(missing) + "\n")
        log("[安全] 已补充 .gitignore：" + ", ".join(missing))


def ensure_repo():
    """幂等：初始化仓库、配置 origin、补 .gitignore 与提交身份。"""
    ensure_gitignore()
    url = repo_url()
    if not url:
        fail(".env 缺少 GITHUB_REPO_URL（例如 https://github.com/用户名/QQnc.git）")
    if not is_repo():
        log("[初始化] git init")
        if git(["init"]).returncode != 0:
            fail("git init 失败")
        git(["symbolic-ref", "HEAD", "refs/heads/" + BRANCH])
    cur = git(["remote", "get-url", "origin"], capture=True)
    if cur.returncode != 0:
        if git(["remote", "add", "origin", url]).returncode != 0:
            fail("添加 origin 失败")
        log("[初始化] origin -> %s" % url)
    elif cur.stdout.strip().rstrip("/") != url.rstrip("/"):
        git(["remote", "set-url", "origin", url])
        log("[初始化] origin 已更新")
    if not git(["config", "user.email"], capture=True).stdout.strip():
        git(["config", "user.email", "qqfarm@localhost"])
        git(["config", "user.name", "QQfarm Local"])
        log("[初始化] 已设置本仓库默认提交身份（可在 git config 中修改）")


def remote_has_main(auth):
    return git(["ls-remote", "--exit-code", "--heads", "origin", BRANCH],
               auth=auth, capture=True).returncode == 0


def has_staged_changes():
    return git(["diff", "--cached", "--quiet"], capture=True).returncode != 0


def rebase_hint():
    log("[错误] 拉取/变基失败。若出现冲突，请手动处理：")
    log("        git status")
    log("        git add -A && git rebase --continue")
    log("        git rebase --abort   # 放弃变基")


def api(method, path, token, payload=None):
    data = json.dumps(payload).encode("utf-8") if payload is not None else None
    req = urllib.request.Request(
        API + path, data=data,
        headers={"Authorization": "Bearer " + token,
                 "Accept": "application/vnd.github+json",
                 "Content-Type": "application/json",
                 "User-Agent": "qqfarm-github-sync"},
        method=method)
    with urllib.request.urlopen(req, timeout=20) as resp:
        body = resp.read().decode("utf-8", "replace")
        return json.loads(body) if body else {}


def cmd_status():
    env = load_env()
    log("项目根：%s" % ROOT)
    log(".env：%s，GITHUB_TOKEN %s" %
        ("存在" if os.path.isfile(ENV_FILE) else "不存在",
         "已配置" if env.get("GITHUB_TOKEN") else "未配置"))
    log("远程 URL：%s" % (repo_url() or "未配置"))
    log(".gitignore：%s" % ("存在" if os.path.isfile(IGNORE_FILE) else "不存在"))
    if not is_repo():
        log("git 仓库：尚未初始化（运行 init 创建）")
        return 0
    branch = git(["branch", "--show-current"], capture=True).stdout.strip()
    log("当前分支：%s" % (branch or "（尚无提交）"))
    changed = git(["status", "--porcelain"], capture=True).stdout.splitlines()
    log("未提交改动：%d 个文件" % len(changed))
    for line in changed[:10]:
        log("  " + line)
    if len(changed) > 10:
        log("  ... 其余 %d 个略" % (len(changed) - 10))
    return 0


def cmd_init():
    ensure_repo()
    log("=== 暂存首次提交 ===")
    if git(["add", "-A"]).returncode != 0:
        fail("git add 失败")
    if has_staged_changes():
        if git(["commit", "-m", "init: QQ农场 fnOS 工程"]).returncode != 0:
            fail("git commit 失败")
    log("[完成] 本地仓库已就绪。运行 push 完成首次推送。")
    return 0


def cmd_pull():
    if not is_repo():
        fail("当前目录不是 git 仓库，请先运行 init")
    auth = git_auth()
    log("=== 拉取 origin/%s ===" % BRANCH)
    if not remote_has_main(auth):
        log("[提示] 远程还没有 %s 分支（首次推送场景），跳过拉取" % BRANCH)
        return 0
    if git(["pull", "--rebase", "origin", BRANCH], auth=auth).returncode != 0:
        rebase_hint()
        return 1
    log("[完成] 已变基到远程最新")
    return 0


def cmd_push(message):
    ensure_repo()
    auth = git_auth()
    msg = message or "update: QQ农场 fnOS 工程"
    log("=== 1/3 暂存并提交 ===")
    if git(["add", "-A"]).returncode != 0:
        fail("git add 失败")
    if has_staged_changes():
        log("提交信息：%s" % msg)
        if git(["commit", "-m", msg]).returncode != 0:
            fail("git commit 失败")
    else:
        log("[提示] 无本地改动，仅同步远程")
    log("=== 2/3 变基到远程最新 ===")
    if remote_has_main(auth):
        if git(["pull", "--rebase", "origin", BRANCH], auth=auth).returncode != 0:
            rebase_hint()
            return 1
    else:
        log("[提示] 远程还没有 %s 分支（首次推送），跳过变基" % BRANCH)
    log("=== 3/3 推送到 origin/%s ===" % BRANCH)
    if git(["push", "-u", "origin", BRANCH], auth=auth).returncode != 0:
        log("[错误] 推送失败。若远程仓库尚未创建，运行：python tools/github_sync.py create")
        return 1
    log("[完成] 已推送到 origin/%s" % BRANCH)
    return 0


def cmd_create(private):
    env = load_env()
    token = env.get("GITHUB_TOKEN", "")
    if not token:
        fail(".env 缺少 GITHUB_TOKEN（创建仓库需要带 repo 权限的 token）")
    url = repo_url()
    owner, name = owner_repo(url)
    if not owner or not name:
        fail("无法从 GITHUB_REPO_URL 解析出 用户名/仓库名：%s" % (url or "空"))
    try:
        login = api("GET", "/user", token).get("login", "")
    except Exception as e:
        fail("GitHub 身份校验失败：%s" % e)
    path = "/user/repos" if owner.lower() == login.lower() else "/orgs/%s/repos" % owner
    log("认证账号 %s，目标仓库 %s/%s（%s）" %
        (login, owner, name, "私有" if private else "公开"))
    try:
        result = api("POST", path, token,
                     {"name": name, "private": private, "auto_init": False})
    except urllib.error.HTTPError as e:
        if e.code == 422:
            log("[提示] 仓库已存在，无需创建")
            return 0
        fail("创建失败：HTTP %s（确认 token 有 repo 权限）" % e.code)
    except Exception as e:
        fail("创建失败：%s" % e)
    log("[完成] 仓库地址：%s" % result.get("html_url", url))
    return 0


def pause():
    if os.name != "nt":
        return
    try:
        import msvcrt
        sys.stdout.write("\n按任意键关闭窗口...")
        sys.stdout.flush()
        msvcrt.getch()
    except Exception:
        try:
            input("\n按回车关闭窗口...")
        except Exception:
            pass


def main(argv=None):
    ap = argparse.ArgumentParser(description="QQnc 的 GitHub 拉取 / 推送助手")
    sub = ap.add_subparsers(dest="cmd")
    sub.add_parser("status", help="查看仓库状态（只读）")
    sub.add_parser("init", help="初始化本地仓库并首次提交（不推送）")
    sub.add_parser("pull", help="拉取并变基到 origin/main")
    p_push = sub.add_parser("push", help="提交 + 变基 + 推送到 origin/main")
    p_push.add_argument("message", nargs="?", default="", help="提交信息")
    p_push.add_argument("-m", "--message", dest="opt_message", default="", help="提交信息")
    p_create = sub.add_parser("create", help="用 .env 的 token 创建 GitHub 仓库")
    p_create.add_argument("--private", action="store_true", help="创建为私有仓库")
    args = ap.parse_args(argv)

    try:
        subprocess.run(["git", "--version"], stdout=subprocess.DEVNULL,
                       stderr=subprocess.DEVNULL, check=True, cwd=ROOT)
    except (FileNotFoundError, subprocess.CalledProcessError):
        fail("未找到 git，请先安装 Git for Windows 并加入 PATH")

    if not args.cmd:
        ap.print_help()
        if argv is None and len(sys.argv) == 1:
            pause()
        return 0
    if args.cmd == "status":
        return cmd_status()
    if args.cmd == "init":
        return cmd_init()
    if args.cmd == "pull":
        return cmd_pull()
    if args.cmd == "push":
        return cmd_push(args.opt_message or args.message)
    if args.cmd == "create":
        return cmd_create(args.private)
    return 1


if __name__ == "__main__":
    sys.exit(main())
