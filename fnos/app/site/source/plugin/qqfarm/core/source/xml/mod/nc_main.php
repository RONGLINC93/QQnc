<?php
//农场:load_main_v_9.xml
$nc_main = <<<XML
<?xml version="1.0" encoding="utf-8" ?>
<data>
    <version value="" loginurl="" />
    <loading url="$url/module/loading2_v_3.swf" />
    <!-- 模块列表 -->
    <moduleList>
        <module name="main" url="$url/module/main3_v_140.swf" statusText="加载主文件...">
            <material url="$url/module/ui/main/farmui_full_v_32.swf" statusText="加载UI素材..." />
            <material url="$url/module/ui/main/farmui2_v_34.swf" statusText="加载UI素材..." />
			<material url="$url/module/mc/farm/wild/wild_ui_v_10.swf" statusText="加载图标素材..."/>
        </module>
    </moduleList>
</data>
XML;
?>