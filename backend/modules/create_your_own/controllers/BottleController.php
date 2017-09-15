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
        if ($model->load(Yii::$app->request->post())) {
            $filee = UploadedFile::getInstances($model, 'desigin_img');
//        if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model) && $this->SetExtension($model) && $model->validate() && $model->save() && $this->UploadSingle($model) && $this->UploadMultiple($model)) {
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
        $model->bottle_img = UploadedFile::getInstance($model, 'bottle_img');
        if (isset($model->bottle_img)) {
            $filename = Yii::$app->basePath . '/../uploads/create_your_own/bottle/' . $model->id . '/';
            if (!file_exists($filename)) {
                mkdir(Yii::$app->basePath . '/../uploads/create_your_own/bottle/' . $model->id, 0777);
            }
            if ($model->bottle_img->saveAs(Yii::$app->basePath . '/../uploads/create_your_own/bottle/' . $model->id . '/main.' . $model->bottle_img->extension)) {
                if ($model->isNewRecord) {
                    $update = Scent::findOne($model->id);
                    $update->bottle_img = $model->bottle_img->extension;
                    $update->update();
                } else {
                    $model->bottle_img = $model->bottle_img->extension;
                    $model->save();
                }
                return true;
            } else {
                return false;
            }
        } else {
            if (!$model->isNewRecord) {
                $update = Bottle::findOne($model->id);
                $model->bottle_img = $update->bottle_img;
                $model->save();
            }
            return true;
        }
    }

    /**
     * Upload gender image based on id.
     * @return mixed
     */
    public function UploadMultiple($model) {
        $model->desigin_img = UploadedFile::getInstance($model, 'desigin_img');
        var_dump($model->desigin_img);
        exit;
        if (isset($model->bottle_img)) {
            if ($model->bottle_img->saveAs(Yii::$app->basePath . '/../uploads/create_your_own/scent/' . $model->id . '.' . $model->img->extension)) {
                if ($model->isNewRecord) {
                    $update = Scent::findOne($model->id);
                    $update->bottle_img = $model->bottle_img->extension;
                    $update->update();
                } else {
                    $model->bottle_img = $model->bottle_img->extension;
                    $model->save();
                }
                return true;
            } else {
                return false;
            }
        } else {
            if (!$model->isNewRecord) {
                $update = Scent::findOne($model->id);
                $model->bottle_img = $update->bottle_img;
                $model->save();
            }
            return true;
        }
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
