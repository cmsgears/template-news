<?php

$params = yii\helpers\ArrayHelper::merge(
	require( __DIR__ . '/../../common/config/params.php' ),
	require( __DIR__ . '/params.php' )
);

return [
	'id' => 'app-api',
	'name' => 'News Demo',
	'version' => '1.0.0',
	'basePath' => dirname( __DIR__ ),
	'controllerNamespace' => 'api\controllers',
	'defaultRoute' => 'core/site/index',
	'bootstrap' => [
		'log',
		'core', 'coreFactory', 'forms', 'formsFactory', 'cms', 'cmsFactory', 'breeze',
		'newsletter', 'newsletterFactory', 'notify', 'notifyFactory', 'snsConnect', 'snsConnectFactory',
		'foxSlider'
	],
	'modules' => [
		'core' => [
			'class' => 'cmsgears\core\api\Module'
		],
		'forms' => [
			'class' => 'cmsgears\forms\api\Module'
		],
		'cms' => [
			'class' => 'cmsgears\cms\api\Module'
		],
		'newsletter' => [
			'class' => 'cmsgears\newsletter\api\Module'
		],
		'notify' => [
			'class' => 'cmsgears\notify\api\Module'
		],
		'snsconnect' => [
			'class' => 'cmsgears\social\connect\api\Module'
		],
        'foxslider' => [
            'class' => 'foxslider\api\Module'
        ]
	],
	//'catchAll' => [ 'core/site/maintenance' ],
	'components' => [
		'request' => [
			'csrfParam' => '_csrf-blog-api',
			'parsers' => [
				'application/json' => 'yii\web\JsonParser'
			]
		],
		'user' => [
			'identityCookie' => [ 'name' => '_identity-blog-api', 'httpOnly' => true ]
		],
		'session' => [
			'name' => 'blog-api'
		],
		'errorHandler' => [
			'errorAction' => 'core/site/error'
		],
		'assetManager' => [
			'bundles' => require( dirname( dirname( __DIR__ ) ) . '/themes/assets/api/' . ( YII_ENV_PROD ? 'prod.php' : 'dev.php' ) )
		],
		'urlManager' => [
			'rules' => [
				// api request rules ---------------------------
				// Generic - 3, 4 and 5 levels - catch all
				'<module:\w+>/<controller:[\w\-]+>/<action:[\w\-]+>' => '<module>/api/<controller>/<action>',
				'<module:\w+>/<controller:[\w\-]+>/<pcontroller:[\w\-]+>/<action:[\w\-]+>' => '<module>/api/<controller>/<pcontroller>/<action>',
				'<module:\w+>/<pcontroller1:\w+>/<pcontroller2:\w+>/<controller:\w+>/<action:[\w\-]+>' => '<module>/api/<pcontroller1>/<pcontroller2>/<controller>/<action>'
			]
		]
	],
	'params' => $params
];
