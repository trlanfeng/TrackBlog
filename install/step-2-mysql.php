<?php
    if (!isset($_SERVER["HTTP_REFERER"])) {
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html> 
<head> 
    <title>安装TrackCMS</title> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="/admin/template/images/common.css" rel="stylesheet" type="text/css" />
    <link href="/admin/template/images/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/admin/template/images/my-bootstrap.css" rel="stylesheet" type="text/css" />
</head> 
<body>
<form action="step-3-mysql.php" method="post" id="forms">
<div class="row" style="width:800px;margin: 50px auto 0;">
    <div class="bs-callout bs-callout-info">
        <h2 style="margin:5px 0;">开始安装TrackCMS</h2>
        <hr />
        <div class="form-group">
            <label for="exampleInputEmail1">系统的配置：</label>
            <input type="text" class="form-control" value="<?php echo PHP_OS . '[' . $_SERVER["SERVER_SOFTWARE"] . ']' ?>" readonly>
        </div>
        <hr />
        <div class="form-group">
            <label for="exampleInputEmail1">数据库地址：</label>
            <input name="db_host" type="text" size="30" id="db_name" class="form-control" value="localhost:3306" />
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">数据库名：</label>
            <input name="db_name" type="text" size="30" id="db_name" class="form-control" value="trackcms" />
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">数据表前缀：</label>
            <input name="tb" type="text" id="tb" class="form-control" value="tc_" />
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">用户名：</label>
            <input name="db_username" type="text" size="30" id="db_name" class="form-control" value="" placeholder="输入您的数据库用户名" />
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">用户密码：</label>
            <input name="db_password" type="text" size="30" id="db_name" class="form-control" value="" placeholder="输入您的数据库用户密码" />
        </div>
        <hr />
        <input type="submit" name="Submit" value="开始安装" class="btn btn-success" />
    </div>
</div>
</form>