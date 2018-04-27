<?php if( isset( $modelsHtml ) && strlen( $modelsHtml ) > 0 ) { ?>
	<div id='show-comment'>
		<h4>Comments (<?=$modelCount?>)</h4><hr>
		<?= $modelsHtml; ?>
	</div>
<?php } else { ?>
    <p class='align align-center padding padding-medium-v'>No Comments Found.</p>
<?php } ?>