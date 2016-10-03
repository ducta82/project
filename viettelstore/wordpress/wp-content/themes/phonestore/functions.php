<?php
/**
 * phonestore functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package phonestore
 */

if ( ! function_exists( 'phonestore_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function phonestore_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on phonestore, use a find and replace
	 * to change 'phonestore' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'phonestore', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'woocommerce' );
	define('template_directory', get_template_directory_uri());
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
		'primary' => esc_html__( 'Primary', 'phonestore' ),
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
	add_theme_support( 'custom-background', apply_filters( 'phonestore_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'phonestore_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function phonestore_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'phonestore_content_width', 640 );
}
add_action( 'after_setup_theme', 'phonestore_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function phonestore_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'phonestore' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'phonestore' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'phonestore_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function phonestore_scripts() {
	wp_enqueue_style( 'phonestore-style', get_stylesheet_uri() );

	wp_enqueue_script( 'phonestore-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'phonestore-custom', get_template_directory_uri() . '/js/custom.js', array(), '1.0', true );
	wp_localize_script( 'phonestore-custom', 'ajax_object', array(
 
        // Các phương thức sẽ sử dụng
        'ajax_url' => admin_url( 'admin-ajax.php' ),
        'query_vars' => json_encode( $wp_query->query )
         
));
	wp_enqueue_script( 'phonestore-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script('jquery-min', get_template_directory_uri() . '/Assets/js/jquery.min.js', array(), '1.0', false );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'phonestore_scripts' );

/*Walker Nav*/
class myWalkerNav extends Walker_Nav_Menu
{
	/**
	 * Starts the list before the elements are added.
	 *
	 * @since 3.0.0
	 *
	 * @see Walker::start_lvl()
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int    $depth  Depth of menu item. Used for padding.
	 * @param array  $args   An array of wp_nav_menu() arguments.
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"content\">\n";
		$output .= '<div class="col-xs-3">';
	}

	/**
	 * Ends the list of after the elements are added.
	 *
	 * @since 3.0.0
	 *
	 * @see Walker::end_lvl()
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int    $depth  Depth of menu item. Used for padding.
	 * @param array  $args   An array of wp_nav_menu() arguments.
	 */
	public function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= '</div>';
		$output .= "$indent</ul>\n";
	}

	/**
	 * Starts the element output.
	 *
	 * @since 3.0.0
	 * @since 4.4.0 The {@see 'nav_menu_item_args'} filter was added.
	 *
	 * @see Walker::start_el()
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item   Menu item data object.
	 * @param int    $depth  Depth of menu item. Used for padding.
	 * @param array  $args   An array of wp_nav_menu() arguments.
	 * @param int    $id     Current item ID.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes_tab = str_replace("tab-",'', $classes[0]);
		$classes[] = 'menu-item-' . $item->ID;
		if($depth == 0 ){
		$classes[] = 'item';
		}

		/**
		 * Filters the arguments for a single nav menu item.
		 *
		 * @since 4.4.0
		 *
		 * @param array  $args  An array of arguments.
		 * @param object $item  Menu item data object.
		 * @param int    $depth Depth of menu item. Used for padding.
		 */
		$args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

		/**
		 * Filters the CSS class(es) applied to a menu item's list item element.
		 *
		 * @since 3.0.0
		 * @since 4.1.0 The `$depth` parameter was added.
		 *
		 * @param array  $classes The CSS classes that are applied to the menu item's `<li>` element.
		 * @param object $item    The current menu item.
		 * @param array  $args    An array of wp_nav_menu() arguments.
		 * @param int    $depth   Depth of menu item. Used for padding.
		 */
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		/**
		 * Filters the ID applied to a menu item's list item element.
		 *
		 * @since 3.0.1
		 * @since 4.1.0 The `$depth` parameter was added.
		 *
		 * @param string $menu_id The ID that is applied to the menu item's `<li>` element.
		 * @param object $item    The current menu item.
		 * @param array  $args    An array of wp_nav_menu() arguments.
		 * @param int    $depth   Depth of menu item. Used for padding.
		 */
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $class_names .'>';

		$atts = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
		$atts['href']   = ! empty( $item->url )        ? $item->url        : '';

		/**
		 * Filters the HTML attributes applied to a menu item's anchor element.
		 *
		 * @since 3.6.0
		 * @since 4.1.0 The `$depth` parameter was added.
		 *
		 * @param array $atts {
		 *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
		 *
		 *     @type string $title  Title attribute.
		 *     @type string $target Target attribute.
		 *     @type string $rel    The rel attribute.
		 *     @type string $href   The href attribute.
		 * }
		 * @param object $item  The current menu item.
		 * @param array  $args  An array of wp_nav_menu() arguments.
		 * @param int    $depth Depth of menu item. Used for padding.
		 */
		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		/** This filter is documented in wp-includes/post-template.php */
		$title = apply_filters( 'the_title', $item->title, $item->ID );
		/**
		 * Filters a menu item's title.
		 *
		 * @since 4.4.0
		 *
		 * @param string $title The menu item's title.
		 * @param object $item  The current menu item.
		 * @param array  $args  An array of wp_nav_menu() arguments.
		 * @param int    $depth Depth of menu item. Used for padding.
		 */
		$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

		$item_output = $args->before;
		if($depth == 0){
			$item_output .= '<div class="icon "><i class="icons '.$classes_tab.'"></i></div>';
			$item_output .= '<h4>'.$title.'</h4>';
		}else{
			$item_output .= '<h4>';
		}
		$item_output .= '<a'. $attributes .'>';
		if($depth == 0){
			$item_output .= '<i class="bg-menu bg-'.$i.' icons" title="'.$title.'"></i>';
		}else{
			$item_output .= $args->link_before . $title . $args->link_after;
		}
		$item_output .= '</a>';
		if($depth != 0){
			$item_output .= '</h4>';
		}
		$item_output .= $args->after;
		/**
		 * Filters a menu item's starting output.
		 *
		 * The menu item's starting output only includes `$args->before`, the opening `<a>`,
		 * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
		 * no filter for modifying the opening and closing `<li>` for a menu item.
		 *
		 * @since 3.0.0
		 *
		 * @param string $item_output The menu item's starting HTML output.
		 * @param object $item        Menu item data object.
		 * @param int    $depth       Depth of menu item. Used for padding.
		 * @param array  $args        An array of wp_nav_menu() arguments.
		 */
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	/**
	 * Ends the element output, if needed.
	 *
	 * @since 3.0.0
	 *
	 * @see Walker::end_el()
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item   Page data object. Not used.
	 * @param int    $depth  Depth of page. Not Used.
	 * @param array  $args   An array of wp_nav_menu() arguments.
	 */
	public function end_el( &$output, $item, $depth = 0, $args = array() ) {
		$output .= "</li>\n";
	}

}
/*Breadcrumb*/
add_filter( 'woocommerce_breadcrumb_defaults', 'jk_woocommerce_breadcrumbs' );
function jk_woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => ' <i class="fa fa-angle-right" style="color: #949494;"></i> ',
            'wrap_before' => '<div class="container-fluid">
			    <div class="row">
			        <div class="container container-fixed">
			            <div class="row history">
			            <span class="text1">',
            'wrap_after'  => '</span>
            			</div>
			        </div>
			    </div>
			</div>',
            'before'      => '',
            'after'       => '',
            'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
        );
}
/*archive thumbnail*/
function beforeShopThumbnail(){
	echo '<div class="img">';
}
add_action('woocommerce_before_shop_loop_item_title','beforeShopThumbnail', 5 );
function afterShopThumbnail(){
	echo '</div>';
}
add_action( 'woocommerce_before_shop_loop_item_title','afterShopThumbnail', 15 );
function woocommerce_template_loop_product_title() {
        echo '<h2 class="name">' . get_the_title() . '</h2>';
    }

function after_woocommerce_template_loop_product_link_open() {
	global $product;
	global $post;
	$price_html = $product->get_price_html() ? $product->get_price_html() : 0;
	if(is_archive()){
		echo '<div class="detail" style="display: none;">
        <h2>'.get_the_title().'</h2>
        <h4>'.$price_html.'</h4>
        
        <div name="ttnoibat" class="line-top">
            '.$post->post_excerpt.'
        </div>
    </div>
    ';
	}else{
		echo '<div class="detail">
            '.$post->post_excerpt.'
    </div>
    ';
	}
    
}    
/*show one price*/
add_filter( 'woocommerce_variable_sale_price_html', 'wc_wc20_variation_price_format', 10, 2 );
add_filter( 'woocommerce_variable_price_html', 'wc_wc20_variation_price_format', 10, 2 );
function wc_wc20_variation_price_format( $price, $product ) {
// Main Price
$prices = array( $product->get_variation_price( 'min', true ), $product->get_variation_price( 'max', true ) );
$price = $prices[0] !== $prices[1] ? sprintf( __( '%1$s', 'woocommerce' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );
// Sale Price
$prices = array( $product->get_variation_regular_price( 'min', true ), $product->get_variation_regular_price( 'max', true ) );
sort( $prices );
$saleprice = $prices[0] !== $prices[1] ? sprintf( __( '%1$s', 'woocommerce' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );

if ( $price !== $saleprice ) {
$price = '<del>' . $saleprice . '</del> <ins>' . $price . '</ins>';
}
return $price;
}
/*single product*/
function afer_related_products(){
	echo '</div>
			<div class="row compare-produce"';
}
add_action('woocommerce_after_single_product_summary','afer_related_products',18 );

add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args' );
  function jk_related_products_args( $args ) {
	$args['posts_per_page'] = 6; // 6 related products
	return $args;
}
function giftSingleProduct(){
	echo '<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                
                                <!-- BEGIN KM_Block1 -->
                                <div class="gift">
                                    <div class="title">
                                        <i class="icons qt"></i>
                                        QUÀ TẶNG
                                    </div>
                                    <div class="content">
                                        
                                        <p>- Trả g&oacute;p l&atilde;i suất 0%<br />
- Tặng phiếu mua h&agrave;ng phụ kiện 200.000đ (Kh&ocirc;ng &aacute;p dụng với c&aacute;c kh&aacute;ch h&agrave;ng đặt trước ng&agrave;y 23/9/2016)<br />
- Bảo h&agrave;nh 1 đổi 1 trong 30 ng&agrave;y đối với c&aacute;c lỗi do Nh&agrave; sản xuất.<br />
- Tặng g&oacute;i bảo hiểm tai nạn bất ngờ <a href="/tin-tuc/tang-goi-bao-hiem-tai-nan-bat-ngo-khi-mua-j7-prime-nid6516.html"><strong><span style="text-decoration: underline; color: #0070c0;">Xem chi tiết</span></strong></a></p> <em>(Áp dụng từ 23/09 đến 30/09/2016)</em><br />
                                        
                                    </div>
                                </div>
                                <!-- END KM_Block1 -->
                                <div class="mr-top" style="margin-top: 20px;">
                                    <div id="owl-advSlide" class="owl-carousel owl-theme">
                                        
                                    </div>
                                </div>
                                <div class="guarantee">
                                    <table cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td style="width: 25px;">
                                                <i class="icons bh"></i>
                                            </td>
                                            <td>Bảo hành chính hãng
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <i class="icons phone"></i>
                                            </td>
                                            <td>Tư vấn bán hàng: 1800 8123</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <i class="icons giaohang"></i>
                                            </td>
                                            <td>Giao hàng miễn phí (nếu cách Viettel Store dưới 10km)</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>';
}

function afterTitleProduct(){
	echo '<div class="row">
			<div>';
}
add_action('woocommerce_single_product_summary','afterTitleProduct',1 );
function beforePriceProduct(){
	echo '</div>
			</div>';
}
add_action('woocommerce_single_product_summary','beforePriceProduct',15 );

function wpa83367_price_html(){
	global $product;
	if($product->product_type != 'variable'){
		if ($product->sale_price) :
		$price .= '<span>'.woocommerce_price( $product->sale_price ).'</span> <span class="saleprice">'.woocommerce_price( $product->regular_price ).'</span>';
		$price = apply_filters('woocommerce_sale_price_html', $price, $this);
		else :
		$price .= '<div class="woocommerce-variation-price"><span class="price">' .woocommerce_price( $product->price ).'</span></div>';
		$price = apply_filters('woocommerce_price_html', $price, $this);
		endif;
	}else{
		$price = '';
	}
    
	echo $price;
}
add_action('woocommerce_single_product_summary','wpa83367_price_html',10 );

function the_breadcrumb() {
		echo '<div class="container-fluid">
			    <div class="row">
			        <div class="container container-fixed">
			            <div class="row history">';
	if (!is_home()) {
		echo '<span class="text1"><a href="';
		echo get_option('home');
		echo '">';
		echo 'Trang chủ ';
		echo '<i class="fa fa-angle-right"></i></a>';
		if (is_category() || is_single()) {
			echo '<span class="text2">';
			echo single_cat_title("", false);
			echo '</span>';
			if (is_single()) {
			echo '<span class="text2">';
				the_title();
			echo '</span>';
			}
		} elseif (is_page()) {
			echo '<span class="text2">';
			echo the_title();
			echo '</span>';
		}
		echo '</div>
		        </div>
		    </div>
		</div>';
	}
	elseif (is_tag()) {single_tag_title();}
	elseif (is_day()) {echo" Archive for "; the_time('F jS, Y');}
	elseif (is_month()) {echo" Archive for "; the_time('F, Y'); }
	elseif (is_year()) {echo" Archive for "; the_time('Y'); }
	elseif (is_author()) {echo" Author Archive"; }
	elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "Blog Archives"; }
	elseif (is_search()) {echo" Search Results"; }
}
function crunchify_disable_comment_url($fields) { 
    unset($fields['url']);
    return $fields;
}
add_filter('comment_form_default_fields','crunchify_disable_comment_url');
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
