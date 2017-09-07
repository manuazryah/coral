<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
?>
<div class="pad-20 hide-xs"></div>

<div class="container">
    <div class="breadcrumb">
        <span class="current-page">My account</span>
        <ol class="path">
            <li><?= Html::a('<span>Home</span>', ['/site/index'], ['class' => '']) ?></li>
            <li><?= Html::a('<span>My account</span>', ['/myaccounts/user/index'], ['class' => '']) ?></li>
            <li class="active">Change Password</li>
        </ol>
    </div>
</div>

<div id="our-product" class="my-account">
    <div class="container">
        <div class="col-lg-4 col-md-4 col-sm-12 left-accordation">
            <div class="panel panel-default">
                <div class="panel-body lit-blue">
                    <div class="slide-container">
                        <div class="list-group" id="mg-multisidetabs">
                            <a href="#" class="list-group-item active-head "><span>Orders</span><span class="glyphicon glyphicon-menu-down mg-icon pull-right"></span></a>
                            <div class="panel list-sub" style="display: block">
                                <div class="panel-body">
                                    <div class="list-group">
                                        <?= Html::a('<span class="fa fa-caret-left pull-left"></span><span>My orders</span>', ['/myaccounts/user/my-orders'], ['class' => 'list-group-item']) ?>
                                    </div>
                                </div>
                            </div>

                            <a href="#" class="list-group-item active-head "><span>My stuff</span><span class="glyphicon glyphicon-menu-down mg-icon pull-right"></span></a>
                            <div class="panel list-sub" style="display: block">
                                <div class="panel-body">
                                    <div class="list-group">
                                        <?= Html::a('<span class="fa fa-caret-left pull-left"></span><span>My reviews & ratings</span>', ['/myaccounts/user/my-reviews'], ['class' => 'list-group-item']) ?>
                                        <?= Html::a('<span class="fa fa-caret-left pull-left"></span><span>My Wishlist</span>', ['/myaccounts/user/wish-list'], ['class' => 'list-group-item']) ?>
                                    </div>
                                </div>
                            </div>

                            <a href="#" class="list-group-item active-head "><span>settings</span><span class="glyphicon glyphicon-menu-down mg-icon pull-right"></span></a>
                            <div class="panel list-sub" style="display: block">
                                <div class="panel-body">
                                    <div class="list-group">
                                        <?= Html::a('<span class="fa fa-caret-left pull-left"></span><span>personal information</span>', ['/myaccounts/user/personal-info'], ['class' => 'list-group-item']) ?>
                                        <?= Html::a('<span class="fa fa-caret-left pull-left"></span><span>change password</span>', ['/myaccounts/user/change-password'], ['class' => 'list-group-item active']) ?>
                                        <?= Html::a('<span class="fa fa-caret-left pull-left"></span><span>addresses</span>', ['/myaccounts/user-address/index'], ['class' => 'list-group-item']) ?>
                                        <?= Html::a('<span class="fa fa-caret-left pull-left"></span><span>profile settings</span>', ['/myaccounts/user/personal-info'], ['class' => 'list-group-item']) ?>
                                        <?= Html::a('<span class="fa fa-caret-left pull-left"></span><span>update email/mobile</span>', ['/myaccounts/user/personal-info'], ['class' => 'list-group-item']) ?>
                                        <?= Html::a('<span class="fa fa-caret-left pull-left"></span><span>deactivate account</span>', ['/myaccounts/user/personal-info'], ['class' => 'list-group-item']) ?>
                                    </div>
                                </div>
                            </div>

                        </div><!-- ./ end list-group -->
                    </div><!-- ./ end slide-container -->
                </div><!-- ./ end panel-body -->
            </div><!-- ./ end panel panel-default-->
        </div><!-- ./ endcol-lg-6 col-lg-offset-3 -->
        <div class="settings">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 right-box" style="padding: 50px 15px;">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 my-account-cntnt align-center">
                    <div class="form-feild-box">
                        <form>
                            <div class="form-group col-md-12">
                                <label for="pwd">Old Password*</label>
                                <input type="password" class="form-control" required="" placeholder="********" id="pwd">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="pwd">New Password*</label>
                                <input type="password" class="form-control" required="" placeholder="********" id="pwd">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="pwd">Confirm Password*</label>
                                <input type="password" class="form-control" required="" placeholder="********" id="pwd">
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 save"><button class="green2">save changes</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>

<div class="pad-20"></div>