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
use app\models\Access;

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
			$accessList = Access::find()->where(['user_id' => $uid])->one();
			
			if($accessList->access_product_index == 1){
				$index = 'index';
			}
					
			if($accessList->access_product_view == 1){
				$view = 'view';
			}
			
			if($accessList->access_product_update == 1){
				$update = 'update';
			}
			
			if($accessList->access_product_create == 1){
				$create = 'create';
			}
			
			if($accessList->access_product_delete == 1){
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

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	
	public function actionService()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search_service(Yii::$app->request->queryParams);

        return $this->render('service', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
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
		
        return $this->render('view', [
            'model' => $this->findModel($id),
			'categories' => $categories,
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->product_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
				'categories' => $categories,
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->product_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
				'categories' => $categories,
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
