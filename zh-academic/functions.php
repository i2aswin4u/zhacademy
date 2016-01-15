<?php
register_nav_menus(array(
    'header_Menu' => __('Header Menu', 'sw theme'),
));
add_filter('the_generator', 'version');

function default_comments_on( $data ) {
    if( $data['post_type'] == 'faq' ) {
        $data['comment_status'] = 'open';
    }

    return $data;
}
add_filter( 'wp_insert_post_data', 'default_comments_on' );

//custom post type text help doc
add_action('init', 'texthelpdoc_post');
function texthelpdoc_post() {
    $labels = array(
        'name' => _x('Help Documents', 'Text Help Doc type general name'),
        'singular_name' => _x('Text Help Doc', 'deail type singular name'),
        'add_new' => _x('Add New', 'Text Help Doc item'),
        'add_new_item' => __('Add New Text Help Doc Item'),
        'edit_item' => __('Edit Text Help Doc Item'),
        'new_item' => __('New Text Help Doc Item'),
        'view_item' => __('View Text Help Doc Item'),
        'search_items' => __('Search Text Help Doc'),
        'not_found' => __('Nothing found'),
        'not_found_in_trash' => __('Nothing found in Trash'),
        'parent_item_colon' => ''
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => true,
        'menu_position' => 6,
        'has_archive' => true,
        'menu_icon' => 'dashicons-media-text',
        'taxonomies' => array('post_tag')
    );

    //register the post type
    register_post_type('texthelpdoc', $args);
    wp_enqueue_script( 'script', get_template_directory_uri() . '/js/scroll-to-top.js', array ( 'jquery' ), 1.1, true);
}
// create a taxonomy for text help doc of Blue EHS
function texthelpdoc_init() {
    register_taxonomy(
            'groups', 'texthelpdoc', array(
            'hierarchical'      => true,
            'label' => __('Modules'),
            'show_in_nav_menus' => true,
            'rewrite' => array('slug' => 'group'),
            )
    );
}
add_action('init', 'texthelpdoc_init');
function namespace_add_custom_types( $query ) {
  if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
    $query->set( 'post_type', array(
     'post', 'nav_menu_item', 'faq'
		));
	  return $query;
	}
}
add_filter( 'pre_get_posts', 'namespace_add_custom_types' );
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'name' => 'Left Sidebar',
        'before_widget' => '<li>',		
        'after_widget' => '</li>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
	if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'name' => 'Right Sidebar',
        'before_widget' => '<li>',
        'after_widget' => '</li>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
add_theme_support( 'post-thumbnails', array( 'post', 'page', 'course','faq' ) );
// Bootstrap pagination function
function vb_pagination( $query=null ) {
 
  global $wp_query;
  $query = $query ? $query : $wp_query;
  $big = 999999999;
 
  $paginate = paginate_links( array(
    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
    'type' => 'array',
    'total' => $query->max_num_pages,
    'format' => '?paged=%#%',
    'current' => max( 1, get_query_var('paged') ),
    'prev_text' => __('&laquo;'),
    'next_text' => __('&raquo;'),
    )
  );
 
  if ($query->max_num_pages > 1) :
?>
<ul class="pagination">
<?php  foreach ( $paginate as $page ) {  echo '<li>' . $page . '</li>';  }  ?>
</ul>
<?php
  endif;
}

/// Ajax for pagination
add_action( 'wp_ajax_add_foobar', 'prefix_ajax_add_foobar' );
add_action( 'wp_ajax_nopriv_add_foobar', 'prefix_ajax_add_foobar' );

