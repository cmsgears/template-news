<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$returnUrl	= $this->context->returnUrl;
?>

<?php $form = ActiveForm::begin( [ 'id' => 'frm-widget-meta' ] );?>

<?= $form->field( $model, 'data[title]' )->label( 'Title' ); ?>
<?= $form->field( $model, 'data[info]' )->label( 'Info' ); ?>

<div class="box-filler"></div>

<div class="align align-center">
	<?= Html::a( 'Cancel', $returnUrl, [ 'class' => 'btn btn-medium' ] ); ?>
	<input class="element-medium" type="submit" value="Update" />
</div>

<?php ActiveForm::end(); ?>