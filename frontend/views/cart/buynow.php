<?php

use yii\helpers\Html;
use common\models\Product;

$this->title = 'Shopping Cart';
?>
<section class="checkout-wrp">
    <div class="container">
        <h3 class="inner-h3s">Shopping Cart</h3>
        <!--<a class="check-btn" href="<?php // echo Yii::$app()->basepath;       ?>cart/proceed">Proceed To Checkout</a>-->
        <div class="checkout-box hidden-xs">
            <table class="table table-striped">
                <div class="checkout-head">
                    <tr>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </div>

                <?php
                $id = '';
                foreach ($carts as $cart) {
                    $id .= $cart->product_id . ',';
                    ?>
                    <tr>

                        <?php $product = Product::findOne($cart->product_id); ?>
                        <?php // $product = Products::model()->findByPk($cart->product_id);   ?>
                        <td>


                        </td>
                        <td>
                            <h4><?= $product->product_name; ?></h4>

                        </td>
                        <td>
                            <?php $price = ($product->offer_price == '0' ? $product->price : $product->offer_price); ?>
                            <h4><?= $price; ?></h4>

                        </td>
                        <td>
                            <form action="<?php echo Yii::$app->homeUrl; ?>cart/updatecart" method="post" id="qty_<?php echo $cart->id; ?>">
                                <input type="hidden" value="<?php echo $cart->id; ?>" name="cart_id" />
                                <input class="form-cart" type="number" id="<?php echo $cart->id; ?>"  min="1" max='<?= $product->stock ?>' value="<?= $cart->quantity ?> " name="car_quantity">
                            </form
                        </td>
                        <td>
                            <?php $total = $price * $cart->quantity; ?>
                            AED : <?= $total ?>
                        </td>
                        <td>
                            <p><a href="javascript:void(0)" canname="<?php echo $product->canonical_name; ?>" cartid="<?php echo $cart->id; ?>" class="remove_this">x Remove</a></p>
                        </td>

                    <div class="clearfix"></div>
                    </tr>

                <?php } ?>
            </table>
            <div class="sub-tot-check">
                        <div class="row">
                                <div class="col-sm-offset-5 col-lg-offset-7 col-sm-7 col-lg-5">
                                        <h4>Subtotal AED : <span><?= $subtotal?></span></h4>
                                        

                                        <h4>Estimated Shipping AED : <span>0</span></h4>
                                       

                                        <div class="tot-check-line"></div>
                                        <h4>Estimated Total <span class="esti-total"><?= $subtotal?></span></h4>
                                        <div class="checkj-out-btn">
                                                
                                                <a class="check-btn" href="<?php echo Yii::$app->homeUrl;?>cart/proceed">Proceed To Checkout</a>
                                                <div class="clearfix"></div>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
    </div>
</section>