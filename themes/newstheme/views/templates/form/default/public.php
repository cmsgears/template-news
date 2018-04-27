<?php
// Yii Imports
use yii\widgets\ActiveForm;

// CMG Imports
use cmsgears\widgets\dblock\DynamicBlock;
use cmsgears\widgets\form\BasicForm;
use cmsgears\widgets\text\TextWidget;

// BizzList Imports
use themes\newstheme\Theme;
?>


<?php DynamicBlock::begin([
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

<div class="content-50 valign-center">
<div class="row bkg bkg-white">
    <div class="col col15x7 widget widget-address padding padding-medium-h">
            <!-- <h2 class="mp-none-top">Address</h2>
            <hr/> -->
            <h2 class="mp-none">Address</h2>
            <hr>
            <div class="filler-height"></div>
            <?= TextWidget::widget( [ 'slug' => Theme::WIDGET_ADDRESS_MAIN ] ) ?>
            <div class="social-follow-us">
                    <h2>Connect with us -</h2>
                    <hr/>
                    <?= TextWidget::widget([
                            'slug' => Theme::WIDGET_FOLLOW_US, 'adminTemplate' => false,
                            'templateDir' => '@templates/widget/text/social',
                            'template' => 'contact'
                    ])?>
            </div>
    </div>
    <div class="col col15x7 padding padding-medium-h">
            <h2 class="mp-none"><?= $form->name ?></h2>
            <hr>
            <?php if( Yii::$app->session->hasFlash( 'message' ) ) { ?>
                    <div class='frm-message'><p> <?php echo Yii::$app->session->getFlash( 'message' ); ?> </p></div>
            <?php
                    }
                    else {

					$activeForm 	= ActiveForm::begin( ['id' => 'frm-dynamic', 'options' => [ 'class' => '' ] ] );
            ?>

			<?= BasicForm::widget([
					'form' => $form, 'model' => $model, 'activeForm' => $activeForm, 'showLabel' => false,
					'formActions' => "<div class='frm-actions align align-center'><input class='btn btn-medium' type='submit' value='Submit' /></div>"
			]); ?>
    </div>
</div>
</div>
<?php ActiveForm::end(); } ?>

<?php DynamicBlock::end(); ?>