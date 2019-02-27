<?php
namespace news\core\frontend\controllers\apix;

// Yii Imports
use \Yii;
use yii\helpers\Url;

// CMG Imports
use cmsgears\core\common\utilities\AjaxUtil;
use cmsgears\core\common\filters\UserExistFilter;
use cmsgears\core\common\config\CoreGlobal;
use cmsgears\cms\common\config\CmsGlobal;


class PostController extends \cmsgears\cms\frontend\controllers\apix\PostController {

	// Variables ---------------------------------------------------

	// Globals ----------------

	// Public -----------------

	// Protected --------------

	// Private ----------------

	// Constructor and Initialisation ------------------------------

	public $modelService;
	public $metaService;

	// Private ----------------

	// Constructor and Initialisation ------------------------------

	public function init() {

		parent::init();

		$this->crudPermission	= CoreGlobal::PERM_USER;
		$this->modelService		= Yii::$app->factory->get( 'postService' );
		$this->metaService		= Yii::$app->factory->get( 'contentMetaService' );
	}	
	// Instance methods --------------------------------------------

	// Yii interfaces ------------------------

	// Yii parent classes --------------------

	// yii\base\Component -----

    public function behaviors() {

		$behaviors	= parent::behaviors();
		
		$behaviors[ 'verbs'][ 'actions' ][ 'comment' ] 	= [ 'post' ];
		

		return $behaviors;
    }

	// yii\base\Controller ----

    public function actions() {

        $actions						= parent::actions();
        $actions[ 'comment' ]			= [ 'class' => 'cmsgears\core\common\actions\comment\Comment' ];

		return $actions;
    }
}