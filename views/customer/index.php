<?php

use yii\helpers\Html;
use fedemotta\datatables\DataTables;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customers';
$this->params['breadcrumbs'][] = $this->title;

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
<div class="customer-index">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>
	
	<p>
        <?= $accessCreate != NULL ? Html::a('Create', ['create'], ['class' => 'btn btn-success']): ''; ?>
    </p>
	
    <?= DataTables::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'customer_id',
            'customer_name',
            //'customer_add1:ntext',
            //'customer_add2:ntext',
            //'customer_add3:ntext',
            // 'customer_poscode',
            'customer_tel',
            'customer_fax',
            'customer_email:email',
            // 'customer_type',
            // 'customer_remark:ntext',
            // 'customer_attention',
            // 'customer_active',
            // 'customer_GSTno',

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
