<?php

# 加沙漏
$id = (int)$_REQUEST['id'];
$type = (int)$_REQUEST['type'];

$list = $_QFG['db']->fetchOne('SELECT tools,research FROM app_qqfarm_mc where uid=' . $_QFG['uid']);
$tools = qf_decode($list['tools']);
$research = qf_decode($list['research']);

if($tools[$id]<1) die( '{"ecode":-50111,"code":0,"direction":"您的沙漏已用完！","errorType":"您的沙漏已用完！","errorContent":"您的沙漏已用完！"}');

if($type){//栅
	$tid = 'shed';
	$research['shed']['endtime'] -= $toolstype[$id]['effect'];
	$tools[$id] -= 1;
} else {//窝
	$tid = 'den';
	$research['den']['endtime'] -= $toolstype[$id]['effect'];
	$tools[$id] -= 1;
}

$_QFG['db']->query("UPDATE app_qqfarm_mc set tools='" . qf_encode($tools) . "',research='" . qf_encode($research) . "' where uid=" . $_QFG['uid']);

echo '{"ecode":0,"den_endtime":'.(int)$research['den']['endtime'].',"shed_endtime":'.(int)$research['shed']['endtime'].'}';
?>