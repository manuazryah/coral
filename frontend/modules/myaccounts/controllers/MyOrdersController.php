<?php

namespace frontend\modules\myaccounts\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use common\models\OrderMaster;
use common\models\OrderMasterSearch;
use common\models\Notification;

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
        $searchModel = new OrderMasterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['user_id' => Yii::$app->user->identity->id, 'payment_status' => 1]);
        $dataProvider->query->andWhere(['!=', 'status', 5]);
        $dataProvider->pagination->pageSize = 10;
        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /*
     * This function will cancel order
     */

    public function actionCancelOrder($id) {
        $order_master = OrderMaster::find()->where(['order_id' => $id])->one();
        $order_master->status = 5;
        if ($order_master->save()) {
            $notification = new Notification();
            $notification->notification_type = 1;
            $notification->order_id = $order_master->id;
            $msg = 'Order Number <span class="data-highlite">' . $order_master->order_id . '</span> has to be canceled';
            $msg1 = 'Order Number ' . $order_master->order_id . ' has to be canceled';
            $notification->content = $msg;
            $notification->message = $msg1;
            $notification->date = date('Y-m-d');
            $notification->save();
        }
        return $this->redirect('index');
    }

}
