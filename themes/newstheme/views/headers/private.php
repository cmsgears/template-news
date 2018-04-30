<?php
// Yii Imports
use yii\helpers\Html;

?>

<header id="header-main">
	<div class="header-inner relative clearfix">
        <div class="row bkg bkg-secondary">
			<div class="col col12x10">
				<div id="btn-mobile-menu" class="padding padding-medium text text-white inline-block font-size font-size-default"><i class="cmti cmti-menu"></i></div>

			</div>
			<div class="col col12x2 clearfix ">
				<div class="logo align align-center  padding padding-top-medium"><?=Html::a( "<img class='fluid' src='" . Yii::getAlias( '@images' ) . "/icons/logo.png'>", [ '/' ], null )?></div>
			</div>
        </div>    
	</div>
</header>