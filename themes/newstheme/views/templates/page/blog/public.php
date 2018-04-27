<?php
// CMG Imports
use cmsgears\widgets\block\BasicBlock;
use cmsgears\widgets\blog\BlogPost;

$themePath		= Yii::getAlias( "@themes/newstheme" );
?>

<?php BasicBlock::begin([
	'options' => [ 'id' => 'block-blog', 'class' => 'block block-basic' ],
	'content' => true, 'contentWrapClass' => 'max-content-100', 'contentClass' => 'max-cols-100 content-80 clearfix'
]);?>

	<div class="col col12x8 page-content">
            
		<?= BlogPost::widget([
	        'options' => [ 'class' => 'blog-posts-banner max-cols-50 padding padding-small' ],
	        'limit' => 6,
	        'template' => 'post-all',
	        'templateDir' => Yii::getAlias( '@templates/widget/blog' )
		])?>
	</div>
	<div class="col col12x4 max-cols-50 sidebar-blog">
            
		<?php include "$themePath/views/sidebars/blog.php"; ?>
	</div>

<?php BasicBlock::end(); ?>