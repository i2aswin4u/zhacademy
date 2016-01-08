jQuery(document).ready(function ($) {
    $('.zh_faq_new li>h2').click(function () {
        $(this).toggleClass('academy-tab-active');
        $(this).children('i.add-btn').toggleClass('fa-plus-square-o');
        $(this).children('i.add-btn').toggleClass('fa-minus-square-o');
        $(this).siblings('ul').toggle();
        $(this).toggleClass('zh_faq_active');
    });
    $('.zh_faq_new li>h4').click(function () {
        $(this).toggleClass('academy-tab-active');
        $(this).children('i.add-btn').toggleClass('fa-plus-square-o');
        $(this).children('i.add-btn').toggleClass('fa-minus-square-o');
        $(this).siblings('.zh_faq_new_answer').slideToggle(100);
        $(this).toggleClass('zh_faq_active');
    });

    $(".zh_faq_new .share_url_button").click(function () {
        //alert("hii");
        $(this).siblings(".share_url_url_box").css("display", "block");
        $(this).siblings(".share_url_url_box").select();
    });
});

function faq_url_box_blur(thisbox) {
    $(thisbox).css("display", "none");
}

//$(window).load(function(){
////$( document ).ready(function() {
//   $('body').click(function(){
//       $('.sidebar-type-advanced-search').hasClass(function(){
//       });
//      // alert("The paragraph was clicked.");
//       //debugger;
//   });    
//});





// For drop down menu small screen
//$(function() {
// $("select.custom").each(function() {                    
//     var sb = new SelectBox({
//         selectbox: $(this),
//         height: 150,
//         width: 200
//     });
// });
//});