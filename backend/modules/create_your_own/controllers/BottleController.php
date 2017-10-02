<?php

namespace backend\modules\create_your_own\controllers;

use Yii;
use common\models\Bottle;
use common\models\BottleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * BottleController implements the CRUD actions for Bottle model.
 */
class BottleController extends Controller {

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
     * Lists all Bottle models.
     * @return mixed
     */
    public function actionIndex($id = NULL) {
        if (!empty($id)) {
            $model = $this->findModel($id);
        } else {
            $model = new Bottle();
            $model->setScenario('create');
        }
//        if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model) && $this->SetExtension($model) && $model->validate() && $model->save() && $this->UploadSingle($model) && $this->UploadMultiple($model)) {
        if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model) && $this->SetExtension($model) && $model->validate() && $model->save() && $this->UploadSingle($model)) {
            if (!empty($id)) {
                Yii::$app->getSession()->setFlash('success', 'Updated Successfully');
            } else {
                Yii::$app->getSession()->setFlash('success', "Create Successfully");
            }
            return $this->redirect(['index']);
        }
        $searchModel = new BottleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = 5;

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'model' => $model,
        ]);
    }

    /*
     * This function get model and set image extensions
     * return model
     */

    public function SetExtension($model) {
        $model->bottle_img = UploadedFile::getInstance($model, 'bottle_img');
        if (isset($model->bottle_img)) {
            $model->bottle_img = $model->bottle_img->extension;
        } else {
            $update = Bottle::findOne($model->id);
            $model->bottle_img = $update->bottle_img;
        }
        return TRUE;
    }

    /**
     * Upload gender image based on id.
     * @return mixed
     */
    public function UploadSingle($model) {
        $image = UploadedFile::getInstance($model, 'bottle_img');
        $path = Yii::$app->basePath . '/../uploads/create_your_own/bottle';
        $size = [
            ['width' => 100, 'height' => 100, 'name' => 'small'],
        ];

        if (!empty($image)) {
            Yii::$app->UploadFile->UploadFile($model, $image, $path . '/' . $model->id, $size);
        }
        return TRUE;
    }

    /**
     * Upload gender image based on id.
     * @return mixed
     */
    public function UploadMultiple($model) {
        $model->desigin_img = UploadedFile::getInstances($model, 'desigin_img');
        if (isset($model->desigin_img)) {
            $filename = Yii::$app->basePath . '/../uploads/create_your_own/bottle/' . $model->id . '/';
            $filename1 = Yii::$app->basePath . '/../uploads/create_your_own/bottle/' . $model->id . '/design/';
            if (!file_exists($filename)) {
                mkdir(Yii::$app->basePath . '/../uploads/create_your_own/bottle/' . $model->id, 0777);
                if (!file_exists($filename1)) {
                    mkdir(Yii::$app->basePath . '/../uploads/create_your_own/bottle/' . $model->id . '/design', 0777);
                }
            } else {
                if (!file_exists($filename1)) {
                    mkdir(Yii::$app->basePath . '/../uploads/create_your_own/bottle/' . $model->id . '/design', 0777);
                }
            }
            foreach ($model->desigin_img as $file) {
                $file->saveAs($filename1 . $file->baseName . '.' . $file->extension);
            }
        }
        return true;
    }

    /**
     * Displays a single Bottle model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Bottle model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Bottle();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Bottle model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Bottle model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Bottle model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Bottle the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Bottle::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
