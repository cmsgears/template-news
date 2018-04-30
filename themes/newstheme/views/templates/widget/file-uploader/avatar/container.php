<?php
$model = $widget->model;

if( isset( $model ) && isset( $model->name ) && strlen( $model->name ) > 0 ) {

	$name	= $model->name;
	$url	= $model->getThumbUrl();
?>
	<div class="card card-file">
		<div class="card-data file-data">
			<img src="<?= $url ?>" class="fluid circled circled1" />
		</div>
		<div class="card-footer message-upload">
			<?= $widget->uploadMessage ?>
		</div>
	</div>
<?php
}
else {
?>
	<div class="card card-file">
		<div class="card-data file-data">
			<i class="<?= $widget->fileIcon ?> circled circled1"></i>
		</div>
		<div class="card-footer message-upload">
			<?= $widget->uploadMessage ?>
		</div>
	</div>
<?php
}
?>
