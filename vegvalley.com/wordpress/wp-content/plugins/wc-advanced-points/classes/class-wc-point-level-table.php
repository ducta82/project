<?php 
	add_action( 'admin_head', 'eb_admin_add_scripts_point_level' );	

	function eb_admin_add_scripts_point_level(){
		global $wc_points_rewards;
		wp_enqueue_media();
		

	}
?>
    <script type="text/javascript">
		var loading='<div class="le-loading"><img src="<?php echo PW_POINT_URL?>/images/loader.gif" /></div>';
		function ajax_actions(data,action)
		{
			jQuery('#grid_level_result_loading').html(loading);
			jQuery.ajax({
				type: "POST",
				url: ajaxurl,
				data: data+"&action="+action
			}).done(function(response) {
					jQuery('#grid_level_result_loading').html('');
					window.location.href="<?php echo admin_url( 'admin.php?page=wc_points_rewards&tab=level');?>";
			});
		}
	
        jQuery(document).ready(function() {
			var flag_validate=true;
			jQuery('.require').each(function(index, element) {
				jQuery(this).keyup(function(){
					var $ids=jQuery(this).attr('id');
					if(jQuery(this).val()!='')
					{
						flag_validate=true;
						jQuery(".error_"+$ids).remove();
					}
				});
			});
			
			jQuery("#pw_save_new").click(function(e) {
				if(parseInt(jQuery("#pw_level_to_rang").val())<=parseInt(jQuery("#pw_level_from_rang").val()))
				{
					flag_validate=false;
					jQuery("<div class='error error_pw_level_to_rang'><?php echo __('Range(From) must be less than Range(To)','wc_advanced_points')?></div>").insertAfter("#pw_level_to_rang");
				}else
				{
					flag_validate=true;
					jQuery(".error_pw_level_to_rang").remove();
				}
				
				jQuery('.require').each(function(index, element) {
					var $ids=jQuery(this).attr('id');
					
                    if(jQuery(this).val()=='')
					{
						jQuery(".error_"+$ids).remove();
						flag_validate=false;
						switch(jQuery(this).attr('name'))
						{
							case "pw_level_name":
								jQuery("<div class='error error_"+$ids+"' ><?php echo __('Enter valid value for Level Name','wc_advanced_points')?></div>").insertAfter(this);
							break;
							
							case "pw_level_from_rang":
								jQuery("<div class='error error_"+$ids+"'><?php echo __('Enter valid value for Range(From)','wc_advanced_points')?></div>").insertAfter("#pw_level_to_rang");
							break;
							
							case "pw_level_to_rang":
								if(jQuery("#pw_level_to_rang").val<=jQuery("#pw_level_from_rang").val())
								{
									jQuery("<div class='error error_"+$ids+"'><?php echo __('Range(From) must be less than Range(To)','wc_advanced_points')?></div>").insertAfter("#pw_level_to_rang");
								}
								
								jQuery("<div class='error error_"+$ids+"'><?php echo __('Enter valid value for Range(To)','wc_advanced_points')?></div>").insertAfter("#pw_level_to_rang");
							break;
							
							case "pw_level_discount":
								jQuery("<div class='error error_"+$ids+"'><?php echo __('Enter valid value for Discount','wc_advanced_points')?></div>").insertAfter("#pw_level_product_tag");
							break;
						}
					}
                });
				
				
 				if(flag_validate)
				{
					jQuery("#pw_save_new").prop("disabled", true);
					ajax_actions(jQuery("#pw_create_level_form").serialize(),'pw_level_name');
				}
			});
			
			jQuery('#pw_discount_type').change(function(){

				if(jQuery(this).val()!='all')
				{
					var $id="#"+jQuery(this).val();
					jQuery($id).siblings(".discount_apply_to").hide();
					jQuery($id).show();
				}
				else
				{
					jQuery(".discount_apply_to").hide();
				}

			});
			

			jQuery('tr.pw_level_tr')
			.mouseenter(function(){
				var $this=jQuery(this);

				var $url="<?php echo admin_url( 'admin.php?page=wc_points_rewards&tab=level');?>"+'&level_id='+$this.attr('id');
				$this.find("td:first").append('<div class="pw_level_edit_delete"><span><a href="'+$url+'"><?php _e("Edit","wc_advanced_points") ?></a></span>|<span><a class="pw_level_del" data-level-id="'+$this.attr('id')+'" href=""><?php _e("Delete","wc_advanced_points") ?></a></span></div>');
				
				jQuery('.pw_level_del').click(function(e){
					e.preventDefault();
					if(confirm("<?php _e("Are you sure ?","wc_advanced_points")?>"))
					{
						jQuery('#pw_action_type').val('delete');
						jQuery('#pw_level_id').val(jQuery(this).attr('data-level-id'));
						ajax_actions(jQuery("#pw_create_level_form").serialize(),'pw_level_name');
					}
				});	
			})
			.mouseleave(function(){
				jQuery('.pw_level_edit_delete').remove();
			});
			
			jQuery('.chosen-select').chosen();
			
			////////PAGINATION///////
			jQuery('#pw_page_size').change(function(){
				jQuery('#grid_level_result_loading').html(loading);
				jQuery('#pw_post_per_page').val(jQuery(this).val());
				
				jQuery.ajax({
					type: "POST",
					url: ajaxurl,
					data: "page_size="+jQuery(this).val()+"&action=pw_pagination_level"
				}).done(function(response) {
					var data=response.split('@');
					
					jQuery('#grid_level_result').html(data[0]);
					jQuery('#pw_pageination').html(data[1]);
					jQuery('#grid_level_result_loading').html('');
					
					jQuery('tr.pw_level_tr')
						.mouseenter(function(){
							var $this=jQuery(this);
							var $url="<?php echo admin_url( 'admin.php?page=wc_points_rewards&tab=level');?>"+'&level_id='+$this.attr('id');
							$this.find("td:first").append('<div class="pw_level_edit_delete"><span><a href="'+$url+'"><?php _e("Edit","wc_advanced_points") ?></a></span>|<span><a class="pw_level_del" data-level-id="'+$this.attr('id')+'" href=""><?php _e("Delete","wc_advanced_points") ?></a></span></div>');
						})
						.mouseleave(function(){
							jQuery('.pw_level_edit_delete').remove();
						});
						
						
					jQuery('.pw_level_del').click(function(e){
						e.preventDefault();
						if(confirm("<?php _e("Are you sure ?","wc_advanced_points")?>"))
						{
							jQuery('#pw_action_type').val('delete');
							jQuery('#pw_level_id').val(jQuery(this).attr('data-level-id'));
							ajax_actions(jQuery("#pw_create_level_form").serialize(),'pw_level_name');
						}
					});	
					
					jQuery('.pw_pagination').click(function(){
						jQuery('#grid_level_result_loading').html(loading);
						jQuery.ajax({
							type: "POST",
							url: ajaxurl,
							data: "page_size="+jQuery('#pw_page_size').val()+"&paged="+jQuery(this).attr('id')+"&action=pw_pagination_level"
						}).done(function(response) {
							jQuery('#grid_level_result').html(response);
							jQuery('#grid_level_result_loading').html('');
							jQuery('tr.pw_level_tr')
								.mouseenter(function(){
									var $this=jQuery(this);
									var $url="<?php echo admin_url( 'admin.php?page=wc_points_rewards&tab=level');?>"+'&level_id='+$this.attr('id');
									$this.find("td:first").append('<div class="pw_level_edit_delete"><span><a href="'+$url+'"><?php _e("Edit","wc_advanced_points") ?></a></span>|<span><a class="pw_level_del" data-level-id="'+$this.attr('id')+'" href=""><?php _e("Delete","wc_advanced_points") ?></a></span></div>');
									
									jQuery('.pw_level_del').click(function(e){
										e.preventDefault();
										if(confirm("<?php _e("Are you sure ?","wc_advanced_points")?>"))
										{
											jQuery('#pw_action_type').val('delete');
											jQuery('#pw_level_id').val(jQuery(this).attr('data-level-id'));
											ajax_actions(jQuery("#pw_create_level_form").serialize(),'pw_level_name');
										}
									});	
								})
								.mouseleave(function(){
									jQuery('.pw_level_edit_delete').remove();
								});
								
								
							
						});
					});
					
				});
			});
			
			jQuery('.pw_pagination').click(function(){
				jQuery('#grid_level_result_loading').html(loading);
				jQuery(this).siblings('.pw_pagination').removeClass('pw_pagination_active');
				jQuery(this).addClass('pw_pagination_active');

				jQuery.ajax({
					type: "POST",
					url: ajaxurl,
					data: "page_size="+jQuery('#pw_page_size').val()+"&paged="+jQuery(this).attr('id')+"&action=pw_pagination_level"
				}).done(function(response) {
					jQuery('#grid_level_result_loading').html('');
					jQuery('#grid_level_result').html(response);
					jQuery('tr.pw_level_tr')
						.mouseenter(function(){
							var $this=jQuery(this);
							var $url="<?php echo admin_url( 'admin.php?page=wc_points_rewards&tab=level');?>"+'&level_id='+$this.attr('id');
							$this.find("td:first").append('<div class="pw_level_edit_delete"><span><a href="'+$url+'"><?php _e("Edit","wc_advanced_points") ?></a></span>|<span><a class="pw_level_del" data-level-id="'+$this.attr('id')+'" href=""><?php _e("Delete","wc_advanced_points") ?></a></span></div>');
							jQuery('.pw_level_del').click(function(e){
								e.preventDefault();
								if(confirm("<?php _e("Are you sure ?","wc_advanced_points")?>"))
								{
									jQuery('#pw_action_type').val('delete');
									jQuery('#pw_level_id').val(jQuery(this).attr('data-level-id'));
									ajax_actions(jQuery("#pw_create_level_form").serialize(),'pw_level_name');
								}
							});	
						})
						.mouseleave(function(){
							jQuery('.pw_level_edit_delete').remove();
						});
						
						
					
				});
			});
			
		});
	</script>
    
    <?php
		$pw_level_name='';
		$pw_level_range_from='';
		$pw_level_range_to='';
		$pw_level_discount='';
		$pw_level_discount_type='';
		$pw_level_discount_applyto='';
		$pw_level_gift_product='';
	//	$pw_level_free_ship='';
	//	$pw_level_voucher='';
		$pw_action_type='add';
		$pw_level_id='';
		
		$pw_level_image 			= '';
		$pw_level_image_id 			= '';
			
    	if(isset($_GET['level_id']) && NULL != stripslashes($_GET['level_id']))
		{
			$level_id=stripslashes($_GET['level_id']);
			$thumbnail_id = get_post_meta($level_id, 'level_image', true);
			$pw_level_image_id =$thumbnail_id;
			if ($thumbnail_id)
				$pw_level_image = wp_get_attachment_thumb_url( $thumbnail_id );
				
			$pw_level_image = str_replace( ' ', '%20', $pw_level_image );
			
			$pw_level_name=get_post_meta($level_id,'level_name',true);
			$pw_level_range_from=get_post_meta($level_id,'level_range_from',true);
			$pw_level_range_to=get_post_meta($level_id,'level_range_to',true);
			$pw_level_discount=get_post_meta($level_id,'level_discount',true);
			$pw_level_discount_type=get_post_meta($level_id,'level_discount_type',true);
			$pw_level_discount_applyto=get_post_meta($level_id,'level_discount_applyto',true);
			//$pw_level_gift_product=get_post_meta($level_id,'level_gift_product',true);
		//	$pw_level_free_ship=get_post_meta($level_id,'level_free_ship',true);
		//	$pw_level_voucher=get_post_meta($level_id,'level_voucher',true);
			$pw_action_type='edit';
			$pw_level_id=stripslashes($_GET['level_id']);
			?>
            	<script>
                	jQuery(document).ready(function(e) {
                        jQuery('#pw_discount_type option').each(function(){
							if(jQuery(this).val()!='all' && jQuery(this).val()!='<?php echo $pw_level_discount_type;?>')
							{
								var $id="#"+jQuery(this).val();
								jQuery($id).hide();
							}
						});
                    });
                </script>
            <?php
		}else
		{
			?>
            	<script>
                	jQuery(document).ready(function(e) {
                        jQuery('#pw_discount_type option').each(function(){
							if(jQuery(this).val()!='all')
							{
								var $id="#"+jQuery(this).val();
								jQuery($id).hide();
							}
						});
                    });
                </script>
            <?php
		}
		
	?>
    
    <form id="pw_create_level_form" class="pw_create_level_form">	
        <table class="form-table pw-point-table">
        	<tr class="title-row">
            	<td >
                	<strong><?php _e('Settings', 'wc_advanced_points') ?>:</strong>
                </td>
                <td></td>
            </tr>
			<tr>
            	<td>
					<?php _e('Group Level Name', 'wc_advanced_points') ?>: 
                </td>
                <td>
                	<input type="text" name="pw_level_name" id="pw_level_name" value="<?php echo $pw_level_name;?>" required class="require">
                    <br />
                    <span class="description"><?php _e('Enter Level name', 'wc_advanced_points') ?></span>
                </td>
           	</tr>
            
            <tr>
            	<td><?php _e('Group Level Image', 'wc_advanced_points') ?>: </td>
                <td>
                	<div class="form-field">
                        <div id="property_type_thumbnail" style="float:left;margin-right:10px;">
                        <?php
                        if($pw_level_image=="")
                            $pw_level_image=$wc_points_rewards->get_plugin_url()."/images/img.jpg";
            
                        ?>
                        <img src="<?php echo $pw_level_image;?>" width="60px" height="60px" /></div>
            
                        <div style="line-height:60px;">
                            <input type="hidden" id="property_type_thumbnail_id" name="pw_level_image" value="<?php echo $pw_level_image_id;?>" />
                            <button type="button" class="upload_image_button button"><?php _e( 'Upload/Add image', 'wc_advanced_points' ); ?></button>
                            <button type="button" class="remove_image_button button"><?php _e( 'Remove image', 'wc_advanced_points' ); ?></button>
                        </div>
                        <script type="text/javascript">
                             // Only show the "remove image" button when needed
                             if ( ! jQuery('#property_type_thumbnail_id').val() )
                            //	 jQuery('.remove_image_button').hide();
            
                            // Uploading files
                            var file_frame;
            
                            jQuery(document).on( 'click', '.upload_image_button', function( event ){
                                
            
                                event.preventDefault();
            
                                // If the media frame already exists, reopen it.
                                if ( file_frame ) {
                                    file_frame.open();
                                    return;
                                }
            
                                // Create the media frame.
                                file_frame = wp.media.frames.downloadable_file = wp.media({
                                    title: '<?php _e( 'Choose an image', 'wc_advanced_points' ); ?>',
                                    button: {
                                        text: '<?php _e( 'Use image', 'wc_advanced_points' ); ?>',
                                    },
                                    multiple: false
                                });
            
                                // When an image is selected, run a callback.
                                file_frame.on( 'select', function() {
                                    attachment = file_frame.state().get('selection').first().toJSON();
            
                                    jQuery('#property_type_thumbnail_id').val( attachment.id );
                                    jQuery('#property_type_thumbnail img').attr('src', attachment.url );
                                    jQuery('.remove_image_button').show();
                                });
            
                                // Finally, open the modal.
                                file_frame.open();
                            });
            
                            jQuery(document).on( 'click', '.remove_image_button', function( event ){
                                jQuery('#property_type_thumbnail img').attr('src', '<?php echo ''; ?>');
                                jQuery('#property_type_thumbnail_id').val('');
                            //	jQuery('.remove_image_button').hide();
                                return false;
                            });
            
                        </script>
                        <div class="clear"></div>
                    </div>
                    <br />
                    <span class="description"><?php _e('Choose Level image', 'wc_advanced_points') ?></span>
                </td>
           	</tr>
            
            <tr >
            	<td><?php _e('Range', 'wc_advanced_points') ?>: </td>
                <td>
                	<input type="number" name="pw_level_from_rang"  id="pw_level_from_rang" placeholder="<?php _e('From', 'wc_advanced_points') ?>" value="<?php echo $pw_level_range_from;?>" required class="require">Points 
                    <input type="number" name="pw_level_to_rang"  id="pw_level_to_rang" placeholder="<?php _e('To', 'wc_advanced_points') ?>" value="<?php echo $pw_level_range_to;?>" required class="require"><?php _e("Points","wc_advanced_points");?>
                    <br />
                    <span class="description"><?php _e('Enter Level range', 'wc_advanced_points') ?></span>
                </td>
            </tr>
            <tr class="title-row">
            	<td >
                	<strong><?php _e('Add Benefits', 'wc_advanced_points') ?>:</strong>
                </td>
                <td></td>
            </tr>
            <tr>
            	<td>
					<?php _e('Discount', 'wc_advanced_points') ?>
                </td>
                <td>
                	<input type="text" name="pw_level_discount" id="pw_level_discount" value="<?php echo $pw_level_discount;?>" required class="require">
                    <?php _e('Apply To ', 'wc_advanced_points') ?>
                    <select id="pw_discount_type" name="pw_level_discount_type">
                    	<option value="all" <?php selected("all",$pw_level_discount_type,1)?>><?php _e("All Product","wc_advanced_points");?></option>
                        <option value="pw_level_product" <?php selected("pw_level_product",$pw_level_discount_type,1)?>><?php _e("Chooose Products","wc_advanced_points");?></option>
                        <option value="pw_level_product_category" <?php selected("pw_level_product_category",$pw_level_discount_type,1)?>><?php _e("Chooose Categories","wc_advanced_points");?></option>
                        <option value="pw_level_product_tag" <?php selected("pw_level_product_tag",$pw_level_discount_type,1)?>><?php _e("Choose Tags","wc_advanced_points");?></option>
                    </select>
                    <br />
                    <div id="pw_level_product" class="discount_apply_to <?php echo ($pw_level_discount_type=='pw_level_product' ? "discount_show":"discount_hide")?>">
                    <select name="pw_level_product[]" class="chosen-select" multiple="multiple" data-placeholder="<?php _e('Choose Product', 'wc_advanced_points') ?> ..." >
						<?php
                        $args_post = array('post_type' => 'product','posts_per_page'=>-1);
                        $loop_post = new WP_Query( $args_post );
                        $option_data='';
                        while ( $loop_post->have_posts() ) : $loop_post->the_post();
                            $selected='';
                            $meta=($pw_level_discount_type=='pw_level_product' ? $pw_level_discount_applyto:"");
                            if(is_array($meta))
                            {
                                $selected=(in_array(get_the_ID(),$meta) ? "SELECTED":"");
                            }
                            $option_data.='<option '.$selected.' value="'.get_the_ID().'">'.get_the_title().'</option>';
                        endwhile;
                        echo $option_data;
                        ?>
                    </select>
                    </div>
                    
                    <div id="pw_level_product_category" class="discount_apply_to <?php echo ($pw_level_discount_type=='pw_level_product_category' ? "discount_show":"discount_hide")?>">
                    <?php
                    	$param_line = '<select name="pw_level_product_category[]" class="chosen-select" multiple="multiple" data-placeholder="'.__('Choose Category','wc_advanced_points').' ..." >';
						$args = array(
							'taxonomy'       		   =>  'product_cat',
							'name'          		   =>  'pw_product_category',
							'id'                       =>  'pw_product_category',
							'orderby'                  => 'name',
							'order'                    => 'ASC',
							'hide_empty'               => 0,
							'hierarchical'             => 1,
							'exclude'                  => '',
							'include'                  => '',
							'child_of'          		 => 0,
							'number'                   => '',
							'pad_counts'               => false 
						
						); 

						$categories = get_categories($args); 
						foreach ($categories as $category) {
							$selected='';
							$meta=($pw_level_discount_type=='pw_level_product_category' ? $pw_level_discount_applyto:"");
                            if(is_array($meta))
                            {
                                $selected=(in_array($category->cat_ID,$meta) ? "SELECTED":"");
                            }
							
							$option = '<option value="'.$category->cat_ID.'" '.$selected.'>';
							$option .= $category->cat_name;
							$option .= ' ('.$category->category_count.')';
							$option .= '</option>';
							$param_line .= $option;
						}
						$param_line .= '</select>';
						echo $param_line; 
					?>	
					</div>	
                        
                    <div id="pw_level_product_tag"  class="discount_apply_to <?php echo ($pw_level_discount_type=='pw_level_product_tag' ? "discount_show":"discount_hide")?>">    
					<?php	
                        $param_line = '<select name="pw_level_product_tag[]" class="chosen-select" multiple="multiple" data-placeholder="'.__('Choose Tag','wc_advanced_points').' ...">';
						$args = array(
							'taxonomy'       		   =>  'product_tag',
							'name'          		   =>  'pw_product_category',
							'id'                       =>  'pw_product_category',
							'orderby'                  => 'name',
							'order'                    => 'ASC',
							'hide_empty'               => 0,
							'hierarchical'             => 1,
							'exclude'                  => '',
							'include'                  => '',
							'child_of'          		 => 0,
							'number'                   => '',
							'pad_counts'               => false 
						
						); 

						$categories = get_categories($args); 
						foreach ($categories as $category) {
							$selected='';
							$meta=($pw_level_discount_type=='pw_level_product_tag' ? $pw_level_discount_applyto:"");
                            if(is_array($meta))
                            {
                                $selected=(in_array($category->cat_ID,$meta) ? "SELECTED":"");
                            }
							
							$option = '<option value="'.$category->cat_ID.'" '.$selected.'>';
							$option .= $category->cat_name;
							$option .= ' ('.$category->category_count.')';
							$option .= '</option>';
							$param_line .= $option;
						}
						$param_line .= '</select>';
						echo $param_line;
					?>
                    </div>
                    <br />
                    <span class="description">
                    	<?php
                        	echo __('Enter discount amount.'.'wc_advanced_points').'<br />'.__('Example','wc_advanced_points').':<br />'.__('1- Enter number with "%" symbol such as 10%, 20% or other percent (In this case the discount will be deduct from price by percent).','wc_advanced_points').'<br />'.__('2- Enter just number such as 1000,2000,2300 or other number(In this case the number will be deduct from main price).','wc_advanced_points');
						?>
                    
                     </span>
               	</td>
           	</tr>

            <tr>
            	<td>
                    <input type="hidden" name="pw_action_type" id="pw_action_type" value="<?php echo $pw_action_type;?>" />
                    <input type="hidden" name="pw_level_id" id="pw_level_id" value="<?php echo $pw_level_id;?>" />
                    
                    <input type="hidden" name="pw_post_per_page" id="pw_post_per_page" value="5" />
                    
                    <input type="button" name="pw_save_new" class="button button-primary button-large" id="pw_save_new" value="Save">&nbsp;

                   <a href="<?php //echo $template_list_url ?>"><input type="button" class="button" name="returntolist" value="Return to Mail Templates"></a>&nbsp;
                </td>
        	</tr>
        </table>
	</form>	        	
	<div id="filter_bar">    
		<span id="filter_paged_size" ><?php _e('Page Size', 'wc_advanced_points'); ?> 
        	<select id="pw_page_size">
            	<option value="5">5</option>
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
                <option value="40">40</option>
                <option value="50">50</option>
            </select>
        </span>
        <div id="grid_level_result_loading"></div>
     </div>   
