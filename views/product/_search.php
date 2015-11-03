<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'product_id') ?>

    <?= $form->field($model, 'product_partno') ?>

    <?= $form->field($model, 'product_name') ?>

    <?= $form->field($model, 'product_sellingPice') ?>

    <?= $form->field($model, 'product_stock') ?>

    <?php // echo $form->field($model, 'product_categoryid') ?>

    <?php // echo $form->field($model, 'product_description') ?>

    <?php // echo $form->field($model, 'product_reorderLevel') ?>

    <?php // echo $form->field($model, 'product_unitName') ?>

    <?php // echo $form->field($model, 'product_active') ?>

    <?php // echo $form->field($model, 'product_averageCost') ?>

    <?php // echo $form->field($model, 'product_markupPercent') ?>

    <?php // echo $form->field($model, 'product_type') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
