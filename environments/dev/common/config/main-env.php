<?php

return [
	'components' => [
		'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=newstheme',
            'username' => 'newstheme',
            'password' => 'Newstheme_#123',
            'charset' => 'utf8'
		],
		'mailer' => [
			'class' => 'yii\swiftmailer\Mailer',
			'viewPath' => '@common/mail',
			'useFileTransport' => true
		]
	]
];