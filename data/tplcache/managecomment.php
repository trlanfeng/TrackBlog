<?php if(constant("TrackCMS!") !== true)die;?><?php include($this->tpl->myTpl("header","",'$this->tpl')); ?>
<form action="admin.php" method="post" id="multctrl">
	<div class="form-group">
		<a class="btn btn-default" href="javascript:if(confirm('确认删除选中的评论？'))$track('multctrl').submit();">批量删除</a>
	</div>
	<table class="table table-bordered">
		<tr>
			<th><input type="checkbox"  onclick="VerifyRadio();"/></th>
			<th>时间</th>
			<th>留言者</th>
			<th>邮箱</th>
			<th>内容</th>
			<th >IP</th>
			<th >页面</th>
			<th>操作</th>
		</tr>
		<?php $_i=0;if(is_array($list))foreach($list AS $atl){$_i++; ?>
		<tr onmouseover="this.style.backgroundColor='#F4F4F4'" onmouseout="this.style.backgroundColor=''">
			<td align="center"><input name="id[]" type="checkbox" id="id[]" value="<?php ;echo $atl['id']; ?>" /></td>
			<td><?php ;echo date('Y-m-d H:i:s',$atl['times']);; ?></td>
			<td><?php if($atl['websites']){ ?><a href="<?php ;echo $atl['websites']; ?>" target="_blank" title="点击查看网址"><?php ;echo $atl['name']; ?></a><?php ;}else{ ?><?php ;echo $atl['name']; ?><?php ;} ?></td>
			<td><?php ;echo $atl['emails']; ?></td>
			<td><?php ;echo $atl['content']; ?></td>
			<td><?php ;echo $atl['ips']; ?></td>
			<td><?php $_iCMS=0;$QRCMS = $dbit->getquery(TB."cms|id=$atl[article_id]|1||staticurl,name"); while($listCMS = $dbit->fetch_array($QRCMS)){$_iCMS++; ?> 
				<a target="_blank" href="../<?php ;echo $listCMS['staticurl']; ?>"><?php ;echo $listCMS['name']; ?></a> 
				<?php ;} ?></td>
			<td><a href="?action=comment&id=<?php ;echo $atl['id']; ?>&ctrl=del" onclick="return confirm('确认删除')">删除</a></td>
		</tr>
		<?php ;} ?>
	</table>
	<input type="hidden" name="action" value="comment" />
	<input type="hidden" name="ctrl" value="del" />
</form>
<div class="text-center"> 
	<ul class="pagination">
		<li class="<?php if(($page==0) || ($page==1)){ ?>disabled<?php ;} ?>"><a <?php if(($page!=0) && ($page!=1)){ ?>href="?action=comment&ctrl=lists&p=<?php ;echo $uppage; ?>"<?php ;} ?> >&laquo;</a></li>
		<?php for($i=1;$i<$pagenum;$i++){ ?>
		<li id="page<?php ;echo $i; ?>"><a href="?action=comment&ctrl=lists&p=<?php ;echo $i; ?>"><?php ;echo $i; ?></a></li>
		<?php ;} ?>
		<li class="<?php if($downpage==$page){ ?>disabled<?php ;} ?>"><a <?php if($downpage!=$page){ ?>href="?action=comment&ctrl=lists&p=<?php ;echo $downpage; ?>"<?php ;} ?>>&raquo;</a></li>
	</ul>
	<script>
		thispage = "<?php ;echo $_GET['p']; ?>";
		if(thispage == "0" || thispage == "") {thispage = "1"}
		$(function(){
			$("#page"+thispage).addClass("active");
		});
	</script>
</div>
<?php include($this->tpl->myTpl("footer","",'$this->tpl')); ?>