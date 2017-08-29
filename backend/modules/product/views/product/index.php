<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use common\models\Category;
use common\models\SubCategory;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>


                </div>
                <div class="panel-body">


                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



                    <?= Html::a('<i class="fa-th-list"></i><span> Create Product</span>', ['create'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>
                    <button class="btn btn-white" id="search-option" style="float: right;">
                        <i class="linecons-search"></i>
                        <span>Search</span>
                    </button>
                    <div class="table-responsive" style="border: none">
                        <?=
                        GridView::widget([
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,
                            'rowOptions' => function ($model, $key, $index, $grid) {
                                return ['id' => $model['id']];
                            },
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
//                                        'id',
//                                'category',
                                [
                                    'attribute' => 'category',
                                    'filter' => ArrayHelper::map(Category::find()->all(), 'id', 'category'),
                                    'value' => function($data) {
                                        return Category::findOne($data->category)->category;
                                    }
                                ],
                                [
                                    'attribute' => 'subcategory',
                                    'filter' => ArrayHelper::map(SubCategory::find()->all(), 'id', 'sub_category'),
                                    'value' => function($data) {
                                        return SubCategory::findOne($data->subcategory)->sub_category;
                                    }
                                ],
//            'subcategory',
                                'product_name',
//                                'canonical_name',
                                // 'item_ean',
                                // 'brand',
                                // 'gender_type',
                                // 'price',
                                [
                                    'attribute' => 'price',
                                    'format' => 'raw',
                                    'value' => function ($data) {
                                        return \yii\helpers\Html::textInput('price', $data->price, ['class' => 'form-control product_form', 'id' => 'product_price_' . $data->id]);
                                    },
                                ],
                                [
                                    'attribute' => 'offer_price',
                                    'format' => 'raw',
                                    'value' => function ($data) {
                                        return \yii\helpers\Html::textInput('offer_price', $data->offer_price, ['class' => 'form-control product_form', 'id' => 'product_offerprice_' . $data->id]);
                                    },
                                ],
                                // 'offer_price',
                                // 'currency',
                                [
                                    'attribute' => 'stock',
                                    'format' => 'raw',
                                    'value' => function ($data) {
                                        return \yii\helpers\Html::textInput('stock', $data->stock, ['class' => 'form-control product_form', 'id' => 'product_stock_' . $data->id]);
                                    },
                                ],
                                // 'stock_unit',
                                [
                                    'attribute' => 'stock_availability',
                                    'format' => 'raw',
                                    'filter' => ['1' => 'Available', '0' => 'Not Available'],
                                    'value' => function ($data) {
                                        return \yii\helpers\Html::dropDownList('stock_availability', null, ['1' => 'Available', '0' => 'Not Available'], ['class' => 'form-control product_form', 'id' => 'product_stockavailable_' . $data->id]);
                                    },
                                ],
                                // 'tax',
                                // 'free_shipping',
                                // 'product_type',
                                // 'size',
                                // 'size_unit',                                // 'main_description:ntext',
                                // 'product_detail:ntext',
                                // 'condition',
                                // 'CB',
                                // 'UB',
                                // 'DOC',
                                // 'DOU',
                                // 'status',
//                                ['class' => 'yii\grid\ActionColumn',
//                                    'header' => 'Action',
//                                    'template' => '{update}{delete}'],
                                             [
          'class' => 'yii\grid\ActionColumn',
          'header' => 'Action',
//          'headerOptions' => ['style' => 'color:#337ab7'],
          'template' => '{update}{delete}{copy}',
          'buttons' => [
            'copy' => function ($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-plus"></span>', $url, [
                            'title' => Yii::t('app', 'lead-view'),
                ]);
            },
//
          ],
          'urlCreator' => function ($action, $model, $key, $index) {
            if ($action === 'copy') {
                $url ='product/copy?id='.$model->id;
                return $url;
            }
//
            if ($action === 'update') {
                $url ='update?id='.$model->id;
                return $url;
            }
            if ($action === 'delete') {
                $url ='delete?id='.$model->id;
                return $url;
            }
//
          }
          
          ],
                            ],
                        ]);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $(".filters").slideToggle();
        $("#search-option").click(function () {
            $(".filters").slideToggle();
        });
        $('.product_form').on('change', function () {
            var change = $(this).attr('id');
            var res = change.split("_");
            var price = $('#product_price_' + res['2']).val();
            var offerprice = $('#product_offerprice_' + res['2']).val();
            var stock = $('#product_stock_' + res['2']).val();
            var availablity = $('#product_stockavailable_' + res['2']).val();
            var id = res['2'];
            $.ajax({
                url: homeUrl + 'product/product/ajaxchange_product',
                type: "post",
                data: {price: price, offerprice: offerprice, stock: stock, availablity: availablity,id:id},
            success: function (data) {
                var $data = JSON.parse(data);
                if ($data.msg === "success") {
                    alert($data.title);
//                    $('#' + form).append($('<option value="' + $data.id + '" >' + $data.tag + '</option>'));
//                    $('#modal-4').modal('toggle');
                } else {
                    alert($data.title);
                }
//
            }, error: function () {
//
            }
            });
        });
    });
</script>

