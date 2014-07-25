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
<form action="step-3-sqlite.php" method="post" id="forms">
<div class="row" style="width:800px;margin: 50px auto 0;">
    <div class="bs-callout bs-callout-info">
        <h2 style="margin:5px 0;">开始安装TrackCMS</h2>
        <hr />
        <div class="form-group">
            <label for="exampleInputEmail1">系统的配置：</label>
            <input type="email" class="form-control" id="exampleInputEmail1" value="<?php echo PHP_OS . '[' . $_SERVER["SERVER_SOFTWARE"] . ']' ?>" readonly>
        </div>
        <hr />
        <div class="form-group">
            <label for="exampleInputEmail1">数据库配置：</label>
            <input name="db_name" type="text" size="30" id="db_name" class="form-control" value="data/blog.db" />
        </div>
        <hr />
        <div class="form-group">
            <label for="exampleInputEmail1">数据表前缀：</label>
            <input name="tb" type="text" id="tb" class="form-control" value="tc_" />
        </div>
        <hr />
        <input type="submit" name="Submit" value="开始安装" class="btn btn-success" />
    </div>
</div>
</form>