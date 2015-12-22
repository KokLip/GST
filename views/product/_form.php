<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="product-form">

    <?php $form = ActiveForm::begin([
		'layout' => 'horizontal',
		'fieldConfig' => [
			'template' => '{label} <div class="row"><div class="col-md-5">{input}{error}{hint}</div></div>',
			'labelOptions' => ['class' => 'col-md-3 control-labe1'],
			'horizontalCssClasses' => [
				'offset' => '',
				'wrapper' => 'col-md-5',
				'error' => '',
				'hint' => '',
			],
		],
	]); ?>

    <?= $form->field($model, 'product_name')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'product_description')->textarea(['rows' => 3]) ?>
	
	<?= $form->field($model, 'product_averageCost')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_sellingPice')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'product_type')->inline()->radioList(array('p'=>'Product', 's'=>'Service')); ?>
	
	<?php $listData=ArrayHelper::map($categories,'category_id','category_name');
		echo $form->field($model, 'product_categoryid')->dropdownList($listData); ?>

	<?php $listData1=ArrayHelper::map($tax,'tax_code','tax_code');
		echo $form->field($model, 'product_supply_tax')->dropdownList($listData1); ?>	

	<?php $listData2=ArrayHelper::map($tax2,'tax_code','tax_code');
		echo $form->field($model, 'product_purchase_tax')->dropdownList($listData2); ?>

    <?= $form->field($model, 'product_stock')->textInput() ?>    
    
    <?= $form->field($model, 'product_reorderLevel')->textInput() ?>

    <?= $form->field($model, 'product_unitName')->textInput(['maxlength' => true]) ?>    

    <?= $form->field($model, 'product_markupPercent')->textInput() ?>    
	
	<?= $form->field($model, 'product_partno')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
	
</div>
