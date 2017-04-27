<?php
	
/**
* wpAppbox_imageCache
*/

class wpAppbox_imageCache {


	/**
	* Prüft ob der Bilder-Cache aktiv ist UND genutzt werden kann
	*
	* @since   4.0.0
	* @change  4.0.11
	*
	* @return  boolean   true/false		true wenn aktiv und genutzt
	*/
	
	public static function quickcheckImageCache() {
		if ( wpAppbox_imageCache::checkImageCache() && get_option('wpAppbox_imgCache') )
			return( true );
		return( false );
	}
	
	
	/**
	* Entfernt http(s):// und Co. aus den Links
	*
	* @since   4.0.0
	*
	* @return  string   $theURL 		Bereinigte URL
	*/
	
	static function cleanURL( $theURL ) {
		$theURL = str_replace( 'http://', '', $theURL );
		$theURL = str_replace( 'https://', '', $theURL );
		$theURL = str_replace( '//', '', $theURL );
		return( $theURL );
	}
	
	
	/**
	* Prüft die Bedingungen des Bildercaches
	*
	* @since   4.0.0
	* @change  4.0.11
	*
	* @param   boolean  	 $returnMsg       Soll der Fehler ausgegeben werden? [optional]
	* @return  boolean   true/false
	*/
	
	public static function checkImageCache( $returnMsg = false ) {
		$canUse = false;
		if ( !ini_get( 'allow_url_fopen' ) ) {
			$msg2return = sprintf( esc_html__( '%1$s is not activated on this server. Please activate it or contact your hoster and try again.', 'wp-appbox' ), '"allow_url_fopen"' );
			$canUse = false;
		} else if ( !file_exists( WPAPPBOX_CACHE_PATH ) ) {
			if ( !mkdir( WPAPPBOX_CACHE_PATH, 0755, true ) ) {
				$msg2return = sprintf( esc_html__( 'Folder %1$s cannot be created. Please create manually and try again.', 'wp-appbox' ), '"/wp-content/cache/wp-appbox/"' );
				$canUse = false;
			}
		} else {
			if ( !is_writable( WPAPPBOX_CACHE_PATH ) && !chmod( WPAPPBOX_CACHE_PATH , 0755 ) ) {
				$msg2return = sprintf( esc_html__( 'Folder %1$s is not writable. Please set CHMOD (755) manually and try again.', 'wp-appbox' ), '"/wp-content/cache/wp-appbox/"' );
				$canUse = false;
			} else if ( !is_readable( WPAPPBOX_CACHE_PATH ) && !chmod( WPAPPBOX_CACHE_PATH , 0755 ) ) {
				$msg2return = sprintf( esc_html__( 'Folder %1$s is not readable. Please set CHMOD (755) manually and try again.', 'wp-appbox' ), '"/wp-content/cache/wp-appbox/"' );
				$canUse = false;
			} else {
				$msg2return = esc_html__( 'All fine.', 'wp-appbox' );
				$canUse = true;
			}
		}
		if ( $returnMsg )
			return( $msg2return );
		return( $canUse );
	}
	
	
	/**
	* Speichert externe App-Bilder auf dem eigenen Server
	*
	* @since   4.0.0
	* @change  4.0.11
	*
	* @param   string/array  	$imageURL       		Die Bild-URL des Servers (mit http/https)
	* @param   string  	 		$cacheID       			Die Cache-ID der App
	* @param   string  	 		$imageType     			Typ des Bildes ("appicon" oder "screenshot")
	* @return  string			$imageURL		 		URL des Bildes (auf dem eigenen oder externen Server)
	*/
	
