<div class="shoper-content-inner">
        <div class="shoper-img">
                <div class="shoper-inner-img img-wrapper">
                        <!--<img src="<?php // yii::$app->homeUrl; ?>images/logo.jpg/uploads/products/<?php // echo $folder; ?>/<?php // echo $prod_details->id; ?>/medium.<?php // echo $prod_details->main_image; ?>" />-->
                </div>
        </div>
        <div class="shoper-con-det">
                <h4><?php echo $prod_details->product_name; ?></h4>
                <p class="upper-cart">Color: <span>Red</span></p>
                <p class="upper-cart">Size: <span>Xl</span></p>
                <p>Qty: <span><?php echo $cart_content->quantity; ?></span></p>
                <?php if ($prod_details->offer_price == '0') {
                            $price = $prod_details->price;
                        } else {
                            $price = $prod_details->offer_price;
                        }
                        ?>
                <p>AED: <span><?php echo $price; ?></span></p>
                <p class="remove_item" canname="<?php echo $prod_details->canonical_name; ?>" cartid="<?php echo $cart_content->id; ?>"><a href="javascript:void(0)" >Remove</a></p>
        </div>
        <div class="shoper-price">
                <!--<p><span><i class=""></i> <?php // echo Yii::app()->Discount->Discount($prod_details); ?></span></p>-->
        </div>
</div>