function prefix_ajax_add_foobar() {
    $offset = $_POST['data-offset'];
    $post_per_pg = $_POST['data-post_per_pg'];
    $post_types_is = $_POST['data-post_types_is'];   
    $s = $_POST['search_key'];   
                    $args = array(
                        's' => $s,
                        'offset' => $offset,
                        'post_type' => 'post',
                        'orderby' => 'date',
                        'posts_per_page' => $post_per_pg,
                        'tax_query' => array(),
                    );
                    $args['tax_query']['relation'] = 'OR';
                    foreach ($post_types_is as $post_types) {              
                        $args['tax_query'][] = array (  
                            'taxonomy' => 'academy',  
                            'field' => 'slug',
                            'terms' => $post_types,
                        );
                    }                           
                    $new_query = new WP_Query($args); 
                    ?> <div class="inner-detail panel-group"> <?php
                          $i = 0;
                          if ( $new_query->have_posts() ) {
                            while ( $new_query->have_posts() ) {
                                  $new_query->the_post();?>
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
                                             <p>
                                                 <?php the_content();
                                                 $ppt= get_field('course-ppt');
                                                 if($ppt) { ?>
                                                    <iframe src="//www.slideshare.net/slideshow/embed_code/key/<?php echo $ppt; ?>" width="1000px" height="500px" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" style="border:1px solid #CCC; border-width:1px; margin-bottom:5px; max-width: 100%;" allowfullscreen> </iframe> <div style="margin-bottom:5px"><strong><a href="//www.slideshare.net/ZHHealthcare" target="_blank">ZH Healthcare</a></strong> </div>
                                                <?php }                          
                                                  $vid_url= get_field('video_url_of_text_help');
                                                  if($vid_url) { 
                                                    preg_match( '/[\\?\\&]v=([^\\?\\&]+)/', $vid_url, $matches); ?>
                                                    <iframe  src="https://www.youtube.com/embed/<?php  echo  $matches[1];?>" width="1000px" height="500px" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" style="border:1px solid #CCC; border-width:1px; margin-bottom:5px; max-width: 100%;" allowfullscreen></iframe>                                                    
                                                 <?php
                                                   }
                                                 ?>                                                            
                                            </p>
                                                 <div id="copy-clipboard" class="example">
                                                <div class="input-group">
                                                    <input id="ash_<?php echo get_the_id();?>" type="text" readonly value="<?php the_permalink();?>">
                                                    <span class="input-group-button">
                                                        <button class="btn-clipboard btn" type="button" data-clipboard-demo="" data-clipboard-target="#ash_<?php echo get_the_id();?>">
                                                            <i class="fa fa-clipboard"width="13" alt="Copy to clipboard"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                </div>
                                  <?php  
                                  $i = $i+1;
                            }
                          } else{ ?>
                              <h2 class="center">Not Found</h2>      
                        <p class="center">Sorry, but you are looking for something that isn't here.</p>   
                          <?php }                          
                          ?> 
                </div><?php   
    
    die();
}

// categories for the posttype post
function modules_init() {
    register_taxonomy(
        'modules', 'post', array(
        'hierarchical'      => true,
        'show_in_nav_menus' => false,
        'label' => __('Modules'),
            )
    );
}
add_action('init', 'modules_init');

function product_init() {
    register_taxonomy(
        'product', 'post', array(
        'hierarchical'      => true,
            'show_in_nav_menus' => false,
        'label' => __('Products'),
            )
    );
}
add_action('init', 'product_init');

function academy_init() {
    register_taxonomy(
        'academy', 'post', array(
        'hierarchical'      => true,
        'show_in_nav_menus' => true,
        'label' => __('Academy'),
            )
    );
}
add_action('init', 'academy_init');

// Code For adding the tax in post for TXD also
add_action('init','add_academy_to_cpt');
    function add_academy_to_cpt(){
    register_taxonomy_for_object_type('academy', 'texthelpdoc');
}
add_action('init','add_product_to_cpt');
    function add_product_to_cpt(){
    register_taxonomy_for_object_type('product', 'texthelpdoc');
}

//Code for adding custom fields to taxanomy (Font awesome Img)
/**
 * Add extra fields to custom taxonomy edit and add form callback functions
 */
// Edit taxonomy page
function extra_edit_tax_fields($tag) {
    // Check for existing taxonomy meta for term ID.
    $t_id = $tag->term_id;
    $term_meta = get_option( "taxonomy_$t_id" ); ?>
    <tr class="form-field">
    <th scope="row" valign="top"><label for="cat_Image_url"><?php _e( 'Font Awesome icon' ); ?></label></th>
        <td>
            <input type="text" name="term_meta[img]" id="term_meta[img]" value="<?php echo esc_attr( $term_meta['img'] ) ? esc_attr( $term_meta['img'] ) : ''; ?>">
            <p class="description"><?php _e( 'Enter the class of font awesome icon for the particular modules.' ); ?></p>
        </td>
    </tr>
<?php
}
add_action( 'modules_edit_form_fields', 'extra_edit_tax_fields', 10, 2 );

// Add taxonomy page
function extra_add_tax_fields( $tag ) {
    // Check for existing taxonomy meta for term ID.
    $t_id = $tag->term_id;
    $term_meta = get_option( "taxonomy_$t_id" ); ?>
    <div class="form-field">
        <label for="cat_Image_url"><?php _e( 'Font Awesome icon' ); ?></label>
        <input type="text" name="term_meta[img]" id="term_meta[img]" value="<?php echo esc_attr( $term_meta['img'] ) ? esc_attr( $term_meta['img'] ) : ''; ?>">
        <p class="description"><?php _e( 'Enter the full class of font awesome for the category modules.' ); ?></p>
    </div>
<?php
}
add_action( 'modules_add_form_fields', 'extra_add_tax_fields', 10, 2 );

