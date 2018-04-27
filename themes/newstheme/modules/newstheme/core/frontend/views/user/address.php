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

	<div class="box-form box-form-regular  max-content-100">
		<span class="cmti cmti-edit btn-edit right padding padding-medium"> </span>
		<h4>Address</h4>
		<hr>
		<div class="wrap-info">
			<div class="info-row clearfix">
			<?php if( count( $addressList ) <= 0 ) { ?>
				<div class="row">
					<div class="col col12x4">Line 1</div>
					<div class="col col12x8"></div>
				</div>
				<div class="info-row clearfix">
					<div class="col col12x4">Line 2</div>
					<div class=" col col12x8"></div>
				</div>
				<div class="row">
					<div class="col col12x4">City</div>
					<div class="col col12x8"></div>
				</div>
				<div class="row">
					<div class="col col12x4">Country</div>
					<div class="col col12x8"></div>
				</div>
				<div class="row">
					<div class="col col12x4">State/Province</div>
					<div class="col col12x8"></div>
				</div>
				<div class="row">
					<div class="col col12x4">Phone</div>
					<div class="col col12x8"></div>
				</div>
				<div class="row">
					<div class="col col12x4">Zip/Postal</div>
					<div class="col12x8"></div>
				</div>
			<?php } else { $address = $addressList[ 0 ]->address; ?>
				<div class="row">
					<div class="col col12x4">Line 1</div>
					<div class="col col12x8"><?= $address->line1 ?></div>
				</div>
				<div class="row">
					<div class="col col12x4">Line 2</div>
					<div class="col col12x8"><?= $address->line2 ?></div>
				</div>
				<div class="row">
					<div class="col col12x4">City</div>
					<div class="col col12x8"><?= $address->cityName ?></div>
				</div>
				<div class="row">
					<div class="col col12x4">Country</div>
					<div class="col col12x8"><?= $address->country->name ?></div>
				</div>
				<div class="row">
					<div class="col col12x4">State/Province</div>
					<div class="col col12x8"><?= $address->province->name ?></div>
				</div>
				<div class="row">
					<div class="col col12x4">Phone</div>
					<div class="col col12x8"><?= $address->phone ?></div>
				</div>
				<div class="row">
					<div class="col col12x4">Zip/Postal</div>
					<div class="col col12x8"><?= $address->zip ?></div>
				</div>
			<?php } ?>
			</div>
		</div>
		<div class="wrap-form">
			<form class="cmt-form  frm-split-40-60" cmt-app="user" cmt-controller="user" cmt-action="" action="user/address?type=<?= Address::TYPE_PRIMARY ?>" cmt-keep>
				<div class="spinner max-area-cover">
					<div class="valign-center cmti cmti-3x cmti-spinner-1 spin"></div>
				</div>

				<div class="frm-field">
					<label>Line 1</label>
					<input type="text" name="Address[line1]" placeholder="Line1*" value="<?= $address->line1 ?>" />
					<span  class="error element-60 right" cmt-error="line1"></span>
				</div>
				<div class="frm-field">
					<label>Line 2</label>
					<input type="text" name="Address[line2]" placeholder="Line2" value="<?= $address->line2 ?>" />
					<span  class="error element-60 right" cmt-error="line2"></span>
				</div>
				<div class="frm-field">
					<label>City</label>
					<input type="text" name="Address[cityName]" placeholder="City" value="<?= $address->cityName ?>" />
					<span  class="error element-60 right" cmt-error="cityName"></span>
				</div>
				<div class="frm-field">
					<label>Country</label>
					<?= Html::dropDownList( 'Address[countryId]', $address->countryId, $countryList, [ 'class' => 'element-60 cmt-select' ] ); ?>
					<span  class="error element-60 right" cmt-error="countryId"></span>
				</div>

				<div class="frm-field frm-province">
					<label>State/Province</label>
					<?= Html::dropDownList( 'Address[provinceId]', $address->provinceId, $provinceList, [ 'class' => 'element-60 cmt-select', 'id' => 'wrap-province' ] ); ?>
					<span  class="error element-60 right" cmt-error="provinceId"></span>
				</div>
				<div class="frm-field">
					<label>Phone</label>
					<input type="text" name="Address[phone]" placeholder="Phone" value="<?= $address->phone ?>" />
					<span  class="error element-60 right" cmt-error="phone"></span>
				</div>
				<div class="frm-field">
					<label>Zip/Postal</label>
					<input type="text" name="Address[zip]" placeholder="Zip*" value="<?= $address->zip ?>" />
					<span  class="error element-60 right" cmt-error="zip"></span>
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
