<?php

namespace frontend\controllers;

use yii;
use common\models\OrderMaster;
use common\models\UserAddress;
use common\models\OrderDetails;
use common\models\Product;
use yii\helpers\ArrayHelper;

class CheckoutController extends \yii\web\Controller {

    public function init() {
        date_default_timezone_set('Asia/Kolkata');
    }

    public function actionCheckout() {

        if (isset(Yii::$app->user->identity->id)) {
//            if (Yii::$app->session['orderid']) {
            $address = UserAddress::find()->where(['user_id' => Yii::$app->user->identity->id])->all();
            $model = UserAddress::find()->where(['user_id' => Yii::$app->user->identity->id, 'status' => '1'])->one();
            $country_codes = ArrayHelper::map(\common\models\CountryCode::find()->where(['status' => 1])->orderBy(['id' => SORT_ASC])->all(), 'id', 'country_code');
            if (empty($model)) {
                $model = new UserAddress();
                if ($model->load(Yii::$app->request->post())) {
                    Yii::$app->SetValues->Attributes($model);
                    $model->user_id = Yii::$app->user->identity->id;
                    if ($model->save()) {
                        $this->orderbilling($model->id);
                    }
                }
                return $this->render('new_billing_address', ['model' => $model, 'country_codes' => $country_codes,]);
            }
            if ($model->load(Yii::$app->request->post())) {
                $bill_address = Yii::$app->request->post()[UserAddress][billing];
                $this->orderbilling($bill_address);
//                $model1 = OrderMaster::find()->where(['order_id' => Yii::$app->session['orderid']])->one();
//                $model1->bill_address_id = $bill_address;
//                $model1->save();
//                if (Yii::$app->request->post()[UserAddress][check] == '1') {
//                    $model1->ship_address_id = $bill_address;
//                    $model1->status = 2;
//                    $model1->save();
//                    $this->redirect(array('checkout/confirm'));
//                } else {
//                    $this->redirect(array('checkout/delivery'));
//                }
            }
            return $this->render('billing', ['model' => $model, 'addresses' => $address, 'country_codes' => $country_codes,]);
//            } else {
//                $this->redirect(array('cart/mycart'));
//            }
//            $this->redirect(array('checkout/billing'));
        } else {
            $this->redirect(array('site/login'));
        }
    }

    function orderbilling($bill_address) {
        $model1 = OrderMaster::find()->where(['order_id' => Yii::$app->session['orderid']])->one();
        $model1->bill_address_id = $bill_address;
        $model1->save();
        if (Yii::$app->request->post()[UserAddress][check] == '1') {
            $model1->ship_address_id = $bill_address;
            $model1->status = 2;
            $model1->save();
            $this->redirect(array('checkout/confirm'));
        } else {
            $this->redirect(array('checkout/delivery'));
        }
    }

    public function actionDelivery() {
        if (isset(Yii::$app->user->identity->id)) {
            if (Yii::$app->session['orderid']) {
                $address = UserAddress::find()->where(['user_id' => Yii::$app->user->identity->id])->all();
                $model = new UserAddress();
                $country_codes = ArrayHelper::map(\common\models\CountryCode::find()->where(['status' => 1])->orderBy(['id' => SORT_ASC])->all(), 'id', 'country_code');
                if ($model->load(Yii::$app->request->post())) {
                    if (Yii::$app->request->post()[Deliveryaddress][billing] != '') {
                        $bill_address = Yii::$app->request->post()[Deliveryaddress][billing];
                        $model1 = OrderMaster::find()->where(['order_id' => Yii::$app->session['orderid']])->one();
                        $model1->ship_address_id = $bill_address;
                        $model1->status = 3;
                        if ($model1->save()) {
                            $this->redirect(array('checkout/confirm'));
                        }
                    } else {
                        Yii::$app->SetValues->Attributes($model);
                        $model->user_id = Yii::$app->user->identity->id;
                        if ($model->save()) {
                            $this->redirect(array('checkout/confirm'));
                        }
                    }
                }
                return $this->render('delivery', ['model' => $model, 'addresses' => $address, 'country_codes' => $country_codes]);
            } else {
                $this->redirect(array('cart/mycart'));
            }
        } else {
            $this->redirect(array('site/login'));
        }
    }

    public function actionConfirm() {
        if (isset(Yii::$app->user->identity->id)) {
            if (Yii::$app->session['orderid']) {
                $order_details = OrderDetails::find()->where(['order_id' => Yii::$app->session['orderid']])->all();
                $total_amt = $this->total($order_details);
                return $this->render('confirm', ['order_details' => $order_details, 'subtotal' => $total_amt]);
            } else {
                $this->redirect(array('cart/mycart'));
            }
        } else {
            $this->redirect(array('site/login'));
        }
    }

    public function total($cart) {
        $subtotal = '0';
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

    public function actionGetadress() {
        if (yii::$app->request->isAjax) {
            $id = Yii::$app->request->post()['id'];
            if (isset($id)) {
                $address = UserAddress::find()->where(['user_id' => Yii::$app->user->identity->id, 'id' => $id])->one();
                if ($address) {
                    echo json_encode(['rslt' => 'success', 'name' => $address->name, 'address' => $address->address, 'landmark' => $address->landmark, 'location' => $address->location, 'emirate' => $address->emirate, 'post_code' => $address->post_code, 'mobile_number' => $address->mobile_number, 'country_code' => $address->country_code]);
                } else {
                    echo json_encode(['rslt' => 'error', 'msg' => 'No details Found']);
                }
            } else {
                echo json_encode(['rslt' => 'error', 'msg' => 'address cannot be set']);
            }
        }
    }

}