// Save extra taxonomy fields callback function.
function save_extra_taxonomy_fields( $term_id ) {
    if ( isset( $_POST['term_meta'] ) ) {
        $t_id = $term_id;
        $term_meta = get_option( "taxonomy_$t_id" );
        $cat_keys = array_keys( $_POST['term_meta'] );
        foreach ( $cat_keys as $key ) {
            if ( isset ( $_POST['term_meta'][$key] ) ) {
                $term_meta[$key] = $_POST['term_meta'][$key];
            }
        }
        // Save the option array.
        update_option( "taxonomy_$t_id", $term_meta );
    }
}   
add_action( 'edited_modules', 'save_extra_taxonomy_fields', 10, 2 );   
add_action( 'create_modules', 'save_extra_taxonomy_fields', 10, 2 );   
//add_action( '...Can't find hook to enable saving custom fields when adding a new term

// Help Doc (Groups taxanomy)Code for adding custom fields to taxanomy (Font awesome Img)
/**
 * Add extra fields to custom taxonomy edit and add form callback functions
 */
// Edit taxonomy page
function extra_edit_tax_fields_help($tag) {
    // Check for existing taxonomy meta for term ID.
    $t_id = $tag->term_id;
    $term_meta = get_option( "taxonomy_$t_id" ); ?>
    <tr class="form-field">
    <th scope="row" valign="top"><label for="cat_Image_url"><?php _e( 'Font Awesome icon' ); ?></label></th>
        <td>
            <input type="text" name="term_meta[img]" id="term_meta[img]" value="<?php echo esc_attr( $term_meta['img'] ) ? esc_attr( $term_meta['img'] ) : ''; ?>">
            <p class="description"><?php _e( 'Enter the class of font awesome icon for the particular modules.' ); ?></p>
        </td>
    </tr>
<?php
}
add_action( 'groups_edit_form_fields', 'extra_edit_tax_fields_help', 10, 2 );

// Add taxonomy page
function extra_add_tax_fields_help( $tag ) {
    // Check for existing taxonomy meta for term ID.
    $t_id = $tag->term_id;
    $term_meta = get_option( "taxonomy_$t_id" ); ?>
    <div class="form-field">
        <label for="cat_Image_url"><?php _e( 'Font Awesome icon' ); ?></label>
        <input type="text" name="term_meta[img]" id="term_meta[img]" value="<?php echo esc_attr( $term_meta['img'] ) ? esc_attr( $term_meta['img'] ) : ''; ?>">
        <p class="description"><?php _e( 'Enter the full class of font awesome for the category modules.' ); ?></p>
    </div>
<?php
}
add_action( 'groups_add_form_fields', 'extra_add_tax_fields_help', 10, 2 );

// Save extra taxonomy fields callback function.
function save_extra_taxonomy_fields_help( $term_id ) {
    if ( isset( $_POST['term_meta'] ) ) {
        $t_id = $term_id;
        $term_meta = get_option( "taxonomy_$t_id" );
        $cat_keys = array_keys( $_POST['term_meta'] );
        foreach ( $cat_keys as $key ) {
            if ( isset ( $_POST['term_meta'][$key] ) ) {
                $term_meta[$key] = $_POST['term_meta'][$key];
            }
        }
        // Save the option array.
        update_option( "taxonomy_$t_id", $term_meta );
    }
}   
add_action( 'edited_groups', 'save_extra_taxonomy_fields_help', 10, 2 );   
add_action( 'create_groups', 'save_extra_taxonomy_fields_help', 10, 2 );   
//add_action( '...Can't find hook to enable saving custom fields when adding a new term


// Module Session ajax
add_action( 'wp_ajax_session_ajax', 'prefix_ajax_session_ajax' );
add_action( 'wp_ajax_nopriv_session_ajax', 'prefix_ajax_session_ajax' );
function prefix_ajax_session_ajax() {
    session_start(); 
    $_SESSION["academy"] = $_POST['academy'];
    $_SESSION["modules"] = $_POST['modules'];
    $_SESSION["product"] = $_POST['product'];
    die();
}								

// Hide Category Meta Box
function remove_post_custom_fields() {
	remove_meta_box( 'categorydiv' , 'post' , 'side' ); 
}
add_action( 'admin_menu' , 'remove_post_custom_fields' );

// Menu for Academy Terms
function register_academy_my_menu() {
  register_nav_menu('academy-menu',__( 'Academy Menu' ));
}
add_action( 'init', 'register_academy_my_menu' );

//Menu for academy options in mobile devices
    function wp_mobile_menu( $args = array() ) {
		$output = '';
		@extract($args);
		if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
		$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
		$menu_items = wp_get_nav_menu_items( $menu->term_id );
		$output = '<select id="'. $id.'" class="custom academy-options">';
		$output .= "<option value='' selected='selected'>" . __($_SESSION["academy"], 'tie') .$url. "</option>";
                $a=array();
		foreach ( (array) $menu_items as $key => $menu_item ) {
                array_push($a,$menu_item->url);
		$title = $menu_item->title;
		$url = $menu_item->url;
		if ( $menu_item->menu_item_parent ) {
		$title = ' - ' . $title;
		}
		$output .= "<option value='" . $url . "'>" . $title . '</option>';
		}
		$output .= '</select>';
		}
		return $output;
	}
?>
