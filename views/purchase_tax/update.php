<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PurchaseTaxCode */

$this->title = 'Update Purchase Tax Code: ' . ' ' . $model->tax_id;
$this->params['breadcrumbs'][] = ['label' => 'Purchase Tax Codes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tax_id, 'url' => ['view', 'id' => $model->tax_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="purchase-tax-code-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
