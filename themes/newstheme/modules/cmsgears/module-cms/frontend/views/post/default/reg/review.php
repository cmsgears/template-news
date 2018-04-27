<?php
// Yii Imports
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
// CMG Imports
use cmsgears\core\common\config\CoreGlobal;
use cmsgears\core\common\utilities\CodeGenUtil;

use cmsgears\widgets\block\BasicBlock;
use cmsgears\widgets\text\TextWidget;
use cmsgears\widgets\comment\submit\SubmitComment;
use cmsgears\widgets\comment\show\ShowComments;
use cmsgears\core\common\models\resources\ModelComment;

use cmsgears\files\widgets\AvatarUploader;

// Bizzlist Imports
	use themes\newstheme\Theme;

	$themePath		= Yii::getAlias( '@themes/newstheme' );

	// Post Author
	$author			= $model->creator;
	$authorName		= $author->getName();

	// Post Content
	$content		= $model->modelContent;
	$banner			= $content->banner;
	$postUrl		= Url::toRoute( [ '/post/' . $page->slug ], true );
	$postTitle		= $page->name;
	$postTime		= $content->publishedAt;
	$postHtml		= "";
	$bannerUrl		= null;
	$postContent	= $content->content;

	if( isset( $banner ) ) {

		$bannerUrl	= $banner->getFileUrl();
	}
	else {

		$bannerUrl	= Yii::getAlias( '@web' ) . '/images/listing-banner.jpeg';
	}

	$avatar			= Yii::getAlias( "@images" ).'/icon.jpeg';

	if( isset( $page->creator->avatar ) ) {

		$avatar		=  $model->creator->avatar->getThumbUrl();
	}
	else {

		$avatar	;	
	}

$viewPath =  realpath(dirname(__FILE__).'/../'); 
$coreProperties = $this->context->getCoreProperties();
$this->title 	= 'Review | ' . $coreProperties->getSiteTitle();

?>

<?php include $viewPath.'/header/header.php' ?>

<div class="color color-primary-l">
	<div class="row">
		<div class="col col12x6">
			<h3> Review Blog</h3>
		</div>
	</div>	
	<div class="row">
		<?php include $viewPath.'/form/templates/review.php'?>
	</div>	
	<?php $form = ActiveForm::begin() ?>

	<div class="row ">
		
		<?php BasicBlock::begin([
			'options' => [ 'id' => 'block-blog', 'class' => 'block block-basic' ],
			'content' => true, 'contentWrapClass' => 'content-90 max-content-100', 'contentClass' => 'max-cols-100 content-74 clearfix'
		]);?>
		<div class="filler-height filler-height-medium"> </div>
		<div class="row  max-cols-100">
			<div class="col1 page-content post-single blog-posts-banner">

				<div class='relative post-banner bkg-image post-height' style='background-image: url(<?= $bannerUrl ?>);'> 
					<div class="absolute absolute-bottom-left  margin margin-medium-v width width-75 color-transparent-black text text-white padding padding-medium">
						<div class='font-size font-size-large post-title heading-tertiary '> <?= $postTitle  ?> </div>
						<div class='colf2 '> <span class="text text-orange"> <?=$authorName?> </span>/<?=$postTime?> </div>
					</div>
				</div>

				<div class="padding padding-medium-v">
					<div class="bkg bkg-image inline-block circled circled1 width-auto author-avatar" style="background-image:url(<?= $avatar ?> )">

					</div>    
					<div class="inline-block   padding padding-large-v">
						<div class="text text-orange" >By</div>
						<?=$authorName?> 
					</div>
					<div class="inline-block right  padding padding-large-v">
					   <span> <i class="fa fa-heart"></i> 652</span> <span> <i class="fa fa-share"></i> 652</span><span> <i class="fa fa-comment"></i> 652</span>
					</div>    
				</div>    

				<div class='wrap-post-content clearfix'>
					<div class="post-content reader"> <?= $postContent ?> </div>
				</div>
			</div>
		</div>
		<div class="filler-height"> </div>
		
		<?php foreach( $metas as $meta ) { ?>
		<div class="row">
			<div class="col col12x4">
				<?= $meta->name ?>
			</div>	
			<div class="col col12x8">
				<?= $meta->value ?>
			</div>	
		</div>	
		<div class="filler-height"> </div>
		<?php  } ?>
		
</div>
<?php BasicBlock::end(); ?>
	</div>	
	<div class="clearfix ">
		<input type="submit" class="btn btn-medium right" value="Submit">
	</div>
	<?php ActiveForm::end()?>
</div>