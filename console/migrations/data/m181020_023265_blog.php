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
use cmsgears\cms\common\models\entities\Page;
use cmsgears\cms\common\models\entities\Widget;

use cmsgears\core\common\utilities\DateUtil;

class m181020_023265_blog extends \cmsgears\core\common\base\Migration {

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

		$this->insertPages();

		$this->insertTags();
		$this->insertTagMappings();

		$this->insertCategories();
		$this->insertCategoryMappings();

		$this->updateBlogTemplates();

		$this->insertObjectMappings();
	}

	private function insertFiles() {

		$site	= $this->site;
		$master	= $this->master;

		$columns = [ 'id', 'siteId', 'createdBy', 'modifiedBy', 'name', 'title', 'description', 'extension', 'directory', 'size', 'visibility', 'type', 'storage', 'url', 'medium', 'thumb', 'altText', 'link', 'shared', 'createdAt', 'modifiedAt', 'content', 'data', 'gridCache', 'gridCacheValid', 'gridCachedAt' ];

		$files = [
			//[107001, $site->id, $master->id, $master->id, 'taxsaving', 'Tax_Saving','','jpg','banner',0.0579,1500,'image',NULL,'2018-11-10/banner/taxsaving.jpg','2018-11-10/banner/taxsaving-medium.jpg','2018-11-10/banner/taxsaving-thumb.jpg','','',0,'2018-11-11 17:20:10','2018-11-11 17:20:10',NULL,NULL,NULL,0,NULL]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_file', $columns, $files );
	}

	private function insertPages() {

		$site	= $this->site;
		$master	= $this->master;

		// Templates
		$defaultPage	= Template::findGlobalBySlugType( CoreGlobal::TEMPLATE_DEFAULT, CmsGlobal::TYPE_PAGE );
		$defaultPost	= Template::findGlobalBySlugType( CoreGlobal::TEMPLATE_DEFAULT, CmsGlobal::TYPE_POST );

		$settingsPage = '{"settings":{"defaultAvatar":"0","defaultBanner":"1","fixedBanner":"0","scrollBanner":"0","parallaxBanner":"0","background":"0","backgroundClass":"","texture":"1","header":"1","headerIcon":"0","headerTitle":"1","headerInfo":"0","headerContent":"0","headerIconUrl":"","headerBanner":"1","headerGallery":"0","headerScroller":"0","headerElements":"0","headerElementType":"","content":"1","contentTitle":"0","contentInfo":"1","contentSummary":"0","contentData":"1","maxCover":"0","contentSocial":"1","contentLabels":null,"contentAvatar":"0","contentBanner":"0","contentGallery":"0","contentClass":"","contentDataClass":"","styles":"","footer":"0","footerIcon":"0","footerIconClass":null,"footerIconUrl":"","footerTitle":"0","footerTitleData":"","footerInfo":"0","footerInfoData":"","footerContent":"0","footerContentData":"","footerElements":"0","footerElementType":"","metas":"0","metasWithContent":"0","metasOrder":"","metaType":"","metaWrapClass":"","elements":"0","elementsBeforeContent":"0","elementsWithContent":"0","elementsOrder":"","elementType":"","boxWrapClass":"","boxWrapper":"","boxClass":"","widgets":"1","widgetsBeforeContent":"0","widgetsWithContent":"1","widgetsOrder":"","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":"","blocks":"0","blocksBeforeContent":"0","blocksWithContent":"0","blocksOrder":"","blockType":"","sidebars":"0","sidebarsBeforeContent":"0","sidebarsWithContent":"0","sidebarsOrder":"","sidebarType":"","topSidebar":"0","topSidebarSlugs":"","bottomSidebar":"0","bottomSidebarSlugs":"","leftSidebar":"0","leftSidebarSlug":"","rightSidebar":"0","rightSidebarSlug":"","footerSidebar":"0","footerSidebarSlug":null,"comments":"0","disqus":"0"}}';
		$settingsPost = '{"settings":{"defaultAvatar":"0","defaultBanner":"1","fixedBanner":"0","scrollBanner":"0","parallaxBanner":"0","background":"0","backgroundClass":"","texture":"1","header":"1","headerIcon":"0","headerTitle":"1","headerInfo":"0","headerContent":"0","headerIconUrl":"","headerBanner":"1","headerGallery":"0","headerScroller":"0","headerElements":"0","headerElementType":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"1","maxCover":"0","contentSocial":"1","contentLabels":"1","contentAvatar":"0","contentBanner":"0","contentGallery":"0","contentClass":"","contentDataClass":"","styles":"","footer":"0","footerIcon":"0","footerIconClass":null,"footerIconUrl":"","footerTitle":"0","footerTitleData":"","footerInfo":"0","footerInfoData":"","footerContent":"0","footerContentData":"","footerElements":"0","footerElementType":"","metas":"0","metasWithContent":"0","metasOrder":"","metaType":"","metaWrapClass":"","elements":"0","elementsBeforeContent":"0","elementsWithContent":"0","elementsOrder":"","elementType":"","boxWrapClass":"","boxWrapper":"","boxClass":"","widgets":"1","widgetsBeforeContent":"0","widgetsWithContent":"0","widgetsOrder":"","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":"","blocks":"0","blocksBeforeContent":"0","blocksWithContent":"0","blocksOrder":"","blockType":"","sidebars":"1","sidebarsBeforeContent":"0","sidebarsWithContent":"0","sidebarsOrder":"","sidebarType":"","topSidebar":"0","topSidebarSlugs":"","bottomSidebar":"0","bottomSidebarSlugs":"","leftSidebar":"0","leftSidebarSlug":"","rightSidebar":"1","rightSidebarSlug":"post-right","footerSidebar":"0","footerSidebarSlug":null,"comments":"1","disqus":"0"}}';

		$columns = [ 'id', 'siteId', 'avatarId', 'parentId', 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'texture', 'title', 'description', 'status', 'visibility', 'order', 'pinned', 'featured', 'comments', 'createdAt', 'modifiedAt', 'content', 'data', 'gridCache', 'gridCacheValid', 'gridCachedAt' ];

		$pages = [
			// Blog
			//[ 2000, $site->id, null, null, $master->id, $master->id, null, null, CmsGlobal::TYPE_POST, null, null, null, null, Page::STATUS_ACTIVE, Page::VISIBILITY_PUBLIC, 0, false, false, true, '2017-06-29 00:00:00', '2017-06-29 00:00:00', null, $settingsPost, null, 0, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'cms_page', $columns, $pages );

		$columns = [ 'id', 'templateId', 'bannerId', 'videoId', 'galleryId', 'parentId', 'parentType', 'type', 'summary', 'seoName', 'seoDescription', 'seoKeywords', 'seoRobot', 'publishedAt', 'content', 'data' ];

		$pagesContent = [
			// Blog
			//[ 2000, $defaultPost->id, null, null, null, 2000, CmsGlobal::TYPE_POST, null, null, null, null, null, 'index,follow', '2017-06-01 00:00:00', null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'cms_model_content', $columns, $pagesContent );
	}

	private function insertTags() {

		$site	= $this->site;
		$master	= $this->master;

		$settings = '{"settings":{"defaultAvatar":"0","defaultBanner":"1","fixedBanner":"0","scrollBanner":"0","parallaxBanner":"0","background":"0","backgroundClass":"","texture":"0","header":"1","headerIcon":"0","headerTitle":"1","headerInfo":"0","headerContent":"0","headerIconUrl":"","headerBanner":"1","headerGallery":"0","headerScroller":"0","headerElements":"0","headerElementType":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","maxCover":"0","contentSocial":"0","contentLabels":null,"contentAvatar":"0","contentBanner":"0","contentGallery":"0","contentClass":"","contentDataClass":"","styles":"","footer":"0","footerIcon":"0","footerIconClass":null,"footerIconUrl":"","footerTitle":"0","footerTitleData":"","footerInfo":"0","footerInfoData":"","footerContent":"0","footerContentData":"","footerElements":"0","footerElementType":"","metas":"0","metasWithContent":"0","metasOrder":"","metaType":"","metaWrapClass":"","elements":"0","elementsBeforeContent":"0","elementsWithContent":"0","elementsOrder":"","elementType":"","boxWrapClass":"","boxWrapper":"","boxClass":"","widgets":"1","widgetsBeforeContent":"0","widgetsWithContent":"1","widgetsOrder":"","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":"","blocks":"0","blocksBeforeContent":"0","blocksWithContent":"0","blocksOrder":"","blockType":"","sidebars":"0","sidebarsBeforeContent":"0","sidebarsWithContent":"0","sidebarsOrder":"","sidebarType":"","topSidebar":"0","topSidebarSlugs":"","bottomSidebar":"0","bottomSidebarSlugs":"","leftSidebar":"0","leftSidebarSlug":"","rightSidebar":"0","rightSidebarSlug":"","footerSidebar":"0","footerSidebarSlug":null,"comments":"0","disqus":"0"}}';

		$columns = [ 'id', 'siteId', 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'texture', 'title', 'description', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$models	= [
			//[ 10001, $site->id, $master->id, $master->id, 'Ashada', 'ashada', 'blog', 'icon', '', NULL, NULL, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, $settings ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_tag', $columns, $models );

		$defaultPost = Template::findGlobalBySlugType( CoreGlobal::TEMPLATE_DEFAULT, CmsGlobal::TYPE_POST );

		$columns = [ 'id', 'templateId', 'bannerId', 'videoId', 'galleryId', 'parentId', 'parentType', 'type', 'summary', 'seoName', 'seoDescription', 'seoKeywords', 'seoRobot', 'publishedAt', 'content', 'data' ];

		$mContent = [
			//[ 5001, $defaultPost->id, NULL, NULL, NULL, 10001, 'tag', NULL, NULL, NULL, NULL, NULL, NULL, DateUtil::getDateTime(), '', NULL ]
		];

		$this->batchInsert( $this->cmgPrefix . 'cms_model_content', $columns, $mContent );
	}

	private function insertTagMappings() {

		$columns = [ 'id', 'modelId', 'parentId', 'parentType', 'type', 'order', 'active' ];

		$mappings = [
			//[ 10001, 10001, 2002, CmsGlobal::TYPE_POST, NULL, 0, 1 ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_model_tag', $columns, $mappings );
	}

	private function insertCategories() {

		$site	= $this->site;
		$master	= $this->master;

		$settings = '{"settings":{"defaultAvatar":"0","defaultBanner":"1","fixedBanner":"0","scrollBanner":"0","parallaxBanner":"0","background":"0","backgroundClass":"","texture":"0","header":"1","headerIcon":"0","headerTitle":"1","headerInfo":"0","headerContent":"0","headerIconUrl":"","headerBanner":"1","headerGallery":"0","headerScroller":"0","headerElements":"0","headerElementType":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","maxCover":"0","contentSocial":"0","contentLabels":null,"contentAvatar":"0","contentBanner":"0","contentGallery":"0","contentClass":"","contentDataClass":"","styles":"","footer":"0","footerIcon":"0","footerIconClass":null,"footerIconUrl":"","footerTitle":"0","footerTitleData":"","footerInfo":"0","footerInfoData":"","footerContent":"0","footerContentData":"","footerElements":"0","footerElementType":"","metas":"0","metasWithContent":"0","metasOrder":"","metaType":"","metaWrapClass":"","elements":"0","elementsBeforeContent":"0","elementsWithContent":"0","elementsOrder":"","elementType":"","boxWrapClass":"","boxWrapper":"","boxClass":"","widgets":"1","widgetsBeforeContent":"0","widgetsWithContent":"1","widgetsOrder":"","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":"","blocks":"0","blocksBeforeContent":"0","blocksWithContent":"0","blocksOrder":"","blockType":"","sidebars":"0","sidebarsBeforeContent":"0","sidebarsWithContent":"0","sidebarsOrder":"","sidebarType":"","topSidebar":"0","topSidebarSlugs":"","bottomSidebar":"0","bottomSidebarSlugs":"","leftSidebar":"0","leftSidebarSlug":"","rightSidebar":"0","rightSidebarSlug":"","footerSidebar":"0","footerSidebarSlug":null,"comments":"0","disqus":"0"}}';

		$columns = [ 'id', 'siteId', 'parentId', 'rootId', 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'title', 'description', 'lValue', 'rValue', 'order', 'pinned', 'featured', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$models	= [
			//[10501,$site->id,NULL,10501,$master->id, $master->id,'Industry','industry','blog','icon','','',1,8,NULL,0,0,DateUtil::getDateTime(), DateUtil::getDateTime(),'', NULL, $settings ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_category', $columns, $models );

		$defaultPost = Template::findGlobalBySlugType( CoreGlobal::TEMPLATE_DEFAULT, CmsGlobal::TYPE_POST );

		$columns = [ 'id', 'templateId', 'bannerId', 'videoId', 'galleryId', 'parentId', 'parentType', 'type', 'summary', 'seoName', 'seoDescription', 'seoKeywords', 'seoRobot', 'publishedAt', 'content', 'data' ];

		$mContent = [
			//[ 6001, $defaultPost->id, NULL, NULL, NULL, 10501, 'category', NULL, NULL, NULL, NULL, NULL, NULL, DateUtil::getDateTime(), '', NULL ]
		];

		$this->batchInsert( $this->cmgPrefix . 'cms_model_content', $columns, $mContent );
	}

	private function insertCategoryMappings() {

		$columns = [ 'id', 'modelId', 'parentId', 'parentType', 'type', 'order', 'active', 'nodes' ];

		$mappings = [
			//[ 10001, 10504, 2002, CmsGlobal::TYPE_POST, NULL, 0, 1, NULL ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_model_category', $columns, $mappings );
	}

	private function updateBlogTemplates() {

		//$author = CmsGlobal::TEMPLATE_AUTHOR;

		//$this->update( $this->cmgPrefix . 'core_template', [ 'viewPath' => '@themeTemplates/post/author' ], "slug='$author' AND type='blog'" );
	}

	private function insertObjectMappings() {

		// Widgets
		$simPosts	= Widget::findBySlugType( 'similar-posts', CmsGlobal::TYPE_WIDGET );
		$catPosts	= Widget::findBySlugType( 'category-posts', CmsGlobal::TYPE_WIDGET );
		$tagPosts	= Widget::findBySlugType( 'tag-posts', CmsGlobal::TYPE_WIDGET );

		$columns = [ 'id', 'modelId', 'parentId', 'parentType', 'type', 'order', 'active', 'pinned', 'featured', 'nodes' ];

		$mappings = [
			//[ 160001, $simPosts->id, 2002, 'blog', 'widget', 0, 1, 0, 0, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_model_object', $columns, $mappings );
	}

	public function down() {

		echo "m181020_023265_blog will be deleted with m160621_014408_core.\n";
	}

}
