<?php
/* QQ农场管理面板数据接口 —— 由 tools/prepare_payload.py 自动生成 */
define('PANEL_TOKEN', 'qqfarm-panel-2026');
define('DB_HOST', 'mysql');
define('DB_USER', 'root');
define('DB_PASS', 'qqfarm123');
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
