<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-form">

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

    <?= $form->field($model, 'customer_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customer_add1')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'customer_add2')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'customer_add3')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'customer_poscode')->textInput() ?>

    <?= $form->field($model, 'customer_tel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customer_fax')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customer_email')->textInput(['maxlength' => true]) ?>    

    <?= $form->field($model, 'customer_remark')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'customer_attention')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customer_GSTno')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
	
	<?php /* $form->field($model, 'customer_type')->inline()->radioList(array('C'=>'Customer', 'S'=>'Supplier')); */?>
</div>
