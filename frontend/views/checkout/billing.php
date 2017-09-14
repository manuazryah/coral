<?php

use yii\helpers\Html;
use common\components\CartSummaryWidget;
?>
<div class="pad-20 hide-xs"></div>

<div class="container">
    <div class="breadcrumb">
        <span class="current-page">My account</span>
        <ol class="path">
            <li><a href="index.php">Home</a></li>
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
            <div class="heading margin-auto active">
                <p>2.   Account & Billing Details</p>
            </div>
            <div class="content lit-blue">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <form>
                        <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12 address-field">
                            <label for="usr">Address*</label>
                            <input required="" type="text" class="form-control" placeholder="address" id="address">
                        </div>
                        <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label for="usr">Landmark</label>
                            <input required="" type="text" class="form-control" placeholder="landmark" id="landmark">
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 location-field">
                            <label for="usr">Location</label>
                            <input required="" type="text" class="form-control" placeholder="city/district/town" id="location">
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 emirate-field">
                            <label for="pwd">Emirate</label>
                            <input required="" type="text" class="form-control" placeholder="state" id="state">
                        </div>
                        <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12 post-code-field">
                            <label for="pwd">Post Code</label>
                            <input required="" type="number" class="form-control" placeholder="post code" id="postcode">
                        </div>
                        <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12 number-field">
                            <label for="pwd">Alternate Mobile Number</label>
                            <input type="phone" class="form-control" data-format="+91 (ddd) ddd-dddd" name="phone" id="phone" />
                        </div>
                        <div class="form-group login-group-checkbox margin-auto col-md-12">
                            <label> <input type="checkbox" id="lg_remember" name="lg_remember">My delivery and billing addresses are the same.</label>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 lit-blue" style="padding: 0 30px;padding-right: 55px; padding-bottom: 30px; margin-bottom: 5px;">
                <!--<a href="cart.php"><button class="continue-shopping">Return to cart</button></a>-->
                <a href="delivery-details.php"> <button class="green2">continue</button></a>
            </div>
            <div class="heading">
                <p>3.   Delivery Details</p>
            </div>
            <div class="heading">
                <p>4.   Confirm Order</p>
            </div>
        </div>

        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 product-summery">
            <?= CartSummaryWidget::widget(); ?>
        </div>

    </div>
</div>

<div class="pad-20"></div>