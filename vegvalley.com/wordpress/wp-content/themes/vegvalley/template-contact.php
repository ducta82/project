<?php
/*
*	template name: contact
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				?>				
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<header class="entry-header">
							<div class="head-page" style="margin:0;">
								<div class="content container">
									<small class="rule left"></small>
									<?php the_title( '<h1 class="entry-title page-title">', '</h1>' ); ?>
									<small class="rule right"></small>
									<?php the_breadcrumb(); ?>
								</div>
							</div>
						</header><!-- .entry-header -->
						<div class="container content">
							<?php
								if( have_rows('footer_info','options')):
								$rows = get_field('footer_info','options' ); // get all the rows
								$first_row = $rows[0]; // get the first row
								$phone_number = $first_row['phone_number'] ? $first_row['phone_number'] : '' ; 
								$address = $first_row['address'] ? $first_row['address'] : '' ; 
								$email_footer = $first_row['email_footer'] ? $first_row['email_footer'] : '' ; 
								endif;
							?>
							<div class="info-footer" style="margin:82px auto;">
								<div class="info-footer-item contact">
									<i class="fa fa-phone" aria-hidden="true"></i>
									<p><?php echo $phone_number;?></p>
								</div>
								<div class="info-footer-item contact">
									<i class="fa fa-map-marker" aria-hidden="true"></i>
									<p style="width: 70%;text-align: center;"><?php echo $address;?></p>
								</div>
								<div class="info-footer-item contact">
									<i class="fa fa-envelope" aria-hidden="true"></i>
									<p><?php echo $email_footer;?></p>
								</div>
							</div>
						</div>
						<div class="map-wrap">
						    <div class="overlay" onClick="style.pointerEvents='none'"></div><!-- wrap map iframe to turn off mouse scroll and turn it back on on click -->
						        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8914.873474923847!2d144.96187557344317!3d-37.81619197585389!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4a3244c84b%3A0x7d2350ea5fcf00e5!2s287+William+St%2C+Melbourne+VIC+3004%2C+%C3%9Ac!5e0!3m2!1svi!2s!4v1469009428070" width="100%" height="333" frameborder="0" style="border:0" allowfullscreen></iframe>
						</div>
						<div class="entry-content">
							<div class="container content">
								<h2 class="form-contact-title"><?php _e('GET IN TOUCH','vegvalley');?></h2>
								<?php
									the_content();

									wp_link_pages( array(
										'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'vegvalley' ),
										'after'  => '</div>',
									) );
								?>
							</div>
						</div><!-- .entry-content -->
					</article><!-- #post-## -->
				<?php

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
	
<?php
get_sidebar();
get_footer();
