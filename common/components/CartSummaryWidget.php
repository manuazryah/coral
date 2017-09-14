<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AppointmentWidget
 *
 * @author
 * JIthin Wails
 */

namespace common\components;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\web\NotFoundHttpException;
use common\models\Cart;
use common\models\OrderMaster;

//use common\models\RecentlyViewed;

class CartSummaryWidget extends Widget {

//    public $id;

    public function init() {
        parent::init();
        if (!isset(Yii::$app->user->identity->id)) {
            return '';
        }
    }

    public function run() {
        $user_id = Yii::$app->user->identity->id;
        $order_id = Yii::$app->session['orderid'];
        $cart_items = Cart::find()->where(['user_id' => $user_id])->all();
        $subtotal = OrderMaster::find()->where(['user_id' => $user_id, 'order_id' => $order_id])->one();
        return $this->render('cart_summary', ['cart_items' => $cart_items, 'subtotal' => $subtotal]);
        //return Html::encode($this->message);
    }

}

?>
