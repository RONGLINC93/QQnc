# -*- coding: utf-8 -*-
"""手动打包飞牛 fnOS fpk。

默认直接用 fnos/ 当前内容打包（改完 app/db/qqfarm.sql 等文件后直接跑本脚本即可）。
产物固定为 fnos/<appname>-<version>.fpk：同版本直接覆盖，不做任何备份；
打包成功后自动清掉目录里其它旧 fpk，只保留最新一个。

常用：
    python tools/pack_fpk.py                      # 直接打包 -> qqfarm-1.0.0.fpk
    python tools/pack_fpk.py --payload           # 先从 d:\\QQnc\\wwwroot 重新组装 app/site
    python tools/pack_fpk.py --version 1.0.1 --changelog "清理测试用户"
    python tools/pack_fpk.py -o D:\\out\\          # 另存一份（文件名仍带版本号）
    python tools/pack_fpk.py --check             # 只做前置检查，不打包
"""
import argparse
import glob
import os
import re
import shutil
import subprocess
import sys
import tarfile
import time
from typing import NoReturn

HERE = os.path.dirname(os.path.abspath(__file__))          # tools/
ROOT = os.path.dirname(HERE)                               # 项目根
FPK_DIR = os.path.join(ROOT, "fnos")                       # fnpack 工程目录
FNPACK = os.path.join(HERE, "bin", "fnpack.exe")
PREPARE = os.path.join(HERE, "prepare_payload.py")
SRC_SITE = r"d:\QQnc\wwwroot"
MANIFEST = os.path.join(FPK_DIR, "manifest")

REQUIRED_FILES = (
    "manifest", "ICON.PNG", "ICON_256.PNG",
    os.path.join("config", "privilege"), os.path.join("config", "resource"),
    os.path.join("wizard", "install"), os.path.join("wizard", "config"),
    os.path.join("app", "ui", "config"),
    os.path.join("app", "db", "qqfarm.sql"),
    os.path.join("app", "docker", "docker-compose.yaml"),
)
REQUIRED_DIRS = (
    os.path.join("app", "site"), os.path.join("app", "ui", "images"),
    os.path.join("app", "docker", "panel"), "cmd",
)
CMD_FILES = (
    "main", "config_init", "config_callback", "install_init", "install_callback",
    "uninstall_init", "uninstall_callback", "upgrade_init", "upgrade_callback",
)
PKG_MEMBERS = {
    "manifest", "app.tgz", "config/privilege", "config/resource",
    "wizard/install", "wizard/config", "ICON.PNG", "ICON_256.PNG",
    "cmd/main",
}


def log(msg=""):
    print(msg, flush=True)


def fail(msg) -> NoReturn:
    print("错误：" + msg, file=sys.stderr, flush=True)
    raise SystemExit(1)


def read_manifest():
    with open(MANIFEST, "rb") as f:
        data = f.read()

    def get(key):
        m = re.search(rb"(?m)^([ \t]*" + key.encode() + rb"[ \t]*=[ \t]*)([^\r\n]*)", data)
        return m.group(2).decode("utf-8", "replace").strip().strip('"') if m else None

    return get("appname"), get("version")


def update_manifest(version, changelog):
    """只改 version / changelog 两行，保留原编码与 CRLF 行尾。"""
    with open(MANIFEST, "rb") as f:
        data = f.read()
    if version:
        data = re.sub(rb"(?m)^([ \t]*version[ \t]*=[ \t]*)[^\r\n]*",
                      lambda m: m.group(1) + version.encode("utf-8"), data, count=1)
    if changelog is not None:
        value = '"' + changelog.replace('"', '\\"') + '"'
        data = re.sub(rb"(?m)^([ \t]*changelog[ \t]*=[ \t]*)[^\r\n]*",
                      lambda m: m.group(1) + value.encode("utf-8"), data, count=1)
    with open(MANIFEST, "wb") as f:
        f.write(data)
    log("已更新 manifest：version=%s%s" %
        (version or read_manifest()[1], "，changelog 已更新" if changelog is not None else ""))


def check_cmd_scripts(fix):
    """fnOS 要求 cmd/ 下脚本为 LF 且无 BOM，否则安装时脚本无法执行。"""
    problems = []
    for name in CMD_FILES:
        path = os.path.join(FPK_DIR, "cmd", name)
        with open(path, "rb") as f:
            raw = f.read()
        clean = raw.replace(b"\r\n", b"\n")
        if clean.startswith(b"\xef\xbb\xbf"):
            clean = clean[3:]
        if clean != raw:
            problems.append(name)
            if fix:
                with open(path, "wb") as f:
                    f.write(clean)
    return problems


