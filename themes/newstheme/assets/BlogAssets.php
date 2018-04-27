<?php
namespace themes\newstheme\assets;

// Yii Imports
use \Yii;

class BlogAssets extends AssetBundle {

	// Variables ---------------------------------------------------

	// Public ----

	// Load css
    public $css     = [
		'styles/vendor/animate.css',
		'styles/blog.css'
    ];

	// Constructor and Initialisation ------------------------------

	public function __construct()  {

		parent::__construct();
	}
}

?>