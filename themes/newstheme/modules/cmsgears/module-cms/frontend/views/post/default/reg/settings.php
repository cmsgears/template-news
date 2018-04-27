<?php
// Yii Imports
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
// CMG Imports
use cmsgears\core\common\config\CoreGlobal;
use cmsgears\core\common\utilities\CodeGenUtil;
use cmsgears\cms\common\config\CmsGlobal;
use cmsgears\cms\common\models\entities\Post;
use cmsgears\files\widgets\AvatarUploader;
use cmsgears\widgets\tag\TagMapper;
use cmsgears\widgets\category\CategoryMapper;
use cmsgears\widgets\category\CategoryAutoBox;

$viewPath =  realpath(dirname(__FILE__).'/../'); 
$coreProperties = $this->context->getCoreProperties();
$this->title 	= 'Settings | ' . $coreProperties->getSiteTitle();

?>
<?php include $viewPath.'/header/header.php' ?>

<div class="color color-primary-l">
	
	<?php $form = ActiveForm::begin() ?>
	
	<h2 class="padding padding-medium-h"> Category And Tags </h2>
	<div class="row ">
		<div class="col col12x6">
			<?= CategoryAutoBox::widget([
				'options' => [ 'id' => 'box-category-auto', 'class' => 'box-mapper-auto' ],
				'type' => CmsGlobal::TYPE_POST,
				'model' => $model,
				'actionUrl' => "core/category/auto-search",
				'mapActionUrl' => "core/post/assign-category?slug=$model->slug&parent-type=$model->type&parent=true&typed=true",
				'deleteActionUrl' => "core/post/remove-category?slug=$model->slug&parent-type=$model->type&parent=true&typed=true",
				'notes' => 'Note: Choose at least one category. This will allow site users to view your business in search results. Maximum 5 Categories are allowed.'
			])?>
		</div>	
		<div class="col col12x6">
			<label> Add Tags </label>
			<?= TagMapper::widget([
				'options' => [ 'id' => 'box-tag-mapper', 'class' => 'box-tag-mapper mapper-tag' ],
				'loadAssets' => true,
				'model' => $model,
				'assignUrl' => "cms/post/assign-tags?slug=$model->slug&parent-type=$model->type&parent=true&typed=true",
				'removeUrl' => "cms/post/remove-tag?slug=$model->slug&parent-type=$model->type&parent=true&typed=true"
			])?>
		</div>	
	</div>	
	<div class="row ">
		<div class="col col12x6">
			<?= $form->field( $content, 'seoName' ) ?>
		</div>	
		<div class="col col12x6">
			<?= $form->field( $content, 'seoRobot' ) ?>
		</div>	
	</div>
	<div class="row ">
		<div class="col col12x6">
			<?= $form->field( $content, 'seoDescription' )->textarea() ?>
		</div>	
		<div class="col col12x6">
			
			<?= $form->field( $content, 'seoKeywords' )->textarea() ?>
		</div>	
	</div>	
		<div class="row">
			<a class="btn right margin margin-default-h" href="<?= Url::toRoute( "$basePath/attributes?slug=$model->slug", true ) ?>"> Next </a>
			<input type="submit" class="btn btn-medium right" value="Update">
		</div>
	<?php ActiveForm::end()?>
</div>