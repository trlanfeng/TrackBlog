<?php if(constant("TrackCMS!") !== true)die;?><?php include($this->tpl->myTpl("header","",'$this->tpl')); ?>
<form action="admin.php" method="post" class="form-horizontal">
	<table class="table table-bordered">
	<tr>
		<td>网站名称</td>
		<td>
			<input class="form-control" name="WEBNAME" type="text" id="WEBNAME" title="前台页面显示的网站名称" value="<?php ;echo $webname; ?>"/>
		</td>
	</tr>
	<tr>
		<td>网站网址</td>
		<td>
			<input class="form-control" name="WEBURL" type="text" id="WEBURL"  title="前台页面网址"  value="<?php ;echo $weburl; ?>"/>
			<span class="help-block">说明：以http://开头，/结束，建议填写<?php ;echo $webbaseurl; ?></span>
		</td>
	</tr>
	<tr>
		<td>网站简介</td>
		<td>
			<textarea class="form-control" rows="4" name="WEBINFO" id="WEBINFO"  title="前台页面网站介绍" ><?php ;echo $webinfo; ?></textarea>
		</td>
	</tr>
	<tr>
		<td>网站公告</td>
		<td>
			<textarea class="form-control" rows="4" name="ANNOUNCE" id="ANNOUNCE" title="前台页面网站公告" ><?php ;echo $announce; ?></textarea>
		</td>
	</tr>
	<tr>
		<td>后台目录</td>
		<td>
			<input class="form-control" name="ADMINDIR" type="text" id="ADMINDIR" title="后台相对地址，你可以修改本参数，然后修改admin文件夹名" value="<?php ;echo $admindir; ?>"/>
		</td>
	</tr>
	<tr>
		<td>时间休正</td>
		<td>
			<input class="form-control" name="TIMEMOD" type="text" id="TIMEMOD" title="修正服务器时间，正数为服务器时间+修正小时" value="<?php ;echo $timemod; ?>"/>
			<a name="times" id="times"></a>
			<span class="help-block">(当前：<?php ;echo $nowtime; ?>，修正后：<?php ;echo $modtime; ?>)</span>
		</td>
	</tr>
	<tr>
		<td>每页文章数</td>
		<td>
			<input class="form-control" name="EACHPAGE" type="text" id="EACHPAGE" title="每页显示的文章数目，影响后台列表、前台列表" value="<?php ;echo $eachpage; ?>"/>
		</td>
	</tr>
	<tr>
		<td>文本编辑器</td>
		<td>
			<select class="form-control" name="TRACKEDITOR" id="TRACKEDITOR"  title="文章编辑页面的编辑器，选择非官方默认编辑器需要下载安装包" >
				<option value="1">Ueditor Mini</option>
	            <option value="2">Ueditor</option>
	            <option value="3">KindEditor</option>
	            <option value="4">xhEditor</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>代码高亮</td>
		<td>
			<select class="form-control" name="EDITORHL" id="EDITORHL"  title="文章的代码高亮方式，支持Ueditor和KindEditor两种模式" >
	            <option value="1">无</option>
	            <option value="2">Ueditor</option>
	            <option value="3">KindEditor</option>
	            <option value="4">全部</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>是否调试</td>
		<td>
			<select class="form-control" name="TRACKDEBUG" id="TRACKDEBUG" title="是否显示服务器的全部报错信息" >
				<option value="1">是</option>
				<option value="0">否</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>系统目录</td>
		<td>
			<input class="form-control" name="SYS_ROOT" type="text" id="SYS_ROOT" title="系统所在的目录的绝对地址" value="<?php ;echo $sys_root; ?>"/>
			<span class="help-block">(当前：<?php ;echo $local; ?>)</span>
		</td>
	</tr>
	<tr>
		<td>缓存地址</td>
		<td>
			<input class="form-control" name="CACHE" type="text" id="CACHE" title="缓存文件夹的相对地址" value="<?php ;echo $cache; ?>"/>
		</td>
	</tr>
	<tr>
		<td>模板缓存时间（秒）</td>
		<td>
			<input class="form-control" title="模板重新编译的时间间隔，如不修改模板，建议设为一个很大的间隔时间。" name="CACHELAST" type="text" id="CACHELAST"  value="<?php ;echo $cachelast; ?>"/>
		</td>
	</tr>
	<tr>
		<td>include目录</td>
		<td>
			<input class="form-control" name="INC" type="text" id="INC" title="系统核心文件所在相对目录，不建议修改" value="<?php ;echo $inc; ?>"/>
		</td>
	</tr>
	<tr>
		<td>数据库类型</td>
		<td>
			<select class="form-control" name="DB" id="DB" title="修改数据库类型，不建议修改" >
				<option value="Sqlite">Sqlite</option>
				<option value="Mysql">Mysql</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>数据库地址</td>
		<td>
			<input class="form-control" name="DB_NAME" type="text" id="DB_NAME"  value="<?php ;echo $db_name; ?>" title="说明:Sqlite数据库直接写库文件地址，Mysql则按配置规则：”数据库地址|用户名|密码|数据库名“填写。如“localhost|root|root|TrackCMS”"/>
		</td>
	</tr>
	<tr>
		<td>Memcache配置</td>
		<td>
			<input class="form-control" name="MEMCACHE" type="text" id="MEMCACHE"  value="<?php ;echo $memcache; ?>" title="说明:不使用Memcache请留空。配置规则：“Memcache服务器IP|端口|超时时间(可以不写)“，例如“127.0.0.1|11211”"/>
			<a class="btn btn-default" href="admin.php?action=config&amp;ctrl=memflush" onclick="return confirm('确认清空Memcache缓存？')">清空缓存</a>
		</td>
	</tr>
	<tr>
		<td>数据表前缀</td>
		<td><input class="form-control" name="TB" type="text" id="TB" title="数据表前缀，不建议修改" value="<?php ;echo $tb; ?>"/></td>
	</tr>
	<tr>
		<td>生成纯静态</td>
		<td>
			<select class="form-control" name="CREATHTML" id="CREATHTML" title="是否生成纯静态，选择后菜单中会出现生成静态选项" >
				<option value="1">是</option>
				<option value="0">否</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>文章点击统计</td>
		<td>
			<select class="form-control" name="VIEWSCOUNT" id="VIEWSCOUNT" title="是否统计文章点击次数" >
				<option value="1">是</option>
				<option value="0">否</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>栏目URL</td>
		<td>
			<input class="form-control" name="CATURL" type="text" id="CATURL"  value='<?php ;echo $caturl; ?>' title="栏目URL修改后，请到管理栏目重新生成URL，否则栏目URL不发生变化"/>
			<span class="help-block">说明：{<?php ;echo id; ?>}栏目ID，{<?php ;echo catname; ?>}栏目别名，例如：{<?php ;echo catname; ?>}/{<?php ;echo id; ?>}.html</span>
		</td>
	</tr>
	<tr>
		<td>文章URL</td>
		<td>
			<input class="form-control" name="ATLURL" type="text" id="ATLURL"  value='<?php ;echo $atlurl; ?>' title="文章URL修改后，请到管理文章重新生成URL，否则文章URL不发生变化"/>
			<span class="help-block">说明：{<?php ;echo Y; ?>}年{<?php ;echo m; ?>}月{<?php ;echo d; ?>}日，{<?php ;echo id; ?>}文章ID，{<?php ;echo slug; ?>}文章别名，{<?php ;echo catname; ?>}栏目别名，如{<?php ;echo catname; ?>}/{<?php ;echo Y; ?>}/{<?php ;echo m; ?>}/{<?php ;echo id; ?>}.html</span>
		</td>
	</tr>
	<tr>
		<td>模板</td>
		<td>
			<SELECT class="form-control" name="THEME" id="THEME" title="选择不同模板，网站呈现不同的样式" >
				<?php $_i=0;if(is_array($themelist))foreach($themelist AS $tv){$_i++; ?> 
				<?php if($tv."/"==$theme){ ?>selected<?php ;} ?> ><?php ;echo $tv; ?><?php if($tv."/"==$theme){ ?>selected<?php ;} ?> ><?php ;echo $tv; ?><option value="<?php ;echo $tv; ?>/" <?php if($tv."/"==$theme){ ?>selected<?php ;} ?> ><?php ;echo $tv; ?>
				</option>
				<?php ;} ?>
			</SELECT>
		</td>
	</tr>
	</table>
	<input name="action" type="hidden" value="config" />
	<input name="ctrl" type="hidden" value="update" />
	<input class="btn btn-primary" type="submit" name="Submit" id="submits" value="保存配置" />
</form>
<script language="javascript">
SelectItemByValue($track('CREATHTML'),<?php ;echo $creathtml; ?>);
SelectItemByValue($track('TRACKDEBUG'),<?php ;echo $trackdebug; ?>);
SelectItemByValue($track('TRACKEDITOR'),<?php ;echo $trackeditor; ?>);
SelectItemByValue($track('EDITORHL'),<?php ;echo $editorhl; ?>);
SelectItemByValue($track('VIEWSCOUNT'),<?php ;echo $viewscount; ?>);
SelectItemByValue($track('DB'),'<?php ;echo $db; ?>');
<?php ;if( RUNONSAE ||RUNONBAE )
	{
	echo '
	alert("在SAE/BAE环境下，无法修改配置，请手动修改config.php");
	';
	
	}; ?>

if($track('WEBURL').value=='./'){
	alert('请设置网站地址！');
	$track('WEBURL').focus();
	
}
</script> 
<?php include($this->tpl->myTpl("footer","",'$this->tpl')); ?>