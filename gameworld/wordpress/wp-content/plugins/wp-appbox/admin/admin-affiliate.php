<div class="wpa-infobox wpa-notice">
    <p><?php esc_html_e('If you have an affiliate ID for the (Mac) App Store, Amazon and Windows Store, you can enter your ID and links will be provided with your affiliate ID attached. Otherwise the plugin will use the affiliate ID of the developer. Development takes time and time again. ;-)', 'wp-appbox'); ?></p>
</div>

<h3><?php esc_html_e('(Mac) App Store &amp; App Store: PHG', 'wp-appbox'); ?></h3>


<table class="form-table">

	<tr valign="top">
		<th scope="row"><label for="wpAppbox_affiliateApple"><?php esc_html_e('Use my own ID', 'wp-appbox'); ?>:</label></th>
		<td>	
			<label for="wpAppbox_affiliateApple"><input type="checkbox" name="wpAppbox_affiliateApple" id="wpAppbox_affiliateApple" value="1" <?php checked( get_option('wpAppbox_affiliateApple') ); ?>/> <?php esc_html_e('I have an ID at Apple/PHG and would like to use my own ID.', 'wp-appbox'); ?></label>
		</td>
	</tr>
	
	<tr valign="top" class="affiliateApple" <?php if ( !get_option('wpAppbox_affiliateApple') ) echo( ' style="display:none;"' ); ?>>
		<th scope="row"><label for="wpAppbox_affiliateAppleID"><?php esc_html_e('Affiliate Token', 'wp-appbox'); ?>:</label></th>
		<td>
			<input type="text" name="wpAppbox_affiliateAppleID" id="wpAppbox_affiliateAppleID" value="<?php echo( get_option('wpAppbox_affiliateAppleID') ); ?>" />
		</td>
	</tr>
	
</table>

<hr />

<h3><?php esc_html_e('Amazon Apps: Amazon PartnerNet', 'wp-appbox'); ?></h3>

<table class="form-table">

	<tr valign="top" <?php if ( !wpAppbox_checkAmazonAPI() ) echo( ' style="display:none;"' ); ?>>
		<th scope="row" style="font-weight:normal;">	
			<?php printf( esc_html__( 'Official Amazon Product Advertising API is activated and valid. Please change your affiliate settings %1$sin this tab%2$s.', 'wp-appbox' ), '<a href="options-general.php?page=wp-appbox&tab=advanced#amazonapi">', '</a>' ); ?>
		</th>
	</tr>

	<tr valign="top" <?php if ( wpAppbox_checkAmazonAPI() ) echo( ' style="display:none;"' ); ?>>
		<th scope="row"><label for="wpAppbox_affiliateAmazon"><?php esc_html_e('Use my own ID', 'wp-appbox'); ?>:</label></th>
		<td>	
			<label for="wpAppbox_affiliateAmazon"><input type="checkbox" name="wpAppbox_affiliateAmazon" id="wpAppbox_affiliateAmazon" value="1" <?php checked(get_option('wpAppbox_affiliateAmazon') ); ?>/> <?php esc_html_e('I have an affiliate ID at Amazon PartnerNet and want to use my own ID.', 'wp-appbox'); ?></label>
		</td>
	</tr>
	
	<tr valign="top" class="affiliateAmazon" <?php if ( wpAppbox_checkAmazonAPI() || !get_option('wpAppbox_affiliateAmazon') ) echo( ' style="display:none;"' ); ?>>
		<th scope="row"><label for="wpAppbox_affiliateAmazonID"><?php esc_html_e('Amazon PartnerNet ID', 'wp-appbox'); ?>:</label></th>
		<td>	
			<input type="text" name="wpAppbox_affiliateAmazonID" id="wpAppbox_affiliateAmazonID" value="<?php echo( get_option('wpAppbox_affiliateAmazonID') ); ?>" />
		</td>
	</tr>
	
</table>

<hr />

<h3><?php esc_html_e('Windows Store: Microsoft Private Affiliate Program at TradeDoubler', 'wp-appbox'); ?></h3>

