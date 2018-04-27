<?php
// Yii Imports
use yii\helpers\Html;
use yii\helpers\Url;

// CMG Imports
use cmsgears\widgets\block\BasicBlock;
use cmsgears\widgets\text\TextWidget;
use cmsgears\widgets\comment\submit\SubmitComment;
use cmsgears\widgets\comment\show\ShowComments;
use cmsgears\core\common\models\resources\ModelComment;

// Bizzlist Imports
use themes\newstheme\Theme;

$themePath		= Yii::getAlias( '@themes/newstheme' );

// Post Author
$author			= $page->creator;
$authorName		= $author->getName();

// Post Content
$content		= $page->modelContent;
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

	$bannerUrl	= Yii::getAlias( '@web' ) . '/images/listing-banner.jpg';
}

$avatar			= Yii::getAlias( "@images" ).'/icon.jpeg';

if( isset( $author->avatar ) ) {

	$avatar		=  $author->avatar->getThumbUrl();
}
else {

	$avatar	;	
}
?>

<?php BasicBlock::begin([
	'options' => [ 'id' => 'block-blog', 'class' => 'block block-basic' ],
	'content' => true, 'contentWrapClass' => 'content-90 max-content-100', 'contentClass' => 'max-cols-100 content-74 clearfix'
]);?>
   <div class="filler-height filler-height-medium">
    </div>
<div class="row  max-cols-100">
	<div class="col col12x8 page-content post-single blog-posts-banner">
		
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
                
		<div class='filler-height filler-height-medium'></div>
                
        <div class="filler-height"> </div>
		
		<?php if( $page->comments ) { ?>
		<div class="wrap-comments">
			<div class="colf1 relative clearfix cmt-request bkg bkg-white padding padding-medium">
				<h4 class="text text-dark inline-block"> Write a comment </h4>
				
				<div id="write-comment" class='hidden-primary'>
					<?=SubmitComment::widget([
                                            'model' => $page,
                                            'ajaxUrl' => "core/post/comment?id=$page->id",
                                            'templateDir' => yii::getAlias("@templates"),
                                            'template' => "widget/review/write/simple",
					])?>
				</div>
            </div>
            <div class="colf1 relative clearfix cmt-request  padding padding-medium">
				<?=ShowComments::widget([
					'parentId' =>$page->id,
					'parentType' => 'blog',
					'status' => ModelComment::STATUS_APPROVED,
					'template' => '@templates/widget/comment/show'
				])?>
			</div>
		</div>
		<?php } ?>
	</div>
	<div class="col col12x4 sidebar-blog">
		<?php include "$themePath/views/sidebars/blog.php"; ?>
	</div>
</div>
</div>
<?php BasicBlock::end(); ?>