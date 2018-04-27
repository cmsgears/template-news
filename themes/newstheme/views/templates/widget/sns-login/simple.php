<?php
// CMG Imports
use cmsgears\social\login\common\config\SnsLoginGlobal;
?>

<div class="menu-social clearfix row row-inline">
<?php
	foreach ( $settings as $key => $setting ) {

		if( $setting->isActive() ) {

			switch( $key ) {

				case SnsLoginGlobal::CONFIG_SNS_FACEBOOK: {

?>
	<div class="col8 col">
		<a class="btn facebook" href="<?= $setting->getLoginUrl() ?>"> <i class="cmti cmti-social-facebook"></i></a>
	</div>
<?php
					break;
				}
				/*case SnsLoginGlobal::CONFIG_SNS_GOOGLE: {

?>
	<div class="col12x4">
		<a class="btn google" href="<?= $setting->getLoginUrl() ?>"> <i class="cmti cmti-social-google"></i></a>
	</div>
<?php
					break;
				}*/
				case SnsLoginGlobal::CONFIG_SNS_TWITTER: {

?>
	<div class="col8 col">
		<a class="btn twitter" href="<?= $setting->getLoginUrl() ?>"> <i class="cmti cmti-social-twitter"></i></a>
	</div>
<?php
					break;
				}
			}
		}
	}
?>
</div>