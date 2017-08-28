<?php

use yii\helpers\Html;
?> 
<!--<div class="row">
<img src="<? Yii::$app->homeUrl . '../uploads/product/'  ?>" width="50px" height="30px"><br>
<?$model->product_name;?> 
<?$model->price;?> 
<?$model->offer_price;?>
</div>-->
<div class="container">
    
        <div class="row">
            <img src="<?= Yii::$app->homeUrl . '/uploads/product/' . $model->id . '/profile/small.jpg' ?>" width="200px" height="130px"><br>
        </div>
    <a href="<?= Yii::$app->homeUrl.'product/product_detail/'.$model->canonical_name?>"><h3><?= $model->product_name ?></h3></a><br>
        <label>Price <p style="color:red"><?= $model->price ?></p></label>
        <?php if ($model->offer_price != "0") {
            $percentage = round(100-(($model->offer_price / $model->price) * 100),2);
            ?>
            <label>Offer Price <p style="color:green"><?= $model->offer_price ?></p></label>
            <h4 style="color: blue"><?= $percentage ?>% OFF</h4>
    <?php }
?>
    </div>
