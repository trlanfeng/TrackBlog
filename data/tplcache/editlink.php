<?php if(constant("TrackCMS!") !== true)die;?><?php include($this->tpl->myTpl("header","",'$this->tpl')); ?>
	<form action="admin.php" method="post">
		<div class="form-group">
			<label>链接名称：</label>
			<input class="form-control" name="name" type="text" id="name" value="<?php ;echo $o['name']; ?>" />
		</div>
		<div class="form-group">
			<label>链接地址:</label>
			<input class="form-control" name="urls" type="text" id="urls" value="<?php ;echo $o['urls']; ?>" />
		</div>
		<div class="form-group">
			<label>链接描述:</label>
			<textarea class="form-control" rows="3" name="content" id="content"><?php ;echo $o['content']; ?></textarea>
		</div>
		<div class="form-group">
			<label>排序:</label>
			<input class="form-control" name="orders" type="text" id="orders" value="<?php ;echo $o['orders']; ?>" />
		</div>
		<div class="form-group">
			<label>状态:</label>
			<SELECT class="form-control" name="status" id="status">
				<option value="0" >隐藏</option>
				<option value="1" selected >显示</option>
			</SELECT>
		</div>
		<div class="form-group">
			<input name="action" type="hidden" value="link" />
			<input name="id" type="hidden" value="<?php ;echo $o['id']; ?>" />
			<input name="ctrl" type="hidden" value="<?php ;echo $goctrl; ?>" />
			<input class="btn btn-primary" type="submit" name="Submit" id="submits" value="提交" />
		</div>
	</form>
<?php include($this->tpl->myTpl("footer","",'$this->tpl')); ?>