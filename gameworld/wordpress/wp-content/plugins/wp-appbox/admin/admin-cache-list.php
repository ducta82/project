<?php

/* Für die MySQL-Abfragen */
global $wpdb;
	
	
/* class-wp-list-table.php inkludieren, falls notwendig */
if( !class_exists( 'WP_List_Table' ) ) {
	require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}
require_once( ABSPATH . 'wp-content/plugins/wp-appbox/inc/getappinfo.class.php' );

/**
* Cached_Apps
*/
class Cached_Apps extends WP_List_Table {
	
	
	/**
	* Prüfen ob eine Suche aktiv ist
	*
	* @since   3.0.0
	* @change  3.2.0
	*
	* @return  boolean  true/false  TRUE when active
	*/
	
	function isActiveSearch() {
		if ( isset( $_POST['s'] ) && '' != trim( $_POST['s'] ) ) return( true );
		else( false );
	}
	
	
	/**
	* Bewertung ausgeben
	*
	* @since   2.1.0
	* @change  3.2.0
	*
	* @param   string  $appRating  Bewertung der App
	* @return  string              HTML-Ausgabe der Bewertungssterne
	*/
	
	function outputRating( $appRating ) {
		if ( '' == $appRating ) {
			$appRating = 0;
		}
		$appRating = str_replace( ',', '.', $appRating );
		$appRating = number_format( $appRating, 2 );
		$appRating = round( $appRating, 1 );
		if ( $appRating <= 0.3 ) {
			$appRatingStars = 0;
		} else if ( $appRating >= 0.4 && $appRating <= 0.7 ) {
			$appRatingStars = 1;
		} else if ( $appRating >= 0.8 && $appRating <= 1.3 ) {
			$appRatingStars = 2;
		} else if ( $appRating >= 1.4 && $appRating <= 1.7 ) {
			$appRatingStars = 3;
		} else if ( $appRating >= 1.8 && $appRating <= 2.3 ) {
			$appRatingStars = 4;
		} else if ( $appRating >= 2.4 && $appRating <= 2.7 ) {
			$appRatingStars = 5;
		} else if ( $appRating >= 2.8 && $appRating <= 3.3 ) {
			$appRatingStars = 6;
		} else if ( $appRating >= 3.4 && $appRating <= 3.7 ) {
			$appRatingStars = 7;
		} else if ( $appRating >= 3.8 && $appRating <= 4.3 ) {
			$appRatingStars = 8;
		} else if ( $appRating >= 4.4 && $appRating <= 4.8 ) {
			$appRatingStars = 9;
		} else if ( $appRating >= 4.9 ) {
			$appRatingStars = 10;
		}
		return( '<div style="width:65px; height:13px; background: url(' . plugins_url( 'img/stars-sprites-monochrome.png', dirname( __FILE__ ) ) . ') no-repeat center center; background-position:0 -' . ( $appRatingStars * 13 ) .'px"></div>');
	}
	
	
	/**
	* Tabelle mit Daten füllen
	*
	* @since   2.0.0
	* @change  3.4.0
	*
	* @param   string  $search      Suchstring [optional]
	* @return  array   $cachedApps  Array mit App-Daten
	*/
	
	function fillData( $search = '' ) {
		global $wpdb;
		if ( $search != NULL ) {
			$search = trim( $search );
			$sql = "SELECT * FROM " . wpAppbox_databaseName() . " WHERE (app_title LIKE '%" . $search . "%') ORDER BY app_title";
		} else {
			$sql = "SELECT * FROM " . wpAppbox_databaseName() . " ORDER BY app_title";
		}
		$appResults = $wpdb->get_results( $sql );
		if ( $appResults ) {
			$cachedApps = array();
			foreach ( $appResults as $appData ) {
				$cachedApps[] = array(
					'app_title' => trim( $appData->app_title ),
					'app_store' => $appData->store_name_css,
					'app_store_url' => $appData->app_url,
					'app_price' => $appData->app_price,
					'app_rating' => $appData->app_rating,
					'app_icon_bg' => ( isset( unserialize( $appData->app_extend )['windowsstorebg'] ) ? unserialize( $appData->app_extend )['windowsstorebg'] : ''),
					'app_icon' => $appData->app_icon,
					'app_cache_id' => $appData->id,
					'app_deprecated' => $appData->deprecated,
					'app_expiry' => $appData->created + ( WPAPPBOX_CACHINGTIME * 60 )
				);
				$appCacheID[$appData->id] = trim( $appData->app_title );
				$appTitle[$appData->id] = trim( $appData->app_title );
				$appRating[$appData->id] = $appData->app_rating;
				$appStoreName[$appData->id] = $appData->store_name;
				$appPrice[$appData->id] = $appData->app_price;
				$appDeprecated[$appData->id] = $appData->deprecated;
				$appIcon[$appData->id] = $appData->app_icon;
				$appCreated[$appData->id] = $appData->created + ( WPAPPBOX_CACHINGTIME * 60 );
			}
		}
		return( $cachedApps );
	}
	
	
	/**
	* Tabelle erzeugen [WordPress]
	*
	* @since   2.0.0
	* @change  3.2.0
	*/
	
