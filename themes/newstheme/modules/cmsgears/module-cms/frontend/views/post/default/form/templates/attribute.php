<script id="attributeTemplate" type="text/x-handlebars-template">
	<div id="attribute-{{count}}" class="border-top attribute clearfix clear relative">
        <div class="filler-height"> </div>
			<div class="row max-cols-50 clearfix">
				<div class="col col12x2">
				{{name}} 
				</div>
				<div class="col col12x9">
				{{value}}
				</div>
				<div class="col col12x1">
					<span class="fa fa-2x fa-edit padding padding-medium-h"> </span>
					<span id="frm-delete-attr-{{count}}" cmt-app="mainApp"   cmt-controller="attribute" cmt-action="deleteAttribute" action="core/post/delete-meta?<?="id={{id}}&slug=$model->slug&type=$model->type"?>">
						<div class="max-area-cover spinner">
							<div class="valign-center cmti cmti-2x cmti-spinner-1 spin"> </div>
						</div>
						<input type="hidden" class="attribute-count" name="parentElement" value="attribute-{{count}}">
						<i class="cmti cmti-1-5x cmti-close-c  cmt-click"> </i>
					</span>
				</div>
			</div>
		</div>	
    </div>
</script>
