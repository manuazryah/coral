<?php


namespace frontend\controllers;

use Yii;

class Cart extends Controller {

        public function init() {
                date_default_timezone_set('Asia/Kolkata');
        }

        public function actionIndex() {
                $this->render('index');
        }
         public function actionBuynow() {
             
                $canonical_name = $_REQUEST['cano_name'];
                $qty = $_REQUEST['qty'];

                $option_size = $_REQUEST['option_size'];
                $option_color = $_REQUEST['option_color'];
                $master_option_id = $_REQUEST['master_option'];
                $id = Products::model()->findByAttributes(array('canonical_name' => $canonical_name))->id;

                if (Yii::app()->session['user'] != '' && Yii::app()->session['user'] != NULL) {

                        $user_id = Yii::app()->session['user']['id'];
                        Cart::model()->deleteAllByAttributes(array(), array('condition' => 'date < subdate(now(), 1) and user_id != ' . Yii::app()->session['user']['id']));
                } else {
                        if (!isset(Yii::app()->session['temp_user'])) {
                                Yii::app()->session['temp_user'] = microtime(true);
                        }
                        Cart::model()->deleteAllByAttributes(array(), array('condition' => 'date < subdate(now(), 1)'));
                        $sessonid = Yii::app()->session['temp_user'];
                }
                if (isset($user_id)) {
                        if (isset(Yii::app()->session['temp_user'])) {
                                $condition = "user_id = " . $user_id . " AND session_id = " . Yii::app()->session['temp_user'];
                        } else {
                                Yii::app()->session['temp_user'] = microtime(true);
                                $condition = "user_id = " . $user_id . " AND session_id = " . Yii::app()->session['temp_user'];
                        }
                } else if (isset($sessonid)) {
                        $condition = "session_id = $sessonid";
                }
                $cart = Cart::model()->find(array('condition' => ($condition . ' and product_id=' . $id)));

                if (!empty($cart)) {
                        $cart->quantity = $cart->quantity + $qty;
                        $cart->save();
                        $cart_contents = Cart::model()->findAll(array('condition' => ($condition)));

                        if (!empty($cart_contents)) {
                                echo '<div class="shoper-head">
                                        <h3>Your Order</h3>
                                        <h6>Price</h6>
                                    </div>
                                    <div class="shoper-content">';
                                foreach ($cart_contents as $cart_content) {
                                        $prod_details = Products::model()->findByPk($cart_content->product_id);
                                        $folder = Yii::app()->Upload->folderName(0, 1000, $prod_details->id);
                                        $total = $cart_content->quantity * Yii::app()->Discount->DiscountAmount($prod_details);
                                        $this->renderPartial('_cartaontents', array('cart_content' => $cart_content, 'prod_details' => $prod_details, 'folder' => $folder, 'total' => $total));
                                        $subtotoal = $subtotoal + $total;
                                }
                                echo '</div>
                                    <div class="shoper-bottom">
                                        <h5>Total <span><i class="fa amount">' . Yii::app()->Currency->convert($subtotoal) . '</i></span></h5>
                                    </div>
                                    <div class="shoper-buy-btn">
                                        <a href="' . yii::app()->baseUrl . '"><i class="fa fa-long-arrow-left"></i> Continue Shopping</a>
                                        <a class="byu-btn" href="' . yii::app()->baseUrl . '/index.php/cart/mycart">Buy</a>
                                    </div>';
                        } else {
                                echo 'Cart box is Empty';
                        }
                } else {

                        $model = new cart;
                        $model->user_id = $user_id;
                        $model->session_id = Yii::app()->session['temp_user'];
                        $model->product_id = $id;
                        $model->quantity = $qty;
//                        $model->options = $product_option;
                        date_default_timezone_set('Asia/Kolkata');
                        $model->date = date('Y-m-d H:i:s');
                        if ($model->save()) {

                                $cart_contents = Cart::model()->findAllByAttributes(array(), array('condition' => ($condition)));

                                if (!empty($cart_contents)) {

                                        echo '<div class="shoper-head">
                                        <h3>Your Order</h3>
                                        <h6>Price</h6>
                                    </div>
                                    <div class="shoper-content">';
                                        foreach ($cart_contents as $cart_content) {
                                                $prod_details = Products::model()->findByPk($cart_content->product_id);
                                                $folder = Yii::app()->Upload->folderName(0, 1000, $prod_details->id);
                                                $total = $cart_content->quantity * Yii::app()->Discount->DiscountAmount($prod_details);
                                                $this->renderPartial('_cartaontents', array('cart_content' => $cart_content, 'prod_details' => $prod_details, 'folder' => $folder, 'total' => $total));
                                                $subtotoal = $subtotoal + $total;
                                        }
                                        echo '</div>
                                    <div class="shoper-bottom">
                                        <h5>Total <span><i class="fa amount">' . Yii::app()->Currency->convert($subtotoal) . '</i></span></h5>
                                    </div>
                                    <div class="shoper-buy-btn">
                                        <a href="' . yii::app()->baseUrl . '"><i class="fa fa-long-arrow-left"></i> Continue Shopping</a>
                                        <a class="byu-btn" href="' . yii::app()->baseUrl . '/index.php/cart/mycart">Buy</a>
                                    </div>';
                                } else {
                                        echo 'Cart box is Empty';
                                }
                        }
                }
        }

