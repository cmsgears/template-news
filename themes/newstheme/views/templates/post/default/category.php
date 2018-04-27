<?php // CMG Imports
use cmsgears\widgets\block\BasicBlock;
use cmsgears\widgets\blog\CategoryPost;
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
            <h2 class="inline-block"> <?= $category->name ?> </h2>
            <div class="inline-block right bkg bkg-white padding padding-default">
                <i class="fa fa-2x fa-th-large box-form" id="icon-switch"> </i>
            </div>
        </div>  
      
        <div class="" id="grid-none">
            <?= CategoryPost::widget([
                    'slug' => $category->slug,
                    'templateDir' => yii::getAlias("@templates"), 
                    'template' =>  'widget/blog/post-category/banner/',
                    'limit' => 6,
                    'route' => 'blog/',
                    'pagination' => true ]); 
            ?>  
        </div>    
        <div class="" id="grid">         
			<?= CategoryPost::widget([
				'slug' => $category->slug,
				'templateDir' => yii::getAlias("@templates"), 
				'template' =>  'widget/blog/post-category-grid/banner/',
				'limit' => 6,
				'singleOptions' => [ "class" => "col max-col-100 blog col12x6"],
				'route' => 'blog/',
				'pagination' => true
            ]);  ?>
        </div>
		
		 
        
        
    </div>
    <div class=" col col12x4">
     <?php include "$themePath/views/sidebars/blog.php"; ?>
    </div>
    </div>
    <?php BasicBlock::end() ?>
