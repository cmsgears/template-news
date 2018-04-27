<?php
// Yii Imports
use yii\helpers\Url;

// CMG Imports
use cmsgears\widgets\blog\BlogPost;
use widgets\tags\FeaturedTags;
?>
     <div class="bkg bkg-white row row-inline padding padding-medium">
             <input id="search-post" class="element-50  inline-block mp mp-none search" type="text" name="search" placeholder="Search">
             <input id="btn-search-post" class="element-25  inline-block  mp mp-none bkg bkg-tertiary-d" type="submit" value="SEARCH">
        </div>  
        <div class="filler-height"> </div>  
        <div class="bkg bkg-white row row-inline padding padding-medium">
            <div class="align align-left bold">
                TITLE
                </div>
            <hr>
            <?= BlogPost::widget([
                'templateDir' => yii::getAlias("@templates"), 
                'template' =>  'widget/blog/banner',
                'limit' => 6,
				'wrapSingle' => false,
                'pagination' => false ]) ?>
        </div>
        
        <div class="filler-height"> </div> 
        
        <div class="bkg bkg-white row row-inline padding padding-medium">
            <div class="row align align-left bold">
            <div class="col col12x6">
                RECENT
            </div>
            <div class="col col12x6">
                POPULAR
            </div> 
            </div>    
            <hr>
            <?= BlogPost::widget([
	        'template' => 'post-sidebar',
			'templateDir' => Yii::getAlias( '@templates/widget/blog' ),
			'paging' => false, 
			'limit' => 6,
			'wrapSingle' => false,
	    ]);
	?>
        </div>
        <div class="filler-height"> </div> 
        
        <div class="bkg bkg-white row  padding padding-medium">
            <div class="row align align-left bold">
            <div class="col col12x6">
                TITLE
            </div>
            
            </div>    
            <hr>
           <div class="text text-white"> 
           <?php FeaturedTags::begin([ ]);?>
                    <?php FeaturedTags::end() ?>
	</div>
        </div>