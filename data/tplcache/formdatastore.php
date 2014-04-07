<?php if(constant("TrackCMS!") !== true)die;?><?php include($this->tpl->myTpl("header","",'$this->tpl')); ?>
<form action="admin.php" method="post" enctype="multipart/form-data">
	<h2>恢复数据</h2>
	<div class="form-group">
		<input type="file" name="file" />
	</div>
	<div class="form-group">
		<input name="action" type="hidden" value="datastore" />
		<input name="ctrl" type="hidden" value="update" />
		<input class="btn btn-primary" type="submit" name="Submit" value="导入恢复" />
	</div>
	<p>导入数据后，如有url异常，请在后台重新生成文章url</p>
	<hr/>
	<h2>备份数据</h2>
	<table class="table table-bordered">
		<tr>
			<td>仅备份文章</td>
			<td>
				从第
				<input class="my-form-control" name="from" type="text" id="from"class="sinput"/>
				篇到第
				<input class="my-form-control" name="to" type="text" id="to" class="sinput"/>
				篇
				<input class="btn btn-primary" type="button" name="Submit2" value="生成备份" class="sinput" onclick="window.location.href='?action=datastore&ctrl=create&amp;bulist=cms&from='+$track('from').value+'&to='+($track('to').value-$track('from').value);return false;"/>
			</td>
		</tr>
		<tr>
			<td>仅备份除文章以外数据</td>
			<td>
				<a class="btn btn-primary" href="?action=datastore&amp;ctrl=create&amp;bulist=admin|category|comment|link|relations|relatocms">生成备份</a>
			</td>
		</tr>
		<tr>
			<td>全部备份</td>
			<td>
				<a class="btn btn-primary" href="?action=datastore&amp;ctrl=create&amp;bulist=admin|category|cms|comment|link|relations|relatocms">生成全部备份</a>
			</td>
		</tr>
	</table>
</form>
<?php include($this->tpl->myTpl("footer","",'$this->tpl')); ?>