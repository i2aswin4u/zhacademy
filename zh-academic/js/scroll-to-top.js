//script for scroll to top all pages
$(document).ready(function(){
    $("#scroll_up").hide();
    $(window).scroll(function(){
        var fromTop = $(document).scrollTop()
        if(fromTop < 200){
            $("#scroll_up").hide();
        }
        else{
          $("#scroll_up").show();  
        }
         if($(window).scrollTop() == ($(document).height() - $(window).height())){
             $("#scroll_up").addClass("move-up");
         }
         else
         {
             $("#scroll_up").removeClass("move-up");
         }
    });
    $("#scroll_up").click(function(){
         $("html, body").animate({ scrollTop: 0 }, "slow");
         return false;     
    });
});


// From Templates
//For ajax click loading for  side-bar

