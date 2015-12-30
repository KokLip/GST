<?php

use yii\helpers\Html;
use fedemotta\datatables\DataTables;

/* @var $this yii\web\View */
/* @var $searchModel app\models\QuotationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Quotations';
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
<div class="quotation-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= $accessCreate != NULL ? Html::a('Create Quotation', ['create'], ['class' => 'btn btn-success']): ''; ?>
    </p>

    <?= DataTables::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'quotation_id',
            'quotation_no',
            'quotation_date',
            'quotation_date_transaction',
			'quotation_total_amount',
            // 'quotation_customerid',
            // 'quotation_createid',
            // 'quotation_createname',
            // 'quotation_remark:ntext',
            // 'quotation_system',
            // 'quotation_partno',
            // 'quotation_invoice',
            // 'quotation_deliveryorder',
            // 'quotation_charge',
            // 'quotation_tax_label',
            // 'quotation_tax_percent',
            // 'quotation_tax_amount',
            // 'quotation_printed_status',
            // 'quotation_revision',
            // 'quotation_parts_total',
            // 'quotation_no_user_format',
            // 'quotation_gst_payable',

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
