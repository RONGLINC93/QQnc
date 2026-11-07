#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""QQ农场管理面板（纯标准库实现，无第三方依赖）。

数据读写由站点内的 panel_api.php 完成，面板容器不需要数据库客户端，
也不需要 pip 安装任何包 —— 直接用官方 python:3.12-slim 镜像即可。
"""
import html
import ipaddress
import json
import os
import socket
import sys
import threading
import urllib.parse
import urllib.request
from http.server import BaseHTTPRequestHandler, ThreadingHTTPServer

API = os.environ.get("PANEL_API", "http://web/panel_api.php")
TOKEN = os.environ.get("PANEL_TOKEN", "qqfarm-panel-2026")
GAME_PORT = os.environ.get("PANEL_GAME_PORT", "8081")
SOCKET_PATH = os.environ.get("PANEL_SOCKET", "/sockets/app.sock")
TCP_PORT = int(os.environ.get("PANEL_TCP_PORT", "5001"))


def api(action, **params):
    data = urllib.parse.urlencode(dict(action=action, **params)).encode("utf-8")
    req = urllib.request.Request(API, data=data, headers={"X-Panel-Token": TOKEN})
    with urllib.request.urlopen(req, timeout=10) as resp:
        return json.loads(resp.read().decode("utf-8", "replace"))


PAGE = """<!doctype html>
<html lang="zh-CN"><head><meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>QQ农场 管理面板</title>
<style>
 body{font-family:"Microsoft YaHei",system-ui,sans-serif;background:#f0f4ea;margin:0;color:#2d3a2e}
 .wrap{max-width:860px;margin:24px auto;padding:0 16px}
 h1{font-size:22px}h1 small{font-size:13px;color:#6b7a6c;font-weight:normal;margin-left:8px}
 .card{background:#fff;border-radius:10px;padding:18px 20px;margin-bottom:16px;box-shadow:0 1px 4px rgba(0,0,0,.08)}
 table{width:100%;border-collapse:collapse;font-size:14px}
 th,td{padding:7px 10px;border-bottom:1px solid #e7ece5;text-align:left}
 th{background:#f7faf5}
 .ok{color:#2e7d32;font-weight:bold}.bad{color:#c62828;font-weight:bold}
 input,select,button{padding:7px 10px;border:1px solid #c8d3c5;border-radius:6px;font-size:14px}
 button{background:#4a7c2f;color:#fff;border:none;cursor:pointer}
 a.btn{display:inline-block;background:#4a7c2f;color:#fff;padding:8px 14px;border-radius:6px;text-decoration:none}
 a.btn.btn-sm{padding:4px 12px;font-size:12px;font-weight:normal}
 .card h3{display:flex;justify-content:space-between;align-items:center}
 .hint{font-size:13px;color:#6b7a6c;line-height:1.8}
 code{background:#eef3ea;padding:1px 5px;border-radius:4px}
</style></head><body><div class="wrap">
<h1>QQ农场 管理面板 <small>fnOS 容器版</small></h1>
<div class="card"><b>数据库：</b><span class="%(cls)s">%(status)s</span>　
<b>注册用户：</b>%(members)s　<b>农场档案：</b>%(farmers)s
<p class="hint">游戏/论坛地址：<code>%(game_url)s</code>　<a class="btn" href="%(game_url)s" target="_blank">打开游戏</a></p></div>
<div class="card"><h3 style="margin-top:0">充值工具</h3>
<form method="post" action="">
账号 <input name="username" required placeholder="论坛用户名">
类型 <select name="field"><option value="money">金币</option><option value="yb">元宝</option></select>
方式 <select name="op"><option value="add">增加</option><option value="set">设为</option></select>
数量 <input name="amount" type="number" required value="1000">
<button type="submit">提交</button></form>
<p class="hint">%(msg)s</p></div>
<div class="card"><h3 style="margin-top:0">金币排行（前20）<a class="btn btn-sm" href="?" title="重新读取数据库">刷新</a></h3>
<table><tr><th>UID</th><th>账号</th><th>金币</th><th>元宝</th></tr>%(rows)s</table></div>
<div class="card"><h3 style="margin-top:0">微端与客户端说明</h3><p class="hint">
1. 玩家浏览器访问 <code>%(game_url)s</code> 注册登录，从论坛进入农场/牧场；<br>
2. 游戏为 Flash，需使用自带 Flash 的浏览器（360 极速兼容模式、领动云播放器）或 Ruffle 模拟器；<br>
3. 默认论坛管理员 <code>admin / 123456</code>，游戏设置在论坛后台插件内；<br>
4. UCenter 应用地址若为 <code>http://127.0.0.1</code>，请在论坛后台 → 应用 → 编辑，改为 <code>%(game_url)s</code>。<br>
</p></div>
</div></body></html>"""


def host_from_header(value):
    """从 Host 头取主机名；IPv6 按 RFC 3986 保留方括号。

    面板在飞牛网关后面，Host 通常是 example.com:5666 或 [240e::1]:5666，
    也可能收到不带方括号的裸 IPv6。网关端口要丢掉，游戏端口由
    PANEL_GAME_PORT 另外拼接。
    """
    value = (value or "").strip()
    if not value:
        return "127.0.0.1"
    if value.startswith("["):
        end = value.find("]")
        return value[:end + 1] if end != -1 else "[%s]" % value.lstrip("[")
    if value.count(":") > 1:
        for candidate in (value, value.rsplit(":", 1)[0]):
            try:
                ipaddress.IPv6Address(candidate)
                return "[%s]" % candidate
            except ValueError:
                continue
        return "[%s]" % value
    return value.split(":", 1)[0] or "127.0.0.1"


def render(handler, **kw):
    host = host_from_header(handler.headers.get("Host"))
    game_url = "http://%s:%s" % (host, GAME_PORT)
    base = dict(cls="bad", status="未知", members="-", farmers="-",
                game_url=html.escape(game_url, quote=True), msg="", rows="")
    base.update(kw)
    # 不能用 % 格式化：CSS 里的 100%; 会被当成格式符
    body = PAGE
    for key, value in base.items():
        body = body.replace("%(" + key + ")s", str(value))
    data = body.encode("utf-8")
    handler.send_response(200)
    handler.send_header("Content-Type", "text/html; charset=utf-8")
    handler.send_header("Cache-Control", "no-store, max-age=0")
    handler.send_header("Content-Length", str(len(data)))
    handler.end_headers()
    handler.wfile.write(data)


class Handler(BaseHTTPRequestHandler):
    server_version = "QQFarmPanel/1.0"

    def address_string(self):
        # AF_UNIX 下 client_address 为空字符串，默认实现会抛 IndexError
        return "unix" if isinstance(self.client_address, str) else super().address_string()

    def log_message(self, fmt, *args):
        sys.stderr.write("%s - %s\n" % (self.address_string(), fmt % args))

    def strip_prefix(self, path):
        if path.startswith("/app/qqfarm"):
            path = path[len("/app/qqfarm"):] or "/"
        return path

    def do_GET(self):
        parsed = urllib.parse.urlparse(self.path)
        if self.strip_prefix(parsed.path) not in ("/", "/index.html"):
            self.send_error(404)
            return
        msg = urllib.parse.parse_qs(parsed.query).get("msg", [""])[0]
        try:
            st = api("status")
            rows = "".join(
                "<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>"
                % (i.get("uid"), html.escape(str(i.get("username", ""))),
                   i.get("money", 0), i.get("yb", 0))
                for i in st.get("top", [])
            )
            render(self, cls="ok", status="正常", members=st.get("members", 0),
                   farmers=st.get("farmers", 0), rows=rows, msg=msg)
        except Exception as e:
            render(self, status="接口异常: %s" % e, msg=msg)

    def do_POST(self):
        # 唯一写操作就是充值；表单 action="" 会提交到当前（可能带网关前缀）路径
        length = int(self.headers.get("Content-Length") or 0)
        form = urllib.parse.parse_qs(self.rfile.read(length).decode("utf-8", "replace"))
        params = {k: v[0] for k, v in form.items()}
        try:
            res = api("recharge", **params)
            if res.get("ok"):
                msg = "<span class='ok'>成功：%s 的 %s %s %s（uid=%s）</span>" % (
                    html.escape(str(res.get("username", ""))),
                    "金币" if res.get("field") == "money" else "元宝",
                    "设为" if params.get("op") == "set" else "增加",
                    res.get("amount"), res.get("uid"))
            else:
                msg = "<span class='bad'>失败：%s</span>" % html.escape(str(res.get("error")))
        except Exception as e:
            msg = "<span class='bad'>接口异常：%s</span>" % html.escape(str(e))
        self.send_response(303)
        self.send_header("Location", "?msg=" + urllib.parse.quote(msg))
        self.end_headers()


class UnixHTTPServer(ThreadingHTTPServer):
    # Windows 无 AF_UNIX（仅容器内的 Linux 会实例化本类）
    address_family = getattr(socket, "AF_UNIX", socket.AF_INET)

    def server_bind(self):
        try:
            os.unlink(self.server_address)
        except OSError:
            pass
        self.socket.bind(self.server_address)
        self.server_name = "localhost"
        self.server_port = 0


def main():
    tcp = ThreadingHTTPServer(("0.0.0.0", TCP_PORT), Handler)
    threading.Thread(target=tcp.serve_forever, daemon=True).start()
    print("panel tcp :%d ok" % TCP_PORT, file=sys.stderr)
    try:
        unix = UnixHTTPServer(SOCKET_PATH, Handler)
        try:
            os.chmod(SOCKET_PATH, 0o666)
        except OSError:
            pass
        print("panel unix %s ok" % SOCKET_PATH, file=sys.stderr)
        unix.serve_forever()
    except Exception as e:
        print("unix socket 不可用(%s)，仅 TCP 模式" % e, file=sys.stderr)
        tcp.serve_forever()


if __name__ == "__main__":
    main()
