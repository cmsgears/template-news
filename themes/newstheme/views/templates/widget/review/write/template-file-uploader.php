<script id="imageUploadTemplate" type="text/x-handlebars-template">
	<div type="image" class="uploader relative clearfix col12x4 image-{{counter}}" directory="gallery">
		<span class="btn-close fa fa-close fa-2x absolute absolute-top-right"></span>
		<div class="postview relative">
			<div class="btn-show-chooser" title="Update Image"></div>
			<div class="wrap-file"></div>
			<div class="message-upload"></div>
		</div>
		<div class="wrap-chooser" style="display: none;">
			<div class="chooser">
				<div class="btn btn-medium">Choose Image
					<input class="input" type="file">
				</div>
			</div>
			<div class="preloader">
				<div class="preloader-bar" style="width: 20%;"></div>
			</div>
		</div>
		<form></form>
		<div class="post-action" style="display: block;">
			<div class="fields">
				<input name="File[{{counter}}][name]" class="name" value="" type="hidden">
				<input name="File[{{counter}}][extension]" class="extension" value="" type="hidden">
				<input name="File[{{counter}}][directory]" value="gallery" type="hidden">
				<input name="File[{{counter}}][type]" value="image" type="hidden">
				<input name="File[{{counter}}][changed]" class="change" value="1" type="hidden">
				<input name="File[{{counter}}][width]" value="" type="hidden">
				<input name="File[{{counter}}][height]" value="" type="hidden">
				<input name="File[{{counter}}][twidth]" value="" type="hidden">
				<input name="File[{{counter}}][theight]" value="" type="hidden">
				<input name="File[{{counter}}][title]" placeholder="Title" autocomplete="off" value="{{title}}" type="hidden">
			</div>
		</div>
		<p class="title">{{title}}</p>
	</div>
</script>