<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('forumdisplay');
0
|| checktplrefresh('./template/default/forum/forumdisplay.htm', './template/default/common/header.htm', 1333961721, 'diy', './data/template/1_diy_forum_forumdisplay.tpl.php', './template/default', 'forum/forumdisplay')
|| checktplrefresh('./template/default/forum/forumdisplay.htm', './template/default/forum/forumdisplay_leftside.htm', 1333961721, 'diy', './data/template/1_diy_forum_forumdisplay.tpl.php', './template/default', 'forum/forumdisplay')
|| checktplrefresh('./template/default/forum/forumdisplay.htm', './template/default/forum/recommend.htm', 1333961721, 'diy', './data/template/1_diy_forum_forumdisplay.tpl.php', './template/default', 'forum/forumdisplay')
|| checktplrefresh('./template/default/forum/forumdisplay.htm', './template/default/forum/forumdisplay_list.htm', 1333961721, 'diy', './data/template/1_diy_forum_forumdisplay.tpl.php', './template/default', 'forum/forumdisplay')
|| checktplrefresh('./template/default/forum/forumdisplay.htm', './template/default/common/footer.htm', 1333961721, 'diy', './data/template/1_diy_forum_forumdisplay.tpl.php', './template/default', 'forum/forumdisplay')
|| checktplrefresh('./template/default/forum/forumdisplay.htm', './template/default/common/header_common.htm', 1333961721, 'diy', './data/template/1_diy_forum_forumdisplay.tpl.php', './template/default', 'forum/forumdisplay')
|| checktplrefresh('./template/default/forum/forumdisplay.htm', './template/default/common/pubsearchform.htm', 1333961721, 'diy', './data/template/1_diy_forum_forumdisplay.tpl.php', './template/default', 'forum/forumdisplay')
|| checktplrefresh('./template/default/forum/forumdisplay.htm', './template/default/forum/search_sortoption.htm', 1333961721, 'diy', './data/template/1_diy_forum_forumdisplay.tpl.php', './template/default', 'forum/forumdisplay')
;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET;?>" />
<title><?php if(!empty($navtitle)) { ?><?php echo $navtitle;?> - <?php } if(empty($nobbname)) { ?> <?php echo $_G['setting']['bbname'];?> - <?php } ?> Powered by Discuz!</title>
<?php echo $_G['setting']['seohead'];?>

<meta name="keywords" content="<?php if(!empty($metakeywords)) { echo htmlspecialchars($metakeywords); } ?>" />
<meta name="description" content="<?php if(!empty($metadescription)) { echo htmlspecialchars($metadescription); ?> <?php } if(empty($nobbname)) { ?>,<?php echo $_G['setting']['bbname'];?><?php } ?>" />
<meta name="generator" content="Discuz! <?php echo $_G['setting']['version'];?>" />
<meta name="author" content="Discuz! Team and Comsenz UI Team" />
<meta name="copyright" content="2001-2011 Comsenz Inc." />
<meta name="MSSmartTagsPreventParsing" content="True" />
<meta http-equiv="MSThemeCompatible" content="Yes" />
<?php if($_G['config']['output']['iecompatible']) { ?><meta http-equiv="X-UA-Compatible" content="IE=EmulateIE<?php echo $_G['config']['output']['iecompatible'];?>" /><?php } ?>
<base href="<?php echo $_G['siteurl'];?>" /><link rel="stylesheet" type="text/css" href="data/cache/style_<?php echo STYLEID;?>_common.css?<?php echo VERHASH;?>" /><link rel="stylesheet" type="text/css" href="data/cache/style_<?php echo STYLEID;?>_forum_forumdisplay.css?<?php echo VERHASH;?>" /><?php if($_G['uid'] && isset($_G['cookie']['extstyle']) && strpos($_G['cookie']['extstyle'], TPLDIR) !== false) { ?><link rel="stylesheet" id="css_extstyle" type="text/css" href="<?php echo $_G['cookie']['extstyle'];?>/style.css" /><?php } elseif($_G['style']['defaultextstyle']) { ?><link rel="stylesheet" id="css_extstyle" type="text/css" href="<?php echo $_G['style']['defaultextstyle'];?>/style.css" /><?php } ?><script type="text/javascript">var STYLEID = '<?php echo STYLEID;?>', STATICURL = '<?php echo STATICURL;?>', IMGDIR = '<?php echo IMGDIR;?>', VERHASH = '<?php echo VERHASH;?>', charset = '<?php echo CHARSET;?>', discuz_uid = '<?php echo $_G['uid'];?>', cookiepre = '<?php echo $_G['config']['cookie']['cookiepre'];?>', cookiedomain = '<?php echo $_G['config']['cookie']['cookiedomain'];?>', cookiepath = '<?php echo $_G['config']['cookie']['cookiepath'];?>', showusercard = '<?php echo $_G['setting']['showusercard'];?>', attackevasive = '<?php echo $_G['config']['security']['attackevasive'];?>', disallowfloat = '<?php echo $_G['setting']['disallowfloat'];?>', creditnotice = '<?php if($_G['setting']['creditnotice']) { ?><?php echo $_G['setting']['creditnames'];?><?php } ?>', defaultstyle = '<?php echo $_G['style']['defaultextstyle'];?>', REPORTURL = '<?php echo $_G['currenturl_encode'];?>', SITEURL = '<?php echo $_G['siteurl'];?>', JSPATH = '<?php echo $_G['setting']['jspath'];?>';</script>
<script src="<?php echo $_G['setting']['jspath'];?>common.js?<?php echo VERHASH;?>" type="text/javascript"></script><meta name="application-name" content="<?php echo $_G['setting']['bbname'];?>" />
<meta name="msapplication-tooltip" content="<?php echo $_G['setting']['bbname'];?>" />
<?php if($_G['setting']['portalstatus']) { ?><meta name="msapplication-task" content="name=<?php echo $_G['setting']['navs']['1']['navname'];?>;action-uri=<?php echo !empty($_G['setting']['domain']['app']['portal']) ? 'http://'.$_G['setting']['domain']['app']['portal'] : $_G['siteurl'].'portal.php'; ?>;icon-uri=<?php echo $_G['siteurl'];?><?php echo IMGDIR;?>/portal.ico" /><?php } ?>
<meta name="msapplication-task" content="name=<?php echo $_G['setting']['navs']['2']['navname'];?>;action-uri=<?php echo !empty($_G['setting']['domain']['app']['forum']) ? 'http://'.$_G['setting']['domain']['app']['forum'] : $_G['siteurl'].'forum.php'; ?>;icon-uri=<?php echo $_G['siteurl'];?><?php echo IMGDIR;?>/bbs.ico" />
<?php if($_G['setting']['groupstatus']) { ?><meta name="msapplication-task" content="name=<?php echo $_G['setting']['navs']['3']['navname'];?>;action-uri=<?php echo !empty($_G['setting']['domain']['app']['group']) ? 'http://'.$_G['setting']['domain']['app']['group'] : $_G['siteurl'].'group.php'; ?>;icon-uri=<?php echo $_G['siteurl'];?><?php echo IMGDIR;?>/group.ico" /><?php } if($_G['setting']['homestatus']) { ?><meta name="msapplication-task" content="name=<?php echo $_G['setting']['navs']['4']['navname'];?>;action-uri=<?php echo !empty($_G['setting']['domain']['app']['home']) ? 'http://'.$_G['setting']['domain']['app']['home'] : $_G['siteurl'].'home.php'; ?>;icon-uri=<?php echo $_G['siteurl'];?><?php echo IMGDIR;?>/home.ico" /><?php } if($_G['basescript'] == 'forum' && $_G['setting']['archiver']) { ?>
<link rel="archives" title="<?php echo $_G['setting']['bbname'];?>" href="<?php echo $_G['siteurl'];?>archiver/" />
<?php } if(defined('CURMODULE') && ($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') && (CURMODULE == 'index' || CURMODULE == 'forumdisplay' || CURMODULE == 'group')) { ?><?php echo $rsshead;?><?php } if($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') { if($_G['basescript'] == 'forum' && empty($_G['disabledwidthauto']) && $_G['forum_widthauto']) { ?>
<link rel="stylesheet" id="css_widthauto" type="text/css" href="data/cache/style_<?php echo STYLEID;?>_widthauto.css?<?php echo VERHASH;?>" />
<script type="text/javascript">HTMLNODE.className += ' widthauto'</script>
<?php } ?>
<script src="<?php echo $_G['setting']['jspath'];?>forum.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } elseif($_G['basescript'] == 'home' || $_G['basescript'] == 'userapp') { ?>
<script src="<?php echo $_G['setting']['jspath'];?>home.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } elseif($_G['basescript'] == 'portal') { ?>
<script src="<?php echo $_G['setting']['jspath'];?>portal.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } if($_G['basescript'] != 'portal' && $_GET['diy'] == 'yes' && (CURMODULE == 'topic' || $_G['group']['allowdiy']) && !empty($_G['style']['tplfile'])) { ?>
<script src="<?php echo $_G['setting']['jspath'];?>portal.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } if($_GET['diy'] == 'yes' && (CURMODULE == 'topic' || $_G['group']['allowdiy']) && !empty($_G['style']['tplfile'])) { ?>
<link rel="stylesheet" type="text/css" id="diy_common" href="data/cache/style_<?php echo STYLEID;?>_css_diy.css?<?php echo VERHASH;?>" />
<?php } ?>
</head>

<body id="nv_<?php echo $_G['basescript'];?>" class="pg_<?php echo CURMODULE;?>" onkeydown="if(event.keyCode==27) return false;">
<div id="append_parent"></div><div id="ajaxwaitid"></div>
<?php if($_GET['diy'] == 'yes' && (CURMODULE == 'topic' || $_G['group']['allowdiy']) && !empty($_G['style']['tplfile'])) { include template('common/header_diy'); } if(CURMODULE == 'topic' && $topic && empty($topic['useheader']) && !empty($_G['style']['tplfile']) && ($_G['group']['allowdiy'] || $_G['group']['allowaddtopic'] && $topic['uid'] == $_G['uid'] || $_G['group']['allowmanagetopic'])) { ?>
<a id="diy-tg" href="javascript:openDiy();" title="打开 DIY 面板" class="y"><img src="<?php echo STATICURL;?>image/diy/panel-toggle.png" alt="DIY" /></a>
<?php } if(empty($topic) || $topic['useheader']) { if($_G['setting']['mobile']['allowmobile'] && (!$_G['setting']['cachethreadon'] || $_G['uid']) && ($_GET['diy'] != 'yes' || !$_GET['inajax']) && ($_G['mobile'] != '' && $_G['cookie']['mobile'] == '' && $_GET['mobile'] != 'no')) { ?>
<div class="xi1 bm bm_c">
    请选择 <a href="<?php echo $_G['siteurl'];?>forum.php?mobile=yes">进入手机版</a> <span class="xg1">|</span> <a href="<?php echo $_G['setting']['mobile']['nomobileurl'];?>">继续访问电脑版</a>
</div>
<?php } ?>

<div id="toptb" class="cl">
<div class="wp">
<div class="z"><?php if(is_array($_G['setting']['topnavs']['0'])) foreach($_G['setting']['topnavs']['0'] as $nav) { if($nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))) { ?><?php echo $nav['code'];?><?php } } ?>
<?php if(!empty($_G['setting']['pluginhooks']['global_cpnav_extra1'])) echo $_G['setting']['pluginhooks']['global_cpnav_extra1'];?>
</div>
<div class="y">
<?php if(!empty($_G['setting']['pluginhooks']['global_cpnav_extra2'])) echo $_G['setting']['pluginhooks']['global_cpnav_extra2'];?><?php if(is_array($_G['setting']['topnavs']['1'])) foreach($_G['setting']['topnavs']['1'] as $nav) { if($nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))) { ?><?php echo $nav['code'];?><?php } } if($_G['basescript'] == 'forum' && empty($_G['disabledwidthauto']) && $_G['setting']['switchwidthauto']) { ?>
<a href="javascript:;" onclick="widthauto(this)"><?php if(!$_G['forum_widthauto']) { ?>切换到宽版<?php } else { ?>切换到窄版<?php } ?></a>
<?php } if($_G['uid'] && !empty($_G['style']['extstyle'])) { ?><a id="sslct" href="javascript:;" onmouseover="delayShow(this, function() {showMenu({'ctrlid':'sslct','pos':'34!'})});">切换风格</a><?php } if(CURMODULE != 'topic' && $_G['group']['allowdiy'] && !empty($_G['style']['tplfile']) || CURMODULE == 'topic' && !empty($_G['style']['tplfile']) && ($_G['group']['allowaddtopic'] && $topic['uid'] == $_G['uid'] || $_G['group']['allowmanagetopic'])) { ?>
<a id="diy-tg" href="javascript:openDiy();" title="打开 DIY 面板" class="xi1 xw1">DIY</a>
<?php } ?>
</div>
</div>
</div>

