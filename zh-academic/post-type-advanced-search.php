<?php 
/*
 Template Name: Advanced Search Page 
 */
    $post_types_are = $_POST["multiple_post"];
    $s              = $_POST["custom_search"];
    $post_types_is = (explode(",",$post_types_are));    
    array_pop($post_types_is);
    get_header('home'); 
?>
<div class="academic-main"> 
     <div class="banner"> 
         <div class="container">       
    <div class="row"> 
        <div class="col-md-12 col-sm-12 col-xs-12 text-center">   
            <h1><?php $name = ot_get_option( 'search_banner_title' ); if($name){ echo $name; } else {echo "Get Learning , Get Certified";}?></h1> post-type-advanced-search.php
            <p class="bold"> <?php $name = ot_get_option( 'search_banner_sub_titile' ); if($name){ echo $name; } else {echo "Learn the simplicity & flexibility of the Blue EHS . Understand how it adapts to the way you practice your way.";}?></p>
            <?php include_once('search-banner.php');?>
        </div>        
    </div>   
</div>
        
    </div>
    <div class="container advanced_search">   
        <div class="row">     
            <div class="padtop-content the_content ">             
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 adv_search ">   
                 <?php 
                 $post_per_pg = get_option('posts_per_page');
                 //  Query for count of post     
                    $args = array(
//                        's' => $s,
//                   //     'posts_per_page' => $post_per_pg,                               
//                        'post_type' => 'post',
//                        'orderby' => 'date',
//                        'posts_per_page' => '-1',
//                        'tax_query' => array(),
                        's' => $s,
                        'offset' => $offset,
                        'post_type' => 'post',
                        'orderby' => 'date',
//                        'posts_per_page' => $post_per_pg,
                        'posts_per_page' => -1,
                        'tax_query' => array(),
                    );
                    $args['tax_query']['relation'] = 'OR';
                    foreach ($post_types_is as $post_types) {              
                        $args['tax_query'][] = array (  
                            'taxonomy' => 'academy',  
                            'field' => 'slug',
                            'terms' => $post_types,
                        );
                    }                           
                    $new_query = new WP_Query($args); 
                    $post_count =  $new_query->post_count;
                    $post_count = sprintf("%02d", $post_count);
                    ?>
                    <div id="search_title_area">
                        <div id="adv_search_count">
                            <span><?php echo $post_count; ?></span>
                            Results
                        </div>
                         <h3> Your search term "<?php  echo '<span class="adv_search_key">'.$s.'</span>'; ?>"  returned the following  results <?php //foreach($post_types_is as $ptype) { echo $ptype.", ";}?></h3>   
                         <div class="clear"></div>
                    </div>
                    <div id="replace_ajax">
                    <?php $c=0;
                          if ( $new_query->have_posts() ) {
                            while ( $new_query->have_posts() ) {
                                if($c == $post_per_pg){  break;}
                                $c =$c+1;
                                $new_query->the_post();?>
                                <div class="search-post-block">
                                    <div id="queried_ptype_icon">
                                        <?php 
                                            $queried_ptype = get_post_type();
                                            if($queried_ptype == 'faq'){
                                                 $name = ot_get_option( 'post_type_name_for_faq' );   
                                                  ?><i class="fa fa-question-circle" title="<?php if($name) {echo $name;} else {echo "FAQ";}?>"></i><?php
                                                }
                                            else {
                                                 $name = ot_get_option( 'post_type_name_for_courses' );                                               
                                                 ?><i class="fa fa-mortar-board" title="<?php if($name) {echo $name;} else {echo "Courses";}?>"></i><?php 
                                            }
                                        ?>
                                           <div class="query_ptype_text"> <?php echo $queried_ptype_name; ?> </div>
                                       </div>               
                                    <h2 class="title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>   
<!--                                   <div class="permalink_set">
                                       <h3 class="show_permalink"><i class="fa fa-external-link"></i>  <a href="<?php //the_permalink();?>"> <?php//   $perma = get_permalink(); echo substr($perma, 0, 80).'...';  ?></a> </h3>          
                                   </div>-->
                                <div class="clear"> </div>
                                <div class="entry">
                                 <?php echo substr(get_the_excerpt(), 0,200).'...'; ?>
                                  <a class="adv_read_more" href="<?php the_permalink();?>"> Read More </a>                     
                                </div>  
                              </div>
                                  <?php           
                            }
                          } else{ ?>
                              <h2 class="center">Not Found</h2>      
                        <p class="center">Sorry, but you are looking for something that isn't here.</p>   
                          <?php }
                          ?>
                    </div>
                        <div id="custom_search_pagination"> 
                            <div id="page-selection"></div>                                                        
                        </div>
                </div>      
            </div> 
            <!--side bar --> 
             <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <?php include("leftsidebar.php"); ?>
                                        </div>
<!--            <div class="academy ">
                <?php// include_once('recent-sidebar.php'); ?>
            </div>-->
        </div>   
    </div> 
</div></div><!-- end content -->
<!--<script type="text/javascript">
    $(document).on("keyup",function(e){ 
        var key = e.keycode ? e.keycode :e.which;
        if(key === 13){
            selectFunctionClick();
        }
    })
    $(document).ready(function() {
        $('#posttype-multiple-selected').multiselect({
            includeSelectAllOption: true,
            selectAllValue: 'any',
          });
        $( "#target" ).hide();		

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
</script>-->
<script>
    
    //http://botmonster.com/jquery-bootpag/#pro-page-9
    var total_no_post = <?php echo json_encode($post_count); ?>;
    var post_per_pg   = <?php echo json_encode($post_per_pg); ?>;
    var post_types_is = <?php echo json_encode($post_types_is); ?>;
    var search_key =  <?php echo json_encode($s); ?>;
    var total_page    = total_no_post / post_per_pg;
    total_page        = Math.round(total_page);
    if(total_page=='1'){$('#custom_search_pagination').hide();}
    $('#page-selection').bootpag({
    total: total_page, // Total Number of pages , ie the total number of post is this * number of post in a page
    page: 1,
    maxVisible: 5,
    leaps: true,
    firstLastUse: true,
    //first: '&#8592;',
    first: 'First',
    //last: '&#8594;',
    last: 'Last',
    wrapClass: 'pagination',
    activeClass: 'active',
    disabledClass: 'disabled',
    nextClass: 'next',
    prevClass: 'prev',
    lastClass: 'last',
    firstClass: 'first'
   
}).on("page", function(event, num){
     $("#content4").html("Page " + num); // or some ajax content loading...
     var offset = (num * post_per_pg)- post_per_pg;
     
//var ajaxurl="http://192.168.1.254/zhhealthcare/academy/wp-admin/admin-ajax.php";
 var ajaxurl = "<?php echo admin_url('admin-ajax.php');?>";
jQuery.post(
    ajaxurl, 
    {
        'action': 'add_foobar',
        'data-offset': offset,
        'data-post_per_pg': post_per_pg,
        'data-post_types_is': post_types_is,
        'search_key':search_key,
        'dataType': 'html'
    },     
    function(response){
//  alert('The server responded: ' + response);
        $("#replace_ajax").html(response);
        $("html, body").animate({ scrollTop: 350 }, "slow");
    }
); 
    
   
}); 

</script>
<?php get_footer('home'); ?>