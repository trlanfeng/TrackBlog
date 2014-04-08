<?php if(constant("TrackCMS!") !== true)die;?><ul id="mainnav">
	<li><a id="nav_frame_main" href="admin.php?action=frame&ctrl=main">管理首页</a></li>
	<?php if(CREATHTML==1){ ?>
	<li><a href="../index.php?createprocess=1">生成首页</a></li>
	<?php ;} ?>
	<li><span class="bignav" >文章管理</span></li>
	<li><a id="nav_cms_add" href="admin.php?action=cms&ctrl=add">添加文章</a></li>
	<li><a id="nav_cms_lists" href="admin.php?action=cms&ctrl=lists">管理文章</a></li>
	<?php if($_SESSION[TB.'admin_level']=='admin'){ ?>
	<li><a id="nav_category" href="admin.php?action=category&ctrl=lists">管理栏目</a></li>
	<li><a id="nav_spider" href="admin.php?action=spider&ctrl=display">采集管理</a></li>
	<li><span class="bignav"  >数据管理</span></li>
	<li><a id="nav_sql" href="admin.php?action=sql&ctrl=display">执行SQL</a></li>
	<?php if(DB=='Sqlite'){ ?>
	<li><a href="../<?php ;echo dbname; ?>" onclick="return confirm('确认下载数据库？完全备份\n还要备份pictures目录及文件。恢复\n只需要将数据库文件和pictures目录下的文件还原即可')">备份Sqlite库</a></li>
	<?php ;} ?>
	<li><span class="bignav"  >其他管理</span></li>
	<li><a id="nav_comment" href="admin.php?action=comment&ctrl=lists">管理评论</a></li>
	<li><a id="nav_link" href="admin.php?action=link&ctrl=lists">友情链接</a></li>
	<li><a id="nav_admin" href="admin.php?action=admin&ctrl=lists">人员管理</a></li>
	<li><a id="nav_file" href="admin.php?action=file&ctrl=lists">文件管理</a></li>
	<li><span class="bignav"  >综合设置</span></li>
	<li><a id="nav_datastore" href="admin.php?action=datastore&ctrl=display">导入导出</a></li>
	<li><a id="nav_config" href="admin.php?action=config&ctrl=display"  >网站设置</a></li>
	<?php ;} ?>
	<li><a href="../" target="_blank">网站首页</a></li>
	<li><span class="bignav" >个人管理</span></li>
	<li><a id="nav_user" href="admin.php?action=user&ctrl=mod">账户修改</a></li>
	<li><a href="admin.php?action=frame&ctrl=logout"  >退出登录</a></li>
	<script type="text/javascript">
		action = "<?php ;echo $_GET['action']; ?>";
		ctrl = "<?php ;echo $_GET['ctrl']; ?>";
		if (action == "cms") {
			if (ctrl == "add") {
				$("#nav_cms_add").addClass('on');
			} else {
				$("#nav_cms_lists").addClass('on');
			}
		} else {
			$("#nav_"+action).addClass('on');
		}
	</script>
</ul>
