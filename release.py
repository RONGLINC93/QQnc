#!/usr/bin/env python3
# -*- coding: utf-8 -*-
# pyright: reportAny=false, reportUnusedCallResult=false
"""双击：按 manifest 当前版本发布（打包 fpk + 推送代码 + GitHub Release）。

也可命令行传参：python release.py --version 1.0.1 --notes "修复面板 IPv6 链接"
"""
import importlib.util
import os
import sys

ROOT = os.path.dirname(os.path.abspath(__file__))
spec = importlib.util.spec_from_file_location(
    "qqfarm_release", os.path.join(ROOT, "tools", "release.py"))
if spec is None or spec.loader is None:
    raise ImportError("无法加载 tools/release.py")
mod = importlib.util.module_from_spec(spec)
spec.loader.exec_module(mod)

if __name__ == "__main__":
    rc = mod.main(sys.argv[1:])
    if len(sys.argv) == 1:
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
    sys.exit(rc)
