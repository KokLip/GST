<?php

namespace app\controllers;

use Yii;
use app\models\PurchaseOrder;
use app\models\PurchaseOrderSearch;
use app\models\PurchaseOrderDetail;
use app\models\Product;
use app\models\Customer;
use app\models\Company;
use app\models\Tax;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Access2;

/**
 * PoController implements the CRUD actions for PurchaseOrder model.
 */
class PoController extends Controller
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
			$accessIndex = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 35])->one();
			$accessView = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 36])->one();
			$accessCreate = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 37])->one();
			$accessUpdate = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 38])->one();
			$accessDelete = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 39])->one();
			
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
     * Lists all PurchaseOrder models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PurchaseOrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$uid = Yii::$app->user->identity->user_id;
		$accessView = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 36])->one();
		$accessCreate = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 37])->one();
		$accessUpdate = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 38])->one();
		$accessDelete = Access2::find()->where(['user_id' => $uid, 'sub_module_id' => 39])->one();

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
     * Displays a single PurchaseOrder model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PurchaseOrder model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PurchaseOrder();
		$model2 = new PurchaseOrderDetail();
		$newPODetail = new PurchaseOrderDetail();
		$product = Product::find()->where(['product_type' => 'p'])->orderBy('product_id')->all();
		$service = Product::find()->where(['product_type' => 's'])->orderBy('product_id')->all();
		$customer = Customer::find()->orderBy('customer_name')->all();
		$po = PurchaseOrder::find()->orderBy((['PurchaseOrder_id'=>SORT_DESC]))->one();
		$uid = Yii::$app->user->identity->user_id;
		$uname = Yii::$app->user->identity->user_name;		
		
		if(isset($_POST['description'])){
			$poDetailList = $_POST['description'];
			$customer_id = $_POST['customer-list'];	
			$po_id = $_POST['po_id'];			
			$po_no = $_POST['po_no'];
			$po_date = $_POST['po_date'];
			$productType = $_POST['productType'];
			$qty = $_POST['qty'];
			$unit = $_POST['unit'];
			$cost = $_POST['cost'];
			$hidden_price = $_POST['hidden_price'];
			$hidden_gst = $_POST['hidden_gst'];
			$hidden_tax_code = $_POST['hidden_tax_code'];
			$hidden_tax_rate = $_POST['hidden_tax_rate'];
			$hidden_price_gst = $_POST['hidden_price_gst'];
			$hidden_total = $_POST['hidden_total'];
			$hidden_gsttotal = $_POST['hidden_gsttotal'];
			$hidden_gstpricetotal = $_POST['hidden_gstpricetotal'];
			$hidden_product_name = $_POST['hidden_product_name'];
			
			if($poDetailList != NULL){
				$newPO = new PurchaseOrder();
				$newPO->purchaseorder_id = $po_id;
				$newPO->purchaseorder_no = $po_no;
				$newPO->purchaseorder_date = $po_date;
				$newPO->purchaseorder_date_transaction = $po_date;
				$newPO->purchaseorder_date_delete = $po_date;
				$newPO->purchaseorder_customerid = $customer_id;
				$newPO->purchaseorder_supplierid = 1;
				$newPO->purchaseorder_supplier_quotation_no = 11;
				$newPO->purchaseorder_createid = $uid;
				$newPO->purchaseorder_createname = $uname;
				$newPO->purchaseorder_remark = "lol";
				$newPO->purchaseorder_system = "y";
				$newPO->purchaseorder_partno = "y";
				$newPO->purchaseorder_charge = 123;
				$newPO->purchaseorder_update_stock_status = "y";
				$newPO->purchaseorder_status = "y";
								
				$newPO->purchaseorder_tax_label = "lol";
				$newPO->purchaseorder_tax_percent = 1;
				$newPO->purchaseorder_tax_amount = 100;
				$newPO->purchaseorder_printed_status = "y";
				$newPO->purchaseorder_revision = 1;
				$newPO->purchaseorder_parts_total = $hidden_total;
				$newPO->purchaseorder_deleteid = 1;
				$newPO->purchaseorder_payment_status = "y";
				$newPO->purchaseorder_no_user_format = "lol";
				$newPO->purchaseorder_auto_generate = "y";
				$newPO->purchaseorder_creditorid = 1;
				$newPO->purchaseorder_purchase_return = 123;
				$newPO->purchaseorder_payment_paid_thus_far = 123;
				$newPO->purchaseorder_outstanding_amount = 123;
				$newPO->purchaseorder_projectid = 1;
				$newPO->purchaseorder_gst_payable = $hidden_gsttotal;
				$newPO->purchaseorder_total_amount = $hidden_gstpricetotal;				
				
				$newPO->save();
				foreach($poDetailList as $key => $n ){
					if($n != NULL){
						if($unit[$key] == NULL){
							$unit[$key] = "-";					
						}
						$newPODetail = new PurchaseOrderDetail();
						$newPODetail->purchaseorderdetail_purchaseorderid = $po_id;
						$newPODetail->purchaseorderdetail_productid = $n;
						$newPODetail->purchaseorderdetail_partno = "lol";
						$newPODetail->purchaseorderdetail_productname = $hidden_product_name[$key];
						$newPODetail->purchaseorderdetail_unit = $qty[$key];
						$newPODetail->purchaseorderdetail_unitname = $unit[$key];
						$newPODetail->purchaseorderdetail_product_cost = $cost[$key];
						$newPODetail->purchaseorderdetail_price = $hidden_price[$key];
						$newPODetail->purchaseorderdetail_unitsent = 0;
						$newPODetail->purchaseorderdetail_status = "y";
						$newPODetail->purchaseorderdetail_tax_code = $hidden_tax_code[$key];
						$newPODetail->purchaseorderdetail_tax_rate = $hidden_tax_rate[$key];
						$newPODetail->purchaseorderdetail_tax_amount = $hidden_gst[$key];
						$newPODetail->purchaseorderdetail_total_amount = $hidden_price_gst[$key];
						$newPODetail->purchaseorderdetail_gst_status = 1;
						$newPODetail->save();	
					}
				}		
			}
		}

        if ($newPODetail->save()) {
            return $this->redirect(['index']);
        }elseif($newPODetail->load(Yii::$app->request->post())){
			return $this->redirect(['index']);
		}else{
            return $this->render('create', [
                'model' => $model,
				'model2' => $model2,
				'product' => $product,
				'service' => $service,
				'customer' => $customer,
				'po' => $po,'model2' => $model2,
				'product' => $product,
				'service' => $service,
				'customer' => $customer,
				'po' => $po,
            ]);
        }
    }

    /**
     * Updates an existing PurchaseOrder model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		$updatePODetail = new PurchaseOrderDetail();
		$poDetails = PurchaseOrderDetail::find()->where(['purchaseorderdetail_purchaseorderid' => $id])->orderBy('purchaseorderdetail_id')->all();
		$product = Product::find()->where(['product_type' => 'p'])->orderBy('product_id')->all();
		$service = Product::find()->where(['product_type' => 's'])->orderBy('product_id')->all();
		$customer = Customer::find()->orderBy('customer_name')->all();
		$company = Company::findOne(1);
		
		$customerID = $model->purchaseorder_customerid;
		$thisCustomer = Customer::findOne($customerID);
		$uid = Yii::$app->user->identity->user_id;
		$uname = Yii::$app->user->identity->user_name;
		
		if(isset($_POST['description'])){
			$poDetailList = $_POST['description'];
			$customer_id = $_POST['customer-list'];	
			$po_id = $_POST['po_id'];			
			$po_no = $_POST['po_no'];
			$po_date = $_POST['po_date'];
			$productType = $_POST['productType'];
			$qty = $_POST['qty'];
			$unit = $_POST['unit'];
			$cost = $_POST['cost'];
			$hidden_price = $_POST['hidden_price'];
			$hidden_gst = $_POST['hidden_gst'];
			$hidden_tax_code = $_POST['hidden_tax_code'];
			$hidden_tax_rate = $_POST['hidden_tax_rate'];
			$hidden_price_gst = $_POST['hidden_price_gst'];
			$hidden_total = $_POST['hidden_total'];
			$hidden_gsttotal = $_POST['hidden_gsttotal'];
			$hidden_gstpricetotal = $_POST['hidden_gstpricetotal'];
			$hidden_id = $_POST['hidden_id'];
			$hidden_poid = $_POST['hidden_poid'];
			$hidden_product_name = $_POST['hidden_product_name'];
			
			if($updateQPODetail != NULL){
				$updateQPODetail = $this->findModel($id);;
				$updateQPODetail->purchaseorder_id = $po_id;
				$updateQPODetail->purchaseorder_no = $po_no;
				$updateQPODetail->purchaseorder_date = $po_date;
				$updateQPODetail->purchaseorder_date_transaction = $po_date;
				$updateQPODetail->purchaseorder_date_delete = $po_date;
				$updateQPODetail->purchaseorder_customerid = $customer_id;
				$updateQPODetail->purchaseorder_supplierid = 1;
				$updateQPODetail->purchaseorder_supplier_quotation_no = 11;
				$updateQPODetail->purchaseorder_createid = $uid;
				$updateQPODetail->purchaseorder_createname = $uname;
				$updateQPODetail->purchaseorder_remark = "lol";
				$updateQPODetail->purchaseorder_system = "y";
				$updateQPODetail->purchaseorder_partno = "y";
				
				$updateQPODetail->purchaseorder_charge = 123;
				$updateQPODetail->purchaseorder_update_stock_status = "y";
				$updateQPODetail->purchaseorder_status = "y";
				$updateQPODetail->purchaseorder_tax_label = "lol";
				$updateQPODetail->purchaseorder_tax_percent = 1;
				$updateQPODetail->purchaseorder_tax_amount = 100;
				$updateQPODetail->purchaseorder_printed_status = "y";
				$updateQPODetail->purchaseorder_revision = 1;
				$updateQPODetail->purchaseorder_parts_total = $hidden_total;
				$updateQPODetail->purchaseorder_deleteid = 1;
				$updateQPODetail->purchaseorder_payment_status = "y";
				$updateQPODetail->purchaseorder_no_user_format = "lol";
				$updateQPODetail->purchaseorder_auto_generate = "y";
				$updateQPODetail->purchaseorder_creditorid = 1;
				$updateQPODetail->purchaseorder_purchase_return = 123;
				$updateQPODetail->purchaseorder_payment_paid_thus_far = 123;
				$updateQPODetail->purchaseorder_outstanding_amount = 123;
				$updateQPODetail->purchaseorder_projectid = 1;
				$updateQPODetail->purchaseorder_gst_payable = $hidden_gsttotal;
				$updateQPODetail->purchaseorder_total_amount = $hidden_gstpricetotal;				
				
				$updateQPODetail->save();
				foreach($poDetailList as $key => $n ){
					if($hidden_poid[$key] != $id || $hidden_poid[$key] == NULL || $hidden_poid[$key] == ''){
						if($unit[$key] == NULL){
							$unit[$key] = "-";					
						}
						$newPODetail = new PurchaseOrderDetail();
						$newPODetail->purchaseorderdetail_purchaseorderid = $po_id;
						$newPODetail->purchaseorderdetail_productid = $n;
						$newPODetail->purchaseorderdetail_partno = "lol";
						$newPODetail->purchaseorderdetail_productname = $hidden_product_name[$key];
						$newPODetail->purchaseorderdetail_unit = $qty[$key];
						$newPODetail->purchaseorderdetail_unitname = $unit[$key];
						$newPODetail->purchaseorderdetail_product_cost = $cost[$key];
						$newPODetail->purchaseorderdetail_price = $hidden_price[$key];
						$newPODetail->purchaseorderdetail_unitsent = 0;
						$newPODetail->purchaseorderdetail_status = "y";
						$newPODetail->purchaseorderdetail_tax_code = $hidden_tax_code[$key];
						$newPODetail->purchaseorderdetail_tax_rate = $hidden_tax_rate[$key];
						$newPODetail->purchaseorderdetail_tax_amount = $hidden_gst[$key];
						$newPODetail->purchaseorderdetail_total_amount = $hidden_price_gst[$key];
						$newPODetail->purchaseorderdetail_gst_status = 1;
						$newPODetail->save();				
					}elseif($hidden_poid[$key] == $id){
						$poid = $hidden_id[$key];
						$updatePODetail = PurchaseOrderDetail::findOne($poid);
						$updatePODetail->purchaseorderdetail_purchaseorderid = $po_id;
						$updatePODetail->purchaseorderdetail_productid = $n;
						$updatePODetail->purchaseorderdetail_partno = "lol";
						$updatePODetail->purchaseorderdetail_productname = $hidden_product_name[$key];
						$updatePODetail->purchaseorderdetail_unit = $qty[$key];
						$updatePODetail->purchaseorderdetail_unitname = $unit[$key];
						$updatePODetail->purchaseorderdetail_product_cost = $cost[$key];
						$updatePODetail->purchaseorderdetail_price = $hidden_price[$key];
						$updatePODetail->purchaseorderdetail_unitsent = 0;
						$updatePODetail->purchaseorderdetail_status = "y";
						$updatePODetail->purchaseorderdetail_tax_code = $hidden_tax_code[$key];
						$updatePODetail->purchaseorderdetail_tax_rate = $hidden_tax_rate[$key];
						$updatePODetail->purchaseorderdetail_tax_amount = $hidden_gst[$key];
						$updatePODetail->purchaseorderdetail_total_amount = $hidden_price_gst[$key];
						$updatePODetail->purchaseorderdetail_gst_status = 1;
						$updatePODetail->save();
					}					
				}		
			}
		}
		
        if ($updatePODetail->save()) {
            return $this->redirect(['index']);
        }elseif($updatePODetail->load(Yii::$app->request->post())){
			return $this->redirect(['index']);
		}else{
            return $this->render('update', [
                'model' => $model,
				'poDetails' => $poDetails,
				'product' => $product,
				'service' => $service,
				'customer' => $customer,
				'thisCustomer' => $thisCustomer,
				'company' => $company,
            ]);
        }
    }

    /**
     * Deletes an existing PurchaseOrder model.
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
     * Finds the PurchaseOrder model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PurchaseOrder the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PurchaseOrder::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
