<?php
// Yii Imports
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
// CMG Imports
use cmsgears\core\common\config\CoreGlobal;
use cmsgears\core\common\utilities\CodeGenUtil;

use cmsgears\files\widgets\AvatarUploader;

$viewPath		=  realpath(dirname(__FILE__).'/../'); 
$coreProperties = $this->context->getCoreProperties();
$this->title 	= 'Attribute | ' . $coreProperties->getSiteTitle();
$basePath		= Yii::$app->controller->basePath;

// Data

?>


<?php include $viewPath.'/header/header.php' ?>

<div class="color color-primary-l">
	
	<?php $form = ActiveForm::begin() ?>
	
	<div id="box-attribute" class="box-attribute padding padding-medium">
		<div class="row padding padding-medium">
			
			<span id="add-attribute" class=" right btn   "> ADD </span>
		</div>
		<div class="wrap-attributes">
			<div  class="attribute clearfix clear relative">
				<div class="row max-cols-50 clearfix">
					<div class="col col12x2">
						<P> Title </P>
					</div>
					<div class="col col12x9">
						<p> Description </p>
					</div>
					<div class="col col12x1">
					</div>
				</div>
			</div>
			<?php
				$count = 0;

				foreach ( $metas as $meta ) { 
			?>
			
			<div id="attribute-<?= $count ?>" class="border-top attribute clearfix clear relative">
				<div class="filler-height"> </div>
				<div class="row max-cols-50 clearfix">
					<div class="col col12x2">
						<?= $meta[name] ?>
					</div>
					<div class="col col12x9">
						<?= $meta[value] ?>
					</div>
					<div class="col col12x1">
						<span id="ell" class="fa fa-2x fa-edit padding padding-medium-h update-attribute" data-name="<?= $meta[name] ?>" data-slug="<?= $model->slug ?>" data-id="<?= $meta[id] ?>" data-value="<?= $meta[value] ?>"  > </span>
						
						<span id="frm-delete-attr-<?= $count ?>" cmt-app="mainApp"   cmt-controller="attribute" cmt-action="deleteAttribute" action="core/post/delete-meta?<?="id=$meta->id&slug=$model->slug&type=$model->type"?>">
							<div class="max-area-cover spinner">
								<div class="valign-center cmti cmti-2x cmti-spinner-1 spin"> </div>
							</div>
							<input type="hidden" class="attribute-count" name="parentElement" value="attribute-<?= $count ?>">
							<i class="cmti cmti-1-5x cmti-close-c  <?= isset( $meta->id ) ? 'cmt-click' : null ?>"> </i>
						</span>
					</div>
				</div>
				<?= $form->field( $meta, "[$count]id" )->hiddenInput( [ 'class' => 'hidden-attribute' ] )->label( false ) ?>
				<?= $form->field( $meta, "[$count]modelId" )->hiddenInput( [ 'class' => 'hidden-attribute' ] )->label( false ) ?>
			</div>
			<?php  $count++; } ?>
		</div>
	</div>	
	
	<div class="clearfix ">
		<a class="btn btn-medium  right" href="<?= Url::toRoute( "$basePath/review?slug=$model->slug", true ) ?>" > Review </a>
		<input type="submit" class="btn btn-medium right" value="Update">
	</div>
	<?php ActiveForm::end()?>
</div>
<?php include $viewPath.'/form/templates/attribute.php'; ?>
<?php include $viewPath.'/form/templates/popups.php'; ?>