<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Emirates;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    .field-useraddress-address,.field-useraddress-landmark,.field-useraddress-location,.field-useraddress-emirate,.field-useraddress-post_code,.field-useraddress-mobile_number{
        padding-left: 0px !important;
        margin-bottom: 0px;
    }
    .user-adddress p {
        line-height: 15px;
    }
</style>
<div class="pad-20 hide-xs"></div>

<div class="container">
    <div class="breadcrumb">
        <span class="current-page">personal information</span>
        <ol class="path">
            <li><?= Html::a('<span>Home</span>', ['/site/index'], ['class' => '']) ?></li>
            <li><?= Html::a('<span>My account</span>', ['/myaccounts/user/index'], ['class' => '']) ?></li>
            <li class="active">personal information</li>
        </ol>
    </div>
</div>

<div id="our-product" class="my-account">
    <div class="container">
        <?= Yii::$app->controller->renderPartial('_leftside_menu'); ?>
        <div class="settings">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 right-box" style="padding: 50px 15px;">
                <div class="col-lg-12 col-md-12 col-sm-8 col-xs-12 my-account-cntnt margin-auto align-center">
                    <div class="form-feild-box">
                        <?php $form = ActiveForm::begin(); ?>
                        <div class="col-md-8 pad-0">
                            <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Name*') ?>
                        </div>
                        <div class="form-group col-md-8">
                            <?= $form->field($model, 'address')->textInput(['maxlength' => true])->label('Address*') ?>
                        </div>
                        <div class="form-group col-md-4">
                            <?= $form->field($model, 'landmark')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="form-group col-md-6">
                            <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="form-group col-md-6">
                            <?= $form->field($model, 'emirate')->dropDownList(ArrayHelper::map(Emirates::find()->all(), 'id', 'name'), ['prompt' => 'select']); ?>

                        </div>

                        <div class="form-group col-md-4">
                            <?= $form->field($model, 'post_code')->textInput() ?>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="pwd">Mobile Number</label>
                            <div class="date-dropdowns" style="">
                                <select class="day" style="position: absolute; border-right: 1px solid #d1d2d0" id="user-country_code" name="UserAddress[country_code]">
                                <!--<select id="signupform-day" class="day" name="SignupForm[day]">-->
                                    <?php foreach ($country_codes as $country_code) { ?>
                                        <option value="<?= $country_code ?>" <?= $country_code == $model->country_code ? ' selected' : '' ?>><?= $country_code ?></option>
                                    <?php }
                                    ?>
                                </select>
                                <?= $form->field($model, 'mobile_number')->textInput(['placeholder' => '555 555 5555', 'data-format' => '+1 (ddd) ddd-dddd', 'style' => 'padding-left: 70px;'])->label(FALSE) ?>
                                <!--<input style="padding-left: 70px;" type="phone" id="user-mobile_number" class="form-control" name="UserAddress[mobile_number]" value="<?= $model->mobile_number ?>" maxlength="15" aria-invalid="false" data-format="+1 (ddd) ddd-dddd">-->
                            </div>
                        </div>
                        <?= Html::submitButton('Create', ['class' => 'green2']) ?>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 user-addresses">
                <h6>Your Saved Addresses:</h6>
                <?php
                foreach ($user_address as $value) {
                    ?>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 user-adddress lit-blue" id="useraddress-<?= $value->id ?>">
                        <div class="user-address-hei">
                            <p><strong><?= $value->name ?></strong></p>
                            <p><?= $value->address ?></p>
                            <p><?= $value->landmark ?></p>
                            <p><?= $value->location ?></p>
                            <p><?= $value->post_code ?></p>
                            <p><?= $value->mobile_number ?></p>
                        </div>
                        <label id="Radio0">
                            <input type="radio" name="default-address" value="<?= $value->id ?>" <?php
                            if ($value->status == 1) {
                                echo ' checked';
                            }
                            ?> data-waschecked="true" />
                            Default address
                        </label>
                        <a href="" class="delete-address" data-val="<?= $value->id ?>"><i class="fa fa-trash" aria-hidden="true"></i>Delete address</a>
                    </div>
                <?php }
                ?>

            </div>
        </div>
    </div>

</div>
</div>

<div class="pad-20"></div>

<script>
    $(document).ready(function () {
        $('input[type=radio][name=default-address]').change(function () {
            var idd = $(this).val();
            $.ajax({
                url: '<?= Yii::$app->homeUrl; ?>myaccounts/user/change-status',
                type: "POST",
                data: {id: idd},
                success: function (data) {
                }
            });
        });
        $('.delete-address').on('click', function () {
            if (confirm("Are you sure you want to delete this?"))
            {
                var idd = $(this).attr('data-val');
                $.ajax({
                    url: '<?= Yii::$app->homeUrl; ?>myaccounts/user/remove-address',
                    type: "POST",
                    data: {id: idd},
                    success: function (data) {
                        if (data == 1) {
                            $("#useraddress-" + idd).remove();
                        }
                    }
                });
            }
        });
    });
</script>
