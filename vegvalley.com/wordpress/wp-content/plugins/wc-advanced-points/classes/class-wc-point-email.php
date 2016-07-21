<?php 
	add_action( 'admin_head', 'eb_admin_add_scripts_point' );	

	function eb_admin_add_scripts_point(){
		global $wc_points_rewards;
		wp_enqueue_media();
		/////////////////////////CSS CHOSEN///////////////////////
		wp_register_style( 'chosen_css_1', $wc_points_rewards->get_plugin_path().'/css/chosen/chosen.css', false, '1.0.0' );
		wp_enqueue_style( 'chosen_css_1' );

		//////////////////CHOSEN//////////////////////////
		wp_register_script( 'chosen_js1', $wc_points_rewards->get_plugin_path().'/js/chosen/chosen.jquery.min.js' , false, '1.0.0' );
		wp_enqueue_script( 'chosen_js1' );
	}
?>
    <script type="text/javascript">
		var loading='<div class="le-loading"><img src="<?php echo PW_POINT_URL?>/images/loader.gif" /></div>';
		function ajax_actions_email(data,action)
		{
			jQuery('#grid_template_result_loading').html(loading);
			jQuery.ajax({
				type: "POST",
				url: ajaxurl,
				data: data+"&action="+action
			}).done(function(response) {
				jQuery('#grid_template_result_loading').html('');
				window.location.href="<?php echo admin_url( 'admin.php?page=wc_points_rewards&tab=email');?>";
			});
		}
	
        jQuery(document).ready(function() {
			jQuery("#pw_save_new_email").click(function() {
				jQuery("#pw_save_new_email").prop("disabled", true);
				tinyMCE.triggerSave();
				ajax_actions_email(jQuery("#pw_create_template_form").serialize(),'pw_template_email');
			});

			jQuery('tr.pw_emaill_tr')
			.mouseenter(function(){
				var $this=jQuery(this);

				var $url="<?php echo admin_url( 'admin.php?page=wc_points_rewards&tab=email');?>"+'&template_id='+$this.attr('id');
				$this.find("td:first").append('<div class="pw_template_edit_delete"><span><a href="'+$url+'"><?php _e("Edit","wc_advanced_points") ?></a></span>|<span><a class="pw_template_del" data-template-id="'+$this.attr('id')+'" href=""><?php _e("Delete","wc_advanced_points") ?></a></span></div>');
				
				jQuery('.pw_template_del').click(function(e){
					e.preventDefault();
					if(confirm("<?php _e("Are you sure ?","wc_advanced_points")?>"))
					{
						jQuery('#pw_action_type').val('delete');
						jQuery('#pw_template_id').val(jQuery(this).attr('data-template-id'));
						ajax_actions_email(jQuery("#pw_create_template_form").serialize(),'pw_template_email');
					}
				});	
			})
			.mouseleave(function(){
				jQuery('.pw_template_edit_delete').remove();
			});
			
			jQuery('.chosen-select').chosen();
			
			
			////////PAGINATION///////
			jQuery('#pw_page_size').change(function(){
				jQuery('#grid_template_result_loading').html(loading);
				jQuery('#pw_post_per_page').val(jQuery(this).val());
				
				jQuery.ajax({
					type: "POST",
					url: ajaxurl,
					data: "page_size="+jQuery(this).val()+"&action=pw_pagination_email"
				}).done(function(response) {
					var data=response.split('@');
					
					jQuery('#grid_template_result').html(data[0]);
					jQuery('#pw_pageination').html(data[1]);
					jQuery('#grid_template_result_loading').html('');
					jQuery('tr.pw_emaill_tr')
						.mouseenter(function(){
							var $this=jQuery(this);
							var $url="<?php echo admin_url( 'admin.php?page=wc_points_rewards&tab=email');?>"+'&template_id='+$this.attr('id');
							$this.find("td:first").append('<div class="pw_template_edit_delete"><span><a href="'+$url+'"><?php _e("Edit","wc_advanced_points") ?></a></span>|<span><a class="pw_template_del" data-template-id="'+$this.attr('id')+'" href=""><?php _e("Delete","wc_advanced_points") ?></a></span></div>');
							jQuery('.pw_template_del').click(function(e){
								e.preventDefault();
								if(confirm("<?php _e("Are you sure ?","wc_advanced_points")?>"))
								{
									jQuery('#pw_action_type').val('delete');
									jQuery('#pw_template_id').val(jQuery(this).attr('data-template-id'));
									ajax_actions_email(jQuery("#pw_create_template_form").serialize(),'pw_template_email');
								}
							});	
						})
						.mouseleave(function(){
							jQuery('.pw_template_edit_delete').remove();
						});

					jQuery('.pw_pagination').click(function(){
						jQuery('#grid_template_result_loading').html(loading);
						jQuery.ajax({
							type: "POST",
							url: ajaxurl,
							data: "page_size="+jQuery('#pw_page_size').val()+"&paged="+jQuery(this).attr('id')+"&action=pw_pagination_email"
						}).done(function(response) {
							jQuery('#grid_template_result').html(response);
							jQuery('#grid_template_result_loading').html('');
							jQuery('tr.pw_emaill_tr')
								.mouseenter(function(){
									var $this=jQuery(this);
									var $url="<?php echo admin_url( 'admin.php?page=wc_points_rewards&tab=email');?>"+'&template_id='+$this.attr('id');
									$this.find("td:first").append('<div class="pw_template_edit_delete"><span><a href="'+$url+'"><?php _e("Edit","wc_advanced_points") ?></a></span>|<span><a class="pw_template_del" data-template-id="'+$this.attr('id')+'" href=""><?php _e("Delete","wc_advanced_points") ?></a></span></div>');
									jQuery('.pw_template_del').click(function(e){
										e.preventDefault();
										if(confirm("<?php _e("Are you sure ?","wc_advanced_points")?>"))
										{
											jQuery('#pw_action_type').val('delete');
											jQuery('#pw_template_id').val(jQuery(this).attr('data-template-id'));
											ajax_actions_email(jQuery("#pw_create_template_form").serialize(),'pw_template_email');
										}
									});	
								})
								.mouseleave(function(){
									jQuery('.pw_template_edit_delete').remove();
								});

						});
					});
					
				});
			});
			
			jQuery('.pw_pagination').click(function(){
				jQuery('#grid_template_result_loading').html(loading);
				jQuery(this).siblings('.pw_pagination').removeClass('pw_pagination_active');
				jQuery(this).addClass('pw_pagination_active');
				
				jQuery.ajax({
					type: "POST",
					url: ajaxurl,
					data: "page_size="+jQuery('#pw_page_size').val()+"&paged="+jQuery(this).attr('id')+"&action=pw_pagination_email"
				}).done(function(response) {
					jQuery('#grid_template_result_loading').html('');
					jQuery('#grid_template_result').html(response);
					jQuery('tr.pw_emaill_tr')
						.mouseenter(function(){
							var $this=jQuery(this);
							var $url="<?php echo admin_url( 'admin.php?page=wc_points_rewards&tab=email');?>"+'&template_id='+$this.attr('id');
							$this.find("td:first").append('<div class="pw_template_edit_delete"><span><a href="'+$url+'"><?php _e("Edit","wc_advanced_points") ?></a></span>|<span><a class="pw_template_del" data-template-id="'+$this.attr('id')+'" href=""><?php _e("Delete","wc_advanced_points") ?></a></span></div>');
							jQuery('.pw_template_del').click(function(e){
								e.preventDefault();
								if(confirm("<?php _e("Are you sure ?","wc_advanced_points")?>"))
								{
									jQuery('#pw_action_type').val('delete');
									jQuery('#pw_template_id').val(jQuery(this).attr('data-template-id'));
									ajax_actions_email(jQuery("#pw_create_template_form").serialize(),'pw_template_email');
								}
							});	
						})
						.mouseleave(function(){
							jQuery('.pw_template_edit_delete').remove();
						});

				});
			});
			
		});
	</script>
    
    <?php
		$pw_email_template_name='';
		$pw_email_send_type='';
		$pw_email_subject='';
		$pw_email_message='Dear {firstname} {lastname},
