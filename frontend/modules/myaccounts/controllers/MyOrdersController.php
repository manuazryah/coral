<?php

namespace frontend\modules\myaccounts\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use common\models\OrderMaster;

class MyOrdersController extends Controller {

    public function beforeAction($action) {
        if (!parent::beforeAction($action)) {
            return false;
        }
        if (Yii::$app->user->isGuest) {
            $this->redirect(['/site/index']);
            return false;
        }
        return true;
    }

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex() {
        $my_orders = OrderMaster::find()->where(['user_id' => Yii::$app->user->identity->id])->orderBy(['id' => SORT_DESC])->all();

        return $this->render('my-orders', [
                    'my_orders' => $my_orders,
        ]);
    }

}
