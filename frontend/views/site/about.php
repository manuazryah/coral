<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
?>


<div class="pad-20 hide-xs"></div>

<div class="container">
    <div class="breadcrumb">
        <span class="current-page">About Us</span>
        <ol class="path">
            <li><?= Html::a('Home', ['/site/index'], ['class' => '']) ?></li>
            <li class="active">About us</li>
        </ol>
    </div>
</div>

<div id="about-page">
    <div class="container">
        <div class="row">
            <div class="about-section">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="abt-img-box">
                        <img class="img-responsive hidden-xs" src="<?= Yii::$app->homeUrl; ?>uploads/cms/about/<?= $about->id ?>/large.<?= $about->about_image ?>"/>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <h5 class="heading"><?= $about->about_title; ?></h5>
                    <p><img class="img-responsive hidden-lg hidden-md hidden-sm" style="float: left;margin: 0 15px 10px 0;" src="<?= Yii::$app->homeUrl; ?>images/about.jpg"/>

                        <?php
                        $content = str_ireplace('<p>', '', $about->about_content);
                        $content = str_ireplace('</p>', '', $content)
                        ?>

                    <?= $content ?>				</div>
            </div>
        </div>
    </div>
    <div class="chairmans-msg-bg-color">
        <div class="chairmans-msg-bg" style="background-image: url(images/chairmans-msg-bg.png);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 chairmans-img">
                        <div class="card">
                            <canvas class="header-bg" width="250" height="70" id="header-blur"></canvas>
                            <div class="avatar">
                                <img src="<?= Yii::$app->homeUrl; ?>uploads/cms/about/<?= $about->id ?>/chairman/large.<?= $about->chairman_image ?>" alt="1">
                            </div>
                        </div>
                        <!--<img class="img-responsive hidden-md hidden-sm hidden-xs" src="images/chairnams-img.png"/>-->
                        <div class="hidden-lg">
                            <!--<img class="img-responsive" src="images/chairnams-img2.png"/>-->
                            <div class="chairmans-name">
                                <p class="name"><?= $about->chairman_name ?></p>
                                <p class="designation"><?= $about->chairman_position ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 what-do-say">
                        <img class="img-responsive" src="<?= Yii::$app->homeUrl; ?>images/what-do-say.png"/>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <p class="chairmans-msg">
                            <?php
                            $message = str_ireplace('<p>', '', $about->chairman_message);
                            $message = str_ireplace('</p>', '', $message)
                            ?>
                            <?= $message ?>
                        </p>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 hidden-md hidden-sm hidden-xs">
                        <div class="chairmans-name">
                            <p class="name"><?= $about->chairman_name ?></p>
                            <p class="designation"><?= $about->chairman_position ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="strategic-approuch">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h5 class="heading">Our strategic approuch to your marketing</h5>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 left">
                    <div class="msg-block top-box">
                        <p class="mg-0 xs-marbttm-15">
                            <strong>1. Planning & Discuss</strong><br>
                            <span class="text-light">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque et quasi.</span>
                        </p>
                        <p class="mg-0 hidden-lg hidden-md hidden-sm xs-marbttm-15">
                            <strong>2. Creative Process</strong><br>
                            <span class="text-light">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque et quasi.</span>
                        </p>
                    </div>
                    <div class="msg-block bottom-box">
                        <p class="mg-0 xs-marbttm-15">
                            <strong>3. Development</strong><br>
                            <span class="text-light">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque et quasi.</span>
                        </p>
                        <p class="mg-0 hidden-lg hidden-md hidden-sm xs-marbttm-15">
                            <strong>4. Final Product</strong><br>
                            <span class="text-light">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque et quasi.</span>
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 hidden-xs graph">
                    <img class="center-block img-responsive" src="images/strategic-approuch.png">
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs right">
                    <div class="msg-block top-box">
                        <p class="mg-0">
                            <strong>2. Creative Process</strong><br>
                            <span class="text-light">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque et quasi.</span>
                        </p>
                    </div>
                    <div class="msg-block bottom-box">
                        <p class="mg-0">
                            <strong>4. Final Product</strong><br>
                            <span class="text-light">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque et quasi.</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="sister-concern">
        <div class="container border-box">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                <h5 class="heading">Sister Concerns</h5>
            </div>
            <div style="clear: both">
                <div class="owl-item active col-lg-4 col-md-4 col-sm-6 col-xs-12"><div class="item our-services hover-shadow">
                        <img class="img-responsive" src="http://webpentagon.com/demo/themeforest/wordpress/specialists/wp-content/uploads/bfi_thumb/serv-11-ncougkdd37fhexy3es6f0ssifxgy2l0ut5mc0ukgk6.jpg" alt="services-image">
                        <div class="content-our-services">
                            <p><strong>Business Growth</strong></p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>  
                            <ul>
                                <li>Sed ut perspiciatis unde omnis</li>
                                <li>Sed ut perspiciatis unde omnis</li>
                                <li>Sed ut perspiciatis unde omnis</li>
                                <li>Sed ut perspiciatis unde omnis</li>
                            </ul>                    
                        </div>                      
                    </div>
                </div>
                <div class="owl-item active col-lg-4 col-md-4 col-sm-6 col-xs-12"><div class="item our-services hover-shadow">
                        <img class="img-responsive" src="http://webpentagon.com/demo/themeforest/wordpress/specialists/wp-content/uploads/bfi_thumb/serv-11-ncougkdd37fhexy3es6f0ssifxgy2l0ut5mc0ukgk6.jpg" alt="services-image">
                        <div class="content-our-services">
                            <p><strong>Business Growth</strong></p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>  
                            <ul>
                                <li>Sed ut perspiciatis unde omnis</li>
                                <li>Sed ut perspiciatis unde omnis</li>
                                <li>Sed ut perspiciatis unde omnis</li>
                                <li>Sed ut perspiciatis unde omnis</li>
                            </ul>                            
                        </div>                      
                    </div>
                </div>
                <div class="owl-item active col-lg-4 col-md-4 col-sm-6 col-xs-12"><div class="item our-services hover-shadow">
                        <img class="img-responsive" src="http://webpentagon.com/demo/themeforest/wordpress/specialists/wp-content/uploads/bfi_thumb/serv-11-ncougkdd37fhexy3es6f0ssifxgy2l0ut5mc0ukgk6.jpg" alt="services-image">
                        <div class="content-our-services">
                            <p><strong>Business Growth</strong></p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>  
                            <ul>
                                <li>Sed ut perspiciatis unde omnis</li>
                                <li>Sed ut perspiciatis unde omnis</li>
                                <li>Sed ut perspiciatis unde omnis</li>
                                <li>Sed ut perspiciatis unde omnis</li>
                            </ul>                       
                        </div>                      
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pad-20"></div>




</div>

