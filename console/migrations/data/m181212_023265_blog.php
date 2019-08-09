<?php
// CMG Imports
use cmsgears\cms\common\config\CmsGlobal;

use cmsgears\core\common\models\entities\Site;
use cmsgears\core\common\models\entities\Template;
use cmsgears\core\common\models\entities\User;

use cmsgears\core\common\utilities\DateUtil;

// News Imports
use modules\core\common\config\CoreGlobal;

class m181212_023265_blog extends \cmsgears\core\common\base\Migration {

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

		$columns = [ 'id', 'siteId', 'createdBy', 'modifiedBy', 'name', 'tag', 'title', 'description', 'extension', 'directory', 'size', 'visibility', 'type', 'storage', 'url', 'medium', 'small', 'thumb', 'placeholder', 'smallPlaceholder', 'caption', 'altText', 'link', 'shared', 'createdAt', 'modifiedAt', 'content', 'data', 'gridCache', 'gridCacheValid', 'gridCachedAt' ];

		$files = [
			//[ 107001, $site->id, $master->id, $master->id, 'file1', NULL, 'file1', '', 'jpg', 'gallery', 0.0951, 1500, 'image', NULL, '2019-03-26/gallery/file1.jpg', '2019-03-26/gallery/file1-medium.jpg', '2019-03-26/gallery/file1-small.jpg', '2019-03-26/gallery/file1-thumb.jpg', '2019-03-26/gallery/file1-pl.jpg', '2019-03-26/gallery/file1-small-pl.jpg', NULL, NULL, NULL, 0, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL, 0, NULL ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_file', $columns, $files );
	}

