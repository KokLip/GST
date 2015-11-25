<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Category */

$this->title = $model->category_name;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$session = Yii::$app->session;
?>
<div class="category-view">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= $accessUpdate != NULL ? Html::a('Update', ['update', 'id' => $model->category_id], ['class' => 'btn btn-primary']):''; ?>
        <?= $accessDelete != NULL ? Html::a('Delete', ['delete', 'id' => $model->category_id], [
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
            'category_id',
            'category_name',
            'category_description:ntext',
        ],
    ]) ?>

</div>
