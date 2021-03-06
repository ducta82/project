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

	wp_localize_script( 'vegvalley-customjs', 'ajax_object', array(
	 
	        // Các phương thức sẽ sử dụng
	        'ajax_url' => admin_url( 'admin-ajax.php' ),
	        'base' =>get_site_url()      
	));

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

function the_breadcrumb() {
		echo '<nav class="vegvalley_breadcrumb">';
	if (!is_home()) {
		echo '<a href="';
		echo get_option('home');
		echo '">';
		echo 'Home';
		echo "</a>";
		if (is_category() || is_single()) {
			echo '&nbsp;/&nbsp;';
			the_category();
			if (is_single()) {
				echo "&nbsp;/&nbsp;";
				the_title();
			}
		} elseif (is_page()) {
			echo '&nbsp;/&nbsp;';
			echo the_title();
		}
	}
	elseif (is_tag()) {single_tag_title();}
	elseif (is_day()) {echo" Archive for "; the_time('F jS, Y');}
	elseif (is_month()) {echo" Archive for "; the_time('F, Y'); }
	elseif (is_year()) {echo" Archive for "; the_time('Y'); }
	elseif (is_author()) {echo" Author Archive"; }
	elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "Blog Archives"; }
	elseif (is_search()) {echo" Search Results"; }
	
}

/*
*
*	CUSTOM WOOCOMERCE
*/

//warp start
add_action('woocommerce_before_main_content', 'vegvalley_wrapper_start', 10);
function vegvalley_wrapper_start() {
  echo '<section class="wc-products page-wc-product">';
}
add_action('woocommerce_after_main_content', 'vegvalley_wrapper_end', 5);
function vegvalley_wrapper_end() {
  echo '</section>';
}
//loop
function woocommerce_product_loop_start(){
    echo '<div class="content container">';
}
function woocommerce_product_loop_end(){
    echo '</div></div>';
}
//single item
function wo_before_single_content()
{
	echo '<div class="content container">';
}
add_action('woocommerce_before_single_product', 'wo_before_single_content', 15 );

function wo_after_single_content()
{
	echo '</div>';
}
add_action('woocommerce_after_single_product', 'wo_after_single_content', 20 );

// item product
function vegvalley_template_loop_product_link_open() {
    echo '<div class="product-image"><a href="' . get_the_permalink() . '" class="woocommerce-LoopProduct-link">';
}
add_action( 'woocommerce_before_shop_loop_item', 'vegvalley_template_loop_product_link_open', 5 );
/**
 * Insert the opening anchor tag for products in the loop.
 */
function vegvalley_template_loop_product_link_close() {
    echo '</a></div><div class="product-content">';
}
add_action( 'woocommerce_before_shop_loop_item_title', 'vegvalley_template_loop_product_link_close', 15 );
function vegvalley_woocommerce_after_shop_loop_item() {
    echo '</div>';
}
add_action( 'woocommerce_after_shop_loop_item', 'vegvalley_woocommerce_after_shop_loop_item', 30 );
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
		<small class="rule left"></small>
		<h1 class="page-title"><?php woocommerce_page_title(); ?></h1> 
		<small class="rule right"></small>
		<?php
		}else{
			if ( $product_cats && ! is_wp_error ( $product_cats ) ){
			 		$single_cat = array_shift( $product_cats ); 
			 		if(!is_single()){
			 			?>
							<small class="rule left"></small>
							<h1 class="product_category_title"><?php echo $single_cat->name; ?></h1>
							<small class="rule right"></small>
			 			<?php
			 		}else{
			 			?>
							<small class="rule left"></small>
							<h1 class="product_category_title"><?php echo get_the_title(); ?></h1>
							<small class="rule right"></small>
			 			<?php	
			 		}
			 	?>
			<?php }
			else{
		 			?>
						<small class="rule left"></small>
						<h1 class="product_category_title"><?php echo get_the_title(); ?></h1>
						<small class="rule right"></small>
		 			<?php	
		 		}
		}
	endif; 
}
add_action( 'woocommerce_before_main_content', 'woo_show_page_title', 15 );
function woo_show_page_title_before_breadcrumb()
{
	echo '</div></div>';
}
add_action('woocommerce_before_main_content', 'woo_show_page_title_before_breadcrumb', 21  );

