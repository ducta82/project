<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">      	
	<link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_url')?>/style.css">
	 <script src="<?php echo bloginfo('template_url')?>/js/jquery.js"></script>
	<?php wp_head(); ?>   
</head>
<body>
<div id="page" class="site">	
	<div>	
		<div class="top_header">
	    	<div class="wrap_content relative">
	    		<div class="logo_top">
		    		<a href="<?php echo home_url()?>" class="logo">
		    			<img src="<?php echo bloginfo('template_url')?>/images/logo.png" >
		    		</a>   
	    		</div> 
	    			<div class="search">
	    				<div class="search-form-head">
	    					 <form action="<?php echo home_url( '/' ); ?>" method="get" class="search-form">
			                    <div class="input-group seach-header">
			                        <input name="s" value="<?php the_search_query(); ?>" class="search-field" type="search" placeholder="search..." class="form-seach-header">
									<input type="hidden" name="post_type" value="post" />
									<input type="hidden" name="post_type" value="page" />
			                    </div>
			                </form>
	    				</div>    				
	    				
	    			</div>
	    			<div class="icon-social">
	    				<ul>
	    					<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
	    					<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
	    					<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
	    					<li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></li>
	    				</ul>
	    			</div>
	    			<div class="clear"></div>
	    	</div>
	    </div>   		
    	<div class="navigation">
    		<div class="wrap_content">
                <div class="pc_menu">       
                   <?php wp_nav_menu( array(                                          
                        'theme_location' => 'main-nav',
                         'container' => 'ul',                                    
                    ) ); ?>			                                         	
                    <a class="toggleMenu" href="#">MENU</a>
                </div>    
              <nav class="mobile-menu">
                <span id="menu-icon">MENU</span>
                <?php wp_nav_menu( array( 
                'theme_location' => 'mobile_menu',
                'container' => 'ul', 
                ) ); ?>               
              </nav>    
              
    		</div>
    		<div class="clear"></div>
    	</div>   	
	</div><!-- #masthead -->

	<div id="content" class="site-content">
