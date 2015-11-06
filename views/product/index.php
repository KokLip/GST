<?php

use yii\helpers\Html;
use fedemotta\datatables\DataTables;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DataTables::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            'product_name',
			'product_averageCost',
            'product_sellingPice',
            //'product_stock',
            // 'product_categoryid',
            // 'product_description:ntext',
            // 'product_reorderLevel',
            // 'product_unitName',
            // 'product_active',            
            // 'product_markupPercent',
            // 'product_type',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
