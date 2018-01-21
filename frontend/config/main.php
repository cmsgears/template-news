<?php

$params = yii\helpers\ArrayHelper::merge(
    require( dirname( dirname( __DIR__ ) ) . '/common/config/params.php' ),
    require( __DIR__ . '/params.php' )
);

return [
    'id' => 'app-frontend',
    'name' => 'news Web',
    'version' => '2.0.0',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'frontend\controllers',
    'defaultRoute' => 'core/site/index',
    'bootstrap' => [ 'log', 'core', 'cms', 'forms','notify', 'foxSlider', 'newsletter' ],
    'modules' => [
        'forms' => [
            'class' => 'cmsgears\forms\frontend\Module'
        ],
        'cms' => [
            'class' => 'cmsgears\cms\frontend\Module'
        ],
        'core' => [
            'class' => 'news\core\frontend\Module'
        ],
        'notify' => [
            'class' => 'cmsgears\notify\admin\Module'
        ],
        'newsletter' => [
            'class' => 'cmsgears\newsletter\frontend\Module'
        ]
        
    ],
    'components' => [
        'view' => [
			'theme' => [
            	'class' => 'themes\newstheme\Theme',
            	'childs' => [
            		// Child themes to override theme css and to add additional js
            	]
			]
        ],
        'request' => [
            'csrfParam' => '_csrf-app',
		    'parsers' => [
		        'application/json' => 'yii\web\JsonParser'
		    ]
        ],
        'user' => [
            'identityCookie' => [ 'name' => '_identity-app', 'httpOnly' => true ]
        ],
        'session' => [
            'name' => 'blog-app'
        ],
        'errorHandler' => [
            'errorAction' => 'core/site/error'
        ],
		'assetManager' => [
			'bundles' => require( __DIR__ . '/' . ( YII_ENV_PROD ? 'assets-prod.php' : 'assets-dev.php' ) )
		],
        'urlManager' => [
	        'rules' => [
	        	// api request rules ---------------------------
	        	'api/<module:\w+>/<controller:[\w\-]+>/<action:[\w\-]+>' => '<module>/api/<controller>/<action>',
	        	'api/<module:\w+>/<controller:[\w\-]+>/<pcontroller:[\w\-]+>/<action:[\w\-]+>' => '<module>/api/<controller>/<pcontroller>/<action>',
	        	'api/<module:\w+>/<pcontroller:\w+>/<pcontroller2:\w+>/<controller:\w+>/<action:[\w\-]+>' => '<module>/api/<pcontroller>/<pcontroller2>/<controller>/<action>',
	        	// apix request rules --------------------------
	        	// Forms - site forms
	        	'apix/form/<slug:[\w\-]+>' => 'forms/apix/form/submit',
	        	// Core Module Actions - 2 levels
	        	'apix/<controller:\w+>/<action:[\w\-]+>' => 'core/apix/<controller>/<action>',
	        	// Module Actions - 3, 4 and 5 levels
	        	'apix/<module:\w+>/<controller:[\w\-]+>/<action:[\w\-]+>' => '<module>/apix/<controller>/<action>',
	        	'apix/<module:\w+>/<pcontroller:\w+>/<controller:\w+>/<action:[\w\-]+>' => '<module>/apix/<pcontroller>/<controller>/<action>',
	        	'apix/<module:\w+>/<pcontroller:\w+>/<pcontroller2:\w+>/<controller:\w+>/<action:[\w\-]+>' => '<module>/apix/<pcontroller>/<pcontroller2>/<controller>/<action>',
				// regular request rules -----------------------
	        	// Blog
	        	'blog/search' => 'cms/post/search',
	        	'blog/category/<slug:[\w\-]+>' => 'cms/post/category',
	        	'blog/tag/<slug:[\w\-]+>' => 'cms/post/tag',
	        	'blog/<slug:[\w\-]+>' => 'cms/post/single',
				'blog/<controller:\w+>/<action:[\w\-]+>' => 'cms/<controller>/<action>',
	        	// Forms
	        	'form/<slug:[\w\-]+>' => 'forms/form/single',
	        	// Core Module Pages
	        	'<controller:\w+>/<action:[\w\-]+>' => 'core/<controller>/<action>',
	        	// Module Pages
	        	'<module:\w+>/<controller:\w+>/<action:[\w\-]+>' => '<module>/<controller>/<action>',
	        	// Standard Pages
	        	'<action:(home)>' => 'core/user/<action>',
	        	'<action:(login|logout|register|forgot-password|reset-password|activate-account|confirm-account)>' => 'core/site/<action>',
	        	// CMS Pages
	        	'<slug:[\w\-]+>' => 'cms/page/single'
	        ]
		],
        'core' => [
        	'loginRedirectPage' => '/',
        	'logoutRedirectPage' => '/'
        ]
    ],
    'params' => $params
];