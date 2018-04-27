<?php
	$coreProperties = $this->context->getCoreProperties();
    $this->title 	= "Error | " . $coreProperties->getSiteTitle();
?>
<h1>Error</h1>
<div>
	<?= $message ?>
</div>