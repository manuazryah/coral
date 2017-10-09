<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Fregrance;
use common\models\CmsOthers;
use common\components\ProductLinksWidget;

$youtube_video = CmsOthers::find()->where(['id' => 7])->one();
if (isset($meta_title) && $meta_title != '')
    $this->title = $meta_title;
?>
<style>
    iframe, object, embed {
        max-width: 100%;
    }
</style>
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
                                <p data-animation="animated fadeInLeft" class="hidden-sm hidden-xs"><?= $value->slider_first_tittle ?></p>
                                <h3 data-animation="animated zoomInRight" class="hidden-sm hidden-xs"><?= $value->slider_second_tittle ?></h3>
                                <?php if (isset($value->slider_link) && $value->slider_link != '') { ?>
                                    <a href="<?= $value->slider_link ?>" target="_blank" class="start-shopping" data-animation="animated fadeInLeft">start shopping</a>
                                <?php } ?>
                                <?php // Html::a('start shopping', ['/product/index', 'id' => $catag->category_code], ['class' => 'start-shopping', 'target' => '_blank', 'data-animation' => 'animated fadeInLeft'])  ?>
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
            ?>
            <div style="<?= $s == 0 ? 'border-left: 0px;' : '' ?>" class=" <?= $s == 4 ? 'col-lg-8 col-md-8 col-sm-12 col-xs-12' : 'col-lg-4 col-md-4 col-sm-12 col-xs-12' ?> <?php if ($s == 1) { ?>img-1 <?php } else if ($s == 2) { ?>img-2<?php } else if ($s == 3) { ?>img-3<?php } else if ($s == 4) { ?>img-4<?php } ?>">
                <a href="<?= $shops_by->link ?>"><img src="<?= Yii::$app->homeUrl; ?>uploads/cms/shop-by-category/<?= $shops_by->id ?>/large.<?= $shops_by->image ?>"/></a>
            </div>

        <?php }
        ?>

    </div>
    <?php
    if (!empty($featured_products)) {
        ?>
        <div class="featured-pro sec-pad">

            <h1>our featured products</h1>
            <div class="col-md-12 product-list" style="padding: 0px 50px;">
                <div class="international-brands">
                    <?php
                    foreach ($featured_products as $featured_product) {
                        ?>
                        <div class="item ">
                            <div class="col-xs-12 col-sm-6 col-md-3 gp_products_item">
                                <?= ProductLinksWidget::widget(['id' => $featured_product->id]) ?>
                            </div>
                        </div>
                    <?php } ?>
                    <button class="black"><?= Html::a('View more', ['product/index', 'featured' => 'featured']) ?></button>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
    <div class="private-label sec-pad">
        <h1>private label manufacturing</h1>
        <div class="private-bg" style="background-image: url(images/index-private-label-bg.jpg);">
            <div class="container">
                <div class="row">
                    <div class="private-cntnt">
                        <h2><?= $private_label->index_title ?></h2>
                        <p> <?= $private_label->index_content ?> </p>
                        <!--<button class="green">create now</button>-->
                        <button class="green"><?= Html::a('create now', ['site/private-label']) ?></button>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php if (count($international_products) > 0) { ?>
        <div class="international-brands sec-pad">
            <h1>international brands</h1>
            <div class="product-slider">
                <div id="adv_gp_products_7_columns_carousel" class="carousel slide four_shows_one_move gp_products_carousel_wrapper" data-ride="carousel" data-interval="2000">
                    <!--========= Wrapper for slides =========-->
                    <div class="carousel-inner" role="listbox">

                        <?php
                        $z = 0;
                        foreach ($international_products as $international) {
                            $z++;
                            ?>
                            <div class="item <?php
                            if ($z == 1) {
                                echo ' active';
                            }
                            ?>">
                                <div class="col-xs-12 col-sm-6 col-md-3 gp_products_item">
                                    <?= ProductLinksWidget::widget(['id' => $international->id]) ?>
                                </div>
                            </div>
                        <?php } ?>





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
    <?php } ?>

    <div class="blog sec-pad">
        <h1>From our blog</h1>
        <div class="container">
            <div class="row">
                <?php
                foreach ($from_blogs as $from_blogs) {
                    ?>
                    <div class="blog-box col-md-4 col-sm-4  col-xs-12">
                        <div class="img-box" style="min-height: 235px;
                             max-height: 235px;">
                            <img class="img-responsive" src="<?= Yii::$app->homeUrl ?>uploads/cms/from-blog/<?= $from_blogs->id ?>/large.<?= $from_blogs->image ?>"/>
                        </div>
                        <h5><?= $from_blogs->title; ?></h5>
                        <ul class="date">
                            <li><i class="fa fa-calendar-check-o" aria-hidden="true"></i><?= date('M d Y', strtotime($from_blogs->blog_date)) ?></li>
                        </ul>
                        <p style="min-height: 78px;max-height: 78px"><?= substr($from_blogs->content, 0, 150); ?></p>
                        <?php // Html::a('know more', ['blog-detail?id=' . $from_blogs->id])       ?>
                        <?= Html::a('know more', ['blog-detail', 'id' => $from_blogs->id]) ?>
                    </div>
                    <?php
                }
                ?>
                <button class="black"><?= Html::a('View more', ['our-blog']) ?></button>

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
                        <?= $youtube_video->content ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>