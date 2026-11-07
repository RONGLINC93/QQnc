<?php
//农场:addon_v_25.xml

$nc_addon = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<data>
	<!-- Flash Vars 杂项配置放这里 -->
	<vars>
	  <app_key>happyfarm</app_key>
	  <diyLimitYDLevel>4</diyLimitYDLevel>
	  <domian_qz>farm.qzone</domian_qz>
	  <domian_xy>farm.xiaoyou</domian_xy>
	  <friend_list_mod_qz>1000</friend_list_mod_qz>
	  <friend_list_mod_xy>1000</friend_list_mod_xy>
	  <friend_list_tips>系统繁忙，请稍后再试！</friend_list_tips>
	  <steal_mod>1000</steal_mod>
	  <filterUrl>http://blog.qq.com/qzone/1006666002/1300264199.htm</filterUrl>
	  <friendUrl>http://id.qq.com/friends/index.html#myfriends-2-1</friendUrl>
	  <steal_tips>为保证更加稳定的服务，系统正在对部分号码进行数据维护。在此时间段系统将暂停您的 “摘取”操作以保护您的数据安全。期间好友也不能摘取您的作物，其他操作正常！谢谢您的支持！</steal_tips>
	  <enter_into_mod>1000</enter_into_mod>
	  <redirect_url_qz>http://imgcache.qq.com/qzone/v5/app/errorback/error_canvas.html#appid=353</redirect_url_qz>
	  <steal_tips_other>为保证更加稳定的服务，系统正在对部分号码进行数据维护。在此号段的农场在维护期间将停止摘取以保护数据安全。期间好友也不能摘取您的作物，其他操作正常！谢谢您的支持！</steal_tips_other>
	  <trdTimeGq>2010-9-26 14:00:00</trdTimeGq>
	  <redirect_url_xy>http://app.xiaoyou.qq.com/appframe_error.html?key=happyfarm</redirect_url_xy>
	  <ShopHeadLink>充50元话费就送50元农场大礼包，多充多送！|http://www.paipai.com/promote/2010/09/nongchang/index.html?PTAG=31395.4.2</ShopHeadLink>
	  <usercheck>7ae3d8bfd84b1cf2226c28671b093ad9</usercheck>
	  <config_url_qz>http://farm.qzone.qq.com/cgi-bin/cgi_farm_ini_run_v2?v=8</config_url_qz>
	  <config_url_xy>http://farm.xiaoyou.qq.com/cgi-bin/cgi_farm_ini_run_v2?v=8</config_url_xy>
	  <healthModeTime>00:00 - 06:00</healthModeTime>
	  <snowslide>10</snowslide>
	  <uinMode>1</uinMode>
	  <reqYellowlevel>2</reqYellowlevel>
	  <flowerDayTips>内测期间开放给黄钻以及农场15级以上（含15级）用户，每天每人可赠送一束鲜花哦！</flowerDayTips>

	  <flowerYDLevel>1</flowerYDLevel>
	  <cacheSeed>65</cacheSeed>
	  <batchStealHour>6-10,12-13,19-22</batchStealHour>
	  
	  <buyToolTips>最近化肥使用量激增导致供应紧张，目前暂不能购买。</buyToolTips>
	  <mill>appid=376</mill>
	  <buyToolHour>0-24</buyToolHour>
	  <millLimitYDLevel>1</millLimitYDLevel>
	  <noFoodTips>最近狗粮原材料供应紧张，目前暂不能购买。</noFoodTips>
	  <buyTin>1</buyTin>

<adSeedTabOpen>1</adSeedTabOpen>
<!--微博史诗礼包是否有广播开关，0为无，1为有-->
	  <broadcaseOpen>0</broadcaseOpen>
