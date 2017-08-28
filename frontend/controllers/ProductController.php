<?php

//use Yii;

namespace frontend\controllers;

use yii;
use common\models\Product;
use common\models\ProductSearch;
use common\models\Category;

class ProductController extends \yii\web\Controller {

    public function actionIndex() {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $category = Category::find()->select('id,category')->where(['status' => 1])->all();
//$products = Product::find()->select('id,product_name,product_type,price,offer_price')->where(['status'=>1])->all();
//        $searchModel = new SearchMembers();
//    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'category' => $category,
        ]);
//        return $this->render('index');
    }
    public function actionCategory($id){
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where('category ='.$id);
        $category = Category::find()->select('id,category')->where(['status' => 1])->all();
         return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'category' => $category,
        ]);
    }
    public function actionProduct_detail($product){
        $product_details = Product::find()->where(['canonical_name'=>$product,'status'=>'1'])->one();
        return $this->render('product_detail', [
                    'product_details' => $product_details,
        ]);
    }

}
