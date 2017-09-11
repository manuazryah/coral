<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\User;
use yii\helpers\ArrayHelper;
use common\models\Product;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CustomerReviewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customer Reviews';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-reviews-index">

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>


                </div>
                <div class="panel-body">


                    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>



                    <?= Html::a('<i class="fa-th-list"></i><span> Create Customer Reviews</span>', ['create'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>
                    <button class="btn btn-white" id="search-option" style="float: right;">
                        <i class="linecons-search"></i>
                        <span>Search</span>
                    </button>
                    <div class="table-responsive" style="border: none">
                        <?=
                        GridView::widget([
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
//                                        'id',
                                [
                                    'attribute' => 'user_id',
                                    'value' => function($data) {
                                        return User::findOne($data->user_id)->first_name;
                                    },
                                    'filter' => ArrayHelper::map(User::find()->asArray()->all(), 'id', 'first_name'),
                                ],
                                [
                                    'attribute' => 'product_id',
                                    'value' => function($data) {
                                        return Product::findOne($data->product_id)->product_name;
                                    },
                                    'filter' => ArrayHelper::map(Product::find()->asArray()->all(), 'id', 'product_name'),
                                ],
                                'tittle',
                                [
                                    'attribute' => 'description',
                                    'value' => function($data) {
                                        $str = substr($data->description, 0, strpos(wordwrap($data->description, 100), "\n"));
                                        if (strlen($data->description) > 100) {
                                            $dot = ' ....';
                                        } else {
                                            $dot = '';
                                        }
                                        return $str . $dot;
                                    },
                                ],
//                                'description:ntext',
                                // 'review_date',
                                // 'status',
                                ['class' => 'yii\grid\ActionColumn'],
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
    });
</script>

