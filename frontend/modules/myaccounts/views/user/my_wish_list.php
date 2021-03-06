<?php

use yii\helpers\Html;

$product = \common\models\Product::findOne($model->product);
?>
<div class="orders-box wish-list" id="<?= $product->canonical_name ?>">
    <div class="track">
        <?= Html::a('<i class="fa fa-times" aria-hidden="true"></i>', 'javascript:void(0)', ['class' => 'remove-cart remove-wish-list', 'id' => $product->canonical_name, 'data-val' => $model->id, 'title' => 'Remove From Wish List']) ?>
        <?= Html::a('add to cart', 'javascript:void(0)', ['class' => 'add-cart green2', 'id' => $product->canonical_name, 'data-val' => $model->id]) ?>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ordered-pro-dtls">
        <div class="customer-reviews active">
            <div class="pro-img-box col-lg-3 col-md-3 col-sm-3 col-xs-4">
                <?php
                $product_image = Yii::$app->basePath . '/../uploads/product/' . $product->id . '/profile/' . $product->canonical_name . '_thumb.' . $product->profile;
                if (file_exists($product_image)) {
                    ?>
                    <?= Html::a('<img src="' . Yii::$app->homeUrl . 'uploads/product/' . $product->id . '/profile/' . $product->canonical_name . '_thumb.' . $product->profile . '" height="100%" alt="1" />', ['/product/product_detail', 'product' => $product->canonical_name], ['target' => '_blank']) ?>
                    <?php
                } else {
                    ?>
                    <?= Html::a('<img src="' . Yii::$app->homeUrl . 'uploads/product/profile_thumb.png" height="100%" alt="1" />', ['/product/product_detail', 'product' => $product->canonical_name], ['target' => '_blank']) ?>
                <?php }
                ?>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-8">
                <?= Html::a('<p class="product-name">' . $product->product_name . '</p>', ['/product/product_detail', 'product' => $product->canonical_name], ['target' => '_blank']) ?>
                <?php
                if ($product->offer_price > "0") {
                    $percentage = round(100 - (($product->offer_price / $product->price) * 100));
                    ?>
                    <p class="dashed-price"> AED <?= $product->offer_price; ?></p><span class="offer"><?= $percentage ?>%OFF</span>
                    <p class="offer-price">AED <?= $product->price; ?></p>
                <?php } else {
                    ?>
                    <p class="offer-price">AED <?= $product->price; ?></p>
                <?php } ?>
                <span class="stock">In Stock</span>
            </div>
        </div>
    </div>
</div>

