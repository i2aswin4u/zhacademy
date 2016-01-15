<?php get_header('home');
$_SESSION["academy"] = "overview";
?>
<!-- File : taxonomy-academy-overview.php-->
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
        <!--Tabs Area Start-->    
        <!--Navigation Academy Terms start-->
        <div class="nav-tab-bg">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <!-- Nav tabs -->
                         <?php include("academy_menu.php"); ?> 
                    </div>      
                </div>      
            </div>                                                      
        </div>
        <!--Navigation Academy Terms stop-->
        <!--Navigation Modules Terms start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div>   
                        <!--Small Screen Academy Menu start-->
                        <div class="row">
                           <?php include("mobile_menu.php"); ?> 
                        </div>
                        <!--Small Screen Academy Menu stop-->
                        <div class="row">
                            <div class="col-lg-3 col-md-3 colo-sm-12 col-xs-12">
                                <?php get_sidebar(); ?>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                <!-- Tab panes -->
<!-- over view Content area starts-->
                                <div class="margin-tb30 full-content">
                                    <div>
                                        <div class="row">
                                            <?php 
                                               $termparent = $_SESSION["modules"];                                                     
                                                   $destname = get_term_by('slug',$termparent,'groups');  
                                                   $id_term  = $destname->term_taxonomy_id;
                                                    $args = array(
                                                        'child_of' => $id_term,
                                                        'taxonomy' => 'groups',      
                                                        'posts_per_page' => 4,                                                  
                                                    );
                                                    $categories = get_categories($args);
                                                    if($categories){
                                            ?>
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <div class="content-section">
                                                    <h2><i class="fa fa-file-text"></i> Help Documents</h2>       
                                                    <div class="documents">
                                                <?php                                                
                                                    $i = 0;
                                                    foreach ($categories as $category) {
                                                    $term_id_is = $category->term_id;                                                   
                                                    if($i<4){
                                                 ?>
                                                    
                                                        <a href="<?php echo bloginfo('siteurl');?>/group/<?php echo $termparent;?>/">
                                                            <div>
                                                                <?php echo $category->name;?> <i class="fa fa-angle-right"></i>
                                                            </div>
                                                        </a>
                                                    
                                                    <?php $i = $i+1;   }                                                                                                      
                                                    }
                                                    ?></div> <?php
                                                    if($i != 0){ ?>
                                                        <a href="<?php echo bloginfo('siteurl');?>/academy/help-document/">
                                                            <div class="more-btn">More</div>
                                                        </a>
                                                   <?php }
                                                   else{
                                                   echo "No Post Found";                                                   
                                                   }?>                                                 
                                                </div>
                                            </div> 
                                                    <?php } ?>
