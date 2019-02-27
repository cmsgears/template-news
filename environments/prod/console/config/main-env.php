<?php

return [
	'components' => [
		'urlManager' => [
			'class' => 'yii\web\UrlManager',
			'baseUrl' => 'https://demo.cmsgears.com/template/news'
		],
		// CMG Modules - Core
		'migration' => [
			'class' => 'cmsgears\core\common\components\Migration',
			'cmgPrefix' => 'cmg_',
			'sitePrefix' => 'news_',
			'siteName' => 'News',
			'siteTitle' => 'News Demo',
			'siteMaster' => 'demomaster',
			'primaryDomain' => 'cmsgears.com',
			'defaultSite' => 'https://demo.cmsgears.com/template/news',
			'defaultAdmin' => 'https://demo.cmsgears.com/template/news/admin',
			'uploadsUrl' => 'https://demo.cmsgears.com/template/news/uploads'
		]
	]
];
