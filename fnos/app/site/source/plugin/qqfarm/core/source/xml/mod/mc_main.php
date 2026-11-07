<?php
//牧场:mcini_main_v_8.xml

$mc_main = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<main>
	<postUrl url = "$url/mymc.php?mod=" commonFarm="$url/mymc.php?mod=" commonNc="$url/mymc.php?mod=" url_pengyou = "$url/mymc.php?mod=" commonFarm_pengyou="$url/mymc.php?mod=" commonNc_pengyou="$url/mymc.php?mod=" fbRequest = "gb_buy" cftRequest="gb_buy" verifyRequest = "shop_verify"/><!-- http请求地址 -->
	<loading url="module/loading_v_13.swf" />
	<folder url = "module/mc/" />
	<version value = "" loginurl = "http://i.qzone.qq.com/" />	
	<openControl><!-- 功能开放控制 -->
		<item name = "tool" open = "true" /><!-- 道具 -->
		<item name = "pack" open = "false" /><!-- 好友背包 -->
		<item name = "quickshoot" open="true" openlv="1"/><!--快照-->
		<item name = "harvestall" open="true" openlv="7" time="5|6|7|8|9|10|12|13|19|20|21|22"/><!--一键收获-->
		<item name = "sprice" open="true" openlv="0" time="5/1/2010 15:00|5/13/2010 15:00"/>
		<item name = "wild" open="true" openlv="1" openexp="0" />
	</openControl>
	<security host="192.168.1.121" port="3333" />	
	<moduleList><!-- 模块列表 -->
		<module name="main" url="module/Master2_v_86.swf" statusText="加载主文件...">
            <material url="module/mc/main/farmui1_v_40.swf" statusText="加载UI素材..." />
            <material url="module/mc/main/farmui2_v_35.swf" statusText="加载UI素材..." />
            <material url="module/mc/main/commonui_v_10.swf" statusText="加载UI素材..." />
			<material url="module/mc/farm/wild/wild_ui_v_10.swf" statusText="加载图标素材..." />
            <material url="module/mc/main/title_v_7.swf" statusText="加载窗口标题..."  />
		</module>
	</moduleList>
	<moduleList2><!-- 模块列表2 -->		
		<module name="task" url="module/mc/main/task_v_1.swf" statusText="任务素材" />
		<module name="upgrade" url="module/mc/main/upgrade_v_1.swf?v=1" statusText="升级素材"  />
		<module name="hunter" url="module/mc/farm/hunter/" statusText="猎人素材" />
		<module name="drop9" url="module/mc/farm/wild/drop9.swf" statusText="野生动物水晶" />
		<module name="wildanimal" url="module/mc/farm/wild/" statusText="野生动物" />
		<module name="wildaction" url="module/mc/farm/wild/action.swf" statusText="野生动物" />
		<module name="wildaweapon" url="module/mc/farm/wild/" statusText="野生动物" />
<module name="intel" url="module/mc/farm/intel/intel_134.swf" statusText="Intel活动" />
		<module name="mouse" url="module/mc/farm/enemy/mouse.swf" statusText="天灾老鼠" />
	</moduleList2>
	<submodule>
    <module name="monthbegin" month="12月" url="module/mc/submodule/monthBegin_v_0.swf" shareImg="icon/monthbegin/feed.png" start="12/12/2011 00:00:00" end="12/19/2011 00:00:00"/>
<module name="firecracker" url="module/mc/module/pasturefirecraker2012_v_0.swf"/>
<module name="lovesday" url="module/mc/submodule/Lovesday_v_0.swf" start="2/8/2012 00:00:00" end="2/24/2012 00:00:00" speaking="活动产物可翻9倍哦！" tip="2012“情人节”活动">
			<material name="lovesdayNPC" url="module/ui/npc/lovesdayNPC_v_0.swf"/>
			<material name="lovesdayWindow" url="module/ui/npc/lovesdayWin_v_0.swf"/>
		</module>
           </submodule>
	<logic>
		<restaurantEnterCfg open="true">http://appimg3.qq.com/restaurant/data/farmRestaurantConfig_v_0.xml</restaurantEnterCfg>
		<urlFriend url = "http://id.qq.com/friends/index.html#myfriends-2-3" />
	</logic>
	<missonList>
		<mission className='PrepareTime' str='2010-12-08 00:00:00'/>
		<mission className='BeginTime' str='2010-12-30 00:00:00'/>
		<mission className='EndTime' str='2011-01-17 15:00:00'/>
		
		<mission className='fstTime' str='2010-12-30 14:00:00'/>
	  <mission className='sndTime' str='2010-12-30 14:00:00'/>
	  <mission className='trdTime' str='2010-12-30 14:00:00'/>
	  <mission className='fourthTime' str='2010-12-30 14:00:00'/>
	  <mission className='fifthTime' str='2010-12-30 14:00:00'/>
   </missonList><vipRenewal>
		<tips><![CDATA[您的VIP还有<font color = '#FF0000'><b>&nbsp;{expireDays}&nbsp;</b></font>天到期。我们温馨提醒您及时<br>VIP贵族每月可领取最高<font color = '#FF0000'><b>&nbsp;420&nbsp;</b></font>Q币农牧场礼包。]]></tips>
		<link><![CDATA[tools.php?mod=vip]]></link>
	</vipRenewal>
	<vipReturn>
	<vipReturnLink><![CDATA[tools.php?mod=vip]]></vipReturnLink>
        <vipReturnButton><![CDATA[module/ui/buttons/vipReturnButton.png]]></vipReturnButton>
	</vipReturn>
	<hunter>
		<food>{"buyexp":0,"description":"一次性购买5天工资，即可额外获赠2天的工资。让看守员为您看守牧场一周。","effect":604800,"id":102,"left":9972551,"name":"普通工资5+2礼包","order":8,"price":0,"qdprice":20,"status":1,"type":5,"validtime":0,"yqdprice":16}</food>
	</hunter>
