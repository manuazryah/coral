<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
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
		<div class="contact-addresses col-lg-7 col-md-12 col-sm-12 col-xs-12 white-smoke pad-0">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 box-1 colxs-widthfull">
				<h6>Accounts</h6>
				<?= $contact_data->accounts_info; ?>
				<!--				<ul>
									<li>Phone: 907-821-1234</li>
									<li>Email: office@coralperfumes.com</li>
								</ul>-->
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 box-2 colxs-widthfull">
				<h6>Administration</h6>
				<?= $contact_data->administration_info; ?>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 box-3 colxs-widthfull">
				<h6>Marketing</h6>
				<?= $contact_data->marketing_info; ?>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 box-4 colxs-widthfull">
				<h6>Business</h6>
				<?= $contact_data->business_info; ?>
			</div>
		</div>
		<div class="head-office-address col-lg-5 col-md-12 col-sm-12 col-xs-12 dark-lit-blue">
			<div class="address-box lit-blue">
				<h6>Marketing</h6>
				<?= $contact_data->marketing_address; ?>
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
							<label for="pwd" class="pad-lft-15">Mobile Number*</label>
							<div class="col-md-2 col-sm-2 pad-rght-cont0 date-dropdowns">
								<select class="day" style="border-right: 2px solid #d1d2d0" id="contact-us-country_code" name="ContactUs[country_code]">
									<?php foreach ($country_codes as $country_code) { ?>
										<option value="<?= $country_code ?>" <?= $country_code == $model->country_code ? ' selected' : '' ?>><?= $country_code ?></option>
									<?php }
									?>
								</select>
							</div>
							<div class="col-md-10 col-sm-10 pad-lft-cont0">
								<?= $form->field($model, 'mobile_no')->textInput(['placeholder' => '555 555 5555', 'data-format' => '+1 (ddd) ddd-dddd', 'style' => ''])->label(FALSE) ?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group1">
							<?= $form->field($model, 'country')->dropDownList(['1' => 'UAE'], ['class' => 'select'])->label('Country*'); ?>
						</div>
						<div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group1">
							<?= $form->field($model, 'reason')->dropDownList(['General Questions' => 'General Questions', 'Some Reason' => 'Some Reason', 'Technical' => 'Technical', 'Help' => 'Help'], ['class' => 'select'])->label('Reason for Contact*'); ?>
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

