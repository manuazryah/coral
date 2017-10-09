//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(document).on('click', '.next', function () {

    var id = $(this).closest("fieldset").attr('id').match(/\d+/);
    if (validateDatas(id) == 0) {
        if (animating)
            return false;
        animating = true;

        current_fs = $(this).parent();
        next_fs = $(this).parent().next();
        //activate next step on progressbar using the index of next_fs
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

        $('#tab' + id + ' .validation').remove();
        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function (now, mx) {
                //as the opacity of current_fs reduces to 0 - stored in "now"
                //1. scale current_fs down to 80%
                scale = 1 - (1 - now) * 0.2;
                //2. bring next_fs from the right(50%)
                left = (now * 50) + "%";
                //3. increase opacity of next_fs to 1 as it moves in
                opacity = 1 - now;
                current_fs.css({'transform': 'scale(' + scale + ')'});
                next_fs.css({'left': left, 'opacity': opacity});
            },
            duration: 800,
            complete: function () {
                current_fs.hide();
                animating = false;
            },
            //this comes from the custom easing plugin
            easing: 'easeInOutBack'
        });
    } else {
        if (!$('.validation').length) {
            $('#tab' + id + ' .step_col_left').before("<p class='validation' style='color: red;'>Please select an option!</p>");
        }
    }
});

$(".previous").click(function () {
    if (animating)
        return false;
    animating = true;

    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();

    //de-activate current step on progressbar
    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

    //show the previous fieldset
    previous_fs.show();
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
        step: function (now, mx) {
            //as the opacity of current_fs reduces to 0 - stored in "now"
            //1. scale previous_fs from 80% to 100%
            scale = 0.8 + (1 - now) * 0.2;
            //2. take current_fs to the right(50%) - from 0%
            left = ((1 - now) * 50) + "%";
            //3. increase opacity of previous_fs to 1 as it moves in
            opacity = 1 - now;
            current_fs.css({'left': left});
            previous_fs.css({'transform': 'scale(' + scale + ')', 'opacity': opacity});
        },
        duration: 800,
        complete: function () {
            current_fs.hide();
            animating = false;
        },
        //this comes from the custom easing plugin
        easing: 'easeInOutBack'
    });
});

$('.gender-main').hover(
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

$(".submit").click(function () {
    return false;
});

/***********************************************label******************************************/
jQuery(function () {
    jQuery('#showall').click(function () {
        jQuery('.targetDiv').show();
    });
    jQuery('.showSingle').click(function () {
        jQuery('.targetDiv').hide();
        jQuery('#div' + $(this).attr('target')).show();
    });
});
$("#tab9").click(function () {
    $("#container").append('<div class="tmb-img"><img src="images/create-your-own/violet_leaves-XS.png"><button href="" id="cls-img"><i class="fa fa-times" aria-hidden="true"></i></button></div>');
});
$("#tab10").click(function () {
    $("#container").append('<div class="tmb-img"><img src="images/create-your-own/lilie.png"><button href="" id="cls-img"><i class="fa fa-times" aria-hidden="true"></i></button></div>');
});
$("#tab11").click(function () {
    $("#container").append('<div class="tmb-img"><img src="images/create-your-own/violet_leaves-XS.png"><button href="" id="cls-img"><i class="fa fa-times" aria-hidden="true"></i></button></div>');
});
$("#tab12").click(function () {
    $("#container").append('<div class="tmb-img"><img src="images/create-your-own/lilie.png"><button href="" id="cls-img"><i class="fa fa-times" aria-hidden="true"></i></button></div>');
});
$("#tab13").click(function () {
    $("#container").append('<div class="tmb-img"><img src="images/create-your-own/violet_leaves-XS.png"><button href="" id="cls-img"><i class="fa fa-times" aria-hidden="true"></i></button></div>');
});
$("#tab14").click(function () {
    $("#container").append('<div class="tmb-img"><img src="images/create-your-own/lilie.png"><button href="" id="cls-img"><i class="fa fa-times" aria-hidden="true"></i></button></div>');
});

//    var count = 0;
//    document.getElementById("#tab10").onClick = function (e) {
//        if (count >= 2) {
//            return false;
//        }
//        else {
//            count++;
//            document.getElementById("#container"").innerHTML += " < div class = "tmb-img" > < img src = "http://www.uniquefragrance.com/media/zutaten/thumb/lilie.png" > < button id = "cls-img" > < i class = "fa fa-times" aria - hidden = "true" > < /i></button > < /div>";
//        }
//    };
$(function () {
    $('.button-checkbox').each(function () {

        // Settings
        var $widget = $(this),
                $button = $widget.find('button'),
                $checkbox = $widget.find('input:checkbox'),
                color = $button.data('color'),
                settings = {
                    on: {
                        icon: 'glyphicon glyphicon-check'
                    },
                    off: {
                        icon: 'glyphicon glyphicon-unchecked'
                    }
                };

        // Event Handlers
        $button.on('click', function () {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });
        $checkbox.on('change', function () {
            updateDisplay();
        });

        // Actions
        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');

            // Set the button's state
            $button.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $button.find('.state-icon')
                    .removeClass()
                    .addClass('state-icon ' + settings[$button.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $button
                        .removeClass('btn-default')
                        .addClass('btn-' + color + ' active');
            } else {
                $button
                        .removeClass('btn-' + color + ' active')
                        .addClass('btn-default');
            }
        }

        // Initialization
        function init() {

            updateDisplay();

            // Inject the icon if applicable
            if ($button.find('.state-icon').length == 0) {
//                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i>');
            }
        }
        init();
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
    if ('tab-' + id == 'tab-5') {
        var result = validateCommon('.bottle');
    }
    if ('tab-' + id == 'tab-6') {
        var result = validateLabel();
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
function validateLabel() {
    var line1 = $('#line-1').val();
    var line2 = $('#line-2').val();
    $.ajax({
        type: 'POST',
        cache: false,
        async: false,
        data: {line_1: line1, line_2: line2},
        url: homeUrl + 'ajax/label-session',
        success: function (data) {
            var res = $.parseJSON(data);
            $('#done-heading').text(res.result['heading']);
            $('#first_line').text(res.result['first-line']);
            $('#second_line').text(res.result['second-line']);
            $('#tot-amt').text(res.result['tot-count']);
            $("#note-images").html(res.result['note-imgs']);
            $('#bottle2_image').attr('src', res.result['bottle-src']);
        }
    });
    var valid = 0;
    return valid;
}