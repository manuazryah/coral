<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="pad-20 hide-xs"></div>
<div class="container">
    <div class="breadcrumb">
        <span class="current-page">login / signup</span>
        <ol class="path">
            <li><?= Html::a('<span>Home</span>', ['index'], ['class' => '']) ?></li>
            <li class="active">Login/signup</li>
        </ol>
    </div>
</div>
<div id="log-in">
    <div class="container">
        <div class="">
            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 lit-blue form-feild-box">
                <h4>Sign in</h4>
                <p class="sub-discrip">Sign in with your email and password.</p>
                <?php $form = ActiveForm::begin(['action' => Yii::$app->homeUrl . 'site/login']); ?>

                <?= $form->field($model_login, 'username')->textInput(['placeholder' => 'username']) ?>

                <?= $form->field($model_login, 'password')->passwordInput(['placeholder' => '********']) ?>

                <?= Html::submitButton('submit', ['class' => 'green2']) ?>
                <div class="form-group col-md-6">
                    <?= $form->field($model_login, 'rememberMe')->checkbox() ?>
                </div>
                <div class="form-group col-md-6">
                    <a href="<?= Yii::$app->homeUrl; ?>site/forgot" style="color: #4694d2;">Forgot your password ?</a>
                </div>

                <?php ActiveForm::end(); ?>
            </div>

            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 lit-blue form-feild-box">
                <h4>Creat Your Account</h4>
                <p class="sub-discrip">*Required fields. You may unsubscribe at any time.</p>
                <?php $form1 = ActiveForm::begin(['action' => Yii::$app->homeUrl . 'site/signup']); ?>
                <div class="form-group col-md-12 form-group1">
                    <label for="usr">Name*</label>
                    <div class="col-md-6 first-name">
                        <?= $form1->field($model, 'first_name')->textInput(['placeholder' => 'First Name'])->label(FALSE) ?>
                    </div>
                    <div class="col-md-6 last-name">
                        <?= $form1->field($model, 'last_name')->textInput(['placeholder' => 'Last Name'])->label(FALSE) ?>
                    </div>
                </div>
                <?= $form->field($model, 'email')->textInput()->label('E-Mail Address*') ?>
                <div class="form-group col-md-6 form-group1">
                    <?= $form->field($model, 'country')->dropDownList(['1' => 'UAE'], ['class' => 'country-select']); ?>
                </div>
                <div class="form-group col-md-6 form-group1">
                    <?= $form->field($model, 'gender')->dropDownList(['1' => 'Male', 2 => 'Female']); ?>
                </div>

                <div class="form-group col-md-6 form-group1">
                    <label for="pwd">D.O.B*</label>
                    <div class="date-dropdowns">
                        <select id="signupform-day" class="day" name="SignupForm[day]">
                            <option value="">DD</option>
                            <?php foreach (Yii::$app->SetValues->Dates() as $value) { ?>
                                <option value="<?= $value ?>"><?= $value ?></option>
                            <?php }
                            ?>
                        </select>
                        <select id="signupform-month" class="month" name="SignupForm[month]">
                            <option value="">MM</option>
                            <?php foreach (Yii::$app->SetValues->Months() as $key => $value) { ?>
                                <option value="<?= $key ?>"><?= $value ?></option>
                            <?php }
                            ?>
                        </select>
                        <select id="signupform-year" class="year" name="SignupForm[year]">
                            <option value="">YY</option>
                            <?php foreach (Yii::$app->SetValues->Years() as $value) { ?>
                                <option value="<?= $value ?>"><?= $value ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-6 form-group1">
                    <?= $form->field($model, 'mobile_no')->textInput() ?>
                </div>
                <div class="form-group col-md-12 form-group1">
                    <?= $form->field($model, 'username')->textInput() ?>
                </div>
                <div class="form-group col-md-12 form-group1">
                    <?= $form->field($model, 'password')->passwordInput()->label('Password*') ?>
                </div>
                <div class="form-group col-md-12 form-group1">
                    <?= $form->field($model, 'password_repeat')->passwordInput()->label('Confirm Password*') ?>
                </div>
                <div class="form-group login-group-checkbox col-md-12">
                    <?= $form1->field($model, 'terms_condition')->checkbox() ?>
                    <!--<label><input type="checkbox" id="lg_remember" name="lg_remember">By checking this box and clicking "Register" below, I acknowledge that I have read and agree to the Terms & Conditions and Privacy Policy</label>-->
                </div>
                <div class="form-group login-group-checkbox col-md-12">
                    <label><input type="checkbox" id="lg_remember" name="lg_remember">Yes, sign me up! I want to receive news, style tips and more, including by email, phone and mail, from Coral Perfumes.</label>
                </div>
                <?= Html::submitButton('submit', ['class' => 'green2']) ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
<div class="pad-20"></div>
