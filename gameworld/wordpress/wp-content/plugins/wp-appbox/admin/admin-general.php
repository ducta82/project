<h3><?php esc_html_e('Output settings', 'wp-appbox'); ?></h3>

<p><?php esc_html_e('Some basic settings for the WP-Appbox and the badges. ;)', 'wp-appbox'); ?></p>

<table class="form-table">

	<tr valign="top">
		<th scope="row"><label for="wpAppbox_defaultStyle"><?php esc_html_e('Standard App-Badge', 'wp-appbox'); ?></label></th>
		<td colspan="7">
			<select name="wpAppbox_defaultStyle" id="wpAppbox_defaultStyle" class="postform" style="min-width:220px;">
			   <option class="level-0" value="1" <?php selected( get_option('wpAppbox_defaultStyle'), '1' ); ?>><?php esc_html_e('Simple Badge', 'wp-appbox'); ?> (<?php esc_html_e('Default', 'wp-appbox'); ?>)</option> 
			   <option class="level-0" value="3" <?php selected( get_option('wpAppbox_defaultStyle'), '3' ); ?>><?php esc_html_e('Screenshots', 'wp-appbox'); ?></option>
			   <option class="level-0" value="4" <?php selected( get_option('wpAppbox_defaultStyle'), '4' ); ?>><?php esc_html_e('Screenshots Only', 'wp-appbox'); ?></option>
			   <option class="level-0" value="2" <?php selected( get_option('wpAppbox_defaultStyle'), '2' ); ?>><?php esc_html_e('Compact Badge', 'wp-appbox'); ?></option> 
			</select>
			<label for="wpAppbox_defaultStyle"><?php esc_html_e('What app banners to be used in operation without format specification within the shortcodes?', 'wp-appbox'); ?></label>
			<br /><br />
			<img id="wpAppbox_bannerPreview" src="<?php echo( plugins_url( 'img/banner-' . $wpAppbox_styleNames[get_option('wpAppbox_defaultStyle')] . '.jpg', dirname( __FILE__ ) ) ); ?>" style="width:350px;" />
			<script>
				jQuery( "#wpAppbox_defaultStyle" ).change(function() {
					value = jQuery(this).val();
					<?php
						foreach ( $wpAppbox_styleNames as $styleID => $styleName ) {
							echo( "value$styleID = '" . plugins_url( 'img/banner-' . $styleName . '.jpg', dirname( __FILE__ ) ) ) . "';";
						}
					?>
					jQuery("#wpAppbox_bannerPreview").attr( "src", eval('value'+value) );
				});
			</script>
		</td>
	</tr>

	<tr valign="top">
		<th scope="row"><label for="wpAppbox_showRating"><?php esc_html_e('App-Ratings', 'wp-appbox'); ?>:</label></th>
		<td>	
			<label for="wpAppbox_showRating">
				<input type="checkbox" name="wpAppbox_showRating" id="wpAppbox_showRating" value="1" <?php checked( get_option('wpAppbox_showRating') ); ?>/>
				<?php esc_html_e('Show app-ratings from the stores in the banner (Variable {RATING} in the template-files)', 'wp-appbox'); ?>
			</label>
		</td>
	</tr>
	
	<tr valign="top">
		<th scope="row"><label for="wpAppbox_colorfulIcons"><?php esc_html_e('Colored store icons', 'wp-appbox'); ?>:</label></th>
		<td>	
			<label for="wpAppbox_colorfulIcons">
				<input type="checkbox" name="wpAppbox_colorfulIcons" id="wpAppbox_colorfulIcons" value="1" <?php checked( get_option('wpAppbox_colorfulIcons') ); ?>/>
				<?php esc_html_e('Show colored icons of the stores instead of the grey ones', 'wp-appbox'); ?>
			</label>
		</td>
	</tr>
	
	<tr valign="top">
		<th scope="row"><label for="wpAppbox_nofollow"><?php esc_html_e('Nofollow', 'wp-appbox'); ?>:</label></th>
		<td>	
			<label for="wpAppbox_nofollow">
				<input type="checkbox" name="wpAppbox_nofollow" id="wpAppbox_nofollow" value="1" <?php checked( get_option('wpAppbox_nofollow') ); ?>/>
				<?php esc_html_e('Adds the <a href="http://en.wikipedia.org/wiki/Nofollow" target="_blank">nofollow</a> attribute to the links', 'wp-appbox'); ?>
			</label>
		</td>
	</tr>
	
	<tr valign="top">
		<th scope="row"><label for="wpAppbox_targetBlank"><?php esc_html_e('Open links in a new window', 'wp-appbox'); ?>:</label></th>
		<td>	
			<label for="wpAppbox_targetBlank">
				<input type="checkbox" name="wpAppbox_targetBlank" id="wpAppbox_targetBlank" value="1" <?php checked( get_option('wpAppbox_targetBlank') ); ?>/>
				<?php esc_html_e('Opens the links of apps in a new window (target="_blank")', 'wp-appbox'); ?>
			</label>
		</td>
	</tr>
	
	<tr valign="top">
		<th scope="row"><label for="wpAppbox_downloadCaption"><?php esc_html_e('Downloadbutton caption', 'wp-appbox'); ?>:</label></th>
		<td>
			<input type="text" name="wpAppbox_downloadCaption" id="wpAppbox_downloadCaption" value="<?php echo( get_option('wpAppbox_downloadCaption') ); ?>" /> <label for="wpAppbox_downloadtext"><?php esc_html_e('Caption of the "Download"-button in the app-badge', 'wp-appbox'); ?></label>
		</td>
	</tr>
	