	function cacheImages( $imageURL, $cacheID, $imageType = '' ) {
		global $wpdb;
		
		$imageURLarray = array();
		if ( !is_array( $imageURL ) ):
			$imageURLarray[ $imageType . '-' . md5( $imageURL ) ] = $imageURL;
			$returnURL = true;
		else:
			$imageURLarray = $imageURL;
			$returnURL = false;
		endif;
		
		if ( !$this->quickcheckImageCache() ):
			if ( !$returnURL)
				return;
			return( $imageURL );
		endif;
		
		switch ( $imageType ):
			case 'ai':
				if ( 'screenshots' == get_option('wpAppbox_imgCacheMode') ) 
					return( $imageURL );
				break;
			case 'ss':
				if ( 'appicon' == get_option('wpAppbox_imgCacheMode') ) 
					return( $imageURL );
				break;
		endswitch;
		
		global $wpdb;
		
		$isDeprecated = $wpdb->get_var( "SELECT deprecated FROM " . wpAppbox_databaseName() . " WHERE id = '$cacheID'" );
		
		$cacheFolderPath = WPAPPBOX_CACHE_PATH . $cacheID;
		$cacheFolderDir = WPAPPBOX_CACHE_DIR . $cacheID;
		if ( $isDeprecated ) {
			$cacheFolderPath .= '-deprecated';
			$cacheFolderDir .= '-deprecated';
		}
		
		if ( !$isDeprecated && file_exists( $cacheFolderPath . '-deprecated' ) ) 
			$this->markAsDeprecated( $cacheID, true );
		
		foreach ( $imageURLarray as $fileName => $theURL ):
		
			$cacheImagePath = $cacheFolderPath . DIRECTORY_SEPARATOR . $fileName;
			$cacheImageDir = $cacheFolderDir . DIRECTORY_SEPARATOR . $fileName;
				
			if ( file_exists( $cacheImagePath ) ) {
				if ( $returnURL )
					return( $cacheImageDir );
				continue;
			}
			
			if ( !file_exists( $cacheFolderPath ) && !mkdir( $cacheFolderPath, 0755, true ) ) {
				wpAppbox_errorOutput( 'function: cacheImages() ---> Cache folder don\'t exists and couldn\'t created.' );
				continue;
			}
		
			if ( substr( $theURL, 0, 2 ) == "//" )
				$fileURL = 'https:' . $theURL;
			else
				$fileURL = $theURL;
			
			$downloadedImage = @file_get_contents( $fileURL );
			if ( !$downloadedImage || FALSE === file_put_contents( $cacheImagePath, $downloadedImage ) ) {
				wpAppbox_errorOutput( 'function: cacheImages() ---> Image URL isn\'t available. Correct URL?' );
				if ( $returnURL ) return( $theURL );
			}
			if ( $returnURL ) return( $cacheImageDir );
			//usleep( 10000 );
			
		endforeach;
	}
	
	
	/**
	* Löscht den Bildercache (siehe auch deleteAppImages())
	*
	* @since   4.0.0
	* @change  4.0.11
	*
	* @param   boolean  	 $completeFlush     	Auch als "-deprecated" markierte Ordner löschen = true [optional]
	* @return  boolean   true/false
	*/
	
	public static function deleteImageCache( $completeFlush = false ) {
		$dir = WPAPPBOX_CACHE_PATH;
		if ( !file_exists( $dir ) ) { return ( false ); }
		$it = new RecursiveDirectoryIterator( $dir, RecursiveDirectoryIterator::SKIP_DOTS );
		$files = new RecursiveIteratorIterator( $it, RecursiveIteratorIterator::CHILD_FIRST );
		foreach ( $files as $file ):
			if ( !$completeFlush && stristr( $file, '-deprecated' ) !== FALSE )
				continue;
			if ( file_exists( $file->getRealPath() ) ) {
				if ( $file->isDir() )
					rmdir( $file->getRealPath() );
				else 
					unlink( $file->getRealPath() );
			}
		endforeach;
		rmdir( $dir );
		return( true );
	} 
	
	
	/**
	* Löscht die gecachten Bilder einer App (siehe auch deleteImageCache())
	*
	* @since   4.0.0
	* @change  4.0.11
	*
	* @param   string  	 	$cacheID       		Die Cache-ID der App
	* @return  boolean   	true/false
	*/
	
	public static function deleteAppImages( $cacheID ) {
		$dir = WPAPPBOX_CACHE_PATH . $cacheID . '/';
		if ( !file_exists( $dir ) ) return ( false );
		$it = new RecursiveDirectoryIterator( $dir, RecursiveDirectoryIterator::SKIP_DOTS );
		$files = new RecursiveIteratorIterator( $it, RecursiveIteratorIterator::CHILD_FIRST );
		foreach ( $files as $file ):
			if ( file_exists( $file->getRealPath() ) ) {
				if ( $file->isDir() )
					rmdir( $file->getRealPath() );
				else 
					unlink( $file->getRealPath() );
			}
		endforeach;
		rmdir( $dir );
		return( true );
	} 
	
	
	/**
	* Alle Bilder in ein Array schrauben
	*
	* @since   4.0.0
	*
	* @param   string  	 	$cacheID       		Die Cache-ID der App
	* @param   string  	 	$appIcon       		URL des App-Icons
	* @param   array  	 	$appScreenshots     Array mit den Screenshot-URLs der App
	* @return  array   		mixed				Array mit allen URLs der App
	*/
	
