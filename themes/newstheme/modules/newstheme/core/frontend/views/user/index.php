<?php
// Yii imports
use yii\helpers\Url;

$coreProperties 	= $this->context->getCoreProperties();
$this->title 		= 'Home | ' . $coreProperties->getSiteTitle();
$user				= Yii::$app->user->getIdentity();
$images				= Yii::getAlias( "@images" );
?>