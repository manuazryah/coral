<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\AdminPosts;
use yii\helpers\ArrayHelper;
use common\models\BusinessPartner;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AdminUsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<style>
    .table>thead:first-child>tr:first-child>th {
        width: 0px;
        white-space: nowrap;
    }
    .purchase-clickable-row:hover{
        cursor: pointer;
    }
    .sales-clickable-row:hover{
        cursor: pointer;
    }
    .row-style{
        margin-left: 0px;
        margin-right: 0px;
    }
</style>
<div class="row">

    <div class="col-sm-9">

        <div class="col-sm-4">

            <div class="xe-widget xe-counter-block">
                <div class="xe-upper">

                    <div class="xe-icon">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                    <div class="xe-label">
                        <strong class="num"><?= sprintf('%0.2f', $sale_amounts['sale_order_amount']) ?></strong>
                        <span>Total Sales Amount</span>
                    </div>

                </div>
                <div class="xe-lower">
                    <div class="border"></div>
                    <strong><?= date("d-M-Y", strtotime($sale_date)) ?></strong>
                </div>
            </div>

        </div>

        <div class="col-sm-4">

            <div class="xe-widget xe-counter-block xe-counter-block-purple">
                <div class="xe-upper">

                    <div class="xe-icon">
                        <i class="fa fa-briefcase"></i>
                    </div>
                    <div class="xe-label">
                        <strong class="num"><?= sprintf('%0.2f', $purchase_amounts['purchase_order_amount']) ?></strong>
                        <span>Total Purchase Amount</span>
                    </div>

                </div>
                <div class="xe-lower">
                    <div class="border"></div>
                    <strong><?= date("d-M-Y", strtotime($purchase_date)) ?></strong>
                </div>
            </div>

        </div>

        <div class="col-sm-4">

            <div class="xe-widget xe-counter-block xe-counter-block-blue">
                <div class="xe-upper">

                    <div class="xe-icon">
                        <i class="fa fa-credit-card"></i>
                    </div>
                    <div class="xe-label">
                        <strong class="num"></strong>
                        <span>Total Expense</span>
                    </div>

                </div>
                <div class="xe-lower">
                    <div class="border"></div>

                    <strong><?= date('d-M-Y') ?></strong>
                </div>
            </div>

        </div>

        <div class="col-sm-4" style="float: right;">

            <div class="xe-widget xe-counter-block xe-counter-block-orange">
                <div class="xe-upper">

                    <div class="xe-icon">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                    <div class="xe-label">
                        <strong class="num"><?= sprintf('%0.2f', $sale_amounts['sale_due_amount']) ?></strong>
                        <span>Total Sales Debt</span>
                    </div>

                </div>
                <div class="xe-lower">
                    <div class="border"></div>
                    <strong><?= date("d-M-Y", strtotime($sale_date)) ?></strong>
                </div>
            </div>

        </div>

        <div class="col-sm-4">

            <div class="xe-widget xe-counter-block xe-counter-block-red">
                <div class="xe-upper">

                    <div class="xe-icon">
                        <i class="fa fa-money"></i>
                    </div>
                    <div class="xe-label">
                        <strong class="num"><?= sprintf('%0.2f', $sale_amounts['sale_order_amount'] - $sale_amounts['sale_due_amount']) ?></strong>
                        <span>Total Sales Amount Received</span>
                    </div>

                </div>
                <div class="xe-lower">
                    <div class="border"></div>
                    <strong><?= date("d-M-Y", strtotime($sale_date)) ?></strong>
                </div>
            </div>

        </div>

        <div class="col-sm-4">

            <div class="xe-widget xe-counter-block xe-counter-block-yellow">
                <div class="xe-upper">

                    <div class="xe-icon">
                        <i class="fa fa-money"></i>
                    </div>
                    <div class="xe-label">
                        <strong class="num"><?= sprintf('%0.2f', $purchase_amounts['purchase_order_amount'] - $purchase_amounts['purchase_due_amount']) ?></strong>
                        <span>Total Purchase Amount Paid</span>
                    </div>

                </div>
                <div class="xe-lower">
                    <div class="border"></div>
                    <strong><?= date("d-M-Y", strtotime($purchase_date)) ?></strong>
                </div>
            </div>

        </div>
    </div>
    <div class="col-sm-3">
        <div class="col-sm-12">

            <div class="xe-widget xe-vertical-counter xe-vertical-counter-danger" style="height: 267px;">
                <div class="xe-icon">
                    <i class="fa fa-briefcase"></i>
                </div>

                <div class="xe-label">
                    <strong class="num"><?= sprintf('%0.2f', $purchase_amounts['purchase_due_amount']) ?></strong>
                    <span>Purchase Debt</span>
                </div>
            </div>

        </div>
    </div>

</div>

<script>
    jQuery(document).ready(function ($) {
        $(".purchase-clickable-row").click(function () {
            var current_row_id = $(this).attr('id').match(/\d+/);
            window.location = '<?= Yii::$app->homeUrl; ?>sales/purchase-invoice-details/view?id=' + current_row_id;
        });

        $(".sales-clickable-row").click(function () {
            var current_row_id = $(this).attr('id').match(/\d+/);
            window.location = '<?= Yii::$app->homeUrl; ?>sales/sales-invoice-details/view?id=' + current_row_id;
        });
    });
</script>

