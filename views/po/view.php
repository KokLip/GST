<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PurchaseOrder */

$this->title = $model->purchaseorder_id;
$this->params['breadcrumbs'][] = ['label' => 'Purchase Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="purchase-order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->purchaseorder_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->purchaseorder_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'purchaseorder_id',
            'purchaseorder_no',
            'purchaseorder_date',
            'purchaseorder_date_transaction',
            'purchaseorder_date_delete',
            'purchaseorder_customerid',
            'purchaseorder_supplierid',
            'purchaseorder_supplier_quotation_no',
            'purchaseorder_createid',
            'purchaseorder_createname',
            'purchaseorder_remark:ntext',
            'purchaseorder_system',
            'purchaseorder_partno',
            'purchaseorder_charge',
            'purchaseorder_update_stock_status',
            'purchaseorder_status',
            'purchaseorder_tax_label',
            'purchaseorder_tax_percent',
            'purchaseorder_tax_amount',
            'purchaseorder_printed_status',
            'purchaseorder_revision',
            'purchaseorder_parts_total',
            'purchaseorder_deleteid',
            'purchaseorder_payment_status',
            'purchaseorder_no_user_format',
            'purchaseorder_auto_generate',
            'purchaseorder_creditorid',
            'purchaseorder_purchase_return',
            'purchaseorder_payment_paid_thus_far',
            'purchaseorder_outstanding_amount',
            'purchaseorder_projectid',
            'purchaseorder_gst_payable',
            'purchaseorder_total_amount',
        ],
    ]) ?>

</div>
