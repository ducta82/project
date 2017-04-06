<?php 
	header("HTTP/1.1 200 OK");
	header("Status: 200") ;
	header("Content-type: text/javascript");
?>

<?php include( dirname(__FILE__) . '/functions.js' ); ?>

<?php 
	require_once('../../../../wp-blog-header.php'); 
	$option = get_option('wpAppbox_buttonDefault');
?>


(function() {
    tinymce.create('tinymce.plugins.wpAppbox_CombinedButton', {

    	
        createControl: function(n, cm) {
            switch (n) {
                case 'wpAppbox_AppboxButton':
                var c = cm.createSplitButton('wpAppbox_AppboxButton', {
                    title : 'WP-Appbox',
                    image : '../wp-content/plugins/wp-appbox/buttons/appbox.btn.png',
                    onclick : function() {showMenu();}
                });
                c.onRenderMenu.add(function(c, m) {
                 		
                <?php if(get_option('wpAppbox_buttonAppbox_amazonapps') || ($option == '1')) { ?>      
                  m.add({title : 'Amazon Apps', onclick : function() {
                  	tinyMCE.activeEditor.execCommand('mceInsertContent',false,wpAppbox_amazonapps_button())
                  }});
                <?php } ?>
                
                <?php if(get_option('wpAppbox_buttonAppbox_appstore') || ($option == '1')) { ?>
					m.add({title : '(Mac) App Store', onclick : function() {
						tinyMCE.activeEditor.execCommand('mceInsertContent',false,wpAppbox_appstore_button())
					}});
				<?php } ?>
				
				<?php if(get_option('wpAppbox_buttonAppbox_chromewebstore') || ($option == '1')) { ?>      
					m.add({title : 'Chrome Web Store', onclick : function() {
				    tinyMCE.activeEditor.execCommand('mceInsertContent',false,wpAppbox_chromewebstore_button())
				    }});
				<?php } ?>
				
				<?php if(get_option('wpAppbox_buttonAppbox_firefoxaddon') || ($option == '1')) { ?>      
				  m.add({title : 'Firefox Erweiterungen', onclick : function() {
				  	tinyMCE.activeEditor.execCommand('mceInsertContent',false,wpAppbox_firefoxaddon_button())
				  }});
				<?php } ?>
     
		     	<?php if(get_option('wpAppbox_buttonAppbox_firefoxmarketplace') || ($option == '1')) { ?>  
		          m.add({title : 'Firefox Marketplace', onclick : function() {
		          	tinyMCE.activeEditor.execCommand('mceInsertContent',false,wpAppbox_firefoxmarketplace_button())
		          }});
		     	<?php } ?>
		     	
		     	<?php if(get_option('wpAppbox_buttonAppbox_goodoldgames') || ($option == '1')) { ?>
		     		m.add({title : 'Good Old Games (GOG.com)', onclick : function() {
		     			tinyMCE.activeEditor.execCommand('mceInsertContent',false,wpAppbox_goodoldgames_button())
		     		}});
		     	<?php } ?>
     	
     			<?php if(get_option('wpAppbox_buttonAppbox_googleplay') || ($option == '1')) { ?>	
			         m.add({title : 'Google Play', onclick : function() {
			     		tinyMCE.activeEditor.execCommand('mceInsertContent',false,wpAppbox_googleplay_button())
			         }});
			   	<?php } ?>
			   	   
			   	<?php if(get_option('wpAppbox_buttonAppbox_operaddons') || ($option == '1')) { ?>	
			   	   m.add({title : 'Opera Add-ons', onclick : function() {
			   			tinyMCE.activeEditor.execCommand('mceInsertContent',false,wpAppbox_operaaddons_button())
			   	   }});
			   	<?php } ?>
			         
			  	<?php if(get_option('wpAppbox_buttonAppbox_windowsstore') || ($option == '1')) { ?>	
			         m.add({title : 'Windows Store', onclick : function() {
			     		tinyMCE.activeEditor.execCommand('mceInsertContent',false,wpAppbox_windowsstore_button())
			         }});
	   			<?php } ?>
			
				<?php if(get_option('wpAppbox_buttonAppbox_steam') || ($option == '1')) { ?>      
				  m.add({title : 'Steam', onclick : function() {
				  	tinyMCE.activeEditor.execCommand('mceInsertContent',false,wpAppbox_steam_button())
				  }});
				<?php } ?>
			   
			   	<?php if(get_option('wpAppbox_buttonAppbox_wordpress') || ($option == '1')) { ?>      
			         m.add({title : 'WordPress Plugin Verzeichnis', onclick : function() {
			         	tinyMCE.activeEditor.execCommand('mceInsertContent',false,wpAppbox_wordpress_button())
			         }});
	 			<?php } ?>
	 			
	 			<?php if(get_option('wpAppbox_buttonAppbox_xda') || ($option == '1')) { ?>      
	 			     m.add({title : 'XDA Labs (Android)', onclick : function() {
	 			     	tinyMCE.activeEditor.execCommand('mceInsertContent',false,wpAppbox_xda_button())
	 			     }});
	 			<?php } ?>
			         
                });
                return c;
            }
            return null;
        }
    });
    tinymce.PluginManager.add('wpAppboxCombined', tinymce.plugins.wpAppbox_CombinedButton);
})();