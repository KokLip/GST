<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PurchaseOrderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="purchase-order-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'purchaseorder_id') ?>

    <?= $form->field($model, 'purchaseorder_no') ?>

    <?= $form->field($model, 'purchaseorder_date') ?>

    <?= $form->field($model, 'purchaseorder_date_transaction') ?>

    <?= $form->field($model, 'purchaseorder_date_delete') ?>

    <?php // echo $form->field($model, 'purchaseorder_customerid') ?>

    <?php // echo $form->field($model, 'purchaseorder_supplierid') ?>

    <?php // echo $form->field($model, 'purchaseorder_supplier_quotation_no') ?>

    <?php // echo $form->field($model, 'purchaseorder_createid') ?>

    <?php // echo $form->field($model, 'purchaseorder_createname') ?>

    <?php // echo $form->field($model, 'purchaseorder_remark') ?>

    <?php // echo $form->field($model, 'purchaseorder_system') ?>

    <?php // echo $form->field($model, 'purchaseorder_partno') ?>

    <?php // echo $form->field($model, 'purchaseorder_charge') ?>

    <?php // echo $form->field($model, 'purchaseorder_update_stock_status') ?>

    <?php // echo $form->field($model, 'purchaseorder_status') ?>

    <?php // echo $form->field($model, 'purchaseorder_tax_label') ?>

    <?php // echo $form->field($model, 'purchaseorder_tax_percent') ?>

    <?php // echo $form->field($model, 'purchaseorder_tax_amount') ?>

    <?php // echo $form->field($model, 'purchaseorder_printed_status') ?>

    <?php // echo $form->field($model, 'purchaseorder_revision') ?>

    <?php // echo $form->field($model, 'purchaseorder_parts_total') ?>

    <?php // echo $form->field($model, 'purchaseorder_deleteid') ?>

    <?php // echo $form->field($model, 'purchaseorder_payment_status') ?>

    <?php // echo $form->field($model, 'purchaseorder_no_user_format') ?>

    <?php // echo $form->field($model, 'purchaseorder_auto_generate') ?>

    <?php // echo $form->field($model, 'purchaseorder_creditorid') ?>

    <?php // echo $form->field($model, 'purchaseorder_purchase_return') ?>

    <?php // echo $form->field($model, 'purchaseorder_payment_paid_thus_far') ?>

    <?php // echo $form->field($model, 'purchaseorder_outstanding_amount') ?>

    <?php // echo $form->field($model, 'purchaseorder_projectid') ?>

    <?php // echo $form->field($model, 'purchaseorder_gst_payable') ?>

    <?php // echo $form->field($model, 'purchaseorder_total_amount') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
