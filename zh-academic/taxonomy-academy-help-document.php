<?php get_header('home'); ?>
<?php
$_SESSION["academy"] = "help-document";
//$tax = get_query_var('taxonomy');
$tax = 'groups';
$postid = get_the_ID();
$args = array( 'order' => 'DESC', 'orderby' => 'term_order', 'fields' => 'all');
$terms = wp_get_post_terms($postid, $tax, $args);
foreach ($terms as $term) {
    $termname = $term->slug;
    $termparent = $term->parent; // get the parent term id    
}
$termname = get_term($termparent, $tax); // For getting parent title
$testorgin = $terms;
?>
<?php
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
}
?>
 <!--start of new design-->
<div class="academic-main">
    <!-- Top Banner -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                    <h1><?php $name = ot_get_option('search_banner_title');
                              if ($name) {    echo $name;} else {    echo "Get Learning , Get Certified";} ?></h1></h1><h4> taxonomy-academy-help-documents.php<?php echo $tax;?></h4>
                    <p class="bold"> 
                        <?php $name = ot_get_option('search_banner_sub_titile');
                              if ($name) {    echo $name;} else {    echo "Learn the simplicity & flexibility of the Blue EHS . Understand how it adapts to the way you practice your way.";} ?></p>
                        <?php include_once('search-banner.php');?>
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
                    <div class="row">
                       <?php include("mobile_menu-tax-groups-help-doc.php"); ?> 
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-2 hidden-sm hidden-xs">
                           <?php  include("sidebar-tax-groups-help-doc.php"); ?> 
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
                                                   $destname = get_term_by('slug',$_SESSION["modules"],'modules'); 
                                                   $id_term  = $destname->term_taxonomy_id;                                                   
                                                   $term = get_term( $id_term, 'modules' );
                                                   $term_meta = get_option("taxonomy_$id_term");       
                                                ?>
                                                <h3 class="line"><span><i class="<?php if ($term_meta[img]) {  echo $term_meta[img]; } else {  echo 'fa fa-cogs'; } ?>"></i> <?php echo $term->name; ?></span></h3>
                                                <div class="panel-group" id="accordion">
<!--        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" class="collapsed">Introduction</a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                <div class="panel-body">
                    <p>The Settings option pops upon clicking the area marked above, which allows you to add, upgrade or remove certain options from the list. Once you click on the Settings option you will receive a pop up shown with the details of the current options available in the reports. Beside the report you will have the Radio button which can be selected to make changes.</p>
                    <p>Clicking on the Radio button marked above and then clicking on the Install button will install the ‘Super Bill’ report. Similarly you can upgrade or remove the report from the main analytics screen.</p>
                </div>
            </div>
    </div>-->

                            <?php
                            $term = get_term( $id, $taxonomy );
                            $slug = $term->slug;
                            $args = array(
                                'child_of' => $termparent,
                                'taxonomy' => $tax,
                            );
                            $categories = get_categories($args);     
                            foreach ($categories as $category) {
                                $args = array(
                                    'post_type'      => 'texthelpdoc',
                                    'groups'         => $category->slug,
                                    'post_status'    => 'publish',
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
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $k;?>" class="collapsed" aria-expanded="false"><?php the_title();?></a>
                                        </h4>
                                    </div>
                                    <div id="collapse<?php echo $k;?>" class="panel-collapse collapse" aria-expanded="false">
                                        <div class="panel-body">
                                            <p><?php the_content();?></p>
                                        </div>
                                    </div>
                                </div>                                                                
                                 <?php  } 
                                    } else {   }
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
    <?php // if ($prev_term->name) { ?>
                                    <a class="btn btn-default" href="<?php // bloginfo(url);  ?>/group/<?php // echo $prev_term->slug;  ?>">Previous  Module<?php //echo " " . $prev_term->name;  ?></a>
    <?php // } ?>
                            </div>
                            <div class="next-link">
    <?php //if ($next_term->name) { ?>
                                    <a class="btn btn-default" href="<?php // bloginfo(url);  ?>/group/<?php //echo $next_term->slug;  ?>">Next Module<?php // echo " " . $next_term->name;  ?></a> 
    <?php //} ?>
                            </div>               
                        </div>                                                 
                </div>      
            </div>      
        </div> -->
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