//share product
function crunchify_social_sharing_buttons() {
		// Get current page URL 
		$crunchifyURL = str_replace( ' ', '%20', get_permalink());
		// Get current page title
		$crunchifyTitle = str_replace( ' ', '%20', get_the_title());
		// Get Post Thumbnail for pinterest
		$crunchifyThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
		// Construct sharing URL without using any script
		$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$crunchifyURL;
		$googleURL = 'https://plus.google.com/share?url='.$crunchifyURL;
 
		// Add sharing button at the end of page/page content
		?>
		 <div class="wc-social">
 			<span>Share: </span>
			<a href="http://www.facebook.com/sharer.php?u=<?php echo $crunchifyURL;?>" onclick="javascript:window.open(this.href,
			  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="share-fb">
		        <img src="<?php echo bloginfo('template_url');?>/images/facebook.png" alt="Facebook" />
		    </a>
			<a href="https://plus.google.com/share?url=<?php echo $crunchifyURL;?>" onclick="javascript:window.open(this.href,
			  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"class="share-google"><img
			  src="<?php echo bloginfo('template_url');?>/images/google-plus.png" alt="Share on Google+"/></a>
		</div>
		<?php
}
add_action( 'woocommerce_share', 'crunchify_social_sharing_buttons');
//wistlist + share
function ButtonProduct() {
// Get current page URL 
	$crunchifyURL = str_replace( ' ', '%20', get_permalink());
	// Get current page title
	$crunchifyTitle = str_replace( ' ', '%20', get_the_title());
	// Get Post Thumbnail for pinterest
	$crunchifyThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
	// Construct sharing URL without using any script
	$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$crunchifyURL;
	$googleURL = 'https://plus.google.com/share?url='.$crunchifyURL;
	?>
	<div class="product-buttons">	
		<div class="box-product-buttons">
			<?php echo do_shortcode('[yith_wcwl_add_to_wishlist icon="fa fa-heart" link_classes="wishlist" already_in_wishslist_text="<a href="#" class="wishlist"><i class="fa fa-heart" aria-hidden="true"></i></a>"]' ); ?>
			<div class="box-share-social">
				<a href="#" class="share-product"><i class="fa fa-share-alt" aria-hidden="true"></i></a>	
				<div class="wc-social social-archive-product">
				<a href="http://www.facebook.com/sharer.php?u=<?php echo $crunchifyURL;?>" onclick="javascript:window.open(this.href,
				  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="share-fb">
			        <img src="<?php echo bloginfo('template_url');?>/images/facebook.png" alt="Facebook" />
			    </a>
				<a href="https://plus.google.com/share?url=<?php echo $crunchifyURL;?>" onclick="javascript:window.open(this.href,
				  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"class="share-google"><img
				  src="<?php echo bloginfo('template_url');?>/images/google-plus.png" alt="Share on Google+"/></a>
			</div>
			</div>
	<?php
}
add_action('woocommerce_after_shop_loop_item_title','ButtonProduct', 8);
function Wc_after_shop_box_product_button()
{
	echo '</div>';
}
add_action('woocommerce_after_shop_loop_item','Wc_after_shop_box_product_button', 15);
function Wc_after_shop_product_button()
{
	echo '</div>';
}
add_action('woocommerce_after_shop_loop_item','Wc_after_shop_product_button', 25);
//product title
 function Wc_template_loop_product_title() {
        echo '<h3 class="product_title">' . get_the_title() . '</h3>';
}
add_action('woocommerce_shop_loop_item_title','Wc_template_loop_product_title',10 );
//add decription product after thumbnail
function Wc_description()
{
	global $post;
	if ( ! $post->post_excerpt ) {
		return;
	}
	?>
	<div itemprop="description" class="wc-short-description product-info">
		<?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?>
	</div>
	<?php
}
add_action('woocommerce_after_shop_loop_item_title','Wc_description', 7);

