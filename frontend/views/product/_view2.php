<?php

use yii\helpers\Html;
use common\models\Fregrance;
?>
<!--<div class="row">
<img src="<? Yii::$app->homeUrl . '../uploads/product/' ?>" width="50px" height="30px"><br>
<? $model->product_name; ?>
<? $model->price; ?>
<? $model->offer_price; ?>
</div>-->
<!--========= 1st slide =========-->
<div class="item active">
    <div class="col-xs-12 col-sm-6 col-md-4 gp_products_item">
        <div class="gp_products_inner">
            <div class="gp_products_item_image">
                <a href="<?= Yii::$app->homeUrl . 'product_detail/' . $model->canonical_name ?>">
                    <?php
                    $product_image = Yii::$app->basePath . '/../uploads/product/' . $model->id . '/profile/' . $model->canonical_name . '.' . $model->profile;
                    if (file_exists($product_image)) {
                        ?>
                        <img src="<?= Yii::$app->homeUrl . 'uploads/product/' . $model->id . '/profile/' . $model->canonical_name . '.' . $model->profile ?>" height="100%" alt="1" />
                        <?php
                    }
                    else {
                        ?>
                        <img src="<?= Yii::$app->homeUrl . 'uploads/product/dummy_perfume.png' ?>" height="100%" alt="1" />
                    <?php }
                    ?>
                </a>
                <?= Html::a(' <div class="img-overlay"></div>', ['/product/product_detail', 'product' => $model->canonical_name]) ?>
            </div>
            <ul class="text-center">
                <input type="hidden" value="1" class="q_ty">
                <?= Html::a('<li><i class="fa fa-shopping-cart"></i></li>', '#', ['class' => 'add_to_cart', 'id' => $model->canonical_name]) ?>
                <?= Html::a('<li><i class="fa fa-heart"></i></li>', 'javascript:void(0)', ['class' => 'add_to_wish_list', 'id' => $model->id]) ?>
                <?= Html::a('<li><i class="fa fa-eye"></i></li>', ['/product/product_detail', 'product' => $model->canonical_name], ['class' => '']) ?>
            </ul>

            <div class="gp_products_item_caption">

                <ul class="gp_products_caption_name">
                    <li><a href="<?= Yii::$app->homeUrl . 'product_detail/' . $model->canonical_name ?>"><?= $model->product_name ?></a></li>
                    <?php $product_type = Fregrance::findOne($model->product_type); ?>
                    <li><a href="<?= Yii::$app->homeUrl . 'product_detail/' . $model->canonical_name ?>"><?= $product_type->name; ?></a></li>
                </ul>
                <ul class="gp_products_caption_rating">
                    <?php
                    if ($model->offer_price != "0") {
                        $percentage = round(100 - (($model->offer_price / $model->price) * 100));
                        ?>
                        <li>AED <?= $model->offer_price; ?></li>
                        <li class="center">AED <?= $model->price; ?></li>
                        <li class="pull-right"><a href="#">(<?= $percentage ?>%OFF)</a></li>
                        <?php
                    }
                    else {
                        ?>
                        <li class="center">AED <?= $model->price; ?></li>
                        <?php } ?>
                </ul>

            </div>
        </div>
    </div>
</div>
