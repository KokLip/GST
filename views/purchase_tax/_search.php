<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PurchaseTaxSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="purchase-tax-code-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'tax_id') ?>

    <?= $form->field($model, 'tax_code') ?>

    <?= $form->field($model, 'tax_rate') ?>

    <?= $form->field($model, 'tax_description') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
