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
	    					<li><a href="#"><img src="<?php echo bloginfo('template_url')?>/images/icon-facebook.png"></a></li>
	    					<li><a href="#"><img src="<?php echo bloginfo('template_url')?>/images/twitter-icon-circle-logo.png"></a></li>
	    					<li><a href="#"><img src="<?php echo bloginfo('template_url')?>/images/Icon_Google+.svg.png"></a></li>
	    					<li><a href="#"><img src="<?php echo bloginfo('template_url')?>/images/pinterest.png"></a></li>
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
                <a href="#" id="menu-icon">MENU</a>
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
