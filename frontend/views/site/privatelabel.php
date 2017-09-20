<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
?>

<div class="pad-20 hide-xs"></div>

<div class="container">
	<div class="breadcrumb">
		<span class="current-page">Private Label</span>
		<ol class="path">
			<li><?= Html::a('Home', ['/site/index'], ['class' => '']) ?></li>
			<li class="active">Private Label</li>
		</ol>
	</div>
</div>


<div id="privatelabel">
	<div class="inner-banner">
		<img class="img-responsive" src="<?= Yii::$app->homeUrl; ?>uploads/cms/private-label/banner/large.<?= $gallery->banner_image ?>"/>
		<div class="col-lg-12 banner-button">
			<button class="green2">request a quote</button>
		</div>
	</div>

	<!--<div class="how-it-works">-->

	<div class="col-md-12">
		<h3 class="innerpage-hdng text-center">Private Label Manufacturing</h3>
	</div>
	<h5 class="heading text-center">HOW IT WORKS</h5>
	<div class="how-it-works">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 col-md-12 col-sm-12 col-xs-12 right-box">
					<?php
					foreach ($how_it_works as $how_it_work) {
						?>
						<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12 marg-bttm-30">
							<div class="step-1 text-left md-text-center sm-text-center xs-text-center">
								<div class="col-lg-2">
									<div class="icon">
										<i class="fa fa-unlock-alt" aria-hidden="true"></i>
									</div>
								</div>
								<div class="col-lg-10">
									<p class="sub-hdng"><?= $how_it_work->title ?></p>
									<p class="details"><?= $how_it_work->content ?></p>
								</div>
							</div>
						</div>
					<?php }
					?>

				</div>
			</div>
			<!--</div>-->
		</div>
	</div>

	<div class="benefits">
		<div class="container">
			<div class="row">
				<h5 class="heading text-center">BENEFITS</h5>
				<?php foreach ($benefits as $benefit) {
					?>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 marg-bttm-30">
						<div class="step-1 text-center">
							<div class="icon"><i class="fa fa-unlock-alt" aria-hidden="true"></i></div>
							<p class="sub-hdng"><?= $benefit->title ?></p>
							<p class="details md-text-justify sm-text-justify xs-text-center"><?= $benefit->content ?></p>
						</div>
					</div>
					<?php
				}
				?>


			</div>
		</div>
	</div>

	<div class="our-process">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h5 class="heading text-center">OUR PROCESS</h5>
					<p class="sub-discrip text-center"><?= $gallery->our_process_title ?></p>
				</div>
				<?php foreach ($process as $proces) {
					?>
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 marg-bttm-30">
						<div class="card">
							<canvas class="header-bg" width="250" height="70" id="header-blur"></canvas>
							<div class="avatar">
								<img src="" alt="<?= $proces->step ?>" />
							</div>
							<div class="content">
								<p><?= $proces->content ?></p>
							</div>
						</div>
					</div>
					<?php
				}
				?>







				<div class="col-lg-12">
					<p style="font-family: roboto-light; font-size: 14px; color: #8c8c8c;"><em><?= $gallery->other_title ?></em></p>
				</div>

			</div>
		</div>
	</div>

	<div class="container" id="testimonial">
		<div class="row">
			<h5 class="heading">And yes, we have lots of happy customers!</h5>
			<p class="sub-heading">See what they're saying</p>
			<div class="col-lg-9" style="margin: 0 auto; float: none;">
				<div class="Quote">“</div>
				<div class="main-gallery">
					<?php foreach ($testimonials as $testimonial) {
						?>
						<div class="gallery-cell">
							<div class="testimonial">
								<img class="testimonial-avatar" src="<?= Yii::$app->homeUrl; ?>uploads/cms/testimonials/<?= $testimonial->id; ?>/large.<?= $testimonial->image ?>">
								<span class="testimonial-author"><?= $testimonial->name; ?></span>
								<q class="testimonial-quote"><?= $testimonial->content ?></q>
							</div>
						</div>
						<?php
					}
					?>



				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="contact-form-box">
			<div class="col-md-12 text-center">
				<h3>Contact Us</h3>
				<p><?= $contact->content; ?></p>
			</div>
			<br class="hidden-lg hidden-md hidden-sm"/>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-feild-box margin-auto xs-pad-0">
				<div class="col-lg-10 col-md-8 col-sm-8 col-xs-12 cntnt-center"
				     <form id="contact">
						<div class="form-group col-md-6">
							<label for="usr">First Name*</label>
							<div class="col-md-12 first-name"><input required="" type="text" class="form-control" placeholder="First Name" id="usr-first-name"></div>
						</div>
						<div class="form-group col-md-6">
							<label for="usr">Last Name*</label>
							<div class="col-md-12 last-name"><input required="" type="text" class="form-control" placeholder="First Name" id="usr-first-name"></div>
						</div>
						<div class="form-group col-md-6">
							<label for="usr">E-Mail Address*</label>
							<input required="" type="email" class="form-control" placeholder="yourname@domain.com" id="mail">
						</div>
						<div class="form-group col-md-6">
							<label for="pwd">Mobile Number*</label>
							<div class="date-dropdowns">
								<select class="day" style="position: absolute; border-right: 1px solid #d1d2d0"><option value="00">+91</option><option value="01">+91</option><option value="02">+91</option><option value="03">+91</option><option value="04">+91</option><option value="05">+91</option><option value="06">+91</option><option value="07">+91</option></select>
								<input style="padding-left: 70px;" type="phone" class="form-control" data-format="+1 (ddd) ddd-dddd" name="phone" id="phone" placeholder="555 555 5555" />
							</div>
						</div>
						<div class="form-group col-md-6">
							<label for="usr">Country*</label>
							<select class="" name="school" id="schoolContainer">
								<option value="None" selected> Your Country</option>
								<option value="uae">UAE</option>
								<option value="india">INDIA</option>
								<option value="usa">USA</option>
							</select>
						</div>
						<div class="form-group col-md-6">
							<label for="usr">Reason for Contact*</label>
							<select class="" name="school" id="schoolContainer">
								<option value="None" selected>General Questions</option>
								<option value="uae">Some Reason</option>
								<option value="india">Technical</option>
								<option value="usa">Help</option>
							</select>
						</div>
						<div class="g-recaptcha capcha-main" data-sitekey="6LcLezAUAAAAAF-THwti6d_kxxPQ0nGBbqv2tA-a"></div>
						<div style="text-align: center;float: none;margin: 0 auto;left: 0px;right: 0px;" class="col-lg-3"><button class="green2">submit</button></div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="customer-logos">
			<div class="slide"><img src="<?= Yii::$app->homeUrl; ?>images/partners-logo/1.png"></div>
			<div class="slide"><img src="<?= Yii::$app->homeUrl; ?>images/partners-logo/2.png"></div>
			<div class="slide"><img src="<?= Yii::$app->homeUrl; ?>images/partners-logo/3.png"></div>
			<div class="slide"><img src="<?= Yii::$app->homeUrl; ?>images/partners-logo/4.png"></div>
			<div class="slide"><img src="<?= Yii::$app->homeUrl; ?>images/partners-logo/5.png"></div>
			<div class="slide"><img src="<?= Yii::$app->homeUrl; ?>images/partners-logo/1.png"></div>
			<div class="slide"><img src="<?= Yii::$app->homeUrl; ?>images/partners-logo/2.png"></div>
			<div class="slide"><img src="<?= Yii::$app->homeUrl; ?>images/partners-logo/3.png"></div>
		</div>
	</div>


</div>

<div class="pad-20"></div>