	private function insertPages() {

		$site	= $this->site;
		$master	= $this->master;

		// Templates
		$defaultTemplate = Template::findGlobalBySlugType( CoreGlobal::TEMPLATE_DEFAULT, CmsGlobal::TYPE_POST );

		$columns = [ 'id', 'siteId', 'avatarId', 'parentId', 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'texture', 'title', 'description', 'status', 'visibility', 'order', 'pinned', 'featured', 'comments', 'createdAt', 'modifiedAt', 'content', 'data', 'gridCache', 'gridCacheValid', 'gridCachedAt' ];

		$pages = [
			// Blog
			//[ 2001, $site->id, null, null, $master->id, $master->id, 'Post', 'post', CmsGlobal::TYPE_POST, null, null, null, null, Page::STATUS_ACTIVE, Page::VISIBILITY_PUBLIC, 0, false, false, 0, '2017-06-29 00:00:00', '2017-06-29 00:00:00', null, null, null, 0, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'cms_page', $columns, $pages );

		$columns = [ 'id', 'templateId', 'bannerId', 'videoId', 'galleryId', 'parentId', 'parentType', 'type', 'summary', 'seoName', 'seoDescription', 'seoKeywords', 'seoRobot', 'publishedAt', 'content', 'data' ];

		$pageContent = [
			// Blog
			//[ 2001, $defaultTemplate->id, null, null, null, 2001, CmsGlobal::TYPE_POST, null, null, null, null, null, 'index,follow', DateUtil::getDateTime(), null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'cms_model_content', $columns, $pageContent );
	}

	private function insertTags() {

		$site	= $this->site;
		$master	= $this->master;

		$settings = '{"settings":{"defaultAvatar":"0","defaultBanner":"1","fixedBanner":"0","scrollBanner":"0","parallaxBanner":"0","background":"0","backgroundClass":"","texture":"0","header":"1","headerIcon":"0","headerTitle":"1","headerInfo":"0","headerContent":"0","headerIconUrl":"","headerBanner":"1","headerGallery":"0","headerScroller":"0","headerElements":"0","headerElementType":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","maxCover":"0","contentSocial":"0","contentLabels":null,"contentAvatar":"0","contentBanner":"0","contentGallery":"0","contentClass":"","contentDataClass":"","styles":"","footer":"0","footerIcon":"0","footerIconClass":null,"footerIconUrl":"","footerTitle":"0","footerTitleData":"","footerInfo":"0","footerInfoData":"","footerContent":"0","footerContentData":"","footerElements":"0","footerElementType":"","metas":"0","metasWithContent":"0","metasOrder":"","metaType":"","metaWrapClass":"","elements":"0","elementsBeforeContent":"0","elementsWithContent":"0","elementsOrder":"","elementType":"","boxWrapClass":"","boxWrapper":"","boxClass":"","widgets":"1","widgetsBeforeContent":"0","widgetsWithContent":"1","widgetsOrder":"","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":"","blocks":"0","blocksBeforeContent":"0","blocksWithContent":"0","blocksOrder":"","blockType":"","sidebars":"0","sidebarsBeforeContent":"0","sidebarsWithContent":"0","sidebarsOrder":"","sidebarType":"","topSidebar":"0","topSidebarSlugs":"","bottomSidebar":"0","bottomSidebarSlugs":"","leftSidebar":"0","leftSidebarSlug":"","rightSidebar":"0","rightSidebarSlug":"","footerSidebar":"0","footerSidebarSlug":null,"comments":"0","disqus":"0"}}';

		$columns = [ 'id', 'siteId', 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'texture', 'title', 'description', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$models	= [
			//[ 10001, $site->id, $master->id, $master->id, 'Tag 1', 'tag-1', CmsGlobal::TYPE_POST, 'icon', '', NULL, NULL, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, $settings ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_tag', $columns, $models );

		$defaultPost = Template::findGlobalBySlugType( CoreGlobal::TEMPLATE_DEFAULT, CmsGlobal::TYPE_POST );

		$columns = [ 'id', 'templateId', 'bannerId', 'videoId', 'galleryId', 'parentId', 'parentType', 'type', 'summary', 'seoName', 'seoDescription', 'seoKeywords', 'seoRobot', 'publishedAt', 'content', 'data' ];

		$pagesContent = [
			//[ 13001, $defaultPost->id, NULL, NULL, NULL, 10001, CoreGlobal::TYPE_TAG, NULL, NULL, NULL, NULL, NULL, NULL, DateUtil::getDateTime(), '', NULL ]
		];

		$this->batchInsert( $this->cmgPrefix . 'cms_model_content', $columns, $pagesContent );
	}

	private function insertTagMappings() {

		$columns = [ 'id', 'modelId', 'parentId', 'parentType', 'type', 'order', 'active' ];

		$mappings = [
			//[ 10001, 10001, 12001, CmsGlobal::TYPE_POST, NULL, 0, 1 ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_model_tag', $columns, $mappings );
	}

	private function insertCategories() {

		$site	= $this->site;
		$master	= $this->master;

		$settings = '{"settings":{"defaultAvatar":"0","defaultBanner":"0","fixedBanner":"0","scrollBanner":"0","parallaxBanner":"0","background":"0","backgroundClass":"","texture":"0","header":"1","headerIcon":"0","headerTitle":"1","headerInfo":"0","headerContent":"0","headerIconUrl":"","headerBanner":"1","headerGallery":"1","headerScroller":"0","headerElements":"0","headerElementType":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","maxCover":"0","contentSocial":"0","contentLabels":null,"contentAvatar":"0","contentBanner":"0","contentGallery":"0","contentClass":"","contentDataClass":"","styles":"","scripts":"","footer":"0","footerIcon":"0","footerIconClass":null,"footerIconUrl":"","footerTitle":"0","footerTitleData":"","footerInfo":"0","footerInfoData":"","footerContent":"0","footerContentData":"","footerElements":"0","footerElementType":"","metas":"0","metasWithContent":"0","metasOrder":"","metaType":"","metaWrapClass":"","elements":"0","elementsBeforeContent":"0","elementsWithContent":"0","elementsOrder":"","elementType":"","boxWrapClass":"","boxWrapper":"","boxClass":"","widgets":"1","widgetsBeforeContent":"0","widgetsWithContent":"1","widgetsOrder":"","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":"","blocks":"0","blocksBeforeContent":"0","blocksWithContent":"0","blocksOrder":"","blockType":"","sidebars":"1","sidebarsBeforeContent":"0","sidebarsWithContent":"0","sidebarsOrder":"","sidebarType":"","topSidebar":"0","topSidebarSlugs":"","bottomSidebar":"0","bottomSidebarSlugs":"","leftSidebar":"0","leftSidebarSlug":"","rightSidebar":"1","rightSidebarSlug":"category-right","footerSidebar":"0","footerSidebarSlug":null,"comments":"0","disqus":"0"}}';

		$columns = [ 'id', 'siteId', 'parentId', 'rootId', 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'title', 'description', 'lValue', 'rValue', 'order', 'pinned', 'featured', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$models	= [
			//[ 10501, $site->id, NULL, 10501, $master->id, $master->id, 'Test', 'test', CmsGlobal::TYPE_POST, 'icon', '', '', 1, 2, NULL, 0, 0, DateUtil::getDateTime(), DateUtil::getDateTime(), '', NULL, $settings ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_category', $columns, $models );

		$defaultPost = Template::findGlobalBySlugType( CoreGlobal::TEMPLATE_DEFAULT, CmsGlobal::TYPE_POST );

		$columns = [ 'id', 'templateId', 'bannerId', 'videoId', 'galleryId', 'parentId', 'parentType', 'type', 'summary', 'seoName', 'seoDescription', 'seoKeywords', 'seoRobot', 'publishedAt', 'content', 'data' ];

		$pagesContent = [
			//[ 14001, $defaultPost->id, NULL, NULL, NULL, 10501, CoreGlobal::TYPE_CATEGORY, NULL, NULL, NULL, NULL, NULL, NULL, DateUtil::getDateTime(), '', NULL ]
		];

		$this->batchInsert( $this->cmgPrefix . 'cms_model_content', $columns, $pagesContent );
	}

	private function insertCategoryMappings() {

		$columns = [ 'id', 'modelId', 'parentId', 'parentType', 'type', 'order', 'active', 'nodes' ];

		$mappings = [
			//[ 10001, 10501, 12011, CmsGlobal::TYPE_POST, NULL, 0, 1, NULL ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_model_category', $columns, $mappings );
	}

	private function updateBlogTemplates() {

		$cardPosts		= Template::findGlobalBySlugType( 'post-card', CmsGlobal::TYPE_WIDGET );
		$searchPosts	= Template::findGlobalBySlugType( 'post-search', CmsGlobal::TYPE_WIDGET );

		//$this->update( $this->cmgPrefix . 'core_template', [ 'viewPath' => '@themeTemplates/widget/post' ], "id=$cardPosts->id" );
		//$this->update( $this->cmgPrefix . 'core_template', [ 'viewPath' => '@themeTemplates/widget/post' ], "id=$searchPosts->id" );
	}

	private function insertObjectMappings() {

		// Sidebars
		//$postRightSidebar = Sidebar::findBySlugType( 'post-right', CmsGlobal::TYPE_SIDEBAR );

		// Widgets
		//$recPosts = Widget::findBySlugType( 'recent-site-posts', CmsGlobal::TYPE_WIDGET );

		//$catPosts	= Widget::findBySlugType( 'category-posts', CmsGlobal::TYPE_WIDGET );
		//$tagPosts	= Widget::findBySlugType( 'tag-posts', CmsGlobal::TYPE_WIDGET );
		//$simPosts	= Widget::findBySlugType( 'similar-posts', CmsGlobal::TYPE_WIDGET );

		$columns = [ 'id', 'modelId', 'parentId', 'parentType', 'type', 'order', 'active', 'pinned', 'featured', 'nodes' ];

		$mappings = [
			//[ 150001, $recPosts->id, $postRightSidebar->id, 'sidebar', 'widget', 0, 1, 0, 0, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_model_object', $columns, $mappings );
	}

	public function down() {

		echo "m181212_023265_blog will be deleted with m160621_014408_core.\n";
	}

}
