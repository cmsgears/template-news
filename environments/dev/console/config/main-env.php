<?php

return [
	'bootstrap' => [ 'gii' ],
	'modules' => [
		'gii' => 'yii\gii\Module'
	],
	'components' => [
		'urlManager' => [
			'class' => 'yii\web\UrlManager',
			'baseUrl' => 'http://localhost/newsdemo/frontend/web'
		],
		// CMG Modules - Core
		'migration' => [
			'class' => 'cmsgears\core\common\components\Migration',
			'cmgPrefix' => 'cmg_',
			'sitePrefix' => 'news_',
			'siteName' => 'News',
			'siteTitle' => 'News Demo',
			'siteMaster' => 'demomaster',
			'primaryDomain' => 'dev.vcdevhub.com',
			'defaultSite' => 'http://localhost/newsdemo/frontend/web',
			'defaultAdmin' => 'http://localhost/newsdemo/backend/web',
			'uploadsUrl' => 'http://localhost/newsdemo/uploads'
		]
	]
];
