<?php

$config = [
	'components' => [
		'request' => [
			'cookieValidationKey' => '59JZ08dMwm6S5tQGBDVzlWHyVU8Led_E'
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