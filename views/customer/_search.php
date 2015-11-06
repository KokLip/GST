<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CustomerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'customer_id') ?>

    <?= $form->field($model, 'customer_name') ?>

    <?= $form->field($model, 'customer_add1') ?>

    <?= $form->field($model, 'customer_add2') ?>

    <?= $form->field($model, 'customer_add3') ?>

    <?php // echo $form->field($model, 'customer_poscode') ?>

    <?php // echo $form->field($model, 'customer_tel') ?>

    <?php // echo $form->field($model, 'customer_fax') ?>

    <?php // echo $form->field($model, 'customer_email') ?>

    <?php // echo $form->field($model, 'customer_type') ?>

    <?php // echo $form->field($model, 'customer_remark') ?>

    <?php // echo $form->field($model, 'customer_attention') ?>

    <?php // echo $form->field($model, 'customer_active') ?>

    <?php // echo $form->field($model, 'customer_GSTno') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
