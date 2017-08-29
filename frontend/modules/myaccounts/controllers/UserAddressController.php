<?php

namespace frontend\modules\myaccounts\controllers;

use Yii;
use common\models\UserAddress;
use common\models\UserAddressSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserAddressController implements the CRUD actions for UserAddress model.
 */
class UserAddressController extends Controller {

    /**
     * @inheritdoc
     */
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
     * Lists all UserAddress models.
     * @return mixed
     */
    public function actionIndex() {
        $model = new UserAddress();
        $user_address = UserAddress::find()->all();
        if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model)) {
            if (empty($user_address)) {
                $model->status = 1;
            }
            $model->user_id = Yii::$app->user->identity->id;
            $model->save();
            return $this->redirect(['index']);
        } else {
            return $this->render('index', [
                        'model' => $model,
                        'user_address' => $user_address,
            ]);
        }
    }

    /**
     * Displays a single UserAddress model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new UserAddress model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new UserAddress();
        $user_address = UserAddress::find()->all();
        if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model)) {
            if (empty($user_address)) {
                $model->status = 1;
            }
            $model->user_id = Yii::$app->user->identity->id;
            $model->save();
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing UserAddress model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing UserAddress model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UserAddress model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserAddress the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = UserAddress::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Change Default Address.
     * @param integer $id
     * @return mixed
     */
    public function actionChangeStatus() {
        if (Yii::$app->request->isAjax) {
            $id = $_POST['id'];
            $model = UserAddress::findOne($id);
            $data_exist = UserAddress::find()->where(['status' => 1])->one();
            var_dump($data_exist);
            if (!empty($data_exist)) {
                $data_exist->status = 0;
                $data_exist->save();
            }
            $model->status = 1;
            $model->save();
            echo 1;
            exit;
        }
    }

    /**
     * Remove Address.
     * @param integer $id
     * @return mixed
     */
    public function actionRemoveAddress() {
        if (Yii::$app->request->isAjax) {
            $id = $_POST['id'];
            $model = UserAddress::findOne($id);
            if (!empty($model)) {
                if ($model->delete()) {
                    $data_exist = UserAddress::find()->one();
                    $data_exist->status = 1;
                    $data_exist->save();
                    echo 1;
                    exit;
                } else {
                    echo 0;
                    exit;
                }
            }
        }
    }

}
