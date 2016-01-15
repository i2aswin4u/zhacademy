<?php get_header('home'); ?>
<?php
$_SESSION["academy"] = "faq";
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
<!-- File : taxonomy-academy-faq.php-->
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
                                                    foreach ($term_list as $term_li){
                                                        $term_slug = $term_li->slug;    
                                                    }   
                                                    if($term_slug == 'faq'){
                                                        ?>
                                                            <!--IF FAQ START-->
                                                            <div class="content-section">
                                                                
                                                                 <?php 
                                                                    $destname = get_term_by('slug',$_SESSION["modules"],'modules'); 
                                                                    $id_term  = $destname->term_taxonomy_id;                                                   
                                                                    $term = get_term( $id_term, 'modules' );
                                                                    $term_meta = get_option("taxonomy_$id_term");
                                                                 ?>
                                                                 <h3 class="line"><span><i class="fa <?php if ($term_meta[img]) {  echo $term_meta[img]; } else {  echo 'fa-cogs'; } ?>"></i> <?php echo $term->name; ?></span></h3>                                                                                                                                
                                                                <!--<h3 class="line"><span><i class="fa fa-edit"></i> Reporting</span></h3>-->
                                                                    <div class="panel-group" id="accordion">
                                                                    <?php
                                                                    $args = array(
                                                                            'post_type' => 'post',
                                                                            'posts_per_page' => '6',
                                                                            'tax_query' => array(
                                                                                    'relation' => 'AND',
                                                                                    array(
                                                                                    'taxonomy' => 'modules', // modules (rep)
                                                                                    'field' => 'slug',
                                                                                    'terms' => array($_SESSION["modules"]),
                                                                                    ),
                                                                                    array(
                                                                                        'taxonomy' => 'product', // (oemr/blue-product)
                                                                                        'field' => 'slug',
                                                                                        'terms' => array($_SESSION["product"]),
                                                                                    ),
                                                                                    array(
                                                                                        'taxonomy' => 'academy', // (academy)
                                                                                        'field' => 'slug',
                                                                                        'terms' => $term_slug,
                                                                                    ),
                                                                            ),
                                                                    );
                                                                    $i=1;
                                                                    $the_query = new WP_Query( $args );
                                                                    if ( $the_query->have_posts() ) {
                                                                            while ( $the_query->have_posts() ) {
                                                                                    $the_query->the_post(); 
                                                                                    $i++;
                                                                                    ?>
<!--Accordian Section-->
                                                                                <div class="panel panel-default">
                                                                                    <div class="panel-heading">
                                                                                        <h4 class="panel-title">
                                                                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i;?>" class="collapsed" aria-expanded="false"><?php the_title();?>
                                                                                                <i class="fa fa-angle-down"></i>
                                                                                            </a>
                                                                                        </h4>
                                                                                    </div>
                                                                                    <div id="collapse<?php echo $i;?>" class="panel-collapse collapse" aria-expanded="false">
                                                                                        <div class="panel-body">
                                                                                            <p><?php the_content();?></p>
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
                                                                    <!--</div>-->
                                                              <?php                                                                             
                                                                    }
                                                            } else {
                                                                echo "No Post found ";                                                           
                                                            }  
                                                            wp_reset_postdata();
                                                         //   <!--IF FAQ STOP-->                                                            
                                                    }
                                                    else {                                                        
                                                    ?>
                                                     
                                            <div class="content-section">
                                                <?php                                                                                                                                                  
                                                   $destname = get_term_by('slug',$_SESSION["modules"],'modules'); 
                                                   $id_term  = $destname->term_taxonomy_id;                                                   
                                                   $term = get_term( $id_term, 'modules' );
                                                   $term_meta = get_option("taxonomy_$id_term");                         
                                                ?>
                                                <h3 class="line"><span><i class="fa <?php if ($term_meta[img]) {  echo $term_meta[img]; } else {  echo 'fa-cogs'; } ?>"></i> <?php echo $term->name;  ?></span></h3>
                                                <div class="row">                                                                                                        
                                                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="video-lg-section">
                                                        <?php 
                                                        if (have_posts()) : 
                                                        while (have_posts()) : the_post(); 
                                                        $ppt= get_field('course-ppt');
                                                        if($ppt) { ?>
                                                        <iframe src="//www.slideshare.net/slideshow/embed_code/key/<?php echo $ppt; ?>" width="1000px" height="500px" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" style="border:1px solid #CCC; border-width:1px; margin-bottom:5px; max-width: 100%;" allowfullscreen> </iframe> <div style="margin-bottom:5px"><strong><a href="//www.slideshare.net/ZHHealthcare" target="_blank">ZH Healthcare</a></strong> </div>
                                                        <?php }                          
                                                          $vid_url= get_field('video_url_of_text_help');
                                                          if($vid_url) { 
                                                            preg_match( '/[\\?\\&]v=([^\\?\\&]+)/', $vid_url, $matches);
                                                        ?>
                                                        <iframe  src="https://www.youtube.com/embed/<?php  echo  $matches[1];?>" width="1000px" height="500px" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" style="border:1px solid #CCC; border-width:1px; margin-bottom:5px; max-width: 100%;" allowfullscreen></iframe>
                                                        <?php }  ?>                                                                                                                                                                                                                                                           
                                                            <h4 class="line"> 
                                                                <span class="padding-r10"><?php the_title();?></span>
                                                                <span class="padding-l10 pull-right">
                                                                    <a href="#" data-toggle="tooltip" title="" data-placement="top" data-original-title="Previous"><i class="fa fa-angle-left"></i></a>
                                                                    <a href="#" data-toggle="tooltip" title="" data-placement="top" data-original-title="Next"><i class="fa fa-angle-right"></i></a>
                                                                </span>
                                                            </h4>
                                                            <p><?php  the_content();?> </p>
                                                        </div>
                                                    </div>
                                                        
                                                    <div class="prev-next-links-single">
                                                       <div class="prev-link">
                                                           <?php $prev_post = get_adjacent_post( true, '', true, $next_tag ); ?>
                                                           <?php if ( is_a( $prev_post, 'WP_Post' ) ) { ?>
                                                                  <a class ="btn btn-default" href="<?php echo get_permalink( $prev_post->ID ); ?>"><?php echo 'Previous: '.get_the_title( $prev_post->ID ); ?></a>
                                                           <?php } ?>
                                                        </div>
                                                       <div class="next-link">     
                                                           <?php $next_post = get_adjacent_post( true, '', false, $next_tag ); ?>
                                                           <?php if ( is_a( $next_post, 'WP_Post' ) ) {  ?>
                                                                   <a class= "btn btn-default" href="<?php echo get_permalink( $next_post->ID ); ?>"><?php echo 'Next: '. get_the_title( $next_post->ID ); ?></a>
                                                            <?php } ?>
                                                       </div>
                                                    </div>
                                                    <?php 
                                                     previous_posts_link('< previous page', 0); 
                                                     next_posts_link('next page >', 0);                               
                                                     endwhile; 
                                                     else : ?>
                                                        <h1>Sorry , No Posts found</h1>
                                                <?php endif; ?>                                                       
                                                </div>                                                
                                                    <?php 
                                                    $term_list = wp_get_post_terms($post->ID, 'academy', array("fields" => "all"));
                                                    foreach ($term_list as $term_li){
                                                        $term_name = $term_li->name;
                                                        $term_slug = $term_li->slug;    
                                                          ?>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">                 
                                                        <h4 class="line"> 
                                                            <span class="padding-r10">Related <?php echo $term_slug;?>'s</span>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                     <?php
                                                            $args = array(
                                                                    'post_type' => 'post',
                                                                    'posts_per_page' => '6',
                                                                    'tax_query' => array(
                                                                                    'relation' => 'AND',
                                                                                    array(
                                                                                    'taxonomy' => 'modules', // modules (rep)
                                                                                    'field' => 'slug',
                                                                                    'terms' => array($_SESSION["modules"]),
                                                                                    ),
                                                                                    array(
                                                                                        'taxonomy' => 'product', // (oemr/blue-product)
                                                                                        'field' => 'slug',
                                                                                        'terms' => array($_SESSION["product"]),
                                                                                    ),
                                                                                    array(
                                                                                        'taxonomy' => 'academy', // (academy)
                                                                                        'field' => 'slug',
                                                                                        'terms' => $term_slug,
                                                                                    ),
                                                                                ),
                                                                        );
                                                            $the_query = new WP_Query( $args );
                                                            if ( $the_query->have_posts() ) {
                                                                    while ( $the_query->have_posts() ) {
                                                                            $the_query->the_post();
                                                                            ?>
                                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="video-sm">
                                                                    <a href="<?php the_permalink();?>">
                                                                    <?php
                                                                    if ( has_post_thumbnail() ) {
                                                                            the_post_thumbnail();
                                                                    }
                                                                    else {
                                                                        ?>  <img src="<?php echo bloginfo('template_directory');?>/img/video-sm.jpg" class="img-responsive"></a> <?php
                                                                    }
                                                                    ?>
                                                                    </a>
                                                                    <h3> <a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                                                                    <p><?php echo substr(get_the_excerpt(), 0,130); ?></p>
                                                                    <a href="<?php the_permalink();?>" class="view-btn">View <?php echo $term_slug;?></a>
                                                                </div>
                                                            </div>
                                                          <?php                                                                             
                                                                    }
                                                            } else {
                                                            ?>
                                                                <div class="no-post">
                                                                    No Post Found
                                                                </div>
                                                            <?php                                                                
                                                            }
                                                            wp_reset_postdata();
                                                            ?>
                                                          <?php                                                                                                                         
                                                    } 
                                                    ?>                                                   
                                                                                                                                                                                                         
                                                </div>
                                            </div>
                                                    <?php } ?>
                                        </div>
                                        </div>
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
            <div class="container">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <h4><?php echo ot_get_option('footer_banner_text');?></h4>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?php get_footer('home'); ?>