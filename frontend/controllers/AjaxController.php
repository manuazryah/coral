<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\db\Expression;

class AjaxController extends \yii\web\Controller {

    public function actionIndex() {
        return $this->render('index');
    }

    /*
     * This function set gender value in session variable
     * And also find characters based on gender type
     * return result to the view
     */

    public function actionGenderSession() {
        if (Yii::$app->request->isAjax) {
            $gender_type = $_POST['data_val'];
            Yii::$app->session['create-your-own'] = [
                'gender' => $gender_type,
            ];
            $characters = \common\models\Characters::find()->where(['gender' => $gender_type])->all();
            if ($characters == '') {
                echo '0';
                exit;
            } else {
                $options = '';
                foreach ($characters as $character_data) {
                    $options .= '<input class="character" type="radio" name="character" value="' . $character_data->id . '"> ' . $character_data->name . '<br>';
                }
            }
            echo $options;
        }
    }

    /*
     * This function set character value in session variable
     * And also find scent based on character
     * return result to the view
     */

    public function actionCharacterSession() {
        if (Yii::$app->request->isAjax) {
            $character = $_POST['data_val'];
            Yii::$app->session['create-your-own'] = [
                'character' => $character,
            ];
            $Scents = \common\models\Scent::find()->where(new Expression('FIND_IN_SET(:charecter_id, charecter_id)'))->addParams([':charecter_id' => $character])->andWhere(['status' => 1])->all();
            if ($Scents == '') {
                echo '0';
                exit;
            } else {
                $options = '';
                foreach ($Scents as $Scent_data) {
                    $options .= '<input class="scent" type="radio" name="scent" value="' . $Scent_data->id . '"> ' . $Scent_data->scent . '<br>';
                }
            }
            echo $options;
        }
    }

}
