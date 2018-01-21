<?php
namespace widgets\categories;

// Yii Imports
use \Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use cmsgears\core\common\services\resources\CategoryService;


/**
 * It shows the Category Coupons.
 */
class FeaturedCategories extends \cmsgears\core\common\base\Widget {

	// Variables ---------------------------------------------------

	// Globals -------------------------------

	// Constants --------------

	// Public -----------------

	// Protected --------------

	// Variables -----------------------------

	// Public -----------------

	public $basePath		= 'categories';
	public $singlePath		= '';

        public $templateDir		= '@widgets/categories/views';

        public $template		= '';


	// Protected --------------


	// Private ----------------

	private	$categories	= [];
	private $type		= 'blog';
        public $categoryService;
	// Traits ------------------------------------------------------

	// Constructor and Initialisation ------------------------------

	// Instance methods --------------------------------------------

	// Yii interfaces ------------------------

	// Yii parent classes --------------------

	// yii\base\Widget --------

    public function init() {

        parent::init();


		$this->categoryService	= Yii::$app->factory->get( 'categoryService' );

		if( isset( $this->type ) ) {

			$this->categories	= $this->categoryService->getFeaturedByType( $this->type );
		}
    }

	// CMG interfaces ------------------------

	// CMG parent classes --------------------

	// cmsgears\core\common\base\Widget

	public function renderWidget( $config = [] ) {

		$categories			= $this->categories;
		$categoriesHtml		= [];

		// Views
		$featuredView		= "$this->templateDir/featured";
		$this->singlePath	= $this->basePath . $this->singlePath;

		foreach( $categories as $category ) {

			$categoriesHtml[]	= $this->render( $featuredView, [ 'category' => $category ] );
		}

		
		$categoriesHtml		= implode( '', $categoriesHtml );


		return Html::tag( 'div', $categoriesHtml, $this->options );
	}

	// CategoryCoupons -----------------------
}


