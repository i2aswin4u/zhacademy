<?php
register_nav_menus(array(
    'header_Menu' => __('Header Menu', 'sw theme'),
));
add_filter('the_generator', 'version');
//custom post type faq
add_action('init', 'faq_post');
function faq_post() {
    $labels = array(
        'name' => _x('FAQ', 'FAQ type general name'),
        'singular_name' => _x('FAQ', 'deail type singular name'),
        'add_new' => _x('Add New', 'FAQ item'),
        'add_new_item' => __('Add New FAQ Item'),
        'edit_item' => __('Edit FAQ Item'),
        'new_item' => __('New FAQ Item'),
        'view_item' => __('View FAQ Item'),
        'search_items' => __('Search FAQ'),
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
        'has_archive' => true,
        'menu_position' => 6,
        'menu_icon' => 'dashicons-editor-help',
        'taxonomies' => array('post_tag'),
        'supports' => array('title','editor','excerpt','thumbnail')
    );
    //register what we just set up above
    register_post_type('faq', $args);
}
function default_comments_on( $data ) {
    if( $data['post_type'] == 'faq' ) {
        $data['comment_status'] = 'open';
    }

    return $data;
}
add_filter( 'wp_insert_post_data', 'default_comments_on' );
// create a taxonomy for faq of BLUE EHS
//function faqtax_init() {
//    register_taxonomy(
//        'categories', 'faq', array(
//        'hierarchical'      => true,
//        'label' => __('categories'),
//        'rewrite' => array('slug' => 'category'),
//            )
//    );
//}
//add_action('init', 'faqtax_init');
//// create a taxonomy for faq of OPEN EMR
//function oemr_faqtax_init() {
//    register_taxonomy(
//        'oemr-categories', 'faq', array(
//        'hierarchical'      => true,
//        'label' => __('OEMR Categories'),
//        'rewrite' => array('slug' => 'oemr-category'),
//            )
//    );
//}
//add_action('init', 'oemr_faqtax_init');
//custom post type course
//add_action('init', 'course_post');
//function course_post() {
//    $labels = array(
//        'name' => _x('Course', 'Course type general name'),
//        'singular_name' => _x('Course', 'deail type singular name'),
//        'add_new' => _x('Add New', 'Course item'),
//        'add_new_item' => __('Add New Course Item'),
//        'edit_item' => __('Edit Course Item'),
//        'new_item' => __('New Course Item'),
//        'view_item' => __('View Course Item'),
//        'search_items' => __('Search Course'),
//        'not_found' => __('Nothing found'),
//        'not_found_in_trash' => __('Nothing found in Trash'),
//        'parent_item_colon' => ''
//    );
//    $args = array(
//        'labels' => $labels,
//        'public' => true,
//        'publicly_queryable' => true,
//        'show_ui' => true,
//        'query_var' => true,
//        'rewrite' => true,
//        'capability_type' => 'post',
//        'hierarchical' => true,
//        'has_archive' => true,
//        'menu_position' => 6,
//        'menu_icon' => 'dashicons-editor-help',
//        'taxonomies' => array('post_tag'),
//        'supports' => array('title','editor','excerpt','thumbnail')
//    );
//    //register what we just set up above
//    register_post_type('course', $args);
//}

//custom post type Webinar
//add_action('init', 'webinar_post');
//function webinar_post() {
//    $labels = array(
//        'name' => _x('webinar', 'webinar type general name'),
//        'singular_name' => _x('Webinar', 'deail type singular name'),
//        'add_new' => _x('Add New', 'Webinar item'),
//        'add_new_item' => __('Add New Webinar Item'),
//        'edit_item' => __('Edit Webinar Item'),
//        'new_item' => __('New Webinar Item'),
//        'view_item' => __('View Webinar Item'),
//        'search_items' => __('Search Webinar'),
//        'not_found' => __('Nothing found'),
//        'not_found_in_trash' => __('Nothing found in Trash'),
//        'parent_item_colon' => ''
//    );
//    $args = array(
//        'labels' => $labels,
//        'public' => true,
//        'publicly_queryable' => true,
//        'show_ui' => true,
//        'query_var' => true,
//        'rewrite' => true,
//        'capability_type' => 'post',
//        'hierarchical' => true,
//        'has_archive' => true,
//        'menu_position' => 6,
//        'menu_icon' => 'dashicons-editor-help',
//        'taxonomies' => array('post_tag'),
//        'supports' => array('title','editor','excerpt','thumbnail')
//    );
//    register_post_type('webinar', $args);
//}


