<?php
// CMG Imports
use cmsgears\cms\common\utilities\ContentUtil;

// SF Imports
use themes\newstheme\assets\BlogAssets;

ContentUtil::initPage( $this );

BlogAssets::register( $this );

// Common variables available for headers, sidebars and footers included within this layout
$coreProperties = $this->context->getCoreProperties();
$themePath		= Yii::getAlias( '@themes/newstheme' );
$user			= Yii::$app->user->getIdentity();
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang='<?= $coreProperties->getLanguage() ?>'>
    <head>
		<?php include "$themePath/views/headers/main.php"; ?>
    </head>
    <body>
        <?php $this->beginBody(); ?>
		<div id='pre-loader-main' class='max-area-cover'>
			<div class='valign-center cmti cmti-5x cmti-spinner-1 spin'></div>
		</div>
		<?php
			if( isset( $user ) ) {

				include "$themePath/views/headers/private.php";
			}
			else {

				include "$themePath/views/headers/public.php";
			}
		?>
        <?php include "$themePath/views/includes/menu-main.php"; ?>
        <div class='container container-main'>
	        <div class='wrap-content wrap-content-main'>
	        	<div class='content top-padding'>
	        		<?= $content ?>
	        	</div>
	        </div>
        </div>
        <?php include "$themePath/views/footers/public.php"; ?>
        <?php $this->endBody(); ?>
    </body>
</html>
<?php $this->endPage(); ?>