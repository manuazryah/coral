<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
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
                    <div class="table-responsive" style="border: none">
                        <button class="btn btn-white" id="search-option" style="float: right;">
                            <i class="linecons-search"></i>
                            <span>Search</span>
                        </button>
                        <?=
                        GridView::widget([
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,
                            'rowOptions' => function ($model, $key, $index, $grid) {
                                return ['id' => $model['id']];
                            },
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
                                [
                                    'attribute' => 'payment_status',
                                    'value' => function ($data) {
                                        if (isset($data->payment_status)) {
                                            return $data->payment_status;
                                        } else {
                                            return '';
                                        }
                                    },
                                ],
                                [
                                    'attribute' => 'admin_status',
                                    'format' => 'raw',
                                    'filter' => ['0' => 'Not Delivered', '1' => 'Delivered'],
                                    'value' => function ($data) {
                                        return \yii\helpers\Html::dropDownList('admin_status', null, ['0' => 'Not Delivered', '1' => 'Delivered'], ['options' => [$data->admin_status => ['Selected' => 'selected']], 'class' => 'form-control admin_status_field', 'id' => 'order_admin_status-' . $data->id,]);
                                    },
                                ],
                                // 'doc',
                                // 'shipping_method',
                                [
                                    'attribute' => 'status',
                                    'filter' => ['4' => 'Success', '5' => 'Failed'],
                                    'value' => function($data) {
                                        return $data->status == 4 ? 'Success' : 'Failed';
                                    }
                                ],
                                [
                                    'class' => 'yii\grid\ActionColumn',
//                                    'contentOptions' => ['style' => 'width:100px;'],
                                    'header' => 'Actions',
                                    'template' => '{view}',
                                    'buttons' => [
                                        'view' => function ($url, $model) {
                                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                                                        'title' => Yii::t('app', 'view'),
                                                        'class' => '',
                                            ]);
                                        },
                                    ],
                                    'urlCreator' => function ($action, $model) {
                                        if ($action === 'view') {
                                            $url = Url::to(['view', 'id' => $model->order_id]);
                                            return $url;
                                        }
//                                        if ($action === 'delete') {
//                                            $url = Url::to(['del', 'id' => $model->id]);
//                                            return $url;
//                                        }
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
        $('.admin_status_field').on('change', function () {
            var change_id = $(this).attr('id').match(/\d+/);
            var admin_status = $(this).val();
            $.ajax({
                url: homeUrl + 'order/order-master/change-admin-status',
                type: "post",
                data: {status: admin_status, id: change_id},
                success: function (data) {
                    alert('Admin Status Changed Sucessfully');
                }, error: function () {
                }
            });
        });
    });
</script>

