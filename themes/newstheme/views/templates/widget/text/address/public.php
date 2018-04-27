<?php
$data	= $data[ 'data' ];

if( isset( $data ) ) {
?>

<div>
	<span class="wrap-icon"><i class="cmti cmti-marker"></i></span><em><?=$data[ 'line1']?></em><br>
	<span class="wrap-icon"></span><em><?=$data[ 'line2']?></em><br>
	<span class="wrap-icon"></span><em><?=$data[ 'line3']?></em><br>
	<span class="wrap-icon"><i class="cmti cmti-envelope-b"></i></span><em><a href="mailto:<?=$data[ 'email']?>?Subject=Contact%20Us" target="_top"><?=$data[ 'email']?></a></em><br>
	<span class="wrap-icon"><i class="cmti cmti-phone"></i></span><em><?=$data[ 'phone']?></em>
</div>

<?php } ?>