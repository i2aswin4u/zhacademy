<?php get_header('home'); ?>
<?php
$post_type_url = $_GET["posttype"];
$tax = get_query_var('taxonomy');
//$tax = 'groups';
$postid = get_the_ID();
$args = array( 'order' => 'DESC', 'orderby' => 'term_order', 'fields' => 'all');
$terms = wp_get_post_terms($postid, $tax, $args);
foreach ($terms as $term) {
    $termname = $term->slug;
    $termparent = $term->parent; // get the parent term id    
}
$termname = get_term($termparent, $tax); // For getting parent title
$testorgin = $terms;
?>
<?php
// query for parent groups
//$tax_terms = get_terms($tax);
$tax_terms = get_terms($tax, array('parent' => 0));
$prevShown = false;
foreach ($tax_terms as $tax_term) {
    if ($prevShown) {
        $next_term = $tax_term;
        break;
    }
    if ($tax_term->name == $termname->name) {
        $prevShown = true;
        continue;
    }
    $prev_term = $tax_term;
}
$current_post_id = $post->ID;
?>
<!-- File : single.php-->
                <!--start of new design-->
<div class="academic-main">

    <!-- Top Banner -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                    <h1><?php $name = ot_get_option('search_banner_title');
                              if ($name) {    echo $name;} else {    echo "Get Learning , Get Certified";} ?></h1>
                    <p class="bold"> 
                        <?php $name = ot_get_option('search_banner_sub_titile');
                              if ($name) {    echo $name;} else {    echo "Learn the simplicity & flexibility of the Blue EHS . Understand how it adapts to the way you practice your way.";} ?></p>
                        <?php include_once('search-banner.php');?>
                </div>
            </div>
        </div>
    </div>

    <div class="nav-tab-bg">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">                   
                     <?php include("academy_menu.php"); ?>                   
                </div>      
            </div>      
        </div>                                                      
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               
                <div>
                    <div class="row">
                        <?php include("mobile_menu.php"); ?>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-3 colo-sm-12 col-xs-12">
                           <?php include("sidebar-tax-groups.php"); ?> 
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <!-- Tab panes -->
                            <div class="margin-tb30">
                                <div class="inner-detail">
                                    <div class="row">
                                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 reporting">
                                            <?php 
                                                    $term_list = wp_get_post_terms($post->ID, 'academy', array("fields" => "all"));    
//                                                    var_dump($term_list);
                                                    foreach ($term_list as $term_li){
                                                        $term_slug = $term_li->slug;    
                                                    }   
                                                    if($term_slug == 'faq'){
                                                         include("include-single-faq.php");
                                                         }
                                                    else { 
                                                         include("include-single-vid-course.php");
                                                         } 
                                            ?>
                                        </div>
                                        
                                        <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                                            <?php include("leftsidebar.php"); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
        <div class="readmore padding-tb20">
            <div class="container" <div="">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                         <h4><?php echo ot_get_option('footer_banner_text');?></h4>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!--end of new design-->
    <!--    <div class="container-fluid">
            <div class="row ">
                <div class="bannerbtm-txtouter">
                           <div clss="prev-next-links">
                            <div class="prev-link">
    <?php // if ($prev_term->name) { ?>
                                    <a class="btn btn-default" href="<?php // bloginfo(url);  ?>/group/<?php // echo $prev_term->slug;  ?>">Previous  Module<?php //echo " " . $prev_term->name;  ?></a>
    <?php // } ?>
                            </div>
                            <div class="next-link">
    <?php //if ($next_term->name) { ?>
                                    <a class="btn btn-default" href="<?php // bloginfo(url);  ?>/group/<?php //echo $next_term->slug;  ?>">Next Module<?php // echo " " . $next_term->name;  ?></a> 
    <?php //} ?>
                            </div>               
                        </div>                                                 
                </div>      
            </div>      
        </div> -->
</div>
<script type="text/javascript" >
$(document).ready(function(){
   // open tab in single.php
    $( ".panel-heading" ).each(function() {
      if($(this).attr("id") == '<?php echo $current_post_id?>'){
          $( this ).addClass( "activeissss" );
          $( this ).find('a').click();
          
          debugger;
      }else{
          $( this ).removeClass( "active" );
      }
    });      
       });


</script>
<?php get_footer('home'); ?>