</table>

<hr />

<h3><?php esc_html_e('Caching options', 'wp-appbox'); ?></h3>

<p><?php esc_html_e('The caching interval indicate how often the data is updated from the server - this increases the performance, and should not really be changed.', 'wp-appbox'); ?></p>

<table class="form-table">

	<tr valign="top">
		<th scope="row"><label for="wpAppbox_cacheTime"><?php esc_html_e('Data caching (minutes)', 'wp-appbox'); ?>:</label></th>
		<td>
			<input type="number" <?php disabled( get_option('wpAppbox_disableAutoCache') ); ?> pattern="[0-9]*" name="wpAppbox_cacheTime" id="wpAppbox_cacheTime" value="<?php echo( get_option('wpAppbox_cacheTime') ); ?>" /> <label for="wpAppbox_cacheTime"><?php esc_html_e('The recommended interval is <strong>600</strong> minutes', 'wp-appbox'); ?></label>
		</td>
	</tr>

	<tr valign="top">
		<th scope="row"><label for="wpAppbox_cacheTime"><?php esc_html_e('Disable Auto-Caching', 'wp-appbox'); ?>:</label></th>
		<td>
			<label for="wpAppbox_disableAutoCache">
				<input type="checkbox" onClick="javascript:disableInput('cacheTime', 'disableAutoCache')" name="wpAppbox_disableAutoCache" id="wpAppbox_disableAutoCache" value="1" <?php checked( get_option('wpAppbox_disableAutoCache') ); ?>/>
				<?php esc_html_e('Disables the automatic renewal of the cache (not for authors)', 'wp-appbox'); ?>
			</label>
		</td>
	</tr>
	
	<tr valign="top">
		<th scope="row"><label for="wpAppbox_cachePlugin"><?php esc_html_e('Clear Post-Cache', 'wp-appbox'); ?>:</label></th>
		<td colspan="7">
			<select name="wpAppbox_cachePlugin" id="wpAppbox_cachePlugin" class="postform">
			  	<option <?php selected( get_option('wpAppbox_cachePlugin'), '0' ); ?> class="level-0" value="0">--------- <?php esc_html_e('Disabled', 'wp-appbox'); ?> ---------</option>
			  	<option <?php selected( get_option('wpAppbox_cachePlugin'), 'cachify' ); ?> class="level-0" value="cachify"><?php esc_html_e('Plugin', 'wp-appbox'); ?>: <?php esc_html_e('Cachify', 'wp-appbox'); ?></option>
			  	<option <?php selected( get_option('wpAppbox_cachePlugin'), 'w3-total-cache' ); ?> class="level-0" value="w3-total-cache"><?php esc_html_e('Plugin', 'wp-appbox'); ?>: <?php esc_html_e('W3 Total Cache', 'wp-appbox'); ?></option>
			  	<option <?php selected( get_option('wpAppbox_cachePlugin'), 'wp-super-cache' ); ?> class="level-0" value="wp-super-cache"><?php esc_html_e('Plugin', 'wp-appbox'); ?>: <?php esc_html_e('WP Super Cache', 'wp-appbox'); ?></option>
			  	<option <?php selected( get_option('wpAppbox_cachePlugin'), 'wp-rocket' ); ?> class="level-0" value="wp-rocket"><?php esc_html_e('Plugin', 'wp-appbox'); ?>: <?php esc_html_e('WP Rocket', 'wp-appbox'); ?></option>
			  	<option <?php selected( get_option('wpAppbox_cachePlugin'), 'wp-fastest-cache' ); ?> class="level-0" value="wp-fastest-cache"><?php esc_html_e('Plugin', 'wp-appbox'); ?>: <?php esc_html_e('WP Fastest Cache', 'wp-appbox'); ?></option>
			  	<option <?php selected( get_option('wpAppbox_cachePlugin'), 'zencache' ); ?> class="level-0" value="zencache"><?php esc_html_e('Plugin', 'wp-appbox'); ?>: <?php esc_html_e('ZenCache', 'wp-appbox'); ?></option>
			</select>
			<label for="wpAppbox_cachePlugin"><?php esc_html_e('Clears the post-cache of 3rd-party-plugins (only manually via the "Reload"-link)', 'wp-appbox'); ?></label>
		</td>
	</tr>
	
