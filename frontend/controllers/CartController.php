<?php

namespace frontend\controllers;

use yii;
use common\models\Product;
use common\models\Cart;
use common\models\User;
use common\models\Settings;
use yii\base\Component;
use yii\db\MigrationInterface;
use yii\di\Instance;
use yii\db\Expression;
use common\models\OrderMaster;
use common\models\OrderDetails;

class CartController extends \yii\web\Controller {

    public function init() {
        date_default_timezone_set('Asia/Kolkata');
    }

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionBuynow() {
        $canonical_name = $_REQUEST['cano_name'];
        $qty = $_REQUEST['qty'];
        $option_size = $_REQUEST['option_size'];
        $option_color = $_REQUEST['option_color'];
        $master_option_id = $_REQUEST['master_option'];
        $id = Product::findOne(['canonical_name' => $canonical_name])->id;
        $date = $this->date();
        if (Yii::$app->user->identity->id != '' && Yii::$app->user->identity->id != NULL) {
            $user_id = Yii::$app->user->identity->id;
//            'date <= :date', ['date' => $date]
            Cart::deleteAll('date <= :date AND user_id != :user_id', ['date' => $date, ':user_id' => Yii::$app->user->identity->id]);
//            Cart::deleteAll('user_id != :user_id AND date < :date', [':date' => SUBDATE(now(), 1), ':user_id' => Yii::$app->user->identity->id]);
//            Cart::model()->deleteAllByAttributes(array(), array('condition' => 'date < subdate(now(), 1) and user_id != ' . Yii::$app->user->identity->id));
        } else {
            if (!isset(Yii::$app->session['temp_user'])) {
                $milliseconds = round(microtime(true) * 1000);
                Yii::$app->session['temp_user'] = $milliseconds;
            }
//            SUBDATE(now(), 1);
            Cart::deleteAll('date <= :date AND session_id != :session_id', ['date' => $date, ':session_id' => Yii::$app->session['temp_user']]);
//        Cart::deleteAll('session_id != :session_id AND date < :date', [':date' => subdate(now(), 1), ':session_id' => Yii::$app->session['temp_user']]);
//                        Cart::model()->deleteAllByAttributes(array(), array('condition' => 'date < subdate(now(), 1)'));
            $sessonid = Yii::$app->session['temp_user'];
        }
        if (isset($user_id)) {
            $condition = ['user_id' => $user_id];
//            if (isset(Yii::$app->session['temp_user'])) {
//                $condition = ['user_id' => $user_id, 'session_id' => Yii::$app->session['temp_user']];
//            } else {
        } else if (isset($sessonid)) {
            $condition = ['session_id' => $sessonid];
//                Yii::$app->session['temp_user'] = microtime(true);
//                $condition = ['user_id' => $user_id, 'session_id' => Yii::$app->session['temp_user']];
//            }
//            $condition = "session_id = $sessonid";
        }
        $cart = Cart::find()->where(['product_id' => $id])->andWhere($condition)->one();
//        $cart = Cart::find()->where(['session_id' => $sessonid, 'product_id' => $id])->one();
        if (!empty($cart)) {
            $cart->quantity = $qty;
            $cart->save();
            $cart_contents = Cart::findAll($condition);
//            $cart_contents = Cart::findAll(['session_id' => $sessonid]);
            if (!empty($cart_contents)) {
                echo '<div class="shoper-head">
                                        <h3>Your Order</h3>
                                        <h6>Price</h6>
                                    </div>
                                    <div class="shoper-content">';
                foreach ($cart_contents as $cart_content) {
//                    echo $cart_content->product_id;
                    $prod_details = Product::findOne($cart_content->product_id);
//                        $folder = Yii::$app->Upload->folderName(0, 1000, $prod_details->id);
//                        $total = $cart_content->quantity * Yii::$app->Discount->DiscountAmount($prod_details);
                    if ($prod_details->offer_price == '0') {
                        $price = $prod_details->price;
                    } else {
                        $price = $prod_details->offer_price;
                    }
                    $total = $cart_content->quantity * $price;
                    echo $this->renderPartial('_cartcontents', ['cart_content' => $cart_content, 'prod_details' => $prod_details, 'folder' => $folder, 'total' => $total]);
                    $subtotoal = $subtotoal + $total;
                }
                echo '</div>
                                    <div class="shoper-bottom">
                                        <h5>Total AED: <span><i class="fa amount">' . $subtotoal . '</i></span></h5>
                                    </div>
                                    <div class="shoper-buy-btn">
                                        <a href="' . yii::$app->basePath . '"><i class="fa fa-long-arrow-left"></i> Continue Shopping</a>
                                        <a class="byu-btn btn-default" href="' . yii::$app->basePath . '/cart/mycart">Buy</a>
                                    </div>';
            } else {
                echo 'Cart box is Empty';
            }
        } else {
            $model = new cart;
            $model->user_id = $user_id;
            $model->session_id = Yii::$app->session['temp_user'];
            $model->product_id = $id;
            $model->quantity = $qty;
//                        $model->options = $product_option;
            date_default_timezone_set('Asia/Kolkata');
            $model->date = date('Y-m-d H:i:s');
            if ($model->save()) {
                $cart_contents = Cart::findAll($condition);
//                $cart_contents = Cart::findAll(['session_id' => $sessonid]);
//                $cart_contents = Cart::model()->findAllByAttributes(array(), array('condition' => ($condition)));

                if (!empty($cart_contents)) {

                    echo '<div class="shoper-head">
                                        <h3>Your Order</h3>
                                        <h6>Price</h6>
                                    </div>
                                    <div class="shoper-content">';
                    foreach ($cart_contents as $cart_content) {
                        $prod_details = Product::findOne($cart_content->product_id);
//                        $folder = Yii::$app->Upload->folderName(0, 1000, $prod_details->id);
//                        $total = $cart_content->quantity * Yii::$app->Discount->DiscountAmount($prod_details);
                        if ($prod_details->offer_price == '0') {
                            $price = $prod_details->price;
                        } else {
                            $price = $prod_details->offer_price;
                        }
                        $total = $cart_content->quantity * $price;
                        echo $this->renderPartial('_cartcontents', ['cart_content' => $cart_content, 'prod_details' => $prod_details, 'folder' => $folder, 'total' => $total]);
                        $subtotoal = $subtotoal + $total;
                    }
                    echo '</div>
                                    <div class="shoper-bottom">
                                        <h5>Total AED: <span><i class="fa amount">' . $subtotoal . '</i></span></h5>
                                    </div>
                                    <div class="shoper-buy-btn">
                                        <a href="' . yii::$app->basePath . '"><i class="fa fa-long-arrow-left"></i> Continue Shopping</a>
                                        <a class="byu-btn btn-default" href="' . yii::$app->basePath . '/cart/mycart">Buy</a>
                                    </div>';
                } else {
                    echo 'Cart box is Empty';
                }
            }
        }
    }

