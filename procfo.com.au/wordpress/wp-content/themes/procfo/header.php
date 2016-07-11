<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package procfo
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Procfo Page</title>

<!-- Bootstrap CSS -->

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<section class="wapper">
		<div class="container-fluid">
			<header id="site-header">
				<div class="container-header" style="background:url('<?php header_image(); ?>') center center no-repeat;    background-size: cover;">
					<div class="logo">
						<?php $img_logo = get_field('logo_header','options' ); // get all the rows
						if ( $img_logo ) : 
							$img_url = $img_logo ? $img_logo : '' ;
							?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<img src="<?php echo $img_url; ?>" alt="">
							</a>
							<?php else:?>
							<img src="" alt="">
							<?php endif; ?>
					</div>
					<div class="container content">
						<div class="box-btn">
							<?php
								if( have_rows('button_on_header','options')):
								$rows = get_field('button_on_header','options' ); // get all the rows
								$first_row = $rows[0]; // get the first row
								$text_btn_1 = $first_row['text_btn_1'] ? $first_row['text_btn_1'] : '' ; 
								$text_btn_1_mobile = $first_row['text_btn_1_mobile'] ? $first_row['text_btn_1_mobile'] : '' ; 
								$link_btn_1 = $first_row['link_btn_1'] ? $first_row['link_btn_1'] : '' ; 
								$text_btn_2 = $first_row['text_btn_2'] ? $first_row['text_btn_2'] : '' ; 
								$text_btn_2_mobile = $first_row['text_btn_2_mobile'] ? $first_row['text_btn_2_mobile'] : '' ; 
								$link_btn_2 = $first_row['link_btn_2'] ? $first_row['link_btn_2'] : '' ; 
								endif;
							?>
							<a class="btn btn-1" href="<?php echo $link_btn_1;?>" mobi="<?php echo $text_btn_1_mobile;?>"><?php echo $text_btn_1;?></a>
							<a class="btn btn-2" href="<?php echo $link_btn_2;?>" mobi="<?php echo $text_btn_2_mobile;?>" ><?php echo $text_btn_2;?></a>
							<button type="button" class="navbar-toggle">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
							</button>
						</div>
					</div>
				</div>
				<nav class="navbar navbar-default" role="navigation">
					<div class="content">
						<!-- Brand and toggle get grouped for better mobile display -->
				
						<!-- Collect the nav links, forms, and other content for toggling -->
						<?php    /**
						* Displays a navigation menu
						* @param array $args Arguments
						*/
						$args = array(
							'theme_location' => 'primary',
							'container' => 'div',
							'container_class' => 'navbar-collapse',
							'menu_class' => 'nav navbar-nav navbar-right',
							'menu_id' => '',
							'items_wrap' => '<ul id = "%1$s" class = "%2$s">%3$s</ul>'
						);
					
						wp_nav_menu( $args );?>
					</div>
				</nav>	
			</header>	