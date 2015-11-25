<?php

use yii\helpers\Html;
use fedemotta\datatables\DataTables;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Access';
$this->params['breadcrumbs'][] = $this->title;

if($accessUpdate != NULL){
	$update = '{update}';
}else{
	$update = '';
}
?>
<div class="customer-index">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

	
    <?= DataTables::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'user_name',
			
			[
				'class' => 'yii\grid\ActionColumn',	
				'template' => $update,				
				
			],        

           
        ],
    ]); ?>

</div>
