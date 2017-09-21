<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Fregrance;
?>
<section id="main-slider">
        <div id="bootstrap-touch-slider" class="carousel bs-slider fade  control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="5000" >

                <!-- Indicators -->
                <ol class="carousel-indicators">
                        <?php
                        $j = 0;
                        foreach ($slider as $value) {
                                ?>
                                <li data-target="#bootstrap-touch-slider" data-slide-to="<?= $j ?>" class="<?= $j == 0 ? 'active' : '' ?>"></li>
                                <?php
                                $j++;
                        }
                        ?>
                </ol>

                <!-- Wrapper For Slides -->
                <div class="carousel-inner" role="listbox">

                        <?php
                        $k = 0;
                        foreach ($slider as $value) {
                                ?>
                                <div class="item <?= $k == 0 ? 'active' : '' ?>">

                                        <!-- Slide Background -->
                                        <img src="<?= Yii::$app->homeUrl; ?>uploads/cms/slider/<?= $value->id ?>/large.<?= $value->img ?>" alt="Bootstrap Touch Slider"  class="slide-image"/>
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
                                <?php
                                $k++;
                        }
                        ?>

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
                                        <h1><?= $about->index_title ?></h1>
					<?= $about->index_content; ?>
					<button class="black"><?= Html::a('<span>know more</span>', ['/site/about'], ['class' => '']) ?></button>
                                </div>
                        </div>
                </div>
        </div>

        <div class="category-grid sec-pad">
                <h1>shop by category</h1>
                <?php
                $shops = common\models\ShopByCategory::find()->where(['status' => 1])->orderBy(['id' => SORT_ASC])->all();
                $s = 0;
                $link = '';
                foreach ($shops as $shops_by) {
                        $s++;
                        if ($shops_by->link == 0) {
                                $link = 'product/index?type=0';
                        } else if ($shops_by->link == 1) {
                                $link = 'product/index?type=1';
                        } else if ($shops_by->link == 2) {
                                $link = 'product/index';
                        }
                        ?>
                        <div style="<?= $s == 0 ? 'border-left: 0px;' : '' ?>" class=" <?= $s == 4 ? 'col-md-8' : 'col-md-4' ?>">
                                <a href="<?= Yii::$app->homeUrl . $link ?>"><img class="img-responsive" src="<?= Yii::$app->homeUrl; ?>uploads/cms/shop-by-category/<?= $shops_by->id ?>/large.<?= $shops_by->image ?>"/></a>
                        </div>

                <?php }
                ?>
        </div>
        <div class="featured-pro sec-pad">
                <h1>our featured products</h1>
                <div class="product-slider">
                        <div id="adv_gp_products_4_columns_carousel" class="carousel slide four_shows_one_move gp_products_carousel_wrapper" data-ride="carousel" data-interval="2000">
                                <!--========= Wrapper for slides =========-->
                                <div class="carousel-inner" role="listbox">
					<?php
					$index = 0;

					foreach ($featured_products as $featured_product) {
						?>
						<div class="item <?= $index == 0 ? "active" : "" ?>">
							<div class="col-xs-12 col-sm-6 col-md-3 gp_products_item">
								<div class="gp_products_inner">
									<div class="gp_products_item_image">
										<a href="<?= Yii::$app->homeUrl; ?>site/product-detail">
											<img src="<?= Yii::$app->homeUrl; ?>uploads/product/<?= $featured_product->id ?>/profile/<?= $featured_product->canonical_name ?>.<?= $featured_product->profile ?>" alt="1" />
										</a>
									</div>
									<ul class="text-center">
										<a href="#"><li><i class="fa fa-facebook"></i></li></a>
										<a href="#"><li><i class="fa fa-twitter"></i></li></a>
										<a href="#"><li><i class="fa fa-linkedin"></i></li></a>
									</ul>
									<div class="gp_products_item_caption">
										<ul class="gp_products_caption_name">
											<li><a href="#"><?= $featured_product->product_name ?></a></li>

											<?php $product_type = Fregrance::findOne($featured_product->product_type); ?>
											<li><a href="#"><?= $product_type->name; ?></a></li>
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
						<?php
						$index++;
					}
					?>

					<!--========= 1st slide =========-->


					<!--========= 2nd slide =========-->
					<!--					<div class="item">
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
										</div>-->

					<!--========= 3rd slide =========-->
					<!--					<div class="item">
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
															<li><a href="#"><?= $featured_product->product_name ?></a></li>
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
										</div>-->

					<!--========= 4th slide =========-->
					<!--					<div class="item">
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
										</div>-->

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
                                <?php
                                $from_blogs = common\models\FromOurBlog::find()->where(['status' => 1])->all();
                                foreach ($from_blogs as $from_blogs) {
                                        ?>
                                        <div class="blog-box col-md-4 col-sm-4  col-xs-12">
                                                <div class="img-box">
                                                        <img class="img-responsive" src="<?= Yii::$app->homeUrl ?>uploads/cms/from-blog/<?= $from_blogs->id ?>/large.<?= $from_blogs->image ?>"/>
                                                </div>
                                                <h5><?= $from_blogs->title; ?></h5>
                                                <ul class="date">
                                                        <li><i class="fa fa-calendar-check-o" aria-hidden="true"></i><?= date('M d Y', strtotime($from_blogs->blog_date)) ?></li>
                                                </ul>
                                                <p><?= substr($from_blogs->content, 0, 150); ?></p>
                                                <a href="">know more</a>
                                        </div>
                                        <?php
                                }
                                ?>

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
                                                <?php $form = ActiveForm::begin(); ?>
                                                <div class="input-group">
                                                        <?= $form->field($model, 'email')->textInput(['placeholder' => 'Email Address....', 'class' => 'form-control SearchBar'])->label(FALSE) ?>
                                                        <span class="input-group-btn">
                                                                <?= Html::submitButton('<span class="SearchIcon">Subscribe</span>', ['class' => 'btn btn-defaul SearchButton']) ?>
                                                        </span>
                                                </div>
                                                <?php ActiveForm::end(); ?>
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