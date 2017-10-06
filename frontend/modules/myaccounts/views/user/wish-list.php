<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\ListView;
use common\components\EmptyDataWidget;
?>
<style>
    .summary{
        display: none;
    }
</style>
<div class="pad-20 hide-xs"></div>

<div class="container">
    <div class="breadcrumb">
        <span class="current-page">My Wishlist</span>
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
            <?php
            if ($dataProvider->totalCount > 0) {
                ?>
                <?=
                ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView' => 'my_wish_list',
                    'pager' => [
                        'firstPageLabel' => 'first',
                        'lastPageLabel' => 'last',
                        'prevPageLabel' => '<',
                        'nextPageLabel' => '>',
                        'maxButtonCount' => 3,
                    ],
                ]);
                ?>
                <?php
            } else {
                ?>
                <div class="col-lg-12 col-md-12 col-sm-12 hidden-xs empty-data">
                    <?= EmptyDataWidget::widget(['path' => Yii::$app->homeUrl . 'images/empty-wishlist.png', 'msg' => 'Your Wishlist is Empty']) ?>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>

<div class="pad-20"></div>
