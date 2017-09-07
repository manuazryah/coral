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
            <li class="active">My orders</li>
        </ol>
    </div>
</div>

<div id="our-product" class="my-account">
    <div class="container">
        <?= Yii::$app->controller->renderPartial('_leftside_menu'); ?>

        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 my-account-cntnt">
            <div id="reviews-ratings">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 customer-reviews orders-box active">
                    <div class="pro-img-box col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <img src="images/reviews/img-1.png"/>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                        <p class="subject"> Sooo Good</p>
                        <i>vishal on Jul 30, 2017</i>
                        <p class="message">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat...</p>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 customer-reviews orders-box active">
                    <div class="pro-img-box col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <img src="images/reviews/img-2.png"/>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                        <p class="subject"> Sooo Good</p>
                        <i>vishal on Jul 30, 2017</i>
                        <p class="message">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat...</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="pad-20"></div>
