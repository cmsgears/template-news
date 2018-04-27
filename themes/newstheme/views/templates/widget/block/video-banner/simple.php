<?php
use cmsgears\core\common\utilities\CodeGenUtil;
?>

<!-- Block Background -->
<video width='auto' height='auto' autoplay='' loop='' controls>
  <source src=' <?= $widget->videoUrl ?> ' type='video/mp4' >
  <source src='movie.ogg' type='video/ogg'>
  Your browser does not support the video tag.
</video>

<!-- Block Texture -->
<?php if( $widget->texture ) { ?>
	<div class='texture <?= $widget->textureClass ?>' <?php if( isset( $widget->textureUrl ) ) echo "style='background-image:url($widget->textureUrl);'" ?>></div>
<?php } ?>

<!-- Block Max Cover -->
<?php if( $widget->maxCover ) { ?>
	<div class='max-cover <?= $widget->maxCoverClass ?>'><?= $widget->maxCoverContent ?></div>
<?php } ?>

<!-- Content Wrapper -->
<div class="block-wrap-content <?= $widget->contentWrapClass ?>">

	<!-- Content Header -->
	<?php if( $widget->header ) { ?>
		<div class='block-header <?=  $widget->headerClass ?>'>
			<?php if( $widget->icon && strlen( $widget->iconClass ) > 0 ) { ?>
				<div class='wrap-icon'><i class='<?= $widget->iconClass ?>'></i></div>
			<?php } ?>
			<?php if( $widget->icon && strlen( $widget->iconImage ) > 0 ) { ?>
				<div class='wrap-icon'><img src='<?= $widget->iconImage ?>' /></div>
			<?php } ?>
			<div class='content-header'><?= $widget->headerContent ?></div>
		</div>
	<?php } ?>

	<?php if( isset( $widget->content ) ) { ?>
		<div class='block-content <?= $widget->contentClass ?>'>
			<?= $widget->contentData ?>    
		</div>
	<?php } ?>

	<?php if( isset( $widget->extraContent ) ) { ?>
		<?= $widget->extraContent ?>
	<?php } ?>
</div>