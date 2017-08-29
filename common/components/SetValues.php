<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SetValues
 *
 * @author user
 */

namespace common\components;

use Yii;
use yii\base\Component;

class SetValues extends Component {

    public function Attributes($model) {

        if (isset($model) && !Yii::$app->user->isGuest) {
            if ($model->isNewRecord) {
                $model->UB = Yii::$app->user->identity->id;
                $model->CB = Yii::$app->user->identity->id;
                $model->DOC = date('Y-m-d');
            } else {
                $model->UB = Yii::$app->user->identity->id;
            }

            return TRUE;
        } else {
            return FALSE;
        }
    }

}
