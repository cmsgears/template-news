<?= $formHtml ?>
<div class="box-content-wrap">
	<div class="box-content ">
		<div class="row">
			<div class="col col12x4">
				<div class="file-wrap">
					<?= $containerHtml ?>
				</div>
			</div>	
			<div class="col col12x6 padding padding-large-v">
				<?= $draggerHtml ?>

				<?php if( $widget->chooser && $widget->dragger ) { ?>
					<div class="filler-height"></div>
					<div class="text-with-line row row-medium"><span class="text-content bold">OR</span></div>
					<div class="filler-height"></div>
				<?php } ?>

				<?= $chooserHtml ?>

				<?= $preloaderHtml ?>
			</div>	
		</div>	
	</div>
</div>