	function __construct() {
		global $status, $page;
		parent::__construct( array( 
			'singular' => 'app',
		    'plural' => 'apps',
		    'ajax' 	=> true        
		)	);
		$this->tableHeader();
	}
	
	
	/**
	* Zeilenköpfe erzeugen und CSS ausgeben
	*
	* @since   2.0.0
	* @change  3.2.0
	*
	* @output  (HTML-)Ausgabe der Tabellenköpfe
	*/
	
	function tableHeader() {
	  	$page = isset( $_GET['page'] ) ? esc_attr( $_GET['page'] ) : false;
	  	if ( 'wp-appbox' != $page ) {
	  		return;
	  	}
		echo( '<style type="text/css">' );
		echo( '.wp-list-table .column-app_cache_id { width: 5%; }' );
		echo( '.wp-list-table .column-app_title { width: 60%; }' );
		echo( '.wp-list-table .column-app_icon { width: 52px; }' );
		echo( '.wp-list-table .column-app_store { width: 20%; }' );
		echo( '.wp-list-table .column-app_price { width: 15%; }' );
		echo( '.wp-list-table .column-app_rating { width: 111px; }' );
		echo( '.wp-list-table .column-app_expiry { width: 20%; }' );
		echo( '.isDeprecated { -webkit-filter: grayscale(100%); -moz-filter: grayscale(100%); -ms-filter: grayscale(100%); -o-filter: grayscale(100%); filter: grayscale(100%); }' );
		echo( '</style>' );
	}
	
	
	/**
	* Werte der einzelnen Spalten/Tulpen ausgeben
	*
	* @since   2.0.0
	* @change  4.0.0
	*/
	
	function column_default( $item, $columnName ) {
		global $wpAppbox_storeNames;
		switch ( $columnName ) { 
			case 'app_id':
			case 'app_cache_id':
			case 'app_title':
			case 'app_price':
				if ( $item[$columnName] == '0' ) {
					return( __('Free', 'wp-appbox') );
				} else {
					return( $item[$columnName] );
				}
			case 'app_rating':
				return( $this->outputRating( $item[$columnName] ) );
			case 'app_icon':
				$classDeprecated = '';
				if ( $item['app_deprecated'] ) $classDeprecated = ' class="isDeprecated" ';
				if ( 'windowsstore' == $item['app_store'] && '' != $item['app_icon_bg'] ) {
					return( '<img src="' . $item[$columnName] . '" ' . $classDeprecated . ' style="' . $item['app_icon_bg'] .' ; width:48px; height:48px;" />' );
				}
				return( '<img src="' . $item[$columnName] . '" ' . $classDeprecated . 'style="width:48px; height:48px;" />' );
			case 'app_store':
				return( '<img src="' . plugins_url( 'img/'.( ( 'macappstore' == $item[$columnName] ) ? 'macappstore' : $item[$columnName] ).'-small.png', dirname( __FILE__ ) ) . '" style="margin-right:8px; height:14px;" />'.( ( 'macappstore' == $item[$columnName] ) ? '(Mac) App Store' : $wpAppbox_storeNames[$item[$columnName]] ) );
			case 'app_expiry':
			    	return( date_i18n( 'd.m.Y, H:i:s', $item[$columnName] ) );
			default:
			   	return( print_r( $item, true ) );
		}
	}
		
	
	/**
	* Spalten erzeugen
	*
	* @since   2.0.0
	* @change  3.2.0
	*
	* @return  array  $columns  Array der einzelnen Spalten
	*/
		
	function get_columns(){
		$columns = array(
			'cb'        	=> '<input type="checkbox" />',
			'app_icon'   	=> '',
			'app_title' 	=> __('Title', 'wp-appbox'),
			'app_rating'   	=> __('Rating', 'wp-appbox'),
			'app_price'   	=> __('Price', 'wp-appbox'),
			'app_store'  	=> __('Store', 'wp-appbox'),
			'app_expiry' 	=> __('Expiry', 'wp-appbox')
		);
		return( $columns );
	}
	
	
	/**
	* Einträge vorbereiten
	*
	* @since   2.0.0
	* @change  3.4.0
	*/
	
