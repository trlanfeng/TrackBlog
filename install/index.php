<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include "../config.php";
$permits = array();
$db_name = !empty($_POST['db_name']) ? $_POST['db_name'] : DB_NAME;
$tb = !empty($_POST['tb']) ? $_POST['tb'] : TB;
$db = !empty($_POST['db']) ? ucfirst($_POST['db']) : DB;
include SYS_ROOT . INC . 'Model/Base.php';
define('RUNONSAE', defined('SAE_TMP_PATH'));
$baedbip = getenv('HTTP_BAE_ENV_ADDR_SQL_IP');
define('RUNONBAE', !empty($baedbip));

$error_message = "";

//检查是否SAE或BAE
if (RUNONSAE) {
    //$db_name='';
    $tb = TB;
    $db = 'Mysql';
    include SYS_ROOT . INC . 'Db/Mysql.php';
    $nowdb = new Dbclass(SYS_ROOT . $db_name);
    $tmp = $nowdb->query("SELECT count(*) TABLES, table_schema FROM information_schema.TABLES  where table_schema = '" . SAE_MYSQL_DB . "' GROUP BY table_schema");
    //检查是否已经安装过
    if ($tmp['TABLES']) {
        //已安装过
        echo '<p>已经安装过，如需重新安装，请删除数据库中所有表。</p>';
        die();
    } else {
        header("Location: step-sae.php");
    }
} else if (RUNONBAE) {
    //$db_name='';
    $tb = TB;
    $db = 'Mysql';
    include SYS_ROOT . INC . 'Db/Mysql.php';
    $nowdb = new Dbclass(SYS_ROOT . $db_name);
    $tmp = $nowdb->query("SELECT count(*) TABLES, table_schema FROM information_schema.TABLES  where table_schema = '" . SAE_MYSQL_DB . "' GROUP BY table_schema");
    //检查是否已经安装过
    if ($tmp['TABLES']) {
        //已安装过
        echo '<p>已经安装过，如需重新安装，请删除数据库中所有表。</p>';
        die();
    } else {
        header("Location: step-bae.php");
    }
} else {
    include SYS_ROOT . INC . 'Db/' . $db . ".php";
    header("Location: step-1.php");
}