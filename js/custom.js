$(document).ready(function () {
    getrecentproduct();
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
//            $(".successcart_msg").html("");

        var id = $(this).attr('id');
        var canname = $("#cano_name_" + id).val();
        var qty = $('.q_ty').val();
        var option_color = 0;
        var option_size = 0;
        var master_option = 0;
        addtocart(canname, qty, option_color = null, option_size = null, master_option = null);
    });

});
/******/
function getcarttotal() {

    $.ajax({
        type: "POST",
        cache: 'false',
        async: false,
        url: homeUrl + 'cart/getcarttotal',
        data: {}
    }).done(function (data) {
        $(".amount").html(data);
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
        $(".cart_count").html('('+data+')');
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
//        $(".cart_items").html(data + ' Items');
//        hideLoader();
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
function addtocart(canname, qty, option_color, option_size, master_option) {

    if (option_color === undefined) {
        option_color = null;
    }
    if (option_size === undefined) {
        option_size = null;
    }
    if (master_option === undefined) {
        master_option = null;
    }
    $.ajax({
        type: "POST",
        url: homeUrl + 'cart/buynow',
        data: {cano_name: canname, qty: qty, option_color: option_color, option_size: option_size, master_option: master_option}
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

