//$(document).ready(function () {
//    $("#add_category").click(function () {add_category
//$(document).on('click', '.add_category', function () {
//    $('#modal-1').modal('show', {backdrop: 'fade'});
//});


/****      Add Category     *****/
$(document).on('submit', '#add_category', function (event) {
    event.preventDefault();
    if (valid()) {
        var category = $('#subcategory-category').val();
        var form = $('.modal-title').attr('field_id');
        $.ajax({
            url: homeUrl + 'product/category/ajaxaddcategory',
            type: "post",
            data: {cat: category, status: status},
            success: function (data) {
                var $data = JSON.parse(data);
                if ($data.con === "1") {
                    $('#' + form).append($('<option value="' + $data.id + '" selected="selected">' + $data.category + '</option>'));
//                    $('#'+form).val('');
//                    $('#subcategory-category_id').append($('<option value="' + $data.id + '" selected="selected">' + $data.category + '</option>'));
//                    $('#subcategory-category').val('');
                    $('#modal-1').modal('toggle');
                } else {

                }

            }, error: function () {

            }
        });
    } else {
        alert('Please fill the Field');
    }

//$("#add_category").on(submit(function () {

});
/****      Add Sub Category     *****/
$(document).on('submit', '#add_subcategory', function (event) {
    event.preventDefault();
    var category = $('#product-prcat').val();
    var catname = $('#product-prcat option:selected').text();
    var subcat = $('#product_subcat').val();
    var form = $('.modal-title').attr('field_id');
    $.ajax({
        url: homeUrl + 'product/sub-category/ajaxaddsubcat',
        type: "post",
        data: {cat: category, subcat: subcat},
        success: function (data) {
            var $data = JSON.parse(data);
            if ($data.con === "1") {
                $('#product-category').append($('<option value="' + category + '" selected="selected">' + catname + '</option>'));
                $('#product-subcategory').append($('<option value="' + $data.id + '" selected="selected">' + $data.subcategory + '</option>'));
                $('#modal-2').modal('toggle');
            } else {

            }

        }, error: function () {

        }
    })
});
/****      Add Unit     *****/
$(document).on('submit', '#add_unit', function (event) {
    event.preventDefault();
    var unit = $('#product_unit').val();
    var form = $('.modal-title').attr('field_id');
    $.ajax({
        url: homeUrl + 'product/unit/ajaxaddunit',
        type: "post",
        data: {unit: unit},
        success: function (data) {
            var $data = JSON.parse(data);
            if ($data.con === "1") {
                $('#' + form).append($('<option value="' + $data.id + '" selected="selected">' + $data.unit + '</option>'));
                $('#modal-3').modal('toggle');
            } else {

            }

        }, error: function () {

        }
    })
});
/****      Add Search tag     *****/
$(document).on('submit', '#add_searchtag', function (event) {
    event.preventDefault();
        var tag = $('#search-tag').val();
        var form = $('.modal-title4').attr('field_id');
        $.ajax({
            url: homeUrl + 'product/master-search-tag/ajaxaddtag',
            type: "post",
            data: {tag: tag},
            success: function (data) {
                var $data = JSON.parse(data);
                if ($data.con === "1") {
                    $('#' + form).append($('<option value="' + $data.id + '" >' + $data.tag + '</option>'));
//                    $('#'+form).val('');
//                    $('#subcategory-category_id').append($('<option value="' + $data.id + '" selected="selected">' + $data.category + '</option>'));
//                    $('#subcategory-category').val('');
                    $('#modal-4').modal('toggle');
                } else if($data.con === "2"){
                    alert($data.error);
                }

            }, error: function () {

            }
        });
    

//$("#add_category").on(submit(function () {

});


$('.add_unit').click(function () {
    var unit = $(this).attr('attr_id');
    $('.modal-title').attr('field_id', unit);
});

$("#product-category").change(function () {
    $.ajax({
//            url: $base_url + 'event_item/select_event',
        url: 'subcategory',
        type: "post",
        data: {category: this.value},
        success: function (data) {

            $('#product-subcategory ').html("").html(data);
        }, error: function () {

        }
    });
});
var valid = function () { //Validation Function - Sample, just checks for empty fields
    var valid;
    $("input").each(function () {
        if ($('#subcategory-category').val() === "") {
            var a = $(this).val();
            valid = false;
        }
    });
    if (valid !== false) {
        return true;
    } else {
        return false;
    }
}
//    });
//});