<?php

use yii\helpers\Html;
use fedemotta\datatables\DataTables;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
$session = Yii::$app->session;

if($session->get('accessList')->access_product_view == 1){
	$view = '{view}';
}else{
	$view = '';
}

if($session->get('accessList')->access_product_update == 1){
	$update = '{update}';
}else{
	$update = '';
}

if($session->get('accessList')->access_product_delete == 1){
	$delete = '{delete}';
}else{
	$delete = '';
}
?>
<div class="product-index">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= $session->get('accessList')->access_product_create == 1 ? Html::a('Create', ['create'], ['class' => 'btn btn-success']): ''; ?>
    </p>
	
	<?php echo Tabs::widget([
		'items' => [
			[
			  'label' => 'Product',
			  'url' => ['product/index'],
			],
			[
			  'label' => 'Service',
			  'url' => ['product/service'],
			],          
		],
	]); ?>

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

            [
				'class' => 'yii\grid\ActionColumn',	
				'template' => $view . ' ' . $update . ' '. $delete,				
				'buttons' => [
				//view button
				'view' => function ($url, $model) {
					return Html::a('<span class="fa fa-search"></span>View', $url, [
						'title' => Yii::t('app', 'View'),
						'class'=>'btn btn-primary btn-xs',                                  
						]);
					},
				],
			],
        ],
    ]); ?>

</div>
