 <!--Small Screen mobile Menu start-->
<div class="col-md-6 col-sm-6 col-xs12">        
   <div class="modules-list">
           <select id="test" class="custom module-options">
           <?php
           $taxonomy = 'modules';
           $tax_terms = get_terms($taxonomy);
           foreach ($tax_terms as $tax_term) {
               $t_id = $tax_term->term_id;
               $term_meta = get_option("taxonomy_$t_id");
               ?>
               <option  value="<?php echo $tax_term->slug; ?>" class="<?php if ($term_meta[img]) {  echo $term_meta[img]; } else {  echo 'fa fa-cogs'; } ?>"> <?php echo $tax_term->name; ?></option>                
           <?php } ?>
               ?
           </select>
   </div>
</div>
<!--Small Screen Academy Menu start-->
<div class="col-md-6 col-sm-6 col-xs12">                                
   <div class="modules-list">                                     
           <?php echo wp_mobile_menu( array( 'menu_name' => 'academy-menu', 'id' => 'main-menu-mob' ) ) ; ?>
   </div>                                                               
</div>                                                        
<div class="clear"></div>