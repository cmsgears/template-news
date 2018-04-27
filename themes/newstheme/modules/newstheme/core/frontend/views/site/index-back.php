<?php
// CMG Imports
use cmsgears\widgets\block\BasicBlock;
use cmsgears\widgets\dnav\DynamicNav;
use cmsgears\widgets\comment\show\ShowReviews;

// FXS Imports
use foxslider\widgets\FoxSliderMain;

// BizzList Imports
use themes\bizzlist\Theme;

use widgets\listing\FeaturedListing;
use widgets\listing\RecentListing;
use widgets\listing\CategoryListings;
use widgets\twitter\Tweets;

$coreProperties = $this->context->getCoreProperties();
$themePath		= Yii::getAlias( '@themes/bizzlist' );
?>

<?php BasicBlock::begin([
	'options' => [ 'id' => 'block-slider', 'class' => 'block' ],
	'content' => true
]);?>

	<?php include "$themePath/views/includes/search/listing.php"; ?>

	<?= FoxSliderMain::widget([
		'options' => [ 'id' => 'slider-main', 'class' => 'fx-slider fx-slider-basic' ],
		'fxOptions' => [ 'bullets' => false, 'controls' => true, 'autoScroll' => false, 'stopOnHover' => false ],
		'sliderName' => 'main',
		'template' => 'slider-landing',
		'templateDir' => Yii::getAlias( '@templates/widget' )
	]) ?>

	<div id="wrap-btn-add-business" class="cmt-request" cmt-key="addBusiness" cmt-custom="1" cmt-action="checkUser" cmt-controller="default" method="get" action="site/check-user">
        <div class="max-area-cover spinner">
            <div class="valign-center cmti cmti-2x cmti-spinner-1 spin"></div>
        </div>
        <!--<a class="cmt-click btn btn-large">Add Missing Business</a>-->
    </div>

<?php BasicBlock::end() ?>
<div>
	<h2 class="heading-primary-l align align-center padding padding-small-v"> What are you looking for ? </h2>
	<?= CategoryListings::widget([
		'options' => [ 'id' => 'block-featured', 'class' => 'align align-center' ]
	]) ?>
</div>

<?= ShowReviews::widget([
	'templateDir' => '@templates/widget/review/landing', 'template' => 'listing',
	'parentType' => 'listing'
]) ?>

<?= FeaturedListing::widget([
	'templateDir' => Yii::getAlias( '@widgets/listing/views/featured' )
]) ?>

<?= RecentListing::widget([
	'title' => 'Recently Viewed',
	'limit' => 4
]) ?>

<!--<div class="color color-primary-l padding padding-xlarge-v">
	<?php /*Tweets::widget()*/ ?>
</div>-->