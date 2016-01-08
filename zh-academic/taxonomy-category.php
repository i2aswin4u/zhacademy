<?php get_header('home');
$taxanomyis = get_query_var( 'category' );
$args = array(
  'category' => $taxanomyis
);
query_posts( $args );
?>



<div class="academy">
    <div class="academy-top">
        <!-- Top Banner -->
        <div class="banners">
            <div class="container-fluid">
                <div class="row">
                    <h1>
                       <?php echo ' FAQ' ;?>
                    </h1>
                    <p>
                        <?php echo ' Learn the simplicity & flexibility of the Blue EHS .  Understand how it adapts to the way you practice your way.' ;?>
                          
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
                        <a href="<?php echo get_site_url(); ?>">
                            Home  
                        </a>
                        <i class="fa fa-angle-double-right"></i>

                        <a href="<?php echo get_site_url(); ?>/video">
                            Videos 
                        </a>
                        <i class="fa fa-angle-double-right"></i>
                        <a href="">
                         <?php   
                            $term_id_is = get_queried_object()->term_id; 
                            $term =	$wp_query->queried_object;
                            echo '<span>'.$term->name.'</span>';
                        ?>
                        </a>
                    </div> 
<!--                    <div class="head-bottom">
                        <?php
                       // if (function_exists('yoast_breadcrumb')) {
                      //      yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
                      //  }
                        ?>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row ">
            <div class="bannerbtm-txtouter">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 academy-borderoutr zh_faq_new">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="detailed-courses">
                                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); { ?>
                                <div class="row margin-0">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 padding-lr0">
                                        <a href="<?php the_permalink();?>" class="overlay">
                                            <span class="btn-overlay"><span>Watch the Video</span></span>
                                        </a>
                                        <a href="#" class="img-responsive">
                                           <?php
                                            if ( has_post_thumbnail() ) {
                                                    the_post_thumbnail();
                                            }
                                            else { ?>
                                                    <img src="<?php bloginfo( 'template_directory' ); ?>/img/scheduling.png">
                                            <?php }
                                            ?>
                                        </a>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                       <a href="<?php the_permalink();?>"> <h3><?php the_title();?></h3></a>
                                        <p> <?php $term_list = wp_get_post_terms($post->ID); 
                                                $k = count ($term_list);
                                                $i = 1;
                                                foreach ($term_list as $term_obj){
                                                    echo $term_obj->name;   echo 'hai';
                                                    if ($i < $k){ echo ' / '; }
                                                    $i= $i+1;
                                                } ?>  </p>
                                             <span><?php //rw_the_post_rating(5374); ?>
                                            <?php/// do_shortcode('[ratingwidget]'); ?> </span>
                                              <span> <?php do_shortcode('[ratingwidget type="page" post_id=5374]'); ?> </span>
                                             <!--<span><img class="stars pull-right no-border" src="img/stars.png"></span>-->
                                        </p>
                                        <hr>
                                        <p><?php echo substr(get_the_excerpt(), 0,180); ?>...</p>
                                        <ul class="more-panel">
                                           <?php if(get_field('course_duration')){ ?>
                                            <li><em>Duration: <?php echo get_field('course_duration'); ?> </em></li>
                                           <?php } ?>
                                            <!--<li><em>Viewers: 1632</em></li>-->  
                                            <?php if( get_field('course_related_pdf') ):
                                                $link=get_field('course_related_pdf'); ?>
                                                <li><a href="<?php echo $link['url']; ?>" target="_blank"><em>Download pdf</em></a></li>
                                           <?php  endif; ?>
                                        </ul>
                                    </div>
                                </div>
                                <?php } endwhile; endif; ?>                                                                    
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo get_site_url(); ?>/video/" class="btn btn-default"> Back </a>
                </div>																	
            </div>
                <!--side bar -->  
       <?php include ('recent-sidebar.php'); ?>
        </div>      
    </div>      
</div>      
<script type="text/javascript">
    $(document).ready(function(){
        if ( ! $(".more-panel li").length ){
            $('.more-panel').hide();
       }
    });
</script>
<?php get_footer('home'); ?>