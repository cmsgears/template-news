<?php
// CMG Imports
use cmsgears\core\common\utilities\CodeGenUtil;
use cmsgears\core\common\utilities\DateUtil;

$rating			= $model->rating;
$commentDate	= DateUtil::getDateFromDateTime( $model->createdAt );

$avatarUrl		= Yii::getAlias( "@images" ) . '/user-icon-2.png';

if( isset( $model->creator ) ) {

	$avatarUrl		= CodeGenUtil::getMediumUrl( $model->creator->avatar, [ 'image' => 'user-icon-2.png' ] );
}
?>
<div class='clearfix relative max-cols-100'>
	<div class="colf12x2">
		<div class='col12x4'>
			<img class="fluid " src="<?= $avatarUrl ?>">
		</div>
		<div class='col12x8'>
			<h6 class='text text-link mp-none align align-left'><?= ucfirst( $model->name ) ?></h6>
			<div class="box-rating rating-secondary">
                <?= yii::$app->formDesigner->getRatingStars( $rating, 5 ) ?>
            </div>
		</div>
	</div>
	<div class="colf12x10">
	   <div class="review clearfix relative">
	   		<!--<div class='col12'><i class='fa fa-quote-left'></i></div>-->
	   		<div class='align-justify'><span class="font-size font-size-large-7">
	   			<div class="content-half clearfix">
	   				<i class='fa fa-quote-right right'></i>
					<i class='fa fa-quote-left left'></i><p class="padding padding-xlarge-h"><?=substr( $model->content, 0, 200 );?></p>
				</div>
				<div class="content-full clearfix hidden">
	   				<i class='fa fa-quote-right right'></i>
					<i class='fa fa-quote-left left'></i><p class="padding padding-xlarge-h"><?=$model->content?></p>
				</div>
				<?php if( strlen( $model->content ) > 200 ) { ?>
					<br><a class="view-full-review padding padding-xlarge-h">View More ...</a>
				<?php } ?>
   			</span></div>
	   		<!--<div class='col12 align align-right'><i class='fa fa-quote-right'></i></div>-->
			<!--<div class="filler-height filler-height-default clear"> </div>-->
		</div>
	</div>
</div><hr>