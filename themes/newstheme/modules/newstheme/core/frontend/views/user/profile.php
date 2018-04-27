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
	<div id="tabs-1" class="box-form box-form-regular  max-content-100">
		<span class="cmti padding padding-medium cmti-edit btn-edit right"></span>
		<h4>Basic Profile</h4>
		<hr>
		<div class="wrap-info">
			<div class="row ">
				<div class="col col12x4">Email</div><div class="col col12x8"><?= $user->email ?></div>
			</div>
			<div class="row clearfix">
				<div class="col col12x4">Username</div><div class="col col12x8"><?= $user->username ?></div>
			</div>
			<div class="row clearfix">
				<div class="col col12x4">Firstname</div><div class="col col12x8"><?= $user->firstName ?></div>
			</div>
			<div class="row clearfix">
				<div class="col col12x4">Lastname</div><div class="col col12x8"><?= $user->lastName ?></div>
			</div>
			<div class="row clearfix">
				<div class="col col12x4">Gender</div><div class="col col12x8"><?= $user->getGenderStr() ?></div>
			</div>
			<div class="row clearfix">
				<div class="col col12x4">Phone</div><div class="col col12x8"><?= $user->phone ?></div>
			</div>
		</div>
		<div class="wrap-form">
			<form class="cmt-form  frm-split-40-60" cmt-app="user" cmt-controller="user" cmt-action="profile" action="user/profile" cmt-keep>
				<div class="spinner max-area-cover">
					<div class="valign-center cmti cmti-3x cmti-spinner-1 spin"></div>
				</div>
				<div class="frm-field">
					<label>Email</label>
					<?php if( !$coreProperties->isChangeEmail() ) { ?>
						<input type="text" name="User[email]" placeholder="Email*" value="<?= $user->email ?>" readonly />
					<?php } else { ?>
						<input type="text" name="User[email]" placeholder="Email*" value="<?= $user->email ?>" />
					<?php } ?>
					<span  class="error" cmt-error="email"></span>
				</div>
				<div class="frm-field">
					<label>Username</label>
					<?php if( !$coreProperties->isChangeEmail() ) { ?>
						<input type="text" name="User[username]" placeholder="Username" value="<?= $user->username ?>" readonly />
					<?php } else { ?>
						<input type="text" name="User[username]" placeholder="Username" value="<?= $user->username ?>" />
					<?php } ?>
					<span  class="error" cmt-error="username"></span>
				</div>
				<div class="frm-field">
					<label> Firstname </label>
					<input type="text" name="User[firstName]" placeholder="Firstname" value="<?= $user->firstName ?>" />
					<span  class="error" cmt-error="firstName"></span>
				</div>
				<div class="frm-field">
					<label> Lastname </label>
					<input type="text" name="User[lastName]" placeholder="Lastname" value="<?= $user->lastName ?>" />
					<span  class="error" cmt-error="lastName"></span>
				</div>
				<div class="clear">
					<div class="frm-field">
						<label>Gender</label>
						<?= Html::dropDownList( 'User[genderId]', $user->genderId, $genderMap, [ 'class' => 'element-60 cmt-select' ] ); ?>
						<span  class="error" cmt-error="genderId"></span>
					</div>
				</div>
				<div class="frm-field">
					<label>Phone</label>
					<input type="text" name="User[phone]" placeholder="Phone" value="<?= $user->phone ?>" />
					<span  class="error" cmt-error="phone"></span>
				</div>
				<div class="frm-actions align align-center clear">
					<a class=" btn btn-medium rounded-medium cmt-click"   > SAVE </a>
				</div>
				<div class="message"> </div>
			</form>
		</div>
	</div>
	
</div>

<!-- Templates -->
<?php include_once( dirname( __FILE__ ) . "/templates/user-profile.php" ); ?>
<?php include_once( dirname( __FILE__ ) . "/templates/user-account.php" ); ?>
<?php include_once( dirname( __FILE__ ) . "/templates/user-address.php" ); ?>
