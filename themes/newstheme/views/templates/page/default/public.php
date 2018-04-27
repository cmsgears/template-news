<?php
// CMG Imports
use cmsgears\widgets\block\BasicBlock;

$theme		= Yii::getAlias( '@themes/bizzlist' );
$banner		= $content->banner;
$bannerUrl	= isset( $banner ) ? $banner->getFileUrl() : null;
?>

<?php BasicBlock::begin([
	'options' => [ 'id' => 'block-page', 'class' => 'block block-basic' ],
	'content' => true, 'contentWrapClass' => 'max-content-100', 'contentClass' => 'max-cols-100 content-80 clearfix'
]);?>

	<div class="colf colf12x10 page-content">
		<h4 class="mp-none-top border-default-bottom text text-link">
			<?= $page->name ?>
		</h4>
		<div class="reader cscroller content-reader">
			<?= $content->content ?>
		</div>
	</div>
	<div class="colf colf12x2 sidebar-page" id="sidebar-private">
		<?php include "$theme/views/sidebars/page.php"; ?>
	</div>

<?php BasicBlock::end(); ?>