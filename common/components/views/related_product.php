<?php

use yii\helpers\Html;
use common\models\Fregrance;
use common\components\ProductLinksWidget;
?>
<?php
if (!empty($related_product)) {
    ?>
    <div class="pad-30"></div>
    <div class="international-brands">
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
                                        <a href="<?= Yii::$app->homeUrl . 'product_detail/' . $val->canonical_name ?>">
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
                                        <?= Html::a(' <div class="img-overlay"></div>', $val->canonical_name, []) ?>
                                    </div>
                                    <?= ProductLinksWidget::widget(['id' => $val->id]) ?>
                                    <div class="gp_products_item_caption">
                                        <ul class="gp_products_caption_name">
                                            <li><a href="#"><?= $val->product_name ?></a></li>
                                            <?php $product_type = Fregrance::findOne($val->product_type); ?>
                                            <li><a href="#"><?= $product_type->name; ?></a></li>
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
    </div>
    <?php
}
?>

