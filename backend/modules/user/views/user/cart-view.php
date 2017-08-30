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
                        <?php if (!empty($cart_details)) { ?>

                        <?php }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


