<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); if($space['uid']) { ?>
<div class="ih pbm cl">
<div class="icn avt"><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>"><?php echo avatar($space[uid],small);?></a></div>
<dl>
<dt class="ptn"><?php echo $space['username'];?></dt>
<dd>
<a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>"><?php echo $space['username'];?>的个人空间</a>
<?php if($_G['home_tpl_spacemenus']) { if(is_array($_G['home_tpl_spacemenus'])) foreach($_G['home_tpl_spacemenus'] as $value) { ?> <em>&rsaquo;</em> <?php echo $value;?><?php } } ?>
</dd>
</dl>
<?php if(!empty($_G['setting']['pluginhooks']['space_menu_extra'])) echo $_G['setting']['pluginhooks']['space_menu_extra'];?>
</div>
<?php } ?>