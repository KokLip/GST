<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="category-form">

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
	
	<?php 
	$accessid= []; 
	foreach($currentaccess as $access){
		$accessid[] = $access->sub_module_id;
	}	
	?>
	
	
	<?php
	function checked($id, $accessid) {
		if (in_array($id, $accessid)) {
			echo "checked";
		}else{
			echo " ";
		}
	}
	?>
	
	<ul id="permission_list" class="list-unstyled">
		<li>	
			<input type="checkbox" name="Access2[permission][]" value="1" class="module_checkboxes " <?php checked(1, $accessid); ?>>
			<span class="text-success">Admin:</span>
			<span class="text-warning">Update</span>
			<ul>
				<li>
					<input type="checkbox" name="Access2[permission][]" value="2" <?php checked(2, $accessid); ?>>	
					<span class="text-info">Update</span>
				</li>				
			</ul>
		</li>
		<li>	
			<input type="checkbox" name="Access2[permission][]" value="3" class="module_checkboxes " <?php checked(3, $accessid); ?>>	
			<span class="text-success">Category:</span>
			<span class="text-warning">View, Create, Update and Delete</span>
			<ul>
				<li>
					<input type="checkbox" name="Access2[permission][]" value="4" <?php checked(4, $accessid); ?>>		
					<span class="text-info">View</span>
				</li>
				<li>
					<input type="checkbox" name="Access2[permission][]" value="5" <?php checked(5, $accessid); ?>>		
					<span class="text-info">Create</span>
				</li>
				<li>
					<input type="checkbox" name="Access2[permission][]" value="6" <?php checked(6, $accessid); ?>>			
					<span class="text-info">Update</span>
				</li>
				<li>
					<input type="checkbox" name="Access2[permission][]" value="7" <?php checked(7, $accessid); ?>>		
					<span class="text-info">Delete</span>
				</li>
			</ul>
		</li>
		<li>	
			<input type="checkbox" name="Access2[permission][]" value="8" class="module_checkboxes " <?php checked(8, $accessid); ?>>	
			<span class="text-success">Products:</span>
			<span class="text-warning">View, Create, Update and Delete</span>
			<ul>
				<li>
					<input type="checkbox" name="Access2[permission][]" value="9" <?php checked(9, $accessid); ?>>		
					<span class="text-info">View</span>
				</li>
				<li>
					<input type="checkbox" name="Access2[permission][]" value="10" <?php checked(10, $accessid); ?>>		
					<span class="text-info">Create</span>
				</li>
				<li>
					<input type="checkbox" name="Access2[permission][]" value="11" <?php checked(11, $accessid); ?>>			
					<span class="text-info">Update</span>
				</li>
				<li>
					<input type="checkbox" name="Access2[permission][]" value="12" <?php checked(12, $accessid); ?>>		
					<span class="text-info">Delete</span>
				</li>
			</ul>
		</li>
		<li>	
			<input type="checkbox" name="Access2[permission][]" value="13" class="module_checkboxes " <?php checked(13, $accessid); ?>>	
			<span class="text-success">Customers:</span>
			<span class="text-warning">View, Create, Update and Delete</span>
			<ul>
				<li>
					<input type="checkbox" name="Access2[permission][]" value="14" <?php checked(14, $accessid); ?>>		
					<span class="text-info">View</span>
				</li>
				<li>
					<input type="checkbox" name="Access2[permission][]" value="15" <?php checked(15, $accessid); ?>>		
					<span class="text-info">Create</span>
				</li>
				<li>
					<input type="checkbox" name="Access2[permission][]" value="16" <?php checked(16, $accessid); ?>>			
					<span class="text-info">Update</span>
				</li>
				<li>
					<input type="checkbox" name="Access2[permission][]" value="17" <?php checked(17, $accessid); ?>>		
					<span class="text-info">Delete</span>
				</li>
			</ul>
		</li>
		<li>	
			<input type="checkbox" name="Access2[permission][]" value="18" class="module_checkboxes " <?php checked(18, $accessid); ?>>	
			<span class="text-success">Suppliers:</span>
			<span class="text-warning">View, Create, Update and Delete</span>
			<ul>
				<li>
					<input type="checkbox" name="Access2[permission][]" value="19" <?php checked(19, $accessid); ?>>		
					<span class="text-info">View</span>
				</li>
				<li>
					<input type="checkbox" name="Access2[permission][]" value="20" <?php checked(20, $accessid); ?>>		
					<span class="text-info">Create</span>
				</li>
				<li>
					<input type="checkbox" name="Access2[permission][]" value="21" <?php checked(21, $accessid); ?>>			
					<span class="text-info">Update</span>
				</li>
				<li>
					<input type="checkbox" name="Access2[permission][]" value="22" <?php checked(22, $accessid); ?>>		
					<span class="text-info">Delete</span>
				</li>
			</ul>
		</li>
		<li>	
			<input type="checkbox" name="Access2[permission][]" value="25" class="module_checkboxes " <?php checked(25, $accessid); ?>>	
			<span class="text-success">Tax Code:</span>
			<span class="text-warning">View, Create, Update and Delete</span>
			<ul>
				<li>
					<input type="checkbox" name="Access2[permission][]" value="26" <?php checked(26, $accessid); ?>>		
					<span class="text-info">View</span>
				</li>
				<li>
					<input type="checkbox" name="Access2[permission][]" value="27" <?php checked(27, $accessid); ?>>		
					<span class="text-info">Create</span>
				</li>
				<li>
					<input type="checkbox" name="Access2[permission][]" value="28" <?php checked(28, $accessid); ?>>			
					<span class="text-info">Update</span>
				</li>
				<li>
					<input type="checkbox" name="Access2[permission][]" value="29" <?php checked(29, $accessid); ?>>		
					<span class="text-info">Delete</span>
				</li>
			</ul>
		</li>
		<li>	
			<input type="checkbox" name="Access2[permission][]" value="30" class="module_checkboxes " <?php checked(30, $accessid); ?>>	
			<span class="text-success">Quotation:</span>
			<span class="text-warning">View, Create, Update and Delete</span>
			<ul>
				<li>
					<input type="checkbox" name="Access2[permission][]" value="31" <?php checked(31, $accessid); ?>>		
					<span class="text-info">View</span>
				</li>
				<li>
					<input type="checkbox" name="Access2[permission][]" value="32" <?php checked(32, $accessid); ?>>		
					<span class="text-info">Create</span>
				</li>
				<li>
					<input type="checkbox" name="Access2[permission][]" value="33" <?php checked(33, $accessid); ?>>			
					<span class="text-info">Update</span>
				</li>
				<li>
					<input type="checkbox" name="Access2[permission][]" value="34" <?php checked(34, $accessid); ?>>		
					<span class="text-info">Delete</span>
				</li>
			</ul>
		</li>
		<li>	
			<input type="checkbox" name="Access2[permission][]" value="23" class="module_checkboxes " <?php checked(23, $accessid); ?>>	
			<span class="text-success">Access Control:</span>
			<span class="text-warning">Update</span>
			<ul>
				<li>
					<input type="checkbox" name="Access2[permission][]" value="24" <?php checked(24, $accessid); ?>>		
					<span class="text-info">View</span>
				</li>				
			</ul>
		</li>
	</ul>
	
	<div class="form-group">
        <?= Html::submitButton('Update', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
