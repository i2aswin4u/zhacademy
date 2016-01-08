<?php get_header('home'); ?>
<div class="academic-main"> 
    <!-- Top Banner -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                  <h1><?php $name = ot_get_option( 'search_banner_title' ); if($name){ echo $name; } else {echo "Get Learning , Get Certified";}?></h1>
                    <p class="bold"> <?php $name = ot_get_option( 'search_banner_sub_titile' ); if($name){ echo $name; } else {echo "Learn the simplicity & flexibility of the Blue EHS . Understand how it adapts to the way you practice your way.";}?></p>
                    <?php include_once('search-banner.php');?>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">        
        
<!--Modules Boxes-->        
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="accademy-modules">
    <div class="row">                                                                                                                                            
            <?php
            //list terms in a given taxonomy
            $taxonomy = 'modules';
            $tax_terms = get_terms($taxonomy);
            ?>
            <ul>
            <?php
            foreach ($tax_terms as $tax_term) { 
                     $t_id = $tax_term->term_id;
                     $term_meta = get_option( "taxonomy_$t_id" );
            ?>
            <div class="col-md-3 col-sm-4 col-xs-6">
                <div class="modules" id="<?php echo $tax_term->slug; ?>">
                    <a href="<?php echo  esc_attr(get_term_link($tax_term, $taxonomy));?>">
                        <i class="<?php if($term_meta[img]) {echo $term_meta[img];} else {echo 'fa fa-cogs';}?>"></i> 
                        
                        <h2 class="line"><span><?php echo $tax_term->name; ?></span></h2>
                        <p><?php echo $tax_term->description ;?> </p>
                    </a>
                </div>
            </div>
                 <?php   //echo '<li>' . '<a href="' . esc_attr(get_term_link($tax_term, $taxonomy)) . '" title="' . sprintf( __( "View all posts in %s" ), $tax_term->name ) . '" ' . '>' . $tax_term->name.'</a></li>';       }
            }
            ?>
            </ul>                                           
        </div>
    </div>
</div>
    
    
    <div class="readmore">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="margin-tb30">
                        <h2><?php echo get_field('centre_title');?></h2>
                        <p><?php echo get_field('centre_text');?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row margin-b30">
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="text-center info-content">
                    <div class="icon-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/call-us.png" alt="" title="">
                    </div>
                    <h4><?php echo get_field('tab_1_title');?></h4>
                    <p class="margin-b40"><?php echo get_field('tab_1_text');?></p>
                    <a href="<?php echo get_field('tab_1_link');?>"><div class="readmore call-us"> Toll Free : <b>1-866-263-6512</b> </div></a>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="text-center info-content">
                    <div class="icon-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/demo.png" alt="" title="">
                    </div>
                    <h4><?php echo get_field('tab_2_title');?></h4>
                    <p class="margin-b40"><?php echo get_field('tab_2_text');?></p>
                    <a href="<?php echo get_field('tab_2_link');?>"><div class="readmore demo"> Click Here <b>for Demo</b></div></a>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="text-center info-content">
                    <div class="icon-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/trial.png" alt="" title="">
                    </div>
                    <h4><?php echo get_field('tab_3_title');?></h4>
                    <p class="margin-b40"><?php echo get_field('tab_3_text');?></p>
                    <a href="<?php echo get_field('tab_3_link');?>"><div class="readmore trial"> Start Your <b>Free Trial</b> </div> </a>
                </div>
            </div>
        </div>
    </div>
    <div class="readmore padding-tb20">
        <div class="container" <div="">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h4><?php echo get_field('center_title_2');?></h4>
                </div>
            </div>
        </div>
        
        </div>
    </div>
</div>
<?php get_footer('home'); ?>