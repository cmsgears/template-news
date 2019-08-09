<?php

return [
	'bootstrap' => [ 'gii' ],
	'modules' => [
		'gii' => 'yii\gii\Module'
	],
	'components' => [
		'urlManager' => [
			'class' => 'yii\web\UrlManager',
			'baseUrl' => 'https://dev.vcdevhub.com/newsdemo/frontend/web'
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
			'defaultSite' => 'https://dev.vcdevhub.com/newsdemo/frontend/web',
			'defaultAdmin' => 'https://dev.vcdevhub.com/newsdemo/backend/web',
			'uploadsUrl' => 'https://dev.vcdevhub.com/newsdemo/uploads'
		]
	]
];
