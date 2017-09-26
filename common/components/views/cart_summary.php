<?php

use yii\helpers\Html;
use common\models\Product;
use common\models\Brand;
use common\models\OrderMaster;
use common\models\Settings;
?>
<div class="summery-box lit-blue">
    <div class="heading active">
        <p>SUMMARY</p>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: left;"><p><?= count($cart_items); ?> Items</p></div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <?php foreach ($cart_items as $cart) { ?>
            <?php
            $product = Product::findOne($cart->product_id);
            $product_image = Yii::$app->basePath . '/../uploads/product/' . $product->id . '/profile/' . $product->canonical_name . '.' . $product->profile;
            if (file_exists($product_image)) {
                $image = Yii::$app->homeUrl . 'uploads/product/' . $product->id . '/profile/' . $product->canonical_name . '_thumb.' . $product->profile;
            } else {
                $image = Yii::$app->homeUrl . 'uploads/product/profile_thumb.png';
            }
            ?>
            <div class="media">
                <a class="thumbnail col-lg-2 col-md-2 col-sm-2 col-xs-2" href="#"> <img class="media-object" src="<?= $image ?>"> </a>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="top: 10px; text-align: left">
                    <h4 class="product-heading"><a href="#"><?= $product->product_name; ?></a></h4>
                    <?php $brand = Brand::findOne($product->brand); ?>
                    <h5 class="brand-name"><a href="#"><?= $brand->brand; ?></a></h5>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="top: 15px; text-align: right; padding-right: 0;">
                    <?php
                    if ($product->offer_price == '0' || $product->offer_price == '') {
                        $price = $product->price;
                    } else {
                        $price = $product->offer_price;
                    }
                    $total = $price * $cart->quantity;
                    ?>
                    <p class="price">AED <?= $total; ?></p>
                </div>
            </div>
        <?php } ?>
        <br/>
    </div>
    <div class=" sub-total">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 pad-0" style="padding: 15px 15px; border-top: 1px solid #ddd; border-right: 1px solid #ddd;">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 label">Subtotal</div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 label">Shipping</div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 pad-0" style="padding: 15px 15px; border-top: 1px solid #ddd;">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 price"><?= $subtotal->total_amount ?></div>
            <?php
            $shipextra = Settings::findOne('2')->value;
            $ship_charge = $subtotal->total_amount <= $shipping_limit ? $shipextra : 0.00
            ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 price"><?= $ship_charge ?></div>
        </div>
    </div>
    <div class="total">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 pad-0" style="padding: 15px 15px; border-top: 1px solid #ddd; border-right: 1px solid #ddd;">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 label">Total  ( tax excl )</div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 pad-0" style="padding: 15px 15px; border-top: 1px solid #ddd;">
            <?php $grand_total = $subtotal->total_amount + $ship_charge ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 price">AED <?= $grand_total ?></div>
        </div>
    </div>
</div>