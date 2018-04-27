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
$modelTitle		= $model->name;
$modelTime		= date( 'M d, Y', strtotime( $content->publishedAt ) );
$modelHtml		= "";
$bannerUrl		= CodeGenUtil::getMediumUrl( $content->banner, [ 'image' => 'listing-banner.jpg' ] );
$postContent	= $content->content;
$postContent	= substr( $postContent, 0, 75 );

$modelHtml	.= "
	<a href='$modelUrl'>
		<div class='bkg-image height post ' style='background-image:url( $bannerUrl )'>
			<div  class='post-info height '>
			<div class='color-transparent-black  height height-75 align align-center text text-white  '>
			   <div class=' '> 
				   $postContent
				</div>
				 <hr class='width  width-25 color-boder-bottom'></hr>
				<div class=''>
					$modelTitle<br>
					$modelTime
				</div>
			</div>

			<div class='row '>
				<div class='blog-post-avatar  center bkg-image circled circled1' style='background-image:url($bannerUrl); '>

				</div>
			</div> 
			</div>
		</div>
        </a>" ;

echo Html::tag( 'div', $modelHtml, [ 'class' => 'slide col blog col12x4  max-cols-100 single-block margin margin-default' ] );
?>