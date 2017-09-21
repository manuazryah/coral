<?php

namespace backend\modules\cms\controllers;

use Yii;
use common\models\About;
use common\models\AboutSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * AboutController implements the CRUD actions for About model.
 */
class AboutController extends Controller {

	public function beforeAction($action) {
		if (!parent::beforeAction($action)) {
			return false;
		}
		if (Yii::$app->user->isGuest) {
			$this->redirect(['/site/index']);
			return false;
		}
		return true;
	}

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
	 * Lists all About models.
	 * @return mixed
	 */
	public function actionIndex() {
		$searchModel = new AboutSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		return $this->render('index', [
			    'searchModel' => $searchModel,
			    'dataProvider' => $dataProvider,
		]);
	}

	/**
	 * Displays a single About model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id) {
		return $this->render('view', [
			    'model' => $this->findModel($id),
		]);
	}

	/**
	 * Creates a new About model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate() {
		$model = new About();

		if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model)) {
			$image = UploadedFile::getInstance($model, 'about_image');
			$chairman_image = UploadedFile::getInstance($model, 'chairman_image');
			$model->about_image = $image->extension;
			if ($model->validate() && $model->save()) {
				if (!empty($image)) {
					$path = Yii::$app->basePath . '/../uploads/cms/about/' . $model->id;
					$size = [
						['width' => 100, 'height' => 100, 'name' => 'small'],
					];
					Yii::$app->UploadFile->UploadFile($model, $image, $path, $size);
				}
				if (!empty($chairman_image)) {
					$path = Yii::$app->basePath . '/../uploads/cms/about/' . $model->id . '/chairman';
					$size = [
						['width' => 100, 'height' => 100, 'name' => 'small'],
					];
					Yii::$app->UploadFile->UploadFile($model, $chairman_image, $path, $size);
				}
				return $this->redirect(['view', 'id' => $model->id]);
			}
		} else {
			return $this->render('create', [
				    'model' => $model,
			]);
		}
	}

	/**
	 * Updates an existing About model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id) {

		$model = $this->findModel($id);
		$image_ = $model->about_image;
		$chairman_image_ = $model->chairman_image;

		if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model) && $this->SaveExtension($model, $image_, $chairman_image_)) {

			if ($model->validate() && $model->save() && $this->SaveImage($model)) {
				Yii::$app->getSession()->setFlash('success', "Updated Successfully");
			}
		}
		return $this->render('update', [
			    'model' => $model,
		]);
	}

	function SaveExtension($model, $image_ = null, $chairman_image_ = null) {
		$image = UploadedFile::getInstance($model, 'about_image');
		$chairman_image = UploadedFile::getInstance($model, 'chairman_image');

		if (!empty($image))
			$model->about_image = $image->extension;
		else
			$model->about_image = $image_;
		if (!empty($chairman_image))
			$model->chairman_image = $chairman_image->extension;
		else
			$model->chairman_image = $chairman_image_;
		return $model;
	}

	function SaveImage($model) {
		$image = UploadedFile::getInstance($model, 'about_image');
		$chairman_image = UploadedFile::getInstance($model, 'chairman_image');
		if (!empty($image)) {
			$path = Yii::$app->basePath . '/../uploads/cms/about/' . $model->id;
			$size = [
				['width' => 100, 'height' => 100, 'name' => 'small'],
			];
			Yii::$app->UploadFile->UploadFile($model, $image, $path, $size);
		}
		if (!empty($chairman_image)) {
			$path = Yii::$app->basePath . '/../uploads/cms/about/' . $model->id . '/chairman';
			$size = [
				['width' => 100, 'height' => 100, 'name' => 'small'],
			];
			Yii::$app->UploadFile->UploadFile($model, $chairman_image, $path, $size);
		}
		return TRUE;
	}

	/**
	 * Deletes an existing About model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionDelete($id) {
		$this->findModel($id)->delete();

		return $this->redirect(['index']);
	}

	/**
	 * Finds the About model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return About the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id) {
		if (($model = About::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}

}
