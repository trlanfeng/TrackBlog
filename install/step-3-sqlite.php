<?php
    if (!isset($_SERVER["HTTP_REFERER"])) {
        header("Location: index.php");
    }
?>
<?php
if ($_POST) {
    include "../config.php";
    include SYS_ROOT . INC . 'Model/Base.php';
    include SYS_ROOT . INC . 'Db/Sqlite.php';
    $db_name = !empty($_POST['db_name']) ? $_POST['db_name'] : DB_NAME;
    $tb = !empty($_POST['tb']) ? $_POST['tb'] : TB;
    $nowdb = new Dbclass(SYS_ROOT . $db_name);
    //写入htaccess
    $htaccess = get_htaccess();
    file_put_contents('../.htaccess', $htaccess);
    $creatTable = get_sql_sqlite($tb);
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
    $configs = str_replace('define(\'DB\',	\'' . DB . '\');', 'define(\'DB\',	\'Sqlite\');', $configs);
    $_POST['db_name'] && $configs = str_replace('define(\'DB_NAME\',	\'' . DB_NAME . '\');', 'define(\'DB_NAME\',	\'' . $_POST['db_name'] . '\');', $configs);
    file_put_contents('../config.php', $configs);
    file_put_contents('../data/install.lock', '');
    header("Location: step-finish.php");
} else {
    header("Location: step-2-sqlite.php");
}

function get_sql_sqlite($tb) {
    $creatTable = '
    CREATE TABLE [' . $tb . 'category] (
        [id] INTEGER  PRIMARY KEY NOT NULL,
        [name] VARCHAR(60)  NULL,
        [keywords] VARCHAR(200)  NULL,
        [description] VARCHAR(200)  NULL,
        [nickname] VARCHAR(60)  NULL,
        [staticurl] VARCHAR(60)  NULL,
        [cattpl] VARCHAR(100)  NULL,
        [listtpl] VARCHAR(100)  NULL,
        [distpl] VARCHAR(100)  NULL,
        [fid] INTEGER  NULL,
        [intro] TEXT  NULL,
        [orders] INTEGER  NULL,
        [status] INTEGER  NULL
    );
    CREATE TABLE [' . $tb . 'admin] (
        [id] integer  PRIMARY KEY NULL,
        [name] varchar(30)  NULL,
        [emails] varchar(60)  NULL,
        [passwd] varchar(60)  NULL,
        [auth] varchar(30)  NULL,
        [times] varchar(30)  NULL,
        [ips] varchar(60)  NULL,
        [status] INTEGER  NULL
    );
    CREATE TABLE [' . $tb . 'comment] (
        [id] INTEGER  PRIMARY KEY NOT NULL,
        [article_id] INTEGER  NULL,
        [name] VARCHAR(30)  NULL,
        [emails] VARCHAR(60)  NULL,
        [websites] VARCHAR(60)  NULL,
        [content] TEXT  NULL,
        [ips] VARCHAR(80)  NULL,
        [times] TIMESTAMP  NULL,
        [status] INTEGER  NULL
    );
    CREATE TABLE [' . $tb . 'link] (
        [id] INTEGER  PRIMARY KEY NOT NULL,
        [name] VARCHAR(30)  NULL,
        [urls] VARCHAR(60)  NULL,
        [content] VARCHAR(120)  NULL,
        [cat] INTEGER  NULL,
        [orders] INTEGER  NULL,
        [status] INTEGER  NULL
    );
    CREATE TABLE [' . $tb . 'cms] (
        [id] integer  PRIMARY KEY NULL,
        [name] varchar(120)  NULL,
        [keywords] VARCHAR(200)  NULL,
        [description] VARCHAR(200)  NULL,
        [link] varchar(30)  NULL,
        [staticurl] VARCHAR(60)  NULL,
        [content] text  NULL,
        [cat] varchar(30)  NULL,
        [times] varchar(30)  NULL,
        [ips] varchar(60)  NULL,
        [status] INTEGER  NULL,
        [allowcmt] INTEGER  NULL,
        [orders] INTEGER DEFAULT \'0\' NULL,
        [thumbpic] varchar(120)  NULL,
        [views] INTEGER  DEFAULT \'0\' NULL,
        [cmtcount] INTEGER DEFAULT \'0\' NULL,
        [user_id] INTEGER  NULL,
        [tags] varchar(120)  NULL,
        [slug] varchar(120)  NULL,
        [orders2] INTEGER DEFAULT \'0\' NULL,
        [orders3] INTEGER DEFAULT \'0\' NULL
    );
    CREATE TABLE [' . $tb . 'relations] (
        [id] INTEGER  PRIMARY KEY NULL,
        [name] varchar(100)  NULL,
        [counts] INTEGER  NULL
    );
    CREATE TABLE [' . $tb . 'relatocms] (
        [id] INTEGER  PRIMARY KEY NULL,
        [relid] INTEGER  NULL,
        [cmsid] INTEGER  NULL
    )';
    return $creatTable;
}

function get_htaccess() {
    $htaccess = '
        RewriteEngine On
        RewriteBase ' . (dirname($_SERVER['PHP_SELF']) ? str_replace("\\", '/', dirname($_SERVER['PHP_SELF'])) : '') . '/
        RewriteCond %{REQUEST_FILENAME} !-f
        RewriteCond %{REQUEST_FILENAME} !-d
        RewriteRule .* index.php/$0 [PT,L]'
    ;
    return $htaccess;
}