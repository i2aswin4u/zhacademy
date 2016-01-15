  <div class="left-modules left-modules-help-doc">
    <ul class="modules-list-section-help-doc">
    <?php
    $taxonomy = 'groups';
    $tax_terms = get_terms($taxonomy);//   echo "<pre>"; var_dump($tax_terms); echo "</pre>";
    foreach ($tax_terms as $tax_term) {
        if(!$tax_term->parent){
        $t_id = $tax_term->term_id;
        $term_meta = get_option("taxonomy_$t_id");
        ?>
         <li id="<?php echo $tax_term->slug; ?>">
             <a href="<?php echo bloginfo('siteurl');?>/group/<?php echo $tax_term->slug;?> ">
                 <i class="fa <?php if ($term_meta[img]) {  echo $term_meta[img]; } else { echo ' fa-cogs'; } ?>"></i>
                    <?php echo $tax_term->name; ?>
             </a>
         </li>                                            
    <?php } }?>
    </ul>
</div>