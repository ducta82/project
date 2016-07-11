<?php
/**
 * procfo functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package procfo
 */

if ( ! function_exists( 'procfo_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function procfo_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on procfo, use a find and replace
	 * to change 'procfo' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'procfo', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'procfo' ),
		'footer_menu1' => esc_html__( 'Footer Menu 1', 'justresidential-com-au' ),
		'footer_menu2' => esc_html__( 'Footer Menu 2', 'justresidential-com-au' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	/*
	 * add post type
	 */
	add_theme_support( 'post-formats',
    array(
       'image',
       'video',
       'gallery',
       'quote',
       'link'
    )
 	);

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'procfo_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'procfo_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function procfo_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'procfo_content_width', 640 );
}
add_action( 'after_setup_theme', 'procfo_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function procfo_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'procfo' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'procfo' ),
		'before_widget' => '<section id="%1$s" class="widget_iteam %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '',
		'after_title'   => '',
	) );
}
add_action( 'widgets_init', 'procfo_widgets_init' );

function register_custom_widget() {
    register_widget( 'Custom_Widget' );
}
add_action( 'widgets_init', 'register_custom_widget' );
/**
 * Enqueue scripts and styles.
 */
function procfo_scripts() {
	wp_enqueue_style( 'procfo-style', get_stylesheet_uri() );

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css',false,'1.1','all');

	wp_enqueue_style( 'style', get_template_directory_uri() . '/css/style.css',false,'1.1','all');

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css',false,'1.1','all');

	wp_enqueue_script( 'procfo-jquery-1.12.4.min', get_template_directory_uri() . '/js/jquery-1.12.4.min.js', array(), '1.12.4', true );

	wp_enqueue_script( 'procfo-customjs', get_template_directory_uri() . '/js/custom.js', array(), '1.0', true );

	wp_enqueue_script( 'procfo-bootstrap.min', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '1.0', true );

	wp_enqueue_script( 'gmaps.min', get_template_directory_uri() . '/js/gmaps.min.js', array(), '1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'procfo_scripts' );


/*
* pagination
*/
function wp_corenavi_table() {
 global $wp_query;
 $big = 999999999; 
 $translated = "";
 $total = $wp_query->max_num_pages;
 if($total > 1) echo '<div class="paginate_links">';
 echo paginate_links( array(
 'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
 'format' => '?paged=%#%',
 'current' => max( 1, get_query_var('paged') ),
 'total' => $wp_query->max_num_pages,
 'mid_size' => '10',
 'prev_text' => __('Previous'),
 'next_text' => __('Next'),
 ) );
 if($total > 1) echo '</div>';
}

function workaround_broken_wp_rewrite_rule($query_vars)
{
  if (@$query_vars["name"] == "page") {
    $qv = array();
    $qv["paged"] = str_replace("/", "", $query_vars["page"]);
    $qv["category_name"] = $query_vars["category_name"];

    return $qv;
  }

  return $query_vars;
}
add_filter('request', 'workaround_broken_wp_rewrite_rule');
function hide_admin_bar_from_front_end(){
  if (is_blog_admin()) {
    return true;
  }
  return false;
}
add_filter( 'show_admin_bar', 'hide_admin_bar_from_front_end' );


/**
* Custom metabox
*/
/* 
Define the custom box */
add_action( 'add_meta_boxes', 'page_add_custom_box' );

/* Do something with the data entered */
add_action( 'save_post', 'page_save_postdata' );

/* Adds a box to the main column on the Post and Page edit screens */
function page_add_custom_box() {
    add_meta_box( 
        'page-custom-box',
        'Page Template',
        'page_inner_custom_box',
        'page',
        'side',
        'high'
    );
}

/* Prints the box content */
function page_inner_custom_box($page)
{
    // Use nonce for verification
    wp_nonce_field( 'save_field_nonce', 'info_noncename' );

    // Get saved value, if none exists, "default" is selected
    $saved = get_post_meta( $page->ID, 'page_box_template', true);
    if( !$saved )
        $saved = 'default';

    $fields = array(
        'notshow-in-sitemap' => __('not show in site map', 'wpse'),
        'default'   => __('Default', 'wpse')
    );

    foreach($fields as $key => $label)
    {
        printf(
            '<input type="radio" name="page_box_template" value="%1$s" id="page_box_template[%1$s]" %3$s />'.
            '<label for="page_box_template[%1$s]"> %2$s ' .
            '</label><br>',
            esc_attr($key),
            esc_html($label),
            checked($saved, $key, false)
        );
    }
}
/* When the post is saved, saves our custom data */
function page_save_postdata( $page_id ) 
{
      // verify if this is an auto save routine. 
      // If it is our form has not been submitted, so we dont want to do anything
      if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
          return;

      // verify this came from the our screen and with proper authorization,
      // because save_post can be triggered at other times
      if ( !wp_verify_nonce( $_POST['info_noncename'], 'save_field_nonce' ) )
          return;

      if ( isset($_POST['page_box_template']) && $_POST['page_box_template'] != "" ){
            update_post_meta( $page_id, 'page_box_template', $_POST['page_box_template'] );
      } 
}

function ilc_mce_buttons($buttons){
  array_push($buttons,
     "backcolor",
     "anchor",
     "hr",
     "sub",
     "sup",
     "fontselect",
     "fontsizeselect",
     "styleselect",
     "cleanup"
);
  return $buttons;
}
add_filter("mce_buttons", "ilc_mce_buttons");
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
/**
 * Load Custom widget
 */
require get_template_directory() . '/inc/custom-widget.php';
