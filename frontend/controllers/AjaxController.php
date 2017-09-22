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

    /*
     * This function set character value in session variable
     * And also find scent based on character
     * return result to the view
     */

    public function actionScentSession() {
        if (Yii::$app->request->isAjax) {
            $scent_id = $_POST['data_val'];
            Yii::$app->session['create-your-own'] = [
                'scent' => $scent_id,
            ];
            $Notes = \common\models\Notes::find()->where(new Expression('FIND_IN_SET(:scent_id, scent_id)'))->addParams([':scent_id' => $scent_id])->andWhere(['status' => 1])->all();
            if ($Notes == '') {
                echo '0';
                exit;
            } else {
                $options = '<input type="hidden" name="note-count" id="note-count" value="0"/>';
                foreach ($Notes as $Note_data) {
                    $options .= '<input class="checkbox" type="checkbox" name="1" value="' . $Note_data->id . '">' . $Note_data->notes . '<br/>';
                }
            }
            echo $options;
        }
    }

    /*
     * This function select Country code based on the country id
     * return result to the view
     */

    public function actionCountrycode() {

        if (Yii::$app->request->isAjax) {
            $country_id = $_POST['country_id'];
            if ($country_id == '') {
                echo '0';
                exit;
            } else {
                $country_code = \common\models\CountryCode::find()->where(['id' => $country_id])->one();
                if (empty($country_code)) {
                    echo '0';
                    exit;
                } else {

                    echo $country_code->id;
                    exit;
                }
            }
        }
    }

    /*
     * This function select chek email id	 * return result to the view
     */

    public function actionEmailUnique() {

        if (Yii::$app->request->isAjax) {
            $email = $_POST['email'];
            if ($email == '') {
                echo '0';
                exit;
            } else {
                $data = \common\models\User::find()->where(['email' => $email])->one();
                if (!empty($data)) {
                    echo 0;
                    exit;
                } else {
                    echo 1;
                    exit;
                }
            }
        }
    }

    /*
     * This function select chek email id	 * return result to the view
     */

    public function actionUserUnique() {

        if (Yii::$app->request->isAjax) {
            $username = $_POST['username'];
            if ($email == '') {
                echo '0';
                exit;
            } else {
                $data = \common\models\User::find()->where(['username' => $username])->one();
                if (!empty($data)) {
                    echo 0;
                    exit;
                } else {
                    echo 1;
                    exit;
                }
            }
        }
    }

}
