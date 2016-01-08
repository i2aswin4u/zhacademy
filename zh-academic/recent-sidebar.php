<!--side bar -->  
<?php
$tags = wp_get_post_tags($post->ID);
$post_type = get_post_type($post->ID);
$currentpostid = get_the_ID();
if ($post_type == 'faq') {
    $posttype_text = "Related FAQ's";
} else if ($post_type == 'texthelpdoc') {
    $posttype_text = "Related Help Documents";
} else {
    $posttype_text = "Related Post";
}
foreach ($tags as $tag) {
    $tagis = $tag->slug;
}
?>
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 Sidebar">
 <?php
    sidebarvideo($tagis); 
    sidebarfaq($tagis); 
    sidebartexthelp($tagis);
  ?>
</div>

<?php
function sidebartexthelp($tagis ) { ?>
    <div class="box">
        <h4>
    <?php echo 'Recent Help Documents'   ?>
        </h4> 
        <hr>
        <hr> 
        <ul>               
            <?php
            $args = 'post_type=texthelpdoc&showposts=6';
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) {
                while ($the_query->have_posts()) {
                    $the_query->the_post();
                    ?>
                    <li>
                        <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a>
                    </li>
                    <?php
                }
            } else {
                echo 'no posts found';
            }
            wp_reset_postdata();
            ?>                                    
        </ul>
        <a class="btn btn-academy" href="<?php echo site_url(); ?>/texthelpdoc/" >
            View All
        </a>
    </div>
<?php
}

function sidebarvideo($tagis) {
    ?>
    <div class="box-video">
        <h4>
            Recent Videos
        </h4> 
        <hr>
        <hr> 
        <ul>
            <?php
               $args = array(
                'post_type' => 'post',
                'posts_per_page' => 6,
                'tax_query' => array(
                        array(
                                'taxonomy' => 'academy',
                                'field'    => 'slug',
                                'terms'    => 'video',
                        ),
                ),
            );
            $the_query1 = new WP_Query($args);
            if ($the_query1->have_posts()) {
                while ($the_query1->have_posts()) {
                    $the_query1->the_post();
                    ?>
                    <li>
                        <?php
                        $video_url = get_field("video_url_of_text_help");
                        if ($video_url) {
                            ?>
                            <a href="<?php the_permalink(); ?>">
                                <div class="youtube-img">
                <?php $exploded = (explode("v=", $video_url));
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
<?php
}

function sidebarfaq($tagis) {
    ?>
    <div class="box">
        <h4>
            Recent FAQ's
        </h4> 
        <hr>
        <hr> 
        <ul>
            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 6,
                'tax_query' => array(
                        array(
                                'taxonomy' => 'academy',
                                'field'    => 'slug',
                                'terms'    => 'faq',
                        ),
                ),
            );
//            $args = 'post_type=faq&showposts=6';
            $the_query1 = new WP_Query($args);
            if ($the_query1->have_posts()) {
                while ($the_query1->have_posts()) {
                    $the_query1->the_post();
                    ?>
                    <li>
                        <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>      
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
        <a class="btn btn-academy" href="<?php echo site_url(); ?>/faq" >
            View All
        </a>
    </div>
<?php } ?>
