<?php
namespace themes\adminchild;

// Yii Imports
use \Yii;

use themes\adminchild\assets\ChildAssetBundle;

class Theme {

	public function registerAssets( $view ) {

		ChildAssetBundle::register( $view );
	}
}