<?php

use yii\helpers\Html;
use common\components\CartSummaryWidget;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

$country_codes = ArrayHelper::map(\common\models\CountryCode::find()->where(['status' => 1])->orderBy(['id' => SORT_ASC])->all(), 'id', 'country_code');
$this->title = 'Checkout';
?>
<div class="pad-20 hide-xs"></div>

<div class="container">
    <div class="breadcrumb">
        <span class="current-page">My account</span>
        <ol class="path">
            <li><a href="index.php">Home</a></li>
            <li class="active">My account</li>
        </ol>
    </div>
</div>

<div id="checkout" class="my-account">
    <div class="container">
        <div class="col-lg-7 col-md-7 col-sm-12 left-accordation">
            <div class="heading margin-auto active">
                <p>1. Check out options </p>
            </div>
            <div class="content lit-blue">
                <div class="col-lg-8">
                    <div class="tab-btn">
                        <a href="#" class="guest active">Order as a guest</a>
                        <?= Html::a('sign in', ['/site/login-signup'], ['class' => 'sign-in']) ?>
                    </div>
                    <?php $form = ActiveForm::begin(); ?>
                    <?php if (isset($user)) {
                        echo $form->errorSummary($user);
                    }
                    ?>
                    <div class="form-group col-md-12">
                        <label for="usr">Name*</label>
                        <div class="col-md-6 first-name">
                            <?= $form->field($model, 'first_name')->textInput(['placeholder' => 'First Name'])->label(FALSE) ?>
                        </div>
                        <div class="col-md-6 last-name">
<?= $form->field($model, 'last_name')->textInput(['placeholder' => 'Last Name'])->label(FALSE) ?>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="usr">E-Mail Address*</label>
<?= $form->field($model, 'email')->textInput(['placeholder' => 'yourname@domain.com'])->label(FALSE) ?>
                    </div>
                    <div class="form-group col-md-12 margin-auto">
                        <label for="pwd">Mobile Number*</label>
                        <div class="date-dropdowns">
                            <select class="day" style="position: absolute; border-right: 1px solid #d1d2d0" name="CartsignupForm[country_code]">
                            <!--<select id="signupform-day" class="day" name="SignupForm[day]">-->
                                <?php foreach ($country_codes as $country_code) { ?>
                                    <option value="<?= $country_code ?>"><?= $country_code ?></option>
<?php }
?>
                            </select>
                            <input style="padding-left: 70px;" type="phone" id="signupform-mobile_no" class="form-control" name="CartsignupForm[mobile_no]" value="" data-format="+1 (ddd) ddd-dddd" placeholder="555 555 5555">
                        </div>
                                <!--<input type="phone" class="form-control" data-format="+1 (ddd) ddd-dddd" name="phone" id="phone" />-->
                    </div>
                    <div class="form-group login-group-checkbox margin-auto col-md-12">
                        <?= $form->field($model, 'offer')->checkbox(); ?>
                    </div>
                    <div class="form-group login-group-checkbox margin-auto col-md-12">
<?= $form->field($model, 'newsletter')->checkbox(); ?>
                        <p class="checkbox-msg">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 lit-blue" style="padding: 0 30px;padding-right: 55px; padding-bottom: 30px; margin-bottom: 5px;">
                <?= Html::a('<button class="continue-shopping">Return to cart</button>', ['/cart/mycart'], ['class' => '']) ?>
<?= Html::submitButton('continue', ['class' => 'green2']) ?>
<?php ActiveForm::end(); ?>
            </div>
            <div class="heading">
                <p>2.   Account & Billing Details</p>
            </div>
            <div class="heading">
                <p>3.   Delivery Details</p>
            </div>
            <div class="heading">
                <p>4.   Confirm Order</p>
            </div>
        </div>

        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 product-summery">
<?php // CartSummaryWidget::widget();  ?>
        </div>

    </div>
</div>

<div class="pad-20"></div>