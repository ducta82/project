<?php

function wpAppbox_checkIfCachePlugin() {
	$cachePlugin = '';
	if ( has_action( 'cachify_remove_post_cache' ) ) {
		$cachePlugin = 'cachify';
	}
	else if ( function_exists( 'w3tc_pgcache_flush_post' ) ) {
		$cachePlugin = 'W3 Total Cache';
	}
	else if ( function_exists( 'wp_cache_post_change' ) ) {
		$cachePlugin = 'WP Super Cache';
	}
	else if ( function_exists( 'rocket_clean_post' ) ) {
		$cachePlugin = 'WP Rocket';
	}
	else if ( isset( $GLOBALS['wp_fastest_cache'] ) && method_exists( $GLOBALS['wp_fastest_cache'], 'singleDeleteCache' ) ) {
		$cachePlugin = 'WP Fastest Cache';
	}
	else if ( isset( $GLOBALS['zencache'] ) && method_exists( $GLOBALS['zencache'], 'auto_clear_post_cache' ) ) {
		$cachePlugin = 'ZenCache';
	}	
	else if ( has_action( 'ce_clear_post_cache' ) ) {
	    $cachePlugin = 'Cache Enabler';
	}
	return( $cachePlugin );
}
	
?>

<script>
	function show_hide_cache_table() {
		var status = wpAppbox_disableCache.checked;
		var table = document.getElementById("table_caching_options");
		if( status == false ) { table.style.display = ""; }
		else { table.style.display = "none"; }
	}
</script>

<div class="wpa-infobox wpa-notice">
    <p><?php esc_html_e('The caching interval indicate how often the data is updated from the server - this increases the performance, and should not really be changed.', 'wp-appbox'); ?></p>
</div>

<table class="form-table" id="table_caching_options">
	
	<tr valign="top">
		<th scope="row"><label for="wpAppbox_cacheTime"><?php esc_html_e('Data caching (minutes)', 'wp-appbox'); ?>:</label></th>
		<td>
			<input type="number" <?php disabled( get_option('wpAppbox_disableAutoCache') ); ?> pattern="[0-9]*" name="wpAppbox_cacheTime" id="wpAppbox_cacheTime" value="<?php echo( get_option('wpAppbox_cacheTime') ); ?>" /> <label for="wpAppbox_cacheTime"><?php printf( esc_html__( 'The recommended interval is %1$s minutes.', 'wp-appbox' ), '<strong>600</strong>' ); ?></label>
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
			  	<option <?php selected( get_option('wpAppbox_cachePlugin'), 'cache-enabler' ); ?> class="level-0" value="cache-enabler"><?php esc_html_e('Plugin', 'wp-appbox'); ?>: <?php esc_html_e('Cache Enabler', 'wp-appbox'); ?></option>
			</select>
			<label for="wpAppbox_cachePlugin"><?php esc_html_e('Clears the post-cache of 3rd-party-plugins (only manually via the "Reload"-link)', 'wp-appbox'); ?></label>
		</td>
	</tr>
	
</table>