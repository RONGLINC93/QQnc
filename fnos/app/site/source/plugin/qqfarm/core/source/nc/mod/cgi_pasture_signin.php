<?php

$yellow = (int)$_REQUEST['yellow'];
$flag = (int)$_REQUEST['flag'];
$pid = (int)$_REQUEST['pid'];
$days = (int)$_REQUEST['days'];

$list = $_QFG['db']->fetchOne("SELECT U.uid,U.crystal,U.money,U.signin,U.vip,N.tools,N.fruit,N.package FROM  app_qqfarm_user U Left JOIN app_qqfarm_nc N ON N.uid=U.uid where U.uid=".$_QFG['uid']);

$crystal = qf_decode($list['crystal']);
$signin = qf_decode($list['signin']);
$money = $list['money'];
$vip = qf_decode($list['vip']);

$tools = qf_decode($list['tools']);
$fruit = qf_decode($list['fruit']);
$package = qf_decode($list['package']);



//3天、5天、7天礼包
if($days && $signin['bonus']==1){
	if($days == 3){
		$package['174'] += 1 ; 
		$daysid = 15;
	} elseif($days == 5){
		$package['139'] += 1 ; 
		$daysid = 16;
	} elseif($days > 6){
		$package['166'] += 1 ; 
		$daysid = 17;
	}

	$signin['bonus'] = 0;

	$_QFG['db']->query("update app_qqfarm_user set signin='".qf_encode($signin)."'  where uid=".$_QFG['uid']);
	$_QFG['db']->query("update app_qqfarm_nc set package='".qf_encode($package)."'  where uid=".$_QFG['uid']);

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
$id = mt_rand(1, 24);
if(($id>12 && $id<19) || $id==21) $id = mt_rand(1, 12);

if($id == 1){
	$fruit['40'] += 50 ; 
} elseif($id == 2){
	$fruit['40'] += 200 ; 
} elseif($id == 3){
	$money += 100;
} elseif($id == 4){
	$money += 500;
} elseif($id == 5){
	$package['172'] += 1 ; 
} elseif($id == 6){
	$package['173'] += 1 ; 
} elseif($id == 7){
	$package['176'] += 1 ; 
} elseif($id == 8){
	$package['175'] += 1 ; 
} elseif($id == 9){
	$crystal['5'] += 1 ; 
} elseif($id == 10){
	$crystal['8'] += 1 ; 
} elseif($id == 11){
	$crystal['1'] += 1 ; 
} elseif($id == 12){
	$crystal['2'] += 1 ; 
} elseif($id == 13){

} elseif($id == 14){

} elseif($id == 15){
	$package['174'] += 1 ; 
} elseif($id == 16){
	$package['139'] += 1 ; 
} elseif($id == 17){
	$package['166'] += 1 ; 
} elseif($id == 18){

} elseif($id == 19){

} elseif($id == 20){
	$package['404'] += 1 ; 
} elseif($id == 21){

} elseif($id == 22){
	$tools['1'] += 1 ; 
} elseif($id == 23){
	$tools['2'] += 1 ; 
} elseif($id == 24){
	$tools['3'] += 1 ; 
}

$_QFG['db']->query("update app_qqfarm_user set money='".$money."',signin='".qf_encode($signin)."', crystal='".qf_encode($crystal)."' where uid=".$_QFG['uid']);
$_QFG['db']->query("update app_qqfarm_nc set tools='".qf_encode($tools)."', fruit='".qf_encode($fruit)."' , package='".qf_encode($package)."'  where uid=".$_QFG['uid']);

echo '{"code":1,"ecode":0,"id":'.$id.',"canNum":'.$canNum.'}';

?>