
<section id="main-slider">
    <div id="bootstrap-touch-slider" class="carousel bs-slider fade  control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="5000" >

        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#bootstrap-touch-slider" data-slide-to="0" class="active"></li>
            <li data-target="#bootstrap-touch-slider" data-slide-to="1"></li>
            <li data-target="#bootstrap-touch-slider" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper For Slides -->
        <div class="carousel-inner" role="listbox">

            <!-- Third Slide -->
            <div class="item active">

                <!-- Slide Background -->
                <img src="<?= Yii::$app->homeUrl; ?>images/banner/slider-1.jpg" alt="Bootstrap Touch Slider"  class="slide-image"/>
                <!--<div class="bs-slider-overlay"></div>-->

                <div class="container">
                    <div class="row">
                        <!-- Slide Text Layer -->
                        <div class="slide-text slide_style_right">
                            <p data-animation="animated fadeInLeft">THE BEGINNING OF SOMETHING MAGICAL</p>
                            <h3 data-animation="animated zoomInRight">CORAL PERFUMES</h3>
                            <a href="#" target="_blank" class="start-shopping" data-animation="animated fadeInLeft">start shopping</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Slide -->

            <!-- Second Slide -->
            <div class="item">

                <!-- Slide Background -->
                <img src="<?= Yii::$app->homeUrl; ?>images/banner/slider-1.jpg" alt="Bootstrap Touch Slider"  class="slide-image"/>
                <!--<div class="bs-slider-overlay"></div>-->
                <!-- Slide Text Layer -->
                <div class="slide-text slide_style_right">
                    <p data-animation="animated fadeInLeft">THE BEGINNING OF SOMETHING MAGICAL</p>
                    <h3 data-animation="animated zoomInRight">CORAL PERFUMES</h3>
                    <a href="#" target="_blank" class="start-shopping" data-animation="animated fadeInLeft">start shopping</a>
                </div>
            </div>
            <!-- End of Slide -->

            <!-- Third Slide -->
            <div class="item">

                <!-- Slide Background -->
                <img src="<?= Yii::$app->homeUrl; ?>images/banner/slider-1.jpg" alt="Bootstrap Touch Slider"  class="slide-image"/>
                <!--<div class="bs-slider-overlay"></div>-->
                <!-- Slide Text Layer -->
                <div class="slide-text slide_style_right">
                    <p data-animation="animated fadeInLeft">THE BEGINNING OF SOMETHING MAGICAL</p>
                    <h3 data-animation="animated zoomInRight">CORAL PERFUMES</h3>
                    <a href="#" target="_blank" class="start-shopping" data-animation="animated fadeInLeft">start shopping</a>
                </div>
            </div>
            <!-- End of Slide -->


        </div><!-- End of Wrapper For Slides -->

        <!-- Left Control -->
        <a class="left carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="prev">
            <span class="fa fa-angle-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>

        <!-- Right Control -->
        <a class="right carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="next">
            <span class="fa fa-angle-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

    </div> <!-- End  bootstrap-touch-slider Slider -->
</section>

