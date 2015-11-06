<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */
if($model->customer_type == 'C'){
	$type = 'Customers';
	$page = 'index';
}elseif($model->customer_type == 'S'){
	$type = 'Suppliers';
	$page = 'supplier';
}

$this->title = 'Update ' . $type .':' . ' ' . $model->customer_name;
$this->params['breadcrumbs'][] = ['label' => $type, 'url' => [$page]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="customer-update">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
