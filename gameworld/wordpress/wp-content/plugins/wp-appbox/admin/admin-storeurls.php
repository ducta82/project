<?php if ( function_exists('curl_version') ):
	$ch = curl_init();
	curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	curl_setopt( $ch, CURLOPT_URL, 'https://api.ip2country.info/ip?' . $_SERVER['SERVER_ADDR'] );
	$result = curl_exec( $ch );
	curl_close( $ch );
	$json = json_decode( $result );
	$countryName = '';
	if ( '' != $json->countryName ):
		$countryName = ' ' . sprintf( esc_html__( 'Your servers location is %1$s', 'wp-appbox' ), '<a href="https://api.ip2country.info/ip?' . $_SERVER['SERVER_ADDR'] . '" target="_blank">' . __( $json->countryName, 'wp-appbox' ) . '</a>.' );
	endif;
endif; ?>

<div class="update-nag wpa-update-nag">
    <p><?php esc_html_e('Here you can change the query URL of the stores. Just copy the desired URL and set instead of the app ID wildcard {APPID}. If the URL is empty, the default URL (German) is used.', 'wp-appbox'); ?></p>
</div>

<table class="form-table">

	<?php foreach( $wpAppbox_storeNames as $storeID => $storeName ) { ?>
	
		<tr valign="top">
			<th scope="row"><?php echo( $wpAppbox_storeNames[$storeID] ); ?>:</th>
			<td>	
				<?php 
					if ( in_array( $storeID, $wpAppbox_storeURL_noLanguages ) ):
						echo( __('No language selection supported.', 'wp-appbox') . $countryName ); 
					else:
					?>
					<?php 
						if ( ('amazonapps' == $storeID) && ( wpAppbox_checkAmazonAPI() ) ) {
							printf( esc_html__( 'Official Amazon Product Advertising API is activated and valid. Please change your region %1$sin this tab%2$s.', 'wp-appbox' ), '<a href="options-general.php?page=wp-appbox&tab=advanced#amazonapi">', '</a>' );
							continue; 
						}
					?>
					<select style="width: 185px;" onChange="javascript:show_hide_box('<?php echo( $storeID ); ?>')" name="wpAppbox_storeURL_<?php echo( $storeID ); ?>" id="wpAppbox_storeURL_<?php echo( $storeID ); ?>" class="postform">
						<option <?php selected( get_option( 'wpAppbox_storeURL_'.$storeID ), '0' ); ?> value="0" data="<?php echo( get_option( 'wpAppbox_storeURL_'.$storeID.'_URL' ) ); ?>"><?php echo( $wpAppbox_storeURL_languages[0] ); ?></option>
						<?php 
							asort( $wpAppbox_storeURL_languages );
							foreach( $wpAppbox_storeURL_languages as $languageID => $languageNameCode ) { ?>
							<?php if ( ( '0' != $languageID ) && isset( $wpAppbox_storeURL[$storeID][$languageID] ) && ( '' != $wpAppbox_storeURL[$storeID][$languageID] ) ) { ?>
								<option <?php selected( get_option( 'wpAppbox_storeURL_' . $storeID ), $languageID); ?> value="<?php echo( $languageID ); ?>" data="<?php echo( $wpAppbox_storeURL[$storeID][$languageID] ); ?>"><?php echo( $languageNameCode['name'] ); ?></option>
							<?php } ?>
						<?php } ?>
					</select>
					<input <?php if( get_option( 'wpAppbox_storeURL_'.$storeID ) != 0) { echo 'disabled="disabled"'; } ?> type="text" value="<?php echo( get_option( 'wpAppbox_storeURL_'.$storeID ) == '0' ) ? get_option('wpAppbox_storeURL_URL_'.$storeID) : $wpAppbox_storeURL[$storeID][get_option( 'wpAppbox_storeURL_'.$storeID )]; ?>" name="wpAppbox_storeURL_URL_<?php echo( $storeID ); ?>" id="wpAppbox_storeURL_URL_<?php echo( $storeID ); ?>" style="width:500px;" />
				<?php endif; ?>
			</td>
		</tr>
			
	<?php } ?>
	
</table>

<script>
	function show_hide_box(store) {
		var box = document.getElementById("wpAppbox_storeURL_"+store);
		var attr = document.getElementById("wpAppbox_storeURL_"+store).options[box.selectedIndex].getAttribute("data");
		var txt = document.getElementById("wpAppbox_storeURL_URL_"+store);
		txt.value = attr;
		if(box.selectedIndex == 0) txt.disabled = false;
		else txt.disabled = true;
	}
</script>


