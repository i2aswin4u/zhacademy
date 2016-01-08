<!-- Right Side Bar-->
    <div class="right-section">
        <div class="right-content-section">            
           <?php
           $cat=$_SESSION["modules"];
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => '2',
                    'tax_query' => array(
                        'relation' => 'AND',
                        array(
                            'taxonomy' => 'modules', // modules
                            'field' => 'slug',
                            'terms' => $_SESSION["modules"],
                        ),
                        array(
                            'taxonomy' => 'product', // (oemr/blue)::product
                            'field' => 'slug',
                            'terms' => $_SESSION["product"],
                        ),
                        array(
                            'taxonomy' => 'academy', // academy
                            'field' => 'slug',
                            'terms' => array('video'),
                        ),
                    ),
                );
                $the_query = new WP_Query($args);
                if ($the_query->have_posts()) {
                    ?> <h2 class="line"><span>Related Videos</span></h2> <?php
                    while ($the_query->have_posts()) {
                        $the_query->the_post();
                        ?>
            
            <div class="content">
                <h3><i class="fa fa-play-circle-o"></i> <a href="<?php the_permalink();?>"><?php the_title();?></a> </h3>
                <p><a href="<?php the_permalink();?>"><?php echo substr(get_the_excerpt(), 0,100); ?></a> </p>
            </div>
            <?php
                    }
                    ?>
                    <?php
                } else {
                }     
                wp_reset_query(); 
            ?>
            
<!--            <div class="content">
                <h3><i class="fa fa-play-circle-o"></i> <a href="#">Features</a> </h3>
                <p><a href="#">Which can be used for the Clinics &amp; Pients to send communications.</a> </p>
            </div>-->
            
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
                            'terms' => array('course'),
                        ),
                    ),
                );
                $the_query = new WP_Query($args);
                if ($the_query->have_posts()) {
                    ?><h2 class="line"><span>Related Courses</span></h2><?php 
                    while ($the_query->have_posts()) {
                        $the_query->the_post();
                ?>
            <div class="content">
                <h3><i class="fa fa-graduation-cap"></i> <a href="<?php the_permalink();?>"><?php the_title();?></a> </h3>
                <p><a href="<?php the_permalink();?>"><?php echo substr(get_the_excerpt(), 0,100); ?></a> </p>
            </div>
               <?php
                    }
                    ?>
                    <?php
                } else {
                }                                
            ?>
            
<!--            <div class="content">
                <h3><i class="fa fa-graduation-cap"></i> <a href="#">Features</a> </h3>
                <p><a href="#">Which can be used for the Clinics &amp; Pients to send communications.</a> </p>
            </div>-->          
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
                            'terms' => array('faq'),
                        ),
                    ),
                );
                $the_query = new WP_Query($args);
//echo '<pre>';var_dump($the_query); echo '</pre>';
                if ($the_query->have_posts()) {
                    ?> <h2 class="line"><span>FAQ (Knowledge Base)</span></h2><?php
                    while ($the_query->have_posts()) {
                        $the_query->the_post();
                ?>
            <div class="content">
                <p><i class="fa fa-caret-right"></i><a href="<?php the_permalink();?>"><?php the_title();?></a> </p>
            </div>
             <?php
                    }
                    ?>
                    <?php
                } else {
                    ?>   <?php 
                }                                
            ?>
<!--            <div class="content">
                <p><i class="fa fa-caret-right"></i><a href="#">How to change access control for various users?</a></p>
            </div>-->
            <!--                                                                                                    <div class="content">                                                                                                                                                            <p><i class="fa fa-caret-right"></i><a href="#">How to add new category in to the current list of categories?</a></p>                                                                                                                                                       </div>-->
        </div>
    </div>