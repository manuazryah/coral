<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
?>
<div class="pad-20 hide-xs"></div>

<div class="container">
    <div class="breadcrumb">
        <span class="current-page">My orders</span>
        <ol class="path">
            <li><?= Html::a('<span>Home</span>', ['/site/index'], ['class' => '']) ?></li>
            <li><?= Html::a('<span>My account</span>', ['/myaccounts/user/index'], ['class' => '']) ?></li>
            <li class="active">Wish List</li>
        </ol>
    </div>
</div>

<div id="our-product" class="my-account">
    <div class="container">
        <?= Yii::$app->controller->renderPartial('_leftside_menu'); ?>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 my-account-cntnt">
            <span class="wishlist-qntity col-lg-12 col-md-12 col-sm-12 col-xs-12">2 items</span>
            <div class="orders-box wish-list">
                <div class="track">
                    <button title="Remove From Cart" class="remove-cart"><i class="fa fa-times" aria-hidden="true"></i></button>
                    <button class="add-cart green2">add to cart</button>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ordered-pro-dtls">
                    <div class="customer-reviews active">
                        <div class="pro-img-box col-lg-3 col-md-3 col-sm-3 col-xs-4">
                            <img src="images/reviews/img-1.png"/>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-8">
                            <p class="product-name"> Waves david of cool water</p>
                            <p class="dashed-price"> AED 300</p><span class="offer">50%off</span>
                            <p class="offer-price">AED 200</p>
                            <span class="stock">In Stock</span>
                            <p class="message">Delivered in 4-5 business days.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="orders-box wish-list">
                <div class="track">
                    <button title="Remove From Cart" class="remove-cart"><i class="fa fa-times" aria-hidden="true"></i></button>
                    <button class="add-cart green2">add to cart</button>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ordered-pro-dtls">
                    <div class="customer-reviews active">
                        <div class="pro-img-box col-lg-3 col-md-3 col-sm-3 col-xs-4">
                            <img src="images/reviews/img-2.png"/>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-8">
                            <p class="product-name"> Waves david of cool water</p>
                            <p class="dashed-price"> AED 300</p><span class="offer">50%off</span>
                            <p class="offer-price">AED 200</p>
                            <span class="stock">In Stock</span>
                            <p class="message">Delivered in 4-5 business days.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="pad-20"></div>
