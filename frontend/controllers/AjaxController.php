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
                    $options .= '<label class = "image-toggler choose2 character-main" data-image-id = "#image1" id = " " data-val="' . Yii::$app->homeUrl . 'uploads/create_your_own/characters/' . $character_data->id . '.' . $character_data->img . '"><input class="character" type="radio" name="character" value="' . $character_data->id . '" data-val="' . Yii::$app->homeUrl . 'uploads/create_your_own/characters/' . $character_data->id . '.' . $character_data->img . '"><span class="span2">' . $character_data->name . '</span></label>';
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
            $character_data = \common\models\Characters::find()->where(['id' => $character])->one();
            $sess = Yii::$app->session['create-your-own'];
            Yii::$app->session['create-your-own'] = array_merge($sess, ['character' => $character, 'character-price' => $character_data->price]);
            $Scents = \common\models\Scent::find()->where(new Expression('FIND_IN_SET(:charecter_id, charecter_id)'))->addParams([':charecter_id' => $character])->andWhere(['status' => 1])->all();
            if ($Scents == '') {
                echo '0';
                exit;
            } else {
                $options = '';
                foreach ($Scents as $Scent_data) {
                    $options .= '<label class = "image-toggler choose2 scent-main" data-image-id = "#image1" " data-val="' . Yii::$app->homeUrl . 'uploads/create_your_own/scent/' . $Scent_data->id . '.' . $Scent_data->img . '"><input class="scent" type="radio" name="scent" value="' . $Scent_data->id . '" data-val="' . Yii::$app->homeUrl . 'uploads/create_your_own/characters/' . $Scent_data->id . '.' . $Scent_data->img . '"><span class="span2">' . $Scent_data->scent . '</span></label>';
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
            $scent_data = \common\models\Scent::find()->where(['id' => $scent_id])->one();
            $sess = Yii::$app->session['create-your-own'];
            Yii::$app->session['create-your-own'] = array_merge($sess, ['scent' => $scent_id, 'scent-price' => $scent_data->price]);
            $Notes = \common\models\Notes::find()->where(new Expression('FIND_IN_SET(:scent_id, scent_id)'))->addParams([':scent_id' => $scent_id])->andWhere(['status' => 1])->all();
            $all_notes = \common\models\Notes::find()->where(['status' => 1])->all();
            if (!empty($Notes)) {
                $options = '<input type="hidden" name="note-count" id="note-count" value="0"/>';
                $i = 1;
                foreach ($Notes as $Note_data) {
                    $options .= '<span class="button-checkbox notes-main" data-val="' . Yii::$app->homeUrl . 'uploads/create_your_own/notes/' . $Note_data->id . '/large.' . $Note_data->main_img . '" id="note-' . $Note_data->id . '" data-val1="' . Yii::$app->homeUrl . 'uploads/create_your_own/notes/' . $Note_data->id . '/small.' . $Note_data->main_img . '"><button id="" type="button" class="btn image-toggler choose2 tab btn-default" data-image-id="#image1"><span class="span2" id="' . $i . '">' . $Note_data->notes . '</span></button><input type="checkbox" class="note-select" name="notes[]" name2="service_frequency" value="' . $Note_data->id . '" id="" data-val="' . Yii::$app->homeUrl . 'uploads/create_your_own/notes/' . $Note_data->id . '/large.' . $Note_data->main_img . '"></span>';
                    $i++;
                }
            }
            if (!empty($all_notes)) {
                foreach ($all_notes as $all_data) {
                    $options1 .= '<span class="button-checkbox notes-main" data-val="' . Yii::$app->homeUrl . 'uploads/create_your_own/notes/' . $all_data->id . '/large.' . $all_data->main_img . '" id="note-' . $all_data->id . '" data-val1="' . Yii::$app->homeUrl . 'uploads/create_your_own/notes/' . $Note_data->id . '/small.' . $Note_data->main_img . '"><button id="" type="button" class="btn image-toggler choose2 tab btn-default" data-image-id="#image1"><span class="span2">' . $all_data->notes . '</span></button><input type="checkbox" class="note-select" name="notes[]" name2="service_frequency" value="' . $all_data->id . '" id="" data-val="' . Yii::$app->homeUrl . 'uploads/create_your_own/notes/' . $all_data->id . '/large.' . $all_data->main_img . '"></span>';
                }
            }
            $arr_variable = array('recomented' => $options, 'recomented-count' => count($Notes), 'all' => $options1, 'all-count' => count($all_notes));
            $data['result'] = $arr_variable;
            echo json_encode($data);
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
