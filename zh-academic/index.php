<script>
function selectFunction() {
    var x = document.getElementById("module-select").selectedIndex;
    var p_type = document.getElementsByTagName("option")[x].value;
    $('#hidPostType').val(p_type);
}
</script>
<?php get_header('home'); ?>
<div class="academic-main">
    <!-- Top Banner -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                    <h1> <?php echo ot_get_option("home_page_title"); ?></h1>
                    <p class="bold"> <?php echo ot_get_option("home_page_welcome_text"); ?></p>
                    <div class="col-md-12 col-sm-12 col-xs-12 top-space">
                        <div class="col-md-3 col-sm-3 col-xs-12 ">
                            <div class="custom-select pricing-customseletbox">     
                                <form id="searchform" method="get" action="<?php bloginfo('url'); ?>/">
                                <fieldset>                                    
                                <label class="selectbox-label">
                                    <select name="" id="module-select" onchange="moduleSelected(this.value)">
                                                <option value="faq">FAQ</option>
                                                <option value="texthelpdoc">Text Help Doc</option>
                                            </select>
                                    <input type="hidden" name="post_type" id="hidPostType" value=""/>
                                </fieldset>                                    
                                </label>                                  
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-8 text-center set-width">
                            <input id="s"  placeholder="Type here to search any thing " type="text" name="s" value="<?php the_search_query(); ?>" class="text" />
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-4 text-center set-width">
                            <!--< type="submit" id="btn-signup" class="btn btn-block btn-primary btn-lg">-->
                                <button id="searchsubmit" type="submit" value="Search" class="btn btn-block btn-primary btn-lg" onclick="selectFunction()">
                               Submit Now
                            </button>
                        </div>
                    </div>                                  
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12  " >
                
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                    <div class="listing">
                        <div class="listing-inner">
                            <h2>Help Documents 
                                <!--<span>(FAQ)</span>-->
                            </h2>
                            <div class="hr-line"></div>
                            <ul>
                            <?php   $tax = 'groups';
                                  $tax_terms = get_terms( $tax, array( 'parent' => 0 ) );
                                  $c=0;
                                  foreach ($tax_terms as $tax_term) {     
                                    ?>
                                <a href="<?php echo get_term_link( $tax_term->slug, $tax ); ?> "> <li><?php echo $tax_term->name; ?></li></a>
                                    <?php $c+=1; if($c==6){break ;}
                                    }
                                ?>
                            </ul>
                        </div>
                         <a href="<?php echo get_post_type_archive_link('texthelpdoc'); ?>">View All</a>  
                    </div>
                </div>  
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12    ">
                    <div class="listing">
                        <div class="listing-inner">
                            <h2>Recent FAQs <span></span>
                            </h2>
                            <div class="hr-line"></div>
                            <ul>
                                <?php
                                $args = 'post_type=faq&showposts=6&tag=featured';
                                $the_query = new WP_Query($args);
                                if ($the_query->have_posts()) {
                                    while ($the_query->have_posts()) {
                                        $the_query->the_post();
                                        ?>
                                        <li><a href="<?php the_permalink();?>"> 
                                                <?php
                                                echo the_title()
                                                ?>
                                            </a></li>
                                        <?php
                                    }
                                } else {
                                    echo 'no posts found';
                                }
                                /* Restore original Post Data */
                                wp_reset_postdata();
                                ?>
                            </ul>
                        </div>
                       <a href="<?php echo get_post_type_archive_link('faq'); ?>">View All</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer('home'); ?>