<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use common\models\CmsOthers;
use common\models\Category;

AppAsset::register($this);
$params = $parameters = \yii::$app->getRequest()->getQueryParams();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="<?= Yii::$app->language ?>">
	<head>
		<meta charset="<?= Yii::$app->charset ?>">
		<link rel="shortcut icon" href="<?= yii::$app->homeUrl; ?>images/fav.png" type="image/png" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?= Html::csrfMetaTags() ?>
		<title><?= Html::encode($this->title) ?></title>
		<script src="<?= yii::$app->homeUrl; ?>js/jquery-1.11.1.min.js"></script>
		<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
		<script>
			var homeUrl = '<?= yii::$app->homeUrl; ?>';
		</script>
		<?php $this->head() ?>
	</head>
	<body>


		<?php $this->beginBody() ?>
		<?php $action = Yii::$app->controller->id . '/' . Yii::$app->controller->action->id; // controller action id ?>
		<div id="sticky-header">
			<div id="top-header">
				<div class="container">
					<div class="row">
						<div class="col-md-3  col-sm-3 col-xs-3 left">
							<?= Html::a('<button class="top-green">Create Your Own</button>', ['/create_your_own/create-your-own/index']) ?>
							<!--<button class="top-green">Create Your Own</button>-->
							<?php $your_own = CmsOthers::find()->where(['id' => 1])->one(); ?>
							<marquee class="GeneratedMarquee" direction="left" scrollamount="5" behavior="scroll"><?= $your_own->content ?></marquee>
						</div>
						<div class="col-md-8 col-sm-8 col-xs-9 right">
							<div class="top-nav">
								<ul>
									<?php $shipping = CmsOthers::find()->where(['id' => 2])->one(); ?>
									<?php $facebook = CmsOthers::find()->where(['id' => 3])->one(); ?>
									<?php $linkedin = CmsOthers::find()->where(['id' => 4])->one(); ?>
									<?php $google = CmsOthers::find()->where(['id' => 5])->one(); ?>
									<?php $twitter = CmsOthers::find()->where(['id' => 6])->one(); ?>
									<li class="dropdown hidden-xs"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="truck"></i>Free Shipping</a>
										<ul class="dropdown-menu">
											<li><?= $shipping->content; ?></li>
										</ul>
									</li>
				    <!--                                    <li class="dropdown hidden-lg hidden-md hidden-sm"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="truck"></i></a>
									    <ul class="dropdown-menu">
										<li><?php // $shipping->content;                         ?></li>
									    </ul>
									</li>-->
									<li>
										<!--										<a href="#">Blog</a>-->
										<?= Html::a('Blog', ['our-blog']) ?>
									</li>
									<li class="top-social">
										<a href="<?= $facebook->content; ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
									</li>
									<li class="top-social"><a href="<?= $linkedin->content; ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
									<li class="top-social"><a href="<?= $google->content; ?>" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
									<!--<li class="top-social"><a href="<?php // $twitter->content;                     ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>-->
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="header">
				<div class="container">
					<div class="row">
						<?= Html::beginForm(['/product/index'], 'get', ['id' => 'serach-formm']) ?>
						<div class="col-md-5 hidden-sm hidden-xs left">
							<div class="col-md-7 col-sm-7 col-xs-7 search">
								<div class="input-group">
									<input type="text" class="form-control SearchBar search-keyword" placeholder="Enter your search keyword" name="keyword" autocomplete="off" required="" value="<?php
									if (isset($_GET['keyword']) && $_GET['keyword'] != '') {
										echo $_GET['keyword'];
									}
									?>">
									<div class="search-keyword-dropdown"></div>
									<span class="input-group-btn">
										<?= Html::submitButton('<span class="SearchIcon" ><i class="fa fa-search" aria-hidden="true"></i></span>', ['class' => 'btn btn-defaul SearchButton', 'name' => 'search_keyword-send']) ?>

									</span>
								</div>
							</div>
						</div>
						<?= Html::endForm() ?>
						<div class="col-md-2 col-sm-4 col-xs-4" id="logo">
							<?= Html::a('<div class="logo"></div>', ['/site/index'], ['class' => '']) ?>
						</div>
						<div class="col-md-5 col-sm-8 col-xs-8 right">
							<nav>
								<div class="container">
									<?= Html::beginForm(['/product/index'], 'get', ['id' => 'serach-formm']) ?>
									<div class="hidden-lg hidden-md col-sm-12 col-xs-12">
										<div class="col-md-12 col-sm-12 col-xs-12 search">
											<div class="input-group">
												<input type="text" class="form-control SearchBar search-keyword" placeholder="Enter your search keyword" name="keyword" autocomplete="off" required="" value="<?php
												if (isset($_GET['keyword']) && $_GET['keyword'] != '') {
													echo $_GET['keyword'];
												}
												?>">
												<div class="search-keyword-dropdown"></div>
												<span class="input-group-btn">
													<?= Html::submitButton('<span class="SearchIcon" ><i class="fa fa-search" aria-hidden="true"></i></span>', ['class' => 'btn btn-defaul SearchButton', 'name' => 'search_keyword-send']) ?>
												</span>
											</div>
										</div>
									</div>
									<?= Html::endForm() ?>
									<?php
									if (!empty(Yii::$app->user->identity->email)) {
										if (strlen(Yii::$app->user->identity->email) >= 10) {
											$name = substr(Yii::$app->user->identity->email, 0, 10) . '...';
											$name = ucwords($name);
										} else {
											$name = Yii::$app->user->identity->email;
											$name = ucwords($name);
										}
									}
									?>

									<ul class="navbar-right hidden-lg hidden-md">
										<?php if (Yii::$app->user->isGuest) { ?>
											<li><?= Html::a('<span>Login/Signup</span>', ['/site/login-signup'], ['class' => '']) ?></li>
											<?php
										} else {
											?>
											<li><?= Html::a('<span><i class="fa fa-user" aria-hidden="true"></i></span>', ['/myaccounts/user/index'], ['class' => '']) ?></li>
											<?php
											echo '<li>' . Html::beginForm(['/site/logout'], 'post') . Html::submitButton('Logout', ['style' => 'background: white;border: none;']) . Html::endForm() . '</li>';
										}
										?>
										<li><a href="#" id="cart_2"><i class="fa fa-shopping-basket" aria-hidden="true"></i>  <span class="badge cart_count">(0)</span></a></li>
									</ul>
									<ul class="navbar-right hidden-sm hidden-xs">
										<?php if (Yii::$app->user->isGuest) { ?>
											<li><?= Html::a('<span>Login / Signup</span>', ['/site/login-signup'], ['class' => '']) ?></li>
											<?php
										} else {
											?>
											<li><?= Html::a('<span>My Account</span>', ['/myaccounts/user/index'], ['class' => '']) ?></li>
											<?php
											echo '<li>' . Html::beginForm(['/site/logout'], 'post') . Html::submitButton('Logout (' . ucfirst($name) . ')', ['style' => 'background: white;border: none;']) . Html::endForm() . '</li>';
										}
										?>
										<li><a href="#" id="cart"><i class="fa fa-shopping-basket" aria-hidden="true"></i> Cart <span class="badge cart_count">(0)</span></a></li>
									</ul>



									<!--                                    <ul class="navbar-right">
														<li><?= Html::a('<span>Login / Signup</span>', ['site/login-signup'], ['class' => '']) ?></li>
														<li><a href="#" id="cart"><i class="fa fa-shopping-basket" aria-hidden="true"></i> Cart <span class="badge">(3)</span></a></li>
													    </ul>-->
									<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>

							</nav>
							<div class="container">
								<div class="shopping-cart">
									<div class="shopping-cart-header">
										<i class="fa fa-shopping-basket" aria-hidden="true"></i><span class="badge cart_count">(0)</span>
										<div class="shopping-cart-total">
											<span class="lighter-text">Total:</span>
											<span class="main-color-text cart_amount"></span>
										</div>
									</div>

									<ul class="shopping-cart-items">

									</ul>
									<div class="col-md-12 checkout-btn-space">
										<?= Html::a('<button class="green2">check out</button>', ['/cart/mycart'], ['class' => '']) ?>
										<!--<button class="green2">check out</button>-->
									</div>
								</div>
							</div>
						</div>



					</div>
				</div>
			</div>
			<div id="nav-header">
				<nav class="navbar navbar-inverse" role="navigation">
					<div class="container-fluid">
						<div class="navbar-header">
							<!--                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
											<span class="sr-only">Toggle navigation</span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
										    </button>-->
							<!--<a class="navbar-brand" href="#">Brand</a>-->
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="container">

							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								<?php
