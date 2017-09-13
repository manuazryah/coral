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
        $canonical_name = Yii::$app->request->post()['cano_name'];
        $qty = Yii::$app->request->post()['qty'];
        $id = Product::findOne(['canonical_name' => $canonical_name])->id;
        $date = $this->date();
        if (Yii::$app->user->identity->id != '' && Yii::$app->user->identity->id != NULL) {
            $user_id = Yii::$app->user->identity->id;
            $condition = ['user_id' => $user_id];
            Cart::deleteAll('date <= :date AND user_id != :user_id', ['date' => $date, ':user_id' => Yii::$app->user->identity->id]);
        } else {
            if (!isset(Yii::$app->session['temp_user'])) {
                $milliseconds = round(microtime(true) * 1000);
                Yii::$app->session['temp_user'] = $milliseconds;
            }
            Cart::deleteAll('date <= :date AND session_id != :session_id', ['date' => $date, ':session_id' => Yii::$app->session['temp_user']]);

            $sessonid = Yii::$app->session['temp_user'];
            $condition = ['session_id' => $sessonid];
        }
        $cart = Cart::find()->where(['product_id' => $id])->andWhere($condition)->one();
        if (!empty($cart)) {
            $cart->quantity = $qty;
            $cart->save();
            $this->cart_content($condition);
        } else {
            $model = new cart;
            $model->user_id = $user_id;
            $model->session_id = Yii::$app->session['temp_user'];
            $model->product_id = $id;
            $model->quantity = $qty;
            date_default_timezone_set('Asia/Kolkata');
            $model->date = date('Y-m-d H:i:s');
            if ($model->save()) {
                $this->cart_content($condition);
            }
        }
    }

    function cart_content($condition) {
        $cart_contents = Cart::findAll($condition);
        if (!empty($cart_contents)) {
            foreach ($cart_contents as $cart_content) {
                $prod_details = Product::findOne($cart_content->product_id);
                if ($prod_details->offer_price == '0') {
                    $price = $prod_details->price;
                } else {
                    $price = $prod_details->offer_price;
                }
                $product_image = Yii::$app->basePath . '/../uploads/product/' . $prod_details->id . '/profile/' . $prod_details->canonical_name . '.' . $prod_details->profile;
                if (file_exists($product_image)) {
                    $image = '<img src="' . Yii::$app->homeUrl . 'uploads/product/' . $prod_details->id . '/profile/' . $prod_details->canonical_name . '_thumb.' . $prod_details->profile . '" alt="item1" />';
                } else {
                    $image = '<img src="' . Yii::$app->homeUrl . 'uploads/product/profile_thumb.png" alt=""/>';
                }
                echo '<li class="clearfix">
                       ' . $image . '
                       <span class="item-name">' . $prod_details->product_name . '</span>
                       <span class="item-price">' . $price . '</span>
                       <span class="item-quantity">Quantity: ' . $cart_content->quantity . '</span>
                       </li>';
            }
        } else {
            echo 'Cart box is Empty';
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
            $condition = ['user_id' => Yii::$app->user->identity->id];
        } else {
            if (isset(Yii::$app->session['temp_user'])) {
                $condition = ['session_id' => Yii::$app->session['temp_user']];
            } else {
                echo '0';
                exit;
            }
        }
        $cart_items = Cart::find()->where($condition)->all();
        if (!empty($cart_items)) {
            echo count($cart_items);
            exit;
        } else {
            echo "0";
            exit;
        }
    }

    public function actionGetcarttotal() {
        if (isset(Yii::$app->user->identity->id)) {
            $cart_items = Cart::find()->where(['user_id' => Yii::$app->user->identity->id])->all();
            if (!empty($cart_items)) {
                echo $this->total($cart_items);
            } else {
                echo '0';
            }
        } else {
            if (isset(Yii::$app->session['temp_user'])) {
                $cart_items = Cart::find()->where(['session_id' => Yii::$app->session['temp_user']])->all();

                if (!empty($cart_items)) {
                    echo $this->total($cart_items);
                } else {
                    echo '0';
                }
            } else {
                echo '0';
            }
        }
    }

    public function actionSelectcart() {

        if (Yii::$app->user->identity->id != '' && Yii::$app->user->identity->id != NULL) {
            $user_id = Yii::$app->user->identity->id;
            $cart_contents = Cart::find()->where(['user_id' => $user_id])->all();
            if (!empty($cart_contents)) {
                $this->cart_content($cart_contents);
            } else {
                echo 'Cart box is Empty';
            }
        } else {
            if (isset(Yii::$app->session['temp_user'])) {

                $session_id = Yii::$app->session['temp_user'];
                $cart_contents = Cart::find()->where(['session_id' => $session_id])->all();
//                                $cart_contents = Cart::model()->findAllByAttributes(array('session_id' => $session_id));
                if (!empty($cart_contents)) {
                    $this->cart_content($cart_contents);
                } else {
                    echo 'Cart box is Empty';
                }
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

            $user_id = Yii::$app->user->identity->id;
            Cart::deleteAll('date <= :date AND user_id != :user_id', ['date' => $date, ':user_id' => $user_id]);
            $cart_items = Cart::find()->where(['user_id' => $user_id])->all();
        } else {
            if (!isset(Yii::$app->session['temp_user'])) {
                Yii::$app->session['temp_user'] = microtime(true);
            }
            Cart::deleteAll('date <= :date', ['date' => $date]);
            $sessonid = Yii::$app->session['temp_user'];
            $cart_items = Cart::find()->where(['session_id' => $sessonid])->all();
        }

        if (!empty($cart_items)) {
            $subtotal = $this->total($cart_items);


            return $this->render('buynow', ['carts' => $cart_items, 'subtotal' => $subtotal, 'regform' => $model, 'loginform' => $model1, 'shipping_limit' => $shipping_limit->value]);
        } else {
            return $this->render('emptycart');
        }
    }

    public function actionCart_remove($id) {
        $cart = Cart::findone($id);
        if ($cart->delete()) {
            return $this->redirect('mycart');
        } else {
            return $this->redirect('mycart');
        }
    }

    public function actionUpdatecart() {
        $cart_id = Yii::$app->request->post()['cartid'];
        $qty = Yii::$app->request->post()['quantity'];
        if (isset($cart_id)) {
            $cart = Cart::findone($cart_id);
            $cart->quantity = $qty;
            if ($cart->save()) {
                if (isset(Yii::$app->user->identity->id)) {
                    $condition = ['user_id' => Yii::$app->user->identity->id];
                } else {
                    $condition = ['session_id' => Yii::$app->session['temp_user']];
                }
                $cart_items = Cart::find()->where($condition)->all();
                if (!empty($cart_items)) {
                    $subtotal = $this->total($cart_items);
                }
                echo json_encode(array('msg' => 'success', 'subtotal' => $subtotal));
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
                    $this->redirect(array('checkout/checkout'));
                } else {
                    $this->redirect(array('Cart/Mycart'));
                }
            } else {
                $cart = Cart::find()->where(['user_id' => Yii::$app->user->identity->id])->all();

                if (!empty($cart)) {

                    $order_id = $this->addOrder($cart);
                    Yii::$app->session['orderid'] = $order_id;
                    $this->orderProducts($order_id, $cart);
                    $this->redirect(array('checkout/checkout'));
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
            $check = OrderDetails::find()->where(['order_id' => $orderid, 'product_id' => $cart->product_id])->one();

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
                    
                } else {
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
