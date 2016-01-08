<?php get_header('home'); 
$tax = get_query_var('taxonomy');
$term =	$wp_query->queried_object;
$_SESSION["modules"] = $term->slug;
//$tax = 'groups';
$postid = get_the_ID();
$args   = array('order' => 'DESC', 'orderby' => 'term_order', 'fields' => 'all');
$terms  = wp_get_post_terms($postid, $tax, $args);
foreach ($terms as $term) {
    $termname = $term->slug;
    $termparent = $term->parent; // get the parent term id    
}
$termname  = get_term($termparent, $tax); // For getting parent title
$testorgin = $terms;
// query for parent groups
//$tax_terms = get_terms($tax);
$tax_terms = get_terms($tax, array('parent' => 0));
$prevShown = false;
foreach ($tax_terms as $tax_term) {
    if ($prevShown) {
        $next_term = $tax_term;
        break;
    }
    if ($tax_term->name == $termname->name) {
        $prevShown = true;
        continue;
    }
    $prev_term = $tax_term;
} ?>
<!--start of new design-->
<div class="academic-main">
    <!-- Top Banner -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 text-center"> 
                    <h1>   <?php $name = ot_get_option('search_banner_title');
if ($name) {
    echo $name;
} else {
    echo "Get Learning , Get Certified";
}
?></h1></h1><h4> taxonomy-groups.php<?php echo $tax; ?></h4>
                    <p class="bold"> 
<?php $name = ot_get_option('search_banner_sub_titile');
if ($name) {
    echo $name;
} else {
    echo "Learn the simplicity & flexibility of the Blue EHS . Understand how it adapts to the way you practice your way.";
}
?></p>
                    <?php include_once('search-banner.php'); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="nav-tab-bg">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">                   
                        <?php include("academy_menu.php"); ?>                   
                </div>      
            </div>      
        </div>                                                      
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">               
                <div>
                    <!--Mobile Menu--> 
                    <div class="row">
                        <?php include("mobile_menu-tax-groups-help-doc.php"); ?> 
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-2  hidden-sm hidden-xs">
                            <?php include("sidebar-tax-groups-help-doc.php"); ?> 
                            <?php //include("sidebar-tax-groups.php"); ?> 
                        </div>
                        <div class="col-lg-9 col-md-10 col-sm-12 col-xs-12">
                            <!-- Tab panes -->
                            <div class="margin-tb30">
                                <div class="inner-detail">
                                    <div class="row">
                                        <div class="col-lg-9 col-md-6 col-sm-12 col-xs-12 reporting">
                                            <div class="content-section">
                                                    <?php
                                                    $destname = get_term_by('slug', $_SESSION["modules"], 'modules');
                                                    $id_term = $destname->term_taxonomy_id;
                                                    $term = get_term($id_term, 'modules');
                                                    $term_meta = get_option("taxonomy_$id_term");  // var_dump($destname);
                                                    ?>
                                                <h3 class="line"><span><i class="<?php if ($term_meta[img]) {
                                                        echo $term_meta[img];
                                                    } else {
                                                        echo 'fa fa-cogs';
                                                    } ?>"></i> <?php echo $term->name; ?></span></h3>
                                                <div class="panel-group" id="accordion">
                                                    <?php
                                                    $term = get_term($id, $taxonomy);
                                                    $slug = $term->slug;
                                                    $args = array(
                                                        'child_of' => $termparent,
                                                        'taxonomy' => $tax,
                                                    );
                                                    $categories = get_categories($args);
                                                    foreach ($categories as $category) {
                                                        $args = array(
                                                            'post_type' => 'texthelpdoc',
                                                            'groups' => $category->slug,
                                                            'post_status' => 'publish',
                                                            'posts_per_page' => -1,
                                                        );
                                                        $the_query_help_docs = new WP_Query($args);                     //   echo '<pre>';        var_dump($the_query_help_docs);echo '</pre>';
                                                        if ($the_query_help_docs->have_posts()) {
                                                            while ($the_query_help_docs->have_posts()) {
                                                                $the_query_help_docs->the_post();
                                                                ++$k;
                                                                ?>
                                                                <div class="panel panel-default">
                                                                    <div class="panel-heading">
                                                                        <h4 class="panel-title">
                                                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $k; ?>" class="collapsed" aria-expanded="false"><?php the_title(); ?></a>
                                                                        </h4>
                                                                    </div>
                                                                    <div id="collapse<?php echo $k; ?>" class="panel-collapse collapse" aria-expanded="false">
                                                                        <div class="panel-body">
                                                                            <p><?php the_content(); ?></p>
                                                                        </div>
                                                                    </div>
                                                                </div>                                                                
                                                            <?php
                                                            }
                                                        } else {

                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                            <?php include("leftsidebar.php"); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 

                </div>
            </div>

        </div>

        <div class="readmore padding-tb20">
            <div class="container" <div="">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <h4>You may also call <b>1-866-263-6512</b> to speak to a support representative <br>or email <b>support@zhservices.com</b></h4>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!--end of new design-->
    <!--    <div class="container-fluid">
            <div class="row ">
                <div class="bannerbtm-txtouter">
                           <div clss="prev-next-links">
                            <div class="prev-link">
<?php // if ($prev_term->name) {  ?>
                                    <a class="btn btn-default" href="<?php // bloginfo(url);   ?>/group/<?php // echo $prev_term->slug;   ?>">Previous  Module<?php //echo " " . $prev_term->name;   ?></a>
<?php // }  ?>
                            </div>
                            <div class="next-link">
<?php //if ($next_term->name) {  ?>
                                    <a class="btn btn-default" href="<?php // bloginfo(url);   ?>/group/<?php //echo $next_term->slug;   ?>">Next Module<?php // echo " " . $next_term->name;   ?></a> 
<?php //}  ?>
                            </div>               
                        </div>                                                 
                </div>      
            </div>      
        </div> -->
</div>
<?php get_footer('home'); ?>