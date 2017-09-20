<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use common\models\User;

/* @var $this yii\web\View */
/* @var $searchModel common\models\OrderMasterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Order Masters';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-master-index">

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>


                </div>
                <div class="panel-body">


                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



                    <?php // ech  Html::a('<i class="fa-th-list"></i><span> Create Order Master</span>', ['create'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>
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
                                'order_id',
                                [
                                    'attribute' => 'user_id',
//                                    'filter' => ArrayHelper::map(User::find()->all(), 'id', 'first_name'),
                                    'value' => function($data) {
                                        $name = User::findOne($data->user_id);
                                        return $name->first_name . ' ' . $name->last_name;
                                    }
                                ],
                                'total_amount',
                                'order_date',
                                // 'ship_address_id',
                                // 'bill_address_id',
                                // 'currency_id',
                                // 'user_comment:ntext',
                                // 'payment_mode',
                                // 'admin_comment',
                                // 'payment_status',
                                // 'admin_status',
                                // 'doc',
                                // 'shipping_method',
                                'status',
//                                ['class' => 'yii\grid\ActionColumn'],
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

