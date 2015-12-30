<?php
namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Module;
use app\models\Access2;

class Menus extends Model
{
    public static function getItems(){
		$items = [];
		$uid = Yii::$app->user->identity->user_id;
		$accessAdmin = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 1])->one();
		$accessCategory = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 3])->one();
		$accessProduct = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 8])->one();
		$accessCustomer = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 13])->one();
		$accessSupplier = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 18])->one();
		$accessTax = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 25])->one();
		$accessQuotation = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 30])->one();
		$accessPO = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 35])->one();
		$accessAccess = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 23])->one();
		
		if($accessAdmin != NULL){
			$modAdmin = Module::find()->where(['module_id' => 1])->one();
			$items[] = ['label' => $modAdmin->module_name, 'url' => [$modAdmin->module_url], 'active'=> \Yii::$app->controller->id == $modAdmin->module_tab_active];
		}else{			
			
		}
		
		if($accessCategory != NULL){
			$modCategory = Module::find()->where(['module_id' => 2])->one();
			$items[] = ['label' => $modCategory->module_name, 'url' => [$modCategory->module_url], 'active'=> \Yii::$app->controller->id == $modCategory->module_tab_active];
		}else{
		
		}
		
		if($accessProduct != NULL){
			$modProduct = Module::find()->where(['module_id' => 3])->one();
			$items[] = ['label' => $modProduct->module_name, 'url' => [$modProduct->module_url], 'active'=> \Yii::$app->controller->id == $modProduct->module_tab_active];
		}else{
		
		}
		
		if($accessCustomer != NULL){
			$modCustomer = Module::find()->where(['module_id' => 4])->one();
			$items[] = ['label' => $modCustomer->module_name, 'url' => [$modCustomer->module_url], 'active'=> \Yii::$app->controller->id == $modCustomer->module_tab_active];
		}else{
		
		}
		
		if($accessSupplier != NULL){
			$modSupplier = Module::find()->where(['module_id' => 5])->one();
			$items[] = ['label' => $modSupplier->module_name, 'url' => [$modSupplier->module_url], 'active'=> \Yii::$app->controller->id == $modSupplier->module_tab_active];
		}else{
		
		}	
		
		if($accessTax != NULL){
			$modSupplier = Module::find()->where(['module_id' => 6])->one();
			$items[] = ['label' => $modSupplier->module_name, 'url' => [$modSupplier->module_url], 'active'=> \Yii::$app->controller->id == $modSupplier->module_tab_active];
		}else{
		
		}
		
		if($accessQuotation != NULL){
			$modSupplier = Module::find()->where(['module_id' => 7])->one();
			$items[] = ['label' => $modSupplier->module_name, 'url' => [$modSupplier->module_url], 'active'=> \Yii::$app->controller->id == $modSupplier->module_tab_active];
		}else{
		
		}	

		if($accessPO != NULL){
			$modSupplier = Module::find()->where(['module_id' => 8])->one();
			$items[] = ['label' => $modSupplier->module_name, 'url' => [$modSupplier->module_url], 'active'=> \Yii::$app->controller->id == $modSupplier->module_tab_active];
		}else{
		
		}	

		if($accessAccess != NULL){
			$modSupplier = Module::find()->where(['module_id' => 9])->one();
			$items[] = ['label' => $modSupplier->module_name, 'url' => [$modSupplier->module_url], 'active'=> \Yii::$app->controller->id == $modSupplier->module_tab_active];
		}else{
		
		}		
	return $items;
	}
}