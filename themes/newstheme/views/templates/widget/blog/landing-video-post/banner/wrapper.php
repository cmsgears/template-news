<?php
// Yii Imports
use yii\helpers\Html;
?>

<div <?= Html::renderTagAttributes( $widget->wrapperOptions ) ?> >
	<?php if( strlen( $modelsHtml ) > 0 ) { ?>

		<div class="row blog max-cols-100 ">
			<?= $modelsHtml ?>
		</div>

	<?php } else { ?>
		<p>No posts found.</p>
	<?php } ?>
</div>