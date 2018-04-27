<?php
// Yii Imports
use yii\captcha\Captcha;

// CMG Imports
use cmsgears\files\widgets\ImageUploader;

$model		= $widget->model;
$ajax		= $widget->ajax;
$ajaxUrl	= $widget->ajaxUrl;
$controller = $widget->cmtController;
$action     = $widget->cmtAction;
$captcha	= $widget->captcha;
$title      = $widget->title;
$success  	= $widget->success;
$rating     = $widget->rating;
$type		= $widget->type;

$user		= Yii::$app->user->getIdentity();
?>

<form id='frm-comment' class='row clearfix max-cols-100 cmt-request ' cmt-app="form" cmt-controller='<?= $controller ?>' cmt-action='<?= $action ?>' action='<?= $ajaxUrl ?>' cmt-keep>
	<div class="spinner max-area-cover">
		<div class="valign-center cmti cmti-2x cmti-spinner-1 spin"></div>
	</div>

	<?php if( !isset( $user ) ) { ?>
	    <div class='row'>
                <div class="col col12x6">
	        <div class='frm-icon-element'>
	            <i class='icon fa fa-user valign-center'></i>
	            <div class='clear-none'>
	                <input type='text' name='ModelComment[name]' placeholder='Name'>
	            </div>
	        </div>
	        <span class='error' cmt-error='name'></span>
	        </div>
                <div class="col col12x6">
                <div class='frm-icon-element'>
	            <i class='icon fa fa-at valign-center'></i>
	            <div class='clear-none'>
	                <input type='text' name='ModelComment[email]' placeholder='Email'>
	            </div>
	        </div>
	        <span class='error' cmt-error='email'></span>
                </div>
            </div>
	<?php } else { ?>
            <div class="row">
            <div class="col col12x6">
	        <div class='frm-icon-element'>
	            <i class='icon fa fa-user valign-center'></i>
	            <div class='clear-none'>
	                <input type='text' name='ModelComment[name]' placeholder='Name' value="<?=$user->username?>">
	            </div>
	        </div>
	        <span class='error' cmt-error='name'></span>
	        </div>
                <div class="col col12x6">
                <div class='frm-icon-element'>
	            <i class='icon fa fa-at valign-center'></i>
	            <div class='clear-none'>
	                <input type='text' name='ModelComment[email]' placeholder='Email' value="<?=$user->email?>">
	            </div>
	        </div>
	        <span class='error' cmt-error='email'></span>
                </div>
            </div>
    <?php } ?>

    <div class='row'>
        <div class="col col1">
        <div class='frm-icon-element'>
            <i class='icon icon-secondary fa fa-envelope-o valign-center'></i>
            <div class='clear-none'>
                <textarea name='ModelComment[content]' placeholder='Write here...'></textarea>
            </div>
        </div>
        <span class='error' cmt-error='content'> </span>
        </div>
    </div>

    <?php if( $widget->rating ) { ?>
	    <div class='clear'>
	        <div class='box-rating rating-secondary clearfix'>
	            <?= Yii::$app->formDesigner->getRatingStars( null, 5, true ) ?>
	        </div>
	        <input type='hidden' name='ModelComment[rating]' id='rating-count'>
	        <span class='error' cmt-error='rating'></span>
	    </div>
	<?php } ?>

	<div class='filler-height filler-height-medium'> </div>
        <div class="row clearfix">
            <div class="col col1">
            <input type='hidden' name='ModelComment[type]' value="<?=$type?>">
           
            <input type='submit' class='element-medium right' value="Submit">
            </div>
        </div>    
            <div class='filler-height filler-height-medium'> </div>

    <div class='message error font-size font-size-tiny'></div>
</form>
<?php

	if( $widget->options[ 'uploader' ] ) {

		include 'template-file-uploader.php';
	}
?>