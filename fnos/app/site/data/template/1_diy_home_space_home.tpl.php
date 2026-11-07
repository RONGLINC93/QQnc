<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('space_home');
0
|| checktplrefresh('./template/default/home/space_home.htm', './template/default/common/header.htm', 1451208977, 'diy', './data/template/1_diy_home_space_home.tpl.php', './template/default', 'home/space_home')
|| checktplrefresh('./template/default/home/space_home.htm', './template/default/common/simplesearchform.htm', 1451208977, 'diy', './data/template/1_diy_home_space_home.tpl.php', './template/default', 'home/space_home')
|| checktplrefresh('./template/default/home/space_home.htm', './template/default/home/space_userabout.htm', 1451208977, 'diy', './data/template/1_diy_home_space_home.tpl.php', './template/default', 'home/space_home')
|| checktplrefresh('./template/default/home/space_home.htm', './template/default/common/footer.htm', 1451208977, 'diy', './data/template/1_diy_home_space_home.tpl.php', './template/default', 'home/space_home')
|| checktplrefresh('./template/default/home/space_home.htm', './template/default/common/header_common.htm', 1451208977, 'diy', './data/template/1_diy_home_space_home.tpl.php', './template/default', 'home/space_home')
|| checktplrefresh('./template/default/home/space_home.htm', './template/default/common/pubsearchform.htm', 1451208977, 'diy', './data/template/1_diy_home_space_home.tpl.php', './template/default', 'home/space_home')
;?>
<?php if(empty($diymode)) { ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<base href="<?php echo $_G['siteurl'];?>" /><link rel="stylesheet" type="text/css" href="data/cache/style_<?php echo STYLEID;?>_common.css?<?php echo VERHASH;?>" /><link rel="stylesheet" type="text/css" href="data/cache/style_<?php echo STYLEID;?>_home_space.css?<?php echo VERHASH;?>" /><?php if($_G['uid'] && isset($_G['cookie']['extstyle']) && strpos($_G['cookie']['extstyle'], TPLDIR) !== false) { ?><link rel="stylesheet" id="css_extstyle" type="text/css" href="<?php echo $_G['cookie']['extstyle'];?>/style.css" /><?php } elseif($_G['style']['defaultextstyle']) { ?><link rel="stylesheet" id="css_extstyle" type="text/css" href="<?php echo $_G['style']['defaultextstyle'];?>/style.css" /><?php } ?><script type="text/javascript">var STYLEID = '<?php echo STYLEID;?>', STATICURL = '<?php echo STATICURL;?>', IMGDIR = '<?php echo IMGDIR;?>', VERHASH = '<?php echo VERHASH;?>', charset = '<?php echo CHARSET;?>', discuz_uid = '<?php echo $_G['uid'];?>', cookiepre = '<?php echo $_G['config']['cookie']['cookiepre'];?>', cookiedomain = '<?php echo $_G['config']['cookie']['cookiedomain'];?>', cookiepath = '<?php echo $_G['config']['cookie']['cookiepath'];?>', showusercard = '<?php echo $_G['setting']['showusercard'];?>', attackevasive = '<?php echo $_G['config']['security']['attackevasive'];?>', disallowfloat = '<?php echo $_G['setting']['disallowfloat'];?>', creditnotice = '<?php if($_G['setting']['creditnotice']) { ?><?php echo $_G['setting']['creditnames'];?><?php } ?>', defaultstyle = '<?php echo $_G['style']['defaultextstyle'];?>', REPORTURL = '<?php echo $_G['currenturl_encode'];?>', SITEURL = '<?php echo $_G['siteurl'];?>', JSPATH = '<?php echo $_G['setting']['jspath'];?>';</script>
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

<div id="wp" class="wp"><div id="pt" class="bm cl"><?php if($_G['setting']['search']) { ?><?php $slist = array();?><?php if($_G['fid'] && $_G['forum']['status'] != 3 && $mod != 'group') { ?><?php
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
 if(CURSCRIPT == 'home' && !in_array($do, array('blog', 'album', 'thread', 'activity', 'poll', 'reward', 'debate', 'trade'))) { 
$slist[user] .= <<<EOF
 class="curtype"
EOF;
 } 
$slist[user] .= <<<EOF
>用户</a></li>
EOF;
?>
<?php if($slist) { ?>
<div id="sc" class="y"><?php $searchparams = makeSearchSignUrl();?><form id="sc_form" method="<?php if($_G['fid'] && !empty($searchparams['0'])) { ?>get<?php } else { ?>post<?php } ?>" autocomplete="off" onsubmit="searchFocus($('srchtxt'))" action="<?php if($_G['fid'] && !empty($searchparams['0'])) { ?><?php echo $searchparams['0'];?><?php } else { ?>search.php?searchsubmit=yes<?php } ?>" target="_blank">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="mod" id="sc_mod" value="title" />
<input type="hidden" name="srhfid" value="<?php echo $_G['fid'];?>" />
<input type="hidden" name="srhlocality" value="<?php echo $_G['basescript'];?>::<?php echo $_G['gp_do'];?>" />
<?php if(!empty($searchparams['1'])) { if(is_array($searchparams['1'])) foreach($searchparams['1'] as $key => $value) { ?><input type="hidden" name="<?php echo $key;?>" value="<?php echo $value;?>" />
<?php } } ?>
<table cellspacing="0" cellpadding="0">
<tr>
<td id="sc_txt_td"><input type="text" name="srchtxt" id="sc_txt" class="px z" value="请输入搜索内容" autocomplete="off" /></td>
<td id="sc_type_td"><span id="sc_type_w" class="px z"><a href="javascript:;" id="sc_type" class="showmenu xg1" onclick="showMenu(this.id);">搜索</a></span></td>
<td id="sc_btn_td"><button type="submit" name="searchsubmit" id="sc_btn" class="pn pnc" value="true"><strong>搜索</strong></button></td>
</tr>
</table>
<div id="sc_type_menu" class="p_pop cl" style="display: none">
<ul><?php echo implode('', $slist);; ?></ul>
</div>
</form>
<script type="text/javascript">initSearchmenu('scbar', '<?php echo $searchparams['0'];?>');</script>
</div>
<?php } } ?><div class="z">
<a href="./" class="nvhm" title="首页"><?php echo $_G['setting']['bbname'];?></a> <em>&rsaquo;</em>
<?php echo $_G['setting']['navs']['4']['navname'];?>
</div>
</div><?php echo adshow("text/wp a_t");?><style id="diy_style" type="text/css"></style>
<div class="wp">
<!--[diy=diy1]--><div id="diy1" class="area"></div><!--[/diy]-->
</div>

<div id="ct" class="ct3_a wp cl">
<div class="appl"><?php include template('common/userabout'); ?></div>
<!--/sidebar-->
<div class="sd ptm">
<div class="drag">
<!--[diy=diysidetop]--><div id="diysidetop" class="area"></div><!--[/diy]-->
</div>
<?php if($_G['uid'] ) { if($space['profileprogress'] != 100) { ?>
<div class="bm">
<div class="bm_c">
<div class="pbg mbn"><div class="pbr" style="width: <?php if($space['profileprogress'] < 2) { ?>2<?php } else { ?><?php echo $space['profileprogress'];?><?php } ?>%;"></div></div>
<p>您的资料已完成 <?php echo $space['profileprogress'];?>%, <a href="home.php?mod=spacecp&amp;ac=profile" class="xi2">点此完善</a></p>
</div>
</div>
<?php } if($_G['setting']['taskon'] && !empty($task) && is_array($task)) { ?>
<div class="bm">
<div class="bm_h cl">
<span class="y">
<a href="home.php?mod=task">全部</a>
</span>
<h2>任务</h2>
</div>
<div class="bm_c">
<p class="pbm">您好，<?php echo $_G['username'];?>，欢迎加入我们。有新任务等着您，挺简单的，赶快来参加吧</p>
<hr class="da m0" />
<dl class="xld cl">
<dd class="m"><img src="<?php echo $task['icon'];?>" width="64" height="64" alt="Icon" /></dd>
<dt><a href="home.php?mod=task&amp;do=view&amp;id=<?php echo $task['taskid'];?>"><?php echo $task['name'];?></a></dt>
<dd>
<p><?php echo $task['description'];?></p>
<?php if(in_array($task['reward'], array('credit', 'magic', 'medal', 'invite', 'group'))) { ?>
<p>
<?php if($task['reward'] == 'credit') { ?>
可以获得<?php echo $_G['setting']['extcredits'][$task['prize']]['title'];?> <strong class="xi1"><?php echo $task['bonus'];?></strong> <?php echo $_G['setting']['extcredits'][$task['prize']]['unit'];?>
<?php } elseif($task['reward'] == 'magic') { ?>
可以获得道具 <?php echo $listdata[$task['prize']];?> <strong class="xi1"><?php echo $task['bonus'];?></strong> 张
<?php } elseif($task['reward'] == 'medal') { ?>
可以获得勋章 <strong class="xi1">1</strong> 个
<?php } elseif($task['reward'] == 'invite') { ?>
可以获得邀请码 <strong class="xi1"><?php echo $task['prize'];?></strong> 个
<?php } elseif($task['reward'] == 'group') { ?>
可以提升用户组等级
<?php } ?>
</p>
<?php } ?>
</dd>
</dl>
</div>
</div>
<?php } ?>
<div class="drag">
<!--[diy=diymagictop]--><div id="diymagictop" class="area"></div><!--[/diy]-->
</div>
<?php if(!empty($magic) && is_array($magic)) { ?>
<div class="bm">
<div class="bm_h cl">
<span class="y">
<a href="home.php?mod=magic">全部</a>
</span>
<h2>道具</h2>
</div>
<div class="bm_c">
<dl class="xld cl">
<dd class="m"><img src="<?php echo STATICURL;?>/image/magic/<?php echo $magic['pic'];?>" alt="<?php echo $magic['name'];?>" title="<?php echo $magic['description'];?>" /></dd>
<dt><?php echo $magic['name'];?></dt>
<dd>
<p><?php echo $magic['description'];?></p>
<p>售价
<?php if($_G['setting']['extcredits'][$magic['credit']]['unit']) { ?>
<?php echo $_G['setting']['extcredits'][$magic['credit']]['title'];?> <strong class="xi1"><?php echo $magic['price'];?></strong> <?php echo $_G['setting']['extcredits'][$magic['credit']]['unit'];?>/张
<?php } else { ?>
<strong class="xi1"><?php echo $magic['price'];?></strong> <?php echo $_G['setting']['extcredits'][$magic['credit']]['title'];?>/张
<?php } ?>
</p>
<p>
<?php if($magic['num'] > 0) { ?>
<a href="home.php?mod=magic&amp;action=shop&amp;operation=buy&amp;mid=<?php echo $magic['identifier'];?>" onclick="showWindow('magics', this.href);return false;" class="xi2 xw1">购买</a>
<?php if($_G['group']['allowmagics'] > 1) { ?>
<span class="pipe">|</span>
<a href="home.php?mod=magic&amp;action=shop&amp;operation=give&amp;mid=<?php echo $magic['identifier'];?>" onclick="showWindow('magics', this.href);return false;" class="xi2">赠送</a>
<?php } } else { ?>
<span class="xg1">此道具缺货</span>
<?php } ?>
</p>
</dd>
</dl>
</div>
</div>
<?php } } ?>
<div class="drag">
<!--[diy=diydefaultusertop]--><div id="diydefaultusertop" class="area"></div><!--[/diy]-->
</div>
<?php if($defaultusers) { ?>
<div class="bm">
<div class="bm_h cl">
<h2>好友推荐</h2>
</div>
<div class="bm_c">
<ul class="ml mls cl"><?php if(is_array($defaultusers)) foreach($defaultusers as $key => $value) { ?><li>
<a href="home.php?mod=space&amp;uid=<?php echo $value['uid'];?>" title="<?php if($ols[$value['uid']]) { ?>在线<?php } ?>" class="avt">
<?php if($ols[$value['uid']]) { ?><em class="gol"></em><?php } ?><?php echo avatar($value[uid],small);?></a>
<p><a href="home.php?mod=space&amp;uid=<?php echo $value['uid'];?>" title="<?php echo $value['username'];?>"><?php echo $value['username'];?></a></p>
</li>
<?php } ?>
</ul>
</div>
</div>
<?php } ?>

<div class="drag">
<!--[diy=diynewusertop]--><div id="diynewusertop" class="area"></div><!--[/diy]-->
</div>

<?php if($showusers) { ?>
<div class="bm">
<div class="bm_h cl">
<span class="y">
<a href="misc.php?mod=ranklist&amp;type=member">全部</a>
</span>
<h2>竞价排名</h2>
</div>
<div class="bm_c">
<ul class="ml mls cl"><?php if(is_array($showusers)) foreach($showusers as $key => $value) { ?><li>
<a href="home.php?mod=space&amp;uid=<?php echo $value['uid'];?>" title="<?php if($ols[$value['uid']]) { ?>在线<?php } ?>" class="avt">
<?php if($ols[$value['uid']]) { ?><em class="gol"></em><?php } ?><?php echo avatar($value[uid],small);?></a>
<p><a href="home.php?mod=space&amp;uid=<?php echo $value['uid'];?>" title="<?php echo $value['username'];?>"><?php echo $value['username'];?></a></p>
<!--span><span title="<?php echo $value['credit'];?>"><?php echo $value['credit'];?></span></span-->
</li>
<?php } ?>
</ul>
</div>
</div>
<?php } if($newusers) { ?>
<div class="bm">
<div class="bm_h cl">
<h2>新加入会员</h2>
</div>
<div class="bm_c">
<ul class="ml mls cl"><?php if(is_array($newusers)) foreach($newusers as $key => $value) { ?><li>
<a href="home.php?mod=space&amp;uid=<?php echo $value['uid'];?>" title="<?php if($ols[$value['uid']]) { ?>在线<?php } ?>" class="avt">
<?php if($ols[$value['uid']]) { ?><em class="gol"></em><?php } ?><?php echo avatar($value[uid],small);?></a>
<p><a href="home.php?mod=space&amp;uid=<?php echo $value['uid'];?>" title="<?php echo $value['username'];?>"><?php echo $value['username'];?></a></p>
<span><span title="<?php echo $value['regdate'];?>"><?php echo $value['regdate'];?></span></span>
</li>
<?php } ?>
</ul>
</div>
</div>
<?php } ?>

<div class="drag">
<!--[diy=diyvisitorlisttop]--><div id="diyvisitorlisttop" class="area"></div><!--[/diy]-->
</div>

<?php if($visitorlist) { ?>
<div class="bm">
<div class="bm_h cl">
<span class="y">
<?php if($_G['setting']['magicstatus'] && $_G['setting']['magics']['visit']) { ?>
<a id="a_magic_visit" href="home.php?mod=magic&amp;mid=visit" onclick="showWindow('magics',this.href,'get', 0)" class="xg1" style="display: inline-block; padding-left: 18px; background: url(<?php echo STATICURL;?>image/magic/visit.small.gif) no-repeat 0 50%;"><?php echo $_G['setting']['magics']['visit'];?></a>
<?php } ?>
<a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=friend&amp;view=visitor">全部</a>
</span>
<h2>最近来访</h2>
</div>
<div class="bm_c">
<ul class="ml mls cl"><?php if(is_array($visitorlist)) foreach($visitorlist as $key => $value) { ?><li>
<?php if($value['vusername'] == '') { ?>
<div class="avt"><img src="<?php echo STATICURL;?>image/magic/hidden.gif" alt="匿名" /></div>
<p>匿名</p>
<span><?php echo dgmdate($value[dateline], 'u', 9999, $_G[setting][dateformat]);?></span>
<?php } else { ?>
<a href="home.php?mod=space&amp;uid=<?php echo $value['vuid'];?>" title="<?php if($ols[$value['vuid']]) { ?>在线<?php } ?>" class="avt" c="1">
<?php if($ols[$value['vuid']]) { ?><em class="gol"></em><?php } ?><?php echo avatar($value[vuid],small);?></a>
<p><a href="home.php?mod=space&amp;uid=<?php echo $value['vuid'];?>" title="<?php echo $value['vusername'];?>"><?php echo $value['vusername'];?></a></p>
<span><?php echo dgmdate($value[dateline], 'u', 9999, $_G[setting][dateformat]);?></span>
<?php } ?>
</li>
<?php } ?>
</ul>
</div>
</div>
<?php } ?>

<div class="drag">
<!--[diy=diyfriendtop]--><div id="diyfriendtop" class="area"></div><!--[/diy]-->
</div>

<?php if($olfriendlist) { ?>
<div class="bm">
<div class="bm_h cl">
<span class="y">
<?php if($_G['setting']['magicstatus'] && $_G['setting']['magics']['detector']) { ?>
<a id="a_magic_detector" href="home.php?mod=magic&amp;mid=detector" onclick="showWindow('magics',this.href,'get', 0)" class="xg1" style="display: inline-block; padding-left: 18px; background: url(<?php echo STATICURL;?>image/magic/detector.small.gif) no-repeat 0 50%;"><?php echo $_G['setting']['magics']['detector'];?></a>
<?php } ?>
<a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=friend">全部</a>
</span>
<h2>我的好友</h2>
</div>
<div class="bm_c">
<ul class="ml mls cl"><?php if(is_array($olfriendlist)) foreach($olfriendlist as $key => $value) { ?><li>
<a href="home.php?mod=space&amp;uid=<?php echo $value['uid'];?>" title="<?php if($ols[$value['uid']]) { ?>在线<?php } ?>" class="avt" c="1">
<?php if($ols[$value['uid']]) { ?><em class="gol"></em><?php } ?><?php echo avatar($value[uid],small);?></a>
<p><a href="home.php?mod=space&amp;uid=<?php echo $value['uid'];?>" title="<?php echo $value['username'];?>"><?php echo $value['username'];?></a></p>
<span><?php if($value['lastactivity']) { ?><?php echo dgmdate($value[lastactivity], 'u', 9999, $_G[setting][dateformat]);?><?php } else { ?>热度(<?php echo $value['num'];?>)<?php } ?></span>
</li>
<?php } ?>
</ul>
</div>
</div>
<?php } ?>

<div class="drag">
<!--[diy=diybirthtop]--><div id="diybirthtop" class="area"></div><!--[/diy]-->
</div>

<?php if($birthlist) { ?>
<div class="bm">
<div class="bm_h cl">
<h2>好友生日提醒</h2>
</div>
<div class="bm_c">
<table cellpadding="2" cellspacing="4"><?php if(is_array($birthlist)) foreach($birthlist as $key => $values) { ?><tr>
<td align="right" valign="top">
<?php if($values['0']['istoday']) { ?>今天<?php } else { ?><?php echo $values['0']['birthmonth'];?>-<?php echo $values['0']['birthday'];?><?php } ?>
</td>
<td style="padding-left:10px;">
<ul><?php if(is_array($values)) foreach($values as $value) { ?><li><a href="home.php?mod=space&amp;uid=<?php echo $value['uid'];?>"><?php echo $value['username'];?></a></li>
<?php } ?>
</ul>
</td>
</tr>
<?php } ?>
</table>
</div>
</div>
<?php } ?>

<div class="drag">
<!--[diy=diysidebottom]--><div id="diysidebottom" class="area"></div><!--[/diy]-->
</div>

<?php if(!empty($_G['setting']['pluginhooks']['space_home_side_bottom'])) echo $_G['setting']['pluginhooks']['space_home_side_bottom'];?>
</div>
<div class="mn ptm">
<!--[diy=diycontenttop]--><div id="diycontenttop" class="area"></div><!--[/diy]-->
<?php if($space['uid'] && $space['self']) { ?>
<div class="bm bw0">
<table cellpadding="0" cellspacing="0" class="mi mbm">
<tr>
<th>
<div class="avatar mbn cl">
<a href="home.php?mod=spacecp&amp;ac=avatar" title="修改头像" id="edit_avt"><span id="edit_avt_tar">修改头像</span><?php echo avatar($_G[uid],middle);?></a>
</div>
<p><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>" target="_blank" class="o xi2">访问我的空间</a></p>
</th>
<td>
<h3 class="xs2">
<span class="y xw0 xs1">已有 <em class="xi1"><?php echo $space['views'];?></em> 人次访问</span>
<a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>"<?php g_color($space[groupid]);?>><?php echo $space['username'];?></a><?php g_icon($space[groupid]);?></h3><?php include template('home/space_status'); ?></td>
</tr>
</table>
<!--[diy=diycontentmiddle]--><div id="diycontentmiddle" class="area"></div><!--[/diy]-->
<?php if(!empty($_G['setting']['pluginhooks']['space_home_top'])) echo $_G['setting']['pluginhooks']['space_home_top'];?>

</div><?php echo adshow("feed/bm");?><div class="bm bw0">
<ul class="tb cl">
<li<?php echo $actives['we'];?>><a href="home.php?mod=space&amp;do=home&amp;view=we">好友的动态</a></li>
<li<?php echo $actives['me'];?>><a href="home.php?mod=space&amp;do=home&amp;view=me">我的动态</a></li>
<li<?php echo $actives['all'];?>><a href="home.php?mod=space&amp;do=home&amp;view=all">随便看看</a></li>
<?php if($_G['setting']['my_app_status']) { ?>
<li<?php echo $actives['app'];?>><a href="home.php?mod=space&amp;do=home&amp;view=app">应用动态</a></li>
<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['space_home_navlink'])) echo $_G['setting']['pluginhooks']['space_home_navlink'];?>
<?php if($_G['setting']['magicstatus'] && $_G['setting']['magics']['thunder']) { ?>
<li class="y"><a id="a_magic_thunder" href="home.php?mod=magic&amp;mid=thunder" onclick="showWindow('magics', this.href, 'get', 0)" style="padding-left: 18px; background: url(<?php echo STATICURL;?>image/magic/thunder.small.gif) no-repeat 0 50%;"><?php echo $_G['setting']['magics']['thunder'];?></a></li>
<?php } ?>
</ul>

<?php } else { ?>
<div class="bm bw0"><?php $_G['home_tpl_spacemenus'][] = "<a href=\"home.php?mod=space&amp;uid=$space[uid]&amp;do=home&amp;view=me\">TA 的近期动态</a>";?><?php include template('home/space_menu'); } if($_GET['view'] == 'all') { ?>
<p class="tbmu">
<a href="home.php?mod=space&amp;do=home&amp;view=all&amp;order=dateline"<?php echo $orderactives['dateline'];?>>最新动态</a><span class="pipe">|</span>
<a href="home.php?mod=space&amp;do=home&amp;view=all&amp;order=hot"<?php echo $orderactives['hot'];?>>热点动态</a>
</p>
<?php } elseif($_GET['view'] == 'app' && $_G['setting']['my_app_status']) { ?>
<p class="tbmu">
<a href="home.php?mod=space&amp;do=home&amp;view=app&amp;type=we"<?php echo $typeactives['we'];?>>好友在玩什么</a><span class="pipe">|</span>
<a href="home.php?mod=space&amp;do=home&amp;view=app&amp;type=me"<?php echo $typeactives['me'];?>>我在玩的</a><span class="pipe">|</span>
<a href="home.php?mod=space&amp;do=home&amp;view=app&amp;type=all"<?php echo $typeactives['all'];?>>大家在玩什么</a>
</p>
<?php } elseif($groups) { ?>
<p class="tbmu">
<a href="home.php?mod=space&amp;do=home&amp;view=we"<?php echo $gidactives['-1'];?>>全部好友</a><?php if(is_array($groups)) foreach($groups as $key => $value) { ?><span class="pipe">|</span><a href="home.php?mod=space&amp;do=home&amp;view=we&amp;gid=<?php echo $key;?>"<?php echo $gidactives[$key];?>><?php echo $value;?></a><?php } ?>
</p>
<?php } } else { include template('home/space_header'); ?><div id="ct" class="ct2 wp cl">
<div class="mn">
<div class="bm">
<div class="bm_h cl">
<h1 class="mt">动态</h1>
</div>
<div class="bm_c">
<?php } ?>

