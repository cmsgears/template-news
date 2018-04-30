<?php
// CMG Imports
use cmsgears\widgets\elements\Block;
use cmsgears\widgets\block\BasicBlock;
use cmsgears\widgets\blog\BlogPost;
use cmsgears\widgets\newsletter\FollowMe;


$coreProperties = $this->context->getCoreProperties();
$themePath		= Yii::getAlias( '@themes/newstheme' );
$headerBanner = Yii::getAlias('@images').'/compresses/384X220-1jpg';
?>

<!--block 2 news landing categories post -->
<div class="container">
	<div class="content-wrap">
		<div class="content-80">
			<div id="landing-post" class="bkg clearfix ">

				<?= BlogPost::widget([
					'templateDir' => yii::getAlias("@templates").'/widget/blog/landing-featured' , 
					'limit' => 3,
					'wrapSingle' => true,
					'pagination' => false,

				]) ?>
			</div>

			<!--block 3 news landing recent news roller -->
			<div class="row" id="landing-post">
				<div class="col col12x8">
					<div class="block-content-wrap">
						<div class="block-header border border-bottom">
							<div class="block-header-title inline-block h4">Videos</div>
							<div class="block-header-content inline-block right">
								<ul class="hnav-basic">
									<li>All</li>
									<li>Politics</li>
									<li>Media</li>
									<li>Education</li>
								</ul>
							</div>
						</div>
						<div class="block-content">
							<?= BlogPost::widget([
								'templateDir' => yii::getAlias("@templates").'/widget/blog/landing-video-post' , 
								'limit' => 3,
								'wrapSingle' => false,
								'pagination' => false,
							]) ?>
						</div>
					</div>
				</div>
				<div class="col col12x4">
					<div class="block-content-wrap">
						<div class="block-header border border-bottom">
							<div class="block-header-title inline-block h4">Socials</div>
						</div>
						<div class="block-content">
							<div class="row padding padding-default">
								<div class="col col2 bkg bkg-blue margin margin-bottom-default">
									<i class="fab fa-facebook fa-4x "></i>
									<span class="right padding padding-default">
										<p>321321</p>
										<p>likes</p>
									</span>
								</div>
								<div class="col col2 bkg bkg-blue margin margin-bottom-default">
									<i class="fab fa-twitter fa-4x"></i>
									<span class="right padding padding-default">
										<p>321321</p>
										<p>likes</p>
									</span>
								</div>
								<div class="col col2 bkg bkg-blue margin margin-bottom-default">
									<i class="fab fa-instagram fa-4x"></i>
									<span class="right padding padding-default">
										<p>321321</p>
										<p>likes</p>
									</span>
								</div>
								<div class="col col2 bkg bkg-blue margin margin-bottom-default">
									<i class="fab fa-facebook fa-4x"></i>
									<span class="right padding padding-default">
										<p>321321</p>
										<p>likes</p>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<?php BasicBlock::begin([
				'options' => [ 'id' => 'news-roller', 'class' => 'block ' ],
				'contentClass' => 'content-90 clearfix',
				'content' => true,
				'bkg' => true,
				'bkgClass' => 'bkg bkg-white',
			]); ?>
			<div class="margin margin-medium-v">
				<div class="row padding padding-small">
					<marquee>This is basic example of marquee</marquee>
						<div class="absolute absolute-top-left  " > 
							<div class="colf colf10x8 padding padding-small bkg bkg-secondary">
								<span class="text text-white " > RECENTS </span>
							</div>
							<div class="colf colf10x2 " id="triangle-topright">
						</div>    
					</div>
				</div>
			</div>
			<?php BasicBlock::end() ?>

			<!--block 4 static image -->

			<?php Block::begin([
				'options' => [ 'id' => 'landing-static', 'class' => 'block height' ],
				 'bkg'=> true, 
				'slug' => 'landing-static',
				'texture' => true,
				'textureClass' => 'texture-grid-d color-transparent-black', 
				'content' => true,
				'contentClass' => '',
				'contentWrapClass' => 'height',

			]);?>

			 <div class="row text text-white ">
				 <div class="col col1 align align-center   ">
					 <h1 class="fon-size font-size-large-1  text text-white  padding padding-default valign-center   ">  
					Static Image
					 </h1>

				 </div>
				 <div class="col col1 center font-size font-size-small bold align align-center padding padding-xlarge-v" >
					 Text Scoll up with page
				 </div>
			 </div>


			<?php Block::end() ?>

			<!--block 5 news landing blog post -->

			<div id="landing-post" class="row">
				<div class="row">
					<div class="bkg bkg-image width width-10 blog-joiner-avatar circled circled1 center  " style="background-image: url( <?= Yii::getAlias( '@images' )?>/icons/logo.png)">
					</div>    
				</div>    
				<div class="content-90">
					<div class="filler-height filler-height-large"> </div>
					<div class="row align align-center ">
							<h1 class="align align-center  " > Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
								</h1>
							<div>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
								when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
								It has survived not only five centuries, but also the leap into electronic   
							</div>
					</div>   

					<div class="filler-height"> </div>    

					<div class="row  max-cols-100">    
						<div class="colf col12x8 max-cols-100">
							<?= BlogPost::widget([
								'templateDir' => yii::getAlias("@templates").'/widget/blog/post-featured', 
								'limit' => 6,
								'wrapSingle' => false,
								'pagination' => false
						]) ?>
						</div>
						 <div class="colf col12x4 max-cols-100">
							 <div class="bkg margin margin-default-v bkg-secondary-d text text-white align align-left padding padding-medium">
								 VIDEOS
							 </div>    
							 <div class="row bkg bkg-white padding padding-default">
								 <h4> Lorem Ipsum has been the industry's  </h4>
								 <div class="">
								<?= BlogPost::widget([
									'templateDir' => yii::getAlias("@templates"), 
									'template' =>  'widget/cmt-slider/',
									'limit' => 6,
									'wrapSingle' => false,
									'pagination' => false
								]) ?>
								 </div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!--block 6 news landing post slider -->
			<?php BasicBlock::begin([
				'options' => [ 'id' => 'landing-slider-block', 'class' => 'block padding padding-medium row' ],
				'contentClass' => 'content-90 clearfix',
				'content' => true,
				'bkg' => true,
				'bkgClass' => 'bkg bkg-white',
			]); ?>
				<div class="row row-inline">
					<div class="col col1 center">
						<h5><span class="bold border-bottom font-size font-size-large ">
							HEADING
						</span ></h5>
					</div>
				</div>
				<div class="row">
				  <?= BlogPost::widget([

								'templateDir' => yii::getAlias("@templates"), 
								'template' =>  'widget/cmt-slider/',
								'limit' => 6,
								'wrapSingle' => false,
								'pagination' => false
						]) ?>
				</div>
			<?php BasicBlock::end() ?>


			<!--block 7 news landing video -->

			<?php Block::begin([
				'options' => [ 'id' => 'landing-video', 'class' => 'block height' ],
				 'bkg'=> true, 
				'bkgUrl' => $headerBanner, 
				'bkgClass' => 'bkg ',
				'slug' => 'landing-video',
				'texture' => true,
				'textureClass' => 'texture-grid-d color-transparent-black', 
				'content' => true,
				'contentClass' => 'text text-white height',
				'contentWrapClass' => 'height',
				 'templateDir' => yii::getAlias("@templates").'/widget/block/video-banner', 


			]);?>
				<div class="valign-center text text-white align align-center font-size font-size-large">
				Space for Video
				</div>
			<?php Block::end() ?>


			<!--block 8 news landing form -->

			<?php BasicBlock::begin([
				'options' => [ 'id' => 'landing-form', 'class' => 'block ' ],
				'contentClass' => ' content-90  clearfix height',
				'content' => true,
				'bkg' => true,
				'bkgClass' => 'bkg bkg-primary',
				 'contentWrapClass' =>  '  height',
			]); ?>
			<div class="row max-cols-100 height">
				<div class="col col12x6 height bkg bkg-white align align-center" >
					<div class="content-80 ">
						<h2 class="padding border-bottom padding-large">
							NEWSLETTER
						</h2> 
						<div class="padding padding-large-v">
							Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
								when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
						</div> 


			<?php FollowMe::begin([
				'templateDir' =>  yii::getAlias("@templates").'/widget/newsletter/', 
			]); ?>
						<?php  FollowMe::end() ?>

					</div>    
				</div>   
				<div class="col col12x6 align align-center">
					 <div class="content-80 ">
						<h2 class="padding border-bottom padding-large">
							CONTACT WITH US
						</h2> 
						<div class="row max-cols-50">
						   <div class="col col12x5 margin margin-small color-twitter align align-center text text-white">
							   <div class="colf colf12x9  width"> <div class="font-size font-size-large-3 " >11125</div> <div class=""font-size font-size-small>LIKES</div> </div>
							  <div class=" colf colf12x3 align align-center color-facebook fa fa-facebook fa-2x padding padding-small"> </div>
						   </div>    
							 <div class="col col12x5 margin margin-small color-twitter align align-center text text-white">
							  <div class="colf colf12x9 "> <div class="font-size font-size-large-3 " >11125</div> <div class=""font-size font-size-small>LIKES</div> </div>
							  <div class="colf colf12x3 align align-center color-twitter fa fa-twitter fa-2x padding padding-small"> </div>
						   </div>  
							 <div class="col col12x5 margin margin-small color-twitter align align-center text text-white">
							  <div class="colf colf12x9 "> <div class="font-size font-size-large-3 " >11125</div> <div class=""font-size font-size-small>LIKES</div> </div>
							  <div class="colf colf12x3 align align-center color-google-plus fa fa-google-plus fa-2x padding padding-small"> </div>
						   </div>  
							 <div class="col col12x5 margin margin-small color-twitter align align-center text text-white">
							  <div class="colf colf12x9 "> <div class="font-size font-size-large-3 " >11125</div> <div class=""font-size font-size-small>LIKES</div>  </div>
							  <div class="colf colf12x3 align align-center color-instagram fa fa-instagram fa-2x padding padding-small"> </div>
						   </div>  
						</div> 

					</div>    
				</div>   
			</div>

			<?php BasicBlock::end() ?>
		</div>
	</div>
</div>
