<?php

namespace frontend\modules\myaccounts\controllers;

use Yii;
use common\models\User;
use common\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\UserAddress;
use common\models\CustomerReviews;
use common\models\CustomerReviewsSearch;
use common\models\WishList;
use common\models\WishListSearch;
use common\models\OrderDetails;
use yii\helpers\ArrayHelper;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller {

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
        return $this->render('index');
    }

    public function actionMyOrders() {
        return $this->render('my-orders');
    }

    public function actionMyReviews() {
        $searchModel = new CustomerReviewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['user_id' => Yii::$app->user->identity->id]);
        $dataProvider->pagination->pageSize = 10;
        return $this->render('reviews-ratings', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionWishList() {
        $searchModel = new WishListSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['user_id' => Yii::$app->user->identity->id]);
        $dataProvider->pagination->pageSize = 10;
        return $this->render('wish-list', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
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
                    Yii::$app->getSession()->setFlash('error', 'Password mismatch  ');
                }
            } else {
                Yii::$app->getSession()->setFlash('error', 'Incorrect Old Password ');
            }
        }
        return $this->render('change-password', [
                    'model' => $model
        ]);
    }

    public function actionPersonalInfo() {
        $id = Yii::$app->user->identity->id;
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->dob = date("Y-m-d", strtotime($model->dob));
            $model->save();
        } return $this->render('personal-info', [
                    'model' => $model,
        ]);
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionUpdateContactInfo() {
        $id = Yii::$app->user->identity->id;
        $model = $this->findModel($id);
        $country_codes = ArrayHelper::map(\common\models\CountryCode::find()->where(['status' => 1])->orderBy(['id' => SORT_ASC])->all(), 'id', 'country_code');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(Yii::$app->request->referrer);
        }
        return $this->render('contact_info', [
                    'model' => $model,
                    'country_codes' => $country_codes,
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
        $country_codes = ArrayHelper::map(\common\models\CountryCode::find()->where(['status' => 1])->orderBy(['id' => SORT_ASC])->all(), 'id', 'country_code');
        if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model)) {
            if (empty($user_address)) {
                $model->status = 1;
            }
            $model->user_id = Yii::$app->user->identity->id;
            $model->save();
            $model = new UserAddress();
            return $this->redirect(Yii::$app->request->referrer);
        }
        return $this->render('addresses', [
                    'model' => $model,
                    'user_address' => $user_address,
                    'country_codes' => $country_codes,
        ]);
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

    /*
     * This function select chek email id	 * return result to the view
     */

    public function actionEmailUnique() {

        if (Yii::$app->request->isAjax) {
            $email = $_POST['email'];
            if ($email == '') {
                echo '0';
                exit;
            } else {
                $data = \common\models\User::find()->where(['email' => $email])->andWhere(['<>', 'id', Yii::$app->user->identity->id])->one();
                if (!empty($data)) {
                    echo 0;
                    exit;
                } else {
                    echo 1;
                    exit;
                }
            }
        }
    }

}
