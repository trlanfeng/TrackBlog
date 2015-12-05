<?php
$now_url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
if (stripos($now_url, 'www')) {
    $new_url = str_ireplace('http://www.', 'http://', $now_url);
    Header("HTTP/1.1 301 Moved Permanently");
    Header("Location: " . $new_url);
}
?>
<!DOCTYPE html>
<html>
<head lang="zh-cn">
    <script type="text/javascript">
        var _speedMark = new Date();
    </script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="shortcut icon" href="{IMG}favicon.png"/>
    <?php if ($contentType == "index") { ?>
    <title>幻蓝博客 - 孤月蓝风 - 追寻互联网尖端技术</title>
    <meta name="keywords" content="孤月蓝风,幻蓝博客,trlanfeng,技术博客,程序员博客"/>
    <meta name="description" content="追寻互联网科技、程序编码、软件设计、Web设计、SEO优化等尖端技术。<br>在迈向技术巅峰的道路上，不断的前行。"/>
    <?php } else { ?>
    <title>{$addtitle} - 幻蓝博客</title>
    <meta name="keywords" content="{$keywords}"/>
    <meta name="description" content="{$description}"/>
    <?php } ?>
    <link rel="stylesheet" href="http://cdn.amazeui.org/amazeui/2.2.1/css/amazeui.min.css">
    <link href="/public/css/index.css" rel="stylesheet"/>
</head>
<body>
<header class="am-container am-center">
    <div class="header">
        <div>
            <div class="logo am-fl">
                <img src="{IMG}logo.png" alt="孤月蓝风" width="100" height="100">
            </div>
            <div class="info am-fl">
                <h1 class="title">孤月蓝风 - 幻蓝博客</h1>

                <h2 class="description">追寻互联网科技、程序编码、软件设计、Web设计、SEO优化等尖端技术。<br>在迈向技术巅峰的道路上，不断的前行。</h2>
            </div>
        </div>
        <div class="am-show-landscape am-fr myicons">
            <ul class="am-avg-sm-5">
                <li><a href="http://weilanlan.name" target="_blank">
                        <img src="{IMG}tool1.gif" alt="木兔子的懒懒季节" title="木兔子的懒懒季节"></a>
                </li>
                <li><a href="http://t.qq.com/trlanfeng" target="_blank" rel="nofollow">
                        <img src="{IMG}tool2.gif" alt="孤月蓝风的腾讯微博" title="孤月蓝风的腾讯微博"></a>
                </li>
                <li><a href="http://weibo.com/trlanfeng" target="_blank" rel="nofollow">
                        <img src="{IMG}tool3.gif" alt="孤月蓝风的新浪微博" title="孤月蓝风不常去的新浪微博"></a>
                </li>
                <li><a href="/?cat=coding" target="_blank">
                        <img src="{IMG}tool4.gif" alt="孤月蓝风的编码情节" title="孤月蓝风的编码情节"></a>
                </li>
                <li><a href="/?cat=suibi&id=11" target="_blank">
                        <img src="{IMG}tool5.gif" alt="孤月蓝风就是我" title="孤月蓝风就是我"></a>
                </li>
            </ul>
        </div>
    </div>
</header>
<nav data-am-sticky>
    <ul class="am-container am-nav am-nav-pills am-center">
        <li <?php if ($contentType == "index") echo 'class="am-active"'; ?>><a href="/">首页</a></li>
        <?php foreach ($catlist as $row): ?>
        <li <?php if ($cat == $row['cat']) echo 'class="am-active"'; ?>><a href="/index.php/category/<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></li>
        <?php endforeach; ?>
        <li><a href="http://lofter.fengyu.name" target="_blank" rel="nofollow">LOFTER</a></li>
        <li><a href="http://git.oschina.net/trlanfeng" target="_blank" rel="nofollow">开源项目</a></li>
        <div class="baidu-search">
            <script
                type="text/javascript">document.write(unescape('%3Cdiv id="bdcs"%3E%3C/div%3E%3Cscript charset="utf-8" src="http://znsv.baidu.com/customer_search/api/js?sid=6971124210686293377') + '&plate_url=' + (encodeURIComponent(window.location.href)) + '&t=' + (Math.ceil(new Date() / 3600000)) + unescape('"%3E%3C/script%3E'));</script>
        </div>
    </ul>
</nav>