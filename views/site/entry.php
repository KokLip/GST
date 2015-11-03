<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>
<?php $form = ActiveForm::begin([
    'layout' => 'horizontal',
    'fieldConfig' => [
        'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
        'horizontalCssClasses' => [
            'label' => 'col-md-2',
            'offset' => 'col-md-offset-2',
            'wrapper' => 'col-md-4',
            'error' => '',
            'hint' => '',
        ],
    ],
]);?>




    <?= $form->field($model, 'name')->textInput(['maxlength'=>10]); ?>

    <?= $form->field($model, 'email') ?>
	
	<?= $form->field($model, 'lol') ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-danger']) ?>
    </div>
	
	

<?php ActiveForm::end(); ?>