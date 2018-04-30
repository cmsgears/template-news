<?php
// CMG Imports
use yii\helpers\Url;
use cmsgears\widgets\elements\Nav;

use themes\newstheme\Theme;

$user	= Yii::$app->user->getIdentity();

?>
<div id="popup-menu-main" class="vnav-slider-wrap color-transparent-black">
	<div class="popup-bkg-filler"> </div>
	
	<div class="vnav-slider vnav-slider-left">
		<div class="">
			<div class="padding padding-medium border border-bottom">
				<span class="">
					<i class="fa fa-bars "> </i> 
					<span class="padding padding-left-default"> Menu </span>
				</span>
				
				<span class="btn-close right">
					<a class=" "> <i class="fas fa-times-circle"></i> </a>
				</span>    
			</div>

				<?php if( !$user ) {  
				   /*echo  Nav::widget(['options'=> ['class'=> 'align align-center bold '  ],
					   'slug' =>  Theme::MENU_MAIN, 
					   ]); */
				    ?>

					<ul class="vnav-basic"> 
						<li><a href="<?= Url::to(['/search'] )?>">search</a></li>
						<li><a href="<?= Url::to(['/privacy'] )?>">privacy</a></li>
						<li><a href="<?= Url::to(['/login'] )?>">login</a></li>
					</ul>
					
					
			<?php	} else { 
/*					echo  Nav::widget(['options'=> ['class'=> 'align align-center bold'  ], 
						'slug' =>  Theme::MENU_MAIN_PRIVATE, 
						]); */
?>
					
					<ul class="vnav-basic"> 
						<li><a href="<?= Url::to(['/search'] )?>">search</a></li>
						<li><a href="<?= Url::to(['/web/post/basic'] )?>">Dashboard</a></li>
						<li><a href="<?= Url::to(['/blog/post/all'] )?>">post</a></li>
						<li><a href="<?= Url::to(['/privacy'] )?>">privacy</a></li>
						<li><a href="<?= Url::to(['/login'] )?>">login</a></li>
					</ul>
				
				<?php } ?>
 		</div>
	</div>
</div>