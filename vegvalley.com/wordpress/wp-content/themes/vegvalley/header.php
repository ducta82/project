<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vegvalley
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="icon" type="image/png" href="http://vegvalley.local/wp-content/uploads/2016/07/favicon.png" />
<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<div id="wapper">
	<header id="site-header">
		<div class="header-bar">
				<section class="content container">
					<div class="left-bar">
						<p class="note-text">Free economy shipping on orders over $100.00</p>
					</div>
					<div class="right-bar">
						<div class="right-bar-content">
							<p class="user-login">Welcome Guest<a href="#" class="login">(Log In)</a>
							</p>
							<p class="cart">
								<a href="#" class="sl">(0)</a>Cart: $0.00
							</p>
						</div>
					</div>
				</section>
			</div><!-- end header bar-->
		<section class="content container">
			<nav class="navbar " role="navigation">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle">
							<i class="fa fa-bars" aria-hidden="true"></i>
						</button>
						<a class="logo" href="#"><img src="<?php echo bloginfo( 'template_url' );?>/images/logo.png" class="img-responsive" alt="Image"></a>
					</div>
			
					<!-- Collect the nav links, forms, and other content for toggling -->
					<?php
						   /**
							* Displays a navigation menu
							* @param array $args Arguments
							*/
							$args = array(
								'theme_location' => 'primary',
								'menu' => '',
								'container' => 'div',
								'container_class' => 'collapse navbar-collapse',
								'menu_class' => 'nav navbar-nav navbar-right',
								'before' => '',
								'after' => '',
								'items_wrap' => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
								'walker' => ''
							);
						
							wp_nav_menu( $args );
					?>
				 <form action="" method="get" class="navbar-form box-search">
                    <div class="input-group seach-header">
                        <input name="s" value="" type="text" placeholder="search..." class="form-seach-header">
                    </div>
                </form>
			</nav>
		</section>
	</header>
	<?php if(is_front_page() && is_home()):
		if( have_rows('slider','options')):
			$rows = get_field('slider','options' ); // get all the rows
			$i = 1;
			$j = 1;
	?>

	<section class="slide">
		<div id="slider" class="nivoSlider">     
			<?php foreach ($rows as $item) {
				$div_end = $i == $max ? '</div>' : '';
				$image = sprintf('%s','<img src="'.$item['image_slider']['url'].'" alt="'.$item['image_slider']['alt'].'" title="#htmlcaption'.$i.'"/>');
				echo $image;
		    	$i++;	
		    } ?>
		    </div>  
		    <?php foreach ($rows as $item) {
		    	$id = "htmlcaption$j";
		    	$caption = sprintf('%s','<div id="'.$id.'" class="nivo-html-caption">
		    		<div class="box-top-caption"><p class="top-caption">welcome to</p></div>
				    <h2>veg valley</h2>
				    <p class="bottom-caption">Pellentesque habitant morbi tristique senectus et netus
					et malesuada fames ac turpis egestas.</p></div>');
		    	echo $caption;
		    	$j++;	
		    } ?>  
	</section>
	<?php endif;?>
	<section class="main">
	<?php endif; ?>	