//mini cart

//shortcode for mini-cart
function vegvalley_woo_minicart($atts){  
	ob_start();
	global $woocommerce; 

	echo '<div class="cart">
			<img src="'.get_bloginfo( 'template_url' ).'/images/icon-cart.png" class="img-responsive" alt="Image1">
			<a class="cart-contents sl" href="' .  $woocommerce->cart->get_cart_url() . '" title="View your shopping cart">';
	echo sprintf(_n('(%d)', '(%d)', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count) . '</a>&nbsp;'. __("Cart:&nbsp;","woothemes") . $woocommerce->cart->get_cart_total() . '</div>';

	$x = ob_get_contents();
	ob_end_clean();
	return $x;
}
add_shortcode('vegvalley_woo_minicart','vegvalley_woo_minicart');

// Ensure cart contents update when products are added to the cart via AJAX
function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	
	ob_start();
	
	?>
	<img src="<?php echo bloginfo( 'template_url' );?>/images/icon-cart.png" class="img-responsive" alt="Image">
	<a class="cart-contents sl" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('(%d)', '(%d)', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?></a> <?php _e('Cart:&nbsp;','woothemes'); echo $woocommerce->cart->get_cart_total(); ?>
	<?php
	$fragments['div.cart'] = ob_get_clean();
	ob_get_clean();
	return $fragments;
	
}
add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
//custom paging for home page
function paginate() {
global $wp_query, $wp_rewrite;
$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
 ?>
	<?php
echo paginate_links(array(
			'base'         => @add_query_arg('page','%#%'),
			'format'       => '',
			'add_args'     => false,
			'current'      => $current,
			'total'        => $wp_query->max_num_pages,
			'prev_text'    => '&larr;',
			'next_text'    => '&rarr;',
			'type'         => 'list',
			'end_size'     => 3,
			'mid_size'     => 3
		) ) ;
?>
<?php  
if( $wp_rewrite->using_permalinks() )
    $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 'page', get_pagenum_link( 1 ) ) ) . '?page=%#%/', 'paged' );
  
if( !empty($wp_query->query_vars['s']) )
    $pagination['add_args'] = array( 's' => get_query_var( 's' ) );
  
}   
//custom ajax paging
function more_post_ajax(){
    $paged = $_POST["paged"];
    header("Content-Type: text/html");
	$args = array(
		'post_type' => 'product',
		'meta_key'     => '_featured',
        'meta_value'   => 'yes',
        'meta_compare' => '=',
		'post_status' => 'publish',
    	'paged' => $paged,
		);
	 //$wp_query = new WP_Query($args);
	query_posts( $args );
	if ( have_posts() ) {
		while ( have_posts() ) : the_post();
			wc_get_template_part( 'content', 'product' );
		endwhile;
	} else {
		echo '<p class="not-found">'.__( 'No products found' ).'</p>';
	}
    exit; 
}

