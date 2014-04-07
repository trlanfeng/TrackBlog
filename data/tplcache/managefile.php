<?php if(constant("TrackCMS!") !== true)die;?><?php include($this->tpl->myTpl("header","",'$this->tpl')); ?>
<form action="admin.php" method="get" id="toolform" enctype="multipart/form-data">
	<div class="form-group">
		<label>当前位置：</label>
		<input class="my-form-control" name="path" type="text" id="path" value="<?php ;echo $path; ?>" />
		<input type="hidden" name="action" value="file" />
		<input type="hidden" name="ctrl" id="toolctrl" value="lists" />
		<input type="hidden" name="isdir" id="isdir" value="1" />
		<input class="btn btn-default" name="submit" type="submit" id="submit" value="进入" />
		<label style="margin-left: 20px;">新建：</label>
		<input class="my-form-control" name="name" type="text" id="name" size="15" />
		<input class="btn btn-default" name="fbtn" type="submit" id="fbtn" value="新建文件"  onclick="$track('toolctrl').value='create';$track('isdir').value='0';"/>
		<input class="btn btn-default" type="submit" name="Submit" value="新建文件夹"  onclick="$track('toolctrl').value='create';" />
		<a class="btn btn-success" href="#" class="linkbtn" onclick="if(!window.open('admin.php?action=file&amp;ctrl=upload&path=<?php ;echo $path; ?>','filewindow', 'height=100, width=350, top=400, left=400'))alert('无法弹出上传窗口窗口，你可以尝试点击浏览器上方出现的黄色提示条，选择“临时允许弹出窗口”');">上传</a>
		<div class="btn-group pull-right">
			<button type="button" class="btn btn-primary" onclick="history.go(-1)">后退</button>
			<button type="button" class="btn btn-primary" onclick="history.go(+1)">前进</button>
			<button type="button" class="btn btn-primary" onclick="window.location.reload();">刷新</button>
		</div>
	</div>
</form>
<table class="table table-bordered">
	<tr>
		<th >文件名称</th>
		<th >修改时间</th>
		<th>文件大小</th>
		<th>操作</th>
	</tr>
	<?php $_i=0;if(is_array($dirdata))foreach($dirdata AS $dirs){$_i++; ?>
	<tr onmouseover="this.style.backgroundColor='#F4F4F4'" onmouseout="this.style.backgroundColor=''">
		<td><a href="?action=file&ctrl=lists&path=<?php ;echo $dirs['path']; ?>"><?php ;echo $dirs['name']; ?></a></td>
		<td><?php ;echo $dirs['mtime']; ?></td>
		<td><?php ;echo $dirs['size']; ?></td>
		<td><a href="?action=file&amp;ctrl=lists&amp;path=<?php ;echo $dirs['path']; ?>">进入</a> · <a href="?action=file&amp;ctrl=del&amp;path=<?php ;echo $dirs['path']; ?>" onclick="return confirm('确认删除')">删除</a></td>
	</tr>
	<?php ;} ?> 
	<?php $_i=0;if(is_array($filedata))foreach($filedata AS $files){$_i++; ?>
	<tr onmouseover="this.style.backgroundColor='#F4F4F4'" onmouseout="this.style.backgroundColor=''">
		<td><a href="?action=file&ctrl=edit&path=<?php ;echo $files['path']; ?>"><?php ;echo $files['name']; ?></a></td>
		<td><?php ;echo $files['mtime']; ?></td>
		<td><?php ;echo $files['size']; ?></td>
		<td><a href="?action=file&amp;ctrl=download&amp;path=<?php ;echo $files['path']; ?>">下载</a> · <a href="?action=file&amp;ctrl=edit&amp;path=<?php ;echo $files['path']; ?>">编辑</a> · <a href="?action=file&amp;ctrl=del&amp;path=<?php ;echo $files['path']; ?>" onclick="return confirm('确认删除')">删除</a></td>
	</tr>
	<?php ;} ?>
</table>
<?php include($this->tpl->myTpl("footer","",'$this->tpl')); ?>