<div id="feed_div" class="e">
<?php if($hotlist) { ?>
<h4 class="et"><a href="home.php?mod=space&amp;do=home&amp;view=all&amp;order=hot" class="y xw0">查看更多热点 <em>&rsaquo;</em></a>近期热点推荐</h4>
<ul class="el"><?php if(is_array($hotlist)) foreach($hotlist as $value) { ?><?php $value = mkfeed($value);?><?php include template('home/space_feed_li'); } ?>
</ul>
<?php } if($list) { if($_GET['view'] == 'app' && $_G['setting']['my_app_status']) { ?>

<div class="xld xlda mtm"><?php if(is_array($list)) foreach($list as $appicon => $values) { ?><dl class="bbda cl">
<dd class="m avt">
<a href="userapp.php?mod=app&amp;id=<?php echo $appicon;?>"><img src="http://appicon.manyou.com/logos/<?php echo $appicon;?>" alt="" /></a>
</dd>
<dd class="cl">
<ul class="el"><?php if(is_array($values)) foreach($values as $value) { ?><li class="cl">
<a class="t" href="userapp.php?icon=<?php echo $value['icon'];?>" title="只看此类动态">
<img width="16" height="16" <?php if($_G['cache']['myapp'][$value['icon']]['icon']) { ?>src="<?php echo $_G['cache']['myapp'][$value['icon']]['icon'];?>" onerror="this.onerror=null;this.src='http://appicon.manyou.com/icons/<?php echo $value['icon'];?>'"<?php } else { ?> src="http://appicon.manyou.com/icons/<?php echo $value['icon'];?>"<?php } ?> />
</a>
<?php echo $value['title_template'];?> 
<span class="xg1"><?php echo dgmdate($value[dateline], 'n-j H:i');?></span>

<div class="ec">
<?php if($value['image_1']) { ?>
<a href="<?php echo $value['image_1_link'];?>"<?php echo $value['target'];?>><img src="<?php echo $value['image_1'];?>" class="tn" /></a>
<?php } if($value['image_2']) { ?>
<a href="<?php echo $value['image_2_link'];?>"<?php echo $value['target'];?>><img src="<?php echo $value['image_2'];?>" class="tn" /></a>
<?php } if($value['image_3']) { ?>
<a href="<?php echo $value['image_3_link'];?>"<?php echo $value['target'];?>><img src="<?php echo $value['image_3'];?>" class="tn" /></a>
<?php } if($value['image_4']) { ?>
<a href="<?php echo $value['image_4_link'];?>"<?php echo $value['target'];?>><img src="<?php echo $value['image_4'];?>" class="tn" /></a>
<?php } if($value['body_template']) { ?>
<div class="detail"<?php if($value['image_3']) { ?> style="clear: both; zoom: 1;"<?php } ?>>
<?php echo $value['body_template'];?>
</div>
<?php } if($value['body_general']) { ?>
<div class="quote"><blockquote><?php echo $value['body_general'];?></blockquote></div>
<?php } ?>
</div>
</li>
<?php } ?>
</ul>
</dd>
</dl>
<?php } ?>
</div>

<?php } else { if(is_array($list)) foreach($list as $day => $values) { if($_GET['view']!='hot') { ?>
<h4 class="et">
<?php if($day=='yesterday') { ?>昨天<?php } elseif($day=='today') { ?>今天<?php } else { ?><?php echo $day;?><?php } ?>
</h4>
<?php } ?>

<ul class="el"><?php if(is_array($values)) foreach($values as $value) { include template('home/space_feed_li'); } ?>
</ul>
<?php } } } elseif($feed_users) { ?>
<div class="xld xlda mtm"><?php if(is_array($feed_users)) foreach($feed_users as $day => $users) { ?><h4 class="et">
<?php if($day=='yesterday') { ?>昨天<?php } elseif($day=='today') { ?>今天<?php } else { ?><?php echo $day;?><?php } ?>
</h4><?php if(is_array($users)) foreach($users as $user) { ?><?php $daylist = $feed_list[$day][$user[uid]];?><?php $morelist = $more_list[$day][$user[uid]];?><dl class="bbda cl">
<dd class="m avt">
<?php if($user['uid']) { ?>
<a href="home.php?mod=space&amp;uid=<?php echo $user['uid'];?>" target="_blank" c="1"><?php echo avatar($user[uid],small);?></a>
<?php } else { ?>
<img src="<?php echo IMGDIR;?>/systempm.png" alt="" />
<?php } ?>
</dd>
<dd class="cl">
<ul class="el"><?php if(is_array($daylist)) foreach($daylist as $value) { include template('home/space_feed_li'); } ?>
</ul>

<?php if($morelist) { ?>
<p class="xg1 cl"><span onclick="showmore('<?php echo $day;?>', '<?php echo $user['uid'];?>', this);" class="unfold">展开</span></p>
<div id="feed_more_div_<?php echo $day;?>_<?php echo $user['uid'];?>" style="display:none;">
<ul class="el"><?php if(is_array($morelist)) foreach($morelist as $value) { include template('home/space_feed_li'); } ?>
</ul>
</div>
<?php } ?>
</dd>
</dl>
<?php } } ?>
</div>
<?php } else { ?>
<p class="emp">还没有相关动态</p>
<?php } if($filtercount) { ?>
<div class="i" id="feed_filter_notice_<?php echo $start;?>">
根据您的<a href="home.php?mod=spacecp&amp;ac=privacy&amp;op=filter" target="_blank" class="xi2 xw1">筛选设置</a>,有 <?php echo $filtercount;?> 条动态被屏蔽 (<a href="javascript:;" onclick="filter_more(<?php echo $start;?>);" id="a_feed_privacy_more" class="xi2">点击查看</a>)
</div>
<div id="feed_filter_div_<?php echo $start;?>" style="display:none;">
<h4 class="et">以下是被屏蔽的动态</h4>
<ul class="el"><?php if(is_array($filter_list)) foreach($filter_list as $value) { include template('home/space_feed_li'); } ?>
<li><a href="javascript:;" onclick="filter_more(<?php echo $start;?>);">&laquo; 收起</a></li>
</ul>
</div>
<?php } ?>

