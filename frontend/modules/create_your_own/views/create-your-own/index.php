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
            <li><?= Html::a('Home', ['/site/index'], ['class' => '']) ?></li>
            <li class="active">Create Your Own</li>
        </ol>
    </div>
</div>


<div id="create-your-own">
    <div class="container hidden-xs">
        <div class="row">
            <!-- multistep form -->
            <form id="msform">
                <!-- progressbar -->
                <ul id="progressbar">
                    <li class="active"><i class="label">GENDER</i></li>
                    <li><i class="label">Character</i></li>
                    <li><i class="label">scent</i></li>
                    <li><i class="label">Notes</i></li>
                    <li><i class="label">Bottle</i></li>
                    <li><i class="label">Label</i></li>
                    <li><i class="label">Done!</i></li>
                </ul>
            </form>
        </div>
    </div>

    <div class="hint-border-bck">
    </div>
    <div class="container" style="min-height: 470px;">
        <form id="msform">
            <!-- Gender -->
            <fieldset id="tab1">
                <div class="hint-border">
                    <div class="container hint">
                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 bck-arrow">
                            <a href="#"><button class="back" name="previous" class="previous action-button back" value="Previous"><img src="<?= Yii::$app->homeUrl; ?>images/create-your-own-arrw.png"/></button></a>
                            <!--<input type="button" name="previous" class="previous action-button back" value="Previous" />-->
                        </div>
                        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-10 hint-msg-box">
                            <p class="hint-msg">Is the recipient female or male?</p>
                        </div>
                    </div>
                </div>
                <div class="step_col_left">
                    <?php
                    $g = 0;
                    foreach ($gender as $value) {
                        $g++;
                        ?>
                        <label class="image-toggler choose gender-main" data-image-id="#image1" id="tab-<?= $value->id ?>" data-val='<?= Yii::$app->homeUrl; ?>uploads/create_your_own/gender/<?= $value->id ?>.<?= $value->img ?>'>
                            <input class="gender" type="radio" name="gender" value="<?= $value->id ?>" data-val='<?= Yii::$app->homeUrl; ?>uploads/create_your_own/gender/<?= $value->id ?>.<?= $value->img ?>'>
                            <!--<input type="radio" name="toggle" name2="service_frequency" value="<?= $value->id ?>" class="tab gender" id="tab1" checked="" data-val='<?= Yii::$app->homeUrl; ?>uploads/create_your_own/gender/<?= $value->id ?>.<?= $value->img ?>'>-->
                            <span><?= $value->gender ?></span>
                        </label>
                    <?php }
                    ?>
                </div>
                <div class="step_col_right">
                    <div id="tab1show" class="tab-content">
                        <img src="<?= Yii::$app->homeUrl; ?>images/coral/create_yourown_common.png" class="img-responsive" id="gender_image"/>
