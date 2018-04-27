<?php
namespace themes\newstheme;

// Yii Imports
use \Yii;

class Theme extends \cmsgears\core\common\base\Theme {

	// Menus --------------------------------------------------------

	const MENU_MAIN			= 'main';
        const MENU_MAIN_PRIVATE         = 'private-main-menu';
	const MENU_SECONDARY	= 'secondary';
	const MENU_CATEGORIES	= 'categories';
	const MENU_ABOUT_US		= 'about-us';
	const MENU_MORE    		= 'more';
	const MENU_FEATURED		= 'featured';
	const MENU_PAGE			= 'page';
    const MENU_MERCHANT     = 'merchant';

	// Widgets ------------------------------------------------------

	const WIDGET_FOLLOW_US		= 'follow-us';
	const WIDGET_INFO_FOOTER	= 'footer-info';
	const WIDGET_ADDRESS_MAIN	= 'main-address';

	// Variables ----------------------------------------------------

	// Public

    public $pathMap = [
        '@frontend/views' => '@themes/newstheme/views',
        '@cmsgears' => '@themes/newstheme/modules/cmsgears',
        '@news' => '@themes/newstheme/modules/newstheme'
    ];

	// Initialisation -----------------------------------------------

    public function init() {

        parent::init();

		// The path for templates
		Yii::setAlias( '@templates', '@themes/newstheme/views/templates' );
	}
}

?>