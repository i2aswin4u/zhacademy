<?php
/*
  Template name: Videos Page
 */
get_header('home');
?>
<!-- End Header -->
<div class="academy">
    <div class="academy-top">
        <!-- Top Banner -->
        <div class="banners">
            <div class="container-fluid">
                <div class="row">       
                    <h1> <?php $val = get_field('video_page_title'); if($val){ echo $val;} else {echo 'Videos';}?> </h1>
                    <p>   <?php $val = get_field('video_page_intro'); if($val){ echo $val;} else {echo 'Learn the simplicity & flexibility of the Blue EHS .  Understand how it adapts to the way you practice your way.';} ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="academy-bannerbtm">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="head-bottom">
                        <?php
                        if (function_exists('yoast_breadcrumb')) {
                            yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End banner -->
    <div class="container-fluid">
        <div class="row ">
            <div class="bannerbtm-txtouter">
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 academy-borderoutr zh_faq_new">
            <div class="row">
                <?php
                    $taxonomy = "help-videos";
                    $tax_terms = get_terms( $taxonomy, array( 'parent' => 0 ) );
                        foreach ($tax_terms as $tax_term) {       
                   ?>
                   <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="courses">
                                    <a href="<?php echo esc_attr(get_term_link($tax_term, $taxonomy)); ?>" class="overlay">
    
                                                 <?php $c= z_taxonomy_image_url($tax_term->term_id); 
                                                // var_dump($c);
                                                 if(strlen ($c) >0){
                                                     z_taxonomy_image($tax_term->term_id);
                                                 }
                                                else {
                                                     ?><img src="<?php bloginfo( 'template_directory' ); ?>/img/scheduling.png"><?php
                                                }
                                                 ?>
                                    </a>
                                    <div class="courses-content">
                                            <h3><?php  echo '<a href="' . esc_attr(get_term_link($tax_term, $taxonomy)) . '"  ' . '>' . $tax_term->name.'</a>'; ?></h3>
                                            <!--<p>Gravida nibh vel velit auctor</p>-->
                                            <hr>
                                            <p>
                                                <?php echo  substr($tax_term->description, 0, 120).'...';  ?>
                                           </p>
                                    </div>
                                    <div class="more-details">
                                            <a href="#" class="pull-left"><i class="fa fa-bars"></i> 
                                                <?php  echo '<a href="' . esc_attr(get_term_link($tax_term, $taxonomy)) . '" title="' . sprintf( __( "View all posts in %s" ), $tax_term->name ).'" ' . '>View Videos</a>'; ?>
                                             </a>                                           
                                            <!--<span class="pull-right"><img src="<?php //bloginfo('template_directory');?>/img/stars.png"></span>-->
                                    </div>
                            </div>
                    </div>
                <?php }  ?>                                                                                                              
            </div>																	
           </div>
         <?php include ('search-sidebar.php'); ?>
         <?php include('recent-sidebar.php'); ?>
                </div>
            </div>      
        </div>      
    </div>                                           


<?php get_footer('home'); ?>