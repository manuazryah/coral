<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\components\CartSummaryWidget;
use common\models\Product;
use common\models\Fregrance;

$this->title = 'Checkout-Confirm';
?>
<div class="pad-20 hide-xs"></div>

<div class="container">
    <div class="breadcrumb">
        <span class="current-page">My account</span>
        <ol class="path">
            <li><?= Html::a('<span>Home</span>', ['index'], ['class' => '']) ?></li>
            <li class="active">My account</li>
        </ol>
    </div>
</div>

<div id="checkout" class="my-account">
    <div class="container">
        <div class="col-lg-7 col-md-7 col-sm-12 left-accordation">
            <div class="heading">
                <p>1. Check out options </p>
            </div>
            <div class="heading">
                <p>2.   Account & Billing Details</p>
            </div>
            <div class="heading">
                <p>3.   Delivery Details</p>
            </div>
            <div class="heading margin-auto active">
                <p>4.   Confirm Order</p>
            </div>
            <div class="content lit-blue delivery-details col-xs-pad40-0">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <table class="table margin-auto">
                        <thead>
                            <tr>
                                <th class="text-left">Product</th>
                                <th class="text-right">Quantity</th>
                                <th class="text-right">Unit Price</th>
                                <th class="text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($order_details) {
                                foreach ($order_details as $order) {
                                    $product = Product::findOne($order->product_id);
                                    $product_type = Fregrance::findOne($product->product_type);
                                    ?>
                                    <tr>
                                        <td class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                            <div class="media-body">
                                                <h5 class="product-heading"><?= $product->product_name ?></h5>
                                                <h5 class="brand-name"><?= $product_type->name; ?></h5>
                                            </div>
                                        </td>
                                        <td class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-right quantity"><?= $order->quantity ?></td>
                                        <td class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-right price">AED <?= $order->amount ?></td>
                                        <?php $rate = ($order->quantity) * ($order->amount); ?>
                                        <td class = "col-lg-2 col-md-2 col-sm-2 col-xs-2 text-right price">AED <?= $rate ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class="">
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 shipping">
                            <h5 class="product-heading text-right">Shipping:</h5>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 shipping-cost">
                            <p class="text-right price">0.00</p>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 total">
                            <h5 class="product-heading text-right">Total:</h5>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 total-cost">
                            <p class="text-right price">AED <?= $subtotal?></p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 lit-blue" style="padding: 0 30px;padding-right: 55px; padding-bottom: 30px; margin-bottom: 5px;">
                <!--<a href="cart.php"><button class="continue-shopping">Return to cart</button></a>-->
                <a href="#"> <button class="green2">confirm order</button></a>
            </div>
        </div>

        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 product-summery">
            <?= CartSummaryWidget::widget(); ?>
        </div>

    </div>
</div>

<div class="pad-20"></div>