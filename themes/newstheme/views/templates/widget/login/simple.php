<?php
// Yii Imports
use yii\helpers\Html;
use yii\helpers\Url;

// CMG Imports
use cmsgears\social\login\widgets\SnsLoginWidget;
?>

<?php if( $login ) { ?>
	<div id="box-login" class='box-login'>
		<form class="cmt-form frm-rounded-all" id="frm-login" cmt-controller="user" cmt-action="login" action="site/login">
			<div class="max-area-cover spinner">
				<div class="valign-center cmti cmti-2x cmti-spinner-1 spin"></div>
			</div>
			<?= SnsLoginWidget::widget([
				'template' => '@templates/widget/sns-login/simple'
			]) ?>
			<div class="text-with-line"><span class="text-content">OR</span></div>
			<div class="frm-field clearfix">
				<?php if( $label ) { ?>
					<label>Email or Username *</label>
				<?php } ?>
				<?php if( $fieldIcon ) { ?>
					<div class="frm-icon-element">
						<span class="cmti cmti-at"></span>
						<input  type="text" name="Login[email]" placeholder="Email or Username *">
					</div>
				<?php } else { ?>
					<input  type="text" name="Login[email]" placeholder="Email or Username *">
				<?php } ?>
				<span class="error" cmt-error="email"></span>
			</div>
			<div class="frm-field clearfix">
				<?php if( $label ) { ?>
					<label>Password *</label>
				<?php } ?>
				<?php if( $fieldIcon ) { ?>
					<div class="frm-icon-element">
						<span class="cmti cmti-key"></span>
						<input  type="password" name="Login[password]" placeholder="Password *">
					</div>
				<?php } else { ?>
					<input  type="password" name="Login[password]" placeholder="Password *">
				<?php } ?>
				<span class="error" cmt-error="password"></span>
			</div>
			<div>
				<?= Html::a( "Forgot your Password ?", [ '/forgot-password' ], [ 'class' => 'btn-forgot-password' ] ) ?>
			</div>
			<div class="filler-height"></div>
			<div>
				<input type="submit" name="submit" value="Login">
			</div>
			<div class="message warning"></div>
			<div class="clearfix">
				<div class="align align-center"><p class='bold'>Dont have an Account? <a class="bold" href="<?= Url::toRoute( [ '/register' ] ) ?>">Click here</a></p></div>
			</div>
		</form>
	</div>
	<div id="box-forgot-password" class='box-forgot-password'>
		<form class="cmt-form frm-rounded-all" id="frm-forgot-password" cmt-controller="user" cmt-action="forgotPassword" action="site/forgot-password">
			<div class="max-area-cover spinner">
				<div class="valign-center cmti cmti-2x cmti-spinner-1 spin"></div>
			</div>
			<div class="frm-field clearfix">
				<?php if( $label ) { ?>
					<label>Email *</label>
				<?php } ?>
				<?php if( $fieldIcon ) { ?>
					<div class="frm-icon-element">
						<span class="cmti cmti-at"></span>
						<input  type="text" name="ForgotPassword[email]" placeholder="Email *">
					</div>
				<?php } else { ?>
					<input  type="text" name="ForgotPassword[email]" placeholder="Email *">
				<?php } ?>
				<span class="error" cmt-error="email"></span>
			</div>
			<div>
				<?= Html::a( "Login ?", [ '/login' ], [ 'class' => 'btn-login' ] ) ?>
			</div>
			<div class="filler-height"></div>
			<div>
				<input type="submit" name="submit" value="Submit">
			</div>
			<div class="message warning"></div>
		</form>
	</div>
<?php } ?>

