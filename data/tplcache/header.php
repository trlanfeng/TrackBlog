<?php if(constant("TrackCMS!") !== true)die;?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理 - 幻蓝阁</title>
<link href="template/images/common.css" rel="stylesheet" type="text/css" />
<link href="template/images/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="template/images/my-bootstrap.css" rel="stylesheet" type="text/css" />
<!-- <link href="template/images/bootstrap-theme.min.css" rel="stylesheet" type="text/css" /> -->
<script type="text/javascript" src="template/images/common.js"></script>
<script type="text/javascript" src="template/images/jquery.js"></script>
</head>
<body>
<table class="box">
<tr>
	<td colspan="2" class="header">网站内容管理</td>
</tr>
<tr>
	<td class="menu"> <?php include($this->tpl->myTpl("menu","",'$this->tpl')); ?> </td>
	<td class="main">