//$category_main = $_GET['category'];
								$catag = Category::find()->where(['status' => 1, 'main_category' => 1])->one();
								$catag_2 = Category::find()->where(['status' => 1, 'main_category' => 2])->one();
								if (isset($params['id']))
									$prod_main_catag = Category::find()->where(['status' => 1, 'category_code' => $params['id']])->one();
								?>

								<ul class="nav navbar-nav">
									<li class="<?= $action == 'site/index' ? 'active' : '' ?>"><?= Html::a('<span>Home</span>', ['/site/index'], ['class' => '']) ?></li>
									<li class="<?= $action == 'site/about' ? 'active' : '' ?>"><?= Html::a('<span>About Us</span>', ['/site/about'], ['class' => '']) ?></li>

									<?php if (!empty($prod_main_catag)) { ?>
										<li class="<?= $prod_main_catag->main_category == 1 ? 'active' : '' ?>"><?= Html::a('<span>Exclusive Brands</span>', ['/product/index', 'id' => $catag->category_code], ['class' => '']) ?></li>
										<li class="<?= $prod_main_catag->main_category == 2 ? 'active' : '' ?>"><?= Html::a('<span>Brands</span>', ['/product/index', 'id' => $catag_2->category_code], ['class' => '']) ?></li>
										<?php
									} else {
										?>
										<li class=""><?= Html::a('<span>Exclusive Brands</span>', ['/product/index', 'id' => $catag->category_code], ['class' => '']) ?></li>
										<li class=""><?= Html::a('<span>Brands</span>', ['/product/index', 'id' => $catag_2->category_code], ['class' => '']) ?></li>
									<?php } ?>
									<li class="<?= $action == 'site/private-label' ? 'active' : '' ?>"><?= Html::a('<span>private label manufacturing</span>', ['/site/private-label'], ['class' => '']) ?></li>
									<li class="<?= $action == 'site/showrooms' ? 'active' : '' ?>"><?= Html::a('<span>showrooms</span>', ['/site/showrooms'], ['class' => '']) ?></li>
									<li class="<?= $action == 'site/contact' ? 'active' : '' ?>"><?= Html::a('<span>contact us</span>', ['/site/contact'], ['class' => '']) ?></li>
									<!--                                    <li class="dropdown">
														<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
														<ul class="dropdown-menu">
														    <li><a href="#">Action</a></li>
														    <li><a href="#">Another action</a></li>
														    <li><a href="#">Something else here</a></li>
														    <li class="divider"></li>
														    <li><a href="#">Separated link</a></li>
														    <li class="divider"></li>
														    <li><a href="#">One more separated link</a></li>
														</ul>
													    </li>-->
								</ul>

								<!--                                <ul class="nav navbar-nav navbar-right">
												    <li><a href="#">Link</a></li>
												    <li class="dropdown">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
													<ul class="dropdown-menu">
													    <li><a href="#">Action</a></li>
													    <li><a href="#">Another action</a></li>
													    <li><a href="#">Something else here</a></li>
													    <li class="divider"></li>
													    <li><a href="#">Separated link</a></li>
													</ul>
												    </li>
												</ul>-->
							</div>
							<!-- /.navbar-collapse -->
						</div>
					</div>
					<!-- /.container-fluid -->
				</nav>
			</div>
		</div>
		<div class="marg-855"></div>
		<div class="clearfix"></div>

		<?= $content ?>
		<div class="page-loading-overlay loaded">
			<div class="loader-2"></div>
		</div>
		<div class="clearfix"></div>
		<section id="footer">
			<div class="container">
				<div class="row">
					<div class="col-md-5 col-sm-4 col-xs-5 br-right xs-100">
						<h4 class="foot-hdng">certified services</h4>
						<div class="col-md-3 col-sm-3 col-xs-3 certified-logo">
							<img src="<?= Yii::$app->homeUrl; ?>images/certified-logo1.png" class="img-responsive"/>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-3 certified-logo">
							<img src="<?= Yii::$app->homeUrl; ?>images/certified-logo2.png" class="img-responsive"/>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-3 certified-logo">
							<img src="<?= Yii::$app->homeUrl; ?>images/certified-logo.png" class="img-responsive"/>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 features">
							<ul>
								<li>Quick Delivery</li>
								<li>Customer Safety</li><br/>
								<li>100% Satisfaction</li>
								<li>Secure Payment</li>
							</ul>
						</div>
					</div>
					<div style="padding-left: 35px;" class="col-md-3 col-sm-4 col-xs-3 xs-50">
						<h4 class="foot-hdng">coral perfume</h4>
						<ul class="foot-site-link">
							<li><?= Html::a('<span>About Us</span>', ['/site/about'], ['class' => '']) ?></li>
							<li><?= Html::a('<span>Terms and Conditions</span>', ['/site/terms-condition'], ['class' => '']) ?></li>
							<li><?= Html::a('<span>Privacy Policies</span>', ['/site/privacy-policy'], ['class' => '']) ?></li>
							<li><?= Html::a('<span>Delivery Information</span>', ['/site/return-policy'], ['class' => '']) ?></li>
							<li><?= Html::a('<span>FAQs</span>', ['/site/faq'], ['class' => '']) ?></li>
						</ul>
					</div>
					<div style="padding-left: 0px;" class="col-md-4 col-sm-4 col-xs-4 xs-50 br-left">
						<div style="padding-left: 35px;" class="col-md-12 col-sm-12 col-xs-12">
							<h4 class="foot-hdng">my account</h4>
							<div class="col-md-12 my-account-link">
								<ul>
									<li><?= Html::a('My Account', ['/myaccounts/user/index'], ['class' => '']) ?></li>
									<!--<li><?php // Html::a('Private Label', ['/site/private-label'], ['class' => ''])                            ?></li>-->
									<!--<li><a href="#">Exclusive Brands</a></li>-->
									<li><?= Html::a('Showrooms', ['/site/showrooms'], ['class' => '']) ?></li>
									<!--<li><a href="#">Brands</a></li>-->
									<li><?= Html::a('contact us', ['/site/contact'], ['class' => '']) ?></li>

								</ul>
							</div>
						</div>
						<div class="col-md-12 col-sm-12 hidden-xs foot-social">
							<ul>
								<li><a href="<?= $facebook->content; ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<!--<li><a href="<?php // echo $twitter->content;                         ?>"target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>-->
								<li><a href="<?= $google->content; ?>"target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
								<li><a href="<?= $linkedin->content; ?>"target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
					<div style="text-align: center;" class="hidden-lg hidden-md hidden-sm col-xs-12 foot-social">
						<ul style="margin: 0 auto; display: inline-block;">
							<li><a href="<?= $facebook->content; ?>"target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<!--<li><a href="<?php // echo $twitter->content;                         ?>"target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>-->
							<li><a href="<?= $google->content; ?>"target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
							<li><a href="<?= $linkedin->content; ?>"target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="ownership">
				<div class="supporting-logos">
					<a href="#"><img src="<?= Yii::$app->homeUrl; ?>images/mastercard.png" class="img-responsive"/></a>
					<a href="#"><img src="<?= Yii::$app->homeUrl; ?>images/visa.png" class="img-responsive"/></a>
				</div>
				<p><span>Coral perfume</span> @ 2017 All Rights Reserved.</p>
			</div>
		</section>
		<?php $this->endBody() ?>
	</body>