<!--                        <img  src="images/create-your-own/Women.png" title="WOMEN" alt="image 1" id="image1" class="image-toggle img-responsive" />-->
                    </div>
                </div>
                <input type="button" name="next" class="next action-button nxt" value="Next" />
            </fieldset>

            <!-- Gender -->

            <!-- character-end -->

            <fieldset id="tab2">
                <div class="hint-border">
                    <div class="container hint">
                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 bck-arrow">
                            <a href="#"><button class="back" name="previous" class="previous action-button back" value="Previous"><img src="<?= Yii::$app->homeUrl; ?>images/create-your-own-arrw.png"/></button></a>
                            <!--<input type="button" name="previous" class="previous action-button back" value="Previous" />-->
                        </div>
                        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-10 hint-msg-box">
                            <p class="hint-msg">What character should the fragrance have?</p>
                        </div>
                    </div>
                </div>
                <div class="step_col_left">
                </div>
                <div class="step_col_right">
                    <div id="tab3show" class="tab-content">
                        <img src="<?= Yii::$app->homeUrl; ?>images/coral/create_yourown_common.png" class="img-responsive" id="character_image"/>
                        <!--<img  src="images/create-your-own/Women.png" title="WOMEN" alt="image 1" id="image1" class="image-toggle img-responsive" />-->
                    </div>
                </div>
                <input type="button" name="previous" class="previous prev action-button" value="Previous" />
                <input type="button" name="next" class="next nxt action-button" value="Next" />
            </fieldset>

            <!-- character-end -->

            <!-- Scent -->

            <fieldset id="tab3">
                <div class="hint-border">
                    <div class="container hint">
                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 bck-arrow">
                            <a href="#"><button class="back" name="previous" class="previous action-button back" value="Previous"><img src="<?= Yii::$app->homeUrl; ?>images/create-your-own-arrw.png"/></button></a>
                            <!--<input type="button" name="previous" class="previous action-button back" value="Previous" />-->
                        </div>
                        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-10 hint-msg-box">
                            <p class="hint-msg">Which scent do you prefer?</p>
                        </div>
                    </div>
                </div>
                <div class="step_col_left">
                </div>
                <div class="step_col_right">
                    <img src="<?= Yii::$app->homeUrl; ?>images/coral/create_yourown_common.png" class="img-responsive" id="scent_image"/>
                </div>
                <input type="button" name="previous" class="previous prev action-button" value="Previous" />
                <input type="button" name="next" class="next nxt action-button" value="Next" />
            </fieldset>

            <!-- Scent-end -->
            <!-- Notes -->
            <fieldset id="tab4">
                <div class="hint-border">
                    <div class="container hint">
                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 bck-arrow">
                            <a href="#"><button class="back" name="previous" class="previous action-button back" value="Previous"><img src="<?= Yii::$app->homeUrl; ?>images/create-your-own-arrw.png"/></button></a>
                            <!--<input type="button" name="previous" class="previous action-button back" value="Previous" />-->
                        </div>
                        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-10 hint-msg-box">
                            <p class="hint-msg">Choose up to 6 ingredients.</p>
                        </div>
                    </div>
                </div>
                <div class="step_col_left">
                    <div id="notes">
                        <div class="product-info-tab">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#recommended">Recommended<span class="counter" id="rec-count"></span></a></li>
                                <li><a data-toggle="tab" href="#all">All<span class="counter" id="all-count"></span></a></li>
                            </ul>

                            <div class="tab-content notes-selection">
                                <div id="recommended" class="tab-pane fade in active">

                                </div>
                                <div id="all" class="tab-pane fade">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="step_col_right">
                    <div id="tab9show" class="tab-content">
                        <img src="<?= Yii::$app->homeUrl; ?>images/coral/create_yourown_common.png" class="img-responsive" id="notes_image"/>
                    </div>

                    <div class="perfume-selectionbg">
                        <div class="thumb-contain">
                            <div id="container">

                                <div class="tmb-img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="button" name="previous" class="previous prev action-button" value="Previous" />
                <input type="button" name="next" class="next nxt action-button" value="Next" />
            </fieldset>

            <!-- Notes-end -->
            <fieldset id="tab5">
                <div class="hint-border">
                    <div class="container hint">
                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 bck-arrow">
                            <a href="#"><button class="back" name="previous" class="previous action-button back" value="Previous"><img src="<?= Yii::$app->homeUrl; ?>images/create-your-own-arrw.png"/></button></a>
                            <!--<input type="button" name="previous" class="previous action-button back" value="Previous" />-->
                        </div>
                        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-10 hint-msg-box">
                            <p class="hint-msg">Choose the flacon for your perfume.</p>
                        </div>
                    </div>
                </div>
                <div class="step_col_left">
                    <div id="kryesore">
                        <?php
                        foreach ($bottle as $val) {
                            ?>
                            <label class="image-toggler choose2 bottle-main" data-image-id="#image1" id="tab-<?= $val->id ?>" data-val='<?= Yii::$app->homeUrl; ?>uploads/create_your_own/bottle/<?= $val->id ?>/large.<?= $val->bottle_img ?>'>
                                <input class="bottle" type="radio" name="bottle" value="<?= $val->id ?>" data-val='<?= Yii::$app->homeUrl; ?>uploads/create_your_own/bottle/<?= $val->id ?>/large.<?= $val->bottle_img ?>'>
                                <span class="span2"><?= $val->name ?></span>
                            </label>
                        <?php }
                        ?>
                    </div>
                </div>
                <div class="step_col_right">
                    <img src="<?= Yii::$app->homeUrl; ?>images/coral/create_yourown_common.png" class="img-responsive" id="bottle_image"/>
                </div>
                <input type="button" name="previous" class="previous prev action-button" value="Previous" />
                <input type="button" name="next" class="next nxt action-button" value="Next" />
            </fieldset>

            <fieldset id="tab6">
                <div id="dialog_box" style="display: none;">
                    Really delete?
                </div>
                <div class="hint-border">
                    <div class="container hint">
                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 bck-arrow">
                            <a href="#"><button class="back" name="previous" class="previous action-button back" value="Previous"><img src="<?= Yii::$app->homeUrl; ?>images/create-your-own-arrw.png"/></button></a>
                            <!--<input type="button" name="previous" class="previous action-button back" value="Previous" />-->
                        </div>
                        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-10 hint-msg-box">
                            <p class="hint-msg">Whats the name of your perfume?</p>
                        </div>
                    </div>
                </div>
                <div class="step_col_left">
                    <input class="max-len-limit" type="text" name="line-1" id="line-1" value="" placeholder="Enter label1 text here" maxlength=""/>
                    <p class="max-len" style="float:right;font-size: 11px;"></p>
                    <input class="max-len-limit" type="text" name="line-2" id="line-2" value="" placeholder="Enter label2 text here" maxlength=""/>
                    <p class="max-len" style="float:right;font-size: 11px;"></p>
                </div>
                <div class="step_col_right">
                    <img src="" class="img-responsive" id="bottle1_image"/>
                </div>
                <input type="button" name="previous" class="previous prev action-button" value="Previous" />
                <input type="button" name="next" class="next nxt action-button" value="Next" />
            </fieldset>

            <fieldset id="tab7">
                <div class="hint-border">
                    <div class="container hint">
                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 bck-arrow">
                            <a href="#"><button class="back" name="previous" class="previous action-button back" value="Previous"><img src="<?= Yii::$app->homeUrl; ?>images/create-your-own-arrw.png"/></button></a>
                            <!--<input type="button" name="previous" class="previous action-button back" value="Previous" />-->
                        </div>
                        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-10 hint-msg-box">
                            <p class="hint-msg">Done!</p>

                        </div>
                    </div>
                </div>
                <div class="step_col_left" style="width: 435px;">
                    <p style="text-align: center;font-weight: 600;padding-bottom: 15px;" id="done-heading"></p>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <h3 style="text-align:left;font-size: 20px;font-weight: 600;" id="first_line"></h3>
                            <h4 style="text-align:left;font-size: 18px;font-weight: 600;" id="second_line"></h4>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <h2 style="text-align:right;font-size: 22px;font-weight: 600;" id="tot-amt"></h2>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 35px;">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="note-images" style="padding:0px;">
                        </div>
                    </div>
                </div>
                <div class="step_col_right" style="width: 465px;">
                    <img src="" class="img-responsive" id="bottle2_image"/>
                </div>
                <input type="button" name="previous" class="previous prev action-button" value="Previous" />
                <input type="button" name="checkout" class="chkout action-button" value="Checkout" />
            </fieldset>
        </form>
    </div>

    <div id="how-it-works" class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3 class="innerpage-hdng text-center">Create Your Own Perfumes or Cologne</h3>
            </div>
            <h5 class="heading text-center">HOW IT WORKS</h5>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 marg-bttm-30">
                <div class="step-1 text-center">
                    <div class="icon"><i class="fa fa-unlock-alt" aria-hidden="true"></i></div>
                    <p class="sub-hdng">Choose a scent type for your own perfume </p>
                    <p class="details">We are using the best ingredients and raw materials available on the world market only. From Essences, over bottles  to packaging, we are working with realiable partners long term premium suppliers.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 marg-bttm-30">
                <div class="step-2 text-center">
                    <div class="icon"><i class="fa fa-unlock-alt" aria-hidden="true"></i></div>
                    <p class="sub-hdng">Choose a scent type for your own perfume </p>
                    <p class="details">We are using the best ingredients and raw materials available on the world market only. From Essences, over bottles  to packaging, we are working with realiable partners long term premium suppliers.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 marg-bttm-30">
                <div class="step-3 text-center">
                    <div class="icon"><i class="fa fa-unlock-alt" aria-hidden="true"></i></div>
                    <p class="sub-hdng">Choose a scent type for your own perfume </p>
                    <p class="details">We are using the best ingredients and raw materials available on the world market only. From Essences, over bottles  to packaging, we are working with realiable partners long term premium suppliers.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="happy-slider">
        <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:240px;overflow:hidden;visibility:hidden;">
            <!-- Loading Screen -->
            <div data-u="loading" style="position:absolute;top:0px;left:0px;background-color:rgba(0,0,0,0.7);">
                <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
                <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
            </div>
            <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:100%;height:240px;overflow:hidden;">
                <div>
                    <img data-u="image" src="<?= Yii::$app->homeUrl; ?>images/happy-slider/1.jpg" />
                </div>
                <div>
                    <img data-u="image" src="<?= Yii::$app->homeUrl; ?>images/happy-slider/2.jpg" />
                </div>
                <div>
                    <img data-u="image" src="<?= Yii::$app->homeUrl; ?>images/happy-slider/3.jpg" />
                </div>
                <div>
                    <img data-u="image" src="<?= Yii::$app->homeUrl; ?>images/happy-slider/4.jpg" />
                </div>
                <div>
                    <img data-u="image" src="<?= Yii::$app->homeUrl; ?>images/happy-slider/1.jpg" />
                </div>
                <div>
                    <img data-u="image" src="<?= Yii::$app->homeUrl; ?>images/happy-slider/2.jpg" />
                </div>
                <div>
                    <img data-u="image" src="<?= Yii::$app->homeUrl; ?>images/happy-slider/3.jpg" />
                </div>
                <div>
                    <img data-u="image" src="<?= Yii::$app->homeUrl; ?>images/happy-slider/4.jpg" />
                </div>
                <div>
                    <img data-u="image" src="<?= Yii::$app->homeUrl; ?>images/happy-slider/3.jpg" />
                </div>
                <div>
                    <img data-u="image" src="<?= Yii::$app->homeUrl; ?>images/happy-slider/2.jpg" />
                </div>
            </div>
        </div>
    </div>

