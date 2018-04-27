<?php // CMG Imports
use cmsgears\widgets\block\BasicBlock;
use cmsgears\widgets\blog\BlogPost;
use widgets\tags\FeaturedTags;
$themePath		= Yii::getAlias( '@themes/newstheme' );
?>
<?php BasicBlock::begin([
	'options' => [ 'id' => 'block-header', 'class' => 'block ' ],
    'contentClass' => 'row max-col-100',
    'content' => true,
    'bkg' => true,
    'bkgClass' => 'bkg bkg-primary ',
    'contentWrapClass'=> 'content-90 clearfix'
]); ?>
    <div class="filler-height filler-height-medium">
    </div>
<div class="row  max-cols-100">
    <div class="col  col12x8">
        <div>
            <h2 class="inline-block"> SEARCH </h2>
            <div class="inline-block right bkg bkg-white padding padding-default">
                <i class="fa fa-2x fa-th-large box-form" id="icon-switch"> </i>
            </div>
        </div>  
      
        <div class="" id="grid-none">
            <?= BlogPost::widget([
                   
                    'templateDir' => $themePath.'/views/templates/widget/blog/post-category/', 
                    'singleOptions' => [ "class" => ""],
                    'limit' => 6,
                    'route' => 'blog/search/',
                    'pagination' => true ]); 
            ?>  
        </div>    
        <div class="" id="grid">         <?= BlogPost::widget([
            
                    'templateDir' => $themePath.'/views/templates/widget/blog/post-category-grid/',
					'singleOptions' => [ "class" => "col max-col-100 blog col12x6"],
                    'limit' => 6,
                    'route' => 'blog/serach/',
                    'pagination' => true
            ]);  ?>
        </div>
        
        
    </div>
    <div class=" col col12x4">
     <?php include "$themePath/views/sidebars/blog.php"; ?>
    </div>
    </div>
    <?php BasicBlock::end() ?>
