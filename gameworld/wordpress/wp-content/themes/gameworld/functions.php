<?php
/**
 * gameworld functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package gameworld
 */
define('THEME_URI', get_template_directory_uri() );

if ( ! function_exists( 'gameworld_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function gameworld_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on gameworld, use a find and replace
	 * to change 'gameworld' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'gameworld', get_template_directory() . '/languages' );

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
	add_theme_support( 'post-formats', array( 'aside', 'gallery','map' ) );
	wp_insert_term(
		'Map', // change this to
		'format',
		array(
		  'description'	=> 'Adds a large map to the top of your post.',
		  'slug' 		=> 'map'
		)
	);
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'gameworld' ),
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

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'gameworld_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'gameworld_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gameworld_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'gameworld_content_width', 640 );
}
add_action( 'after_setup_theme', 'gameworld_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gameworld_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Left', 'gameworld' ),
		'id'            => 'sidebar-left',
		'description'   => esc_html__( 'Add widgets here.', 'gameworld' ),
		'before_widget' => '<div id="%1$s" class="%2$s sb-wrapper">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
	/*register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar', 'gameworld' ),
		'id'            => 'footer-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'gameworld' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );*/
}
add_action( 'widgets_init', 'gameworld_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function gameworld_scripts() {
	wp_enqueue_style( 'gameworld-style', get_stylesheet_uri() );

	wp_enqueue_script( 'gameworld-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'gameworld-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gameworld_scripts' );

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
 * Load product core.
 */
require get_template_directory() . '/inc/product-core.php';
/*
* add script to product page
*/

/*
* add body class
*/
add_filter( 'body_class', 'custom_class' );
function custom_class( $classes ) {
    if ( is_home() ) {
        $classes[] = 'templateIndex';
    }else{
    	$classes[] = 'template notouch';
    }
    return $classes;
}
add_action('wp_footer','add_script' );
if(!function_exists('add_script')){
	function add_script(){
		echo '<script src="'.get_template_directory_uri().'/assets/javascripts/jquery.isotope.min.js" type="text/javascript"></script>';
	}
}
/**
* Registers a new post type
* @uses $wp_post_types Inserts new post type object into the list
*
* @param string  Post type key, must not exceed 20 characters
* @param array|string  See optional args description above.
* @return object|WP_Error the registered post type object, or an error object
*/
function product_post_type() {

	$labels = array(
		'name'                => __( 'All Products', 'gameworld' ),
		'singular_name'       => __( 'Product', 'gameworld' ),
		'add_new'             => _x( 'Add New Product', 'gameworld', 'gameworld' ),
		'add_new_item'        => __( 'Add New Products', 'gameworld' ),
		'edit_item'           => __( 'Edit Product', 'gameworld' ),
		'new_item'            => __( 'New Product', 'gameworld' ),
		'view_item'           => __( 'View Product', 'gameworld' ),
		'search_items'        => __( 'Search Product', 'gameworld' ),
		'not_found'           => __( 'No Product found', 'gameworld' ),
		'not_found_in_trash'  => __( 'No Product found in Trash', 'gameworld' ),
		'parent_item_colon'   => __( 'Parent Product:', 'gameworld' ),
		'menu_name'           => __( 'Products', 'gameworld' ),
	);

	$args = array(
		'labels'                   => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'taxonomies'          => array('cat-product', 'post_tag' ),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 4,
		'menu_icon'           => 'dashicons-store',
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
		'supports'            => array(
			'title', 'editor', 'author', 'thumbnail',
			'excerpt','custom-fields', 'trackbacks', 'comments',
			'revisions', 'page-attributes', 'post-formats'
			)
	);

	register_post_type( 'product', $args );
}

add_action( 'init', 'product_post_type' );


/**
 * Create a taxonomy
 *
 * @uses  Inserts new taxonomy object into the list
 * @uses  Adds query vars
 *
 * @param string  Name of taxonomy object
 * @param array|string  Name of the object type for the taxonomy object.
 * @param array|string  Taxonomy arguments
 * @return null|WP_Error WP_Error if errors, otherwise null.
 */
function cat_product_taxonomy() {

	$labels = array(
		'name'					=> _x( 'Category Product', 'Taxonomy plural name', 'gameworld' ),
		'singular_name'			=> _x( 'Category Product', 'Taxonomy singular name', 'gameworld' ),
		'search_items'			=> __( 'Search Category Product', 'gameworld' ),
		'popular_items'			=> __( 'Popular Category Product', 'gameworld' ),
		'all_items'				=> __( 'All Category Product', 'gameworld' ),
		'parent_item'			=> __( 'Parent Category Product', 'gameworld' ),
		'parent_item_colon'		=> __( 'Parent Category Product', 'gameworld' ),
		'edit_item'				=> __( 'Edit Category Product', 'gameworld' ),
		'update_item'			=> __( 'Update Category Product', 'gameworld' ),
		'add_new_item'			=> __( 'Add New Category Product', 'gameworld' ),
		'new_item_name'			=> __( 'New Category Product', 'gameworld' ),
		'add_or_remove_items'	=> __( 'Add or remove Category Product', 'gameworld' ),
		'choose_from_most_used'	=> __( 'Choose from most used gameworld', 'gameworld' ),
		'menu_name'				=> __( 'Category Products', 'gameworld' ),
	);

	$args = array(
		'labels'            => $labels,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_admin_column' => true,
		'hierarchical'      => true,
		'show_tagcloud'     => true,
		'show_ui'           => true,
		'query_var'         => true,
		'rewrite'           => true,
		'query_var'         => true,
		'capabilities'      => array(),
	);

	register_taxonomy( 'cat-product', array( 'product' ), $args );
}

add_action( 'init', 'cat_product_taxonomy' );

/*
* remove version
*/
function wpb_remove_version() {
    return '';
}
add_filter('the_generator', 'wpb_remove_version');

/*
* add custom post type in tags page
*/
function wpse28145_add_custom_types( $query ) {
    if( is_tag() && $query->is_main_query() ) {

        // this gets all post types:
        //$post_types = get_post_types();

        // alternately, you can add just specific post types using this line instead of the above:
        $post_types = array( 'post', 'product' );

        $query->set( 'post_type', $post_types );
    }
}
add_filter( 'pre_get_posts', 'wpse28145_add_custom_types' );

// add metabox
add_action( 'add_meta_boxes', 'product_meta_box_add' );
function product_meta_box_add()
{
    add_meta_box( 'product-meta-box-id', 'Sản phẩm nổi bật', 'product_meta_box_cb', 'product', 'side', 'high' );
}

function product_meta_box_cb()
{
    // $post is already set, and contains an object: the WordPress post
    global $post;
    $values = get_post_custom( $post->ID );
    $check = isset( $values['my_meta_box_check'][0] ) ? esc_attr( $values['my_meta_box_check'][0] ) : '';
     
    // We'll use this nonce field later on when saving.
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
    ?>
    <p>
        <input type="checkbox" id="my_meta_box_check" name="my_meta_box_check" value ="on" <?php checked( $check, 'on' ); ?> />
        <label for="my_meta_box_check">Sản phẩm nổi bật (Featured Product)</label>
    </p>
    <?php    
}

add_action( 'save_post', 'product_meta_box_save' );
function product_meta_box_save( $post_id )
{
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
     
    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) return;
         
    // This is purely my personal preference for saving check-boxes
    $chk = isset( $_POST['my_meta_box_check'] ) ? 'on' : 'off';
    update_post_meta( $post_id, 'my_meta_box_check', $chk );
}