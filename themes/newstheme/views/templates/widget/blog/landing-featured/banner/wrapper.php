<?php
// Yii Imports
use yii\helpers\Html;
use yii\helpers\Url;
use cmsgears\core\common\utilities\CodeGenUtil;
?>

<div <?= Html::renderTagAttributes( $widget->wrapperOptions ) ?> >
	<?php if( strlen( $modelsHtml ) > 0 ) { ?>

		<?php
		$count = count( $widget->modelPage );

		if( $count <= 2 ) { ?> 
			<div class="row">
				<?php foreach( $widget->modelPage as $model ) { 
					
					$author			= $model->creator;
					$authorName		= $author->getName();

					// Post Content
					$content		= $model->modelContent;
					$banner			= $content->banner;
					$modelUrl		= Url::toRoute( [ "/blog/" . $model->slug ], true );
					$modelTitle		= $model->name;
					$modelTime		= date( "M d, Y", strtotime( $content->publishedAt ) );
					$modelHtml		= "";
					$bannerUrl		= CodeGenUtil::getMediumUrl( $content->banner, [ "image" => "listing-banner.jpg" ] );
					$postContent	= $content->content;
					$postContent	= substr( $postContent, 0, 150 );
				?>
			
				<div class="col col12x4 post max-cols-100 single-block margin margin-small-v">
					<a href="<?= $modelUrl ?>" >
					<div class="bkg-image height" style="background-image:url( <?=$bannerUrl?> )">
						<div   class="post-info height">
							<div class="  height height-75 align align-center text text-white  ">
								<div class="padding padding-medium "> 
									<?= $postContent  ?>
								</div>
									<hr class="width  width-25 color-boder-bottom">
								<div class=" ">
									<?= $modelTitle ?><br>
									<?= $modelTime ?>
								</div>
							</div>
						</div>
					</div>
					</a>	
				</div>
				<?php } ?>
			</div>
		<?php }
		else { ?>

		<div class="row landing-featured-post-card">
			<?php foreach( $widget->modelPage as $key => $model ) { 
					
					$author			= $model->creator;
					$authorName		= $author->getName();

					// Post Content
					$content		= $model->modelContent;
					$banner			= $content->banner;
					$modelUrl		= Url::toRoute( [ "/blog/" . $model->slug ], true );
					$modelTitle		= $model->name;
					$modelTime		= date( "M d, Y", strtotime( $content->publishedAt ) );
					$modelHtml		= "";
					$bannerUrl		= CodeGenUtil::getMediumUrl( $content->banner, [ "image" => "listing-banner.jpg" ] );
					$postContent	= $content->content;
					$postContent	= substr( $postContent, 0, 150 );
					
			if( $key ==  0 ) {
					
			?>
			<div class="col col12x6  max-cols-100 height padding padding-small-v">
				<a href="<?= $modelUrl ?>" >
				<div class="bkg-image height" style="background-image:url( <?=$bannerUrl?> )">
					<div class="absolute absolute-bottom-left padding padding-large ">
						<h3 class="text text-white"> <?= $modelTitle ?></h3>
						<p><span> <?= $authorName?></span> <span class="text text-white"><?= $modelTime?></span></p>
					</div>
				</div>
				</a>	
			</div>
			<?php } } ?>
			<div class="col col12x6 height">
				<div class="row height">
					<?php foreach( $widget->modelPage as $key => $model ) { 
					
					$author			= $model->creator;
					$authorName		= $author->getName();

					// Post Content
					$content		= $model->modelContent;
					$banner			= $content->banner;
					$modelUrl		= Url::toRoute( [ "/blog/" . $model->slug ], true );
					$modelTitle		= $model->name;
					$modelTime		= date( "M d, Y", strtotime( $content->publishedAt ) );
					$modelHtml		= "";
					$bannerUrl		= CodeGenUtil::getMediumUrl( $content->banner, [ "image" => "listing-banner.jpg" ] );
					$postContent	= $content->content;
					$postContent	= substr( $postContent, 0, 150 ); 
				
				 if(  $key > 0  ) { ?>
					<div class="col col1 height height-50 max-cols-100 padding padding-small-v">
						<a href="<?= $modelUrl ?>" >
						<div class="bkg-image height relative" style="background-image:url( <?=$bannerUrl?> )">
							<div class="absolute absolute-bottom-left padding padding-large">
								<h3 class="text text-white"> <?= $modelTitle ?></h3>
								<p><span> <?= $authorName?></span> <span class="text text-white"><?= $modelTime?></span></p>
							</div>
						</div>
						</a>	
					</div>
					<?php } }?>
				</div>
			</div>
		</div>	
	<?php 	}
		?>

	<?php } else { ?>
		<p>No posts found.</p>
	<?php } ?>
</div>