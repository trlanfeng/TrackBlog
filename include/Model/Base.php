<?php
class Base{
	static function cutStr($string, $sublen=10, $start = 0, $code = 'UTF-8')
	{
		$string=strip_tags($string);
		if($code == 'UTF-8')
		{
			$pa = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/";
			preg_match_all($pa, $string, $t_string);

			//if(count($t_string[0]) - $start > $sublen) return join('', array_slice($t_string[0], $start, $sublen))."...";
			return join('', array_slice($t_string[0], $start, $sublen));
		}
		else
		{
			$start = $start*2;
			$sublen = $sublen*2;
			$strlen = strlen($string);
			$tmpstr = '';
			for($i=0; $i<$strlen; $i++)
			{
				if($i>=$start && $i<($start+$sublen))
				{
					if(ord(substr($string, $i, 1))>129) $tmpstr.= substr($string, $i, 2);
					else $tmpstr.= substr($string, $i, 1);
				}
				if(ord(substr($string, $i, 1))>129) $i++;
			}
			//if(strlen($tmpstr)<$strlen ) $tmpstr.= "...";
			return $tmpstr;
		}
	}
	//取得真实ip
	static function realip(){
		if(getenv('HTTP_CLIENT_IP')){
			$ip=getenv('HTTP_CLIENT_IP');
		}elseif(getenv('HTTP_X_FORWARDED_FOR')){
			$ip=getenv('HTTP_X_FORWARDED_FOR');
		}elseif(getenv('REMOTE_ADDR')){
			$ip=getenv('REMOTE_ADDR');
		}else{
			$ip=$HTTP_SERVER_VARS['REMOTE_ADDR'];
		}
		
		$ip = long2ip( ip2long( $ip ) );
		return $ip;
	}

