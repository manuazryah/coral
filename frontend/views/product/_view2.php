<?php

use yii\helpers\Html;
use common\models\Fregrance;
use common\components\ProductLinksWidget;
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
        <?= ProductLinksWidget::widget(['id' => $model->id]) ?>
    </div>
</div>