    public function actionGetcartcount() {
        $date = $this->date();
        Cart::deleteAll('date <= :date', ['date' => $date]);
        if (isset(Yii::$app->user->identity->id)) {
            if (isset(Yii::$app->session['temp_user'])) {
                $models = Cart::find()->where(['session_id' => Yii::$app->session['temp_user']])->all();
                foreach ($models as $msd) {
                    $msd->user_id = Yii::$app->user->identity->id;
                    $msd->save();
                }
            }

            $cart_items = Cart::find()->where(['user_id' => Yii::$app->user->identity->id])->all();
//                        $cart_items = Cart::model()->findAllByAttributes(array('user_id' => Yii::$app->user->identity->id));
            if (!empty($cart_items)) {
                echo count($cart_items);
            } else {
                echo "0";
            }
        } else {
            if (isset(Yii::$app->session['temp_user'])) {
//                $condition=['date'=> <= NOW() - INTERVAL 1 DAY];
//                'session_id != :session_id', [':session_id' => Yii::$app->session['temp_user']]
                $cart_items = Cart::find()->where(['session_id' => Yii::$app->session['temp_user']])->all();
//                                $cart_items = Cart::model()->findAllByAttributes(array('session_id' => Yii::$app->session['temp_user']));

                if (!empty($cart_items)) {
                    echo count($cart_items);
                } else {
                    echo "0";
                }
            } else {
                echo '0';
//                                echo Yii::$app->Currency->convert(0);
            }
        }
    }

