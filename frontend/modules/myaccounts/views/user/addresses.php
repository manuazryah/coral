<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    .field-useraddress-address,.field-useraddress-landmark,.field-useraddress-location,.field-useraddress-emirate,.field-useraddress-post_code,.field-useraddress-mobile_number{
        padding-left: 0px !important;
        margin-bottom: 0px;
    }
</style>
<div class="pad-20 hide-xs"></div>

<div class="container">
    <div class="breadcrumb">
        <span class="current-page">personal information</span>
        <ol class="path">
            <li><a href="index.php">Home</a></li>
            <li><a href="my-account.php">My account</a></li>
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
                            <?= $form->field($model, 'emirate')->dropDownList(['1' => 'emirate1', '2' => 'emirate2']) ?>
                        </div>
                        <div class="form-group col-md-4">
                            <?= $form->field($model, 'post_code')->textInput() ?>
                        </div>
                        <div class="form-group col-md-8">
                            <?= $form->field($model, 'mobile_number')->textInput(['maxlength' => true, 'data-format' => "+1 (ddd) ddd-dddd"]) ?>
                        </div>
                        <?= Html::submitButton('save changes', ['class' => 'green2']) ?>
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
                        <p><strong><?= $value->name ?></strong></p>
                        <p><?= $value->address ?></p>
                        <p><?= $value->mobile_number ?></p>
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
        });
    });
</script>
