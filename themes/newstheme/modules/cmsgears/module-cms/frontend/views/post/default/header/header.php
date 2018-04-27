<?php
// Yii Imports
use yii\helpers\Url;

//CMSGEAR Imports
use cmsgears\cms\common\models\entities\Post;

$basePath	= Yii::$app->controller->basePath;
$tabStatus	= $model->getTabStatus();

$status = $model->status;
?>

<div class="row">
	<div class="colf col12x6">
		<h2> Add Blog Post </h2>
	</div>
</div>	



<div class="row align align-center">
	<?php if( $model->isRegistration() ) { ?>
		
		<div class="colf <?php if( $tabStatus == Post::STATUS_BASIC ) { echo 'active-border'; } ?>   color color-primary-l col12x2 padding padding-medium-v"> 
			<?php if( $status >= Post::STATUS_BASIC ){ ?> <a href="<?= Url::toRoute( "$basePath/basic?slug=$model->slug", true ) ?>"> Basic </a>
			<?php }else { ?> 
				<span> Basic </span>
			<?php } ?>
		</div>	
		
		<div class="col <?php if( $tabStatus == Post::STATUS_MEDIA ) { echo 'active-border';  }?>  color color-primary-l padding padding-medium-v col12x2">
			
			<?php if( $status >= Post::STATUS_MEDIA	 ){ ?> <a href="<?= Url::toRoute( "$basePath/media?slug=$model->slug", true ) ?>"> Media </a>
			<?php }else { ?> 
				<span> Media </span>
			<?php } ?>		

		</div>	
		
		<div class="colf <?php if( $tabStatus == Post::STATUS_SETTINGS ) { echo 'active-border'; }?>  color color-primary-l padding padding-medium-v col12x2"> 
			<?php if( $status >= Post::STATUS_SETTINGS ){ ?> <a href="<?= Url::toRoute( "$basePath/settings?slug=$model->slug", true ) ?>"> Settings </a>
			<?php }else { ?> 
				<span> Settings </span>
			<?php } ?>	
		</div>	
		
		<div class="col <?php if( $tabStatus == Post::STATUS_ATTRIBUTES ) { echo 'active-border'; }?>  color color-primary-l padding padding-medium-v col12x2"> 
			
			<?php if( $status >= Post::STATUS_ATTRIBUTES	 ){ ?> <a href="<?= Url::toRoute( "$basePath/attributes?slug=$model->slug", true ) ?>"> Attribute </a>
			<?php }else { ?> 
				<span> Attribute </span>
			<?php } ?>	
		</div>	
		
		<div class="colf <?php if( $tabStatus == Post::STATUS_REVIEW ) { echo 'active-border';} ?>  color color-primary-l padding padding-medium-v col12x2"> 
			
			<?php if( $status >= Post::STATUS_REVIEW ){ ?> <a href="<?= Url::toRoute( "$basePath/review?slug=$model->slug", true ) ?>"> Review </a>
			<?php }else { ?> 
				<span> Review </span>
			<?php } ?>	
		</div>
	
	<?php } else { ?>

		
		<div class="colf <?php if( $tabStatus == Post::STATUS_BASIC ) { echo 'active-border';} ?>   color color-primary-l col12x2 padding padding-medium-v"> 
			<a href="<?= Url::toRoute( "$basePath/basic?slug=$model->slug", true ) ?>"> Basic </a>
		</div>	
		<div class="col <?php if( $tabStatus == Post::STATUS_MEDIA ) { echo 'active-border';} ?>  color color-primary-l padding padding-medium-v col12x2"> 
			<a href="<?= Url::toRoute( "$basePath/media?slug=$model->slug", true ) ?>"> Media </a>
 		</div>	
		<div class="colf <?php if( $tabStatus == Post::STATUS_SETTINGS ) { echo 'active-border';} ?>  color color-primary-l padding padding-medium-v col12x2"> 
			<a href="<?= Url::toRoute( "$basePath/settings?slug=$model->slug", true ) ?>"> Settings </a>
		</div>	
		<div class="col <?php if( $tabStatus == Post::STATUS_ATTRIBUTES ) { echo 'active-border';} ?>  color color-primary-l padding padding-medium-v col12x2"> 
			<a href="<?= Url::toRoute( "$basePath/attributes?slug=$model->slug", true ) ?>"> Attribute </a>
		</div>	
		<div class="colf <?php if( $tabStatus == Post::STATUS_REVIEW ) { echo 'active-border';} ?>  color color-primary-l padding padding-medium-v col12x2"> 
			<a href="<?= Url::toRoute( "$basePath/review?slug=$model->slug", true ) ?>"> Review </a>
		</div>
	
	<?php } ?>
</div>