    public function actionGetcarttotal() {

        if (isset(Yii::$app->user->identity->id)) {
            $cart_items = Cart::find()->where(['user_id' => Yii::$app->user->identity->id])->all();
//            $cart_items = Cart::model()->findAllByAttributes(array('user_id' => Yii::$app->user->identity->id));
            if (!empty($cart_items)) {
                foreach ($cart_items as $cart_item) {
                    $product = Product::findOne($cart_item->product_id);
//                                                $product = Products::model()->findByPk($cart_item->product_id);
                    if ($product->offer_price == '0') {
                        $price = $product->price;
                    } else {
                        $price = $product->offer_price;
                    }
                    $ptotal = $price * $cart_item->quantity;
//                                                $ptotal = Yii::$app->Discount->DiscountAmount($product) * $cart_item->quantity;
                    $carttotal += $ptotal;
                }
                echo $carttotal;
//                                        echo Yii::$app->Currency->convert($carttotal);
            } else {
                echo '0';
//                                        echo Yii::$app->Currency->convert(0);
            }
        } else {
            if (isset(Yii::$app->session['temp_user'])) {
                $cart_items = Cart::find()->where(['session_id' => Yii::$app->session['temp_user']])->all();
//                                $cart_items = Cart::model()->findAllByAttributes(array('session_id' => Yii::$app->session['temp_user']));

                if (!empty($cart_items)) {
                    foreach ($cart_items as $cart_item) {
                        $product = Product::findOne($cart_item->product_id);
//                                                $product = Products::model()->findByPk($cart_item->product_id);
                        if ($product->offer_price == '0') {
                            $price = $product->price;
                        } else {
                            $price = $product->offer_price;
                        }
                        $ptotal = $price * $cart_item->quantity;
//                                                $ptotal = Yii::$app->Discount->DiscountAmount($product) * $cart_item->quantity;
                        $carttotal += $ptotal;
                    }
                    echo $carttotal;
//                                        echo Yii::$app->Currency->convert($carttotal);
                } else {
                    echo '0';
//                                        echo Yii::$app->Currency->convert(0);
                }
            } else {
                echo '0';
//                                echo Yii::$app->Currency->convert(0);
            }
        }
    }

