<div class="menu-social">
<?php

	$data	= $data[ 'data' ];

	if( isset( $data ) ) {

		foreach ( $data as $key => $value ) {
?>
			<a href="<?=$value?>"><i class="cmti cmti-bkg cmti-social-<?=$key?>"></i></a>
<?php
		}
	}
?>
</div>