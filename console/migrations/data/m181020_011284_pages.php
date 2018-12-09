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
use cmsgears\cms\common\models\entities\Block;

use cmsgears\core\common\utilities\DateUtil;

class m181020_011284_pages extends \cmsgears\core\common\base\Migration {

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

		$this->updatePages();
		$this->updatePageContent();

		$this->insertPages();
		$this->insertPageMetas();

		$this->insertObjectMappings();
	}

	private function insertFiles() {

		$site	= $this->site;
		$master	= $this->master;

		$columns = [ 'id', 'siteId', 'createdBy', 'modifiedBy', 'name', 'tag', 'title', 'description', 'extension', 'directory', 'size', 'visibility', 'type', 'storage', 'url', 'medium', 'thumb', 'caption', 'altText', 'link', 'shared', 'createdAt', 'modifiedAt', 'content', 'data', 'gridCache', 'gridCacheValid', 'gridCachedAt' ];

		$files = [
			//[106001, $site->id, $master->id, $master->id, 'VXCk118GGpN06dIFgKGuuoph6e8JaAhR',NULL,'plus','','jpg','banner',0.0107,1500,'image',NULL,'2018-11-01/banner/VXCk118GGpN06dIFgKGuuoph6e8JaAhR.jpg','2018-11-01/banner/VXCk118GGpN06dIFgKGuuoph6e8JaAhR-medium.jpg','2018-11-01/banner/VXCk118GGpN06dIFgKGuuoph6e8JaAhR-thumb.jpg',NULL,'','',0,DateUtil::getDateTime(), DateUtil::getDateTime(),NULL,NULL,NULL,0,NULL]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_file', $columns, $files );
	}

	private function updatePages() {

		$desc = [
			'News Demo.',
			'Login at News Demo.',
			'Login using OTP at News Demo.',
			'Register at News Demo to join us.',
			'Confirm Account to continue with News Demo',
			'Confirm Account using OTP to continue with News Demo',
			'Activate Account',
			'Submit request to change password',
			'Reset Password',
			'Reset Password using OTP',
			'About Us',
			'Terms and Conditions at News Demo',
			'Privacy Policy at News Demo',
			'Submit Feedback to improve the services provided by News Demo',
			'Write us a Testimonial about your experience at News Demo',
			'How can we help you', 'Frequently asked questions',
			'Blog',
			'Browse Pages', 'Browse Articles', 'Browse Blog Posts'
		];

		$setting = [
			'{"settings":{"defaultAvatar":"0","defaultBanner":"0","fixedBanner":"0","scrollBanner":"0","parallaxBanner":"0","background":"0","backgroundClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerInfo":"0","headerContent":"0","headerIconUrl":"","headerBanner":"0","headerGallery":"0","headerElements":"0","headerElementType":"","content":"0","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","maxCover":"0","contentSocial":"0","contentLabels":null,"contentAvatar":"0","contentBanner":"0","contentGallery":"0","contentClass":"","contentDataClass":"","styles":"","footer":"0","footerIcon":"0","footerIconClass":null,"footerIconUrl":"","footerTitle":"0","footerTitleData":"","footerInfo":"0","footerInfoData":"","footerContent":"0","footerContentData":"","footerElements":"0","footerElementType":"","metas":"0","metasWithContent":"0","metasOrder":"","metaType":"","metaWrapClass":"","elements":"0","elementsBeforeContent":"0","elementsWithContent":"0","elementsOrder":"","elementType":"","boxWrapClass":"","boxWrapper":"","boxClass":"","widgets":"0","widgetsBeforeContent":"0","widgetsWithContent":"0","widgetsOrder":"","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":"","blocks":"1","blocksBeforeContent":"0","blocksWithContent":"0","blocksOrder":"","blockType":"","sidebars":"0","sidebarsBeforeContent":"0","sidebarsWithContent":"0","sidebarsOrder":"","sidebarType":"","topSidebar":"0","topSidebarSlugs":"","bottomSidebar":"0","bottomSidebarSlugs":"","leftSidebar":"0","leftSidebarSlug":"","rightSidebar":"0","rightSidebarSlug":"","footerSidebar":"0","footerSidebarSlug":null,"comments":"0","disqus":"0"}}',
			'{"settings":{"defaultAvatar":"0","defaultBanner":"0","fixedBanner":"0","scrollBanner":"0","parallaxBanner":"0","background":"0","backgroundClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerInfo":"0","headerContent":"0","headerIconUrl":"","headerBanner":"0","headerGallery":"0","headerElements":"0","headerElementType":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","maxCover":"0","contentSocial":"0","contentLabels":null,"contentAvatar":"0","contentBanner":"0","contentGallery":"0","contentClass":"","contentDataClass":"","styles":"","footer":"0","footerIcon":"0","footerIconClass":null,"footerIconUrl":"","footerTitle":"0","footerTitleData":"","footerInfo":"0","footerInfoData":"","footerContent":"0","footerContentData":"","footerElements":"0","footerElementType":"","metas":"0","metasWithContent":"0","metasOrder":"","metaType":"","metaWrapClass":"","elements":"0","elementsBeforeContent":"0","elementsWithContent":"0","elementsOrder":"","elementType":"","boxWrapClass":"","boxWrapper":"","boxClass":"","widgets":"0","widgetsBeforeContent":"0","widgetsWithContent":"0","widgetsOrder":"","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":"","blocks":"0","blocksBeforeContent":"0","blocksWithContent":"0","blocksOrder":"","blockType":"","sidebars":"0","sidebarsBeforeContent":"0","sidebarsWithContent":"0","sidebarsOrder":"","sidebarType":"","topSidebar":"0","topSidebarSlugs":"","bottomSidebar":"0","bottomSidebarSlugs":"","leftSidebar":"0","leftSidebarSlug":"","rightSidebar":"0","rightSidebarSlug":"","footerSidebar":"0","footerSidebarSlug":null}}',
			'{"settings":{"defaultAvatar":"0","defaultBanner":"0","fixedBanner":"0","scrollBanner":"0","parallaxBanner":"0","background":"0","backgroundClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerInfo":"0","headerContent":"0","headerIconUrl":"","headerBanner":"0","headerGallery":"0","headerElements":"0","headerElementType":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","maxCover":"0","contentSocial":"0","contentLabels":null,"contentAvatar":"0","contentBanner":"0","contentGallery":"0","contentClass":"","contentDataClass":"","styles":"","footer":"0","footerIcon":"0","footerIconClass":null,"footerIconUrl":"","footerTitle":"0","footerTitleData":"","footerInfo":"0","footerInfoData":"","footerContent":"0","footerContentData":"","footerElements":"0","footerElementType":"","metas":"0","metasWithContent":"0","metasOrder":"","metaType":"","metaWrapClass":"","elements":"0","elementsBeforeContent":"0","elementsWithContent":"0","elementsOrder":"","elementType":"","boxWrapClass":"","boxWrapper":"","boxClass":"","widgets":"0","widgetsBeforeContent":"0","widgetsWithContent":"0","widgetsOrder":"","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":"","blocks":"0","blocksBeforeContent":"0","blocksWithContent":"0","blocksOrder":"","blockType":"","sidebars":"0","sidebarsBeforeContent":"0","sidebarsWithContent":"0","sidebarsOrder":"","sidebarType":"","topSidebar":"0","topSidebarSlugs":"","bottomSidebar":"0","bottomSidebarSlugs":"","leftSidebar":"0","leftSidebarSlug":"","rightSidebar":"0","rightSidebarSlug":"","footerSidebar":"0","footerSidebarSlug":null}}',
			'{"settings":{"defaultAvatar":"0","defaultBanner":"0","fixedBanner":"0","scrollBanner":"0","parallaxBanner":"0","background":"0","backgroundClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerInfo":"0","headerContent":"0","headerIconUrl":"","headerBanner":"0","headerGallery":"0","headerElements":"0","headerElementType":"","content":"1","contentTitle":"1","contentInfo":"0","contentSummary":"1","contentData":"1","maxCover":"0","contentSocial":"0","contentLabels":null,"contentAvatar":"0","contentBanner":"0","contentGallery":"0","contentClass":"","contentDataClass":"","styles":"","footer":"0","footerIcon":"0","footerIconClass":null,"footerIconUrl":"","footerTitle":"0","footerTitleData":"","footerInfo":"0","footerInfoData":"","footerContent":"0","footerContentData":"","footerElements":"0","footerElementType":"","metas":"0","metasWithContent":"0","metasOrder":"","metaType":"","metaWrapClass":"","elements":"0","elementsBeforeContent":"0","elementsWithContent":"0","elementsOrder":"","elementType":"","boxWrapClass":"","boxWrapper":"","boxClass":"","widgets":"0","widgetsBeforeContent":"0","widgetsWithContent":"0","widgetsOrder":"","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":"","blocks":"0","blocksBeforeContent":"0","blocksWithContent":"0","blocksOrder":"","blockType":"","sidebars":"0","sidebarsBeforeContent":"0","sidebarsWithContent":"0","sidebarsOrder":"","sidebarType":"","topSidebar":"0","topSidebarSlugs":"","bottomSidebar":"0","bottomSidebarSlugs":"","leftSidebar":"0","leftSidebarSlug":"","rightSidebar":"1","rightSidebarSlug":"page-right","footerSidebar":"0","footerSidebarSlug":null}}',
			'{"settings":{"defaultAvatar":"0","defaultBanner":"0","fixedBanner":"0","scrollBanner":"0","parallaxBanner":"0","background":"0","backgroundClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerInfo":"0","headerContent":"0","headerIconUrl":"","headerBanner":"0","headerGallery":"0","headerElements":"0","headerElementType":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","maxCover":"0","contentSocial":"0","contentLabels":null,"contentAvatar":"0","contentBanner":"0","contentGallery":"0","contentClass":"","contentDataClass":"","styles":"","footer":"0","footerIcon":"0","footerIconClass":null,"footerIconUrl":"","footerTitle":"0","footerTitleData":"","footerInfo":"0","footerInfoData":"","footerContent":"0","footerContentData":"","footerElements":"0","footerElementType":"","metas":"0","metasWithContent":"0","metasOrder":"","metaType":"","metaWrapClass":"","elements":"0","elementsBeforeContent":"0","elementsWithContent":"0","elementsOrder":"","elementType":"","boxWrapClass":"","boxWrapper":"","boxClass":"","widgets":"0","widgetsBeforeContent":"0","widgetsWithContent":"0","widgetsOrder":"","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":"","blocks":"0","blocksBeforeContent":"0","blocksWithContent":"0","blocksOrder":"","blockType":"","sidebars":"0","sidebarsBeforeContent":"0","sidebarsWithContent":"0","sidebarsOrder":"","sidebarType":"","topSidebar":"0","topSidebarSlugs":"","bottomSidebar":"0","bottomSidebarSlugs":"","leftSidebar":"0","leftSidebarSlug":"","rightSidebar":"0","rightSidebarSlug":"","footerSidebar":"0","footerSidebarSlug":null}}',
			'{"settings":{"defaultAvatar":"0","defaultBanner":"0","fixedBanner":"0","scrollBanner":"0","parallaxBanner":"0","background":"0","backgroundClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerInfo":"0","headerContent":"0","headerIconUrl":"","headerBanner":"0","headerGallery":"0","headerElements":"0","headerElementType":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","maxCover":"0","contentSocial":"0","contentLabels":null,"contentAvatar":"0","contentBanner":"0","contentGallery":"0","contentClass":"","contentDataClass":"","styles":"","footer":"0","footerIcon":"0","footerIconClass":null,"footerIconUrl":"","footerTitle":"0","footerTitleData":"","footerInfo":"0","footerInfoData":"","footerContent":"0","footerContentData":"","footerElements":"0","footerElementType":"","metas":"0","metasWithContent":"0","metasOrder":"","metaType":"","metaWrapClass":"","elements":"0","elementsBeforeContent":"0","elementsWithContent":"0","elementsOrder":"","elementType":"","boxWrapClass":"","boxWrapper":"","boxClass":"","widgets":"0","widgetsBeforeContent":"0","widgetsWithContent":"0","widgetsOrder":"","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":"","blocks":"0","blocksBeforeContent":"0","blocksWithContent":"0","blocksOrder":"","blockType":"","sidebars":"0","sidebarsBeforeContent":"0","sidebarsWithContent":"0","sidebarsOrder":"","sidebarType":"","topSidebar":"0","topSidebarSlugs":"","bottomSidebar":"0","bottomSidebarSlugs":"","leftSidebar":"0","leftSidebarSlug":"","rightSidebar":"0","rightSidebarSlug":"","footerSidebar":"0","footerSidebarSlug":null}}',
			'{"settings":{"defaultAvatar":"0","defaultBanner":"0","fixedBanner":"0","scrollBanner":"0","parallaxBanner":"0","background":"0","backgroundClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerInfo":"0","headerContent":"0","headerIconUrl":"","headerBanner":"0","headerGallery":"0","headerElements":"0","headerElementType":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","maxCover":"0","contentSocial":"0","contentLabels":null,"contentAvatar":"0","contentBanner":"0","contentGallery":"0","contentClass":"","contentDataClass":"","styles":"","footer":"0","footerIcon":"0","footerIconClass":null,"footerIconUrl":"","footerTitle":"0","footerTitleData":"","footerInfo":"0","footerInfoData":"","footerContent":"0","footerContentData":"","footerElements":"0","footerElementType":"","metas":"0","metasWithContent":"0","metasOrder":"","metaType":"","metaWrapClass":"","elements":"0","elementsBeforeContent":"0","elementsWithContent":"0","elementsOrder":"","elementType":"","boxWrapClass":"","boxWrapper":"","boxClass":"","widgets":"0","widgetsBeforeContent":"0","widgetsWithContent":"0","widgetsOrder":"","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":"","blocks":"0","blocksBeforeContent":"0","blocksWithContent":"0","blocksOrder":"","blockType":"","sidebars":"0","sidebarsBeforeContent":"0","sidebarsWithContent":"0","sidebarsOrder":"","sidebarType":"","topSidebar":"0","topSidebarSlugs":"","bottomSidebar":"0","bottomSidebarSlugs":"","leftSidebar":"0","leftSidebarSlug":"","rightSidebar":"0","rightSidebarSlug":"","footerSidebar":"0","footerSidebarSlug":null}}',
			'{"settings":{"defaultAvatar":"0","defaultBanner":"0","fixedBanner":"0","scrollBanner":"0","parallaxBanner":"0","background":"0","backgroundClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerInfo":"0","headerContent":"0","headerIconUrl":"","headerBanner":"0","headerGallery":"0","headerElements":"0","headerElementType":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","maxCover":"0","contentSocial":"0","contentLabels":null,"contentAvatar":"0","contentBanner":"0","contentGallery":"0","contentClass":"","contentDataClass":"","styles":"","footer":"0","footerIcon":"0","footerIconClass":null,"footerIconUrl":"","footerTitle":"0","footerTitleData":"","footerInfo":"0","footerInfoData":"","footerContent":"0","footerContentData":"","footerElements":"0","footerElementType":"","metas":"0","metasWithContent":"0","metasOrder":"","metaType":"","metaWrapClass":"","elements":"0","elementsBeforeContent":"0","elementsWithContent":"0","elementsOrder":"","elementType":"","boxWrapClass":"","boxWrapper":"","boxClass":"","widgets":"0","widgetsBeforeContent":"0","widgetsWithContent":"0","widgetsOrder":"","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":"","blocks":"0","blocksBeforeContent":"0","blocksWithContent":"0","blocksOrder":"","blockType":"","sidebars":"0","sidebarsBeforeContent":"0","sidebarsWithContent":"0","sidebarsOrder":"","sidebarType":"","topSidebar":"0","topSidebarSlugs":"","bottomSidebar":"0","bottomSidebarSlugs":"","leftSidebar":"0","leftSidebarSlug":"","rightSidebar":"0","rightSidebarSlug":"","footerSidebar":"0","footerSidebarSlug":null}}',
			'{"settings":{"defaultAvatar":"0","defaultBanner":"0","fixedBanner":"0","scrollBanner":"0","parallaxBanner":"0","background":"0","backgroundClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerInfo":"0","headerContent":"0","headerIconUrl":"","headerBanner":"0","headerGallery":"0","headerElements":"0","headerElementType":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","maxCover":"0","contentSocial":"0","contentLabels":null,"contentAvatar":"0","contentBanner":"0","contentGallery":"0","contentClass":"","contentDataClass":"","styles":"","footer":"0","footerIcon":"0","footerIconClass":null,"footerIconUrl":"","footerTitle":"0","footerTitleData":"","footerInfo":"0","footerInfoData":"","footerContent":"0","footerContentData":"","footerElements":"0","footerElementType":"","metas":"0","metasWithContent":"0","metasOrder":"","metaType":"","metaWrapClass":"","elements":"0","elementsBeforeContent":"0","elementsWithContent":"0","elementsOrder":"","elementType":"","boxWrapClass":"","boxWrapper":"","boxClass":"","widgets":"0","widgetsBeforeContent":"0","widgetsWithContent":"0","widgetsOrder":"","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":"","blocks":"0","blocksBeforeContent":"0","blocksWithContent":"0","blocksOrder":"","blockType":"","sidebars":"0","sidebarsBeforeContent":"0","sidebarsWithContent":"0","sidebarsOrder":"","sidebarType":"","topSidebar":"0","topSidebarSlugs":"","bottomSidebar":"0","bottomSidebarSlugs":"","leftSidebar":"0","leftSidebarSlug":"","rightSidebar":"0","rightSidebarSlug":"","footerSidebar":"0","footerSidebarSlug":null}}',
			'{"settings":{"defaultAvatar":"0","defaultBanner":"0","fixedBanner":"0","scrollBanner":"0","parallaxBanner":"0","background":"0","backgroundClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerInfo":"0","headerContent":"0","headerIconUrl":"","headerBanner":"0","headerGallery":"0","headerElements":"0","headerElementType":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","maxCover":"0","contentSocial":"0","contentLabels":null,"contentAvatar":"0","contentBanner":"0","contentGallery":"0","contentClass":"","contentDataClass":"","styles":"","footer":"0","footerIcon":"0","footerIconClass":null,"footerIconUrl":"","footerTitle":"0","footerTitleData":"","footerInfo":"0","footerInfoData":"","footerContent":"0","footerContentData":"","footerElements":"0","footerElementType":"","metas":"0","metasWithContent":"0","metasOrder":"","metaType":"","metaWrapClass":"","elements":"0","elementsBeforeContent":"0","elementsWithContent":"0","elementsOrder":"","elementType":"","boxWrapClass":"","boxWrapper":"","boxClass":"","widgets":"0","widgetsBeforeContent":"0","widgetsWithContent":"0","widgetsOrder":"","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":"","blocks":"0","blocksBeforeContent":"0","blocksWithContent":"0","blocksOrder":"","blockType":"","sidebars":"0","sidebarsBeforeContent":"0","sidebarsWithContent":"0","sidebarsOrder":"","sidebarType":"","topSidebar":"0","topSidebarSlugs":"","bottomSidebar":"0","bottomSidebarSlugs":"","leftSidebar":"0","leftSidebarSlug":"","rightSidebar":"0","rightSidebarSlug":"","footerSidebar":"0","footerSidebarSlug":null}}',
			'{"settings":{"defaultAvatar":"0","defaultBanner":"0","fixedBanner":"0","scrollBanner":"0","parallaxBanner":"0","background":"0","backgroundClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerInfo":"0","headerContent":"0","headerIconUrl":"","headerBanner":"0","headerGallery":"0","headerElements":"0","headerElementType":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","maxCover":"0","contentSocial":"0","contentLabels":null,"contentAvatar":"0","contentBanner":"0","contentGallery":"0","contentClass":"","contentDataClass":"","styles":"","footer":"0","footerIcon":"0","footerIconClass":null,"footerIconUrl":"","footerTitle":"0","footerTitleData":"","footerInfo":"0","footerInfoData":"","footerContent":"0","footerContentData":"","footerElements":"0","footerElementType":"","metas":"0","metasWithContent":"0","metasOrder":"","metaType":"","metaWrapClass":"","elements":"0","elementsBeforeContent":"0","elementsWithContent":"0","elementsOrder":"","elementType":"","boxWrapClass":"","boxWrapper":"","boxClass":"","widgets":"0","widgetsBeforeContent":"0","widgetsWithContent":"0","widgetsOrder":"","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":"","blocks":"0","blocksBeforeContent":"0","blocksWithContent":"0","blocksOrder":"","blockType":"","sidebars":"0","sidebarsBeforeContent":"0","sidebarsWithContent":"0","sidebarsOrder":"","sidebarType":"","topSidebar":"0","topSidebarSlugs":"","bottomSidebar":"0","bottomSidebarSlugs":"","leftSidebar":"0","leftSidebarSlug":"","rightSidebar":"0","rightSidebarSlug":"","footerSidebar":"0","footerSidebarSlug":null}}',
			'{"settings":{"defaultAvatar":"0","defaultBanner":"0","fixedBanner":"0","scrollBanner":"0","parallaxBanner":"0","background":"0","backgroundClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerInfo":"0","headerContent":"0","headerIconUrl":"","headerBanner":"0","headerGallery":"0","headerElements":"0","headerElementType":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","maxCover":"0","contentSocial":"0","contentLabels":null,"contentAvatar":"0","contentBanner":"0","contentGallery":"0","contentClass":"","contentDataClass":"","styles":"","footer":"0","footerIcon":"0","footerIconClass":null,"footerIconUrl":"","footerTitle":"0","footerTitleData":"","footerInfo":"0","footerInfoData":"","footerContent":"0","footerContentData":"","footerElements":"0","footerElementType":"","metas":"0","metasWithContent":"0","metasOrder":"","metaType":"","metaWrapClass":"","elements":"0","elementsBeforeContent":"0","elementsWithContent":"0","elementsOrder":"","elementType":"","boxWrapClass":"","boxWrapper":"","boxClass":"","widgets":"0","widgetsBeforeContent":"0","widgetsWithContent":"0","widgetsOrder":"","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":"","blocks":"0","blocksBeforeContent":"0","blocksWithContent":"0","blocksOrder":"","blockType":"","sidebars":"0","sidebarsBeforeContent":"0","sidebarsWithContent":"0","sidebarsOrder":"","sidebarType":"","topSidebar":"0","topSidebarSlugs":"","bottomSidebar":"0","bottomSidebarSlugs":"","leftSidebar":"0","leftSidebarSlug":"","rightSidebar":"0","rightSidebarSlug":"","footerSidebar":"0","footerSidebarSlug":null}}',
			'{"settings":{"defaultAvatar":"0","defaultBanner":"0","fixedBanner":"0","scrollBanner":"0","parallaxBanner":"0","background":"0","backgroundClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerInfo":"0","headerContent":"0","headerIconUrl":"","headerBanner":"0","headerGallery":"0","headerElements":"0","headerElementType":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","maxCover":"0","contentSocial":"0","contentLabels":null,"contentAvatar":"0","contentBanner":"0","contentGallery":"0","contentClass":"","contentDataClass":"","styles":"","footer":"0","footerIcon":"0","footerIconClass":null,"footerIconUrl":"","footerTitle":"0","footerTitleData":"","footerInfo":"0","footerInfoData":"","footerContent":"0","footerContentData":"","footerElements":"0","footerElementType":"","metas":"0","metasWithContent":"0","metasOrder":"","metaType":"","metaWrapClass":"","elements":"0","elementsBeforeContent":"0","elementsWithContent":"0","elementsOrder":"","elementType":"","boxWrapClass":"","boxWrapper":"","boxClass":"","widgets":"0","widgetsBeforeContent":"0","widgetsWithContent":"0","widgetsOrder":"","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":"","blocks":"0","blocksBeforeContent":"0","blocksWithContent":"0","blocksOrder":"","blockType":"","sidebars":"0","sidebarsBeforeContent":"0","sidebarsWithContent":"0","sidebarsOrder":"","sidebarType":"","topSidebar":"0","topSidebarSlugs":"","bottomSidebar":"0","bottomSidebarSlugs":"","leftSidebar":"0","leftSidebarSlug":"","rightSidebar":"0","rightSidebarSlug":"","footerSidebar":"0","footerSidebarSlug":null}}',
			'{"settings":{"defaultAvatar":"0","defaultBanner":"0","fixedBanner":"0","scrollBanner":"0","parallaxBanner":"0","background":"0","backgroundClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerInfo":"0","headerContent":"0","headerIconUrl":"","headerBanner":"0","headerGallery":"0","headerElements":"0","headerElementType":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","maxCover":"0","contentSocial":"0","contentLabels":null,"contentAvatar":"0","contentBanner":"0","contentGallery":"0","contentClass":"","contentDataClass":"","styles":"","footer":"0","footerIcon":"0","footerIconClass":null,"footerIconUrl":"","footerTitle":"0","footerTitleData":"","footerInfo":"0","footerInfoData":"","footerContent":"0","footerContentData":"","footerElements":"0","footerElementType":"","metas":"0","metasWithContent":"0","metasOrder":"","metaType":"","metaWrapClass":"","elements":"0","elementsBeforeContent":"0","elementsWithContent":"0","elementsOrder":"","elementType":"","boxWrapClass":"","boxWrapper":"","boxClass":"","widgets":"0","widgetsBeforeContent":"0","widgetsWithContent":"0","widgetsOrder":"","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":"","blocks":"0","blocksBeforeContent":"0","blocksWithContent":"0","blocksOrder":"","blockType":"","sidebars":"0","sidebarsBeforeContent":"0","sidebarsWithContent":"0","sidebarsOrder":"","sidebarType":"","topSidebar":"0","topSidebarSlugs":"","bottomSidebar":"0","bottomSidebarSlugs":"","leftSidebar":"0","leftSidebarSlug":"","rightSidebar":"0","rightSidebarSlug":"","footerSidebar":"0","footerSidebarSlug":null}}',
			'{"settings":{"defaultAvatar":"0","defaultBanner":"0","fixedBanner":"0","scrollBanner":"0","parallaxBanner":"0","background":"0","backgroundClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerInfo":"0","headerContent":"0","headerIconUrl":"","headerBanner":"0","headerGallery":"0","headerElements":"0","headerElementType":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","maxCover":"0","contentSocial":"0","contentLabels":null,"contentAvatar":"0","contentBanner":"0","contentGallery":"0","contentClass":"","contentDataClass":"","styles":"","footer":"0","footerIcon":"0","footerIconClass":null,"footerIconUrl":"","footerTitle":"0","footerTitleData":"","footerInfo":"0","footerInfoData":"","footerContent":"0","footerContentData":"","footerElements":"0","footerElementType":"","metas":"0","metasWithContent":"0","metasOrder":"","metaType":"","metaWrapClass":"","elements":"0","elementsBeforeContent":"0","elementsWithContent":"0","elementsOrder":"","elementType":"","boxWrapClass":"","boxWrapper":"","boxClass":"","widgets":"0","widgetsBeforeContent":"0","widgetsWithContent":"0","widgetsOrder":"","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":"","blocks":"0","blocksBeforeContent":"0","blocksWithContent":"0","blocksOrder":"","blockType":"","sidebars":"0","sidebarsBeforeContent":"0","sidebarsWithContent":"0","sidebarsOrder":"","sidebarType":"","topSidebar":"0","topSidebarSlugs":"","bottomSidebar":"0","bottomSidebarSlugs":"","leftSidebar":"0","leftSidebarSlug":"","rightSidebar":"0","rightSidebarSlug":"","footerSidebar":"0","footerSidebarSlug":null}}',
			'{"settings":{"defaultAvatar":"0","defaultBanner":"0","fixedBanner":"0","scrollBanner":"0","parallaxBanner":"0","background":"0","backgroundClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerInfo":"0","headerContent":"0","headerIconUrl":"","headerBanner":"0","headerGallery":"0","headerElements":"0","headerElementType":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","maxCover":"0","contentSocial":"0","contentLabels":null,"contentAvatar":"0","contentBanner":"0","contentGallery":"0","contentClass":"","contentDataClass":"","styles":"","footer":"0","footerIcon":"0","footerIconClass":null,"footerIconUrl":"","footerTitle":"0","footerTitleData":"","footerInfo":"0","footerInfoData":"","footerContent":"0","footerContentData":"","footerElements":"0","footerElementType":"","metas":"0","metasWithContent":"0","metasOrder":"","metaType":"","metaWrapClass":"","elements":"0","elementsBeforeContent":"0","elementsWithContent":"0","elementsOrder":"","elementType":"","boxWrapClass":"","boxWrapper":"","boxClass":"","widgets":"0","widgetsBeforeContent":"0","widgetsWithContent":"0","widgetsOrder":"","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":"","blocks":"0","blocksBeforeContent":"0","blocksWithContent":"0","blocksOrder":"","blockType":"","sidebars":"0","sidebarsBeforeContent":"0","sidebarsWithContent":"0","sidebarsOrder":"","sidebarType":"","topSidebar":"0","topSidebarSlugs":"","bottomSidebar":"0","bottomSidebarSlugs":"","leftSidebar":"0","leftSidebarSlug":"","rightSidebar":"0","rightSidebarSlug":"","footerSidebar":"0","footerSidebarSlug":null}}',
			'{"settings":{"defaultAvatar":"0","defaultBanner":"0","fixedBanner":"0","scrollBanner":"0","parallaxBanner":"0","background":"0","backgroundClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerInfo":"0","headerContent":"0","headerIconUrl":"","headerBanner":"0","headerGallery":"0","headerElements":"0","headerElementType":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","maxCover":"0","contentSocial":"0","contentLabels":null,"contentAvatar":"0","contentBanner":"0","contentGallery":"0","contentClass":"","contentDataClass":"","styles":"","footer":"0","footerIcon":"0","footerIconClass":null,"footerIconUrl":"","footerTitle":"0","footerTitleData":"","footerInfo":"0","footerInfoData":"","footerContent":"0","footerContentData":"","footerElements":"0","footerElementType":"","metas":"0","metasWithContent":"0","metasOrder":"","metaType":"","metaWrapClass":"","elements":"0","elementsBeforeContent":"0","elementsWithContent":"0","elementsOrder":"","elementType":"","boxWrapClass":"","boxWrapper":"","boxClass":"","widgets":"0","widgetsBeforeContent":"0","widgetsWithContent":"0","widgetsOrder":"","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":"","blocks":"0","blocksBeforeContent":"0","blocksWithContent":"0","blocksOrder":"","blockType":"","sidebars":"0","sidebarsBeforeContent":"0","sidebarsWithContent":"0","sidebarsOrder":"","sidebarType":"","topSidebar":"0","topSidebarSlugs":"","bottomSidebar":"0","bottomSidebarSlugs":"","leftSidebar":"0","leftSidebarSlug":"","rightSidebar":"0","rightSidebarSlug":"","footerSidebar":"0","footerSidebarSlug":null}}',
			'{"settings":{"defaultAvatar":"0","defaultBanner":"1","fixedBanner":"0","scrollBanner":"0","parallaxBanner":"0","background":"0","backgroundClass":"","texture":"0","header":"1","headerIcon":"0","headerTitle":"1","headerInfo":"1","headerContent":"0","headerIconUrl":"","headerBanner":"1","headerGallery":"0","headerScroller":"0","headerElements":"0","headerElementType":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","maxCover":"0","contentSocial":"0","contentLabels":null,"contentAvatar":"0","contentBanner":"0","contentGallery":"0","contentClass":"","contentDataClass":"","styles":"","footer":"0","footerIcon":"0","footerIconClass":null,"footerIconUrl":"","footerTitle":"0","footerTitleData":"","footerInfo":"0","footerInfoData":"","footerContent":"0","footerContentData":"","footerElements":"0","footerElementType":"","metas":"0","metasWithContent":"0","metasOrder":"","metaType":"","metaWrapClass":"","elements":"0","elementsBeforeContent":"0","elementsWithContent":"0","elementsOrder":"","elementType":"","boxWrapClass":"","boxWrapper":"","boxClass":"","widgets":"1","widgetsBeforeContent":"0","widgetsWithContent":"1","widgetsOrder":"","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":"","blocks":"0","blocksBeforeContent":"0","blocksWithContent":"0","blocksOrder":"","blockType":"","sidebars":"0","sidebarsBeforeContent":"0","sidebarsWithContent":"0","sidebarsOrder":"","sidebarType":"","topSidebar":"0","topSidebarSlugs":"","bottomSidebar":"0","bottomSidebarSlugs":"","leftSidebar":"0","leftSidebarSlug":"","rightSidebar":"0","rightSidebarSlug":"","footerSidebar":"0","footerSidebarSlug":null,"comments":"0","disqus":"0"}}',
			'{"settings":{"defaultAvatar":"0","defaultBanner":"0","fixedBanner":"0","scrollBanner":"0","parallaxBanner":"0","background":"0","backgroundClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerInfo":"0","headerContent":"0","headerIconUrl":"","headerBanner":"0","headerGallery":"0","headerElements":"0","headerElementType":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","maxCover":"0","contentSocial":"0","contentLabels":null,"contentAvatar":"0","contentBanner":"0","contentGallery":"0","contentClass":"","contentDataClass":"","styles":"","footer":"0","footerIcon":"0","footerIconClass":null,"footerIconUrl":"","footerTitle":"0","footerTitleData":"","footerInfo":"0","footerInfoData":"","footerContent":"0","footerContentData":"","footerElements":"0","footerElementType":"","metas":"0","metasWithContent":"0","metasOrder":"","metaType":"","metaWrapClass":"","elements":"0","elementsBeforeContent":"0","elementsWithContent":"0","elementsOrder":"","elementType":"","boxWrapClass":"","boxWrapper":"","boxClass":"","widgets":"0","widgetsBeforeContent":"0","widgetsWithContent":"0","widgetsOrder":"","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":"","blocks":"0","blocksBeforeContent":"0","blocksWithContent":"0","blocksOrder":"","blockType":"","sidebars":"0","sidebarsBeforeContent":"0","sidebarsWithContent":"0","sidebarsOrder":"","sidebarType":"","topSidebar":"0","topSidebarSlugs":"","bottomSidebar":"0","bottomSidebarSlugs":"","leftSidebar":"0","leftSidebarSlug":"","rightSidebar":"0","rightSidebarSlug":"","footerSidebar":"0","footerSidebarSlug":null}}',
			'{"settings":{"defaultAvatar":"0","defaultBanner":"0","fixedBanner":"0","scrollBanner":"0","parallaxBanner":"0","background":"0","backgroundClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerInfo":"0","headerContent":"0","headerIconUrl":"","headerBanner":"0","headerGallery":"0","headerElements":"0","headerElementType":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","maxCover":"0","contentSocial":"0","contentLabels":null,"contentAvatar":"0","contentBanner":"0","contentGallery":"0","contentClass":"","contentDataClass":"","styles":"","footer":"0","footerIcon":"0","footerIconClass":null,"footerIconUrl":"","footerTitle":"0","footerTitleData":"","footerInfo":"0","footerInfoData":"","footerContent":"0","footerContentData":"","footerElements":"0","footerElementType":"","metas":"0","metasWithContent":"0","metasOrder":"","metaType":"","metaWrapClass":"","elements":"0","elementsBeforeContent":"0","elementsWithContent":"0","elementsOrder":"","elementType":"","boxWrapClass":"","boxWrapper":"","boxClass":"","widgets":"0","widgetsBeforeContent":"0","widgetsWithContent":"0","widgetsOrder":"","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":"","blocks":"0","blocksBeforeContent":"0","blocksWithContent":"0","blocksOrder":"","blockType":"","sidebars":"0","sidebarsBeforeContent":"0","sidebarsWithContent":"0","sidebarsOrder":"","sidebarType":"","topSidebar":"0","topSidebarSlugs":"","bottomSidebar":"0","bottomSidebarSlugs":"","leftSidebar":"0","leftSidebarSlug":"","rightSidebar":"0","rightSidebarSlug":"","footerSidebar":"0","footerSidebarSlug":null}}',
			'{"settings":{"defaultAvatar":"0","defaultBanner":"0","fixedBanner":"0","scrollBanner":"0","parallaxBanner":"0","background":"0","backgroundClass":"","texture":"0","header":"0","headerIcon":"0","headerTitle":"0","headerInfo":"0","headerContent":"0","headerIconUrl":"","headerBanner":"0","headerGallery":"0","headerElements":"0","headerElementType":"","content":"1","contentTitle":"0","contentInfo":"0","contentSummary":"0","contentData":"0","maxCover":"0","contentSocial":"0","contentLabels":null,"contentAvatar":"0","contentBanner":"0","contentGallery":"0","contentClass":"","contentDataClass":"","styles":"","footer":"0","footerIcon":"0","footerIconClass":null,"footerIconUrl":"","footerTitle":"0","footerTitleData":"","footerInfo":"0","footerInfoData":"","footerContent":"0","footerContentData":"","footerElements":"0","footerElementType":"","metas":"0","metasWithContent":"0","metasOrder":"","metaType":"","metaWrapClass":"","elements":"0","elementsBeforeContent":"0","elementsWithContent":"0","elementsOrder":"","elementType":"","boxWrapClass":"","boxWrapper":"","boxClass":"","widgets":"0","widgetsBeforeContent":"0","widgetsWithContent":"0","widgetsOrder":"","widgetType":"","widgetWrapClass":"","widgetWrapper":"","widgetClass":"","blocks":"0","blocksBeforeContent":"0","blocksWithContent":"0","blocksOrder":"","blockType":"","sidebars":"0","sidebarsBeforeContent":"0","sidebarsWithContent":"0","sidebarsOrder":"","sidebarType":"","topSidebar":"0","topSidebarSlugs":"","bottomSidebar":"0","bottomSidebarSlugs":"","leftSidebar":"0","leftSidebarSlug":"","rightSidebar":"0","rightSidebarSlug":"","footerSidebar":"0","footerSidebarSlug":null}}'
		];

		$this->update( $this->cmgPrefix . 'cms_page', [ 'texture' => 'texture', 'title' => NULL, 'description' => $desc[ 0 ], 'data' => $setting[ 0 ] ], [ 'slug' => 'home' ] );
		$this->update( $this->cmgPrefix . 'cms_page', [ 'texture' => 'texture', 'title' => NULL, 'description' => $desc[ 1 ], 'data' => $setting[ 1 ] ], [ 'slug' => 'login' ] );
		$this->update( $this->cmgPrefix . 'cms_page', [ 'texture' => 'texture', 'title' => NULL, 'description' => $desc[ 2 ], 'data' => $setting[ 2 ] ], [ 'slug' => 'login-otp' ] );
		$this->update( $this->cmgPrefix . 'cms_page', [ 'texture' => 'texture', 'title' => NULL, 'description' => $desc[ 3 ], 'data' => $setting[ 3 ] ], [ 'slug' => 'register' ] );
		$this->update( $this->cmgPrefix . 'cms_page', [ 'texture' => 'texture', 'title' => NULL, 'description' => $desc[ 4 ], 'data' => $setting[ 4 ] ], [ 'slug' => 'confirm-account' ] );
		$this->update( $this->cmgPrefix . 'cms_page', [ 'texture' => 'texture', 'title' => NULL, 'description' => $desc[ 5 ], 'data' => $setting[ 5 ] ], [ 'slug' => 'confirm-account-otp' ] );
		$this->update( $this->cmgPrefix . 'cms_page', [ 'texture' => 'texture', 'title' => NULL, 'description' => $desc[ 6 ], 'data' => $setting[ 6 ] ], [ 'slug' => 'activate-account' ] );
		$this->update( $this->cmgPrefix . 'cms_page', [ 'texture' => 'texture', 'title' => NULL, 'description' => $desc[ 7 ], 'data' => $setting[ 7 ] ], [ 'slug' => 'forgot-password' ] );
		$this->update( $this->cmgPrefix . 'cms_page', [ 'texture' => 'texture', 'title' => NULL, 'description' => $desc[ 8 ], 'data' => $setting[ 8 ] ], [ 'slug' => 'reset-password' ] );
		$this->update( $this->cmgPrefix . 'cms_page', [ 'texture' => 'texture', 'title' => NULL, 'description' => $desc[ 9 ], 'data' => $setting[ 9 ] ], [ 'slug' => 'reset-password-otp' ] );
		$this->update( $this->cmgPrefix . 'cms_page', [ 'texture' => 'texture', 'title' => 'About Us', 'description' => $desc[ 10 ], 'data' => $setting[ 10 ] ], [ 'slug' => 'about-us' ] );
		$this->update( $this->cmgPrefix . 'cms_page', [ 'texture' => 'texture', 'title' => 'Terms & Conditions', 'description' => $desc[ 11 ], 'data' => $setting[ 11 ] ], [ 'slug' => 'terms' ] );
		$this->update( $this->cmgPrefix . 'cms_page', [ 'texture' => 'texture', 'title' => 'Privacy Policy', 'description' => $desc[ 12 ], 'data' => $setting[ 12 ] ], [ 'slug' => 'privacy' ] );

		$this->update( $this->cmgPrefix . 'cms_page', [ 'texture' => 'texture', 'title' => NULL, 'description' => $desc[ 13 ], 'data' => $setting[ 13 ] ], [ 'slug' => 'feedback' ] );
		$this->update( $this->cmgPrefix . 'cms_page', [ 'texture' => 'texture', 'title' => NULL, 'description' => $desc[ 14 ], 'data' => $setting[ 14 ] ], [ 'slug' => 'testimonial' ] );

		$this->update( $this->cmgPrefix . 'cms_page', [ 'texture' => 'texture', 'title' => NULL, 'description' => $desc[ 15 ], 'data' => $setting[ 15 ] ], [ 'slug' => 'help' ] );
		$this->update( $this->cmgPrefix . 'cms_page', [ 'texture' => 'texture', 'title' => NULL, 'description' => $desc[ 16 ], 'data' => $setting[ 16 ] ], [ 'slug' => 'faq' ] );

		$this->update( $this->cmgPrefix . 'cms_page', [ 'texture' => 'texture', 'title' => NULL, 'description' => $desc[ 17 ], 'data' => $setting[ 17 ] ], [ 'slug' => 'blog' ] );

		$this->update( $this->cmgPrefix . 'cms_page', [ 'texture' => 'texture', 'title' => NULL, 'description' => $desc[ 18 ], 'data' => $setting[ 18 ] ], [ 'slug' => 'search-pages' ] );
		$this->update( $this->cmgPrefix . 'cms_page', [ 'texture' => 'texture', 'title' => NULL, 'description' => $desc[ 19 ], 'data' => $setting[ 19 ] ], [ 'slug' => 'search-articles' ] );
		$this->update( $this->cmgPrefix . 'cms_page', [ 'texture' => 'texture', 'title' => NULL, 'description' => $desc[ 20 ], 'data' => $setting[ 20 ] ], [ 'slug' => 'search-posts' ] );
	}

	private function updatePageContent() {

		$summary = [
			'News Demo',
			'Login at News Demo.',
			'Login using OTP at News Demo.',
			'Register at News Demo to join us.',
			'Confirm Account to continue with News Demo',
			'Confirm Account using OTP to continue with News Demo',
			'Activate Account',
			'Submit request to change password',
			'Reset Password',
			'Reset Password using OTP',
			'About Us',
			'Terms and Conditions at News Demo',
			'Privacy Policy at News Demo',
			'Submit Feedback to improve the services provided by News Demo',
			'Write us a Testimonial about your experience at News Demo',
			'How can we help you', 'Frequently asked questions',
			'Blog',
			'Browse Pages', 'Browse Articles', 'Browse Blog Posts'
		];

		$seo = [
			[ null, null, 'News Demo', 'index,follow' ],
			[ null, null, 'News Demo', 'index,follow' ],
			[ null, null, 'News Demo', 'index,follow' ],
			[ null, null, 'News Demo', 'index,follow' ],
			[ null, null, 'News Demo', 'index,follow' ],
			[ null, null, 'News Demo', 'index,follow' ],
			[ null, null, 'News Demo', 'index,follow' ],
			[ null, null, 'News Demo', 'index,follow' ],
			[ null, null, 'News Demo', 'index,follow' ],
			[ null, null, 'News Demo', 'index,follow' ],
			[ null, null, 'News Demo', 'index,follow' ],
			[ null, null, 'News Demo', 'index,follow' ],
			[ null, null, 'News Demo', 'index,follow' ],
			[ null, null, 'News Demo', 'index,follow' ],
			[ null, null, 'News Demo', 'index,follow' ],
			[ null, null, 'News Demo', 'index,follow' ],
			[ null, null, 'News Demo', 'index,follow' ],
			[ null, null, 'News Demo', 'index,follow' ],
			[ null, null, 'News Demo', 'index,follow' ],
			[ null, null, 'News Demo', 'index,follow' ],
			[ null, null, 'News Demo', 'index,follow' ]
		];

		$content = [
			null, null, null, null, null, null, null, null, null, null,
			null, null, null, null, null, null, null, null, null, null,
			null
		];

		// Templates
		$blogTemplate = Template::findGlobalBySlugType( CmsGlobal::TEMPLATE_BLOG, CmsGlobal::TYPE_PAGE );

		$this->update( $this->cmgPrefix . 'cms_model_content', [ 'bannerId' => null, 'summary' => $summary[ 0 ], 'seoName' => $seo[ 0 ][ 0 ], 'seoDescription' => $seo[ 0 ][ 1 ], 'seoKeywords' => $seo[ 0 ][ 2 ], 'seoRobot' => $seo[ 0 ][ 3 ], 'content' => $content[ 0 ] ], [ 'parentId' => 1, 'parentType' => 'page' ] );
		$this->update( $this->cmgPrefix . 'cms_model_content', [ 'bannerId' => null, 'summary' => $summary[ 1 ], 'seoName' => $seo[ 1 ][ 0 ], 'seoDescription' => $seo[ 1 ][ 1 ], 'seoKeywords' => $seo[ 1 ][ 2 ], 'seoRobot' => $seo[ 1 ][ 3 ], 'content' => $content[ 1 ] ], [ 'parentId' => 2, 'parentType' => 'page' ] );
		$this->update( $this->cmgPrefix . 'cms_model_content', [ 'bannerId' => null, 'summary' => $summary[ 2 ], 'seoName' => $seo[ 2 ][ 0 ], 'seoDescription' => $seo[ 2 ][ 1 ], 'seoKeywords' => $seo[ 2 ][ 2 ], 'seoRobot' => $seo[ 2 ][ 3 ], 'content' => $content[ 2 ] ], [ 'parentId' => 3, 'parentType' => 'page' ] );
		$this->update( $this->cmgPrefix . 'cms_model_content', [ 'bannerId' => null, 'summary' => $summary[ 3 ], 'seoName' => $seo[ 3 ][ 0 ], 'seoDescription' => $seo[ 3 ][ 1 ], 'seoKeywords' => $seo[ 3 ][ 2 ], 'seoRobot' => $seo[ 3 ][ 3 ], 'content' => $content[ 3 ] ], [ 'parentId' => 4, 'parentType' => 'page' ] );
		$this->update( $this->cmgPrefix . 'cms_model_content', [ 'bannerId' => null, 'summary' => $summary[ 4 ], 'seoName' => $seo[ 4 ][ 0 ], 'seoDescription' => $seo[ 4 ][ 1 ], 'seoKeywords' => $seo[ 4 ][ 2 ], 'seoRobot' => $seo[ 4 ][ 3 ], 'content' => $content[ 4 ] ], [ 'parentId' => 5, 'parentType' => 'page' ] );
		$this->update( $this->cmgPrefix . 'cms_model_content', [ 'bannerId' => null, 'summary' => $summary[ 5 ], 'seoName' => $seo[ 5 ][ 0 ], 'seoDescription' => $seo[ 5 ][ 1 ], 'seoKeywords' => $seo[ 5 ][ 2 ], 'seoRobot' => $seo[ 5 ][ 3 ], 'content' => $content[ 5 ] ], [ 'parentId' => 6, 'parentType' => 'page' ] );
		$this->update( $this->cmgPrefix . 'cms_model_content', [ 'bannerId' => null, 'summary' => $summary[ 6 ], 'seoName' => $seo[ 6 ][ 0 ], 'seoDescription' => $seo[ 6 ][ 1 ], 'seoKeywords' => $seo[ 6 ][ 2 ], 'seoRobot' => $seo[ 6 ][ 3 ], 'content' => $content[ 6 ] ], [ 'parentId' => 7, 'parentType' => 'page' ] );
		$this->update( $this->cmgPrefix . 'cms_model_content', [ 'bannerId' => null, 'summary' => $summary[ 7 ], 'seoName' => $seo[ 7 ][ 0 ], 'seoDescription' => $seo[ 7 ][ 1 ], 'seoKeywords' => $seo[ 7 ][ 2 ], 'seoRobot' => $seo[ 7 ][ 3 ], 'content' => $content[ 7 ] ], [ 'parentId' => 8, 'parentType' => 'page' ] );
		$this->update( $this->cmgPrefix . 'cms_model_content', [ 'bannerId' => null, 'summary' => $summary[ 8 ], 'seoName' => $seo[ 8 ][ 0 ], 'seoDescription' => $seo[ 8 ][ 1 ], 'seoKeywords' => $seo[ 8 ][ 2 ], 'seoRobot' => $seo[ 8 ][ 3 ], 'content' => $content[ 8 ] ], [ 'parentId' => 9, 'parentType' => 'page' ] );
		$this->update( $this->cmgPrefix . 'cms_model_content', [ 'bannerId' => null, 'summary' => $summary[ 9 ], 'seoName' => $seo[ 9 ][ 0 ], 'seoDescription' => $seo[ 9 ][ 1 ], 'seoKeywords' => $seo[ 9 ][ 2 ], 'seoRobot' => $seo[ 9 ][ 3 ], 'content' => $content[ 9 ] ], [ 'parentId' => 10, 'parentType' => 'page' ] );
		$this->update( $this->cmgPrefix . 'cms_model_content', [ 'bannerId' => null, 'summary' => $summary[ 10 ], 'seoName' => $seo[ 10 ][ 0 ], 'seoDescription' => $seo[ 10 ][ 1 ], 'seoKeywords' => $seo[ 10 ][ 2 ], 'seoRobot' => $seo[ 10 ][ 3 ], 'content' => $content[ 10 ] ], [ 'parentId' => 11, 'parentType' => 'page' ] );
		$this->update( $this->cmgPrefix . 'cms_model_content', [ 'bannerId' => null, 'summary' => $summary[ 11 ], 'seoName' => $seo[ 11 ][ 0 ], 'seoDescription' => $seo[ 11 ][ 1 ], 'seoKeywords' => $seo[ 11 ][ 2 ], 'seoRobot' => $seo[ 11 ][ 3 ], 'content' => $content[ 11 ] ], [ 'parentId' => 12, 'parentType' => 'page' ] );
		$this->update( $this->cmgPrefix . 'cms_model_content', [ 'bannerId' => null, 'summary' => $summary[ 12 ], 'seoName' => $seo[ 12 ][ 0 ], 'seoDescription' => $seo[ 12 ][ 1 ], 'seoKeywords' => $seo[ 12 ][ 2 ], 'seoRobot' => $seo[ 12 ][ 3 ], 'content' => $content[ 12 ] ], [ 'parentId' => 13, 'parentType' => 'page' ] );
		$this->update( $this->cmgPrefix . 'cms_model_content', [ 'bannerId' => null, 'summary' => $summary[ 13 ], 'seoName' => $seo[ 13 ][ 0 ], 'seoDescription' => $seo[ 13 ][ 1 ], 'seoKeywords' => $seo[ 13 ][ 2 ], 'seoRobot' => $seo[ 13 ][ 3 ], 'content' => $content[ 13 ] ], [ 'parentId' => 14, 'parentType' => 'page' ] );
		$this->update( $this->cmgPrefix . 'cms_model_content', [ 'bannerId' => null, 'summary' => $summary[ 14 ], 'seoName' => $seo[ 14 ][ 0 ], 'seoDescription' => $seo[ 14 ][ 1 ], 'seoKeywords' => $seo[ 14 ][ 2 ], 'seoRobot' => $seo[ 14 ][ 3 ], 'content' => $content[ 14 ] ], [ 'parentId' => 15, 'parentType' => 'page' ] );
		$this->update( $this->cmgPrefix . 'cms_model_content', [ 'bannerId' => null, 'summary' => $summary[ 15 ], 'seoName' => $seo[ 15 ][ 0 ], 'seoDescription' => $seo[ 15 ][ 1 ], 'seoKeywords' => $seo[ 15 ][ 2 ], 'seoRobot' => $seo[ 15 ][ 3 ], 'content' => $content[ 15 ] ], [ 'parentId' => 16, 'parentType' => 'page' ] );
		$this->update( $this->cmgPrefix . 'cms_model_content', [ 'bannerId' => null, 'summary' => $summary[ 16 ], 'seoName' => $seo[ 16 ][ 0 ], 'seoDescription' => $seo[ 16 ][ 1 ], 'seoKeywords' => $seo[ 16 ][ 2 ], 'seoRobot' => $seo[ 16 ][ 3 ], 'content' => $content[ 16 ] ], [ 'parentId' => 17, 'parentType' => 'page' ] );
		$this->update( $this->cmgPrefix . 'cms_model_content', [ 'bannerId' => null, 'templateId' => $blogTemplate->id, 'summary' => $summary[ 17 ], 'seoName' => $seo[ 17 ][ 0 ], 'seoDescription' => $seo[ 17 ][ 1 ], 'seoKeywords' => $seo[ 17 ][ 2 ], 'seoRobot' => $seo[ 17 ][ 3 ], 'content' => $content[ 17 ] ], [ 'parentId' => 18, 'parentType' => 'page' ] );
		$this->update( $this->cmgPrefix . 'cms_model_content', [ 'bannerId' => null, 'summary' => $summary[ 18 ], 'seoName' => $seo[ 18 ][ 0 ], 'seoDescription' => $seo[ 18 ][ 1 ], 'seoKeywords' => $seo[ 18 ][ 2 ], 'seoRobot' => $seo[ 18 ][ 3 ], 'content' => $content[ 18 ] ], [ 'parentId' => 19, 'parentType' => 'page' ] );
		$this->update( $this->cmgPrefix . 'cms_model_content', [ 'bannerId' => null, 'summary' => $summary[ 19 ], 'seoName' => $seo[ 19 ][ 0 ], 'seoDescription' => $seo[ 19 ][ 1 ], 'seoKeywords' => $seo[ 19 ][ 2 ], 'seoRobot' => $seo[ 19 ][ 3 ], 'content' => $content[ 19 ] ], [ 'parentId' => 20, 'parentType' => 'page' ] );
		$this->update( $this->cmgPrefix . 'cms_model_content', [ 'bannerId' => null, 'summary' => $summary[ 20 ], 'seoName' => $seo[ 20 ][ 0 ], 'seoDescription' => $seo[ 20 ][ 1 ], 'seoKeywords' => $seo[ 20 ][ 2 ], 'seoRobot' => $seo[ 20 ][ 3 ], 'content' => $content[ 20 ] ], [ 'parentId' => 21, 'parentType' => 'page' ] );
	}

	private function insertPages() {

		$site	= $this->site;
		$master	= $this->master;

		// Templates
		$defaultTemplate	= Template::findGlobalBySlugType( 'default', CmsGlobal::TYPE_PAGE );
		$qnaTemplate		= Template::findGlobalBySlugType( 'qna', CmsGlobal::TYPE_PAGE );

		$columns = [ 'id', 'siteId', 'avatarId', 'parentId', 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'texture', 'title', 'description', 'status', 'visibility', 'order', 'pinned', 'featured', 'comments', 'createdAt', 'modifiedAt', 'content', 'data', 'gridCache', 'gridCacheValid', 'gridCachedAt' ];

		$pages = [
			// Template Pages
			//[ 1001, $site->id, null, null, $master->id, $master->id, 'Browse Projects', 'browse-projects', CmsGlobal::TYPE_PAGE, null, null, null, null, Page::STATUS_ACTIVE, Page::VISIBILITY_PUBLIC, 0, false, false, 0, DateUtil::getDateTime(), DateUtil::getDateTime(), null, null, null, 0, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'cms_page', $columns, $pages );

		$columns = [ 'id', 'templateId', 'bannerId', 'videoId', 'galleryId', 'parentId', 'parentType', 'type', 'summary', 'seoName', 'seoDescription', 'seoKeywords', 'seoRobot', 'publishedAt', 'content', 'data' ];

		$pagesContent = [
			// Template Pages
			//[ 1001, $defaultTemplate->id, null, null, null, 1001, CmsGlobal::TYPE_PAGE, null, null, null, null, null, null, DateUtil::getDateTime(), null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'cms_model_content', $columns, $pagesContent );
	}

	private function insertPageMetas() {

		$pageMetaColumns = [ 'id', 'modelId', 'name', 'label', 'type', 'active', 'order', 'valueType', 'value', 'data'];

		$metas = [
			//[ 101, 1085, 'Meta 1', 'Meta 1', '', 1, 0, 'text', 'value', null]
		];

		$this->batchInsert( $this->cmgPrefix . 'cms_page_meta', $pageMetaColumns, $metas );
	}

	private function insertObjectMappings() {

		// Pages
		//$blogPage	= Page::findBySlugType( 'blog', CmsGlobal::TYPE_PAGE );

		// Blocks
		//$offerBlock = Block::findBySlugType( 'main-slider', CmsGlobal::TYPE_BLOCK );

		// Widgets
		//$sitePosts	= Widget::findBySlugType( 'search-site-posts', CmsGlobal::TYPE_WIDGET );

		$columns = [ 'id', 'modelId', 'parentId', 'parentType', 'type', 'order', 'active', 'pinned', 'featured', 'nodes' ];

		$mappings = [
			//[ 150001, $sitePosts->id, $blogPage->id, 'page', 'widget', 0, 1, 0, 0, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_model_object', $columns, $mappings );
	}

	public function down() {

		echo "m181020_011284_pages will be deleted with m160621_014408_core.\n";
	}

}
