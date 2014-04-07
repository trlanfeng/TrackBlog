<?php
header('Content-type: text/html; charset=utf-8');
date_default_timezone_set("PRC"); 
unset($HTTP_ENV_VARS, $HTTP_POST_VARS, $HTTP_GET_VARS, $HTTP_POST_FILES, $HTTP_COOKIE_VARS);

//error_reporting(TRACKDEBUG?2047:'E_ERROR | E_WARNING | E_PARSE');
error_reporting(E_ERROR | E_WARNING | E_PARSE);
//公共函数
include(SYS_ROOT.INC.'Model/Base.php');
//模板引擎
include(SYS_ROOT.INC.'Model/Template.php');
//数据库类
include(SYS_ROOT.INC.'Db/'.ucfirst(DB).'.php');
//执行开始时间
$GLOBALS['starttime']=Base::getmicrotime();
$GLOBALS['version']='0.1 Beta';
//定义常量，防止违法访问
define("TrackCMS!",TRUE);
define('RUNONSAE',defined( 'SAE_TMP_PATH' ));
$baedbip=getenv('HTTP_BAE_ENV_ADDR_SQL_IP');
define('RUNONBAE',!empty( $baedbip ) );
//似乎BAE的文件夹都是可写的，但是写入后程序执行完就消失了
define('TRACK_TMP_PATH', RUNONSAE ? SAE_TMP_PATH : ( RUNONBAE ? SYS_ROOT.CACHE : SYS_ROOT.CACHE ) );
define('IMG','/template/'.THEME.'images/');
define('CSS','/template/'.THEME.'css/');
define('JS','/template/'.THEME.'js/');
function __autoload($name) {
	$path=SYS_ROOT.'include/Model/'.ucfirst($name). '.php';
	if(file_exists($path)){
		 include $path;
	}else{
		return false;
	}
}
if(!function_exists('get_magic_quotes_gpc') || get_magic_quotes_gpc())
{
	$_GET = Base::magic2word( $_GET );
	$_POST = Base::magic2word( $_POST );
	$_COOKIE = Base::magic2word( $_COOKIE );
}

?>
