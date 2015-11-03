<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->product_name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

if($model->product_type == "p"){
	$model->product_type = "Product";
}elseif($model->product_type == "s"){
	$model->product_type = "Service";
}
?>
<?php foreach ($categories as $category): ?>
    <?php
		if($model->product_categoryid == $category->category_id){
			$model->product_categoryid = $category->category_name;
		}else{
		
		}
	?>
<?php endforeach; ?>
<div class="product-view">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->product_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->product_id], [
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
            //'product_id',            
            'product_name',
			'product_description:ntext',
			'product_averageCost',
            'product_sellingPice',
            'product_stock',
            'product_categoryid',			
            'product_type',
            //'product_reorderLevel',
            //'product_unitName',
            //'product_active',            
            //'product_markupPercent',
			//'product_partno',
        ],
    ]) ?>

</div>