        public function actionUpdateCart() {
                $car_quantity = $_POST['car_quantity'];
                $cart_id = $_POST['cart_id'];
                if (Yii::app()->session['user'] != '' && Yii::app()->session['user'] != NULL) {
                        $user_id = Yii::app()->session['user']['id'];
                        if (isset(Yii::app()->session['temp_user'])) {
                                $condition = "user_id = " . $user_id . " AND session_id = " . Yii::app()->session['temp_user'];
                        } else {
                                Yii::app()->session['temp_user'] = microtime(true);
                                $condition = "user_id = " . $user_id . " AND session_id = " . Yii::app()->session['temp_user'];
                        }
                } else {
                        $user_id = Yii::app()->session['temp_user'];
                        $condition = "session_id = " . $user_id;
                }
                $cou_used = CouponHistory::model()->find(array('condition' => $condition));
                $model = Cart::model()->findByPk($cart_id);
                $model->quantity = $car_quantity;
                if ($model->save()) {
                        $total_amount = Yii::app()->Discount->Subtotal();
                        $coupon_validation = Coupons::model()->findByPk($cou_used->coupon_id);
                        if ($coupon_validation->cash_limit != 0) {
                                if ($total_amount <= $coupon_validation->cash_limit) {
                                        $cou_used->deleteAll();
                                }
                        } else {
                                if ($total_amount < $coupon_validation->discount) {
                                        $cou_used->deleteAll();
                                }
                        }
                        $this->redirect(array('cart/MyCart'));
                }
        }

