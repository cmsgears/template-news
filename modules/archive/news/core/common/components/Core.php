<?php
namespace news\core\common\components;

// Yii Imports
use \Yii;

// SF Imports
use news\core\common\config\CoreGlobal;

class Core extends \yii\base\Component {

	// Global -----------------

	// Public -----------------

	// Protected --------------

	// Private ----------------

	// Constructor and Initialisation ------------------------------

    /**
     * Initialise the CMG Core Component.
     */
    public function init() {

        parent::init();

		// Register application components and objects i.e. CMG and Project
		$this->registerComponents();
    }

	// Instance methods --------------------------------------------

	// Yii parent classes --------------------

	// CMG parent classes --------------------

	// Core ----------------------------------

	// Properties

	// Components and Objects

	public function registerComponents() {
	}
}
