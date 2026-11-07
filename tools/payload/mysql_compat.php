<?php
/**
 * Discuz X2 / UCenter 旧 mysql_* 扩展兼容层
 * 通过 auto_prepend_file 载入，把老函数映射到 mysqli（PHP 5.6 + MariaDB）。
 */
if (!function_exists('mysql_connect')) {
    if (!defined('MYSQL_ASSOC')) define('MYSQL_ASSOC', 1);
    if (!defined('MYSQL_NUM')) define('MYSQL_NUM', 2);
    if (!defined('MYSQL_BOTH')) define('MYSQL_BOTH', 3);
    if (!defined('MYSQL_CLIENT_COMPRESS')) define('MYSQL_CLIENT_COMPRESS', 32);
    if (!defined('MYSQL_CLIENT_SSL')) define('MYSQL_CLIENT_SSL', 2048);

    $GLOBALS['_qqfarm_db_link'] = null;

    function _qqfarm_link($link = null)
    {
        if ($link instanceof mysqli) return $link;
        if ($GLOBALS['_qqfarm_db_link'] instanceof mysqli) return $GLOBALS['_qqfarm_db_link'];
        return null;
    }

    function mysql_connect($server = '', $username = '', $password = '', $new_link = false, $client_flags = 0)
    {
        $host = ($server === '' || $server === null) ? 'localhost' : $server;
        $port = 3306;
        $socket = null;
        if (strpos($host, ':') !== false) {
            $parts = explode(':', $host, 2);
            $host = $parts[0];
            if (is_numeric($parts[1])) $port = (int)$parts[1];
            else $socket = $parts[1];
        }
        $link = @mysqli_connect($host, $username, $password, '', $port, $socket);
        if ($link instanceof mysqli) $GLOBALS['_qqfarm_db_link'] = $link;
        return $link ? $link : false;
    }

    function mysql_pconnect($server = '', $username = '', $password = '', $client_flags = 0)
    {
        return mysql_connect($server, $username, $password, false, $client_flags);
    }

    function mysql_select_db($database_name, $link = null)
    {
        $l = _qqfarm_link($link);
        return $l ? @mysqli_select_db($l, $database_name) : false;
    }

    function mysql_query($query, $link = null)
    {
        $l = _qqfarm_link($link);
        return $l ? @mysqli_query($l, $query) : false;
    }

    function mysql_unbuffered_query($query, $link = null)
    {
        $l = _qqfarm_link($link);
        return $l ? @mysqli_query($l, $query, MYSQLI_USE_RESULT) : false;
    }

    function mysql_fetch_array($result, $result_type = 3)
    {
        return ($result instanceof mysqli_result) ? @mysqli_fetch_array($result, $result_type) : false;
    }

    function mysql_fetch_assoc($result)
    {
        return ($result instanceof mysqli_result) ? @mysqli_fetch_assoc($result) : false;
    }

    function mysql_fetch_row($result)
    {
        return ($result instanceof mysqli_result) ? @mysqli_fetch_row($result) : false;
    }

    function mysql_fetch_object($result)
    {
        return ($result instanceof mysqli_result) ? @mysqli_fetch_object($result) : false;
    }

    function mysql_num_rows($result)
    {
        return ($result instanceof mysqli_result) ? @mysqli_num_rows($result) : 0;
    }

    function mysql_num_fields($result)
    {
        return ($result instanceof mysqli_result) ? @mysqli_num_fields($result) : 0;
    }

    function mysql_affected_rows($link = null)
    {
        $l = _qqfarm_link($link);
        return $l ? @mysqli_affected_rows($l) : -1;
    }

    function mysql_insert_id($link = null)
    {
        $l = _qqfarm_link($link);
        return $l ? @mysqli_insert_id($l) : 0;
    }

    function mysql_errno($link = null)
    {
        $l = _qqfarm_link($link);
        return $l ? @mysqli_errno($l) : 0;
    }

    function mysql_error($link = null)
    {
        $l = _qqfarm_link($link);
        return $l ? @mysqli_error($l) : 'No MySQL connection';
    }

    function mysql_escape_string($unescaped_string)
    {
        $l = _qqfarm_link(null);
        return $l ? @mysqli_real_escape_string($l, $unescaped_string) : addslashes($unescaped_string);
    }

    function mysql_real_escape_string($unescaped_string, $link = null)
    {
        $l = _qqfarm_link($link);
        return $l ? @mysqli_real_escape_string($l, $unescaped_string) : addslashes($unescaped_string);
    }

    function mysql_result($result, $row, $field = 0)
    {
        if (!($result instanceof mysqli_result)) return false;
        if (!@mysqli_data_seek($result, $row)) return false;
        $type = is_numeric($field) ? MYSQLI_NUM : MYSQLI_ASSOC;
        $data = @mysqli_fetch_array($result, $type);
        if (!$data) return false;
        $key = is_numeric($field) ? (int)$field : $field;
        return isset($data[$key]) ? $data[$key] : false;
    }

    function mysql_free_result($result)
    {
        if ($result instanceof mysqli_result) @mysqli_free_result($result);
        return true;
    }

    function mysql_fetch_field($result)
    {
        return ($result instanceof mysqli_result) ? @mysqli_fetch_field($result) : false;
    }

    function mysql_fetch_lengths($result)
    {
        return ($result instanceof mysqli_result) ? @mysqli_fetch_lengths($result) : false;
    }

    function mysql_data_seek($result, $row_number)
    {
        return ($result instanceof mysqli_result) ? @mysqli_data_seek($result, $row_number) : false;
    }

    function mysql_field_seek($result, $field_offset)
    {
        return ($result instanceof mysqli_result) ? @mysqli_field_seek($result, $field_offset) : false;
    }

    function mysql_get_server_info($link = null)
    {
        $l = _qqfarm_link($link);
        return $l ? @mysqli_get_server_info($l) : false;
    }

    function mysql_get_host_info($link = null)
    {
        $l = _qqfarm_link($link);
        return $l ? @mysqli_get_host_info($l) : false;
    }

    function mysql_ping($link = null)
    {
        $l = _qqfarm_link($link);
        return $l ? @mysqli_ping($l) : false;
    }

    function mysql_set_charset($charset, $link = null)
    {
        $l = _qqfarm_link($link);
        return $l ? @mysqli_set_charset($l, $charset) : false;
    }

    function mysql_close($link = null)
    {
        $l = _qqfarm_link($link);
        if ($l) {
            @mysqli_close($l);
            if ($l === $GLOBALS['_qqfarm_db_link']) $GLOBALS['_qqfarm_db_link'] = null;
            return true;
        }
        return false;
    }
}
