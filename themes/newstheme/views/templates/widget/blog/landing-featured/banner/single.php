<?php
// Yii Imports
use yii\helpers\Html;
use yii\helpers\Url;

// CMG Imports
use cmsgears\core\common\utilities\CodeGenUtil;

// Post Author
$author			= $model->creator;
$authorName		= $author->getName();

// Post Content
$content		= $model->modelContent;
$banner			= $content->banner;
$modelUrl		= Url::toRoute( [ "/blog/" . $model->slug ], true );
$modelTitle		= $model->name;
$modelTime		= date( "M d, Y", strtotime( $content->publishedAt ) );
$modelHtml		= "";
$bannerUrl		= CodeGenUtil::getMediumUrl( $content->banner, [ "image" => "listing-banner.jpg" ] );
$postContent	= $content->content;
$postContent	= substr( $postContent, 0, 150 );

$avatarUrl			= Yii::getAlias( "@images" )."/icon.jpeg";

if( isset( $author->avatar ) ) {

	$avatarUrl		=  $author->avatar->getThumbUrl();
}
else {

	$avatarUrl;	
}

?>
