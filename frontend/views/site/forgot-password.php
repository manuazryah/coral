<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Forgot-password';
?>
<style>
.margin-auto .form-group {
    padding: 0 0px;
}
</style>

<div class="pad-20 hide-xs"></div>

<div class="container">
	<div class="breadcrumb">
		<span class="current-page">Forgot password</span>
		<ol class="path">
			<li><?= Html::a('<span>Home</span>', ['/site/index'], ['class' => '']) ?></li>
			<li><?= Html::a('Login/signup', ['/login-signup']) ?></li>
			<li class="active">Forgot password</li>
		</ol>
	</div>
</div>
<div id="log-in">
	<div class="container">
		<div class="">
			<div class="col-lg-5 col-md-5 col-sm-8 col-xs-12 lit-blue form-feild-box align-center boxshadow">
				<h4 class="text-center">Forgot Your password?</h4>
				<?php if (Yii::$app->session->hasFlash('error')): ?>
					<div class="alert alert-danger" role="alert">
						<?= Yii::$app->session->getFlash('error') ?>
					</div>
				<?php endif; ?>
				<?php if (Yii::$app->session->hasFlash('success')): ?>
					<div class="alert alert-success" role="alert">
						<?= Yii::$app->session->getFlash('success') ?>
					</div>
				<?php endif; ?>
				<h6 style="font-family: roboto-medium; font-size: 16px; color: #8c8c8c; margin-top: 25px">No Problem!</h6>
				<p class="sub-discrip">We will send you an email to reset your password. Just enter the same email address you used for registration on coralperfumes.com. We will send you an email with instructions for resetting your password.</p>
				<?php
				$form = ActiveForm::begin(
						[
						    'id' => 'forgot-email',
						    'method' => 'post',
						    'options' => [
							'class' => 'login-form fade-in-effect forgot-form'
						    ]
						]
				);
				?>
				<div class="form-group col-md-12 margin-auto">
					<label for="usr">E-Mail Address or Username*</label>
					<?= $form->field($model, 'username')->textInput(['class' => 'form-control', 'placeholder' => "Username or Email", 'autocomplete' => 'off'])->label(false) ?>
				</div>
				<?= Html::submitButton('submit', ['class' => 'green2']) ?>
				<?php ActiveForm::end(); ?>
			</div>
		</div>
	</div>
</div>
<div class="pad-20"></div>