<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */

$this->title = 'Update Access';

$this->params['breadcrumbs'][] = ['label' => 'Access', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
$this->registerJsFile('@web/js/accessCheckbox.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
?>
<div class="customer-update">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
		'model' => $model,
		'currentaccess' => $currentaccess,
    ]) ?>

</div>
