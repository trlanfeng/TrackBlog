<?php
    /**
     * Created by JetBrains PhpStorm.
     * User: taoqili
     * Date: 12-1-16
     * Time: 上午11:44
     * To change this template use File | Settings | File Templates.
     */
    header("Content-Type: text/html; charset=utf-8");
    error_reporting( E_ERROR | E_WARNING );

    //引入全局配置文件，用以配置图片上传目录 add by trlanfeng @ 20140411
    require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
    
    //需要遍历的目录列表，最好使用缩略图地址，否则当网速慢时可能会造成严重的延时
    $paths = array('upload/','upload1/');

    $action = htmlspecialchars( $_POST[ "action" ] );
    if ( $action == "get" ) {
        $files = array();
        foreach ( $paths as $path){
            //根据是否上传BCS来修改上传目录 edit by trlanfeng @ 20140411
            if (BCS_CHECK){
                //使用BCS时不添加目录路径参数
                $tmp = getfiles( $path );
            } else {
                //添加目录路径参数，使图片上传至根目录
                $tmp = getfiles( UEDITOR_IMG_PATH . $path );
            }
            if($tmp){
                $files = array_merge($files,$tmp);
            }
        }
        if ( !count($files) ) return;
        rsort($files,SORT_STRING);
        $str = "";
        foreach ( $files as $file ) {
            $str .= $file . "ue_separate_ue";
        }
        echo $str;
    }

    /**
     * 遍历获取目录下的指定类型的文件
     * @param $path
     * @param array $files
     * @return array
     */
    function getfiles( $path , &$files = array() )
    {
        if ( !is_dir( $path ) ) return null;
        $handle = opendir( $path );
        while ( false !== ( $file = readdir( $handle ) ) ) {
            if ( $file != '.' && $file != '..' ) {
                $path2 = $path . '/' . $file;
                if ( is_dir( $path2 ) ) {
                    getfiles( $path2 , $files );
                } else {
                    if ( preg_match( "/\.(gif|jpeg|jpg|png|bmp)$/i" , $file ) ) {
                        $files[] = $path2;
                    }
                }
            }
        }
        return $files;
    }
