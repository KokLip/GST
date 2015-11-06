<?php

use yii\helpers\Html;
use fedemotta\datatables\DataTables;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-index">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>
	
	<p>
        <?= Html::a('Create', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
		
	<?php echo Tabs::widget([
		'items' => [
			[
			  'label' => 'Customer',
			  'active' => true,
			  'url' => ['customer/index'],
			],
			[
			  'label' => 'Supplier',
			  'url' => ['customer/supplier'],
			],          
		],
	]); ?>

    

    <?= DataTables::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'customer_id',
            'customer_name',
            //'customer_add1:ntext',
            //'customer_add2:ntext',
            //'customer_add3:ntext',
            // 'customer_poscode',
            'customer_tel',
            'customer_fax',
            'customer_email:email',
            // 'customer_type',
            // 'customer_remark:ntext',
            // 'customer_attention',
            // 'customer_active',
            // 'customer_GSTno',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
