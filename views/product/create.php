<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = 'Create';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-create">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'categories' => $categories,
		'tax' => $tax,
		'tax2' => $tax2,
    ]) ?>

</div>