add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax'); 
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');
//shortcode function
function vegvalley_function_block($atts){  
	ob_start();
	?>
		<section class="tab-site">
		<div role="tabpanel">
			<!-- Nav tabs -->
			<?php
				if( have_rows('home_function',203)):
				$rows = get_field('home_function',203); // get all the rows
				endif;
			?>
			<section class="site-tabpanel">
				<h3 class="site-top-caption">FUNCTION</h3>
				<h2>FUNCTIONS of VEG VALLEY</h2>
				<ul class="nav nav-tabs" role="tablist">
					<?php if(have_rows('home_function',203)) : 
						$i = 1; $j = 1;
						while (have_rows('home_function',203)) {
							the_row();
							$href = '#tab'.$i.'';
							$title = get_sub_field('name_function');
							$active = $i == 1 ? 'active' : '';
							$tab = sprintf('<li class="%1$s"><a href="%2$s" aria-controls="tab" role="tab" data-toggle="tab">%3$s</a></li>',$active,$href,$title);
							echo $tab;
							$i++;
						}

					?>				
				</ul>
			</section>
			<!-- Tab panes -->
			<div class="tab-content">
				<?php 
						while (have_rows('home_function',203)) {
							the_row();
							$href = 'tab'.$j.'';
							$img = get_sub_field('img_function');
							$active = $j == 1 ? 'active' : '';
							
							$tab = sprintf('<div " class="tab-pane %1$s" id="%2$s" style="
						    background: url(%3$s) center center no-repeat;
						    background-size: cover;">
									<img src="%3$s" class="img-responsive" alt="Image">
								</div>',$active,$href,$img);
							echo $tab;
							$j++;
						}
					?>
			</div>
			<?php endif;?>
		</div>
	</section><!--end tab-site-->
	<?php
	$x = ob_get_contents();
	ob_end_clean();
	return $x;
}
add_shortcode('vegvalley_function_block','vegvalley_function_block');
// ajax add wishlist
function add_to_wishlist( $array ) { 
    global $yith_wcwl;
    $return = $this->add();
    $message = '';
    $user_id = isset( $this->details['user_id'] ) ? $this->details['user_id'] : false;
    $wishlists = array();

    if( $return == 'true' ){
        $message = apply_filters( 'yith_wcwl_product_added_to_wishlist_message', get_option( 'yith_wcwl_product_added_text' ) );
    }
    elseif( $return == 'exists' ){
        $message = apply_filters( 'yith_wcwl_product_already_in_wishlist_message', get_option( 'yith_wcwl_already_in_wishlist_text' ) );
    }
    elseif( count( $this->errors ) > 0 ){
        $message = apply_filters( 'yith_wcwl_error_adding_to_wishlist_message', $this->get_errors() );
    }

    if( $user_id != false ){
        $wishlists = $this->get_wishlists( array( 'user_id' => $user_id ) );
    }

    wp_send_json(
        array(
            'result' => $return,
            'message' => $message,
            'user_wishlists' => $wishlists,
            'wishlist_url' => $this->get_wishlist_url( 'view' . ( isset( $this->last_operation_token ) ? ( '/' . $this->last_operation_token ) : false ) ),
        )
    );
}; 
         
// add the action 
add_action( 'wp_ajax_nopriv_add_to_wishlist', 'add_to_wishlist', 10, 1 ); 
add_action( 'wp_ajax_add_to_wishlist', 'add_to_wishlist', 10, 1 ); 
<<<<<<< HEAD
add_filter('woocommerce_get_discounted_price', 'new_price',10,2);
function new_price($price, $values){
	global $woocommerce;
	if(!is_user_logged_in()){return $price;}
	$user = get_current_user_id();
	$order = check_user();
	$qty = $woocommerce->cart->quantity;
	print_r($qty);
	$price = $price -5;
	return $price;
}
function check_user(){
	global $woocommerce;
	$customer_orders = get_posts( apply_filters( 'woocommerce_my_account_my_orders_query', array(
	'meta_key'    => '_customer_user',
	'meta_value'  => get_current_user_id()
	) ) );
	return $order;
=======
//quatity 
add_action( 'wp_enqueue_scripts', 'wcqi_enqueue_polyfill' );
function wcqi_enqueue_polyfill() {
    wp_enqueue_script( 'wcqi-number-polyfill' );
}

//Discount price first register
add_filter('woocommerce_get_discounted_price', 'Custom_price_new_customer', 10, 3);
/**
 * @param  $price   
 * @return $price
 */
function Custom_price_new_customer($price, $values, $instance) {
    if (!is_user_logged_in()) return $price;
    if ( ! $price ) { return $price; }
    $int = Check_user();
    //check if user has't order discount price
    if( $int<1 ) {    	
        $price = intval($price) - 5;
    }
    return $price;
}
function Check_user(){
	$user = wp_get_current_user();
	$int = wc_get_customer_order_count( $user->ID );
	return $int;
>>>>>>> 66517c172a28c004874fcdaf9dd06ffac7dbb986
}
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
