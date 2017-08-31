<?php

namespace frontend\controllers;

use yii;
use common\models\OrderMaster;
use common\models\UserAddress;

class CheckoutController extends \yii\web\Controller {

    public function init() {
        date_default_timezone_set('Asia/Kolkata');
    }

    public function actionCheckout() {

        if (Yii::$app->user->identity->id != '' && Yii::$app->user->identity->id != NULL) {
            if (Yii::$app->session['orderid']) {
                $address = UserAddress::find()->where(['user_id' => Yii::$app->user->identity->id])->all();
                $model = UserAddress::find()->where(['user_id' => Yii::$app->user->identity->id, 'status' => '1'])->one();
                return $this->render('billing', ['model' => $model, 'addresses' => $address]);
            } else {
                $this->redirect(array('cart/mycart'));
            }
//            $this->redirect(array('checkout/billing'));
        } else {
            $this->redirect(array('site/login'));
        }
    }

    public function actionGetadress() {
        $id = $_POST['id'];
        if (isset($id)) {
            $address = UserAddress::find()->where(['user_id' => Yii::$app->user->identity->id, 'id' => $id])->one();
            if ($address) {
                echo json_encode(['rslt' => 'success', 'address' => $address->address, 'landmark' => $address->landmark, 'location' => $address->location, 'emirate' => $address->emirate, 'post_code' => $address->post_code, 'mobile_number' => $address->mobile_number]);
            } else {
                echo json_encode(['rslt' => 'error', 'msg' => 'No details Found']);
            }
        } else {
            echo json_encode(['rslt' => 'error', 'msg' => 'address cannot be set']);
        }
    }

}