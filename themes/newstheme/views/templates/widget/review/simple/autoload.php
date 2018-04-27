<div class="wrap-autoloader" style="min-height: 6em">
	<div id="autoload-reviews" class="autoload-request request-reviews relative" cmt-controller="autoload" cmt-action="reviews" action="<?=$widget->options['action']?>">
		<div class="max-area-cover spinner">
			<div class="valign-center fa fa-circle-o-notch fa-4x fa-spin"></div>
		</div>
		<input type="hidden" name="templateDir" value="<?=Yii::getAlias( '@templates/widget/review' )?>">
		<input type="hidden" name="parentId" value="<?=$widget->parentId?>">
		<a class="get-reviews cmt-click"></a>
	</div>
</div>