<?php

namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model {

	public $email;
	public $password;
	public $first_name;
	public $last_name;
	public $dob;
	public $mobile_no;
	public $country_code;
	public $country;
	public $gender;
	public $password_repeat;
	public $day;
	public $month;
	public $year;
	public $rules = false;
	public $notification = 0;

	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			['email', 'trim'],
			['email', 'required'],
			['email', 'email'],
			['email', 'string', 'max' => 255],
			['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
			['password', 'required'],
			['password', 'string', 'min' => 6],
			[['country', 'gender'], 'integer'],
			[['day', 'month', 'year', 'password_repeat', 'notification', 'country_code'], 'safe'],
			[['first_name', 'last_name'], 'string', 'max' => 50],
			[['first_name'], 'required'],
			['rules', 'required', 'requiredValue' => 1, 'message' => 'Please agree the terms and conditions'],
			['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => "Passwords don't match"],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
		    'rules' => 'By checking this box and clicking "Register" below, I acknowledge that I have read and agree to the Terms & Conditions and Privacy Policy',
		    'notification' => 'Yes, sign me up! I want to receive news, style tips and more, including by email, phone and mail, from Coral Perfumes.',
		];
	}

	/**
	 * Signs user up.
	 *
	 * @return User|null the saved model or null if saving fails
	 */
	public function signup() {
		if (!$this->validate()) {
			return null;
		}

		$user = new User();
		$user->first_name = $this->first_name;
		$user->last_name = $this->last_name;
		$user->country = $this->country;
		$user->dob = $this->year . '-' . $this->month . '-' . $this->day;
		$user->gender = $this->gender;
		$user->country_code = $this->country_code;
		$user->mobile_no = $this->mobile_no;
		$user->email = $this->email;
		$user->email_verification = 0;
		$user->notification = $this->notification;
		$user->setPassword($this->password);
		$user->generateAuthKey();

		return $user->save() ? $user : null;
	}

}
