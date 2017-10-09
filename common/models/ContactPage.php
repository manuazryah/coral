<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contact_page".
 *
 * @property integer $id
 * @property string $map
 * @property string $content
 * @property string $accounts_info
 * @property string $administration_info
 * @property string $marketing_info
 * @property string $business_info
 * @property string $marketing_address
 * * @property string $address_1
 * @property string $address_2
 * @property string $address_3
 * @property string $address_4
 * @property string $date_1
 */
class ContactPage extends \yii\db\ActiveRecord {

	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return 'contact_page';
	}

	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[['content', 'accounts_info', 'administration_info', 'marketing_info', 'business_info', 'marketing_address', 'date_1'], 'string'],
			[['map', 'accounts_info', 'administration_info', 'marketing_info', 'business_info', 'marketing_address', 'address_1', 'address_2', 'address_3', 'address_4'], 'required'],
			[['map'], 'string', 'max' => 500],
			[['address_1', 'address_2', 'address_3', 'address_4'], 'string', 'max' => 300]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
		    'id' => 'ID',
		    'map' => 'Map',
		    'content' => 'Content',
		    'accounts_info' => 'Accounts Info',
		    'administration_info' => 'Administration Info',
		    'marketing_info' => 'Marketing Info',
		    'business_info' => 'Business Info',
		    'marketing_address' => 'Marketing Address',
		    'address_1' => 'Address 1',
		    'address_2' => 'Address 2',
		    'address_3' => 'Address 3',
		    'address_4' => 'Address 4',
		    'date_1' => 'Date 1',
		];
	}

}