// create a taxonomy for webinar of Blue EHS
//function webinar_init() {
//
//    register_taxonomy(
//            'webinars', 'webinar', array(
//            'hierarchical'      => true,
//            'label' => __('Webinar Categories'),
//            'rewrite' => array('slug' => 'webinars'),
//            )
//    );
//}
//add_action('init', 'webinar_init');


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

    //register what we just set up above
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
// create a taxonomy for text help doc of Open EMR
//function oemr_texthelpdoc_init() {
//
//    register_taxonomy(
//            'oemr-groups', 'texthelpdoc', array(
//            'hierarchical'      => true,
//            'label' => __('OEMR Groups'),
//            'rewrite' => array('slug' => 'omer-group'),
//            )
//    );
//}
//add_action('init', 'oemr_texthelpdoc_init');
// create a taxonomy for Courses of BLUE EHS
//function courses_tax_init() {
//    register_taxonomy(
//            'study', 'course', array(
//            'hierarchical'      => true,
//            'label' => __('Study'),
//            'rewrite' => array('slug' => 'study'),
//            )
//    );
//}
//add_action('init', 'courses_tax_init');
// create a taxonomy for Courses of Open EMR
//function oemr_courses_tax_init() {
//
//    register_taxonomy(
//            'oemr-study', 'course', array(
//            'hierarchical'      => true,
//            'label' => __('OEMR Study'),
//            'rewrite' => array('slug' => 'omer-study'),
//            )
//    );
//}
//add_action('init', 'oemr_courses_tax_init');

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
?>
<?php 
//custom post type Videos
//add_action('init', 'videos_post');
//function videos_post() {
//    $labels = array(
//        'name' => _x('Videos', 'Videos type general name'),
//        'singular_name' => _x('Videos', 'deail type singular name'),
//        'add_new' => _x('Add New', 'Videos item'),
//        'add_new_item' => __('Add New Videos Item'),
//        'edit_item' => __('Edit Videos Item'),
//        'new_item' => __('New Videos Item'),
//        'view_item' => __('View Videos Item'),
//        'search_items' => __('Search Videos'),
//        'not_found' => __('Nothing found'),
//        'not_found_in_trash' => __('Nothing found in Trash'),
//        'parent_item_colon' => ''
//    );
//    $args = array(
//        'labels' => $labels,
//        'public' => true,
//        'publicly_queryable' => true,
//        'show_ui' => true,
//        'query_var' => true,
//        'rewrite' => true,
//        'capability_type' => 'post',
//        'hierarchical' => true,
//        'has_archive' => true,
//        'menu_position' => 6,
//        'menu_icon' => 'dashicons-editor-help',
//        'taxonomies' => array('post_tag'),
//        'supports' => array('title','editor','excerpt','thumbnail')
//    );
//    //register what we just set up above
//    register_post_type('videos', $args);
//}
// create a taxonomy for Videos Blue EHS
//function video_tax_init() {
//    register_taxonomy(
//            'help-videos', 'videos', array(
//            'hierarchical'      => true,
//            'label' => __('Help Videos'),
//            'rewrite' => array('slug' => 'help-videos'),
//            )
//    );
//}
//add_action('init', 'video_tax_init');
//// create a taxonomy for OPEN EMR
//function oemr_video_tax_init() {
//    register_taxonomy(
//            'oemr-help-videos', 'videos', array(
//            'hierarchical'      => true,
//            'label' => __('OEMR Help Videos'),
//            'rewrite' => array('slug' => 'omer-help-videos'),
//            )
//    );
//}
//add_action('init', 'oemr_video_tax_init');

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
                          if ( $new_query->have_posts() ) {
                            while ( $new_query->have_posts() ) {
                                  $new_query->the_post();?>
                    <div id="replacement_div">
                                    <div id="queried_ptype_icon"> <?php echo ''?>
                                        <?php 
                                            $queried_ptype = get_post_type();
                                            if($queried_ptype == 'faq'){
                                                 $name = ot_get_option( 'post_type_name_for_faq' );   
                                                  ?><i class="fa fa-question-circle" title="<?php if($name) {echo $name;} else {echo "FAQ";}?>"></i><?php
                                                }
                                            else if($queried_ptype == 'course'){
                                                 $name = ot_get_option( 'post_type_name_for_courses' );                                               
                                                 ?><i class="fa fa-mortar-board" title="<?php if($name) {echo $name;} else {echo "Courses";}?>"></i><?php 
                                            }
                                            else if($queried_ptype == 'texthelpdoc'){
                                                $name = ot_get_option( 'post_type_name_for_text_help' ); 
                                                ?><i class="fa fa-support" title="<?php if($name) {echo $name;} else {echo "Help Documents";}?>"></i><?php 
                                            }
                                            else if($queried_ptype == 'videos'){
                                                echo '<i class="fa fa-video-camera"></i>';
                                                $name = ot_get_option( 'post_type_name_for_videos' ); 
                                                ?><i class="fa video-camera" title="<?php if($name) {echo $name;} else {echo "Videos";}?>"></i><?php  
                                            }
                                            else if($queried_ptype == 'post'){                                                
                                                $name = 'Post';
                                                ?><i class="fa fa-align-left" title="<?php if($name) {echo $name;} else {echo "Post";}?>"></i><?php  
                                            }
                                        ?>
                                           <div class="query_ptype_text"> <?php echo $queried_ptype_name; ?> </div>
                                       </div>               
                                    <h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>   
<!--                                   <div class="permalink_set">
                                       <h3 class="show_permalink"><i class="fa fa-external-link"></i>  <a href="<?php //the_permalink();?>"> <?php//   $perma = get_permalink(); echo substr($perma, 0, 80).'...';  ?></a> </h3>
                                       
                                   </div>-->
                                <div class="clear"> </div>
                                <div class="entry">
                                  <?php the_excerpt(); ?>                       
                                </div>  
                                  <?php           
                            }
                          } else{ ?>
                              <h2 class="center">Not Found</h2>      
                        <p class="center">Sorry, but you are looking for something that isn't here.</p>   
                          <?php }
                          
                          ?> 
                </div><?php   
    
    die();
}

