<?php
namespace themes\newstheme\assets;

// Yii Imports
use \Yii;
use yii\web\View;
use yii\helpers\Url;

class AssetBundle extends \yii\web\AssetBundle {

	// Variables ---------------------------------------------------

	// Public ----

	// Path Configuration
	public $sourcePath	= '@themes/newstheme/resources';

	// Position to load css
    public $cssOptions = [
        'position' => View::POS_HEAD
    ];

	// Load Javascript
    public $js      = [
        'scripts/vendor/conditionizr-4.4.0.min.js',
        'conditionizr/detects/ie6-ie7-ie8-ie9.js',
        'scripts/templates.js',
        'scripts/main.js',
		'scripts/apps/main.js',
		'scripts/apps/search.js',
		'scripts/apps/user.js',
		'scripts/apps/generic.js',
		
    ];

	// Position to load Javascript
    public $jsOptions = [
        'position' => View::POS_END
    ];

	// Define dependent Asset Loaders
    public $depends = [
		'yii\web\JqueryAsset',
		'cmsgears\core\common\assets\JqueryUi',
		'cmsgears\core\common\assets\CmgToolsJs',
		'cmsgears\core\common\assets\MCustomScrollbar',
		'cmsgears\core\common\assets\ImagesLoaded',
		'cmsgears\widgets\aform\assets\FormAssets',
		'cmsgears\icons\assets\IconAssets',
		'cmsgears\core\common\assets\Handlebars'
    ];

	// Constructor and Initialisation ------------------------------

	public function __construct()  {

		parent::__construct();
	}

	// Additional Assets Registration ------------------------------

	public function registerAssetFiles( $view ) {

		parent::registerAssetFiles( $view );

		$inlineScript	= "conditionizr.config({
			assets: 'conditionizr/resources/',
		        tests: {
		        ie6: [ 'script', 'style', 'class' ],
		        ie7: [ 'script', 'style', 'class' ],
		        ie8: [ 'script', 'style', 'class' ]
		        }
		    });

    		conditionizr.polyfill( 'scripts/vendor/html5shiv.min.js', [ 'ie6', 'ie7', 'ie8' ] );
    		conditionizr.polyfill( 'scripts/vendor/respond.min.js', [ 'ie6', 'ie7', 'ie8' ] );";

		$rootUrl = Url::toRoute( '/', true );

    	$siteUrl = "var siteUrl 	= '$rootUrl';
					var ajaxUrl 	= '" . $rootUrl ."apix/';";

		$view->registerJs( $inlineScript, View::POS_READY );

		$view->registerJs( $siteUrl, View::POS_END );
	}
}

?>