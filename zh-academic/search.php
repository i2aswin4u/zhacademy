<?php get_header('home'); 
if ($post_type == 'faq') {
    $posttype_text = "Related FAQ's";
} else if ($post_type == 'texthelpdoc') {
    $posttype_text = "Related Help Documents";
} else {
    $posttype_text = "Related Post";
}
?>

<script>
        function selectFunction() {
            var x = document.getElementById("module-select").selectedIndex;
            var p_type = document.getElementsByTagName("option")[x].value;
            $('#hidPostType').val(p_type);
        }
</script>
<div class="academic-main"> 
     <div class="banner"> 
        <div class="container">       
              <div class="row"> 
                <div class="col-md-12 col-sm-12 col-xs-12 text-center">  
                    <h1><?php $title = get_field('home_page_title'); if($title){ echo $title; } else { echo'Get Learning , Get Certified'; } ?></h1> search.php      
                    <p class="bold"><?php $title2 =  get_field('home_page_welcome_text'); if($title2) {echo $title2; } else{ echo 'Learn the simplicity & flexibility of the Blue EHS . Understand how it adapts to the way you practice your way.';} ?></p>  
                    <div class="col-md-12 col-sm-12 col-xs-12 top-space">                  
                        <div class="col-md-3 col-sm-3 col-xs-12 ">                  
                            <div class="custom-select pricing-customseletbox">    
                                <?php include_once('search-banner.php'); ?>
                            </div>         
                        </div>   
                    </div> 
               </div>
                <div class="container-fluid">    
                    <div class="row">     
                        <div class="padtop-content the_content ">             
                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 ">                  
                                <h3> Your search term "<?php $searchqueery = the_search_query(); echo $searchqueery; ?>"  returned the following  results</h3>      
                                <?php if (have_posts()) : ?>    
                                    <?php $count = 0; ?>    
                                    <?php while (have_posts()) : the_post(); ?>    
                                        <?php $count+=1; ?>     
                                        <div class="post" id="post-<?php the_ID(); ?>">                     
                                            <h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>   
                                            <!--<p class="meta"><small>Posted on <?php //the_time('F jS, Y')    ?> by <?php // the_author()    ?> <?php // edit_post_link('Edit', ' | ', '');    ?></small></p>-->      
                                            <div class="entry"> 
                                              <?php the_excerpt(); ?>                       
                                            </div>              
                                        </div>           
                                        <?php endwhile;
                                    ?>                      
                                    <div class="navigation">             
                                        <div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>                        
                                        <div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>                 
                                    </div>                    <?php else : ?>                    
                                    <h2 class="center">Not Found</h2>      
                                    <p class="center">Sorry, but you are looking for something that isn't here.</p>                  
                            <?php endif; ?>         
                            </div>      
                        </div> 
                        <!--side bar --> 
                        <div class="academy ">
                            <?php include_once('common-sidebar.php'); ?>
                        </div>
                    </div>   
                </div> 
            </div>
        </div>
         <!-- end content --><?php get_footer('home'); ?>