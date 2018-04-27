<?php
// Yii Imports
use yii\widgets\ActiveForm;
use yii\helpers\Html;

// CMG Imports
use cmsgears\core\common\config\CoreGlobal;

use cmsgears\core\common\models\resources\Address;
use cmsgears\files\widgets\AvatarUploader;

$viewsPath		= Yii::getAlias( '@themes/newstheme/modules/newstheme/core/frontend/views/user' );

$coreProperties = $this->context->getCoreProperties();
$this->title 	= 'Profile | ' . $coreProperties->getSiteTitle();

$countryList	= Yii::$app->factory->get( 'countryService' )->getIdNameMap();
$provinceList	= Yii::$app->factory->get( 'provinceService' )->getMapByCountryId( key( $countryList ) );
$addressList	= Yii::$app->factory->get( 'modelAddressService' )->getByParent( $user->id, CoreGlobal::TYPE_USER );
$address 		= new Address();
$user			= Yii::$app->user->getIdentity();
?>

<h2> My Account </h2>

<?php include "$viewsPath/menu/menu.php"; ?>
	
<div class="row padding padding-medium color color-primary-l">

	<div  class="box-form box-form-regular  max-content-100">
		<span class="cmti cmti-edit btn-edit right padding padding-medium"></span>
		<h4>Account</h4>
		<hr>
		<div class="wrap-info">
			<div class="row">
				<div class="col col12x4"> Email </div>
				<div class="col col12x8"> <?= $user->email ?> </div>
			</div>
			<div class="note">
				Note: Click on edit icon to change password.
			</div>
		</div>
		<div class="wrap-form">
			<form class="cmt-form  frm-split-40-60" cmt-app="user" cmt-controller="user" cmt-action="account" action="user/account" cmt-keep>
				<div class="spinner max-area-cover">
					<div class="valign-center cmti cmti-3x cmti-spinner-1 spin"></div>
				</div>
				<input type="hidden" name="ResetPassword[email]" placeholder="Email*" value="<?= $user->email ?>" readonly disable="true" />
				<?php if( strlen( $user->passwordHash ) > 0 ) { ?>
				<div class="frm-field">
					<label>Current Password</label>
					<input type="password" name="ResetPassword[oldPassword]" placeholder="Current Password*" />
					<span  class="error" cmt-error="oldPassword"></span>
				</div>
				<?php } ?>
				<div class="frm-field">
					<label>Password</label>
					<input type="password" name="ResetPassword[password]" placeholder="Password*" />
					<span  class="error" cmt-error="password"></span>
				</div>
				<div class="frm-field">
					<label>Confirm Password</label>
					<input type="password" name="ResetPassword[password_repeat]" placeholder="Confirm Password*" />
					<span  class="error" cmt-error="password_repeat"></span>
				</div>
				<div class="frm-actions align align-center clear">
					<a class="submit btn btn-medium rounded-medium cmt-click" > SAVE </a>
				</div>
				<div class="message"></div>
			</form>
		</div>
	</div>
	
</div>

<!-- Templates -->
<?php include_once( dirname( __FILE__ ) . "/templates/user-profile.php" ); ?>
<?php include_once( dirname( __FILE__ ) . "/templates/user-account.php" ); ?>
<?php include_once( dirname( __FILE__ ) . "/templates/user-address.php" ); ?>
