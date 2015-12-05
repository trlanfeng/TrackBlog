<div class="am-container blog">
    <div class="am-u-lg-9 list">
        <!-- $articles AS $atl -->
        <section class="box">
            <div class="title">
                <h2>
                    <a href="{$cats[$atl['cat']]['staticurl']}" class="cat"><i></i>{$cats[$atl['cat']]['name']}</a>
                    <a title="{$atl['name']}" href="{$atl['staticurl']}" target="_blank">{$atl['name']}</a>
                </h2>
            </div>
            <article class="content">
                <!-- if(!$atl['orders']) -->
                {run:}echo Base::cutStr($atl['content'],160);{/run}...
                <!-- end -->
            </article>
            <div class="info">
                <span style="float: right"><a href="{$atl['staticurl']}" target="_blank">查看全文</a></span>
                <span>阅读：{$atl['views']}</span>
                <span>分类：<a href="{$cats[$atl['cat']]['staticurl']}">{$cats[$atl['cat']]['name']}</a></span>
                    <span>Tag：
                        {run:}$tagarray=explode(',',$atl['tags']);{/run}
                        <!-- $tagarray AS $tag -->
                        <a href="/?tag={run:}echo urlencode($tag);{/run}">{$tag}</a>
                        <!-- end -->
                    </span>
            </div>
        </section>
        <!-- END -->
        <!-- IF[$_i==0] -->
        <section class="box1"><div class="box1_title"><h1>抱歉，当前栏目没有文章！</h1></div></section>
        <!-- END -->
        <ul data-am-widget="pagination" class="am-pagination am-pagination-default" style="margin:20px 0 0 !important;">
            <li class="am-pagination-prev"><a <!-- if(($page==0) || ($page==1)) -->disabled<!-- end --> <!-- if(($page!=0) && ($page!=1)) -->href="{$path}&p={$uppage}"<!-- end --> >&laquo; 上一页</a></li>
            <!-- for($i=1;$i<$pagenum+1;$i++) -->
            <li><a id="page{$i}" href="{$path}&p={$i}">{$i}</a></li>
            <!-- end -->
            <li class="am-pagination-next"><a <!-- if($downpage==$page) -->disabled<!-- end --> <!-- if($downpage!=$page) -->href="{$path}&p={$downpage}"<!-- end -->>下一页 &raquo;</a></li>
        </ul>
        <script>
            thispage = "{$_GET['p']}";
            if(thispage == "0" || thispage == "") {thispage = "1"}
            $(function(){
                $("#page"+thispage).addClass("am-active");
            });
        </script>
    </div>
    <?php include 'sideright.php'; ?>
    <div class="clear"></div>
</div>