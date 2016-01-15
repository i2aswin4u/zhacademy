<?php get_header('home');
$_SESSION["academy"] = "course";
?>
<!-- File : taxonomy-academy-course.php.php-->
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
        <div class="container-fluid">
            <div class="row">
                <?php include("mobile_menu.php"); ?>     
            </div>
                        <!--Small Screen Academy Menu stop-->
                        <div class="row">
                            <div class="col-lg-3 col-md-3 colo-sm-12 col-xs-12">
                              <?php get_sidebar(); ?>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 academic-main ">
                                <!-- Tab panes -->
<!-- over view Content area starts-->
                          <div class="margin-tb30">
                            <div class="inner-detail">
                                <div class="row">
                                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 reporting">
                                        <div class="content-section">
                                            <?php 
                                            $current_moule       = $_SESSION["modules"];
                                            $term                = get_term_by('slug', $current_moule, 'modules');
                                            $current_module_name = $term->name; 
                                            $t_id                = $term->term_taxonomy_id;
                                            $term_meta           = get_option("taxonomy_$t_id");
                                            $module_fa_icon      = $term_meta[img];
                                            ?>                                                                                            
                                            <!--<h3 class="line"><span><i class="fa <?php echo $module_fa_icon;?>"></i> <?php echo $current_module_name;  ?> </span></h3>-->
                                              <h3 class="line"><span><i class="fa <?php if ($term_meta[img]) {  echo $term_meta[img]; } else {  echo 'fa-cogs'; } ?>"></i> <?php echo $term->name; ?></span></h3>            
                                            <div class="row">                                                
                                                    <?php 
                                                       $args = array(
                                                        'post_type' => 'post',
                                                        'posts_per_page' => '-1',
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
                                                       while ($the_query->have_posts()) {
                                                       $the_query->the_post();
                                                    ?>
                                                     <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="video-sm">
                                                        <?php
                                                            if ( has_post_thumbnail() ) {
                                                                    the_post_thumbnail();
                                                            }
                                                            else {
                                                                    ?>  <a href="#"><img src="<?php bloginfo('template_directory');?>/img/video-sm.jpg" class="img-responsive"></a> <?php 
                                                            }
                                                            ?>                                                                                                      
                                                        <h3> <a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                                                        <p><?php echo substr(get_the_excerpt(), 0,100); ?>..</p>
                                                        <a href="<?php the_permalink();?>" class="view-btn">View Course</a>
                                                    </div>
                                                 </div>
                                                       <?php }
                                                    } else {
                                                        
                                                        ?>
                                                        <div class="no-post">
                                                            No Course Found
                                                        </div>
                                                        <?php
                                                    }
                                                    wp_reset_postdata();
                                                    ?>
                                            </div>
                                        </div>
                                    </div>
                                   <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                                        <?php include("leftsidebar.php"); ?>
                                   </div>
                            </div>
                          </div>
                        </div>
          <!--overview Content-repalce End--> 
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
<script type="text/javascript">
    $(document).on("keyup", function(e) {
        var key = e.keycode ? e.keycode : e.which;
        if (key === 13) {
            selectFunctionClick();
        }
    })
    $(document).ready(function() {
        $('#posttype-multiple-selected').multiselect({
            includeSelectAllOption: true,
            selectAllValue: 'any'
        });
        $("#target").hide();
    });

    $(function() {
        $(".multiselect-container li:not(:first) :input[type='checkbox']").click();
    });
    function selectFunctionClick() {
        var x;
        x = document.getElementById("custom_search").value;
        if (x == "")
        {
            $("#target").show();
        }
        else {
            var values = $('#posttype-multiple-selected').val();
            var multiSelectValues = "";
            values.map(function(item) {
                multiSelectValues += item + ",";
            });
            $("#multiple_post").val(multiSelectValues);
            $('#searchform').submit();
        }
    }
</script>

<?php get_footer('home'); ?>