<?php
// Yii Imports
use yii\helpers\Html;
use yii\helpers\Url;

// CMG Imports
use cmsgears\core\common\config\CoreGlobal;

$logoUrl		= Yii::getAlias( "@web" );
$logoUrl		= Url::to( $logoUrl. "/images/logo-mail.png", true );

$logo			= "<img class='logo' style='margin:10px;' src='$logoUrl'>";
$siteName		= $coreProperties->getSiteName();
$name			= Html::encode( $user->getName() );
$email			= Html::encode( $user->email );
$token			= Html::encode($user->resetToken );
$siteUrl		= $coreProperties->getSiteUrl();

?>

<table style="border: 1px solid #f1f1f1;  border-collapse: collapse; border-spacing: 0;" width="100%">
	<tr style="background-color: #d380b1; color: white; text-align: center; height: 80px;">
		<td style="padding: 0px;">
			<img style="width: 60px; margin-top: -10px" src="<?=$logoUrl?>">
		</td>
	</tr>
	<tr>
		<td>
			<div style="background: #ffffff; border-top-left-radius: 5px; border-top-right-radius: 5px; margin-left: auto; margin-right: auto; margin-top: -20px; margin-bottom: 0; padding: 10px; text-align: center;width: 80%;">
				<p style="font-size: 16px; font-family: Arial; color: #7f8995"> Dear <?=$name?> </p>
				<p style="font-size: 14px; font-family: Arial; color: #7f8995; margin:0"> Your account password has been changed. Please review this account activity. </p>
				<div style="height: 20px"> </div>

				<!-- footer starts here -->
				<div style="height: 50px"> </div>
				<p style="font-size: 12px; font-family: Arial; color: #7f8995; margin:0"> This email was sent to: <?=$email?> </p>
				<p style="font-size: 12px; font-family: Arial; color: #7f8995; margin:0"> This email was intended for <?=$name?>. Learn why we included this. </p>
				<hr style="background-color: #f1f1f1; border: none; height: 1px;">
				<div style="width: 50%; float: left; text-align: left;">
					<p style="font-size: 12px; font-family: Arial; color: #7f8995; margin:0"> Warm Regards </p>
					<p style="font-size: 12px; font-family: Arial; color: #7f8995; margin:0"> Skittal </p>
				</div>
				<div style="width: 50%; float: left; text-align: right;">
					<p style="font-size: 12px; font-family: Arial; margin:0"> <a href="<?=$siteUrl?>form/contact-us"  style="text-decoration: underline; color: #7f8995;">Customer Support</a> </p>
					<p style="font-size: 12px; font-family: Arial; margin:0"> <a href="<?=$siteUrl?>about-us" style="text-decoration: underline; color: #7f8995;">About Us</a> </p>
				</div>
				<p style="font-size: 12px; font-family: Arial; color: #7f8995; margin:0"> <a>Unsubscribe</a> | <a href="<?=$siteUrl?>" style="text-decoration: underline; color:#d380b1">Help</a> </p>

				<p style="font-size: 12px; font-family: Arial; color: #ffffff; background-color:#7f8995; padding-top: 10px; padding-bottom: 10px">
					&copy; 2016 Skittal Corporation. Skittal and the Skittal logo are registered trademarks of Skittal.
				</p>
			</div>
		</td>
	</tr>
</table>