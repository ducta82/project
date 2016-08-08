<?php
/**
 * Template Name: Temp Register Contributor
 */
get_header();?>
<div id='bttop'><img src="<?php echo get_template_directory_uri();?>/images/icon-back-to-top.png"></div>
        <div class="container-fuild">
            <div class="wrap_content">
            <div class="main_content">
	            <div class="left_content">
	            	
					<?php if(is_user_logged_in()) { $user_id = get_current_user_id();$current_user = wp_get_current_user();$profile_url = get_author_posts_url($user_id);$edit_profile_url = get_edit_profile_url($user_id); ?>
					<div class="regted">
					   You must login with a username <a href="<?php echo $profile_url ?>"><?php echo $current_user->display_name; ?></a> 'Do you really want to <a href="<?php echo esc_url(wp_logout_url($current_url)); ?>">Log out</a> ?
					</div>
					<?php } else { ?>
					<div class="register-contributor">
					    <?php $err = ''; $success = ''; global $wpdb, $PasswordHash, $current_user, $user_ID; if(isset($_POST['task']) && $_POST['task'] == 'register' ) { $pwd1 = $wpdb->escape(trim($_POST['pwd1']));
					        $pwd2 = $wpdb->escape(trim($_POST['pwd2']));
					        $email = $wpdb->escape(trim($_POST['email']));
					        $username = $wpdb->escape(trim($_POST['username']));
					 
					        if( $email == "" || $pwd1 == "" || $pwd2 == "" || $username == "") {
					            $err = 'This value is required.!';
					        } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					            $err = 'Please enter a valid email address!.';
					        } else if(email_exists($email) ) {
					            $err = 'Email address already exists!.';
					        } else if($pwd1 <> $pwd2 ){
					            $err = 'Password are not the same!.';
					        } else {
					            $user_id = wp_insert_user( array ('user_pass' => apply_filters('pre_user_user_pass', $pwd1), 'user_login' => apply_filters('pre_user_user_login', $username), 'user_email' => apply_filters('pre_user_user_email', $email), 'role' => 'subscriber' ) );
					            if( is_wp_error($user_id) ) {
					                $err = 'Error on user creation.';
					            } else {
					                do_action('user_register', $user_id);
					                //$success = 'You have successfully registered!';
					                wp_redirect( 'http://realvsfakeguide.local/login' ); exit;
					            }
					        }
					    }
					    ?>
					<!--display error/success message-->
					<div id="message">
					        <?php
					            if(! empty($err) ) :
					                echo ''.$err.'';
					            endif;
					        ?>
					        <?php
					            if(! empty($success) ) :
					                $login_page  = home_url( '/login.html' );
					                echo ''.$success. '<a href='.$login_page.'>Login</a>'.'';
					            endif;
					        ?>
					    </div>
					    <h2>Register</h2>
						<form class="form-register" method="post" role="form">						
						<div class="form-group">
							<label class="label-register" for="username">Username:</label>
							<div class="username-register">
								<input type="text" class="form-control" name="username" id="username" placeholder="Your username">
							</div>
						</div>
						<div class="form-group">
							<label class="label-register" for="email">Email:</label>
							<div class="email-register">
								<input type="email" class="form-control" name="email" id="email" placeholder="Email">
							</div>
						</div>
						<div class="form-group">
							<label class="label-register" for="pwd1">Password:</label>
							<div class="password-register">
								<input type="password" class="form-control" name="pwd1" id="pwd1" placeholder="Your password">
							</div>
						</div>
						<div class="form-group">
							<label class="label-register" for="pwd2">Enter your password again:</label>
							<div class="password-register">
								<input type="password" class="form-control" name="pwd2" id="pwd2" placeholder="Enter your password again">
							</div>
						</div>
						<?php wp_nonce_field( 'post_nonce', 'post_nonce_field' ); ?>
						<div class="form-group">
							<div class="btn-submit-register">
							<button type="submit" class="btn btn-primary">Register</button>
								<input type="hidden" name="task" value="register" />
							</div>
						</div>
						</form>
					</div>
					<div class="thongbaologin">
					    <?php
					        $login  = (isset($_GET['login']) ) ? $_GET['login'] : 0;
					        if ( $login === "failed" ) {
					                echo '<strong>ERROR:</strong> Wrong username or password.!';
					        } elseif ( $login === "empty" ) {
					                echo '<strong>ERROR:</strong> Username and password cannot be empty.';
					        } elseif ( $login === "false" ) {
					                echo '<strong>ERROR:</strong> You have to log out.';
					        }
					    ?>
					</div>
					 
					<?php } ?>	
						
						
				</div>	           
	            <div id="secondary" class="right_content" role="complementary">
	            	<div class="search">
	    				<?php get_search_form(); ?>	
	    				
	    			</div>
                    <div class="fashion_news_recent_post">
	    				<h3>resent post</h3>
	    				<div class="resent_post_item1">	    					
                            <?php query_posts('showposts=5'); ?>
                            <ul>
                            <?php while (have_posts()) : the_post(); ?>
                                <li>
                                    	<?php the_post_thumbnail('thumbnail'); ?>
                                    <span><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></span>
                                </li>
                            <?php endwhile;?>
                            </ul>
	    				</div>
	    				
	    			</div>	 
                    <?php dynamic_sidebar( 'sidebar-1' ); ?>           		
    				<div class="btn_right_sidebar">				   					
	    				<a href="<?php ?>" class="btn_become_a_contributor">Become a Contributor</a>
	    			</div>
	            </div><!-- #right-sidebar -->
            </div>
        </div>
	</div>

<?php get_footer(); ?>