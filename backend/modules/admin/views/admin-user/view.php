<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\AdminPost;

/* @var $this yii\web\View */
/* @var $model common\models\AdminUser */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Admin Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>


            </div>
            <div class="panel-body">
                <?= Html::a('<i class="fa-th-list"></i><span> Manage Admin User</span>', ['index'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>
                <div class="panel-body"><div class="admin-user-view">
                        <p>
                            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                            <?=
                            Html::a('Delete', ['delete', 'id' => $model->id], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ])
                            ?>
                        </p>

                        <?=
                        DetailView::widget([
                            'model' => $model,
                            'attributes' => [
//                                                            'id',
                                [
                                    'attribute' => 'post_id',
//                                    'filter' => ArrayHelper::map(AdminPost::find()->all(), 'id', 'post_name'),
                                    'value' => function($data) {
                                        return AdminPost::findOne($data->id)->post_name;
                                    }
                                ],
                                'user_name',
                                'password_hash',
                                'name',
                                'email:email',
                                'phone',
                                'CB',
                                'UB',
                                'DOC',
                                'DOU',
                                [
                                    'attribute' => 'status',
                                    'filter' => ['1' => 'Enable', '0' => 'Disable'],
                                    'value' => function($data) {
                                        return $data->status == 1 ? 'Enable' : 'Disable';
                                    }
                                ],
                            ],
                        ])
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


