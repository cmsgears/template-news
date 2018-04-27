<?php
// Yii Imports
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
// CMG Imports
use cmsgears\core\common\config\CoreGlobal;
use cmsgears\core\common\utilities\CodeGenUtil;

use cmsgears\cms\common\models\entities\Post;

use cmsgears\files\widgets\ImageUploader;
use cmsgears\files\widgets\VideoUploader;


$viewPath =  realpath(dirname(__FILE__).'/../'); 
$coreProperties = $this->context->getCoreProperties();
$this->title 	= 'Media | ' . $coreProperties->getSiteTitle();
$status = $model->status;

// Data

?>


<?php include $viewPath.'/header/header.php' ?>

<div class="color color-primary-l">
	
	<?php $form = ActiveForm::begin() ?>
	<div class="filler-height filler-large"> 
	</div>
	<div class="row ">
		<div class="col col12x6">
			<label> Banner </albel>
			
			<?= ImageUploader::widget([
				'options' => [ 'id' => 'model-banner', 'class' => 'file-uploader color color-gray' ],
				'model' => $banner, 'modelClass' => 'Banner', 'directory' => 'banner'
			]); ?>
		</div>	
		<div class="col col12x6">
			<label> Video </albel>
			<?= VideoUploader::widget( [ 'options' => [ 'id' => 'model-video', 'class' => 'file-uploader color color-gray' ], 'model' => $video ]); ?>
		</div>	
		
	</div>	
	
	<?php if( $status >=  Post::STATUS_MEDIA ) { ?>
		<div class="row">
			<a class="btn right margin margin-default-h" href="<?= Url::toRoute( "$basePath/settings?slug=$model->slug", true ) ?>"> Next </a>
			<input type="submit" class="btn btn-medium right" value="Update">
			
		</div>
	<?php  } else { ?>
		<div class="row">
			<input type="submit" class="btn btn-medium right" value="Submit">
		</div>
	<?php }?>
	<?php ActiveForm::end()?>
</div>