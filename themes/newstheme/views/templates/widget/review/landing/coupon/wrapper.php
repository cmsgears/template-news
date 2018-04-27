<?php if( isset( $modelsHtml ) && strlen( $modelsHtml ) > 0 ) { ?>
	<div class="color color-primary padding padding-block-medium clearfix">
		<div class="container padding padding-small clearfix">
			<div class="row clearfix padding padding-medium-v row-xlarge">
				<h1 class="align align-center"><span class="bold">Coupon</span> Reviews</h1>
				<div class="colf12x6 review-day padding padding-small align align-center clearfix">
					<div class="row clearfix padding padding-medium-v">
						<h2> What our customer says ?</h2>
						<div class="filler-height filler-height-default"> </div>
						<div class="img-reviewer center circled1">
							<img class="fluid" src="<?= Yii::getAlias( "@images" ) ?>/user-icon-2.png">
						</div>
						<h4 class="clear-sans bold">Demo User</h4>
						<div class="filler-height filler-height-default"> </div>
						<div class="row clear clearfix">
							<i class="col10 cmti cmti cmti-quote-start align align-center"></i>
							<div class="colf15x12 align align-center"><p direction="up" class="font-size font-size-large-7 questrial ">Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting indu.</marquee></div>
							<i class="col10 cmti cmti cmti-quote-end align align-center"></i>
						</div>
					</div>
				</div>
				<div class="colf12x6 review-featured color color-primary-l padding padding-small clearfix" id="user-reviews">
					<div class="row clearfix">
						<div class="reviews">
							<ul class="cscroller">
								<?= $modelsHtml ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>