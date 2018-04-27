<?php
// Yii Imports
use \Yii;
use yii\helpers\Html;

// CMG Imports
use cmsgears\core\common\utilities\DateUtil;
use cmsgears\core\common\utilities\CodeGenUtil;

$rating			= $model->rating;
$id				= $model->id;
$commentDate	= date( 'M d, Y', strtotime( $model->createdAt ) );
$avatar			= Yii::getAlias( "@images" ).'/icon.jpeg';

if( isset( $model->creator->avatar ) ) {

	$avatar		=  $model->creator->avatar->getThumbUrl();
}
else {

	$avatar	;	
}
?>
<div class='row row-inline max-cols-50'>
	<div class="col col12x2  author-avatar bkg bkg-image circled circled1" style="background-image:url(<?=$avatar?>)">
		
	</div>
	<div class="col fluid col12x10 bkg bkg-white">
            
	   <div class="review align align-left clearfix relative">
	   		<div class='col col12'><i class='fa fa-quote-left'></i></div>
                        <div class='col col12x10 align-justify'><span class="font-size font-size-large-7"><?= substr($model->content, 0, 40) ?></span></div>
	   		<div class='col col12 align align-right'><i class='fa fa-quote-right'></i></div>
			<div class="filler-height filler-height-default"> </div>
                <div class='col col1 padding padding-medium-v'>
			By - <div class='inline-block text text-link'><?= ucfirst( $model->name ) ?></div>
                        <div class="inline-block right"> <i class="fa fa-heart"> 12321 </i> </div>
		</div>      
           </div>
            
            
            
		
	</div>
</div><hr>