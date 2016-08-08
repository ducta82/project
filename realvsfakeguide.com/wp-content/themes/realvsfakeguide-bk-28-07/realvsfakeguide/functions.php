<?php
if ( ! function_exists( 'realvsfaceguild_setup' ) ) :

function realvsfaceguild_setup() {
	load_theme_textdomain( 'realvsfaceguild', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );	
    register_nav_menus(
        array(
                'main-nav' => 'Main Menu',
                'mobile_menu' => 'Mobile Menu',
                'footer-nav' => 'Footer menu'
        )
    );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );	
	add_theme_support( 'custom-background', apply_filters( 'realvsfaceguild_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );	
	//add_image_size( 'blogsize', 300, 300, true );
	
}
endif;
add_action( 'after_setup_theme', 'realvsfaceguild_setup' );

function realvsfaceguild_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'realvsfakeguide' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'realvsfakeguide' ),
		'before_widget' => '<div id="%1$s" class="right_content %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'realvsfaceguild_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
}

function realvsfaceguild_scripts() {
	wp_enqueue_style( 'realvsfakeguide-style', get_stylesheet_uri() );    
    wp_register_style( 'main-style', get_template_directory_uri() . "/style.css", 'all' );
	wp_enqueue_style('main-style');
	wp_register_style( 'resposive-style', get_template_directory_uri() . "/css/responsive.css", 'all' );
	wp_enqueue_style('resposive-style');
    wp_register_style( 'css-popup-style', get_template_directory_uri() . "/css/css-popup.css", 'all' );
	wp_enqueue_style('css-popup-style');
    wp_register_style( 'font-awesome.min-style', get_template_directory_uri() . "/css/font-awesome.min.css", 'all' );
	wp_enqueue_style('font-awesome.min-style');
    wp_register_style( 'jquery.bxslider-style', get_template_directory_uri() . "/css/jquery.bxslider.css", 'all' );
	wp_enqueue_style('jquery.bxslider-style');
    wp_register_style( 'slick-style', get_template_directory_uri() . "/css/slick.css", 'all' );
	wp_enqueue_style('slick-style');
    wp_register_style( 'slick-theme-style', get_template_directory_uri() . "/css/slick-theme.css", 'all' );
	wp_enqueue_style('slick-theme-style');
    
    // Custom script
	wp_register_script( 'custom-script', get_template_directory_uri() . "/js/custom.js", array('jquery') );
	wp_enqueue_script('custom-script');
	wp_register_script( 'jquery.bxslider.min-script', get_template_directory_uri() . "/js/jquery.bxslider.min.js", array('jquery') );
	wp_enqueue_script('jquery.bxslider.min-script');
    wp_register_script( 'jquery.popup-script', get_template_directory_uri() . "/js/jquery.popup.js", array('jquery') );
	wp_enqueue_script('jquery.popup-script');
    wp_register_script( 'slick-script', get_template_directory_uri() . "/js/slick.js", array('jquery') );
	wp_enqueue_script('slick-script');		
	wp_register_script( 'slick-script', get_template_directory_uri() . "/js/ajax-pagination.js", array('jquery') );
	wp_enqueue_script('slick-script');    	
}
add_action( 'wp_enqueue_scripts', 'realvsfaceguild_scripts' );

function bttop_script() {
    echo "
        <script>
            $(window).load(function() {
        	 $(window).scroll(function() {
        	 if ($(this).scrollTop() != 0) {
        	 $('#bttop').fadeIn();
        	 } else {
        	 $('#bttop').fadeOut();
        	 }
        	 });
        	 $('#bttop').click(function() {
        	 $('body,html').animate({
        	 scrollTop: 0
        	 }, 800);
        	 });
        	});
        </script>
        <script>
            $(window).load(function() {
              $('.slider1').bxSlider({
                slideWidth: 262,
                minSlides: 1,
                maxSlides: 4,
                captions: true,
                auto: true,
                moveSlides: 1,
                slideMargin: 30          
              });
            });
        </script>
        
    ";
}
add_action('wp_head', 'bttop_script');

