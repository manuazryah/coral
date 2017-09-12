<?php

use yii\helpers\Html;
use common\models\Product;
use common\models\Settings;

$this->title = 'Shopping Cart';
?>
<div class="pad-20 hide-xs"></div>

<div class="container">
    <div class="breadcrumb">
        <span class="current-page">Shopping cart</span>
        <ol class="path">
            <li><a href="index.php">Home</a></li>
            <li><a href="product-detail.php">Product Details</a></li>
            <li class="active">Cart</li>
        </ol>
    </div>
</div>

<div id="cart-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 hidden-xs">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">Product</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Total</th>
                            <th class="text-center">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $id = '';
                        $i = '0';
                        foreach ($carts as $cart) {
                            $id .= $cart->product_id . ',';
                            ?>
                            <tr id="<?= $i; ?>">
                                <?php $product = Product::findOne($cart->product_id); ?>
                                <td class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <div class="media">
                                        <a class="thumbnail pull-left col-lg-5 col-md-5 col-sm-12 col-xs-12" href="#"> <img class="media-object" src="<?= Yii::$app->homeUrl . '/uploads/product/' . $product->id . '/profile/' . $product->canonical_name . '_thumb.' . $product->profile ?>"> </a>
                                        <div class="media-body">
                                            <h4 class="product-heading"><a href="#"><?= $product->product_name; ?></a></h4>
                                            <h5 class="brand-name"><a href="#"><?= $product->brand; ?></a></h5>
                                            <!--<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem.</p>-->
                                        </div>
                                    </div>
                                </td>
                                <?php $price = ($product->offer_price == '0' ? $product->price : $product->offer_price); ?>
                                <td class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-center price">AED <?= $price; ?>0</td>
                                <td class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="text-align: center">
                                    <div class="input-group number-spinner">
                                        <span class="input-group-btn data-dwn">
                                            <button class="btn btn-default btn-info cart_quantity" data-dir="dwn"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                        </span>
                                        <input type='number' readonly="true" name='cart_quantity' class="form-control text-center quantity" id="quantity_<?php echo $cart->id; ?>" value="<?= $cart->quantity ?>" min="1" max='<?= $product->stock ?>'>
                                        <span class="input-group-btn data-up">
                                            <button class="btn btn-default btn-info cart_quantity" data-dir="up"><i class="fa fa-plus" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </td>
                                <?php $total = $price * $cart->quantity; ?>
                                <td class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-center price">AED <?= $total ?></td>
                                <td class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-center">
                                    <button type="button" class="btn-remove">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </button></td>
                            </tr>
                            <?php
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
                <div class="clearfix"></div>
                <div class="lit-blue sub-total">
                    <div class="col-md-12"><h4>Subtotal:<span class="price">AED <?= $subtotal ?></span></h4></div>
                    <div class="col-md-12"><span class="message">Shipping, taxes, and discounts will be calculated at checkout.</span></div>
                    <br/>
                    <div class="col-md-12">
                        <a  href="our-products.php"><button class="start-shopping">Continue shopping</button></a>
                        <a  href="checkout.php"> <button class="green2">check out</button></a>
                    </div>
                </div>
            </div>

            <div class=" hidden-lg hidden-md hidden-sm col-xs-12 mob-car-list">
                <div class="media">
                    <div class="track">
                        <button title="Remove From Cart" class="remove-cart"><i class="fa fa-times" aria-hidden="true"></i></button>
                        <!--<button class="add-cart green2">add to cart</button>-->
                    </div>
                    <a class="thumbnail pull-left col-xs-4" href="#"> <img class="media-object" src="images/products/escape2tumb.png"> </a>
                    <div class="col-xs-7">
                        <h4 class="product-heading"><a href="#">WAVES</a></h4>
                        <h5 class="brand-name"><a href="#">David of coolwater</a></h5>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem.</p>
                        <div class="col-xs-4 pad-0">
                            <p><strong>Price</strong></p>
                        </div>
                        <div class="col-xs-7">
                            <p class="text-center">AED 200</p>
                        </div>
                        <div class="col-xs-4 pad-0">
                            <p><strong>Quantity</strong></p>
                        </div>
                        <div class="col-xs-7 text-center">
                            <select min="0" max="5" id="number_passengers" name="quantity">

                                <option value="1">1</option>

                                <option value="2">2</option>

                                <option value="3">3</option>

                                <option value="4">4</option>

                                <option value="5">5</option>

                                <option value="6">6</option>

                                <option value="7">7</option>

                                <option value="8">8</option>

                                <option value="9">9</option>

                                <option value="10">10</option>

                            </select>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-xs-12 item-total">
                        <div class="col-xs-4 pad-0 heading">
                            <p><strong>Item Total</strong></p>
                        </div>
                        <div class="col-xs-7 amount">
                            <p class="text-right">AED 200</p>
                        </div>
                    </div>
                </div>
                <div class="media">
                    <div class="track">
                        <button title="Remove From Cart" class="remove-cart"><i class="fa fa-times" aria-hidden="true"></i></button>
                        <!--<button class="add-cart green2">add to cart</button>-->
                    </div>
                    <a class="thumbnail pull-left col-xs-4" href="#"> <img class="media-object" src="images/products/escape2tumb.png"> </a>
                    <div class="col-xs-7">
                        <h4 class="product-heading"><a href="#">WAVES</a></h4>
                        <h5 class="brand-name"><a href="#">David of coolwater</a></h5>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem.</p>
                        <div class="col-xs-4 pad-0">
                            <p><strong>Price</strong></p>
                        </div>
                        <div class="col-xs-7">
                            <p class="text-center">AED 200</p>
                        </div>
                        <div class="col-xs-4 pad-0">
                            <p><strong>Quantity</strong></p>
                        </div>
                        <div class="col-xs-7 text-center">
                            <select min="0" max="5" id="number_passengers" name="quantity">

                                <option value="1">1</option>

                                <option value="2">2</option>

                                <option value="3">3</option>

                                <option value="4">4</option>

                                <option value="5">5</option>

                                <option value="6">6</option>

                                <option value="7">7</option>

                                <option value="8">8</option>

                                <option value="9">9</option>

                                <option value="10">10</option>

                            </select>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-xs-12 item-total">
                        <div class="col-xs-4 pad-0 heading">
                            <p><strong>Item Total</strong></p>
                        </div>
                        <div class="col-xs-7 amount">
                            <p class="text-right">AED 200</p>
                        </div>
                    </div>
                </div>
                <div class="lit-blue mob-sub-total sub-total">
                    <div class="col-md-12"><h4>Subtotal:<span class="price">AED 200</span></h4></div>
                    <div class="col-md-12"><span class="message">Shipping, taxes, and discounts will be calculated at checkout.</span></div>
                    <br/>
                </div>
            </div>

            <div class="lit-blue mob-checkout-buttons sub-total hidden-lg hidden-md hidden-sm">
                <div class="col-md-12">
                    <a  href="our-products.php"><button class="start-shopping">Continue shopping</button></a>
                    <a  href="checkout.php"> <button class="green2">check out</button></a>
                </div>
            </div>

        </div>
    </div>
</div>
</div>

<div class="pad-30 hidden-xs"></div>
<script>
    $('.cart_quantity').on('click', function () {
        var id = $('.quantity').attr("id");
        var ids = id.split('_');
        var cartid = ids['1'];
        var quantity = $('#' + id).val();

        $.ajax({
            type: "POST",
            url: homeUrl + 'cart/updatecart',
            data: {cartid: cartid, quantity: quantity},
            success: function (data) {
                var $data = JSON.parse(data);
                if ($data.msg === "success") {
                    window.location.reload();
                }
//        $(".cart_items").html(data + ' Items');
//        hideLoader();
            }
        });
    });
//    $('.remove_this').click(function () {
//        var id = $(this).attr('cartid');
//        var ids = id.split('_');
//        var cartid = ids['0'];
//        $.ajax({
//            type: "POST",
//            url: homeUrl + 'cart/cart_remove',
//            data: {cartid: cartid},
//            success: function (data) {
//                var $data = JSON.parse(data);
//                if ($data.msg === "success") {
//                    $('#' + ids['1']).remove();
//                    window.location.reload();
//                }
////        $(".cart_items").html(data + ' Items');
////        hideLoader();
//            }
//        });
//    });
//    function getmycart(){
//        
//    }
</script>
