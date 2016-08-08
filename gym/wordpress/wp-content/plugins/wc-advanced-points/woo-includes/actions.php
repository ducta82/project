<?php
	add_action('wp_ajax_pw_level_name', 'create_level');
	add_action('wp_ajax_nopriv_pw_level_name', 'create_level');
	function create_level() {

		global $wpdb;
		
			if($_POST['pw_action_type']=='add' || $_POST['pw_action_type']=='')
			{
				$defaults = array('post_title'=>stripslashes($_POST['pw_level_name']), 'post_type'=>'level', 'post_content'=>'demo text', 'post_status'=>'publish');		
				
				if($post_id=wp_insert_post( $defaults ))
				{
					add_post_meta($post_id, 'level_name', stripslashes($_POST['pw_level_name']));
					add_post_meta($post_id, 'level_image', stripslashes($_POST['pw_level_image']));
					add_post_meta($post_id, 'level_range_from', stripslashes($_POST['pw_level_from_rang']));
					add_post_meta($post_id, 'level_range_to', stripslashes($_POST['pw_level_to_rang']));
					add_post_meta($post_id, 'level_discount', stripslashes($_POST['pw_level_discount']));
					add_post_meta($post_id, 'level_discount_type', stripslashes($_POST['pw_level_discount_type']));
					$applyto='all';
					if(stripslashes($_POST['pw_level_discount_type'])!='all')
						$applyto=$_POST[trim(stripslashes($_POST['pw_level_discount_type']))];
						
					add_post_meta($post_id, 'level_discount_applyto', $applyto);
					/*add_post_meta($post_id, 'level_gift_product', $_POST['pw_level_gift_product']);
					add_post_meta($post_id, 'level_additional_point', stripslashes($_POST['pw_level_additional_point']));
					add_post_meta($post_id, 'level_free_ship', stripslashes($_POST['pw_level_free_ship']));
					add_post_meta($post_id, 'level_voucher', stripslashes($_POST['pw_level_voucher']));*/
				}
				else
					echo 'error';
			}else if($_POST['pw_action_type']=='edit')
			{
				$post_id=stripslashes($_POST['pw_level_id']);
				update_post_meta($post_id, 'level_name', stripslashes($_POST['pw_level_name']));
				update_post_meta($post_id, 'level_image', stripslashes($_POST['pw_level_image']));
				update_post_meta($post_id, 'level_range_from', stripslashes($_POST['pw_level_from_rang']));
				update_post_meta($post_id, 'level_range_to', stripslashes($_POST['pw_level_to_rang']));
				update_post_meta($post_id, 'level_discount', stripslashes($_POST['pw_level_discount']));
				update_post_meta($post_id, 'level_discount_type', stripslashes($_POST['pw_level_discount_type']));
				
				$applyto='all';
				if(stripslashes($_POST['pw_level_discount_type'])!='all')
					$applyto=$_POST[stripslashes($_POST['pw_level_discount_type'])];
				update_post_meta($post_id, 'level_discount_applyto', $applyto);
				/*update_post_meta($post_id, 'level_gift_product', $_POST['pw_level_gift_product']);
				update_post_meta($post_id, 'level_additional_point', stripslashes($_POST['pw_level_additional_point']));
				update_post_meta($post_id, 'level_free_ship', stripslashes($_POST['pw_level_free_ship']));
				update_post_meta($post_id, 'level_voucher', stripslashes($_POST['pw_level_voucher']));*/
			}else if($_POST['pw_action_type']=='delete')
			{
				$post_id=stripslashes($_POST['pw_level_id']);
				wp_delete_post( $post_id );
			}
		
		$post_per_page=$_POST['pw_post_per_page'];
		$args=array(
			'post_type'=>'level',
			'post_per_page'=>$post_per_page,
			'paged'=>'1',
			'order'=>'data',
			'orderby'=>'ASC',
		);
		
		$output='';
		$i=1;
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : 
			$loop->the_post();
			
			/*$free_ship=get_post_meta(get_the_ID(),'level_free_ship',true);
			$free_ship=empty($free_ship) ? __("No",'rewardsystem'):__("Yes","rewardsystem");
			$gift_product=(is_array(get_post_meta(get_the_ID(),'level_gift_product',true)) ? implode(',',get_post_meta(get_the_ID(),'level_gift_product',true)):__("No Product","rewardsystem"));*/
			
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
		exit();
	}
	
	
	add_action('wp_ajax_pw_template_email', 'pw_template_email');
	add_action('wp_ajax_nopriv_pw_template_email', 'pw_template_email');
	function pw_template_email() {
		global $wpdb;
		
			if($_POST['pw_action_type']=='add' || $_POST['pw_action_type']=='')
			{
				$defaults = array('post_title'=>stripslashes($_POST['pw_email_template_name']), 'post_type'=>'email_template', 'post_content'=>'demo text', 'post_status'=>'publish');		
				
				if($post_id=wp_insert_post( $defaults ))
				{		
					add_post_meta($post_id, 'template_name', stripslashes($_POST['pw_email_template_name']));
					add_post_meta($post_id, 'email_subject', stripslashes($_POST['pw_email_subject']));
					add_post_meta($post_id, 'email_message', stripslashes($_POST['pw_email_message']));
					add_post_meta($post_id, 'email_status', '0');
				}
				else
					echo 'error';
			}else if($_POST['pw_action_type']=='edit')
			{
				$post_id=stripslashes($_POST['pw_template_id']);
				update_post_meta($post_id, 'template_name', stripslashes($_POST['pw_email_template_name']));
				update_post_meta($post_id, 'email_subject', stripslashes($_POST['pw_email_subject']));
				update_post_meta($post_id, 'email_message', stripslashes($_POST['pw_email_message']));
			
			}else if($_POST['pw_action_type']=='delete')
			{
				$post_id=stripslashes($_POST['pw_template_id']);
				wp_delete_post( $post_id );
			}
		
		$post_per_page=$_POST['pw_post_per_page'];
		$args=array(
			'post_type'=>'email_template',
			'post_per_page'=>$post_per_page,
			'paged'=>'1',
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
		exit();
	}
	
	add_action('wp_ajax_pw_pagination_level', 'pw_pagination_level');
	add_action('wp_ajax_nopriv_pw_pagination_level', 'pw_pagination_level');
	function pw_pagination_level() {
		if(isset($_POST['paged']))
		{
			$post_per_page=$_POST['page_size'];
			$paged=(isset($_POST['paged']) ? $_POST['paged']:1);
			$args=array(
				'post_type'=>'level',
				'posts_per_page'=>$post_per_page,
				'paged'=>$paged,
				'order'=>'data',
				'orderby'=>'ASC',
			);
			
			$output='';
			$i=($paged!=1 ? $post_per_page+1:1);
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : 
				$loop->the_post();
				
				/*$free_ship=get_post_meta(get_the_ID(),'level_free_ship',true);
				$free_ship=empty($free_ship) ? __("No",'rewardsystem'):__("Yes","rewardsystem");
				$gift_product=(is_array(get_post_meta(get_the_ID(),'level_gift_product',true)) ? implode(',',get_post_meta(get_the_ID(),'level_gift_product',true)):__("No Product","rewardsystem"));*/
				
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
		}
		else
		{
			$post_per_page=$_POST['page_size'];
			$paged=(isset($_POST['paged']) ? $_POST['paged']:1);
			$args=array(
				'post_type'=>'level',
				'posts_per_page'=>$post_per_page,
				'paged'=>$paged,
				'order'=>'data',
				'orderby'=>'ASC',
			);
			
			$output='';
			$i=($paged>1 ? $post_per_page+1:1);
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : 
				$loop->the_post();
				
				/*$free_ship=get_post_meta(get_the_ID(),'level_free_ship',true);
				$free_ship=empty($free_ship) ? __("No",'rewardsystem'):__("Yes","rewardsystem");
				$gift_product=(is_array(get_post_meta(get_the_ID(),'level_gift_product',true)) ? implode(',',get_post_meta(get_the_ID(),'level_gift_product',true)):__("No Product","rewardsystem"));*/
				
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
			
			echo $output."@";
			
			$args=array(
				'post_type'=>'level',
				'posts_per_page'=>$_POST['page_size'],
				'order'=>'data',
				'orderby'=>'ASC',
			);
			
			$query = new WP_Query($args);
	
			//PAGINATION OPTIONS
			$all_page_number=$query->max_num_pages;
			
			if($all_page_number>1)
			{				
				for($i=1;$i<=$all_page_number;$i++)
				{
					echo '<span class="pw_pagination" id="'.$i.'">'.$i.'</span>';
				}
			}
		}
		exit();
	}
	
	
	add_action('wp_ajax_pw_pagination_email', 'pw_pagination_email');
	add_action('wp_ajax_nopriv_pw_pagination_email', 'pw_pagination_email');
	function pw_pagination_email() {
		if(isset($_POST['paged']))
		{
			$post_per_page=$_POST['page_size'];
			$paged=(isset($_POST['paged']) ? $_POST['paged']:1);
			$args=array(
				'post_type'=>'email_template',
				'posts_per_page'=>$post_per_page,
				'paged'=>$paged,
				'order'=>'data',
				'orderby'=>'ASC',
			);
			
			$output='';
			$i=($paged>1 ? $post_per_page+1:1);
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
		}
		else
		{
			$post_per_page=$_POST['page_size'];
			$paged=(isset($_POST['paged']) ? $_POST['paged']:1);
			$args=array(
				'post_type'=>'email_template',
				'posts_per_page'=>$post_per_page,
				'paged'=>$paged,
				'order'=>'data',
				'orderby'=>'ASC',
			);
			
			$output='';
			$i=($paged>1 ? $post_per_page+1:1);
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
					
			echo $output."@";
			
			$args=array(
				'post_type'=>'email_template',
				'posts_per_page'=>$_POST['page_size'],
				'order'=>'data',
				'orderby'=>'ASC',
			);
			
			$query = new WP_Query($args);
	
			//PAGINATION OPTIONS
			$all_page_number=$query->max_num_pages;
			
			if($all_page_number>1)
			{				
				for($i=1;$i<=$all_page_number;$i++)
				{
					echo '<span class="pw_pagination" id="'.$i.'">'.$i.'</span>';
				}
			}
		}
		exit();
	}
?>