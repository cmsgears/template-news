<?php
namespace widgets\tags;

// Yii Imports
use \Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use cmsgears\core\common\services\resources\CategoryService;


/**
 * It shows the Category Coupons.
 */
class FeaturedTags extends \cmsgears\core\common\base\Widget {

	// Variables ---------------------------------------------------

	// Globals -------------------------------

	// Constants --------------

	// Public -----------------

	// Protected --------------

	// Variables -----------------------------

	// Public -----------------

	public $basePath		= 'tags';
	public $singlePath		= '';

        public $templateDir		= '@widgets/tags/views';

        public $template		= '';


	// Protected --------------


	// Private ----------------

	private	$tags	= [];
	private $type		= 'blog';
        public $tagService;
	// Traits ------------------------------------------------------

	// Constructor and Initialisation ------------------------------

	// Instance methods --------------------------------------------

	// Yii interfaces ------------------------

	// Yii parent classes --------------------

	// yii\base\Widget --------

    public function init() {

        parent::init();


		$this->tagService	= Yii::$app->factory->get( 'tagService' );

		if( isset( $this->type ) ) {

			$this->tags	= $this->tagService->getByType( $this->type );
		}
    }

	// CMG interfaces ------------------------

	// CMG parent classes --------------------

	// cmsgears\core\common\base\Widget

	public function renderWidget( $config = [] ) {

		$tags			= $this->tags;
		$tsgsHtml		= [];

		// Views
		$tagsView		= "$this->templateDir/tags";
		$this->singlePath	= $this->basePath . $this->singlePath;

		foreach( $tags as $tag ) {

			$tagsHtml[]	= $this->render( $tagsView, [ 'tag' => $tag ] );
		}

		
		//$tagsHtml		= implode( '', $tagsHtml );
		$tagsHtml		= "";

		return Html::tag( 'div', $tagsHtml, $this->options );
	}

	// CategoryCoupons -----------------------
}
