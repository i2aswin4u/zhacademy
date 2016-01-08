<?php
/*
  Template name: Academic Faq
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
                    <h1>
                        Advanced Biling
                    </h1>
                    <p>
                        Learn the simplicity & flexibility of the Blue EHS .
                        Understand how it adapts to the way you practice - your way.  
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
                        <a href="">
                            Academy  
                        </a>
                        <i class="fa fa-angle-double-right"></i>

                        <a href="">
                            Modules 
                        </a>
                        <i class="fa fa-angle-double-right"></i>
                        <a href="">
                            <span> Advanced Billing</span>
                        </a>
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
                            $post_type = 'faq';
                            $tax = 'categories';
                            $tax_terms = get_terms($tax);
                            if ($tax_terms) {
                                ?>
                                <ul class="row">
                                    <?php
                                    foreach ($tax_terms as $tax_term) {
                                        $args = array(
                                            'post_type' => $post_type,
                                            "$tax" => $tax_term->slug,
                                            'post_status' => 'publish',
                                            'posts_per_page' => -1,
                                            'caller_get_posts' => 1
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

                                                                                                                <!--<img alt="" src="http://192.168.1.254/wordpress_sites/zhhealthcare//wp-content/uploads/2015/01/BL003.png">										<div class="clear"></div>-->
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
                                                    ?>


                                                    <!--                                                    <li>
                                                                                                            <h4><i class="fa fa-caret-right right-arrow"></i><?php the_title(); ?><i class="fa fa-plus-square-o pull-right add-btn"></i></h4>
                                                                                                            <div class="zh_faq_new_answer">																		<p><?php echo get_the_content(); ?></p><p><img src="http://192.168.1.254/wordpress_sites/zhhealthcare//wp-content/uploads/2015/01/BL002.png" alt=""></p>										<div class="clear"></div>
                                                                                                                <div class="share_url_new_faq">
                                                                                                                    <div class="share_url_button">
                                                                                                                        Share
                                                                                                                    </div>
                                                                                                                    <input type="text" value="http://192.168.1.254/wordpress_sites/zhhealthcare/faq/how-do-we-re-open-an-already-billed-encounter-from-the-fee-sheet/" class="share_url_url_box" onblur="faq_url_box_blur($(this))">
                                                                                                                </div>
                                                                                                                <span class="st_facebook" st_title="How do we Re-open an already billed encounter from the Fee sheet?" st_url="http://192.168.1.254/wordpress_sites/zhhealthcare/faq/how-do-we-re-open-an-already-billed-encounter-from-the-fee-sheet/" st_processed="yes"><span style="text-decoration: none; color: rgb(0, 0, 0); display: inline-block; cursor: pointer; padding-left: 0px; padding-right: 0px; width: 16px;" class="stButton"><span class="chicklets facebook">&nbsp;</span></span></span>
                                                                                                                <span class="st_twitter" st_title="How do we Re-open an already billed encounter from the Fee sheet?" st_url="http://192.168.1.254/wordpress_sites/zhhealthcare/faq/how-do-we-re-open-an-already-billed-encounter-from-the-fee-sheet/" st_processed="yes"><span style="text-decoration: none; color: rgb(0, 0, 0); display: inline-block; cursor: pointer; padding-left: 0px; padding-right: 0px; width: 16px;" class="stButton"><span class="chicklets twitter">&nbsp;</span></span></span>
                                                                                                                <span class="st_linkedin" st_title="How do we Re-open an already billed encounter from the Fee sheet?" st_url="http://192.168.1.254/wordpress_sites/zhhealthcare/faq/how-do-we-re-open-an-already-billed-encounter-from-the-fee-sheet/" st_processed="yes"><span style="text-decoration: none; color: rgb(0, 0, 0); display: inline-block; cursor: pointer; padding-left: 0px; padding-right: 0px; width: 16px;" class="stButton"><span class="chicklets linkedin">&nbsp;</span></span></span>
                                                                                                                <span class="st_email" st_title="How do we Re-open an already billed encounter from the Fee sheet?" st_url="http://192.168.1.254/wordpress_sites/zhhealthcare/faq/how-do-we-re-open-an-already-billed-encounter-from-the-fee-sheet/" st_processed="yes"><span style="text-decoration: none; color: rgb(0, 0, 0); display: inline-block; cursor: pointer; padding-left: 0px; padding-right: 0px; width: 16px;" class="stButton"><span class="chicklets email">&nbsp;</span></span></span>
                                                                                                                <span class="st_sharethis" st_title="How do we Re-open an already billed encounter from the Fee sheet?" st_url="http://192.168.1.254/wordpress_sites/zhhealthcare/faq/how-do-we-re-open-an-already-billed-encounter-from-the-fee-sheet/" st_processed="yes"><span style="text-decoration: none; color: rgb(0, 0, 0); display: inline-block; cursor: pointer; padding-left: 0px; padding-right: 0px; width: 16px;" class="stButton"><span class="chicklets sharethis">&nbsp;</span></span></span>
                                                                                                                <span st_title="How do we Re-open an already billed encounter from the Fee sheet?" st_url="http://192.168.1.254/wordpress_sites/zhhealthcare/faq/how-do-we-re-open-an-already-billed-encounter-from-the-fee-sheet/" class="st_pinterest" st_processed="yes"><span style="text-decoration: none; color: rgb(0, 0, 0); display: inline-block; cursor: pointer; padding-left: 0px; padding-right: 0px; width: 16px;" class="stButton"><span class="chicklets pinterest">&nbsp;</span></span></span>
                                                                                                                <p><a class="post-edit-link" href="http://192.168.1.254/wordpress_sites/zhhealthcare/wp-admin/post.php?post=4359&amp;action=edit">edit</a></p>	
                                                                                                            </div>								
                                                                                                        </li>-->
                                                    <!--                                                    <li>
                                                                                                            <h4><i class="fa fa-caret-right right-arrow"></i>How can we clone the fee sheet from a previous visit?<i class="fa fa-plus-square-o pull-right add-btn"></i></h4>
                                                                                                            <div class="zh_faq_new_answer">																		<p>To clone the fee sheet from a previous visit, we can use the drop down shown below</p>
                                                                                                                <img alt="" src="http://192.168.1.254/wordpress_sites/zhhealthcare//wp-content/uploads/2015/01/BL001.png">										<div class="clear"></div>
                                                                                                                <div class="share_url_new_faq">
                                                                                                                    <div class="share_url_button">
                                                                                                                        Share
                                                                                                                    </div>
                                                                                                                    <input type="text" value="http://192.168.1.254/wordpress_sites/zhhealthcare/faq/how-can-we-clone-the-fee-sheet-from-a-previous-visit/" class="share_url_url_box" onblur="faq_url_box_blur($(this))">
                                                                                                                </div>
                                                                                                                <span class="st_facebook" st_title="How can we clone the fee sheet from a previous visit?" st_url="http://192.168.1.254/wordpress_sites/zhhealthcare/faq/how-can-we-clone-the-fee-sheet-from-a-previous-visit/" st_processed="yes"><span style="text-decoration: none; color: rgb(0, 0, 0); display: inline-block; cursor: pointer; padding-left: 0px; padding-right: 0px; width: 16px;" class="stButton"><span class="chicklets facebook">&nbsp;</span></span></span>
                                                                                                                <span class="st_twitter" st_title="How can we clone the fee sheet from a previous visit?" st_url="http://192.168.1.254/wordpress_sites/zhhealthcare/faq/how-can-we-clone-the-fee-sheet-from-a-previous-visit/" st_processed="yes"><span style="text-decoration: none; color: rgb(0, 0, 0); display: inline-block; cursor: pointer; padding-left: 0px; padding-right: 0px; width: 16px;" class="stButton"><span class="chicklets twitter">&nbsp;</span></span></span>
                                                                                                                <span class="st_linkedin" st_title="How can we clone the fee sheet from a previous visit?" st_url="http://192.168.1.254/wordpress_sites/zhhealthcare/faq/how-can-we-clone-the-fee-sheet-from-a-previous-visit/" st_processed="yes"><span style="text-decoration: none; color: rgb(0, 0, 0); display: inline-block; cursor: pointer; padding-left: 0px; padding-right: 0px; width: 16px;" class="stButton"><span class="chicklets linkedin">&nbsp;</span></span></span>
                                                                                                                <span class="st_email" st_title="How can we clone the fee sheet from a previous visit?" st_url="http://192.168.1.254/wordpress_sites/zhhealthcare/faq/how-can-we-clone-the-fee-sheet-from-a-previous-visit/" st_processed="yes"><span style="text-decoration: none; color: rgb(0, 0, 0); display: inline-block; cursor: pointer; padding-left: 0px; padding-right: 0px; width: 16px;" class="stButton"><span class="chicklets email">&nbsp;</span></span></span>
                                                                                                                <span class="st_sharethis" st_title="How can we clone the fee sheet from a previous visit?" st_url="http://192.168.1.254/wordpress_sites/zhhealthcare/faq/how-can-we-clone-the-fee-sheet-from-a-previous-visit/" st_processed="yes"><span style="text-decoration: none; color: rgb(0, 0, 0); display: inline-block; cursor: pointer; padding-left: 0px; padding-right: 0px; width: 16px;" class="stButton"><span class="chicklets sharethis">&nbsp;</span></span></span>
                                                                                                                <span st_title="How can we clone the fee sheet from a previous visit?" st_url="http://192.168.1.254/wordpress_sites/zhhealthcare/faq/how-can-we-clone-the-fee-sheet-from-a-previous-visit/" class="st_pinterest" st_processed="yes"><span style="text-decoration: none; color: rgb(0, 0, 0); display: inline-block; cursor: pointer; padding-left: 0px; padding-right: 0px; width: 16px;" class="stButton"><span class="chicklets pinterest">&nbsp;</span></span></span>
                                                                                                                <p><a class="post-edit-link" href="http://192.168.1.254/wordpress_sites/zhhealthcare/wp-admin/post.php?post=4357&amp;action=edit">edit</a></p>	
                                                                                                            </div>								
                                                                                                        </li>-->

                                                </ul>
                                            </li>
                                            <?php
                                        }
                                        wp_reset_query();
                                    }
                                    ?>
                                    <!--                                            <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <h2>Care Coordination<i class="fa fa-plus-square-o pull-right add-btn"></i></h2>	
                                                                                    <ul class="row knowledge-inner">							
                                                                                        <li><h4><i class="fa fa-caret-right right-arrow"></i>What is Data Enterer?<i class="fa fa-plus-square-o pull-right add-btn"></i></h4>
                                                                                            <div class="zh_faq_new_answer">																		<p>To set up auto sign off for encounters go to ‘modular installer’ then choose the ‘settings option’ for ‘care coordination’, here there will be another ‘settings’ option in the settings option the first option is to to add a date for auto sign off for the encounter.</p><p><img src="http://192.168.1.254/wordpress_sites/zhhealthcare//wp-content/uploads/2015/01/cc4.png" alt=""></p>										<div class="clear"></div>
                                                                                                <div class="share_url_new_faq">
                                                                                                    <div class="share_url_button">
                                                                                                        Share
                                                                                                    </div>
                                                                                                    <input type="text" value="http://192.168.1.254/wordpress_sites/zhhealthcare/faq/how-to-set-up-auto-sign-off-for-encounters/" class="share_url_url_box" onblur="faq_url_box_blur($(this))">
                                                                                                </div>
                                                                                                <span class="st_facebook" st_title="How to set up auto sign off for encounters ?" st_url="http://192.168.1.254/wordpress_sites/zhhealthcare/faq/how-to-set-up-auto-sign-off-for-encounters/" st_processed="yes"><span style="text-decoration: none; color: rgb(0, 0, 0); display: inline-block; cursor: pointer; padding-left: 0px; padding-right: 0px; width: 16px;" class="stButton"><span class="chicklets facebook">&nbsp;</span></span></span>
                                                                                                <span class="st_twitter" st_title="How to set up auto sign off for encounters ?" st_url="http://192.168.1.254/wordpress_sites/zhhealthcare/faq/how-to-set-up-auto-sign-off-for-encounters/" st_processed="yes"><span style="text-decoration: none; color: rgb(0, 0, 0); display: inline-block; cursor: pointer; padding-left: 0px; padding-right: 0px; width: 16px;" class="stButton"><span class="chicklets twitter">&nbsp;</span></span></span>
                                                                                                <span class="st_linkedin" st_title="How to set up auto sign off for encounters ?" st_url="http://192.168.1.254/wordpress_sites/zhhealthcare/faq/how-to-set-up-auto-sign-off-for-encounters/" st_processed="yes"><span style="text-decoration: none; color: rgb(0, 0, 0); display: inline-block; cursor: pointer; padding-left: 0px; padding-right: 0px; width: 16px;" class="stButton"><span class="chicklets linkedin">&nbsp;</span></span></span>
                                                                                                <span class="st_email" st_title="How to set up auto sign off for encounters ?" st_url="http://192.168.1.254/wordpress_sites/zhhealthcare/faq/how-to-set-up-auto-sign-off-for-encounters/" st_processed="yes"><span style="text-decoration: none; color: rgb(0, 0, 0); display: inline-block; cursor: pointer; padding-left: 0px; padding-right: 0px; width: 16px;" class="stButton"><span class="chicklets email">&nbsp;</span></span></span>
                                                                                                <span class="st_sharethis" st_title="How to set up auto sign off for encounters ?" st_url="http://192.168.1.254/wordpress_sites/zhhealthcare/faq/how-to-set-up-auto-sign-off-for-encounters/" st_processed="yes"><span style="text-decoration: none; color: rgb(0, 0, 0); display: inline-block; cursor: pointer; padding-left: 0px; padding-right: 0px; width: 16px;" class="stButton"><span class="chicklets sharethis">&nbsp;</span></span></span>
                                                                                                <span st_title="How to set up auto sign off for encounters ?" st_url="http://192.168.1.254/wordpress_sites/zhhealthcare/faq/how-to-set-up-auto-sign-off-for-encounters/" class="st_pinterest" st_processed="yes"><span style="text-decoration: none; color: rgb(0, 0, 0); display: inline-block; cursor: pointer; padding-left: 0px; padding-right: 0px; width: 16px;" class="stButton"><span class="chicklets pinterest">&nbsp;</span></span></span>
                                                                                                <p><a class="post-edit-link" href="http://192.168.1.254/wordpress_sites/zhhealthcare/wp-admin/post.php?post=4350&amp;action=edit">edit</a></p>	
                                                                                            </div>
                                                                                        <li><h4><i class="fa fa-caret-right right-arrow"></i>How to set up auto sign off for encounters ?<i class="fa fa-plus-square-o pull-right add-btn"></i></h4></li>
                                                                                        <li><h4><i class="fa fa-caret-right right-arrow"></i>How can I attach the sub components to the different parts of the EMR. ?<i class="fa fa-plus-square-o pull-right add-btn"></i></h4></li>
                                                                                        <li><h4><i class="fa fa-caret-right right-arrow"></i>How to configure Care-Coordination module ?<i class="fa fa-plus-square-o pull-right add-btn"></i></h4></li>
                                                                                    </ul></li>-->
                                    <!--                                            <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <h2>CDR Engine<i class="fa fa-plus-square-o pull-right add-btn"></i></h2>
                                                                                    <ul class="row knowledge-inner">							
                                                                                        <li><h4>What is Data Enterer?</h4></li>
                                                                                        <li><h4>How to set up auto sign off for encounters ?</h4></li>
                                                                                        <li><h4>How can I attach the sub components to the different parts of the EMR. ?</h4></li>
                                                                                        <li><h4>How to configure Care-Coordination module ?</h4></li>
                                                                                    </ul></li>-->
                                    <!--                                                <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <h2>Lab interface<i class="fa fa-plus-square-o pull-right add-btn"></i></h2>
                                                                                    <ul class="row knowledge-inner">							
                                                                                        <li><h4>What is Data Enterer?</h4></li>
                                                                                        <li><h4>How to set up auto sign off for encounters ?</h4></li>
                                                                                        <li><h4>How can I attach the sub components to the different parts of the EMR. ?</h4></li>
                                                                                        <li><h4>How to configure Care-Coordination module ?</h4></li>
                                                                                    </ul></li>-->
                                    <!--                                                <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <h2>Messaging<i class="fa fa-plus-square-o pull-right add-btn"></i></h2>	
                                                                                    <ul class="row knowledge-inner">							
                                                                                        <li><h4>What is Data Enterer?</h4></li>
                                                                                        <li><h4>How to set up auto sign off for encounters ?</h4></li>
                                                                                        <li><h4>How can I attach the sub components to the different parts of the EMR. ?</h4></li>
                                                                                        <li><h4>How to configure Care-Coordination module ?</h4></li>
                                                                                    </ul></li>-->
                                </ul> 
                                <?php
                            }
                            ?>
                        </div>
                    </div><!--the content-->
                </div>
                <!--side bar -->  
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 Sidebar">
                    <div class="box">
                        <h4>
                            Advanced Billing FAQ's
                        </h4> 
                        <hr>
                        <hr> 
                        <ul>
                            <li>
                                <a hre="#">
                                    How can we view multiple providers in the same calendar ? 
                                </a>

                            </li>
                            <li>
                                <a hre="#">
                                    What is Data Enterer? 
                                </a>

                            </li>

                            <li>
                                <a hre="#">
                                    How many priority levels are there in the reminder settings ? 
                                </a>

                            </li>
                            <li>
                                <a hre="#">
                                    How do I send an order to an external lab ?
                                </a>

                            </li>
                            <li>
                                <a hre="#">
                                    How can we directly go into a patients demographics  ? 
                                </a>

                            </li>
                            <li>
                                <a hre="#">
                                    How to add new templates to the assessments?
                                </a>

                            </li>
                        </ul>
                        <a class="btn btn-academy" href="" target="_blank">
                            View All
                        </a>
                    </div>


                    <div class="box-video">
                        <h4>
                            Related Video
                        </h4> 
                        <hr>
                        <hr> 
                        <ul>
                            <li>
                                <a href="#">
                                    <div class="listsubimg">
                                        <img src="img/smallvideo.png" alt="" />
                                    </div>   
                                    <div class="listsubtxt">
                                        <p>
                                            How can we view multiple providers in the same calendar ? 
                                        </p>
                                    </div>  
                                </a>

                            </li>
                            <li>
                                <a href="#">
                                    <div class="listsubimg">
                                        <img src="img/smallvideo.png" alt="" />
                                    </div>   
                                    <div class="listsubtxt">
                                        <p>
                                            What is Data Enterer?
                                        </p>
                                    </div> 
                                </a>

                            </li>
                            <li>
                                <a href="#">
                                    <div class="listsubimg">
                                        <img src="img/smallvideo.png" alt="" />
                                    </div>   
                                    <div class="listsubtxt">
                                        <p>
                                            How many priority levels are there in the reminder settings ? 
                                        </p>
                                    </div> 
                                </a>

                            </li>    
                            <li>
                                <a href="#">
                                    <div class="listsubimg">
                                        <img src="img/smallvideo.png" alt="" />
                                    </div>   
                                    <div class="listsubtxt">
                                        <p>
                                            How do I send an order to an external lab ?
                                        </p>
                                    </div> 
                                </a>

                            </li>   
                            <li>
                                <a href="#">
                                    <div class="listsubimg">
                                        <img src="img/smallvideo.png" alt="" />
                                    </div>   
                                    <div class="listsubtxt">
                                        <p>
                                            How can we directly go into a patients demographics     
                                        </p>
                                    </div> 
                                </a>

                            </li>   
                            <li>
                                <a href="#">
                                    <div class="listsubimg">
                                        <img src="img/smallvideo.png" alt="" />
                                    </div>   
                                    <div class="listsubtxt">
                                        <p>
                                            How to add new templates to the assessments?
                                        </p>
                                    </div> 
                                </a>

                            </li>   
                        </ul>
                        <a class="btn btn-academy" href="" target="_blank">
                            View All
                        </a>
                    </div>
                    <div class="box">
                        <h4>
                            Other FAQ's
                        </h4> 
                        <hr>
                        <hr> 
                        <ul>
                            <li>
                                <a href="#">
                                    How can we view multiple providers in the same calendar ?      
                                </a>

                            </li>
                            <li>
                                <a href="#">
                                    What is Data Enterer?      
                                </a>

                            </li>
                            <li>
                                <a href="#">
                                    How many priority levels are there in the reminder settings ?  
                                </a>

                            </li>
                            <li>
                                <a href="#">
                                    How do I send an order to an external lab ?    
                                </a>

                            </li>
                            <li>
                                <a href="#">
                                    How can we directly go into a patients demographics  ? 
                                </a>

                            </li>
                            <li>
                                <a href="#">
                                    How to add new templates to the assessments?
                                </a>

                            </li>
                        </ul>
                        <a class="btn btn-academy" href="" target="_blank">
                            View All
                        </a>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class= "row">
                        <div class="helpful-part4 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="question-outer col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <h3>
                                    Is this helpful for you ?    
                                </h3>
                            </div>
                            <div class="question-button col-lg-3 col-md-3 col-sm-3 col-xs-6">  
                                <span>
                                    <input type="radio" name="sex" value="male">Yes
                                </span>
                                <span>
                                    <input type="radio" name="sex" value="male">No
                                </span>
                            </div>
                            <div class="help-socialicons col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-facebook-official"></i>
                                        </a> 
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-google-plus-square"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-twitter-square"></i> 
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>      
        </div>      
    </div>                                           


<?php get_footer('home'); ?>