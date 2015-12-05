<aside class="am-u-lg-3 side_right">
    <div class="box">
        <div class="title"><span>公告</span>
        </div>
        <div class="content">
            <?php ;echo $announce; ?>
        </div>
    </div>
    <!--<div id="hm_t_46341"></div>-->
    <div class="box">
        <div class="title"><span>标签云</span>
        </div>
        <div class="content tag">
            <ul class="am-avg-sm-2">
                <?php $_i=0;$QR = $dbit->getquery(TB."relations||20|counts DESC"); while($list = $dbit->fetch_array($QR)){$_i++; ?>
                    <li><a href="/?tag=<?php ;echo urlencode($list['name']);; ?>">{$list['name']}[{$list['counts']}]</a></li>
                    <?php ;} ?>
            </ul>
        </div>
    </div>
    <div class="box">
        <div class="title"><span>友情链接</span>
        </div>
        <div class="content">
            <ul class="submenu">
                <?php $_i=0;$QR = $dbit->getquery(TB."link|status=1|20|id DESC"); while($list = $dbit->fetch_array($QR)){$_i++; ?>
                    <li class="cat-item"><a href="<?php ;echo $list['urls']; ?>" title="<?php ;echo $list['content']; ?>" target="_blank"><?php ;echo $list['name']; ?></a></li>
                    <?php ;} ?>
            </ul>
        </div>
    </div>
</aside>