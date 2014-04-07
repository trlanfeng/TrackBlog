<?php if(constant("TrackCMS!") !== true)die;?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="template/images/common.css" rel="stylesheet" type="text/css" />
<title>后台登录 - 幻蓝阁</title>
</head>
<script language="javascript">
function $track(obj){
   return (typeof obj == "object")?obj:document.getElementById(obj);;
}
function checklogin(){
	if($track('loginname').value==''){
	alert('请输入用户名');
	return false;	
	}
	if($track('loginpwd').value==''){
	alert('请输入密码');
	return false;
	
	}
}

</script>
<body style="background-color: #1F262D;">
<div id="loginbody">
	<h1>后台登录</h1>
	<form action="admin.php" method="post" onsubmit="return checklogin()">
		<p> <span>用户名：</span>
			<input name="name" type="text" id="loginname" tabindex="1"/>
		</p>
		<p> <span>密码：</span>
			<input name="pwd" type="password" id="loginpwd" tabindex="2" />
			<input name="action" type="hidden" value="frame" />
			<input name="ctrl" type="hidden" value="checkUser" />
		</p>
		<p style="text-align: center;">
			<input type="submit" name="Submit" id="loginbtn" tabindex="3" value="登录后台" />
		</p>
	</form>
</div>
</body>
</html>
<script>$track('loginname').focus();</script>