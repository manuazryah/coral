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
        <script src="<?= yii::$app->homeUrl; ?>js/jquery-1.11.1.min.js"></script>
        <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
        <script>
            var homeUrl = '<?= yii::$app->homeUrl; ?>';
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
                                        <?php if (Yii::$app->user->isGuest) { ?>
                                            <li><?= Html::a('<span>Login / Signup</span>', ['site/login-signup'], ['class' => '']) ?></li>
                                        <?php } else { ?>
                                            <li><?= Html::a('<span>My Account</span>', ['/myaccounts/user'], ['class' => '']) ?></li>
                                            <?php
                                            echo '<li>' . Html::beginForm(['/site/logout'], 'post') . Html::submitButton('Logout (' . Yii::$app->user->identity->username . ')', ['style' => 'background: white;border: none;']) . Html::endForm() . '</li>';
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
                                            <span class="main-color-text amount">0</span>
                                        </div>
                                    </div>

                                    <ul class="shopping-cart-items">

                                    </ul>
                                    <?= Html::a('Checkout', ['cart/mycart'], ['class' => 'button']) ?>
                                    <!--<a href="#" class="button">Checkout</a>-->
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
                                $catag = common\models\Category::find()->one();
                                ?>
                                <ul class="nav navbar-nav">
                                    <li class="<?= $action == 'index' ? 'active' : '' ?>"><?= Html::a('<span>Home</span>', ['/site/index'], ['class' => '']) ?></li>
                                    <li class=""><?= Html::a('<span>About Us</span>', ['/site/about'], ['class' => '']) ?></li>
                                    <li class="<?= $action == 'product' ? 'active' : '' ?>"><?= Html::a('<span>our products</span>', ['/product/index', 'id' => $catag->category_code], ['class' => '']) ?></li>
                                    <li class=""><?= Html::a('<span>international products</span>', ['/site/index'], ['class' => '']) ?></li>
                                    <li class=""><?= Html::a('<span>private label</span>', ['/site/index'], ['class' => '']) ?></li>
                                    <li class=""><?= Html::a('<span>showrooms</span>', ['/site/index'], ['class' => '']) ?></li>
                                    <li class=""><?= Html::a('<span>Contact</span>', ['/site/contact'], ['class' => '']) ?></li>
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
                                <li><?= Html::a('<span>About Us</span>', ['/site/about'], ['class' => '']) ?></li>
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
                                        <li><?= Html::a('<span>Contact</span>', ['/site/contact'], ['class' => '']) ?></li>

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
//        $("example2").dateDropdowns({
//            submitFormat: "dd/mm/yyyy"
//        });
//        $('#zoom_01').elevateZoom({
//            zoomType: "inner",
//            cursor: "crosshair",
//            zoomWindowFadeIn: 500,
//            zoomWindowFadeOut: 750
//        });

    });
</script>
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
    });
</script>
<!--<script>
    $(document).scroll(function () {
        var y = $(this).scrollTop();
        if (y > 200) {
            $('.mob-checkout-buttons').fadeIn();
        } else {
            $('.mob-checkout-buttons').fadeOut();
        }
    });
</script>-->