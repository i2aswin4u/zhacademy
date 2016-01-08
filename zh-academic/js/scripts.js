
$(function() {
    $('body').click($.fn.menuForMicroRemove);
    $('#menu-small').click($.fn.menuForMicroDevicesClicked);
    $.fn.navMenuChildrenTeting();
    var offset = 250;
    var duration = 300;
    //Scroll to top
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > offset) {
            jQuery('.back-to-top').fadeIn(duration);
        } else {
            jQuery('.back-to-top').fadeOut(duration);
        }
    });
    jQuery('.back-to-top').click(function(event) {
        event.preventDefault();
        jQuery('html, body').animate({scrollTop: 0}, duration);
        return false;
    });
    $('.scroll-bottom').click($.fn.scrollToNextSection);
//    $('.mobile-menu-list > li').click();
    $('#tooltipContainerForm .customBtn ul.dropdown-menu li').click($.fn.dropDownListing);
    $('#complte-now-btn').click($.fn.clinicNameValidate);
});
//$.fn.clinicNameValidate
$.fn.clinicNameValidate = function (){
    var clinic_name = $('#hf_site_id');
    var site_id = $('#hf_site_id').val();
    if(site_id.length < 3){
        clinic_name.parent().parent().addClass('has-error');
    }
    if( site_id != "" ) {
      var regx = /^[A-Za-z0-9]+$/;
      if (!regx.test(str)) {
        clinic_name.parent().parent().addClass('has-error');
      }
    }
    else {
        clinic_name.parent().parent().addClass('has-error');
       //empty value -- do something here
    }
    
    debugger;
};

// Drop Down Listing
$.fn.dropDownListing = function() {
    var dropDown = $(this).parent().parent().children('a');
    dropDown.text($(this).text());
    dropDown.append("<span class='dropDownArrorImage'></span>");
};


$.fn.scrollToNextSection = function() {
    var current = $(this).parent().parent().parent(),
            next = current.next('scroll-area');
//     nextScrollTop = next.offset().top();

    debugger;
    $('body').animate({
        scrollTop: next
    });
};
// Check whether there is a submenu or not
$.fn.navMenuChildrenTeting = function() {
    $('.daily-caller-navigation .header-menu li').each(function() {
        if ($(this).children('ul').length > 0) {
            $(this).addClass('has-sub-menu');
        }
    });
};
// Menu For Micro Devices Remove
$.fn.menuForMicroRemove = function(e) {
    var $target = $('.mobile-menu-list,#menu-small,.mobile-menu-list *,#menu-small *');
    if ($($target).is(e.target)) {
        return;
    }
    if ($('.mobile-menu-list').is(':visible')) {
        if ($('.mobile-menu-list').hasClass('mobile-menu-list-toggle')) {
            $('.mobile-menu-list').removeClass('mobile-menu-list-toggle');
        }
    }
};
// Menu For Micro Devices Clicked
$.fn.menuForMicroDevicesClicked = function() {
    $('.mobile-menu-list').toggleClass('mobile-menu-list-toggle');
};