        public function actionUpdateCoupon() { 
               $coupon_code = $_POST['coupon_code'];
                if (Yii::app()->session['user'] != '' && Yii::app()->session['user'] != NULL) {

                        $user_id = Yii::app()->session['user']['id'];
                        if (isset(Yii::app()->session['temp_user'])) {
                                $condition = "user_id = " . $user_id . " AND session_id = " . Yii::app()->session['temp_user'];
                        } else {
                                Yii::app()->session['temp_user'] = microtime(true);
                                $condition = "user_id = " . $user_id . " AND session_id = " . Yii::app()->session['temp_user'];
                        }
                } else {

                        $user_id = Yii::app()->session['temp_user'];
                        $condition = "session_id = " . $user_id;
                }
                $cou_used = CouponHistory::model()->find(array('condition' => $condition));
                if (empty($cou_used)) {
                        $coupon_validation = Coupons::model()->find(array('condition' => "code = '" . $coupon_code . "'"));
                        if (!empty($coupon_validation)) {

                                $is_coupon_exist = CouponHistory::model()->findByAttributes(array('coupon_id' => $coupon_validation->id), array('condition' => $condition));


                                if (empty($is_coupon_exist)) {

                                        $total_amount = $this->subtotalamount();

                                        if ($coupon_validation->cash_limit != 0) {

                                                if ($total_amount > $coupon_validation->cash_limit) {
                                                        $new_coupen_value = new CouponHistory;
                                                        $new_coupen_value->coupon_id = $coupon_validation->id;
                                                        $new_coupen_value->total_amount = $coupon_validation->discount;
                                                        $new_coupen_value->status = 1;
                                                        if (Yii::app()->session['user'] != '' && Yii::app()->session['user'] != NULL) {
                                                                $new_coupen_value->user_id = $user_id;
                                                        } else {
                                                                $new_coupen_value->session_id = $user_id;
                                                        }
                                                        if ($new_coupen_value->save()) {
                                                                Yii::app()->user->setFlash('successcoupon', "Successfully Added Your Coupen Code");
                                                                $this->redirect(array('cart/MyCart'));
                                                        }
                                                } else {
                                                        Yii::app()->user->setFlash('errorcoupon', "Your Coupon Code Cannot be applied . Because Your Sub Total  is shoulbe grater than  " . Yii::app()->Currency->convert($coupon_validation->cash_limit));
                                                        $this->redirect(array('cart/MyCart'));
                                                }
                                        } else {
                                                if ($total_amount > $coupon_validation->discount) {

                                                        $new_coupen_value = new CouponHistory;
                                                        $new_coupen_value->coupon_id = $coupon_validation->id;
                                                        $new_coupen_value->total_amount = $coupon_validation->discount;
                                                        $new_coupen_value->status = 1;
                                                        if (Yii::app()->session['user'] != '' && Yii::app()->session['user'] != NULL) {
                                                                $new_coupen_value->user_id = $user_id;
                                                        } else {
                                                                $new_coupen_value->session_id = $user_id;
                                                        }
                                                        if ($new_coupen_value->save()) {
                                                                Yii::app()->user->setFlash('successcoupon', "Successfully Added Your Coupen Code");
                                                                $this->redirect(array('cart/MyCart'));
                                                        }
                                                } else {
                                                        Yii::app()->user->setFlash('errorcoupon', "Your Coupon Code Cannot be applied . Because Your Sub Total  is shoulbe grater than " . Yii::app()->Currency->convert($coupon_validation->discount));

                                                        $this->redirect(array('cart/MyCart'));
                                                }
                                        }
                                } else {
                                        Yii::app()->user->setFlash('errorcoupon', "The Entered Coupen You Already Used");
                                        $this->redirect(array('cart/MyCart'));
                                }
                        } else {


                                Yii::app()->user->setFlash('errorcoupon', "The Entered Coupen Is Invalid");
                                $this->redirect(array('cart/MyCart'));
                        }
                } else {
                        Yii::app()->user->setFlash('errorcoupon', "You Already Applied A Coupon. Only One coupon can applay in a Order.");
                        $this->redirect(array('cart/MyCart'));
                }
        }

        public function actionRemovecart() {
                $canonical_name = $_REQUEST['cano_name'];
                $cartid = $_REQUEST['cartid'];
                if (Yii::app()->session['user'] != '' && Yii::app()->session['user'] != NULL) {

                        $user_id = Yii::app()->session['user']['id'];
                        Cart::model()->deleteAllByAttributes(array(), array('condition' => 'date < subdate(now(), 1) and user_id != ' . Yii::app()->session['user']['id']));
                } else {
                        if (!isset(Yii::app()->session['temp_user'])) {
                                Yii::app()->session['temp_user'] = microtime(true);
                                Cart::model()->deleteAllByAttributes(array(), array('condition' => 'date < subdate(now(), 1)'));
                                $sessonid = Yii::app()->session['temp_user'];
                        }
                }
                if (isset($user_id)) {

                        if (isset(Yii::app()->session['temp_user'])) {
                                $condition = "user_id = " . $user_id . " AND session_id = " . Yii::app()->session['temp_user'];
                        } else {
                                Yii::app()->session['temp_user'] = microtime(true);
                                $condition = "user_id = " . $user_id . " AND session_id = " . Yii::app()->session['temp_user'];
                        }
                } else if (isset($sessonid)) {

                        $condition = "session_id = $sessonid";
                }

                $model = Cart::model()->findByPk($cartid);
                $cou_used = CouponHistory::model()->find(array('condition' => $condition));

                if ($model->delete()) {
                        $total_amount = $this->subtotalamount();
                        $coupon_validation = Coupons::model()->findByPk($cou_used->coupon_id);
                        if ($coupon_validation->cash_limit != 0) {
                                if ($total_amount <= $coupon_validation->cash_limit) {
                                        $cou_used->deleteAll();
                                }
                        } else {
                                if ($total_amount < $coupon_validation->discount) {
                                        $cou_used->deleteAll();
                                }
                        }
                        $cart_contents = Cart::model()->findAllByAttributes(array(), array('condition' => ($condition)));
                        if (!empty($cart_contents)) {
                                $subtotoal = 0;
                                echo '<div class="drop_cart">';
                                foreach ($cart_contents as $cart_content) {
                                        $prod_details = Products::model()->findByPk($cart_content->product_id);
                                        $folder = Yii::app()->Upload->folderName(0, 1000, $prod_details->id);
                                        $total = $cart_content->quantity * Yii::app()->Discount->DiscountAmount($prod_details);
                                        $this->renderPartial('_cartaontents', array('cart_content' => $cart_content, 'prod_details' => $prod_details, 'folder' => $folder, 'total' => $total));
                                        $subtotoal = $subtotoal + $total;
                                }
                                $this->renderPartial('_cartfooter', array('subtotoal' => $subtotoal));
                                echo ' </div>';
                        } else {
                                echo 'Cart box is Empty';
                        }
                }
        }

       

       

