<?php if(constant("TrackCMS!") !== true)die;?><?php include($this->tpl->myTpl("header","",'$this->tpl')); ?>
<form action="admin.php" method="get">
	<table class="table table-bordered">
		<tr>
			<td>采集地址：</td>
			<td style="vertical-align: middle;">
				<input class="my-form-control" name="front" type="text" style=" width:300px;" id="front"  value="http://xiaoxixi.sinaapp.com/?id-" size="40"/>
				(
				<input class="my-form-control" name="start" type="text" id="start" style=" width:60px;" value="1500" size="10"/>
				到
				<input class="my-form-control" name="rend" type="text" id="rend" style=" width:60px;"  value="1550" size="10"/>
				)
				<input class="my-form-control" name="back" type="text" id="back" style=" width:100px;"  value=".htm" size="15"/>
			</td>
		</tr>
		<tr>
			<td>每次采集页数：</td>
			<td>
				<input class="form-control" name="each" type="text" id="each"  value="1"/>
			</td>
		</tr>
		<tr>
			<td>字符编码：</td>
			<td>
				<input class="form-control" name="basecode" type="text" id="basecode"  value="utf-8"/>
			</td>
		</tr>
		<tr>
			<td>标题采集规则：</td>
			<td>
				<textarea class="form-control" name="titlepreg" cols="40" id="titlepreg"><title>[title]</title></textarea>
				<span class="help-block">[title]为标题标签</span>
			</td>
		</tr>
		<tr>
			<td>内容采集规则：</td>
			<td>
				<textarea class="form-control" name="contentpreg" cols="40" id="contentpreg"><span class="smalltxt">[content]<div id="digit"></textarea>
				<span class="help-block">[content]为内容标签</span>
			</td>
		</tr>
		<tr>
			<td>采集栏目：</td>
			<td>
				<SELECT class="form-control" name="cat" id="cat">
					<option value="0">未分组</option>
					<?php $_i=0;if(is_array($category))foreach($category AS $atl){$_i++; ?>
					<option value="<?php ;echo $atl['id']; ?>" ><?php ;echo $atl['name']; ?></option>
					<?php ;} ?>
				</SELECT>
			</td>
		</tr>
		<tr>
			<td>过滤文字：</td>
			<td>
				<textarea class="form-control" name="repword"></textarea>
				<span class="help-block">替换规则每行一条，每条规则中间用|隔开，|前是被替换的字符，后面是替换成的字符。如默认的第一行为把“-笑嘻嘻"替换为TrackCMS，)</span>
			</td>
		</tr>
	</table>
	<div class="form-group">
		<label class="checkbox-inline">
		<input name="llink" type="checkbox" id="llink" value="1" class="sinput" checked />
		保留链接 <label class="checkbox-inline">
		<input ame="test" type="checkbox" id="test" value="1"  class="sinput" />
		测试采集
	</div>
	<input name="action" type="hidden" value="spider" />
	<input name="ctrl" type="hidden" value="execute" />
	<input class="btn btn-primary" type="submit" name="Submit" id="submits" value="开始采集" />
</form>
<?php include($this->tpl->myTpl("footer","",'$this->tpl')); ?>