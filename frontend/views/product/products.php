<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
//use yii\grid\GridView;
use yii\widgets\ListView;
use yii\helpers\ArrayHelper;
use common\models\Category;
use common\models\SubCategory;
use yii\helpers\Url;

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
        .summary{
                display: none;
        }
</style>
<div class="pad-20 hide-xs"></div>

<div class="container">
        <div class="breadcrumb">
                <span class="current-page">PRODUCTS</span>
                <ol class="path">
                        <li><?= Html::a('<span>Home</span>', ['index'], ['class' => '']) ?></li>
                        <li><?= Html::a('<span>our products</span>', ['/product/index', 'id' => 'products'], ['class' => '']) ?></li>
                        <li class="active">PRODUCTS</li>
                </ol>
        </div>
</div>

<div id="our-product">
        <div class="container">
                <div class="input-group gender-selection">
                        <div id="radioBtn" class="btn-group">
                                <span>Type:</span>
                                <a class="btn btn-primary btn-sm active gender-select" data-toggle="happy" data-title="Y" id="0" pro_cat="<?= $id ?>">Women</a>
                                <a class="btn btn-primary btn-sm notActive gender-select" data-toggle="happy" data-title="N" id="1" pro_cat="<?= $id ?>">Men</a>
                        </div>
                </div>
        </div>
        <div class="container">
                <div class="col-lg-3 col-md-3 col-sm-12 left-accordation">
                        <div class="panel panel-default">
                                <div class="panel-body lit-blue">
                                        <div class="slide-container">
                                                <div class="list-group" id="mg-multisidetabs">
                                                        <a href="#" class="list-group-item active-head "><span>Other Products</span><span class="glyphicon glyphicon-menu-down mg-icon pull-right"></span></a>
                                                        <div class="panel list-sub" style="display: block">
                                                                <div class="panel-body">
                                                                        <div class="list-group">
                                                                                <?php
                                                                                foreach ($categories as $category) {
                                                                                        if ($category->id == $catag->id) {
                                                                                                $active_class = 'list-group-item active';
                                                                                        } else {
                                                                                                $active_class = 'list-group-item';
                                                                                        }
                                                                                        ?>
                                                                                        <?= Html::a('<span>' . $category->category . '</span><span class="fa fa-caret-right pull-left">', ['product/index', 'id' => $category->category_code], ['class' => $active_class]) ?>
                                                                                                                                                <!--<a href="#" class="list-group-item active"><span>Our featured products</span><span class="fa fa-caret-right pull-left"></span></a>-->
                                                                                <?php }
                                                                                ?>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div><!-- ./ end list-group -->
                                        </div><!-- ./ end slide-container -->
                                </div><!-- ./ end panel-body -->
                        </div><!-- ./ end panel panel-default-->
                </div><!-- ./ endcol-lg-6 col-lg-offset-3 -->

                <div class="col-md-9 product-list">
                        <div class="international-brands">

                                <?=
                                ListView::widget([
                                    'dataProvider' => $dataProvider,
                                    'itemView' => '_view2',
                                ]);
                                ?>

                        </div>
                </div>

        </div>
</div>

<div class="pad-20"></div>
