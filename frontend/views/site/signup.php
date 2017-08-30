<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\ckeditor\CKEditor;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

            <?= $form->field($model, 'first_name')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'last_name')->textInput() ?>

            <div class="form-group field-signupform-day">
                <label class="control-label" for="signupform-day">Date Of Birth</label>
                <div class="row">
                    <div class="col-md-4">
                        <select id="signupform-day" class="form-control" name="SignupForm[day]">
                            <option value="">Day</option>
                            <?php foreach (Yii::$app->SetValues->Dates() as $value) { ?>
                                <option value="<?= $value ?>"><?= $value ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select id="signupform-month" class="form-control" name="SignupForm[month]">
                            <option value="">Month</option>
                            <?php foreach (Yii::$app->SetValues->Months() as $key => $value) { ?>
                                <option value="<?= $key ?>"><?= $value ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select id="signupform-year" class="form-control" name="SignupForm[year]">
                            <option value="">Year</option>
                            <?php foreach (Yii::$app->SetValues->Years() as $value) { ?>
                                <option value="<?= $value ?>"><?= $value ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <?= $form->field($model, 'gender')->radioList(array('1' => 'Male', 2 => 'Female')); ?>

            <?= $form->field($model, 'mobile_no')->textInput() ?>

            <?= $form->field($model, 'email')->textInput() ?>

            <?= $form->field($model, 'country')->dropDownList(['1' => 'UAE']); ?>


            <?= $form->field($model, 'username')->textInput() ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'password_repeat')->passwordInput()->label('Confirm Password') ?>

            <div class="form-group">
                <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
