#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""提交本地改动并推送到 GitHub（双击即可，无参数时自动生成提交信息）。

命令行：python push.py "自定义提交信息"
         python push.py -m "自定义提交信息"
"""
import os
import sys

ROOT = os.path.dirname(os.path.abspath(__file__))
sys.path.insert(0, os.path.join(ROOT, "tools"))
from github_sync import main, pause  # noqa: E402

if __name__ == "__main__":
    rc = main(["push"] + sys.argv[1:])
    if len(sys.argv) == 1:
        pause()
    sys.exit(rc)