        public function actionSelectcart() {

                if (Yii::app()->session['user'] != '' && Yii::app()->session['user'] != NULL) {
                        $user_id = Yii::app()->session['user']['id'];
                        $cart_contents = Cart::model()->findAllByAttributes(array('user_id' => $user_id));
                        if (!empty($cart_contents)) {
                                echo ' <div class="drop_cart">';
                                foreach ($cart_contents as $cart_content) {
                                        $prod_details = Products::model()->findByPk($cart_content->product_id);
                                        $folder = Yii::app()->Upload->folderName(0, 1000, $prod_details->id);
                                        $total = $cart_content->quantity * Yii::app()->Discount->DiscountAmount($prod_details);
                                        $this->renderPartial('_cartaontents', array('cart_content' => $cart_content, 'prod_details' => $prod_details, 'folder' => $folder, 'total' => $total));
                                        $subtotoal = $subtotoal + $total;
                                }
//                                $this->renderPartial('_cartfooter', array('subtotoal' => $subtotoal));
                                echo '</div>';
                        } else {
                                echo 'Cart box is Empty';
                        }
                } else {
                        if (isset(Yii::app()->session['temp_user'])) {

                                $session_id = Yii::app()->session['temp_user'];
//                                $cart_contents = Cart::model()->findAllByAttributes(array('user_id' => '0'));
                                $cart_contents = Cart::model()->findAllByAttributes(array('session_id' => $session_id));
                                if (!empty($cart_contents)) {
                                        echo ' <div class="drop_cart">';
                                        foreach ($cart_contents as $cart_content) {
                                                $prod_details = Products::model()->findByPk($cart_content->product_id);
                                                $folder = Yii::app()->Upload->folderName(0, 1000, $prod_details->id);
                                                $total = $cart_content->quantity * Yii::app()->Discount->DiscountAmount($prod_details);
                                                $this->renderPartial('_cartaontents', array('cart_content' => $cart_content, 'prod_details' => $prod_details, 'folder' => $folder, 'total' => $total));
                                                $subtotoal = $subtotoal + $total;
                                        }
//                                        $this->renderPartial('_cartfooter', array('subtotoal' => $subtotoal));
                                        echo '</div>';
                                } else {
                                        echo 'Cart box is Empty';
                                }
                        } else {
                                echo 'Cart box is Empty';
                        }
                }
        }

