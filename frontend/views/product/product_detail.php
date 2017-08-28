<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use common\models\Unit;

$this->title = $product_details->canonical_name;
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <div class="row">
        <div class="col-sm-5">
            <h3>Other Products</h3>
            <img src="<?= Yii::$app->homeUrl . '/uploads/product/' . $product_details->id . '/profile/small.jpg' ?>" width="100%" height="350px">
            <div class="row" style="margin-top: 25px;"> 
                <?php
                $path = Yii::getAlias('@paths') . '/product/' . $product_details->id;
                if (count(glob("{$path}/*")) > 0) {

                    $k = 0;
                    foreach (glob("{$path}/*") as $file) {
                        $k++;
                        $arry = explode('/', $file);
                        $img_nmee = end($arry);
                        $img_nmees = explode('.', $img_nmee);
                        if ($img_nmees['1'] != '') {
                            ?>

                            <div class = "col-md-2 img-box" id="<?= $k; ?>">
                                <a href="<?php // Yii::$app->homeUrl . '/uploads/product/' . $product_details->id . '/' . end($arry) ?>">
                                    <img src="<?= Yii::$app->homeUrl . '/uploads/product/' . $product_details->id . '/' . end($arry) ?>" width="50px" height="30px"></a>

                            </div>


                            <?php
                        }
                    }
                }
                ?>
            </div>
        </div>
        <div class="col-sm-7">
            <h3><?= $product_details->product_name ?></h3><br>
            <label>Price <p style="color:red"><?= $product_details->price ?></p></label>
            <?php
            if ($product_details->offer_price != "0") {
                $percentage = round(100 - (($product_details->offer_price / $product_details->price) * 100),2);
                ?>
                <label>Offer Price <p style="color:green"><?= $product_details->offer_price ?></p></label>
                <h4 style="color: blue"><?= $percentage ?>% OFF</h4>
            <?php }
            ?>
            <?php if ($product_details->free_shipping == '1') { ?>
                <Label>Free Shipping on orders over 150 AED</Label>
            <?php } ?>
            <p><?= $product_details->main_description ?></p>
            <h4>Specifications</h4>
            <p><?= $product_details->product_detail ?></p>
            <?php $unit = Unit::findOne($product_details->size_unit); ?>
            <p>Size : <?= $product_details->size . '.' . $unit->unit_name ?></p>
            <p>Fregnance Type : <?= $product_details->product_type ?></p>
            <p><h4>Availability</h4>  <?= $product_details->stock ?></p>
            <input type = "hidden" value = "<?= $product_details->canonical_name; ?>" id="cano_name_<?= $product_details->id; ?>" name="cano_name">
            <?php if ($product_details->stock != 0) { ?>
            <input type='number' name='q_ty' class="q_ty" value="1" min="1" max='<?= $product_details->stock ?>'>
            <a href = "javascript:void(0)" class="add_to_cart"  id="<?= $product_details->id; ?>">Add to cart</a>
            <?php } else {
                ?>
                <a href = "javascript:void(0)"  id = "<?= $product_details->id; ?>">Out Of Stock</a>
            <?php } ?>
        </div>
    </div>
</div>
<!--<script>
   
    $(".add_to_cart").click(function () {
//            $(".successcart_msg").html("");

        var id = $(this).attr('id');
        var canname = $("#cano_name_" + id).val();
        var qty = 1;
        var option_color = 0;
        var option_size = 0;
        var master_option = 0;
        addtocart(canname, qty, option_color = null, option_size = null, master_option = null);
    });
    function addtocart(canname, qty, option_color, option_size, master_option) {

        if (option_color === undefined) {
            option_color = null;
        }
        if (option_size === undefined) {
            option_size = null;
        }
        if (master_option === undefined) {
            master_option = null;
        }
        $.ajax({
            type: "POST",
            url: homeUrl + 'cart/buynow',
            data: {cano_name: canname, qty: qty, option_color: option_color, option_size: option_size, master_option: master_option}
        }).done(function (data) {
            if (data == 9) {

                $('.option_errors').html('<p>Invalid Product.Please try again</p>').show();
            } else {
                getcartcount();
                $('.option_errors').html("").hide();
                $(".shoper-cart").html(data);
                $(".successcart_maylike_msg").addClass('hide');
                $(".successcart_msg").removeClass('hide');
                $('#successcart').modal('show');
                $(".img-wrapper").each(function () {
                    var imageUrl = $(this).find('img').attr("src");
                    $(this).find('img').css("visibility", "hidden");
//                    $(this).css('background-image', 'url(' + imageUrl + ')').css("background-repeat", "no-repeat").css("background-size", "cover").css("background-position", "50% 50%");
                });
            }
//            hideLoader();
        });
    }
    function getcartcount() {

                $.ajax({
                        type: "POST",
                        cache: 'false',
                        async: false,
                        url: homeUrl + 'cart/getcartcount',
                        data: {}
                }).done(function (data) {
                        $(".cart_items").html(data + ' Items');
                });
        }
</script>-->