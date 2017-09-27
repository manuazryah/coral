<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "about".
 *
 * @property integer $id
 * @property string $index_title
 * @property string $index_content
 * @property string $about_title
 * @property string $about_content
 * @property string $chairman_image
 * @property string $chairman_name
 * @property string $chairman_position
 * @property string $chairman_message
 * @property string $about_image
 * @property integer $CB
 * @property integer $UB
 * @property string $DOC
 * @property string $DOU
 */
class About extends \yii\db\ActiveRecord {

        /**
         * @inheritdoc
         */
        public static function tableName() {
                return 'about';
        }

        /**
         * @inheritdoc
         */
        public function rules() {
                return [
                        [['index_content', 'about_content', 'chairman_message'], 'string'],
                        [['index_content', 'about_content', 'chairman_message', 'index_title', 'about_title'], 'required'],
                        [['about_image', 'chairman_image'], 'required', 'on' => 'create'],
                        [['CB', 'UB'], 'integer'],
                        [['DOC', 'DOU'], 'safe'],
                        [['index_title', 'about_title', 'chairman_image', 'chairman_name'], 'string', 'max' => 200],
                        [['index_content'], 'string', 'max' => 430],
                        [['chairman_message'], 'string', 'max' => 240],
                        [['chairman_position'], 'string', 'max' => 100],
                        [['about_image'], 'file', 'extensions' => 'png, jpg, jpeg'],
                        [['chairman_image'], 'file', 'extensions' => 'png, jpg, jpeg'],
                ];
        }

        /**
         * @inheritdoc
         */
        public function attributeLabels() {
                return [
                    'id' => 'ID',
                    'index_title' => 'Index Title (in home page)',
                    'index_content' => 'Index Content (in home page)',
                    'about_title' => 'About Title (in about page)',
                    'about_content' => 'About Content (in about page)',
                    'chairman_image' => 'Chairman Image (in about page)',
                    'chairman_name' => 'Chairman Name (in about page)',
                    'chairman_position' => 'Chairman Position (in about page)',
                    'chairman_message' => 'Chairman Message (in about page)',
                    'about_image' => 'About Image',
                    'CB' => 'Cb',
                    'UB' => 'Ub',
                    'DOC' => 'Doc',
                    'DOU' => 'Dou',
                ];
        }

}