        public function granttotal() {
                if (isset(Yii::app()->session['user']['id'])) {
                        $cart_items = cart::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                        $user_id = Yii::app()->session['user']['id'];
                        if (isset(Yii::app()->session['temp_user'])) {
                                $condition = "user_id = " . $user_id . " AND session_id = " . Yii::app()->session['temp_user'];
                        } else {
                                Yii::app()->session['temp_user'] = microtime(true);
                                $condition = "user_id = " . $user_id . " AND session_id = " . Yii::app()->session['temp_user'];
                        }
                } else if (isset(Yii::app()->session['temp_user'])) {
                        $cart_items = cart::model()->findAllByAttributes(array('session_id' => Yii::app()->session['temp_user']));
                        $user_id = Yii::app()->session['temp_user'];
                        $condition = "session_id = " . $user_id;
                }
                $coupon = CouponHistory::model()->find(array('condition' => $condition));
                if (!empty($coupon)) {
                        $coupen_details = Coupons::model()->findByPk($coupon->coupon_id);
                        $coupon_amount = Coupons::model()->findByPk($coupon->coupon_id)->discount;
                } else {
                        $coupen_details = NULL;
                        $coupon_amount = 0;
                }


                foreach ($cart_items as $cart_item) {
                        $product = Products::model()->findByPk($cart_item->product_id);
                        $price = Yii::app()->Discount->DiscountAmount($product);
                        $subtotal += ($price * $cart_item->quantity);
                }
                return $subtotal - $coupon_amount + Yii::app()->Shipping->Calculate();
        }

        public function subtotal() {
                if (isset(Yii::app()->session['user']['id'])) {
                        $cart = cart::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                } else {
                        $cart = cart::model()->findAllByAttributes(array('session_id' => Yii::app()->session['temp_user']));
                }

                foreach ($cart as $cart_item) {
                        $product = Products::model()->findByPk($cart_item->product_id);
                        $price = Yii::app()->Discount->DiscountExtax($product);
                        $subtotal += ($price * $cart_item->quantity);
                }

                return Yii::app()->Currency->convert($subtotal);
        }

        public function subtotalamount() {

                if (isset(Yii::app()->session['user']['id'])) {
                        $cart = Cart::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                } else {
                        $cart = Cart::model()->findAllByAttributes(array('session_id' => Yii::app()->session['temp_user']));
                }
                foreach ($cart as $cart_item) {
                        $product = Products::model()->findByPk($cart_item->product_id);
                        $price = Yii::app()->Discount->DiscountExtax($product);
                        $subtotal += ($price * $cart_item->quantity);
                }

                return $subtotal;
        }

        public function actionMycart() {

                if (Yii::app()->session['user'] != '' && Yii::app()->session['user'] != NULL) {
                        $model1 = new BuyerDetails();
                        $model = new BuyerDetails();

//$current_coupon = explodeYii::app()->session['couponid'];
                        $coupen_details = CouponHistory::model()->findByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                        $user_id = Yii::app()->session['user']['id'];
                        Cart::model()->deleteAllByAttributes(array(), array('condition' => 'date < subdate(now(), 1) and user_id != ' . Yii::app()->session['user']['id']));
                } else {
                        if (!isset(Yii::app()->session['temp_user'])) {
                                Yii::app()->session['temp_user'] = microtime(true);
                        }
                        Cart::model()->deleteAllByAttributes(array(), array('condition' => 'date < subdate(now(), 1)'));
                        $sessonid = Yii::app()->session['temp_user'];
                }


                /*  otp verification */


                if (Yii::app()->session['user'] != '' && Yii::app()->session['user'] != NULL) {
                        $user_details = BuyerDetails::model()->findByPk(Yii::app()->session['user']['id']);
                        $id = $user_details->id;
                        $cart_items = Cart::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                        $user_id = Yii::app()->session['user']['id'];
                        if (isset(Yii::app()->session['temp_user'])) {
                                $condition = "user_id = " . $user_id . " AND session_id = " . Yii::app()->session['temp_user'];
                        } else {
                                Yii::app()->session['temp_user'] = microtime(true);
                                $condition = "user_id = " . $user_id . " AND session_id = " . Yii::app()->session['temp_user'];
                        }
                } else {

                        $temp_id = Yii::app()->session['temp_user'];
                        $cart_items = Cart::model()->findAllByAttributes(array('session_id' => $temp_id));
                        $user_id = Yii::app()->session['temp_user'];
                        $condition = "session_id = " . $user_id;
                }

                $coupon = CouponHistory::model()->find(array('condition' => $condition));
                if (!empty($coupon)) {
                        $coupen_details = Coupons::model()->findByPk($coupon->coupon_id);
                        $coupon_amount = Coupons::model()->findByPk($coupon->coupon_id)->discount;
                } else {
                        $coupen_details = NULL;
                        $coupon_amount = 0;
                }
                $subtotal = Yii::app()->Discount->Subtotal();
                $granttotal = Yii::app()->Discount->Granttotal();
                if (!empty($cart_items)) {
// $this->render('new_buynow');
                        $this->render('buynow', array('carts' => $cart_items, 'regform' => $model, 'loginform' => $model1, 'gift_user' => $gift_user, 'gift_options' => $gift_options, 'coupen_details' => $coupen_details, 'subtotal' => $subtotal, 'coupon_amount' => $coupon_amount, 'granttotal' => $granttotal));
                } else {
                        $this->render('empty_cart');
                }
        }

