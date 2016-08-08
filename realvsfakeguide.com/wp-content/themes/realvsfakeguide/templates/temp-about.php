<?php
/**
 * Template Name: Temp About
 */
get_header();?>
<?php while (have_posts()):the_post()?>
<div id='bttop'><img src="<?php echo get_template_directory_uri();?>/images/icon-back-to-top.png"></div>
    <div class="container-fuild">
   		<div class="about_banner" style="background: url('<?php echo get_field('about_banner');?>') no-repeat scroll center;">           
       		<div class="about_text_banner">
       			<h1><?php echo get_field('about_text_banner');?></h1>    			
       		</div>
       		<div class="subcribe">          
          <div class="wrap_content">
              <span>SUBSCRIBE TO NEW LETTERS</span>
             <?php es_subbox( $namefield = "NO", $desc = "", $group = "" ); ?>
          </div>
          </div>                   
   		</div><!-- End home_banner-->
   		
   		<div class="about_real_and_face">
   			<div class="wrap_content">
   				<div class="about_real_and_face_logo">
   					<img src="<?php echo get_field('about_real_and_face_logo') ?>">
   				</div>
   				<div class="about_real_and_face_text">
   					<p><?php echo get_field('about_real_and_face_text') ?></p>
					<div class="about_real_and_face_social">
						<span>Share: 
							<a href="#"><img src="<?php echo get_template_directory_uri();?>/images/guild-icon-face.png"></a>
							<a href="#"><img src="<?php echo get_template_directory_uri();?>/images/guild-icon-twi.png"></a> 
							<a href="#"><img src="<?php echo get_template_directory_uri();?>/images/guild-icon-goo.png"></a>
							<a href="#"><img src="<?php echo get_template_directory_uri();?>/images/guild-icon-pri.png"></a>
						</span>
					</div>
   				</div>
   			</div>
   		</div><!-- End about_real_and_face-->
   		
   		<div class="about_group">
   			<div class="wrap_content">
   			<?php if(have_rows('about_group')) : while (have_rows('about_group')) : the_row('about_group')?> 
   				<div class="about_group_1" style="background: url('<?php echo get_sub_field('about_group_bg');?>') no-repeat scroll center;">
                    <div class="content_about_group">
       					<h2><?php echo get_sub_field('about_group_title');?></h2>
       					<a href="<?php echo get_sub_field('about_group_link');?>" class="about_group_btn">View All</a>
      					
                    </div>
   				</div>
   				
   			<?php endwhile;?>
             <?php endif;?> 	
   			</div>
   		</div><!-- End about_group-->
    </div>

<?php endwhile;?>
<?php get_footer();?>