</div>
<!--/id=feed_div-->

<?php if(empty($diymode)) { if($multi) { ?>
<div class="pgs cl mtm"><?php echo $multi;?></div>
<?php } ?>

<?php if(!empty($_G['setting']['pluginhooks']['space_home_bottom'])) echo $_G['setting']['pluginhooks']['space_home_bottom'];?>
<div id="ajax_wait"></div>
</div>

<!--[diy=diycontentbottom]--><div id="diycontentbottom" class="area"></div><!--[/diy]-->
</div>
<!--/content-->
</div>

<div class="wp mtn">
<!--[diy=diy3]--><div id="diy3" class="area"></div><!--[/diy]-->
</div>

<?php } else { ?>

</div>
</div>
</div>
<div class="sd"><div id="pcd" class="bm cl"><?php $encodeusername = rawurlencode($space[username]);?><div <?php if(!$_G['setting']['homestatus']) { ?>class="bm_c"<?php } ?>>
<div class="hm">
<p><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>"><?php echo avatar($space[uid],middle);?></a></p>
<h2 class="xs2"><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>"><?php echo $space['username'];?></a></h2>
</div>
<ul class="xl xl2 cl ul_list">
<?php if($space['self']) { if($_G['setting']['homestatus']) { ?>
<li class="ul_diy"><a href="home.php?mod=space&amp;diy=yes">装扮空间</a></li>
<li class="ul_msg"><a href="home.php?mod=space&amp;do=wall">查看留言</a></li>
<?php } ?>
<li class="ul_avt"><a href="home.php?mod=spacecp&amp;ac=avatar">编辑头像</a></li>
<li class="ul_profile"><a href="home.php?mod=spacecp&amp;ac=profile">更新资料</a></li>
<?php } else { ?><?php require_once libfile('function/friend');$isfriend=friend_check($space[uid]);?><?php if(!$isfriend) { ?>
<li class="ul_add"><a href="home.php?mod=spacecp&amp;ac=friend&amp;op=add&amp;uid=<?php echo $space['uid'];?>&amp;handlekey=addfriendhk_<?php echo $space['uid'];?>" id="a_friend_li_<?php echo $space['uid'];?>" onclick="showWindow(this.id, this.href, 'get', 0);">加为好友</a></li>
<?php } else { ?>
<li class="ul_ignore"><a href="home.php?mod=spacecp&amp;ac=friend&amp;op=ignore&amp;uid=<?php echo $space['uid'];?>&amp;handlekey=ignorefriendhk_<?php echo $space['uid'];?>" id="a_ignore_<?php echo $space['uid'];?>" onclick="showWindow(this.id, this.href, 'get', 0);">解除好友</a></li>
<?php } if($_G['setting']['homestatus']) { ?>
<li class="ul_contect"><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=wall">给我留言</a></li>
<li class="ul_poke"><a href="home.php?mod=spacecp&amp;ac=poke&amp;op=send&amp;uid=<?php echo $space['uid'];?>&amp;handlekey=propokehk_<?php echo $space['uid'];?>" id="a_poke_<?php echo $space['uid'];?>" onclick="showWindow(this.id, this.href, 'get', 0);">打个招呼</a></li>
<?php } ?>
<li class="ul_pm"><a href="home.php?mod=spacecp&amp;ac=pm&amp;op=showmsg&amp;handlekey=showmsg_<?php echo $space['uid'];?>&amp;touid=<?php echo $space['uid'];?>&amp;pmid=0&amp;daterange=2" id="a_sendpm_<?php echo $space['uid'];?>" onclick="showWindow('showMsgBox', this.href, 'get', 0)">发送消息</a></li>
<?php } ?>
</ul>
<?php if(checkperm('allowbanuser') || checkperm('allowedituser') || $_G['adminid'] == 1) { ?>
<hr class="da mtn m0">
<ul class="ptn xl xl2 cl">
<?php if(checkperm('allowbanuser') || checkperm('allowedituser')) { ?>
<li>
<?php if(checkperm('allowbanuser')) { ?>
<a href="<?php if($_G['adminid'] == 1) { ?>admin.php?action=members&operation=ban&username=<?php echo $encodeusername;?>&frames=yes<?php } else { ?>forum.php?mod=modcp&action=member&op=ban&uid=<?php echo $space['uid'];?><?php } ?>" id="usermanageli" onmouseover="showMenu(this.id)" class="showmenu" target="_blank">用户管理</a>
<?php } else { ?>
<a href="<?php if($_G['adminid'] == 1) { ?>admin.php?action=members&operation=search&username=<?php echo $encodeusername;?>&submit=yes&frames=yes<?php } else { ?>forum.php?mod=modcp&action=member&op=edit&uid=<?php echo $space['uid'];?><?php } ?>" id="usermanageli" onmouseover="showMenu(this.id)" class="showmenu" target="_blank">用户管理</a>
<?php } ?>
</li>
<?php } if($_G['adminid'] == 1) { ?>
<li><a href="forum.php?mod=modcp&amp;action=thread&amp;op=post&amp;do=search&amp;searchsubmit=1&amp;users=<?php echo $encodeusername;?>" id="umanageli" onmouseover="showMenu(this.id)" class="showmenu">内容管理</a></li>
<?php } ?>
</ul>
<?php if(checkperm('allowbanuser') || checkperm('allowedituser')) { ?>
<ul id="usermanageli_menu" class="p_pop" style="width: 80px; display:none;">
<?php if(checkperm('allowbanuser')) { ?>
<li><a href="<?php if($_G['adminid'] == 1) { ?>admin.php?action=members&operation=ban&username=<?php echo $encodeusername;?>&frames=yes<?php } else { ?>forum.php?mod=modcp&action=member&op=ban&uid=<?php echo $space['uid'];?><?php } ?>" target="_blank">禁止用户</a></li>
<?php } if(checkperm('allowedituser')) { ?>
<li><a href="<?php if($_G['adminid'] == 1) { ?>admin.php?action=members&operation=search&username=<?php echo $encodeusername;?>&submit=yes&frames=yes<?php } else { ?>forum.php?mod=modcp&action=member&op=edit&uid=<?php echo $space['uid'];?><?php } ?>" target="_blank">编辑用户</a></li>
<?php } ?>
</ul>
<?php } if($_G['adminid'] == 1) { ?>
<ul id="umanageli_menu" class="p_pop" style="width: 80px; display:none;">
<li><a href="forum.php?mod=modcp&amp;action=thread&amp;op=post&amp;searchsubmit=1&amp;do=search&amp;users=<?php echo $encodeusername;?>" target="_blank">管理帖子</a></li>
<?php if($_G['setting']['homestatus']) { ?>
<li><a href="admin.php?action=doing&amp;searchsubmit=1&amp;search=true&amp;fromumanage=1&amp;users=<?php echo $encodeusername;?>" target="_blank">管理记录</a></li>
<li><a href="admin.php?action=blog&amp;searchsubmit=1&amp;search=true&amp;fromumanage=1&amp;uid=<?php echo $space['uid'];?>" target="_blank">管理日志</a></li>
<li><a href="admin.php?action=feed&amp;searchsubmit=1&amp;fromumanage=1&amp;uid=<?php echo $space['uid'];?>" target="_blank">管理动态</a></li>
<li><a href="admin.php?action=album&amp;searchsubmit=1&amp;search=true&amp;fromumanage=1&amp;uid=<?php echo $space['uid'];?>" target="_blank">管理相册</a></li>
<li><a href="admin.php?action=pic&amp;searchsubmit=1&amp;detail=1&amp;search=true&amp;fromumanage=1&amp;users=<?php echo $encodeusername;?>" target="_blank">管理图片</a></li>
<li><a href="admin.php?action=comment&amp;searchsubmit=1&amp;fromumanage=1&amp;authorid=<?php echo $space['uid'];?>" target="_blank">管理评论</a></li>
<li><a href="admin.php?action=share&amp;searchsubmit=1&amp;search=true&amp;fromumanage=1&amp;uid=<?php echo $space['uid'];?>" target="_blank">管理分享</a></li>
<?php } if($_G['setting']['groupstatus']) { ?>
<li><a href="admin.php?action=threads&amp;operation=group&amp;searchsubmit=1&amp;detail=1&amp;search=true&amp;fromumanage=1&amp;users=<?php echo $encodeusername;?>" target="_blank">群组主题</a></li>
<li><a href="admin.php?action=prune&amp;searchsubmit=1&amp;detail=1&amp;operation=group&amp;fromumanage=1&amp;users=<?php echo $encodeusername;?>" target="_blank">群组帖子</a></li>
<?php } ?>
</ul>
<?php } } ?>
</div>
</div>
</div></div>
</div>
<?php } ?><?php my_checkupdate();?><script type="text/javascript">
function filter_more(id) {
if($('feed_filter_div_'+id).style.display == '') {
$('feed_filter_div_'+id).style.display = 'none';
$('feed_filter_notice_'+id).style.display = '';
} else {
$('feed_filter_div_'+id).style.display = '';
$('feed_filter_notice_'+id).style.display = 'none';
}
}

function close_feedbox() {
var x = new Ajax();
x.get('home.php?mod=spacecp&ac=common&op=closefeedbox', function(s){
$('feed_box').style.display = 'none';
});
}

function showmore(day, uid, e) {
var obj = 'feed_more_div_'+day+'_'+uid;
$(obj).style.display = $(obj).style.display == ''?'none':'';
if(e.className == 'unfold'){
e.innerHTML = '收起';
e.className = 'fold';
} else if(e.className == 'fold') {
e.innerHTML = '展开';
e.className = 'unfold';
}
}

var elems = selector('li[class~=magicthunder]', $('feed_div'));
for(var i=0; i<elems.length; i++){
magicColor(elems[i]);
}

function showEditAvt(id) {
$(id).style.display = $(id).style.display == '' ? 'block' : '';
}
if($('edit_avt') && BROWSER.ie && BROWSER.ie == 6) {
_attachEvent($('edit_avt'), 'mouseover', function () { showEditAvt('edit_avt_tar'); });
_attachEvent($('edit_avt'), 'mouseout', function () { showEditAvt('edit_avt_tar'); });
}
</script>	</div>
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
