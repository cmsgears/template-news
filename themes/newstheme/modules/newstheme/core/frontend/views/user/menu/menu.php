<?php 

use yii\helpers\Url;
?>
<?php $id =  Yii::$app->controller->action->id;?>
<div class="row align align-center">
	<div class="colf color color-primary-l <?php if( $id == 'profile' ) { echo 'active-border'; }  ?>  col12x2 padding padding-medium-v"> 
		<a href="<?= Url::toRoute('user/profile', true); ?>">  Profile </a>
	</div>	
	<div class="col color color-primary-l <?php if( $id == 'account' ) { echo 'active-border'; }  ?> padding padding-medium-v col12x2"> 
		<a href="<?= Url::toRoute('user/account', true); ?>">  Account </a>
	</div>	
	<div class="colf color color-primary-l <?php if( $id == 'address' ) { echo 'active-border'; }  ?> padding padding-medium-v col12x2"> 
		<a href="<?= Url::toRoute('user/address', true); ?>">  Address </a>
	</div>	
	
</div>