<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\base\Model;
use app\models\User;
use app\models\UserSearch;
use app\models\Module;
use app\models\SubModule;
use app\models\Access2;

class AccessController extends \yii\web\Controller
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
			$accessIndex = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 23])->one();
			//$accessView = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 14])->one();
			//$accessCreate = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 15])->one();
			$accessUpdate = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 24])->one();
			//$accessDelete = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 17])->one();
			
			if($accessIndex != NULL){
				$index = 'index';
			}
									
			if($accessUpdate != NULL){
				$update = 'update';
			}			
		}
		
        return [
			'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'update'],
                'rules' => [
                    [
                        'allow' => false,
                        'roles' => ['?'],
                    ],	
					[
                        'allow' => true,
						'actions' => [$index, $update],
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
	
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);	
		
		$uid = Yii::$app->user->identity->user_id;
		$accessUpdate = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 24])->one();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,	
			'accessUpdate' => $accessUpdate,			
        ]);
    }
	
	public function actionUpdate($id)
    {
		$model = new Access2();
		//$submodule1 = SubModule::find()->where(['module_id' => 1])->orderBy('sub_module_id')->all();
		//$submodule2 = SubModule::find()->where(['module_id' => 2])->orderBy('sub_module_id')->all();
		$currentaccess = Access2::find()->where(['user_id' => $id])->all();
		$newPermission = new Access2();
		$dropmodule = NULL;
		
		if(isset($_POST['Access2']['permission'])){
			$permissionList = $_POST['Access2']['permission'];			
			$dropmodule = Access2::deleteAll(['and', 'user_id = :user_id', ['not in', 'sub_module_id', $permissionList]],[':user_id' => $id]);
			
			if($permissionList != NULL){
				foreach($permissionList as $value){
					$checkmodule = Access2::find()->where(['user_id' => $id, 'sub_module_id' => $value])->one();
					if($checkmodule == NULL){
						$newPermission = new Access2();
						$newPermission->user_id = $id;
						$newPermission->sub_module_id = $value;
						$newPermission->save();				
					}					
				}		
			}
		}
		if ($newPermission->save()) {
            return $this->redirect(['index']);
        }elseif($newPermission->load(Yii::$app->request->post())){
			return $this->redirect(['index']);
		}else{
			return $this->render('update', [
				'model' => $model,
				'currentaccess' => $currentaccess,
			]);
		}
        
    }
	
	/* public function actionUpdate($id)
    {
        $model = Access2::find()->where(['user_id' => $id])->all();
		$module = Module::find()->orderBy('module_id')->all();
		$submodule = SubModule::find()->orderBy('sub_module_id')->all();
		
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->customer_id]);
        } else {
            return $this->render('update', [
				'model' => $model,
				'module' => $module,
				'submodule' => $submodule,
			]);

        }        
    } */
	
	/* public function actionUpdate($id)
	{
		$model = Access2::find()->where(['user_id' => $id])->all();
		$module = Module::find()->orderBy('module_id')->all();
		// retrieve items to be updated in a batch mode
		// assuming each item is of model class 'Item'
		$items = SubModule::find()->orderBy('sub_module_id')->all();
		if (Model::loadMultiple($items, Yii::$app->request->post()) && 
			Model::validateMultiple($items)) {
			$count = 0;
			foreach ($items as $item) {
			   Yii::$app->db->createCommand()
					->insert('tbaccess2', [
					'user_id' => $id,
					'sub_module_id' => $item->sub_module_id,
					])->execute();
				
					// do something here after saving
					$count++;
				
			}			
			return $this->redirect(['index']); // redirect to your next desired page
		} else {
			return $this->render('update', [
				'items' => $items,   
				'model' => $model,
				'module' => $module,
			]);
		}
	} */

	 protected function findModel($id, $mid)
    {
        if (($model = Access2::find()->where(['user_id' => $id, 'sub_module_id' => $mid])->one()) !== null) {
            return $model;
        } else {
			$model = new Access2();
            return $model;
        }
    }

}