<section id="content-area">
    <div class="index-about">
        <div class="container">
            <div class="row">
                <div class="about-content">
                    <h1>welcome to coral perfumes</h1>
                    <p>
                        CORAL PERFUME INDUSTRY L.L.C incorporated is a well known name in the ever flourishing fragrance and cosmetic Industry in Gulf. With a broad product line up that includes Oriental (Arabic) perfume oils available in alcoholic and non- alcoholic versions, Fine French fragrances, natural air freshener like Bakhoor and Farash, Coral Perfume Industry L.L.C has successfully created a signature in the Dubai fragrance market.
                    </p>
                    <button class="black">know more</button>
                </div>
            </div>
        </div>
    </div>

    <div class="category-grid sec-pad">
        <h1>shop by category</h1>
        <div style="border-left: 0px;" class="col-md-4">
            <a href="#"><img class="img-responsive" src="<?= Yii::$app->homeUrl; ?>images/shop-by-category/1.jpg"/></a>
        </div>
        <div class="col-md-4">
            <a href="#"><img class="img-responsive" src="<?= Yii::$app->homeUrl; ?>images/shop-by-category/2.jpg"/></a>
        </div>
        <div class="col-md-4">
            <a href="#"><img class="img-responsive" src="<?= Yii::$app->homeUrl; ?>images/shop-by-category/3.jpg"/></a>
        </div>
        <div class="col-md-8">
            <a href="#"><img class="img-responsive" src="<?= Yii::$app->homeUrl; ?>images/shop-by-category/4.jpg"/></a>
        </div>
    </div>

    <div class="featured-pro sec-pad">
        <h1>our featured products</h1>
        <div class="product-slider">
            <div id="adv_gp_products_4_columns_carousel" class="carousel slide four_shows_one_move gp_products_carousel_wrapper" data-ride="carousel" data-interval="2000">
                <!--========= Wrapper for slides =========-->
                <div class="carousel-inner" role="listbox">

                    <!--========= 1st slide =========-->
                    <div class="item active">
                        <div class="col-xs-12 col-sm-6 col-md-3 gp_products_item">
                            <div class="gp_products_inner">
                                <div class="gp_products_item_image">
                                    <a href="<?= Yii::$app->homeUrl; ?>site/product-detail">
                                        <img src="<?= Yii::$app->homeUrl; ?>images/featured-products/1.png" alt="1" />
                                    </a>
                                </div>
                                <ul class="text-center">
                                    <a href="#"><li><i class="fa fa-facebook"></i></li></a>
                                    <a href="#"><li><i class="fa fa-twitter"></i></li></a>
                                    <a href="#"><li><i class="fa fa-linkedin"></i></li></a>
                                </ul>
                                <div class="gp_products_item_caption">
                                    <ul class="gp_products_caption_name">
                                        <li><a href="#">Waves</a></li>
                                        <li><a href="#">Davidoff Men Cool Water Natural Spray</a></li>
                                    </ul>
                                    <ul class="gp_products_caption_rating">
                                        <li>AED 200.00</li>
                                        <li class="center">AED 400.00</li>
                                        <li class="pull-right"><a href="#">(40%OFF)</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--========= 2nd slide =========-->
                    <div class="item">
                        <div class="col-xs-12 col-sm-6 col-md-3 gp_products_item">
                            <div class="gp_products_inner">
                                <div class="gp_products_item_image">
                                    <a href="<?= Yii::$app->homeUrl; ?>product-detail">
                                        <img src="<?= Yii::$app->homeUrl; ?>images/featured-products/2.png" alt="2" />
                                    </a>
                                </div>
                                <ul class="text-center">
                                    <a href="#"><li><i class="fa fa-facebook"></i></li></a>
                                    <a href="#"><li><i class="fa fa-twitter"></i></li></a>
                                    <a href="#"><li><i class="fa fa-linkedin"></i></li></a>
                                </ul>
                                <div class="gp_products_item_caption">
                                    <ul class="gp_products_caption_name">
                                        <li><a href="#">Waves</a></li>
                                        <li><a href="#">Davidoff Men Cool Water Natural Spray</a></li>
                                    </ul>
                                    <ul class="gp_products_caption_rating">
                                        <li>AED 200.00</li>
                                        <li>AED 400.00</li>
                                        <li class="pull-right"><a href="#">(40%OFF)</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--========= 3rd slide =========-->
                    <div class="item">
                        <div class="col-xs-12 col-sm-6 col-md-3 gp_products_item">
                            <div class="gp_products_inner">
                                <div class="gp_products_item_image">
                                    <a href="<?= Yii::$app->homeUrl; ?>site/product-detail">
                                        <img src="<?= Yii::$app->homeUrl; ?>images/featured-products/3.png" alt="3" />
                                    </a>
                                </div>
                                <ul class="text-center">
                                    <a href="#"><li><i class="fa fa-facebook"></i></li></a>
                                    <a href="#"><li><i class="fa fa-twitter"></i></li></a>
                                    <a href="#"><li><i class="fa fa-linkedin"></i></li></a>
                                </ul>
                                <div class="gp_products_item_caption">
                                    <ul class="gp_products_caption_name">
                                        <li><a href="#">Waves</a></li>
                                        <li><a href="#">Davidoff Men Cool Water Natural Spray</a></li>
                                    </ul>
                                    <ul class="gp_products_caption_rating">
                                        <li>AED 200.00</li>
                                        <li>AED 400.00</li>
                                        <li class="pull-right"><a href="#">(40%OFF)</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--========= 4th slide =========-->
                    <div class="item">
                        <div class="col-xs-12 col-sm-6 col-md-3 gp_products_item">
                            <div class="gp_products_inner">
                                <div class="gp_products_item_image">
                                    <a href="<?= Yii::$app->homeUrl; ?>site/product-detail">
                                        <img src="<?= Yii::$app->homeUrl; ?>images/featured-products/4.png" alt="4" />
                                    </a>
                                </div>
                                <ul class="text-center">
                                    <a href="#"><li><i class="fa fa-facebook"></i></li></a>
                                    <a href="#"><li><i class="fa fa-twitter"></i></li></a>
                                    <a href="#"><li><i class="fa fa-linkedin"></i></li></a>
                                </ul>
                                <div class="gp_products_item_caption">
                                    <ul class="gp_products_caption_name">
                                        <li><a href="#">Waves</a></li>
                                        <li><a href="#">Davidoff Men Cool Water Natural Spray</a></li>
                                    </ul>
                                    <ul class="gp_products_caption_rating">
                                        <li>AED 200.00</li>
                                        <li>AED 400.00</li>
                                        <li class="pull-right"><a href="#">(40%OFF)</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!--======= Navigation Buttons =========-->

                <!--======= Left Button =========-->
                <a class="left carousel-control gp_products_carousel_control_left" href="#adv_gp_products_4_columns_carousel" role="button" data-slide="prev">
                    <span class="fa fa-angle-left gp_products_carousel_control_icons" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>

                <!--======= Right Button =========-->
                <a class="right carousel-control gp_products_carousel_control_right" href="#adv_gp_products_4_columns_carousel" role="button" data-slide="next">
                    <span class="fa fa-angle-right gp_products_carousel_control_icons" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>

            </div> <!--*-*-*-*-*-*-*-*-*-*- END BOOTSTRAP CAROUSEL *-*-*-*-*-*-*-*-*-*-->
        </div>

        <div class="product-slider">
            <div id="adv_gp_products_5_columns_carousel" class="carousel slide four_shows_one_move gp_products_carousel_wrapper" data-ride="carousel" data-interval="2000">
                <!--========= Wrapper for slides =========-->
                <div class="carousel-inner" role="listbox">

                    <!--========= 1st slide =========-->
                    <div class="item active">
                        <div class="col-xs-12 col-sm-6 col-md-3 gp_products_item">
                            <div class="gp_products_inner">
                                <div class="gp_products_item_image">
                                    <a href="<?= Yii::$app->homeUrl; ?>site/product-detail">
                                        <img src="<?= Yii::$app->homeUrl; ?>images/featured-products/1.png" alt="1" />
                                    </a>
                                </div>
                                <ul class="text-center">
                                    <a href="#"><li><i class="fa fa-facebook"></i></li></a>
                                    <a href="#"><li><i class="fa fa-twitter"></i></li></a>
                                    <a href="#"><li><i class="fa fa-linkedin"></i></li></a>
                                </ul>
                                <div class="gp_products_item_caption">
                                    <ul class="gp_products_caption_name">
                                        <li><a href="#">Waves</a></li>
                                        <li><a href="#">Davidoff Men Cool Water Natural Spray</a></li>
                                    </ul>
                                    <ul class="gp_products_caption_rating">
                                        <li>AED 200.00</li>
                                        <li class="center">AED 400.00</li>
                                        <li class="pull-right"><a href="#">(40%OFF)</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--========= 2nd slide =========-->
                    <div class="item">
                        <div class="col-xs-12 col-sm-6 col-md-3 gp_products_item">
                            <div class="gp_products_inner">
                                <div class="gp_products_item_image">
                                    <a href="<?= Yii::$app->homeUrl; ?>site/product-detail">
                                        <img src="<?= Yii::$app->homeUrl; ?>images/featured-products/2.png" alt="2" />
                                    </a>
                                </div>
                                <ul class="text-center">
                                    <a href="#"><li><i class="fa fa-facebook"></i></li></a>
                                    <a href="#"><li><i class="fa fa-twitter"></i></li></a>
                                    <a href="#"><li><i class="fa fa-linkedin"></i></li></a>
                                </ul>
                                <div class="gp_products_item_caption">
                                    <ul class="gp_products_caption_name">
                                        <li><a href="#">Waves</a></li>
                                        <li><a href="#">Davidoff Men Cool Water Natural Spray</a></li>
                                    </ul>
                                    <ul class="gp_products_caption_rating">
                                        <li>AED 200.00</li>
                                        <li>AED 400.00</li>
                                        <li class="pull-right"><a href="#">(40%OFF)</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--========= 3rd slide =========-->
                    <div class="item">
                        <div class="col-xs-12 col-sm-6 col-md-3 gp_products_item">
                            <div class="gp_products_inner">
                                <div class="gp_products_item_image">
                                    <a href="<?= Yii::$app->homeUrl; ?>site/product-detail">
                                        <img src="<?= Yii::$app->homeUrl; ?>images/featured-products/3.png" alt="3" />
                                    </a>
                                </div>
                                <ul class="text-center">
                                    <a href="#"><li><i class="fa fa-facebook"></i></li></a>
                                    <a href="#"><li><i class="fa fa-twitter"></i></li></a>
                                    <a href="#"><li><i class="fa fa-linkedin"></i></li></a>
                                </ul>
                                <div class="gp_products_item_caption">
                                    <ul class="gp_products_caption_name">
                                        <li><a href="#">Waves</a></li>
                                        <li><a href="#">Davidoff Men Cool Water Natural Spray</a></li>
                                    </ul>
                                    <ul class="gp_products_caption_rating">
                                        <li>AED 200.00</li>
                                        <li>AED 400.00</li>
                                        <li class="pull-right"><a href="#">(40%OFF)</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--========= 4th slide =========-->
                    <div class="item">
                        <div class="col-xs-12 col-sm-6 col-md-3 gp_products_item">
                            <div class="gp_products_inner">
                                <div class="gp_products_item_image">
                                    <a href="<?= Yii::$app->homeUrl; ?>site/product-detail">
                                        <img src="<?= Yii::$app->homeUrl; ?>images/featured-products/4.png" alt="4" />
                                    </a>
                                </div>
                                <ul class="text-center">
                                    <a href="#"><li><i class="fa fa-facebook"></i></li></a>
                                    <a href="#"><li><i class="fa fa-twitter"></i></li></a>
                                    <a href="#"><li><i class="fa fa-linkedin"></i></li></a>
                                </ul>
                                <div class="gp_products_item_caption">
                                    <ul class="gp_products_caption_name">
                                        <li><a href="#">Waves</a></li>
                                        <li><a href="#">Davidoff Men Cool Water Natural Spray</a></li>
                                    </ul>
                                    <ul class="gp_products_caption_rating">
                                        <li>AED 200.00</li>
                                        <li>AED 400.00</li>
                                        <li class="pull-right"><a href="#">(40%OFF)</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!--======= Navigation Buttons =========-->

                <!--======= Left Button =========-->
                <a class="left carousel-control gp_products_carousel_control_left" href="#adv_gp_products_5_columns_carousel" role="button" data-slide="prev">
                    <span class="fa fa-angle-left gp_products_carousel_control_icons" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>

                <!--======= Right Button =========-->
                <a class="right carousel-control gp_products_carousel_control_right" href="#adv_gp_products_5_columns_carousel" role="button" data-slide="next">
                    <span class="fa fa-angle-right gp_products_carousel_control_icons" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>

            </div> <!--*-*-*-*-*-*-*-*-*-*- END BOOTSTRAP CAROUSEL *-*-*-*-*-*-*-*-*-*-->
        </div>

        <button class="black">View more</button>

    </div>

    <div class="private-label sec-pad">
        <h1>private label manu facturing</h1>
        <div class="private-bg">
            <div class="container">
                <div class="row">
                    <div class="private-cntnt">
                        <h2>create your brand</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                        <button class="green">create now</button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="international-brands sec-pad">
        <h1>international brands</h1>
        <div class="product-slider">
            <div id="adv_gp_products_7_columns_carousel" class="carousel slide four_shows_one_move gp_products_carousel_wrapper" data-ride="carousel" data-interval="2000">
                <!--========= Wrapper for slides =========-->
                <div class="carousel-inner" role="listbox">

                    <!--========= 1st slide =========-->
                    <div class="item active">
                        <div class="col-xs-12 col-sm-6 col-md-3 gp_products_item">
                            <div class="gp_products_inner">
                                <div class="gp_products_item_image">
                                    <a href="<?= Yii::$app->homeUrl; ?>site/product-detail">
                                        <img src="<?= Yii::$app->homeUrl; ?>images/featured-products/1.png" alt="1" />
                                    </a>
                                </div>
                                <ul class="text-center">
                                    <a href="#"><li><i class="fa fa-facebook"></i></li></a>
                                    <a href="#"><li><i class="fa fa-twitter"></i></li></a>
                                    <a href="#"><li><i class="fa fa-linkedin"></i></li></a>
                                </ul>
                                <div class="gp_products_item_caption">
                                    <ul class="gp_products_caption_name">
                                        <li><a href="#">Waves</a></li>
                                        <li><a href="#">Davidoff Men Cool Water Natural Spray</a></li>
                                    </ul>
                                    <ul class="gp_products_caption_rating">
                                        <li>AED 200.00</li>
                                        <li class="center">AED 400.00</li>
                                        <li class="pull-right"><a href="#">(40%OFF)</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--========= 2nd slide =========-->
                    <div class="item">
                        <div class="col-xs-12 col-sm-6 col-md-3 gp_products_item">
                            <div class="gp_products_inner">
                                <div class="gp_products_item_image">
                                    <a href="<?= Yii::$app->homeUrl; ?>site/product-detail">
                                        <img src="<?= Yii::$app->homeUrl; ?>images/featured-products/2.png" alt="2" />
                                    </a>
                                </div>
                                <ul class="text-center">
                                    <a href="#"><li><i class="fa fa-facebook"></i></li></a>
                                    <a href="#"><li><i class="fa fa-twitter"></i></li></a>
                                    <a href="#"><li><i class="fa fa-linkedin"></i></li></a>
                                </ul>
                                <div class="gp_products_item_caption">
                                    <ul class="gp_products_caption_name">
                                        <li><a href="#">Waves</a></li>
                                        <li><a href="#">Davidoff Men Cool Water Natural Spray</a></li>
                                    </ul>
                                    <ul class="gp_products_caption_rating">
                                        <li>AED 200.00</li>
                                        <li>AED 400.00</li>
                                        <li class="pull-right"><a href="#">(40%OFF)</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--========= 3rd slide =========-->
                    <div class="item">
                        <div class="col-xs-12 col-sm-6 col-md-3 gp_products_item">
                            <div class="gp_products_inner">
                                <div class="gp_products_item_image">
                                    <a href="<?= Yii::$app->homeUrl; ?>site/product-detail">
                                        <img src="<?= Yii::$app->homeUrl; ?>images/featured-products/3.png" alt="3" />
                                    </a>
                                </div>
                                <ul class="text-center">
                                    <a href="#"><li><i class="fa fa-facebook"></i></li></a>
                                    <a href="#"><li><i class="fa fa-twitter"></i></li></a>
                                    <a href="#"><li><i class="fa fa-linkedin"></i></li></a>
                                </ul>
                                <div class="gp_products_item_caption">
                                    <ul class="gp_products_caption_name">
                                        <li><a href="#">Waves</a></li>
                                        <li><a href="#">Davidoff Men Cool Water Natural Spray</a></li>
                                    </ul>
                                    <ul class="gp_products_caption_rating">
                                        <li>AED 200.00</li>
                                        <li>AED 400.00</li>
                                        <li class="pull-right"><a href="#">(40%OFF)</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--========= 4th slide =========-->
                    <div class="item">
                        <div class="col-xs-12 col-sm-6 col-md-3 gp_products_item">
                            <div class="gp_products_inner">
                                <div class="gp_products_item_image">
                                    <a href="<?= Yii::$app->homeUrl; ?>site/product-detail">
                                        <img src="<?= Yii::$app->homeUrl; ?>images/featured-products/4.png" alt="4" />
                                    </a>
                                </div>
                                <ul class="text-center">
                                    <a href="#"><li><i class="fa fa-facebook"></i></li></a>
                                    <a href="#"><li><i class="fa fa-twitter"></i></li></a>
                                    <a href="#"><li><i class="fa fa-linkedin"></i></li></a>
                                </ul>
                                <div class="gp_products_item_caption">
                                    <ul class="gp_products_caption_name">
                                        <li><a href="#">Waves</a></li>
                                        <li><a href="#">Davidoff Men Cool Water Natural Spray</a></li>
                                    </ul>
                                    <ul class="gp_products_caption_rating">
                                        <li>AED 200.00</li>
                                        <li>AED 400.00</li>
                                        <li class="pull-right"><a href="#">(40%OFF)</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!--======= Navigation Buttons =========-->

                <!--======= Left Button =========-->
                <a class="left carousel-control gp_products_carousel_control_left" href="#adv_gp_products_7_columns_carousel" role="button" data-slide="prev">
                    <span class="fa fa-angle-left gp_products_carousel_control_icons" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>

                <!--======= Right Button =========-->
                <a class="right carousel-control gp_products_carousel_control_right" href="#adv_gp_products_7_columns_carousel" role="button" data-slide="next">
                    <span class="fa fa-angle-right gp_products_carousel_control_icons" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>

            </div> <!--*-*-*-*-*-*-*-*-*-*- END BOOTSTRAP CAROUSEL *-*-*-*-*-*-*-*-*-*-->
        </div>
    </div>

    <div class="blog sec-pad">
        <h1>From our blog</h1>
        <div class="container">
            <div class="row">
                <div class="blog-box col-md-4 col-sm-4  col-xs-12">
                    <div class="img-box">
                        <img class="img-responsive" src="images/blog/1.jpg"/>
                    </div>
                    <h5>Adipisicing elit, sed do eiusmod tempor</h5>
                    <ul class="date">
                        <li><i class="fa fa-calendar-check-o" aria-hidden="true"></i>Dec  01  2017</li>
                    </ul>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim </p>
                    <a href="">know more</a>
                </div>
                <div class="blog-box col-md-4 col-sm-4  col-xs-12">
                    <div class="img-box">
                        <img class="img-responsive" src="images/blog/1.jpg"/>
                    </div>
                    <h5>Adipisicing elit, sed do eiusmod tempor</h5>
                    <ul class="date">
                        <li><i class="fa fa-calendar-check-o" aria-hidden="true"></i>Dec  01  2017</li>
                    </ul>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim </p>
                    <a href="">know more</a>
                </div>
                <div class="blog-box col-md-4 col-sm-4  col-xs-12">
                    <div class="img-box">
                        <img class="img-responsive" src="images/blog/1.jpg"/>
                    </div>
                    <h5>Adipisicing elit, sed do eiusmod tempor</h5>
                    <ul class="date">
                        <li><i class="fa fa-calendar-check-o" aria-hidden="true"></i>Dec  01  2017</li>
                    </ul>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim </p>
                    <a href="">know more</a>
                </div>
            </div>
        </div>
    </div>

    <div class="newsletter sec-pad">
        <div class="container">
            <div class="row">
                <div style="padding-right: 50px;" class="col-md-7 col-sm-7">
                    <h3>Subscribe</h3>
                    <h4>our newsletter</h4>
                    <p>Subscribe to our newsletter and stay updated on the <br/>exclusive deals  and special offers!</p>
                    <div class="col-md-12 col-sm-12 col-xs-12 search">
                        <div class="input-group">
                            <input type="text" class="form-control SearchBar" placeholder="Email Address....">
                            <span class="input-group-btn">
                                <button class="btn btn-defaul SearchButton" type="button">
                                    <span class="SearchIcon">Subscribe</span>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-5">
                    <div id="youtube-vid">
                        <iframe width="100%" height="315" src="https://www.youtube.com/embed/OKasHX2RRfo" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>