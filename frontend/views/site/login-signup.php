<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="pad-20 hide-xs"></div>
<div class="container">
    <div class="breadcrumb">
        <span class="current-page">login / signup</span>
        <ol class="path">
            <li><?= Html::a('<span>Home</span>', ['index'], ['class' => '']) ?></li>
            <li class="active">Login/signup</li>
        </ol>
    </div>
</div>
<div id="log-in">
    <div class="container">
        <div class="">
            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 lit-blue form-feild-box">
                <h4>Sign in</h4>
                <p class="sub-discrip">Sign in with your email and password.</p>
                <?php $form = ActiveForm::begin(['action' => Yii::$app->homeUrl . 'site/login']); ?>

                <?= $form->field($model_login, 'username')->textInput(['placeholder' => 'username']) ?>

                <?= $form->field($model_login, 'password')->passwordInput(['placeholder' => '********']) ?>

                <?= Html::submitButton('submit', ['class' => 'green2']) ?>
                <div class="form-group col-md-6">
                    <?= $form->field($model_login, 'rememberMe')->checkbox() ?>
                </div>
                <div class="form-group col-md-6">
                    <a href="<?= Yii::$app->homeUrl; ?>site/forgot" style="color: #4694d2;">Forgot your password ?</a>
                </div>

                <?php ActiveForm::end(); ?>
            </div>

            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 lit-blue form-feild-box">
                <h4>Creat Your Account</h4>
                <p class="sub-discrip">*Required fields. You may unsubscribe at any time.</p>
                <?php $form1 = ActiveForm::begin(['action' => Yii::$app->homeUrl . 'site/signup']); ?>
                <div class="form-group col-md-12 form-group1">
                    <label for="usr">Name*</label>
                    <div class="col-md-6 first-name">
                        <?= $form1->field($model, 'first_name')->textInput(['placeholder' => 'First Name'])->label(FALSE) ?>
                    </div>
                    <div class="col-md-6 last-name">
                        <?= $form1->field($model, 'last_name')->textInput(['placeholder' => 'Last Name'])->label(FALSE) ?>
                    </div>
                </div>
                <?= $form->field($model, 'email')->textInput()->label('E-Mail Address*') ?>
                <div class="form-group col-md-6 form-group1">
                    <?= $form->field($model, 'country')->dropDownList(['1' => 'UAE'], ['class' => 'country-select']); ?>
                </div>
                <div class="form-group col-md-6 form-group1">
                    <?= $form->field($model, 'gender')->dropDownList(['1' => 'Male', 2 => 'Female']); ?>
                </div>

                <div class="form-group col-md-6 form-group1">
                    <label for="pwd">D.O.B*</label>
                    <div class="date-dropdowns">
                        <select id="signupform-day" class="day" name="SignupForm[day]">
                            <option value="">DD</option>
                            <?php foreach (Yii::$app->SetValues->Dates() as $value) { ?>
                                <option value="<?= $value ?>"><?= $value ?></option>
                            <?php }
                            ?>
                        </select>
                        <select id="signupform-month" class="month" name="SignupForm[month]">
                            <option value="">MM</option>
                            <?php foreach (Yii::$app->SetValues->Months() as $key => $value) { ?>
                                <option value="<?= $key ?>"><?= $value ?></option>
                            <?php }
                            ?>
                        </select>
                        <select id="signupform-year" class="year" name="SignupForm[year]">
                            <option value="">YY</option>
                            <?php foreach (Yii::$app->SetValues->Years() as $value) { ?>
                                <option value="<?= $value ?>"><?= $value ?></option>
                            <?php }
                            ?>
                        </select>
                <!--<select class="day"><option value="00">DD</option><option value="01">1st</option><option value="02">2nd</option><option value="03">3rd</option><option value="04">4th</option><option value="05">5th</option><option value="06">6th</option><option value="07">7th</option><option value="08">8th</option><option value="09">9th</option><option value="10">10th</option><option value="11">11th</option><option value="12">12th</option><option value="13">13th</option><option value="14">14th</option><option value="15">15th</option><option value="16">16th</option><option value="17">17th</option><option value="18">18th</option><option value="19">19th</option><option value="20">20th</option><option value="21">21st</option><option value="22">22nd</option><option value="23">23rd</option><option value="24">24th</option><option value="25">25th</option><option value="26">26th</option><option value="27">27th</option><option value="28">28th</option><option value="29">29th</option></select>-->
<!--                        <select class="month" name="example6_[month]"><option value="00">MM</option><option value="01">Jan</option><option value="02">Feb</option><option value="03">Mar</option><option value="04">Apr</option><option value="05">May</option><option value="06">Jun</option><option value="07">Jul</option><option value="08">Aug</option><option value="09">Sep</option><option value="10">Oct</option><option value="11">Nov</option><option value="12">Dec</option></select>
                        <select class="year" name="example2_[year]"><option value="0000">YY</option><option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option><option value="1929">1929</option><option value="1928">1928</option><option value="1927">1927</option><option value="1926">1926</option><option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option><option value="1921">1921</option><option value="1920">1920</option><option value="1919">1919</option><option value="1918">1918</option><option value="1917">1917</option><option value="1916">1916</option><option value="1915">1915</option><option value="1914">1914</option><option value="1913">1913</option><option value="1912">1912</option><option value="1911">1911</option><option value="1910">1910</option><option value="1909">1909</option><option value="1908">1908</option><option value="1907">1907</option><option value="1906">1906</option><option value="1905">1905</option><option value="1904">1904</option><option value="1903">1903</option><option value="1902">1902</option><option value="1901">1901</option><option value="1900">1900</option><option value="1899">1899</option><option value="1898">1898</option><option value="1897">1897</option><option value="1896">1896</option></select>-->
                    </div>
                </div>
                <div class="form-group col-md-6 form-group1">
                    <?= $form->field($model, 'mobile_no')->textInput() ?>
                </div>
                <div class="form-group col-md-12 form-group1">
                    <?= $form->field($model, 'username')->textInput() ?>
                </div>
                <div class="form-group col-md-12 form-group1">
                    <?= $form->field($model, 'password')->passwordInput()->label('Password*') ?>
                </div>
                <div class="form-group col-md-12 form-group1">
                    <?= $form->field($model, 'password_repeat')->passwordInput()->label('Confirm Password*') ?>
                </div>
                <div class="form-group login-group-checkbox col-md-12 form-group1">
                    <?= $form->field($model, 'rules')->checkbox() ?>
                </div>
                <div class="form-group login-group-checkbox col-md-12 form-group1">
                    <?= $form->field($model, 'notification')->checkbox() ?>
                </div>
                <?= Html::submitButton('submit', ['class' => 'green2']) ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
<div class="pad-20"></div>