<?php if(!IS_ROBOT) { if($_G['uid'] && !empty($_G['style']['extstyle'])) { ?>
<div id="sslct_menu" class="cl p_pop" style="display: none;">
<?php if(!$_G['style']['defaultextstyle']) { ?><span class="sslct_btn" onclick="extstyle('')" title="默认"><i></i></span><?php } if(is_array($_G['style']['extstyle'])) foreach($_G['style']['extstyle'] as $extstyle) { ?><span class="sslct_btn" onclick="extstyle('<?php echo $extstyle['0'];?>')" title="<?php echo $extstyle['1'];?>"><i style='background:<?php echo $extstyle['2'];?>'></i></span>
<?php } ?>
</div>
<?php } ?>

<div id="qmenu_menu" class="p_pop <?php if(!$_G['uid']) { ?>blk<?php } ?>" style="display: none;">
<?php if($_G['uid']) { ?>
<ul><?php if(is_array($_G['setting']['mynavs'])) foreach($_G['setting']['mynavs'] as $nav) { if($nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))) { ?>
<li><?php echo $nav['code'];?></li>
<?php } } ?>
</ul>
<?php } else { ?>
<div class="ptm pbw hm">
请 <a href="javascript:;" class="xi2" onclick="lsSubmit()"><strong>登录</strong></a> 后使用快捷导航<br />没有帐号？<a href="member.php?mod=<?php echo $_G['setting']['regname'];?>" class="xi2 xw1"><?php echo $_G['setting']['reglinkname'];?></a>
</div>
<?php } ?>
</div>
<?php } ?><?php echo adshow("headerbanner/wp a_h");?><div id="hd">
<div class="wp">
<div class="hdc cl"><?php $mnid = getcurrentnav();?><h2><?php if(!isset($_G['setting']['navlogos'][$mnid])) { ?><a href="./" title="<?php echo $_G['setting']['bbname'];?>"><?php echo $_G['style']['boardlogo'];?></a><?php } else { ?><?php echo $_G['setting']['navlogos'][$mnid];?><?php } ?></h2>

<?php if($_G['uid']) { ?>
<div id="um">
<div class="avt y"><a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>"><?php echo avatar($_G[uid],small);?></a></div>
<p>
<strong class="vwmy<?php if($_G['setting']['connect']['allow'] && $_G['member']['conisbind']) { ?> qq<?php } ?>"><a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>" target="_blank" title="访问我的空间"><?php echo $_G['member']['username'];?></a></strong>
<?php if($_G['group']['allowinvisible']) { ?>
<span id="loginstatus">
<a id="loginstatusid" href="member.php?mod=switchstatus" title="切换在线状态" onclick="ajaxget(this.href, 'loginstatus');return false;" class="xi2"></a>
</span>
<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra1'])) echo $_G['setting']['pluginhooks']['global_usernav_extra1'];?>
<span class="pipe">|</span><a href="home.php?mod=spacecp">设置</a>
<span class="pipe">|</span><a href="home.php?mod=space&amp;do=pm" id="pm_ntc"<?php if($_G['member']['newpm']) { ?> class="new"<?php } ?>>消息</a>
<span class="pipe">|</span><a href="home.php?mod=space&amp;do=notice" id="myprompt"<?php if($_G['member']['newprompt']) { ?> class="new"<?php } ?>>提醒<?php if($_G['member']['newprompt']) { ?>(<?php echo $_G['member']['newprompt'];?>)<?php } ?></a><span id="myprompt_check"></span>
<?php if($_G['setting']['taskon'] && !empty($_G['cookie']['taskdoing_'.$_G['uid']])) { ?><span class="pipe">|</span><a href="home.php?mod=task&amp;item=doing" id="task_ntc" class="new">进行中的任务</a><?php } if(($_G['group']['allowmanagearticle'] || $_G['group']['allowpostarticle'] || $_G['group']['allowdiy'] || getstatus($_G['member']['allowadmincp'], 4) || getstatus($_G['member']['allowadmincp'], 6) || getstatus($_G['member']['allowadmincp'], 2) || getstatus($_G['member']['allowadmincp'], 3))) { ?>
<span class="pipe">|</span><a href="portal.php?mod=portalcp"><?php if($_G['setting']['portalstatus'] ) { ?>门户管理<?php } else { ?>模块管理<?php } ?></a>
<?php } if($_G['uid'] && $_G['group']['radminid'] > 1) { ?>
<span class="pipe">|</span><a href="forum.php?mod=modcp&amp;fid=<?php echo $_G['fid'];?>" target="_blank"><?php echo $_G['setting']['navs']['2']['navname'];?>管理</a>
<?php } if($_G['uid'] && getstatus($_G['member']['allowadmincp'], 1)) { ?>
<span class="pipe">|</span><a href="admin.php" target="_blank">管理中心</a>
<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra2'])) echo $_G['setting']['pluginhooks']['global_usernav_extra2'];?>
<span class="pipe">|</span><a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>">退出</a>
</p>
<p>
<?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra3'])) echo $_G['setting']['pluginhooks']['global_usernav_extra3'];?><?php $upgradecredit = $_G['uid'] && $_G['group']['grouptype'] == 'member' && $_G['group']['groupcreditslower'] != 999999999 ? $_G['group']['groupcreditslower'] - $_G['member']['credits'] : false;?><a href="home.php?mod=spacecp&amp;ac=credit&amp;showcredit=1" id="extcreditmenu"<?php if(!$_G['setting']['bbclosed']) { ?> onmouseover="delayShow(this, showCreditmenu);" class="showmenu"<?php } ?>>积分: <?php echo $_G['member']['credits'];?></a>
<span class="pipe">|</span>用户组: <a href="home.php?mod=spacecp&amp;ac=usergroup"<?php if($upgradecredit !== 'false') { ?> id="g_upmine" class="xi2" onmouseover="delayShow(this, showUpgradeinfo)"<?php } ?>><?php echo $_G['group']['grouptitle'];?></a>
</p>
</div>
<?php } elseif(!empty($_G['cookie']['loginuser'])) { ?>
<p>
<strong><a id="loginuser" class="noborder"><?php echo htmlspecialchars($_G['cookie']['loginuser']); ?></a></strong>
<span class="pipe">|</span><a href="member.php?mod=logging&amp;action=login" onclick="showWindow('login', this.href)">激活</a>
<span class="pipe">|</span><a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>">退出</a>
</p>
<?php } else { include template('member/login_simple'); } ?>
</div>

<div id="nv">
<a href="javascript:;" id="qmenu" onmouseover="showMenu({'ctrlid':'qmenu','pos':'34!','ctrlclass':'a','duration':2});">快捷导航</a>
<ul><?php if(is_array($_G['setting']['navs'])) foreach($_G['setting']['navs'] as $nav) { if($nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))) { ?><li <?php if($mnid == $nav['navid']) { ?>class="a" <?php } ?><?php echo $nav['nav'];?>></li><?php } } ?>
</ul>
</div>
<?php if(!empty($_G['setting']['plugins']['jsmenu'])) { ?>
<ul class="p_pop h_pop" id="plugin_menu" style="display: none"><?php if(is_array($_G['setting']['plugins']['jsmenu'])) foreach($_G['setting']['plugins']['jsmenu'] as $module) { ?> <?php if(!$module['adminid'] || ($module['adminid'] && $_G['adminid'] > 0 && $module['adminid'] >= $_G['adminid'])) { ?>
 <li><?php echo $module['url'];?></li>
 <?php } } ?>
</ul>
<?php } ?>
<?php echo $_G['setting']['menunavs'];?>
<div id="mu" class="cl">
<?php if($_G['setting']['subnavs']) { if(is_array($_G['setting']['subnavs'])) foreach($_G['setting']['subnavs'] as $navid => $subnav) { if($_G['setting']['navsubhover'] || $mnid == $navid) { ?>
<ul class="cl <?php if($mnid == $navid) { ?>current<?php } ?>" id="snav_<?php echo $navid;?>" style="display:<?php if($mnid != $navid) { ?>none<?php } ?>">
<?php echo $subnav;?>
</ul>
<?php } } } ?>
</div><?php echo adshow("subnavbanner/a_mu");?><?php if($_G['setting']['search']) { ?><?php $slist = array();?><?php if($_G['fid'] && $_G['forum']['status'] != 3 && $mod != 'group') { ?><?php
$slist[forumfid] = <<<EOF
<li><a href="javascript:;" rel="curforum" class="curtype">本版</a></li>
EOF;
?><?php } if($_G['setting']['portalstatus'] && $_G['setting']['search']['portal']['status'] && ($_G['group']['allowsearch'] & 1 || $_G['adminid'] == 1)) { ?><?php
$slist[portal] = <<<EOF
<li><a href="javascript:;" rel="article"
EOF;
 if(CURSCRIPT == 'portal') { 
$slist[portal] .= <<<EOF
 class="curtype"
EOF;
 } 
$slist[portal] .= <<<EOF
>文章</a></li>
EOF;
?><?php } if($_G['setting']['search']['forum']['status'] && ($_G['group']['allowsearch'] & 2 || $_G['adminid'] == 1)) { ?><?php
$slist[forum] = <<<EOF
<li><a href="javascript:;" rel="forum"
EOF;
 if((CURSCRIPT == 'forum' && !$_G['fid']) || (CURSCRIPT == 'home' && in_array($do, array('thread', 'activity', 'poll', 'reward', 'debate', 'trade')))) { 
$slist[forum] .= <<<EOF
 class="curtype"
EOF;
 } 
$slist[forum] .= <<<EOF
>帖子</a></li>
EOF;
?><?php } if($_G['setting']['homestatus'] && $_G['setting']['search']['blog']['status'] && ($_G['group']['allowsearch'] & 4 || $_G['adminid'] == 1)) { ?><?php
$slist[blog] = <<<EOF
<li><a href="javascript:;" rel="blog"
EOF;
 if(CURSCRIPT == 'home' && $do == 'blog') { 
$slist[blog] .= <<<EOF
 class="curtype"
EOF;
 } 
$slist[blog] .= <<<EOF
>日志</a></li>
EOF;
?><?php } if($_G['setting']['homestatus'] && $_G['setting']['search']['album']['status'] && ($_G['group']['allowsearch'] & 8 || $_G['adminid'] == 1)) { ?><?php
$slist[album] = <<<EOF
<li><a href="javascript:;" rel="album"
EOF;
 if(CURSCRIPT == 'home' && $do == 'album') { 
$slist[album] .= <<<EOF
 class="curtype"
EOF;
 } 
$slist[album] .= <<<EOF
>相册</a></li>
EOF;
?><?php } if($_G['setting']['groupstatus'] && $_G['setting']['search']['group']['status'] && ($_G['group']['allowsearch'] & 16 || $_G['adminid'] == 1)) { ?><?php
$slist[group] = <<<EOF
<li><a href="javascript:;" rel="group"
EOF;
 if(CURSCRIPT == 'group' || $_G['basescript']=='group') { 
$slist[group] .= <<<EOF
 class="curtype"
EOF;
 } 
$slist[group] .= <<<EOF
>{$_G['setting']['navs']['3']['navname']}</a></li>
EOF;
?><?php } ?><?php
$slist[user] = <<<EOF
<li><a href="javascript:;" rel="user"
EOF;
 if((CURSCRIPT == 'home' && !in_array($do, array('blog', 'album', 'thread', 'activity', 'poll', 'reward', 'debate', 'trade'))) || $mod == 'ranklist') { 
$slist[user] .= <<<EOF
 class="curtype"
EOF;
 } 
$slist[user] .= <<<EOF
>用户</a></li>
EOF;
?>
<?php } if($_G['setting']['search'] && $slist) { ?>
<div id="scbar" class="cl"><?php $searchparams = makeSearchSignUrl();?><form id="scbar_form" method="<?php if($_G['fid'] && !empty($searchparams['0'])) { ?>get<?php } else { ?>post<?php } ?>" autocomplete="off" onsubmit="searchFocus($('scbar_txt'))" action="<?php if($_G['fid'] && !empty($searchparams['0'])) { ?><?php echo $searchparams['0'];?><?php } else { ?>search.php?searchsubmit=yes<?php } ?>" target="_blank">
<input type="hidden" name="mod" id="scbar_mod" value="search" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="srchtype" value="title" />
<input type="hidden" name="srhfid" value="<?php echo $_G['fid'];?>" id="dzsearchforumid" />
<input type="hidden" name="srhlocality" value="<?php echo $_G['basescript'];?>::<?php echo CURMODULE;?>" />
<?php if(!empty($searchparams['1'])) { if(is_array($searchparams['1'])) foreach($searchparams['1'] as $key => $value) { ?><?php $srchotquery .= '&' . $key . '=' . $value;?><input type="hidden" name="<?php echo $key;?>" value="<?php echo $value;?>" />
<?php } ?>
<input type="hidden" name="source" value="discuz" />
<input type="hidden" name="fId" value=""  id="cloudsearchforumId" />
<input type="hidden" name="q" id="cloudsearchquery" value="" />
<?php } ?>
<table cellspacing="0" cellpadding="0">
<tr>
<td class="scbar_icon_td"></td>
<td class="scbar_txt_td"><input type="text" name="srchtxt" id="scbar_txt" value="请输入搜索内容" autocomplete="off" /></td>
<td class="scbar_type_td"><a href="javascript:;" id="scbar_type" class="showmenu xg1 xs2" onclick="showMenu(this.id)" hidefocus="true">搜索</a></td>
<td class="scbar_btn_td"><button type="submit" name="searchsubmit" id="scbar_btn" class="pn pnc" value="true"><strong class="xi2 xs2">搜索</strong></button></td>
<td class="scbar_hot_td">
<div id="scbar_hot">
<?php if($_G['setting']['srchhotkeywords']) { ?>
<strong class="xw1">热搜: </strong><?php if(is_array($_G['setting']['srchhotkeywords'])) foreach($_G['setting']['srchhotkeywords'] as $val) { if($val=trim($val)) { ?><?php $valenc=rawurlencode($val);?><?php
$__FORMHASH = FORMHASH;$srchhotkeywords[] = <<<EOF


EOF;
 if(!empty($searchparams['0'])) { 
$srchhotkeywords[] .= <<<EOF

<a href="{$searchparams['0']}?q={$valenc}&source=hotsearch{$srchotquery}" target="_blank" class="xi2">{$val}</a>

EOF;
 } else { 
$srchhotkeywords[] .= <<<EOF

<a href="search.php?mod=forum&amp;srchtxt={$valenc}&amp;formhash={$__FORMHASH}&amp;searchsubmit=true&amp;source=hotsearch" target="_blank" class="xi2">{$val}</a>

EOF;
 } 
$srchhotkeywords[] .= <<<EOF


EOF;
?>
<?php } } echo implode('', $srchhotkeywords);; } ?>
</div>
</td>
</tr>
</table>
</form>
</div>
<ul id="scbar_type_menu" class="p_pop" style="display: none;"><?php echo implode('', $slist);; ?></ul>
<script type="text/javascript">
initSearchmenu('scbar', '<?php echo $searchparams['0'];?>');
</script>
<?php } ?>
</div>
</div>