</html>
<?php $this->endPage() ?>
<!--======= pro-slider-end =========-->
<script src='https://www.google.com/recaptcha/api.js'></script>
<!--<script>
                    $('#contact').on('submit', function (e) {                    if (grecaptcha.getResponse() == "") {                        e.preventDefault(); $(".rc-anchor-light.rc-anchor-normal").css("border", "1px solid #d35656 !important"); if ($(".capcha-main").next(".validation").length == 0) // only add if not added                        {                            $(".capcha-main").after("<div class='validation' style='color:#c54040;margin-left: 15px;font-size: 13px;'>Please verify that you are not a robot</div>");                        }                    }                });
//    (function () {
//
//        $("#cart").hover(function () {
//            $(".shopping-cart").fadeToggle("slow");
//            return false;
//        });
//    })();
//
//    ('#cart').hover(function () {
//        $(".shopping-cart").show();
//    }, function () {
//        $(".shopping-cart").hide();
//    }
                            //    );

                            $('ul.nav li.dropdown').hover(function () {
                    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
                    }, function () {
                    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
                    });</script>-->
<script>

		(function () {
			$("#cart").on("click", function () {
				$(".shopping-cart").fadeToggle("fast");
			});
			$("#cart_2").on("click", function () {
				$(".shopping-cart").fadeToggle("fast");
			});
			$("#cart").hover(function () {
				$(".shopping-cart").show("fast");
			});
			$("#cart_2").hover(function () {
				$(".shopping-cart").show("fast");
			});
			$('.shopping-cart').hover(function () {
				$('.shopping-cart').show();
			});
			$('.shopping-cart').mouseleave(function () {
				$('.shopping-cart').hide();
			});
			$('#cart').hover(function () {
				$('.shopping-cart').hover("fast");
			});
		})();
//    jQuery('#cart').on('mouseover', function () {
//        jQuery(this).find('.shopping-cart').stop(true, true).delay(200).fadeToggle("fast");
//    });
//    jQuery('#cart').on("mouseout", function () {
//        jQuery(this).find('.shopping-cart').stop(true, true).delay(200).fadeOut("fast");
		//    });
		$(document).ready(function () {

			$("#addSchool").click(function () {
				$("#schoolContainer").append('<option value="' + $("#newSchool").val() + '">' + $("#newSchool").val() + '</option>');
			});
//        $("example2").dateDropdowns({
//            submitFormat: "dd/mm/yyyy"
//        });
//        $('#zoom_01').elevateZoom({
//            zoomType: "inner",
//            cursor: "crosshair",
//            zoomWindowFadeIn: 500,
//            zoomWindowFadeOut: 750
			//        });

		});</script>
<script>
//$(window).load(function () {
//    $('#inwave-map').html('<div class="map-frame"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1553532.2927783665!2d54.475375168816676!3d25.259041996119326!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f5c4a00eebfbb%3A0xa181e9f8ed00124e!2sActive+Mopp+Cleaning+Services+L.L.C!5e0!3m2!1sen!2sin!4v1493452043945" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe></div>');
//    $('#youtube-vid').html(' <iframe width="100%" height="315" src="https://www.youtube.com/embed/4NcWzI4nKIs" frameborder="0" allowfullscreen></iframe>');
//});

</script>
<script type="text/javascript">
	$('#radioBtn a').on('click', function () {
		var sel = $(this).data('title');
		var tog = $(this).data('toggle');
		$('#' + tog).prop('value', sel);
		$('a[data-toggle="' + tog + '"]').not('[data-title="' + sel + '"]').removeClass('active').addClass('notActive');
		$('a[data-toggle="' + tog + '"][data-title="' + sel + '"]').removeClass('notActive').addClass('active');
	});
	$('#phone').keyup(function (e) {
		if ((e.keyCode > 47 && e.keyCode < 58) || (e.keyCode < 106 && e.keyCode > 95)) {
			this.value = this.value.replace(/(\d{3})\-?/g, '$1-');
			return true;
		}

		//remove all chars, except dash and digits
		this.value = this.value.replace(/[^\-0-9]/g, '');
	});
//    $(function () {
//        $('input[name="rad"]').click(function () {
//            var $radio = $(this);
//
//            // if this was previously checked
//
//            {
//                $radio.prop('checked', false);
//                $radio.data('waschecked', false);
//            }
//                    $radio.data('waschecked', true);
//
//            // remove was checked from other radios
//            $radio.siblings('input[name="rad"]').data('waschecked', false);
//        });
	//    });


	$(function () {
		var action;
		$(".number-spinner button").mousedown(function () {
			btn = $(this);
			input = btn.closest('.number-spinner').find('input');
			btn.closest('.number-spinner').find('button').prop("disabled", false);
			if (btn.attr('data-dir') == 'up') {
				action = setInterval(function () {
					if (input.attr('max') == undefined || parseInt(input.val()) < parseInt(input.attr('max'))) {
						input.val(parseInt(input.val()) + 1);
					} else {
						btn.prop("disabled", true);
						clearInterval(action);
					}
				}, 50);
			} else {
				action = setInterval(function () {
					if (input.attr('min') == undefined || parseInt(input.val()) > parseInt(input.attr('min'))) {
						input.val(parseInt(input.val()) - 1);
					} else {
						btn.prop("disabled", true);
						clearInterval(action);
					}
				}, 50);
			}
		}).mouseup(function () {
			clearInterval(action);
		});
	});</script>
<script>
	$(window).on("scroll", function () {
		if ($(window).scrollTop() > 100) {
			$("#sticky-header").addClass("fixed");
		} else {
			//remove the background property so it comes transparent again (defined in your css)
			$("#sticky-header").removeClass("fixed");
		}
		if ($(window).scrollTop() > 100) {
			$("#fixed-sidebar").addClass("fixed");
		} else {
			//remove the background property so it comes transparent again (defined in your css)
			$("#fixed-sidebar").removeClass("fixed");
		}
	});
</script>
<script>

//    $(document).scroll(function () {
//        var y = $(this).scrollTop();
//        if (y > 200) {
//            $('.mob-checkout-buttons').fadeIn();
//        } else {
//            $('.mob-checkout-buttons').fadeOut();
//        }
//    });
</script>