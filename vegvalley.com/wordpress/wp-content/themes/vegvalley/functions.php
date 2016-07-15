<?php
/**
 * vegvalley functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package vegvalley
 */

if ( ! function_exists( 'vegvalley_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function vegvalley_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on vegvalley, use a find and replace
	 * to change 'vegvalley' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'vegvalley', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'vegvalley' ),
		'footer' => esc_html__( 'footer', 'vegvalley' )
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
	add_theme_support( 'custom-background', apply_filters( 'vegvalley_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'vegvalley_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function vegvalley_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'vegvalley_content_width', 640 );
}
add_action( 'after_setup_theme', 'vegvalley_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function vegvalley_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'vegvalley' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'vegvalley' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'vegvalley_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function vegvalley_scripts() {

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css',false,'1.1','all');
	
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css',false,'1.1','all');

	wp_enqueue_style( 'nivo-slider', get_template_directory_uri() . '/css/nivo-slider.css',false,'1.1','all');

	wp_enqueue_style( 'vegvalley-style', get_stylesheet_uri() );

	wp_enqueue_script( 'vegvalley-jquery', get_template_directory_uri() . '/js/jquery-1.12.4.min.js', array(), '1.12.4', true );

	wp_enqueue_script( 'vegvalley-boostrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '1.0', true );

	wp_enqueue_script( 'vegvalley-jquery.nicescroll.min', get_template_directory_uri() . '/js/jquery.nicescroll.min.js', array(), '1.0', true );

	wp_enqueue_script( 'vegvalley-jquery.nivo.slider', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array(), '1.0', true );

	wp_enqueue_script( 'vegvalley-customjs', get_template_directory_uri() . '/js/custom.js', array(), '1.0', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'vegvalley_scripts' );
/*
* Add search li
*/
add_filter( 'wp_nav_menu_items', 'add_search_to_nav', 10, 2 );

function add_search_to_nav( $items, $args )
{
    $items .= '<li class="btn-search"></li>	';
    return $items;
}
/*
* Add excerpt page
*/
function wpcodex_add_excerpt_support_for_pages() {
	add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'wpcodex_add_excerpt_support_for_pages' );

/*
* Add custom post type
*/
/**
* Registers a new post type
* @uses $wp_post_types Inserts new post type object into the list
*
* @param string  Post type key, must not exceed 20 characters
* @param array|string  See optional args description above.
* @return object|WP_Error the registered post type object, or an error object
*/
function vegvalley_functions() {

	$labels = array(
		'name'                => __( 'Functions', 'vegvalley' ),
		'singular_name'       => __( 'function', 'vegvalley' ),
		'add_new'             => _x( 'Add New function', 'vegvalley', 'vegvalley' ),
		'add_new_item'        => __( 'Add New function', 'vegvalley' ),
		'edit_item'           => __( 'Edit function', 'vegvalley' ),
		'new_item'            => __( 'New function', 'vegvalley' ),
		'view_item'           => __( 'View function', 'vegvalley' ),
		'search_items'        => __( 'Search Function', 'vegvalley' ),
		'not_found'           => __( 'No Functions found', 'vegvalley' ),
		'not_found_in_trash'  => __( 'No Functions found in Trash', 'vegvalley' ),
		'parent_item_colon'   => __( 'Parent function:', 'vegvalley' ),
		'menu_name'           => __( 'Functions', 'vegvalley' ),
	);

	$args = array(
		'labels'                   => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'taxonomies'          => array(),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => null,
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
			'excerpt', 'page-attributes', 'post-formats'
			)
	);

	register_post_type( 'function', $args );
}

add_action( 'init', 'vegvalley_functions' );


/*
*
*	CUSTOM WOOCOMERCE
*/

//warp start
add_action('woocommerce_before_main_content', 'vegvalley_wrapper_start', 10);
function vegvalley_wrapper_start() {
  echo '<section class="wc-products page-wc-product">';
}
add_action('woocommerce_after_main_content', 'vegvalley_wrapper_end', 10);
function vegvalley_wrapper_end() {
  echo '</section>';
}
//loop
function woocommerce_product_loop_start(){
    echo '<div class="content container"><div class="box-product-wrap">';
}
function woocommerce_product_loop_end(){
    echo '</div></div>';
}
//single item
function wo_before_single_content($value='')
{
	echo '<div class="content container">';
}
add_action('woocommerce_before_single_product', 'wo_before_single_content', 15 );

function wo_after_single_content($value='')
{
	echo '</div>';
}
add_action('woocommerce_after_single_product', 'wo_after_single_content', 20 );

// item product
function vegvalley_template_loop_product_link_open() {
    echo '<div class="product-image"><a href="' . get_the_permalink() . '" class="woocommerce-LoopProduct-link">';
}
add_action( 'woocommerce_before_shop_loop_item', 'vegvalley_template_loop_product_link_open', 10 );
/**
 * Insert the opening anchor tag for products in the loop.
 */
function vegvalley_template_loop_product_link_close() {
    echo '</a></div>';
}
add_action( 'woocommerce_after_shop_loop_item', 'vegvalley_template_loop_product_link_close', 5 );
//images product thumbnail size
add_action( 'init', 'vegvalley_woocommerce_image_dimensions', 1 );

function vegvalley_woocommerce_image_dimensions() {
  	$catalog = array(
		'width' 	=> '340',	// px
		'height'	=> '340',	// px
		'crop'		=> 1 		// true
	);
	// Image sizes
	update_option( 'shop_catalog_image_size', $catalog ); 		// Product category thumbs
}
// change page shop title
add_filter( 'woocommerce_page_title', 'woo_shop_page_title');
function woo_shop_page_title( $page_title ) {
          if( 'Shop' == $page_title) {
                       return "Other Products";
             }
}
//show page,category title
function woo_show_page_title()
{
	?>
	<div class="head-page">
		<div class="content container">
	<?php
	if ( apply_filters( 'woocommerce_show_page_title', true ) ) : 
		$product_cats = wp_get_post_terms( get_the_ID(), 'product_cat' );
		if(is_shop()){
		?>
		<small class="rule left"></small>	<h1 class="page-title"><?php woocommerce_page_title(); ?></h1> <small class="rule right"></small>
		<?php
		}else{
			if ( $product_cats && ! is_wp_error ( $product_cats ) ){
			 		$single_cat = array_shift( $product_cats ); ?>
			<small class="rule left"></small><h1 class="product_category_title"><?php echo $single_cat->name; ?></h1><small class="rule right"></small>
			<?php }
		}
	endif; 
}
add_action( 'woocommerce_before_main_content', 'woo_show_page_title', 15 );
function woo_show_page_title_before_breadcrumb($value='')
{
	echo '</div></div>';
}
add_action('woocommerce_before_main_content', 'woo_show_page_title_before_breadcrumb', 21  );
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
