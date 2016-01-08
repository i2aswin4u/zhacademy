<?php
/*
  Template name: OEMR HOME
 */
?>
<?php get_header('home'); ?>
<div class="academic-main">
    <!-- Top Banner -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                  <h1><?php $name = ot_get_option( 'search_banner_title' ); if($name){ echo $name; } else {echo "Get Learning , Get Certified";}?></h1>
                    <p class="bold"> <?php $name = ot_get_option( 'search_banner_sub_titile' ); if($name){ echo $name; } else {echo "Learn the simplicity & flexibility of the Blue EHS . Understand how it adapts to the way you practice your way.";}?></p>
                    <form id="searchform" method="post" action="<?php echo get_site_url(); ?>/search">
<!--                    <div class="col-md-12 col-sm-12 col-xs-12 top-space">
                        <div class="col-md-3 col-sm-3 col-xs-12 ">                     
                            <div class="custom-select pricing-customseletbox p-type-advanced-search">     
                                <select id="posttype-multiple-selected" multiple="multiple" name="values">                                 
                                  <option value="faq"         <?php// if (in_array( 'faq',$post_types_is))         { echo "selected='selected'"; }?> >  <?php $name = ot_get_option( 'post_type_name_for_faq' );       if($name){ echo $name; } else {echo "FAQ";}?></option>
                                  <option value="texthelpdoc" <?php// if (in_array( 'texthelpdoc',$post_types_is)) { echo "selected='selected'"; }?> >  <?php $name = ot_get_option( 'post_type_name_for_text_help' ); if($name){ echo $name; } else {echo "Help Documents";}?></option>
                                  <option value="videos"      <?php //if (in_array( 'videos',$post_types_is))      { echo "selected='selected'"; }?> >  <?php $name = ot_get_option( 'post_type_name_for_videos' );    if($name){ echo $name; } else {echo "Videos";}?></option>
                                  <option value="course"      <?php// if (in_array( 'course',$post_types_is))      { echo "selected='selected'"; }?> >  <?php $name = ot_get_option( 'post_type_name_for_courses' );   if($name){ echo $name; } else {echo "Courses";}?></option>                                  
                                </select>     
                                <input type="hidden" name="hidPostType" id="hidPostType" value=""/>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-8 text-center set-width">
                            <input id="custom_search"  placeholder="Type here to search anything " type="text" name="custom_search" value="<?php//k the_search_query(); ?>" class="text" />
                            <input id="multiple_post"  placeholder=" " type="text" name="multiple_post" value="" class="text" style="display:none;" />
                            <div id="target" style="color: #ffffff; margin-top: 10px; "> Enter a valid Search Key</div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-4 text-center set-width">
                            <div id="searchsubmit" class="btn btn-block btn-primary btn-lg" onclick="selectFunctionClick();">Search Now
                            </div>
                        </div>
                    </div>                                  -->
                  </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12  ">
                <!--test start --> 
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                    <div class="listing">
                        <div class="listing-inner">
                            <h2><?php $name = get_field('detailed_course_title'); if($name){ echo $name; } else{ echo 'Detailed Course'; } ?>
                                <!--<span>(FAQ)</span>-->
                            </h2>
                            <div class="hr-line"></div>
                            <ul>
                            <?php $tax       = 'oemr-study';
                                  $tax_terms = get_terms( $tax );
                                  $c         = 0;
                                  foreach ($tax_terms as $tax_term) {     
                                    ?>
                                <a href="<?php echo get_term_link( $tax_term->slug, $tax ); ?><?php //echo "?posttype=course"; ?> "> <li><?php echo $tax_term->name;  ?> </li></a>
                                    <?php $c+=1; if($c==6){break ;}
                                    }
                                ?>
                            </ul>
                        </div>
                         <a href="<?php echo get_post_type_archive_link('course'); ?>">View All</a>  
                    </div>
                </div> 
                <!--test end-->
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                    <div class="listing">
                        <div class="listing-inner">
                            <h2><?php $name = get_field('help_documents_title'); if($name){ echo $name; } else{ echo 'Help Documents'; } ?> 
                                <!--<span>(FAQ)</span>-->
                            </h2>
                            <div class="hr-line"></div>
                            <ul>
                            <?php   $tax = 'oemr-groups';
                                  $tax_terms = get_terms( $tax, array( 'parent' => 0 ) );
                                  $c=0;
                                  foreach ($tax_terms as $tax_term) {     
                                    ?>
                               <a href="<?php echo get_term_link( $tax_term->slug, $tax ); ?><?php //echo "?posttype=course"; ?> "> <li><?php echo $tax_term->name;  ?> </li></a>
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
                            <h2><?php $name = get_field('recent_faqs_title'); if($name){ echo $name; } else{ echo 'Recent FAQs'; } ?> <span></span>
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
                <!--Videos Section-->
                       <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                    <div class="listing">
                        <div class="listing-inner">
                            <h2><?php $name = get_field('videos_title'); if($name){ echo $name; } else{ echo 'Videos'; } ?>
                            </h2>
                            <div class="hr-line"></div>
                            <ul>
                            <?php $tax       = 'oemr-help-videos';
                                  $tax_terms = get_terms( $tax );
                                  $c         = 0;
                                  foreach ($tax_terms as $tax_term) {     
                                    ?>
                                <a href="<?php echo get_term_link( $tax_term->slug, $tax ); ?><?php //echo "?posttype=course"; ?> "> <li><?php echo $tax_term->name;  ?> </li></a>
                                    <?php $c+=1; if($c==6){break ;}
                                    }
                                ?>
                            </ul>
                        </div>
                         <a href="<?php $url = get_site_url(); echo $url.'/video'; ?><?php// echo get_post_type_archive_link('videos'); ?>">View All</a>  
                    </div>
                </div>
                <!--videos section end-->
                <!--Featured Post Section Start-->
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                    <div class="listing">
                        <div class="listing-inner">
                            <h2><?php $name = get_field('featured_post_title'); if($name){ echo $name; } else{ echo 'Featured Posts'; } ?>
                            </h2>
                            <div class="hr-line"></div>
                            <ul>
                                <?php 
                                query_posts('tag=new-features&posts_per_page=-1');
                                $query_args = array(
                                    'tag' => 'new-features',
                                    'post_type' => array('post','videos','faq','course','texthelpdoc'),
                                    'showposts' => 6
                                 );
                                 $queryis = new WP_Query( $query_args );
                                 //var_dump($queryis);
                                 foreach($queryis as $quer){

                                     if(is_array($quer)){
                                         $i=0;
                                          foreach($quer as $q => $val){
                                              $name = $quer[$i]->post_title;
                                              if($name){ ?>
                                              <a href="<?php echo esc_url( get_permalink($quer[$i]->ID) ); ?>">  <?php  echo '<li>'.$name.'</li>';?></a>
                                          <?php    }
                                              $i++;
                                          }               
                                     }
                                 }
                                ?>
                            </ul>
                        </div>
                         <a href="<?php $url = get_site_url(); echo $url.'/video'; ?><?php// echo get_post_type_archive_link('videos'); ?>">View All</a>  
                    </div>
                </div>
                <!--Featured Post Section end-->
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).on("keyup",function(e){ 
        var key = e.keycode ? e.keycode :e.which;
        if(key === 13){
            selectFunctionClick();
        }
    })
    $(document).ready(function() {
        $('#posttype-multiple-selected').multiselect({
                includeSelectAllOption: true,                  
                selectAllValue: 'any'
        });
        $( "#target" ).hide();		
    });
    
    $(function(){
        $(".multiselect-container li:not(:first) :input[type='checkbox']").click();
});
    function selectFunctionClick (){   
         var x;
          x = document.getElementById("custom_search").value;
          if (x == "") 
           {              	
              $( "#target" ).show();
           }
           else {
                var values = $('#posttype-multiple-selected').val();
                var multiSelectValues = "";
                values.map(function(item){ multiSelectValues += item+",";});
                $("#multiple_post").val(multiSelectValues);
                $('#searchform').submit();
               }
    }
</script>
<?php get_footer('home'); ?>