<div class="wpa-infobox wpa-notice">
    <p><?php esc_html_e('Some advanced and experimental options for users, who want to configure a little bit more.', 'wp-appbox'); ?> ;-)</p>
</div>

<h3 id="amazonapi"><?php esc_html_e('Amazon Product Advertising API', 'wp-appbox'); ?></h3>

<?php  if( !wpAppbox_checkAmazonAPI() && get_option( 'wpAppbox_amaAPIuse' ) ) { ?>
	<div class="wpa-infobox wpa-error amaAPItr" <?php if( true != get_option( 'wpAppbox_amaAPIuse' ) ) { ?> style="display:none;"<?php } ?>>
		<p><?php esc_html_e('Your public key, secret key or affiliate ID seems not correct. Please check or retry (maybe its just a server error).', 'wp-appbox'); ?> ;-)</p>
	</div>
<?php } ?>
	
<table class="form-table">

	<tr valign="top">
		<th scope="row"><label for="wpAppbox_amaAPIuse"><?php esc_html_e('Use the Amazon API', 'wp-appbox'); ?>:</label></th>
		<td colspan="2">	
			<label for="wpAppbox_amaAPIuse">
				<?php
					$helpLink = ( ( get_locale() == 'de_DE' ) ? 'https://tchgdns.de/wp-appbox-3-4-0-integration-der-amazon-product-advertising-api/' : 'https://translate.google.com/translate?sl=de&tl=en&js=y&prev=_t&hl=de&ie=UTF-8&u=https%3A%2F%2Ftchgdns.de%2Fwp-appbox-3-4-0-integration-der-amazon-product-advertising-api%2F&edit-text=&act=url' );
				?>
				<input type="checkbox" onClick="javascript:hideElementByClass('amaAPItr', 'amaAPIuse')" name="wpAppbox_amaAPIuse" id="wpAppbox_amaAPIuse" value="1" <?php checked( get_option('wpAppbox_amaAPIuse') ); ?>/>
				<?php esc_html_e('Uses the official Amazon API to get the app infos. Will be faster and more stable.', 'wp-appbox'); echo( ' ' ); printf( esc_html__( '%1$sNeed a little help?%2$s', 'wp-appbox' ), '<a href="' . $helpLink . '" target="_blank">', '</a>' ); ?>
			</label>
		</td>
	</tr>
	
	<tr valign="top" class="amaAPItr" <?php if( true != get_option( 'wpAppbox_amaAPIuse' ) ) { ?> style="display:none;"<?php } ?>>
		<th scope="row"><label for="wpAppbox_amaAPIpublicKey"><?php esc_html_e('Your public key', 'wp-appbox'); ?>:</label></th>
		<td>	
			<input type="text" style="width: 400px;" name="wpAppbox_amaAPIpublicKey" id="wpAppbox_amaAPIpublicKey" value="<?php echo( get_option('wpAppbox_amaAPIpublicKey') ); ?>" />
		</td>
	</tr>
	
	<tr valign="top" class="amaAPItr" <?php if( true != get_option( 'wpAppbox_amaAPIuse' ) ) { ?> style="display:none;"<?php } ?>>
		<th scope="row"><label for="wpAppbox_amaAPIsecretKey"><?php esc_html_e('Your secret key', 'wp-appbox'); ?>:</label></th>
		<td>	
			<input type="text" style="width: 400px;" name="wpAppbox_amaAPIsecretKey" id="wpAppbox_amaAPIsecretKey" value="<?php echo( base64_decode( get_option('wpAppbox_amaAPIsecretKey') ) ); ?>" />
		</td>
	</tr>
	
	<tr valign="top" class="amaAPItr" <?php if( true != get_option( 'wpAppbox_amaAPIuse' ) ) { ?> style="display:none;"<?php } ?>>
		<th scope="row"><label for="wpAppbox_affiliateAmazonID"><?php esc_html_e('Your affiliate ID', 'wp-appbox'); ?>:</label></th>
		<td>	
			<input type="text" style="width: 300px;" name="wpAppbox_affiliateAmazonID" id="wpAppbox_affiliateAmazonID" value="<?php echo( get_option('wpAppbox_affiliateAmazonID') ); ?>" />
		</td>
	</tr>
	
	<tr valign="top" class="amaAPItr" <?php if( true != get_option( 'wpAppbox_amaAPIuse' ) ) { ?> style="display:none;"<?php } ?>>
		<th scope="row"><label for="wpAppbox_amaAPIregion"><?php esc_html_e('Your region', 'wp-appbox'); ?>:</label></th>
		<td>
			<select style="width: 300px;" name="wpAppbox_amaAPIregion" id="wpAppbox_amaAPIregion" class="postform">
				<?php 
					ksort( $wpAppbox_amaAPIregions );
					foreach( $wpAppbox_amaAPIregions as $countryName => $countryID ) { ?>
					<option <?php selected( get_option( 'wpAppbox_amaAPIregion' ), $countryID ); ?> value="<?php echo( $countryID ); ?>" data="<?php echo( $countryID ); ?>"><?php echo( $countryName.' ['.strtoupper($countryID).']' ); ?></option>
				<?php } ?>
			</select>
		</td>
	</tr>

