<?php 
	header("HTTP/1.1 200 OK");
	header("Status: 200") ;
	header("Content-type: text/javascript");
?>

<?php include( dirname(__FILE__) . '/functions.js' ); ?>

<?php 
	require_once( '../../../../wp-blog-header.php' );
	$option = get_option( 'wpAppbox_defaultButton' );
?>

tinymce.PluginManager.add('wpAppbox_CombinedButton', function(editor, url) {
	editor.addButton('wpAppbox_AppboxButton', {
		type: 'menubutton',
		icon: 'icon wpappbox-tinymce-button',
		image : '../wp-content/plugins/wp-appbox/buttons/appbox.btn.png',
		menu: [
		
			<?php if ( ( get_option( 'wpAppbox_buttonAppbox_amazonapps' ) ) || ( $option == '1' ) ) { ?>
				{ text: 'Amazon Apps', onclick : function() {
					tinyMCE.activeEditor.execCommand('mceInsertContent', false, wpAppbox_amazonapps_button());
				}},
			<?php } ?>
			
			<?php if ( ( get_option( 'wpAppbox_buttonAppbox_appstore' ) ) || ( $option == '1' ) ) { ?>
				{ text: '(Mac) App Store', onclick : function() {
					tinyMCE.activeEditor.execCommand('mceInsertContent', false, wpAppbox_appstore_button());
				}},
			<?php } ?>
			
			<?php if ( ( get_option( 'wpAppbox_buttonAppbox_chromewebstore' ) ) || ( $option == '1' ) ) { ?>
				{ text: 'Chrome Web Store', onclick : function() {
					tinyMCE.activeEditor.execCommand('mceInsertContent', false, wpAppbox_chromewebstore_button());
				}},
			<?php } ?>
			
			<?php if ( ( get_option( 'wpAppbox_buttonAppbox_firefoxaddon' ) ) || ( $option == '1' ) ) { ?>
				{ text: 'Firefox Addons', onclick : function() {
					tinyMCE.activeEditor.execCommand('mceInsertContent', false, wpAppbox_firefoxaddon_button());
				}},
			<?php } ?>
			
			<?php if ( ( get_option( 'wpAppbox_buttonAppbox_firefoxmarketplace' ) ) || ( $option == '1' ) ) { ?>
				{ text: 'Firefox Marketplace', onclick : function() {
					tinyMCE.activeEditor.execCommand('mceInsertContent', false, wpAppbox_firefoxmarketplace_button());
				}},
			<?php } ?>
			
			<?php if ( ( get_option( 'wpAppbox_buttonAppbox_goodoldgames' ) ) || ( $option == '1' ) ) { ?>
				{ text: 'Good Old Games (GOG)', onclick : function() {
					tinyMCE.activeEditor.execCommand('mceInsertContent', false, wpAppbox_goodoldgames_button());
				}},
			<?php } ?>
			
			<?php if ( ( get_option( 'wpAppbox_buttonAppbox_googleplay' ) ) || ( $option == '1' ) ) { ?>
				{ text: 'Google Play Apps', onclick : function() {
					tinyMCE.activeEditor.execCommand('mceInsertContent', false, wpAppbox_googleplay_button());
				}},
			<?php } ?>
			
			<?php if ( ( get_option( 'wpAppbox_buttonAppbox_operaaddons' ) ) || ( $option == '1' ) ) { ?>
				{ text: 'Opera Addons', onclick : function() {
					tinyMCE.activeEditor.execCommand('mceInsertContent', false, wpAppbox_operaaddons_button());
				}},
			<?php } ?>
			
			<?php if ( ( get_option( 'wpAppbox_buttonAppbox_windowsstore' ) ) || ( $option == '1' ) ) { ?>
				{ text: 'Windows Store', onclick : function() {
					tinyMCE.activeEditor.execCommand('mceInsertContent', false, wpAppbox_windowsstore_button());
				}},
			<?php } ?>
			
			<?php if ( ( get_option( 'wpAppbox_buttonAppbox_steam' ) ) || ( $option == '1' ) ) { ?>
				{ text: 'Steam', onclick : function() {
					tinyMCE.activeEditor.execCommand('mceInsertContent', false, wpAppbox_steam_button());
				}},
			<?php } ?>
			
			<?php if ( ( get_option( 'wpAppbox_buttonAppbox_wordpress' ) ) || ( $option == '1' ) ) { ?>
				{ text: 'WordPress Plugins', onclick : function() {
					tinyMCE.activeEditor.execCommand('mceInsertContent', false, wpAppbox_wordpress_button());
				}},
			<?php } ?>
			
			<?php if ( ( get_option( 'wpAppbox_buttonAppbox_xda' ) ) || ( $option == '1' ) ) { ?>
				{ text: 'XDA Labs (Android)', onclick : function() {
					tinyMCE.activeEditor.execCommand('mceInsertContent', false, wpAppbox_xda_button());
				}},
			<?php } ?>
			
		]
	});
});