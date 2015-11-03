<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Company */

$this->title = "Company Infomation";
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['view']];

$model->company_taxPercent = $model->company_taxPercent  . "%";

if($model->company_inventory == "p"){
	$model->company_inventory = "Invoice & Part List";
}elseif($model->company_inventory == "f"){
	$model->company_inventory = "Invoice & Inventory";
}

if($model->company_partno == "y"){
	$model->company_partno = "Yes";
}elseif($model->company_partno == "n"){
	$model->company_partno = "No";
}

if($model->company_discount == "y"){
	$model->company_discount = "Yes";
}elseif($model->company_discount == "n"){
	$model->company_discount = "No";
}

if($model->company_printerFormat == "y"){
	$model->company_printerFormat = "Full";
}elseif($model->company_printerFormat == "n"){
	$model->company_printerFormat = "Minimum";
}

if($model->company_letterHead == "y"){
	$model->company_letterHead = "Yes";
}elseif($model->company_letterHead == "n"){
	$model->company_letterHead = "No";
}

if($model->company_autogenerateNo == "y"){
	$model->company_autogenerateNo = "Auto Generate";
}elseif($model->company_autogenerateNo == "n"){
	$model->company_autogenerateNo = "Manual Generate";
}

if($model->company_title == 0){
	$model->company_title = "No";
}elseif($model->company_title == 1){
	$model->company_title = "Yes";
}

if($model->company_printSize == 0){
	$model->company_printSize = "Normal";
}elseif($model->company_printSize == 1){
	$model->company_printSize = "Small";
}
?>
<div class="company-view">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->company_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->company_id], [
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
            'company_name:ntext',
            'company_number',
			'company_GSTno',
            'company_add1:ntext',
//'company_add2:ntext',
//'company_add3:ntext',
            'company_poscode',
            'company_tel1',
            'company_tel2',
            'company_fax',
            'company_email:email',
            'company_website',
            'company_inventory',
			'company_taxLabel',
            'company_taxPercent',
            'company_partno',
            'company_discount',			
            'company_printerFormat',
            'company_letterHead',
            'company_autogenerateNo',
            'company_other',
            'company_code',
            'company_title',
            'company_printSize',        
            'company_expiry',
            'company_quotationText:ntext',
            'company_invoiceText:ntext',
            'company_purchaseOrderText:ntext',
            'company_deliveryOrderText:ntext',
            'company_creditNoteText:ntext',
            'company_debitNoteText:ntext',
            'company_receiptText:ntext',                
        ],
    ]) ?>

</div>
