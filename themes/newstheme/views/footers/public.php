<?php
// Yii Imports
use yii\helpers\Url;

use widgets\categories\FeaturedCategories;
use widgets\tags\FeaturedTags;
use cmsgears\widgets\blog\BlogPost;

$themePath	= Yii::getAlias( '@themes/newstheme' );
?>
<div class="wrap-footer bkg bkg-secondary " id="footer">
    <footer class="">
            <div class="filler-height filler-height-medium">
            </div>    
            <div class="row row-xlarge">
				<div class="col col12x4 text text-white padding padding-right-medium ">
                    <h3 class="border-bottom footer-title">
                        Instagram post
                    </h3>
					<div class="filler-height"></div>
                      <?= BlogPost::widget([
                'templateDir' => yii::getAlias("@templates").'/widget/blog', 
                //'template' =>  'widget/blog/banner',
                'limit' => 6,
					'wrapSingle' => false,	  
                'pagination' => false ]) ?>
                      
                </div>   
                <div class="col col12x4 text text-white padding padding-medium-h">
                    <h3 class=" border-bottom footer-title">
                        Categories
                    </h3>
					<div class="filler-height"></div>
                    <?php FeaturedTags::begin([ ]);?>
                    <?php FeaturedTags::end() ?>
                    
                </div>  
                <div class="col col12x4 text text-white align align-center padding padding-left-medium">
					<div class="padding padding-medium border border-bottom">
						<img class="fluid" src="<?= Url::to(  Yii::getAlias( '@images' ) . '/icons/logo.png') ?>  ">
					</div>
					<div class="filler-height"></div>
					<ul class="hnav-basic"> 
						<li class="fab fa-twitter fa-2x padding padding-default"></li>
						<li class="fab fa-facebook-f fa-2x padding padding-default"></li>
						<li class="fab fa-instagram fa-2x padding padding-default"></li>
					</ul>
                </div>  
            </div> 
			<div class="filler-height"></div>
			<div class="row row-xlarge">
				<div class="col col1">
					<h3 class="text text-white border-bottom footer-title">Landing topics</h3>
					<div class="filler-height"></div>
				</div>	
			</div>
        </footer>   
    <div class="filler-height filler-height-medium bkg bkg-secondary">
    </div> 
    
</div>
<footer class="footer-copyright bkg bkg-black align align-center">
		Copyright © <?= date( 'Y' ) ?> <?= $coreProperties->getSiteName() ?>. All Rights Reserved.
	</footer>