<?php
// Yii Imports
use yii\helpers\Html;
?>

<div <?= Html::renderTagAttributes( $widget->wrapperOptions ) ?> >
	<?php if( strlen( $modelsHtml ) > 0 ) { ?>

		<div class="row padding padding-default  max-cols-100">
			<?= $modelsHtml ?>
                    
		</div>

		<?php if( $widget->pagination && $widget->paging ) { ?>
			<div class="clear filler-height filler-height-medium"></div>
			<div class='wrap-pagination align align-center padding padding-medium clearfix'>
                            <div class='info'> <?= $widget->pageInfo ?> </div> 
                            <?= $widget->pageLinks ?>
			</div>
		<?php } ?>

		<?php if( $widget->showAllPath ) { ?>
			<div class="filler-height filler-height-medium"></div>
			<div class="wrap-all">
				<a href="<?= $widget-allPath ?>" class="btn btn-medium">VIEW ALL</a>
			</div>
		<?php } ?>

	<?php } else { ?>
		<div class="row align align-center">
			<span class="fa fa-frown-o fa-3x"> No posts found. </span>
		</div>
		
	<?php } ?>
</div>