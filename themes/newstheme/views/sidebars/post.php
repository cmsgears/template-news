<?php
// Yii Imports
use yii\helpers\Url;

// CMG Imports
use cmsgears\widgets\blog\BlogPost;
?>
<div class="widget widget-search">
	<h4 class="heading heading-tertiary"> Search </h4>
	<div class="row clearfix">
		<div class="colf12x8 frm-rounded-left">
			<!--<input type="text" placeholder="Search blog">-->
			<div class="frm-icon-element">
				<span class="cmti cmti-search"> </span>
				<input type="text" name="keywords" placeholder="Search">
			</div>
		</div>
		<div class="colf12x4 frm-rounded-right">
			<input type="submit" class="btn" value="SEARCH">
		</div>
	</div>
</div>
<div class="widget widget-post-recent col1">
	<h4 class="heading heading-tertiary"> Recent Posts </h4>
	<hr/>
	<?= BlogPost::widget([
		'template' => 'post-sidebar',
		'templateDir' => Yii::getAlias( '@templates/widget/blog' ),
		'paging' => false, 
		'limit' => 5,
		'wrapSingle' => false,
	    ]);
	?>
</div>

<div class="filler-height filler-height-small"> </div>

<?php if( count( $page->activeCategories ) > 0 || count( $page->activeTags ) > 0 ) { ?>
	<div class="widget widget-tags">
		<h3 class="widget-title">Labels</h3>
		<hr/>
		<div class="tags">
			<?= $page->getCategoryLinks( Url::toRoute( [ '/blog/category' ], true ), 0, null ) ?>
			<?= $page->getTagLinks( Url::toRoute( [ '/blog/tag' ], true ), 0, null ) ?>
		</div>
		<hr/>
    </div>

    <div class="filler-height filler-height-small"> </div>
<?php } ?>

<div class="filler-height filler-height-small"> </div>

<div class="widget widget-post-archive">
	<h4 class="heading heading-tertiary">Archive</h4>
	<hr/>
	<ul class='hnav'>
		<li>
			<a href="#">January</a>
		</li>
		<li>
			<a href="#">February</a>
		</li>
	</ul>
	<h6 class="align align-center">2014</h6><hr class='hr-medium'>
	<ul class='hnav'>
		<li>
			<a href="#">March</a>
		</li>
		<li>
			<a href="#">April</a>
		</li>
	</ul>
</div>