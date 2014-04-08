<?php if(constant("TrackCMS!") !== true)die;?><?php include($this->tpl->myTpl("header","",'$this->tpl')); ?>
<form action="admin.php" method="get">
	<div class="form-group">
		<input class="form-control" style="width:300px;float:left;margin-right:10px;" name="name" type="text" id="name" value="<?php ;echo $_GET['name']; ?>" />
		<select class="form-control" name="status" id="status" style="width:100px;float:left;margin-right:10px;">
			<option value="">全部</option>
			<option value="0" <?php if($_GET['status']=='0'){ ?>selected="selected"<?php ;} ?>>草稿</option>
			<option value="1" <?php if($_GET['status']=='1'){ ?>selected="selected"<?php ;} ?>>发表</option>
			<option value="-1" <?php if($_GET['status']=='-1'){ ?>selected="selected"<?php ;} ?>>隐藏</option>
		</select>
		<select class="form-control" name="cat" id="cat" style="width:100px;float:left;margin-right:10px;">
			<?php $_i=0;if(is_array($cats))foreach($cats AS $key=> $v){$_i++; ?>
			<option value="<?php ;echo $key; ?>"><?php ;echo $v['name']; ?></option>
			<?php ;} ?>
		</select>
		<input type="hidden" name="action" value="cms" />
		<input type="hidden" name="ctrl" value="lists" />
		<input class="btn btn-default" name="submit" type="submit" id="submit" value="查询"/>
	</div>
</form>
<form action="admin.php" method="post" id="multctrl">
	<div class="form-group">
		<a class="btn btn-default" href="?action=cms&ctrl=add">+添加</a>
		<?php if(CREATHTML==1){ ?><a class="btn btn-default" href="?action=cms&ctrl=createhtml">生成文章静态</a><?php ;} ?>
		<a class="btn btn-default" href="?action=cms&ctrl=updateurl" onclick="return confirm('确认重置URL？本操作将根据设定的url规则重新生成url')">重置URL</a>
		<a class="btn btn-default" href="javascript:if(confirm('确认删除选中的文章？'))$track('multctrl').submit();">批量删除</a>
		<a class="btn btn-default" href="javascript:void(0);" onclick="$track('tocat').style.display='block';">批量移动</a>
		<select class="form-control hide" name="cat" id="tocat" onchange="$track('ctrl').value='tocat';$track('catid').value=this.value;$track('multctrl').submit()" >
			<?php $_i=0;if(is_array($cats))foreach($cats AS $a){$_i++; ?> 
			<option value="<?php ;echo $a['id']; ?>" <?php if($a['id']==$o['cat']){ ?>selected<?php ;} ?> >到<?php ;echo $a['name']; ?></option>
			<?php ;} ?>
		</select>
	</div>
	<table class="table table-bordered">
		<tr>
			<th width="20"><input type="checkbox" onclick="VerifyRadio();"/></th>
			<th width="60">ID</th>
			<th>标题</th>
			<th width="80">栏目</th>
			<th width="60">状态</th>
			<th width="60">评论</th>
			<th width="60">排序</th>
			<th width="140">操作</th>
		</tr>
		<?php $_i=0;if(is_array($list))foreach($list AS $atl){$_i++; ?>
		<tr onmouseover="this.style.backgroundColor='#F4F4F4'" onmouseout="this.style.backgroundColor=''">
			<td><input name="id[]" type="checkbox" id="id[]" value="<?php ;echo $atl['id']; ?>" /></td>
			<td><?php ;echo $atl['id']; ?></td>
			<td><a title="点击编辑《<?php ;echo $atl['name']; ?>》" href="?action=cms&id=<?php ;echo $atl['id']; ?>&ctrl=edit"><?php ;echo $atl['name']; ?></a></td>
			<td><a href="?action=cms&ctrl=lists&cat=<?php ;echo $atl['cat']; ?>"><?php ;echo $cats[$atl['cat']]['name']; ?></a></td>
			<td><?php ;echo Base::mystatus($atl['status']);; ?></td>
			<td><?php ;echo Base::cmstatus($atl['allowcmt']);; ?></td>
			<td><?php ;echo $atl['orders']; ?></td>
			<td>
				<a href="../<?php ;echo $atl['staticurl']; ?>" target="_blank">查看</a>&nbsp;&nbsp;&nbsp;
				<a href="?action=cms&id=<?php ;echo $atl['id']; ?>&ctrl=edit">编辑</a>&nbsp;&nbsp;&nbsp;
				<a href="?action=cms&id=<?php ;echo $atl['id']; ?>&ctrl=del" onclick="return confirm('确认删除《<?php ;echo $atl['name']; ?>》')">删除</a>
				<?php if(CREATHTML==1){ ?>&nbsp;&nbsp;&nbsp;<a href="../index.php?createprocess=1&id=<?php ;echo $atl['id']; ?>&single=1">生成静态</a><?php ;} ?>
			</td>
		</tr>
		<?php ;} ?>
	</table>
	<input type="hidden" name="catid" id="catid" value="0" />
	<input type="hidden" name="action" value="cms" />
	<input type="hidden" name="ctrl" id="ctrl" value="del" />
</form>
<div class="text-center"> 
	<ul class="pagination">
		<li class="<?php if(($page==0) || ($page==1)){ ?>disabled<?php ;} ?>"><a <?php if(($page!=0) && ($page!=1)){ ?>href="?action=cms&ctrl=lists&p=<?php ;echo $uppage; ?>&cat=<?php ;echo $_GET['cat']; ?>&status=<?php ;echo $_GET['status']; ?>&name=<?php ;echo $_GET['name']; ?>"<?php ;} ?> >&laquo;</a></li>
		<?php for($i=1;$i<$pagenum;$i++){ ?>
		<li id="page<?php ;echo $i; ?>"><a href="?action=cms&ctrl=lists&p=<?php ;echo $i; ?>&cat=<?php ;echo $_GET['cat']; ?>&status=<?php ;echo $_GET['status']; ?>&name=<?php ;echo $_GET['name']; ?>"><?php ;echo $i; ?></a></li>
		<?php ;} ?>
		<li class="<?php if($downpage==$page){ ?>disabled<?php ;} ?>"><a <?php if($downpage!=$page){ ?>href="?action=cms&ctrl=lists&p=<?php ;echo $downpage; ?>&cat=<?php ;echo $_GET['cat']; ?>&status=<?php ;echo $_GET['status']; ?>&name=<?php ;echo $_GET['name']; ?>"<?php ;} ?>>&raquo;</a></li>
	</ul>
	<script>
		thispage = "<?php ;echo $_GET['p']; ?>";
		if(thispage == "0" || thispage == "") {thispage = "1"}
		$(function(){
			$("#page"+thispage).addClass("active");
		});
	</script>
</div>
<?php if($_i==0){ ?>
<div style="clear:both;">抱歉，没有文章数据，请先添加!</div>
<?php ;} ?> 
<?php include($this->tpl->myTpl("footer","",'$this->tpl')); ?>