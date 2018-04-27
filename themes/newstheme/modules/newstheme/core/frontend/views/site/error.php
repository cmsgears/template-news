<?php
// Yii Imports
use yii\helpers\Html;

$coreProperties = $this->context->getCoreProperties();
$this->title 	= $coreProperties->getSiteTitle() . " | Error";
?>
<div id="block-public" class="block block-basic block-404 relative clearfix max-cols-100">
	<div class="col12x4"></div>
	<div class="col12x4">
		<img class="fluid" src="<?=Yii::getAlias( "@images" )?>/404.jpg">
		<div class="filler-height filler-height-xlarge"></div>
		<h1 class="text text-white align align-center font-size font-size-large-1">uh-oh!</h1>
		<h3 class="text text-white align align-center font-size font-size-large-3">The page you're looking for cannot be found</h3>
		<h6 class="text text-white align align-center font-size font-size-large-6">Error Code: 404</h6>
	</div>
	<div class="col12x4"></div>
</div>