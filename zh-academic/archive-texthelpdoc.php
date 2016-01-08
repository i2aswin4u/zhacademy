<?php
/*
  Template name: Academic Faq
 */
get_header('home');
?>
<?php if($post_type=='faq') { $posttype_text ="Related FAQ's";}
      else if($post_type=='texthelpdoc') { $posttype_text ="Recent Help Documents"; }
      else {  $posttype_text="Recent Post"; }
      ?>
<!-- End Header -->
<div class="academy">
    <div class="academy-top">
        <!-- Top Banner -->
        <div class="banners">
            <div class="container-fluid">
                <div class="row">
                    <h1>
                       Help Documents 
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
                        <?php if ( function_exists('yoast_breadcrumb') ) {
                               yoast_breadcrumb('<p id="breadcrumbs">','</p>');
                        } ?>
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
                    <div class="the_content">
                        <div class="accademy-knowledge">                     
                            <?php
                            $post_type = 'texthelpdoc';
                            $tax = 'groups';
                            $taxarr=array( 'tax' => $tax);
                            $tax_terms = get_terms($taxarr);
                            if ($tax_terms) {
                                ?>
                                <ul class="row">
                                    <?php
                                    foreach ($tax_terms as $tax_term) {
                                        if($tax_term->parent==0){
                                        $args = array(
                                            'post_type' => $post_type,
                                            "$tax" => $tax_term->slug,
                                            'post_status' => 'publish',
                                            'posts_per_page' => -1,
                                            'caller_get_posts' => 1,
                                            'orderby'=>'term_order',
                                            'order'=>'ASC',
                                        );

                                        $my_query = null;
                                        $my_query = new WP_Query($args);
                                        if ($my_query->have_posts()) {
                                            ?>
                                            <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">				
                                                <h2 class="title-active"><?php echo $tax_term->name ?><i class="fa fa-plus-square-o pull-right add-btn"></i></h2>
                                                <ul class="row knowledge-inner">
                                                    <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>

                                                        <li>
                                                            <h4><i class="fa fa-caret-right right-arrow"></i><?php the_title(); ?><i class="fa fa-plus-square-o pull-right add-btn"></i></h4>
                                                            <div class="zh_faq_new_answer">
                                                                <?php
                                                                $youtube_url = get_field("youtube_video_url_faq");
                                                                if ($youtube_url) {
                                                                    ?>
                                                                    <div class="videowrapper">	
                                                                        <?php
                                                                        if (preg_match('![?&]{1}v=([^&]+)!', $youtube_url . '&', $m))
                                                                            $video_id = $m[1];
                                                                        ?>									
                                                                        <iframe  src="https://www.youtube.com/embed/<?php echo $video_id; ?>?rel=0" frameborder="0" allowfullscreen></iframe>									
                                                                    </div>
                                                                  <?php } ?>
                                                                <p><?php echo get_the_content(); ?></p>
                                                                <?php
                                                                if (has_post_thumbnail()) {
                                                                    the_post_thumbnail('full');
                                                                }
                                                                ?>                                                               
                                                                <div class="share_url_new_faq">
                                                                    <div class="share_url_button">
                                                                        Share
                                                                    </div>
                                                                    <input type="text" value="<?php the_permalink(); ?>" class="share_url_url_box" onblur="faq_url_box_blur($(this))">
                                                                </div>
                                                                <span class="st_facebook" st_title="<?php the_title(); ?>" st_url="<?php the_permalink(); ?>" st_processed="yes"><span style="text-decoration: none; color: rgb(0, 0, 0); display: inline-block; cursor: pointer; padding-left: 0px; padding-right: 0px; width: 16px;" class="stButton"><span class="chicklets facebook">&nbsp;</span></span></span>
                                                                <span class="st_twitter" st_title="<?php the_title(); ?>" st_url="<?php the_permalink(); ?>" st_processed="yes"><span style="text-decoration: none; color: rgb(0, 0, 0); display: inline-block; cursor: pointer; padding-left: 0px; padding-right: 0px; width: 16px;" class="stButton"><span class="chicklets twitter">&nbsp;</span></span></span>
                                                                <span class="st_linkedin" st_title="<?php the_title(); ?>" st_url="<?php the_permalink(); ?>" st_processed="yes"><span style="text-decoration: none; color: rgb(0, 0, 0); display: inline-block; cursor: pointer; padding-left: 0px; padding-right: 0px; width: 16px;" class="stButton"><span class="chicklets linkedin">&nbsp;</span></span></span>
                                                                <span class="st_email" st_title="<?php the_title(); ?>" st_url="<?php the_permalink(); ?>" st_processed="yes"><span style="text-decoration: none; color: rgb(0, 0, 0); display: inline-block; cursor: pointer; padding-left: 0px; padding-right: 0px; width: 16px;" class="stButton"><span class="chicklets email">&nbsp;</span></span></span>
                                                                <span class="st_sharethis" st_title="<?php the_title(); ?>" st_url="<?php the_permalink(); ?>" st_processed="yes"><span style="text-decoration: none; color: rgb(0, 0, 0); display: inline-block; cursor: pointer; padding-left: 0px; padding-right: 0px; width: 16px;" class="stButton"><span class="chicklets sharethis">&nbsp;</span></span></span>
                                                                <span st_title="<?php the_title(); ?>" st_url="<?php the_permalink(); ?>" class="st_pinterest" st_processed="yes"><span style="text-decoration: none; color: rgb(0, 0, 0); display: inline-block; cursor: pointer; padding-left: 0px; padding-right: 0px; width: 16px;" class="stButton"><span class="chicklets pinterest">&nbsp;</span></span></span>
                                                                <p><a class="post-edit-link" href="<?php the_permalink(); ?>"><?php edit_post_link ?></a></p>	
                                                            </div>								
                                                        </li>
                                                        <?php
                                                    endwhile;
                                                    ?></ul>
                                            </li>
                                            <?php
                                        }
                                        wp_reset_query();
                                    }
                                    }
                                    ?></ul> 
                                <?php
                            }
                            ?>
                        </div>
                    </div><!--the content-->
                </div>
                    <!--side bar -->  
                <?php include ('search-sidebar.php'); ?>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 Sidebar">
                    <div class="box">
                        <h4>
                            <?php echo $posttype_text; ?>
                        </h4> 
                        <hr>
                        <hr> 
                        <ul>               
                            <?php
                              $args = 'post_type='.$post_type.'&showposts=6&tag='.$tagis.'';
                              $the_query = new WP_Query($args);
                              if ($the_query->have_posts()) {
                                  while ($the_query->have_posts()) {
                                      $the_query->the_post();
                                      ?>
                                      <li>
                                          <a href="<?php the_permalink();?>"> <?php the_title(); ?> </a>
                                      </li>
                                      <?php
                                  }
                              } else {
                                  echo 'no posts found';
                              }
                              wp_reset_postdata();
                              ?>                                    
                        </ul>
                        <a class="btn btn-academy" href="" target="_blank">
                            View All
                        </a>
                    </div>
                    <div class="box-video">
                        <h4>
                            Recent Videos
                        </h4> 
                        <hr>
                        <hr> 
                        <ul>
                              <?php
                                $args = 'post_type=videos&showposts=6&tag='.$tagis.'';
                                $the_query1 = new WP_Query($args);
                                if ($the_query1->have_posts()) {
                                    while ($the_query1->have_posts()) {
                                        $the_query1->the_post();
                                        ?>
                                        <li>
                                             <?php $video_url= get_field("video_url_of_text_help"); 
                                            if($video_url){
                                                ?>
                                                 <a href="<?php the_permalink();?>">
                                                    <div class="youtube-img">
                                                        <?php $exploded = (explode("v=",$video_url));
                                                        ?>
                                                        <img src="http://img.youtube.com/vi/<?php echo $exploded[1]; ?>/0.jpg" alt="" />
                                                    </div>   
                                                    <div class="listsubtxt">
                                                        <p>
                                                            <?php the_title(); ?><br>

                                                        </p>
                                                    </div> 
                                                </a>
                                                    <?php
                                            }
                                             ?>                                                                                                             
                                        </li>
                                        <?php
                                    }
                                } else {
                                    echo 'no posts found';
                                }
                                wp_reset_postdata();
                                ?>            
                        </ul>
                        <a class="btn btn-academy" href="" target="_blank">
                            View All
                        </a>
                    </div>
                    <div class="box">
                        <h4>
                            Recent FAQ's
                        </h4> 
                        <hr>
                        <hr> 
                        <ul>
                        <?php
                                $args = 'post_type=faq&showposts=6';
                                $the_query1 = new WP_Query($args);
                                if ($the_query1->have_posts()) {
                                    while ($the_query1->have_posts()) {
                                        $the_query1->the_post();
                                        ?>
                                        <li>
                                            <a href="<?php the_permalink();?>">
                                                <?php the_title();?>      
                                            </a>
                                        </li>
                                        <?php
                                    }
                                } else {
                                    echo 'no posts found';
                                }
                                wp_reset_postdata();
                                ?>                         
                        </ul>
                        <a class="btn btn-academy" href="" target="_blank">
                            View All
                        </a>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class= "row">
                    </div>
                </div>
            </div>      
        </div>      
    </div>                                           
<?php get_footer('home'); ?>