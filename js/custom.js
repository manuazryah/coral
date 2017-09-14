$(document).ready(function () {
    getrecentproduct();
    getwishlistproduct();
    getcartcount();
    getcarttotal();
    getcartdata();
    $(".cart_items").mouseover(function () {
        $('.shoper-cart').removeClass('hide');
    });
//    $(".shoper-content").mouseout(function(){
//        $('.shoper-cart').addClass('hide');
//    });

    $("body").on("click", ".shoper-content-inner>.shoper-con-det>.remove_item", function () {
        var cartid = $(this).attr('cartid');
        var canname = $(this).attr('canname');
        removecart(cartid, canname);


    });
    $(".add_to_cart").click(function () {
        var canname = $(this).attr('id');
//        var canname = $("#cano_name_" + id).val();
        var qty = $('.q_ty').val();
        addtocart(canname, qty);
    });

    $(".add-cart").click(function () {
        var canname = $(this).attr('id');
        var list_id = $(this).attr('data-val');
        var qty = $('.q_ty').val();
        $.ajax({
            type: "POST",
            url: homeUrl + 'cart/buynow',
            data: {cano_name: canname, qty: qty}
        }).done(function (data) {
            if (data == 9) {

                $('.option_errors').html('<p>Invalid Product.Please try again</p>').show();
            } else {
                removewishlist(list_id, canname);
                getcartcount();
                getcarttotal();
                $(".shopping-cart").fadeToggle("fast");
                $(".shopping-cart-items").html(data);
            }
            hideLoader();
        });
    });

    $(".remove-wish-list").click(function () {
        var canname = $(this).attr('id');
        var list_id = $(this).attr('data-val');
        alert(canname);
        alert(list_id);
        removewishlist(list_id, canname);
    });

    $(".add_to_wish_list").click(function () {
        var id = $(this).attr('id');
        addwishlist(id);
    });
    $('.cart_quantity').on('click', function () {
        var id = $(this).attr('id');
        var price = $('.price_' + id).html();
        var quantity = $('#quantity_' + id).val();
        var total = (parseInt(price) * parseInt(quantity));
        updatecart(id, quantity, total);
        $("#quantity2_" + id).val(parseInt(quantity));

    });
    $('.quantity').on('change keyup', function () {
        var quantity = this.value
        var $ids = $(this).attr('id');
        var ids = $ids.split('_');
        var id = ids['1'];
        var price = $('.price_' + id).html();
        var max = $(this).attr('max');
        if (quantity != '' && parseInt(quantity) > '0') {
            if (parseInt(quantity) <= parseInt(max)) {
                var total = (parseInt(price) * parseInt(quantity));
                $('#quantity_' + id).val(parseInt(quantity));
                $("#quantity2_" + id).val(parseInt(quantity));
                updatecart(id, quantity, total);
            } else {
                $('#quantity_' + id).val(max);
            }
        } else if (quantity != '') {
            $('#quantity_' + id).val('1');
        }
    });

});
/******/
function removewishlist(list_id, canname) {
    $.ajax({
        url: homeUrl + 'cart/remove-wishlist',
        type: "POST",
        data: {wish_list_id: list_id},
        success: function (data) {
            $('#' + canname).remove();
        }
    });
}
function updatecart(id, quantity, total) {
    $.ajax({
        type: "POST",
        url: homeUrl + 'cart/updatecart',
        data: {cartid: id, quantity: quantity},
        success: function (data) {
            var $data = JSON.parse(data);
            if ($data.msg === "success") {
                $('.subtotal').html('AED ' + $data.subtotal);
                $('.total_' + id).html('AED ' + total);
            }
//
        }
    });
}
/******/
function addwishlist(id) {

    $.ajax({
        type: "POST",
        cache: 'false',
        async: false,
        url: homeUrl + 'product/savewishlist',
        data: {product_id: id}
    }).done(function (data) {
        $(".amount").html(data);
        hideLoader();
    });
}

function getcarttotal() {

    $.ajax({
        type: "POST",
        cache: 'false',
        async: false,
        url: homeUrl + 'cart/getcarttotal',
        data: {}
    }).done(function (data) {
        $(".cart_amount").html(data);
        hideLoader();
    });
}
function getcartdata() {
    $.ajax({
        type: "POST",
        cache: 'false',
        async: false,
        url: homeUrl + 'cart/selectcart',
        data: {}
    }).done(function (data) {
        $(".shopping-cart-items").html(data);
        //$(".cart_box").show('fast');
        hideLoader();
    });
}

function getcartcount() {

    $.ajax({
        type: "POST",
        cache: 'false',
        async: false,
        url: homeUrl + 'cart/getcartcount',
        data: {}
    }).done(function (data) {
        $(".cart_count").html('(' + data + ')');
        hideLoader();
    });
}
function getrecentproduct() {

    $.ajax({
        type: "POST",
        cache: 'false',
        async: false,
        url: homeUrl + 'product/getrecentproduct',
        data: {}
    }).done(function (data) {
    });
}

function getwishlistproduct() {

    $.ajax({
        type: "POST",
        cache: 'false',
        async: false,
        url: homeUrl + 'product/getwishlistproduct',
        data: {}
    }).done(function (data) {
    });
}

function removecart(cartid, canname) {

    $.ajax({
        type: "POST",
        cache: 'false',
        async: false,
        url: homeUrl + 'cart/removecart',
        data: {cartid: cartid, cano_name: canname}
    }).done(function (data) {
        getcartcount();
        getcarttotal();
        $(".shoper-cart").html(data);
//        $(".shoper-content").html('').html(data);
//        //alert(data);
//        if (data == 'Cart box is Empty') {
//            window.location.href = baseurl + "cart/mycart";
//        } else {
//            location.reload();
//        }
        hideLoader();
    });

}
/****/
function addtocart(canname, qty) {
    $.ajax({
        type: "POST",
        url: homeUrl + 'cart/buynow',
        data: {cano_name: canname, qty: qty}
    }).done(function (data) {
        if (data == 9) {

            $('.option_errors').html('<p>Invalid Product.Please try again</p>').show();
        } else {
            getcartcount();
            getcarttotal();
//            $('.option_errors').html("").hide();
            $(".shopping-cart").fadeToggle("fast");
            $(".shopping-cart-items").html(data);
        }
        hideLoader();
    });
}
function hideLoader() {
    $('.over-lay').hide();
}

