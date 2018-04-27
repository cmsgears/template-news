<?php 
//Yii import
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php if( $model->isSubmittable() ) { ?>

            <?php if( $model->isRejected() ) { ?>
            <div class="note">Your post was rejected by admin. <?= $model->getRejectReason() ?></div>
            <?php } ?>

            <?php if( $model->isFrojen() ) { ?>
                <div class="note">Your post was frozen by admin. <?= $model->getRejectReason() ?></div>
            <?php } ?>

            <?php if( $model->isBlocked() ) { ?>
                <div class="note">Your post was blocked by admin. <?= $model->getRejectReason() ?></div>
            <?php } ?>

            <div class="note">Review your post details before submitting it for Admin approval.</div>

			<?php $form = ActiveForm::begin( [ 'id' => 'frm-listing' ] );?>

			<?= $form->field( $model, 'slug' )->hiddenInput()->label( false ) ?>

			<div class="clear filler-height"></div>
			<div class="align align-center">
				<?= Html::a( 'Back', [ "attributes?slug=$model->slug" ], [ 'class' => 'btn btn-medium' ] ); ?>
				<input class="element-large" type="submit" value="Submit for Approval" />
			</div>
			<?php ActiveForm::end(); ?>

<?php } else if( $model->isFrojen() ) { ?>
	<div class="note">Your listing was frozen by admin. <?= $model->getRejectReason() ?></div>
<?php } else if( $model->isBlocked() ) { ?>
	<div class="note">Your listing was blocked by admin. <?= $model->getRejectReason() ?></div>
<?php } else if( !$model->isEditable() || $model->isReSubmit() ) { ?>
	<div class="note">Your listing is being reviewed by site admin before it's visible on website.</div>
<?php } ?>