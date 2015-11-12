<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Supplier */

$this->title = $model->supplier_name;
$this->params['breadcrumbs'][] = ['label' => 'Suppliers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$session = Yii::$app->session;
?>
<div class="supplier-view">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= $session->get('accessList')->access_supplier_update == 1 ? Html::a('Update', ['update', 'id' => $model->supplier_id], ['class' => 'btn btn-primary']): ''; ?>
        <?= $session->get('accessList')->access_supplier_delete == 1 ? Html::a('Delete', ['delete', 'id' => $model->supplier_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]): ''; ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'supplier_id',
            'supplier_name',
            'supplier_add1:ntext',
            'supplier_add2:ntext',
            'supplier_add3:ntext',
            'supplier_poscode',
            'supplier_tel',
            'supplier_fax',
            'supplier_email:email',
            'supplier_type',
            'supplier_remark:ntext',
            'supplier_attention',
            'supplier_active',
            'supplier_GSTno',
        ],
    ]) ?>

</div>
