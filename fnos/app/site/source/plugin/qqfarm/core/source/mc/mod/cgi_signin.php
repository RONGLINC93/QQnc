<?php

$yellow = (int)$_REQUEST['yellow'];
$flag = (int)$_REQUEST['flag'];
$pid = (int)$_REQUEST['pid'];
$days = (int)$_REQUEST['days'];

$list = $_QFG['db']->fetchOne("SELECT U.uid,U.crystal,U.money,U.vip,M.signin,M.tools,M.goods FROM  app_qqfarm_user U Left JOIN app_qqfarm_mc M ON M.uid=U.uid where U.uid=".$_QFG['uid']);
$fruit = $_QFG['db']->result("SELECT fruit FROM app_qqfarm_nc where uid=" . $_QFG['uid']);
$fruit = qf_decode($fruit);

$crystal = qf_decode($list['crystal']);
$signin = qf_decode($list['signin']);
$money = $list['money'];
$vip = qf_decode($list['vip']);

$tools = qf_decode($list['tools']);
$goods = qf_decode($list['goods']);



//3天、5天、7天礼包
if($days && $signin['bonus']==1){
	if($days == 3){
		$fruit['40'] += 100 ; 
		$daysid = 15;
	} elseif($days == 5){
		$goods['1047'] += 1 ; 
		$daysid = 16;
	} elseif($days > 6){
		$goods['1035'] += 1 ; 
		$daysid = 17;
	}

	$signin['bonus'] = 0;

	$_QFG['db']->query("update app_qqfarm_mc set goods='".qf_encode($goods)."',signin='".qf_encode($signin)."'  where uid=".$_QFG['uid']);
	$_QFG['db']->query("update app_qqfarm_nc set fruit='".qf_encode($fruit)."'  where uid=".$_QFG['uid']);

	die( '{"code":1,"ecode":0,"id":'.$daysid.',"canNum":0}');
}

$signin['number'] += 1;
//VIP用户可领两次
if($vip['status'] || $yellow) {
	if($signin['number'] >2) die('{"code":0,"ecode":0,"direction":"今天你已经领了，明天再来碰碰运气吧！"}');
	$canNum = 2 - $signin['number'];
} else {
	if($signin['number'] >1) die('{"code":0,"ecode":0,"direction":"今天你已经领了，明天再来碰碰运气吧！"}');
	$canNum = 0;
}
$id = mt_rand(1, 22);
if($id==15 || $id==16 || $id==17) $id = mt_rand(1, 14);

if($id == 1){
	$money += 100;
} elseif($id == 2){
	$money += 500;
} elseif($id == 3){
	$goods['1050'] += 1 ; 
} elseif($id == 4){
	$goods['1054'] += 1 ; 
} elseif($id == 5){
	$goods['1540'] += 1 ; 
} elseif($id == 6){
	$goods['1561'] += 1 ; 
} elseif($id == 7){
	$goods['1060'] += 1 ; 
} elseif($id == 8){
	$goods['1062'] += 1 ; 
} elseif($id == 9){
	$crystal['5'] += 1 ; 
} elseif($id == 10){
	$crystal['8'] += 1 ; 
} elseif($id == 11){
	$crystal['1'] += 1 ; 
} elseif($id == 12){
	$crystal['2'] += 1 ; 
} elseif($id == 13){
	$goods['1551'] += 1 ; 
} elseif($id == 14){
	$goods['1055'] += 1 ; 
} elseif($id == 15){
	//$goods['174'] += 1 ; 
} elseif($id == 16){
	//$goods['139'] += 1 ; 
} elseif($id == 17){
	//$goods['166'] += 1 ; 
} elseif($id == 18){
	$goods['1056'] += 1 ; 
} elseif($id == 19){
	$goods['1560'] += 1 ; 
} elseif($id == 20){
	$tools['1'] += 1 ; 
} elseif($id == 21){
	$tools['2'] += 1 ; 
} elseif($id == 22){
	$tools['3'] += 1 ; 
} 

$_QFG['db']->query("update app_qqfarm_user set money='".$money."', crystal='".qf_encode($crystal)."' where uid=".$_QFG['uid']);
$_QFG['db']->query("update app_qqfarm_mc set signin='".qf_encode($signin)."',tools='".qf_encode($tools)."',goods='".qf_encode($goods)."'  where uid=".$_QFG['uid']);

echo '{"code":1,"ecode":0,"id":'.$id.',"canNum":'.$canNum.'}';

?>