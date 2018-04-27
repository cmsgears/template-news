<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$returnUrl	= $this->context->returnUrl;
?>

<?php $form = ActiveForm::begin( [ 'id' => 'frm-widget-meta' ] );?>

<?= $form->field( $model, 'data[facebook]' )->label( 'Facebook' ); ?>
<?= $form->field( $model, 'data[twitter]' )->label( 'Twitter' ); ?>
<?= $form->field( $model, 'data[youtube]' )->label( 'YouTube' ); ?>
<?= $form->field( $model, 'data[instagram]' )->label( 'Instagram' ); ?>
<?= $form->field( $model, 'data[pintrest]' )->label( 'Pintrest' ); ?>

<div class="box-filler"></div>

<div class="align align-center">
	<?= Html::a( 'Cancel', $returnUrl, [ 'class' => 'btn btn-medium' ] ); ?>
	<input class="element-medium" type="submit" value="Update" />
</div>

<?php ActiveForm::end(); ?>