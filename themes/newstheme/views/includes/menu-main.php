<?php
// CMG Imports
use cmsgears\widgets\nav\BasicNav;
use cmsgears\widgets\dnav\DynamicNav;
use cmsgears\widgets\text\TextWidget;

// NGOFB Imports
use themes\newstheme\Theme;

$user			= Yii::$app->user->getIdentity();

include_once"businessCategoryTemplate.php";
include_once"couponCategoryTemplate.php";
include_once"eventCategoryTemplate.php";
?>
<div id="popup-menu-main" class="vnav-slider-wrap color-transparent-black">
	<div class="popup-bkg-filler"> </div>
	
	<div class="vnav-slider vnav-slider-left">
		<div class="vnav-slider-menu clearfix relative">
			
			<div class="row padding padding-medium">
				<div class="col col12x6">
					<ul class="vnav menu-categories">
						<li>
							<a><i class="fa fa-bars fa-2x"> </i> <span class="padding padding-medium h3"> Menu </span></a>
								
						</li>
					</ul>
				</div>    
				<div class="btn-close col col12x6">
					<ul class="vnav menu-categories">
						<li>
							<a class="align align-right "> <i class="fa fa-close fa-2x"></i> </a>
						</li>
					</ul>
				</div>    
			</div>
			<div class="colf1">
				<hr>
			</div>

			<div class="filler-height"></div>
                        
				<?php if( !$user ) {  
				   echo  DynamicNav::widget(['options'=> ['class'=> 'align align-center bold '  ], 'slug' =>  Theme::MENU_MAIN, ]); 

				} else { 
					echo  DynamicNav::widget(['options'=> ['class'=> 'align align-center bold'  ], 'slug' =>  Theme::MENU_MAIN_PRIVATE, ]); 
				} ?>
                      

	 		<?= TextWidget::widget( [ 'slug' => Theme::WIDGET_FOLLOW_US, 'options' => [ 'class' => 'wrap-social-menu' ] ] ) ?>
 		</div>
	</div>
</div>