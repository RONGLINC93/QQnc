<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class plugin_ctqq {
	var $istqq = 0;
	var $isqzone = 0;
	var $appkey = '';
	var $istqpic = '';
	var $ispicexist = '';
	var $ispromotion = '';

	function plugin_ctqq() {
		global $_G;

		$this->istqq = $_G['cache']['plugin']['ctqq']['istqq'];
		$this->isqzone = $_G['cache']['plugin']['ctqq']['isqzone'];
		$this->appkey = $_G['cache']['plugin']['ctqq']['tqappkey'];
		$this->istqpic = $_G['cache']['plugin']['ctqq']['istqpic'];
		$this->ispicexist = $_G['cache']['plugin']['ctqq']['ispicexist'];
		$this->ispromotion = $_G['cache']['plugin']['ctqq']['ispromotion'];
	}

	function getresult() {
		global $_G;

		$url = $returnshow = $pics = $picurl = '';
		$attachs = $pics_arr = array();
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
			$url = rewriteoutput('forum_viewthread', 1, $_SERVER['HTTP_HOST'].$_G['siteroot'], $_G['tid']);
		} else {
			$url = $_G['siteurl'].'forum.php?mod=viewthread&tid='.$_G['tid'].$fromuid;
		}
		$url .= $this->ispromotion && $_G['uid'] ? "?fromuid={$_G['uid']}" : '';
		$ctqqscript = '<a href="javascript:void(0)" onclick="postToWb();" id="k_share_tq"><i><img src="source/plugin/ctqq/qqwb.png" alt="'.lang('plugin/ctqq', 'cctoqq').'">'.lang('plugin/ctqq', 'cctoqq').'</i></a><script type="text/javascript">
	function postToWb(){
		var _t = encodeURI(\''.$_G['forum_thread']['subject'].'\');
		var _url = encodeURIComponent(\''.$url.'\');
		var _appkey = encodeURI("'.$appkey.'");
		var _pic = encodeURI(\''.$pics.'\');
		var _site = \''.$siteurl.'\';
		var _u = \'http://v.t.qq.com/share/share.php?title=\'+_t+\'&url=\'+_url+\'&appkey=\'+_appkey+\'&site=\'+_site+\'&pic=\'+_pic;
		window.open( _u,\''.lang('plugin/ctqq', 'cctoqq').'\', \'width=700, height=680, top=0, left=0, toolbar=no, menubar=no, scrollbars=no, location=yes, resizable=no, status=no\' );
	}
</script>';

		$ctqqshow = '<a href="javascript:void(0)" onclick="postToqz();" id="k_share_qz"><i><img src="source/plugin/ctqq/qzone.png" alt="'.lang('plugin/ctqq', 'cctoqshow').'">'.lang('plugin/ctqq', 'cctoqshow').'</i></a><script type="text/javascript">
	function postToqz(){
		var _t = encodeURIComponent(\''.$_G['forum_thread']['subject'].'\');
		var _url = encodeURIComponent(\''.$url.'\');
		var _u = \'http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?title=\'+_t+\'&url=\'+_url;
		window.open( _u,\''.lang('plugin/ctqq', 'cctoqshow').'\', \'width=770, height=540, top=0, left=0, toolbar=no, menubar=no, scrollbars=no, location=yes, resizable=no, status=no\' );
	}
</script>';
		$returnshow .= $this->istqq ? $ctqqscript : '';
		$returnshow .= $this->isqzone ? $ctqqshow : '';
		return $returnshow;
	}
}

class plugin_ctqq_forum extends plugin_ctqq {

	function viewthread_useraction_output() {
		$returnshow = parent::getresult();
		return $returnshow;
	}
}

class plugin_ctqq_group extends plugin_ctqq {

	function viewthread_useraction_output() {
		$returnshow = parent::getresult();
		return $returnshow;
	}
}
?>