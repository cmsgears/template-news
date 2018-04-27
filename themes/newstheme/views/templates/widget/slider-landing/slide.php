<?php
// Yii Imports
use yii\helpers\Html;

$slideImage		= $slide->image;
$slideTitle		= $slide->name;
$slideDesc		= $slide->description;
$slideContent	= $slide->content;
$slideUrl		= $slide->url;
$slideImageUrl	= '';
$slideImageAlt	= '';

if( isset( $slideImage ) ) {

	$slideImageUrl	= $slideImage->getFileUrl();
	$slideImageAlt	= $slideImage->altText;
}

$slideHtml	= "<div class='wrap-slide-content' style='background-image: url($slideImageUrl)'>
					<div class='texture texture-custom'></div>
					<div class='slide-content'>
						<div class='fxs-content'><h1 class='header'>$slideTitle</h1><div class='content h6'>$slideContent</div></div>
					</div>
			   </div>";

if( isset( $slideUrl ) && strlen( $slideUrl ) > 0 ) {

	$slideHtml	= Html::a( $slideHtml, $slideUrl );
}

$slideHtml	= Html::tag( 'div', $slideHtml );

echo $slideHtml;
?>