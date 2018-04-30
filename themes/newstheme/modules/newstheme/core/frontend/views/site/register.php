<?php
// Yii Imports
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use cmsgears\widgets\elements\Block;
// CMG Imports
use cmsgears\widgets\block\BasicBlock;
use cmsgears\cms\common\utilities\ContentUtil;

$coreProperties = $this->context->getCoreProperties();
$pageInfo		= ContentUtil::initPage( $this );
$headerBanner = Yii::getAlias('@images').'/compressed/384X220-1.jpg';

$terms		= Url::toRoute( [ '/terms'  ], true );
$privacy = Url::toRoute( [ '/privacy'  ], true );
include "ui-elements.php";
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

	<h4 class="align align-center text text-dark"> REGISTER </h4>

	<?php
	if( $coreProperties->isRegistration() ) {
			
		if( Yii::$app->session->hasFlash( 'message' ) ) {
	?>
			<div class='frm-message align align-center'> 
				<p> <?php echo Yii::$app->session->getFlash( 'message' ); ?> </p>
			</div>

	<?php } else {
		$form = ActiveForm::begin( [ 'id' => 'frm-register', 'options' => [ 'class' => ' frm-public' ] ] );
	?>
	
	<div class="">
		<?= $form->field( $model, 'firstName' )->textInput( [ 'placeholder' => 'First Name*' ] )->label(false) ?>
		<?= $form->field( $model, 'lastName' )->textInput( [ 'placeholder' => 'Last Name*' ] )->label(false) ?>
		<?= $form->field( $model, 'username' )->textInput( [ 'placeholder' => 'Username' ], false )->label(false) ?>
		<?= $form->field( $model, 'email' )->textInput( [ 'placeholder' => 'Email*' ] )->label(false) ?>
		<?= $form->field( $model, 'password')->passwordInput( [ 'placeholder' => 'Password*' ] )->label(false) ?>
		<?= $form->field( $model, 'password_repeat' )->passwordInput([ 'placeholder' => 'Repeat Password*' ] )->label(false) ?>

		<div class="row">
			<div class="col col12x1">
				<?= $form->field( $model, 'terms' )->checkbox( [], false )->label(false) ?>
			</div >
			<div class="col col12x11">
				I agree to the <a href="<?= $terms ?>"> Terms </a> & <a href="<?= $privacy ?>"> privacy policy </a>
			</div>	
		</div>	
		<div class="row">
			<div class="col col12x8">
				<div class="padding padding-medium-v "> 
					 <p class="bold "> Already Registered? 
						 <a href="<?= Url::toRoute( [ '/login' ] ) ?>" class="link">
							 Back to login 
						 </a> 
					 </p>
				</div>
			</div>
			<div class="col col12x4">
				<input class="" type="submit" value="REGISTER" />
			</div>	
		</div>	
		<div class="padding padding-medium-v">
			<div class="text-with-line ">
				<span class="text-content bold"> OR  </span>
			</div>
		</div>
		<?php	ActiveForm::end(); ?>
	</div>    
		
	<?php } } else { ?>	
	
	<p class="warning"> Site registration is disabled by Admin. </p>
	
 <?php } ?>
</div>               
<?php Block::end() ?>

