<?php
// CMG Imports
use cmsgears\core\common\models\resources\ModelComment;

use cmsgears\core\common\utilities\CodeGenUtil;

if( isset( $modelsHtml ) && strlen( $modelsHtml ) > 0 ) {

	// Get random comment
	$commentService	= Yii::$app->factory->get( 'modelCommentService' );
	$random			= $commentService->getRandomObjects( [ 'status' => ModelComment::STATUS_APPROVED ] );
	$review			= $random[ 0 ];

	$avatarUrl		= Yii::getAlias( "@images" ) . '/user-icon-2.png';

	if( isset( $review->creator ) ) {

		$avatarUrl		= CodeGenUtil::getMediumUrl( $review->creator->avatar, [ 'image' => 'user-icon-2.png' ] );
	}
?>
	<div class="color color-primary padding padding-block-medium clearfix">
		<div class="container padding padding-small clearfix">
			<div class="row row-inline clearfix padding padding-medium-v row-xlarge">
				<div class="colf12x8 col review-featured padding padding-small clearfix" id="user-reviews">
					<h2 class="align align-center heading-primary-l">Customer Says</h2>
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