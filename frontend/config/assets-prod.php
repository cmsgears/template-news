<?php

return [
	'yii\web\JqueryAsset' => false,
	'common' => [
		'class' => 'yii\web\AssetBundle',
		'basePath' => '@webroot',
		'baseUrl' => '@web',
		'css' => [ 'styles/cmnbzxrs-20171119.css' ],
		'js' => [ 'scripts/cmnbzxrs-20171119.js' ],
		'depends' => [ 'cmsgears\core\common\assets\Jquery' ]
	],
	'landing' => [
		'class' => 'yii\web\AssetBundle',
		'basePath' => '@webroot',
		'baseUrl' => '@web',
		'css' => [ 'styles/ladbzxrs-20171119.css' ],
		//'js' => [ 'scripts/ladbzxrs-20171119.js' ],
		'depends' => [ 'common' ]
	],
	'public' => [
		'class' => 'yii\web\AssetBundle',
		'basePath' => '@webroot',
		'baseUrl' => '@web',
		'css' => [ 'styles/pubbzxrs-20171119.css' ],
		//'js' => [ 'scripts/pubbzxrs-20171119.js' ],
		'depends' => [ 'common' ]
	],
	'blog' => [
		'class' => 'yii\web\AssetBundle',
		'basePath' => '@webroot',
		'baseUrl' => '@web',
		'css' => [ 'styles/blgbzxrs-20171119.css' ],
		//'js' => [ 'scripts/blgbzxrs-20171119.js' ],
		'depends' => [ 'common' ]
	],
	'private' => [
		'class' => 'yii\web\AssetBundle',
		'basePath' => '@webroot',
		'baseUrl' => '@web',
		'css' => [ 'styles/prvbzxrs-20171119.css' ],
		//'js' => [ 'scripts/prvbzxrs-20171119.js' ],
		'depends' => [ 'common' ]
	]
];
