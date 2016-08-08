<?php
if ( ! function_exists( 'realvsfaceguild_setup' ) ) :

function realvsfaceguild_setup() {
	load_theme_textdomain( 'realvsfaceguild', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
    add_image_size( 'custom-size', 360, 250,  array( 'left', 'top' ) );
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
    global $wp_query;
    wp_enqueue_style( 'css-popup-style', get_template_directory_uri() . "/css/css-popup.css",false,'1.1', 'all' );
    wp_enqueue_style( 'font-awesome.min-style', get_template_directory_uri() . "/css/font-awesome.min.css",false,'1.1', 'all' );
    wp_enqueue_style( 'jquery.bxslider-style', get_template_directory_uri() . "/css/jquery.bxslider.css",false,'1.1', 'all' );
    wp_enqueue_style( 'slick-style', get_template_directory_uri() . "/css/slick.css",false,'1.1', 'all' );
    wp_enqueue_style( 'slick-theme-style', get_template_directory_uri() . "/css/slick-theme.css",false,'1.1', 'all' );

    wp_enqueue_style( 'bootstap', get_template_directory_uri() . "/css/bootstrap.min.css",false,'1.1', 'all' );

    wp_enqueue_style( 'realvsfakeguide-style', get_stylesheet_uri() );  
    
    wp_enqueue_style( 'resposive-style', get_template_directory_uri() . "/css/responsive.css",false,'1.1', 'all' );
    // Custom script
	wp_register_script( 'jquery.bxslider.min-script', get_template_directory_uri() . "/js/jquery.bxslider.min.js", array('jquery') );
	wp_enqueue_script('jquery.bxslider.min-script');
    wp_register_script( 'jquery.popup-script', get_template_directory_uri() . "/js/jquery.popup.js", array('jquery') );
	wp_enqueue_script('jquery.popup-script');
    wp_register_script( 'slick-script', get_template_directory_uri() . "/js/slick.js", array('jquery') );
	wp_enqueue_script('slick-script');		
	wp_register_script( 'slick-script', get_template_directory_uri() . "/js/ajax-pagination.js", array('jquery') );
	wp_enqueue_script('slick-script');    
    wp_register_script( 'bootstrap-script', get_template_directory_uri() . "/js/bootstrap.min.js", array('jquery') );
    wp_enqueue_script('bootstrap-script');    
    wp_register_script( 'custom-script', get_template_directory_uri() . "/js/custom.js", array('jquery') );
    wp_enqueue_script('custom-script');
    wp_localize_script( 'custom-script', 'ajax_object', array(
        'ajax_url' => admin_url( 'admin-ajax.php' ),
        'query_vars' => json_encode( $wp_query->query )
    ));	
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
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
                width: 22px;
            }
            .bx-wrapper img {			    
			    height: 220px;
			}
        </style>
    ";
}
add_action('wp_head', 'slider_style');

/*function wpdocs_custom_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );*/

function the_excerpt_max_charlength($charlength) {
    $excerpt = get_the_excerpt();
    $charlength++;

    if ( mb_strlen( $excerpt ) > $charlength ) {
        $subex = mb_substr( $excerpt, 0, $charlength - 5 );
        $exwords = explode( ' ', $subex );
        $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
        if ( $excut < 0 ) {
            echo mb_substr( $subex, 0, $excut );
        } else {
            echo $subex;
        }
        echo '...';
    } else {
        echo $excerpt;
    }
}
function the_title_max_charlength($charlength) {
    $title = get_the_title();
    $charlength++;

    if ( mb_strlen( $title ) > $charlength ) {
        $subex = mb_substr( $title, 0, $charlength - 5 );
        $exwords = explode( ' ', $subex );
        $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
        if ( $excut < 0 ) {
            echo mb_substr( $subex, 0, $excut );
        } else {
            echo $subex;
        }
        echo '...';
    } else {
        echo $title;
    }
}
/***Comments***/
function raynoblog_change_submit_comment( $defaults ) {
    $defaults['label_submit'] = 'SUBMIT';
    return $defaults;
}
add_filter( 'comment_form_defaults', 'raynoblog_change_submit_comment' );

