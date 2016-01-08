  <div class="left-modules">
    <ul class="modules-list-section">
    <?php
    $taxonomy = 'modules';
    $tax_terms = get_terms($taxonomy);
    ?>
    <?php
    foreach ($tax_terms as $tax_term) {
        $t_id = $tax_term->term_id;
        $term_meta = get_option("taxonomy_$t_id");
        ?>        
         <li id="<?php echo $tax_term->slug; ?>">
             <a href="">
                 <i class="<?php if ($term_meta[img]) {  echo $term_meta[img]; } else { echo 'fa fa-cogs'; } ?>"></i>
                    <?php echo $tax_term->name; ?>
             </a>
         </li>                                            
    <?php } ?>
    </ul>
</div>