<?php

namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\User;
use common\models\ForgotPasswordTokens;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\LoginForm;
use common\models\Slider;
use common\models\Subscribe;
use common\models\ContactUs;
use yii\helpers\ArrayHelper;
use common\models\Principals;
use common\models\About;
use common\models\ContactPage;
use common\models\PrivateLabelGallery;
use common\models\PrivateLabelHowItWorks;
use common\models\PrivateLabelBenefits;
use common\models\PrivateLabelOurProcess;
use common\models\Testimonials;
use common\models\PrivateLabelLogos;
use common\models\Showrooms;
use common\models\Product;
use common\models\FromOurBlog;
use common\models\CmsMetaTags;
use common\models\AboutSisterConcern;

/**
 * Site controller
 */
class SiteController extends Controller {

	/**
	 * @inheritdoc
	 */
//    public password;

	public function behaviors() {
		return [
		    'access' => [
			'class' => AccessControl::className(),
			'only' => ['logout', 'signup', 'login-signup', 'product-detail', 'our-products', 'verification', 'send-response-mail'],
			'rules' => [
				[
				'actions' => ['signup', 'login-signup', 'product-detail', 'our-products', 'verification', 'send-response-mail'],
				'allow' => true,
				'roles' => ['?'],
			    ],
				[
				'actions' => ['logout', 'signup', 'login-signup', 'product-detail', 'our-products', 'verification', 'send-response-mail'],
				'allow' => true,
				'roles' => ['@'],
			    ],
			],
		    ],
		    'verbs' => [
			'class' => VerbFilter::className(),
			'actions' => [
			    'logout' => ['post'],
			],
		    ],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function actions() {
		return [
		    'error' => [
			'class' => 'yii\web\ErrorAction',
		    ],
		    'captcha' => [
			'class' => 'yii\captcha\CaptchaAction',
			'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
		    ],
		];
	}

	/**
	 * Displays homepage.
	 *
	 * @return mixed
	 */
	public function actionIndex() {
		Yii::$app->session['orderid'] = '';
		$about = About::find()->where(['id' => 1])->one();
		$featured_products = Product::find()->where(['status' => 1, 'featured_product' => 1])->limit(8)->all();
		$international_products = Product::find()->where(['status' => 1, 'main_category' => 2])->all();
		$catag = \common\models\Category::find()->one();
		$from_blogs = FromOurBlog::find()->where(['status' => 1])->orderBy(['id' => SORT_DESC])->limit(3)->all();
		$meta_tags = CmsMetaTags::find()->where(['id' => 1])->one();
		\Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $meta_tags->meta_keyword]);
		\Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $meta_tags->meta_description]);
		$model = new Subscribe();
		$private_label = PrivateLabelGallery::find()->where(['id' => 1])->one();
		if ($model->load(Yii::$app->request->post())) {
			$model->date = date('Y-m-d');
			$model->save();
			return $this->redirect(Yii::$app->request->referrer);
		}
		$slider = Slider::find()->where(['status' => 1])->orderBy(['id' => SORT_DESC])->all();
		return $this->render('index', [
			    'slider' => $slider,
			    'model' => $model,
			    'about' => $about,
			    'featured_products' => $featured_products,
			    'international_products' => $international_products,
			    'catag' => $catag,
			    'from_blogs' => $from_blogs,
			    'meta_title' => $meta_tags->meta_title,
			    'private_label' => $private_label,
		]);
	}

	public function actionProductDetail() {
		return $this->render('product-detail');
	}

	public function actionOurProducts() {
		return $this->render('our-products');
	}

	public function actionLoginSignup() {
		$model_login = new LoginForm();
		$model = new SignupForm();
		return $this->render('login-signup', [
			    'model_login' => $model_login,
			    'model' => $model,
		]);
	}

	public function actionTermsCondition() {
		$model = Principals::findOne(1);
		$meta_tags = CmsMetaTags::find()->where(['id' => 9])->one();
		\Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $meta_tags->meta_keyword]);
		\Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $meta_tags->meta_description]);
		return $this->render('terms_condition', [
			    'model' => $model,
			    'meta_title' => $meta_tags->meta_title,
		]);
	}

	public function actionPrivacyPolicy() {
		$model = Principals::findOne(1);
		$meta_tags = CmsMetaTags::find()->where(['id' => 1])->one();
		\Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $meta_tags->meta_keyword]);
		\Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $meta_tags->meta_description]);
		return $this->render('privacy_policy', [
			    'model' => $model,
			    'meta_title' => $meta_tags->meta_title,
		]);
	}

	public function actionReturnPolicy() {
		$model = Principals::findOne(1);
		return $this->render('return_policy', [
			    'model' => $model,
		]);
	}

	public function actionFaq() {
		$model = Principals::findOne(1);
		$meta_tags = CmsMetaTags::find()->where(['id' => 8])->one();
		\Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $meta_tags->meta_keyword]);
		\Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $meta_tags->meta_description]);
		return $this->render('faq', [
			    'model' => $model,
			    'meta_title' => $meta_tags->meta_title,
		]);
	}

	/**
	 * Logs in a user.
	 *
	 * @return mixed
	 */
	public function actionLogin() {
		if (!Yii::$app->user->isGuest) {
			return $this->goHome();
		}
		$model_login = new LoginForm();
		$model = new SignupForm();
		if ($model_login->load(Yii::$app->request->post()) && $model_login->login()) {
			unset(Yii::$app->session['wishlist-login']);
			if (yii::$app->session['after_login'] != '') {
				$this->redirect(array(yii::$app->session['after_login']));
			} else {
				return $this->goBack();
			}
//            return $this->goBack();
		} else {
			return $this->render('login-signup', [
				    'model_login' => $model_login,
				    'model' => $model,
			]);
		}
	}

	/**
	 * Signs user up.
	 *
	 * @return mixed
	 */
	public function actionSignup() {
		$model = new SignupForm();
		if ($model->load(Yii::$app->request->post())) {
			if ($user = $model->signup()) {

//				$this->sendResponseMail($model);
				if ($user->email_verification == 1) {
					if (Yii::$app->getUser()->login($user)) {
						if (yii::$app->session['after_login'] != '') {
							$this->redirect(array(yii::$app->session['after_login']));
						} else {
							return $this->goHome();
						}
					}
				} else {
					Yii::$app->session->setFlash('success', 'Please Verify Your Email Id.');
					$this->Emailverification($user);
					return $this->redirect(Yii::$app->request->referrer);
				}
			}
		}
		$model_login = new LoginForm();
		return $this->render('login-signup', [
			    'model_login' => $model_login,
			    'model' => $model,
		]);
	}

	public function actionVerification($id) {

		$model = User::find()->where(['id' => $id])->one();

		if (!empty($model)) {
			$model->email_verification = 1;
			$model->save();
			return $this->redirect(array('site/login'));
		} else {
			return $this->redirect(array('site/index'));
		}
	}

	public function Emailverification($user) {

		$message = Yii::$app->mailer->compose('email_varification', ['model' => $user]) // a view rendering result becomes the message body here
			->setFrom('no-replay@coralperfumes.com')
			->setTo($user->email)
			->setSubject('Email Verification');
		$message->send();
		return TRUE;
	}

	/**
	 * Logs out the current user.
	 *
	 * @return mixed
	 */
	public function actionLogout() {
		Yii::$app->user->logout();
		Yii::$app->session['orderid'] = '';
		return $this->goHome();
	}

	/**
	 * Displays contact page.
	 *
	 * @return mixed
	 */
	public function actionContact() {
		$model = new ContactUs();
		$meta_tags = CmsMetaTags::find()->where(['id' => 7])->one();
		\Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $meta_tags->meta_keyword]);
		\Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $meta_tags->meta_description]);
		$country_codes = ArrayHelper::map(\common\models\CountryCode::find()->where(['status' => 1])->orderBy(['id' => SORT_ASC])->all(), 'id', 'country_code');
		$contact_data = ContactPage::find()->where(['id' => 1])->one();
		if ($model->load(Yii::$app->request->post()) && $model->validate()) {
			$model->date = date('Y-m-d');
			if ($model->save()) {
				$this->sendContactMail($model);
			}
			return $this->refresh();
		} else {
			return $this->render('contact', [
				    'model' => $model,
				    'country_codes' => $country_codes,
				    'contact_data' => $contact_data,
				    'meta_title' => $meta_tags->meta_title,
			]);
		}
	}

	/**
	 * This function send contact message to admin.
	 */
	public function sendContactMail($model) {

		$subject = "Enquiry From Coral Perfume";
		$to = "manu@azryah.com";

		$message = "<html>
    }
