<?php

# 科研

$action = (int)$_REQUEST['action'];
$aid = (int)$_REQUEST['aid'];
$target = (int)$_REQUEST['target'];
$researchini = array(
	"1096" =>array(18000,24),
	"1097" =>array(18700,28),
	"1098" =>array(19000,34),
	"1598" =>array(18500,24),
	"1600" =>array(18900,28),
	"1601" =>array(19500,34)
);
$discountini = array ("9"=>1,"10"=>0.8,"11"=>0.7,"12"=>0.6,"13"=>0.5);

$list = $_QFG['db']->fetchOne('SELECT goods,tools,research,decorative FROM app_qqfarm_mc where uid=' . $_QFG['uid']);
$goods = qf_decode($list['goods']);
$decorative = qf_decode($list['decorative']);
$research = qf_decode($list['research']);
$money = $probability = 0;

if($target){//栅
	$tid = 'shed';
	$discount = $discountini[$decorative['item3']];
	if($decorative['item3']>9) $probability = 10; 
} else {//窝
	$tid = 'den';
	$discount = $discountini[$decorative['item2']];
	if($decorative['item2']>9) $probability = 10; 
}

if($action){//收成
	$cnt = 1;
	$mt = 60 + $probability;
	if(mt_rand(1, 100) < $mt) $cnt = 2;
	$goods[$aid] += $cnt;
	$research[$tid] = array("endtime"=>0,"animalid"=>0);

	echo '{"cnt":'.$cnt.',"flag":false,"aid":'.$aid.',"ecode":0}';
} else {
	$money = $researchini[$aid]['0'] * $discount;
	$endtime = $_QFG['timestamp'] + $researchini[$aid]['1'] * 3600;
	$research[$tid] = array("endtime"=>$endtime,"animalid"=>$aid);

	echo '{"endtime":'.$endtime.',"aid":'.$aid.',"ecode":0}';
}

$_QFG['db']->query("UPDATE app_qqfarm_user set money=money-$money where uid=" . $_QFG['uid']);
$_QFG['db']->query("UPDATE app_qqfarm_mc set goods='" . qf_encode($goods) . "',research='" . qf_encode($research) . "' where uid=" . $_QFG['uid']);

?>