<?php
// Yii Imports
use yii\helpers\Html;

// CMG Imports
use cmsgears\widgets\elements\Nav;

// SF Imports
use themes\newstheme\Theme;
?>

<header id="header-main" class=" width">
	<div class="row bkg bkg-secondary">
		<div class="col col12x6">
			<div id="btn-mobile-menu" class="padding padding-medium text text-white inline-block ">
				<i class="cmti cmti-menu">
				</i>
			</div>
		</div>
		<div class="col col12x6  ">
			<div class="logo content-right-50 padding padding-top-medium align align-center"><?=Html::a( "<img class='fluid' src='" . Yii::getAlias( '@images' ) . "/icons/logo.png'>", [ '/' ], null )?></div>
		</div>
	</div>
    <div class="clear">
		<?= Nav::widget( [ 'view' => $this, 'slug' => Theme::MENU_FEATURED, 'options' => [ 'class' => 'nav-table uppercase' ] ] ) ?>
	</div>
</header>