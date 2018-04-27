<?php
namespace news\core\admin;

// Yii Imports
use \Yii;

class Module extends \cmsgears\core\common\base\Module {

    public $controllerNamespace = 'news\core\admin\controllers';

    public function init() {

        parent::init();

        $this->setViewPath( '@news/core/admin/views' );
    }

	public function getSidebarHtml() {

		$path	= Yii::getAlias( '@news' ) . '/core/admin/views/sidebar.php';

		return $path;
	}
}