<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin(['id' => 'submit-reviews']);
?>
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Add Reviews</h4>
    </div>

    <div class="modal-body">
        <?= $form->field($model_review, 'product_id')->hiddenInput(['maxlength' => true, 'value' => $product_id])->label(FALSE) ?>

        <div class="row">
            <div class="col-md-12">
                <?= $form->field($model_review, 'tittle')->textInput(['maxlength' => true]) ?>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <?= $form->field($model_review, 'description')->textarea(['rows' => 4]) ?>
            </div>

        </div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>