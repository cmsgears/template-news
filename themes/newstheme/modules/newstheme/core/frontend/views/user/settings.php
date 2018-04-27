<?php
// Yii Imports
use yii\widgets\ActiveForm;

// CMG Imports
use cmsgears\core\common\config\CoreGlobal;

$coreProperties = $this->context->getCoreProperties();
$this->title 	= 'Settings | ' . $coreProperties->getSiteTitle();
?>
<div class="filler-height"></div>
<h2> Settings </h2>

<div class="row align align-center">
	<div class="colf color color-primary-l active-border col12x2 padding padding-medium-v"> Privacy
	</div>	
	<div class="col color color-primary-l padding padding-medium-v col12x2"> Notification
	</div>	
	<div class="colf color color-primary-l padding padding-medium-v col12x2"> Reminders
	</div>	
</div>

<div class="tabs-default color color-primary-l">
	

	<div id="tabs-1" class=" padding padding-medium box-form box-form-regular  max-content-100">
		<span class="cmti cmti-edit btn-edit right padding padding-default-v"></span>
		
		<h4> Privacy Settings </h4><hr>
		
		<div class="wrap-info">
			<div class="row ">
				<div class="col col12x4"> Show Address </div>
				<div class="col col12x8"><?php if( isset( $privacy[ 'show_address' ] ) ) echo $privacy[ 'show_address' ]->getFieldValue(); else echo 'No'; ?></div>
			</div>
		</div>
		<div class="wrap-form">
			<form class="cmt-form frm-split-40-60" cmt-app="user" cmt-controller="user" cmt-action="settings" action="user/settings" cmt-keep>
				<div class="spinner max-area-cover"> 
					<div class="valign-center cmti cmti-3x cmti-spinner-1 spin"> </div> 
				</div>
				<div class="frm-field">
					<label> Show Address </label>
					<input type="hidden" name="ModelMeta[0][name]" value="show_address" />
					<input type="hidden" name="ModelMeta[0][type]" value="<?= CoreGlobal::SETTINGS_PRIVACY ?>" />
					<input type="hidden" name="ModelMeta[0][valueType]" value="flag" />
					<span class='cmt-switch cmt-checkbox'>
						<input id="privacy_show_address" class="cmt-toggle cmt-toggle-round" type="checkbox" name="value" />
						<label for='privacy_show_address'></label>
						<input type="hidden" name="ModelMeta[0][value]" value="<?php if( isset( $privacy[ 'show_address' ] ) ) echo $privacy[ 'show_address' ]->value; ?>" />
					</span>
				</div>
				<div class="frm-actions align align-center">
					<a class="submit btn btn-medium rounded-medium cmt-click" > SAVE </a>
				</div>
				<div class="message"></div>
			</form>
		</div>
	</div>

	<div id="tabs-2" class=" padding padding-medium box-form box-form-regular  max-content-100">
		<span class="cmti cmti-edit btn-edit right padding padding-default-v"></span>
		<h4> Notification Settings </h4><hr>
		<div class="wrap-info">
			<div class=" row ">
				<div class="col col12x4">Receive Mail</div>
				<div class="col col12x8"><?php if( isset( $notification[ 'receive_mail' ] ) ) echo $notification[ 'receive_mail' ]->getFieldValue(); else echo 'No'; ?></div>
			</div>
		</div>
		<div class="wrap-form">
			<form class="cmt-form frm-split-40-60" cmt-app="user" cmt-controller="user" cmt-action="settings" action="user/settings" cmt-keep>
				<div class="spinner max-area-cover"><div class="valign-center cmti cmti-3x cmti-spinner-1 spin"></div></div>
				<div class="frm-field">
					<label>Receive Mail</label>
					<input type="hidden" name="ModelMeta[0][name]" value="receive_mail" />
					<input type="hidden" name="ModelMeta[0][type]" value="<?= CoreGlobal::SETTINGS_NOTIFICATION ?>" />
					<input type="hidden" name="ModelMeta[0][valueType]" value="flag" />
					<span class='cmt-switch cmt-checkbox'>
						<input id="notify_receive_mail" class="cmt-toggle cmt-toggle-round" type="checkbox" name="value" />
						<label for='notify_receive_mail'></label>
						<input type="hidden" name="ModelMeta[0][value]" value="<?php if( isset( $notification[ 'receive_mail' ] ) ) echo $notification[ 'receive_mail' ]->value; ?>" />
					</span>
				</div>
				<div class="frm-actions align align-center">
					<a class="submit btn btn-medium rounded-medium cmt-click" > SAVE </a>
				</div>
				<div class="message"></div>
			</form>
		</div>
	</div>

	<div id="tabs-3" class=" padding padding-medium box-form box-form-regular  max-content-100">
		<span class="cmti cmti-edit btn-edit right padding padding-default-v"></span>
		<h4> Reminder Settings </h4><hr> 
		<div class="wrap-info">
			<div class=" row ">
				<div class="col col12x4">Receive Mail</div>
				<div class="col col12x8"><?php if( isset( $reminder[ 'receive_mail' ] ) ) echo $reminder[ 'receive_mail' ]->getFieldValue(); else echo 'No'; ?></div>
			</div>
		</div>
		<div class="wrap-form">
			<form class="cmt-form frm-split-40-60" cmt-app="user" cmt-controller="user" cmt-action="settings" action="user/settings" cmt-keep>
				<div class="spinner max-area-cover"><div class="valign-center cmti cmti-3x cmti-spinner-1 spin"></div></div>
				<div class="frm-field">
					<label>Receive Mail</label>
					<input type="hidden" name="ModelMeta[0][name]" value="receive_mail" />
					<input type="hidden" name="ModelMeta[0][type]" value="<?= CoreGlobal::SETTINGS_REMINDER ?>" />
					<input type="hidden" name="ModelMeta[0][valueType]" value="flag" />
					<span class='cmt-switch cmt-checkbox'>
						<input id="remind_receive_mail" class="cmt-toggle cmt-toggle-round" type="checkbox" name="value" />
						<label for='remind_receive_mail'></label>
						<input type="hidden" name="ModelMeta[0][value]" value="<?php if( isset( $reminder[ 'receive_mail' ] ) ) echo $reminder[ 'receive_mail' ]->value; ?>" />
					</span>
				</div>
				<div class="frm-actions align align-center">
					<a class="submit btn btn-medium rounded-medium cmt-click" > SAVE </a>
				</div>
				<div class="message"></div>
			</form>
		</div>
	</div>
</div>

<!-- Templates -->
<?php include_once( dirname( __FILE__ ) . "/templates/user-settings.php" ); ?>
