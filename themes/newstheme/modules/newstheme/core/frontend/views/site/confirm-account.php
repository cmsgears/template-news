<?php
// Yii Imports
use \Yii;
use yii\helpers\Url;

Yii::$app->session->setFlash( 'userRegistration', "Congratulations! Your account has been successfully confirmed.<br>Please login to continue with us." );

return Yii::$app->response->redirect( Url::to( [ 'login'] ) );
?>