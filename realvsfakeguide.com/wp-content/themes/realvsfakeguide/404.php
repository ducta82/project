<?php get_header(); ?>	
        <div id='bttop'><img src="<?php echo get_template_directory_uri();?>/images/icon-back-to-top.png"></div>
        <div class="container-fuild">
            <div class="wrap_content">
            <div class="main_content">
	            <div class="left_content">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'realvsfaceguide' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'realvsfaceguild' ); ?></p>

					<?php
						?>
						<div class="search">
		    				<div class="search-form-head">
		    					 <form action="<?php echo home_url( '/' ); ?>" method="get" class="search-form">
				                    <div class="input-group seach-header">
				                        <input name="s" value="<?php the_search_query(); ?>" class="search-field" type="search" placeholder="Search" class="form-seach-header">
										<input type="hidden" name="post_type" value="post" />
										<input type="hidden" name="post_type" value="page" />
										<button type="submit" class="search-submit"><i class="fa fa-search" aria-hidden="true"></i></button>
				                    </div>
				                </form>
		    				</div>    
		    			</div>
						<?php
						the_widget( 'WP_Widget_Recent_Posts' );						
						/* translators: %1$s: smiley */
						$archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'realvsfaceguide' ), convert_smilies( ':)' ) ) . '</p>';
						the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
						the_widget( 'WP_Widget_Tag_Cloud' );
					?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->
			</div>			
	            	<div id="secondary" class="right_content" role="complementary">
	            	<?php dynamic_sidebar( 'sidebar-1' ); ?>	            		
    				<div class="btn_right_sidebar">				   					
	    				<a href="#" class="btn_become_a_contributor">Become a Contributor</a>
	    			</div>
	            </div><!-- #right-sidebar -->
            </div>
        </div>
	</div>

<?php get_footer(); ?>
					
