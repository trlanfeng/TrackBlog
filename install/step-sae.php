<?php
    if (!isset($_SERVER["HTTP_REFERER"])) {
        header("Location: index.php");
    }
?>
<?php
    include "../config.php";
    include SYS_ROOT . INC . 'Model/Base.php';
    include SYS_ROOT . INC . 'Db/Mysql.php';
    if (!empty($_POST['db_name'])) {
        $db_name = "|".$_POST['db_host']."|".$_POST['db_username']."|".$_POST['db_password']."|".$_POST['db_name'];
    } else {
        $db_name = DB_NAME;
    }
    $tb = !empty($_POST['tb']) ? $_POST['tb'] : TB;
    $nowdb = new Dbclass(SYS_ROOT . $db_name);
    $creatTable = get_sql_mysql($tb);
    $queryarray = explode(';', $creatTable);
    //建立表数据
    foreach ($queryarray as $k => $v) {
        $nowdb->query($v) or die('creat table error' . $v);
    }
    //添加初始化数据
    $nowdb->query('INSERT INTO ' . $tb . 'admin(name,passwd,auth,status)VALUES("admin","admin","admin",1)');
    $nowdb->query('INSERT INTO ' . $tb . 'link (name,urls,content,status,orders) VALUES("TrackCMS","http://fengyu.name/?cat=zuopin&id=275","TrackCMS官方网站","1","0")');
    $nowdb->query('INSERT INTO ' . $tb . 'category (name,fid,intro,orders,status,staticurl) VALUES("日记","0","日记本","0","1","?cat=1")');
    $nowdb->query('INSERT INTO ' . $tb . 'cms (name,content,cat,times,orders,status,allowcmt,staticurl) VALUES("你的第一个小脚印出现在这里哦","TrackCMS已经正常运行了，记录你的梦想吧！觉得像博客？TrackCMS官方网站的CMSer模板给你打造一个门户网站！快去看看吧！http://fengyu.name/?cat=zuopin&id=275。【请您先到后台设置文章URL，然后生成URL】","0","1284920417","0","1","1","?id=1")');

    $configs = file_get_contents('../config.php');
    $_POST['tb'] && $configs = str_replace('define(\'TB\',	\'' . TB . '\');', 'define(\'TB\',	\'' . $_POST['tb'] . '\');', $configs);
    $configs = str_replace('define(\'DB\',	\'' . DB . '\');', 'define(\'DB\',	\'Mysql\');', $configs);
    $_POST['db_name'] && $configs = str_replace('define(\'DB_NAME\',	\'' . DB_NAME . '\');', 'define(\'DB_NAME\',	\'' . $_POST['db_name'] . '\');', $configs);
    file_put_contents('../config.php', $configs);
    file_put_contents('../data/install.lock', '');
    header("Location: step-finish.php");

function get_sql_mysql($tb) {
    $creatTable = 
    "CREATE TABLE `" . $tb . "admin` (
        `id` int(120) NOT NULL auto_increment,
        `name` varchar(30) NOT NULL DEFAULT '',
        `emails` varchar(60) NOT NULL DEFAULT '',
        `passwd` varchar(60) NOT NULL DEFAULT '',
        `auth` varchar(40) NOT NULL DEFAULT '',
        `times` varchar(60) NOT NULL DEFAULT '',
        `ips` varchar(60) NOT NULL DEFAULT '',
        `status` tinyint(2) NOT NULL DEFAULT '1',
        PRIMARY KEY  (`id`)
    ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2;".
    "CREATE TABLE `" . $tb . "category` (
        `id` int(120) NOT NULL auto_increment,
        `name` varchar(60) NOT NULL DEFAULT '',
        `keywords` varchar(200) NOT NULL DEFAULT '',
        `description` varchar(200) NOT NULL DEFAULT '',
        `nickname` varchar(60) NOT NULL DEFAULT '',
        `fid` int(120) NOT NULL DEFAULT '0',
        `intro` varchar(120) NOT NULL DEFAULT '',
        `orders` int(40) NOT NULL DEFAULT '0',
        `status` tinyint(2) NOT NULL DEFAULT '1',
        `staticurl` varchar(60) NOT NULL DEFAULT '',
        `cattpl` varchar(100) NOT NULL DEFAULT '',
        `listtpl` varchar(100) NOT NULL DEFAULT '',
        `distpl` varchar(100) NOT NULL DEFAULT '',
        PRIMARY KEY  (`id`)
    ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2;".
    "CREATE TABLE `" . $tb . "cms` (
        `id` int(120) NOT NULL auto_increment,
        `name` varchar(120) NOT NULL DEFAULT '',
        `keywords` varchar(200) NOT NULL DEFAULT '',
        `description` varchar(200) NOT NULL DEFAULT '',
        `link` varchar(100) NOT NULL DEFAULT '',
        `content` text NULL ,
        `cat` int(120) NOT NULL DEFAULT '0',
        `times` varchar(60) NOT NULL DEFAULT '',
        `ips` varchar(40) NOT NULL DEFAULT '',
        `allowcmt` tinyint(2) NOT NULL DEFAULT '1',
        `orders` int(40) NOT NULL default '0',
        `status` tinyint(2) NOT NULL DEFAULT '1',
        `thumbpic` varchar(140) NOT NULL DEFAULT '',
        `views` int(100) NOT NULL default '0',
        `user_id` int(120) NOT NULL DEFAULT '0',
        `slug` varchar(80) NOT NULL DEFAULT '',
        `tags` varchar(60) NOT NULL DEFAULT '',
        `cmtcount` int(100) NOT NULL default '0',
        `orders2` int(40) NOT NULL default '0',
        `orders3` int(40) NOT NULL default '0',
        `staticurl` varchar(60) NOT NULL DEFAULT '',
        PRIMARY KEY  (`id`)
    ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26;".
    "CREATE TABLE `" . $tb . "comment` (
        `id` int(120) NOT NULL auto_increment,
        `article_id` int(120) NOT NULL DEFAULT '0',
        `name` varchar(60) NOT NULL DEFAULT '',
        `emails` varchar(100) NOT NULL DEFAULT '',
        `websites` varchar(100) NOT NULL DEFAULT '',
        `content` text  NULL,
        `ips` varchar(40) NOT NULL DEFAULT '',
        `times` varchar(40) NOT NULL DEFAULT '',
        `status` tinyint(2) NOT NULL DEFAULT '1',
        PRIMARY KEY  (`id`)
    ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5;".
    "CREATE TABLE `" . $tb . "link` (
        `id` int(120) NOT NULL auto_increment,
        `name` varchar(60) NOT NULL DEFAULT '',
        `urls` varchar(100) NOT NULL DEFAULT '',
        `content` varchar(200) NOT NULL DEFAULT '',
        `cat` int(120) NOT NULL DEFAULT '0',
        `orders` int(40) NOT NULL DEFAULT '0',
        `status` tinyint(2) NOT NULL DEFAULT '1',
        PRIMARY KEY  (`id`)
    ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2;".
    "CREATE TABLE `" . $tb . "relations` (
        `id` int(120) NOT NULL auto_increment,
        `name` varchar(60) NOT NULL DEFAULT '',
        `counts` int(120) NOT NULL DEFAULT '0',
        PRIMARY KEY  (`id`)
    ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2;".
    "CREATE TABLE `" . $tb . "relatocms` (
        `id` int(120) NOT NULL auto_increment,
        `relid` int(120) NOT NULL DEFAULT '0',
        `cmsid` int(120) NOT NULL DEFAULT '0',
        PRIMARY KEY  (`id`)
    ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4";
    return $creatTable;
}