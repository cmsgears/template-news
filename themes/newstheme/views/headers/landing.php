<?php
// Yii Imports
use yii\helpers\Html;

// CMG Imports
use cmsgears\widgets\dnav\DynamicNav;

// SF Imports
use themes\newstheme\Theme;
?>

<header id="header-main" class="absolute width">
	<div class="row   clearfix">
		<div class="colc col12x6">
			<div id="btn-mobile-menu" class="bkg padding padding-medium bkg-secondary-d text text-white inline-block ">
				<i class="cmti cmti-menu"> </i>
			</div>
		</div>
		<div class="colc col12x6  ">
			<div class=" logo  content-right-50 padding padding-medium align align-center"><?=Html::a( "<img class='fluid' src='" . Yii::getAlias( '@images' ) . "/icons/logo.png'>", [ '/' ], null )?></div>
		</div>
	</div>
    <div class="clear">
		<?= DynamicNav::widget( [ 'view' => $this, 'slug' => Theme::MENU_FEATURED, 'options' => [ 'class' => 'nav-table uppercase' ] ] ) ?>
	</div>
</header>