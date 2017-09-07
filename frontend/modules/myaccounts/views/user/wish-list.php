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
        <div class="col-lg-4 col-md-4 col-sm-12 left-accordation">
            <div class="panel panel-default">
                <div class="panel-body lit-blue">
                    <div class="slide-container">
                        <div class="list-group" id="mg-multisidetabs">
                            <a href="#" class="list-group-item active-head "><span>Orders</span><span class="glyphicon glyphicon-menu-down mg-icon pull-right"></span></a>
                            <div class="panel list-sub" style="display: block">
                                <div class="panel-body">
                                    <div class="list-group">
                                        <?= Html::a('<span class="fa fa-caret-left pull-left"></span><span>My orders</span>', ['/myaccounts/user/my-orders'], ['class' => 'list-group-item']) ?>
                                    </div>
                                </div>
                            </div>

                            <a href="#" class="list-group-item active-head "><span>My stuff</span><span class="glyphicon glyphicon-menu-down mg-icon pull-right"></span></a>
                            <div class="panel list-sub" style="display: block">
                                <div class="panel-body">
                                    <div class="list-group">
                                        <?= Html::a('<span class="fa fa-caret-left pull-left"></span><span>My reviews & ratings</span>', ['/myaccounts/user/my-reviews'], ['class' => 'list-group-item']) ?>
                                        <?= Html::a('<span class="fa fa-caret-left pull-left"></span><span>My Wishlist</span>', ['/myaccounts/user/wish-list'], ['class' => 'list-group-item active']) ?>
                                    </div>
                                </div>
                            </div>

                            <a href="#" class="list-group-item active-head "><span>settings</span><span class="glyphicon glyphicon-menu-down mg-icon pull-right"></span></a>
                            <div class="panel list-sub" style="display: block">
                                <div class="panel-body">
                                    <div class="list-group">
                                        <?= Html::a('<span class="fa fa-caret-left pull-left"></span><span>personal information</span>', ['/myaccounts/user/personal-info'], ['class' => 'list-group-item']) ?>
                                        <?= Html::a('<span class="fa fa-caret-left pull-left"></span><span>change password</span>', ['/myaccounts/user/change-password'], ['class' => 'list-group-item']) ?>
                                        <?= Html::a('<span class="fa fa-caret-left pull-left"></span><span>addresses</span>', ['/myaccounts/user-address/index'], ['class' => 'list-group-item']) ?>
                                        <?= Html::a('<span class="fa fa-caret-left pull-left"></span><span>profile settings</span>', ['/myaccounts/user/personal-info'], ['class' => 'list-group-item']) ?>
                                        <?= Html::a('<span class="fa fa-caret-left pull-left"></span><span>update email/mobile</span>', ['/myaccounts/user/personal-info'], ['class' => 'list-group-item']) ?>
                                        <?= Html::a('<span class="fa fa-caret-left pull-left"></span><span>deactivate account</span>', ['/myaccounts/user/personal-info'], ['class' => 'list-group-item']) ?>
                                    </div>
                                </div>
                            </div>

                        </div><!-- ./ end list-group -->
                    </div><!-- ./ end slide-container -->
                </div><!-- ./ end panel-body -->
            </div><!-- ./ end panel panel-default-->
        </div><!-- ./ endcol-lg-6 col-lg-offset-3 -->
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
