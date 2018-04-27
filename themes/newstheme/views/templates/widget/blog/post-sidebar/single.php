<?php
// Yii Imports
use yii\helpers\Html;

// CMG Imports
use cmsgears\core\common\utilities\CodeGenUtil;

// Post Content
$content		= $model->modelContent;
$modelTitle		= Html::a( $model->name, [ '/blog/' . $model->slug ] );
$bannerUrl		= CodeGenUtil::getMediumUrl( $model->modelContent->banner, [ 'image' => 'listing-banner.jpg' ] );
$modelTime		= date( 'M d, Y', strtotime( $content->publishedAt ) );
$postContent	= $content->content;
$postContent	= substr( $postContent, 0, 150 );

$modelHtml		=	"<div class='row clearfix max-cols-50 post padding padding-default'>
						<div class='col col12x4'>
							<img class='fluid' src='$bannerUrl'>
						</div>
						<div class='col col12x8 align align-left'>
							<div class='post-title  '>$modelTitle / $modelTime </div>
                                                            <span>  $postContent</span>
						</div>
						<div class='colf1'><hr></div>
					<div>";

echo Html::tag( 'li', $modelHtml );