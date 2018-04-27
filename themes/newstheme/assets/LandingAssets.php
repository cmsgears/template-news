<?php
namespace themes\newstheme\assets;

// Yii Imports
use \Yii;

class LandingAssets extends AssetBundle {

	// Variables ---------------------------------------------------

	// Public ----

	// Load css
    public $css     = [
    	'styles/vendor/animate.css',
		'styles/landing.css'
    ];

	// Constructor and Initialisation ------------------------------

	public function __construct()  {

		parent::__construct();

		$this->depends[]	= 'foxslider\widgets\assets\FxsAssets';
	}
}

?>