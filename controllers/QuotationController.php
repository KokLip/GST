<?php

namespace app\controllers;

use Yii;
use app\models\Quotation;
use app\models\QuotationDetail;
use app\models\QuotationSearch;
use app\models\Product;
use app\models\Customer;
use app\models\Company;
use app\models\Tax;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * QuotationController implements the CRUD actions for Quotation model.
 */
class QuotationController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Quotation models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new QuotationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Quotation model.
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
     * Creates a new Quotation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Quotation();
		$model2 = new QuotationDetail();
		$newQuotationDetail = new QuotationDetail();
		$product = Product::find()->where(['product_type' => 'p'])->orderBy('product_id')->all();
		$service = Product::find()->where(['product_type' => 's'])->orderBy('product_id')->all();
		$customer = Customer::find()->orderBy('customer_name')->all();
		$quotation = Quotation::find()->orderBy((['quotation_id'=>SORT_DESC]))->one();
		$uid = Yii::$app->user->identity->user_id;
		$uname = Yii::$app->user->identity->user_name;		
		
		if(isset($_POST['description'])){
			$quotationDetailList = $_POST['description'];
			$customer_id = $_POST['customer-list'];	
			$quotation_id = $_POST['quotation_id'];			
			$quotation_no = $_POST['quotation_no'];
			$quotation_date = $_POST['quotation_date'];
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
			
			if($quotationDetailList != NULL){
				$newQuotation = new Quotation();
				$newQuotation->quotation_id = $quotation_id;
				$newQuotation->quotation_no = $quotation_no;
				$newQuotation->quotation_date = $quotation_date;
				$newQuotation->quotation_date_transaction = $quotation_date;
				$newQuotation->quotation_customerid = $customer_id;
				$newQuotation->quotation_createid = $uid;
				$newQuotation->quotation_createname = $uname;
				$newQuotation->quotation_remark = "lol";
				$newQuotation->quotation_system = "y";
				$newQuotation->quotation_partno = "y";
				
				$newQuotation->quotation_invoice = "123";
				$newQuotation->quotation_deliveryorder = "lol";
				$newQuotation->quotation_charge = 123;
				$newQuotation->quotation_tax_label = "lol";
				$newQuotation->quotation_tax_percent = 1;
				$newQuotation->quotation_tax_amount = 100;
				$newQuotation->quotation_printed_status = "y";
				$newQuotation->quotation_revision = 1;
				$newQuotation->quotation_parts_total = $hidden_total;
				$newQuotation->quotation_no_user_format = "lol";
				$newQuotation->quotation_gst_payable = $hidden_gsttotal;
				$newQuotation->quotation_total_amount = $hidden_gstpricetotal;
				
				
				
				$newQuotation->save();
				foreach($quotationDetailList as $key => $n ){					
					$newQuotationDetail = new QuotationDetail();
					$newQuotationDetail->quotationdetail_quotationid = $quotation_id;
					$newQuotationDetail->quotationdetail_productid = $n;
					$newQuotationDetail->quotationdetail_partno = "lol";
					$newQuotationDetail->quotationdetail_productname = "lol";
					$newQuotationDetail->quotationdetail_unit = $qty[$key];
					$newQuotationDetail->quotationdetail_unitname = $unit[$key];
					$newQuotationDetail->quotationdetail_product_cost = $cost[$key];
					$newQuotationDetail->quotationdetail_price = $hidden_price[$key];
					$newQuotationDetail->quotationdetail_tax_code = $hidden_tax_code[$key];
					$newQuotationDetail->quotationdetail_tax_rate = $hidden_tax_rate[$key];
					$newQuotationDetail->quotationdetail_tax_amount = $hidden_gst[$key];
					$newQuotationDetail->quotationdetail_total_amount = $hidden_price_gst[$key];
					$newQuotationDetail->quotationdetail_gst_status = 1;
					$newQuotationDetail->save();									
				}		
			}
		}

        if ($newQuotationDetail->save()) {
            return $this->redirect(['index']);
        }elseif($newQuotationDetail->load(Yii::$app->request->post())){
			return $this->redirect(['index']);
		}else{
            return $this->render('create', [
                'model' => $model,
				'model2' => $model2,
				'product' => $product,
				'service' => $service,
				'customer' => $customer,
				'quotation' => $quotation,
            ]);
        }
    }

    /**
     * Updates an existing Quotation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		$updateQuotationDetail = new QuotationDetail();
		$quotationDetails = QuotationDetail::find()->where(['quotationdetail_quotationid' => $id])->orderBy('quotationdetail_id')->all();
		$product = Product::find()->where(['product_type' => 'p'])->orderBy('product_id')->all();
		$service = Product::find()->where(['product_type' => 's'])->orderBy('product_id')->all();
		$customer = Customer::find()->orderBy('customer_name')->all();
		$company = Company::findOne(1);
		
		$customerID = $model->quotation_customerid;
		$thisCustomer = Customer::findOne($customerID);
		$uid = Yii::$app->user->identity->user_id;
		$uname = Yii::$app->user->identity->user_name;
		
		if(isset($_POST['description'])){
			$quotationDetailList = $_POST['description'];
			$customer_id = $_POST['customer-list'];	
			$quotation_id = $_POST['quotation_id'];			
			$quotation_no = $_POST['quotation_no'];
			$quotation_date = $_POST['quotation_date'];
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
			$hidden_quotationid = $_POST['hidden_quotationid'];
			
			if($quotationDetailList != NULL){
				$updateQuotation = $this->findModel($id);;
				$updateQuotation->quotation_id = $quotation_id;
				$updateQuotation->quotation_no = $quotation_no;
				$updateQuotation->quotation_date = $quotation_date;
				$updateQuotation->quotation_date_transaction = $quotation_date;
				$updateQuotation->quotation_customerid = $customer_id;
				$updateQuotation->quotation_createid = $uid;
				$updateQuotation->quotation_createname = $uname;
				$updateQuotation->quotation_remark = "lol";
				$updateQuotation->quotation_system = "y";
				$updateQuotation->quotation_partno = "y";
				
				$updateQuotation->quotation_invoice = "123";
				$updateQuotation->quotation_deliveryorder = "lol";
				$updateQuotation->quotation_charge = 123;
				$updateQuotation->quotation_tax_label = "lol";
				$updateQuotation->quotation_tax_percent = 1;
				$updateQuotation->quotation_tax_amount = 100;
				$updateQuotation->quotation_printed_status = "y";
				$updateQuotation->quotation_revision = 1;
				$updateQuotation->quotation_parts_total = $hidden_total;
				$updateQuotation->quotation_no_user_format = "lol";
				$updateQuotation->quotation_gst_payable = $hidden_gsttotal;
				$updateQuotation->quotation_total_amount = $hidden_gstpricetotal;				
				
				$updateQuotation->save();
				foreach($quotationDetailList as $key => $n ){
					if($hidden_quotationid[$key] != $id || $hidden_quotationid[$key] == NULL || $hidden_quotationid[$key] == ''){
						$newQuotationDetail = new QuotationDetail();
						$newQuotationDetail->quotationdetail_quotationid = $quotation_id;
						$newQuotationDetail->quotationdetail_productid = $n;
						$newQuotationDetail->quotationdetail_partno = "lol";
						$newQuotationDetail->quotationdetail_productname = "lol";
						$newQuotationDetail->quotationdetail_unit = $qty[$key];
						$newQuotationDetail->quotationdetail_unitname = $unit[$key];
						$newQuotationDetail->quotationdetail_product_cost = $cost[$key];
						$newQuotationDetail->quotationdetail_price = $hidden_price[$key];
						$newQuotationDetail->quotationdetail_tax_code = $hidden_tax_code[$key];
						$newQuotationDetail->quotationdetail_tax_rate = $hidden_tax_rate[$key];
						$newQuotationDetail->quotationdetail_tax_amount = $hidden_gst[$key];
						$newQuotationDetail->quotationdetail_total_amount = $hidden_price_gst[$key];
						$newQuotationDetail->quotationdetail_gst_status = 1;
						$newQuotationDetail->save();
					}elseif($hidden_quotationid[$key] == $id){
						$qid = $hidden_id[$key];
						$updateQuotationDetail = QuotationDetail::findOne($qid);
						$updateQuotationDetail->quotationdetail_quotationid = $quotation_id;
						$updateQuotationDetail->quotationdetail_productid = $n;
						$updateQuotationDetail->quotationdetail_partno = "lol";
						$updateQuotationDetail->quotationdetail_productname = "lol";
						$updateQuotationDetail->quotationdetail_unit = $qty[$key];
						$updateQuotationDetail->quotationdetail_unitname = $unit[$key];
						$updateQuotationDetail->quotationdetail_product_cost = $cost[$key];
						$updateQuotationDetail->quotationdetail_price = $hidden_price[$key];
						$updateQuotationDetail->quotationdetail_tax_code = $hidden_tax_code[$key];
						$updateQuotationDetail->quotationdetail_tax_rate = $hidden_tax_rate[$key];
						$updateQuotationDetail->quotationdetail_tax_amount = $hidden_gst[$key];
						$updateQuotationDetail->quotationdetail_total_amount = $hidden_price_gst[$key];
						$updateQuotationDetail->quotationdetail_gst_status = 1;
						$updateQuotationDetail->save();
					}					
				}		
			}
		}
		
        if ($updateQuotationDetail->save()) {
            return $this->redirect(['index']);
        }elseif($updateQuotationDetail->load(Yii::$app->request->post())){
			return $this->redirect(['index']);
		}else{
            return $this->render('update', [
                'model' => $model,
				'quotationDetails' => $quotationDetails,
				'product' => $product,
				'service' => $service,
				'customer' => $customer,
				'thisCustomer' => $thisCustomer,
				'company' => $company,
            ]);
        }
    }

    /**
     * Deletes an existing Quotation model.
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
     * Finds the Quotation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Quotation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Quotation::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	public function actionGetCustomerDetail($customerID)
    {        
		$customer = Customer::findOne($customerID);
		echo Json::encode($customer);
    }
	
	public function actionGetProductDetail($productID)
    {        
		$product = Product::findOne($productID);
		echo Json::encode($product);
    }
	
	public function actionGetGstRate($tax_code)
    {        
		$tax = Tax::find()->where(['tax_code' => $tax_code])->one();
		echo Json::encode($tax);
    }
}
