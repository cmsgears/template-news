<?php
// Yii Imports
use yii\helpers\Url;

?>
<div id="popup-attribute" class="popup popup-modal ">
	<div class="popup-bkg-filler"> </div>
	<div class="popup-data popup-data-medium padding padding-medium" cmt-app="mainApp" cmt-controller="attribute" cmt-action="addAttribute" action="core/post/add-meta?slug=<?=$model->slug?>&type=<?=$model->type?>" >
		<span class="popup-close cmti cmti-close-c "> </span>
	    <div class="popup-wrap-title">
	    	<span class="popup-title-text"> ADD ATTRIBUTE </span>
	    </div>
		<div class="row " >
			<input type="text" class="attribute-title" name="ContentMeta[name]" placeholder="Name" />
			<span class="message" name="name"> </span>
			<textarea  name="ContentMeta[value]" placeholder="Value"></textarea>
			<input type="hidden" class="attribute-title" name="ContentMeta[type]" value="user" placeholder="Name" />
			<input type="hidden" class="attribute-title" name="ContentMeta[valueType]" value="text" placeholder="Name" />
		</div>
		
		<div class="row row-inline clearfix">
			<div class="col col1">
				<p class="btn btn-medium cmt-click"> ADD </p>
			</div>	
		</div>
    </div>
</div>

<div id="update-attribute" class="popup popup-modal ">
	<div class="popup-bkg-filler"> </div>
	<div class="popup-data popup-data-medium padding padding-medium" cmt-app="mainApp" id="action" action="" cmt-controller="attribute" cmt-action="updateAttribute"  >
		<span class="popup-close cmti cmti-close-c "> </span>
	    <div class="popup-wrap-title">
	    	<span class="popup-title-text"> UPDATE ATTRIBUTE </span>
	    </div>
		<div class="row " >
			<input type="text" class="attribute-title" name="ContentMeta[name]" id="name" placeholder="Name" />
			<span class="message" name="name"> </span>
			<textarea  name="ContentMeta[value]" placeholder="Value" id="value"></textarea>
			<input type="hidden" class="attribute-title" name="ContentMeta[type]"  value="user" placeholder="Name" />
			<input type="hidden" class="attribute-title" name="ContentMeta[valueType]" value="text" placeholder="Name" />
		</div>
		
		<div class="row row-inline clearfix">
			<div class="col col1">
				<p class="btn btn-medium cmt-click"> UPDATE </p>
			</div>	
		</div>
    </div>
</div>