<flopCards><!-- 牧场签到信息 -->
		<gift sid='1' name='金币' num='100' vid='' swf='' cla='GoldCardsGame' per='个'/>
		<gift sid='2' name='金币' num='500' vid='' swf='' cla='GoldCardsGame' per='个'/>
		<gift sid='3' name='白鸽' num='1' vid='1050' swf='' cla='' per='只'/>
		<gift sid='4' name='春燕' num='1' vid='1054' swf='' cla='' per='只'/>
		<gift sid='5' name='短尾猫' num='1' vid='1540' swf='' cla='' per='只'/>
		<gift sid='6' name='呼呼牛' num='1' vid='1561' swf='' cla='' per='头'/>
		<gift sid='7' name='叻叻兔' num='1' vid='1060' swf='' cla='' per='只'/>
		<gift sid='8' name='哧哧鸡' num='1' vid='1062' swf='' cla='' per='只'/>
		<gift sid='9' name='红水晶' num='1' vid='' swf='module/mc/farm/wild/drop9.swf' cla='Drop_9_5' per='个'/>
		<gift sid='10' name='橙水晶' num='1' vid='' swf='module/mc/farm/wild/drop9.swf' cla='Drop_9_8' per='个'/>
		<gift sid='11' name='蓝水晶' num='1' vid='' swf='module/mc/farm/wild/drop9.swf' cla='Drop_9_1' per='个'/>
		<gift sid='12' name='绿水晶' num='1' vid='' swf='module/mc/farm/wild/drop9.swf' cla='Drop_9_2' per='个'/>
		<gift sid='13' name='辣辣狗' num='1' vid='1551' swf='' cla='' per='只'/>
		<gift sid='14' name='橙橙猴' num='1' vid='1055' swf='' cla='' per='只'/>
		<gift sid='18' name='雅利鸭' num='1' vid='1056' swf='' cla='' per='只'/>
		<gift sid='19' name='咩咩羊' num='1' vid='1560' swf='' cla='' per='头'/><!--http://ctc.appimg.qq.com/mc/module/mc/farm/wild/drop9.swf-->
		<gift sid='20' name='普通罐头' num='1' vid='' swf='' cla='Tool_7_4' per='罐'/>
		<gift sid='21' name='高速罐头' num='1' vid='' swf='' cla='Tool_7_2' per='罐'/>
		<gift sid='22' name='极速罐头' num='1' vid='' swf='' cla='Tool_7_3' per='罐'/>
	</flopCards>
	<flopGifts>
		<gift id='15' days='3' name='牧草' num='100' cla='Crop_40_Seed'/>
		<gift id='16' days='5' name='丝光鸡' num='1' cla='SiGuangJi'/>
		<gift id='17' days='7' name='千年龟' num='1' cla='QianNianGui'/>	
</flopGifts>
<vipAnimal>
		<yellowText>
			<vip content='您是尊贵的VIP用户，可以饲养以下VIP专属动物。'/>
			<vip content='VIP动物专区，您可以开通VIP饲养以下动物。'/>
		</yellowText>
	</vipAnimal>
	<wild url="module/mc/farm/wild/wild_v_34.xml" loader="module/mc/farm/wild/WildShell_v_30.swf"></wild>
<!--沙箱:1为开沙箱-->
	 <sanbox>0</sanbox>
<!--翻牌-->
	 <flopSWF>module/mc/main/windows/flopGift_v_5.swf</flopSWF>
<!--窝棚升级-->
	 <updataDen url="module/mc/main/updateDen/updataDen_v_0.swf" firstOpen="module/mc/main/updateDen/firstIn_v_0.swf" shareImg="module/mc/main/updateDen/share.jpg"/>
	 <hourglass>
		<item id="40" type="12" name="迷你沙漏" des="缩短1小时"/>
		<item id="41" type="12" name="普通沙漏" des="缩短3小时"/>
		<item id="42" type="12" name="告诉沙漏" des="缩短8小时"/>
		<item id="43" type="12" name="极速沙漏" des="缩短12小时"/>
	 </hourglass>
<levels>0</levels>
</main>

XML;
?>