<?php
/**
 * This file is part of CMSGears Framework. Please view License file distributed
 * with the source code for license details.
 *
 * @link https://www.cmsgears.org/
 * @copyright Copyright (c) 2015 VulpineCode Technologies Pvt. Ltd.
 */

// CMG Imports
use cmsgears\core\common\config\CoreGlobal;
use cmsgears\cms\common\config\CmsGlobal;

use cmsgears\core\common\models\entities\Site;
use cmsgears\core\common\models\entities\Template;
use cmsgears\core\common\models\entities\User;
use cmsgears\cms\common\models\entities\Block;
use cmsgears\cms\common\models\entities\Sidebar;
use cmsgears\cms\common\models\entities\Widget;

use cmsgears\core\common\utilities\DateUtil;

class m181019_046641_objects extends \cmsgears\core\common\base\Migration {

	// Public Variables

	// Private Variables

	private $cmgPrefix;
	private $sitePrefix;

	private $site;

	private $master;

	public function init() {

		// Table prefix
		$this->cmgPrefix	= Yii::$app->migration->cmgPrefix;
		$this->sitePrefix	= Yii::$app->migration->sitePrefix;

		$this->site		= Site::findBySlug( CoreGlobal::SITE_MAIN );
		$this->master	= User::findByUsername( Yii::$app->migration->getSiteMaster() );

		Yii::$app->core->setSite( $this->site );
	}

	public function up() {

		$this->insertFiles();

		$this->insertMenus();

		$this->insertElements();
		$this->insertWidgets();
		$this->insertBlocks();
		$this->insertSidebars();

		$this->insertMappings();

		$this->updateWidgetTemplates();
		$this->updateWidgets();
		$this->updateBlocks();
	}

