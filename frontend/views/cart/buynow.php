<?php

use yii\helpers\Html;
use common\models\Product;
use common\models\Settings;

$this->title = 'Shopping Cart';
?>
<section class="checkout-wrp">
    <div class="container">
        <h3 class="inner-h3s">Shopping Cart</h3>
        <!--<a class="check-btn" href="<?php // echo Yii::$app()->basepath;                    ?>cart/proceed">Proceed To Checkout</a>-->
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
                $i = '0';
                foreach ($carts as $cart) {
                    $id .= $cart->product_id . ',';
                    ?>
                    <tr id="<?= $i; ?>">

                        <?php $product = Product::findOne($cart->product_id); ?>
                        <?php // $product = Products::model()->findByPk($cart->product_id);   ?>
                        <td>
                            <img src="<?= Yii::$app->homeUrl . '/uploads/product/' . $product->id . '/profile/' . $product->canonical_name . '_thumb.' . $product->profile ?>">

                        </td>
                        <td>
                            <h4><?= $product->product_name; ?></h4>

                        </td>
                        <td>
                            <?php $price = ($product->offer_price == '0' ? $product->price : $product->offer_price); ?>
                            <h4><?= $price; ?></h4>

                        </td>
                        <td>
                            <input type='number' name='cart_quantity' class="cart_quantity" id="quantity_<?php echo $cart->id; ?>" value="<?= $cart->quantity ?>" min="1" max='<?= $product->stock ?>'>

                        </td>
                        <td>
                            <?php $total = $price * $cart->quantity; ?>
                            AED : <?= $total ?>
                        </td>
                        <td>
                            <p><a href="javascript:void(0)" canname="<?php echo $product->canonical_name; ?>" cartid="<?php echo $cart->id . '_' . $i; ?>" class="remove_this">x Remove</a></p>
                        </td>

                    <div class="clearfix"></div>
                    </tr>

                    <?php
                    $i++;
                }
                ?>
            </table>
            <div class="sub-tot-check">
                <div class="row">
                    <div class="col-sm-offset-5 col-lg-offset-7 col-sm-7 col-lg-5">
                        <h4>Subtotal AED : <span><?= $subtotal ?></span></h4>

                        <?php
                        if ($shipping_limit <= $subtotal) {
                            $shipping_charge = '0';
                        } else {
                            $shipping = Settings::findOne('2');
                            $shipping_charge = $shipping->value;
                        }
                        $grand_total = ($shipping_charge + $subtotal);
                        ?>
                        <h4>Estimated Shipping AED : <span><?= $shipping_charge; ?></span></h4>


                        <div class="tot-check-line"></div>
                        <h4>Estimated Total <span class="esti-total"><?= $grand_total ?></span></h4>
                        <div class="checkj-out-btn">

                            <a class="check-btn" href="<?php echo Yii::$app->homeUrl; ?>cart/proceed">Proceed To Checkout</a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(".cart_quantity").change(function () {
        var id = $(this).attr("id");
        var ids = id.split('_');
        var cartid = ids['1'];
        var quantity = $('#' + id).val();
        $.ajax({
            type: "POST",
            url: homeUrl + 'cart/updatecart',
            data: {cartid: cartid,quantity: quantity},
            success: function (data) {
                var $data = JSON.parse(data);
                if ($data.msg === "success") {
//                    getmycart();
                    window.location.reload();
                }
//        $(".cart_items").html(data + ' Items');
//        hideLoader();
            }
        });
    });
    $('.remove_this').click(function () {
        var id = $(this).attr('cartid');
        var ids = id.split('_');
        var cartid = ids['0'];
        $.ajax({
            type: "POST",
            url: homeUrl + 'cart/cart_remove',
            data: {cartid: cartid},
            success: function (data) {
                var $data = JSON.parse(data);
                if ($data.msg === "success") {
                    $('#' + ids['1']).remove();
                    window.location.reload();
                }
//        $(".cart_items").html(data + ' Items');
//        hideLoader();
            }
        });
    });
//    function getmycart(){
//        
//    }
</script>