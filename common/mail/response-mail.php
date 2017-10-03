<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\BaseMessage instance of newly created mail message */
if (isset($touser) && $touser != '')
    $name = $touser;
else
    $name = '';
?>

<html>
    <head>
        <style>
            .main-content p{
                line-height: 1.8;
            }
            .body{
                font-family: Open Sans !important;
            }
        </style>
    </head>
    <body>
        <div style="/* margin: 20px 200px 0px 300px; */border: 1px solid #9E9E9E;">
            <table border ="0"  class="main-tabl" border="0">
                <thead>
                    <tr>
                        <th style="width:100%">
                            <div class="header" style="padding-bottom: 0px;">
                                <div class="main-header">
                                    <div class="" style=";padding-left: 40px;text-align: center;">
                                        <?php echo Html::img('http://' . Yii::$app->request->serverName . '/coral/images/logo.png', $options = ['width' => '']) ?>
                                        <?php //echo Html::img('@web/admin/images/logos/logo-1.png', $options = ['width' => '200px']) ?>
                                    </div>
                                </div>
                                <br/>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="width:100%">
                            <div class="replay-content" style="text-align: justify;padding-right: 50px;padding-left: 50px;">
                                <hr style="border: 2px solid #9E9E9E;">
                                <div class="main-content" style="text-align:center;">
                                    <div>
                                        <h1 style="margin-bottom:0px;">A Greate Big Thank you</h1>
                                        <p style="margin-top:0px;font-size: 20px;">For shopping with <span style="color: #93c622;">Coral Perfumes</span></p>
                                    </div>
                                    <div>
                                        <p style="margin-top:0px;font-size: 20px;">We love our Customers dearly, and your feedback Is so helpful for us to here.</p>
                                    </div>
                                    <div>
                                        <p style="margin-top:0px;font-size: 20px;">If you have a few minutes to give a quick feedback, We'd be very grateful</p>
                                    </div>
                                    <div>
                                        <p style="margin-top:0px;font-size: 20px;">Please <a href="#">click here</a> for your valuable feedback</p>
                                    </div>
                                </div>
                                <hr style="border: 2px solid #9E9E9E;">
                                <div class="main-content" style="text-align:center;">
                                    <p style="margin:0px;text-align: right;">info@coralperfumes.com</p>
                                    <p style="margin:0px;text-align: right;">www.coralperfumes.com</p>
                                    <br/>
                                    <p style="margin-top:0px;margin-bottom: 0px;font-size: 20px;">Coral Perfumes Industry LLC, Dubai - 186887</p>
                                    <p style="margin-top:0px;font-size: 20px;">Please click here to <a href="#">unsubscribe</a>.</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>