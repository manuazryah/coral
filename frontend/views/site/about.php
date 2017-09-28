<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;

if (isset($meta_title) && $meta_title != '')
	$this->title = $meta_title;
?>


<div class="pad-20 hide-xs"></div>

<div class="container">
	<div class="breadcrumb">
		<span class="current-page">About Us</span>
		<ol class="path">
			<li><?= Html::a('Home', ['/site/index'], ['class' => '']) ?></li>
			<li class="active">About us</li>
		</ol>
	</div>
</div>

<div id="about-page">
	<div class="container">
		<div class="row">
			<div class="about-section">
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="abt-img-box">
						<img class="img-responsive hidden-xs" src="<?= Yii::$app->homeUrl; ?>uploads/cms/about/<?= $about->id ?>/large.<?= $about->about_image ?>"/>
					</div>
				</div>
				<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
					<h5 class="heading"><?= $about->about_title; ?></h5>
					<p><img class="img-responsive hidden-lg hidden-md hidden-sm" style="float: left;margin: 0 15px 10px 0;" src="<?= Yii::$app->homeUrl; ?>images/about.jpg"/>

						<?php
						$content = str_ireplace('<p>', '', $about->about_content);
						$content = str_ireplace('</p>', '', $content)
						?>

					<?= $content ?>				</div>
			</div>
		</div>
	</div>
	<div class="chairmans-msg-bg-color">
		<div class="chairmans-msg-bg" style="background-image: url(images/chairmans-msg-bg.png);">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 chairmans-img">
						<div class="card">
							<canvas class="header-bg" width="250" height="70" id="header-blur"></canvas>
							<div class="avatar">
								<img src="<?= Yii::$app->homeUrl; ?>uploads/cms/about/<?= $about->id ?>/chairman/large.<?= $about->chairman_image ?>" alt="1">
							</div>
						</div>
						<!--<img class="img-responsive hidden-md hidden-sm hidden-xs" src="images/chairnams-img.png"/>-->
						<div class="hidden-lg">
						    <!--<img class="img-responsive" src="images/chairnams-img2.png"/>-->
							<div class="chairmans-name">
								<p class="name"><?= $about->chairman_name ?></p>
								<p class="designation"><?= $about->chairman_position ?></p>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 what-do-say">
						<img class="img-responsive" src="<?= Yii::$app->homeUrl; ?>images/what-do-say.png"/>
					</div>
					<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
						<p class="chairmans-msg">
							<?php
							$message = str_ireplace('<p>', '', $about->chairman_message);
							$message = str_ireplace('</p>', '', $message)
							?>
							<?= $message ?>
						</p>
					</div>
					<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 hidden-md hidden-sm hidden-xs">
						<div class="chairmans-name">
							<p class="name"><?= $about->chairman_name ?></p>
							<p class="designation"><?= $about->chairman_position ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>




</div>