def precheck(fix_eol, fnpack):
    if not os.path.isfile(fnpack):
        fail("找不到 fnpack：%s\n请按 README 下载 fnpack 1.2.3 放到 tools/bin/。" % fnpack)
    missing = [p for p in REQUIRED_FILES if not os.path.isfile(os.path.join(FPK_DIR, p))]
    missing += [p for p in REQUIRED_DIRS if not os.path.isdir(os.path.join(FPK_DIR, p))]
    missing += [os.path.join("cmd", n) for n in CMD_FILES
                if not os.path.isfile(os.path.join(FPK_DIR, "cmd", n))]
    if missing:
        fail("缺少必需文件/目录：\n  " + "\n  ".join(missing))

    appname, version = read_manifest()
    if not appname or not version:
        fail("manifest 缺少 appname 或 version")
    problems = check_cmd_scripts(fix_eol)
    if problems and fix_eol:
        log("已自动规范化 cmd/ 行尾(LF、去 BOM)：" + ", ".join(problems))
    elif problems:
        log("警告：以下 cmd/ 脚本含 CRLF 或 BOM（打包时会自动修复）：" + ", ".join(problems))
    else:
        log("cmd/ 9 个生命周期脚本：LF、无 BOM，OK")
    return appname, version


def prepare_payload():
    if not os.path.isdir(SRC_SITE):
        fail("找不到原始站点 %s；若不重新组装站点，请去掉 --payload。" % SRC_SITE)
    log("重新组装 app/site（prepare_payload.py）...")
    rc = subprocess.run([sys.executable, PREPARE], cwd=HERE).returncode
    if rc != 0:
        fail("prepare_payload.py 执行失败（退出码 %d）" % rc)


def versioned_name(appname, version):
    """产物文件名带版本号，并过滤掉不能用于文件名的字符。"""
    def safe(s):
        return re.sub(r"[^0-9A-Za-z._-]", "_", s.strip()) or "unknown"

    return "%s-%s.fpk" % (safe(appname), safe(version))


def find_output(appname, started):
    candidates = [(p, os.path.getmtime(p)) for p in glob.glob(os.path.join(FPK_DIR, "*.fpk"))]
    fresh = [p for p, mtime in candidates if mtime >= started - 1]
    expected = os.path.join(FPK_DIR, appname + ".fpk")
    if expected in fresh:
        return expected
    if len(fresh) == 1:
        return fresh[0]
    return None


def verify(fp):
    """fpk 是 tar.gz：检查必需成员、包内版本与 cmd/main 行尾。"""
    if os.path.getsize(fp) < 1024 * 1024:
        fail("产物过小，疑似打包失败：%s" % fp)
    pkg_version = "?"
    main_bytes = b""
    try:
        with tarfile.open(fp, "r:gz") as tar:
            names = set(tar.getnames())
            missing = sorted(PKG_MEMBERS - names)
            if missing:
                fail("包内缺少条目：" + ", ".join(missing))
            mf = tar.extractfile("manifest")
            cm = tar.extractfile("cmd/main")
            if mf is None or cm is None:
                fail("包内 manifest / cmd/main 不是普通文件")
            manifest = mf.read()
            main_bytes = cm.read()
            m = re.search(rb"(?m)^[ \t]*version[ \t]*=[ \t]*([^\r\n]*)", manifest)
            pkg_version = m.group(1).decode("utf-8", "replace").strip() if m else "?"
    except (tarfile.TarError, OSError) as e:
        fail("产物无法按 tar.gz 读取：%s" % e)
    if b"\r\n" in main_bytes:
        fail("包内 cmd/main 仍是 CRLF，安装时会失败")
    log("包内校验：条目齐全、cmd/main 为 LF、version=%s，OK" % pkg_version)
    return pkg_version


def copy_output(src, dst, appname, version):
    if os.path.isdir(dst):
        dst = os.path.join(dst, "%s-%s.fpk" % (appname, version))
    dst = os.path.abspath(dst)
    if os.path.normcase(dst) == os.path.normcase(os.path.abspath(src)):
        return src
    parent = os.path.dirname(dst)
    if parent:
        os.makedirs(parent, exist_ok=True)
    shutil.copy2(src, dst)
    log("另存一份到 %s" % dst)
    return dst