<!-- Grid  -->

  <table class="wp-list-table widefat fixed posts" cellspacing="0">
            <thead>
                <tr>
                    <th scope='col' data-toggle="true" class='manage-column column-serial_number'  style="">
                        <a href="#"><span><?php _e('S.No', 'wc_advanced_points'); ?></span></a>
                    </th>
                    <th ><?php _e('Level Name', 'wc_advanced_points'); ?></th>
                    <th ><?php _e('Image', 'wc_advanced_points'); ?></th>						
                    <th ><?php _e('From', 'wc_advanced_points'); ?></th>				
                    <th ><?php _e('To', 'wc_advanced_points'); ?></th>
                    <th ><?php _e('Discount', 'wc_advanced_points'); ?></th>
                    <th ><?php _e('Discount Type', 'wc_advanced_points'); ?></th>
                    <th ><?php _e('Apply To', 'wc_advanced_points'); ?></th>

                </tr>
            </thead>
            <tbody id="grid_level_result">
               <?php
               		$args=array(
						'post_type'=>'level',
						'posts_per_page'=>5,
						'order'=>'data',
						'orderby'=>'DESC',
					);
					
					$output='';
					$i=1;
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : 
						$loop->the_post();
						
						/*$free_ship=get_post_meta(get_the_ID(),'level_free_ship',true);
						$free_ship=empty($free_ship) ? __("No",'wc_advanced_points'):__("Yes","wc_advanced_points");
						$gift_product=(is_array(get_post_meta(get_the_ID(),'level_gift_product',true)) ? implode(',',get_post_meta(get_the_ID(),'level_gift_product',true)):__("No Product","wc_advanced_points"));*/
						
						
						$discount_type=array('all'=>'All Products','pw_level_product'=>'Products','pw_level_product_category'=>'Categories','pw_level_product_tag'=>'Tags');
				
						$level_discount_applyto=get_post_meta(get_the_ID(),'level_discount_applyto',true);
						$level_discount_applyto_arr=array();
						if(is_array($level_discount_applyto))
						{
							$discount_type_=get_post_meta(get_the_ID(),'level_discount_type',true);
							foreach($level_discount_applyto as $ids)
							{
								if($discount_type_=='pw_level_product')
									$level_discount_applyto_arr[]=get_the_title($ids);
								else if($discount_type_=='pw_level_product_category')
								{
									$term=get_term_by( 'id', $ids, 'product_cat', 'ARRAY_A' );
									$level_discount_applyto_arr[]=$term['name'];
								}
								else if($discount_type_=='pw_level_product_tag')
								{
									$term=get_term_by( 'id', $ids, 'product_tag', 'ARRAY_A' );
									$level_discount_applyto_arr[]=$term['name'];
								}
							}
							$level_discount_applyto=implode(',',$level_discount_applyto_arr);
						}else
						{
							$level_discount_applyto='All';
						}

						$image 			= '';
						$thumbnail_id = get_post_meta(get_the_ID(), 'level_image', true);
						
						if ($thumbnail_id)
							$image = wp_get_attachment_thumb_url( $thumbnail_id );
							
						$image = str_replace( ' ', '%20', $image );
						
			
						/*
						<td>'.$gift_product.'</td>
						<td>'.$free_ship.'</td>
						<td>'.get_post_meta(get_the_ID(),'level_additional_point',true).'</td>						
						<td>'.get_post_meta(get_the_ID(),'level_voucher',true).'</td>						
						
						*/
						$output.='
						<tr class="pw_level_tr" id="'.get_the_ID().'">
							<td>'.$i++.'</td>
							<td>'.get_post_meta(get_the_ID(),'level_name',true).'</td>
							<td><img src="'.$image.'" width="30" height="30" /></td>
							<td>'.get_post_meta(get_the_ID(),'level_range_from',true).'</td>
							<td>'.get_post_meta(get_the_ID(),'level_range_to',true).'</td>
							<td>'.get_post_meta(get_the_ID(),'level_discount',true).'</td>
							<td>'.$discount_type[get_post_meta(get_the_ID(),'level_discount_type',true)].'</td>
							<td>'.$level_discount_applyto.'</td>
							
						</tr>
					';
					endwhile;
					
					echo $output;
			   ?>
            </tbody>
        </table>
        <div id="pw_pageination" style="margin-top:10px">
        <?php
			$all_page_number=$loop->max_num_pages;
        	//PAGINATION OPTIONS
			if($all_page_number>1)
			{				
				for($i=1;$i<=$all_page_number;$i++)
				{
					if($i==1)
						echo '<span class="pw_pagination pw_pagination_active" id="'.$i.'">'.$i.'</span>';
					else
						echo '<span class="pw_pagination" id="'.$i.'">'.$i.'</span>';
				}
			}
		?>
        </div>
