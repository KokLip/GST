<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Quotation */

$this->title = 'Update Quotation: ' . ' ' . $model->quotation_no;
$this->params['breadcrumbs'][] = ['label' => 'Quotations', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="quotation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form2', [
        'model' => $model,
		'quotationDetails' => $quotationDetails,
		'product' => $product,
		'service' => $service,
		'customer' => $customer,
		'thisCustomer' => $thisCustomer,
		'company' => $company,
    ]) ?>

</div>
