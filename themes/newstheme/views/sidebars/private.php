
<?php
use yii\helpers\Url;

use cmsgears\files\widgets\AvatarUploader;
use cmsgears\widgets\nav\BasicNav;

$user       	= Yii::$app->user->getIdentity();
$userId     	= $user->id;
//$subscriptions	= count( Yii::$app->factory->get( 'subscriptionService' )->getBySubscriberId( $userId ) ) > 0 ? true : false;

$menuItems = [
	    [ 'label' => 'Dashboard', 'url' => [ '/post/basic' ], 'options' => [ 'class' => 'padding padding-default-v' ], 'icon' => 'fa fa-dashboard' ],
	    [ 'label' => 'Post', 'url' => [ '/blog/post/all' ], 'options' => [ 'class' => 'padding padding-default-v' ], 'icon' => 'fa fa-twitch' ],
	    [ 'label' => 'Notification', 'url' => [ '/' ], 'options' => [ 'class' => 'padding padding-default-v' ], 'icon' => 'fa fa-bell' ],
		[ 'label' => 'My Accounts', 'url' => [ '/user/profile' ], 'options' => [ 'class' => 'padding padding-default-v' ], 'icon' => 'fa fa-user' ],
		[ 'label' => 'Settings', 'url' => [ '/user/settings' ], 'options' => [ 'class' => 'padding padding-default-v' ], 'icon' => 'fa fa-cog' ]
	];


//if( $subscriptions ) {

//	$menuItems[]	= [ 'label' => 'Subscriptions', 'url' => [ "/ngo/main/subscriptions" ], 'options' => [ 'class' => 'btn bold' ] ];
//}
?>

<?= AvatarUploader::widget([
		'options' => [ 'id' => 'avatar-user', 'class' => 'file-uploader' ],
		'model' => $user->avatar, 'postAction' => true,
		'postActionUrl' => "user/avatar?id=$userId"
]);?>

<?php foreach($menuItems as $item) { ?>

	<div class="row padding padding-default">
		<div class="col align align-right col12x2">
			<span class="  <?= $item['icon']?>"> </span>
		</div>
		<div class="col col12x9 right">
			<a href="<?= Url::toRoute(  $item['url']  )?>"> <span> <?= $item['label']?> </span> </a>
		</div>	
	</div>
<?php } ?>

