<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Emirates;
use yii\helpers\ArrayHelper;
use common\components\CartSummaryWidget;

$this->title = 'Checkout-Delivery';
?>
<div class="pad-20 hide-xs"></div>

<div class="container">
        <div class="breadcrumb">
                <span class="current-page">My account</span>
                <ol class="path">
                        <li><?= Html::a('<span>Home</span>', ['index'], ['class' => '']) ?></li>
                        <li class="active">My account</li>
                </ol>
        </div>
</div>

<div id="checkout" class="my-account">
        <div class="container">
                <div class="col-lg-7 col-md-7 col-sm-12 left-accordation">
                        <div class="heading">
                                <p>1. Check out options </p>
                        </div>

                        <div class="heading margin-auto active">
                                <p>2.   Promotions</p>
                        </div>
                        <div class="content lit-blue delivery-details">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <?php $form = ActiveForm::begin(); ?>
                                        <div class="form-group col-lg-12 col-md-8 col-sm-8 col-xs-12 address-field">
                                                <label for="pwd"> Code</label>
                                                <?= $form->field($promotion, 'promotion_code')->textInput(['class' => 'form-control delivery'])->label(FALSE) ?>
                                        </div>
                                </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 lit-blue" style="padding: 0 30px;padding-right: 55px; padding-bottom: 30px; margin-bottom: 5px;">
                                <?= Html::submitButton('continue', ['class' => 'green2']) ?>
                        </div>
                        <?php ActiveForm::end(); ?>
                        <div class="heading">
                                <p>3.   Account & Billing Details</p>
                        </div>
                        <div class="heading">
                                <p>4.   Delivery Details</p>
                        </div>

                        <div class="heading">
                                <p>5.   Confirm Order</p>
                        </div>
                </div>

                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 product-summery">
                        <?= CartSummaryWidget::widget(); ?>
                </div>

        </div>
</div>

<div class="pad-20"></div>
<script>

        $('#delivery').on('change', function () {
                var id = $(this).val();
                if (id === '') {
                        $('.delivery').prop('readonly', false);
                } else {
                        $('.delivery').prop('readonly', true);
                }
                changeaddress('useraddress', id);
        });
        function changeaddress(formclass, id) {
                $.ajax({
                        type: "POST",
                        cache: 'false',
                        async: false,
                        url: homeUrl + 'checkout/getadress',
                        data: {id: id}
                }).done(function (data) {
                        var $data = JSON.parse(data);
                        if ($data.rslt === "success") {
                                $('#' + formclass + '-name').val($data.name);
                                $('#' + formclass + '-address').val($data.address);
                                $('#' + formclass + '-landmark').val($data.landmark);
                                $('#' + formclass + '-location').val($data.location);
                                $('#' + formclass + '-emirate').val($data.emirate);
                                $('#' + formclass + '-post_code').val($data.post_code);
                                $('#' + formclass + '-mobile_number').val($data.mobile_number);
                                $('#' + formclass + '-country_code').val($data.country_code);

                        } else {
                                $('#' + formclass + '-name').val('');
                                $('#' + formclass + '-address').val('');
                                $('#' + formclass + '-landmark').val('');
                                $('#' + formclass + '-location').val('');
                                $('#' + formclass + '-emirate').val('');
                                $('#' + formclass + '-post_code').val('');
                                $('#' + formclass + '-mobile_number').val('');
//                $('#' + formclass + '-country_code').val('');
                        }
                });
        }
</script>