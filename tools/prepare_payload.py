# -*- coding: utf-8 -*-
"""组装 fpk 载荷：
1. 拷贝原始站点 wwwroot -> fnos/app/site
2. 修补 Discuz 配置、农场插件配置（数据库指向容器 mariadb）
3. 生成 mysql_* 兼容层、面板接口与图标
"""
import os
import shutil
import struct
import sys
import zlib

HERE = os.path.dirname(os.path.abspath(__file__))
SRC_ROOT = r"d:\QQnc"                              # 原始 Windows 服务端素材
FPK = os.path.join(os.path.dirname(HERE), "fnos")  # fpk 工程（与本 tools 同级）
SRC_SITE = os.path.join(SRC_ROOT, "wwwroot")
DST_SITE = os.path.join(FPK, "app", "site")
DB_PASSWORD = b"qqfarm123"


# ---------- 1. 站点 ----------
def copy_site():
    print("复制 wwwroot -> app/site ...")
    shutil.copytree(SRC_SITE, DST_SITE, dirs_exist_ok=True)
    shim = os.path.join(HERE, "payload", "mysql_compat.php")
    if os.path.isfile(shim):
        shutil.copy2(shim, os.path.join(DST_SITE, "config", "mysql_compat.php"))
        print("  写入 config/mysql_compat.php（mysql_* 兼容层）")
    print("  完成")


def patch(path, rules):
    with open(path, "rb") as f:
        data = f.read()
    changed = False
    for old, new in rules:
        if old in data:
            data = data.replace(old, new)
            changed = True
    if changed:
        with open(path, "wb") as f:
            f.write(data)
        print("  已修补:", os.path.relpath(path, FPK))
    else:
        print("  跳过(未找到目标内容):", os.path.relpath(path, FPK))


def patch_configs():
    print("修补 Discuz 数据库配置 ...")
    cfg = os.path.join(DST_SITE, "config", "config_global.php")
    patch(cfg, [
        (b"$_config['db']['1']['dbhost'] = 'localhost';",
         b"$_config['db']['1']['dbhost'] = 'mysql';"),
        (b"$_config['db']['1']['dbpw'] = '';",
         b"$_config['db']['1']['dbpw'] = '" + DB_PASSWORD + b"';"),
        (b"$_config['memory']['eaccelerator'] = 1;",
         b"$_config['memory']['eaccelerator'] = 0;"),
        (b"$_config['memory']['apc'] = 1;",
         b"$_config['memory']['apc'] = 0;"),
        (b"$_config['memory']['xcache'] = 1;",
         b"$_config['memory']['xcache'] = 0;"),
    ])
    uc = os.path.join(DST_SITE, "config", "config_ucenter.php")
    patch(uc, [
        (b"define('UC_DBHOST', 'localhost');",
         b"define('UC_DBHOST', 'mysql');"),
        (b"define('UC_DBPW', '');",
         b"define('UC_DBPW', '" + DB_PASSWORD + b"');"),
    ])


PANEL_TOKEN = "qqfarm-panel-2026"


def patch_farm_configs():
    """农场插件有独立的数据库配置缓存，不会跟随 Discuz 配置更新。"""
    print("修补农场插件数据库配置 ...")
    qsc = os.path.join(DST_SITE, "source", "plugin", "qqfarm", "core", "data", "_qsc.php")
    patch(qsc, [
        (b"'dbhost' => 'localhost',", b"'dbhost' => 'mysql',"),
        (b"'dbpass' => '',", b"'dbpass' => '" + DB_PASSWORD + b"',"),
        (b"'charset' => 'utf8',", b"'charset' => 'gbk',"),
    ])
    api = os.path.join(DST_SITE, "source", "plugin", "qqfarm", "core", "config",
                       "api", "discuzx.php")
    patch(api, [
        (b"$_QSC['db']['charset'] = 'utf8';", b"$_QSC['db']['charset'] = 'gbk';"),
    ])


