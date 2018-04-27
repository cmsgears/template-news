<?php
// CMG Imports
use cmsgears\core\common\utilities\DateUtil;

$rating			= $model->rating;
$commentDate	= DateUtil::getDateFromDateTime( $model->createdAt );
?>
<div class="clearfix">
	<div class="col12x2">
		<img class="fluid circled1 " src="<?= Yii::getAlias( '@images' ) ?>/user-icon-2.png">
		<p class="text bold italic font-size font-size-small align align-center"> <?= ucfirst( $model->name ) ?> </p>
	</div>
	<div class="col12x10">
	   <div class="review clearfix">
            <div class="box-rating rating-secondary">
                <?= yii::$app->formDesigner->getRatingStars( $rating, 5 ) ?>
            </div>
			<p class="font-size font-size-large-7"><?= $model->content ?></p>
			<div class="filler-height filler-height-default"> </div>
			<div class="row">
				<p class="bold"><?= $commentDate ?></p>
			</div>
		</div>
	</div>
</div>