<table class="form-table">

	<tr valign="top">
		<th scope="row"><label for="wpAppbox_affiliateMicrosoft"><?php esc_html_e('Use my own ID', 'wp-appbox'); ?>:</label></th>
		<td>	
			<label for="wpAppbox_affiliateMicrosoft"><input type="checkbox" name="wpAppbox_affiliateMicrosoft" id="wpAppbox_affiliateMicrosoft" value="1" <?php checked( get_option('wpAppbox_affiliateMicrosoft') ); ?>/> <?php esc_html_e('I have an affiliate ID at the Microsoft Private Affiliate Program and want to use my own ID.', 'wp-appbox'); ?></label>
		</td>
	</tr>
	
	<tr valign="top" class="affiliateMicrosoft" <?php if ( !get_option('wpAppbox_affiliateMicrosoft') ) echo( ' style="display:none;"' ); ?>>
		<th scope="row"><label for="wpAppbox_affiliateMicrosoftProgram"><?php esc_html_e('Country/Program ID', 'wp-appbox'); ?>:</label></th>
		<td>
			<select name="wpAppbox_affiliateMicrosoftProgram" id="wpAppbox_affiliateMicrosoftProgram" class="postform" style="min-width:220px;">
			   <?php
			   	global $wpAppbox_MicrosoftPrivateAffiliateProgramm;
			   	foreach ( $wpAppbox_MicrosoftPrivateAffiliateProgramm as $country => $programid ) {
			   		echo( "<option class=\"level-0\" value=\"$programid\" " . selected( get_option('wpAppbox_affiliateMicrosoftProgram'), $programid ) . ">$country (ID: $programid)</option>" );
			   	}
			   ?>
			</select>
		</td>
	</tr>
	
	<tr valign="top" class="affiliateMicrosoft" <?php if ( !get_option('wpAppbox_affiliateMicrosoft') ) echo( ' style="display:none;"' ); ?>>
		<th scope="row"><label for="wpAppbox_affiliateMicrosoftID"><?php esc_html_e('Your Site ID', 'wp-appbox'); ?>:</label></th>
		<td>	
			<input type="text" name="wpAppbox_affiliateMicrosoftID" id="wpAppbox_affiliateMicrosoftID" value="<?php echo( get_option('wpAppbox_affiliateMicrosoftID') ); ?>" />
		</td>
	</tr>
	
</table>

<hr />

<h3><?php esc_html_e('Custom affiliate IDs', 'wp-appbox'); ?></h3>

<table class="form-table">

	<tr valign="top">
		<th scope="row"><label for="wpAppbox_userAffiliate"><?php esc_html_e('Activate custom ID', 'wp-appbox'); ?>:</label></th>
		<td>	
			<label for="wpAppbox_userAffiliate"><input type="checkbox" name="wpAppbox_userAffiliate" id="wpAppbox_userAffiliate" value="1" <?php checked(get_option('wpAppbox_userAffiliate') ); ?>/><?php esc_html_e('Each user and author can use his own affiliate IDs. If no ID is specified in the user profile, the global IDs are used.', 'wp-appbox'); ?></label>
		</td>
	</tr>
	
</table>


<script>

	$j=jQuery.noConflict();
	
	$j("#wpAppbox_affiliateApple").click(function () {
		if ( $j(this).attr('checked') ) {
			$j('tr.affiliateApple').show();
		} else {
			$j('tr.affiliateApple').hide();
		}
	} );
	
	<?php if ( !wpAppbox_checkAmazonAPI() ): ?>
	$j("#wpAppbox_affiliateAmazon").click(function () {
		if ( $j(this).attr('checked') ) {
			$j('tr.affiliateAmazon').show();
		} else {
			$j('tr.affiliateAmazon').hide();
		}
	} );
	<?php endif; ?>
	
	$j("#wpAppbox_affiliateMicrosoft").click(function () {
		if ( $j(this).attr('checked') ) {
			$j('tr.affiliateMicrosoft').show();
		} else {
			$j('tr.affiliateMicrosoft').hide();
		}
	} );
		
</script>