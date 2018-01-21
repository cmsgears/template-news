<?php

return [
	'yii\web\JqueryAsset' => false,
	'asset' => [
		'class' => 'themes\newstheme\assets\AssetBundle'
	],
	'landing' => [
		'class' => 'themes\newstheme\assets\LandingAssets'
	],
	'public' => [
		'class' => 'themes\newstheme\assets\PublicAssets'
	],
	'blog' => [
		'class' => 'themes\newstheme\assets\BlogAssets'
	],
	'private' => [
		'class' => 'themes\newstheme\assets\PrivateAssets'
	]
];
