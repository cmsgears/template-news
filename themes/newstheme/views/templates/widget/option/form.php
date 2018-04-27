<?php
$category 		= $widget->category;
$options 		= $widget->categoryOptions;
$model			= $widget->model;
$binderModel	= $widget->binderModel;
$disabled 		= $widget->disabled;
$notes 			= $widget->notes;
$inputType 		= $widget->inputType;
?>
<div class="wrap-options clearfix cmt-choice clear-none">
<?php
	if( count( $options ) > 0 ) {

		$modelOptions	= $model->getOptionIdListByCategoryId( $category->id );

		foreach ( $options as $option ) {

			if( $disabled ) {

				if( in_array( $option->id, $modelOptions ) ) {
?>
					<input type="hidden" name="<?= $binderModel ?>[allData][]" value="<?= $option->id ?>" />
					<label class="options col2 clear-none">
						<input type="<?= $inputType ?>" name="<?= $binderModel ?>[bindedData][]" value="<?= $option->id ?>" checked disabled />
						<span class="label pad-label"><?= $option->value ?></span>
					</label>

<?php			}
				else {
?>
					<input type="hidden" name="<?= $binderModel ?>[allData][]" value="<?= $option->id ?>" />
					<label class="category options col2 clear-none">
						<input type="<?= $inputType ?>" name="<?= $binderModel ?>[bindedData][]" value="<?= $option->id ?>" disabled />
						<span class="label pad-label"><?= $option->value ?></span>
					</label>
<?php			}
			}
			else {

				if( in_array( $option->id, $modelOptions ) ) {
?>
					<input type="hidden" name="<?= $binderModel ?>[allData][]" value="<?= $option->id ?>" />
					<label class="category options col2 clear-none">
						<input type="<?= $inputType ?>" name="<?= $binderModel ?>[bindedData][]" value="<?= $option->id ?>" checked />
						<span class="label pad-label"><?= $option->value ?></span>
					</label>
<?php			}
				else {
?>
					<input type="hidden" name="<?= $binderModel ?>[allData][]" value="<?= $option->id ?>" />
					<label class="category options col2 clear-none">
						<input type="<?= $inputType ?>" name="<?= $binderModel ?>[bindedData][]" value="<?= $option->id ?>" />
						<span class="label pad-label"><?= $option->value ?></span>
					</label>
<?php			}
			}
		}
	}
	else {

		echo 'No options found.';
	}
?>
</div>
<div class="clear filler-height"></div>