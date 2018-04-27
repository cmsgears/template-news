<?php
// Yii Imports
use \Yii;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

// CMG Imports
use cmsgears\widgets\block\BasicBlock;
use cmsgears\cms\common\utilities\ContentUtil;

$coreProperties = $this->context->getCoreProperties();
$pageInfo		= ContentUtil::getPageInfo( $this );
$banner			= $pageInfo[ 'content' ]->banner;
$bannerUrl		= isset( $banner ) ? $banner->getFileUrl() : null;
$loginUrl		= Url::toRoute( [ "/login" ] );
?>

<?php
	BasicBlock::begin([
		'options' => [ 'id' => 'block-public', 'class' => 'block block-basic' ],
		'bkg' => true, 'bkgUrl' => $bannerUrl,
		'texture' => true, 'textureClass' => 'texture-default'
	]);
?>

<h4 class="align align-center bold">Activate Account</h4>
<hr />
<?php
	if( Yii::$app->session->hasFlash( 'message' ) ) {

		Yii::$app->session->setFlash( 'userRegistration', "Congratulations! Your account has been successfully activated.<br>Please login to continue with us." );

		return Yii::$app->response->redirect( Url::to( [ 'login'] ) );
?>

<?php
	}
	else {

		$form = ActiveForm::begin( [ 'id' => 'frm-activate-account' ] );
?>
		<?= $form->field( $model, 'email' )->textInput( [ 'placeholder' => 'Email*', 'readOnly' => true ] )->label( false ) ?>
		<?= $form->field( $model, 'password' )->passwordInput( [ 'placeholder' => 'Password*' ] )->label( false ) ?>
		<?= $form->field( $model, 'password_repeat' )->passwordInput( [ 'placeholder' => 'Repeat Password*' ] )->label( false ) ?>

		<input type="submit" value="Activate" />
<?php
		ActiveForm::end();
	}
?>
<?php BasicBlock::end() ?>