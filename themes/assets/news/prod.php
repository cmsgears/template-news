<?php

return [
	'yii\web\JqueryAsset' => false,
	'common' => [
		'class' => 'yii\web\AssetBundle',
		'basePath' => '@webroot',
		'baseUrl' => '@web',
		'css' => [ 'blog/cmncmgnl-20181201.css' ],
		'js' => [ 'blog/cmncmgnl-20181201.js' ],
		'depends' => [ 'cmsgears\assets\jquery\Jquery' ]
	],
	'landing' => [
		'class' => 'yii\web\AssetBundle',
		'basePath' => '@webroot',
		'baseUrl' => '@web',
		'css' => [ 'blog/ladcmgnl-20181201.css' ],
		'js' => [ 'blog/ladcmgnl-20181201.js' ],
		'depends' => [ 'common' ]
	],
	'public' => [
		'class' => 'yii\web\AssetBundle',
		'basePath' => '@webroot',
		'baseUrl' => '@web',
		'css' => [ 'blog/pubcmgnl-20181201.css' ],
		'js' => [ 'blog/pubcmgnl-20181201.js' ],
		'depends' => [ 'common' ]
	],
	'private' => [
		'class' => 'yii\web\AssetBundle',
		'basePath' => '@webroot',
		'baseUrl' => '@web',
		'css' => [ 'blog/prvcmgnl-20181201.css' ],
		'js' => [ 'blog/prvcmgnl-20181201.js' ],
		'depends' => [ 'common' ]
	]
];