function slider_style() {
    echo "
        <style>
            .bx-wrapper .bx-caption span{
                color: #fff;
            	font-family: Arial;
            	display: block;
            	font-size: 14px;
            	padding: 20px;
                font-weight: bold;
            }
            .bx-wrapper .bx-caption{
                background: rgba(0, 0, 0, 0.5);
            }
            .bx-wrapper .bx-viewport{
                -moz-box-shadow: 0 0 0px #ececec;
                -webkit-box-shadow: 0 0 0px #ececec; 
                box-shadow: 0 0 0px #ccc; 
                border: 0px solid #ececec; 
                left: 0px; 
                background: #ececec; 
                -webkit-transform: translatez(0); 
                -moz-transform: translatez(0);
                -ms-transform: translatez(0);
                -o-transform: translatez(0);
                transform: translatez(0);     
            }
            .bx-wrapper{
                padding-top: 30px;
                padding-bottom: 30px;
            }
            .bx-wrapper .bx-pager{
                display: none;
            }
            .bx-wrapper .bx-next {
                right: -60px;
                
            }
            .bx-wrapper .bx-prev {
                left: -60px;
               
            }
            .bx-wrapper .bx-controls-direction a{
                height: 46px;
            }
            .bx-wrapper img {			    
			    height: 220px;
			}
        </style>
    ";
}
add_action('wp_head', 'slider_style');

function wpdocs_custom_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

/***Comments***/
function raynoblog_change_submit_comment( $defaults ) {
    $defaults['label_submit'] = 'SUBMIT';
    return $defaults;
}
add_filter( 'comment_form_defaults', 'raynoblog_change_submit_comment' );

add_filter( 'comment_form_defaults', 'rayno_comment_form_args' );
function rayno_comment_form_args($defaults) {
    global $user_identity, $id;
    $commenter = wp_get_current_commenter();
    $req       = get_option( 'require_name_email' );
    $aria_req  = ( $req ? ' aria-required="true"' : '' );
    $author = 	'<div class="contact-icon-name">'.
    			'<img class="icon-name" src="http://realvsfakeguide.onegovn.com/wp-content/uploads/2016/07/contact-icon-name.png">' .
              	'<input id="author" name="author" type="text" class="form_contact_name" placeholder="Your name" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" tabindex="1"' . $aria_req . '/>' . 
             	'</div>';
    $email = 	'<div class="contact-icon-mail">'.
    			'<img class="icon-mail" src="http://realvsfakeguide.onegovn.com/wp-content/uploads/2016/07/contact-icon-mail.png">' .
             	'<input id="email" name="email" type="text" class="form_contact_mail" placeholder="Your email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" tabindex="2"' . $aria_req . ' />' .            
 				'</div>';
    $comment_field = 	
    				'<textarea id="comment" name="comment" class="form" placeholder="Massage" tabindex="4" aria-required="true"></textarea>' .
                	'</br>';     
    $args = array(
        'fields' => array(
        'author' => $author,
        'email'  => $email,),
        'comment_field'        => $comment_field,
        'title_reply'          => __( 'COMMENTS'),
        'comment_notes_before' => '',
        'comment_notes_after'  => '',
    );
    $args = wp_parse_args( $args, $defaults );
    return apply_filters( 'raynoblog_comment_form_args', $args, $user_identity, $id, $commenter, $req, $aria_req );
}


function get_all_post_home_loop( $query ) {
    if ( is_home() && $query->is_main_query() )
        $query->set( 'post_type', array( 'post', 'download', 'portfolio', 'ten-post-type') );
    return $query;
}
add_filter( 'pre_get_posts', 'get_all_post_home_loop' );


if ( ! function_exists( 'wplift_pagination' ) ) { 
	function wplift_pagination() { 
		global $wp_query; 
		$big = 999999999; 
		echo '<div class="page_nav">'; 
		echo paginate_links( 
		array( 
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ), 
		'format' => '?paged=%#%', 'current' => max( 1, get_query_var('paged') ), 
		'total' => $wp_query->max_num_pages ) ); 
		echo '</div>'; 
	} 
}
