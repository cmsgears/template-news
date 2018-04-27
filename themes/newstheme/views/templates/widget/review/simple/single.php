<?php
// CMG Imports
use cmsgears\core\common\utilities\CodeGenUtil;
use cmsgears\core\common\utilities\DateUtil;

$rating			= $model->rating;
$commentDate	= date( 'M d, Y	' ,strtotime( DateUtil::getDateFromDateTime( $model->createdAt ) ) );
$avatarUrl		= Yii::getAlias( "@images" ) . '/user-icon-2.png';
$reviewImages	= $model->modelFiles;

if( isset( $model->creator ) ) {

	$avatarUrl		= CodeGenUtil::getMediumUrl( $model->creator->avatar, [ 'image' => 'user-icon-2.png' ] );
}

?>
<div class='clearfix relative max-cols-100'>
	<div class="col12x3">
		<div class='col12x5'>
			<img class="fluid " src="<?= $avatarUrl ?>">
		</div>
		<div class='col12x7'>
			<h6 class='text text-link mp-none'><?= ucfirst( $model->name ) ?></h6>
			<div class="box-rating rating-secondary">
                <?= yii::$app->formDesigner->getRatingStars( $rating, 5 ) ?>
            </div>
		</div>
	</div>
	<div class="col12x9">
	   <div class="review clearfix relative">
	   		<div class='col12'><i class='fa fa-quote-left'></i></div>
	   		<div class='col12x10 align-justify'><span class="font-size font-size-large-7"><?= $model->content ?></span></div>
	   		<div class='col12 align align-right'><i class='fa fa-quote-right'></i></div>
			<div class="filler-height filler-height-default clear"> </div>
			<?php if( count( $reviewImages ) > 0 ) { ?>
			<div class="relative clearfix max-cols-100">
				<div class="col12"></div>
				<div class="review-images relative clearfix max-cols-100 col12x10">
				    <?php foreach ( $reviewImages as $reviewImage ) {

						$image	= $reviewImage->file;
						?>
						<div class="col12x4 image relative">
							<img class="width" src="<?=$image->getThumbUrl()?>">
							<?php if( strlen( $image->title ) > 0 ) { ?>
								<p><?=$image->title?></p>
							<?php } ?>
						</div>
		            <?php } ?>
		            <div class="clear">
		            	<p class='bold align align-right'><?= $commentDate ?></p>
		            </div>
			    </div>
			    <div class="col12"></div>
			</div>
		    <?php } ?>
		</div>
	</div>
</div><hr>