<?php function wpAppbox_add_custom_affiliate_id( $user ) { ?>
		<?php  
			if( get_option('wpAppbox_userAffiliate') ) {
				$userID = $user->ID;
				if( !current_user_can( 'edit_user', $userID ) ) {
					return( false );
				}
				?>
		<h3><?php esc_html_e('WP-Appbox: Affiliate-IDs', 'wpappbox'); ?></h3>
		<script>
			function show_hide_options(affid) {
				var status = document.getElementById("wpAppbox_user_<?php echo( $userID ); ?>_ownAffiliate"+affid).checked;
				var table = document.getElementById("wpAppbox_user_<?php echo( $userID ); ?>_affiliate"+affid);
				if(status == true) { table.style.display = ""; }
				else { table.style.display = "none"; }
			}
		</script>
		
		<table class="form-table">
		
			<tr>
				<th>
					<label for="wpAppbox_user_<?php echo( $userID ); ?>_Apple">
						<?php esc_html_e('Apple/PHG Token', 'wpappbox'); ?>:
					</label>
				</th>
				<td>
					<p>
						<label for="wpAppbox_user_<?php echo( $userID ); ?>_ownAffiliateApple">
							<input onClick="javascript:show_hide_options('Apple')" type="checkbox" name="wpAppbox_user_<?php echo( $userID ); ?>_ownAffiliateApple" id="wpAppbox_user_<?php echo( $userID ); ?>_ownAffiliateApple" value="1" <?php checked( get_option('wpAppbox_user_' . $userID . '_ownAffiliateApple') ); ?>/> <?php esc_html_e('I have an own affiliate ID and want to use my own ID.', 'wp-appbox'); ?>
						</label>
					</p>
					<div id="wpAppbox_user_<?php echo( $userID ); ?>_affiliateApple" <?php if(get_option('wpAppbox_user_' . $userID . '_ownAffiliateApple') != true) echo 'style="display:none;"'; ?>>
						<p style="margin-left: 24px;"><input type="text" name="wpAppbox_user_<?php echo( $userID ); ?>_affiliateApple" id="wpAppbox_user_<?php echo( $userID ); ?>_affiliateApple" value="<?php echo(get_option('wpAppbox_user_' . $userID . '_affiliateApple') ); ?>" class="regular-text" style="width: 200px;" /> <span class="description"><?php esc_html_e('Your affiliate ID at PHG. If no ID is specified, the default ID is used.', 'wpappbox'); ?></span></p>
					</div>
				</td>
			</tr>
			
			<tr>
				<th>
					<label for="wpAppbox_user_<?php echo( $userID ); ?>_Amazon">
						<?php esc_html_e('Amazon PartnerNet ID', 'wpappbox'); ?>:
					</label>
				</th>
				<td>
					<p>
						<label for="wpAppbox_user_<?php echo( $userID ); ?>_ownAffiliateAmazon">
							<input onClick="javascript:show_hide_options('Amazon')" type="checkbox" name="wpAppbox_user_<?php echo( $userID ); ?>_ownAffiliateAmazon" id="wpAppbox_user_<?php echo( $userID ); ?>_ownAffiliateAmazon" value="1" <?php checked( get_option('wpAppbox_user_' . $userID . '_ownAffiliateAmazon') ); ?> /> <?php esc_html_e('I have an own affiliate ID and want to use my own ID.', 'wp-appbox'); ?>
						</label>
					</p>
					<div id="wpAppbox_user_<?php echo( $userID ); ?>_affiliateAmazon" <?php if ( get_option('wpAppbox_user_' . $userID . '_ownAffiliateAmazon') != true ) echo( 'style="display:none;"' ); ?>>
						<p style="margin-left: 24px;">
							<input type="text" name="wpAppbox_user_<?php echo( $userID ); ?>_affiliateAmazon" id="wpAppbox_user_<?php echo( $userID ); ?>_affiliateAmazon" value="<?php echo( get_option('wpAppbox_user_' . $userID . '_affiliateAmazon') ); ?>" class="regular-text" style="width: 200px;" /> 
							<span class="description"><?php esc_html_e('Your affiliate ID at Amazon PartnerNet. If no ID is specified, the default ID is used.', 'wpappbox'); ?></span>
						</p>
					</div>
				</td>
			</tr>
			
			<tr>
				<th>
					<label for="wpAppbox_user_<?php echo( $userID ); ?>_Microsoft">
						<?php esc_html_e('Microsoft/TradeDoubler', 'wpappbox'); ?>:
					</label>
				</th>
				<td>
					<p>
						<label for="wpAppbox_user_<?php echo( $userID ); ?>_ownAffiliateMicrosoft">
							<input onClick="javascript:show_hide_options('Microsoft')" type="checkbox" name="wpAppbox_user_<?php echo( $userID ); ?>_ownAffiliateMicrosoft" id="wpAppbox_user_<?php echo( $userID ); ?>_ownAffiliateMicrosoft" value="1" <?php checked( get_option('wpAppbox_user_' . $userID . '_ownAffiliateMicrosoft') ); ?>/> <?php esc_html_e('I have an own affiliate ID and want to use my own ID.', 'wp-appbox'); ?>
						</label>
					</p>
					<div id="wpAppbox_user_<?php echo( $userID ); ?>_affiliateMicrosoft" <?php if(get_option('wpAppbox_user_' . $userID . '_ownAffiliateMicrosoft') != true) echo 'style="display:none;"'; ?>>
						<p style="margin-left: 24px;">
							<select name="wpAppbox_user_<?php echo( $userID ); ?>_affiliateMicrosoftProgram" id="wpAppbox_user_<?php echo( $userID ); ?>_affiliateMicrosoftProgram" class="postform" style="min-width:220px;">
							   <?php
							   	global $wpAppbox_MicrosoftPrivateAffiliateProgramm;
							   	foreach ( $wpAppbox_MicrosoftPrivateAffiliateProgramm as $country => $programid ) {
							   		echo( "<option class=\"level-0\" value=\"$programid\" " . selected( get_option('wpAppbox_user_' . $userID . '_affiliateMicrosoftProgram'), $programid ) . ">$country (ID: $programid)</option>" );
							   	}
							   ?>
							</select>
						</p>
						<p style="margin-left: 24px;">
							<input type="text" name="wpAppbox_user_<?php echo( $userID ); ?>_affiliateMicrosoft" id="wpAppbox_user_<?php echo( $userID ); ?>_affiliateMicrosoft" value="<?php echo( get_option('wpAppbox_user_' . $userID . '_affiliateMicrosoft') ); ?>" class="regular-text" style="width: 200px;" /> 
							<span class="description"><?php esc_html_e('Your affiliate ID (site ID) at Microsoft/TradeDoubler. If no ID is specified, the default ID is used.', 'wpappbox'); ?></span>
						</p>
					</div>
				</td>
			</tr>
			
		</table>
<?php }
}


