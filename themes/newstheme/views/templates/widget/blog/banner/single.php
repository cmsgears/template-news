<?php
// Yii Imports
use \Yii;
use yii\helpers\Html;
use yii\helpers\Url;

// CMG Imports
use cmsgears\core\common\utilities\CodeGenUtil;

// Post Author
$author			= $model->creator;
$avatar			= CodeGenUtil::getImageThumbTag( $author->avatar, [ 'image' => 'avatar.png' ] );

// Post Content
$content		= $model->modelContent;
$banner			= CodeGenUtil::getFileUrl( $content->banner, [ 'image' => 'banner.jpg' ] );

$url			= "$widget->singlePath/$model->slug";
?>

<div class="post col col12x4">
	<div class="post-banner bkg bkg-image" style="<?php if( strlen( $banner ) > 0 ) echo "background-image: url( $banner )"; ?>">
		<a href="<?= $url ?>">
			<div class="post-view">
				
			</div>
		</a>
	</div>
</div>