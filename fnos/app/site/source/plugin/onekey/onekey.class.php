<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class plugin_onekey {
	var $sysopentypes = array();
	var $opentypes = array('openshuqian', 'opentqq', 'openqzone', 'opensina', 'openrenren', 'openkaixin', 'openbaisohu', 'opendouban', 'open163', 'openbaidu');
	var $otypes = array();
	var $istqpic = 0;
	var $ispromotion = 0;
	var $appkey = '';
	var $sinappkey = '';
	var $csstop = 0;

	function plugin_onekey() {
		global $_G;

		$this->sysopentypes = (array)unserialize($_G['cache']['plugin']['onekey']['opentypes']);
		foreach($this->opentypes as $otype) {
			if(in_array($otype, $this->sysopentypes)) {
				$this->otypes[] = $otype;
			}
		}
		$this->appkey = $_G['cache']['plugin']['onekey']['tqappkey'];
		$this->sinappkey = $_G['cache']['plugin']['onekey']['sinappkey'];
		$this->ispromotion = $_G['cache']['plugin']['onekey']['ispromotion'];
		$this->istqpic = $_G['cache']['plugin']['onekey']['istqpic'];
		$this->csstop = $_G['cache']['plugin']['onekey']['csstop'];
		$this->ispicexist = 1;
	}

	function getonekey() {
		global $_G;

		$url = $returnshow = $pics = $picurl = '';
		$attachs = $pics_arr = $langvar_arr = array();
		$picexist = false;

		if($this->istqpic && $_G['forum_firstpid']) {
			$attachs = getattach($_G['forum_firstpid']);
			foreach($attachs as $attach) {
				foreach($attach['used'] as $imgattachs) {
					if(!$imgattachs['remote']) {
						$picurl = $_G['setting']['attachurl'].'forum/'.$imgattachs['attachment'];
						$picexist = $this->ispicexist ? true : is_file($picurl);
					} else {
						$picurl = $_G['setting']['ftp']['attachurl'].'forum/'.$imgattachs['attachment'];
						$picexist = true;
					}
					if(in_array($imgattachs['isimage'], array('1', '-1')) && $picexist) {
						$pics_arr[] = $imgattachs['remote'] ? $picurl : $_G['siteurl'].$picurl;
					}
				}
			}
			$pics = implode('|', $pics_arr);
		}

		if($_G['setting']['rewritestatus'] && in_array('forum_viewthread', $_G['setting']['rewritestatus'])) {
			$url = rewriteoutput('forum_viewthread', 1, $_G['siteurl'], $_G['tid']);
		} else {
			$url = $_G['siteurl'].'forum.php?mod=viewthread&tid='.$_G['tid'].$fromuid;
		}
		$url .= $this->ispromotion && $_G['uid'] ? "?fromuid={$_G['uid']}" : '';
		$langvar_arr = array(
			'$url' => $url,
			'$threadsubject' => $_G['forum_thread']['subject'],
			'$siteurl' => $_G['siteurl'],
			'$pics' => '',
			'$appkey' => $this->appkey,
			'$sinappkey' => $this->sinappkey,
			'$csstop' => $this->csstop ? 'position:relative;' : '',
		);

		$opentqq = '<a href="javascript:void(0)" onclick="postToWb();" title="{$oktitle}"><img src="source/plugin/onekey/template/image/qqwb.png" alt="{$oktitle}" align="absMiddle" /> {$oktitle}</a>';

		$openqzone = '<a href="javascript:void(0)" onclick="postToqz();" title="{$oktitle}"><img src="source/plugin/onekey/template/image/qzone.png" alt="{$oktitle}" align="absMiddle" /> {$oktitle}</a>';

		$openshuqian = '<a href="javascript:void(0)" onclick="postToSq();" title="{$oktitle}"><img src="source/plugin/onekey/template/image/qqadd.gif" alt="{$oktitle}" align="absMiddle" /> {$oktitle}</a>';

		$openrenren = '<a href="javascript:void((function(s,d,e){if(/renren\.com/.test(d.location))return;var f=\\\'http://share.renren.com/share/buttonshare?link=\\\',u=\\\'{$url}\\\',l=\\\'{$threadsubject}\\\',p=[e(u),\\\'&title=\\\',e(l)].join(\\\'\\\');function%20a(){if(!window.open([f,p].join(\\\'\\\'),\\\'xnshare\\\',[\\\'toolbar=0,status=0,resizable=1,width=626,height=436,left=\\\',(s.width-626)/2,\\\',top=\\\',(s.height-436)/2].join(\\\'\\\')))u.href=[f,p].join(\\\'\\\');};if(/Firefox/.test(navigator.userAgent))setTimeout(a,0);else%20a();})(screen,document,encodeURIComponent));" title="{$oktitle}"><img src="source/plugin/onekey/template/image/renren.png" title="{$oktitle}" align="absMiddle" /> {$oktitle}</a>';

		$openkaixin = '<a title="{$oktitle}" href="javascript:d=document;t=d.selection?(d.selection.type!=\\\'None\\\'?d.selection.createRange().text:\\\'\\\'):(d.getSelection?d.getSelection():\\\'\\\');void(kaixin=window.open(\\\'http://www.kaixin001.com/~repaste/repaste.php?&rurl=\\\'+escape(\\\'{$url}\\\')+\\\'&rtitle=\\\'+escape(\\\'{$threadsubject}\\\')+\\\'&rcontent=\\\'+escape(\\\'{$threadsubject}\\\'),\\\'kaixin\\\'));kaixin.focus();"><img src="source/plugin/onekey/template/image/kaixin.png" width="16" height="16" border="0" align="absMiddle"> {$oktitle}</a>';

		$openbaisohu = '<a title="{$oktitle}" target="_self" onclick="(function(){var url = \\\'{$url}\\\';var title = encodeURIComponent(\\\'{$threadsubject}\\\');window.open(\\\'http://bai.sohu.com/app/share/blank/add.do?link=\\\'+url+\\\'&title=\\\'+title,\\\'newwindow\\\',\\\'height=330,width=550,top=\\\'+(screen.height-280)/2+\\\',left=\\\'+(screen.width-550)/2+\\\', toolbar=no, menubar=no, scrollbars=no,resizable=yes,location=no, status=no\\\');})()" href="javascript:void(0);"><img border="0" align="absMiddle" src="source/plugin/onekey/template/image/baisohu.png" alt="{$oktitle}" /> {$oktitle}</a>';

		$opendouban = '<a title="{$oktitle}" target="_self" onclick="(function(){var url = \\\'{$url}\\\';var title = encodeURIComponent(\\\'{$threadsubject}\\\');window.open(\\\'http://9.douban.com/recommend/?url=\\\'+url+\\\'&title=\\\'+title,\\\'newwindow\\\',\\\'height=330,width=550,top=\\\'+(screen.height-280)/2+\\\',left=\\\'+(screen.width-550)/2+\\\', toolbar=no, menubar=no, scrollbars=no,resizable=yes,location=no, status=no\\\');})()" href="javascript:void(0);"><img border="0" align="absMiddle" src="source/plugin/onekey/template/image/douban.png" alt="{$oktitle}" /> {$oktitle}</a>';

		$opensina = '<a href="javascript:void((function(s,d,e,r,l,p,t,z,c){var%20f=\\\'http://v.t.sina.com.cn/share/share.php?appkey={$sinappkey}&\\\',u=z||d.location,p=[\\\'url=\\\',e(u),\\\'&title=\\\',e(t||d.title),\\\'&source=\\\',e(r),\\\'&sourceUrl=\\\',e(l),\\\'&content=\\\',c||\\\'gb2312\\\',\\\'&pic=\\\',e(p||\\\'\\\')].join(\\\'\\\');function%20a(){if(!window.open([f,p].join(\\\'\\\'),\\\'mb\\\',[\\\'toolbar=0,status=0,resizable=1,width=440,height=430,left=\\\',(s.width-440)/2,\\\',top=\\\',(s.height-430)/2].join(\\\'\\\')))u.href=[f,p].join(\\\'\\\');};if(/Firefox/.test(navigator.userAgent))setTimeout(a,0);else%20a();})(screen,document,encodeURIComponent,\\\'\\\',\\\'\\\',\\\'{$pics}\\\',\\\'{$threadsubject}\\\',\\\'{$url}\\\',\\\'gb2312\\\'));" title="{$oktitle}"><img alt="{$oktitle}" src="source/plugin/onekey/template/image/sina.png" align="absMiddle" /> {$oktitle}</a>';

		$open163 = '<a target="_self" title="{$oktitle}" onclick="(function(){var url = \\\'link={$siteurl}&amp;source=\\\'+ encodeURIComponent(\\\'\\\')+ \\\'&amp;info=\\\'+ encodeURIComponent(\\\'{$threadsubject}\\\') + \\\' \\\' + encodeURIComponent(\\\'{$url}\\\');window.open(\\\'http://t.163.com/article/user/checkLogin.do?\\\'+url+\\\'&amp;\\\'+new Date().getTime(),\\\'newwindow\\\',\\\'height=330,width=550,top=\\\'+(screen.height-280)/2+\\\',left=\\\'+(screen.width-550)/2+\\\', toolbar=no, menubar=no, scrollbars=no,resizable=yes,location=no, status=no\\\');})()" href="javascript:void(0);"><img border="0" align="absMiddle" src="source/plugin/onekey/template/image/wblog.gif" alt="{$oktitle}" /> {$oktitle}</a>';

		$openbaidu = '<a href="javascript:window.open(\\\'http://cang.baidu.com/do/add?it=\\\'+encodeURIComponent(\\\'{$threadsubject}\\\'.substring(0,76))+\\\'&iu=\\\'+encodeURIComponent(\\\'{$url}\\\')+\\\'&fr=ien#nw=1\\\',\\\'_blank\\\',\\\'scrollbars=no,width=600,height=450,left=75,top=20,status=no,resizable=yes\\\'); void 0" style="color:#000000;text-decoration:none;font-size:12px;font-weight:normal" title="{$oktitle}"><img src="source/plugin/onekey/template/image/baidu.gif" alt="{$oktitle}" align="absmiddle" border="0"> {$oktitle}</a>';


		foreach($this->otypes as $ot) {
			$langvar_arr['$pics'] = $ot == 'opensina' ? $pics_arr[0] : $pics;
			$langvar_arr['$oktitle'] = lang('plugin/onekey', $ot);
			$returnshow .= '<li>'.$this->_dreplace($$ot, $langvar_arr).'</li>';
		}

		$returnshow = '<a href="javascript:;" id="onekeymenu" onmouseover="delayShow(this, _showOneKeymenu);" class="showmenu"><img src="static/image/common/oshr.png" alt="'.lang('plugin/onekey', 'onekey').'" align="absmiddle"> '.lang('plugin/onekey', 'onekey').'</a>
<script type="text/javascript">
function _showOneKeymenu() {
	if(!$(\'onekeymenu_menu\')) {
		menu = document.createElement(\'div\');
		menu.id = \'onekeymenu_menu\';
		menu.style.display = \'none\';
		menu.className = \'p_pop\';
		menu.innerHTML = \'<div class="p_opt"><img src="\'+ IMGDIR + \'/loading.gif" width="16" height="16" class="vm" /> '.lang('plugin/onekey', 'wating').'</div>\';
		$(\'append_parent\').appendChild(menu);
		ajaxinnerhtml($(\'onekeymenu_menu\'), \'<ul>'.$returnshow.'</ul>\');
		//ajaxget($(\'onekeymenu\').href, \'onekeymenu_menu\', \'ajaxwaitid\');
	}
	showMenu({\'ctrlid\':\'onekeymenu\',\'ctrlclass\':\'a\',\'duration\':2,\'fade\':1});
}
function postToWb(){
	var _t = encodeURI(\'{$threadsubject}\');
	var _url = encodeURIComponent(\'{$url}\');
	var _appkey = encodeURI(\'{$appkey}\');
	var _pic = encodeURI(\'{$pics}\');
	var _site = \'{$siteurl}\';
	var _u = \'http://v.t.qq.com/share/share.php?title=\'+_t+\'&url=\'+_url+\'&appkey=\'+_appkey+\'&site=\'+_site+\'&pic=\'+_pic;
	window.open( _u,\''.lang('plugin/onekey', 'opentqq').'\', \'width=700, height=680, top=0, left=0, toolbar=no, menubar=no, scrollbars=no, location=yes, resizable=no, status=no\' );
}
function postToqz(){
	var _t = encodeURIComponent(\'{$threadsubject}\');
	var _url = encodeURIComponent(\'{$url}\');
	var _u = \'http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?title=\'+_t+\'&url=\'+_url;
	window.open( _u,\''.lang('plugin/onekey', 'openqzone').'\', \'width=770, height=540, top=0, left=0, toolbar=no, menubar=no, scrollbars=no, location=yes, resizable=no, status=no\' );
}
function postToSq() {
	var _t = encodeURIComponent(\'{$threadsubject}\');
	var _url = encodeURIComponent(\'{$url}\');
	var _u = \'http://shuqian.qq.com/post?from=3&jumpback=2&noui=1&uri=\'+_url+\'&title=\'+_t;
	window.open( _u,\''.lang('plugin/onekey', 'openshuqian').'\', \'width=930,height=570,left=50,top=50,toolbar=no,menubar=no,location=no,scrollbars=yes,status=yes,resizable=yes\' );
}
</script>';

		if($returnshow && $_G['page'] == 1) {
			$returnshow = '<style>.onekey{'.($this->csstop ? 'position: relative;' : '').' float: right; *margin-top: -20px;}.onekey a{margin-right:4px;}</style><div class="onekey">'.$this->_dreplace($returnshow, $langvar_arr).'</div>';
		}

		return $returnshow;
	}

	function _dreplace($return, $vars) {
		$searchs = $replaces = array();
		if($vars && is_array($vars)) {
			foreach($vars as $k => $v) {
				$searchs[] = '{'.$k.'}';
				$replaces[] = $v;
			}
		}

		if(is_string($return) && strpos($return, '{_G/') !== false) {
			preg_match_all('/\{_G\/(.+?)\}/', $return, $gvar);
			foreach($gvar[0] as $k => $v) {
				$searchs[] = $v;
				$replaces[] = getglobal($gvar[1][$k]);
			}
		}

		$return = str_replace($searchs, $replaces, $return);
		return $return;
	}
}

class plugin_onekey_forum extends plugin_onekey {

	function viewthread_postheader_output() {
		global $_G;

		if(!empty($this->otypes)) {
			$_G['forum_firstpid'] && $returnshow = parent::getonekey();
		}
		return (array)$returnshow;
	}


}


class plugin_onekey_group extends plugin_onekey {

	function viewthread_postheader_output() {
		global $_G;

		if(!empty($this->otypes)) {
			$_G['forum_firstpid'] && $returnshow = parent::getonekey();
		}
		return (array)$returnshow;
	}
}
?>