<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
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
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <!--<script src="<?= yii::$app->homeUrl; ?>/js/jquery-1.11.1.min.js"></script>-->
        <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
        <script>
            var homeUrl = '<?= yii::$app->homeUrl; ?>'
        </script>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <?php $action = Yii::$app->controller->action->id; // controller action id ?>
        <div id<div id="top-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3  col-sm-3 col-xs-3 left">
                            <button class="top-green">Create Your Own</button>
                            <marquee class="GeneratedMarquee" direction="left" scrollamount="5" behavior="scroll">Start Creating Your Fragrance in Seconds</marquee>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-9 right">
                            <div class="top-nav">
                                <ul>
                                    <li class="dropdown hidden-xs"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="truck"></i>Free Shipping</a>
                                        <ul class="dropdown-menu">
                                            <li>All orders over AED 100.00 are qualify for free shipping</li>
                                        </ul>
                                    </li>
                                    <li class="dropdown hidden-lg hidden-md hidden-sm"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="truck"></i></a>
                                        <ul class="dropdown-menu">
                                            <li>All orders over AED 100.00 are qualify for free shipping</li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Blog</a></li>
                                    <li class="top-social"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li class="top-social"><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li class="top-social"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                    <li class="top-social"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 hidden-sm hidden-xs left">
                            <div class="col-md-7 col-sm-7 col-xs-7 search">
                                <div class="input-group">
                                    <input type="text" class="form-control SearchBar" placeholder="Enter your search keyword">
                                    <span class="input-group-btn">
                                        <button class="btn btn-defaul SearchButton" type="button">
                                            <span class="SearchIcon" ><i class="fa fa-search" aria-hidden="true"></i></span>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-4" id="logo">
                            <a href=""><div class="logo"></div></a>
                        </div>
                        <div class="col-md-5 col-sm-8 col-xs-8 right">
                            <nav>
                                <div class="container">
                                    <div class="hidden-lg hidden-md col-sm-12 col-xs-12">
                                        <div class="col-md-12 col-sm-12 col-xs-12 search">
                                            <div class="input-group">
                                                <input type="text" class="form-control SearchBar" placeholder="Enter your search keyword">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-defaul SearchButton" type="button">
                                                        <span class="SearchIcon" ><i class="fa fa-search" aria-hidden="true"></i></span>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="navbar-right">
                                        <li><?= Html::a('<span>Login / Signup</span>', ['site/login-signup'], ['class' => '']) ?></li>
                                        <li><a href="#" id="cart"><i class="fa fa-shopping-basket" aria-hidden="true"></i> Cart <span class="badge">(3)</span></a></li>
                                    </ul>
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
                                        <i class="fa fa-shopping-basket" aria-hidden="true"></i><span class="badge">(3)</span>
                                        <div class="shopping-cart-total">
                                            <span class="lighter-text">Total:</span>
                                            <span class="main-color-text">$2,229.97</span>
                                        </div>
                                    </div>

                                    <ul class="shopping-cart-items">
                                        <li class="clearfix">
                                            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/cart-item1.jpg" alt="item1" />
                                            <span class="item-name">Sony DSC-RX100M III</span>
                                            <span class="item-price">$849.99</span>
                                            <span class="item-quantity">Quantity: 01</span>
                                        </li>

                                        <li class="clearfix">
                                            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/cart-item2.jpg" alt="item1" />
                                            <span class="item-name">KS Automatic Mechanic...</span>
                                            <span class="item-price">$1,249.99</span>
                                            <span class="item-quantity">Quantity: 01</span>
                                        </li>

                                        <li class="clearfix">
                                            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/cart-item3.jpg" alt="item1" />
                                            <span class="item-name">Kindle, 6" Glare-Free To...</span>
                                            <span class="item-price">$129.99</span>
                                            <span class="item-quantity">Quantity: 01</span>
                                        </li>
                                    </ul>

                                    <a href="#" class="button">Checkout</a>
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
                                <ul class="nav navbar-nav">
                                    <li class="<?= $action == 'index' ? 'active' : '' ?>"><?= Html::a('<span>Home</span>', ['index'], ['class' => '']) ?></li>
                                    <li class=""><?= Html::a('<span>About Us</span>', ['site/index'], ['class' => '']) ?></li>
                                    <li class="<?= $action == 'our-products' ? 'active' : '' ?>"><?= Html::a('<span>our products</span>', ['site/our-products'], ['class' => '']) ?></li>
                                    <li class=""><?= Html::a('<span>international products</span>', ['index'], ['class' => '']) ?></li>
                                    <li class=""><?= Html::a('<span>private label</span>', ['index'], ['class' => '']) ?></li>
                                    <li class=""><?= Html::a('<span>showrooms</span>', ['index'], ['class' => '']) ?></li>
                                    <li class=""><?= Html::a('<span>contact us</span>', ['index'], ['class' => '']) ?></li>
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
            <div class="clearfix"></div>
            <?= $content ?>

            <div class="clearfix"></div>
            <section id="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-sm-4 col-xs-5 br-right xs-100">
                            <h4 class="foot-hdng">certified services</h4>
                            <div class="col-md-3 col-sm-3 col-xs-3 certified-logo">
                                <img src="<?= Yii::$app->homeUrl; ?>images/gmp.png" class="img-responsive"/>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-3 certified-logo">
                                <img src="<?= Yii::$app->homeUrl; ?>images/iso.png" class="img-responsive"/>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-3 certified-logo">
                                <img src="<?= Yii::$app->homeUrl; ?>images/coral-cert.png" class="img-responsive"/>
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
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Terms and Conditions</a></li>
                                <li><a href="#">Privacy Policies</a></li>
                                <li><a href="#">Return Policy</a></li>
                                <li><a href="#">FAQs</a></li>
                            </ul>
                        </div>
                        <div style="padding-left: 0px;" class="col-md-4 col-sm-4 col-xs-4 xs-50 br-left">
                            <div style="padding-left: 35px;" class="col-md-12 col-sm-12 col-xs-12">
                                <h4 class="foot-hdng">my account</h4>
                                <div class="col-md-12 my-account-link">
                                    <ul>
                                        <li><a href="#">My Account</a></li>
                                        <li><a href="#">Private Label</a></li>
                                        <li><a href="#">Our Products</a></li>
                                        <li><a href="#">Showrooms</a></li>
                                        <li><a href="#">International Products</a></li>
                                        <li><a href="#">Contact</a></li>

                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 hidden-xs foot-social">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div style="text-align: center;" class="hidden-lg hidden-md hidden-sm col-xs-12 foot-social">
                            <ul style="margin: 0 auto; display: inline-block;">
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="ownership">
                    <div class="supporting-logos">
                        <a href="#"><img src="<?= Yii::$app->homeUrl; ?>images/mastercard.png" class="img-responsive"/></a>
                        <a href="#"><img src="<?= Yii::$app->homeUrl; ?>images/visa.png" class="img-responsive"/></a>
                    </div>
                    <p><span>Coral perfume</span> @ 2017 All Rights Reserved. Design by Azryah</p>
                </div>
            </section>
            <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
<!--======= pro-slider-end =========-->
<script>
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
    });
</script>
<script>
    (function () {

        $("#cart").on("click", function () {
            $(".shopping-cart").fadeToggle("fast");
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
        $("example2").dateDropdowns({
            submitFormat: "dd/mm/yyyy"
        });
        $('#zoom_01').elevateZoom({
            zoomType: "inner",
            cursor: "crosshair",
            zoomWindowFadeIn: 500,
            zoomWindowFadeOut: 750
        });

    });
</script>