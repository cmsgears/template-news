<?php

$params = yii\helpers\ArrayHelper::merge(
    require( __DIR__ . '/../../common/config/params.php' ),
    require( __DIR__ . '/params.php' )
);

return [
    'id' => 'app-admin',
    'basePath' => dirname( __DIR__ ),
    'controllerNamespace' => 'admin\controllers',
    'defaultRoute' => 'core/site/index',
    'bootstrap' => [
    					'log',
    					'core', 'cms', 'forms', 'notify', 'foxSlider'
    				],
    'modules' => [
        'core' => [
            'class' => 'cmsgears\core\admin\Module'
        ],
        'cms' => [
            'class' => 'cmsgears\cms\admin\Module'
        ],

		'forms' => [
            'class' => 'cmsgears\forms\admin\Module'
        ],

        'notify' => [
            'class' => 'cmsgears\notify\admin\Module'
        ],

        'foxslider' => [
            'class' => 'foxslider\admin\Module'
        ],
		'newsCore' => [
            'class' => 'news\core\admin\Module'
        ],
    ],
    'components' => [
        'view' => [
			'theme' => [
            	'class' => 'themes\admin\Theme',
            	'childs' => [ 'themes\adminchild\Theme' ]
			]
        ],
        'request' => [
            'csrfParam' => '_csrf-admin',
		    'parsers' => [
		        'application/json' => 'yii\web\JsonParser'
		    ]
        ],
        'user' => [
            'identityCookie' => [ 'name' => '_identity-admin', 'httpOnly' => true ]
        ],
        'session' => [
            'name' => 'blog-admin'
        ],
        'errorHandler' => [
            'errorAction' => 'core/site/error'
        ],
		'assetManager' => [
			'bundles' => require( __DIR__ . '/' . ( YII_ENV_PROD ? 'assets-prod.php' : 'assets-dev.php' ) )
		],
        'urlManager' => [
	        'rules' => [
	        	// APIX Rules
	        	'apix/<module:\w+>/<controller:\w+>/<action:[\w\-]+>' => '<module>/apix/<controller>/<action>',
	        	'apix/<controller:\w+>/<action:[\w\-]+>' => 'core/apix/<controller>/<action>',
	        	// Regular Rules
	        	'<module:\w+>/<controller:\w+>/<action:[\w\-]+>' => '<module>/<controller>/<action>',
	        	'<action:(login|logout|dashboard|forgot-password|reset-password|activate-account)>' => 'core/site/<action>'
	        ]
		],
        'core' => [
        	'loginRedirectPage' => '/dashboard',
        	'logoutRedirectPage' => '/login'
        ],
        'sidebar' => [
        	'class' => 'cmsgears\core\admin\components\Sidebar',
        	'modules' => [ 'newsCore', 'notify', 'cms', 'foxslider', 'forms', 'core' ],
        	'plugins' => [
        		'fileManager' => [ 'file' ]
        	]
        ],
        'dashboard' => [
        	'class' => 'cmsgears\core\admin\components\Dashboard',
        	'modules' => [ 'cms', 'core' ]
        ]
    ],
    'params' => $params
];