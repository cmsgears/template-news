<?php
// Yii Imports
use yii\widgets\ActiveForm;
use yii\helpers\Url;

// CMG Imports
use cmsgears\widgets\elements\Block;
use cmsgears\cms\common\utilities\ContentUtil;

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
    'contentClass' => '',
    'contentWrapClass' => 'height',
    'slug' => 'public-page-background'
]);?>

<div class="bkg bkg-white ">

	<h4 class="align align-center bold text text-dark"> Forgot Password </h4>

	<?php if( Yii::$app->session->hasFlash( 'message' ) ) { ?>
		<div class='frm-message'>
			<p> <?php echo Yii::$app->session->getFlash( 'message' ); ?> 
			</p>
		</div>
	<?php } else { ?>
	
	<div class="align align-center" >
		Enter your registered email below we'll send you an email with a link or reset your password.
	</div>	
	
	<div class="filler-height"> </div>	
	
	<?php $form = ActiveForm::begin( [ 'id' => 'frm-forgot-password', 'options' => [ 'class' => '  frm-public' ] ] ); ?>

	<?= $form->field( $model, 'email' )->textInput( [ 'placeholder' => 'Email*' ] )->label(false) ?>

	<div class="frm-actions align align-center">
		<input  type="submit" value="Submit" />
	</div>

	<?php ActiveForm::end(); } ?>
</div>

<?php Block::end() ?>


