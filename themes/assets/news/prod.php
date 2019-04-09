<?php

return [
	'yii\web\JqueryAsset' => false,
	'lazy' => [
		'class' => 'yii\web\AssetBundle',
		'basePath' => '@webroot',
		'baseUrl' => '@web',
		'js' => [ 'news/lzynlaxd-20190216.js' ]
	],
	'fa' => [
		'class' => 'yii\web\AssetBundle',
		'basePath' => '@webroot',
		'baseUrl' => '@web',
		'css' => [ 'news/fawnlaxd-20190216.js' ]
	],
	'common' => [
		'class' => 'yii\web\AssetBundle',
		'basePath' => '@webroot',
		'baseUrl' => '@web',
		'css' => [ 'news/cmnnlaxd-20190216.css' ],
		'js' => [ 'news/cmnnlaxd-20190216.js' ],
		'depends' => [ 'lazy', 'fa', 'cmsgears\assets\jquery\Jquery' ]
	],
	'landing' => [
		'class' => 'yii\web\AssetBundle',
		'basePath' => '@webroot',
		'baseUrl' => '@web',
		'css' => [ 'news/ladnlaxd-20190216.css' ],
		'js' => [ 'news/ladnlaxd-20190216.js' ],
		'depends' => [ 'common' ]
	],
	'public' => [
		'class' => 'yii\web\AssetBundle',
		'basePath' => '@webroot',
		'baseUrl' => '@web',
		'css' => [ 'news/pubnlaxd-20190216.css' ],
		'js' => [ 'news/pubnlaxd-20190216.js' ],
		'depends' => [ 'common' ]
	],
	'private' => [
		'class' => 'yii\web\AssetBundle',
		'basePath' => '@webroot',
		'baseUrl' => '@web',
		'css' => [ 'news/prvnlaxd-20190216.css' ],
		'js' => [ 'news/prvnlaxd-20190216.js' ],
		'depends' => [ 'common' ]
	]
];
