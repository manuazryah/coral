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
                            <div class="col-md-6">
                                <p>Is the recipient female or male?</p>
                                <?php foreach ($gender as $value) { ?>
                                    <input class="gender" type="radio" name="gender" value="<?= $value->id ?>" data-val='<?= Yii::$app->homeUrl; ?>uploads/create_your_own/gender/<?= $value->id ?>.<?= $value->img ?>'> <?= $value->gender ?><br>
                                <?php }
                                ?>
                            </div>
                            <div class="col-md-6">
                                <img src="<?= Yii::$app->homeUrl; ?>images/coral/create_yourown_common.png" class="img-responsive" id="gender_image"/>
                            </div>
                            <div class="col-md-12">
                                <a class="btn btn-primary btnNext" >Next</a>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab2">
                            <div class="col-md-6">
                                <p class="tab-2">What character should the fragrance have?</p>
                                <div id="character-div">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <img src="<?= Yii::$app->homeUrl; ?>images/coral/create_yourown_common.png" class="img-responsive" id="character_image"/>
                            </div>
                            <div class="col-md-12">
                                <a class="btn btn-primary btnPrevious" >Previous</a>
                                <a class="btn btn-primary btnNext" >Next</a>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab3">
                            <div class="col-md-6">
                                <p class="tab-3">Which scent do you prefer?</p>
                                <div id="scent-div">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <img src="<?= Yii::$app->homeUrl; ?>images/coral/create_yourown_common.png" class="img-responsive" id="scent_image"/>
                            </div>
                            <div class="col-md-12">
                                <a class="btn btn-primary btnPrevious" >Previous</a>
                                <a class="btn btn-primary btnNext" >Next</a>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab4">
                            <div class="col-md-6">
                                <p class="tab-4">Choose up to 6 ingredients.</p>
                                <div id="notes-div">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <img src="<?= Yii::$app->homeUrl; ?>images/coral/create_yourown_common.png" class="img-responsive"/>
                            </div>
                            <div class="col-md-12">
                                <a class="btn btn-primary btnPrevious" >Previous</a>
                                <a class="btn btn-primary btnNext" >Next</a>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab5">
                            TAB 5
                            <div class="col-md-12">
                                <a class="btn btn-primary btnPrevious" >Previous</a>
                                <a class="btn btn-primary btnNext" >Next</a>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab6">
                            TAB 6
                            <div class="col-md-12">
                                <a class="btn btn-primary btnPrevious" >Previous</a>
                                <a class="btn btn-primary btnNext" >Next</a>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab7">
                            TAB 7
                            <div class="col-md-12">
                                <a class="btn btn-primary btnPrevious" >Previous</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="pad-20"></div>

<script>
    $(document).ready(function () {

        $('.gender').hover(
                function () {
                    var src_value = $(this).attr('data-val');
                    $('#gender_image').attr('src', src_value);
                }, function () {
            var src_value = $('input[name=gender]:checked', '#tab1').attr('data-val');
            if (src_value === undefined || src_value === null) {
                $('#gender_image').attr('src', '/coral/images/coral/create_yourown_common.png');
            } else {
                $('#gender_image').attr('src', src_value);
            }
        });


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
            var curr_val = this.value;
            if (curr_val == 1) {
                $('#gender_image').attr('src', '/coral/uploads/create_your_own/gender/1.png');
            } else if (curr_val == 2) {
                $('#gender_image').attr('src', '/coral/uploads/create_your_own/gender/2.png');
            }
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

        $(document).on('mouseenter', '.character', function () {
            var src_value = $(this).attr('data-val');
            $('#character_image').attr('src', src_value);
        });

        $(document).on("mouseleave", ".character", function () {
            var src_value = $('input[name=character]:checked', '#tab2').attr('data-val');
            if (src_value === undefined || src_value === null) {
                $('#character_image').attr('src', '/coral/images/coral/create_yourown_common.png');
            } else {
                $('#character_image').attr('src', src_value);
            }
        });

        $(document).on('change', 'input[type=radio][name=character]', function () {
            var src_value = $(this).attr('data-val');
            $('#character_image').attr('src', src_value);
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

        $(document).on('mouseenter', '.scent', function () {
            var src_value = $(this).attr('data-val');
            $('#scent_image').attr('src', src_value);
        });

        $(document).on("mouseleave", ".scent", function () {
            var src_value = $('input[name=scent]:checked', '#tab3').attr('data-val');
            if (src_value === undefined || src_value === null) {
                $('#scent_image').attr('src', '/coral/images/coral/create_yourown_common.png');
            } else {
                $('#scent_image').attr('src', src_value);
            }
        });

        $(document).on('change', 'input[type=radio][name=scent]', function () {
            var src_value = $(this).attr('data-val');
            $('#scent_image').attr('src', src_value);
            $.ajax({
                type: 'POST',
                cache: false,
                async: false,
                data: {data_val: this.value},
                url: '<?= Yii::$app->homeUrl; ?>ajax/scent-session',
                success: function (data) {
                    $("#notes-div").html(data);
                }
            });
        });
        $(document).on('change', '.checkbox', function (e) {
            var count = parseInt($("#note-count").val());
            if (this.checked) {
                if (count < 6) {
                    count = parseInt(count) + 1;
                    $("#note-count").val(parseInt(count));
                } else {
                    $(this).attr("checked", false);
                }
            } else {
                count = parseInt(count) - 1;
                $("#note-count").val(parseInt(count));
            }
        });
    });
    function validateDatas(id) {
        if ('tab-' + id == 'tab-1') {
            var result = validateCommon('.gender');
        }
        if ('tab-' + id == 'tab-2') {
            var result = validateCommon('.character');
        }
        if ('tab-' + id == 'tab-3') {
            var result = validateCommon('.scent');
        }
        if ('tab-' + id == 'tab-4') {
            var result = validateNotes();
        }
        return result;
    }
    function validateCommon(data) {

        if ($(data).is(':checked')) {
            var valid = 0;
        } else {
            var valid = 1;
        }
        return valid;
    }
    function validateNotes() {
        var count = parseInt($("#note-count").val());
        if (count > 0) {
            var valid = 0;
        } else {
            var valid = 1;
        }
        return valid;
    }
</script>