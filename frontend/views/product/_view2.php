<?php

use yii\helpers\Html;
use common\models\Fregrance;
?>
<!--<div class="row">
<img src="<? Yii::$app->homeUrl . '../uploads/product/'  ?>" width="50px" height="30px"><br>
<?$model->product_name;?>
<?$model->price;?>
<?$model->offer_price;?>
</div>-->
<!--========= 1st slide =========-->
<div class="item active">
    <div class="col-xs-12 col-sm-6 col-md-4 gp_products_item">
        <div class="gp_products_inner">
            <div class="gp_products_item_image">
                <a href="<?= Yii::$app->homeUrl . 'product/product_detail/' . $model->canonical_name ?>">
                    <?php
                    $product_image = Yii::$app->basePath . '/../uploads/product/' . $model->id . '/profile/' . $model->canonical_name . '.' . $model->profile;
                    if (file_exists($product_image)) {
                        ?>
                        <img src="<?= Yii::$app->homeUrl . 'uploads/product/' . $model->id . '/profile/' . $model->canonical_name . '.' . $model->profile ?>" height="100%" alt="1" />
                        <?php
                    } else {
                        ?>
                        <img src="<?= Yii::$app->homeUrl . 'uploads/product/dummy_perfume.png' ?>" height="100%" alt="1" />
                    <?php }
                    ?>
                </a>
            </div>
            <!--            <ul class="text-center">
                            <a href="#"><li><i class="fa fa-facebook"></i></li></a>
                            <a href="#"><li><i class="fa fa-twitter"></i></li></a>
                            <a href="#"><li><i class="fa fa-linkedin"></i></li></a>
                        </ul>-->
            <div class="gp_products_item_caption">
                <ul class="gp_products_caption_name">
                    <li><a href="#"><?= $model->product_name ?></a></li>
                    <?php $product_type= Fregrance::findOne($model->product_type);?>
                    <li><a href="#"><?= $product_type->name; ?></a></li>
                </ul>
                <ul class="gp_products_caption_rating">
                    <?php
                    if ($model->offer_price != "0") {
                        $percentage = round(100 - (($model->offer_price / $model->price) * 100));
                        ?>
                        <li>AED <?= $model->offer_price; ?></li>
                        <li class="center">AED <?= $model->price; ?></li>
                        <li class="pull-right"><a href="#">(<?= $percentage ?>%OFF)</a></li>
                    <?php } else {
                        ?>
                        <li class="center">AED <?= $model->price; ?></li>
                        <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>