function wpAppbox_save_custom_affiliate_id( $userID ) {
	if( !current_user_can( 'edit_user', $userID ) ) {
		return( false );
	} else {
		update_option( 'wpAppbox_user_' . $userID . '_ownAffiliateApple', $_POST['wpAppbox_user_' . $userID . '_ownAffiliateApple'], 'no' );
		update_option( 'wpAppbox_user_' . $userID . '_affiliateApple', Trim( $_POST['wpAppbox_user_' . $userID . '_affiliateApple'] ), 'no' );	
		update_option( 'wpAppbox_user_' . $userID . '_ownAffiliateAmazon', $_POST['wpAppbox_user_' . $userID . '_ownAffiliateAmazon'], 'no' );
		update_option( 'wpAppbox_user_' . $userID . '_affiliateAmazon', Trim( $_POST['wpAppbox_user_' . $userID . '_affiliateAmazon'] ), 'no' );
		update_option( 'wpAppbox_user_' . $userID . '_ownAffiliateMicrosoft', $_POST['wpAppbox_user_' . $userID . '_ownAffiliateMicrosoft'], 'no' );
		update_option( 'wpAppbox_user_' . $userID . '_affiliateMicrosoft', Trim( $_POST['wpAppbox_user_' . $userID . '_affiliateMicrosoft'] ), 'no' );
		update_option( 'wpAppbox_user_' . $userID . '_affiliateMicrosoftProgram', $_POST['wpAppbox_user_' . $userID . '_affiliateMicrosoftProgram'], 'no' );
		if ( !isset( $_POST['wpAppbox_user_' . $userID . '_ownAffiliateApple'] ) ) {
			delete_option( 'wpAppbox_user_' . $userID . '_ownAffiliateApple' );
			delete_option( 'wpAppbox_user_' . $userID . '_affiliateApple' );
		}
		if ( !isset( $_POST['wpAppbox_user_' . $userID . '_ownAffiliateAmazon'] ) ) {
			delete_option( 'wpAppbox_user_' . $userID . '_ownAffiliateAmazon' );
			delete_option( 'wpAppbox_user_' . $userID . '_affiliateAmazon' );
		}
		if ( !isset( $_POST['wpAppbox_user_' . $userID . '_ownAffiliateMicrosoft'] ) ) {
			delete_option( 'wpAppbox_user_' . $userID . '_ownAffiliateMicrosoft' );
			delete_option( 'wpAppbox_user_' . $userID . '_affiliateMicrosoft' );
			delete_option( 'wpAppbox_user_' . $userID . '_affiliateMicrosoftProgram' );
		}
	}
}


add_action( 'show_user_profile', 'wpAppbox_add_custom_affiliate_id' );
add_action( 'edit_user_profile', 'wpAppbox_add_custom_affiliate_id' );
add_action( 'personal_options_update', 'wpAppbox_save_custom_affiliate_id' );
add_action( 'edit_user_profile_update', 'wpAppbox_save_custom_affiliate_id' );


?>