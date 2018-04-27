<?php
// Yii Imports
use yii\helpers\Url;

use widgets\categories\FeaturedCategories;
use widgets\tags\FeaturedTags;
use cmsgears\widgets\blog\BlogPost;

$themePath	= Yii::getAlias( '@themes/newstheme' );
?>
<div class="wrap-footer bkg bkg-secondary " id="footer">
    <footer class="content-90">
            <div class="filler-height filler-height-medium">
            </div>    
            <div class="row">
                <div class="col col12x4 text text-white">
                    <h3 class=" border-bottom">
                        Lables
                    </h3>
                    <?php FeaturedTags::begin([ ]);?>
                    <?php FeaturedTags::end() ?>
                    
                </div>  
                 <div class="col col12x4 text text-white align align-center">
                    <h3 class=" border-bottom">
                        CATEGORY
                    </h3>
                         
                     <?php FeaturedCategories::begin([ ]);?>
                    <?php FeaturedCategories::end() ?>
                </div>  
                  <div class="col col12x4 text text-white align align-right">
                    <h3 class=" border-bottom">
                        Lables
                    </h3>
                      
                      <?= BlogPost::widget([
                'templateDir' => yii::getAlias("@templates").'/widget/blog', 
                //'template' =>  'widget/blog/banner',
                'limit' => 6,
					'wrapSingle' => false,	  
                'pagination' => false ]) ?>
                      
                </div>   
            </div>    
        </footer>   
    <div class="filler-height filler-height-medium bkg bkg-secondary">
    </div> 
    
</div>
<footer class="footer-copyright bkg bkg-black align align-center">
		Copyright © <?= date( 'Y' ) ?> <?= $coreProperties->getSiteName() ?>. All Rights Reserved.
	</footer>