add_filter( 'comment_form_defaults', 'rayno_comment_form_args' );
function rayno_comment_form_args($defaults) {
    global $user_identity, $id;
   /* $commenter = wp_get_current_commenter();
    $req       = get_option( 'require_name_email' );
    $aria_req  = ( $req ? ' aria-required="true"' : '' );
    $author = 	'<div class="contact-icon-name">'.
    			'<img class="icon-name" src="http://realvsfakeguide.onegovn.com/wp-content/uploads/2016/07/contact-icon-name.png">' .
              	'<input id="author" name="author" type="text" class="form_contact_name" placeholder="Your name" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" tabindex="1"' . $aria_req . '/>' . 
             	'</div>';
    $email = 	'<div class="contact-icon-mail">'.
    			'<img class="icon-mail" src="http://realvsfakeguide.onegovn.com/wp-content/uploads/2016/07/contact-icon-mail.png">' .
             	'<input id="email" name="email" type="text" class="form_contact_mail" placeholder="Your email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" tabindex="2"' . $aria_req . ' />' .            
 				'</div>';*/
    $comment_field = '<textarea id="comment" name="comment" class="form" placeholder="Comment" tabindex="4" aria-required="true"></textarea>';     
    $args = array(
        'comment_field'        => $comment_field,
        'title_reply'          => __( 'SUBMIT A COMMENT'),
        'comment_notes_before' => '',
        'comment_notes_after'  => '',
    );
    $args = wp_parse_args( $args, $defaults );
    return apply_filters( 'raynoblog_comment_form_args', $args, $user_identity, $id, $commenter, $req, $aria_req );
}
function custom_comment_form_fields($fields){
    $commenter = wp_get_current_commenter();
    $req       = get_option( 'require_name_email' );
    $aria_req  = ( $req ? ' aria-required="true"' : '' );
    unset($fields['url']);
    $fields['author'] = '<div class="contact-icon-name"><input id="author" name="author" type="text" class="form_contact_name" placeholder="Your name" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" tabindex="1"' . $aria_req . '/></div>';
    $fields['email'] = '<div class="contact-icon-mail"><input id="email" name="email" type="text" class="form_contact_mail" placeholder="Your email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" tabindex="2"' . $aria_req . ' /></div>';
    return $fields;
}
add_filter('comment_form_default_fields','custom_comment_form_fields');    

function wpb_move_comment_field_to_bottom( $fields ) {
$comment_field = $fields['comment'];
unset( $fields['comment'] );
$fields['comment'] = $comment_field;
return $fields;
}
add_filter( 'comment_form_fields', 'wpb_move_comment_field_to_bottom' );

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
/************** Share Social ****************/
function ButtonShare() {
// Get current page URL 
    $post_id = get_the_id();
    $crunchifyURL = str_replace( ' ', '%20', get_permalink());
    // Get current page title
    $crunchifyTitle = str_replace( ' ', '%20', get_the_title());
    // Get Post Thumbnail for pinterest
    $thumbnail_id = get_post_thumbnail_id( $post_id );
    $crunchifyThumbnail = wp_get_attachment_image_src( $thumbnail_id, 'full' );
    // Construct sharing URL without using any script
    $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$crunchifyURL;
    $googleURL = 'https://plus.google.com/share?url='.$crunchifyURL;
    $twitterURL = 'https://twitter.com/intent/tweet?text='.$crunchifyTitle.'&amp;url='.$crunchifyURL.'&amp;via=Crunchify';
    $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$crunchifyURL.'&amp;media='.$crunchifyThumbnail[0].'&amp;description='.$crunchifyTitle;
    ?>
    <div class="guild_item_action_social">  
        <p><span>Share: </span> 
        <a href="http://www.facebook.com/sharer.php?u=<?php echo $crunchifyURL;?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="share-fb">
       <i class="fa fa-facebook" aria-hidden="true"></i>
        </a>
        <a href="https://twitter.com/intent/tweet?text=<?php echo $crunchifyURL;?>&amp;url=<?php echo $crunchifyURL;?>&amp;via=Crunchify" onclick="javascript:window.open(this.href,
        '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"class="share-twitter"><i class="fa fa-twitter" aria-hidden="true"></i>
        <a href="https://plus.google.com/share?url=<?php echo $crunchifyURL;?>" onclick="javascript:window.open(this.href,
          '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"class="share-google"><i class="fa fa-google-plus" aria-hidden="true"></i>
        <a href="https://pinterest.com/pin/create/button/?url=<?php echo $crunchifyURL;?>&amp;media=<?php echo $crunchifyThumbnail[0];?>&amp;description=<?php echo$crunchifyTitle; ?>" onclick="javascript:window.open(this.href,
        '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"class="share-google"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
    </div>
    <?php
}
// count share social
/************************/
//facebook

function getFacebookDetails(){
$url = get_permalink();
$rest_url = "http://api.facebook.com/restserver.php?format=json&method=links.getStats&urls=".urlencode($url);
$json = json_decode(file_get_contents($rest_url),true);
return $json;
}

