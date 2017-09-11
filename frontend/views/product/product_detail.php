<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use common\models\Unit;

$this->title = $product_details->canonical_name;
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pad-20"></div>
<div class="container">
    <div class="breadcrumb">
        <span class="current-page">product</span>
        <ol class="path">
            <li><?= Html::a('<span>Home</span>', ['index'], ['class' => '']) ?></li>
            <li><?= Html::a('<span>product details</span>', ['site/product-detail'], ['class' => '']) ?></li>
        </ol>
    </div>
</div>
<div id="product-page">
    <div class="container">
        <div class="row">
            <input type="hidden" name="product_id" id="product-id" value="<?= $product_details->id ?>"/>
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 product-img-view-box">



                <div class="app-figure" id="zoom-fig">
                    <?php
                    $product_image = Yii::$app->basePath . '/../uploads/product/' . $product_details->id . '/profile/' . $product_details->canonical_name . '.' . $product_details->profile;
                    if (file_exists($product_image)) {
                        ?>
                        <a id="Zoom-1" class="MagicZoom" title="" href="<?= Yii::$app->homeUrl . '/uploads/product/' . $product_details->id . '/profile/' . $product_details->canonical_name . '_big.' . $product_details->profile ?>">
                            <img src="<?= Yii::$app->homeUrl . '/uploads/product/' . $product_details->id . '/profile/' . $product_details->canonical_name . '_big.' . $product_details->profile ?>?scale.height='400'" alt=""/>
                        </a>
                        <?php
                    } else {
                        ?>
                        <a id="Zoom-1" class="MagicZoom" title="" href="<?= Yii::$app->homeUrl . 'uploads/product/gallery_dummy.png' ?>">
                            <img src="<?= Yii::$app->homeUrl . 'uploads/product/gallery_dummy.png' ?>?scale.height='400'" alt=""/>
                        </a>
                    <?php }
                    ?>

                    <div class="selectors">
                        <?php
                        $path = Yii::getAlias('@paths') . '/product/' . $product_details->id . '/gallery_thumb';
                        if (count(glob("{$path}/*")) > 0) {

                            $k = 0;
                            foreach (glob("{$path}/*") as $file) {
                                $k++;
                                $arry = explode('/', $file);
                                $img_nmee = end($arry);
                                $img_nmees = explode('.', $img_nmee);
                                if ($img_nmees['1'] != '') {
                                    ?>
                                    <a data-zoom-id="Zoom-1" href="<?= Yii::$app->homeUrl . '/uploads/product/' . $product_details->id . '/gallery/' . end($arry) ?>">
                                        <img srcset="<?= Yii::$app->homeUrl . '/uploads/product/' . $product_details->id . '/gallery/' . end($arry) ?>" width="94px" height="93px"/>
                                    </a>
                                    <?php
                                }
                            }
                        } else {
                            ?>
                            <a data-zoom-id="Zoom-1" href="<?= Yii::$app->homeUrl . 'uploads/product/gallery_dummy.jpg' ?>" data-image="<?= Yii::$app->homeUrl . 'uploads/product/gallery_dummy.jpg' ?>?scale.height=400" >
                                <img srcset="<?= Yii::$app->homeUrl . 'uploads/product/gallery_dummy.jpg' ?>?scale.width=112 2x" src="<?= Yii::$app->homeUrl . 'uploads/product/dummy_gallery_thump.png' ?>?scale.width=56"/>
                            </a>
                        <?php }
                        ?>

                    </div>
                </div>
                <span class="company-speciality col-md-12">Safe and Secure Payments. Easy returns. 100% Authentic products.</span>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 details">
                <h3 class="product-title"><?= $product_details->product_name ?></h3>
                <!--                <div class="rating">
                                    <div class="stars">
                                        <div class="lead">
                                            <div id="stars-existing" class="starrr" data-rating='4'></div>
                                        </div>
                                    </div>
                                </div>-->
                <?php if ($product_details->offer_price != "0") { ?>
                    <p class="price"><?= $product_details->offer_price ?> AED  <span><?= $product_details->price ?> AED</span> </p>
                <?php } else { ?>
                    <p class="price"><?= $product_details->price ?> AED  </p>
                <?php } ?>
                <p class="message">FREE Shipping on orders over 150.00 AED</p>
                <div class="hr-box">
                    <h5 class="sizes">sizes:
                        <?php $unit = Unit::findOne($product_details->size_unit); ?>
                        <span class="size active-box" data-toggle="tooltip" title=""><?= $product_details->size . $unit->unit_name ?></span>
                    </h5>
                    <br/>
                    <h5 class="type">Fragrance Type:
                        <?php $fregrance = \common\models\Fregrance::findOne($product_details->product_type); ?>
                        <span class="not-available active-box" data-toggle="tooltip" title=""><?= $fregrance->name; ?></span>
                        <!--<span class="not-available" data-toggle="tooltip" title="Not In store">Arabic Parfum</span>-->
                    </h5>
                </div>
                <p class="product-description"><?= $product_details->main_description ?></p>
                <?php if ($product_details->stock != '0') { ?>
                    <h5 class="availability">availability:
                        <span>many in stock</span>
                    <?php } else { ?>
                        <span style="color: red">Not in stock</span>
                    <?php } ?>
                </h5>
                <input type = "hidden" value = "<?= $product_details->canonical_name; ?>" id="cano_name_<?= $product_details->id; ?>" name="cano_name">
                <div class="col-lg-12 col-md-12 hidden-sm hidden-xs pad-0">
                    <?php if ($product_details->stock != '0') { ?>
                        <select class="q_ty" id="number_passengers"  name="quantity" id="quantity">
                            <?php
                            for ($i = 1; $i <= $product_details->stock; $i++) {
                                ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php } ?>


                        </select>
                                        <!--<input type="number" min="0" max="5" id="number_passengers" value="1">-->

                        <div class="action">
                            <?= Html::a('add to cart', 'javascript:void(0)', ['class' => 'start-shopping add_to_cart', 'id' => $product_details->id]) ?>
                            <?= Html::a('buy now', 'javascript:void(0)', ['class' => 'start-shopping']) ?>
                        </div>
                    <?php } ?>
                    <div class="share">
                        <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <div class="hidden-lg hidden-md col-sm-12 col-xs-12 product-option-buttons">
                <?php if ($product_details->stock != '0') { ?>
                    <select class="q_ty" id="number_passengers"  name="quantity" id="quantity">
                        <?php
                        for ($i = 1; $i <= $product_details->stock; $i++) {
                            ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                        <?php } ?>


                    </select>
                                <!--<input type="number" min="0" max="5" id="number_passengers" value="1">-->

                    <div class="action">
                        <?= Html::a('add to cart', 'javascript:void(0)', ['class' => 'start-shopping add_to_cart', 'id' => $product_details->id]) ?>
                        <?= Html::a('buy now', 'javascript:void(0)', ['class' => 'start-shopping']) ?>
                    </div>
                <?php } ?>
                <div class="share">
                    <ul>
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-plus" aria-hidden="true"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="pad-30 hidden-sm hidden-md"></div>
    <div class="modal fade" id="modal-6">
        <div class="modal-dialog" id="modal-pop-up">

        </div>
    </div>
    <div class="container">
        <div class="product-info-tab">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#info">More Info</a></li>
                <li><a data-toggle="tab" href="#reviews">Reviews</a></li>
            </ul>

            <div class="tab-content">
                <div id="info" class="tab-pane fade in active">
                    <p><?= $product_details->product_detail ?></p>
                </div>
                <div id="reviews" class="tab-pane fade">
                    <div class="review-adding-sec">
                        <h4>Customer Reviews</h4>
                        <div class="rating">
                            <div class="stars">
                                <div class="lead">
                                    <!--<div id="stars-existing" class="starrr" data-rating='2'><p class="review-base">Based on 2 Reviews</p> <a class="add-review" href="#">add review</a></div>-->
                                    <div id="stars-existing" class="" data-rating='2'><p class="review-base"></p> <a id="" class="add-review" href="#">add review</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    if (!empty($product_reveiws)) {
                        foreach ($product_reveiws as $reveiws) {
                            ?>
                            <div class="customer-reviews">
                                <p class="subject"> <?= $reveiws->tittle ?></p>
                                <i><?= \common\models\User::findOne($reveiws->user_id)->first_name ?> on <?= date("M d , Y", strtotime($reveiws->review_date)) ?></i>
                                <p class="message"><?= $reveiws->description ?></p>
                                <div class="report-span"><a href="#">Report as Inappropriate</div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="pad-30"></div>
    <div class="container">
        <?php
        if (!empty($recently_viewed)) {
            ?>
            <div class="international-brands">
                <h1>Recently viewed</h1>
                <div class="product-slider">
                    <div id="adv_gp_products_1_columns_carousel" class="carousel slide four_shows_one_move gp_products_carousel_wrapper" data-ride="carousel" data-interval="2000">
                        <!--========= Wrapper for slides =========-->
                        <div class="carousel-inner" role="listbox">

                            <!--========= 1st slide =========-->
                            <?php
                            $j = 0;
                            foreach ($recently_viewed as $recent) {
                                $j++;
                                $model = \common\models\Product::findOne($recent->product_id);
                                if ($model) {
                                    ?>
                                    <div class="item <?php
                                    if ($j == 1) {
                                        echo ' active';
                                    }
                                    ?>">
                                        <div class="col-xs-12 col-sm-6 col-md-3 gp_products_item">
                                            <div class="gp_products_inner">
                                                <div class="gp_products_item_image">
                                                    <a href="<?= Yii::$app->homeUrl . 'product/product_detail/' . $model->canonical_name ?>">
                                                        <?php
                                                        $product_image = Yii::$app->basePath . '/../uploads/product/' . $model->id . '/profile/' . $model->canonical_name . '.' . $model->profile;
                                                        if (file_exists($product_image)) {
                                                            ?>
                                                            <img src="<?= Yii::$app->homeUrl . 'uploads/product/' . $model->id . '/profile/' . $model->canonical_name . '.' . $model->profile ?>" height="100%" alt="1" />
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <img src="<?= Yii::$app->homeUrl . 'uploads/product/dummy_perfume.png' ?>" height="100%" alt="1" />
                                                        <?php }
                                                        ?>
                                                    </a>
                                                </div>
                                                <div class="gp_products_item_caption">
                                                    <ul class="gp_products_caption_name">
                                                        <li><a href="#"><?= $model->product_name ?></a></li>
                                                        <li><a href="#"><?= $model->product_type ?></a></li>
                                                    </ul>
                                                    <ul class="gp_products_caption_rating">
                                                        <?php
                                                        if ($model->offer_price != "0") {
                                                            $percentage = round(100 - (($model->offer_price / $model->price) * 100));
                                                            ?>
                                                            <li>AED <?= $model->offer_price; ?></li>
                                                            <li class="center">AED <?= $model->price; ?></li>
                                                            <li class="pull-right"><a href="#">(<?= $percentage ?>%OFF)</a></li>
                                                        <?php } else {
                                                            ?>
                                                            <li class="center">AED <?= $model->price; ?></li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>



                        </div>

                        <!--======= Navigation Buttons =========-->

                        <!--======= Left Button =========-->
                        <a class="left carousel-control gp_products_carousel_control_left" href="#adv_gp_products_1_columns_carousel" role="button" data-slide="prev">
                            <span class="fa fa-angle-left gp_products_carousel_control_icons" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>

                        <!--======= Right Button =========-->
                        <a class="right carousel-control gp_products_carousel_control_right" href="#adv_gp_products_1_columns_carousel" role="button" data-slide="next">
                            <span class="fa fa-angle-right gp_products_carousel_control_icons" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>

                    </div> <!--*-*-*-*-*-*-*-*-*-*- END BOOTSTRAP CAROUSEL *-*-*-*-*-*-*-*-*-*-->
                </div>
            </div>
            <?php
        }
        ?>
        <div class="pad-30"></div>
        <div class="international-brands">
            <?php
            if (!empty($related_product)) {
                ?>
                <h1>Related Products</h1>
                <div class="product-slider">
                    <div id="adv_gp_products_8_columns_carousel" class="carousel slide four_shows_one_move gp_products_carousel_wrapper" data-ride="carousel" data-interval="2000">
                        <!--========= Wrapper for slides =========-->
                        <div class="carousel-inner" role="listbox">
                            <!--========= 1st slide =========-->
                            <?php
                            $k = 0;
                            foreach ($related_product as $val) {
                                $k++;
                                ?>
                                <div class="item <?php
                                if ($k == 1) {
                                    echo ' active';
                                }
                                ?>">
                                    <div class="col-xs-12 col-sm-6 col-md-3 gp_products_item">
                                        <div class="gp_products_inner">
                                            <div class="gp_products_item_image">
                                                <a href="<?= Yii::$app->homeUrl . 'product/product_detail/' . $val->canonical_name ?>">
                                                    <?php
                                                    $product_image = Yii::$app->basePath . '/../uploads/product/' . $val->id . '/profile/' . $val->canonical_name . '.' . $val->profile;
                                                    if (file_exists($product_image)) {
                                                        ?>
                                                        <img src="<?= Yii::$app->homeUrl . 'uploads/product/' . $val->id . '/profile/' . $val->canonical_name . '.' . $val->profile ?>" height="100%" alt="1" />
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <img src="<?= Yii::$app->homeUrl . 'uploads/product/dummy_perfume.png' ?>" height="100%" alt="1" />
                                                    <?php }
                                                    ?>
                                                </a>
                                            </div>
                                            <div class="gp_products_item_caption">
                                                <ul class="gp_products_caption_name">
                                                    <li><a href="#"><?= $val->product_name ?></a></li>
                                                    <li><a href="#"><?= $val->product_type ?></a></li>
                                                </ul>
                                                <ul class="gp_products_caption_rating">
                                                    <?php
                                                    if ($val->offer_price != "0") {
                                                        $percentage = round(100 - (($val->offer_price / $val->price) * 100));
                                                        ?>
                                                        <li>AED <?= $val->offer_price; ?></li>
                                                        <li class="center">AED <?= $val->price; ?></li>
                                                        <li class="pull-right"><a href="#">(<?= $percentage ?>%OFF)</a></li>
                                                    <?php } else {
                                                        ?>
                                                        <li class="center">AED <?= $val->price; ?></li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>

                        </div>

                        <!--======= Navigation Buttons =========-->

                        <!--======= Left Button =========-->
                        <a class="left carousel-control gp_products_carousel_control_left" href="#adv_gp_products_8_columns_carousel" role="button" data-slide="prev">
                            <span class="fa fa-angle-left gp_products_carousel_control_icons" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>

                        <!--======= Right Button =========-->
                        <a class="right carousel-control gp_products_carousel_control_right" href="#adv_gp_products_8_columns_carousel" role="button" data-slide="next">
                            <span class="fa fa-angle-right gp_products_carousel_control_icons" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>

                    </div> <!--*-*-*-*-*-*-*-*-*-*- END BOOTSTRAP CAROUSEL *-*-*-*-*-*-*-*-*-*-->
                </div>
                <?php
            }
            ?>
        </div>

    </div>


</div>

</div>
<div class="pad-20"></div>
<script>
    $(document).ready(function () {

        /*
         * on click of the Add new partner link
         * return pop up form for add new bussinesss partner
         */

        $(document).on('click', '.add-review', function (e) {
            var product = $("#product-id").val();
            $.ajax({
                type: 'POST',
                cache: false,
                async: false,
                data: {product_id: product},
                url: '<?= Yii::$app->homeUrl; ?>product/add-review',
                success: function (data) {
                    $("#modal-pop-up").html(data);
                    $('#modal-6').modal('show', {backdrop: 'static'});
                    e.preventDefault();
                }
            });
        });
        /*
         * on submit of the form add new Principals
         * return new principal added into Debtor
         */

        $(document).on('submit', '#submit-reviews', function (e) {
            if (validateReview() == 0) {
                var str = $(this).serialize();
                $.ajax({
                    url: '<?= Yii::$app->homeUrl; ?>product/save-review',
                    type: "POST",
                    data: str,
                    success: function (data) {
                        $('#modal-6').modal('hide');
                    }
                });
                return false;
            } else {
                e.preventDefault();
            }
        });
    });

    function validateReview() {

        if (!$('#customerreviews-tittle').val()) {
            if ($("#customerreviews-tittle").parent().next(".validation").length == 0) // only add if not added
            {
                $("#customerreviews-tittle").parent().after("<div class='validation' style='color:red;margin-bottom: 20px;position: absolute;top: 68px;'>Tittle cannot be blank.</div>");
            }
            $('#customerreviews-tittle').focus();
            var valid = 1;
        } else {
            $("#customerreviews-tittle").parent().next(".validation").remove(); // remove it
            var valid = 0;
        }
        if (!$('#customerreviews-description').val()) {
            if ($("#customerreviews-description").parent().next(".validation").length == 0) // only add if not added
            {
                $("#customerreviews-description").parent().after("<div class='validation' style='color:red;margin-bottom: 20px;position: absolute;top: 68px;'>Description cannot be blank.</div>");
            }
            $('#customerreviews-description').focus();
            var valid = 1;
        } else {
            $("#customerreviews-description").parent().next(".validation").remove(); // remove it
            var valid = 0;
        }
        return valid;
    }
</script>
