<?php
// CMG Imports
use cmsgears\cms\common\config\CmsGlobal;

use cmsgears\core\common\models\entities\Site;
use cmsgears\core\common\models\entities\User;
use cmsgears\core\common\models\entities\Template;
use cmsgears\core\common\models\entities\Theme;

use cmsgears\cms\common\models\entities\Page;

use cmsgears\core\common\utilities\DateUtil;

// SF Imports
use news\core\common\config\CoreGlobal;

class m160624_020626_theme_newstheme extends \yii\db\Migration {

	// Private Variables

	private $cmgPrefix;
	private $newsPrefix;

	private $site;

	private $master;

	public function init() {

		// Fixed
		$this->cmgPrefix	= 'cmg_';
		$this->newsPrefix		= 'news_';

		$this->site		= Site::findBySlug( CoreGlobal::SITE_MAIN );
		$this->master	= User::findByUsername( 'demomaster' );

		Yii::$app->core->setSite( $this->site );
	}

    public function up() {

		// Theme
		$this->insertTheme();

		// Templates
		$this->insertThemeTemplates();

		// Objects
		$this->insertObjects();

		// Page
		$this->insertPages();
		$this->configurePageTemplates();

		// Site
		$this->configureTheme();
    }

	private function insertTheme() {

		$columns = [ 'createdBy', 'modifiedBy', 'name', 'slug', 'description', 'renderer', 'basePath', 'createdAt', 'modifiedAt', 'data' ];

		$themes = [
			[ $this->master->id, $this->master->id, 'news', 'news', 'news Theme.', 'default', '@themes/newstheme', DateUtil::getDateTime(), DateUtil::getDateTime(), null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_theme', $columns, $themes );

		// Update default
		$this->update( $this->cmgPrefix . 'core_theme', [ 'default' => false ], [ 'default' => true ] );

		// Make current as default
		$this->update( $this->cmgPrefix . 'core_theme', [ 'default' => true ], "slug='news'" );
	}

	private function insertThemeTemplates() {

		$columns = [ 'createdBy', 'modifiedBy', 'name', 'slug', 'icon', 'type', 'description', 'renderer', 'fileRender', 'layout', 'layoutGroup', 'viewPath', 'createdAt', 'modifiedAt', 'content', 'data' ];

		$templates = [
			[ $this->master->id, $this->master->id, 'Page', 'page', null, 'page', 'Page layout for pages.', 'default', true, 'page/default', false, 'views/templates/page/default', DateUtil::getDateTime(), DateUtil::getDateTime(), null, null ],
			[ $this->master->id, $this->master->id, 'Blog', 'blog', null, 'page', 'Blog layout to view all blog posts or filters(category, author).', 'default', true, 'page/blog', false, 'views/templates/page/blog', DateUtil::getDateTime(), DateUtil::getDateTime(), null, null ],
			[ $this->master->id, $this->master->id, 'Post', 'post', null, 'blog', 'Post layout for blog posts.', 'default', true, 'post/default', true, 'views/templates/post/default', DateUtil::getDateTime(), DateUtil::getDateTime(), null, null ],
			[ $this->master->id, $this->master->id, 'Form', 'form', null, 'form', 'It can be used to display public forms.', 'default', true, 'form/default', false, 'views/templates/form/default', DateUtil::getDateTime(), DateUtil::getDateTime(), null, null ],
			[ $this->master->id, $this->master->id, 'Text Social', 'text-social', null, 'widget', 'It can be used to display key values for social links.', 'default', true, null, false, 'views/templates/widget/text/social', DateUtil::getDateTime(), DateUtil::getDateTime(), null, null ],
			[ $this->master->id, $this->master->id, 'Text Footer', 'text-footer', null, 'widget', 'It can be used to display footer info.', 'default', true, '', false, 'views/templates/widget/text/footer', DateUtil::getDateTime(), DateUtil::getDateTime(), '', null ],
			[ $this->master->id, $this->master->id, 'Text Address', 'text-address', null, 'widget', 'Used to display address on contact pages.', 'default', true, null, false, 'views/templates/widget/text/address', DateUtil::getDateTime(), DateUtil::getDateTime(), null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_template', $columns, $templates );
	}

	private function insertObjects() {

		$tFooterTemplate	= Template::findBySlugType( 'text-footer', CmsGlobal::TYPE_WIDGET , [ 'ignoreSite' => true]);

		$columns = [ 'siteId', 'templateId', 'avatarId', 'bannerId', 'createdBy', 'modifiedBy', 'name', 'slug', 'icon', 'type', 'description', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$objects = [
			[ $this->site->id, NULL,NULL,NULL,1,1,'Main','main',NULL,'menu','Main Menu used on site header.','2014-10-11 14:22:54','2014-10-11 14:22:54',NULL,NULL,'{"links":{"4":{"link":"1","pageId":"2","htmlOptions":"{\"id\":\"btn-login\"}","icon":"","order":"0","type":"page","name":"Login"},"3":{"address":"","label":"","htmlOptions":"","private":"0","relative":"0","icon":"","order":"0","type":"link"},"2":{"address":"","label":"","htmlOptions":"","private":"0","relative":"0","icon":"","order":"0","type":"link"},"0":{"address":"","label":"","htmlOptions":"","private":"0","relative":"0","icon":"","order":"0","type":"link"},"1":{"address":"","label":"","htmlOptions":"","private":"0","relative":"0","icon":"","order":"0","type":"link"},"5":{"link":"1","pageId":"3","htmlOptions":"{\"id\":\"btn-register\"}","icon":"","order":"1","type":"page","name":"Sign Up"}}}' ],
			[ $this->site->id, $tFooterTemplate->id, NULL,NULL,1,1,'Footer Info','footer-info',NULL,'widget','Site Info displayed on footer','2014-10-11 14:22:54','2014-10-11 14:22:54',NULL,NULL,'{"classPath":"","data":{"title":"Lorem Ipsum is not simply","info":"Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old."}}' ],
		];

		$this->batchInsert( $this->cmgPrefix . 'core_object', $columns, $objects );
	}

	private function insertPages() {

		$columns = [ 'siteId', 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'status', 'visibility', 'icon', 'order', 'featured', 'comments', 'createdAt', 'modifiedAt' ];

		$pages	= [
			[ $this->site->id, $this->master->id, $this->master->id, 'Services', 'services', CmsGlobal::TYPE_PAGE, Page::STATUS_ACTIVE, Page::VISIBILITY_PUBLIC, null, 0, false, false, DateUtil::getDateTime(), DateUtil::getDateTime() ],
			[ $this->site->id, $this->master->id, $this->master->id, 'FAQ', 'faq', CmsGlobal::TYPE_PAGE, Page::STATUS_ACTIVE, Page::VISIBILITY_PUBLIC, null, 0, false, false, DateUtil::getDateTime(), DateUtil::getDateTime() ],
			[ $this->site->id, $this->master->id, $this->master->id, 'About US', 'about-us', CmsGlobal::TYPE_PAGE, Page::STATUS_ACTIVE, Page::VISIBILITY_PUBLIC, null, 0, false, false, DateUtil::getDateTime(), DateUtil::getDateTime() ],
			[ $this->site->id, $this->master->id, $this->master->id, 'Terms & Conditions', 'terms', CmsGlobal::TYPE_PAGE, Page::STATUS_ACTIVE, Page::VISIBILITY_PUBLIC, null, 0, false, false, DateUtil::getDateTime(), DateUtil::getDateTime() ],
			[ $this->site->id, $this->master->id, $this->master->id, 'Privacy', 'privacy', CmsGlobal::TYPE_PAGE, Page::STATUS_ACTIVE, Page::VISIBILITY_PUBLIC, null, 0, false, false, DateUtil::getDateTime(), DateUtil::getDateTime() ],
			[ $this->site->id, $this->master->id, $this->master->id, 'Financing', 'financing', CmsGlobal::TYPE_PAGE, Page::STATUS_ACTIVE, Page::VISIBILITY_PUBLIC, null, 0, false, false, DateUtil::getDateTime(), DateUtil::getDateTime() ],
			[ $this->site->id, $this->master->id, $this->master->id, 'How We Work', 'how-we-work', CmsGlobal::TYPE_PAGE, Page::STATUS_ACTIVE, Page::VISIBILITY_PUBLIC, null, 0, false, false, DateUtil::getDateTime(), DateUtil::getDateTime() ],
			[ $this->site->id, $this->master->id, $this->master->id, 'Team', 'team', CmsGlobal::TYPE_PAGE, Page::STATUS_ACTIVE, Page::VISIBILITY_PUBLIC, null, 0, false, false, DateUtil::getDateTime(), DateUtil::getDateTime() ],
		];

		$this->batchInsert( $this->cmgPrefix . 'cms_page', $columns, $pages );

		$summary = "Lorem ipsum is a pseudo-Latin text used in web design, typography, layout, and printing in place of English to emphasise design elements over content. It\'s also called placeholder (or filler) text. It\'s a convenient tool for mock-ups. It helps to outline the visual elements of a document or presentation, eg typography, font, or layout. Lorem ipsum is mostly a part of a Latin text by the classical author and philosopher Cicero.";
		$content = "Lorem ipsum is a pseudo-Latin text used in web design, typography, layout, and printing in place of English to emphasise design elements over content. It\'s also called placeholder (or filler) text. It\'s a convenient tool for mock-ups. It helps to outline the visual elements of a document or presentation, eg typography, font, or layout. Lorem ipsum is mostly a part of a Latin text by the classical author and philosopher Cicero.";

		$columns = [ 'parentId', 'parentType', 'seoName', 'seoDescription', 'seoKeywords', 'seoRobot', 'summary', 'content', 'publishedAt' ];

		$pages	= [
			[ Page::findBySlugType( 'services', CmsGlobal::TYPE_PAGE )->id, CmsGlobal::TYPE_PAGE, null, null, null, null, $summary, $content, DateUtil::getDateTime() ],
			[ Page::findBySlugType( 'faq', CmsGlobal::TYPE_PAGE )->id, CmsGlobal::TYPE_PAGE, null, null, null, null, $summary, $content, DateUtil::getDateTime() ],
			[ Page::findBySlugType( 'about-us', CmsGlobal::TYPE_PAGE )->id, CmsGlobal::TYPE_PAGE, null, null, null, null, $summary, $content, DateUtil::getDateTime() ],
			[ Page::findBySlugType( 'terms', CmsGlobal::TYPE_PAGE )->id, CmsGlobal::TYPE_PAGE, null, null, null, null, $summary, $content, DateUtil::getDateTime() ],
			[ Page::findBySlugType( 'privacy', CmsGlobal::TYPE_PAGE )->id, CmsGlobal::TYPE_PAGE, null, null, null, null, $summary, $content, DateUtil::getDateTime() ],
			[ Page::findBySlugType( 'financing', CmsGlobal::TYPE_PAGE )->id, CmsGlobal::TYPE_PAGE, null, null, null, null, $summary, $content, DateUtil::getDateTime() ],
			[ Page::findBySlugType( 'how-we-work', CmsGlobal::TYPE_PAGE )->id, CmsGlobal::TYPE_PAGE, null, null, null, null, $summary, $content, DateUtil::getDateTime() ],
			[ Page::findBySlugType( 'team', CmsGlobal::TYPE_PAGE )->id, CmsGlobal::TYPE_PAGE, null, null, null, null, $summary, $content, DateUtil::getDateTime() ]
		];

		$this->batchInsert( $this->cmgPrefix . 'cms_model_content', $columns, $pages );
	}

	private function configurePageTemplates() {

		// Templates
		$pageTemplate	= Template::findBySlugType( 'page', CmsGlobal::TYPE_PAGE ,[ 'ignoreSite' => true]);

		// Pages
		$servicesPage		= Page::findBySlugType( 'services', CmsGlobal::TYPE_PAGE, [ 'ignoreSite' => true] );
		$faqPage			= Page::findBySlugType( 'faq', CmsGlobal::TYPE_PAGE, [ 'ignoreSite' => true]);
		$aboutPage			= Page::findBySlugType( 'about-us', CmsGlobal::TYPE_PAGE,[ 'ignoreSite' => true] );
		$termsPage			= Page::findBySlugType( 'terms', CmsGlobal::TYPE_PAGE,[ 'ignoreSite' => true] );
		$privacyPage		= Page::findBySlugType( 'privacy', CmsGlobal::TYPE_PAGE,[ 'ignoreSite' => true] );
		$financingPage		= Page::findBySlugType( 'financing', CmsGlobal::TYPE_PAGE,[ 'ignoreSite' => true] );
		$workPage			= Page::findBySlugType( 'how-we-work', CmsGlobal::TYPE_PAGE,[ 'ignoreSite' => true] );
		$teamPage			= Page::findBySlugType( 'team', CmsGlobal::TYPE_PAGE,[ 'ignoreSite' => true] );

		$pages			= [ $servicesPage->id, $faqPage->id, $aboutPage->id, $termsPage->id, $privacyPage->id, $financingPage->id, $workPage->id, $teamPage->id  ];
		$pages			= join( ',', $pages );

		$this->update( $this->cmgPrefix . 'cms_model_content', [ 'templateId' => $pageTemplate->id ], "id in ($pages)" );
	}

	private function configureTheme() {

		// Theme
		$mainTheme	= Theme::findBySlug( 'news' );

		// Site
		$siteId		= $this->site->id;

		$this->update( $this->cmgPrefix . 'core_site', [ 'themeId' => $mainTheme->id ], "id=$siteId" );
	}

    public function down() {

        echo "m160624_020626_theme_newstheme will be deleted with m160621_014408_core.\n";

        return true;
    }
}
