<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="pad-20 hide-xs"></div>

<div class="container">
    <div class="breadcrumb">
        <span class="current-page">Update Email/Mobile</span>
        <ol class="path">
            <li><?= Html::a('<span>Home</span>', ['/site/index'], ['class' => '']) ?></li>
            <li><?= Html::a('<span>My account</span>', ['/myaccounts/user/index'], ['class' => '']) ?></li>
            <li class="active">Email/Mobile</li>
        </ol>
    </div>
</div>

<div id="our-product" class="my-account">
    <div class="container">
        <?= Yii::$app->controller->renderPartial('_leftside_menu'); ?>
        <div class="settings">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 right-box" style="padding: 50px 15px;">
                <div class="col-lg-12 col-md-12 col-sm-8 col-xs-12 my-account-cntnt margin-auto align-center">
                    <p class="contact-information">Enter the new Email ID / Mobile number you wish to associate with your account. </p>
                    <div class="row">
                        <div class="form-feild-box pad-lft0">
                            <?php $form = ActiveForm::begin(); ?>
                            <div class="col-md-8 pad-0">
                                <?= $form->field($model, 'email')->textInput(['maxlength' => true])->label('Email') ?>
                            </div>
                            <div class="form-group col-md-8">
                                <label for="pwd">Mobile Number</label>
                                <div class="date-dropdowns">
                                    <select class="day" style="position: absolute; border-right: 1px solid #d1d2d0" id="user-country_code" name="User[country_code]">
                                    <!--<select id="signupform-day" class="day" name="SignupForm[day]">-->
                                        <?php foreach ($country_codes as $country_code) { ?>
                                            <option value="<?= $country_code ?>" <?= $country_code == $model->country_code ? ' selected' : '' ?>><?= $country_code ?></option>
                                        <?php }
                                        ?>
                                    </select>
                                    <input style="padding-left: 70px;" type="phone" id="user-mobile_no" class="form-control" name="User[mobile_no]" value="<?= $model->mobile_no ?>" maxlength="15" aria-invalid="false" data-format="+1 (ddd) ddd-dddd">
                                </div>
                            </div>
                            <!--                            <div class="col-md-8 pad-0">
                            <?php // $form->field($model, 'mobile_no')->textInput(['maxlength' => true])->label('Mobile No')    ?>
                                                        </div>-->
                            <div class="col-md-8">
                                <?= Html::submitButton('save changes', ['class' => 'green2']) ?>
                            </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                    <div class="pad-20"></div>
                    <p class="contact-information">What happens when I update my email address (or mobile number)?</p>
                    <p class="contact-info-sub">our login email id (or mobile number) changes, likewise. You'll receive all your account related communication on your updated email address (or mobile number).</p>

                    <p class="contact-information">When will my Flipkart account be updated with the new email address (or mobile number)?</p>
                    <p class="contact-info-sub">It happens as soon as you confirm the verification code sent to your email (or mobile) and save the changes.</p>

                    <p class="contact-information">What happens to my existing Flipkart account when I update my email address (or mobile number)?</p>
                    <p class="contact-info-sub">Updating your email address (or mobile number) doesn't invalidate your account. Your account remains fully functional. You'll continue seeing your Order history, saved information and personal details.</p>

                    <p class="contact-information">Does my Seller account get affected when I update my email address?</p>
                    <p class="contact-info-sub">Coral Perfume has a 'single sign-on' policy. Any changes will reflect in your Seller account also.</p>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="pad-20"></div>
