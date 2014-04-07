<?php if(constant("TrackCMS!") !== true)die;?><?php include(self::$tpl->myTpl("header","simpleblue_v3/",'self::$tpl')); ?>
<div class="blog">
    <div class="main list">
        <?php $_i=0;if(is_array($articles))foreach($articles AS $atl){$_i++; ?>
        <section class="box">
            <div class="title">
                <h2>                   
                    <a title="<?php ;echo $atl['name']; ?>" href="<?php ;echo $atl['staticurl']; ?>" target="_blank"><?php ;echo $atl['name']; ?></a>
                </h2>
            </div>
            <article class="content">
                <?php if(!$atl['orders']){ ?>
                <?php ;echo Base::cutStr($atl['content'],260);; ?>...
                <?php ;} ?>
            </article>
            <div class="info">
                <span style="float: right"><a href="<?php ;echo $atl['staticurl']; ?>#uyan_frame" target="_blank">回复</a></span>
                <span style="float: right"><a href="<?php ;echo $atl['staticurl']; ?>" target="_blank">查看全文</a></span>
                <span>阅读：<?php ;echo $atl['views']; ?></span>
                <span>分类：<a href="<?php ;echo $cats[$atl['cat']]['staticurl']; ?>"><?php ;echo $cats[$atl['cat']]['name']; ?></a></span>
                <span>Tag：
                    <?php ;$tagarray=explode(',',$atl['tags']);; ?>
                    <?php $_i=0;if(is_array($tagarray))foreach($tagarray AS $tag){$_i++; ?>
                    <a href="/?tag=<?php ;echo urlencode($tag);; ?>"><?php ;echo $tag; ?></a>
                    <?php ;} ?>
                </span>
            </div>
        </section>
        <?php ;} ?>
        <?php if($_i==0){ ?>  
        <section class="box1"><div class="box1_title"><h1>抱歉，当前栏目没有文章！</h1></div></section>  
        <?php ;} ?>
        <?php if($_i!=0){ ?>
        <ul class=" pagination pagination-blue">
            <a <?php if(($page==0) || ($page==1)){ ?>disabled<?php ;} ?> class="pure-button" <?php if(($page!=0) && ($page!=1)){ ?>href="/index.php?p=<?php ;echo $uppage; ?>"<?php ;} ?> >&laquo;</a>
            <?php for($i=1;$i<$pagenum;$i++){ ?>
            <a id="page<?php ;echo $i; ?>" href="/index.php?p=<?php ;echo $i; ?>"><?php ;echo $i; ?></a>
            <?php ;} ?>
            <a <?php if($downpage==$page){ ?>disabled<?php ;} ?> class="pure-button" <?php if($downpage!=$page){ ?>href="/index.php?p=<?php ;echo $downpage; ?>"<?php ;} ?>>&raquo;</a>
        </ul>
        <script>
            thispage = "<?php ;echo $_GET['p']; ?>";
            if(thispage == "0" || thispage == "") {thispage = "1"}
            $(function(){
                $("#page"+thispage).addClass("active");
            });
        </script>
        <?php ;} ?>
    </div>
    <?php include(self::$tpl->myTpl("blogside","simpleblue_v3/",'self::$tpl')); ?>
    <div class="clear"></div>
</div>
<?php include(self::$tpl->myTpl("footer","simpleblue_v3/",'self::$tpl')); ?>