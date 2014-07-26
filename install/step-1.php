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
<body style="padding-top:50px;"> 
<?php if (file_exists('../data/install.lock')) { ?>
    <div class="row" style="width:800px;margin: 0 auto;">
        <div class="bs-callout bs-callout-danger">
            <h4>重要错误</h4>
            <p>
                您已经安装过TrackCMS，如需重新安装，请删除data目录下的install.lock文件。
            </p>
        </div>
    </div>
<?php die(); } ?>
<?php if (!is_writable('.htaccess')) { ?>
    <div class="row" style="width:800px;margin: 0 auto;">
        <div class="bs-callout bs-callout-warning">
            <h4>重要提示</h4>
            <p>
                htaccess文件无写权限，这可能会影响自定义URL的效果。
            </p>
        </div>
    </div>
<?php } ?>
<div class="row" style="width:800px;margin: 0 auto;">
    <div class="bs-callout bs-callout-info">
        <h4>环境检测</h4>
        <p>
            环境检测完毕，可以进行安装，点击需要使用的数据库进入下一步。
        </p>
        <?php if (function_exists('mysql_connect')) { ?>
        <button type="button" class="btn btn-success" onclick="javascript:window.location.href='step-2-mysql.php'">MySQL</button>
        <?php } else { ?>
            <button type="button" class="btn" disabled="disabled">不支持MySQL</button>
        <?php }?>
        <?php if (function_exists('sqlite_open')) { ?>
            <button type="button" class="btn btn-success" onclick="javascript:window.location.href='step-2-sqlite.php'">SQLite</button>
        <?php } else { ?>
            <button type="button" class="btn" disabled="disabled">不支持SQLite</button>
        <?php }?>
    </div>
</div>