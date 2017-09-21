<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
?>
<div class="pad-20 hide-xs"></div>

<div class="container">
    <div class="breadcrumb">
        <span class="current-page">Terms and Conditions</span>
        <ol class="path">
            <li><?= Html::a('<span>Home</span>', ['index'], ['class' => '']) ?></li>
            <li class="active">Terms and Conditions</li>
        </ol>
    </div>
</div>

<div id="about-page">
    <div class="container">
        <div class="row">
            <div class="principals-section">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?= $model->terms_conditions ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="pad-20"></div>