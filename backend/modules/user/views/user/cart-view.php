<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <!--            <div class="panel-heading">
                            <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>


                        </div>-->
            <div class="panel-body">
                <?= Html::a('<i class="fa-th-list"></i><span> Manage User</span>', ['index'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>
                <div class="panel-body">
                    <div class="user-view">
                        <?php if (!empty($cart_details)) {
                            ?>
                            <table class="table responsive">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Product</th>
                                        <th>Qty</th>
                                        <th>Rate</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    foreach ($cart_details as $cart) {
                                        $product = common\models\Product::findOne($cart->product_id);
                                        ?>
                                        <tr>
                                            <td><img src="<?php echo yii::$app->homeUrl . '../uploads/product/' . $product->id . '/profile/' . $product->canonical_name . '_thumb.' . $product->profile; ?>"></td>
                                            <td><?= $product->product_name ?></td>
                                            <td><?= $cart->quantity ?></td>
                                            <td><?= $cart->rate ?></td>
                                        </tr>
                                    <?php }
                                    ?>
                                </tbody>
                            </table>
                        <?php }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


