<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PurchaseOrder */

$this->title = 'Update Purchase Order: ' . ' ' . $model->purchaseorder_id;
$this->params['breadcrumbs'][] = ['label' => 'Purchase Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->purchaseorder_id, 'url' => ['view', 'id' => $model->purchaseorder_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="purchase-order-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form2', [
        'model' => $model,
		'poDetails' => $poDetails,
		'product' => $product,
		'service' => $service,
		'customer' => $customer,
		'thisCustomer' => $thisCustomer,
		'company' => $company,
    ]) ?>

</div>
