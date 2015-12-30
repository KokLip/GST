<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PurchaseOrder */
$this->registerJsFile('@web/js/jquery-1.3.2.min.js');
$this->title = 'Create Purchase Order';
$this->params['breadcrumbs'][] = ['label' => 'Purchase Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="purchase-order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'model2' => $model2,
		'product' => $product,
		'service' => $service,
		'customer' => $customer,
		'po' => $po,
    ]) ?>

</div>
