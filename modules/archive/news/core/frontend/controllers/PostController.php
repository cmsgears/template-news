<?php 
namespace news\core\frontend\controllers;

use cmsgears\cms\common\models\entities\Post;
use cmsgears\core\frontend\config\WebGlobalCore;

class PostController extends \cmsgears\core\frontend\controllers\base\Controller {
	
	public function actionBasic() { 	
		
		$this->layout	= WebGlobalCore::LAYOUT_PRIVATE	;
		
		$post = new Post();
		
		return $this->render('basic', ['post' => $post]);
		
	}
	
}
