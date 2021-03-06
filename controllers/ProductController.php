<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\Product;
use app\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Category;
use app\models\Tax;
use app\models\Tax2;
use app\models\Access;
use app\models\Access2;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
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
			$accessIndex = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 8])->one();
			$accessView = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 9])->one();
			$accessCreate = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 10])->one();
			$accessUpdate = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 11])->one();
			$accessDelete = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 12])->one();
			
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
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search_product(Yii::$app->request->queryParams);
		$uid = Yii::$app->user->identity->user_id;
		$accessIndex = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 8])->one();
		$accessView = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 9])->one();
		$accessCreate = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 10])->one();
		$accessUpdate = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 11])->one();
		$accessDelete = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 12])->one();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
			'accessView' => $accessView,
			'accessCreate' => $accessCreate,
			'accessUpdate' => $accessUpdate,
			'accessDelete' => $accessDelete,
        ]);
    }
	
	public function actionService()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search_service(Yii::$app->request->queryParams);
		$uid = Yii::$app->user->identity->user_id;
		$accessView = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 9])->one();
		$accessCreate = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 10])->one();
		$accessUpdate = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 11])->one();
		$accessDelete = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 12])->one();

        return $this->render('service', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
			'accessView' => $accessView,
			'accessCreate' => $accessCreate,
			'accessUpdate' => $accessUpdate,
			'accessDelete' => $accessDelete,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		$categories = Category::find()->orderBy('category_id')->all();
		$uid = Yii::$app->user->identity->user_id;		
		$accessUpdate = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 11])->one();
		$accessDelete = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 12])->one();
		
        return $this->render('view', [
            'model' => $this->findModel($id),
			'categories' => $categories,
			'accessUpdate' => $accessUpdate,
			'accessDelete' => $accessDelete,
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();
		$categories = Category::find()->orderBy('category_id')->all();
		$tax = Tax::find()->orderBy('tax_id')->all();
		$tax2 = Tax2::find()->orderBy('tax_id')->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->product_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
				'categories' => $categories,
				'tax' => $tax,
				'tax2' => $tax2,
            ]);
        }
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		$categories = Category::find()->orderBy('category_id')->all();
		$tax = Tax::find()->orderBy('tax_id')->all();
		$tax2 = Tax2::find()->orderBy('tax_id')->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->product_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
				'categories' => $categories,
				'tax' => $tax,
				'tax2' => $tax2,
            ]);
        }
    }

    /**
     * Deletes an existing Product model.
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
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
