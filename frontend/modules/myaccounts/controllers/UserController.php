<?php

namespace frontend\modules\myaccounts\controllers;

use Yii;
use common\models\User;
use common\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\UserAddress;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller {

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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex() {
        return $this->render('index', [
                    'model' => $model,
        ]);
    }

    public function actionMyOrders() {
        return $this->render('my-orders');
    }

    public function actionMyReviews() {
        return $this->render('reviews-ratings');
    }

    public function actionWishList() {
        return $this->render('wish-list');
    }

    public function actionChangePassword() {
        $model = User::findOne(Yii::$app->user->identity->id);
        if (Yii::$app->request->post()) {
            if (Yii::$app->getSecurity()->validatePassword(Yii::$app->request->post('old-password'), $model->password_hash)) {
                if (Yii::$app->request->post('new-password') == Yii::$app->request->post('confirm-password')) {
                    $model->password_hash = Yii::$app->security->generatePasswordHash(Yii::$app->request->post('confirm-password'));
//                   echo $model->password_hash;exit;
                    $model->update();
                    Yii::$app->getSession()->setFlash('success', 'password changed successfully');
                    $this->redirect('index');
                } else {
                    Yii::$app->getSession()->setFlash('error', 'password mismatch  ');
                }
            } else {
                Yii::$app->getSession()->setFlash('error', 'Incorrect Password ');
            }
        }
        return $this->render('change-password', [
                    'model' => $model
        ]);
    }

    public function actionPersonalInfo() {
        $id = Yii::$app->user->identity->id;
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('personal-info', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionUpdateContactInfo() {
        $id = Yii::$app->user->identity->id;
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
        }
        return $this->render('contact_info', [
                    'model' => $model,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing User model.
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
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionUserAddress() {
        $model = new UserAddress();
        $user_address = UserAddress::find()->where(['user_id' => Yii::$app->user->identity->id])->all();
        if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model)) {
            if (empty($user_address)) {
                $model->status = 1;
            }
            $model->user_id = Yii::$app->user->identity->id;
            $model->save();
            return $this->redirect(['/user/addresses']);
        } else {
            return $this->render('addresses', [
                        'model' => $model,
                        'user_address' => $user_address,
            ]);
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
                    $data = UserAddress::find()->where(['status' => 1])->one();
                    if (empty($data)) {
                        $data_exist = UserAddress::find()->one();
                        $data_exist->status = 1;
                        $data_exist->save();
                    }
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
