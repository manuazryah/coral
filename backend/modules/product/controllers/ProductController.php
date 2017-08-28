<?php

namespace backend\modules\product\controllers;

use Yii;
use common\models\Product;
use common\models\ProductSearch;
use common\models\SubCategory;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;
use yii\base\UserException;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller {

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
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Product();
//        $model->scenario = 'create';

        $ean = Product::find()->max('id');
        if (empty($ean)) {
            $model->item_ean = date(Ymd);
        } else {
            $ean = $ean + 1;
            $model->item_ean = date(Ymd) . $ean;
        }

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $file11 = UploadedFile::getInstances($model, 'profile');
                $file12 = UploadedFile::getInstances($model, 'other_image');
//            $model->item_ean = date(Ymdhis);
                $tag = $_POST['Product']['search_tag'];
                $model->search_tag = implode(',', $tag);
                $model->meta_description = $_POST['Product']['meta_description'];
                $model->meta_keywords = $_POST['Product']['meta_keywords'];
                $model->profile_alt = $_POST['Product']['profile_alt'];
                $model->gallery_alt = $_POST['Product']['gallery_alt'];
                if ($model->save()) {
                    if ($file11) {
                        if ($this->upload($model, $file11[0])) {
                            $model->upload($file11[0], $model);
                        }
                    }
                    for ($i = 0; $i < sizeof($file12); $i++) {
                        if ($model->uploadMultiple($file12[$i], $model->id, $model->canonical_name, $i)) {
// file is uploaded successfully
                        } else {
                            echo 'Image Upload Failed:';
                        }
                    }
                    return $this->redirect(['index']);
                } else {

                    throw new UserException('Error Code 1001');
//                var_dump($model->getErrors());
//                exit;
                }
            } else {
                echo validation_errors();
            }
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    public function Upload($model, $file) {
//       echo  Yii::$app->basePath . '/../uploads/product/' . $model->id . '/profile/'.$model->canonical_name.'.' . $file->extension;exit;
        if (!is_dir(\Yii::$app->basePath . '/../uploads/product/' . $model->id . '/profile/')) {
            mkdir(\Yii::$app->basePath . '/../uploads/product/' . $model->id . '/profile/', 0644, true);
//                chmod(\Yii::$app->basePath . '/../uploads/product/' . $model->id . '/profile/', 0777);
        }
        $file->saveAs(Yii::$app->basePath . '/../uploads/product/' . $model->id . '/profile/' . $model->canonical_name . '.' . $file->extension);
        return TRUE;
    }

//    public function Upload($model, $filee) {
//        $filee->saveAs(Yii::$app->basePath . '/../images/companyImages/' . $model->id . '.' . $filee->extension);
//    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $ai = '';
            $file11 = UploadedFile::getInstances($model, 'profile');
            $file12 = UploadedFile::getInstances($model, 'other_image');
//            $model->item_ean = date(Ymdhis);
            if ($model->save()) {
                if ($file11) {
                    if ($this->upload($model, $file11[0])) {
                        $model->upload($file11[0], $model);
                    }
                }
                for ($i = 0; $i < sizeof($file12); $i++) {
                    if ($model->uploadMultiple($file12[$i], $model->id, $model->canonical_name, $i)) {
// file is uploaded successfully
                    } else {
                        echo 'Image Upload Failed:';
                    }
                }
                return $this->redirect(['index']);
            } else {
                var_dump($model->getErrors());
            }
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionAjax_imgdelete() {
        $image = $_POST['image'];
//        echo yii::$app->homeUrl;exit;
        if ($image) {
            $img = explode('@', $image);
            unlink(yii::$app->basepath . '/../uploads/product/' . $img['0'] . '/' . $img['1']);
            unlink(yii::$app->basepath . '/../uploads/product/' . $img['0'] . '/gallery_thumb/' . $img['1']);
            echo json_encode(array('msg' => 'success', 'id' => $img['2']));
        } else {
            echo json_encode(array('msg' => 'error', 'title' => 'Image Not Found'));
        }
    }

    public function actionAjaxchange_product() {
//        price: price, offerprice: offerprice, stock: stock, availablity: availablity
        $price = $_POST['price'];
        $offerprice = $_POST['offerprice'];
        $stock = $_POST['stock'];
        $availablity = $_POST['availablity'];
        $id = $_POST['id'];
//        echo yii::$app->homeUrl;exit;
        if ($id) {
            $model = $this->findModel($id);
            $model->price = $price;
            $model->offer_price = $offerprice;
            $model->stock = $stock;
            $model->stock_availability = $availablity;
            if ($model->save()) {
                echo json_encode(array('msg' => 'success', 'title' => 'succesfully changed'));
            } else {
                echo json_encode(array('msg' => 'error', 'title' => 'Internal error '));
            }
        } else {
            echo json_encode(array('msg' => 'error', 'title' => 'Product cannot be find'));
        }
    }

    public function actionSubcategory() {
        $category = $_POST['category'];
        if (isset($category)) {
            $subcat = SubCategory::find()->where(['category_id' => $category])->all();

            $val = "<option value=''>Select</option>";
            if ($subcat) {
                for ($i = 0; $i < sizeof($subcat); $i++) {
                    $val .= "<option value='" . $subcat[$i]->id . "'>" . $subcat[$i]->sub_category . "</option>";
                }
                echo $val;
                exit;
            } else {
                echo $val; //No return
                exit;
            }
        } else {
            echo 1; //Value Not Setted
            exit;
        }
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
