<?php if(constant("TrackCMS!") !== true)die;?><?php include($this->tpl->myTpl("header","",'$this->tpl')); ?>
<form action="admin.php" method="post">
	<div class="form-group">
		<label>输入要执行的SQL语句<span class="text-danger">（谨慎操作，操作不可恢复）</span></label>
		<textarea class="form-control" name="sqltext" rows="20" style="width:100%"></textarea>
	</div>
	<div class="form-group">
		<input name="action" type="hidden" value="sql" />
		<input name="ctrl" type="hidden" value="excute" />
		<input class="btn btn-primary" type="submit" name="Submit" id="submits" value="执行SQL" />
	</div>
</form>
<?php include($this->tpl->myTpl("footer","",'$this->tpl')); ?>