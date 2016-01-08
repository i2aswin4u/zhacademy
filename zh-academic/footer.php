    <footer class="academic-footer">
        <div class="container-fluid">
            <div class= "row">
                <div class="col-md-6 col-sm-12 col-xs-12 ">
                    <a href="">
                        <img src="<?php echo bloginfo('stylesheet_directory'); ?>/img/academy-small.png" alt="">
                    </a>
                    <p>2010 Corporate Ridge, Suite 700, McLean VA 22102 </p>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="social-media text-right">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                        </ul>
                    </div>
                    <p class="text-right">Copyright 2015 � ZH Healthcare LLC. All rights reserved </p>
                </div>
            </div>  
        </div>     
    </footer>
</div>
	<!-- =============    Styles and Scripts    =============  --> 
<script type="text/javascript">
//    For Search menu enter key press action
    $(document).on("keyup",function(e){ 
        var key = e.keycode ? e.keycode :e.which;
        if(key === 13){
            selectFunctionClick();
        }
    })
    $(document).ready(function() {
        debugger;
        if($('#posttype-multiple-selected').children('option:selected').length === 0){
            $('#posttype-multiple-selected').children('option').attr('selected',"selected");
        }
        $('#posttype-multiple-selected').multiselect({
                includeSelectAllOption: true,                  
                selectAllValue: 'any'
        });
        $( "#target" ).hide();		
    });
    
    $(function(){
//        $(".multiselect-container li:not(:first) :input[type='checkbox']").click();
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
</script>
<!--Small screen modules select box js-->
<script type="text/javascript"> 
//    For setting the session module (Mobile , responsive)
    $(function() {
        //http://www.roblaplaca.com/docs/custom-selectbox/
        $('select.custom option[value="<?php echo $_SESSION["modules"];?>"]').attr("selected",true);
        $("select.module-options").each(function() {
            var sb = new SelectBox({
                selectbox: $(this),
                height: 10,
                width: 200,
                changeCallback: function(val) {
                    var ajaxurl = "<?php echo admin_url('admin-ajax.php');?>";
                   var module_slug = val;
                    jQuery.post(
                        ajaxurl, 
                        {
                            'action'  : 'session_ajax',
                            'modules' : module_slug,
                            'academy' :'<?php echo $_SESSION["academy"];?>',
                            'product' :'<?php echo $_SESSION["product"];?>',
                            'dataType': 'html'
                        },     
                        function(response){   
//                     alert('ash The server responded: ' + response);
                        location.reload();
                        }
                    );
		}
            });
        });    
//        For mobile:  academy menu  , get value
        $("select.academy-options").each(function() {
            var sb = new SelectBox({
                selectbox: $(this),
                height: 10,
                width: 200,
                changeCallback: function(val) {
                     location.href=val;
                }
            });
        });
 //        For mobile :  module menu in help documents :  To keep selected option active & set module session 
        $("select.module-options-help-doc").each(function() {
        $('select.custom option[value="<?php echo $_SESSION["modules"];?>"]').attr("selected",true);
            var sb = new SelectBox({
                selectbox: $(this),
                height: 10,
                width: 200,
                changeCallback: function(val) {                    
                   var ajaxurl = "<?php echo admin_url('admin-ajax.php');?>";
                   var module_slug = val;
                    jQuery.post(
                        ajaxurl, 
                        {
                            'action'  : 'session_ajax',
                            'modules' : module_slug,
                            'academy' :'<?php echo $_SESSION["academy"];?>',
                            'product' :'<?php echo $_SESSION["product"];?>',
                            'dataType': 'html'
                        },     
                        function(response){   
//                     alert('ash The server responded: ' + response);
                        var blogUrl = '<?php echo bloginfo('siteurl'); ?>';
                        location.href=blogUrl+'/group/'+val;
                         }
                    );
                    
                }
            });
        });  
              //  Modules selection for help document for desktop
//        $('.modules-list-section-help-doc li').click(function(){
//          var module_slug;
//          module_slug = $(this).attr("id");
//          var ajaxurl = "<?php echo admin_url('admin-ajax.php');?>";          
//            jQuery.post(
//                ajaxurl, 
//                {
//                    'action': 'session_ajax',
//                    'modules': module_slug,
//                    'academy':'<?php echo $_SESSION["academy"];?>',
//                    'product':'<?php echo $_SESSION["product"];?>',
//                    'dataType': 'html'
//                },     
//                function(response){
//                var blogUrl = '<?php echo bloginfo('siteurl'); ?>';
//                location.href=blogUrl+'/group/'+<?php echo $_SESSION["module"];?>;
////                location.reload();
//                }
//            ); 
//
//       });

    });
    
</script>

 <script type="text/javascript">             
    $(document).ready(function(){
 // Modules selection 
        $('.modules-list-section li').click(function(e){
//          alert($(this).attr("id")); debbugger;
          e.preventDefault();
          var module_slug;
          module_slug = $(this).attr("id");
          debugger
          var ajaxurl = "<?php echo admin_url('admin-ajax.php');?>";
            jQuery.post(
                ajaxurl, 
                {
                    'action'  : 'session_ajax',
                    'modules' : module_slug,
                    'academy' : '<?php echo $_SESSION["academy"];?>',
                    'product' : '<?php echo $_SESSION["product"];?>',
                    'dataType': 'html'
                },     
                function(response){
            ;
//                     alert('ash The server responded: ' + response);
                location.reload();
                }
            ); 

       });
   // Home Page Modules selection 
        $('.modules').click(function(e){
         // alert($(this).attr("id")); debbugger;
          e.preventDefault();
          var module_slug;
          module_slug = $(this).attr("id");
          var ajaxurl = "<?php echo admin_url('admin-ajax.php');?>";
            jQuery.post(
                ajaxurl, 
                {
                    'action'  : 'session_ajax',
                    'modules' : module_slug,
                    'academy' : '<?php echo $_SESSION["academy"];?>',
                    'product' : '<?php echo $_SESSION["product"];?>',
                    'dataType': 'html'
                },     
                function(response){
               // window.location.href = '<?php //echo bloginfo('siteurl');?>/modules/'+module_slug+'/';
               window.location.href = '<?php echo bloginfo('siteurl');?>/academy/overview/';
                }
            ); 

       });
// Academy menu session variable ajax
        $('.academy-list-selecion li a').click(function(e){
//          alert($(this).attr("id")); debbugger;
         e.preventDefault();
          var module_slug, load_url;
          academy_slug = $(this).attr("title");
          load_url = this; //alert(load_url.href);
          var ajaxurl = "<?php echo admin_url('admin-ajax.php');?>";
            jQuery.post(
                ajaxurl, 
                {
                    'action'  : 'session_ajax',
                    'modules' : '<?php echo $_SESSION["modules"];?>',
                    'academy' : academy_slug,
                    'product' : '<?php echo $_SESSION["product"];?>',
                    'dataType': 'html'
                },     
                function(response){
                //   alert('ash The server responded: ' + response);
                //   location.reload();
                ///  console.log(load_url.href+'tttttt');
                location.href = load_url.href;
                }
            ); 

       });

    
       });                              
</script>
<script type="text/javascript">
$( document ).ready(function() {
    // Set active class for modules sidebar big
    $( ".modules-list-section li" ).each(function() {
      if($(this).attr("id") == '<?php echo $_SESSION['modules'];?>'){
          $( this ).addClass( "active" );
      }else{
          $( this ).removeClass( "active" );
      }
    });
      // Set active class for modules Help Documents 
    $( ".modules-list-section-help-doc li" ).each(function() {
      if($(this).attr("id") == '<?php echo $_SESSION['modules'];?>'){
          $( this ).addClass( "active" );debugger
      }else{
          $( this ).removeClass( "active" );
      }
    });   
});
</script>
<!-- Start of Async HubSpot Analytics Code -->
<script type="text/javascript">
    (function(d,s,i,r) {
    if (d.getElementById(i)){return;}
    var n=d.createElement(s),e=d.getElementsByTagName(s)[0];
    n.id=i;n.src='//js.hs-analytics.net/analytics/'+(Math.ceil(new Date()/r)*r)+'/473276.js';
    e.parentNode.insertBefore(n, e);
    })(document,"script","hs-analytics",300000);
    </script>
    <!-- End of Async HubSpot Analytics Code -->
    <!--google analytics-->
    <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-36809903-3', 'auto');
    ga('require', 'displayfeatures');
    ga('send', 'pageview');
</script>
<!--google analytics end-->
<?php wp_footer();?>  
</body>
</html>            

















