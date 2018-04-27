<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$returnUrl	= $this->context->returnUrl;
?>

<?php $form = ActiveForm::begin( [ 'id' => 'frm-widget-meta' ] ); ?>

<?= $form->field( $model, 'data[line1]' )->label( 'Line 1' ); ?>
<?= $form->field( $model, 'data[line2]' )->label( 'Line 2' ); ?>
<?= $form->field( $model, 'data[line3]' )->label( 'Line 3' ); ?>
<?= $form->field( $model, 'data[email]' )->label( 'Email' ); ?>
<?= $form->field( $model, 'data[phone]' )->label( 'Phone' ); ?>

<div class="box-filler"></div>

<div class="align align-center">
	<?= Html::a( 'Cancel', $returnUrl, [ 'class' => 'btn btn-medium' ] ); ?>
	<input class="element-medium" type="submit" value="Update" />
</div>

<?php ActiveForm::end(); ?>