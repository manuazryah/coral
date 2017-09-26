<?php

namespace frontend\modules\create_your_own\controllers;

use Yii;
use common\models\Gender;

class CreateYourOwnController extends \yii\web\Controller {

    public function actionIndex() {
        $gender = Gender::find()->where(['status' => 1])->orderBy(['id' => SORT_DESC])->all();
        return $this->render('index', [
                    'gender' => $gender,
        ]);
    }

}