	function prepare_items() {
		$this->process_bulk_action();
		if ( $this->isActiveSearch() ) {
			$apps = $this->fillData( $_POST['s'] );
		} else {
			$apps = $this->fillData(); 
		}
		$columns = $this->get_columns();
		$hidden = array();
		$sortable = $this->get_sortable_columns();
		$this->_column_headers = array( $columns, $hidden, $sortable );
		usort( $apps, array( &$this, 'usort_reorder' ) );
		$per_page = 50;
		$current_page = $this->get_pagenum();
		$total_items = count( $apps );
		$found_data = array_slice( $apps, ( ( $current_page - 1 ) * $per_page ), $per_page );
		$this->set_pagination_args( array( 
			'total_items' => $total_items,
		    'per_page'    => $per_page
		) );
		$this->items = $found_data;
	}
		
	
	/**
	* Spalten sortierbar machen
	*
	* @since   2.0.0
	* @change  3.2.0
	*
	* @return  array  $sortable_columns  Array der Spalten
	*/
		
	function get_sortable_columns() {
		$sortable_columns = array(
			'app_title'		=> array( 'app_title', true ),
			'app_store'   	=> array( 'app_store', false ),
			'app_expiry'   	=> array( 'app_expiry', false ),
			'app_cache_id'	=> array( 'app_cache_id', false )
		);
		return( $sortable_columns );
	}
	
	
	/**
	* Vergleiche der Spalteninhalte für Sortierung
	*
	* @since   2.0.0
	* @change  3.2.0
	*
	* @param  string  $a  Erster Wert
	* @param  string  $b  Zweiter Wert
	*/
		
	function usort_reorder( $a, $b ) {
		$orderby = ( !empty( $_GET['orderby'] ) ) ? $_GET['orderby'] : 'app_title';
		$order = ( !empty($_GET['order'] ) ) ? $_GET['order'] : 'asc';
		$result = strcmp( strtolower( $a[$orderby] ), strtolower( $b[$orderby] ) );
		return( ( $order === 'asc' ) ? $result : -$result );
	}
	
	
	/**
	* Spaltenkopf klickbar machen für Sortierung
	*
	* @since   2.0.0
	* @change  3.2.0
	*/
	
	function column_cb( $item ) {
		if ( $item['app_deprecated'] != '1' ) {
			return( sprintf( '<input type="checkbox" name="app_cache_id[]" value="%s" />', $item['app_cache_id'] ) );   
		} 
	 }
	
	
	/**
	* Zelle für den App-Titel erstellen
	*
	* @since   2.0.0
	* @change  4.0.0
	*/
	
	function column_app_title( $item ) {
		if ( !isset( $getparam ) ) $getparam = '';
		if ( isset($_GET['paged'] ) ) {
			$getparam .= '&paged=' . $_GET['paged'];
		}
		if ( isset($_GET['orderby'] ) ) {
			$getparam .= '&orderby=' . $_GET['orderby'];
		}
		if ( isset($_GET['order'] ) ) {
			$getparam .= '&order=' . $_GET['order'];
		}
		$isDeprecated = ( $item['app_deprecated'] == '1' ? '<span style="color:red;text-transform:uppercase;">' . __('Deprecated', 'wp-appbox') . '</span> ' : ''); 
	  	$actions = array( 
	  		'goto' => '<a target="_blank" href="'. esc_html( $item['app_store_url'] ) . '">' . __('Go to Store', 'wp-appbox') . '</a>',
	  		'reload' => sprintf( '<a href="?page=%s&action=%s&tab=cache-list' . $getparam . '&app_cache_id=%s&wpappbox_reload_cache">' . __('Force refresh cache', 'wp-appbox') . '</a>', $_REQUEST['page'], 'reload', $item['app_cache_id'] ),
	  		'delete' => sprintf( '<a href="?page=%s&action=%s&tab=cache-list' . $getparam . '&app_cache_id=%s">' . __('Delete', 'wp-appbox') . '</a>', $_REQUEST['page'], 'delete', $item['app_cache_id'] )
	  	);
	  	if ( 1 == $item['app_deprecated'] ) {
	  		$actions['delete'] = sprintf( '<a href="?page=%s&action=%s&tab=cache-list' . $getparam . '&app_cache_id=%s" onClick="return confirm(\'' . __('This app is deprecated. If you delete this app, all data and images will be permanently deleted. Are you sure?', 'wp-appbox') . '\')">' . __('Delete', 'wp-appbox') . '</a>', $_REQUEST['page'], 'delete', $item['app_cache_id'] );
	  	}
	  	return( sprintf( '%1$s %2$s', $isDeprecated.$item['app_title'], $this->row_actions( $actions ) ) );
	}
	
	
	/**
	* Bulk-Actions erstellen
	*
	* @since   2.0.0
	* @change  4.0.0
	*
	* @return  array  $theURL  Array der Aktionen
	*/
	
