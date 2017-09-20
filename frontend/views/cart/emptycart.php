<?php

use yii\helpers\Html;

$this->title = 'Shopping Cart';
?>
<style>
    .emptycart h2{
        font-size: 16px;
        text-align: center;
        display: block;
        color: rgba(84, 82, 81, 0.57);
        margin-bottom: 0px;
    }
    .emptycart .empty-img img{
        margin: 0 auto;
        display: block;
    }
    .emptycart .green2{
        margin: 0 auto;
        display: block;
    }
</style>
<div class="pad-20 hide-xs"></div>

<div class="container">
    <div class="breadcrumb">
        <span class="current-page">Shopping cart</span>
        <ol class="path">
            <li><?= Html::a('<span>Home</span>', ['/site/index'], ['class' => '']) ?></li>
            <li class="active">Cart</li>
        </ol>
    </div>
</div>
<div id="cart-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 hidden-xs emptycart">
                <div class="empty-img">
                    <img class="img-responsive" src="<?= Yii::$app->homeUrl; ?>images/empty-cart.png"/>
                </div>
                <!--<div class="lit-blue mob-checkout-buttons sub-total hidden-lg hidden-md hidden-sm">-->
                <h2><span>Your Shopping Cart is Empty</span></h2>
                <div class="col-md-12">
                    <?= Html::a('<button class="green2">Continue shopping</button>', ['site/index'], ['class' => 'button']) ?>
                </div>
                <!--</div>-->
            </div>
        </div>
    </div>
</div


<div class="pad-30 hidden-xs"></div>
