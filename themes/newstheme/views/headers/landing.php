<?php
// Yii Imports
use yii\helpers\Html;
use yii\helpers\Url;

// CMG Imports
use cmsgears\widgets\elements\Nav;

// SF Imports
use themes\newstheme\Theme;
?>

<header id="header-main" class="width" style="background-image: url( <?= Yii::getAlias( '@images' ) .'/header-banner.jpg' ?> )">
	<div class="row padding padding-default header-content content-80" >
		<div class="col col12x6">
			<div class="logo"><?=Html::a( "<img class='fluid' src='" . Yii::getAlias( '@images' ) . "/icons/logo.png'>", [ '/' ], null )?></div>
		</div>
		<div class="col col12x6  ">
			<ul class="hnav-basic right">
			<li><a href="<?= Url::to( ['/login'] ) ?>"><span class="fas fa-user inline-block"><span class="padding padding-left-default">login</span></span></a></li>
			<li><a href="<?= Url::to( ['/login'] ) ?>"><span class="fas fa-sign-in-alt inline-block"><span class="padding padding-left-default">sign Up</span></span></a></li>
			</ul>
		</div>
	</div>
    <div class="content-80">
		<ul class="hnav-basic"> 
			<li><a href="<?= Url::to(['/search'] )?>">Fasion</a></li>
			<li><a href="<?= Url::to(['/search'] )?>">search</a></li>
			<li><a href="<?= Url::to(['/search'] )?>">search</a></li>
			<li><a href="<?= Url::to(['/search'] )?>">search</a></li>
			<li><a href="<?= Url::to(['/search'] )?>">search</a></li>
			<li><a href="<?= Url::to(['/privacy'] )?>">privacy</a></li>
			<li><a href="<?= Url::to(['/login'] )?>">login</a></li>
		</ul>
	</div>
</header>