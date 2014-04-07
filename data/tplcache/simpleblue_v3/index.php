<?php if(constant("TrackCMS!") !== true)die;?><?php include(self::$tpl->myTpl("header","simpleblue_v3/",'self::$tpl')); ?>
	<div class="index_slider"></div>
	<div class="index_think">
		<div class="index_think_in">
			<div class="one mr35">
				<div class="title">
					<div class="icon">
						<i class="icon-lightbulb"></i><span></span>
					</div>
					<h4>奇思妙想</h4>
					<h6>Think &amp; Design</h6>
				</div>
				<p>
					伟人之所以伟大，是因为他与别人共处逆境时，别人失去了信心，他却下决心实现自己的目标。
				</p>
			</div>
			<div class="one mr35">
				<div class="title">
					<div class="icon"></div>
					<h4>勇于突破</h4>
					<h6>Courage &amp; Action</h6>
				</div>
				<p>
					每个人的一生都有许多梦想，但如果其中一个不断搅扰着你，剩下的就仅仅是行动了。
				</p>
			</div>
			<div class="one">
				<div class="title">
					<div class="icon">
						<i class="icon-lightbulb"></i><span></span>
					</div>
					<h4>三省吾身</h4>
					<h6>Reflection &amp; Correct</h6>
				</div>
				<p>
					人若软弱就是自己最大的敌人；人若勇敢就是自己最好的朋友。勇于认识自己的错误，并改正之。
				</p>
			</div>
		</div>
	</div>
	<div class="index_blog">
		<div class="index_blog_in">
			<div class="coding">
				<h2>
					Coding
				</h2>
				<ul>
					<?php $_i=0;$QR = $dbit->getquery(TB."cms|cat=1|8|id DESC"); while($list = $dbit->fetch_array($QR)){$_i++; ?>
					<li>
						<cite></cite>
						<a href="<?php ;echo $list['staticurl']; ?>" target="_blank">
							<?php ;echo $list['name']; ?>
						</a>
						<span><?php ;echo date("Y-m-d",$list['times']); ?></span>
					</li>
					<?php ;} ?>
				</ul>
			</div>
			<div class="other">
				<h2>
					Other
				</h2>
				<ul>
					<?php $_i=0;$QR = $dbit->getquery(TB."cms|cat!=1|8|id DESC"); while($list = $dbit->fetch_array($QR)){$_i++; ?>
					<li>
						<cite></cite>
						<a href="<?php ;echo $list['staticurl']; ?>" target="_blank">
							<?php ;echo $list['name']; ?>
						</a>
						<span><?php ;echo date("Y-m-d",$list['times']); ?></span>
					</li>
					<?php ;} ?>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="index_work">
		<div class="index_work_in">
			<h2>作品</h2>
			<ul>
				<?php $_i=0;$QR = $dbit->getquery(TB."cms|cat=13|4|id DESC"); while($list = $dbit->fetch_array($QR)){$_i++; ?>
				<li>
					<a href="<?php ;echo $list['staticurl']; ?>" target="_blank" title="<?php ;echo $list['name']; ?>">
						<img src="<?php ;echo $list['thumbpic']; ?>" alt="<?php ;echo $list['name']; ?>" width="235" height="150">
					</a>
				</li>
				<?php ;} ?>
			</ul>
		</div>
	</div>
<?php include(self::$tpl->myTpl("footer","simpleblue_v3/",'self::$tpl')); ?>