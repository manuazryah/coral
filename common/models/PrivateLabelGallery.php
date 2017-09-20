<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "private_label_gallery".
 *
 * @property integer $id
 * @property string $banner_image
 * @property string $image
 * @property string $our_process_title
 * @property string $other_title
 * @property integer $CB
 * @property integer $UB
 * @property string $DOC
 * @property string $DOU
 */
class PrivateLabelGallery extends \yii\db\ActiveRecord {

	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return 'private_label_gallery';
	}

	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[['our_process_title', 'other_title'], 'string'],
			[['our_process_title', 'other_title', 'banner_image'], 'required', 'on' => 'create'],
			[['CB'], 'required'],
			[['CB', 'UB'], 'integer'],
			[['DOC', 'DOU'], 'safe'],
			[['banner_image', 'image'], 'string', 'max' => 100],
			[['banner_image'], 'file', 'extensions' => 'png, jpg, jpeg'],
			//[['image'], 'file', 'extensions' => 'png, jpg, jpeg'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
		    'id' => 'ID',
		    'banner_image' => 'Banner Image',
		    'image' => 'Image',
		    'our_process_title' => 'Our Process Title',
		    'other_title' => 'Other Title',
		    'CB' => 'Cb',
		    'UB' => 'Ub',
		    'DOC' => 'Doc',
		    'DOU' => 'Dou',
		];
	}

}
