<?php
// Yii Imports
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
// CMG Imports
use cmsgears\core\common\widgets\Editor;
use cmsgears\core\common\config\CoreGlobal;
use cmsgears\core\common\utilities\CodeGenUtil;

use cmsgears\cms\common\models\entities\Post;
use cmsgears\core\common\models\resources\Address;
use cmsgears\files\widgets\AvatarUploader;

$basePath	= Yii::$app->controller->basePath;
$action		= Yii::$app->controller->action->id;

Editor::widget( [ 'selector' => '.content-editor', 'loadAssets' => true ] );

$viewPath =  realpath(dirname(__FILE__).'/../'); 
$coreProperties = $this->context->getCoreProperties();
$this->title 	= 'Profile | ' . $coreProperties->getSiteTitle();

$countryList	= Yii::$app->factory->get( 'countryService' )->getIdNameMap();
$provinceList	= Yii::$app->factory->get( 'provinceService' )->getMapByCountryId( key( $countryList ) );
$addressList	= Yii::$app->factory->get( 'modelAddressService' )->getByParent( $user->id, CoreGlobal::TYPE_USER );
$address 		= new Address();
$user			= Yii::$app->user->getIdentity();


$status = $model->status;
// Data

?>

<?php include $viewPath.'/header/header.php' ?>

<div class="color color-primary-l">
	
	<?php $form = ActiveForm::begin() ?>
	
	<div class="row ">
		<div class="col col12x4">
			<?= $form->field( $model, "name" )->textInput( [ 'placeholder' => 'title', 'class' => 'attribute-title' ] ) ?>
		</div>	
		<div class="col col12x4">
			<?= $form->field( $model, 'visibility' )->dropdownList( $visibilityMap, [ 'class' => 'cmt-select' ] ) ?>

		</div>	
		<div class="col col12x4">
			<?= $form->field( $model, "comments" )->checkbox( [ 'placeholder' => 'comment', 'class' => 'attribute-title' ] ) ?>
		</div>	
	</div>	
	<div class="row ">
		<div class="col col12x4">
			<?= $form->field( $content, "summary" )->textarea( [ 'placeholder' => 'summary', 'class' => 'content-editor attribute-title' ] ) ?>
		</div>	
		<div class="col col12x4">
			<?= $form->field( $content, "content" )->textarea( [ 'placeholder' => 'about', 'class' => 'content-editor attribute-title' ] ) ?>
		</div>	
	</div>	
	
	
	<?php if( $status >=  Post::STATUS_BASIC  ) { ?>
		<div class="row">
			<a class="btn right margin margin-default-h" href="<?= Url::toRoute( "$basePath/media?slug=$model->slug", true ) ?>"> Next </a>
			<input type="submit" class="btn btn-medium right" value="Update">
			
		</div>
	<?php  } else { ?>
		<div class="row">
			<input type="submit" class="btn btn-medium right" value="Submit">
		</div>
	<?php }?>

	<?php ActiveForm::end()?>
</div>