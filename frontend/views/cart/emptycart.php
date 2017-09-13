<?php

use yii\helpers\Html;

$this->title = 'Shopping Cart';
?>
<div class="pad-20 hide-xs"></div>

<div class="container">
    <div class="breadcrumb">
        <span class="current-page">Shopping cart</span>
        <ol class="path">
            <li><a href="index.php">Home</a></li>
            <li><a href="product-detail.php">Product Details</a></li>
            <li class="active">Cart</li>
        </ol>
    </div>
</div>
<div id="cart-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 hidden-xs">
                <!--<div class="lit-blue mob-checkout-buttons sub-total hidden-lg hidden-md hidden-sm">-->
                <h2><span>Empty Cart</span></h2>
                    <div class="col-md-12">
                    <?= Html::a('<button class="green2">Continue shopping</button>', ['site/index'], ['class' => 'button']) ?>
                    </div>
                <!--</div>-->
            </div>
        </div>
    </div>
</div>


<div class="pad-30 hidden-xs"></div>
