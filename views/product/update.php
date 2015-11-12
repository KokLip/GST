<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

if($model->product_type == 'p'){
	$type = 'Products';
	$page = 'index';
}elseif($model->product_type == 's'){
	$type = 'Services';
	$page = 'service';
}

$this->title = 'Update ' . $type . ':' . ' ' . $model->product_name;
$this->params['breadcrumbs'][] = ['label' => $type, 'url' => [$page]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-update">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'categories' => $categories,
    ]) ?>

</div>
