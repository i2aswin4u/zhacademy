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
<!-- File : post-type-advanced-search.php-->
<div class="academic-main"> 
     <div class="banner"> 
         <div class="container">       
            <div class="row"> 
                <div class="col-md-12 col-sm-12 col-xs-12 text-center">   
                    <h1><?php $name = ot_get_option( 'search_banner_title' ); if($name){ echo $name; } else {echo "Get Learning , Get Certified";}?></h1>
                    <p class="bold"> <?php $name = ot_get_option( 'search_banner_sub_titile' ); if($name){ echo $name; } else {echo "Learn the simplicity & flexibility of the Blue EHS . Understand how it adapts to the way you practice your way.";}?></p>
                    <?php include_once('search-banner.php');?>
                </div>        
            </div>   
         </div>    
    </div>
<div class="container-fluid">
     <div class="row">
        <?php include("mobile_menu.php"); ?>     
    </div>
    
    <div class="row">
<!--        <div class="col-lg-3 col-md-3 colo-sm-12 col-xs-12">
            <?php// get_sidebar(); ?>
        </div>-->
    <div class="container1 advanced_search">      
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="padtop-content the_content  ">             
                <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 adv_search ">   
                 <?php 
                 $post_per_pg = get_option('posts_per_page');  
                 if (in_array("texthelpdoc", $post_types_is)){
                        if(count($post_types_is)== 1)
                        $postTypeArray = array('texthelpdoc');
                        else
                        $postTypeArray = array('texthelpdoc','post');
                 }
                 else{
                      $postTypeArray = array('post');
                 }                                  
                    $args = array(
                        'post_type' => $postTypeArray,
                        's' => $s,
                        'offset' => $offset,                                                               
                        'orderby' => 'date',
                        'tax_query' => array(),
                        'post_status' => 'publish',
                        'posts_per_page' => -1
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
                        <h3> <?php// var_dump($args);?>Your search term "<?php  echo '<span class="adv_search_key">'.$s.'</span>'; ?>"  returned the following  results <?php //foreach($post_types_is as $ptype) { echo $ptype.", ";}?></h3>   
                         <div class="clear"></div>
                    </div>
                    <div id="replace_ajax">
                     <?php $c = 0;
                          $i = 1; 
                          if ( $new_query->have_posts() ) { ?>
                        <div id ="accordion" class="panel-group inner-detail"> <?php
                            while ( $new_query->have_posts() ) {
                                if($c == $post_per_pg){  break;}
                                $c =$c+1;
                                $new_query->the_post();
                     ?>                                
                                <div class="panel panel-default">
                                    <div class="panel-heading" id="<?php echo get_the_ID(); ?>" >
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i;?>" class="collapsed" aria-expanded="false"><?php the_title();?>
                                              <i class="fa fa-angle-down"></i>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse<?php echo $i;?>" class="panel-collapse collapse" aria-expanded="false">
                                        <div class="panel-body">
                                            <p><?php the_content();?>
                                            <?php 
                                                 $ppt= get_field('course-ppt');
                                                 if($ppt) { ?>
                                                    <iframe src="//www.slideshare.net/slideshow/embed_code/key/<?php echo $ppt; ?>" width="1000px" height="500px" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" style="border:1px solid #CCC; border-width:1px; margin-bottom:5px; max-width: 100%;" allowfullscreen> </iframe> <div style="margin-bottom:5px"><strong><a href="//www.slideshare.net/ZHHealthcare" target="_blank">ZH Healthcare</a></strong> </div>
                                                <?php }                          
                                                  $vid_url= get_field('video_url_of_text_help');
                                                  if($vid_url) { 
                                                    preg_match( '/[\\?\\&]v=([^\\?\\&]+)/', $vid_url, $matches); ?>
                                                    <iframe  src="https://www.youtube.com/embed/<?php  echo  $matches[1];?>" width="1000px" height="500px" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" style="border:1px solid #CCC; border-width:1px; margin-bottom:5px; max-width: 100%;" allowfullscreen></iframe>                                                    
                                                 <?php
                                                   }
                                                 ?>                                                            
                                            </p>
                                            <div id="copy-clipboard" class="example">
                                                <div class="input-group">
                                                    <input id="ash_<?php echo get_the_id();?>" type="text" readonly value="<?php the_permalink();?>">
                                                    <span class="input-group-button">
                                                        <button class="btn-clipboard btn" type="button"  data-toggle="tooltip" data-placement="left" title="Copy To Clipboard"  data-clipboard-demo="" data-clipboard-target="#ash_<?php echo get_the_id();?>">
                                                            <i class="fa fa-clipboard"width="13" alt="Copy to clipboard"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                
                                  <?php
                                    $i =  $i+1;         
                                    }
                                  ?> 
                          </div> 
                              <?php
                                } else{ 
                              ?>
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
             <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 pull-right">
                <?php include("leftsidebar.php"); ?>
            </div>
          </div>
        </div>   
    </div>
</div>
    
</div></div><!-- end content -->

<script>    
    //http://botmonster.com/jquery-bootpag/#pro-page-9
    var total_no_post = <?php echo json_encode($post_count); ?>;
    var post_per_pg   = <?php echo json_encode($post_per_pg); ?>;
    var post_types_is = <?php echo json_encode($post_types_is); ?>;
    var search_key    = <?php echo json_encode($s); ?>;
    var total_page    = total_no_post / post_per_pg;
    total_page        = Math.round(total_page);
    if(total_page=='1'){
        $('#custom_search_pagination').hide();
    }
    $('#page-selection').bootpag({
    total        : total_page, // Total Number of pages , ie the total number of post is this * number of post in a page
    page         : 1,
    maxVisible   : 5,
    leaps        : true,
    firstLastUse : true,
    first        : 'First',
    last         : 'Last',
    wrapClass    : 'pagination',
    activeClass  : 'active',
    disabledClass: 'disabled',
    nextClass    : 'next',
    prevClass    : 'prev',
    lastClass    : 'last',
    firstClass   : 'first'
   
}).on("page", function(event, num){
    $("#content4").html("Page " + num); // or some ajax content loading...
    var offset = (num * post_per_pg)- post_per_pg; 
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
            $("#replace_ajax").html(response);
            $("html, body").animate({ scrollTop: 350 }, "slow");
        }
    );   
}); 

</script>


<?php get_footer('home'); ?>