<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bottle".
 *
 * @property integer $id
 * @property string $name
 * @property integer $text_length
 * @property string $bottle_img
 * @property string $desigin_img
 * @property integer $status
 * @property integer $CB
 * @property integer $UB
 * @property string $DOC
 * @property string $DOU
 */
class Bottle extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'bottle';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'price', 'text_length'], 'required'],
            [['bottle_img'], 'required', 'on' => 'create'],
            [['text_length', 'status', 'CB', 'UB'], 'integer'],
            [['price'], 'number'],
            [['DOC', 'DOU'], 'safe'],
            [['bottle_img'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [['desigin_img'], 'file', 'skipOnEmpty' => true, 'maxFiles' => 10, 'extensions' => 'png, jpg'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'text_length' => 'Text Length',
            'bottle_img' => 'Bottle Image',
            'desigin_img' => 'Desigin Image',
            'status' => 'Status',
            'CB' => 'Cb',
            'UB' => 'Ub',
            'DOC' => 'Doc',
            'DOU' => 'Dou',
        ];
    }

}