</table>

<hr />

<h3><?php esc_html_e('Stylesheets and Scripts', 'wp-appbox'); ?></h3>

<table class="form-table">
	
	<tr valign="top">
		<th scope="row"><label for="wpAppbox_disableDefer"><?php esc_html_e('Disable lean loading', 'wp-appbox'); ?>:</label></th>
		<td>	
			<label for="wpAppbox_disableDefer">
				<input type="checkbox" name="wpAppbox_disableDefer" id="wpAppbox_disableDefer" value="1" <?php checked( get_option('wpAppbox_disableDefer') ); ?>/>
				<?php esc_html_e('Loads stylesheet and font in the normal way (within the header)', 'wp-appbox'); ?> ;-)
			</label>
		</td>
	</tr>
	
	<tr valign="top">
		<th scope="row"><label for="wpAppbox_disableCSS"><?php esc_html_e('Disable the plugins sheet', 'wp-appbox'); ?>:</label></th>
		<td>	
			<label for="wpAppbox_disableCSS">
				<input type="checkbox" name="wpAppbox_disableCSS" id="wpAppbox_disableCSS" value="1" <?php checked( get_option('wpAppbox_disableCSS') ); ?>/>
				<?php esc_html_e('Disables the plugins stylesheets.', 'wp-appbox'); ?>
			</label>
		</td>
	</tr>
	
	<tr valign="top">
		<th scope="row"><label for="wpAppbox_disableFonts"><?php esc_html_e('Disable Google Fonts', 'wp-appbox'); ?>:</label></th>
		<td>	
			<label for="wpAppbox_disableFonts">
				<input type="checkbox" name="wpAppbox_disableFonts" id="wpAppbox_disableFonts" value="1" <?php checked( get_option('wpAppbox_disableFonts') ); ?>/>
				<?php esc_html_e('Avoid loading of Google Fonts (OpenSans) through WP-Appbox.', 'wp-appbox'); ?>
			</label>
		</td>
	</tr>
	
</table>

<hr />

<h3><?php esc_html_e('Error output & troubleshooting', 'wp-appbox'); ?></h3>

