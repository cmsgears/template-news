<?php

$config = [
	'components' => [
		'request' => [
			'cookieValidationKey' => '5FcBk6Jg72ykpheJ8QC0ewJNeRkH8gtS'
		]
	]
];

if( !YII_ENV_TEST ) {

	$config['bootstrap'][]		= 'debug';
	$config['modules']['debug'] = [ 'class' => 'yii\debug\Module' ];

	$config['bootstrap'][]		= 'gii';
	$config['modules']['gii']	= [ 'class' => 'yii\gii\Module' ];
}

return $config;