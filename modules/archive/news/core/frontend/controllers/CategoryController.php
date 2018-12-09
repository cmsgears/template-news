<?php
namespace news\core\frontend\controllers;

// Yii Imports
use \Yii;
use yii\helpers\Url;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use news\core\common\config\CoreGlobal;

class CategoryController extends \cmsgears\core\frontend\controllers\base\Controller {


    

 	public function init() {

        parent::init();

		
	}

	public function actionCategory(  ) {

            $this->layout = CoreGlobal::LAYOUT_LISTING_PRIVATE;
		return $this->render('category');

		throw new NotFoundHttpException( Yii::$app->coreMessage->getMessage( CoreGlobal::ERROR_NOT_FOUND ) );
	}

    
    
}