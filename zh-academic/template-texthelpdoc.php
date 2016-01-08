<?php
/*
  Template name: Text Help Doc Parent Term
 */
get_header('home');
?>
<div class="academic-main">
    <!-- Top Banner -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                    <h1>Get Learning , Get Certified</h1>
                    <p class="bold">Learn the simplicity & flexibility of the Blue EHS . Understand how it adapts to the way you practice your way.</p>
                    <div class="col-md-12 col-sm-12 col-xs-12 top-space">
                        <div class="col-md-3 col-sm-3 col-xs-12 ">
                            <div class="custom-select pricing-customseletbox">
                                <label class="selectbox-label">
                                    <select name="">
                                        <option selected="" disabled="">
                                            Modules
                                        </option>
                                        <option>
                                            Features1
                                        </option>
                                        <option>
                                            Features1
                                        </option>
                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-8 text-center set-width">
                            <input type="text" placeholder="Type here to search any thing ">
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-4 text-center set-width">
                            <button type="submit" id="btn-signup" class="btn btn-block btn-primary btn-lg">
                                Submit Now
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12  " >
                <?php
                $args = array('post_type' => 'texthelpdoc','posts_per_page'=>-1);
                $loop = new WP_Query($args);
                while ($loop->have_posts()) : $loop->the_post();
                    ?>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12    ">
                        <div class="listing">
                            <div class="listing-inner">
                                <h2> <?php the_title(); ?><span></span>
                                </h2>
                                <div class="hr-line"></div>
                                <ul>
                                    <li><a herf=<?php echo the_permalink(); ?>> <?php the_excerpt(); ?></a> </li>
                                </ul>
                            </div>
                            <a href="<?php echo the_permalink(); ?>">View All</a>
                        </div>

                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer('home'); ?>