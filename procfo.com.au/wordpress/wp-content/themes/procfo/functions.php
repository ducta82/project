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

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'procfo_scripts' );



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