def main():
    ap = argparse.ArgumentParser(description="手动打包 QQ农场 fnOS fpk")
    ap.add_argument("--payload", action="store_true", help="先从原始 wwwroot 重新组装 app/site")
    ap.add_argument("--version", help="打包前更新 manifest 版本号，如 1.0.1")
    ap.add_argument("--changelog", help="打包前更新 manifest 的 changelog")
    ap.add_argument("-o", "--output", help="另存产物（默认 fnos/<appname>-<version>.fpk）")
    ap.add_argument("--check", action="store_true", help="只做前置检查，不打包、不改文件")
    ap.add_argument("--fnpack", help="指定 fnpack 可执行文件路径")
    args = ap.parse_args()

    fnpack = os.path.abspath(args.fnpack) if args.fnpack else FNPACK
    if args.version and not re.fullmatch(r"[0-9A-Za-z._+\-]+", args.version):
        fail("版本号含非法字符：%s" % args.version)

    log("工程目录：%s" % FPK_DIR)
    appname, version = precheck(fix_eol=not args.check, fnpack=fnpack)

    if args.check:
        log("fnpack：%s" % fnpack)
        sql = os.path.join(FPK_DIR, "app", "db", "qqfarm.sql")
        log("数据库 dump：%.1f MB" % (os.path.getsize(sql) / 1048576.0))
        log("本次产物：%s" % versioned_name(appname, version))
        pkgs = sorted(glob.glob(os.path.join(FPK_DIR, "*.fpk")))
        for p in pkgs:
            log("  现有包 %-28s %.1f MB  %s" %
                (os.path.basename(p), os.path.getsize(p) / 1048576.0,
                 time.strftime("%Y-%m-%d %H:%M:%S", time.localtime(os.path.getmtime(p)))))
        if not pkgs:
            log("  当前目录没有 fpk")
        log("检查通过（未打包）。去掉 --check 即可打包。")
        return 0

    if args.version or args.changelog is not None:
        update_manifest(args.version, args.changelog)
    if args.payload:
        prepare_payload()
    appname, version = read_manifest()

    log("\n开始打包：appname=%s version=%s" % (appname, version))
    log("产物 %s（同名直接覆盖，不做备份）" % versioned_name(appname, version))
    pre_existing = glob.glob(os.path.join(FPK_DIR, "*.fpk"))
    pre_keys = {os.path.normcase(os.path.abspath(p)) for p in pre_existing}
    started = time.time()
    final = ""
    pkg_version = version
    try:
        rc = subprocess.run([fnpack, "build"], cwd=FPK_DIR).returncode
        if rc != 0:
            raise RuntimeError("fnpack build 退出码 %d" % rc)
        fp = find_output(appname, started)
        if not fp:
            raise RuntimeError("fnpack 未生成新的 .fpk（检查上方输出）")
        pkg_version = verify(fp)
        if pkg_version in ("?", ""):
            pkg_version = version
        final = os.path.join(FPK_DIR, versioned_name(appname, pkg_version))
        os.replace(fp, final)  # 同版本直接覆盖
        for p in pre_existing:
            if os.path.normcase(os.path.abspath(p)) != os.path.normcase(os.path.abspath(final)) \
                    and os.path.isfile(p):
                os.remove(p)  # 清掉旧版本 / 旧的无版本号包，只留最新一个
        if args.output:
            copy_output(final, args.output, appname, pkg_version)
    except Exception as e:
        # 只删本次新生成的半成品；打包前就存在的旧包一律保留（不备份、也不恢复）
        final_key = os.path.normcase(os.path.abspath(final)) if final else ""
        for p in glob.glob(os.path.join(FPK_DIR, "*.fpk")):
            key = os.path.normcase(os.path.abspath(p))
            if key in pre_keys or (final_key and key == final_key):
                continue
            try:
                os.remove(p)
            except OSError:
                pass
        fail("打包失败：%s" % e)

    size = os.path.getsize(final) / 1048576.0
    log("\n打包完成：%s" % final)
    log("版本 %s，%.1f MB，耗时 %.1f 秒" % (pkg_version, size, time.time() - started))
    log("飞牛 fnOS：应用中心 → 手动安装 → 选择该 fpk。")
    return 0


if __name__ == "__main__":
    sys.exit(main())
