<?php
// Yii Imports
use yii\helpers\Html;

// CMG Imports
use cmsgears\widgets\dnav\DynamicNav;

// SF Imports
use themes\newstheme\Theme;
?>

<header id="header-main">
	<div class="header-inner relative clearfix">
            <div class="row bkg bkg-secondary">
		<div class="colf colf12x10">
			<div id="btn-mobile-menu" class="bkg padding padding-large bkg-secondary-d text text-white inline-block font-size font-size-default"><i class="cmti cmti-menu"></i></div>
               
		</div>
		<div class="colf colf12x2 clearfix ">
			<div class="logo align align-center  padding padding-medium"><?=Html::a( "<img class='fluid' src='" . Yii::getAlias( '@images' ) . "/icons/logo.png'>", [ '/' ], null )?></div>
		</div>
            </div>    
	</div>
</header>