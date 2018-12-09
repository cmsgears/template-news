<?php

$params = yii\helpers\ArrayHelper::merge(
	require( __DIR__ . '/../../common/config/params.php' ),
	require( __DIR__ . '/params.php' )
);

return [
	'id' => 'app-site',
	'name' => 'Blog',
	'version' => '1.0.0',
	'basePath' => dirname( __DIR__ ),
	'controllerNamespace' => 'frontend\controllers',
	'defaultRoute' => 'cms/page/single',
	'bootstrap' => [
		'log',
		'core', 'coreFactory', 'forms', 'formsFactory', 'cms', 'cmsFactory', 'breeze',
		'newsletter', 'newsletterFactory', 'notify', 'notifyFactory', 'snsConnect', 'snsConnectFactory',
		'foxSlider'
	],
	'modules' => [
		'core' => [
			'class' => 'cmsgears\core\frontend\Module'
		],
		'forms' => [
			'class' => 'cmsgears\forms\frontend\Module'
		],
		'cms' => [
			'class' => 'cmsgears\cms\frontend\Module'
		],
		'newsletter' => [
			'class' => 'cmsgears\newsletter\frontend\Module'
		],
		'notify' => [
			'class' => 'cmsgears\notify\frontend\Module'
		],
		'snslogin' => [
			'class' => 'cmsgears\social\login\frontend\Module'
		]
	],
	//'catchAll' => [ 'core/site/maintenance' ],
	'components' => [
		'view' => [
			'theme' => [
				'class' => 'themes\news\Theme',
				'childs' => [
					// Child themes to override theme css and to add additional js
				]
			]
		],
		'request' => [
			'csrfParam' => '_csrf-news-site',
			'parsers' => [
				'application/json' => 'yii\web\JsonParser'
			]
		],
		'user' => [
			'identityCookie' => [ 'name' => '_identity-news-site', 'httpOnly' => true ]
		],
		'session' => [
			'name' => 'news-site'
		],
		'errorHandler' => [
			'errorAction' => 'core/site/error'
		],
		'assetManager' => [
			'bundles' => require( dirname( dirname( __DIR__ ) ) . '/themes/assets/news/' . ( YII_ENV_PROD ? 'prod.php' : 'dev.php' ) )
		],
		'urlManager' => [
			'rules' => [
				// apix request rules --------------------------
				// Forms - site forms
				'apix/form/<slug:[\w\-]+>' => 'forms/apix/form/submit',
				// Core - 2 levels
				'apix/<controller:[\w\-]+>/<action:[\w\-]+>' => 'core/apix/<controller>/<action>',
				// Generic - 3, 4 and 5 levels - catch all
				'apix/<module:\w+>/<controller:[\w\-]+>/<action:[\w\-]+>' => '<module>/apix/<controller>/<action>',
				'apix/<module:\w+>/<pcontroller:[\w\-]+>/<controller:[\w\-]+>/<action:[\w\-]+>' => '<module>/apix/<pcontroller>/<controller>/<action>',
				'apix/<module:\w+>/<pcontroller1:[\w\-]+>/<pcontroller2:[\w\-]+>/<controller:[\w\-]+>/<action:[\w\-]+>' => '<module>/apix/<pcontroller1>/<pcontroller2>/<controller>/<action>',
				// regular request rules -----------------------
				// CMS Pages
				'page/search' => 'cms/page/search',
				// Articles - Public - search and single
				'article/search' => 'cms/article/search',
				'article/<slug:[\w\-]+>' => 'cms/article/single',
				// Blog Posts - Public - search, category, tag and single
				'blog/search' => 'cms/post/search',
				'blog/category/<slug:[\w\-]+>' => 'cms/post/category',
				'blog/tag/<slug:[\w\-]+>' => 'cms/post/tag',
				'blog/author/<slug:[\w\-]+>' => 'cms/post/author',
				'blog/<slug:[\w\-]+>' => 'cms/post/single',
				// Forms
				'form/<slug:[\w\-]+>' => 'cms/form/single',
				// Core - 2 levels
				'<controller:[\w\-]+>/<action:[\w\-]+>' => 'core/<controller>/<action>',
				// Module Pages - 3, 4 and 5 levels - catch all
				'<module:\w+>/<controller:[\w\-]+>/<action:[\w\-]+>' => '<module>/<controller>/<action>',
				'<module:\w+>/<pcontroller:[\w\-]+>/<controller:\w+>/<action:[\w\-]+>' => '<module>/<pcontroller>/<controller>/<action>',
				'<module:\w+>/<pcontroller1:[\w\-]+>/<pcontroller2:[\w\-]+>/<controller:[\w\-]+>/<action:[\w\-]+>' => '<module>/<pcontroller1>/<pcontroller2>/<controller>/<action>',
				// Standard Pages
				'<action:(home|profile|calendar|account|address|settings)>' => 'core/user/<action>',
				'<action:(login|logout|register|forgot-password|reset-password|reset-password-otp|activate-account|confirm-account|feedback|testimonial)>' => 'core/site/<action>',
				// CMS Pages
				'<slug:[\w\-]+>' => 'cms/page/single'
			]
		],
		'core' => [
			'loginRedirectPage' => '/home',
			'logoutRedirectPage' => '/'
		]
	],
	'params' => $params
];
