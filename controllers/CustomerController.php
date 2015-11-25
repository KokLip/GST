<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\Customer;
use app\models\CustomerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Access;
use app\models\Access2;

/**
 * CustomerController implements the CRUD actions for Customer model.
 */
class CustomerController extends Controller
{
    public function behaviors()
    {
		$index = '';
		$view = '';
		$update = '';
		$create = '';
		$delete = '';
		
		if(!(Yii::$app->user->isGuest)){
			$uid = Yii::$app->user->identity->user_id;
			$accessIndex = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 13])->one();
			$accessView = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 14])->one();
			$accessCreate = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 15])->one();
			$accessUpdate = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 16])->one();
			$accessDelete = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 17])->one();
			
			if($accessIndex != NULL){
				$index = 'index';
			}
					
			if($accessView != NULL){
				$view = 'view';
			}
			
			if($accessUpdate != NULL){
				$update = 'update';
			}
			
			if($accessCreate != NULL){
				$create = 'create';
			}
			
			if($accessDelete != NULL){
				$delete = 'delete';
			}
		}
		
        return [
			'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'allow' => false,
                        'roles' => ['?'],
                    ],	
					[
                        'allow' => true,
						'actions' => [$index, $view, $create, $update, $delete],
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
     * Lists all Customer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CustomerSearch();
        $dataProvider = $searchModel->search_customer(Yii::$app->request->queryParams);
		
		$uid = Yii::$app->user->identity->user_id;
		$accessView = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 14])->one();
		$accessCreate = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 15])->one();
		$accessUpdate = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 16])->one();
		$accessDelete = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 17])->one();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
			'accessView' => $accessView,
			'accessCreate' => $accessCreate,
			'accessUpdate' => $accessUpdate,
			'accessDelete' => $accessDelete,
        ]);
    }

    /**
     * Displays a single Customer model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		$uid = Yii::$app->user->identity->user_id;		
		$accessUpdate = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 16])->one();
		$accessDelete = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 17])->one();
		
        return $this->render('view', [
            'model' => $this->findModel($id),
			'accessUpdate' => $accessUpdate,
			'accessDelete' => $accessDelete,
        ]);
    }

    /**
     * Creates a new Customer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Customer();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->customer_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Customer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->customer_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Customer model.
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
     * Finds the Customer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Customer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Customer::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