	function get_bulk_actions() {
	  	$actions = array( 
	  		//'reload' => __('Renew cache', 'wp-appbox'), 
	  		'delete' => __('Delete', 'wp-appbox')
	  	);
	  	return( $actions );
	}
	
	
	/**
	* Bulk-Actions durchführen
	*
	* @since   2.0.0
	* @change  4.0.0
	*/
	
	function process_bulk_action() {
		global $wpdb;
		$cacheIDs = isset( $_REQUEST['app_cache_id'] ) ? $_REQUEST['app_cache_id'] : array();
		if ( is_array( $cacheIDs ) ) {
			$cacheIDs = implode( ',', $cacheIDs );
		}
		$cacheIDs = explode( ',', $cacheIDs );
		if( !empty( $cacheIDs ) ) {
			if ( 'delete' === $this->current_action() ) {
				foreach ( $cacheIDs as $cacheID ) {
					wpAppbox_clearAppCache( $cacheID );
					if ( get_option('wpAppbox_imgCache') ) {
						$imageCache = new wpAppbox_imageCache;
						if ( $imageCache->quickcheckImageCache() )
							$imageCache = $imageCache->deleteAppImages( $cacheID );
					}
				}
			}
			if ( 'reload' === $this->current_action() ) {
				foreach ( $cacheIDs as $cacheID ) {
					$cachedApp = $wpdb->get_row( "SELECT app_id, store_name_css FROM " . wpAppbox_databaseName() . " WHERE id = '" . $cacheID . "'" );
					if ( $cachedApp != null ) {
						$appID = $cachedApp->app_id;
						$storeNameCSS = ('macappstore' == $cachedApp->store_name_css) ? 'appstore' : $cachedApp->store_name_css;
						$appData = new wpAppbox_GetAppInfoAPI;
						$appData = $appData->getTheAppData( $storeNameCSS, $appID );
					}
				}
			}
		}
	}
	
	
	/**
	* Boxen und Textfelder über und unter der Tabelle einbauen
	*
	* @since   3.0.0
	* @change  4.0.0
	*
	* @param   string  $which  Über oder unter der Tabelle(top, bottom)
	* @output  string          HTML-Ausgabe der Optionsfelder
	*/
	
	function extra_tablenav( $which ) {
		if ( 'top' == $which ) {
		?>
		   	<div class="alignleft actions bulkactions" style="margin-bottom:7px;">
			   	<label class="screen-reader-text" for="search_id-search-input"><?php _e('Search', 'wp-appbox') ?>:</label> 
			   	<input id="search_id-search-input" style="height:27px;" type="text" name="s" value="<?php echo( $_POST['s'] ); ?>" /> 
			   	<input id="search-submit" class="button" type="submit" name="" value="<?php _e('Search', 'wp-appbox') ?>" />
			   	<?php if ( $this->isActiveSearch() ) { ?>
			   		<a href="/wp-admin/options-general.php?page=wp-appbox&tab=cache-list" class="button" style="display: inline-block;margin-top:0;"><?php _e('Clear search', 'wp-appbox') ?></a>
			   	<?php } ?>
		   	</div>
	   	<?php
	   	}
	   	if ( 'bottom' == $which ) {
	   	}
	}
	
	
	/**
	* Es sind keine Apps im Cache gefunden worden
	*
	* @since   2.0.0
	* @change  3.4.0
	*
	* @echo    string  $theMessage  Fehlermeldung
	*/
	
	function no_items() {
		if ( $this->isActiveSearch() ) {
			$theMessage = __('No apps in WordPress-cache were found with this term.', 'wp-appbox') . ' ' . '<a href="/wp-admin/options-general.php?page=wp-appbox&tab=cache-list">' . __('Clear search', 'wp-appbox') . '</a>';
		} else {
			$theMessage = __('There are no apps in the WordPress-Cache.', 'wp-appbox');
		}
		echo( $theMessage );
	}
		
		
} /* Class beenden */
		

/**
* Tabelle mit App-Daten rendern
*
* @since   2.0.0
* @change  3.4.0
*/
		
function wpAppbox_RenderCachedAppsList() {
	$myListTable = new Cached_Apps();
	$myListTable->prepare_items(); 
	?>
  	<form method="post">
   	 	<input type="hidden" name="page" value="wp-appbox" />
    	<?php
	$myListTable->display(); 
  	echo( '</form><small>' . __('Your time', 'wp-appbox') . ': '.date_i18n( 'd.m.Y, H:i:s' ) . '</small><br /><small>' . __('Servertime', 'wp-appbox') . ': ' . Date( 'd.m.Y, H:i:s' ) . '</small>' );
}
	
	
/* Liste der gecachten Apps rendern */
wpAppbox_RenderCachedAppsList();

		
?>