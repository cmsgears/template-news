<?php
// Yii Imports
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use cmsgears\widgets\blog\BlogPost;
use yii\widgets\LinkPager;
// CMG Imports
use cmsgears\core\common\config\CoreGlobal;
use cmsgears\core\common\utilities\CodeGenUtil;

use cmsgears\core\common\models\resources\Address;
use cmsgears\files\widgets\AvatarUploader;

$coreProperties = $this->context->getCoreProperties();
$this->title 	= 'Profile | ' . $coreProperties->getSiteTitle();

$countryList	= Yii::$app->factory->get( 'countryService' )->getIdNameMap();
$provinceList	= Yii::$app->factory->get( 'provinceService' )->getMapByCountryId( key( $countryList ) );
$addressList	= Yii::$app->factory->get( 'modelAddressService' )->getByParent( $user->id, CoreGlobal::TYPE_USER );
$address 		= new Address();
$user			= Yii::$app->user->getIdentity();

// Data
$pagination		= $dataProvider->getPagination();
$pageInfo       = CodeGenUtil::getPaginationDetail( $dataProvider );
$pageLinks      = LinkPager::widget( [ 'pagination' => $pagination ] );
$models			= $dataProvider->getModels();

?>
<div class="row">
	<div class="colf col12x6">
		<h2> Post </h2>
	</div>
	<div class="colf col12x6">
		<div class="btn btn-medium right">
			<a href="<?= Url::toRoute( [ '/cms/post/default/add'], true ); ?>"> ADD </a>
		</div>	
	</div>
</div>	
<div class="color color-primary-l">
	<div class="row ">
		<div class="padding padding-large">
			<div class="row ">
				<div class="colf col12x4">
					<span class="padding padding-medium"> Action </span> <input class="element-50 right" type="text" name="All" placeholder="All">

				</div>	

				<div class="colf col12x3 right ">
					<input type="text" name="type" placeholder="All">
				</div>	
			</div>
			<hr class="padding padding-default">
			<div class=" row">

				<?php foreach( $models as $model ) {

					$content		= $model->modelContent;
					$banner			= $content->banner;
					$modelUrl		= Url::toRoute( [ '/blog/' . $model->slug ], true );
					$modelTitle		=  $model->name;
					$modelTime		= date( 'M d, Y', strtotime( $content->publishedAt ) );
					$modelHtml		= "";
					$bannerUrl		= CodeGenUtil::getMediumUrl( $content->banner, [ 'image' => 'listing-banner.jpg' ] );
					$postContent	= $content->content;
					$postContent	= substr( $postContent, 0, 150 );

					// TODO: Use homeUrl in case listing support it's own dashboard
				?>
					
					<div class="col col12x4 margin margin-medium post" > 
						<a href="<?= $modelUrl ?>">
						<div class='bkg-image post-height ' style='background-image:url( <?= $bannerUrl ?> )'>
							<div   class='post-info height  '>
								<div class='color-transparent-black  height height-75 align align-center text text-white  '>
									<div class='padding padding-medium '> 
										<?=  $postContent ?> 
									</div>
										<hr class='width  width-25 color-boder-bottom'>
									<div class=' '>
										<?=  $modelTitle ?> <br>
										<?= $modelTime ?>
									</div>
								</div>
								
								<div class='row '>
									<div class='blog-post-avatar  center bkg-image circled circled1' style='background-image:url(<?= $bannerUrl ?>); '>
									</div>
								</div>
							</div>
						</div>
							</a>
						<div class="row color text text-white">
							<div class="col col12x4">
								<span class="fa fa-check-square-o fa-2x padding padding-default text "> </span>
							</div>	
							<div class="col col12x8 align align-right " cmt-app="mainApp" cmt-controller="post" cmt-action="deletePost" action="post/delete?id=<?=$model->id?>" >
								<a href="<?= Url::toRoute( [ 'post/default/basic?slug=' . $model->slug ], true ); ?>"><span class="fa fa-edit fa-2x padding padding-default text "> </span> </a>
								<span class="cmt-click fa fa-trash fa-2x padding padding-default text "> </span>
							</div>	
						</div>
					</div>
						
		    	<?php } ?>

		    	<?php if( count( $models ) == 0 ) { ?>
		    		<div class="align align-center color color-primary-l"> <i class="fa fa-2x fa-frown-o"> </i> <span > No Post Found. </span> </div>
		    	<?php } ?>

		    	<?php if( count( $models ) != 0 ) { ?>
		        <div class='wrap-pagination row clearfix clear max-cols-100'>
		            <div class="col1"> <?= $pageLinks ?> </div>
		        </div>
		        <?php } ?>
			</div>
		</div>	
	</div>	
	
</div>