        public function actionProceed() {

                if (Yii::app()->session['user']['id'] != '' && Yii::app()->session['user']['id'] != NULL) {
                        if (Yii::app()->session['orderid'] == '') {
                                $cart = Cart::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                                if (!empty($cart)) {
                                        $order_id = $this->addOrder($cart);
//                                $select_coupon = Yii::app()->session['coupen_id'];
//                                $this->addcoupens();
                                        Yii::app()->session['orderid'] = $order_id;

                                        $this->orderProducts($order_id, $cart);

                                        $this->updatecoupenhistory($order_id);
                                        $this->redirect(array('Checkout/CheckOut'));
                                } else {
                                        $this->redirect(array('Cart/Mycart'));
                                }
                        } else {

                                $cart = Cart::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));

                                if (!empty($cart)) {

                                        $order_id1 = $this->addOrder1($cart);

//                                $select_coupon = Yii::app()->session['coupen_id'];
//                                $this->addcoupens();

                                        $order_id = Yii::app()->session['orderid'];
                                        $this->updatecoupenhistory($order_id1);

                                        $new = $this->orderProducts($order_id, $cart);

                                        $this->redirect(array('Checkout/CheckOut'));
                                } else {
                                        $this->redirect(array('Cart/Mycart'));
                                }
                        }
                } else if (Yii::app()->session['temp_user']) {

                        if (Yii::app()->session['orderid'] == '') {



                                $cart = Cart::model()->findAllByAttributes(array('session_id' => Yii::app()->session['temp_user']));
                                if (!empty($cart)) {
                                        $order_id = $this->addOrder($cart);
//                                $select_coupon = Yii::app()->session['coupen_id'];
//                                $this->addcoupens();
                                        Yii::app()->session['orderid'] = $order_id;
                                        $this->orderProducts($order_id, $cart);
                                        $this->updatecoupenhistory($order_id);
                                        $this->redirect(array('Checkout/CheckOut'));
                                } else {
                                        $this->redirect(array('Cart/Mycart'));
                                }
                        } else {

                                $cart = Cart::model()->findAllByAttributes(array('session_id' => Yii::app()->session['temp_user']));

                                if (!empty($cart)) {

                                        $order_id1 = $this->addOrder1($cart);
//                                $select_coupon = Yii::app()->session['coupen_id'];
//                                $this->addcoupens();
                                        $order_id = Yii::app()->session['orderid'];
                                        $this->updatecoupenhistory($order_id1);
                                        $this->orderProducts($order_id, $cart);
                                        $this->redirect(array('Checkout/CheckOut'));
                                } else {
                                        $this->redirect(array('Cart/Mycart'));
                                }
                        }


                        //  $this->redirect(array('site/login'));
                }
        }

        public function actionGetorderproduct() {

                $order_id = $_POST['order_id'];
                $option = $_POST['option'];
                $product_id = $_POST['product_id'];
                echo $product_id;
                $order_product_id = OrderProducts::model()->findByAttributes(array('order_id' => $order_id, 'product_id' => $product_id, 'option_id' => $option));
                echo $order_product_id->id;
        }

        public function addOrder($cart) {
                $model = CouponHistory::model()->findByAttributes(array('session_id' => Yii::app()->session['user']['id']));
                $coupen = Coupons::model()->findByPk($model->coupon_id);
                $model1 = new Order;
                if (Yii::app()->session['user']['id'] != '' && Yii::app()->session['user']['id'] != NULL) {
                        $model1->user_id = Yii::app()->session['user']['id'];
                }
                $model1->session_id = Yii::app()->session['temp_user'];
                $total_amt = $this->total($cart);
                $model1->total_amount = $total_amt;
                $model1->status = 0;
                $model1->coupon_id = $model->coupon_id;
                $model1->discount_rate = $coupen->discount;
                date_default_timezone_set('Asia/Kolkata');
                $model1->order_date = date('Y-m-d H:i:s');
                $model1->DOC = date('Y-m-d');

                if ($model1->save()) {
                        return $model1->id;
                }
        }

        public function addOrder1($cart) {

                $model = CouponHistory::model()->findByAttributes(array('session_id' => Yii::app()->session['temp_user']));
                $coupen = Coupons::model()->findByPk($model->coupon_id);
                $model1 = Order::model()->findByPk(Yii::app()->session['orderid']);

                if (!empty($model1)) {
                        $model1->user_id = Yii::app()->session['user']['id'];

                        $total_amt = $this->total($cart);
                        $model1->total_amount = $total_amt;
                        $model1->coupon_id = $model->coupon_id;
                        $model1->discount_rate = $model->total_amount;
                        $model1->status = 0;
                        $model1->coupon_id = $coupen->id;
                        $model1->discount_rate = $coupen->discount;
                        date_default_timezone_set('Asia/Kolkata');
                        $model1->order_date = date('Y-m-d H:i:s');
                        $model1->DOC = date('Y-m-d');
                        if ($model1->save()) {
                                return $model1->id;
                        }
                } else {
                        $this->redirect(array('Cart/Mycart'));
                }
        }

        public function orderProducts($orderid, $carts) {

                foreach ($carts as $cart) {
                        $prod_details = Products::model()->findByPk($cart->product_id);
                        $check = OrderProducts::model()->findAllByAttributes(array('order_id' => $orderid, 'product_id' => $cart->product_id, 'option_id' => $cart->options));

                        if (!empty($check)) {

                        } else {

                                $model_prod = new OrderProducts;
                                $model_prod->order_id = $orderid;
                                $model_prod->product_id = $cart->product_id;
                                $model_prod->option_id = $cart->options;
                                $model_prod->quantity = $cart->quantity;
                                $model_prod->gift_option = $cart->gift_option;
                                $model_prod->rate = $cart->rate;
                                $model_prod->merchant_id = $prod_details->merchant_id;
                                $price = Yii::app()->Discount->DiscountAmount($prod_details) * $cart->quantity;
                                $model_prod->amount = ($cart->quantity) * ($price);
                                if ($model_prod->save(false)) {

                                } else {

                                }
                        }
                }
        }

        public function actionGetcarttotal() {

                if (isset(Yii::app()->session['user']['id'])) {
                        $cart_items = Cart::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                        if (!empty($cart_items)) {
                                foreach ($cart_items as $cart_item) {
                                        $product = Products::model()->findByPk($cart_item->product_id);
                                        $ptotal = Yii::app()->Discount->DiscountAmount($product) * $cart_item->quantity;
//$subtotoal = $subtotoal + $total;
                                        $carttotal += $ptotal;
                                }
                                echo Yii::app()->Currency->convert($carttotal);
                        } else {
                                echo Yii::app()->Currency->convert(0);
                        }
                } else {
                        if (isset(Yii::app()->session['temp_user'])) {
                                $cart_items = Cart::model()->findAllByAttributes(array('session_id' => Yii::app()->session['temp_user']));

                                if (!empty($cart_items)) {
                                        foreach ($cart_items as $cart_item) {
                                                $product = Products::model()->findByPk($cart_item->product_id);
                                                $ptotal = Yii::app()->Discount->DiscountAmount($product) * $cart_item->quantity;
                                                $carttotal += $ptotal;
                                        }
                                        echo Yii::app()->Currency->convert($carttotal);
                                } else {
                                        echo Yii::app()->Currency->convert(0);
                                }
                        } else {
                                echo Yii::app()->Currency->convert(0);
                        }
                }
        }

        public function actionGetcartcount() {

                if (isset(Yii::app()->session['user']['id'])) {
                        $cart_items = Cart::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                        if (!empty($cart_items)) {
                                echo count($cart_items);
                        } else {
                                echo "0";
                        }
                } else {
                        if (isset(Yii::app()->session['temp_user'])) {
                                $cart_items = Cart::model()->findAllByAttributes(array('session_id' => Yii::app()->session['temp_user']));

                                if (!empty($cart_items)) {
                                        echo count($cart_items);
                                } else {
                                        echo "0";
                                }
                        } else {
                                echo Yii::app()->Currency->convert(0);
                        }
                }
        }

        public function total($cart) {
                foreach ($cart as $cart_item) {
                        $product = Products::model()->findByPk($cart_item->product_id);
                        $price = Yii::app()->Discount->DiscountAmount($product);
                        $subtotal += ($price * $cart_item->quantity);
                }
                return $subtotal;
        }

        public function updatecoupenhistory($order_id) {
                $model = CouponHistory::model()->findByAttributes(array('session_id' => Yii::app()->session['temp_user']));
                if (!empty($model)) {
                        $model->order_id = $order_id;
                        $model->save();
                }
        }

        public function loadModel($id) {
                $model = Cart::model()->findByPk($id);
                if ($model === null)
                        throw new CHttpException(404, 'The requested page does not exist.');
                return $model;
        }

        public function actionDelete($id) {
                $model = $this->loadModel($id);
                $model->delete();
                if (!isset($_GET['ajax'])) {
                        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('Mycart'));
                }
        }

        public function actionRemoveCoupon() {
                if (isset(Yii::app()->session['couponid'])) {
                        if (isset(Yii::app()->session['user']))
                                $data = CouponHistory::model()->findByAttributes(array('user_id' => Yii::app()->session['user'], 'coupon_id' => Yii::app()->session['couponid']));
                        elseif (isset(Yii::app()->session['temp_user']))
                                $data = CouponHistory::model()->findByAttributes(array('session_id' => Yii::app()->session['temp_user'], 'coupon_id' => Yii::app()->session['couponid']));
                        if ($data->delete())
                                unset(Yii::app()->session['couponid']);
                        $this->redirect(Yii::app()->request->urlReferrer);
                }
        }

        public function siteURL() {
                $protocol = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
                $domainName = $_SERVER['HTTP_HOST'];
                return $protocol . $domainName;
        }

        public function actionViewWishlist() {
                if (isset(Yii::app()->session['user'])) {
                        $model = UserWishlist::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                        $this->render('view_wishlist', array('model' => $model));
                } else {
                        $this->redirect(array('site/UserLogin'));
                }
        }

        public function actionMoveToWishlist($id) {
                if (isset(Yii::app()->session['user'])) {
                        $model = new UserWishlist();
                        $ids = explode(',', $id);
                        for ($i = 0; $i <= count($ids); $i++) {
                                if (isset($ids[$i]) && $ids[$i] > 0) {
                                        $model->prod_id = $ids[$i];
                                        $model->user_id = Yii::app()->session['user']['id'];
                                        if ($model->save()) {
                                                $this->redirect(Yii::app()->request->urlReferrer);
                                        }
                                }
                        }
                } else {
                        $this->redirect(array('site/UserLogin'));
                }
        }

        public function actionAddToWishlist($product_id) {
                if (isset(Yii::app()->session['user'])) {
                        $model_wishlist = UserWishlist::model()->findAllByAttributes(array('prod_id' => $product_id));
                        if (empty($model_wishlist)) {
                                $model = new UserWishlist();
                                $model->prod_id = $product_id;
                                $model->user_id = Yii::app()->session['user']['id'];
                                $model->date = date('Y-m-d');
                                $model->session_id = $sessonid = Yii::app()->session['temp_user'];
                                if ($model->save(FALSE)) {
                                        Yii::app()->user->setFlash('addtowishlist', "Product Added to wishlist!!!");
                                        $this->redirect(Yii::app()->request->urlReferrer);
                                }
                        } else {
                                Yii::app()->user->setFlash('addtowishlist_error', "Already Added to wishlist!!!");
                                $this->redirect(Yii::app()->request->urlReferrer);
                        }
                } else {
                        $this->redirect(array('site/UserLogin'));
                }
        }

}
