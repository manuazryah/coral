$(document).ready(function () {

    var multisidetabs = (function () {
        var opt, parentid,
                vars = {
                    listsub: '.list-sub',
                    showclass: 'mg-show'
                },
                test = function () {
                    console.log(parentid);
                },
                events = function () {
                    $(parentid).find('a').on('click', function (ev) {
                        ev.preventDefault();
                        var atag = $(this), childsub = atag.next(vars.listsub);
                        //console.log(atag.text());
                        if (childsub && opt.multipletab == true) {
                            if (childsub.hasClass(vars.showclass)) {
                                childsub.removeClass(vars.showclass).slideUp(500);
                            } else {
                                childsub.addClass(vars.showclass).slideDown(500);
                            }
                        }
                        if (childsub && opt.multipletab == false) {
                            childsub.siblings(vars.listsub).removeClass(vars.showclass).slideUp(500);
                            if (childsub.hasClass(vars.showclass)) {
                                childsub.removeClass(vars.showclass).slideUp(500);
                            } else {
                                childsub.addClass(vars.showclass).slideDown(500);
                            }
                        }
                    });
                },
                init = function (options) 
                {
//                    initials
//                    if (options) {
//                        opt = options;
//                        parentid = '#' + options.id;
//                        //test();
//                        events();
//                    } else {
//                        alert('no options');
//                    }
                }

        return {init: init};
    })();

    multisidetabs.init({
        "id": "mg-multisidetabs",
        "multipletab": false
    });

});