<!--Video Section Overview start-->                                            
                                            
                                                    <?php
                                                    $cat=$_SESSION["modules"];
                                                    $args = array(
                                                        'post_type' => 'post',
                                                        'posts_per_page' => '2',
                                                        'tax_query' => array(
                                                            'relation' => 'AND',
                                                            array(
                                                                'taxonomy' => 'modules', // modules (rep)
                                                                'field' => 'slug',
                                                                'terms' => $_SESSION["modules"],
                                                            ),
                                                            array(
                                                                'taxonomy' => 'product', // (oemr/blue-product)
                                                                'field' => 'slug',
                                                               'terms' => $_SESSION["product"],
                                                            ),
                                                            array(
                                                                'taxonomy' => 'academy', // (academy)
                                                                'field' => 'slug',
                                                                'terms' => array('video'),
                                                            ),
                                                        ),
                                                    );
                                                    $the_query = new WP_Query($args);
                                                    if ($the_query->have_posts()) {
                                                        ?>
                                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                            <div class="content-section">
                                                                <h2>
                                                                    <i class="fa fa-play"></i> Video Tutorials                                                        
                                                                </h2>
                                                        <div class="videos">
                                                        <?php
                                                        while ($the_query->have_posts()) {
                                                            $the_query->the_post();
                                                            ?>
                                                            <div class="video-tutorials">
                                                                <div class="video-image">
                                                               <?php 
                                                                $video_url = get_field("video_url_of_text_help");
                                                                if ($video_url) { 
                                                                    $exploded = (explode("v=", $video_url));
                                                                    ?>
                                                                    <img src="http://img.youtube.com/vi/<?php echo $exploded[1]; ?>/0.jpg" alt="" />
                                                                    <?php
                                                                    } ?>                                                                                                                                                   
                                                                </div>
                                                                <div class="video-content">
                                                                    <h4><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
                                                                    <p><a href="<?php the_permalink();?>"><?php echo substr(get_the_excerpt(), 0,30); ?></a></p>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>
                                                         </div>
                                                            <a href="<?php echo bloginfo('siteurl');?>/academy/video/">
                                                                 <div class="more-btn">More</div>
                                                             </a>
                                                    </div>
                                            </div>
                                                        <?php
                                                    } else {
                                                        
                                                        ?>
<!--                                                        <div class="no-post">
                                                            No Post Found
                                                        </div>-->
                                                        <?php
                                                    }
                                                    wp_reset_postdata();
                                                    ?>
                                                    
                                                
<!--Video Section Overview stop-->    

                                                    <?php
                                                        $args = array(
                                                                'post_type' => 'post',
                                                                'posts_per_page' => '2',
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
                                                                            'terms' => array('course'),
                                                                        ),
                                                                ),
                                                        );


                                                        // The Query
                                                        $the_query = new WP_Query( $args );
                                                        //var_dump($the_query);
                                                        // The Loop
                                                        if ( $the_query->have_posts() ) {
                                                            ?>
                                                     <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <div class="content-section">
                                                            <h2><i class="fa fa-graduation-cap"></i> Detailed Courses</h2>
                                                                <div class="courses">
                                                                <?php
                                                                while ( $the_query->have_posts() ) {
                                                                        $the_query->the_post();
                                                                           ?>
                                                                <div class="detailed-courses">
                                                                   <div class="video-image">
                                                                <?php  if ( has_post_thumbnail() ) {
                                                                                the_post_thumbnail();
                                                                        }
                                                                        else {
                                                                               ?> <a href=""><img src="<?php echo bloginfo('stylesheet_directory'); ?>/img/video-tutorial01.jpg"></a><?php 
                                                                        }
                                                                        ?>

                                                                   </div>
                                                                   <div class="courses-content">
                                                                       <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
                                                                       <p><a href="<?php the_permalink();?>"><?php echo substr(get_the_excerpt(), 0,100); ?></a></p>
                                                                   </div>
                                                               </div> 
                                                             <?php
                                                                }
                                                                ?>
                                                                    </div>                                                         
                                                                    <a href="<?php echo bloginfo('siteurl');?>/academy/course/">
                                                                        <div class="more-btn">More</div>
                                                                    </a>
                                                            </div>
                                                    </div>
                                                                <?php
                                                        } else {                                                                
                                                        ?>
<!--                                                        <div class="no-post">
                                                            No Post Found
                                                        </div>-->
                                                        <?php
                                                        }
                                                        wp_reset_postdata();

                                                        ?>                                                   
                                                    

                                            
                                                            <?php
                                                            $args = array(
                                                                    'post_type' => 'post',
                                                                    'posts_per_page' => '4',
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
                                                                                'terms' => array('faq'),
                                                                            ),
                                                                    ),
                                                            );

//Knowledge Base Area staRT
                                                            // The Query
                                                            $the_query = new WP_Query( $args );
                                                            //var_dump($the_query);
                                                            // The Loop
                                                            if ( $the_query->have_posts() ) {
                                                                ?>
                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                             <div class="content-section">
                                                                 <h2><i class="fa fa-question"></i> Knowledge Base (FAQ)</h2>
                                                                 <div class="faq">
                                                                     <ul class="list-items">
                                                                <?php
                                                                    while ( $the_query->have_posts() ) {
                                                                            $the_query->the_post();
//                                                                            echo '<li>' . the_title() . '</li>';
                                                                     ?><li><a href="<?php the_permalink();?>"><?php the_title();?></a></li><?php
                                                                    } ?>
                                                                     </ul>
                                                                        </div>
                                                                            <a href="<?php echo bloginfo('siteurl');?>/academy/faq/">
                                                                                <div class="more-btn">More</div>
                                                                            </a>
                                                                    </div>
                                                                </div>
                                                                     <?php
                                                            } else {                                                              
                                                            }
                                                            wp_reset_postdata();
                                                            ?>
                                                        
                                        </div>
                                    </div>
                                </div>
          <!--overview Content-repalce End--> 
                            </div>
                        </div>
                    </div> 

                </div>
            </div>
        </div>


        <!--Tabs Navigation Modules Area Stop-->  
        <!--Contact Area start-->  
            <div class="readmore padding-tb20">
                <div class="container">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                           <h4><?php echo ot_get_option('footer_banner_text');?></h4>
                        </div>
                    </div>
                </div>
            <!--Contact Area stop-->  

    </div>
<?php get_footer('home'); ?>