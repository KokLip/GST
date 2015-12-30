<?php

use yii\helpers\Html;
use fedemotta\datatables\DataTables;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PurchaseOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Purchase Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="purchase-order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Purchase Order', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DataTables::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'purchaseorder_id',
            'purchaseorder_no',
            'purchaseorder_date',
            'purchaseorder_date_transaction',
            'purchaseorder_date_delete',
            // 'purchaseorder_customerid',
            // 'purchaseorder_supplierid',
            // 'purchaseorder_supplier_quotation_no',
            // 'purchaseorder_createid',
            // 'purchaseorder_createname',
            // 'purchaseorder_remark:ntext',
            // 'purchaseorder_system',
            // 'purchaseorder_partno',
            // 'purchaseorder_charge',
            // 'purchaseorder_update_stock_status',
            // 'purchaseorder_status',
            // 'purchaseorder_tax_label',
            // 'purchaseorder_tax_percent',
            // 'purchaseorder_tax_amount',
            // 'purchaseorder_printed_status',
            // 'purchaseorder_revision',
            // 'purchaseorder_parts_total',
            // 'purchaseorder_deleteid',
            // 'purchaseorder_payment_status',
            // 'purchaseorder_no_user_format',
            // 'purchaseorder_auto_generate',
            // 'purchaseorder_creditorid',
            // 'purchaseorder_purchase_return',
            // 'purchaseorder_payment_paid_thus_far',
            // 'purchaseorder_outstanding_amount',
            // 'purchaseorder_projectid',
            // 'purchaseorder_gst_payable',
            // 'purchaseorder_total_amount',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
