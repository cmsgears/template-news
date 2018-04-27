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
$modelUrl		= Url::toRoute( [ '/blog/' . $model->slug ], true );
$modelTitle		= Html::a( $model->name, [ '/blog/' . $model->slug ] );
$modelTime		= date( 'M d, Y', strtotime( $content->publishedAt ) );
$modelHtml		= "";
$bannerUrl		= CodeGenUtil::getMediumUrl( $content->banner, [ 'image' => 'listing-banner.jpg' ] );
$postContent	= $content->content;
$postContent	= substr( $postContent, 0, 600 );



$modelHtml	.= "
                <video width='320' height='240' autoplay='aotoplay' loop='loop' controls>
  <source src='movie.mp4z' type='video/mp4' >
  <source src='movie.ogg' type='video/ogg'>
  Your browser does not support the video tag.
</video>
        ";

echo Html::tag( 'div', $modelHtml, [ 'class' => 'col col12x4 max-cols-100 single-block margin margin-default' ] );
?>