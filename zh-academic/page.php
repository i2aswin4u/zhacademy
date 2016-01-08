<?php get_header('home'); ?>

<div class="academy">
    <div class="academy-top">
        <!-- Top Banner -->
        <div class="banners">
            <div class="container-fluid">
                <div class="row">
                    <h1>                   
                        <?php the_title(); ?>                       
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

    <div class="container-fluid">
        <div class="row ">
            <div class="bannerbtm-txtouter">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 academy-borderoutr">
                    <div class="the_content">
                        <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>    
                        <h2><?php the_title(); ?></h2>
                        <?php the_content(); ?>
                         <?php endwhile; ?>
                             <?php else : ?>
                            <h1>Sorry , No Posts found</h1>
                    <?php endif; ?>
                    </div>
                </div>
                <!--side bar -->  
           
            </div>      
        </div>      
    </div> 
</div>

<?php get_footer('home'); ?>