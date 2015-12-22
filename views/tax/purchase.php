<?php

use yii\helpers\Html;
use fedemotta\datatables\DataTables;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TaxSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Taxes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tax-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tax', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
	
	<?php echo Tabs::widget([
		'items' => [
			[
			  'label' => 'Supply Tax',
			  'url' => ['tax/index'],
			],
			[
			  'label' => 'Purchase Tax',
			  'active' => true,
			  'url' => ['tax/purchase'],
			],          
		],
	]); ?>

    <?= DataTables::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
			[
			   'attribute' => 'tax_code',
			   'options' => ['width' => '100']
			],
			[
			   'attribute' => 'tax_rate',
			   'options' => ['width' => '100']
			],
			[
			   'attribute' => 'tax_description',
			   'options' => ['width' => '700']
			],

            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