<?php if(!empty($_G['setting']['pluginhooks']['global_header'])) echo $_G['setting']['pluginhooks']['global_header'];?>
<?php } ?>

<div id="wp" class="wp"><?php if($_G['forum']['ismoderator']) { ?>
<script src="<?php echo $_G['setting']['jspath'];?>forum_moderate.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } ?>
<style id="diy_style" type="text/css"></style>
<!--[diy=diynavtop]--><div id="diynavtop" class="area"></div><!--[/diy]-->
<div id="pt" class="bm cl">
<div class="z">
<a href="./" class="nvhm" title="首页"><?php echo $_G['setting']['bbname'];?></a> <?php echo $navigation;?>
</div>
</div><?php echo adshow("text/wp a_t");?><div class="wp">
<!--[diy=diy1]--><div id="diy1" class="area"></div><!--[/diy]-->
</div>
<div class="boardnav">
<div id="ct" class="wp cl<?php if($_G['forum']['allowside']) { ?> ct2<?php } ?>"<?php if($leftside) { ?> style="margin-left:<?php echo $_G['leftsidewidth_mwidth'];?>px"<?php } ?>>
<?php if($leftside) { ?>
<div id="sd_bdl" class="bdl" onmouseover="showMenu({'ctrlid':this.id, 'pos':'dz'});" style="width:<?php echo $_G['setting']['leftsidewidth'];?>px;margin-left:-<?php echo $_G['leftsidewidth_mwidth'];?>px">
<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_leftside_top'])) echo $_G['setting']['pluginhooks']['forumdisplay_leftside_top'];?>
<!--[diy=diyleftsidetop]--><div id="diyleftsidetop" class="area"></div><!--[/diy]-->

<div class="tbn" id="forumleftside"><?php if($leftside['favorites']) { ?>
<h2 class="mbn"><a href="home.php?mod=space&amp;do=favorite&amp;type=forum">收藏的版块</a></h2>
<dl id="lf_fav" class="bdl_fav mbm"><?php if(is_array($leftside['favorites'])) foreach($leftside['favorites'] as $favfid => $fdata) { ?><dd>
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $favfid;?>"><?php echo $fdata['0'];?></a>
</dd>
<?php } ?>
</dl>
<?php } else { ?>
<h2 class="bdl_h">版块导航</h2>
<?php } if(is_array($leftside['forums'])) foreach($leftside['forums'] as $upfid => $gdata) { ?><dl class="<?php if($fgroupid == $upfid) { ?>a<?php } ?>" id="lf_<?php echo $upfid;?>">
<dt><a href="javascript:;" hidefocus="true" onclick="leftside('lf_<?php echo $upfid;?>')" title="<?php echo $gdata['name'];?>"><?php echo $gdata['name'];?></a></dt><?php if(is_array($gdata['sub'])) foreach($gdata['sub'] as $subfid => $name) { ?><dd<?php if($_G['fid'] == $subfid || $_G['forum']['fup'] == $subfid) { ?> class="bdl_a"<?php } ?>>
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $subfid;?>" title="<?php echo $name;?>"><?php echo $name;?></a>
</dd>
<?php } ?>
</dl>
<?php } ?></div>

<!--[diy=diyleftsidebottom]--><div id="diyleftsidebottom" class="area"></div><!--[/diy]-->
<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_leftside_bottom'])) echo $_G['setting']['pluginhooks']['forumdisplay_leftside_bottom'];?>
</div>
<?php } ?>

<div class="mn">
<div class="bm bml pbn">
<?php if($_G['forum']['banner'] && !$subforumonly) { ?><img src="<?php echo $_G['forum']['banner'];?>" alt="<?php echo $_G['forum']['name'];?>" /><?php } ?>
<div class="bm_h cl">
<?php if($_G['page'] == 1 && $_G['forum']['rules']) { ?><span class="o"><img id="forum_rules_<?php echo $_G['fid'];?>_img" src="<?php echo IMGDIR;?>/collapsed_<?php echo $collapse['forum_rulesimg'];?>.gif" title="收起/展开" alt="收起/展开" onclick="toggle_collapse('forum_rules_<?php echo $_G['fid'];?>')" /></span><?php } ?>
<span class="y">
<a href="home.php?mod=spacecp&amp;ac=favorite&amp;type=forum&amp;id=<?php echo $_G['fid'];?>&amp;handlekey=favoriteforum" id="a_favorite" class="fa_fav" onclick="showWindow(this.id, this.href, 'get', 0);">收藏本版</a>
<?php if(rssforumperm($_G['forum']) && $_G['setting']['rssstatus'] && !$_G['gp_archiveid'] && !$subforumonly) { ?><span class="pipe">|</span><a href="forum.php?mod=rss&amp;fid=<?php echo $_G['fid'];?>&amp;auth=<?php echo $rssauth;?>" class="fa_rss" target="_blank" title="RSS">订阅</a><?php } if(!empty($forumarchive)) { ?>
<span class="pipe">|</span><a id="forumarchive" href="javascript:;" class="fa_achv" onmouseover="showMenu(this.id)"><?php if($_G['gp_archiveid']) { ?><?php echo $forumarchive[$_G['gp_archiveid']]['displayname'];?><?php } else { ?>存档<?php } ?></a>
<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_forumaction'])) echo $_G['setting']['pluginhooks']['forumdisplay_forumaction'];?>

<?php if($_G['forum']['ismoderator']) { if($_G['forum']['recyclebin']) { ?>
<span class="pipe">|</span><a href="<?php if($_G['adminid'] == 1) { ?>admin.php?mod=forum&action=recyclebin&frames=yes<?php } elseif($_G['forum']['ismoderator']) { ?>forum.php?mod=modcp&action=recyclebin&fid=<?php echo $_G['fid'];?><?php } ?>" class="fa_bin" target="_blank">回收站</a>
<?php } if($_G['forum']['ismoderator'] && !$_G['gp_archiveid']) { ?>
<span class="pipe">|</span><strong>
<?php if($_G['forum']['status'] != 3) { ?>
<a href="forum.php?mod=modcp&amp;fid=<?php echo $_G['fid'];?>">管理面板</a>
<?php } else { ?>
<a href="forum.php?mod=group&amp;action=manage&amp;fid=<?php echo $_G['fid'];?>">管理面板</a>
<?php } ?>
</strong>
<?php } if($_G['forum']['modworks']) { if($modusernum) { ?><span class="pipe">|</span><a href="forum.php?mod=modcp&amp;action=moderate&amp;op=members&amp;fid=<?php echo $_G['fid'];?>" target="_blank">待审核用户(<strong class="xi1"><?php echo $modusernum;?></strong>)</a><?php } } ?>
<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_modlink'])) echo $_G['setting']['pluginhooks']['forumdisplay_modlink'];?>
<?php } ?>
</span>
<h1 class="xs2">
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>"><?php echo $_G['forum']['name'];?></a>
<?php if(!$subforumonly) { ?><span class="xs1 xw0 i">今日: <strong class="xi1"><?php echo $_G['forum']['todayposts'];?></strong><span class="pipe">|</span>主题: <strong class="xi1"><?php echo $_G['forum']['threads'];?></strong></span><?php } ?>
</h1>
</div>
<?php if((!empty($_G['forum']['domain']) && !empty($_G['setting']['domain']['root']['forum'])) || $moderatedby || ($_G['page'] == 1 && $_G['forum']['rules'])) { ?>
<div class="bm_c cl pbn">
<?php if(!empty($_G['forum']['domain']) && !empty($_G['setting']['domain']['root']['forum'])) { ?>
<div class="pbn">本版域名: <a href="http://<?php echo $_G['forum']['domain'];?>.<?php echo $_G['setting']['domain']['root']['forum'];?>" id="group_link">http://<?php echo $_G['forum']['domain'];?>.<?php echo $_G['setting']['domain']['root']['forum'];?></a></div>
<?php } if($moderatedby) { ?><div>版主: <span class="xi2"><?php echo $moderatedby;?></span></div><?php } if($_G['page'] == 1 && $_G['forum']['rules']) { ?>
<div id="forum_rules_<?php echo $_G['fid'];?>" style="<?php echo $collapse['forum_rules'];?>;">
<div class="ptn xg2"><?php echo $_G['forum']['rules'];?></div>
</div>
<?php } ?>
</div>
<?php } if(!empty($forumarchive)) { ?>
<div id="forumarchive_menu" class="p_pop" style="display:none">
<ul>
<li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>">全部主题</a></li><?php if(is_array($forumarchive)) foreach($forumarchive as $id => $info) { ?><li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;archiveid=<?php echo $id;?>"><?php echo $info['displayname'];?> (<?php echo $info['threads'];?>)</a></li>
<?php } ?>
</ul>
</div>
<?php } ?>
</div>

<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_top'])) echo $_G['setting']['pluginhooks']['forumdisplay_top'];?>

<?php if($subexists && $_G['page'] == 1) { include template('forum/forumdisplay_subforum'); } ?>

<div class="drag">
<!--[diy=diy4]--><div id="diy4" class="area"></div><!--[/diy]-->
</div>

<?php if(!empty($_G['forum']['recommendlist'])) { ?>
<div class="bm bmw">
<div class="bm_h cl">
<h2>推荐主题</h2>
</div>
<div class="bm_c cl"><?php if($_G['forum']['recommendlist']['images'] && $_G['forum']['modrecommend']['imagenum']) { ?>
<div class="cl" style="width: <?php echo $_G['forum']['modrecommend']['imagewidth'];?>px; margin: 0 auto; float:left;">
<script type="text/javascript">
var slideSpeed = 5000;
var slideImgsize = [<?php echo $_G['forum']['modrecommend']['imagewidth'];?>,<?php echo $_G['forum']['modrecommend']['imageheight'];?>];
var slideBorderColor = '<?php echo $_G['style']['specialborder'];?>';
var slideBgColor = '<?php echo $_G['style']['commonbg'];?>';
var slideImgs = new Array();
var slideImgLinks = new Array();
var slideImgTexts = new Array();
var slideSwitchColor = '<?php echo $_G['style']['tabletext'];?>';
var slideSwitchbgColor = '<?php echo $_G['style']['commonbg'];?>';
var slideSwitchHiColor = '<?php echo $_G['style']['specialborder'];?>';<?php if(is_array($_G['forum']['recommendlist']['images'])) foreach($_G['forum']['recommendlist']['images'] as $k => $imginfo) { ?>slideImgs[<?php echo $k+1; ?>] = '<?php echo $imginfo['filename'];?>';
slideImgLinks[<?php echo $k+1; ?>] = 'forum.php?mod=viewthread&tid=<?php echo $imginfo['tid'];?>';
slideImgTexts[<?php echo $k+1; ?>] = '<?php echo $imginfo['subject'];?>';
<?php } ?>
</script>
<script src="<?php echo $_G['setting']['jspath'];?>forum_slide.js?<?php echo VERHASH;?>" type="text/javascript"></script>
</div>
<?php } ?>
<div class="cl"<?php if($_G['forum']['recommendlist']['images'] && $_G['forum']['modrecommend']['imagenum']) { ?> style="margin-left: <?php echo $_G['forum']['modrecommend']['imagewidth'];?>px; padding-left: 20px;"<?php } ?>><?php unset($_G['forum']['recommendlist']['images']);?><ul class="xl<?php if(!$_G['forum']['allowside']) { ?> xl2<?php } ?> cl"><?php if(is_array($_G['forum']['recommendlist'])) foreach($_G['forum']['recommendlist'] as $rtid => $recommend) { ?><li>
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $rtid;?>" <?php echo $recommend['subjectstyles'];?> target="_blank"><?php echo $recommend['subject'];?></a>
</li>
<?php } ?>
</ul>
</div></div>
</div>
<?php } ?>

<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_middle'])) echo $_G['setting']['pluginhooks']['forumdisplay_middle'];?>

<?php if(!$subforumonly) { if($recommendgroups && !$_G['forum']['allowside']) { ?>
<div class="bm bmw fl">
<div class="bm_h cl">
<span class="o"><img id="recommendgroups_<?php echo $_G['forum']['fid'];?>_img" src="<?php echo IMGDIR;?>/<?php echo $collapseimg['recommendgroups'];?>" title="收起/展开" alt="收起/展开" onclick="toggle_collapse('recommendgroups_<?php echo $_G['forum']['fid'];?>');" /></span>
<h2>推荐<?php echo $_G['setting']['navs']['3']['navname'];?></h2>
</div>
<div class="bm_c" id="recommendgroups_<?php echo $_G['forum']['fid'];?>" style="<?php echo $collapse['recommendgroups'];?>">
<table cellspacing="0" cellpadding="0" class="fl_tb"><?php if(is_array($recommendgroups)) foreach($recommendgroups as $key => $group) { ?><tr <?php if($key != 0) { ?>class="fl_row"<?php } ?>>
<td class="fl_icn">
<a href="forum.php?mod=group&amp;fid=<?php echo $group['fid'];?>" title="<?php echo $group['name'];?>" target="_blank"><img src="<?php echo $group['icon'];?>" alt="<?php echo $group['name'];?>" width="32" /></a>
</td>
<td>
<h2><a href="forum.php?mod=group&amp;fid=<?php echo $group['fid'];?>" target="_blank"><?php echo $group['name'];?></a><span class="xg1 xw0"> (<?php echo $group['membernum'];?> 人)</span></h2>
<p><?php echo cutstr($group['description'], 100); ?></p>
</td>
<td class="fl_i">
<span class="xi2"><?php echo $group['threads'];?> 主题</span>
</td>
<td class="fl_by">
<div>
<?php if(is_array($group['lastpost'])) { ?>
<a href="forum.php?mod=redirect&amp;tid=<?php echo $group['lastpost']['tid'];?>&amp;goto=lastpost#lastpost" class="xi2"><?php echo cutstr($group['lastpost']['subject'], 30); ?></a> <cite><?php echo $group['lastpost']['dateline'];?> <?php if($group['lastpost']['author']) { ?><a href="home.php?mod=space&amp;username=<?php echo $group['lastpost']['encode_author'];?>"><?php echo $group['lastpost']['author'];?></a><?php } else { ?><?php echo $_G['setting']['anonymoustext'];?><?php } ?></cite>
<?php } else { ?>
从未
<?php } ?>
</div>
</td>
</tr>
<?php } ?>
</table>
</div>
</div>
<?php } if($threadmodcount) { ?><div class="bm"><div class="ntc_l hm xi2"><strong><a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>&amp;do=thread&amp;view=me&amp;type=thread&amp;from=&amp;filter=aduit">您有 <?php echo $threadmodcount;?> 个主题正等待审核中，点击查看</a></strong></div></div><?php } ?>

<div id="pgt" class="bm bw0 pgs cl">
<?php echo $multipage;?>
<span class="pgb y" <?php if($_G['setting']['visitedforums']) { ?>id="visitedforums" onmouseover="$('visitedforums').id = 'visitedforumstmp';this.id = 'visitedforums';showMenu({'ctrlid':this.id,'pos':'34'})"<?php } ?> ><a href="forum.php">返&nbsp;回</a></span>
<?php if(!$_G['gp_archiveid']) { ?><a href="javascript:;" id="newspecial" onmouseover="$('newspecial').id = 'newspecialtmp';this.id = 'newspecial';showMenu({'ctrlid':this.id})"<?php if(!$_G['forum']['allowspecialonly'] && empty($_G['forum']['picstyle']) && !$_G['forum']['threadsorts']['required']) { ?> onclick="showWindow('newthread', 'forum.php?mod=post&action=newthread&fid=<?php echo $_G['fid'];?>')"<?php } else { ?> onclick="location.href='forum.php?mod=post&action=newthread&fid=<?php echo $_G['fid'];?>';return false;"<?php } ?> title="发新帖"><img src="<?php echo IMGDIR;?>/pn_post.png" alt="发新帖" /></a><?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_postbutton_top'])) echo $_G['setting']['pluginhooks']['forumdisplay_postbutton_top'];?>
</div><?php if(($_G['forum']['threadtypes'] && $_G['forum']['threadtypes']['listable']) || $_G['forum']['threadsorts']) { ?>
<ul id="thread_types" class="ttp bm cl">
<li id="ttp_all" <?php if(!$_G['gp_typeid'] && !$_G['gp_sortid']) { ?>class="xw1 a"<?php } ?>><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?><?php if($_G['forum']['threadsorts']['defaultshow']) { ?>&amp;filter=sortall&amp;sortall=1<?php } if($_G['gp_archiveid']) { ?>&amp;archiveid=<?php echo $_G['gp_archiveid'];?><?php } ?>">全部</a></li>
<?php if($_G['forum']['threadtypes']) { if(is_array($_G['forum']['threadtypes']['types'])) foreach($_G['forum']['threadtypes']['types'] as $id => $name) { if($_G['gp_typeid'] == $id) { ?>
<li class="xw1 a"><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?><?php if($_G['gp_sortid']) { ?>&amp;filter=sortid&amp;sortid=<?php echo $_G['gp_sortid'];?><?php } if($_G['gp_archiveid']) { ?>&amp;archiveid=<?php echo $_G['gp_archiveid'];?><?php } ?>"><?php if($_G['forum']['threadtypes']['icons'][$id] && $_G['forum']['threadtypes']['prefix'] == 2) { ?><img class="vm" src="<?php echo $_G['forum']['threadtypes']['icons'][$id];?>" alt="" /> <?php } ?><?php echo $name;?></a></li>
<?php } else { ?>
<li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=typeid&amp;typeid=<?php echo $id;?><?php echo $forumdisplayadd['typeid'];?><?php if($_G['gp_archiveid']) { ?>&amp;archiveid=<?php echo $_G['gp_archiveid'];?><?php } ?>"><?php if($_G['forum']['threadtypes']['icons'][$id] && $_G['forum']['threadtypes']['prefix'] == 2) { ?><img class="vm" src="<?php echo $_G['forum']['threadtypes']['icons'][$id];?>" alt="" /> <?php } ?><?php echo $name;?></a></li>
<?php } } } if($_G['forum']['threadsorts']) { if($_G['forum']['threadtypes']) { ?><li><span class="pipe">|</span></li><?php } if(is_array($_G['forum']['threadsorts']['types'])) foreach($_G['forum']['threadsorts']['types'] as $id => $name) { if($_G['gp_sortid'] == $id) { ?>
<li class="xw1 a"><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?><?php if($_G['gp_typeid']) { ?>&amp;filter=typeid&amp;typeid=<?php echo $_G['gp_typeid'];?><?php } if($_G['gp_archiveid']) { ?>&amp;archiveid=<?php echo $_G['gp_archiveid'];?><?php } ?>"><?php echo $name;?></a></li>
<?php } else { ?>
<li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=sortid&amp;sortid=<?php echo $id;?><?php echo $forumdisplayadd['sortid'];?><?php if($_G['gp_archiveid']) { ?>&amp;archiveid=<?php echo $_G['gp_archiveid'];?><?php } ?>"><?php echo $name;?></a></li>
<?php } } } ?>
<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_filter_extra'])) echo $_G['setting']['pluginhooks']['forumdisplay_filter_extra'];?>
</ul>
<script type="text/javascript">showTypes('thread_types');</script>
<?php } ?>

<div id="threadlist" class="tl bm bmw"<?php if($_G['uid']) { ?> style="position: relative;"<?php } ?>>
<?php if($quicksearchlist && !$_G['gp_archiveid']) { ?><script type="text/javascript">
var forum_optionlist = <?php if($forum_optionlist) { ?>'<?php echo $forum_optionlist;?>'<?php } else { ?>''<?php } ?>;
</script>
<script src="<?php echo $_G['setting']['jspath'];?>threadsort.js?<?php echo VERHASH;?>" type="text/javascript"></script><?php if(is_array($quicksearchlist)) foreach($quicksearchlist as $optionid => $option) { ?><?php $formsearch = '';?>        <?php if(getstatus($option['search'], 1)) { ?>
        <?php
$__VERHASH = VERHASH;$formsearch = <<<EOF

            <span class="mtm z">
                <strong>{$option['title']}: </strong>
                
EOF;
 if(in_array($option['type'], array('radio', 'checkbox', 'select', 'range'))) { 
$formsearch .= <<<EOF

                    <span id="select_{$option['identifier']}">
                    
EOF;
 if($option['type'] == 'select') { 
$formsearch .= <<<EOF

                        
EOF;
 if($_G['gp_searchoption'][$optionid]['value']) { 
$formsearch .= <<<EOF

                            <script type="text/javascript">
                                changeselectthreadsort('{$_G['gp_searchoption'][$optionid]['value']}', {$optionid}, 'search');
                            </script>
                        
EOF;
 } else { 
$formsearch .= <<<EOF

                            <select name="searchoption[{$optionid}][value]" id="{$option['identifier']}" onchange="changeselectthreadsort(this.value, '{$optionid}', 'search');" class="ps vm">
                                <option value="0">请选择</option>
                            
EOF;
 if(is_array($option['choices'])) foreach($option['choices'] as $id => $value) { 
$formsearch .= <<<EOF
                                
EOF;
 if(!$value['foptionid']) { 
$formsearch .= <<<EOF

                                <option value="{$id}">{$value['content']} 
EOF;
 if($value['level'] != 1) { 
$formsearch .= <<<EOF
&raquo;
EOF;
 } 
$formsearch .= <<<EOF
</option>
                                
EOF;
 } 
$formsearch .= <<<EOF

                            
EOF;
 } 
$formsearch .= <<<EOF

                            </select>
<input type="hidden" name="searchoption[{$optionid}][type]" value="{$option['type']}">
                        
EOF;
 } 
$formsearch .= <<<EOF

                    
EOF;
 } elseif($option['type'] != 'checkbox') { 
$formsearch .= <<<EOF

                        <select name="searchoption[{$optionid}][value]" id="{$option['identifier']}" class="ps vm">
                            <option value="0">请选择</option>
                        
EOF;
 if(is_array($option['choices'])) foreach($option['choices'] as $id => $value) { 
$formsearch .= <<<EOF
                            <option value="{$id}" 
EOF;
 if($_G['gp_searchoption'][$optionid]['value'] == $id) { 
$formsearch .= <<<EOF
selected="selected"
EOF;
 } 
$formsearch .= <<<EOF
>{$value}</option>
                        
EOF;
 } 
$formsearch .= <<<EOF

                        </select>
                        <input type="hidden" name="searchoption[{$optionid}][type]" value="{$option['type']}">
                    
EOF;
 } else { 
$formsearch .= <<<EOF

                        
EOF;
 if(is_array($option['choices'])) foreach($option['choices'] as $id => $value) { 
$formsearch .= <<<EOF
                            <label><input type="checkbox" class="pc" name="searchoption[{$optionid}][value][{$id}]" value="{$id}" 
EOF;
 if(is_array($_G['gp_searchoption'][$optionid]) && $_G['gp_searchoption'][$optionid]['value'][$id]) { 
$formsearch .= <<<EOF
checked="checked"
EOF;
 } 
$formsearch .= <<<EOF
>{$value}</label>
                        
EOF;
 } 
$formsearch .= <<<EOF

                        <input type="hidden" name="searchoption[{$optionid}][type]" value="checkbox">
                    
EOF;
 } 
$formsearch .= <<<EOF

                    </span>
                
EOF;
 } else { 
$formsearch .= <<<EOF

                    
EOF;
 if($option['type'] == 'calendar') { 
$formsearch .= <<<EOF

                        <script src="{$_G['setting']['jspath']}calendar.js?{$__VERHASH}" type="text/javascript"></script>
                        <input type="text" name="searchoption[{$optionid}][value]" size="15" class="px vm" value="
EOF;
 if(is_array($_G['gp_searchoption'][$optionid])) { 
$formsearch .= <<<EOF
{$_G['gp_searchoption'][$optionid]['value']}
EOF;
 } 
$formsearch .= <<<EOF
" onclick="showcalendar(event, this, false)" />
                    
EOF;
 } else { 
$formsearch .= <<<EOF

                        <input type="text" name="searchoption[{$optionid}][value]" size="15" class="px vm" value="
EOF;
 if(is_array($_G['gp_searchoption'][$optionid])) { 
$formsearch .= <<<EOF
{$_G['gp_searchoption'][$optionid]['value']}
EOF;
 } 
$formsearch .= <<<EOF
" />
                    
EOF;
 } 
$formsearch .= <<<EOF

                
EOF;
 } 
$formsearch .= <<<EOF

            </span>
            
EOF;
?>
<?php } ?>
    <?php $formsearch_html .= $formsearch;?><?php $fontsearch = '';?><?php if(getstatus($option['search'], 2)) { ?>
    <?php
$fontsearch = <<<EOF

            <dt>{$option['title']}:</dt>
            <dd>
                <ul>
                    <li
EOF;
 if($_G['gp_'.$option['identifier']] == 'all') { 
$fontsearch .= <<<EOF
 class="a"
EOF;
 } 
$fontsearch .= <<<EOF
><a href="forum.php?mod=forumdisplay&amp;fid={$_G['fid']}&amp;filter=sortid&amp;sortid={$_G['gp_sortid']}&amp;searchsort=1{$filterurladd}&amp;{$option['identifier']}=all{$sorturladdarray[$option['identifier']]}" class="xi2">不限</a></li>
                    
EOF;
 if(is_array($option['choices'])) foreach($option['choices'] as $id => $value) { 
$fontsearch .= <<<EOF
                        <li
EOF;
 if($_G['gp_'.$option['identifier']] && !strcmp($id, $_G['gp_'.$option['identifier']])) { 
$fontsearch .= <<<EOF
 class="a"
EOF;
 } 
$fontsearch .= <<<EOF
><a href="forum.php?mod=forumdisplay&amp;fid={$_G['fid']}&amp;filter=sortid&amp;sortid={$_G['gp_sortid']}&amp;searchsort=1&amp;{$option['identifier']}={$id}{$sorturladdarray[$option['identifier']]}" class="xi2">
EOF;
 if($option['type'] == 'select') { 
$fontsearch .= <<<EOF
{$value['content']}
EOF;
 } else { 
$fontsearch .= <<<EOF
{$value}
EOF;
 } 
$fontsearch .= <<<EOF
</a></li>
                    
EOF;
 } 
$fontsearch .= <<<EOF

                </ul>
            </dd>
     	
EOF;
?>
     <?php } ?>
     <?php $fontsearch_html .= $fontsearch;?><?php } if($formsearch_html || $fontsearch_html) { ?>
<div class="bbs">
<?php if($formsearch_html) { ?>
        <form method="post" autocomplete="off" name="searhsort" id="searhsort" class="bm_c pns mfm <?php if($fontsearch_html) { ?>bbda<?php } ?> cl" action="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=sortid&amp;sortid=<?php echo $_G['gp_sortid'];?>">
            <input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
            <?php echo $formsearch_html;?>
            <span class="mtm z"><button type="submit" class="pn pnc vm" name="searchsortsubmit"><em>搜索</em></button></span>
        </form>
    <?php } ?>
   	<?php if($fontsearch_html) { ?>
        <dl class="bm_c ptm tsm cl">
             <?php echo $fontsearch_html;?>
        </dl>
    <?php } ?>
</div>
<?php } } ?>
<div class="th">
<table cellspacing="0" cellpadding="0">
<tr>
<th colspan="<?php if(!$_G['gp_archiveid'] && $_G['forum']['ismoderator']) { ?>3<?php } else { ?>2<?php } ?>">
<div class="tf">
<span id="atarget" <?php if(!empty($_G['cookie']['atarget'])) { ?>onclick="setatarget(0)" class="y atarget_1"<?php } else { ?>onclick="setatarget(1)" class="y"<?php } ?> title="在新窗口中打开帖子">新窗</span>
筛选:
<a id="filter_special" href="javascript:;" class="showmenu xi2" onclick="showMenu(this.id)">
<?php if($_G['gp_specialtype'] == 'poll') { ?>投票<?php } elseif($_G['gp_specialtype'] == 'trade') { ?>商品<?php } elseif($_G['gp_specialtype'] == 'reward') { ?>悬赏<?php } elseif($_G['gp_specialtype'] == 'activity') { ?>活动<?php } elseif($_G['gp_specialtype'] == 'debate') { ?>辩论<?php } else { ?>全部主题<?php } ?>
</a>
<a id="filter_dateline" href="javascript:;" class="showmenu xi2" onclick="showMenu(this.id)">
<?php if($_G['gp_dateline'] == 86400) { ?>一天<?php } elseif($_G['gp_dateline'] == 172800) { ?>两天<?php } elseif($_G['gp_dateline'] == 604800) { ?>一周<?php } elseif($_G['gp_dateline'] == 2592000) { ?>一个月<?php } elseif($_G['gp_dateline'] == 7948800) { ?>三个月<?php } else { ?>全部时间<?php } ?>
</a>
排序:
<a id="filter_orderby" href="javascript:;" class="showmenu xi2" onclick="showMenu(this.id)">
<?php if($_G['gp_orderby'] == 'dateline') { ?>发帖时间<?php } elseif($_G['gp_orderby'] == 'replies') { ?>回复/查看<?php } elseif($_G['gp_orderby'] == 'views') { ?>查看<?php } elseif($_G['gp_orderby'] == 'lastpost') { ?>最后发表<?php } elseif($_G['gp_orderby'] == 'heats') { ?>热门<?php } else { ?>默认排序<?php } ?>
</a><span class="pipe">|</span><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=digest&amp;digest=1<?php echo $forumdisplayadd['digest'];?><?php if($_G['gp_archiveid']) { ?>&amp;archiveid=<?php echo $_G['gp_archiveid'];?><?php } ?>" class="xi2">精华</a><?php if(!empty($_G['setting']['recommendthread']['status'])) { ?><span class="pipe">|</span><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=recommend&amp;orderby=recommends&amp;recommend=1<?php echo $forumdisplayadd['recommend'];?><?php if($_G['gp_archiveid']) { ?>&amp;archiveid=<?php echo $_G['gp_archiveid'];?><?php } ?>" class="xi2">推荐</a><?php } if(empty($_G['forum']['picstyle']) && $_G['gp_orderby'] == 'lastpost' && (!$_G['setting']['forumseparator'] || !$separatepos) && !$_G['gp_filter']) { ?><span class="pipe">|</span><a href="javascript:;" onclick="checkForumnew_btn('<?php echo $_G['fid'];?>')" title="查看更新" class="forumrefresh"></a><?php } ?>
</div>
</th>
<?php if(empty($_G['forum']['picstyle'])) { ?>
<td class="by">作者</td>
<td class="num">回复/查看</td>
<td class="by">最后发表</td>
<?php } else { ?>
<td class="by" colspan="3">
<a<?php if(empty($_G['cookie']['forumdefstyle'])) { ?> href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;forumdefstyle=yes" class="chked"<?php } else { ?> href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;forumdefstyle=no" class="unchk"<?php } ?> title="图片模式浏览帖子">图片模式</a>
</td>
<?php } ?>
</tr>
</table>
</div>
<div class="bm_c">
<?php if(empty($_G['forum']['picstyle']) || $_G['cookie']['forumdefstyle']) { ?>
<script type="text/javascript">var lasttime = <?php echo $_G['timestamp'];?>;</script>
<?php } ?>
<div id="forumnew" style="display:none"></div>
<form method="post" autocomplete="off" name="moderate" id="moderate" action="forum.php?mod=topicadmin&amp;action=moderate&amp;fid=<?php echo $_G['fid'];?>&amp;infloat=yes&amp;nopost=yes">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="listextra" value="<?php echo $extra;?>" />
<table summary="forum_<?php echo $_G['fid'];?>" <?php if(!$separatepos) { ?>id="forum_<?php echo $_G['fid'];?>"<?php } ?> cellspacing="0" cellpadding="0">
<?php if((!$simplestyle || !$_G['forum']['allowside'] && $page == 1) && !empty($announcement)) { ?>
<tbody>
<tr>
<td class="icn"><img src="<?php echo IMGDIR;?>/ann_icon.gif" alt="公告" /></td>
<?php if($_G['forum']['ismoderator'] && !$_G['gp_archiveid']) { ?><td class="o">&nbsp;</td><?php } ?>
<th><strong class="xst">公告: <?php if(empty($announcement['type'])) { ?><a href="forum.php?mod=announcement&amp;id=<?php echo $announcement['id'];?>#<?php echo $announcement['id'];?>" target="_blank"><?php echo $announcement['subject'];?></a><?php } else { ?><a href="<?php echo $announcement['message'];?>" target="_blank"><?php echo $announcement['subject'];?></a><?php } ?></strong></th>
<td class="by">
<cite><a href="home.php?mod=space&amp;uid=<?php echo $announcement['authorid'];?>" c="1"><?php echo $announcement['author'];?></a></cite>
<em><?php echo $announcement['starttime'];?></em>
</td>
<td class="num">&nbsp;</td>
<td class="by">&nbsp;</td>
</tr>
</tbody>
<?php } if(!$separatepos) { ?>
<tbody id="separatorline" class="emptb"><tr><td class="icn"></td><?php if(!$_G['gp_archiveid'] && $_G['forum']['ismoderator']) { ?><td class="o"></td><?php } ?><th></th><td class="by"></td><td class="num"></td><td class="by"></td></tr></tbody>
<?php } if($_G['forum_threadcount']) { if(empty($_G['forum']['picstyle']) || $_G['cookie']['forumdefstyle']) { if(is_array($_G['forum_threadlist'])) foreach($_G['forum_threadlist'] as $key => $thread) { if($_G['setting']['forumseparator'] == 1 && $separatepos == $key + 1) { ?>
<tbody id="separatorline">
<tr class="ts">
<td>&nbsp;</td>
<?php if($_G['forum']['ismoderator'] && !$_G['gp_archiveid']) { ?><td>&nbsp;</td><?php } ?>
<th><?php if(empty($_G['forum']['picstyle']) && $_G['gp_orderby'] == 'lastpost' && !$_G['gp_filter']) { ?><a href="javascript:;" onclick="checkForumnew_btn('<?php echo $_G['fid'];?>')" title="查看更新" class="forumrefresh">版块主题</a><?php } else { ?>&nbsp;<?php } ?></th><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
</tr>
</tbody>
<?php } if($separatepos <= $key + 1) { ?><?php echo adshow("threadlist");?><?php } ?>
<tbody id="<?php echo $thread['id'];?>">
<tr>
<td class="icn">
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['icontid'];?>&amp;<?php if($_G['gp_archiveid']) { ?>archiveid=<?php echo $_G['gp_archiveid'];?>&amp;<?php } ?>extra=<?php echo $extra;?>" title="<?php if($thread['displayorder'] == 1) { ?>本版置顶主题 - <?php } if($thread['displayorder'] == 2) { ?>分类置顶主题 - <?php } if($thread['displayorder'] == 3) { ?>全局置顶主题 - <?php } if($thread['displayorder'] == 4) { ?>多版置顶主题 - <?php } if($thread['folder'] == 'lock') { ?>关闭的主题 - <?php } if($thread['special'] == 1) { ?>投票 - <?php } if($thread['special'] == 2) { ?>商品 - <?php } if($thread['special'] == 3) { ?>悬赏 - <?php } if($thread['special'] == 4) { ?>活动 - <?php } if($thread['special'] == 5) { ?>辩论 - <?php } if($thread['folder'] == "new") { ?>有新回复 - <?php } ?>
新窗口打开" target="_blank">
<?php if($thread['folder'] == 'lock') { ?>
<img src="<?php echo IMGDIR;?>/folder_lock.gif" />
<?php } elseif($thread['special'] == 1) { ?>
<img src="<?php echo IMGDIR;?>/pollsmall.gif" alt="投票" />
<?php } elseif($thread['special'] == 2) { ?>
<img src="<?php echo IMGDIR;?>/tradesmall.gif" alt="商品" />
<?php } elseif($thread['special'] == 3) { ?>
<img src="<?php echo IMGDIR;?>/rewardsmall.gif" alt="悬赏" />
<?php } elseif($thread['special'] == 4) { ?>
<img src="<?php echo IMGDIR;?>/activitysmall.gif" alt="活动" />
<?php } elseif($thread['special'] == 5) { ?>
<img src="<?php echo IMGDIR;?>/debatesmall.gif" alt="辩论" />
<?php } elseif(in_array($thread['displayorder'], array(1, 2, 3, 4))) { ?>
<img src="<?php echo IMGDIR;?>/pin_<?php echo $thread['displayorder'];?>.gif" alt="<?php echo $_G['setting']['threadsticky'][3-$thread['displayorder']];?>" />
<?php } else { ?>
<img src="<?php echo IMGDIR;?>/folder_<?php echo $thread['folder'];?>.gif" />
<?php } ?>
</a>
</td>
<?php if(!$_G['gp_archiveid'] && $_G['forum']['ismoderator']) { ?>
<td class="o">
<?php if($thread['fid'] == $_G['fid']) { if($thread['displayorder'] <= 3 || $_G['adminid'] == 1) { ?>
<input onclick="tmodclick(this)" type="checkbox" name="moderate[]" value="<?php echo $thread['tid'];?>" />
<?php } else { ?>
<input type="checkbox" disabled="disabled" />
<?php } } else { ?>
<input type="checkbox" disabled="disabled" />
<?php } ?>
</td>
<?php } ?>
<th class="<?php echo $thread['folder'];?>">
<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_thread'][$key])) echo $_G['setting']['pluginhooks']['forumdisplay_thread'][$key];?>
<?php if(!$thread['forumstick'] && $thread['closed'] > 1 && ($thread['isgroup'] == 1 || $thread['fid'] != $_G['fid'])) { ?><?php $thread[tid]=$thread[closed];?><?php } ?>
<?php echo $thread['typehtml'];?> <?php echo $thread['sorthtml'];?>
<?php if($thread['moved']) { ?>
移动:<?php $thread[tid]=$thread[closed];?><?php } ?>
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;<?php if($_G['gp_archiveid']) { ?>archiveid=<?php echo $_G['gp_archiveid'];?>&amp;<?php } ?>extra=<?php echo $extra;?>"<?php echo $thread['highlight'];?><?php if($thread['isgroup'] == 1 || $thread['forumstick']) { ?> target="_blank"<?php } else { ?> onclick="atarget(this)"<?php } ?> class="xst" ><?php echo $thread['subject'];?></a>
<?php if($thread['icon'] >= 0) { ?>
<img src="<?php echo STATICURL;?>image/stamp/<?php echo $_G['cache']['stamps'][$thread['icon']]['url'];?>" alt="<?php echo $_G['cache']['stamps'][$thread['icon']]['text'];?>" align="absmiddle" />
<?php } if($stemplate && $sortid) { ?><?php echo $stemplate[$sortid][$thread['tid']];?><?php } if($thread['readperm']) { ?> - [阅读权限 <span class="xw1"><?php echo $thread['readperm'];?></span>]<?php } if($thread['price'] > 0) { if($thread['special'] == '3') { ?>
- <span class="xi1">[悬赏 <span class="xw1"><?php echo $thread['price'];?></span> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['2']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['2']]['title'];?>]</span>
<?php } else { ?>
- [售价 <span class="xw1"><?php echo $thread['price'];?></span> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['title'];?>]
<?php } } elseif($thread['special'] == '3' && $thread['price'] < 0) { ?>
- [已解决]
<?php } if($thread['attachment'] == 2) { ?>
<img src="<?php echo STATICURL;?>image/filetype/image_s.gif" alt="attach_img" title="图片附件" align="absmiddle" />
<?php } elseif($thread['attachment'] == 1) { ?>
<img src="<?php echo STATICURL;?>image/filetype/common.gif" alt="attachment" title="附件" align="absmiddle" />
<?php } if($thread['digest'] > 0 && $filter != 'digest') { ?>
<img src="<?php echo IMGDIR;?>/digest_<?php echo $thread['digest'];?>.gif" align="absmiddle" alt="digest" title="精华 <?php echo $thread['digest'];?>" />
<?php } if($thread['displayorder'] == 0) { if($thread['recommendicon'] && $filter != 'recommend') { ?>
<img src="<?php echo IMGDIR;?>/recommend_<?php echo $thread['recommendicon'];?>.gif" align="absmiddle" alt="recommend" title="评价指数 <?php echo $thread['recommends'];?>" />
<?php } if($thread['heatlevel']) { ?>
<img src="<?php echo IMGDIR;?>/hot_<?php echo $thread['heatlevel'];?>.gif" align="absmiddle" alt="heatlevel" title="<?php echo $thread['heatlevel'];?> 级热门" />
<?php } if($thread['rate'] > 0) { ?>
<img src="<?php echo IMGDIR;?>/agree.gif" align="absmiddle" alt="agree" title="帖子被加分" />
<?php } elseif($thread['rate'] < 0) { ?>
<img src="<?php echo IMGDIR;?>/disagree.gif" align="absmiddle" alt="disagree" title="帖子被减分" />
<?php } } if($thread['replycredit'] > 0) { ?>
- <span class="xi1">[回帖奖励 <strong> <?php echo $thread['replycredit'];?></strong> ]</span>
<?php } if($thread['multipage']) { ?>
<span class="tps"><?php echo $thread['multipage'];?></span>
<?php } if($thread['weeknew']) { ?>
<a href="forum.php?mod=redirect&amp;tid=<?php echo $thread['tid'];?>&amp;goto=lastpost#lastpost" class="xi1">New</a>
<?php } if(!$thread['forumstick'] && ($thread['isgroup'] == 1 || $thread['fid'] != $_G['fid'])) { if($thread['related_group'] == 0 && $thread['closed'] > 1) { ?><?php $thread[tid]=$thread[closed];?><?php } if($groupnames[$thread['tid']]) { ?>
<span class="fromg xg1"> [来自: <a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $groupnames[$thread['tid']]['fid'];?>" target="_blank" class="xg1"><?php echo $groupnames[$thread['tid']]['name'];?></a>]</span>
<?php } } ?>
</th>
<td class="by">
<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_author'][$key])) echo $_G['setting']['pluginhooks']['forumdisplay_author'][$key];?>
<cite>
<?php if($thread['authorid'] && $thread['author']) { ?>
<a href="home.php?mod=space&amp;uid=<?php echo $thread['authorid'];?>" c="1"><?php echo $thread['author'];?></a><?php if(!empty($verify[$thread['authorid']])) { ?> <?php echo $verify[$thread['authorid']];?><?php } } else { ?>
<?php echo $_G['setting']['anonymoustext'];?>
<?php } ?>
</cite>
<em><span<?php if($thread['istoday']) { ?> class="xi1"<?php } ?>><?php echo $thread['dateline'];?></span></em>
</td>
<td class="num"><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;extra=<?php echo $extra;?>" class="xi2"><?php echo $thread['replies'];?></a><em><?php if($thread['isgroup'] != 1) { ?><?php echo $thread['views'];?><?php } else { ?><?php echo $groupnames[$thread['tid']]['views'];?><?php } ?></em></td>
<td class="by">
<cite><?php if($thread['lastposter']) { ?><a href="<?php if($thread['digest'] != -2) { ?>home.php?mod=space&username=<?php echo $thread['lastposterenc'];?><?php } else { ?>forum.php?mod=viewthread&tid=<?php echo $thread['tid'];?>&page=<?php echo max(1, $thread['pages']);; } ?>" c="1"><?php echo $thread['lastposter'];?></a><?php } else { ?><?php echo $_G['setting']['anonymoustext'];?><?php } ?></cite>
<em><a href="<?php if($thread['digest'] != -2) { ?>forum.php?mod=redirect&tid=<?php echo $thread['tid'];?>&goto=lastpost<?php echo $highlight;?>#lastpost<?php } else { ?>forum.php?mod=viewthread&tid=<?php echo $thread['tid'];?>&page=<?php echo max(1, $thread['pages']);; } ?>"><?php echo $thread['lastpost'];?></a></em>
</td>
</tr>
</tbody>
<?php } ?>
</table><!-- end of table "forum_G[fid]" branch 1/3 -->
<?php } else { ?>
</table><!-- end of table "forum_G[fid]" branch 2/3 -->
<ul class="ml mlt mtw cl"><?php if(is_array($_G['forum_threadlist'])) foreach($_G['forum_threadlist'] as $key => $thread) { if(!$thread['forumstick'] && ($thread['isgroup'] == 1 || $thread['fid'] != $_G['fid'])) { if($thread['related_group'] == 0 && $thread['closed'] > 1) { ?><?php $thread[tid]=$thread[closed];?><?php } } ?>
<li style="width:<?php echo $_G['setting']['forumpicstyle']['thumbwidth'];?>px;">
<?php if(!$_G['gp_archiveid'] && $_G['forum']['ismoderator']) { ?>
<div style="position: absolute;padding:2px;background:#FFF">
<?php if($thread['fid'] == $_G['fid']) { if($thread['displayorder'] <= 3 || $_G['adminid'] == 1) { ?>
<input onclick="tmodclick(this)" type="checkbox" name="moderate[]" value="<?php echo $thread['tid'];?>" />
<?php } else { ?>
<input type="checkbox" disabled="disabled" />
<?php } } else { ?>
<input type="checkbox" disabled="disabled" />
<?php } ?>
</div>
<?php } ?>
<div class="c cl">
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;<?php if($_G['gp_archiveid']) { ?>archiveid=<?php echo $_G['gp_archiveid'];?>&amp;<?php } ?>extra=<?php echo $extra;?>" <?php if($thread['isgroup'] == 1 || $thread['forumstick']) { ?> target="_blank"<?php } else { ?> onclick="atarget(this)"<?php } ?> title="<?php echo $thread['subject'];?>" class="z">
<?php if($thread['cover']) { ?>
<img src="<?php echo $thread['coverpath'];?>" alt="<?php echo $thread['subject'];?>" width="<?php echo $_G['setting']['forumpicstyle']['thumbwidth'];?>" height="<?php echo $_G['setting']['forumpicstyle']['thumbheight'];?>" />
<?php } else { ?>
<span class="nopic" style="width:<?php echo $_G['setting']['forumpicstyle']['thumbwidth'];?>px; height:<?php echo $_G['setting']['forumpicstyle']['thumbheight'];?>px;"></span>
<?php } ?>
</a>
</div>
<h3 class="ptn" style="width: <?php echo $_G['setting']['forumpicstyle']['thumbwidth'];?>px;"><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;<?php if($_G['gp_archiveid']) { ?>archiveid=<?php echo $_G['gp_archiveid'];?>&amp;<?php } ?>extra=<?php echo $extra;?>"<?php echo $thread['highlight'];?><?php if($thread['isgroup'] == 1 || $thread['forumstick']) { ?> target="_blank"<?php } else { ?> onclick="atarget(this)"<?php } ?> title="<?php echo $thread['subject'];?>"><?php if(in_array($thread['displayorder'], array(1, 2, 3, 4))) { ?>[置顶] <?php } ?><?php echo $thread['subject'];?></a></h3>
<div class="cl">
<?php if($thread['cover']) { ?><em class="sum y xs0 xi1 xw1" title="<?php echo $thread['cover'];?> 张图片"><?php echo $thread['cover'];?></em><?php } if($thread['authorid'] && $thread['author']) { ?>
<a href="home.php?mod=space&amp;uid=<?php echo $thread['authorid'];?>"><?php echo $thread['author'];?></a><?php if(!empty($verify[$thread['authorid']])) { ?> <?php echo $verify[$thread['authorid']];?><?php } } else { ?>
<?php echo $_G['setting']['anonymoustext'];?>
<?php } ?>
</div>
<div class="cl">
<em class="y xs0"><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;extra=<?php echo $extra;?>" class="xi2" title="<?php echo $thread['replies'];?> 回复"><?php echo $thread['replies'];?></a> / <em title="<?php if($thread['isgroup'] != 1) { ?><?php echo $thread['views'];?><?php } else { ?><?php echo $groupnames[$thread['tid']]['views'];?><?php } ?> 查看"><?php if($thread['isgroup'] != 1) { ?><?php echo $thread['views'];?><?php } else { ?><?php echo $groupnames[$thread['tid']]['views'];?><?php } ?></em></em>
<em class="xs0<?php if($thread['istoday']) { ?> xi1<?php } ?>"><?php echo $thread['dateline'];?></em>
</div>
</li>
<?php } ?>
</ul>
<?php } } else { ?>
<tbody class="bw0_all"><tr><th colspan="<?php if(!$_G['gp_archiveid'] && $_G['forum']['ismoderator']) { ?>6<?php } else { ?>5<?php } ?>"><p class="emp">本版块或指定的范围内尚无主题</p></th></tr></tbody>
</table><!-- end of table "forum_G[fid]" branch 3/3 -->
<?php } if($_G['forum']['ismoderator'] && $_G['forum_threadcount']) { include template('forum/topicadmin_modlayer'); } ?>
</form>
</div>
</div>

<?php if(!IS_ROBOT) { ?>
<div id="filter_special_menu" class="p_pop" style="display:none" change="location.href='forum.php?mod=forumdisplay&fid=<?php echo $_G['fid'];?>&filter='+$('filter_special').value">
<ul>
<li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?><?php if($_G['gp_archiveid']) { ?>&amp;archiveid=<?php echo $_G['gp_archiveid'];?><?php } ?>">全部主题</a></li>
<?php if($showpoll) { ?><li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=specialtype&amp;specialtype=poll<?php echo $forumdisplayadd['specialtype'];?><?php if($_G['gp_archiveid']) { ?>&amp;archiveid=<?php echo $_G['gp_archiveid'];?><?php } ?>">投票</a></li><?php } if($showtrade) { ?><li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=specialtype&amp;specialtype=trade<?php echo $forumdisplayadd['specialtype'];?><?php if($_G['gp_archiveid']) { ?>&amp;archiveid=<?php echo $_G['gp_archiveid'];?><?php } ?>">商品</a></li><?php } if($showreward) { ?><li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=specialtype&amp;specialtype=reward<?php echo $forumdisplayadd['specialtype'];?><?php if($_G['gp_archiveid']) { ?>&amp;archiveid=<?php echo $_G['gp_archiveid'];?><?php } ?>">悬赏</a></li><?php } if($showactivity) { ?><li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=specialtype&amp;specialtype=activity<?php echo $forumdisplayadd['specialtype'];?><?php if($_G['gp_archiveid']) { ?>&amp;archiveid=<?php echo $_G['gp_archiveid'];?><?php } ?>">活动</a></li><?php } if($showdebate) { ?><li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=specialtype&amp;specialtype=debate<?php echo $forumdisplayadd['specialtype'];?><?php if($_G['gp_archiveid']) { ?>&amp;archiveid=<?php echo $_G['gp_archiveid'];?><?php } ?>">辩论</a></li><?php } ?>
</ul>
</div>
<div id="filter_dateline_menu" class="p_pop" style="display:none">
<ul>
<li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;orderby=<?php echo $_G['gp_orderby'];?>&amp;filter=dateline<?php echo $forumdisplayadd['dateline'];?><?php if($_G['gp_archiveid']) { ?>&amp;archiveid=<?php echo $_G['gp_archiveid'];?><?php } ?>">全部时间</a></li>
<li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;orderby=<?php echo $_G['gp_orderby'];?>&amp;filter=dateline&amp;dateline=86400<?php echo $forumdisplayadd['dateline'];?><?php if($_G['gp_archiveid']) { ?>&amp;archiveid=<?php echo $_G['gp_archiveid'];?><?php } ?>">一天</a></li>
<li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;orderby=<?php echo $_G['gp_orderby'];?>&amp;filter=dateline&amp;dateline=172800<?php echo $forumdisplayadd['dateline'];?><?php if($_G['gp_archiveid']) { ?>&amp;archiveid=<?php echo $_G['gp_archiveid'];?><?php } ?>">两天</a></li>
<li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;orderby=<?php echo $_G['gp_orderby'];?>&amp;filter=dateline&amp;dateline=604800<?php echo $forumdisplayadd['dateline'];?><?php if($_G['gp_archiveid']) { ?>&amp;archiveid=<?php echo $_G['gp_archiveid'];?><?php } ?>">一周</a></li>
<li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;orderby=<?php echo $_G['gp_orderby'];?>&amp;filter=dateline&amp;dateline=2592000<?php echo $forumdisplayadd['dateline'];?><?php if($_G['gp_archiveid']) { ?>&amp;archiveid=<?php echo $_G['gp_archiveid'];?><?php } ?>">一个月</a></li>
<li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;orderby=<?php echo $_G['gp_orderby'];?>&amp;filter=dateline&amp;dateline=7948800<?php echo $forumdisplayadd['dateline'];?><?php if($_G['gp_archiveid']) { ?>&amp;archiveid=<?php echo $_G['gp_archiveid'];?><?php } ?>">三个月</a></li>
</ul>
</div>
<div id="filter_orderby_menu" class="p_pop" style="display:none">
<ul>
<li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?><?php if($_G['gp_archiveid']) { ?>&amp;archiveid=<?php echo $_G['gp_archiveid'];?><?php } ?>">默认排序</a></li>
<li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=author&amp;orderby=dateline<?php echo $forumdisplayadd['author'];?><?php if($_G['gp_archiveid']) { ?>&amp;archiveid=<?php echo $_G['gp_archiveid'];?><?php } ?>">发帖时间</a></li>
<li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=reply&amp;orderby=replies<?php echo $forumdisplayadd['reply'];?><?php if($_G['gp_archiveid']) { ?>&amp;archiveid=<?php echo $_G['gp_archiveid'];?><?php } ?>">回复/查看</a></li>
<li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=reply&amp;orderby=views<?php echo $forumdisplayadd['view'];?><?php if($_G['gp_archiveid']) { ?>&amp;archiveid=<?php echo $_G['gp_archiveid'];?><?php } ?>">查看</a></li>
<li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=lastpost&amp;orderby=lastpost<?php echo $forumdisplayadd['lastpost'];?><?php if($_G['gp_archiveid']) { ?>&amp;archiveid=<?php echo $_G['gp_archiveid'];?><?php } ?>">最后发表</a></li>
<li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=heat&amp;orderby=heats<?php echo $forumdisplayadd['heat'];?><?php if($_G['gp_archiveid']) { ?>&amp;archiveid=<?php echo $_G['gp_archiveid'];?><?php } ?>">热门</a></li>
<ul>
</div>
<?php } ?>

<div class="bm bw0 pgs cl">
<?php echo $multipage;?>
<span <?php if($_G['setting']['visitedforums']) { ?>id="visitedforumstmp" onmouseover="$('visitedforums').id = 'visitedforumstmp';this.id = 'visitedforums';showMenu({'ctrlid':this.id,'pos':'21'})"<?php } ?> class="pgb y"><a href="forum.php">返&nbsp;回</a></span>
<?php if(!$_G['gp_archiveid']) { ?><a href="javascript:;" id="newspecialtmp" onmouseover="$('newspecial').id = 'newspecialtmp';this.id = 'newspecial';showMenu({'ctrlid':this.id})"<?php if(!$_G['forum']['allowspecialonly'] && empty($_G['forum']['picstyle'])) { ?> onclick="showWindow('newthread', 'forum.php?mod=post&action=newthread&fid=<?php echo $_G['fid'];?>')"<?php } else { ?> onclick="location.href='forum.php?mod=post&action=newthread&fid=<?php echo $_G['fid'];?>';return false;"<?php } ?> title="发新帖"><img src="<?php echo IMGDIR;?>/pn_post.png" alt="发新帖" /></a><?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_postbutton_bottom'])) echo $_G['setting']['pluginhooks']['forumdisplay_postbutton_bottom'];?>
</div><?php } ?>
<!--[diy=diyfastposttop]--><div id="diyfastposttop" class="area"></div><!--[/diy]-->
<?php if($fastpost && ($_G['group']['allowpost'] || !$_G['uid'])) { include template('forum/forumdisplay_fastpost'); } ?>

<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_bottom'])) echo $_G['setting']['pluginhooks']['forumdisplay_bottom'];?>
<!--[diy=diyforumdisplaybottom]--><div id="diyforumdisplaybottom" class="area"></div><!--[/diy]-->
</div>

<?php if($_G['forum']['allowside']) { ?>
<div class="sd">
<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_side_top'])) echo $_G['setting']['pluginhooks']['forumdisplay_side_top'];?>
<?php if(!$subforumonly) { ?>
<div class="bm">
<div class="bm_h">
<h2>所属分类: <?php echo cutstr($_G['cache']['forums'][$_G['forum']['fup']]['name'], 22, '')?></h2>
</div>
<div class="bm_c">
<ul class="xl xl2 cl"><?php if(is_array($_G['cache']['forums'])) foreach($_G['cache']['forums'] as $bforum) { if($bforum['fup'] == $_G['forum']['fup'] && $bforum['status']) { ?>
<li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $bforum['fid'];?>"><?php echo $bforum['name'];?></a></li>
<?php } } ?>
</ul>
</div>
</div>

<?php if($recommendgroups) { ?>
<div class="bm">
<div class="bm_h cl">
<h2>推荐<?php echo $_G['setting']['navs']['3']['navname'];?></h2>
</div>
<div class="bm_c cl">
<ul class="ml mls cl"><?php if(is_array($recommendgroups)) foreach($recommendgroups as $key => $group) { ?><li>
<a href="forum.php?mod=group&amp;fid=<?php echo $group['fid'];?>" title="<?php echo $group['name'];?>" target="_blank" class="avt"><img src="<?php echo $group['icon'];?>" alt="<?php echo $group['name'];?>"></a>
<p><a href="forum.php?mod=group&amp;fid=<?php echo $group['fid'];?>" target="_blank"><?php echo $group['name'];?></a></p>
</li>
<?php } ?>
</ul>
</div>
</div>
<?php } if(!($_G['forum']['simple'] & 1) && $_G['setting']['whosonlinestatus']) { ?>
<div class="bm">
<?php if($detailstatus) { ?>
<div class="bm_h cl">
<span class="o y"><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;page=<?php echo $page;?>&amp;showoldetails=no#online"><img src="<?php echo IMGDIR;?>/collapsed_no.gif" alt="" /></a></span>
<h2>正在浏览此版块的会员 (<?php echo $onlinenum;?>)</h2>
</div>
<div class="bm_c">
<ul class="ml mls cl"><?php if(is_array($whosonline)) foreach($whosonline as $key => $online) { ?><li>
<a href="home.php?mod=space&amp;uid=<?php echo $online['uid'];?>" class="avt"><?php echo avatar($online[uid],small);?></a>
<?php if($online['uid']) { ?>
<p><a href="home.php?mod=space&amp;uid=<?php echo $online['uid'];?>"><?php echo $online['username'];?></a></p>
<?php } else { ?>
<p><?php echo $online['username'];?></p>
<?php } ?>
<span><?php echo $online['lastactivity'];?><?php echo "\n";?></span>
</li>
<?php } ?>
</ul>
</div>
<?php } else { ?>
<div class="bm_h cl">
<span class="o y"><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;page=<?php echo $page;?>&amp;showoldetails=yes#online" class="nobdr"><img src="<?php echo IMGDIR;?>/collapsed_yes.gif" alt="" /></a></span>
<h2>正在浏览此版块的会员 (<?php echo $onlinenum;?>)</h2>
</div>
<?php } ?>
</div>
<?php } } ?>
<div class="drag">
<!--[diy=diy2]--><div id="diy2" class="area"></div><!--[/diy]-->
</div>
<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_side_bottom'])) echo $_G['setting']['pluginhooks']['forumdisplay_side_bottom'];?>
</div>
<?php } ?>
</div>
</div>
<?php if($_G['group']['allowpost'] && ($_G['group']['allowposttrade'] || $_G['group']['allowpostpoll'] || $_G['group']['allowpostreward'] || $_G['group']['allowpostactivity'] || $_G['group']['allowpostdebate'] || $_G['setting']['threadplugins'] || $_G['forum']['threadsorts'])) { ?>
<ul class="p_pop" id="newspecial_menu" style="display: none">
<?php if(!$_G['forum']['allowspecialonly']) { ?><li><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>">发表帖子</a></li><?php } if($_G['forum']['threadsorts'] && !$_G['forum']['allowspecialonly']) { if(is_array($_G['forum']['threadsorts']['types'])) foreach($_G['forum']['threadsorts']['types'] as $id => $threadsorts) { if($_G['forum']['threadsorts']['show'][$id]) { ?>
<li class="popupmenu_option"><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>&amp;extra=<?php echo $extra;?>&amp;sortid=<?php echo $id;?>"><?php echo $threadsorts;?></a></li>
<?php } } } if($_G['group']['allowpostpoll']) { ?><li class="poll"><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>&amp;special=1">发起投票</a></li><?php } if($_G['group']['allowpostreward']) { ?><li class="reward"><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>&amp;special=3">发布悬赏</a></li><?php } if($_G['group']['allowpostdebate']) { ?><li class="debate"><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>&amp;special=5">发起辩论</a></li><?php } if($_G['group']['allowpostactivity']) { ?><li class="activity"><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>&amp;special=4">发起活动</a></li><?php } if($_G['group']['allowposttrade']) { ?><li class="trade"><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>&amp;special=2">出售商品</a></li><?php } if($_G['setting']['threadplugins']) { if(is_array($_G['forum']['threadplugin'])) foreach($_G['forum']['threadplugin'] as $tpid) { if(array_key_exists($tpid, $_G['setting']['threadplugins']) && @in_array($tpid, $_G['group']['allowthreadplugin'])) { ?>
<li class="popupmenu_option"<?php if($_G['setting']['threadplugins'][$tpid]['icon']) { ?> style="background-image:url(<?php echo $_G['setting']['threadplugins'][$tpid]['icon'];?>)"<?php } ?>><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>&amp;specialextra=<?php echo $tpid;?>"><?php echo $_G['setting']['threadplugins'][$tpid]['name'];?></a></li>
<?php } } } ?>
</ul>
<?php } if($_G['setting']['visitedforums'] || $oldthreads) { ?>
<div id="visitedforums_menu" class="<?php if($oldthreads) { ?>visited_w <?php } ?>p_pop blk cl" style="display: none;">
<table cellspacing="0" cellpadding="0">
<tr>
<?php if($oldthreads) { ?>
<td id="v_threads">
<h3 class="mbn pbn bbda xg1">浏览过的帖子</h3>
<ul class="xl xl1"><?php if(is_array($oldthreads)) foreach($oldthreads as $oldtid => $oldsubject) { ?><li><a href="forum.php?mod=viewthread&amp;tid=<?php echo $oldtid;?>"><?php echo $oldsubject;?></a></li>
<?php } ?>
</ul>
</td>
<?php } if($_G['setting']['visitedforums']) { ?>
<td id="v_forums">
<h3 class="mbn pbn bbda xg1">浏览过的版块</h3>
<ul class="xl xl1">
<?php echo $_G['setting']['visitedforums'];?>
</ul>
</td>
<?php } ?>
</tr>
</table>
</div>
<?php } if($_G['setting']['threadmaxpages'] > 1 && $page && !$subforumonly) { ?>
<script type="text/javascript">document.onkeyup = function(e){keyPageScroll(e, <?php if($page > 1) { ?>1<?php } else { ?>0<?php } ?>, <?php if($page < $_G['setting']['threadmaxpages'] && $page < $_G['page_next']) { ?>1<?php } else { ?>0<?php } ?>, 'forum.php?mod=forumdisplay&fid=<?php echo $_G['fid'];?>&filter=<?php echo $filter;?>&orderby=<?php echo $_G['gp_orderby'];?><?php echo $forumdisplayadd['page'];?>&<?php echo $multipage_archive;?>', <?php echo $page;?>);}</script>
<?php } if(empty($_G['forum']['picstyle']) && $_G['gp_orderby'] == 'lastpost' && empty($_G['gp_filter']) ) { ?>
<script type="text/javascript">checkForumnew_handle = setTimeout(function () {checkForumnew(<?php echo $_G['fid'];?>, lasttime);}, checkForumtimeout);</script>
<?php } ?>

