<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 side-search-wrapper "> 
<div class="search-title-side"> Search</div>
      <form id="searchform" method="post" action="<?php echo get_site_url(); ?>/search">
      <div class="col-md-12 col-sm-12 col-xs-12 top-space nopadding arrow-down">
          <div class="col-md-1 col-sm-1 col-xs-1 nopadding">                     
              <div class="custom-select pricing-customseletbox sidebar-type-advanced-search">     
                  <select id="posttype-multiple-selected" multiple="multiple" name="values">                                
                    <option value="faq"         <?php if (in_array( 'faq',$post_types_is)) { echo "selected='selected'"; }?> >          <?php $name = ot_get_option( 'post_type_name_for_faq' );       if($name){ echo $name; } else {echo "FAQ";}?></option>
                    <option value="texthelpdoc" <?php if (in_array( 'texthelpdoc',$post_types_is)) { echo "selected='selected'"; }?> >  <?php $name = ot_get_option( 'post_type_name_for_text_help' ); if($name){ echo $name; } else {echo "Help Documents";}?></option>
                    <option value="videos"      <?php if (in_array( 'videos',$post_types_is)) { echo "selected='selected'"; }?> >       <?php $name = ot_get_option( 'post_type_name_for_videos' );    if($name){ echo $name; } else {echo "Videos";}?></option>
                    <option value="course"      <?php if (in_array( 'course',$post_types_is)) { echo "selected='selected'"; }?> >       <?php $name = ot_get_option( 'post_type_name_for_courses' );   if($name){ echo $name; } else {echo "Courses";}?></option>                                  
                  </select>     
                  <input type="hidden" name="hidPostType" id="hidPostType" value=""/>
              </div>
          </div>
          <div class="col-md-10 col-sm-10 col-xs-10 text-center set-width nopadding">
              <input id="custom_search" class="side-custom-search"  placeholder="Type here to search anything " type="text" name="custom_search" value="<?php//k the_search_query(); ?>" class="text" />
              <input id="multiple_post"  placeholder=" " type="text" name="multiple_post" value="" class="text" style="display:none;" />
              <div id="target" style="color: #ffffff; margin-top: 10px; "> Enter a valid Search Key</div>
          </div>
          <div class="col-md-1 col-sm-1 col-xs-1 text-center set-width nopadding">
              <div id="searchsubmit" class="btn btn-block btn-primary btn-lg" onclick="selectFunctionClick();"><i class="fa fa-search"></i> </div>
          </div>
      </div>                                  
      </form>
 </div>

<script type="text/javascript">
    $(document).on("keyup",function(e){ 
        var key = e.keycode ? e.keycode :e.which;
        if(key === 13){
            selectFunctionClick();
        }
    })
    $(document).ready(function() {
        $('#posttype-multiple-selected').multiselect({
                includeSelectAllOption: true,                  
                selectAllValue: 'any'
        });
        $( "#target" ).hide();	   
        // Set width to drop seach on load of window
        var wid = $('.search-title-side').width();
        wid =  wid - 2;
        $('ul.multiselect-container.dropdown-menu' ).width(wid);
        
        $('.multiselect.dropdown-toggle').on('click', function(e){
            $('.dropdown-menu').slideToggle(200);
          });

    });
    
    $(function(){
        $(".multiselect-container li:not(:first) :input[type='checkbox']").click();
    });
    
    function selectFunctionClick (){   
         var x;
          x = document.getElementById("custom_search").value;
          if (x == "") 
           {              	
              $( "#target" ).show();
           }
           else {
                var values = $('#posttype-multiple-selected').val();
                var multiSelectValues = "";
                values.map(function(item){ multiSelectValues += item+",";});
                $("#multiple_post").val(multiSelectValues);
                $('#searchform').submit();
               }
    }
    // Set width to drop seach on resize of window
    $( window ).resize(function() {
    var wid = $('.search-title-side').width();
        wid =  wid - 2;
        $('ul.multiselect-container.dropdown-menu' ).width(wid);
        // $('ul.multiselect-container.dropdown-menu' ).width($( ".search-title-side" ).width());
});
</script>