	//页面执行时间计时
	static function getmicrotime(){
		return microtime(true);
	}
	//当前时间函数
	static function getnowtime($format=''){
		$times=time()+TIMEMOD*3600;
		return $format?date($format,$times):$times;
	}
	//过滤参数的函数，待编写
	static function tosafeword($str,$k=1){
		return $str;
	}
	//清空session
	static function clearseesion(){
		session_unset();
		session_destroy();
	}
	//提示信息
	static function showmessage($msg, $url = '-1',$auto='',$ajax=false) {
		header("Content-type:text/html;charset=utf-8");
		$time=4;
		if ($auto){
			echo '<meta http-equiv="refresh" content="'.$auto.';url='.$url.'">';
			die($msg);
		} else {
			if ($url){
				if($url=="-1"){
					$omsg=$ajax?json_encode(array('msg'=>$msg,'no'=>-1)):"history.go(-1);";
				}elseif($url=="0"){
					$omsg=$ajax?json_encode(array('msg'=>$msg,'no'=>0)):"window.close();";
				}else{
					$omsg=$ajax?json_encode(array('msg'=>$msg,'no'=>1)):"location.href='$url';";
				}
			}
			die($ajax?$omsg:'
                <style type="text/css">
                *{ padding:0; margin:0; font-size:12px}
                a:link,a:visited{text-decoration:none;color:#0068a6}
                a:hover,a:active{color:#ff6600;text-decoration: underline}
                .showMsg{border: 1px solid #2E363F; zoom:1; width:450px; height:172px;position:absolute;top:44%;left:50%;margin:-87px 0 0 -225px}
                .showMsg h5{background-color: #2E363F; color:#fff; height:30px; line-height:30px;font-size:14px; text-align:center;}
                .showMsg .content{ padding:42px 0; font-size:14px; height:31px;line-height: 31px; text-align:center;}
                .showMsg .bottom{ background:#E9EDF0; margin: 0 1px 1px 1px;line-height:26px; *line-height:30px; height:26px; text-align:center}
                #percent {font-family: "宋体";font-size: 12px;margin-right: 5px;}
                </style>
                <div class="showMsg" style="text-align:center">
                    <h5>提示信息</h5>
                    <div class="content guery" style="display:inline-block;display:-moz-inline-stack;zoom:1;*display:inline;max-width:330px">'.$msg.'</div>
                    <div class="bottom">
                        <a href="javascript:'.$omsg.'"><font id="percent">'.$time.'</font>秒后跳转，点击这里马上跳转</a>
                                    </div>
                </div>
                <script language="javascript"> 
                var bar='.$time.' ;
                function count(){ 
                    bar=bar-1 ;
                    document.getElementById("percent").innerHTML=bar;
                    if (bar>0){
                        setTimeout("count()",1000);
                    }else{
                        '.$omsg.'; 
                    }  
                }
                count() ;
                </script>
            ');
        }
	}
	//操作状态提示
	static function execmsg($ctrl,$url,$status=TRUE){
		$msg=$ctrl."操作执行".($status?"成功":"失败");
		self::showmessage($msg, $url);
	}
	static function checkadmin(){
		if($_SESSION[TB.'is_admin']){
			return true;
		}else{
			return false;
		}

	}
	static function catauth($action){
		if($_SESSION[TB.'admin_level']=='admincat'){
			return in_array($action, array('cms','frame','user','admin'))?true:false;
		}
		return true;
	}
	
	static function safeword($text,$level=8){
		if(is_array($text))
		{
			foreach( $text as $key=>$value){
				$safeword[$key]=self::safeword($value);
			}
		}
		else
		{
			switch ($level)
			{
				case 0:
					$safeword=$text;
					break;
				case 1:
					$safeword=intval($text);
					break;
				case 3:
					$safeword=strip_tags($text);
					break;
				case 5:
					$safeword=nl2br(htmlspecialchars($text));
					break;
				case 6:
					$safeword=str_replace("'","",addslashes($text));
					$safeword=str_replace("select","",$safeword);
					$safeword=str_replace("union","",$safeword);
					$safeword=str_replace("=","",$safeword);
					break;
				default:
					if(ucfirst(DB)=='Sqlite'){
						$safeword=str_replace("'","''",$text);
					}
					else{
						$safeword=Base::_addslashs($text);
					}
					break;
			
			}
		}
		return $safeword;
	}
	static function _addslashs($text){
		$text = addslashes($text);
		return $text;
		
	}
	static function mystatus($level=1){
		switch ($level)
		{
			case 0:
				$s='草稿';
				break;
			case 1:
				$s='发表';
				break;
			case 2:
				$s='隐藏';
				break;
			case 3:
				$s='其他';
				break;
			default:
				break;

		}
		return $s;
	}
	static function catstatus($level=1){
		switch ($level)
		{
			case 0:
				$s='隐藏';
				break;
			case 1:
				$s='显示';
				break;
			case 2:
				$s='链接';
				break;
			case 3:
				$s='其他';
				break;
			default:
				break;

		}
		return $s;
	}
	static function cmstatus($level=1){
		switch ($level)
		{
			case 0:
				$s='禁止';
				break;
			case 1:
				$s='允许';
				break;
		}
		return $s;
	}
	static function magic2word($text){
		if (is_array($text)) {
			foreach($text as $k=>$v){
			$text[$k]=self::magic2word($v);
			}
		}else{
			$text=stripslashes($text);
		}
		return $text;
	}
	//生成缓存php文件内容
	static function phpcache($name,$arrays){
		$data="<?php\n\$".$name."=";
		$data.=var_export($arrays,TRUE);
		$data.=";\n?>";
		return $data;
	}
	//生成自定义URL   $flag值为1则是文章URL，否则为栏目
	static function creaturl($data='',$flag=1){
		//获取父ID，将生成的栏目名组合 by trlanfeng @ 2014.04.05
        $db=new Dbclass(SYS_ROOT.DB_NAME);
        $fcatname = '';
		if($flag==1){
			//获取文章URL的cat，需要Cms.php传输cat字段 by trlanfeng @ 2014.04.05
	        if (!empty($data['cat'])){
	            $catname = $db->get_one(TB.'category','id = '.$data['cat'],'nickname');
	            $data['catname'] = $catname['nickname'];
				$fcatid = $db->get_one(TB.'category','id = '.$data['cat'],'fid');
				if ($fcatid['fid'] != '' || $fcatid['fid'] != 0) {
					$data['fid'] = $fcatid['fid'];
				}
	        }
            //如果父栏目不为空
	        if (!empty($data['fid'])){
                //获取父栏目的URL
	            $fcatname = $db->get_one(TB.'category','id = '.$data['fid'],'staticurl');
	            $fcatname = $fcatname['staticurl'];
	            $lastpos = strrpos( $fcatname, '/');
	            $fcatname = substr($fcatname, 0, $lastpos);
	        }
            var_dump($configurl);
			$configurl=str_replace('{slug}',$data['slug'],Base::magic2word(ATLURL));
            var_dump($configurl);
			$configurl=str_replace('{catname}', $data['catname'], $fcatname.$configurl);
            var_dump($configurl);
			$configurl=str_replace('{id}',$data['id'],$configurl);
            var_dump($configurl);
			$configurl=str_replace('{Y}',date('Y',$data['times']),$configurl);
            var_dump($configurl);
			$configurl=str_replace('{m}',date('m',$data['times']),$configurl);
            var_dump($configurl);
			$configurl=str_replace('{d}',date('d',$data['times']),$configurl);
            var_dump($configurl);
		}else{
			if (empty($data['fid']) && $data['id'] > 0){
				$fcatid = $db->get_one(TB.'category','id = '.$data['id'],'fid');
				if ($fcatid['fid'] != '' || $fcatid['fid'] != 0) {
					$data['fid'] = $fcatid['fid'];
				}
			}
	        if (!empty($data['fid'])){
	            $fcatname = $db->get_one(TB.'category','id = '.$data['fid'],'staticurl');
	            $fcatname = $fcatname['staticurl'];
	            $lastpos = strrpos( $fcatname, '/');
	            $fcatname = substr($fcatname, 0, $lastpos);
	        }
			$configurl=str_replace('{catname}',urlencode($data['nickname']),$fcatname.Base::magic2word(CATURL));
			$configurl=str_replace('{id}',$data['id'],$configurl);
		}
        var_dump($configurl);
		//return $configurl;
	}
	static function sendheader($status){
		switch ( $status){
			case 404:
				header("HTTP/1.1 404 Not Found");
				header("Status: 404 Not Found");
				exit;
				break;
			default:
				break;
		}
		
	}
    static function getposition($catid) {
        $db=new Dbclass(SYS_ROOT.DB_NAME);
        $position = '';
        //判断是否传入 $catid 参数 add by trlanfeng @ 2014.04.07
        if (!empty($catid) && $catid > 0){
            //通过查询取得当前 $catid 的 fid
            $fcatid = $db->get_one(TB.'category','id = '.$catid,'*');
            //输出当前栏目的面包屑导航
            $position = '<a href="'.$fcatid['staticurl'].'">'.$fcatid['name'].'</a>'.' - '.$position;
            //查询 fid 是否为顶级ID，不是则进行循环输出
            while ($fcatid['fid'] != '' || $fcatid['fid'] != 0) {
                //获取父级栏目URL，添加进面包屑导航
                $fcatid = $db->get_one(TB.'category','id = '.$fcatid['fid'],'*');
                $position = '<a href="'.$fcatid['staticurl'].'">'.$fcatid['name'].'</a>'.' - '.$position;
            }
        }
        return $position;
    }
}
?>