<!--查看礼包中加文本的开关-->
	  <checkGiftOpen>1</checkGiftOpen>
	  <checkGiftText>&lt;font size=&apos;12&apos; color=&apos;#A1784A&apos;&gt;收听农牧场官方微博，开千万礼包！&lt;/font&gt;&lt;br&gt;&lt;font size=&apos;12&apos; color=&apos;#A1784A&apos;&gt;收听链接： &lt;/font&gt;&lt;a href=&apos;http://t.qq.com/qqfarm?pref=qzone.farm&apos; target=&apos;_blank&apos;&gt;&lt;font size=&apos;12&apos; color=&apos;#0000ff&apos;&gt;&lt;u&gt;&lt;strong&gt;http://t.qq.com/qqfarm?pref=qzone.farm&lt;/strong&gt;&lt;/u&gt;&lt;/font&gt;</checkGiftText>

<!--npc开始结束时间-->
	  <NPCTip>2012“情人节”活动</NPCTip>
	  <NPCSpeaking>活动果实可翻9倍哦！</NPCSpeaking>
	  <NPCTitle>情人节活动</NPCTitle>
          <WarehouseEmpty>材料仓库空空的，赶紧去好友的农场寻找、驱赶野生动物获得水晶吧！</WarehouseEmpty>       
	  <missionBeginTime>2012-02-08 00:00:00</missionBeginTime>
	  <missionEndTime>2012-02-24 00:00:00</missionEndTime>

	  <YearEndSharePic><![CDATA[module/ui/icons/yearend/icon2.jpg]]></YearEndSharePic>
	  	  
          <fstTime>2011-04-27 10:00:00</fstTime>
	  <sndTime>2011-04-27 12:00:00</sndTime>
	  <trdTime>2011-04-27 13:00:00</trdTime>
	  <fourthTime>2011-04-27 14:00:00</fourthTime>
	  <fifthTime>2011-04-27 16:00:00</fifthTime>

	  <fstTimeFeedsNPC>2012-12-05 17:30:00</fstTimeFeedsNPC>
	  <sndTimeFeedsNPC>2012-12-05 18:00:00</sndTimeFeedsNPC>
	  <trdTimeFeedsNPC>2012-12-05 18:30:00</trdTimeFeedsNPC>
	  <fourthTimeFeedsNPC>2012-12-05 19:00:00</fourthTimeFeedsNPC>
	  <fifthTimeFeedsNPC>2012-12-05 19:30:00</fifthTimeFeedsNPC>

	  <snsAdAllowLvl>0</snsAdAllowLvl>
      <showShopMillTab>0</showShopMillTab>
	  <everyDayGiftTip><![CDATA[您的黄钻还有<font color = '#FF0000'><b>&nbsp;{expireDays}&nbsp;</b></font>天到期。我们温馨提醒您及时<br>黄钻贵族每月可领取最高<font color = '#FF0000'><b>&nbsp;420&nbsp;</b></font>Q币农牧场礼包。]]></everyDayGiftTip>
	  <vipRenewal><![CDATA[http://pay.qq.com/qzone/index.shtml?ch=self&aid= farm.gifts]]></vipRenewal>
	  <pickupGiftFunny><![CDATA[恭喜您，翻地时挖到<font color="#339933"><b>&nbsp;@num&nbsp;</b></font>颗@name种子，可以在农场里组合各种图案。后续还将推出数字、字母等趣味景观树，敬请期待！<a href="event:http://blog.qq.com/qzone/1006666001/1292920220.htm"><u><font color="#26BBE9">查看样例</font></u></a>]]></pickupGiftFunny>
      <useNewFeeds>1</useNewFeeds>
      <vipReturn><![CDATA[http://pay.qq.com/qzone/index.shtml?ch=self&aid=farm.backhzf&paytime=year]]></vipReturn>
      <newScroungeCGI>9999</newScroungeCGI>
      <vipSeedLink><![CDATA[http://pay.qq.com/qzone/index.shtml?cm=mobile&aid=farm.zzop]]></vipSeedLink>

      <CardsGameOpenVip><![CDATA[http://pay.qq.com/qzone/index.shtml?cm=mobile&aid=farm.qdkt]]></CardsGameOpenVip>
<CardsGameRenewalVip><![CDATA[http://pay.qq.com/qzone/index.shtml?cm=mobile&aid=farm.qdxf]]></CardsGameRenewalVip>
<CardsGameAllowLvl>0</CardsGameAllowLvl>
	  <ForceOpenPostWindowStr>为了保证奖品顺利邮寄</ForceOpenPostWindowStr>
          <zhaohuiOpen>1</zhaohuiOpen>
          <userActionOpenUin>1720,1720</userActionOpenUin>
          <qixiLinkOpen>0</qixiLinkOpen>

          <QQSuperMarketVip>0</QQSuperMarketVip>
	  <QQSuperMarketLvl>55</QQSuperMarketLvl>
<!--是否需要给应用中心发份数据-->
	<sendRequest>1</sendRequest>
        <healthStart>10/12/2011 00:00:00</healthStart>
	<healthEnd>10/20/2011 00:00:00</healthEnd>
          
<!-- 野外场景手工更新这里 -->
<beastLoaderUrl><![CDATA[module/mc/farm/wild/WildShell_v_30.swf]]></beastLoaderUrl>
<wildXML><![CDATA[module/mc/farm/wild/wild_v_34.xml]]></wildXML>
	  
	  <NcDrop9><![CDATA[module/ui/wild/NcDrop9_v_1.swf]]></NcDrop9>
	  <drop9><![CDATA[module/mc/farm/wild/drop9.swf]]></drop9>
	  <wildanimal><![CDATA[module/mc/farm/wild/]]></wildanimal>
	  <wildaction><![CDATA[module/mc/farm/wild/action.swf]]></wildaction>
	  <wildaweapon><![CDATA[module/mc/farm/wild/]]></wildaweapon>
	  
          <wildOpenlv>0</wildOpenlv>
	  <wildOpenexp>0</wildOpenexp>
	  <wildOpenCtrl>true</wildOpenCtrl>

          <cropUrl><![CDATA[module/ui/allcrops/]]></cropUrl>
	  <publicCropPrefix><![CDATA[Crop_1_]]></publicCropPrefix>

	  <fishNPC>http://qzs.qq.com/qzone/vas/static/2011/20110867.html</fishNPC>
	  <fishTutorial>module/ui/fish_tutorial.jpg</fishTutorial>

          <sandbox>0</sandbox>

<FirecrackerGift><![CDATA[http://show.qq.com/live/vipact/newyear/index.html?from=1]]></FirecrackerGift>

          <StocksGift><![CDATA[http://show.qq.com/live/vipact/xmas2011/index.html?ADTAG=isd.live.christmas.farm]]></StocksGift>

          <pgvClickEnable>1</pgvClickEnable> <!-- 点击流上报控制 -->
</vars>

<!--电脑管家礼包-->
	<houseKeepers>
		<houseKeeper id="0" name="HouseKeeper" url="module/ui/farm/houseKeeper_v_1.swf" start="12/7/2011 00:00:00" end="12/22/2011 00:00:00" dogLink="http://guanjia.qq.com/act/farm/?ADTAG=WEB.FRAM.INDEX.DOG#lgift1" dogfedLink="http://guanjia.qq.com/act/farm/?ADTAG=WEB.FRAM.INDEX.LIANG#lgift2" shopdog="http://guanjia.qq.com/act/farm/?ADTAG=WEB.FRAM.INDEX.SHOP"/>
	</houseKeepers>


<!--月末促销-->
	<monthEnds>
		<monthEnd id="0" name="monthend" month="1月" url="module/ui/monthEnd_v_5.swf" shareImg="module/ui/icons/feed1.png" start="1/5/2012 00:00:00" end="1/12/2012 00:00:00"/>
	</monthEnds>
<!--qzone礼物-->
	<qzonegifts>
		<qzonegift id="0" name="qzonegift" url="module/ui/qzonegift_v_0.swf"/>
	</qzonegifts>

	<cardsGameRewards>
	  <cardsGameReward id = "1" bid = "1" cId="40" type="1" name="牧草果实" num="50" store="农场仓库" per="个"/>
	  <cardsGameReward id = "2" bid = "2" cId="40" type="1" name="牧草果实" num="200" store="农场仓库" per="个"/>
	  <cardsGameReward id = "3" bid = "3" cId="1" type="6" name="金币" num="100" store="金币帐户" per="个"/>
	  <cardsGameReward id = "4" bid = "4" cId="1" type="6" name="金币" num="500" store="金币帐户" per="个"/>
	  <cardsGameReward id = "5" bid = "5" cId="172" type="1" name="宋梅" num="1" store="农场物品包" per="个"/>
	  <cardsGameReward id = "6" bid = "6" cId="173" type="1" name="夜来香" num="1" store="农场物品包" per="个"/>
	  <cardsGameReward id = "7" bid = "7" cId="176" type="1" name="金银花" num="1" store="农场物品包" per="个"/>
          <cardsGameReward id = "8" bid = "8" cId="175" type="1" name="黄花魁" num="1" store="农场物品包" per="个"/>
	  <cardsGameReward id = "9" bid = "9" cId="5" type="9" name="红水晶" num="1" store="农场仓库-材料" per="个"/>
	  <cardsGameReward id = "10" bid = "10" cId="8" type="9" name="橙水晶" num="1" store="农场仓库-材料" per="个"/>
	  <cardsGameReward id = "11" bid = "11" cId="1" type="9" name="蓝水晶" num="1" store="农场仓库-材料" per="个"/>
	  <cardsGameReward id = "12" bid = "12" cId="2" type="9" name="绿水晶" num="1" store="农场仓库-材料" per="个"/>
	  <cardsGameReward id = "15" bid = "15" cId="174" type="1" name="晚香玉种子" num="1" store="农场物品包" per="个" exp="18" growTime = "111600" harvestTimes = "5" level = "25" output = "27" sale="31"/>
	  <cardsGameReward id = "16" bid = "16" cId="139" type="1" name="糖槭树花种子" num="1" store="农场物品包" per="个" exp="15" growTime = "72000" harvestTimes = "2" level = "10" output = "22" sale="24"/>
	  <cardsGameReward id = "17" bid = "17" cId="166" type="1" name="七彩果种子" num="1" store="农场物品包" per="个" exp="21" growTime = "169200" harvestTimes = "7" level = "50" output = "30" sale="63"/>
          <cardsGameReward id = "20" bid = "20" cId="404" type="1" name="英雄大象" num="1" store="农场物品包" per="个"/>
	  <cardsGameReward id = "22" bid = "22" cId="1" type="3" name="普通化肥" num="1" store="农场物品包" per="袋"/>
	  <cardsGameReward id = "23" bid = "23" cId="2" type="3" name="高速化肥" num="1" store="农场物品包" per="袋"/>
	  <cardsGameReward id = "24" bid = "24" cId="3" type="3" name="急速化肥" num="1" store="农场物品包" per="袋"/>
          <cardsGameReward id = "25" bid = "25" cId="402" type="1" name="疯狂摇滚猫" num="1" store="农场物品包" per="个"/>
          <cardsGameReward id = "26" bid = "26" cId="403" type="1" name="河马新娘" num="1" store="农场物品包" per="个"/>
          <cardsGameReward id = "27" bid = "27" cId="405" type="1" name="绵羊海盗" num="1" store="农场物品包" per="个"/>
	</cardsGameRewards>

	<yearEndAwards>

	<yearEndAward id="622" desc="礼花树种子1个" lottery="8" type="1"/>
	<yearEndAward id="623" desc="彩灯树种子1个" lottery="8" type="1"/>
	<yearEndAward id="624" desc="红袜树种子1个" lottery="8" type="1"/>
	<yearEndAward id="50" desc="农场经验50" lottery="8" type="7"/>
	<yearEndAward id="1000" desc="金币1000" lottery="8" type="6"/>
	<yearEndAward id="80018" desc="红帽喜狗" lottery="8" type="4"/>
	<yearEndAward id="80" desc="农场经验80" lottery="8" type="7"/>
	<yearEndAward id="1500" desc="金币1500" lottery="8" type="6"/>

	<yearEndAward id="3000" desc="精美饰品、摆件" lottery="3"/>
	<yearEndAward id="3001" desc="丹尼诗纯正橄榄油" lottery="1"/>
	<yearEndAward id="3002" desc="护脖" lottery="1"/>
	<yearEndAward id="3003" desc="QQ兔公仔" lottery="7"/>
	<yearEndAward id="3004" desc="1G牧场珍藏版U盘" lottery="5"/>
	<yearEndAward id="3005" desc="QQ农牧场专属扑克牌" lottery="6"/>
	<yearEndAward id="3006" desc="五福临门" lottery="2"/>

	<yearEndAward id="3007" desc="优众200元代金券" lottery="4" link="http://www.ihaveu.com/auction/mails/211"/>
	<yearEndAward id="3008" desc="秀团网30元优惠券" lottery="4" link="http://www.xiutuan.com/huodong/youhui/help.html"/>
	<yearEndAward id="3009" desc="珍惜特卖商城20元现金券" lottery="4" link="http://www.zhenxi.com/help/cashcard"/>
	<yearEndAward id="3010" desc="品质团10元代金券" lottery="4" link="http://www.pztuan.com/help/aboutcard.aspx"/>
	<yearEndAward id="3011" desc="可购可乐10元代金券" lottery="4" link="http://www.kgkl.cn/help/djq.php"/>
	<yearEndAward id="3012" desc="团秀网10元优惠券" lottery="4" link="http://www.tuanxiu.cn/application/user/index.php?action=links&id=426"/>

	</yearEndAwards>

<!--免费送礼配置-->
	<freegifts>
        <freegift id="1" bid="1" visible="0" type="1" cId="429" name="鸢尾巧克力" num="1" ground="普通" store="我的物品包" per="个" use="农场普通土地上种植" url="module/ui/icons/award4.png"/>
<freegift id="2" bid="2" visible="1" type="7" cId="1" name="农场经验" num="10" per="点" use="直接增加农场经验" url="module/ui/icons/expicon.png"/>
<freegift id="3" bid="3" visible="0" type="1" cId="207" name="八仙花" num="1" ground="普通" store="我的物品包" per="个" use="农场普通土地上种植" url="module/ui/icons/award1.png"/>
<freegift id="4" bid="4" visible="0" type="10" cId="7" name="黄金飞刀" num="1" store="我的物品包-道具" per="把" use="减少野生动物体力35点，并获得更多奖励" url="module/ui/icons/weapon3.png"/>
<freegift id="5" bid="5" visible="0" type="1" cId="265" name="朱雀花" num="1" ground="红" store="我的物品包" per="个" use="农场红土地上种植" url="module/ui/icons/award5.png"/>
<freegift id="6" bid="6" visible="1" type="24" cId="1" name="普通鱼食" num="1" store="我的物品包-道具" per="袋" use="使用后缩短鱼该阶段生长时间2小时" url="module/ui/icons/fishfood.png"/>
<freegift id="7" bid="7" visible="0" type="1" cId="257" name="孔雀草" num="1" ground="红" store="我的物品包" per="个" use="农场红土地上种植" url="module/ui/icons/award2.png"/>
<freegift id="8" bid="8" visible="1" type="1" cId="40" name="牧草果实" num="50" store="仓库" per="个" use="供牧场喂养动物，也可直接卖掉获得金币" url="module/ui/icons/award3.png"/>
<freegift id="9" bid="9" visible="1" type="10" cId="5" name="青铜飞刀" num="1" store="我的物品包-道具" per="把" use="减少野生动物体力8点，并获得更多奖励" url="module/ui/icons/weapon1.png"/>
<freegift id="10" bid="10" visible="1" type="1" cId="457" name="火鹤花" num="1" ground="普通" store="我的物品包" per="个" use="农场普通土地上种植" url="module/ui/icons/award4.png"/>
<freegift id="11" bid="11" visible="1" type="1" cId="456" name="红露珍" num="1" ground="红" store="我的物品包" per="个" use="农场红土地上种植" url="module/ui/icons/award1.png"/>
<freegift id="12" bid="12" visible="1" type="1" cId="192" name="黄番红花" num="1" ground="普通" store="我的物品包" per="个" use="农场普通土地上种植" url="module/ui/icons/award5.png"/>
<freegift id="13" bid="13" visible="1" type="1" cId="260" name="桉树" num="1" ground="红" store="我的物品包" per="个" use="农场红土地上种植" url="module/ui/icons/award2.png"/>
	</freegifts>

<!--新年送福配置-->
<sendblessopens>
	<sendblessopen id="1" type="1" cId="710" name="富贵有鱼" num="1" cType="种子" store="物品包" url=""/>
	<sendblessopen id="2" type="1" cId="709" name="福袋树" num="1" cType="种子" store="物品包" url=""/>
	<sendblessopen id="3" type="1" cId="702" name="扶桑神树" num="1" cType="种子" store="物品包" url=""/>
	<sendblessopen id="4" type="" cId="" name="蚣蝮" num="1" cType="幼仔" store="牧场物品包" url="module/mc/farm/animal/a1568.jpg"/>
	<sendblessopen id="5" type="1" cId="267" name="地涌金莲" num="1" cType="种子" store="物品包" url=""/>
	<sendblessopen id="6" type="1" cId="708" name="聚宝盆" num="1" cType="种子" store="物品包" url=""/>
	<sendblessopen id="7" type="" cId="" name="应龙" num="1" cType="幼仔" store="牧场物品包" url="module/mc/farm/animal/a1571.jpg"/>
	<sendblessopen id="8" cId="1" type="6" name="金币" num="88888" cType="金币" store="金币已加到金币账户里" url=""/>
	<sendblessopen id="9" cId="1" type="6" name="金币" num="88" cType="金币" store="金币已加到金币账户里" url=""/>
	<sendblessopen id="10" type="" cId="" name="瑞雪迎春" num="1" cType="农场套装" store="右上角“装饰”",timestring="，使用有效期：31天！" url="module/ui/icons/2012cjie/B1.jpg"/>
	<sendblessopen id="11" type="4" cId="20" name="龙章凤彩犬" num="1" cType="狗" store="右上角“装饰”-“狗”" url=""/>
	<sendblessopen id="12" type="yearsyellow" name="年费黄钻" num="1" cType="vip" url="module/ui/icons/2012cjie/H12.jpg"/>
	<sendblessopen id="13" type="monthyellow" name="1个月黄钻" num="1" cType="vip" url="module/ui/icons/2012cjie/H1.jpg"/>
	<sendblessopen id="14" type="thmonthyellow" name="3个月黄钻" num="1" cType="vip" url="module/ui/icons/2012cjie/H3.jpg"/>
	<sendblessopen id="15" name=" 农场春节专属QQ秀（男女各一套）" url=""/>
</sendblessopens>

	<!-- http请求地址及其他杂项环境配置 -->
	<environment>
	</environment>
	
	<!-- 次要异步下载资源 -->
	<secondList type="json">
		<![CDATA[
		{
		"secondList" : [{"id":"NPC", "src":"module/ui/npc/lovesday/lovesday_v_0.swf"},

{"id":"NpcExchangePanelBg", "src":"module/ui/npc/lovesday/lovesdayWin_v_0.swf"},	 
            
{"id":"feedsNPC", "src":"module/NPC/feedsNPC/feedsNPC_v_0.swf"},
{"id":"pengyouHead", "src":"module/NPC/feedsNPC/pengyouHead.jpg"},

{"id":"Fertilizer", "src":"module/ui/tools/Fertilizer_v_6.swf", "className":"Fertilizer"},

{"id":"vipReturnButton", "src":"module/ui/buttons/vipReturnButton.png"},

{"id":"CardsGameWindow", "src":"module/ui/cardgames/CardsGameWindow_v_0.swf"},

{"id":"TanabataWindow", "src":"module/ui/cardgames/Tanabatas_v_0.swf"},

{"id":"VipSeedTabBg", "src":"module/ui/vipseeds/VipSeedTabBg.jpg"},

{"id":"VipSeedBuyBg", "src":"module/ui/vipseeds/VipSeedBuyBg.jpg"},

{"id":"VipSeedButtonVip", "src":"module/ui/vipseeds/VipSeedButtonVip.png"},

{"id":"VipSeedButtonNonVip", "src":"module/ui/vipseeds/VipSeedButtonNonVip.png"},

{"id":"water", "src":"module/ui/water_v_5.swf"},

{"id":"landExtPic", "src":"module/ui/landExtPic.jpg"},

{"id":"fishNPC", "src":"module/ui/fishNPC1.swf"},
{"id":"recall", "src":"module/ui/recall_v_3.swf"},
{"id":"freegift", "src":"module/ui/freegift_v_5.swf"},{"id":"plane", "src":"module/ui/plane_v_0.swf"},
{"id":"RedStocks", "src":"module/ui/stocks_v_2.swf"},
{"id":"SellYouji", "src":"module/ui/sellyouji_v_1.swf"},{"id":"Firecracker2012", "src":"module/ui/farmfirecraker2012_v_0.swf"}
]
		}
		]]>
         </secondList>

	<!-- 每个plugin可能会有多个不同类型的挂载点amount，对于type=0来说，挂载背景上，需要进行深度排序，layer控制是背景还是前景，zIndex控制在同一layer中的先后顺序-->
	<plugins type="json">
		<![CDATA[
		{"plugins":[
	{"id":1, "proxy":"plugins.QShowPluginProxy", "url":"module/ui/qqshow/qsplugin_20101119.swf","amount":[{"type":0,"zIndex":0,"layer":0,"x":680,"y":415},{"type":3,"tab":"农场形象"}]}
		]}
		]]>
	</plugins>

        <!-- ===== PLEASE === DO === NOT === EDIT === CONTENT  ===  BELOW === MANUALLY ===== -->

	<!-- 素材列表-->
	<assets>
        
	</assets>

	<!-- 农场牌子 -->
	<boards type="json">
		<![CDATA[
		{"boards": [
			
		]}
		]]>
	</boards>

	<!-- 农场作物 -->
	<crops type="json">
		<![CDATA[
		{"crops": [
			
		]}
		]]>
	</crops>

	<!-- 农场背景装饰 -->
	<item_info type="json">
		<![CDATA[
		{"item_info": [
			
		]}
		]]>
	</item_info>

	<!-- 可编辑提示语 -->
	<dynamicTips>
		<shopLinkTip value="交流论坛" url="http://www.phpye.com"/>
		<shopVipTip value="尊贵的年费黄钻用户，快免费购买普通化肥浇作物吧！"/>
		<shopUnvipTip value="年费黄钻点燃夏日激情，商店普通化肥免费买！"/>
<shopVipDIYTip value="稀有装扮限时购买，截至购买时间：2012年02月13日15点"/>
<!-- 		<shopLinkTip value="可编辑的商店广告位" url="http://game.paipai.com/promote/2011/index_30.shtml?PTAG=32122.1.1"/>
		<shopVipTip value="可编辑的商店黄钻VIP广告" />
		<shopUnvipTip value="可编辑的商店普通用户提示" />
-->
	</dynamicTips>

</data>
XML;

?>