class socialNetworkShareCount{

    public $shareUrl;
    public $socialCounts = array();
    public $facebookShareCount = 0;
    public $twitterShareCount = 0;
    public $pinterestShareCount = 0;
    public $googlePlusOnesCount = 0;


    public function __construct($options){

        if(is_array($options)){
            if(array_key_exists('url', $options) && $options['url'] != ''){
                $this->shareUrl = $options['url'];
            }else{
                die('URL must be set in constructor parameter array!');
            }

            // Get Facebook Shares and Likes
            if(array_key_exists('facebook', $options)){
                $this->getFacebookShares();
            }

           /* // Get Twitter Shares
            if(array_key_exists('twitter', $options)){
                $this->getTwitterShares();
            }*/

            // Get Twitter Shares
            if(array_key_exists('pinterest', $options)){
                $this->getPinterestShares();
            }

            // Get Twitter Shares
            if(array_key_exists('google', $options)){
                $this->getGooglePlusOnes();
            }


        }elseif(is_string($options) && $options != ''){
            $this->shareUrl = $options;

            // Get all Social Network share counts if they are not set individually in the options
            $this->getFacebookShares();
            $this->getTwitterShares();
            $this->getPinterestShares();
            $this->getGooglePlusOnes();

        }else{
            die('URL must be set in constructor parameter!');
        }
    }


    public function getShareCounts(){
        $totalShares = $this->getTotalShareCount($this->socialCounts);
        $this->socialCounts['total'] = $totalShares;
        return json_encode($this->socialCounts);
    }

    public function getTotalShareCount(array $shareCountsArray){
        return array_sum($shareCountsArray);
    }


    public function getFacebookShares(){
        $api = file_get_contents( 'http://graph.facebook.com/?id=' . $this->shareUrl );
        $count = json_decode( $api );
        if(isset($count->shares) && $count->shares != '0'){
            $this->facebookShareCount = $count->shares;
        }
        $this->socialCounts['facebookshares'] = $this->facebookShareCount;
        return $this->facebookShareCount;
    }


   /* public function getTwitterShares(){
        $api = file_get_contents( 'https://api.twitter.com/1.1/search/tweets.json?q=' . $this->shareUrl );
        $count = json_decode( $api );
        if(isset($count->count) && $count->count != '0'){
            $this->twitterShareCount = $count->count;
        }
        $this->socialCounts['twittershares'] = $this->twitterShareCount;
        return $this->twitterShareCount;
    }*/


    public function getPinterestShares(){
        $api = file_get_contents( 'http://api.pinterest.com/v1/urls/count.json?callback%20&url=' . $this->shareUrl );
         $body = preg_replace( '/^receiveCount\((.*)\)$/', '\\1', $api );
         $count = json_decode( $body );
         if(isset($count->count) && $count->count != '0'){
            $this->pinterestShareCount = $count->count;
         }
         $this->socialCounts['pinterestshares'] = $this->pinterestShareCount;
         return $this->pinterestShareCount;
    }

    public function getGooglePlusOnes(){

        if(function_exists('curl_version')){

            $curl = curl_init();
            curl_setopt( $curl, CURLOPT_URL, "https://clients6.google.com/rpc" );
            curl_setopt( $curl, CURLOPT_POST, 1 );
            curl_setopt( $curl, CURLOPT_POSTFIELDS, '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"' . $this->shareUrl . '","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]' );
            curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
            curl_setopt( $curl, CURLOPT_HTTPHEADER, array( 'Content-type: application/json' ) );
            $curl_results = curl_exec( $curl );
            curl_close( $curl );
            $json = json_decode( $curl_results, true );
            $this->googlePlusOnesCount = intval( $json[0]['result']['metadata']['globalCounts']['count'] );

        }else{

            $content = file_get_contents("https://plusone.google.com/u/0/_/+1/fastbutton?url=".urlencode($_GET['url'])."&count=true");
            $doc = new DOMdocument();
            libxml_use_internal_errors(true);
            $doc->loadHTML($content);
            $doc->saveHTML();
            $num = $doc->getElementById('aggregateCount')->textContent;

            if($num){
                $this->googlePlusOnesCount = intval($num);
            }
        }

        $this->socialCounts['googleplusones'] = $this->googlePlusOnesCount;
        return $this->googlePlusOnesCount;
    }

}
//ajax category