Hello,
You have Earned Reward Points: {points} on {sitelink}
You can use this Reward Points to make discounted purchases on {sitelink}
Best Regards';
		$pw_action_type='add';
		$pw_template_id='';
			
    	if(isset($_GET['template_id']) && NULL != stripslashes($_GET['template_id']))
		{
			$template_id=stripslashes($_GET['template_id']);
			$pw_email_template_name=get_post_meta($template_id,'template_name',true);
			$pw_email_send_type=get_post_meta($template_id,'send_type',true);
			$pw_email_subject=get_post_meta($template_id,'email_subject',true);
			$pw_email_message=get_post_meta($template_id,'email_message',true);
			$pw_action_type='edit';
			$pw_template_id=stripslashes($_GET['template_id']);
		}
		
	?>
    
    


    <form id="pw_create_template_form" class="pw_create_template_form">	
    	
        <table class="form-table pw-point-table">
        <tbody>
        <tr class="title-row">
            <td colspan="4">
                <strong><?php _e('Settings', 'wc_advanced_points') ?>:</strong>
            </td>
            
        </tr>
        <tr>
          <td><?php _e('Template Name', 'wc_advanced_points') ?></td>
          <td><input type="text" name="pw_email_template_name" id="pw_email_template_name" value="<?php echo $pw_email_template_name;?>">
                	<br />
                    <span class="description"><?php _e('Enter template name', 'wc_advanced_points') ?></span></td>
          <td>&nbsp;</td>
          <td rowspan="2"><?php
						$editor_args = array(
							'textarea_rows' => 7,
						);
						$editor_id ='pw_email_message';
						wp_editor( $pw_email_message, $editor_id, $editor_args );
                	?>
                    <br />
                    <span class="description">
                    	<strong>Note : </strong><?php _e('Use Below Pattern in Email Template', 'wc_advanced_points') ?>
                    	<ul style="list-style-type:circle">
                        	<li><?php _e('<strong>{sitelink} :</strong> Insert Link', 'wc_advanced_points') ?></li>
                            <li><?php _e('<strong>{firstname} :</strong> Insert Customer Name', 'wc_advanced_points') ?></li>
                            <li><?php _e('<strong>{lastname} :</strong> Customer Last Name', 'wc_advanced_points') ?></li>
                            <li><?php _e('<strong>{points} :</strong> User Points', 'wc_advanced_points') ?></li>
                        </ul>
                        
          </span></td>
          </tr>
        <tr>
          <td ><?php _e('Subject', 'wc_advanced_points') ?>:</td>
          <td ><input type="text" name="pw_email_subject" id="pw_email_subject" value="<?php echo $pw_email_subject;?>">
                    <br />
                    <span class="description"><?php _e('Enter template email subject', 'wc_advanced_points') ?></span></td>
          <td>&nbsp;</td>
          </tr>
        <tr>
          <td colspan="4"><input type="hidden" name="pw_action_type" id="pw_action_type" value="<?php echo $pw_action_type;?>" />
                    <input type="hidden" name="pw_template_id" id="pw_template_id" value="<?php echo $pw_template_id;?>" />
                    <input type="hidden" name="pw_post_per_page" id="pw_post_per_page" value="5" />
                    <input type="button" name="pw_save_new_email" class="button button-primary button-large" id="pw_save_new_email" value="Save">&nbsp;

                   <a href="<?php echo admin_url( 'admin.php?page=wc_points_rewards&tab=email'); ?>"><input type="button" class="button" name="returntolist" value="Add Template"></a>&nbsp;</td>
          
        </tr>
        </tbody>
     </table>
	</form>	        	
	
		<br/>
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
        <div id="grid_template_result_loading"></div>
     </div>   
