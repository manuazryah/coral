<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Forgot-password';
?>

<div class="pad-20 hide-xs"></div>

<div class="container">
    <div class="breadcrumb">
        <span class="current-page">New password</span>
        <ol class="path">
            <li><?= Html::a('<span>Home</span>', ['/site/index'], ['class' => '']) ?></li>
            <li><?= Html::a('Login/signup', ['/login-signup']) ?></li>
            <li class="active">New password</li>
        </ol>
    </div>
</div>
<div id="log-in">
    <div class="container">
        <div class="">
            <div class="col-lg-5 col-md-5 col-sm-8 col-xs-12 lit-blue form-feild-box align-center boxshadow">
                <h4 class="text-center">Change Your password</h4>

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
                <div style="font-size: 17px;
                     color: hsla(0, 100%, 50%, 0.81);">

                    <?= Yii::$app->session->getFlash('error'); ?>
                    <?= Yii::$app->session->getFlash('success'); ?>
                </div>

                <div class="form-group">
                    <div class="form-group field-employee-password">
                        <label class="control-label" for="new-password">New Password</label>
                        <input type="password" id="new-password" class="form-control input-dark" name="new-password" required>
                        <p class="help-block help-block-error"></p>
                    </div>

                </div>
                <div class="form-group">
                    <div class="form-group field-employee-password">
                        <label class="control-label" for="confirm-password">Confirm Password</label>
                        <input type="password" id="confirm-password" class="form-control input-dark" name="confirm-password" required>
                        <p class="help-block help-block-error"></p>
                    </div>

                </div>
                <?= Html::submitButton('submit', ['class' => 'green2']) ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
<div class="pad-20"></div>