<table class="form-table">

	<tr valign="top">
		<th scope="row"><label for="wpAppbox_curlTimeout"><?php esc_html_e('Server timeout', 'wp-appbox'); ?>:</label></th>
		<td>	
			<label for="wpAppbox_curlTimeout">
				<input type="number" pattern="[0-9]*" name="wpAppbox_curlTimeout" id="wpAppbox_curlTimeout" value="<?php echo( get_option('wpAppbox_curlTimeout') ); ?>" />
				<?php printf( esc_html__( 'The recommended timeout is %1$1s seconds. Only change if apps are not found.', 'wp-appbox' ), '<strong>5</strong>' ); ?>
			</label>
		</td>
	</tr>
	
	<tr valign="top">
		<th scope="row"><label for="wpAppbox_eOnlyAuthors"><?php esc_html_e('Error messages', 'wp-appbox'); ?>:</label></th>
		<td>	
			<label for="wpAppbox_eOnlyAuthors">
				<input type="checkbox" name="wpAppbox_eOnlyAuthors" id="wpAppbox_eOnlyAuthors" value="1" <?php checked( get_option('wpAppbox_eOnlyAuthors') ); ?>/>
				<?php esc_html_e('Show "App not found"-badges only for authors.', 'wp-appbox'); ?>
			</label>
		</td>
	</tr>
	
	<tr valign="top">
		<th scope="row"><label for="wpAppbox_eOutput"><?php esc_html_e('Error output', 'wp-appbox'); ?>:</label></th>
		<td>	
			<label for="wpAppbox_eOutput">
				<input type="checkbox" name="wpAppbox_eOutput" id="wpAppbox_eOutput" value="1" <?php checked( get_option('wpAppbox_eOutput') ); ?>/>
				<?php esc_html_e('Activate error output. Only visible to administrators.', 'wp-appbox'); ?>
			</label>
		</td>
	</tr>
	
	<tr valign="top">
		<th scope="row"><label for="wpAppbox_eImageApple"><?php esc_html_e('Apple App Store Icons', 'wp-appbox'); ?>:</label></th>
		<td>	
			<label for="wpAppbox_eImageApple">
				<input type="checkbox" name="wpAppbox_eImageApple" id="wpAppbox_eImageApple" value="1" <?php checked( get_option('wpAppbox_eImageApple') ); ?>/>
				<?php esc_html_e('Compatibility mode for app icons from the (Mac) App Store.', 'wp-appbox'); ?>
			</label>
		</td>
	</tr>
	
</table>

<hr />

<h3><?php esc_html_e('Experimental', 'wp-appbox'); ?></h3>

<table class="form-table">

	<tr valign="top">
		<th scope="row"><label for="wpAppbox_sslAppleImages"><?php esc_html_e('SSL for Apple App Store', 'wp-appbox'); ?>:</label></th>
		<td>	
			<label for="wpAppbox_sslAppleImages">
				<input type="checkbox" name="wpAppbox_sslAppleImages" id="wpAppbox_sslAppleImages" value="1" <?php checked( get_option('wpAppbox_sslAppleImages') ); ?>/>
				<input type="checkbox" name="wpAppbox_sslAppleImagesVerify" id="wpAppbox_sslAppleImagesVerify" value="1" <?php checked( get_option('wpAppbox_sslAppleImages') ); ?>/>
				<?php esc_html_e('Use SSL urls for images from the Apple App Store. Highly experimental, some images may not exist on https server.', 'wp-appbox'); ?>
			</label>
		</td>
	</tr>
	
	<tr valign="top">
		<th scope="row"><label for="wpAppbox_autoLinks"><?php esc_html_e('Auto-detect app links', 'wp-appbox'); ?>:</label></th>
		<td>	
			<label for="wpAppbox_autoLinks">
				<input type="checkbox" name="wpAppbox_autoLinks" id="wpAppbox_autoLinks" value="1" <?php checked( get_option('wpAppbox_autoLinks') ); ?>/>
				<input type="checkbox" name="wpAppbox_autoLinksVerify" id="wpAppbox_autoLinksVerify" value="1" <?php checked( get_option('wpAppbox_autoLinks') ); ?>/>
				<?php esc_html_e('Detect urls of apps in a separated line within the post.', 'wp-appbox'); ?> <?php esc_html_e('Very experimental, but it should work.', 'wp-appbox'); ?>
			</label>
		</td>
	</tr>
		
</table>