    public function actionSelectcart() {

        if (Yii::$app->user->identity->id != '' && Yii::$app->user->identity->id != NULL) {
            $user_id = Yii::$app->user->identity->id;
            $cart_contents = Cart::find()->where(['user_id' => $user_id])->all();
//                        $cart_contents = Cart::model()->findAllByAttributes(array('user_id' => $user_id));
            if (!empty($cart_contents)) {
                echo ' <div class="drop_cart">';
                foreach ($cart_contents as $cart_content) {
                    $prod_details = Product::findOne($cart_content->product_id);
//                        $folder = Yii::$app->Upload->folderName(0, 1000, $prod_details->id);
//                        $total = $cart_content->quantity * Yii::$app->Discount->DiscountAmount($prod_details);
                    if ($prod_details->offer_price == '0') {
                        $price = $prod_details->price;
                    } else {
                        $price = $prod_details->offer_price;
                    }
                    $total = $cart_content->quantity * $price;
                    echo $this->renderPartial('_cartcontents', ['cart_content' => $cart_content, 'prod_details' => $prod_details, 'folder' => $folder, 'total' => $total]);
                    $subtotoal = $subtotoal + $total;
                }
//                                $this->renderPartial('_cartfooter', array('subtotoal' => $subtotoal));
                echo '</div>';
            } else {
                echo 'Cart box is Empty';
            }
        } else {
            if (isset(Yii::$app->session['temp_user'])) {

                $session_id = Yii::$app->session['temp_user'];
                $cart_contents = Cart::find()->where(['session_id' => $session_id])->all();
//                                $cart_contents = Cart::model()->findAllByAttributes(array('session_id' => $session_id));
                if (!empty($cart_contents)) {
                    echo ' <div class="drop_cart">';
                    foreach ($cart_contents as $cart_content) {
                        $prod_details = Product::findOne($cart_content->product_id);
//                        $folder = Yii::$app->Upload->folderName(0, 1000, $prod_details->id);
//                        $total = $cart_content->quantity * Yii::$app->Discount->DiscountAmount($prod_details);
                        if ($prod_details->offer_price == '0') {
                            $price = $prod_details->price;
                        } else {
                            $price = $prod_details->offer_price;
                        }
                        $total = $cart_content->quantity * $price;
                        echo $this->renderPartial('_cartcontents', ['cart_content' => $cart_content, 'prod_details' => $prod_details, 'folder' => $folder, 'total' => $total]);
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

    public function actionRemovecart() {
        $canonical_name = $_REQUEST['cano_name'];
        $cartid = $_REQUEST['cartid'];
//        if (Yii::$app->user->identity->id != '' && Yii::$app->user->identity->id != NULL) {
//
//            $user_id = Yii::$app->user->identity->id;
//            Cart::deleteAll('session_id != :session_id', [':session_id' => Yii::$app->session['temp_user']]);
//            Cart::model()->deleteAllByAttributes(array(), array('condition' => 'date < subdate(now(), 1) and user_id != ' . Yii::$app->user->identity->id));
//        } else {
//            if (!isset(Yii::$app->session['temp_user'])) {
//                Yii::$app->session['temp_user'] = microtime(true);
//                Cart::deleteAll('session_id != :session_id', [':session_id' => Yii::$app->session['temp_user']]);
//
//                Cart::model()->deleteAllByAttributes(array(), array('condition' => 'date < subdate(now(), 1)'));
//                $sessonid = Yii::$app->session['temp_user'];
//            }
//        }
        if (isset($user_id)) {

            if (isset(Yii::$app->session['temp_user'])) {
                $condition = ['user_id' => $user_id, 'session_id' => Yii::$app->session['temp_user']];
            } else {
                Yii::$app->session['temp_user'] = microtime(true);
                $condition = ['user_id' => $user_id, 'session_id' => Yii::$app->session['temp_user']];
            }
        } else if (isset($sessonid)) {
            $condition = ['session_id' => $sessonid];
//            $condition = "session_id = $sessonid";
        }

        $model = Cart::findOne($cartid);
//        $model = Cart::model()->findByPk($cartid);
//        $cou_used = CouponHistory::model()->find(array('condition' => $condition));

        if ($model->delete()) {
//            $total_amount = $this->subtotalamount();
//            $coupon_validation = Coupons::model()->findByPk($cou_used->coupon_id);
//            if ($coupon_validation->cash_limit != 0) {
//                if ($total_amount <= $coupon_validation->cash_limit) {
//                    $cou_used->deleteAll();
//                }
//            } else {
//                if ($total_amount < $coupon_validation->discount) {
//                    $cou_used->deleteAll();
//                }
//            }
            $cart_contents = Cart::find()->where($condition)->all();
//            $cart_contents = Cart::model()->findAllByAttributes(array(), array('condition' => ($condition)));
            if (!empty($cart_contents)) {

                echo '<div class="shoper-head">
                                        <h3>Your Order</h3>
                                        <h6>Price</h6>
                                    </div>
                                    <div class="shoper-content">';
                foreach ($cart_contents as $cart_content) {
                    $prod_details = Product::findOne($cart_content->product_id);
//                        $folder = Yii::$app->Upload->folderName(0, 1000, $prod_details->id);
//                        $total = $cart_content->quantity * Yii::$app->Discount->DiscountAmount($prod_details);
                    if ($prod_details->offer_price == '0') {
                        $price = $prod_details->price;
                    } else {
                        $price = $prod_details->offer_price;
                    }
                    $total = $cart_content->quantity * $price;
                    echo $this->renderPartial('_cartcontents', ['cart_content' => $cart_content, 'prod_details' => $prod_details, 'folder' => $folder, 'total' => $total]);
                    $subtotoal = $subtotoal + $total;
                }
                echo '</div>
                                    <div class="shoper-bottom">
                                        <h5>Total AED: <span><i class="fa amount">' . $subtotoal . '</i></span></h5>
                                    </div>
                                    <div class="shoper-buy-btn">
                                        <a href="' . yii::$app->basePath . '"><i class="fa fa-long-arrow-left"></i> Continue Shopping</a>
                                        <a class="byu-btn btn-default" href="' . yii::$app->basePath . '/cart/mycart">Buy</a>
                                    </div>';
            } else {
                echo 'Cart box is Empty';
            }
        }
    }

    public function actionMycart() {

        $date = $this->date();
        $shipping_limit = Settings::findOne('1');
        if (Yii::$app->user->identity->id != '' && Yii::$app->user->identity->id != NULL) {
            $model1 = new User();
            $model = new User();

//$current_coupon = explodeYii::$app->session['couponid'];
//            $coupen_details = CouponHistory::model()->findByAttributes(array('user_id' => Yii::$app->session['user']['id']));
            $user_id = Yii::$app->user->identity->id;
            Cart::deleteAll('date <= :date AND user_id != :user_id', ['date' => $date, ':user_id' => $user_id]);
//            Cart::model()->deleteAllByAttributes(array(), array('condition' => 'date < subdate(now(), 1) and user_id != ' . Yii::$app->session['user']['id']));
        } else {
            if (!isset(Yii::$app->session['temp_user'])) {
                Yii::$app->session['temp_user'] = microtime(true);
            }
            Cart::deleteAll('date <= :date', ['date' => $date]);
            $sessonid = Yii::$app->session['temp_user'];
        }


        /*  otp verification */


        if (Yii::$app->user->identity->id != '' && Yii::$app->user->identity->id != NULL) {
            $user_details = User::findOne(Yii::$app->user->identity->id);
            $user_id = Yii::$app->user->identity->id;
            $cart_items = Cart::find()->where(['user_id' => Yii::$app->user->identity->id])->all();
//            if (isset(Yii::$app->session['temp_user'])) {
//                $condition = "user_id = " . $user_id . " AND session_id = " . Yii::$app->session['temp_user'];
//            } else {
//                Yii::$app->session['temp_user'] = microtime(true);
//                $condition = "user_id = " . $user_id . " AND session_id = " . Yii::$app->session['temp_user'];
//            }
        } else {

            $user_id = Yii::$app->session['temp_user'];
            $cart_items = Cart::find()->where(['session_id' => $user_id])->all();
            $condition = "session_id = " . $user_id;
        }

//        $coupon = CouponHistory::model()->find(array('condition' => $condition));
//        if (!empty($coupon)) {
//            $coupen_details = Coupons::model()->findByPk($coupon->coupon_id);
//            $coupon_amount = Coupons::model()->findByPk($coupon->coupon_id)->discount;
//        } else {
//            $coupen_details = NULL;
//            $coupon_amount = 0;
//        }
//        $subtotal = Yii::$app->Discount->Subtotal();
//        $granttotal = Yii::$app->Discount->Granttotal();
        if (!empty($cart_items)) {
            foreach ($cart_items as $cart_content) {
                $prod_details = Product::findOne($cart_content->product_id);
                if ($prod_details->offer_price == '0') {
                    $price = $prod_details->price;
                } else {
                    $price = $prod_details->offer_price;
                }
                $total = $cart_content->quantity * $price;
                $subtotal = $subtotal + $total;
            }

// $this->render('new_buynow');
//            return $this->render('buynow');
            return $this->render('buynow', array('carts' => $cart_items, 'subtotal' => $subtotal, 'regform' => $model, 'loginform' => $model1, 'shipping_limit' => $shipping_limit->value));
//            $this->render('buynow', array('carts' => $cart_items, 'regform' => $model, 'loginform' => $model1, 'gift_user' => $gift_user, 'gift_options' => $gift_options, 'coupen_details' => $coupen_details, 'subtotal' => $subtotal, 'coupon_amount' => $coupon_amount, 'granttotal' => $granttotal));
        } else {
            return $this->render('emptycart');
        }
    }

    public function actionCart_remove() {
        $cart_id = $_POST['cartid'];
        if (isset($cart_id)) {
            $cart = Cart::findone($cart_id);
            if ($cart->delete()) {
                echo json_encode(array('msg' => 'success', 'content' => 'Successfully Deleted'));
            } else {
                echo json_encode(array('msg' => 'error', 'content' => 'Cannot be deleted'));
            }
        } else {
            echo json_encode(array('msg' => 'error', 'content' => 'Id cannot be set'));
        }
    }

    public function actionUpdatecart() {
        $cart_id = $_POST['cartid'];
        $qty = $_POST['quantity'];
        if (isset($cart_id)) {
            $cart = Cart::findone($cart_id);
            $cart->quantity = $qty;
            if ($cart->save()) {
                echo json_encode(array('msg' => 'success', 'content' => 'Successfully Changed'));
            } else {
                echo json_encode(array('msg' => 'error', 'content' => 'Cannot be Changed'));
            }
        } else {
            echo json_encode(array('msg' => 'error', 'content' => 'Id cannot be set'));
        }
    }

    public function actionProceed() {
        if (Yii::$app->user->identity->id != '' && Yii::$app->user->identity->id != NULL) {
            if (Yii::$app->session['orderid'] == '') {

                $cart = Cart::find()->where(['user_id' => Yii::$app->user->identity->id])->all();

                if (!empty($cart)) {
                    $order_id = $this->addOrder($cart);
                    Yii::$app->session['orderid'] = $order_id;
                    $this->orderProducts($order_id, $cart);
                    $this->redirect(array('Checkout/CheckOut'));
                } else {
                    $this->redirect(array('Cart/Mycart'));
                }
            } else {
                $cart = Cart::find()->where(['user_id' => Yii::$app->user->identity->id])->all();

                if (!empty($cart)) {

                    $order_id = $this->addOrder($cart);
                    Yii::$app->session['orderid'] = $order_id;
                    $this->orderProducts($order_id, $cart);
                    $this->redirect(array('Checkout/CheckOut'));
                } else {
                    $this->redirect(array('Cart/Mycart'));
                }
            }
        } else if (Yii::$app->session['temp_user']) {
            yii::$app->session['after_login'] = 'cart/proceed';
            $this->redirect(array('site/login'));
        }
    }

    public function addOrder($cart) {
        $model1 = new OrderMaster;
        if (Yii::$app->user->identity->id != '' && Yii::$app->user->identity->id != NULL) {
            $model1->user_id = Yii::$app->user->identity->id;

            $total_amt = $this->total($cart);
            $model1->total_amount = $total_amt;
            $model1->status = 0;
            date_default_timezone_set('Asia/Kolkata');
            $model1->order_date = date('Y-m-d H:i:s');
            $model1->doc = date('Y-m-d');

            if ($model1->save()) {
                return $model1->id;
            }
        } else if (Yii::$app->session['temp_user']) {
            yii::$app->session['after_login'] = 'cart/proceed';
            $this->redirect(array('site/login'));
        }
    }

    public function addOrder1($cart) {
        $model1 = Order::model()->findByPk(Yii::app()->session['orderid']);
        if (!empty($model1)) {
            $model1->user_id = Yii::$app->user->identity->id;

            $total_amt = $this->total($cart);
            $model1->total_amount = $total_amt;
            $model1->status = 0;
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
            $prod_details = Product::findOne($cart->product_id);
            $check = OrderDetails::find()->where(['order_id' => $orderid, 'product_id' => $cart->product_id]);

            if (!empty($check)) {
                
            } else {

                $model_prod = new OrderDetails;
                $model_prod->order_id = $orderid;
                $model_prod->product_id = $cart->product_id;
                $model_prod->quantity = $cart->quantity;
                if ($prod_details->offer_price != '') {
                    $price = $prod_details->offer_price;
                } else {
                    $price = $prod_details->price;
                }
                $model_prod->amount = $price;
                $model_prod->rate = ($cart->quantity) * ($price);
                if ($model_prod->save()) {
                    
                } else{
                    var_dump($model_prod->getErrors());
                }
            }
        }
    }

    public function total($cart) {
        foreach ($cart as $cart_item) {
            $product = Product::findOne($cart_item->product_id);
            if ($product->offer_price != '') {
                $price = $product->offer_price;
            } else {
                $price = $product->price;
            }
            $subtotal += ($price * $cart_item->quantity);
        }
        return $subtotal;
    }

    function date() {
//        $date = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s')));
        $date = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . ' - 8 days'));
        return $date;
    }

}
