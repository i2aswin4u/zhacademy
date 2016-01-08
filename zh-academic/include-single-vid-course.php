<div class="content-section">
<?php                                                                                                                                                  
   $destname = get_term_by('slug',$_SESSION["modules"],'modules'); 
   $id_term  = $destname->term_taxonomy_id;                                                   
   $term = get_term( $id_term, 'modules' );
   $term_meta = get_option("taxonomy_$id_term");
?>
<h3 class="line"><span><i class="<?php if ($term_meta[img]) {  echo $term_meta[img]; } else {  echo 'fa fa-cogs'; } ?>"></i> <?php echo $term->name; ?></span></h3>
<div class="row">                                                                                                        
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="video-lg-section">
        <?php 
        if (have_posts()) : 
        while (have_posts()) : the_post(); 
        $ppt= get_field('course-ppt');
        if($ppt) { ?>
        <iframe src="//www.slideshare.net/slideshow/embed_code/key/<?php echo $ppt; ?>" width="1000px" height="500px" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" style="border:1px solid #CCC; border-width:1px; margin-bottom:5px; max-width: 100%;" allowfullscreen> </iframe> <div style="margin-bottom:5px"><strong><a href="//www.slideshare.net/ZHHealthcare" target="_blank">ZH Healthcare</a></strong> </div>
        <?php }                          
          $vid_url= get_field('video_url_of_text_help');
          if($vid_url) { 
            preg_match( '/[\\?\\&]v=([^\\?\\&]+)/', $vid_url, $matches);
        ?>
        <iframe  src="https://www.youtube.com/embed/<?php  echo  $matches[1];?>" width="1000px" height="500px" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" style="border:1px solid #CCC; border-width:1px; margin-bottom:5px; max-width: 100%;" allowfullscreen></iframe>
        <?php }  ?>                                                                                                                                                                                                                                                           
            <h4 class="line"> 
                <span class="padding-r10"><?php the_title();?></span>
                <span class="padding-l10 pull-right">
                    <a href="#" data-toggle="tooltip" title="" data-placement="top" data-original-title="Previous"><i class="fa fa-angle-left"></i></a>
                    <a href="#" data-toggle="tooltip" title="" data-placement="top" data-original-title="Next"><i class="fa fa-angle-right"></i></a>
                </span>
            </h4>
            <p><?php  the_content();?> </p>
        </div>
    </div>

    <div class="prev-next-links-single">
       <div class="prev-link">
           <?php $prev_post = get_adjacent_post( true, '', true, $next_tag ); ?>
           <?php if ( is_a( $prev_post, 'WP_Post' ) ) { ?>
                  <a class ="btn btn-default" href="<?php echo get_permalink( $prev_post->ID ); ?>"><?php echo 'Previous: '.get_the_title( $prev_post->ID ); ?></a>
           <?php } ?>
        </div>
       <div class="next-link">     
           <?php $next_post = get_adjacent_post( true, '', false, $next_tag ); ?>
           <?php if ( is_a( $next_post, 'WP_Post' ) ) {  ?>
                   <a class= "btn btn-default" href="<?php echo get_permalink( $next_post->ID ); ?>"><?php echo 'Next: '. get_the_title( $next_post->ID ); ?></a>
            <?php } ?>
       </div>
    </div>
    <?php 
     previous_posts_link('< previous page', 0); 
     next_posts_link('next page >', 0);                               
     endwhile; 
     else : ?>
        <h1>Sorry , No Posts found</h1>
<?php endif; ?>                                                       
</div>                                                
    <?php 
    $term_list = wp_get_post_terms($post->ID, 'academy', array("fields" => "all"));
    foreach ($term_list as $term_li){
        $term_name = $term_li->name;
        $term_slug = $term_li->slug;    
     //   if($term_li->slug == 'video'){
          ?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">                 
        <h4 class="line"> 
            <span class="padding-r10">Related <?php echo $term_slug;?>'s</span>
        </h4>
    </div>
</div>
<div class="row">
     <?php
            $args = array(
                    'post_type' => 'post',
                    'post__not_in' => array($post->ID),
                    'posts_per_page' => '6',
                    'tax_query' => array(
                                    'relation' => 'AND',
                                    array(
                                    'taxonomy' => 'modules', // modules (rep)
                                    'field' => 'slug',
                                    'terms' => array($_SESSION["modules"]),
                                    ),
                                    array(
                                        'taxonomy' => 'product', // (oemr/blue-product)
                                        'field' => 'slug',
                                        'terms' => array($_SESSION["product"]),
                                    ),
                                    array(
                                        'taxonomy' => 'academy', // (academy)
                                        'field' => 'slug',
                                        'terms' => $term_slug,
                                    ),
                                ),
                        );
            $the_query = new WP_Query( $args );
            if ( $the_query->have_posts() ) {
                    while ( $the_query->have_posts() ) {
                            $the_query->the_post();
                            ?>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="video-sm">
                    <a href="<?php the_permalink();?>">
                    <?php
                    if ( has_post_thumbnail() ) {
                            the_post_thumbnail();
                    }
                    else {
                        ?>  <img src="<?php echo bloginfo('template_directory');?>/img/video-sm.jpg" class="img-responsive"></a> <?php
                    }
                    ?>
                    </a>
                    <h3> <a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                    <p><?php echo substr(get_the_excerpt(), 0,130); ?></p>
                    <a href="<?php the_permalink();?>" class="view-btn">View <?php echo $term_slug;?></a>
                </div>
            </div>
          <?php                                                                             
                    }
            } else {
            ?>
                <div class="no-post">
                    No Post Found
                </div>
            <?php                                                                
            }
            wp_reset_postdata();
            ?>
          <?php                                                                                                                         
    } 
    ?>                                                   

</div>
</div>