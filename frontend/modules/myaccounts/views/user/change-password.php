<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<div class="pad-20 hide-xs"></div>

<div class="container">
    <div class="breadcrumb">
        <span class="current-page">My account</span>
        <ol class="path">
            <li><?= Html::a('<span>Home</span>', ['/site/index'], ['class' => '']) ?></li>
            <li><?= Html::a('<span>My account</span>', ['/myaccounts/user/index'], ['class' => '']) ?></li>
            <li class="active">Change Password</li>
        </ol>
    </div>
</div>

<div id="our-product" class="my-account">
    <div class="container">
        <?= Yii::$app->controller->renderPartial('_leftside_menu'); ?>
        <div class="settings">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 right-box" style="padding: 50px 15px;">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 my-account-cntnt align-center">
                    <div class="form-feild-box">
                        <?php
                        $form = ActiveForm::begin(
                                        [
                                            'id' => 'change-password',
                                            'method' => 'post',
                                            'options' => [
                                                'class' => 'login-form fade-in-effect changepassword-form'
                                            ]
                                        ]
                        );
                        ?>
                        <?php if (!empty(Yii::$app->session->getFlash('error'))) { ?>
                            <div class="error-summary">
                                <?= Yii::$app->session->getFlash('error'); ?>
                            </div>
                        <?php } ?>
                        <div class="form-group col-md-12">
                            <label for="pwd">Old Password*</label>
                            <input type="password" name="old-password" class="form-control" required="" placeholder="********" id="pwd">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="pwd">New Password*</label>
                            <input type="password" class="form-control" name="new-password" required="" placeholder="********" id="pwd">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="pwd">Confirm Password*</label>
                            <input type="password" class="form-control" required="" name="confirm-password" placeholder="********" id="pwd">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 save">
                            <?= Html::submitButton('Save Changes', ['class' => 'green2']) ?>
                        </div>
                        <?php ActiveForm::end(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>

<div class="pad-20"></div>