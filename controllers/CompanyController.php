<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\Company;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Access;
use app\models\Access2;

/**
 * CompanyController implements the CRUD actions for Company model.
 */
class CompanyController extends Controller
{		
    public function behaviors()
    {
		$view = '';
		$update = '';
		
		if(!(Yii::$app->user->isGuest)){
			$uid = Yii::$app->user->identity->user_id;
			$accessView = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 1])->one();			
			$accessUpdate = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 2])->one();			
								
			if($accessView != NULL){
				$view = 'view';
			}
			
			if($accessUpdate != NULL){
				$update = 'update';
			}
			
		}
		
        return [
			'access' => [
                'class' => AccessControl::className(),
                'only' => ['view', 'update'],
                'rules' => [
                    [
                        'allow' => false,
                        'roles' => ['?'],
                    ],
					[
                        'allow' => true,
						'actions' => [$view, $update],
                        'roles' => ['@'],
                    ],					
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

   

    /**
     * Displays a single Company model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id = 1)
    {
		$uid = Yii::$app->user->identity->user_id;
		$accessView = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 1])->one();			
		$accessUpdate = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 2])->one();
			
        return $this->render('view', [
            'model' => $this->findModel($id),
			'accessUpdate' => $accessUpdate,
        ]);
    }

    /**
     * Creates a new Company model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
   

    /**
     * Updates an existing Company model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->company_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Company model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Company model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Company the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Company::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
