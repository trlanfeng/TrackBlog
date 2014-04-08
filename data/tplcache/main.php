<?php if(constant("TrackCMS!") !== true)die;?><?php include($this->tpl->myTpl("header","",'$this->tpl')); ?>
<div id="main">
	<table class="table table-bordered">
		<tr>
			<th width="186" >参数名称</th>
			<th width="610" >详情</th>
		</tr>
		<tr>
			<td>发布文章:</td>
			<td><?php ;echo $articleData['count']; ?>篇&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="admin.php?action=cms&amp;ctrl=add">发表文章</a>&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="admin.php?action=cms&amp;ctrl=lists">管理文章</a>
			</td>
		</tr>
		<tr>
			<td>系统信息:</td>
			<td><?php ;echo PHP_OS; ?>[<?php ;echo $_SERVER["SERVER_SOFTWARE"]; ?>]</td>
		</tr>
			</tr>
		
		<tr>
			<td>最大附件:</td>
			<td><?php echo ini_get('upload_max_filesize'); ?></td>
		</tr>
			</tr>
		
		<tr>
			<td>绝对路径:</td>
			<td><?php ;echo $_SERVER['DOCUMENT_ROOT']; ?></td>
		</tr>
			</tr>
		
		<tr>
			<td>剩余空间:</td>
			<td><?php echo round((@disk_free_space(".")/(1024*1024)),2) ?>M</td>
		</tr>
	</table>
	<table class="table table-bordered">
		<tr>
			<th colspan="2" >关于程序</th>
		</tr>
		<tr>
			<td width="182">系统名称:</td>
			<td width="614">网站内容管理系统</td>
		</tr>
		<tr>
			<td>当前版本:</td>
			<td><?php ;echo $GLOBALS['version']; ?> </td>
		</tr>
		<tr>
			<td>程序开发:</td>
			<td>Trlanfeng(孤月蓝风)</td>
		</tr>
		<tr>
			<td>下载相关:</td>
			<td><a href="#" target="_blank">模板下载</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" target="_blank">系统下载</a></td>
		</tr>
	</table>
</div>
<?php include($this->tpl->myTpl("footer","",'$this->tpl')); ?>