	function getURLarray( $appIcon, $appScreenshots ) {
		$imgArray = array();
		if ( '' != $appIcon ) {
			$fileName = 'ai-' . md5( $appIcon );
			$fileURL = $appIcon;
			$imgArray[ $fileName ] = $fileURL;
		}
		if ( !is_array( $appScreenshots ) ) $appScreenshots = unserialize( $appScreenshots );
		if ( is_array( $appScreenshots ) ):
			foreach ( $appScreenshots as $arrayOuter => $arrayInner ):
				if ( is_array( $arrayInner ) ):
					foreach ( $arrayInner as $arrayInnerOuter => $arrayInnerInner ):
						$fileName = 'ss-' . md5( $arrayInnerInner );
						$fileURL = $arrayInnerInner;
						$imgArray[ $fileName ] = $fileURL;
					endforeach;
				else:
					$fileName = 'ss-' . md5( $arrayInner );
					$fileURL = $arrayInner;
					$imgArray[ $fileName ] = $fileURL;
				endif;
			endforeach;
		endif;
		return( $imgArray );
	} 
	
	
	/**
	* Räumt den Bilder-Ordner einer App auf
	*
	* @since   4.0.0
	* @change  4.0.11
	*
	* @param   string  	 	$appIcon       		URL des App-Icons
	* @param   array  	 	$appScreenshots     Array mit den Screenshot-URLs der App
	* @return  boolean   	true/false
	*/
	
	public static function cleanUp( $cacheID, $appIcon, $appScreenshots ) {
		global $wpAppbox_optionsDefault;
		if ( '' == $cacheID )
		return( false );
		$allImages = (new wpAppbox_imageCache)->getURLarray( $appIcon, $appScreenshots );
		
		if ( get_option('wpAppbox_imgCacheDelay') ) 
			$delayedHours = ( is_integer( get_option('wpAppbox_imgCacheDelayTime') ) ? get_option('wpAppbox_imgCacheDelayTime') : $wpAppbox_optionsDefault['imgCacheDelayTime'] );
		else 
			$delayedHours = 0;
		
		if ( empty( $allImages ) ) 
			return( false );
		$dir = WPAPPBOX_CACHE_PATH . $cacheID;
		if ( !file_exists( $dir ) ) 
			return( false );
		foreach ( scandir( $dir ) as $fileName ):
			if ( $fileName == '.' || $fileName == '..' )
				continue;
			$isOutdated = ( filemtime( $dir . DIRECTORY_SEPARATOR . $fileName ) <= strtotime( "-$delayedHours hours" ) ? true : false );
			$shouldCached = false;
			switch ( get_option('wpAppbox_imgCacheMode') ):
				case 'screenshots':
					if ( FALSE !== strpos( $fileName, 'ss-' ) ) $shouldCached = true;
					break;
				case 'appicon':
					if ( FALSE !== strpos( $fileName, 'ai-' ) ) $shouldCached = true;
					break;
				default:
					if ( FALSE !== strpos( $fileName, 'ss-' ) || FALSE !== strpos( $fileName, 'ai-' ) ) $shouldCached = true;
					break;
			endswitch;
			if ( !$shouldCached || ( $isOutdated && !array_key_exists( $fileName, $allImages ) ) ):
				if ( file_exists( $dir . DIRECTORY_SEPARATOR . $fileName ) )
					unlink( $dir . DIRECTORY_SEPARATOR . $fileName );
			endif;
		endforeach;
	} 
	
	
	/**
	* Markiert ausgewählte Ordner als "-deprecated"
	*
	* @since   4.0.0
	* @change  4.0.11
	*
	* @param   string  	 	$cacheID       		Die Cache-ID der App
	* @param   boolean  	 	$undoAction     	"-deprecated"-Markierung entfernen = true [optional]
	* @return  boolean   	true/false
	*/
	
	function markAsDeprecated( $cacheID, $undoAction = false ) {
		$folderOld = WPAPPBOX_CACHE_PATH . $cacheID;
		$folderNew = $folderOld . '-deprecated';
		if ( $undoAction ) {
			if ( file_exists( $folderNew ) )
				$result = rename( $folderNew, $folderOld );
		} else {
			if ( file_exists( $folderOld ) )
				$result = rename( $folderOld, $folderNew );
		}
		if ( isset( $result ) && $result ) return( true );
		return( false );
	} 
	

} /* Class beenden */

?>