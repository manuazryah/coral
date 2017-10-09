<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
?>
<div class="pad-20 hide-xs"></div>

<div class="container">
	<div class="breadcrumb">
		<span class="current-page">My account</span>
		<ol class="path">
			<li><?= Html::a('<span>Home</span>', ['/site/index'], ['class' => '']) ?></li>
			<li class="active">My account</li>
		</ol>
	</div>
</div>

<div id="our-product" class="my-account">
	<div class="container">
		<?= Yii::$app->controller->renderPartial('_leftside_menu'); ?>

		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 my-account-cntnt">
			<p class="span-msg">The account information has been saved.</p>
			<p class="customer-name">Hello, <?= ucwords(Yii::$app->user->identity->first_name); ?>!</p>
			<p>From  My Account Dashboard you have the ability to view a snapshot of your recent account activity and update your account
				information. Select a link  to view or edit information.</p>
		</div>

	</div>
</div>

<div class="pad-20"></div>
