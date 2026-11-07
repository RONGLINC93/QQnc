<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('login');
0
|| checktplrefresh('./template/default/mobile/member/login.htm', './template/default/mobile/common/header.htm', 1794045032, '1', './data/template/1_1_mobile_member_login.tpl.php', './template/default', 'mobile/member/login')
|| checktplrefresh('./template/default/mobile/member/login.htm', './template/default/mobile/common/seccheck.htm', 1794045032, '1', './data/template/1_1_mobile_member_login.tpl.php', './template/default', 'mobile/member/login')
|| checktplrefresh('./template/default/mobile/member/login.htm', './template/default/mobile/common/footer.htm', 1794045032, '1', './data/template/1_1_mobile_member_login.tpl.php', './template/default', 'mobile/member/login')
;?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8"/>
<meta http-equiv="Cache-control" content="<?php if($_G['setting']['mobile']['mobilecachetime'] > 0) { ?><?php echo $_G['setting']['mobile']['mobilecachetime'];?><?php } else { ?>no-cache<?php } ?>" />
<meta name="viewport" content="width=device-width; initial-scale=1.3;  minimum-scale=1.0; maximum-scale=2.0"/>
<meta name="MobileOptimized" content="240"/>
<meta name="Iphone-content" content="320"/>
<meta name="format-detection" content="telephone=no" />
<meta name="keywords" content="<?php if(!empty($metakeywords)) { echo htmlspecialchars($metakeywords); } ?>" />
<meta name="description" content="<?php if(!empty($metadescription)) { echo htmlspecialchars($metadescription); ?> <?php } ?>,<?php echo $_G['setting']['bbname'];?>" />
<title><?php if(!empty($navtitle)) { ?><?php echo $navtitle;?> - <?php } if(empty($nobbname)) { ?> <?php echo $_G['setting']['bbname'];?> - <?php } ?> 手机版 - Powered by Discuz!</title>
<style type="text/css">
* { margin: 0; padding: 0; word-wrap: break-word; }
ul li, .xl li { list-style: none; }
.xw0 { font-weight: 400; }
.xw1 { font-weight: 700; }
.xg1, .xg1 a { color: #999 !important; }
.xg1 .xi2 { color: #999 !important; }
.xg2 { color: #666; }
.xi1, .onerror { color: #F60; }
.xi2, .xi2 a, .xi3 a { color: #369 ; }
.mtn { margin-top: 5px !important; }
.mbn { margin-bottom: 5px !important; }
.mtm { margin-top: 10px !important; }
.ptn { padding-top: 5px !important; }
.pbn { padding-bottom: 5px !important; }
.pd2 { padding: 2px !important; }
.pd5 { padding: 5px !important; }
.nopd { padding: 0px !important;}
.bt{ border-top: 1px #F2F2F2 solid !important; }
.bbn{ border-bottom: 1px #efefef solid !important; }
.ban { border: 1px #F2F2F2 solid !important;}
.xs0 { font-size : 8pt;}

a, .lkcss{ color: #004299; text-decoration: none;}
a img{ text-decoration: none; border: 0px none;}
EM { font-style: normal; }
img{border: 0;}

.odd { background: #FFF; }
.even { background: #fbfbff;}

.txt, .txt_s, .px { padding: 5px 0px; border: 1px solid #C3C3C3; background: #FFF url(./static/image/mobile/input_bg.gif) repeat-x 0 0px; width: 100%; }
.txt_s { width: 30px; }


body {background: #FFF; background-image:none; line-height: 130%; font-size: 10pt; font-style: normal; font-family: Arial,Helvetica,sans-serif; }

.hd { padding: 3px; border-bottom: 3px solid #2B7ACD; }
.hd a{ color: #2B7ACD; text-decoration: none; }
.wp { padding: 2px;}

.f_c { margin-top: 5px; padding: 5px; border: 1px #C2D5E3 solid; }
.f_c p{ line-height: 24px;}
/* common border */
.box { margin-top:3px; background: #fbfbff; padding: 3px 0; line-height:18px;}
.box h2 {}
.box .on { font-weight: 700; }
.box_ex { margin-top:0px; border-top: 0px none;}
.box_ex2{ margin-top:0px; border-top:0px none; border-left: 0px none; border-right: 0px none; }

.bm .bm_h { padding: 2px; background: #2A6EB4; border-bottom:1px #02254b solid; color: #FFF; line-height: 20px; font-size: 10pt;  }
.bm .bm_h a, .bm .bm_h .lkcss { color: #FFF; text-decoration: none;}
.bm .bm_c { padding: 3px 2px; border-bottom:1px solid #F2F2F2;  }
.bm .bm_c p{ margin-bottom: 5px; }
.bm .bm_c_bg { background: #f3f3ff; }
.bm .bm_c em { color: #999;}
.bm .bm_inf { background: #FBFBFF; padding: 5px 0;}
.bm_c .bm_user {  padding: 1px 0 1px 0px; line-height: 14px;}
.warning { margin-top: 4px; padding: 3px; border: 1px #CDCDCD solid; color:#666; }
.warning a{ color: #F26C4F;}

.pg { padding: 4px 0;}
.pg strong{ padding:2px 6px; }
.pg a{ padding: 2px 6px; }
.pipe { margin: 0 1px; font-size:12px; font-weight: 300; color: #c4c4c4; }

/* footer */
.ft{ margin:2px 0 2px 2px; padding: 1px; }

.fl { margin-top: 5px; }
.tl { margin-top: 5px;}
.tl a{ text-decoration: none;}
.tl .bm .bm_c img{ vertical-align: middle;}
.moder { margin-top: 2px; padding: 2px; border: 0px none; background: #FFF;}
.flif { border: none; background: none; color: #666;}
.ttp a{ margin: 0 2px;}

/* viewthread */
.vt { margin-top: 5px;}
.vt .bm .bm_h a { display: inline; width: auto;}
.vt .bm .bm_inf{ color: #444; }
.vt .bm .bm_c { padding: 1px; border-top: 1px #e9e9ff solid; border-bottom: 1px #e9e9ff solid; background: #fbfbff; color: #666;  }
.vt .pbody { margin-top: 1px; margin-bottom: 4px;}
.vt .pbody h2{ font-weight: 300;}
.vt .pbody .mes { padding: 1px;}
.vt .bm .bm_c .attach_h { margin-top: 4px;}
.vt .bm .bm_c .attach .vm{ width: 14px; vertical-align: middle;}
.attach img { width: 16px; vertical-align: middle; }
.vt .postmessage{ padding: 3px 0;}
.inbox { padding: 3px 0;}
.viewimg { padding: 2px;}
.viewsort img { vertical-align:top; }

/* newpost */
.sort { padding: 2px; border: 1px #efefef solid; background: #FFF; }
.quote { padding: 5px; font-style: italic; }

/* profile */
.profile_bm_c { padding: 0px !important;}
.profile_table td{ padding:0 3px; border-top: 1px #efefef solid;}
.profile_table th { border-top: 2px #efefef solid;}
.jammer { font-size: 10px; color:#FFF;}
</style>
</head>
<body>
<?php if($_G['setting']['domain']['app']['mobile']) { ?><?php $nav = 'http://'.$_G['setting']['domain']['app']['mobile'];?><?php } else { ?><?php $nav = "forum.php";?><?php } ?>
<div class="hd"><a href="<?php echo $nav;?>" title="<?php if(empty($nobbname)) { ?> <?php echo $_G['setting']['bbname'];?> - <?php } ?>手机版"><?php if($_G['setting']['mobile']['mobilesimpletype'] == 1) { if(empty($nobbname)) { ?> <?php echo $_G['setting']['bbname'];?> - <?php } ?> 手机版<?php } else { ?><img src="./static/image/mobile/logo.gif" /><?php } ?></a></div>
<div class="wp">
<div class="pd2">
<?php if($_G['uid']) { ?><a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>&amp;do=profile"><?php echo $_G['member']['username'];?></a><span class="pipe">|</span><a href="home.php?mod=space&amp;do=pm" <?php if($_G['member']['newpm']) { ?>class="xi1"<?php } ?>><?php if($_G['member']['newpm']) { ?>新短消息<?php } else { ?>消息<?php } ?></a><span class="pipe">|</span><a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>&amp;do=favorite&amp;view=me&amp;type=forum">收藏</a><span class="pipe">|</span><a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>&amp;do=thread&amp;view=me">我的帖子</a><span class="pipe">|</span><a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>" title="退出">退出</a><?php } else { ?><a href="member.php?mod=logging&amp;action=login" title="登录">登录</a><?php if($_G['setting']['regstatus']) { ?><span class="pipe">|</span><a href="member.php?mod=<?php echo $_G['setting']['regname'];?>" title="<?php echo $_G['setting']['reglinkname'];?>"><?php echo $_G['setting']['reglinkname'];?></a><?php } } ?>
</div>
<?php if(!empty($_G['setting']['pluginhooks']['global_header_mobile'])) echo $_G['setting']['pluginhooks']['global_header_mobile'];?><?php $loginhash = 'L'.random(4);?><div class="box"><a href="forum.php">返回论坛</a><span class="pipe">|</span><a href="javascript:history.back();" onclick="javascript:history.back();" title="返回上一页" >返回上一页</a></div>
<div class="bm mtn">
<div class="bm_h">登录</div>
<form method="post" action="member.php?mod=logging&amp;action=login&amp;loginsubmit=yes&amp;loginhash=<?php echo $loginhash;?>&amp;mobile=yes" onsubmit="<?php if($_G['setting']['pwdsafety']) { ?>pwmd5('password3_<?php echo $loginhash;?>');<?php } ?>" >
<input type="hidden" name="formhash" id="formhash" value='<?php echo FORMHASH;?>' />
<input type="hidden" name="referer" id="referer" value="<?php if(dreferer()) { echo dreferer(); } else { ?>forum.php?mobile=yes<?php } ?>" />
<div class="bm_c">
<p>
<select name="fastloginfield" id="fastloginfield_<?php echo $loginhash;?>" >
<option value="username">用户名</option>
<option value="uid">UID</option>
<option value="email">Email</option>
</select>
<input type="text" name="username" id="username_<?php echo $loginhash;?>" class="txt" />
</p>
<p>
密码:<input type="password" name="password" id="password3_<?php echo $loginhash;?>" class="txt" value='' />
</p>
<p>
<?php if($secqaacheck || $seccodecheck) { ?><?php $sechash = 'S'.random(4);
$sectpl = !empty($sectpl) ? explode("<sec>", $sectpl) : array('<br />',': ','<br />','');
$secshow = !isset($secshow) ? 1 : $secshow;
$sectabindex = !isset($sectabindex) ? 1 : $sectabindex;
    $ran = random(5, 1);?><?php if($secqaacheck) { ?><?php include libfile('function/seccode');
    $message = '';
$question = make_secqaa($sechash);
$secqaa = lang('core', 'secqaa_tips').$question;?><?php } ?><?php
$seccheckhtml = <<<EOF

<input name="sechash" type="hidden" value="{$sechash}" />

EOF;
 if($sectpl) { if($secqaacheck) { 
$seccheckhtml .= <<<EOF

<p>
        
        <strong>验证问答</strong>
        <br />
        <span class="xg2">{$secqaa}</span>
        <input name="secanswer" id="secqaaverify_{$sechash}" type="text" class="txt" />
        </p>

EOF;
 } if($seccodecheck) { 
$seccheckhtml .= <<<EOF

    	<p>
<strong>验证码</strong><br />
        <img src="misc.php?mod=seccode&amp;update={$ran}&amp;idhash={$sechash}&amp;mobile=yes" />
        <br />
        <input name="seccodeverify" id="seccodeverify_{$sechash}" type="text" autocomplete="off" class="txt" />
        </p>

EOF;
 } } 
$seccheckhtml .= <<<EOF


EOF;
?><?php unset($secshow);?><?php if(empty($secreturn)) { ?><?php echo $seccheckhtml;?><?php } } ?>
</p>
<p>
<input type="submit" name="submit" id="submit" value="登录" />
<input type="reset" value="重填" />
</p>
<p>
<select name="questionid" id="questionid_<?php echo $loginhash;?>" >
<option value="0">安全提问(未设置请忽略)</option>
<option value="1">母亲的名字</option>
<option value="2">爷爷的名字</option>
<option value="3">父亲出生的城市</option>
<option value="4">你其中一位老师的名字</option>
<option value="5">你个人计算机的型号</option>
<option value="6">你最喜欢的餐馆名称</option>
<option value="7">驾驶执照最后四位数字</option>
</select>
<input type="text" name="answer" id="answer_<?php echo $loginhash;?>" class="txt" />
</p>
<p>
<label><input type="checkbox" name="cookietime" id="cookietime_<?php echo $loginhash;?>" class="pc" value="2592000" checked="checked" />自动登录</label>
</p>
    </div>
</form>
</div>

<?php if($_G['setting']['pwdsafety']) { ?>
<script type="text/javascript">
<!--
var pwmd5log = new Array();
function pwmd5() {
numargs = pwmd5.arguments.length;
for(var i = 0; i < numargs; i++) {
if(!pwmd5log[pwmd5.arguments[i]] || $(pwmd5.arguments[i]).value.length != 32) {
pwmd5log[pwmd5.arguments[i]] = $(pwmd5.arguments[i]).value = hex_md5($(pwmd5.arguments[i]).value);
}
}
}
//-->
</script>
<?php } ?><?php updatesession();?></div>
<?php if(!empty($_G['setting']['pluginhooks']['global_footer_mobile'])) echo $_G['setting']['pluginhooks']['global_footer_mobile'];?>
<div class="ft">
<p><a href="<?php echo $_G['setting']['siteurl'];?>" target="_blank"><?php echo $_G['setting']['sitename'];?></a></p>
<p>Powered by <strong><a href="http://www.discuz.net" target="_blank">Discuz!</a></strong> <em><?php echo $_G['setting']['version'];?></em></p>
    <p><a href="<?php echo $nav;?>">首页</a><span class="pipe">|</span><?php if($_G['setting']['mobile']['mobilesimpletype']) { ?><a href="<?php echo $_G['setting']['mobile']['simpletypeurl']['0'];?>" class="xw0" title="!mobiletype!">标准版</a><?php } else { ?>标准版<?php } ?><span class="pipe">|</span><?php if(!$_G['setting']['mobile']['mobilesimpletype']) { ?><a href="<?php echo $_G['setting']['mobile']['simpletypeurl']['1'];?>" class="xw0" title="精简版">精简版</a><?php } else { ?>精简版<?php } ?><span class="pipe">|</span><a href="<?php echo $_G['setting']['mobile']['nomobileurl'];?>" class="xw0" title="电脑版">电脑版</a></p>
</div>
</body>
</html><?php updatesession();?><?php if(defined('IN_MOBILE')) { ?><?php output();?><?php } else { ?><?php output_preview();?><?php } ?>
