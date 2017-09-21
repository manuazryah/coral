<?php

namespace backend\modules\cms\controllers;

use Yii;
use common\models\PrivateLabelLogos;
use common\models\PrivateLabelLogosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

/**
 * PrivateLabelLogosController implements the CRUD actions for PrivateLabelLogos model.
 */
class PrivateLabelLogosController extends Controller {

	/**
	 * @inheritdoc
	 */
	public function behaviors() {
		return [
		    'verbs' => [
			'class' => VerbFilter::className(),
			'actions' => [
			    'delete' => ['POST'],
			],
		    ],
		];
	}

	/**
	 * Lists all PrivateLabelLogos models.
	 * @return mixed
	 */
	public function actionIndex($id = null) {

		if (!empty($id)) {
			$model = $this->findModel($id);
			$message = 'Data Updated Successfully';
			$image_ = $model->image;
		} else {
			$model = new PrivateLabelLogos();
			$model->setScenario('create');
			$message = 'Data Added Successfully';
			$image_ = '';
		}

		if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model) && $this->SaveExtension($model, $image_)) {

			if ($model->validate() && $model->save() && $this->SaveImage($model)) {
				$model = new PrivateLabelLogos();
				Yii::$app->getSession()->setFlash('success', "Updated Successfully");
			}
		}
		$searchModel = new PrivateLabelLogosSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		return $this->render('index', [
			    'searchModel' => $searchModel,
			    'dataProvider' => $dataProvider,
			    'model' => $model,
		]);
	}

	function SaveExtension($model, $image_ = null) {
		$image = UploadedFile::getInstance($model, 'image');
		if (!empty($image))
			$model->image = $image->extension;
		else
			$model->image = $image_;
		return $model;
	}

	function SaveImage($model) {
		$image = UploadedFile::getInstance($model, 'image');

		if (!empty($image)) {
			$path = Yii::$app->basePath . '/../uploads/cms/logos/' . $model->id;
			$size = [
				['width' => 100, 'height' => 100, 'name' => 'small'],
			];
			Yii::$app->UploadFile->UploadFile($model, $image, $path, $size);
		}

		return TRUE;
	}

	/**
	 * Deletes an existing PrivateLabelLogos model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionDelete($id) {
		$this->findModel($id)->delete();

		return $this->redirect(['index']);
	}

	/**
	 * Finds the PrivateLabelLogos model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return PrivateLabelLogos the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id) {
		if (($model = PrivateLabelLogos::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}

}
