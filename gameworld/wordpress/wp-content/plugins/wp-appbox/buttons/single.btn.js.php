<?php 
	header("HTTP/1.1 200 OK");
	header("Status: 200") ;
	header("Content-type: text/javascript");
?>

<?php include( dirname(__FILE__) . '/functions.js' ); ?>

(function() {
	tinymce.create('tinymce.plugins.wpAppbox_StoreButtons', {
		init : function(ed, url){
		
		ed.addButton('wpAppbox_AmazonAppsButton', {
			title : 'Amazon Apps Appbox',
			onclick : function() {
				ed.execCommand('mceInsertContent', false, wpAppbox_amazonapps_button());
			},
			image: url + "/amazonapps.btn.png"
		});
		
		ed.addButton('wpAppbox_AppStoreButton', {
			title : '(Mac) App Store Appbox',
			onclick : function() {
				ed.execCommand('mceInsertContent', false, wpAppbox_appstore_button());
			},
			image: url + "/appstore.btn.png"
		});
		
		ed.addButton('wpAppbox_ChromeWebStoreButton', {
			title : 'Chrome Web Store Appbox',
			onclick : function() {
				ed.execCommand('mceInsertContent', false, wpAppbox_chromewebstore_button());
			},
			image: url + "/chromewebstore.btn.png"
		});
		
		ed.addButton('wpAppbox_FirefoxAddonButton', {
			title : 'Firefox Erweiterungen Appbox',
			onclick : function() {
				ed.execCommand('mceInsertContent', false, wpAppbox_firefoxaddon_button());
			},
			image: url + "/firefoxaddon.btn.png"
		});
		
		ed.addButton('wpAppbox_FirefoxMarketplaceButton', {
			title : 'Firefox Marketplace Appbox',
			onclick : function() {
				ed.execCommand('mceInsertContent', false, wpAppbox_firefoxmarketplace_button());
			},
			image: url + "/firefoxmarketplace.btn.png"
		});
		
		ed.addButton('wpAppbox_GoodOldGamesButton', {
			title : 'Good Old Games (GOG.com) Appbox',
			onclick : function() {
				ed.execCommand('mceInsertContent', false, wpAppbox_goodoldgames_button());
			},
			image: url + "/goodoldgames.btn.png"
		});
		
		ed.addButton('wpAppbox_GooglePlayButton', {
			title : 'Google Play Appbox',
			onclick : function() {
				ed.execCommand('mceInsertContent', false, wpAppbox_googleplay_button());
			},
			image: url + "/googleplay.btn.png"
		});
		
		ed.addButton('wpAppbox_OperaAddonsButton', {
			title : 'Opera Add-ons Appbox',
			onclick : function() {
				ed.execCommand('mceInsertContent', false, wpAppbox_operaaddons_button());
			},
			image: url + "/operaaddons.btn.png"
		});
		
		ed.addButton('wpAppbox_SteamButton', {
			title : 'Steam Appbox',
			onclick : function() {
				ed.execCommand('mceInsertContent', false, wpAppbox_steam_button());
			},
			image: url + "/steam.btn.png"
		});
		
		ed.addButton('wpAppbox_WindowsStoreButton', {
			title : 'Windows Store Appbox',
			onclick : function() {
				ed.execCommand('mceInsertContent', false, wpAppbox_windowsstore_button());
			},
			image: url + "/windowsstore.btn.png"
		});
		
		ed.addButton('wpAppbox_WordPressButton', {
			title : 'Wordpress Plugin-Verzeichnis Appbox',
			onclick : function() {
				ed.execCommand('mceInsertContent', false, wpAppbox_wordpress_button());
			},
			image: url + "/wordpress.btn.png"
		});
		
		ed.addButton('wpAppbox_XDAButton', {
			title : 'XDA Labs (Android) Appbox',
			onclick : function() {
				ed.execCommand('mceInsertContent', false, wpAppbox_xda_button());
			},
			image: url + "/xda.btn.png"
		});
	
		}
	
	});
	tinymce.PluginManager.add('wpAppboxSingle', tinymce.plugins.wpAppbox_StoreButtons);
})();