</div>
<div style="clear: both" class="clearfix"></div>

<!--<div class="pad-20"></div>-->

<script>
    $(document).ready(function () {

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
            if ($(this).is(':checked')) {
                $(this).parent().parent().parent().find('.choose-grn').removeClass('choose-grn');
                $(this).parent().addClass('choose-grn');
            }
            var src_value = $(this).attr('data-val');
            $('#gender_image').attr('src', src_value);
            var curr_val = this.value;
            $.ajax({
                type: 'POST',
                cache: false,
                async: false,
                data: {data_val: this.value},
                url: '<?= Yii::$app->homeUrl; ?>ajax/gender-session',
                success: function (data) {
                    $("#tab2 .step_col_left").html(data);
                }
            });
        });

        $(document).on('mouseenter', '.character-main', function () {
            var src_value = $(this).attr('data-val');
            $('#character_image').attr('src', src_value);
        });

        $(document).on("mouseleave", ".character-main", function () {
            var src_value = $('input[name=character]:checked', '#tab2').attr('data-val');
            if (src_value === undefined || src_value === null) {
                $('#character_image').attr('src', '/coral/images/coral/create_yourown_common.png');
            } else {
                $('#character_image').attr('src', src_value);
            }
        });

        $(document).on('change', 'input[type=radio][name=character]', function () {
            if ($(this).is(':checked')) {
                $(this).parent().parent().parent().find('.choose-grn').removeClass('choose-grn');
                $(this).parent().addClass('choose-grn');
            }
            var src_value = $(this).attr('data-val');
            $('#character_image').attr('src', src_value);
            $.ajax({
                type: 'POST',
                cache: false,
                async: false,
                data: {data_val: this.value},
                url: '<?= Yii::$app->homeUrl; ?>ajax/character-session',
                success: function (data) {
                    $("#tab3 .step_col_left").html(data);
                }
            });
        });

        $(document).on('mouseenter', '.scent-main', function () {
            var src_value = $(this).attr('data-val');
            $('#scent_image').attr('src', src_value);
        });

        $(document).on("mouseleave", ".scent-main", function () {
            var src_value = $('input[name=scent]:checked', '#tab3').attr('data-val');
            if (src_value === undefined || src_value === null) {
                $('#scent_image').attr('src', '/coral/images/coral/create_yourown_common.png');
            } else {
                $('#scent_image').attr('src', src_value);
            }
        });

        $(document).on('change', 'input[type=radio][name=scent]', function () {
            if ($(this).is(':checked')) {
                $(this).parent().parent().parent().find('.choose-grn').removeClass('choose-grn');
                $(this).parent().addClass('choose-grn');
            }
            var src_value = $(this).attr('data-val');
            $('#scent_image').attr('src', src_value);
            $.ajax({
                type: 'POST',
                cache: false,
                async: false,
                data: {data_val: this.value},
                url: '<?= Yii::$app->homeUrl; ?>ajax/scent-session',
                success: function (data) {
                    var res = $.parseJSON(data);
                    $("#tab4 .step_col_left #recommended").html(res.result['recomented']);
                    $("#tab4 .step_col_left #all").html(res.result['all']);
                    $("#tab4 #rec-count").text('(' + res.result['recomented-count'] + ')');
                    $("#tab4 #all-count").text('(' + res.result['all-count'] + ')');
                }
            });
        });

        $(document).on('mouseenter', '.notes-main', function () {
            var src_value = $(this).attr('data-val');
            $('#notes_image').attr('src', src_value);
        });

        $(document).on("mouseleave", ".notes-main", function () {
            var src_value = $('input[name="notes[]"]:checked', '#tab4').attr('data-val');
            if (src_value === undefined || src_value === null) {
                $('#notes_image').attr('src', '/coral/images/coral/create_yourown_common.png');
            } else {
                $('#notes_image').attr('src', src_value);
            }
        });

        $(document).on('click', '.notes-main', function (e) {
            var count = parseInt($("#note-count").val());
            var attr_id = $(this).attr('id');
            var id = $(this).attr('id').match(/\d+/);

            var src_value = $(this).attr('data-val1');
            if (count < 6) {
                $.ajax({
                    type: 'POST',
                    cache: false,
                    async: false,
                    data: {data_val: id},
                    url: '<?= Yii::$app->homeUrl; ?>ajax/add-notes-session',
                    success: function (data) {
                    }
                });
                var item_count = parseInt($('#item-' + id).val());
                var item_val = item_count + 1;
                $('#' + attr_id + ' button').addClass('choose-grn');
                count = parseInt(count) + 1;
                $("#note-count").val(parseInt(count));
                $("#container").append('<div class="tmb-img"><img src="' + src_value + '"><button id="cls-img" class="cls-img" data-val="' + id + '"><i class="fa fa-times" aria-hidden="true"></i></button></div>');
                if (item_val == 1) {
                    $("#" + attr_id + " span").append("  X<span class='items'>1</span");
                } else {
                    $("#" + attr_id + " .items").text(item_val);
                }
                $('#item-' + id).val(item_val);
            }
        });

        $(document).on('click', '.cls-img', function (e) {
            var item_id = $(this).attr('data-val');
            $(this).closest(".tmb-img").fadeOut(300);
            $.ajax({
                type: 'POST',
                cache: false,
                async: false,
                data: {data_val: item_id},
                url: '<?= Yii::$app->homeUrl; ?>ajax/remove-notes-session',
                success: function (data) {
                    var count = parseInt($("#note-count").val());
                    $("#note-count").val(count - 1);
                    var item_count = parseInt($("#item-" + item_id).val());
                    var res_count = item_count - 1;
                    $("#item-" + item_id).val(res_count);
                    if (res_count == 0) {
                        $("#note-" + item_id + " span").text(data);
                        $("#note-" + item_id + ' button').removeClass('choose-grn');
                    } else {
                        $("#note-" + item_id + " .items").text(res_count);
                    }
                    e.preventDefault();
                }
            });
        });

        $(document).on('mouseenter', '.bottle-main', function () {
            var src_value = $(this).attr('data-val');
            $('#bottle_image').attr('src', src_value);
        });

        $(document).on("mouseleave", ".bottle-main", function () {
            var src_value = $('input[name=bottle]:checked', '#tab5').attr('data-val');
            if (src_value === undefined || src_value === null) {
                $('#bottle_image').attr('src', '/coral/images/coral/create_yourown_common.png');
            } else {
                $('#bottle_image').attr('src', src_value);
            }
        });
        $(document).on('change', 'input[type=radio][name=bottle]', function () {
            if ($(this).is(':checked')) {
                $(this).parent().parent().parent().find('.choose-grn').removeClass('choose-grn');
                $(this).parent().addClass('choose-grn');
            }
            var src_value = $(this).attr('data-val');
            $('#bottle_image').attr('src', src_value);
            $.ajax({
                type: 'POST',
                cache: false,
                async: false,
                data: {data_val: this.value},
                url: '<?= Yii::$app->homeUrl; ?>ajax/bottle-session',
                success: function (data) {
                    var res = $.parseJSON(data);
                    $('#bottle_image').attr('src', res.result['bottle-src']);
                    $('#bottle1_image').attr('src', res.result['bottle-src']);
                    $('.max-len').text(res.result['max-length']);
                    $('.max-len-limit').attr('maxlength', res.result['max-limit']);
                }
            });
        });

        $(document).on('click', '.chkout', function (e) {
            $.ajax({
                type: 'POST',
                cache: false,
                async: false,
                data: {data_val: this.value},
                url: '<?= Yii::$app->homeUrl; ?>ajax/check-out',
                success: function (data) {
                    if (data == 0) {
                        alert('Before proceeding to checkout please login');
                        window.open(
                                '<?= Yii::$app->homeUrl; ?>site/login-signup',
                                '_blank' // <- This is what makes it open in a new window.
                                );
                    } else if (data == 1) {
                        window.open(
                                '<?= Yii::$app->homeUrl; ?>cart/mycart',
                                '_blank' // <- This is what makes it open in a new window.
                                );
                    }
                }
            });
        });
    });
</script>


