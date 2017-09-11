<?php

//use Yii;

namespace frontend\controllers;

use yii;
use common\models\Product;
use common\models\ProductSearch;
use common\models\Category;
use common\models\RecentlyViewed;
use yii\db\Expression;

class ProductController extends \yii\web\Controller {

    /**
     * Displays a Products based on category.
     * @param category_code $id
     * @return mixed
     */
    public function actionIndex($id) {
        $catag = Category::find()->where(['category_code' => $id])->one();
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['category' => $catag->id]);
        $categories = Category::find()->where(['status' => 1])->all();
        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'categories' => $categories,
                    'catag' => $catag,
        ]);
    }

    public function actionCategory($id) {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where('category =' . $id);
        $category = Category::find()->select('id,category')->where(['status' => 1])->all();
        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'category' => $category,
        ]);
    }

    /**
     * Displays a Particular Product.
     * @param prodict_id  $product
     * @return mixed
     */
    public function actionProduct_detail($product) {
        $product_details = Product::find()->where(['canonical_name' => $product, 'status' => '1'])->one();
        $this->RecentlyViewed($product_details);
        $recently_viewed = RecentlyViewed::find()->where(['user_id' => Yii::$app->user->identity->id])->all();
        $related_product = Product::find()->where(new Expression('FIND_IN_SET(:id, id)'))->addParams([':id' => $product_details->related_product])->andWhere(['status' => 1])->orderBy(['id' => SORT_DESC])->all();
        $product_reveiws = \common\models\CustomerReviews::find()->where(['product_id' => $product_details->id, 'status' => '1'])->all();
        return $this->render('product_detail', [
                    'product_details' => $product_details,
                    'recently_viewed' => $recently_viewed,
                    'related_product' => $related_product,
                    'product_reveiws' => $product_reveiws,
        ]);
    }

    /**
     * Save recently viewed product.
     * @param product array
     * if user logged in set user id otherwise set temporary session id
     */
    public function RecentlyViewed($product) {
        if (Yii::$app->user->identity->id != '' && Yii::$app->user->identity->id != NULL) {
            $user_id = Yii::$app->user->identity->id;
        } else {
            if (!isset(Yii::$app->session['temp_user_product'])) {
                $milliseconds = round(microtime(true) * 1000);
                Yii::$app->session['temp_user_product'] = $milliseconds;
            }
            $sessonid = Yii::$app->session['temp_user_product'];
        }
        $model = RecentlyViewed::find()->where(['product_id' => $product->id, 'session_id' => Yii::$app->session['temp_user_product']])->one();
        if (empty($model)) {
            $model = new RecentlyViewed();
            $model->user_id = $user_id;
            $model->session_id = $sessonid;
            $model->product_id = $product->id;
            $model->date = date('Y-m-d');
        } else {
            $model->session_id = $sessonid;
            $model->date = date('Y-m-d');
        }
        $model->save();
        return;
    }

    /**
     * Update recently viewed product.
     * @param tmperory session for recently viewed product
     * update session id to corresponding user user id
     */
    public function actionGetrecentproduct() {
        if (isset(Yii::$app->user->identity->id)) {
            if (isset(Yii::$app->session['temp_user_product'])) {
                echo Yii::$app->session['temp_user_product'];
                $models = RecentlyViewed::find()->where(['session_id' => Yii::$app->session['temp_user_product']])->all();

                foreach ($models as $msd) {
                    $data = RecentlyViewed::find()->where(['product_id' => $msd->product_id, 'user_id' => Yii::$app->user->identity->id])->one();
                    if (empty($data)) {
                        $msd->user_id = Yii::$app->user->identity->id;
                        $msd->session_id = '';
                        $msd->save();
                    } else {
                        $data->date = $msd->date;
                        if ($data->save()) {
                            $msd->delete();
                        }
                    }
                }
                unset(Yii::$app->session['temp_user_product']);
            }
        }
    }

    public function actionAddReview() {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(array('site/login-signup'));
        }
        if (Yii::$app->request->isAjax) {
            $product_id = $_POST['product_id'];
            $model_review = new \common\models\CustomerReviews();
            $data = $this->renderPartial('add_reviews', [
                'model_review' => $model_review,
                'product_id' => $product_id,
            ]);
            echo $data;
        }
    }

    public function actionSaveReview() {
        if (Yii::$app->request->isAjax) {
            $model_review = new \common\models\CustomerReviews();
            if ($model_review->load(Yii::$app->request->post())) {
                $model_review->user_id = Yii::$app->user->identity->id;
                $model_review->review_date = date('Y-m-d');
                $model_review->save();
                echo 1;
                exit;
            }
        }
    }

}
