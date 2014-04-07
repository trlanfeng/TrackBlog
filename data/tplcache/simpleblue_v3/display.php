<?php if(constant("TrackCMS!") !== true)die;?><?php include(self::$tpl->myTpl("header","simpleblue_v3/",'self::$tpl')); ?>
<div class="blog">
    
    <div class="main post">
        <div class="title">
            <h1><?php ;echo $atl['name']; ?>111<?php ;echo Base::getposition($catid);; ?><?php ;echo $cat; ?><?php ;echo $catcatid; ?></h1>
            <p>
                <span>阅读：<?php ;echo $atl['views']; ?></span>
                <span>栏目：<a href="<?php ;echo $cats[$atl['cat']]['staticurl']; ?>"><?php ;echo $cats[$atl['cat']]['name']; ?></a></span>
                <span>Tag：
                    <?php ;$tagarray=explode(',',$atl['tags']);; ?>
                    <?php $_i=0;if(is_array($tagarray))foreach($tagarray AS $tag){$_i++; ?>
                    <a href="/?tag=<?php ;echo urlencode($tag);; ?>">
                        <?php ;echo $tag; ?>
                    </a>
                    <?php ;} ?>
                </span>
            </p>
        </div>
        <!--正文开始-->
        <article class="content">
            <?php ;echo $atl['content']; ?>
        </article>
        <div class="info">
            <p>转载请注明出处，本文地址：http://<?php ;echo $_SERVER['HTTP_HOST']; ?><?php ;echo $_SERVER['REQUEST_URI']; ?></p>
            <!-- UJian Button BEGIN -->
            <div class="ujian-hook"></div>
            <script type="text/javascript">var ujian_config = {num:6,showType:3};</script>
            <script type="text/javascript" src="http://v1.ujian.cc/code/ujian.js?uid=1744878"></script>
            <a href="http://www.ujian.cc" style="border:0;"><img src="http://img.ujian.cc/pixel.png" alt="友荐云推荐" style="border:0;padding:0;margin:0;" /></a>
            <!-- UJian Button END -->
        </div>
        <!--正文结束-->
        <!--
        <div class="info">
            <div class="contentBotAds">本博客所有文章，若非注明，均为原创。转载请注明出处，谢谢&nbsp;&nbsp;&nbsp;&nbsp;>_<</div>
        </div>
        -->
        <div class="prenext">
            <p>
            下一篇：
            <?php if($downart){ ?>
                <a href="/<?php ;echo $downart['staticurl']; ?>"><?php ;echo $downart['name']; ?></a>
            <?php ;}else{ ?>
                没有了
            <?php ;} ?>
            </p>
            <p>
            上一篇：
            <?php if($upart){ ?>
                <a href="/<?php ;echo $upart['staticurl']; ?>"><?php ;echo $upart['name']; ?></a>
            <?php ;}else{ ?>
                没有了
            <?php ;} ?>
            </p>
        </div>
        <?php if($atl['allowcmt']==1){ ?>
        <?php include(self::$tpl->myTpl("comments","simpleblue_v3/",'self::$tpl')); ?>
        <?php ;} ?>
    </div>
    <?php include(self::$tpl->myTpl("blogside","simpleblue_v3/",'self::$tpl')); ?>
    <div class="clear"></div>
</div>
<?php include(self::$tpl->myTpl("footer","simpleblue_v3/",'self::$tpl')); ?>