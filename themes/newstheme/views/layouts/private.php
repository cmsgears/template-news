<?php
// SF Imports
use themes\newstheme\assets\PrivateAssets;

PrivateAssets::register( $this );

// Common variables available for headers, sidebars and footers included within this layout
$coreProperties = $this->context->getCoreProperties();
$themePath		= Yii::getAlias( '@themes/newstheme' );
$user			= Yii::$app->user->getIdentity();
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= $coreProperties->getLanguage() ?>" class="html-private">
    <head>
		<?php include "$themePath/views/headers/main.php"; ?>
		
    </head>
    <body class="body-private">
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
        <div class="row">
			<div class="colf col12x2 bkg bkg-white">
				<?php include "$themePath/views/sidebars/private.php"; ?>
			</div>
			<div class="col col12x10">
				<div class='container container-main container-private'>
					<div class='wrap-content wrap-content-main max-cols-100 wrap-col-filler clearfix '>
						<div class='content colf1'>
							<?= $content ?>
						</div>
					</div>
				</div>
			</div>	
		</div>	
        
        <?php include "$themePath/views/footers/private.php"; ?>
        <?php $this->endBody(); ?>
    </body>
</html>
<?php $this->endPage(); ?>