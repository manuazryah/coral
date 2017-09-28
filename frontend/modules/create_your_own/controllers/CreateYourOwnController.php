<?php

namespace frontend\modules\create_your_own\controllers;

use Yii;
use common\models\Gender;
use common\models\Bottle;

class CreateYourOwnController extends \yii\web\Controller {

    public function actionIndex() {
        unset(Yii::$app->session['create-your-own']);
        $gender = Gender::find()->where(['status' => 1])->orderBy(['id' => SORT_DESC])->all();
        $bottle = Bottle::find()->where(['status' => 1])->orderBy(['id' => SORT_DESC])->all();
        return $this->render('index', [
                    'gender' => $gender,
                    'bottle' => $bottle,
        ]);
    }

}