// categories for the post type
function modules_init() {
    register_taxonomy(
        'modules', 'post', array(
        'hierarchical'      => true,
        'show_in_nav_menus' => false,
        'label' => __('Modules'),
       // 'rewrite' => array('slug' => 'oemr-category'),
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
       // 'rewrite' => array('slug' => 'blue-category'),
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
       // 'rewrite' => array('slug' => 'blue-category'),
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

//Code for adding custom fields to taxanomy
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
            <p class="description"><?php _e( 'Enter the full class of font awesome for the category modules.' ); ?></p>
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
?>
<?php 
// Session ajax
add_action( 'wp_ajax_session_ajax', 'prefix_ajax_session_ajax' );
add_action( 'wp_ajax_nopriv_session_ajax', 'prefix_ajax_session_ajax' );
function prefix_ajax_session_ajax() {
    session_start(); 
    $_SESSION["academy"] = $_POST['academy'];
    $_SESSION["modules"] = $_POST['modules'];
    $_SESSION["product"] = $_POST['product'];
    echo      $_SESSION["modules"].'</br>' ;
    echo      $_SESSION["academy"].'</br>' ;
    echo      $_SESSION["product"].'</br>' ;
    die();
}								
?>
<?php
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
?>
<?php 
//Menu for academy options in mobile devices
    function wp_mobile_menu( $args = array() ) {
		$output = '';
		@extract($args);
		if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
		$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
		$menu_items = wp_get_nav_menu_items( $menu->term_id );
		$output = '<select id="'. $id.'" class="custom academy-options">';
		$output .= "<option value='' selected='selected'>" . __($_SESSION["academy"], 'tie') . "</option>";
		foreach ( (array) $menu_items as $key => $menu_item ) {
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
