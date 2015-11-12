<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SupplierSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="supplier-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'supplier_id') ?>

    <?= $form->field($model, 'supplier_name') ?>

    <?= $form->field($model, 'supplier_add1') ?>

    <?= $form->field($model, 'supplier_add2') ?>

    <?= $form->field($model, 'supplier_add3') ?>

    <?php // echo $form->field($model, 'supplier_poscode') ?>

    <?php // echo $form->field($model, 'supplier_tel') ?>

    <?php // echo $form->field($model, 'supplier_fax') ?>

    <?php // echo $form->field($model, 'supplier_email') ?>

    <?php // echo $form->field($model, 'supplier_type') ?>

    <?php // echo $form->field($model, 'supplier_remark') ?>

    <?php // echo $form->field($model, 'supplier_attention') ?>

    <?php // echo $form->field($model, 'supplier_active') ?>

    <?php // echo $form->field($model, 'supplier_GSTno') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