<!-- Grid  -->

  <table class="wp-list-table widefat fixed posts" cellspacing="0">
            <thead>
                <tr>
                    <th >
                        <a href="#"><span><?php _e('No.', 'wc_advanced_points'); ?></span></a>
                    </th>
                    <th ><?php _e('Template Name', 'wc_advanced_points'); ?></th>
                    <th ><?php _e('Subject', 'wc_advanced_points'); ?></th>
                    <th ><?php _e('Message', 'wc_advanced_points'); ?></th>
                </tr>
            </thead>
            <tbody id="grid_template_result">
               <?php
               		$args=array(
						'post_type'=>'email_template',
						'posts_per_page'=>5,
						'order'=>'data',
						'orderby'=>'ASC',
					);
					
					$output='';
					$i=1;
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : 
						$loop->the_post();
						
						$output.='
						<tr class="pw_emaill_tr" id="'.get_the_ID().'">
							<td>'.$i++.'</td>
							<td>'.get_post_meta(get_the_ID(),'template_name',true).'</td>
							<td>'.get_post_meta(get_the_ID(),'email_subject',true).'</td>
							<td>'.get_post_meta(get_the_ID(),'email_message',true).'</td>
						</tr>
					';
					endwhile;
					
					echo $output;
			   ?>
            </tbody>
        </table>
        <div id="pw_pageination" style="margin-top:10px">
        <?php
        	//PAGINATION OPTIONS
			$all_page_number=$loop->max_num_pages;
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