<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
use yii\widgets\Menu;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
	

</head>
<body>
<?php $this->beginBody() ?>
<?php 
	$session = Yii::$app->session;

	if($session->get('accessList')->access_admin_view == 1){
		$admin_index = true;
	}else{
		$admin_index = false;
	}
	
	if($session->get('accessList')->access_category_index == 1){
		$category_index = true;
	}else{
		$category_index = false;
	}
	
	if($session->get('accessList')->access_product_index == 1){
		$product_index = true;
	}else{
		$product_index = false;
	}
	
	if($session->get('accessList')->access_customer_index == 1){
		$customer_index = true;
	}else{
		$customer_index = false;
	}
	
	if($session->get('accessList')->access_supplier_index == 1){
		$supplier_index = true;
	}else{
		$supplier_index = false;
	}
?>
<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'GST',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [           
            Yii::$app->user->isGuest ?
                ['label' => 'Login', 'url' => ['/site/login']] :
                [
                    'label' => 'Logout (' . Yii::$app->user->identity->user_name . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ],
        ],
    ]);
    NavBar::end();
    ?>
	
	<?php if (!(Yii::$app->user->isGuest)): ?>
		<div class="container-fluid">
		  <div class="row">
			<div class="col-md-2 sidebar">
			<?php
				echo Menu::widget([
					'items' => [
						['label' => 'Admin', 'url' => ['company/view'], 'visible' => $admin_index, 'active'=> \Yii::$app->controller->id == 'company'],
						['label' => 'Category', 'url' => ['/category'], 'visible' => $category_index, 'active'=> \Yii::$app->controller->id == 'category'],
						['label' => 'Products', 'url' => ['/product'], 'visible' => $product_index, 'active'=> \Yii::$app->controller->id == 'product'],
						['label' => 'Customers', 'url' => ['/customer'], 'visible' => $customer_index, 'active'=> \Yii::$app->controller->id == 'customer'],
						['label' => 'Suppliers', 'url' => ['/supplier'], 'visible' => $supplier_index, 'active'=> \Yii::$app->controller->id == 'supplier'],
						['label' => 'Purchase Order', 'url' => ["#"]],
						['label' => 'Quotation', 'url' => ['#']],
						['label' => 'Delivery Order', 'url' => ['#']],
						['label' => 'Invoice', 'url' => ['#']],
						['label' => 'Credit Note', 'url' => ['#']],
						['label' => 'Debit Note', 'url' => ['#']],
						['label' => 'Payment Voucher', 'url' => ['#']],
						['label' => 'Invoice Statement', 'url' => ['#']],
						['label' => 'Logout', 'url' => ['#']],
					],
					'options' => [
						'class' => 'nav nav-sidebar',					
					],
				]);
			?>
			</div>	
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
				<?= Breadcrumbs::widget([
					'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
				]) ?>
			<?= $content ?>
			
			</div>
		  </div>
		</div>
	<?php else: ?>
		<div class="container">
			<?= Breadcrumbs::widget([
				'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
			]) ?>
			<?= $content ?>			
		</div>
	<?php endif; ?>
</div>




<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
