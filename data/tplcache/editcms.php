<?php if(constant("TrackCMS!") !== true)die;?><?php include($this->tpl->myTpl("header","",'$this->tpl')); ?>
<form action="admin.php" method="post" onsubmit="if($('name').value==''){alert('文章标题必须填写');return false;}">
	<div class="form-group">
		<label class="control-label">标题：</label>
		<input name="name" type="text" id="name" value="<?php ;echo $o['name']; ?>" class="form-control" />
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
		<label class="control-label">栏目：</label>
		<SELECT name="cat" id="cat" class="form-control">
			<option value="0">未分组</option>
			<?php $_i=0;if(is_array($category))foreach($category AS $atl){$_i++; ?> 
			<option value="<?php ;echo $atl['id']; ?>" <?php if($atl['id']==$o['cat']){ ?> selected <?php ;} ?> ><?php ;echo $atl['name']; ?>
			</option>
			<?php ;} ?>
		</SELECT>
	</div>
	<div class="form-group">
		<label class="control-label">内容：</label>
        <?php if(TRACKEDITOR==1){ ?>
        <link rel="stylesheet" href="template/images/umeditor/themes/default/css/umeditor.min.css"/>
        <script type="text/javascript" src="template/images/umeditor/umeditor.config.js"></script>
        <script type="text/javascript" src="template/images/umeditor/umeditor.min.js"></script>
        <textarea name="content" id="content_umeditor" style="height: 400px;width: 100%;"><?php ;echo $o['content']; ?></textarea>
        <script type="text/javascript">
            UM.getEditor('content_umeditor');
        </script>
        <?php ;} ?>
        <?php if(TRACKEDITOR==2){ ?>
        <script type="text/javascript" src="template/images/ueditor/ueditor.config.js"></script>
        <script type="text/javascript" src="template/images/ueditor/ueditor.all.min.js"></script>
        <textarea name="content" id="content_ueditor" style="height: 400px;"><?php ;echo $o['content']; ?></textarea>
        <script type="text/javascript">
            UE.getEditor('content_ueditor',{
            	autoHeightEnabled: false,
            });
            $("#content_ueditor").width($(".form-group").width());
        </script>
        <?php ;} ?>
        <?php if(TRACKEDITOR==3){ ?>
        <script type="text/javascript" src="template/images/kindeditor/kindeditor-min.js"></script>
        <script type="text/javascript" src="template/images/kindeditor/lang/zh_CN.js"></script>
        <textarea name="content" id="content_kindeditor" style="height: 400px;width: 100%;"><?php ;echo $o['content']; ?></textarea>
        <script type="text/javascript">
            KindEditor.ready(function(K) {
                window.editor = K.create('#content_kindeditor');
            });
        </script>
        <?php ;} ?>
		<?php if(TRACKEDITOR==4){ ?>
        <script type="text/javascript" src="template/images/xheditor2/xheditor-1.2.1.min.js"></script>
        <script type="text/javascript" src="template/images/xheditor2/xheditor_lang/zh-cn.js"></script>
        <textarea name="content" id="content_xheditor" style="height: 400px;width: 100%;"><?php ;echo $o['content']; ?></textarea>
        <script type="text/javascript">
            $('#content_xheditor').xheditor({skin:'nostyle'});
        </script>
		<?php ;} ?>
	</div>
    <div class="form-group">
		<label class="control-label">别名：</label>
		<input class="form-control" name="slug" type="text" id="slug" value="<?php ;echo $o['slug']; ?>" />
	</div>
	<div class="form-group">
		<label class="control-label">标签：</label>
		<input class="form-control" name="tags" type="text" id="tags" value="<?php ;echo $o['tags']; ?>" />
	</div>
	<div class="form-group">
		<label class="control-label">链接：</label>
		<input class="form-control" name="link" type="text" id="link" value="<?php ;echo $o['link']; ?>" />
	</div>
	<div class="form-group">
		<label class="control-label">缩略图：</label>
		<div class="input-group">
		<input class="form-control" name="thumbpic" type="text" id="thumbpic" value="<?php ;echo $o['thumbpic']; ?>" />
		<span class="input-group-btn">
			<button class="btn btn-default" type="button" id="singlebtn" onclick="if(!window.open('admin.php?action=upload&ctrl=display&&inid=thumbpic','newwindow', 'height=200, width=350, top=400, left=400'))alert('无法弹出上传窗口窗口，你可以尝试点击浏览器上方出现的黄色提示条，选择“临时允许弹出窗口”');">上传缩略图</button>
		</span>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label">排序：</label>
		<input class="form-control" name="orders" type="text" id="orders" value="<?php ;echo $o['orders']; ?>" />
	</div>
	<div class="form-group">
		<label class="control-label">开关：</label>
		<label class="checkbox-inline">
			<input name="allowcmt" id="allowcmt" type="checkbox" value="1" checked />
			允许评论
		</label>
		<label class="checkbox-inline">
			<input name="remotepic" id="remotepic" type="checkbox" value="1" <?php ;if(WEBURL== './')echo 'onclick="alert(\'请设置网站url后再选中此项，否则可能导致图片地址异常\');return false;" '; ?> />
			保存远程图片
		</label>
	</div>
	<div class="form-group">
		<label class="control-label">状态：</label>
		<input class="radio-inline" type="radio" name="status" value="1" checked="checked" />
		发表
		<input class="radio-inline" type="radio" name="status" value="0" />
		草稿
		<input class="radio-inline" type="radio" name="status" value="-1" />
		隐藏
	</div>
	<div class="form-group">
		<input name="action" type="hidden" value="cms" />
		<input name="ctrl" type="hidden" value="<?php ;echo $goctrl; ?>" />
		<input name="id" type="hidden" value="<?php ;echo $o['id']; ?>" />
		<input class="btn btn-primary" type="submit" name="Submit" id="submits" value="提交" onmouseover="instance.post();" />
	</div>
</form>
<script language="javascript">
//alert(T$('orders').value);
SelectItemByValue($track('status'),'<?php ;echo $o['status']; ?>');
SelectRadio($track('allowcmt'),<?php ;echo $o['allowcmt']; ?>);
</script> 
<?php include($this->tpl->myTpl("footer","",'$this->tpl')); ?>