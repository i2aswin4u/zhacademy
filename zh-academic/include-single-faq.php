 <!--IF FAQ START-->
     <div class="content-section">
         <?php                                                                                                                                                  
            $destname = get_term_by('slug',$_SESSION["modules"],'modules'); 
            $id_term  = $destname->term_taxonomy_id;                                                   
            $term = get_term( $id_term, 'modules' );
            $term_meta = get_option("taxonomy_$id_term");
         ?>
         <h3 class="line">
             <span>
                 <!--<i class="<?php// if ($term_meta[img]) {  echo $term_meta[img]; } else {  echo 'fa fa-cogs'; } ?>"></i>--> 
                 <?php echo $term_slug.' &Rightarrow; '; echo $term->name;  ?>
             </span>
         </h3>                                                                                                                                
        <!--<h3 class="line"><span><i class="fa fa-edit"></i> Reporting</span></h3>-->
         <div class="panel-group" id="accordion">
            <?php
            $args = array(
                    'post_type' => 'post',
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
            $i=1;
            $the_query = new WP_Query( $args );
            if ( $the_query->have_posts() ) {
                    while ( $the_query->have_posts() ) {
                            $the_query->the_post(); 
                            $i++;
                            ?>                                                                                    
                        <div class="panel panel-default">
                            <div class="panel-heading" id="<?php echo get_the_ID(); ?>">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i;?>" class="collapsed" aria-expanded="false"><?php the_title();?>
                                      <i class="fa fa-angle-down"></i>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse<?php echo $i;?>" class="panel-collapse collapse" aria-expanded="false">
                                <div class="panel-body">
                                    <p><?php the_content();?></p>
                                     <div id="copy-clipboard" class="example">
                                        <div class="input-group">
                                            <div class="col-md-1 col-sm-2 col-xs-2 nopadding">
                                                <div class="sharebtn">Share</div>
                                            </div>
                                            <div class="col-md-11 col-sm-10 col-xs-10 nopadding">
                                                <input id="ash_<?php echo get_the_id();?>" type="text" readonly value="<?php the_permalink();?>">
                                                <span class="input-group-button">
                                                    <button class="btn-clipboard btn" type="button"  data-toggle="tooltip" data-placement="left" title="Copy To Clipboard"  data-clipboard-demo="" data-clipboard-target="#ash_<?php echo get_the_id();?>">
                                                        <i class="fa fa-clipboard"width="13" alt="Copy to clipboard"></i>
                                                    </button>
                                                </span>
                                            </div>                                                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>


            <!--</div>-->
      <?php                                                                             
            }
    } else { }  
    wp_reset_postdata();
    ?>
            </div>
   </div>
   <!--IF FAQ STOP--> 