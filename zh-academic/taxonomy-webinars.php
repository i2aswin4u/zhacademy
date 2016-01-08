<?php get_header('home'); ?>

<div class="academy">
    <div class="academy-top">
        <!-- Top Banner -->
        <div class="banners">
            <div class="container-fluid">
                <div class="row"> 
                    <h1><?php //post_type_arecho $the_tax->labels->name; ?> 
                    <?php //archive_title(); ?>  <?php
                    $taxonomy = get_queried_object();
                    echo  'Webinar - '.$taxonomy->name;
                    //var_dump($taxonomy);
                    ?> 
                    </h1>
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
    <div class="container-fluid">
        <div class="row ">
            <div class="bannerbtm-txtouter">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 academy-borderoutr">
                    <div class="the_content">
                        <div class="contentmain">
                            <div id="content" class="widecolumn">
                                <?php is_tag(); ?>
                                <?php if (have_posts()) : ?>
                                    <?php $post = $posts[0]; 
                                    while (have_posts()) : the_post(); ?>
                                        <div class="detailed-courses">
                                        <div class="row margin-0">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 padding-lr0">
                                                <a href="<?php the_permalink(); ?>" class="overlay">
                                                    <span class="btn-overlay"><span>View Webinar Recording</span></span>
                                                </a>
                                                <a href="#" class="img-responsive">
                                                    <?php
                                                    if (has_post_thumbnail()) {
                                                        the_post_thumbnail();
                                                    } else {
                                                        ?>
                                                        <img src="<?php bloginfo('template_directory'); ?>/img/scheduling.png">
                                                    <?php }
                                                    ?>
                                                </a>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                <a href="<?php the_permalink(); ?>"> <h3><?php the_title(); ?></h3></a>
                                                <p>  <?php $term_list = wp_get_post_terms($post->ID); 
                                                $k = count ($term_list);
                                                $i = 1;
                                                foreach ($term_list as $term_obj){
                                                    echo $term_obj->name;
                                                    if ($i < $k){ echo ' / '; }
                                                    $i= $i+1;
                                                } ?>
                                                    <?php// echo get_field('course_sub_heading'); ?>  
                                                    <span> </span>
                                                    <span> <?php //do_shortcode('[ratingwidget type="page" post_id=5374]'); ?> </span>
                                                </p>
                                                <hr>
                                                <p><?php echo substr(get_the_excerpt(), 0, 180); ?>...</p>
                                                
                                                <ul class="more-panel">
                                                    <?php if (get_field('course_duration')) { ?>
                                                        <li><em>Duration: <?php echo get_field('course_duration'); ?> </em></li>
                                                <?php } ?>
                                                <?php if (get_field('course_related_pdf')):
                                                    $link = get_field('course_related_pdf');
                                                    ?>
                                                        <li><a href="<?php echo $link['url']; ?>" target="_blank"><em>Download pdf</em></a></li>
                                                 <?php endif; ?>
                                                </ul>
                                                
                                                
                                            </div>
                                        </div>
                                        </div>
                                    <?php endwhile; ?>
                                    <div class="navigation">
                                        <div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
                                        <div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
                                    </div>
                                    <?php else : ?>
                                    <h2 class="center">Not  Post Found</h2>
                    <?php // include (TEMPLATEPATH . '/searchform.php'); ?>
                            <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>  
                <!--side bar --> 
                
                <?php include ('search-sidebar.php'); ?>
                <?php include ('recent-sidebar.php'); ?>
                
            </div>      
        </div>      
    </div> 
</div>

<?php get_footer('home'); ?>