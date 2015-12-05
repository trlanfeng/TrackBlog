{inc:header}
<div class="am-container blog">
    <div class="am-u-lg-9 blog_out">
        <div class="blog_left am-article">
            <div class="am-article-hd">
                <h1 class="am-article-title">{$atl['name']}</h1>
                <p class="am-article-meta">
                    <span>阅读：{$atl['views']}</span>
                    <span>栏目：<a href="{$cats[$atl['cat']]['staticurl']}">{$cats[$atl['cat']]['name']}</a></span>
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
            <article class="am-article-bd">
                <p class="am-article-lead">{$atl['description']}</p>
                {$atl['content']}
                <hr class="am-article-divider">
                <h2>作者简介</h2>
                <p>转载请注明出处，本文地址：http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}</p>
                <hr class="am-article-divider">
                <!-- UJian Button BEGIN -->
                <div class="ujian-hook"></div>
                <script type="text/javascript">var ujian_config = {num:18,showType:3,picSize:84,textHeight:45};</script>
                <script type="text/javascript" src="http://v1.ujian.cc/code/ujian.js?uid=1744878"></script>
                <a href="http://www.ujian.cc" style="border:0;"><img src="http://img.ujian.cc/pixel.png" alt="友荐云推荐" style="border:0;padding:0;margin:0;" /></a>
                <!-- UJian Button END -->
                <hr class="am-article-divider">
                <p>
                    下一篇：
                    <!-- if($downart) -->
                    <a href="{$downart['staticurl']}">{$downart['name']}</a>
                    <!-- else -->
                    没有了
                    <!-- end -->
                </p>
                <p>
                    上一篇：
                    <!-- if($upart) -->
                    <a href="{$upart['staticurl']}">{$upart['name']}</a>
                    <!-- else -->
                    没有了
                    <!-- end -->
                </p>
                <hr class="am-article-divider">
                <!-- if($atl['allowcmt']==1) -->
                {inc:comments}
                <!-- end -->
            </article>
        </div>
    </div>
    {inc:sideright}
</div>
{inc:footer}