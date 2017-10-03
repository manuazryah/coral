<?php

namespace backend\modules\order\controllers;

use Yii;
use common\models\OrderMaster;
use common\models\OrderMasterSearch;
use common\models\OrderDetailsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\CreateYourOwn;
use common\models\CreateYourOwnSearch;
use common\models\OrderDetails;

/**
 * OrderMasterController implements the CRUD actions for OrderMaster model.
 */
class OrderMasterController extends Controller {

    /**
     * @inheritdoc
     */
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

    /**
     * Lists all OrderMaster models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new OrderMasterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//        $dataProvider->query->andWhere(['status' => '4'])->orWhere(['status' => '5']);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single OrderMaster model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $searchModel = new OrderDetailsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['order_id' => $id]);

        return $this->render('view', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a custom perfume detailed view.
     * @param integer $id
     * @return mixed
     */
    public function actionViewMore($id) {
        $order_details = OrderDetails::find()->where(['id' => $id])->one();
        $searchModel = new CreateYourOwnSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['id' => $order_details->product_id]);
        return $this->render('view_more', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * This function print order details.
     * @param integer $id
     * @return mixed
     */
    public function actionPrint($id) {
        $order_master = OrderMaster::find()->where(['order_id' => $id])->one();
        $order_details = OrderDetails::find()->where(['order_id' => $id])->all();
        echo $this->renderPartial('_print', [
            'order_master' => $order_master,
            'order_details' => $order_details,
        ]);
        exit;
    }

    /**
     * Creates a new OrderMaster model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    /**
     * Finds the OrderMaster model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return OrderMaster the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = OrderMaster::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionChangeAdminStatus() {
        if (yii::$app->request->isAjax) {
            $id = Yii::$app->request->post()['id'];
            $admin_status = Yii::$app->request->post()['status'];
            $model = OrderMaster::find()->where(['id' => $id])->one();
            $model->admin_status = $admin_status;
            if ($model->save()) {
                echo 1;
            } else {
                echo 0;
            }
        }
    }

}
