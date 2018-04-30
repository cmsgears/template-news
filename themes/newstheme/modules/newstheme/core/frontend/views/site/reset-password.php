<?php
// Yii Imports
use yii\widgets\ActiveForm;

// CMG Imports
use cmsgears\widgets\block\BasicBlock;
use cmsgears\cms\common\utilities\ContentUtil;
use cmsgears\widgets\elements\Block;

$coreProperties = $this->context->getCoreProperties();
$pageInfo		= ContentUtil::initPage( $this );
$bannerUrl		= null;//$pageInfo[ 'content' ]->getBannerUrl();

include"ui-elements.php";
?>

<?php Block::begin([
	'options' => [ 'id' => 'block-public', 'class' => 'block height' ],
     'bkg'=> true, 
    //'bkgUrl' => $headerBanner, 
    //'bkgClass' => 'bkg ',
    'texture' => true,
    'textureClass' => 'texture-grid-d color-transparent-black', 
    'content' => true,
    'contentClass' => 'stick-bottom height',
    'contentWrapClass' => 'height',
    'slug' => 'public-page-background'
]);?>
<div class="content-50 valign-center ">
    <div class="bkg bkg-white ">

<h4 class="align align-center text text-dark">Reset Password</h4><hr>

<?php
	if( Yii::$app->session->hasFlash( 'message' ) ) {
?>
	<div class='frm-message'><p> <?php echo Yii::$app->session->getFlash( 'message' ); ?> </p></div>
<?php
	}
	else {

		$form = ActiveForm::begin( [ 'id' => 'frm-forgot-password', 'options' => [ 'class' => 'frm-rounded-all form-50 frm-split-40-60 frm-public' ] ] );
?>
		<?= $form->field( $model, 'email', [ 'template' => $templateAt ] )->textInput( [ 'placeholder' => 'Email*' ] ) ?>
		<?= $form->field( $model, 'password', [ 'template' => $templatePassword ] )->passwordInput( [ 'placeholder' => 'Password*' ] ) ?>
		<?= $form->field( $model, 'password_repeat', [ 'template' => $templatePassword ] )->passwordInput( [ 'placeholder' => 'Repeat Password*' ] ) ?>

		<div class="frm-actions align align-center">
			<input class="element-large" type="submit" value="Reset" />
		</div>
<?php ActiveForm::end(); } ?>
</div>
</div>
<?php Block::end() ?>