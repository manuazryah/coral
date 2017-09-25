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
                'only' => ['logout', 'signup', 'login-signup', 'product-detail', 'our-products'],
                'rules' => [
                    [
                        'actions' => ['signup', 'login-signup', 'product-detail', 'our-products'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'signup', 'login-signup', 'product-detail', 'our-products'],
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
        $about = About::find()->where(['id' => 1])->one();
        $featured_products = Product::find()->where(['status' => 1, 'featured_product' => 1])->all();
        $catag = \common\models\Category::find()->one();
        $model = new Subscribe();
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
                    'catag' => $catag,
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
        return $this->render('terms_condition', [
                    'model' => $model,
        ]);
    }

    public function actionPrivacyPolicy() {
        $model = Principals::findOne(1);
        return $this->render('privacy_policy', [
                    'model' => $model,
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
        return $this->render('faq', [
                    'model' => $model,
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
                if (Yii::$app->getUser()->login($user)) {
                    if (yii::$app->session['after_login'] != '') {
                        $this->redirect(array(yii::$app->session['after_login']));
                    } else {
                        return $this->goHome();
                    }
                }
            }
        }
        $model_login = new LoginForm();
        return $this->render('login-signup', [
                    'model_login' => $model_login,
                    'model' => $model,
        ]);
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
        return $this->render('about', [
                    'about' => $about
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

        return $this->render('privatelabel', [
                    'gallery' => $gallery,
                    'how_it_works' => $how_it_works,
                    'benefits' => $benefits,
                    'process' => $process,
                    'testimonials' => $testimonials,
                    'contact' => $contact,
                    'logos' => $logos,
        ]);
    }

    /**
     * Displays showrooms page.
     *
     * @return mixed
     */
    public function actionShowrooms() {
        $showrooms = Showrooms::find()->where(['status' => 1])->all();
        return $this->render('showrooms', [
                    'showrooms' => $showrooms
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
            $check_exists = User::find()->where("username = '" . $model->username . "' OR email = '" . $model->email . "'")->one();
            if (!empty($check_exists)) {
                $token_value = $this->tokenGenerator();
                $token = $check_exists->id . '_' . $token_value;
                $val = base64_encode($token);
                $token_model = new ForgotPasswordTokens();
                $token_model->user_id = $check_exists->id;
                $token_model->token = $token_value;
                $token_model->save();
                $this->sendMail($val, $check_exists->email);
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

    public function sendMail($val, $email) {

        $to = $email;

// subject
        $subject = 'Change password';

// message
        echo
        $message = '
<html>
<head>
  <title>Forgot Password</title>
</head>
<body>
  <p>Change Password</p>
  <table>

     <tr>
      <td><a href="' . Yii::$app->homeUrl . 'site/new-password?token=' . $val . '">Click here change password</a></td>
    </tr>

  </table>
</body>
</html>
';
        exit;
// To send HTML mail, the Content-type header must be set
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n" .
                "From: 'noreplay@azryah.com";
        mail($to, $subject, $message, $headers);
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
        $model = FromOurBlog::find()->where(['status' => 1])->all();
        return $this->render('blog', [
                    'model' => $model
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
