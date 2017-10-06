<?php

use yii\helpers\Html;
?>
<ul class="text-center">
    <input type="hidden" value="1" class="q_ty">
    <?= Html::a('<li><i class="fa fa-shopping-cart"></i></li>', '#', ['class' => 'add_to_cart', 'id' => $product->canonical_name]) ?>
    <?= Html::a('<li><i class="fa fa-heart"></i></li>', 'javascript:void(0)', ['class' => 'add_to_wish_list', 'id' => $product->id]) ?>
    <?= Html::a('<li><i class="fa fa-eye"></i></li>', ['/product/product_detail', 'product' => $product->canonical_name], ['class' => '']) ?>
</ul>

