<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <script src="<?= yii::$app->homeUrl; ?>/js/jquery-1.11.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script>
            var homeUrl = '<?= yii::$app->homeUrl; ?>'
        </script>
        <?php $this->head() ?>
    </head>
    <style>
        .shopper-cart{
            position: absolute;
            width: 300px;
            background: #c33636;
            right: 0;
            z-index: 5;
            -moz-box-shadow: 0px 10px 15px 0px rgba(0,0,0,0.2);
            -webkit-box-shadow: 0px 10px 15px 0px rgba(0,0,0,0.2);
            box-shadow: 0px 10px 15px 0px rgba(0,0,0,0.2);
            overflow: hidden;


        }
    </style>
    <body>
        <?php $this->beginBody() ?>

        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => 'My Company',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            $menuItems = [
                ['label' => 'Home', 'url' => ['/site/index']],
                ['label' => 'About', 'url' => ['/site/about']],
                ['label' => 'Contact', 'url' => ['/site/contact']],
                ['label' => 'Product', 'url' => ['/product/index']],
            ];
            ?>

            <?php
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            } else {
                echo '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')', ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>';
            }
            ?>
            <a href="javascript:void(0)"><i class="fa fa-shopping-basket"></i> <span class="cart_items">0 Items</span></a>
            <?php
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
            ?>
            <style>
                .shoper-cart{
                    background-color: red;
                    width: 300px;
                    margin-top: 56px;
                    margin-left: 10px;
                    margin-bottom: 25px;
                    position: absolute;
                }
                .over-lay{
                    position: absolute;
                    margin: 0 auto;
                    text-align: center;
                    z-index: 900000000;
                }

            </style>

<!--<img src="<?php // yii::$app->ba;   ?>/../images/loading.gif">-->
            <div class="loader">
                <img class="over-lay" src="<?= yii::$app->homeUrl; ?>images/loading.gif" width="300px">
                <div class="shoper-cart hide">
                    <div class="shoper-head">
                        <h3>Your Order</h3>
                        <h6>Price</h6>
                    </div>
                    <div class="shoper-content">
                    </div>
                    <div class="shoper-bottom">
                        <h5>Total AED: <span><i class="fa amount"></i></span></h5>
                    </div>
                    <div class="shoper-buy-btn">
                        <a href="<?= yii::$app->basePath; ?>"><i class="fa fa-long-arrow-left"></i> Continue Shopping</a>
                        <a class="byu-btn btn-default" href="<?= yii::$app->homeUrl; ?>cart/mycart">Buy</a>
                    </div>
                </div>
            </div>
            <div class="container">
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

                <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