<head>

</head>
<body>
<p><b>Enquiry Received From Website</b></p>
<table>
<tr>
<th>Name</th>
<th>:-</th>

<td>" . $model->first_name . ' ' . $model->last_name . "</td>
</tr>

<tr>
<tr>
<th>Contact Number</th>
<th>:-</th>

<td>" . $model->country_code . $model->mobile_no . "</td>
</tr>

<tr>

<th>Email Id</th>
<th>:-</th>
<td>" . $model->email . "</td>
</tr>
<tr>

<th>Reason for Contact</th>
<th>:-</th>
<td>" . $model->reason . "</td>
</tr>
<tr>


<tr>


</table>
</body>
</html>
";
		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n" .
			"From: info@travinno.com";
		mail($to, $subject, $message, $headers);
	}

	/**
	 * Displays about page.
	 *
	 * @return mixed
	 */
	public function actionAbout() {
		$about = About::find()->where(['id' => 1])->one();
		$meta_tags = CmsMetaTags::find()->where(['id' => 2])->one();
		$sisterconcerns = AboutSisterConcern::find()->where(['status' => '1'])->all();
		\Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $meta_tags->meta_keyword]);
		\Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $meta_tags->meta_description]);
		return $this->render('about', [
			    'about' => $about,
			    'sisterconcerns' => $sisterconcerns,
			    'meta_title' => $meta_tags->meta_title,
		]);
	}

	/**
	 * Displays private label page.
	 *
	 * @return mixed
	 */
	public function actionPrivateLabel() {
		$gallery = PrivateLabelGallery::find()->where(['id' => 1])->one();
		$how_it_works = PrivateLabelHowItWorks::find()->where(['status' => 1])->all();
		$benefits = PrivateLabelBenefits::find()->where(['status' => 1])->all();
		$process = PrivateLabelOurProcess::find()->where(['status' => 1])->all();
		$testimonials = Testimonials::find()->where(['status' => 1])->all();
		$contact = ContactPage::find()->where(['id' => 1])->one();
		$logos = PrivateLabelLogos::find()->where(['status' => 1])->all();
		$contact_us = new ContactUs;
		$meta_tags = CmsMetaTags::find()->where(['id' => 5])->one();
		\Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $meta_tags->meta_keyword]);
		\Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $meta_tags->meta_description]);

		return $this->render('privatelabel', [
			    'gallery' => $gallery,
			    'how_it_works' => $how_it_works,
			    'benefits' => $benefits,
			    'process' => $process,
			    'testimonials' => $testimonials,
			    'contact' => $contact,
			    'logos' => $logos,
			    'contact_us' => $contact_us,
			    'meta_title' => $meta_tags->meta_title,
		]);
	}

	/*
	 * private label contact us page
	 */

	public function actionContactus() {
		$model = new ContactUs();
		if ($model->load(Yii::$app->request->post()) && $model->validate()) {
			$model->date = date('Y-m-d');
			if ($model->save()) {
				$this->sendContactMail($model);
			}
			return $this->redirect('private-label');
		}
	}

	/**
	 * Displays showrooms page.
	 *
	 * @return mixed
	 */
	public function actionShowrooms() {
		$meta_tags = CmsMetaTags::find()->where(['id' => 6])->one();
		\Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $meta_tags->meta_keyword]);
		\Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $meta_tags->meta_description]);
		$showrooms = Showrooms::find()->where(['status' => 1])->all();
		return $this->render('showrooms', [
			    'showrooms' => $showrooms,
			    'meta_title' => $meta_tags->meta_title,
		]);
	}

	/**
	 * Requests password reset.
	 *
	 * @return mixed
	 */
	public function actionRequestPasswordReset() {
		$model = new PasswordResetRequestForm();
		if ($model->load(Yii::$app->request->post()) && $model->validate()) {
			if ($model->sendEmail()) {
				Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

				return $this->goHome();
			} else {
				Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
			}
		}

		return $this->render('requestPasswordResetToken', [
			    'model' => $model,
		]);
	}

	/**
	 * Resets password.
	 *
	 * @param string $token
	 * @return mixed
	 * @throws BadRequestHttpException
	 */
	public function actionResetPassword($token) {
		try {
			$model = new ResetPasswordForm($token);
		} catch (InvalidParamException $e) {
			throw new BadRequestHttpException($e->getMessage());
		}

		if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
			Yii::$app->session->setFlash('success', 'New password saved.');

			return $this->goHome();
		}

		return $this->render('resetPassword', [
			    'model' => $model,
		]);
	}

	public function actionForgot() {
//        $this->layout = 'adminlogin';
		$model = new User();
		if ($model->load(Yii::$app->request->post())) {

			$check_exists = User::find()->where("username = '" . $model->username . "' OR email = '" . $model->username . "'")->one();
			if (!empty($check_exists)) {

				$token_value = $this->tokenGenerator();
				$token = $check_exists->id . '_' . $token_value;
				$val = base64_encode($token);
				$token_model = new ForgotPasswordTokens();
				$token_model->user_id = $check_exists->id;
				$token_model->token = $token_value;
				$token_model->save();
				$this->sendMail($val, $check_exists);
				Yii::$app->getSession()->setFlash('success', 'A mail has been sent');
			} else {
				Yii::$app->getSession()->setFlash('error', 'Invalid username');
			}
			return $this->render('forgot-password', [
				    'model' => $model,
			]);
		} else {
			return $this->render('forgot-password', [
				    'model' => $model,
			]);
		}
	}

	public function tokenGenerator() {

		$length = rand(1, 1000);
		$chars = array_merge(range(0, 9));
		shuffle($chars);
		$token = implode(array_slice($chars, 0, $length));
		return $token;
	}

	public function sendMail($val, $model) {

		$message = Yii::$app->mailer->compose('forgot_mail', ['model' => $model, 'val' => $val]) // a view rendering result becomes the message body here
			->setFrom('no-replay@coralperfumes.com')
			->setTo($model->email)
			->setSubject('Change Password');
		$message->send();
		return TRUE;
	}

	public function actionNewPassword($token) {
//        $this->layout = 'adminlogin';
		$data = base64_decode($token);
		$values = explode('_', $data);
		$token_exist = ForgotPasswordTokens::find()->where("user_id = " . $values[0] . " AND token = " . $values[1])->one();
		if (!empty($token_exist)) {
			$model = User::find()->where("id = " . $token_exist->user_id)->one();
			if (Yii::$app->request->post()) {
				if (Yii::$app->request->post('new-password') == Yii::$app->request->post('confirm-password')) {
					Yii::$app->getSession()->setFlash('success', 'password changed successfully');
					$model->password_hash = Yii::$app->security->generatePasswordHash(Yii::$app->request->post('confirm-password'));
//                   echo $model->password_hash;exit;
					$model->update();
					$token_exist->delete();
					$this->redirect('index');
				} else {
					Yii::$app->getSession()->setFlash('error', 'password mismatch  ');
				}
			}
			return $this->render('new-password', [
				    'model' => $model
			]);
		} else {
			Yii::$app->getSession()->setFlash('error', 'Password Token not Found');
		}
	}

	public function actionChangepassword() {
		$model = User::findOne(Yii::$app->user->identity->id);
		if (Yii::$app->request->post()) {
			if (Yii::$app->getSecurity()->validatePassword(Yii::$app->request->post('old-password'), $model->password_hash)) {
				if (Yii::$app->request->post('new-password') == Yii::$app->request->post('confirm-password')) {
					$model->password_hash = Yii::$app->security->generatePasswordHash(Yii::$app->request->post('confirm-password'));
//                   echo $model->password_hash;exit;
					$model->update();
					Yii::$app->getSession()->setFlash('success', 'password changed successfully');
					$this->redirect('index');
				} else {
					Yii::$app->getSession()->setFlash('error', 'password mismatch  ');
				}
			} else {
				Yii::$app->getSession()->setFlash('error', 'Incorrect Password ');
			}
		}
		return $this->render('resetPassword', [
			    'model' => $model
		]);
	}

	public function actionOurBlog() {
		$meta_tags = CmsMetaTags::find()->where(['id' => 10])->one();
		\Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $meta_tags->meta_keyword]);
		\Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $meta_tags->meta_description]);
		$model = FromOurBlog::find()->where(['status' => 1])->all();
		return $this->render('blog', [
			    'model' => $model,
			    'meta_title' => $meta_tags->meta_title,
		]);
	}

	public function actionBlogDetail($id) {
		if (empty($id)) {
			$model = FromOurBlog::find()->where(['status' => 1])->all();
		} else {
			$model = FromOurBlog::find()->where(['id' => $id, 'status' => 1])->one();
			if (!empty($model)) {
				return $this->render('blog-detail', [
					    'model' => $model
				]);
			} else {
				return $this->render('blog', [
					    'model' => $model
				]);
			}
		}
	}

}