def write_panel_api():
    """生成站点内的面板数据接口（PHP 侧直连数据库，Python 面板只做 UI）。"""
    php = r"""<?php
/* QQ农场管理面板数据接口 —— 由 tools/prepare_payload.py 自动生成 */
define('PANEL_TOKEN', '__TOKEN__');
define('DB_HOST', 'mysql');
define('DB_USER', 'root');
define('DB_PASS', '__DBPASS__');
define('DB_NAME', 'root');

header('Content-Type: application/json; charset=utf-8');

$token = isset($_SERVER['HTTP_X_PANEL_TOKEN']) ? $_SERVER['HTTP_X_PANEL_TOKEN'] : '';
if ($token !== PANEL_TOKEN) {
    echo json_encode(array('ok' => 0, 'error' => 'forbidden'));
    exit;
}

function panel_out($arr) { echo json_encode($arr); exit; }
function to_gbk($s) { return iconv('UTF-8', 'GBK//IGNORE', $s); }
function to_utf8($s) { return iconv('GBK', 'UTF-8//IGNORE', $s); }

$link = @mysql_connect(DB_HOST, DB_USER, DB_PASS);
if (!$link) panel_out(array('ok' => 0, 'error' => 'db connect: ' . mysql_error()));
mysql_select_db(DB_NAME, $link);
mysql_query("SET NAMES gbk", $link);

$action = isset($_POST['action']) ? $_POST['action'] : 'status';

if ($action === 'status') {
    $row = mysql_fetch_assoc(mysql_query("SELECT COUNT(*) AS c FROM pre_common_member", $link));
    $members = intval($row['c']);
    $row = mysql_fetch_assoc(mysql_query("SELECT COUNT(*) AS c FROM pre_qqfarm_user", $link));
    $farmers = intval($row['c']);
    $top = array();
    $rt = mysql_query("SELECT m.uid, m.username, u.money, u.yb FROM pre_common_member m LEFT JOIN pre_qqfarm_user u ON u.uid = m.uid ORDER BY u.money DESC LIMIT 20", $link);
    while ($rt && ($x = mysql_fetch_assoc($rt))) {
        $top[] = array(
            'uid' => intval($x['uid']),
            'username' => to_utf8($x['username']),
            'money' => intval($x['money']),
            'yb' => intval($x['yb']),
        );
    }
    panel_out(array('ok' => 1, 'members' => $members, 'farmers' => $farmers, 'top' => $top));
}

if ($action === 'recharge') {
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $field = (isset($_POST['field']) && $_POST['field'] === 'yb') ? 'yb' : 'money';
    $op = (isset($_POST['op']) && $_POST['op'] === 'set') ? 'set' : 'add';
    $amount = isset($_POST['amount']) ? intval($_POST['amount']) : 0;
    if ($username === '' || $amount < 0) {
        panel_out(array('ok' => 0, 'error' => '参数错误'));
    }
    $uname = mysql_real_escape_string(to_gbk($username), $link);
    $m = mysql_fetch_assoc(mysql_query("SELECT uid, username FROM pre_common_member WHERE username = '$uname'", $link));
    if (!$m) {
        panel_out(array('ok' => 0, 'error' => '账号不存在：' . $username));
    }
    $uid = intval($m['uid']);
    $exists = mysql_fetch_assoc(mysql_query("SELECT uid FROM pre_qqfarm_user WHERE uid = $uid", $link));
    if ($exists) {
        $sql = ($op === 'set')
            ? "UPDATE pre_qqfarm_user SET $field = $amount WHERE uid = $uid"
            : "UPDATE pre_qqfarm_user SET $field = $field + $amount WHERE uid = $uid";
        if (!mysql_query($sql, $link)) {
            panel_out(array('ok' => 0, 'error' => mysql_error()));
        }
    } else {
        $sql = "INSERT INTO pre_qqfarm_user (uid, username, $field) VALUES ($uid, '$uname', $amount)";
        if (!mysql_query($sql, $link)) {
            panel_out(array('ok' => 0, 'error' => mysql_error()));
        }
    }
    panel_out(array('ok' => 1, 'uid' => $uid, 'username' => to_utf8($m['username']),
                    'field' => $field, 'amount' => $amount));
}

panel_out(array('ok' => 0, 'error' => '未知操作'));
"""
    php = php.replace("__TOKEN__", PANEL_TOKEN).replace("__DBPASS__", DB_PASSWORD.decode())
    path = os.path.join(DST_SITE, "panel_api.php")
    with open(path, "w", encoding="utf-8", newline="\n") as f:
        f.write(php)
    print("  写入 site/panel_api.php")


# ---------- 2. 图标（纯标准库 PNG 写入器） ----------
def make_png(width, height, pixel_fn):
    raw = bytearray()
    for y in range(height):
        raw.append(0)  # filter: none
        for x in range(width):
            raw.extend(pixel_fn(x, y))
    compressed = zlib.compress(bytes(raw), 9)

    def chunk(tag, payload):
        c = struct.pack(">I", len(payload)) + tag + payload
        return c + struct.pack(">I", zlib.crc32(tag + payload) & 0xFFFFFFFF)

    ihdr = struct.pack(">IIBBBBB", width, height, 8, 2, 0, 0, 0)
    return (b"\x89PNG\r\n\x1a\n"
            + chunk(b"IHDR", ihdr)
            + chunk(b"IDAT", compressed)
            + chunk(b"IEND", b""))


def icon_pixel(x, y):
    # 64/256 通用的"农场"图标：绿色草地 + 黄色太阳 + 白色云朵（按比例坐标绘制）
    fx, fy = x / 63.0, y / 63.0
    # 太阳（右上）
    dx, dy = fx - 0.78, fy - 0.22
    if dx * dx + dy * dy < 0.02:
        return (255, 202, 58)
    # 云（左上）
    for cx, cy, r in ((0.28, 0.24, 0.09), (0.42, 0.20, 0.075), (0.55, 0.25, 0.08)):
        if (fx - cx) ** 2 + (fy - cy) ** 2 * 1.6 < r * r:
            return (250, 250, 246)
    # 草地渐变
    g = int(150 + 60 * fy)
    base = (74, max(100, min(255, g)), 47)
    # 田垄条纹
    if int(fx * 12) % 2 == 0 and fy > 0.45:
        base = (base[0] - 14, base[1] - 14, base[2] - 8)
    return base


def make_icons():
    targets = [
        (os.path.join(FPK, "ICON.PNG"), 64),
        (os.path.join(FPK, "ICON_256.PNG"), 256),
        (os.path.join(FPK, "app", "ui", "images", "icon_64.png"), 64),
        (os.path.join(FPK, "app", "ui", "images", "icon_256.png"), 256),
    ]
    print("生成图标 ...")
    for path, size in targets:
        os.makedirs(os.path.dirname(path), exist_ok=True)
        # 按 64 逻辑坐标绘制再放大，保证 256 与 64 图案一致
        img = make_png(size, size, lambda x, y: icon_pixel(x * 64.0 / size, y * 64.0 / size))
        with open(path, "wb") as f:
            f.write(img)
        print("  写入", os.path.relpath(path, FPK))


if __name__ == "__main__":
    if not os.path.isdir(SRC_SITE):
        sys.exit("未找到 %s" % SRC_SITE)
    copy_site()
    patch_configs()
    patch_farm_configs()
    write_panel_api()
    make_icons()
    print("全部完成。")