	private function insertFiles() {

		$site	= $this->site;
		$master	= $this->master;

		$columns = [ 'id', 'siteId', 'createdBy', 'modifiedBy', 'name', 'title', 'description', 'extension', 'directory', 'size', 'visibility', 'type', 'storage', 'url', 'medium', 'thumb', 'altText', 'link', 'shared', 'createdAt', 'modifiedAt', 'content', 'data', 'gridCache', 'gridCacheValid', 'gridCachedAt' ];

		$files = [
			//[104001, $site->id, $master->id, $master->id, '52kX-CFrTeK4svunJboqrtzQuOkTqQgO','logo-mail','','png','avatar',0.0107,1500,'image',NULL,'2018-11-01/avatar/52kX-CFrTeK4svunJboqrtzQuOkTqQgO.png','2018-11-01/avatar/52kX-CFrTeK4svunJboqrtzQuOkTqQgO-medium.png','2018-11-01/avatar/52kX-CFrTeK4svunJboqrtzQuOkTqQgO-thumb.png','','',0,DateUtil::getDateTime(), DateUtil::getDateTime(),NULL,NULL,NULL,0,NULL]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_file', $columns, $files );
	}

	private function insertMenus() {

		$site	= $this->site;
		$master	= $this->master;

		$columns = [ 'id', 'siteId', 'themeId', 'templateId', 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'texture', 'title', 'description', 'status', 'visibility', 'order', 'pinned', 'featured', 'createdAt', 'modifiedAt', 'htmlOptions', 'summary', 'content', 'data', 'gridCache', 'gridCacheValid', 'gridCachedAt' ];

		$menus = [
			//[ 8001, $site->id, NULL, NULL, $master->id, $master->id, 'About', 'about', 'menu', 'icon', 'texture', NULL, 'The About Us menu displayed on main header.', 16000, 1500, 0, 0, 0, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, NULL, NULL, 0, NULL ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_object', $columns, $menus );
	}

	private function insertElements() {

		$site	= $this->site;
		$master	= $this->master;

		// Templates
		$cardElement	= Template::findGlobalBySlugType( 'card', CmsGlobal::TYPE_ELEMENT );
		$boxElement		= Template::findGlobalBySlugType( 'box', CmsGlobal::TYPE_ELEMENT );

		$columns = [ 'id', 'siteId', 'themeId', 'templateId', 'avatarId', 'bannerId', 'videoId', 'galleryId', 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'texture', 'title', 'description', 'classPath', 'link', 'status', 'visibility', 'order', 'pinned', 'featured', 'createdAt', 'modifiedAt', 'htmlOptions', 'summary', 'content', 'data', 'gridCache', 'gridCacheValid', 'gridCachedAt' ];

		$elements = [
			//[ 10001, $site->id, NULL, NULL, NULL, NULL, NULL, NULL, $master->id, $master->id, 'Contact', 'contact', 'element', 'icon', 'texture', NULL, NULL, NULL, NULL, 16000, 1500, 0, 0, 0, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "card card-basic card-address" }', NULL, NULL, NULL, NULL, 0, NULL ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_object', $columns, $elements );

		$columns = [ 'id', 'modelId', 'name', 'label', 'type', 'active', 'order', 'valueType', 'value', 'data' ];

		$metas = [
			//[100001,10001,'facebook','Facebook','',1,0,'text','https://www.facebook.com/',NULL]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_object_meta', $columns, $metas );
	}

	private function insertWidgets() {

		$site	= $this->site;
		$master	= $this->master;

		// Templates
		$defaultWidget	= Template::findGlobalBySlugType( CoreGlobal::TEMPLATE_DEFAULT, CmsGlobal::TYPE_WIDGET );

		$columns = [ 'id', 'siteId', 'themeId', 'templateId', 'avatarId', 'bannerId', 'videoId', 'galleryId', 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'texture', 'title', 'description', 'classPath', 'link', 'status', 'visibility', 'order', 'pinned', 'featured', 'createdAt', 'modifiedAt', 'htmlOptions', 'summary', 'content', 'data', 'gridCache', 'gridCacheValid', 'gridCachedAt' ];

		$widgets = [
			//[10101,NULL,NULL,$defaultWidget->id,NULL,NULL,NULL,NULL,$master->id,$master->id,'Google Small 1','google-small-1','widget','icon','texture','Small Google Ad',NULL,NULL,NULL,19000,1500,0,0,0,DateUtil::getDateTime(), DateUtil::getDateTime(),NULL,NULL,NULL,NULL,0,NULL]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_object', $columns, $widgets );
	}

	private function insertBlocks() {

		$site	= $this->site;
		$master	= $this->master;

		// Templates
		$defaultBlock	= Template::findGlobalBySlugType( 'default', CmsGlobal::TYPE_BLOCK );
		$fxsBlock		= Template::findGlobalBySlugType( 'foxslider', CmsGlobal::TYPE_BLOCK );

		$columns = [ 'id', 'siteId', 'themeId', 'templateId', 'avatarId', 'bannerId', 'videoId', 'galleryId', 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'texture', 'title', 'description', 'classPath', 'link', 'status', 'visibility', 'order', 'pinned', 'featured', 'createdAt', 'modifiedAt', 'htmlOptions', 'summary', 'content', 'data', 'gridCache', 'gridCacheValid', 'gridCachedAt' ];

		$blocks = [
			//[10201,$site->id,NULL,$fxsBlock->id,NULL,NULL,NULL,NULL,$master->id,$master->id,'Main Slider','main-slider','block','icon','texture', NULL, NULL, NULL, NULL,16000,1500,0,0,0,DateUtil::getDateTime(), DateUtil::getDateTime(),'{ "id": "slider-main", "class": "block block-foxslider cmt-block", "cmt-block": "block-auto" }', NULL, NULL, '{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","fixedBkg":"0","scrollBkg":"0","parallaxBkg":"0","bkgClass":"","texture":"0","maxCover":"0","header":"0","headerIcon":"0","headerTitle":"0","headerInfo":"0","headerContent":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","boxWrapClass":"","boxWrapper":"","boxClass":"","footer":"0","footerIcon":"0","footerIconClass":null,"footerIconUrl":"","footerTitle":"0","footerTitleData":"","footerInfo":"0","footerInfoData":"","footerContent":"0","footerContentData":"","metas":"0","metaType":"","elements":"0","elementType":"","widgets":null,"widgetType":null}}',NULL,0,NULL]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_object', $columns, $blocks );
	}

	private function insertSidebars() {

		$site	= $this->site;
		$master	= $this->master;

		// Templates
		$defaultSidebar	= Template::findGlobalBySlugType( 'default', CmsGlobal::TYPE_SIDEBAR );
		$vertSidebar	= Template::findGlobalBySlugType( 'vsidebar', CmsGlobal::TYPE_SIDEBAR );
		$horizSidebar	= Template::findGlobalBySlugType( 'hsidebar', CmsGlobal::TYPE_SIDEBAR );

		$columns = [ 'id', 'siteId', 'themeId', 'templateId', 'avatarId', 'bannerId', 'videoId', 'galleryId', 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'texture', 'title', 'description', 'classPath', 'link', 'status', 'visibility', 'order', 'pinned', 'featured', 'createdAt', 'modifiedAt', 'htmlOptions', 'summary', 'content', 'data', 'gridCache', 'gridCacheValid', 'gridCachedAt' ];

		$sidebars = [
			//[10301,1,NULL,$vertSidebar->id,NULL,NULL,NULL,NULL,1,1,'Landing Right','landing-right','sidebar','icon','texture','Landing Right Sidebar','Right sidebar displayed on landing page.',NULL,NULL,16000,1500,0,0,0,DateUtil::getDateTime(), DateUtil::getDateTime(),NULL,NULL,NULL,NULL,NULL,0,NULL]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_object', $columns, $sidebars );
	}

	private function insertMappings() {

		$mainSidebar	= Sidebar::findBySlugType( 'main-right', CmsGlobal::TYPE_SIDEBAR );
		$pgrSidebar		= Sidebar::findBySlugType( 'page-right', CmsGlobal::TYPE_SIDEBAR );
		$psrSidebar		= Sidebar::findBySlugType( 'post-right', CmsGlobal::TYPE_SIDEBAR );
		$frmrSidebar	= Sidebar::findBySlugType( 'form-right', CmsGlobal::TYPE_SIDEBAR );

		$popsPosts	= Widget::findBySlugType( 'popular-site-posts', CmsGlobal::TYPE_WIDGET );
		$recsPosts	= Widget::findBySlugType( 'recent-site-posts', CmsGlobal::TYPE_WIDGET );

		$columns = [ 'id', 'modelId', 'parentId', 'parentType', 'type', 'order', 'active', 'pinned', 'featured', 'nodes' ];

		$mappings = [
			//[ 100001, $popsPosts->id, $mainSidebar->id, 'sidebar', 'widget', 0, 1, 0, 0, NULL ],
			//[ 100051, $recsPosts->id, $pgrSidebar->id, 'sidebar', 'widget', 0, 1, 0, 0, NULL ],
			//[ 100101, $recsPosts->id, $psrSidebar->id, 'sidebar', 'widget', 0, 1, 0, 0, NULL ],
			//[ 100151, $recsPosts->id, $frmrSidebar->id, 'sidebar', 'widget', 0, 1, 0, 0, NULL ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_model_object', $columns, $mappings );
	}

	private function updateWidgetTemplates() {

		//$this->update( $this->cmgPrefix . 'core_template', [ 'viewPath' => '@themeTemplates/widget/model', 'view' => 'card' ], "slug IN ('page-card', 'post-card', 'article-card')" );
		//$this->update( $this->cmgPrefix . 'core_template', [ 'viewPath' => '@themeTemplates/widget/model', 'view' => 'box' ], "slug IN ('page-box', 'post-box', 'article-box')" );
		//$this->update( $this->cmgPrefix . 'core_template', [ 'viewPath' => '@themeTemplates/widget/model', 'view' => 'box' ], "slug IN ('page-search', 'post-search', 'article-search')" );
		//$this->update( $this->cmgPrefix . 'core_template', [ 'viewPath' => '@themeTemplates/widget/model', 'view' => 'box' ], "slug IN ('post-home')" );
		//$this->update( $this->cmgPrefix . 'core_template', [ 'viewPath' => '@themeTemplates/widget/model', 'view' => 'page' ], "slug IN ('post-page')" );
	}

	private function updateWidgets() {

		$postPage = Template::findGlobalBySlugType( 'post-page', CmsGlobal::TYPE_WIDGET );

		$settings = [
			//'{"settings":{"defaultAvatar":"0","defaultBanner":"0","bkg":"0","bkgClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerIconUrl":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","contentClass":"","contentDataClass":"","styles":"","metas":"0","metaType":"","metaWrapClass":""},"config":{"route":"","allPath":"all","singlePath":"single","wrapperOptions":"{ \"class\": \"box-home-wrap\" }","singleOptions":"{ \"class\": \"box box-default box-home\" }","excludeParams":"{\"params\": [ \"slug\" ] }","widget":"recent","texture":"","defaultBanner":"0","authorParam":"0","categoryParam":"0","tagParam":"0","wrap":"1","options":"{ \"class\": \"widget-basic widget-box-home widget-box-home-post\" }","wrapSingle":"1","singleWrapper":"div","basePath":"","showAllPath":"0","pagination":"1","paging":"1","nextLabel":"Next","prevLabel":"Previous","limit":"10","ajaxPagination":"0","ajaxPageApp":"pagination","ajaxPageController":"page","ajaxPageAction":"getPage","ajaxUrl":"","textLimit":"250","excludeMain":"0","siteModels":"0","wrapper":"div","loadAssets":"0","templateDir":null,"template":"default","factory":true,"cache":false,"cacheDb":false,"cacheFile":false,"autoload":"0","autoloadTemplate":"autoload","autoloadApp":"autoload","autoloadController":"autoload","autoloadAction":"autoload","autoloadUrl":""}}'
		];

		//$this->update( $this->cmgPrefix . 'core_object', [ 'data' => $settings[ 0 ] ], [ 'slug' => 'home-posts', 'type' => 'widget' ] );
	}

	private function updateBlocks() {

		//$this->update( $this->cmgPrefix . 'core_object', [ 'templateId' => $multisite->id ], [ 'slug' => 'multisite-posts', 'type' => 'block' ] );
	}

	public function down() {

		echo "m181019_046641_objects will be deleted with m160621_014408_core.\n";
	}

}
