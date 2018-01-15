<?php

$user			= $tweet->user;
$entities		= $tweet->entities;
$mediaContent	= isset( $entities->media ) ? $entities->media : null;
?>

<div class="col1 tweet relative max-cols-100 clearfix">
	<div class="colf12x2 fluid">
		<img class="img" src="<?=$user->profile_image_url ?>">
	</div>
	<div class="colf12x10">
		<h6 class="mp-none username"><?=$user->name?></h6>
		<div class="filler-height"></div>
		<p><?=$tweet->text?></p>
		<div class="filler-height"></div>
		<p><i class="fa fa-clock-o"></i> <?= Date( 'Y-m-d H:i:s', strtotime( $tweet->created_at ) )?></p>
		<div class="wrap-media">
			<?php if( isset( $mediaContent ) ) {

				 foreach( $mediaContent as $media ) { ?>

				<img class="fluid" src="<?=$media->media_url?>">
			<?php }
			} ?>
		</div>
	</div>
</div>