<?php if(constant("TrackCMS!") !== true)die;?><?php if(constant("TrackCMS!") !== true)die;?>
<aside>
    <div class="box">
        <div class="title"><span>公告</span></div>
        <div class="content">
            <?php ;echo $announce; ?>
        </div>
    </div>

    <!--
    <div class="box">
        <div class="title">最新评论</div>
        <div class="content">
            <?php $_i=0;$QR = $dbit->getquery(TB."comment|status=1|4|"); while($list = $dbit->fetch_array($QR)){$_i++; ?>
            <?php $_iURL=0;$QRURL = $dbit->getquery(TB."cms|id=$list[article_id]|1"); while($listURL = $dbit->fetch_array($QRURL)){$_iURL++; ?>
            <p><a href="/<?php ;echo $listURL['staticurl']; ?>"><?php ;echo $list['name']; ?>：<?php ;echo $list['content']; ?></a></p>
            <?php ;} ?>
            <?php ;} ?>
        </div>
    </div>
    -->
    <div class="box">
        <div class="title"><span>标签云</span></div>
        <div class="content tag">
            <?php $_i=0;$QR = $dbit->getquery(TB."relations||20|counts DESC"); while($list = $dbit->fetch_array($QR)){$_i++; ?>
            <a href="/?tag=<?php ;echo urlencode($list['name']);; ?>"><?php ;echo $list['name']; ?>[<?php ;echo $list['counts']; ?>]</a>
            <?php ;} ?>
        </div>
    </div>
    <div class="box">
        <div class="title"><span>友情链接</span></div>
        <div class="content">
            <ul class="submenu">
                <?php $_i=0;$QR = $dbit->getquery(TB."link|status=1|20|id DESC"); while($list = $dbit->fetch_array($QR)){$_i++; ?>
                <li class="cat-item"><a href="<?php ;echo $list['urls']; ?>" title="<?php ;echo $list['content']; ?>" target="_blank"><?php ;echo $list['name']; ?></a></li>
                <?php ;} ?>
            </ul>
        </div>
    </div>
</aside>