<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Checkout';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">

    <div class="row">
        <div class="col-lg-5">
            <h1>Account and Billing Details</h1>
            <?php $form = ActiveForm::begin(['id' => 'checkout-form']); ?>
            <div class="form-group field-useraddress-billing required has-success">
                <label class="control-label" for="useraddress-address">Billing Address</label>
                <select class="form-control" id="billing" name="UserAddress[billing]">
                    <?php foreach ($addresses as $address) { ?>
                        <option value="<?= $address->id ?>" <?php if ($address->status == '1') { ?>selected="selected"<?php } ?>><?= $address->address . ', ' . $address->landmark . ', ' . $address->location ?></option>
                    <?php } ?>
                </select>


                <p class="help-block help-block-error"></p>
            </div>

            <?= $form->field($model, 'address')->textInput(['class' => 'form-control billing_address','readOnly' => true]) ?>
            <?= $form->field($model, 'landmark')->textInput(['class' => 'form-control billing_landmark','readOnly' => true]) ?>
            <?= $form->field($model, 'location')->textInput(['class' => 'form-control billing_location','readOnly' => true]) ?>
            <?= $form->field($model, 'emirate')->textInput(['class' => 'form-control billing_emirate','readOnly' => true]) ?>
            <?= $form->field($model, 'post_code')->textInput(['class' => 'form-control billing_post_code','readOnly' => true]) ?>
            <?= $form->field($model, 'mobile_number')->textInput(['class' => 'form-control billing_mobile_number','readOnly' => true]) ?>





            <?php // ActiveForm::end(); ?>
        </div>
        <div class="col-lg-5">
            <h1>Delivery Details</h1>
            <?php // $form = ActiveForm::begin(['id' => 'checkout-form']); ?>
            <input type="checkbox" name="sameas" class="sameas">Same as above
            <div class="form-group field-useraddress-billing required has-success">
                <label class="control-label" for="useraddress-address">Delivary Address</label>
                <select class="form-control" id="delivery" name="UserAddress[delivary]">
                    <?php foreach ($addresses as $address) { ?>
                        <option value="<?= $address->id ?>" <?php if ($address->status == '1') { ?>selected="selected"<?php } ?>><?= $address->address . ', ' . $address->landmark . ', ' . $address->location ?></option>
                    <?php } ?>
                </select>


                <p class="help-block help-block-error"></p>
            </div>

            <?= $form->field($model, 'address')->textInput(['class' => 'form-control delivery_address','readOnly' => true]) ?>
            <?= $form->field($model, 'landmark')->textInput(['class' => 'form-control delivery_landmark','readOnly' => true]) ?>
            <?= $form->field($model, 'location')->textInput(['class' => 'form-control delivery_location','readOnly' => true]) ?>
            <?= $form->field($model, 'emirate')->textInput(['class' => 'form-control delivery_emirate','readOnly' => true]) ?>
            <?= $form->field($model, 'post_code')->textInput(['class' => 'form-control delivery_post_code','readOnly' => true]) ?>
            <?= $form->field($model, 'mobile_number')->textInput(['class' => 'form-control delivery_mobile_number','readOnly' => true]) ?>



            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
<script>
    $('#billing').on('change', function () {
        var id = $(this).val();
       var $data = changeaddress('billing',id);
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
                    $('.'+formclass+'_address').val($data.address);
                    $('.'+formclass+'_landmark').val($data.landmark);
                    $('.'+formclass+'_location').val($data.location);
                    $('.'+formclass+'_emirate').val($data.emirate);
                    $('.'+formclass+'_post_code').val($data.post_code);
                    $('.'+formclass+'_mobile_number').val($data.mobile_number);
            
                }
        });
    }
</script>
