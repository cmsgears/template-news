<?= $formHtml ?>
<div class="box-content-wrap">
	<div class="box-content custom-file-uploader" type="image" directory="image">
		<div class="row">
			<div class="col col12x5 padding padding-medium-v">
				<?= $draggerHtml ?>

				<?php if( $widget->chooser && $widget->dragger ) { ?>
					<div class="filler-height"></div>
					<div class="text-with-line row row-medium"><span class="text-content bold">OR</span></div>
					<div class="filler-height"></div>
				<?php } ?>

				<?= $chooserHtml ?>

				<?= $preloaderHtml ?>
			</div>	
			<div class="col col12x7">
				<div class="file-wrap">
					<?= $containerHtml ?>
				</div>
			</div>	
		</div>	
	</div>
</div>
