<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Company */

$this->title = 'Update: Company Infomation';
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['view']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="company-update">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