<div class="wp mtn">
<!--[diy=diy3]--><div id="diy3" class="area"></div><!--[/diy]-->
</div>	</div>
<?php if(empty($topic) || ($topic['usefooter'])) { ?><?php $focusid = getfocus_rand($_G[basescript]);?><?php if($focusid !== null) { ?><?php $focus = $_G['cache']['focus']['data'][$focusid];?><div class="focus" id="sitefocus">
<div class="bm">
<div class="bm_h cl">
<a href="javascript:;" onclick="setcookie('nofocus_<?php echo $focusid;?>', 1, <?php echo $_G['cache']['focus']['cookie'];?>*3600);$('sitefocus').style.display='none'" class="y" title="关闭">关闭</a>
<h2><?php if($_G['cache']['focus']['title']) { ?><?php echo $_G['cache']['focus']['title'];?><?php } else { ?>站长推荐<?php } ?></h2>
</div>
<div class="bm_c">
<dl class="xld cl bbda">
<dt><a href="<?php echo $focus['url'];?>" class="xi2" target="_blank"><?php echo $focus['subject'];?></a></dt>
<?php if($focus['image']) { ?>
<dd class="m"><a href="<?php echo $focus['url'];?>" target="_blank"><img src="<?php echo $focus['image'];?>" alt="<?php echo $focus['subject'];?>" /></a></dd>
<?php } ?>
<dd><?php echo $focus['summary'];?></dd>
</dl>
<p class="ptn hm"><a href="<?php echo $focus['url'];?>" class="xi2" target="_blank">查看 &raquo;</a></p>
</div>
</div>
</div>
<?php } ?><?php echo adshow("footerbanner/wp a_f/1");?><?php echo adshow("footerbanner/wp a_f/2");?><?php echo adshow("footerbanner/wp a_f/3");?><?php echo adshow("float/a_fl/1");?><?php echo adshow("float/a_fr/2");?><?php echo adshow("couplebanner/a_fl a_cb/1");?><?php echo adshow("couplebanner/a_fr a_cb/2");?><?php echo adshow("cornerbanner/a_cn");?><?php if(!empty($_G['setting']['pluginhooks']['global_footer'])) echo $_G['setting']['pluginhooks']['global_footer'];?>
<div id="ft" class="wp cl">
<div id="flk" class="y">
<p><?php if(is_array($_G['setting']['footernavs'])) foreach($_G['setting']['footernavs'] as $nav) { if($nav['available'] && ($nav['type'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1)) ||
!$nav['type'] && ($nav['id'] == 'stat' && $_G['group']['allowstatdata'] || $nav['id'] == 'report' && $_G['uid'] || $nav['id'] == 'archiver' || $nav['id'] == 'mobile'))) { if($nav['id'] == 'mobile' && $_G['setting']['mobile']['allowmobile'] != 1) { ?><?php continue;?><?php } ?><?php echo $nav['code'];?><span class="pipe">|</span><?php } } ?>
<strong><a href="<?php echo $_G['setting']['siteurl'];?>" target="_blank"><?php echo $_G['setting']['sitename'];?></a></strong>
<?php if($_G['setting']['icp']) { ?>( <a href="http://www.miitbeian.gov.cn/" target="_blank"><?php echo $_G['setting']['icp'];?></a> )<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['global_footerlink'])) echo $_G['setting']['pluginhooks']['global_footerlink'];?>
<?php if($_G['setting']['statcode']) { ?><?php echo $_G['setting']['statcode'];?><?php } ?>
</p>
<p class="xs0">
GMT<?php echo $_G['timenow']['offset'];?>, <?php echo $_G['timenow']['time'];?>
<span id="debuginfo">
<?php if(debuginfo()) { ?>, Processed in <?php echo $_G['debuginfo']['time'];?> second(s), <?php echo $_G['debuginfo']['queries'];?> queries
<?php if($_G['gzipcompress']) { ?>, Gzip On<?php } if($_G['memory']) { ?>, <?php echo ucwords($_G['memory']); ?> On<?php } ?>.
<?php } ?>
</span>
</p>
</div>
<div id="frt">
<p>Powered by <strong><a href="http://www.discuz.net" target="_blank">Discuz!</a></strong> <em><?php echo $_G['setting']['version'];?></em><?php if(!empty($_G['setting']['boardlicensed'])) { ?> <a href="http://license.comsenz.com/?pid=1&amp;host=<?php echo $_SERVER['HTTP_HOST'];?>" target="_blank">Licensed</a><?php } ?></p>
<p class="xs0">&copy; 2001-2011 <a href="http://www.comsenz.com" target="_blank">Comsenz Inc.</a></p>
</div><?php updatesession();?><?php if($_G['uid'] && $_G['group']['allowinvisible']) { ?>
<script type="text/javascript">
var invisiblestatus = '<?php if($_G['session']['invisible']) { ?>隐身<?php } else { ?>在线<?php } ?>';
var loginstatusobj = $('loginstatusid');
if(loginstatusobj != undefined && loginstatusobj != null) loginstatusobj.innerHTML = invisiblestatus;
<?php } ?>
</script>
</div>

