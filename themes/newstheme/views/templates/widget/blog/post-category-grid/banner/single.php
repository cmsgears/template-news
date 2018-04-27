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
$postContent	= substr( $postContent, 0, 60 );

$avatarUrl			= Yii::getAlias( "@images" ).'/icon.jpeg';

if( isset( $author->avatar ) ) {

	$avatarUrl		=  $author->avatar->getThumbUrl();
}
else {

	$avatarUrl;	
}

$modelHtml	.= "
				<a href='$modelUrl' class='post'>
					<div class='bkg-image post-height' style='background-image:url( $bannerUrl )'>
						<div  class='post-info height '>
						<div class='color-transparent-black  height height-75 align align-center text text-white  '>
						   <div class='padding padding-medium '> 
							   $postContent
							</div>
							<hr class='width  width-25 color-boder-bottom'>
							<div class='  '>
								$modelTitle<br>
								$modelTime
							</div>
						</div>
					   <div class'filler-height'>
					   </div>
						<div class='row '>
							<div class='blog-post-avatar  center bkg-image circled circled1' style='background-image:url($avatarUrl); '>

							</div>
						</div> 
						</div>
					</div>
				</a>

				<div class='padding padding-medium-v'>
					$postContent
				</div>
				
				<div class='padding clearfix border-bottom padding-medium-v'>
					<span class='left'> $modelTitle / $modelTime </span>
					<span class='right'> <i class='fa fa-heart'> </i> 1564</span>
				</div>
				<div class='filler-height'></div>
               
        ";

echo Html::tag( 'div', $modelHtml, [ 'class' => '' ] );
?>