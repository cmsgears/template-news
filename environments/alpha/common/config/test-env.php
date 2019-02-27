<?php
return yii\helpers\ArrayHelper::merge(
	require( __DIR__ . '/main.php' ),
	require( __DIR__ . '/main-env.php' ),
	require( __DIR__ . '/test.php' ),
	[
		'components' => [
			'db' => [
				'class' => 'yii\db\Connection',
				'dsn' => 'mysql:host=localhost;dbname=newsdemo_test',
				'username' => 'newsdemo',
				'password' => 'Ne#1xAl*25',
				'charset' => 'utf8'
			]
		]
	]
);
