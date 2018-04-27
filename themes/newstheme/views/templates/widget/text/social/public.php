<div class="social-title">
	<div class="filler-height filler-height-medium"></div>
	<p class="info uppercase h5 mp-none">Connect With Us -</p>
</div>

<div class="menu-social">
<?php

	$data	= $data[ 'data' ];

	if( isset( $data ) ) {

		foreach ( $data as $key => $value ) {
?>
			<a href="<?=$value?>"><i class="cmti cmti-bkg cmti-circled cmti-social-<?=$key?>"></i></a>
<?php
		}
	}
?>
</div>