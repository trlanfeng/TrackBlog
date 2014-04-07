<?php if(constant("TrackCMS!") !== true)die;?><?php include($this->tpl->myTpl("header","",'$this->tpl')); ?>
<div class="form-group">
	<a class="btn btn-default" href="?action=category&ctrl=add">+添加</a>
	<?php if(CREATHTML==1){ ?><a class="btn btn-default" href="?action=category&ctrl=createhtml">生成栏目静态</a><?php ;} ?>
	<a class="btn btn-default" href="?action=category&ctrl=updateurl" onclick="return confirm('确认重置URL？本操作将根据设定的url规则重新生成url')">重置URL</a>
	<a class="btn btn-default" href="?action=category&ctrl=createcache">生成栏目缓存</a>
</div>
<table class="table table-bordered">
	<tr>
		<th width="60">ID</th>
		<th width="60">排序</th>
		<th width="120">栏目</th>
		<th>介绍</th>
		<th width="60">状态</th>
		<th width="140">操作</th>
	</tr>
	<?php $_i=0;if(is_array($list))foreach($list AS $atl){$_i++; ?>
	<tr onmouseover="this.style.backgroundColor='#F4F4F4'" onmouseout="this.style.backgroundColor=''">
		<td><?php ;echo $atl['id']; ?></td>
		<td><?php ;echo $atl['orders']; ?></td>
		<td><a href="?action=category&id=<?php ;echo $atl['id']; ?>&ctrl=edit"><?php ;echo $atl['name']; ?></a></td>
		<td><?php ;echo $atl['intro']; ?></td>
		<td><?php ;echo Base::catstatus($atl['status']);; ?></td>
		<td>
			<a href="?action=cms&ctrl=lists&cat=<?php ;echo $atl['id']; ?>">文章</a>&nbsp;&nbsp;&nbsp;
			<a href="?action=category&id=<?php ;echo $atl['id']; ?>&ctrl=edit">编辑</a>&nbsp;&nbsp;&nbsp;
			<a href="?action=category&id=<?php ;echo $atl['id']; ?>&ctrl=del" onclick="return confirm('确认删除')">删除</a>
		</td>
	</tr>
	<?php ;} ?>
</table>

<!-- 用于判断提示检测的方法$_i==0 --> 
<?php if($_i==0){ ?>
<div style="clear:both;";>抱歉，没有栏目，请先添加!</div>
<?php ;} ?> 
<?php include($this->tpl->myTpl("footer","",'$this->tpl')); ?>