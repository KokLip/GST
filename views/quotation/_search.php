<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\QuotationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="quotation-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'quotation_id') ?>

    <?= $form->field($model, 'quotation_no') ?>

    <?= $form->field($model, 'quotation_date') ?>

    <?= $form->field($model, 'quotation_date_transaction') ?>

    <?= $form->field($model, 'quotation_customerid') ?>

    <?php // echo $form->field($model, 'quotation_createid') ?>

    <?php // echo $form->field($model, 'quotation_createname') ?>

    <?php // echo $form->field($model, 'quotation_remark') ?>

    <?php // echo $form->field($model, 'quotation_system') ?>

    <?php // echo $form->field($model, 'quotation_partno') ?>

    <?php // echo $form->field($model, 'quotation_invoice') ?>

    <?php // echo $form->field($model, 'quotation_deliveryorder') ?>

    <?php // echo $form->field($model, 'quotation_charge') ?>

    <?php // echo $form->field($model, 'quotation_tax_label') ?>

    <?php // echo $form->field($model, 'quotation_tax_percent') ?>

    <?php // echo $form->field($model, 'quotation_tax_amount') ?>

    <?php // echo $form->field($model, 'quotation_printed_status') ?>

    <?php // echo $form->field($model, 'quotation_revision') ?>

    <?php // echo $form->field($model, 'quotation_parts_total') ?>

    <?php // echo $form->field($model, 'quotation_no_user_format') ?>

    <?php // echo $form->field($model, 'quotation_gst_payable') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
