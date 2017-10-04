<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\About */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="about-form form-pos">

	<?php $form = ActiveForm::begin(); ?>
	<div class="row">
		<div class='col-md-4 col-sm-6 col-xs-12 left_padd'>    <?= $form->field($model, 'index_title')->textInput(['maxlength' => true]) ?>

		</div>

		<div class='col-md-4 col-sm-6 col-xs-12 left_padd'>    <?= $form->field($model, 'about_title')->textInput(['maxlength' => true]) ?>

		</div>
		<div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
			<?=
			$form->field($model, 'index_content')->widget(CKEditor::className(), [
			    'options' => ['rows' => 6],
			    'preset' => 'custom'
			])
			?>
		</div>
		<div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
			<?=
			$form->field($model, 'about_content')->widget(CKEditor::className(), [
			    'options' => ['rows' => 6],
			    'preset' => 'custom'
			])
			?>
		</div>



		<div class='col-md-6 col-sm-6 col-xs-12 left_padd'>    <?= $form->field($model, 'chairman_name')->textInput(['maxlength' => true]) ?>

		</div>
		<div class='col-md-6 col-sm-6 col-xs-12 left_padd'>    <?= $form->field($model, 'chairman_position')->textInput(['maxlength' => true]) ?>

		</div>

		<div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
			<?=
			$form->field($model, 'chairman_message')->widget(CKEditor::className(), [
			    'options' => ['rows' => 6],
			    'preset' => 'custom'
			])
			?>
		</div>
		<div class='col-md-3 col-sm-6 col-xs-12 left_padd'>
			<?= $form->field($model, 'about_image')->fileInput()->label('About Image<i> (155x220)</i>') ?>
			<?php
			if (!$model->isNewRecord) {
				?>

				<div class = "col-md-2 img-box">
					<img src="<?= Yii::$app->homeUrl . '../uploads/cms/about/' . $model->id . '/' . 'small.' . $model->about_image ?>" >

				</div>
			<?php } ?>

		</div>
		<div class='col-md-3 col-sm-6 col-xs-12 left_padd'>
			<?= $form->field($model, 'chairman_image')->fileInput()->label('Chairman Image<i> (100x100)</i>') ?>

			<?php
			if (!$model->isNewRecord) {
				?>

				<div class = "col-md-2 img-box">
					<img src="<?= Yii::$app->homeUrl . '../uploads/cms/about/' . $model->id . '/chairman/' . 'small.' . $model->chairman_image ?>" >
				</div>
			<?php } ?>
		</div>
	</div>
	<div class="row">
		<div class='col-md-12 col-sm-12 col-xs-12' >
			<div class="form-group" >
				<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-success', 'style' => 'margin-top: 18px; height: 36px; width:100px;float:right']) ?>
			</div>
		</div>
	</div>

	<?php ActiveForm::end(); ?>

</div>

