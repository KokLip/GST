<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SupplierSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Suppliers';
$this->params['breadcrumbs'][] = $this->title;
$session = Yii::$app->session;

if($accessView != NULL){
	$view = '{view}';
}else{
	$view = '';
}

if($accessUpdate != NULL){
	$update = '{update}';
}else{
	$update = '';
}

if($accessDelete != NULL){
	$delete = '{delete}';
}else{
	$delete = '';
}
?>
<div class="supplier-index">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= $accessCreate != NULL ? Html::a('Create Supplier', ['create'], ['class' => 'btn btn-success']): ''; ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'supplier_id',
            'supplier_name',
            //'supplier_add1:ntext',
            //'supplier_add2:ntext',
            //'supplier_add3:ntext',
            // 'supplier_poscode',
            'supplier_tel',
            'supplier_fax',
            'supplier_email:email',
            // 'supplier_type',
            // 'supplier_remark:ntext',
            // 'supplier_attention',
            // 'supplier_active',
            // 'supplier_GSTno',

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
