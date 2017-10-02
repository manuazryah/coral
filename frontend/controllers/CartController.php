<?php

namespace frontend\controllers;

use yii;
use common\models\Product;
use common\models\Cart;
use common\models\User;
use frontend\models\CartsignupForm;
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
        if (yii::$app->request->isAjax) {
            $canonical_name = Yii::$app->request->post()['cano_name'];
            $qty = Yii::$app->request->post()['qty'];
            $id = Product::findOne(['canonical_name' => $canonical_name])->id;
            $stock = Product::findOne(['canonical_name' => $canonical_name])->stock;
            $date = $this->date();
            if (isset(Yii::$app->user->identity->id)) {
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
                $user_id = '';
            }
            $cart = Cart::find()->where(['product_id' => $id])->andWhere($condition)->one();
            if (!empty($cart)) {
                $quantity = ($cart->quantity) + $qty;
                $cart->quantity = $quantity > $stock ? $stock : $quantity;
//            $cart->quantity = $qty;
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
    }

    public function actionGetcartcount() {
        if (yii::$app->request->isAjax) {

            $date = $this->date();
            Cart::deleteAll('date <= :date', ['date' => $date]);
            if (isset(Yii::$app->user->identity->id)) {
                if (isset(Yii::$app->session['temp_user'])) {
                    /*                     * *******Change tempuser cart to login user********* */
                    $this->changecart(Yii::$app->session['temp_user']);
//                
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
    }

    public function actionGetcarttotal() {
        if (yii::$app->request->isAjax) {
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
    }

    public function actionSelectcart() {
        if (yii::$app->request->isAjax) {
            if (isset(Yii::$app->user->identity->id)) {
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
    }

    public function actionMycart() {
        $date = $this->date();
        $shipping_limit = Settings::findOne('1');
        if (isset(Yii::$app->user->identity->id)) {
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


            return $this->render('buynow', ['carts' => $cart_items, 'subtotal' => $subtotal, 'shipping_limit' => $shipping_limit->value]);
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
        if (yii::$app->request->isAjax) {
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
    }

    public function actionCheckout() {
//        $this->redirect(['cart/proceed']);
        if (!isset(Yii::$app->user->identity->id)) {
            yii::$app->session['after_login'] = 'cart/proceed';
            $model = new CartsignupForm();
            if ($model->load(Yii::$app->request->post())) {
                $user = new User();
                $user->username = $model->email;
                $user->first_name = $model->first_name;
                $user->last_name = $model->last_name;
                $user->country = '1';
                $user->dob = '00-00-0000';
                $user->gender = '0';
                $user->country_code = Yii::$app->request->post()["CartsignupForm"]['country_code'];
                $user->mobile_no = $model->mobile_no;
                $user->email = $model->email;
                $user->password = '***guestpassword***';
                if ($user->save()) {
                    if (Yii::$app->getUser()->login($user)) {
                        $this->redirect(['cart/proceed']);
                    }
                } else {
//                    var_dump($user->getErrors());
//                    exit;
                    return $this->render('checkout', ['model' => $model, 'user' => $user]);
                }
            }
//            var_dump($model);exit;
            return $this->render('checkout', ['model' => $model]);
        } else {
            $this->redirect(['cart/proceed']);
        }
    }

    public function actionProceed() {
//        Yii::$app->session['orderid']='';exit;
        if (isset(Yii::$app->user->identity->id)) {
            if (isset(Yii::$app->session['temp_user'])) {
                /* Change tempuser cart to login user */
                $this->changecart(Yii::$app->session['temp_user']);
            }
            $cart = Cart::find()->where(['user_id' => Yii::$app->user->identity->id])->all();
            $check = OrderMaster::find()->where('user_id = :user_id and status != :status', ['user_id' => Yii::$app->user->identity->id, 'status' => '4'])->one();
            if (!empty($check)) {
                Yii::$app->session['orderid'] = $check->order_id;
            }
            if (!empty($cart)) {
                if (Yii::$app->session['orderid'] == '') {
//                    exit('hallo');
                    $orders = $this->addOrder($cart);
                    $this->orderProducts($orders, $cart);
                    Yii::$app->session['orderid'] = $orders['order_id'];
                    $this->redirect(array('checkout/checkout'));
                } else {
//                    exit('hai');
                    $orders = $this->addOrder1($cart);
                    $this->orderProducts($orders, $cart);
                    $this->redirect(array('checkout/checkout'));
                }
            } else {
                $this->redirect(array('cart/mycart'));
            }
        } else if (Yii::$app->session['temp_user']) {
            yii::$app->session['after_login'] = 'cart/proceed';
            $this->redirect(array('site/login'));
        }
    }

    public function addOrder1($cart) {
        $model1 = OrderMaster::find()->where(['order_id' => Yii::$app->session['orderid']])->one();
        if (!empty($model1)) {
            $model1->user_id = Yii::$app->user->identity->id;
            $total_amt = $this->total($cart);
            $model1->total_amount = $total_amt;
            $model1->status = 1;
//            date_default_timezone_set('Asia/Kolkata');
            $model1->order_date = date('Y-m-d H:i:s');
            $model1->doc = date('Y-m-d');
            if ($model1->save()) {
                return ['master_id' => $model1->id, 'order_id' => $model1->order_id];
            }
        } else {
            $this->redirect(array('cart/mycart'));
        }
    }

    public function addOrder($cart) {
        $model1 = new OrderMaster;
        if (isset(Yii::$app->user->identity->id)) {
            $serial_no = \common\models\Settings::findOne(4)->value;
            $model1->order_id = $this->generateProductEan($serial_no);
            $model1->user_id = Yii::$app->user->identity->id;

            $total_amt = $this->total($cart);
            $model1->total_amount = $total_amt;
            $model1->status = 1;
//            date_default_timezone_set('Asia/Kolkata');
            $model1->order_date = date('Y-m-d H:i:s');
            $model1->doc = date('Y-m-d');

            if ($model1->save()) {
                $this->Updateorderid($model1->order_id);
                return ['master_id' => $model1->id, 'order_id' => $model1->order_id];
            }
//            else {
//                var_dump($model1->getErrors());
//                exit;
//            }
        } else if (Yii::$app->session['temp_user']) {
            yii::$app->session['after_login'] = 'cart/proceed';
            $this->redirect(array('site/login'));
        }
    }

    public function orderProducts($orders, $carts) {
        foreach ($carts as $cart) {
            $prod_details = Product::findOne($cart->product_id);
            $check = OrderDetails::find()->where(['order_id' => $orders['order_id'], 'product_id' => $cart->product_id])->one();
            if (!empty($check)) {
                $check->quantity = $cart->quantity;
                if ($prod_details->offer_price == '0' || $prod_details->offer_price == '') {
                    $price = $prod_details->price;
                } else {
                    $price = $prod_details->offer_price;
                }
                $check->amount = $price;
                $check->rate = ($cart->quantity) * ($price);
                $check->status = '0';
                $check->save();
            } else {
                $model_prod = new OrderDetails;
                $model_prod->master_id = $orders['master_id'];
                $model_prod->order_id = $orders['order_id'];
                $model_prod->product_id = $cart->product_id;
                $model_prod->quantity = $cart->quantity;
                if ($prod_details->offer_price == '0' || $prod_details->offer_price == '') {
                    $price = $prod_details->price;
                } else {
                    $price = $prod_details->offer_price;
                }
                $model_prod->amount = $price;
                $model_prod->rate = ($cart->quantity) * ($price);
                $model_prod->status = '0';
                if ($model_prod->save()) {
                    return TRUE;
                }
//                 else {
//                var_dump($model_prod->getErrors());
//                exit;
//            }
            }
        }
    }

    function cart_content($condition) {
        $cart_contents = Cart::findAll($condition);
        if (!empty($cart_contents)) {
            foreach ($cart_contents as $cart_content) {
                $prod_details = Product::findOne($cart_content->product_id);
                if ($prod_details->offer_price == '0' || $prod_details->offer_price == '') {
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
//                <button title="Remove From Cart" class="remove-cart"><i class="fa fa-times" aria-hidden="true"></i></button>
            }
        } else {
            echo 'Cart box is Empty';
        }
    }

    public function total($cart) {
        $subtotal = '0';
        foreach ($cart as $cart_item) {
            $product = Product::findOne($cart_item->product_id);
            if ($product->offer_price == '0' || $product->offer_price == '') {
                $price = $product->price;
            } else {
                $price = $product->offer_price;
            }
            $subtotal += ($price * $cart_item->quantity);
        }
        return $subtotal;
    }

    public function generateProductEan($serial_no) {
        $orderid_exist = OrderMaster::find()->where(['order_id' => $serial_no])->one();
        if (!empty($orderid_exist)) {
            return $this->generateProductEan($serial_no + 1);
        } else {
            return $serial_no;
        }
    }

    public function Updateorderid($id) {
        $orderid = \common\models\Settings::findOne(4);
        $orderid->value = $id;
        $orderid->save();
        return;
    }

    function changecart($temp) {
        $models = Cart::find()->where(['session_id' => Yii::$app->session['temp_user']])->all();
        foreach ($models as $msd) {
            $msd->user_id = Yii::$app->user->identity->id;
            $msd->save();
        }
    }

    function date() {
//        $date = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s')));
        $date = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . ' - 8 days'));
        return $date;
    }

    public function actionRemoveWishlist() {
        if (yii::$app->request->isAjax) {
            $id = Yii::$app->request->post()['wish_list_id'];
            $model = \common\models\WishList::findOne($id);
            $model->delete();
            echo 1;
            exit;
        }
    }

}
