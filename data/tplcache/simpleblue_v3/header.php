<?php if(constant("TrackCMS!") !== true)die;?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="template/simpleblue_v3/images/favicon.png"/>
    <?php if($addtitle==''){ ?>
    <title><?php ;echo $addtitle; ?>幻蓝阁 - 孤月蓝风 - 追寻互联网尖端技术</title>
    <?php ;}else{ ?>
    <title><?php ;echo $addtitle; ?> - 幻蓝阁</title>
    <?php ;} ?>
    <?php if($addtitle==''){ ?>
    <meta name="keywords" content="孤月蓝风,幻蓝阁,trlanfeng,技术博客,程序员博客" />
    <?php ;}else{ ?>
    <meta name="keywords" content="<?php ;echo $keywords; ?>" />
    <?php ;} ?>
    <?php if($addtitle==''){ ?>
    <meta name="description" content="追寻互联网科技、程序编码、软件设计、Web设计、SEO优化等尖端技术。<br>在迈向CTO的道路上，不断的前行。" />
    <?php ;}else{ ?>
    <meta name="description" content="<?php ;echo $description; ?>" />
    <?php ;} ?>
    <script src="http://libs.baidu.com/jquery/1.6.2/jquery.min.js"></script>
    <link href="<?php ;echo CSS; ?>index.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="header">
        <header>
            <div class="logo">
                <img src="<?php ;echo IMG; ?>logo.png" alt="孤月蓝风" width="100" height="100">
            </div>
            <div class="info">
                <h1 class="title">孤月蓝风 - 幻蓝阁</h1>
                <h2 class="description">追寻互联网科技、程序编码、软件设计、Web设计、SEO优化等尖端技术。<br>在迈向CTO的道路上，不断的前行。</h2>
            </div>
            <div class="tools">
                <a href="http://weilanlan.name" target="_blank">
                    <img src="<?php ;echo IMG; ?>tool1.gif" alt="木兔子的懒懒季节" title="木兔子的懒懒季节">
                </a>
                <a href="http://t.qq.com/trlanfeng" target="_blank" rel="nofollow">
                    <img src="<?php ;echo IMG; ?>tool2.gif" alt="孤月蓝风的腾讯微博" title="孤月蓝风的腾讯微博">
                </a>
                <a href="http://weibo.com/trlanfeng" target="_blank" rel="nofollow">
                    <img src="<?php ;echo IMG; ?>tool3.gif" alt="孤月蓝风不常去的新浪微博" title="孤月蓝风不常去的新浪微博">
                </a>
                <a href="/?cat=coding" target="_blank">
                    <img src="<?php ;echo IMG; ?>tool4.gif" alt="孤月蓝风的编码情节" title="孤月蓝风的编码情节">
                </a>
                <a href="/?cat=&id=11" target="_blank">
                    <img src="<?php ;echo IMG; ?>tool5.gif" alt="孤月蓝风就是我" title="孤月蓝风就是我">
                </a>
            </div>
        </header>
    </div>
    <div class="nav">
        <nav>
            <a href="/" <?php if(!$_GET['cat']){ ?>class="on"<?php ;} ?>>首页</a>
            <?php $_i=0;$QR = $dbit->getquery(TB."category|status=1|20|orders ASC"); while($list = $dbit->fetch_array($QR)){$_i++; ?>
            <a href="<?php ;echo $list['staticurl']; ?>" <?php if($_GET['cat']==$list['nickname']){ ?>class="on"<?php ;} ?>><?php ;echo $list['name']; ?></a>
            <?php ;} ?>
            <a href="http://lofter.fengyu.name" target="_blank" rel="nofollow">LOFTER</a>
            <a href="http://weibo.com/trlanfeng" target="_blank" rel="nofollow">微博</a>
        </nav>
        <div class="search">

        </div>
    </div>