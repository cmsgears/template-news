<?php
$params = array_merge(
    require( dirname( dirname( __DIR__ ) ) . '/common/config/params.php' ),
    require( __DIR__ . '/params.php' )
);

return [
    'id' => 'app-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [ 'core', 'cms', 'forms','notify', ],
    'controllerNamespace' => 'console\controllers',
    'modules' => [
        'cms' => [
            'class' => 'cmsgears\cms\frontend\Module'
        ],
        'forms' => [
            'class' => 'cmsgears\forms\frontend\Module'
        ],
        'notify' => [
            'class' => 'cmsgears\notify\frontend\Module'
        ],
        'core' => [
        	'class'	=>	'cmsgears\core\frontend\Module'
        ]
    ],
    'components' => [
        'user' => [
            'class' => 'yii\web\User',
            'identityClass' => 'cmsgears\core\common\models\entities\User',
            'enableAutoLogin' => true,
            'loginUrl' => '@web/login'
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => [ 'error', 'warning', 'info' ],
                    'categories' => [ 'cmsgears\*', 'news\*', 'console\*' ]
                ]
            ]
        ],
        // CMG Modules - Core
        'migration' => [
            'class' => 'cmsgears\core\common\components\Migration',
            'siteName' => 'News',
            'siteTitle' => 'News',
            'primaryDomain' => 'news.com',
            'defaultSite' => 'https://www.news.com/',
            'defaultAdmin' => 'https://www.news.com/admin/',
            'uploadsUrl' => 'http://localhost/newstheme/uploads',
            'timezone' => 'America/Chicago'
        ],
        'factory' => [
        	'class' => 'cmsgears\core\common\components\ObjectFactory'
        ],
        'core' => [
        	'class' => 'cmsgears\core\common\components\Core',
        	'editorClass' => 'cmsgears\widgets\cleditor\ClEditor',
        	'rbacFilters' => [
        		'owner' => 'cmsgears\core\common\filters\OwnerFilter'
        	]
        ],
        'consoleCore' => [
            'class' => 'console\components\Core'
        ],
        'coreMessage' => [
        	'class' => 'cmsgears\core\common\components\MessageSource',
        ],
        'coreMailer' => [
        	'class' => 'cmsgears\core\common\components\Mailer'
        ],
        'formDesigner' => [
        	'class' => 'cmsgears\core\common\components\FormDesigner'
        ],
        'templateManager' => [
        	'class' => 'cmsgears\core\common\components\TemplateManager',
        	'templatesPath' => null,
        	'renderers' => [
        		'default' => 'Default',
        		'twig' => 'Twig',
        		'smarty' => 'Smarty'
        	]
        ],
        'eventManager' => [
        	'class' => 'cmsgears\notify\common\components\EventManager'
        ],
		// CMG Modules - CMS
        'cms' => [
        	'class' => 'cmsgears\cms\common\components\Cms'
        ],
        'cmsMessage' => [
        	'class' => 'cmsgears\cms\common\components\MessageSource',
        ],
        'cmsMailer' => [
        	'class' => 'cmsgears\cms\common\components\Mailer'
        ],
		// CMG Modules - Forms
        'forms' => [
        	'class' => 'cmsgears\forms\common\components\Form'
        ],
        'formsMessage' => [
        	'class' => 'cmsgears\forms\common\components\MessageSource',
        ],
        'formsMailer' => [
        	'class' => 'cmsgears\forms\common\components\Mailer'
        ],
        // CMG Modules - Notify
        'notify' => [
        	'class' => 'cmsgears\notify\common\components\Notify'
        ],
        'notifyMessage' => [
        	'class' => 'cmsgears\notify\common\components\MessageSource',
        ],
        'notifyMailer' => [
        	'class' => 'cmsgears\notify\common\components\Mailer'
        ],
        // CMG Plugins
        'fileManager' => [
        	'class' => 'cmsgears\files\components\FileManager'
        ],
        'iconManager' => [
        	'class' => 'cmsgears\icons\components\IconManager'
        ],
        // FoxSlider
        'foxSlider' => [
        	'class' => 'foxslider\common\components\Core'
        ],
        // News Modules - Core
        'newsCore' => [
        	'class' => 'news\core\common\components\Core'
        ],
        'newsCoreMailer' => [
        	'class' => 'news\core\common\components\Mailer'
        ],
        'newsCoreMessage' => [
        	'class' => 'news\core\common\components\MessageSource',
        ]
    ],
    'params' => $params
];