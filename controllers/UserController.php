<?php

namespace app\controllers;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Access;

class UserController extends \yii\web\Controller
{
    public function actionMain()
    {        
		$uid = Yii::$app->user->identity->user_id;
		$access = Access::find()->where(['user_id' => $uid]);
        Yii::$app->view->params['customParam'] = 'customValue';
		$this->view->params['customParam'] = 'customValue';
        
		return $this->render('/layouts/main', [
			'param' => 'lol',
		]);
        
    }

}
