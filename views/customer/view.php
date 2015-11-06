<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */

if($model->customer_type == 'C'){
	$type = 'Customers';
	$page = 'index';
}elseif($model->customer_type == 'S'){
	$type = 'Suppliers';
	$page = 'supplier';
}

$this->title = $model->customer_name;
$this->params['breadcrumbs'][] = ['label' => $type, 'url' => [$page]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-view">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->customer_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->customer_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'customer_id',
            'customer_name',
            'customer_add1:ntext',
            'customer_add2:ntext',
            'customer_add3:ntext',
            'customer_poscode',
            'customer_tel',
            'customer_fax',
            'customer_email:email',
            'customer_type',
            'customer_remark:ntext',
            'customer_attention',
            'customer_active',
            'customer_GSTno',
        ],
    ]) ?>

</div>
