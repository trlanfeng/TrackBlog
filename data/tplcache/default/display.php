<?php if(constant("TrackCMS!") !== true)die;?><?php include(self::$tpl->myTpl("header","default/",'self::$tpl')); ?>
<!--trackBody开始-->
  <div id="bodyLeft">
    <div class="npPost">
      <div class="floatLeft"> «<?php if($upart){ ?><a href="<?php ;echo weburl; ?><?php ;echo upart['staticurl']; ?>"><?php ;echo upart['name']; ?></a><?php ;}else{ ?>没有了<?php ;} ?></div>
	 <div class="floatRight"><?php if($downart){ ?><a href="<?php ;echo weburl; ?><?php ;echo downart['staticurl']; ?>"><?php ;echo downart['name']; ?></a> » <?php ;}else{ ?>没有了<?php ;} ?>  </div>
	  
	  
	  <div class="clear"></div>
    </div>
    <!--正文开始-->
    <div id="post">
      <h2 class="arttitle"><a rel="bookmark" title="Permanent Link to <?php ;echo atl['name']; ?>"  href="<?php ;echo weburl; ?><?php ;echo atl['staticurl']; ?>"><?php ;echo atl['name']; ?></a></h2>
	  <div id="postTime"><?php ;echo date("Y-m-d",$atl['times']);; ?></div>
	  	  <!--文章内容开始-->
      <div id="content"><?php ;echo atl['content']; ?></div>
	    <!--文章内容结束-->
	  <div id="postDetal">
	   <p>类别:<a href="<?php ;echo weburl; ?><?php ;echo cats[$atl['cat']]['staticurl']; ?>"><?php ;echo cats[$atl['cat']]['name']; ?></a> | 阅读:<?php ;echo atl['views']; ?> | 评论:<?php ;echo atl['cmtcount']; ?> | 
	   标签:<?php ;$tagarray=explode(',',$atl['tags']);; ?><?php $_i=0;if(is_array($tagarray))foreach($tagarray AS $tag){$_i++; ?><a href="<?php ;echo weburl; ?>?tag=<?php ;echo urlencode($tag);; ?>"><?php ;echo tag; ?></a> <?php ;} ?></p>
	  </div>
	  <div id="digit"><a rel="nofollow" href="javascript:void(0)" onclick="$trackajax('<?php ;echo weburl; ?>api.php?action=api&ctrl=dig&id=<?php ;echo atl['id']; ?>&p=up&ajax=1')">我顶</a><span id="dignum"><?php ;echo atl['orders3']; ?></span><a rel="nofollow" href="javascript:void(0)" onclick="$trackajax('<?php ;echo weburl; ?>api.php?action=api&ctrl=dig&id=<?php ;echo atl['id']; ?>&p=down&ajax=1')">我踩</a></div>
		<!--文章内容底部广告开始-->
		<div class="contentBotAds">想收藏或者和大家分享这篇好文章→<span class="addthis_org_cn"><a href="#" title="收藏&amp;分享这篇好文章"><img src="template/default/images/addthis.gif" alt="" align="absmiddle" /></a></span>		</div>
		<!--文章内容底部广告结束-->
    </div>
	  <!--正文结束-->
	  <?php if($atl['allowcmt']==1){ ?><?php include(self::$tpl->myTpl("comments","default/",'self::$tpl')); ?><?php ;} ?>


	  </div>
<?php include(self::$tpl->myTpl("sidebar","default/",'self::$tpl')); ?>
<?php include(self::$tpl->myTpl("footer","default/",'self::$tpl')); ?>