<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\components\CartSummaryWidget;
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
            <div class="heading">
                <p>1. Check out options </p>
            </div>
            <div class="heading margin-auto active">
                <p>2.   Account & Billing Details</p>
            </div>
            <div class="content lit-blue">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php $form = ActiveForm::begin(); ?>

                    <div class="form-group col-lg-12 col-md-8 col-sm-8 col-xs-12 address-field">
                        <label for="usr">Billing Address*</label>
                        <select class="form-control" id="billing" name="UserAddress[billing]">
                            <?php foreach ($addresses as $address) { ?>
                                <option value="<?= $address->id ?>" <?php if ($address->status == '1') { ?>selected="selected"<?php } ?>><?= $address->address . ', ' . $address->landmark . ', ' . $address->location ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12 address-field">
                        <label for="usr">Address</label>
                        <?= $form->field($model, 'address')->textInput(['class' => 'form-control', 'readOnly' => true])->label(FALSE) ?>
                    </div>
                    <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label for="usr">Landmark</label>
                        <?= $form->field($model, 'landmark')->textInput(['class' => 'form-control', 'readOnly' => true])->label(FALSE) ?>
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 location-field">
                        <label for="usr">Location</label>
                        <?= $form->field($model, 'location')->textInput(['class' => 'form-control', 'readOnly' => true])->label(FALSE) ?>
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 emirate-field">
                        <label for="pwd">Emirate</label>
                        <?= $form->field($model, 'emirate')->textInput(['class' => 'form-control', 'readOnly' => true])->label(FALSE) ?>
                    </div>
                    <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12 post-code-field">
                        <label for="pwd">Post Code</label>
                        <?= $form->field($model, 'post_code')->textInput(['class' => 'form-control', 'readOnly' => true])->label(FALSE) ?>
                    </div>
                    <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12 number-field">
                        <label for="pwd">Alternate Mobile Number</label>
                        <?= $form->field($model, 'mobile_number')->textInput(['class' => 'form-control', 'readOnly' => true])->label(FALSE) ?>
                    </div>
                    <div class="form-group login-group-checkbox margin-auto col-md-12">
                        <label> <input type="checkbox" id="lg_remember" name="lg_remember">My delivery and billing addresses are the same.</label>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 lit-blue" style="padding: 0 30px;padding-right: 55px; padding-bottom: 30px; margin-bottom: 5px;">
                <!--<a href="delivery-details.php"> <button class="green2">continue</button></a>-->
                <?= Html::submitButton('continue', ['class' => 'green2']) ?>
            </div>
            <?php ActiveForm::end(); ?>
            <div class="heading">
                <p>3.   Delivery Details</p>
            </div>
            <div class="heading">
                <p>4.   Confirm Order</p>
            </div>
        </div>

        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 product-summery">
            <?= CartSummaryWidget::widget(); ?>
        </div>

    </div>
</div>

<div class="pad-20"></div>
<script>
    $('#billing').on('change', function () {
        var id = $(this).val();
       var $data = changeaddress('useraddress',id);
    });
    $('#delivery').on('change', function () {
        var id = $(this).val();
       var $data = changeaddress('delivery',id);
    });
    function changeaddress(formclass,id) {
        $.ajax({
            type: "POST",
            cache: 'false',
            async: false,
            url: homeUrl + 'checkout/getadress',
            data: {id:id}
        }).done(function (data) {
            var $data = JSON.parse(data);
                if ($data.rslt === "success") {
                    $('#'+formclass+'-address').val($data.address);
                    $('#'+formclass+'-landmark').val($data.landmark);
                    $('#'+formclass+'-location').val($data.location);
                    $('#'+formclass+'-emirate').val($data.emirate);
                    $('#'+formclass+'-post_code').val($data.post_code);
                    $('#'+formclass+'-mobile_number').val($data.mobile_number);
            
                }
        });
    }
</script>