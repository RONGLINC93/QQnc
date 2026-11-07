#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""从 GitHub 拉取并变基到 origin/main（双击即可）。"""
import os
import sys

ROOT = os.path.dirname(os.path.abspath(__file__))
sys.path.insert(0, os.path.join(ROOT, "tools"))
from github_sync import main, pause  # noqa: E402

if __name__ == "__main__":
    rc = main(["pull"] + sys.argv[1:])
    if len(sys.argv) == 1:
        pause()
    sys.exit(rc)
