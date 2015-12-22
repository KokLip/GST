<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Quotation */

$this->title = $model->quotation_id;
$this->params['breadcrumbs'][] = ['label' => 'Quotations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quotation-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->quotation_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->quotation_id], [
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
            'quotation_id',
            'quotation_no',
            'quotation_date',
            'quotation_date_transaction',
            'quotation_customerid',
            'quotation_createid',
            'quotation_createname',
            'quotation_remark:ntext',
            'quotation_system',
            'quotation_partno',
            'quotation_invoice',
            'quotation_deliveryorder',
            'quotation_charge',
            'quotation_tax_label',
            'quotation_tax_percent',
            'quotation_tax_amount',
            'quotation_printed_status',
            'quotation_revision',
            'quotation_parts_total',
            'quotation_no_user_format',
            'quotation_gst_payable',
        ],
    ]) ?>

</div>
