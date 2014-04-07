<?php if(constant("TrackCMS!") !== true)die;?><?php include($this->tpl->myTpl("header","",'$this->tpl')); ?>
<form action="admin.php" method="post">
	<div class="form-group">
		<label class="control-label">栏目名称：</label>
		<input class="form-control" name="name" type="text" id="name"  value="<?php ;echo $o['name']; ?>"/>
	</div>
    <div class="form-group">
		<label class="control-label">SEO关键词：</label>
		<input class="form-control" name="keywords" type="text" id="keywords"  value="<?php ;echo $o['keywords']; ?>"/>
	</div>
    <div class="form-group">
		<label class="control-label">SEO描述：</label>
		<textarea class="form-control" rows="3" name="description" id="description"><?php ;echo $o['description']; ?></textarea>
	</div>
	<div class="form-group">
		<label class="control-label">栏目别名：</label>
		<input class="form-control" name="nickname" type="text" id="nickname"  value="<?php ;echo $o['nickname']; ?>"/>
	</div>
	<div class="form-group">
		<label class="control-label">上级栏目：</label>
		<SELECT class="form-control"  name="fid" id="fid">
			<option value="">未分组</option>
			<?php $_i=0;if(is_array($category))foreach($category AS $atl){$_i++; ?> 
			<option value="<?php ;echo $atl['id']; ?>"  <?php if($atl['id']==$o['fid']){ ?>selected<?php ;} ?> ><?php ;echo $atl['name']; ?>
					
			</option>
			<?php ;} ?>
		</SELECT>
	</div>
	<div class="form-group">
		<label class="control-label">首页模板：</label>
		<SELECT class="form-control"  name="cattpl" id="cattpl">
			<option value="">默认模板</option>
			<?php $_i=0;if(is_array($tpllist))foreach($tpllist AS $tpls){$_i++; ?> 
			<option value="<?php ;echo $tpls; ?>"  <?php if($tpls==$o['cattpl']){ ?>selected<?php ;} ?> ><?php ;echo $tpls; ?>
					
			</option>
			<?php ;} ?>
		</SELECT>
	</div>
	<div class="form-group">
		<label class="control-label">列表页模板：</label>
		<SELECT class="form-control"  name="listtpl" id="listtpl">
			<option value="">默认模板</option>
			<?php $_i=0;if(is_array($tpllist))foreach($tpllist AS $tpls){$_i++; ?> 
			<option value="<?php ;echo $tpls; ?>"  <?php if($tpls==$o['listtpl']){ ?>selected<?php ;} ?> ><?php ;echo $tpls; ?>
					
			</option>
			<?php ;} ?>
		</SELECT>
	</div>
	<div class="form-group">
		<label class="control-label">内容页模板：</label>
		<SELECT class="form-control"  name="distpl" id="distpl">
			<option value="">默认模板</option>
			<?php $_i=0;if(is_array($tpllist))foreach($tpllist AS $tpls){$_i++; ?> 
			<option value="<?php ;echo $tpls; ?>"  <?php if($tpls==$o['distpl']){ ?>selected<?php ;} ?> ><?php ;echo $tpls; ?>
					
			</option>
			<?php ;} ?>
		</SELECT>
	</div>
	<div class="form-group">
		<label class="control-label">栏目描述：</label>
		<textarea class="form-control" rows="3" name="intro" id="intro"><?php ;echo $o['intro']; ?></textarea>
	</div>
	<div class="form-group">
		<label class="control-label">排序：</label>
		<input class="form-control" name="orders" type="text" id="orders" value="<?php ;echo $o['orders']; ?>" />
	</div>
	<div class="form-group">
		<label class="control-label">状态：</label>
		<SELECT class="form-control"  name="status" id="status">
			<option value="0" >隐藏</option>
			<option value="1" selected >显示</option>
		</SELECT>
	</div>
	<div class="form-group">
		<input name="action" type="hidden" value="category" />
		<input name="id" type="hidden" value="<?php ;echo $o['id']; ?>" />
		<input name="ctrl" type="hidden" value="<?php ;echo $goctrl; ?>" />
		<input class="btn btn-primary" type="submit" name="Submit" id="submits" value="提交" />
	</div>
</form>
<script>
SelectItemByValue($track('status'),<?php ;echo $o['status']; ?>);
</script> 
<?php include($this->tpl->myTpl("footer","",'$this->tpl')); ?>