<?php

$config = [
	'components' => [
		'request' => [
			'cookieValidationKey' => '41keki8yZImrLwE5eltQwkm_bdhKNG8p',
		]
	]
];

// Debugger and Gii extensions required for dev environment
if( !YII_ENV_TEST ) {

	$config['bootstrap'][]		= 'debug';
	$config['modules']['debug'] = [ 'class' => 'yii\debug\Module' ];

	$config['bootstrap'][]		= 'gii';
	$config['modules']['gii']	= [ 'class' => 'yii\gii\Module' ];
}

return $config;