<?php

//use Yii;

namespace frontend\controllers;

use yii;
use common\models\Product;
use common\models\ProductSearch;
use common\models\Category;
use common\models\RecentlyViewed;
use common\models\WishList;
use yii\db\Expression;

class ProductController extends \yii\web\Controller {

        /**
         * Displays a Products based on category.
         * @param category_code $id
         * @return mixed
         */
        public function actionIndex($id = null, $type = null) {
//        echo $id;
//        exit;
                $catag = Category::find()->where(['category_code' => $id])->one();
                $searchModel = new ProductSearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                if (!empty($id)) {
                        $dataProvider->query->andWhere(['category' => $catag->id]);
                }
                if (isset(Yii::$app->session['gender_search'])) {
                        $dataProvider->query->andWhere(['gender_type' => Yii::$app->session['gender_search']]);
                }

                if (($type == 0 && $type != NULL) || ($type == 1)) {
                        $dataProvider->query->andWhere(['gender_type' => $type]);
                }

                $categories = Category::find()->where(['status' => 1])->all();

                return $this->render('index', [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                            'categories' => $categories,
                            'catag' => $catag,
                            'id' => $id,
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
                if (isset(Yii::$app->user->identity->id)) {
                        $user_id = Yii::$app->user->identity->id;
                } else {
                        $user_id = '';
                }
                $product_details = Product::find()->where(['canonical_name' => $product, 'status' => '1'])->one();
                $this->RecentlyViewed($product_details);
                $product_reveiws = \common\models\CustomerReviews::find()->where(['product_id' => $product_details->id, 'status' => '1'])->all();
                \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $product_details->meta_keywords]);
                \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $product_details->meta_description]);
                return $this->render('product_detail', [
                            'product_details' => $product_details,
                            'product_reveiws' => $product_reveiws,
                            'user_id' => $user_id,
                ]);
        }

        /**
         * Save recently viewed product.
         * @param product array
         * if user logged in set user id otherwise set temporary session id
         */
        public function RecentlyViewed($product) {
                $user_id = '';
                $sessonid = '';
                if (isset(Yii::$app->user->identity->id)) {
                        $user_id = Yii::$app->user->identity->id;
                } else {
                        if (!isset(Yii::$app->session['temp_user_product']) || Yii::$app->session['temp_user_product'] == '') {
                                $milliseconds = round(microtime(true) * 1000);
                                Yii::$app->session['temp_user_product'] = $milliseconds;
                        }
                        $sessonid = Yii::$app->session['temp_user_product'];
                }
                $model = RecentlyViewed::find()->where(['product_id' => $product->id])->one();
                if (empty($model)) {
                        $model = new RecentlyViewed();
                        $model->user_id = $user_id;
                        $model->session_id = $sessonid;
                        $model->product_id = $product->id;
                        $model->date = date('Y-m-d');
                } else {
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

        /**
         * Save product to wish list.
         * @param product id
         * if user logged in set user id otherwise set temporary session id
         */
        public function actionSavewishlist() {
                $product_id = $_POST['product_id'];
                if ($product_id != '') {
                        $user_id = '';
                        $sessonid = '';
                        if (isset(Yii::$app->user->identity->id)) {
                                $user_id = Yii::$app->user->identity->id;
                        } else {
                                if (!isset(Yii::$app->session['temp_wish_list']) || Yii::$app->session['temp_wish_list'] == '') {
                                        $milliseconds = round(microtime(true) * 1000);
                                        Yii::$app->session['temp_wish_list'] = $milliseconds;
                                }
                                $sessonid = Yii::$app->session['temp_wish_list'];
                        }

                        $model = WishList::find()->where(['product' => $product_id])->one();
                        if (empty($model)) {
                                $model = new WishList();
                                $model->user_id = $user_id;
                                $model->session_id = $sessonid;
                                $model->product = $product_id;
                                $model->date = date('Y-m-d');
                        } else {
                                $model->date = date('Y-m-d');
                        }
                        $model->save();
                }
                return;
        }

        /**
         * Update recently viewed product.
         * @param tmperory session for recently viewed product
         * update session id to corresponding user user id
         */
        public function actionGetwishlistproduct() {
                if (isset(Yii::$app->user->identity->id)) {
                        if (isset(Yii::$app->session['temp_wish_list'])) {
                                $models = WishList::find()->where(['session_id' => Yii::$app->session['temp_wish_list']])->all();

                                foreach ($models as $msd) {
                                        $data = WishList::find()->where(['product' => $msd->product, 'user_id' => Yii::$app->user->identity->id])->one();
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
                                unset(Yii::$app->session['temp_wish_list']);
                        }
                }
        }

        /**
         * This function will display new modal for add new customer reviews
         */
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

        /**
         * This function will save new customer reviews
         */
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

        public function actionGenderSearch() {
                if (Yii::$app->request->isAjax) {
                        $gender = $_POST['gender'];
                        $product_category = $_POST['pro_cat'];
                        Yii::$app->session['gender_search'] = $gender;
                }
        }

        public function actionSearch() {
                if (Yii::$app->request->post()) {

                        $keyword = $_POST['search_keyword'];
                        $searchModel = new ProductSearch();
                        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                        $dataProvider->query->andWhere(['like', 'product_name', $keyword])->orWhere(['like', 'canonical_name', $keyword]);

                        $category = Category::find()->where(['status' => 1])->andWhere(['like', 'category', $keyword])->all();
                        $category_products = array();
                        if (!empty($category)) {
                                foreach ($category as $value) {
                                        $cat_products = Product::find()->where(['status' => 1, 'category' => $value->id])->all();
                                        foreach ($cat_products as $cat_products) {
                                                $category_products[] = $cat_products->id;
                                        }
                                }
                                $dataProvider->query->orWhere(['IN', 'id', $category_products]);
                        }

                        $categories = Category::find()->where(['status' => 1])->all();
                        return $this->render('index', [
                                    'searchModel' => $searchModel,
                                    'dataProvider' => $dataProvider,
                                    'categories' => $categories,
                        ]);
                }
        }

        public function actionSearchKeyword() {
                if (Yii::$app->request->isAjax) {
                        $keyword = $_POST['keyword'];
                        if ($keyword != '') {
                                $search_tags = \common\models\MasterSearchTag::find()->where(['status' => 1])->andWhere((['like', 'tag_name', $keyword]))->all();
                                $keyword_products = array();
                                if (!empty($search_tags)) {
                                        foreach ($search_tags as $value) {
                                                $search_products = Product::find()->where(['status' => 1])->andWhere(new Expression('FIND_IN_SET(:search_tag, search_tag)'))->addParams([':search_tag' => $value->id])->all();
                                                foreach ($search_products as $search_productss) {
                                                        if (!in_array($search_productss->id, $keyword_products))
                                                                $keyword_products[] = $search_productss->id;
                                                }
                                        }
                                }
                                $values = $this->renderPartial('_product_search', ['products' => $keyword_products]);
                                echo $values;
                        }
                }
        }

}