add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax'); 
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');
function more_post_ajax(){
    $paged = isset($_POST["paged"]) ? $_POST["paged"] : 1;
    $cat = isset($_POST["cat"]) ? $_POST["cat"]: '';
    $key = isset($_POST["key"]) ? $_POST["key"]: '';
    header("Content-Type: text/html");
    if(is_search()){
        $args = array(
            's' => $key,
            'paged' => $paged,
            );
         //$wp_query = new WP_Query($args);
        query_posts( $args );
            if ( have_posts() ) :          
                while ( have_posts() ) : the_post(); ?>                  
                <div class="fashion_post_content">
                  <div class="post_thumbnail" style="background:url(<?php the_post_thumbnail_url(); ?>)center center no-repeat;background-size:cover;">                
                    <a href="<?php the_permalink();?>"><!-- <?php the_post_thumbnail();?> --></a>
                  </div>
                  <div class="fashion_text">
                    <h4><a href="<?php the_permalink();?>"><?php the_title_max_charlength(50); ?></a></h4>
                    <div class="guild_item_author">
                                 <?php
                        $url = get_permalink();
                                      $socialCounts = new socialNetworkShareCount(array(
                                          'url' => $url,
                                          'facebook' => true,/*
                                          'twitter' => true,
    */                                      'pinterest' => true,
                                          'linkedin' => true,
                                          'google' => true
                                      ));
                                      $total = json_decode($socialCounts->getShareCounts());?>
                                   <a>by <?php the_author(); ?></a>
                                   <?php the_category(', '); ?>
                                   <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?>
                                   <a><?php echo $total->total.' share';?></a>
                                 </div>     
                    <p><?php the_excerpt_max_charlength(200);  ?></p>
                    <div class="guild_item_action">               
                      <a href="<?php the_permalink();?>" class="btn_readmore_guild_item">read more</a>
                      <?php echo ButtonShare();?>                  
                    </div>
                  </div>
                </div>
                <?php endwhile;
            endif;
    }else{
        $query_vars = json_decode( stripslashes( $_POST['query_vars'] ), true );
        $query_vars['paged'] = $paged;
        $query_vars['post_status'] = 'publish';
        $posts = new WP_Query( $query_vars );
        $GLOBALS['wp_query'] = $posts;
        /*$arg = array(
            'cat'=> $cat,
            'post_status'=> 'publish',
            'paged'=> $paged
            );
        query_posts( $arg );*/
        if ( have_posts() ) {
            while ( have_posts() ) : the_post();
                ?>
                    <div class="fashion_post_content">
                        <div class="post_thumbnail" style="background:url(<?php the_post_thumbnail_url(); ?>)center center no-repeat;background-size:cover;">                            
                            <a href="<?php the_permalink();?>"><?php //the_post_thumbnail();?></a>
                        </div>
                        <div class="fashion_text">
                            <h4><a href="<?php the_permalink();?>"><?php the_title_max_charlength(50); ?></a></h4>
                            <div class="guild_item_author">
                                <?php
                                    $url = get_permalink();
                                    $socialCounts = new socialNetworkShareCount(array(
                                        'url' => $url,
                                        'facebook' => true,/*
                                        'twitter' => true,*/
                                        'pinterest' => true,
                                        'linkedin' => true,
                                        'google' => true
                                    ));
                                    $total = json_decode($socialCounts->getShareCounts());
                                ?>
                                <a>by <?php the_author(); ?></a>
                                <?php the_category(', ') ?>
                                <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?>
                               <a><?php echo $total->total.' share';?></a>
                             </div>         
                            <p><?php the_excerpt_max_charlength(200);  ?></p>                       
                            <div class="guild_item_action">                         
                                <a href="<?php the_permalink();?>" class="btn_readmore_guild_item">read more</a>
                                <?php echo ButtonShare();?>                         
                            </div>
                        </div>
                    </div>
                <?php
            endwhile;
        } else {
            echo '<p class="not-found">'.__( 'No products found' ).'</p>';
        }
    }
    exit; 
}
//Comment 
/**
 * Theme comment
 */
function mytheme_comment($comment, $args, $depth) {
     $GLOBALS['comment'] = $comment;
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
    ?>
    <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?> style="">
    <?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>
    <div class="comment-author vcard">
        <div class="avatar-user">
            <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
        </div>
        <div class="cmt-text">
            <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
                <?php
                /* translators: 1: date, 2: time */
                printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)' ), '  ', '' );
                ?>
            </div>
            <?php printf( __( '<cite class="fn">%s</cite>' ), get_comment_author_link() ); ?>
            <?php comment_text(); ?>
            <div class="reply">
                <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
            </div>
        </div>
     </div>
    <?php if ( $comment->comment_approved == '0' ) : ?>
         <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.','justresidential-com-au' ); ?></em>
          <br />
    <?php endif; ?>
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif;
    }