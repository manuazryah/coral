<?php

use yii\helpers\Html;
?>
<div class="orders-box wish-list">
    <div class="track">
        <button title="Remove From Cart" class="remove-cart"><i class="fa fa-times" aria-hidden="true"></i></button>
        <button class="add-cart green2">add to cart</button>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ordered-pro-dtls">
        <div class="customer-reviews active">
            <div class="pro-img-box col-lg-3 col-md-3 col-sm-3 col-xs-4">
                <?php
                $product = \common\models\Product::findOne($model->product);
                $product_image = Yii::$app->basePath . '/../uploads/product/' . $product->id . '/profile/' . $product->canonical_name . '_thumb.' . $product->profile;
                if (file_exists($product_image)) {
                    ?>
                    <img src="<?= Yii::$app->homeUrl . 'uploads/product/' . $product->id . '/profile/' . $product->canonical_name . '_thumb.' . $product->profile ?>" height="100%" alt="1" />
                    <?php
                } else {
                    ?>
                    <img src="<?= Yii::$app->homeUrl . 'uploads/product/profile_thumb.png' ?>" height="100%" alt="1" />
                <?php }
                ?>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-8">
                <p class="product-name"> <?= $product->product_name ?></p>
                <?php
                if ($product->offer_price != "0") {
                    $percentage = round(100 - (($product->offer_price / $product->price) * 100));
                    ?>
                    <p class="dashed-price"> AED <?= $product->offer_price; ?></p><span class="offer"><?= $percentage ?>%OFF</span>
                    <p class="offer-price">AED <?= $product->price; ?></p>
                <?php } else {
                    ?>
                    <p class="offer-price">AED <?= $product->price; ?></p>
                <?php } ?>
                <span class="stock">In Stock</span>
                <p class="message">Delivered in 4-5 business days.</p>
            </div>
        </div>
    </div>
</div>

