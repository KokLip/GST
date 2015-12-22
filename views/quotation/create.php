<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Quotation */
$this->registerJsFile('@web/js/jquery-1.3.2.min.js');
$this->title = 'Create Quotation';
$this->params['breadcrumbs'][] = ['label' => 'Quotations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quotation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'model2' => $model2,
		'product' => $product,
		'service' => $service,
		'customer' => $customer,
		'quotation' => $quotation,
    ]) ?>

</div>
