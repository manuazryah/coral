<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
?>
<div class="pad-20 hide-xs"></div>

<div class="container">
    <div class="breadcrumb">
        <span class="current-page">Create Your Own</span>
        <ol class="path">
            <li><?= Html::a('<span>Home</span>', ['index'], ['class' => '']) ?></li>
            <li class="active">Create Your Own</li>
        </ol>
    </div>
</div>

<div id="about-page">
    <div class="container">
        <div class="row">
            <div class="create-your-own-section">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs">
                        <li class="active" id="tab-1" class="tab-list"><a href="#tab1" data-toggle="tab">Gender</a></li>
                        <li id="tab-2" class="tab-list"><a href="#tab2" data-toggle="tab">Character</a></li>
                        <li id="tab-3" class="tab-list"><a href="#tab3" data-toggle="tab">Scent</a></li>
                        <li id="tab-4" class="tab-list"><a href="#tab4" data-toggle="tab">Notes</a></li>
                        <li id="tab-5" class="tab-list"><a href="#tab5" data-toggle="tab">Bottle</a></li>
                        <li id="tab-6" class="tab-list"><a href="#tab6" data-toggle="tab">Label</a></li>
                        <li id="tab-7" class="tab-list"><a href="#tab7" data-toggle="tab">Done</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">
                            <p>Is the recipient female or male?</p>
                            <input class="gender" type="radio" name="gender" value="1"> Male<br>
                            <input class="gender" type="radio" name="gender" value="2"> Female<br>
                        </div>
                        <div class="tab-pane" id="tab2">
                            <p class="tab-2">What character should the fragrance have?</p>
                            <div id="character-div">
                            </div>
                        </div>
                        <div class="tab-pane" id="tab3">
                            <p class="tab-2">Which scent do you prefer?</p>
                            <div id="scent-div">
                            </div>
                        </div>
                        <div class="tab-pane" id="tab4">
                            TAB 4
                        </div>
                        <div class="tab-pane" id="tab5">
                            TAB 5
                        </div>
                        <div class="tab-pane" id="tab6">
                            TAB 6
                        </div>
                        <div class="tab-pane" id="tab7">
                            TAB 7
                        </div>
                    </div>
                    <a class="btn btn-primary btnPrevious" >Previous</a>
                    <a class="btn btn-primary btnNext" >Next</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="pad-20"></div>

<script>
    $(document).ready(function () {

//        $('.tab-list').click(function (e) {
//            var id = $(".nav-tabs li.active").attr('id').match(/\d+/);
//            if (validateDatas(id) == 0) {
//                alert('if');
//                $('#tab' + id + ' .validation').remove();
//                $('.nav-tabs > .active').next('li').find('a').trigger('click');
//            } else {
//                alert('else');
//                if (!$('.validation').length) {
//                    $('#tab' + id + ' p').after("<p class='validation' style='color: red;'>Please select an option!</p>");
//                }
//                e.preventDefault();
//            }
//        });

        $('.btnNext').click(function () {
            var id = $(".nav-tabs li.active").attr('id').match(/\d+/);
            if (validateDatas(id) == 0) {
                $('#tab' + id + ' .validation').remove();
                $('.nav-tabs > .active').next('li').find('a').trigger('click');
            } else {
                if (!$('.validation').length) {
                    $('#tab' + id + ' p').after("<p class='validation' style='color: red;'>Please select an option!</p>");
                }
            }
        });

        $('.btnPrevious').click(function () {
            $('.nav-tabs > .active').prev('li').find('a').trigger('click');
        });
        $(document).on('change', 'input[type=radio][name=gender]', function () {
            $.ajax({
                type: 'POST',
                cache: false,
                async: false,
                data: {data_val: this.value},
                url: '<?= Yii::$app->homeUrl; ?>ajax/gender-session',
                success: function (data) {
                    $("#character-div").html(data);
                }
            });
        });

        $(document).on('change', 'input[type=radio][name=character]', function () {
            $.ajax({
                type: 'POST',
                cache: false,
                async: false,
                data: {data_val: this.value},
                url: '<?= Yii::$app->homeUrl; ?>ajax/character-session',
                success: function (data) {
                    $("#scent-div").html(data);
                }
            });
        });

    });
    function validateDatas(id) {
        if ('tab-' + id == 'tab-1') {
            var result = validateGender();
        }
        if ('tab-' + id == 'tab-2') {
            var result = validateCharacter();
        }
        if ('tab-' + id == 'tab-3') {
            var result = validateScent();
        }
        return result;
    }
    function validateGender() {

        if ($('.gender').is(':checked')) {
            var valid = 0;
        } else {
            var valid = 1;
        }
        return valid;
    }
    function validateCharacter() {

        if ($('.character').is(':checked')) {
            var valid = 0;
        } else {
            var valid = 1;
        }
        return valid;
    }
    function validateScent() {

        if ($('.scent').is(':checked')) {
            var valid = 0;
        } else {
            var valid = 1;
        }
        return valid;
    }
</script>