</table>

<hr />

<h3><?php esc_html_e('Stylesheets and Scripts', 'wp-appbox'); ?></h3>

<p><?php esc_html_e('Use this options for optimization and customizing. You should know what you\'re doing.', 'wp-appbox'); ?> ;-)</p>

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

<p><?php esc_html_e('The error output should only be turned on in case of problems. The design can be separated.', 'wp-appbox'); ?></p>

<table class="form-table">

	<tr valign="top">
		<th scope="row"><label for="wpAppbox_curlTimeout"><?php esc_html_e('Server timeout', 'wp-appbox'); ?>:</label></th>
		<td>	
			<label for="wpAppbox_curlTimeout">
				<input type="number" pattern="[0-9]*" name="wpAppbox_curlTimeout" id="wpAppbox_curlTimeout" value="<?php echo( get_option('wpAppbox_curlTimeout') ); ?>" />
				<?php esc_html_e('The recommended timeout is <strong>5</strong> seconds. Only change if apps are not found.', 'wp-appbox'); ?>
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
		<th scope="row"><label for="wpAppbox_eOutput"><?php esc_html_e('Parse output', 'wp-appbox'); ?>:</label></th>
		<td>	
			<label for="wpAppbox_eOutput">
				<input type="checkbox" name="wpAppbox_eOutput" id="wpAppbox_eOutput" value="1" <?php checked( get_option('wpAppbox_eOutput') ); ?>/>
				<?php esc_html_e('Activate parse output. Only visible to administrators.', 'wp-appbox'); ?>
			</label>
		</td>
	</tr>
	
	<tr valign="top">
		<th scope="row"><?php esc_html_e('Disable cache', 'wp-appbox'); ?>:</th>
		<td>	
			<?php esc_html_e('The cache can only be temporarily disabled by adding "?wpappbox_nocache" is appended to the URL of an article. Only for "authors".', 'wp-appbox'); ?>
		</td>
	</tr>
	
	<tr valign="top">
		<th scope="row"><?php esc_html_e('Force reloading', 'wp-appbox'); ?>:</th>
		<td>	
			<?php esc_html_e('If reloading of app-data (despite cache) is to be forced, then does this by "?wpappbox_reload_cache" is appended to the URL of an article. Only users, who are at least author.', 'wp-appbox'); ?>
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

<p><?php esc_html_e('Highly experimental options. You need to double-check an option to activate it.', 'wp-appbox'); ?></p>

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
		
</table>