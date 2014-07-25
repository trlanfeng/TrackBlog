<?php
define('WEBNAME','TrackCMS');
define('WEBURL','./');
define('WEBINFO','TrackCMS');
define('ANNOUNCE','TrackCMS');
define('ADMINDIR','admin/');
define('TIMEMOD','0');
define('EACHPAGE','10');
define('TRACKEDITOR','1');
define('EDITORHL','1');
define('TRACKDEBUG','1');
define('SYS_ROOT',	str_replace("\\", '/',dirname(__FILE__))."/");
define('CACHE','data/');
define('CACHELAST','1');
define('INC','include/');
define('DB','Sqlite');
define('DB_NAME','data/blog.db');
define('MEMCACHE','');
define('TB','tc_');
define('CREATHTML','0');
define('VIEWSCOUNT','1');
define('CATURL','/?cat={catname}');
define('ATLURL','/?cat={catname}&id={id}');
define('THEME','default/');
//图片上传目录设置
//默认为网站根目录 uploads 文件夹下
define ( 'UEDITOR_IMG_PATH', '../../../../../uploads/');
//百度BCS设置
define ( 'BCS_CHECK', true );
define ( 'BCS_HOST', 'bcs.duapp.com' );
define ( 'BCS_BUCKET', '' );
define ( 'BCS_AK', '' );
define ( 'BCS_SK', '' );
define ( 'BCS_SUPERFILE_POSTFIX', '_bcs_superfile_' );
define ( 'BCS_SUPERFILE_SLICE_SIZE', 1024 * 1024 );

?>