<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

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
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ?
                ['label' => 'Login', 'url' => ['/site/login']] :
                [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ],
        ],
    ]);
    NavBar::end();
    ?>
	<div class="container-fluid">
	  <div class="row">
		<div class="col-md-2 sidebar">
		<?php
			echo Menu::widget([
				'items' => [
					['label' => 'Admin', 'url' => ['company/view']],
					['label' => 'Category', 'url' => ['category/index']],
					['label' => 'Products', 'url' => ['product/index']],
					['label' => 'Customers', 'url' => ['#']],
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
</div>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