<?php if($upgradecredit !== false) { ?>
<div id="g_upmine_menu" class="tip tip_3" style="display:none;">
<div class="tip_c">
积分 <?php echo $_G['member']['credits'];?>, 距离下一级还需 <?php echo $upgradecredit;?> 积分
</div>
<div class="tip_horn"></div>
</div>
<?php } } if(!$_G['setting']['bbclosed']) { if($_G['uid'] && !isset($_G['cookie']['checkpm'])) { ?>
<script src="home.php?mod=spacecp&ac=pm&op=checknewpm&rand=<?php echo $_G['timestamp'];?>" type="text/javascript"></script>
<?php } if(!isset($_G['cookie']['sendmail'])) { ?>
<script src="home.php?mod=misc&ac=sendmail&rand=<?php echo $_G['timestamp'];?>" type="text/javascript"></script>
<?php } } if($_GET['diy'] == 'yes') { if((CURMODULE == 'topic' || $_G['group']['allowdiy']) && (empty($do) || $do != 'index') && !empty($_G['style']['tplfile'])) { ?>
<script src="<?php echo $_G['setting']['jspath'];?>common_diy.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<script src="<?php echo $_G['setting']['jspath'];?>portal_diy.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } if($space['self'] && CURMODULE == 'space' && $do == 'index') { ?>
<script src="<?php echo $_G['setting']['jspath'];?>common_diy.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<script src="<?php echo $_G['setting']['jspath'];?>space_diy.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } } if($_G['member']['newprompt'] && (empty($_G['cookie']['promptstate_'.$_G['uid']]) || $_G['cookie']['promptstate_'.$_G['uid']] != $_G['member']['newprompt']) && $_G['gp_do'] != 'notice') { ?>
<script type="text/javascript">noticeTitle();</script>
<?php } ?><?php userappprompt();?><?php if($_G['basescript'] != 'userapp') { ?>
<span id="scrolltop" onclick="window.scrollTo('0','0')">回顶部</span>
<script type="text/javascript">_attachEvent(window, 'scroll', function(){showTopLink();});</script>
<?php } ?><?php output();?></body>
</html>
