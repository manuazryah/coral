<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\AdminUser;
use common\models\ForgotPasswordTokens;

/**
 * Site controller
 */
class SiteController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error', 'index', 'home', 'forgot', 'new-password'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'forgot'],
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
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
//    public function actionIndex() {
//
//        return $this->render('index');
//    }



    public function actionIndex() {

        if (!Yii::$app->user->isGuest) {
            return $this->redirect(array('site/home'));
        }

        $this->layout = 'adminlogin';
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {

            return $this->goBack();
        } else {
            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

//	public function setSession() {
//		$post = AdminPosts::findOne(Yii::$app->user->identity->post_id);
//		if (!empty($post)) {
//			Yii::$app->session['post'] = $post->attributes;
//			Yii::$app->session['encrypted_user_id'] = Yii::$app->EncryptDecrypt->Encrypt('encrypt', Yii::$app->user->identity->post_id);
//			return true;
//		} else {
//			return FALSE;
//		}
//	}

    public function actionHome() {

        if (isset(Yii::$app->user->identity->id)) {
            if (Yii::$app->user->isGuest) {

                return $this->redirect(array('site/index'));
            }
            return $this->render('index');
        } else {
            return $this->redirect(array('site/index'));
//            throw new \yii\web\HttpException(2000, 'Session Expired.');
        }
    }

    public function actionLogin() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $this->layout = 'adminlogin';
//        $model = new \common\models\AdminUser();
//        if ($model->load(Yii::$app->request->post()) && $model->login()) {
//            return $this->goBack();
//        } else {
//            return $this->render('login', [
//                        'model' => $model,
//            ]);
//        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout() {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionForgot() {
        $this->layout = 'adminlogin';
        $model = new AdminUser();
        if ($model->load(Yii::$app->request->post())) {
            $check_exists = AdminUser::find()->where("user_name = '" . $model->user_name . "' OR email = '" . $model->user_name . "'")->one();

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
        $this->layout = 'adminlogin';
        $data = base64_decode($token);
        $values = explode('_', $data);
        $token_exist = ForgotPasswordTokens::find()->where("user_id = " . $values[0] . " AND token = " . $values[1])->one();
        if (!empty($token_exist)) {
            $model = AdminUser::find()->where("id = " . $token_exist->user_id)->one();
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
            
        }
    }

}
