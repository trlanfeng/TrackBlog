<?php if(constant("TrackCMS!") !== true)die;?><?php include($this->tpl->myTpl("header","",'$this->tpl')); ?>
<div class="form-group">
	<a class="btn btn-default" href="?action=admin&ctrl=add">+添加</a>
</div>
</div>
<table class="table table-bordered">
	<tr>
		<th width="10%">ID</th>
		<th>用户名</th>
		<th width="40%">权限</th>
		<th width="10%">状态</th>
		<th>操作</th>
	</tr>
	<?php $_i=0;if(is_array($list))foreach($list AS $atl){$_i++; ?>
	<tr>
		<td><?php ;echo $atl['id']; ?></td>
		<td><a href="?action=admin&id=<?php ;echo $atl['id']; ?>&ctrl=edit"><?php ;echo $atl['name']; ?></a></td>
		<td><?php ;$authlist=array();$authlist=explode('|',$atl['auth']);; ?>
			
			<?php ;echo $cats[$authlist[1]]['name']; ?><?php ;echo $admins[$authlist[0]]; ?> </td>
		<td><?php ;echo Base::catstatus($atl['status']);; ?></td>
		<td>
			<a href="?action=admin&id=<?php ;echo $atl['id']; ?>&ctrl=edit">编辑</a>&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="?action=admin&id=<?php ;echo $atl['id']; ?>&ctrl=del" onclick="return confirm('确认删除')">删除</a>
		</td>
	</tr>
	<?php ;} ?>
</table>
<?php include($this->tpl->myTpl("footer","",'$this->tpl')); ?>