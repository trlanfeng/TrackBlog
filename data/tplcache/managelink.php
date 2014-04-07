<?php if(constant("TrackCMS!") !== true)die;?><?php include($this->tpl->myTpl("header","",'$this->tpl')); ?>
<div class="form-group">
	<a class="btn btn-default" href="?action=link&ctrl=add">+添加</a>
</div>
<table class="table table-bordered">
	<tr>
		<th>ID</th>
		<th>链接名称</th>
		<th>状态</th>
		<th >排序</th>
		<th>描述</th>
		<th >操作</th>
	</tr>
	<?php $_i=0;if(is_array($list))foreach($list AS $atl){$_i++; ?>
	<tr onmouseover="this.style.backgroundColor='#F4F4F4'" onmouseout="this.style.backgroundColor=''">
		<td><?php ;echo $atl['id']; ?></td>
		<td><a href="?action=link&id=<?php ;echo $atl['id']; ?>&ctrl=edit"  ><?php ;echo $atl['name']; ?></a></td>
		<td><?php ;echo Base::catstatus($atl['status']);; ?></td>
		<td><?php ;echo $atl['orders']; ?></td>
		<td><?php ;echo $atl['content']; ?></td>
		<td><a href="?action=link&id=<?php ;echo $atl['id']; ?>&ctrl=edit"  >编辑</a>·<a href="?action=link&id=<?php ;echo $atl['id']; ?>&ctrl=del" onclick="return confirm('确认删除')">删除</a></td>
	</tr>
	<?php ;} ?>
</table>
<?php include($this->tpl->myTpl("footer","",'$this->tpl')); ?>