<?php if( $register ) { ?>
	<div id="box-signup" class='box-signup'>
		<form class="cmt-form frm-rounded-all" id="frm-signup" cmt-controller="user" cmt-action="register" action="site/register">
			<div class="frm-pre">
				<div class="max-area-cover spinner">
					<div class="valign-center cmti cmti-2x cmti-spinner-1 spin"></div>
				</div>
				<?= SnsLoginWidget::widget([
					'template' => '@templates/widget/sns-login/simple'
				]) ?>
				<div class="text-with-line"><span class="text-content">OR</span></div>
				<div class="frm-field clearfix">
	                <?php if( $label ) { ?>
	                    <label>First Name *</label>
	                <?php } ?>
	                <div class="frm-icon-element">
	                    <span class="cmti cmti-user"></span>
	                    <input  type="text" name="Register[firstName]" placeholder="First Name *">
	                </div>
	                <span class="error" cmt-error="firstName"></span>
	            </div>
	            <div class="frm-field clearfix">
	                <?php if( $label ) { ?>
	                    <label>Last Name *</label>
	                <?php } ?>
	                <div class="frm-icon-element">
	                    <span class="cmti cmti-user"></span>
	                    <input  type="text" name="Register[lastName]" placeholder="Last Name *">
	                </div>
	                <span class="error" cmt-error="lastName"></span>
	            </div>
				<div class="frm-field clearfix">
					<?php if( $label ) { ?>
						<label>Email *</label>
					<?php } ?>
					<?php if( $fieldIcon ) { ?>
						<div class="frm-icon-element">
							<span class="cmti cmti-at"></span>
							<input  type="text" name="Register[email]" placeholder="Email *">
						</div>
					<?php } else { ?>
						<input  type="text" name="Register[email]" placeholder="Email *">
					<?php } ?>
					<span class="error" cmt-error="email"></span>
				</div>
				<div class="frm-field clearfix">
					<?php if( $label ) { ?>
						<label>Password *</label>
					<?php } ?>
					<?php if( $fieldIcon ) { ?>
						<div class="frm-icon-element">
							<span class="cmti cmti-key"></span>
							<input  type="password" name="Register[password]" placeholder="Password *">
						</div>
					<?php } else { ?>
						<input  type="password" name="Register[password]" placeholder="Password *">
					<?php } ?>
					<span class="error" cmt-error="password"></span>
				</div>
				<div class="frm-field clearfix">
					<?php if( $label ) { ?>
						<label>Confirm Password *</label>
					<?php } ?>
					<?php if( $fieldIcon ) { ?>
						<div class="frm-icon-element">
							<span class="cmti cmti-key"></span>
							<input  type="password" name="Register[password_repeat]" placeholder="Confirm Password *">
						</div>
					<?php } else { ?>
						<input  type="password" name="Register[password_repeat]" placeholder="Confirm Password *">
					<?php } ?>
					<span class="error" cmt-error="password_repeat"></span>
				</div>
				<div class="frm-field clearfix">
					<?php if( $label ) { ?>
						<label>Username</label>
					<?php } ?>
					<?php if( $fieldIcon ) { ?>
						<div class="frm-icon-element">
							<span class="cmti cmti-user"></span>
							<input  type="text" name="Register[username]" placeholder="Username">
						</div>
					<?php } else { ?>
						<input  type="text" name="Register[username]" placeholder="Username">
					<?php } ?>
					<span class="error" cmt-error="username"></span>
				</div>
				<div class="clearfix cmt-choice">
	                <div class="clearfix">
	                    <label class="cmt-checkbox">
	                        <input type="hidden" name="Register[merchant]">
	                        <input type="checkbox">
	                        <span class="label pad-label"> <em>I'm Merchant</em></span>
	                    </label>
	                </div>
	            </div>

				<div class="clearfix cmt-choice">
					<div class="clearfix">
						<label>
							<input type="checkbox" name="Register[terms]">
							<span class="label pad-label"> <em>I agree to <?= Html::a( "Terms and Conditions", [ '/terms' ] ) ?> and <?= Html::a( "Privacy Policy", [ '/privacy' ] ) ?>.</em></span>
						</label>
					</div>
					<span class="error" cmt-error="terms"></span>
				</div>
				<div class="filler-height"></div>
				<div>
					<input type="submit" name="submit" value="Sign Up">
				</div>
			</div>
			<div class="frm-post">
				<div class="message warning"></div>
			</div>
		</form>
	</div>
<?php } ?>