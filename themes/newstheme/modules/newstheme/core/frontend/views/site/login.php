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
$bannerUrl		= null;//$pageInfo[ 'content' ]->getBannerUrl();

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
		
		<?php if( Yii::$app->session->hasFlash( 'userRegistration' ) ) { ?>
			<div class="align align-center">
				<span class="fa fa-check-circle fa-3x  color color-tertiary"> </span>
			</div>	
			<p class="align align-center"><?=Yii::$app->session->getFlash( 'userRegistration' )?></p>
		<?php } ?>

		<h4 class="align align-center text text-dark bold"> LOGIN </h4> 

		<?php $form = ActiveForm::begin( [ 'id' => 'frm-register', 'options' => [ 'class' => ' frm-public ' ] ] ); ?>
	
			<?= $form->field( $model, 'email' )->textInput( [ 'placeholder' => 'Email/Username' ] )->label(false) ?>
			<?= $form->field( $model, 'password')->passwordInput( [ 'placeholder' => 'Password' ] )->label(false) ?>

			<div class="row  max-cols-50">
				<div class="col col12x6">
					<div class="cmt-choice">
						<label>
							  <input type="checkbox" value="1" name="Login[rememberMe]">
							  <span class="label cmti cmti-checkbox"> </span> Remember Me 

						</label>
						<div class="help-block"> <?= join( ",", $model->getErrors( 'rememberMe' ) ) ?> </div>
					</div>
				</div>
				<div class="col col12x6 align align-right line-height line-height-small">
					<a class="bold " href="<?= Url::toRoute( [ '/forgot-password' ] ) ?>">Forgot Password ? </a>
				</div>
			</div>
			
			<div class="filler-height"> </div>	
			
			<div class="row">
				<div class="col col12x8">
					<div class="padding padding-medium-v "> 
						<p class='bold'> Don't have an Account? 
							<a class="bold" href="<?= Url::toRoute( [ '/register' ] ) ?>"> Click here </a>
						</p>
					</div>
				</div>
				
				<div class="col col12x4">
					<input class="element-medium" type="submit" value="Login" />
				</div>	
			</div>	
			
		
			<div class="padding padding-medium-v">
				<div class="text-with-line "> <span class="text-content bold"> OR </span> </div>
			</div>
			<?php ActiveForm::end(); ?>

	</div>

<?php Block::end() ?>
