<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "from_our_blog".
 *
 * @property integer $id
 * @property string $title
 * @property string $blog_date
 * @property string $content
 * @property string $image
 * @property integer $status
 * @property integer $CB
 * @property integer $UB
 * @property string $DOC
 * @property string $DOU
 */
class FromOurBlog extends \yii\db\ActiveRecord {

        /**
         * @inheritdoc
         */
        public static function tableName() {
                return 'from_our_blog';
        }

        /**
         * @inheritdoc
         */
        public function rules() {
                return [
                        [['title', 'content', 'blog_date'], 'required'],
                        [['blog_date', 'DOC', 'DOU'], 'safe'],
                        [['content'], 'string'],
                        [['status', 'CB', 'UB'], 'integer'],
                        [['title', 'image'], 'string', 'max' => 250],
                        [['image'], 'file', 'extensions' => 'png, jpg, jpeg'],
                ];
        }

        /**
         * @inheritdoc
         */
        public function attributeLabels() {
                return [
                    'id' => 'ID',
                    'title' => 'Title',
                    'blog_date' => 'Date',
                    'content' => 'Content',
                    'image' => 'Image (350 * 235)',
                    'status' => 'Status',
                    'CB' => 'Cb',
                    'UB' => 'Ub',
                    'DOC' => 'Doc',
                    'DOU' => 'Dou',
                ];
        }

}
