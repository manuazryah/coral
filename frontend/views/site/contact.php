<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

if (isset($meta_title) && $meta_title != '')
	$this->title = $meta_title;
else
	$this->title = 'coral perfumes';
?>
<div class="pad-20 hide-xs"></div>

<div class="container">
        <div class="breadcrumb">
                <span class="current-page">Contact us</span>
                <ol class="path">
                        <li><?= Html::a('Home', ['/site/index'], ['class' => '']) ?></li>
                        <li class="active">Contact us</li>
                </ol>
        </div>
</div>
<div id="contact-page">
        <div class="g-map">
		<?= $contact_data->map; ?>    </div>

        <div class="contact-info-box">
                <div class="contact-addresses col-lg-6 col-md-12 col-sm-12 col-xs-12 white-smoke pad-0">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 box-1 colxs-widthfull box-min-height">
                                <h6>Accounts</h6>
				<?= $contact_data->accounts_info; ?>
                                <!--				<ul>
                                                                        <li>Phone: 907-821-1234</li>
                                                                        <li>Email: office@coralperfumes.com</li>
                                                                </ul>-->
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 box-2 colxs-widthfull box-min-height">
                                <h6>Administration</h6>
				<?= $contact_data->administration_info; ?>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 box-3 colxs-widthfull box-min-height">
                                <h6>Marketing</h6>
				<?= $contact_data->marketing_info; ?>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 box-4 colxs-widthfull box-min-height">
                                <h6>Business</h6>
				<?= $contact_data->business_info; ?>
                        </div>
                </div>
                <div class="head-office-address col-lg-6 col-md-12 col-sm-12 col-xs-12 dark-lit-blue">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 box-4 colxs-widthfull box-min-height">
                                <!--<h6>Marketing</h6>-->
				<?= $contact_data->address_1; ?>
                        </div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 box-4 colxs-widthfull box-min-height">
                                <!--<h6>Marketing</h6>-->
				<?= $contact_data->address_2; ?>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 box-4 colxs-widthfull box-min-height">
                                <!--<h6>Marketing</h6>-->
				<?= $contact_data->address_3; ?>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 box-4 colxs-widthfull box-min-height">
                                <!--<h6>Marketing</h6>-->
				<?= $contact_data->address_4; ?>
                        </div>
                </div>
        </div>
        <div class="container">
                <div class="contact-form-box">
                        <div class="col-md-12 text-center">
                                <h3>Contact Us</h3>
                                <p><?= $contact_data->content; ?></p>			</div>
                        <br class="hidden-lg hidden-md hidden-sm"/>
			<?php $form = ActiveForm::begin(); ?>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-feild-box margin-auto xs-pad-0">
                                <div class="col-lg-10 col-md-8 col-sm-8 col-xs-12 cntnt-center">

                                        <div class="row">
                                                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group1">
							<?= $form->field($model, 'first_name')->textInput(['placeholder' => 'First Name'])->label('First Name*') ?>
                                                </div>
                                                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group1">
							<?= $form->field($model, 'last_name')->textInput(['placeholder' => 'Last Name'])->label('Last Name*') ?>
                                                </div>
                                        </div>
                                        <div class="row">
                                                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group1">
							<?= $form->field($model, 'email')->textInput(['placeholder' => 'yourname@domain.com'])->label('E-Mail Address*') ?>
                                                </div>
                                                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group1">
							<?= $form->field($model, 'mobile_no')->textInput(['placeholder' => '555 555 5555', 'data-format' => '+1 (ddd) ddd-dddd', 'style' => ''])->label('Mobile Number*') ?>
                                                </div>
                                        </div>
                                        <div class="row">
                                                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group1">
							<?= $form->field($model, 'country')->textInput(['placeholder' => 'Country'])->label('Country*'); ?>
                                                </div>
                                                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group1">
							<?php $form->field($model, 'reason')->dropDownList(['General Questions' => 'General Questions', 'Some Reason' => 'Some Reason', 'Technical' => 'Technical', 'Help' => 'Help'], ['class' => 'select'])->label('Reason for Contact*'); ?>
							<?= $form->field($model, 'reason')->textArea(['rows' => 2])->label('Reason for Contact*'); ?>
                                                </div>
                                        </div>
                                        <div class="form-group col-lg-3 col-md-6 col-sm-12 col-xs-12" style="text-align: center;float: none;margin: 0 auto;left: 0px;right: 0px;clear: both;">
						<?= Html::submitButton('submit', ['class' => 'green2']) ?>
                                        </div>

                                </div>
                        </div>
			<?php ActiveForm::end(); ?>
                </div>
        </div>
        <div class="pad-20"></div>
</div>

