<?php


/* Query-Class inkludieren */
include_once('queryelements.php');
	
	
/**
* wpAppbox_GetAppInfoAPI
*/

class wpAppbox_GetAppInfoAPI {
	
	
	/**
	* Prüft ob die App-Daten bereits in der Cache-Tabelle liegen
	*
	* @since   2.0.0
	* @change  3.2.0
	*
	* @param   string    $cacheID       Cache-ID der App
	* @return  boolean   true/false     TRUE when already cached
	* @output  function  errorOutput()  Fehlermeldung
	*/
	
	function checkIfCached( $cacheID ) {
		global $wpdb;
		$cachedApp = $wpdb->get_row( "SELECT created FROM " . wpAppbox_databaseName() . " WHERE id = '" . $cacheID . "'" );
		if ( $wpdb->last_error ) {
			wpAppbox_errorOutput( 'function: wpAppbox_checkIfCached() ---> ' . $wpdb->last_error );
		}
		if ( $cachedApp != null ) {
			if ( get_option('wpAppbox_disableAutoCache' ) && !wpAppbox_isUserAuthor() ) {
				return( true );
			} else {
				$timeCreated = $cachedApp->created;
				$timeExpires = $timeCreated + ( WPAPPBOX_CACHINGTIME * 60 );
				$timeNow = time(); 
				if ( wpAppbox_isUserAuthor() && ( wpAppbox_isCacheInactive() || wpAppbox_forceNewCache( $cacheID ) ) ) {
					$timeExpires = 0;
				}
				if ( $timeNow < $timeExpires ) {
					return( true );
				} else {
					wpAppbox_clearAppCache( $cacheID );
					if ( $wpdb->last_error ) {
						wpAppbox_errorOutput( 'function: wpAppbox_checkIfCached() ---> ' . $wpdb->last_error );
					}
					wpAppbox_clearCachePlugin();
					return( false );
				}
			}
		} else {
			wpAppbox_errorOutput( 'function: wpAppbox_checkIfCached() ---> App not in cache' );
			return( false );
		}	
	}
	
	
	/**
	* Speichert die App-Daten im Cache
	*
	* @since   2.0.0
	* @change  3.2.0
	*
	* @param   array     $appData       Array der App-Daten
	* @return  boolean   true/false     TRUE when cached
	* @output  function  errorOutput()  Fehlermeldung
	*/
	
	function cacheAppData( $appData ) {
		global $wpdb;
		$appData['created'] = time();
		$appData['appbox_version'] = WPAPPBOX_PLUGIN_VERSION;
		$appData['app_screenshots'] = serialize( $appData['app_screenshots'] );
		if ( '' != trim( $appData['app_title'] ) ) {
			$wpdb->insert( wpAppbox_databaseName(), $appData );
			if ( $wpdb->last_error ) {
				wpAppbox_errorOutput( 'function: wpAppbox_cacheAppData() ---> ' . $wpdb->last_error );
			} else {
				return( true );
			}
		}
		wpAppbox_errorOutput( 'function: wpAppbox_cacheAppData() ---> Something went wrong. :-( No app-title for ' . $appData['app_id']);
	}
	
	
	/**
	* Gibt die bereits gecachten App-Daten zurück
	*
	* @since   2.0.0
	* @change  3.2.0
	*
	* @param   string  $cacheID         Cache-ID der App
	* @return  array   $appData         Array der App-Daten
	* @output  function  errorOutput()  Fehlermeldung
	*/
	
	function returnCachedData( $cacheID ) {
		global $wpdb;
		$cachedApp = $wpdb->get_row( "SELECT * FROM " . wpAppbox_databaseName() . " WHERE id = '" . $cacheID . "' ");
		if ( $wpdb->last_error ) {
			wpAppbox_errorOutput( 'function: wpAppbox_returnCachedData() ---> ' . $wpdb->last_error );
		}
		if ( $cachedApp != null ) {
			$appData = array();
			$appData['id'] = $cachedApp->id;
			$appData['app_id'] = $cachedApp->app_id;
			$appData['app_url'] = $cachedApp->app_url;
			$appData['app_icon'] = $cachedApp->app_icon;
			$appData['app_title'] = $cachedApp->app_title;
			$appData['app_description'] = $cachedApp->app_description;
			$appData['app_author'] = $cachedApp->app_author;
			$appData['app_author_url'] = $cachedApp->app_author_url;
			$appData['app_price'] = $cachedApp->app_price;
			$appData['app_has_iap'] = $cachedApp->app_has_iap;
			$appData['app_rating'] = $cachedApp->app_rating;
			$appData['app_extend'] = $cachedApp->app_extend;
			$appData['store_name'] = $cachedApp->store_name;
			$appData['store_name_css'] = $cachedApp->store_name_css;
			$appData['appbox_version'] = $cachedApp->appbox_version;
			$appData['fallback'] = $cachedApp->fallback;
			$appData['created'] = $cachedApp->created;
			$appData['app_screenshots'] = unserialize($cachedApp->app_screenshots);
			return( $appData );
		}
	}

	
	/**
	* Gibt die umgewandelte URL des Stores zurück
	*
	* @since   3.0.0
	* @change  3.2.0
	*
	* @param   string  $storeID   ID des Stores (z.B. "googleplay)
	* @param   string  $appID     ID der App
	* @return  string  $storeURL  URL der App
	*/
	
	function getStoreURL( $storeID, $appID ) {
		global $wpAppbox_storeURL;
		if ( '1' == get_option("wpAppbox_storeURL_$storeID") || '' == get_option("wpAppbox_storeURL_$storeID") ) {
			$storeURL = $wpAppbox_storeURL[$storeID][1];
		} elseif ( '0' == get_option("wpAppbox_storeURL_$storeID") && '' != get_option("wpAppbox_storeURL_URL_$storeID") ) {
			$storeURL = get_option("wpAppbox_storeURL_URL_$storeID");
		} elseif ( '0' == get_option("wpAppbox_storeURL_$storeID") && '' == get_option("wpAppbox_storeURL_URL_$storeID") ) {
			$storeURL = $wpAppbox_storeURL[$storeID][1];
		} else {
			$storeURL = $wpAppbox_storeURL[$storeID][get_option("wpAppbox_storeURL_$storeID")];
		}
		$storeURL = str_replace( '{APPID}', $appID, $storeURL );
		$storeURL = str_replace( '{ID}', $appID, $storeURL );
		return( $storeURL );
	}
	
	
	/**
	* Gibt den Quellcode einer URL zurück
	*
	* @since   1.0.0
	* @change  3.2.5
	*
	* @param   string  $appURL              URL der App
	* @param   string  $javascript_loop     Wie viele JS-Loops [optional]
	* @param   string  $timeout             Timeout der Anfrage [optional]
	* @return  array   $content, $response  Quelltext und HTTP-Codes
	*/
	
	function getContent( $appURL, $javascript_loop = 0, $timeout = 3 ) {
		$appURL = urldecode( $appURL );
		if ( '' != get_option('wpAppbox_curlTimeout') ) {
			$timeout = get_option('wpAppbox_curlTimeout');
		}
		$appURL = str_replace( "&amp;", "&", trim( $appURL ) );
		$cookie = tempnam( "/tmp", "CURLCOOKIE" );
		$ch = curl_init();
		curl_setopt( $ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; rv:1.7.3) Gecko/20041001 Firefox/0.10.1" );
		curl_setopt( $ch, CURLOPT_URL, $appURL );
		curl_setopt( $ch, CURLOPT_COOKIEJAR, $cookie );
		curl_setopt( $ch, CURLOPT_ENCODING, "" );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch, CURLOPT_AUTOREFERER, false );
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false ); 
		curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true ); 
		if ( ini_get('open_basedir') == '' && !ini_get('safe_mode') ) {
			curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
		}
		curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, $timeout );
		curl_setopt( $ch, CURLOPT_TIMEOUT, $timeout );
		curl_setopt( $ch, CURLOPT_MAXREDIRS, 10 );
		$content = curl_exec( $ch );
		$response = curl_getinfo( $ch );
		curl_close( $ch );
		unlink( $cookie );
		if ( 403 == $response['http_code'] ) {
			ini_set( 'user_agent', 'Mozilla/4.0 (compatible; MSIE 6.0)' ); 
			$content_fgc = file_get_contents( $appURL );
			foreach ( $http_response_header as $response_code ) {
				if ( strpos( $response_code, '200 OK' ) !== false ) {
					return( array( $content_fgc, array( 'http_code' => '200' ) ) );
				}
			}
		}
		if ( 301 == $response['http_code'] || 302 == $response['http_code'] ) {
			ini_set( "user_agent", "Mozilla/5.0 (Windows; U; Windows NT 5.1; rv:1.7.3) Gecko/20041001 Firefox/0.10.1" );
			if ( $headers = get_headers( $response['url'] ) ) {
				foreach ( $headers as $value ) {
					if ( "location:" == substr( strtolower( $value ) , 0, 9 ) ) return( $this->getContent( trim( substr( $value, 9, strlen( $value ) ) ) ) );
				}
			}
		}
		if ( ( preg_match( "/>[[:space:]]+window\.location\.replace\('(.*)'\)/i", $content, $value ) || preg_match( "/>[[:space:]]+window\.location\=\"(.*)\"/i", $content, $value ) ) && $javascript_loop < 5 ) {
			return( $this->getContent( $value[1], $javascript_loop+1 ) );
		} else {
			return( array( $content, $response ) );
		}
	}
	
	
	/**
	* Informationen aus dem Play Store auslesen
	*
	* @since   1.0.0
	* @change  3.4.5
	*
	* @param   string  $appID    ID der App
	* @param   string  $storeID  ID des Stores (wird fest vergeben)
	* @return  array   $appData  Array der App-Daten
	*/
	
	function getGooglePlay( $appID, $storeID = 'googleplay' ) {
		$cacheID = md5( $appID . '-' . $storeID );
		if ( $this->checkIfCached( $cacheID ) ) { 
			return( $this->returnCachedData( $cacheID ) ); 
		}
		$pageURL = $this->getStoreURL( $storeID, $appID );
		$thisContent = $this->getContent( $pageURL );
		//print_r($thisContent);
		//wpAppbox_errorOutput( $thisContent );
		$appData = array();
		if ( isset( $thisContent[0] ) && '200' == $thisContent[1]['http_code'] ) {
			wpAppbox_errorOutput( 'function: getGooglePlay() ---> Get app information' );
			phpQuery::newDocumentHTML( $thisContent[0] );
			$error_found = pq("#error-section")->text();
			if ( '' != $error_found ) {
				return( false ); //and quit
			}
			//App-Daten aus der HTML-Seite auslesen
			$appURL = $pageURL;
			$appIcon = pq( 'img.cover-image[itemprop="image"]' )->attr( 'src' );
			$appIcon = str_replace( '=w300', '=w128', $appIcon );
			$appTitle = pq( 'div[itemprop="name"]>div' )->html();
			if ( '' == trim( $appTitle ) ) {
				$appTitle = pq( 'h1[itemprop="name"]>div' )->html();
			}
			$appAuthor = pq( 'div[itemprop="author"]>a>span[itemprop="name"]' )->html();
			print_r($appAuthor);
			$appAuthorURL = 'https://play.google.com' . pq( 'div[itemprop="author"]>meta[itemprop="url"]' )->attr( 'content' );
			$appPrice = pq( 'meta[itemprop="price"]' )->attr( 'content' );
			if ( '' != ( trim( pq( 'div.inapp-msg' )->html() ) ) ) {
				$appHasIAP = true;
			} else {
				$appHasIAP = false;
			}
			$appRating = pq( 'meta[itemprop="ratingValue"]' )->attr( 'content' );
			if ( strpos( $appPrice, "," ) == false && strpos( $appPrice, "." ) == false ) {
				$appPrice = '0';
			}
			$appScreenshots = array();
			foreach ( pq( 'img[itemprop="screenshot"]' ) as $appShots ) {
				$appScreenshot = pq( $appShots )->attr( 'src' );
				if ( substr( $appScreenshot, -8, 8) == '=h310-rw' ) $appScreenshot = str_replace( '=h500', '', $appScreenshot );
				$appScreenshots[] = $appScreenshot;
			}
			$appDescription = pq( 'div[itemprop="description"]>div' )->html();
			//print_r($appDescription);
			$appURL = $pageURL;
			//App-Daten in Array schreiben
			$appData['id'] = $cacheID;
			$appData['app_id'] = $appID;
			$appData['app_url'] = $appURL;
			$appData['app_icon'] = $appIcon;
			$appData['app_title'] = trim( $appTitle );
			$appData['app_description'] = $appDescription;
			$appData['app_author'] = trim( $appAuthor );
			$appData['app_author_url'] = $appAuthorURL;
			$appData['app_price'] = $appPrice;
			$appData['app_has_iap'] = $appHasIAP;
			$appData['app_rating'] = $appRating;
			$appData['store_name'] = 'Google Play';
			$appData['store_name_css'] = $storeID;
			$appData['app_screenshots'] = $appScreenshots;
			if ( $this->cacheAppData( $appData ) ) { 
				return( $appData );
			}
		}
		if ( $thisContent[1]['http_code'] == '503' || $thisContent[1]['http_code'] == '302' ) {
			$appData['app_id'] = '0';
			$appData['app_url'] = $appURL;
			$appData['app_icon'] = plugins_url( 'wp-appbox/img/fallback/googleplay.png' );
			$appData['app_title'] = 'fool';
			$appData['store_name'] = 'Google Play';
			$appData['store_name_css'] = $storeID;
			$appData['fallback'] = '1';
			return( $appData );
		}
		wpAppbox_errorOutput( 'function: getGooglePlay() ---> Get no app information' );
		return( false );
	}
	
	
	/**
	* Informationen aus dem Firefox Marketplace auslesen
	*
	* @since   1.0.0
	* @change  3.4.5
	*
	* @param   string  $appID    ID der App
	* @param   string  $storeID  ID des Stores (wird fest vergeben)
	* @return  array   $appData  Array der App-Daten
	*/
	
	function getFirefoxMarketplace( $appID, $storeID = 'firefoxmarketplace' ) {
		$cacheID = md5( $appID . '-' . $storeID );
		if ( $this->checkIfCached( $cacheID ) ) { 
			return( $this->returnCachedData( $cacheID ) ); 
		}
		$pageURL = $this->getStoreURL( $storeID, $appID );
		$thisContent = $this->getContent( $pageURL );
		$thisContent = json_decode($thisContent[0]);
		//wpAppbox_errorOutput( $thisContent );
		$appData = array();
		if ( isset( $thisContent ) ) {
			wpAppbox_errorOutput( 'function: getFirefoxMarketplace() ---> Get app information' );
			$appID = $thisContent->id;
			$appURL = 'https://marketplace.firefox.com/app/' . $appID;
			$appTitle = $thisContent->name;
			$appPrice = $thisContent->premium_type;
			if ( 'free' == $appPrice ) $appPrice = '0';
			$appIcon = $thisContent->icons->{64};
			$appAuthor = $thisContent->author;
			$appAuthorURL = $thisContent->support_url;
			$appRating = $thisContent->ratings->average;
			$appScreenshots = array();
			foreach ( $thisContent->previews as $appShots ) {
				$appScreenshots[] = $appShots->image_url;
			}
			//App-Daten in Array schreiben
			$appData['id'] = $cacheID;
			$appData['app_id'] = $appID;
			$appData['app_url'] = $appURL;
			$appData['app_icon'] = $appIcon;
			$appData['app_title'] = trim( $appTitle );
			$appData['app_author'] = trim( $appAuthor );
			$appData['app_author_url'] = $appAuthorURL;
			$appData['app_price'] = $appPrice;
			$appData['app_rating'] = $appRating;
			$appData['store_name'] = 'FF Marketplace';
			$appData['store_name_css'] = $storeID;
			$appData['app_screenshots'] = $appScreenshots;
			if ( $this->cacheAppData( $appData ) ) { 
				return( $appData ); 
			}
		}
		wpAppbox_errorOutput( 'function: getFirefoxMarketplace() ---> Get no app information' );
		return( false );
	}
	
	
	/**
	* Informationen aus dem Amazon App Shop auslesen (via Amazon API)
	*
	* @since   3.4.0
	* @change  3.4.8
	*
	* @param   string  $appID    ID der App
	* @param   string  $storeID  ID des Stores (wird fest vergeben)
	* @return  array   $appData  Array der App-Daten
	*/
	
	function getAmazonApps( $appID, $storeID = 'amazonapps' ) {
		global $wpdb;
		$cacheID = md5( $appID . '-' . $storeID );
		if ( $this->checkIfCached( $cacheID ) ) { 
			return( $this->returnCachedData( $cacheID ) ); 
		}
		if ( !wpAppbox_checkAmazonAPI() ) {
			return( $this->getAmazonAppsFallback( $appID ) );
		}
	    $amaRegion = get_option( 'wpAppbox_amaAPIregion' );
	    $amaSecretKey = base64_decode( get_option( 'wpAppbox_amaAPIsecretKey' ) );
	    $params["AWSAccessKeyId"]   = get_option( 'wpAppbox_amaAPIpublicKey' );
	    $params["AssociateTag"]     = get_option( 'wpAppbox_affiliateAmazonID' );
	    $params["Service"]          = 'AWSECommerceService';
	    $params["ItemId"] 			= $appID;
	    $params["Operation"]     	= 'ItemLookup';
	    $params["ResponseGroup"]    = 'Medium,Reviews';
	    $params["Timestamp"]        = gmdate( "Y-m-d\TH:i:s\Z" );
	    $params["Version"]          = "2013-08-01";
	    ksort( $params );
	    $canonicalizedQuery = array();
	    foreach ( $params as $param => $value ) {
	        $param = str_replace( "%7E", "~", rawurlencode( $param ) );
	        $value = str_replace( "%7E", "~", rawurlencode( $value ) );
	        $canonicalizedQuery[] = $param . "=" . $value;
	    }
	    $canonicalizedQuery = implode( "&", $canonicalizedQuery );
	    $stringToSign = "GET\necs.amazonaws.$amaRegion\n/onca/xml\n" . $canonicalizedQuery;
	    $amaSignature = base64_encode( hash_hmac( "sha256", $stringToSign, $amaSecretKey, True ) );
	    $amaSignature = str_replace( "%7E", "~", rawurlencode( $amaSignature ) );
	    $amaRequest = "http://ecs.amazonaws.$amaRegion/onca/xml?" . $canonicalizedQuery . "&Signature=" . $amaSignature;
		$ch = curl_init();
		curl_setopt( $ch, CURLOPT_URL, $amaRequest );
		curl_setopt( $ch, CURLOPT_HEADER, false );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch, CURLOPT_TIMEOUT, 3 );
		$amaResult = curl_exec( $ch );
		curl_close( $ch );
		if ( $amaResult != str_replace( 'InvalidClientTokenId', '', $amaResult ) ) {
			wpAppbox_errorOutput( 'function: getAmazonApps() ---> InvalidClientTokenId for Amazon API' );
			wpAppbox_errorOutput( 'function: getAmazonApps() ---> Use getAmazonAppsFallback()' );
			return( $this->getAmazonAppsFallback( $appID ) );
		} else if ( $amaResult != str_replace( 'SignatureDoesNotMatch', '', $amaResult ) ) {
			wpAppbox_errorOutput( 'function: getAmazonApps() ---> SignatureDoesNotMatch for Amazon API' );
			wpAppbox_errorOutput( 'function: getAmazonApps() ---> Use getAmazonAppsFallback()' );
			return( $this->getAmazonAppsFallback( $appID ) );
		}
		wpAppbox_errorOutput( 'function: getAmazonApps() ---> Get app information' );
		$amaParsed = simplexml_load_string( $amaResult );
		$amaParsed = $amaParsed->Items->Item;
		$amaParsed = json_decode( json_encode( $amaParsed ), true );
		if ( 'MOBILE_APPLICATION' == $amaParsed['ItemAttributes']['ProductTypeName'] || 'SKILL_APPLICATION' == $amaParsed['ItemAttributes']['ProductTypeName'] ) {
			$appTitle = $amaParsed['ItemAttributes']['Title'];
			$appPrice = $amaParsed['ItemAttributes']['OfferSummary']['Amount'];
			if ( '0' != $appPrice ) {
				$appPrice = $amaParsed['ItemAttributes']['OfferSummary']['FormattedPrice'];
			}
			if ( strpos( $appPrice, 'EUR' ) !== false ) {
				$appPrice = str_replace( 'EUR ', '', $appPrice ) . '€';
			}
			$appURL = $amaParsed['DetailPageURL'];
			$appAuthor = $amaParsed['ItemAttributes']['Publisher'];
			$appIcon = $amaParsed['MediumImage']['URL'];
			foreach ( $amaParsed['ImageSets']['ImageSet'] as $screenshotSet ) {
				if ( 'variant' == $screenshotSet['@attributes']['Category'] ) {
					$appScreenshot = $screenshotSet['LargeImage']['URL'];
					if ( '' != Trim( $appScreenshot ) ) $appScreenshots[] = $appScreenshot;
				}
			}
			if ( true == $amaParsed['CustomerReviews']['HasReviews'] ) {
				$appRatingTemplate = $this->getContent( $amaParsed['CustomerReviews']['IFrameURL'] );
				phpQuery::newDocumentHTML( $appRatingTemplate[0] );
				$appRating = pq( 'span.asinReviewsSummary img' )->attr( 'src' );
				preg_match( '/^https:\/\/images-eu.ssl-images-amazon.com\/(?:.*)stars-(.*)\._(?:.*)_\.gif$/i', $appRating, $appRating );
				$appRating = str_replace( '-', '.', $appRating[1] );
			} else {
				$appRating = '-1';
			}
			$appPrice = '0';
			switch ( $amaParsed['ItemAttributes']['ProductTypeName'] ) {
				case 'SKILL_APPLICATION':
					$appExtend = 'alexaskill';
					break;
				default:
					$appExtend = 'mobileapp';
					break;
			}
			//App-Daten in Array schreiben
			$appData['id'] = $cacheID;
			$appData['app_id'] = $appID;
			$appData['app_url'] = $appURL;
			$appData['app_icon'] = $appIcon;
			$appData['app_title'] = trim( $appTitle );
			$appData['app_author'] = trim( $appAuthor );
			$appData['app_author_url'] = $appAuthorURL;
			$appData['app_price'] = $appPrice;
			$appData['app_rating'] = $appRating;
			$appData['app_extend'] = $appExtend;
			$appData['store_name'] = 'Amazon Apps';
			$appData['store_name_css'] = $storeID;
			$appData['app_screenshots'] = $appScreenshots;
			if ( $this->cacheAppData( $appData ) ) { 
				return( $appData );
			}
		}
		wpAppbox_errorOutput( 'function: getAmazonApps() ---> Get no app information' );
		return( false );
	}
	
	
	/**
	* Informationen aus dem Amazon App Shop auslesen (via Scraping, Fallback)
	*
	* @since   3.4.0
	* @change  3.4.8
	*
	* @param   string  $appID    ID der App
	* @param   string  $storeID  ID des Stores (wird fest vergeben)
	* @return  array   $appData  Array der App-Daten
	*/
	
	function getAmazonAppsFallback($appID, $storeID = 'amazonapps') {
		global $wpdb;
		$cacheID = md5( $appID . '-' . $storeID );
		if ( $this->checkIfCached( $cacheID ) ) { 
			return( $this->returnCachedData( $cacheID ) ); 
		}
		$pageURL = $this->getStoreURL( $storeID, $appID );
		$thisContent = $this->getContent( $pageURL );
		//wpAppbox_errorOutput( $thisContent );
		$appData = array();
		if ( isset( $thisContent[0] ) && '200' == $thisContent[1]['http_code'] ) {
			wpAppbox_errorOutput( 'function: getAmazonAppsFallback() ---> Get app information' );
			phpQuery::newDocumentHTML( $thisContent[0] );
			$error_found = pq( "title" )->html();
			if ( strpos( $error_found, "404" ) !== false ) {
				return( false );
			}
			$appTitle = strip_tags( pq( 'div.buying>h1>span#btAsinTitle' )->html() );
			$appRating = substr( Trim( pq( 'div#avgRating span' )->html() ), 0, 3);
			$appPrice = pq( 'input[name*=priceValue]' )->attr( 'value' );
			if ( '0' == $appPrice ) {
				$appPrice = '0';
			} else {
				$appPrice = pq( '#actualPriceValue>strong' )->html();
			}
			if ( 0 == preg_match( '/[0-9]/', $appPrice ) ) {
				$appPrice = '0';
			}
			if ( strpos( $appPrice, 'EUR' ) !== false ) {
				$appPrice = str_replace( 'EUR ', '', $appPrice ) . '€';
			}
			$appIcon = pq( 'img[id*=main-image]' )->attr( 'src' );
			$appAuthor = pq( 'div.buying:first>span>a' )->html();
			$appExtend = 'mobileapp';
			$appAuthorURL = preg_replace("/http/", "https", pq( 'div.buying:first>span>a' )->attr( 'href' ), 1);
			$appScreenshots = array();
			foreach ( pq( 'img[class*=thumb][class!=border thumb0 selected]' ) as $appShots ) {
				$appScreenshot = str_replace( '30', '300', pq( $appShots )->attr( 'src' ) );
				$appScreenshot = str_replace( '._SL160_', '', $appScreenshot );
				if ( '' != Trim( $appScreenshot ) ) $appScreenshots[] = $appScreenshot;
			}
			if ( false !== strpos( pq( 'meta[name="title"]' )->attr( 'content' ), 'Alexa Skills' ) ) {
				$appTitle = strip_tags( pq( '.a2s-title-content' )->html() );
				$appAuthor = explode( ' ', Trim( pq( ' .a2s-title span' )->html() ), 2 );
				$appAuthor = $appAuthor[1];
				$appIcon = pq( 'div.a2s-skill-icon img.a2s-product-image' )->attr( 'src' );
				$appRating = substr( Trim( pq( 'div#avgRating span' )->html() ), 0, 3);
				$appExtend = 'alexaskill';
			}
			$appURL = $pageURL;
			if ( '' == Trim( $appTitle ) ) {
				wpAppbox_errorOutput( 'function: getAmazonAppsFallback() ---> No app data found' );
				return( false );
			}
			//App-Daten in Array schreiben
			$appData['id'] = $cacheID;
			$appData['app_id'] = $appID;
			$appData['app_url'] = $appURL;
			$appData['app_icon'] = $appIcon;
			$appData['app_title'] = trim( $appTitle );
			$appData['app_author'] = trim( $appAuthor );
			$appData['app_author_url'] = $appAuthorURL;
			$appData['app_price'] = $appPrice;
			$appData['app_rating'] = $appRating;
			$appData['app_extend'] = $appExtend;
			$appData['store_name'] = 'Amazon Apps';
			$appData['store_name_css'] = $storeID;
			$appData['app_screenshots'] = $appScreenshots;
			if ( $this->cacheAppData( $appData ) ) { 
				return( $appData );
			}
		}
		wpAppbox_errorOutput( 'function: getAmazonAppsFallback() ---> Get no app information' );
		return( false );
	}
		
	
	/**
	* Informationen von Good Old Games (GOG.com) auslesen
	*
	* @since   2.3.0
	* @change  3.4.5
	*
	* @param   string  $appID    ID der App
	* @param   string  $storeID  ID des Stores (wird fest vergeben)
	* @return  array   $appData  Array der App-Daten
	*/
	
	function getGoodOldGames( $appID, $storeID = 'goodoldgames' ) {
		$cacheID = md5( $appID . '-' . $storeID );
		if ( $this->checkIfCached( $cacheID ) ) { 
			return( $this->returnCachedData( $cacheID ) ); 
		}
		$pageURL = $this->getStoreURL( $storeID, $appID );
		$thisContent = $this->getContent( $pageURL );
		//wpAppbox_errorOutput( $thisContent );
		$appData = array();
		if ( isset( $thisContent[0] ) && '200' == $thisContent[1]['http_code']) {
			wpAppbox_errorOutput( 'function: getGoodOldGames() ---> Get app information' );
			phpQuery::newDocumentHTML( $thisContent[0] );
			$error_found = pq( "title" )->html();
			if ( strpos( $error_found, "404" ) !== false ) {
				return( false );
			}
			$appTitle = pq( 'meta[name="og:title"]' )->attr( 'content' );
			$appURL = pq( 'meta[name="og:url"]' )->attr( 'content' );
			$appIcon = pq( 'meta[name="og:image"]' )->attr( 'content' );
			
			$appPrice = pq( 'meta[itemprop="price"]' )->attr('content');
			if ( '0' != $appPrice ) {
				if ( pq( 'meta[itemprop="priceCurrency"]' )->attr( 'content' ) == 'EUR' ) {
					$appPrice = str_replace( '.', ',', $appPrice );
					$appPrice .= ' €';
				} else if ( pq( 'meta[itemprop="priceCurrency"]' )->attr( 'content' ) == 'USD' ) {
					$appPrice = '$' . $appPrice;
				} else {
					$appPrice .= pq( 'meta[itemprop="priceCurrency"]' )->attr('content');
				}
			}
			
			$appAuthor = pq( 'div.product-details__data a[itemtype="http://schema.org/PropertyValue"] span[content="publisher"]+span[itemprop="value"]' )->attr('content');
			$appAuthorURL = 'https://www.gog.com' . pq( 'div.product-details__data a[itemtype="http://schema.org/PropertyValue"]' )->attr( 'href' );
			
			$appRating = 0;
			foreach ( pq( 'span.header__rating>i' ) as $stars ) {
				$stars = pq( $stars )->attr( 'class' );
				if ( $stars == 'ic icon-star-full' ) {
					$appRating = $appRating + 1;
				} else if ( $stars == 'ic icon-star-half' ) { 
					$appRating = $appRating + 0.5;
				}
			}
			$appScreenshots = array();
			foreach ( pq( '.screen-tmb__img') as $appShots ) {
				$appScreenshot = str_replace( '_112', '_600', pq( $appShots )->attr( 'src' ) );
				if ( '' != Trim( $appScreenshot ) ) {
					$appScreenshots[] = trim( $appScreenshot );
				}
			}
			//App-Daten in Array schreiben
			$appData['id'] = $cacheID;
			$appData['app_id'] = $appID;
			$appData['app_url'] = $appURL;
			$appData['app_icon'] = $appIcon;
			$appData['app_title'] = trim( $appTitle );
			$appData['app_author'] = trim( $appAuthor );
			$appData['app_author_url'] = $appAuthorURL;
			$appData['app_price'] = $appPrice;
			$appData['app_rating'] = $appRating;
			$appData['store_name'] = 'GOG.com';
			$appData['store_name_css'] = $storeID;
			$appData['app_screenshots'] = $appScreenshots;
			if ( $this->cacheAppData( $appData ) ) { 
				return( $appData ); 
			}
		}
		wpAppbox_errorOutput( 'function: getGoodOldGames() ---> Get no app information' );
		return( false );
	}
	
	
	/**
	* Informationen aus dem Steam Store auslesen
	*
	* @since   1.8.5
	* @change  3.4.5
	*
	* @param   string  $appID    ID der App
	* @param   string  $storeID  ID des Stores (wird fest vergeben)
	* @return  array   $appData  Array der App-Daten
	*/
	
	function getSteam( $appID, $storeID = 'steam' ) {
		$cacheID = md5( $appID . '-' . $storeID );
		if ( $this->checkIfCached( $cacheID ) ) {
			return( $this->returnCachedData( $cacheID ) ); 
		}
		$pageURL = $this->getStoreURL( $storeID, $appID );
		$thisContent = $this->getContent( $pageURL );
		$thisContent = $this->getContent( $pageURL );
		$thisContent = json_decode( $thisContent[0] );
		//wpAppbox_errorOutput( $thisContent );
		$appData = array();
		if ( '1' == $thisContent->$appID->success ) {
			wpAppbox_errorOutput( 'function: getSteam() ---> Get app information' );
			$thisContent = $thisContent->$appID->data;
			$appTitle = $thisContent->name;
			$appURL = 'http://store.steampowered.com/app/'.$appID.'/';
			$appIcon = $thisContent->header_image;
			foreach ( $thisContent->developers as $devs ) {
				$appAuthor .= ", <a href=\"http://store.steampowered.com/search/?developer=$devs\">$devs</a>";
			}
			$appAuthor = substr( $appAuthor, 2 );
			$currency = $thisContent->price_overview->currency;
			$appPrice = $thisContent->price_overview->final  / 100;
			if ( 'EUR' == $currency ) {
				$appPrice = str_replace( '.', ',', $appPrice ) . ' €';
			} elseif ( 'USD' == $currency ) { 
				$appPrice = '$ ' . $appPrice;
			} else {
				$appPrice = $appPrice.' '.$currency;
			}
			$appScreenshots = array();
			foreach ( $thisContent->screenshots as $appShots ) {
				$appScreenshots[] = $appShots->path_thumbnail;
			}
			//App-Daten in Array schreiben
			$appData['id'] = $cacheID;
			$appData['app_id'] = $appID;
			$appData['app_url'] = $appURL;
			$appData['app_icon'] = $appIcon;
			$appData['app_title'] = trim( $appTitle );
			$appData['app_author'] = trim( $appAuthor );
			$appData['app_price'] = $appPrice;
			$appData['app_rating'] = '-1';
			$appData['store_name'] = 'Steam';
			$appData['store_name_css'] = $storeID;
			$appData['app_screenshots'] = $appScreenshots;
			if ( $this->cacheAppData( $appData ) ) { 
				return( $appData ); 
			}
		}
		wpAppbox_errorOutput( 'function: getSteam() ---> Get no app information' );
		return( false );
	}
	
	
	/**
	* Informationen aus dem (Mac) App Store auslesen
	*
	* @since   1.0.0
	* @change  3.4.8
	*
	* @param   string  $appID    ID der App
	* @param   string  $storeID  ID des Stores (wird fest vergeben)
	* @return  array   $appData  Array der App-Daten
	*/
	
	function getAppStore( $appID, $storeID = 'appstore' ) {
		$appID = str_replace( array( '-iphone', '-ipad', '-universal', '-watch' ), '', $appID );
		if ( substr( $appID, 0, 2 ) == 'id' ) {
			$appID = substr( $appID, 2 );
		}
		$cacheID = md5( $appID . '-' . $storeID );
		if ( $this->checkIfCached( $cacheID ) ) { 
			return( $this->returnCachedData( $cacheID ) ); 
		}
		$pageURL = $this->getStoreURL( $storeID, $appID );
		if ( strpos( $appID, "bundle" ) !== false ) {
			$pageURL = str_replace( 'app/id', '', $pageURL );
		}
		$thisContent = $this->getContent( $pageURL );
		//wpAppbox_errorOutput( $thisContent );
		$appData = array();
		if ( isset( $thisContent[0]) && '200' == $thisContent[1]['http_code'] ) {
			wpAppbox_errorOutput( 'function: getAppStore() ---> Get app information' );
			phpQuery::newDocumentHTML( $thisContent[0] );
			$error_found = pq( '#desktopContentBlockId' )->text();
			if ( '' == $error_found ) {
				return( false );
			}
			$appTitle = pq( 'h1[itemprop="name"]' )->html();
			$appURL = pq( 'link[rel="canonical"]:first' )->attr( 'href' );
			$appIcon = pq( 'div.artwork meta[itemprop="image"]' )->attr( 'content' );
			if ( '' == $appIcon ) {
				$appIcon = pq( 'div.oval-artwork meta[itemprop="image"]' )->attr( 'content' );
			}
			$appAuthor = pq( 'div#title>div.left>h2' )->html();
			$appAuthor = preg_replace( "/^\w+\W ?(.*)$/s", "$1", $appAuthor );
			$appAuthorURL = pq( 'div#title>div.right>a.view-more' )->attr( 'href' );
			$appPrice = trim( pq( 'div[itemprop="price"]' )->attr( 'content' ) );
			if ( '' != ( trim( pq( 'div.in-app-purchases' )->html() ) ) ) {
				$appHasIAP = true;
			} else {
				$appHasIAP = false;
			}
			if ( '' != Trim( pq( 'div.works-on-apple-watch' )->html() ) ) {
				$appForWatch = '1';
			}
			if ( '' != Trim( pq( 'div.only-for-i-message' )->html() ) ) {
			}
			$appRating_html = pq( 'div.customer-ratings>div.rating:last' )->html();
			$appRating = 5 - substr_count( $appRating_html, 'ghost' );
			if ( strpos( $appRating_html, 'half' ) !== false ) {
				$appRating = $appRating-0.5;
			}
			if ( '' == pq( 'div#mac-app-store-required' )->html() ) {
				$storeName = 'App Store';
				$storeNameCSS = 'appstore';
			} else {
				$storeName = 'Mac App Store';
				$storeNameCSS = 'macappstore';
			}
			$appScreenshots = array();
			foreach ( pq( 'div.iphone-screen-shots>div div.lockup img') as $appShots ) {
				$appScreenshot = pq( $appShots )->attr( 'src' );
				$appScreenshots['iphone'][] = $appScreenshot;
			}
			foreach ( pq( 'div.ipad-screen-shots>div div.lockup img') as $appShots ) {
				$appScreenshot = pq( $appShots )->attr( 'src' );
				$appScreenshots['ipad'][] = $appScreenshot;
			}
			foreach ( pq( 'div#watch-screenshots-swoosh>div div.lockup img') as $appShots ) {
				$appScreenshot = pq( $appShots )->attr( 'src' );
				$appScreenshots['watch'][] = $appScreenshot;
			}
			$AreThereScreenshotsForAppleTV = pq( 'div.swoosh.screenshots div.title')->html();
			if ( $AreThereScreenshotsForAppleTV != str_replace( 'Apple TV', '', $AreThereScreenshotsForAppleTV ) ) {
				foreach ( pq( 'div.swoosh.screenshots div.content>div>div.lockup img') as $appShots ) {
					$appScreenshot = pq( $appShots )->attr( 'src' );
					$appScreenshots['appletv'][] = $appScreenshot;
				}
			}
			foreach ( pq( 'div.mac-application>div div.lockup img') as $appShots ) {
				$appScreenshot = pq( $appShots )->attr( 'src' );
				$appScreenshots[] = $appScreenshot;
			}
			//App-Daten in Array schreiben
			$appData['id'] = $cacheID;
			$appData['app_id'] = $appID;
			$appData['app_url'] = $appURL;
			$appData['app_icon'] = $appIcon;
			$appData['app_title'] = trim( $appTitle );
			$appData['app_author'] = trim( $appAuthor );
			if ( 'appstore' == $storeNameCSS ) {
				$appData['app_author_url'] = $appAuthorURL;
			}
			$appData['app_price'] = $appPrice;
			$appData['app_has_iap'] = $appHasIAP;
			if ( $appForWatch ) {
				$appData['app_extend'] = $appForWatch;
			}
			$appData['app_rating'] = $appRating;
			$appData['store_name'] = $storeName;
			$appData['store_name_css'] = $storeNameCSS;
			$appData['app_screenshots'] = $appScreenshots;
			if ( $this->cacheAppData( $appData ) ) { 
				return( $appData ); 
			}
		}
		wpAppbox_errorOutput( 'function: getAppStore() ---> Get no app information' );
		return( false );
	}
	
	
	/**
	* Informationen aus dem WordPress-Plugin-Verzeichnis auslesen
	*
	* @since   1.7.0
	* @change  3.4.5
	*
	* @param   string  $appID    ID der App
	* @param   string  $storeID  ID des Stores (wird fest vergeben)
	* @return  array   $appData  Array der App-Daten
	*/
	
	function getWordPress( $appID, $storeID = 'wordpress' ) {
		$cacheID = md5( $appID . '-' . $storeID );
		if ( $this->checkIfCached( $cacheID ) ) { 
			return( $this->returnCachedData( $cacheID ) ); 
		}
		$pageURL = $this->getStoreURL( $storeID, $appID );
		$thisContent = $this->getContent( urldecode( $pageURL . 'screenshots/' ) );
		//wpAppbox_errorOutput( $thisContent );
		$appData = array();
		if ( isset( $thisContent[0] ) && '200' == $thisContent[1]['http_code'] ) {
			wpAppbox_errorOutput( 'function: getWordPress() ---> Get app information' );
			phpQuery::newDocumentHTML( $thisContent[0] );
			$error_found = pq( "Whoops!" )->text();
			if ( $error_found != '' ) {
				return( false );
			}
			$appRating = pq( 'meta[itemprop="ratingValue"]' )->attr( 'content' );
			$appIcon = plugins_url('wp-appbox/img/wordpress-logo.png');
			$appTitle = pq( 'h2[itemprop="name"]' )->text();
			$appAuthor = pq( 'div.plugin-contributor-info:first>div>a' )->text();
			if ( 1 < substr_count($thisContent[0], '<div class=\'plugin-contributor-info\'>' ) ) {
				$appAuthor = esc_html__('various', 'wp-appbox');
				$appAuthorURL = $pageURL;
			} else {
				$appAuthor = pq( 'div.plugin-contributor-info:first>div>a' )->text();
				$appAuthorURL = pq( 'div.plugin-contributor-info:first>div>a' )->attr( 'href' );
			}
			$appPrice = '0';
			$appScreenshots = array();
			foreach ( pq( 'img.screenshot') as $appShots ) {
				$appScreenshot = pq( $appShots )->attr( 'src' );
				$appScreenshots[] = $appScreenshot;
			}
			$appURL = $pageURL;
			//App-Daten in Array schreiben
			$appData['id'] = $cacheID;
			$appData['app_id'] = $appID;
			$appData['app_url'] = $appURL;
			$appData['app_icon'] = $appIcon;
			$appData['app_title'] = trim( $appTitle );
			$appData['app_author'] = trim( $appAuthor );
			$appData['app_author_url'] = $appAuthorURL;
			$appData['app_rating'] = $appRating;
			$appData['app_price'] = $appPrice;
			$appData['store_name'] = 'WordPress';
			$appData['store_name_css'] = $storeID;
			$appData['app_screenshots'] = $appScreenshots;
			if ( $this->cacheAppData( $appData ) ) { 
				return( $appData );
			}
		}
		wpAppbox_errorOutput( 'function: getWordPress() ---> Get no app information' );
		return( false );
	}
		
	
	/**
	* Informationen aus dem Windows Store auslesen
	*
	* @since   1.0.0
	* @change  3.4.8
	*
	* @param   string  $appID    ID der App
	* @param   string  $storeID  ID des Stores (wird fest vergeben)
	* @return  array   $appData  Array der App-Daten
	*/
	
	function getWindowsStore( $appID, $storeID = 'windowsstore' ) {
		$cacheID = md5( $appID . '-' . $storeID );
		if ( $this->checkIfCached( $cacheID ) ) { 
			return( $this->returnCachedData( $cacheID ) ); 
		}
		$pageURL = $this->getStoreURL( $storeID, $appID );
		if (strlen($appID) > 20) {
			$pageURL = 'https://www.windowsphone.com/s?appId=' . $appID;
			$old_phone_app = true;
		}
		$thisContent = $this->getContent( $pageURL );
		//wpAppbox_errorOutput( $thisContent );
		$appData = array();
		if ( isset( $thisContent[0] ) && '200' == $thisContent[1]['http_code'] ) {
			wpAppbox_errorOutput( 'function: getWindowsStore() ---> Get app information' );
			phpQuery::newDocumentHTML( $thisContent[0] );
			$error_found = pq( 'meta[name="ms.pagename"]' )->attr( 'content' );
			if ( ( 'App Details' != $error_found ) && ( 'Game Details' != $error_found ) ) {
				return( false );
			}
			$appURL = pq( 'link[rel="canonical"]' )->attr( 'href' );
			if ( $old_phone_app ) {
				$new_item_id = preg_replace( "/https:\/\/www.microsoft.com\/.*-.*\/store\/apps\/.*\/(.*)/i", "$1", $appURL );
				return( $this->getWindowsStore( $new_item_id ) );
			}
			if ( '' != ( trim( pq( 'div.srv_iapNotification' )->html() ) ) ) {
				$appHasIAP = true;
			} else {
				$appHasIAP = false;
			}
			$appURL = preg_replace( "/(https:\/\/www.microsoft.com\/)(.*)(store\/apps\/.*\/.*)/i", "$1$3", $appURL );
			$appTitle = pq( 'h1#page-title' )->html();
			$appPrice = trim(pq( 'div.price-text:first>span' )->html());
			if ( ( strpos( $appPrice, ',' ) === false && strpos( $appPrice, '.' ) === false) || $appPrice == 'N/V' ) {
				$appPrice = '0';
			}
			$appAuthor = pq( 'div.context-product-placement-data>dl>dd:first' )->html();
			$appIcon = pq( 'img.cli_image:first' )->attr( 'src' );
			$appBackground = pq( 'img.cli_image:first' )->attr( 'style' );
			$appBackground = preg_replace( "/.*background-color: (.*);[ ].*/i", "$1", $appBackground );
			$appRatingStars = '';
			foreach ( pq( 'div.c-rating:first div span.c-glyph') as $appRatings ) {
				$appRatingStars .= pq( $appRatings )->attr( 'class' );
			}
			$appRatingStars = trim( str_replace( 'c-glyph', '', $appRatingStars ) );
			$appRating = substr_count( $appRatingStars, 'f-full' );
			if ( strpos( $appRatingStars, 'f-half' ) !== false ) {
				$appRating = $appRating + 0.5;
			}
			if ( $appRating != '') {
				if ( $appRating != 0) {
				switch ( $appRating ) {
					case ( $appRating < 0.5 ):
					$appRating = 0;
					break;
					case ( $appRating >= 0.5 && $appRating < 1 ):
					$appRating = 0.5;
					break;
					case ( $appRating >= 1 && $appRating < 1.5 ):
					$appRating = 1;
					break;
					case ( $appRating >= 1.5 && $appRating < 2 ):
					$appRating = 1.5;
					break;
					case ( $appRating >= 2 && $appRating < 2.5 ):
					$appRating = 2;
					break;
					case ( $appRating >= 2.5 && $appRating < 3 ):
					$appRating = 2.5;
					break;
					case ( $appRating >= 3 && $appRating < 3.5 ):
					$appRating = 3;
					break;
					case ( $appRating >= 3.5 && $appRating < 4 ):
					$appRating = 3.5;
					break;
					case ( $appRating >= 4 && $appRating < 4.5 ):
					$appRating = 4;
					break;
					case ( $appRating >= 4.5 && $appRating < 5 ):
					$appRating = 4.5;
					break;
					case ( $appRating == 5 ):
					$appRating = 5;
					break;
				}
				}
			}
			$appScreenshots = array();
			foreach ( pq( 'div[data-key="mobile"] picture.c-image img') as $appShots ) {
				$appScreenshot = pq( $appShots )->attr( 'src' );
				if ( '' == $appScreenshot ) {
					$appScreenshot = pq( $appShots )->attr( 'srcset' );
				}
				//$appScreenshot = stristr( $appScreenshot, '?', true );
				$appScreenshot = str_replace( '&amp;', '&', $appScreenshot );
				$appScreenshot = preg_replace( '/&w=[0-9]*/i', '', $appScreenshot );
				$appScreenshot = preg_replace( '/&h=[0-9]*/i', '&h=800', $appScreenshot );
				$appScreenshot = preg_replace( '/&q=[0-9]*/i', '&q=100', $appScreenshot );
				$appScreenshots['mobile'][] = $appScreenshot;
			}
			foreach ( pq( 'div[data-key="desktop"] picture.c-image img') as $appShots ) {
				$appScreenshot = pq( $appShots )->attr( 'src' );
				if ( '' == $appScreenshot ) {
					$appScreenshot = pq( $appShots )->attr( 'data-src' );
				}
				//$appScreenshot = stristr( $appScreenshot, '?', true );
				$appScreenshot = str_replace( '&amp;', '&', $appScreenshot );
				$appScreenshot = preg_replace( '/&w=[0-9]*/i', '&w=1200', $appScreenshot );
				$appScreenshot = preg_replace( '/&h=[0-9]*/i', '', $appScreenshot );
				$appScreenshot = preg_replace( '/&q=[0-9]*/i', '&q=100', $appScreenshot );
				$appScreenshots['desktop'][] = $appScreenshot;
			}
			foreach ( pq( 'div[data-key="xbox"] picture.c-image img') as $appShots ) {
				$appScreenshot = pq( $appShots )->attr( 'src' );
				if ( '' == $appScreenshot ) {
					$appScreenshot = pq( $appShots )->attr( 'data-src' );
				}
				//$appScreenshot = stristr( $appScreenshot, '?', true );
				$appScreenshot = str_replace( '&amp;', '&', $appScreenshot );
				$appScreenshot = preg_replace( '/&w=[0-9]*/i', '&w=800', $appScreenshot );
				$appScreenshot = preg_replace( '/&h=[0-9]*/i', '', $appScreenshot );
				$appScreenshot = preg_replace( '/&q=[0-9]*/i', '&q=100', $appScreenshot );
				$appScreenshots['desktop'][] = $appScreenshot;
			}
			$appURL = $pageURL;
			//App-Daten in Array schreiben
			$appData['id'] = $cacheID;
			$appData['app_id'] = $appID;
			$appData['app_url'] = $appURL;
			$appData['app_icon'] = $appIcon;
			$appData['app_title'] = trim( $appTitle );
			$appData['app_author'] = trim( $appAuthor );
			$appData['app_rating'] = $appRating;
			$appData['app_has_iap'] = $appHasIAP;
			$appData['app_price'] = $appPrice;
			if ( '' != $appBackground ) {
				$appData['app_extend'] = $appBackground;
			}
			$appData['store_name'] = 'Windows Store';
			$appData['store_name_css'] = $storeID;
			$appData['app_screenshots'] = $appScreenshots;
			if ( $this->cacheAppData( $appData ) ) { 
				return( $appData ); 
			}
		}
		if ( isset( $thisContent[0] ) && '403' == $thisContent[1]['http_code'] ) {
			wpAppbox_errorOutput( 'function: getWindowsStore() ---> Access denied (403)' );
		}
		wpAppbox_errorOutput( 'function: getWindowsStore() ---> Get no app information' );
		return( false );
	}
	
	
	/**
	* Informationen aus dem Opera Addon-Archiv auslesen
	*
	* @since   1.7.5
	* @change  3.4.5
	*
	* @param   string  $appID    ID der App
	* @param   string  $storeID  ID des Stores (wird fest vergeben)
	* @return  array   $appData  Array der App-Daten
	*/
	
	function getOperaAddons( $appID, $storeID = 'operaaddons' ) {
		$cacheID = md5( $appID . '-' . $storeID );
		if ( $this->checkIfCached( $cacheID ) ) { 
			return( $this->returnCachedData( $cacheID ) ); 
		}
		$pageURL = $this->getStoreURL( $storeID, $appID );
		$thisContent = $this->getContent( $pageURL );
		//wpAppbox_errorOutput( $thisContent );
		$appData = array();
		if ( isset($thisContent[0]) && '200' == $thisContent[1]['http_code'] ) {
			wpAppbox_errorOutput( 'function: getOperaAddons() ---> Get app information' );
			phpQuery::newDocumentHTML( $thisContent[0] );
			if ( '404' == pq( "div.contained>header>h2" )->text()) {
				return( false );
			} elseif ( NULL != pq( "div#unavailable" )->text() ) {
				return( false );
			}
			$appRating = pq( 'p.rating>span[class="meter"]>span' )->attr( 'title' );
			$appTitle = pq( 'meta[property="og:title"]' )->attr( 'content' );
			$appIcon = pq( 'meta[property="og:image"]' )->attr( 'content' );
			$appURL = pq( 'meta[property="og:url"]' )->attr( 'content' );
			$appAuthor = pq( 'article.pkg-details h3.h-byline>a' )->html();
			$appAuthorURL = 'https://addons.opera.com' . pq( 'article.pkg-details h3.h-byline>a' )->attr( 'href' );
			$appPrice = '0';
			$appScreenshots = array();
			foreach ( pq( 'section.image-viewer li.thumbnail a') as $appShots ) {
				$appScreenshot = 'https://addons.opera.com' . pq( $appShots )->attr( 'href' );
				$appScreenshots[] = $appScreenshot;
			}
			$appURL = $pageURL;
			//App-Daten in Array schreiben
			$appData['id'] = $cacheID;
			$appData['app_id'] = $appID;
			$appData['app_url'] = $appURL;
			$appData['app_icon'] = $appIcon;
			$appData['app_title'] = trim( $appTitle );
			$appData['app_author'] = trim( $appAuthor );
			$appData['app_author_url'] = $appAuthorURL;
			$appData['app_rating'] = $appRating;
			$appData['app_price'] = $appPrice;
			$appData['store_name'] = 'Opera Add-ons';
			$appData['store_name_css'] = $storeID;
			$appData['app_screenshots'] = $appScreenshots;
			if ( $this->cacheAppData( $appData ) ) { 
				return( $appData ); 
			}
		}
		wpAppbox_errorOutput( 'function: getOperaAddons() ---> Get no app information' );
		return( false );
	}
	
	
	/**
	* Informationen aus dem Firefox Addon-Verzeichnis auslesen
	*
	* @since   1.4.0
	* @change  3.4.5
	*
	* @param   string  $appID    ID der App
	* @param   string  $storeID  ID des Stores (wird fest vergeben)
	* @return  array   $appData  Array der App-Daten
	*/
	
	function getFirefoxAddon( $appID, $storeID = 'firefoxaddon' ) {
		$cacheID = md5( $appID . '-' . $storeID );
		if ( $this->checkIfCached( $cacheID ) ) { 
			return( $this->returnCachedData( $cacheID ) ); 
		}
		$pageURL = $this->getStoreURL( $storeID, $appID );
		$thisContent = $this->getContent( $pageURL );
		//wpAppbox_errorOutput( $thisContent );
		$appData = array();
		if ( isset( $thisContent[0] ) && '200' == $thisContent[1]['http_code'] ) {
			wpAppbox_errorOutput( 'function: getFirefoxAddon() ---> Get app information' );
			phpQuery::newDocumentHTML( $thisContent[0] );
			$error_found = pq( "title" )->html();
			if ( 'Nicht gefunden' == $error_found ) {
				return( false );
			}
			$appRating = pq( 'meta[itemprop="ratingValue"]' )->attr( 'content' );
			$appIcon = pq( 'img[itemprop="image"]' )->attr( 'src' );
			$appTitle = pq( 'span[itemprop="name"]:first' )->html();
			$appAuthor = pq( 'h4[class="author"] > a' )->html();
			$appAuthorURL = 'https://addons.mozilla.org' . pq( 'h4[class="author"] > a' )->attr( 'href' );
			$appPrice = '0';
			$appScreenshots = array();
			foreach ( pq( 'section.previews > div.carousel > ul > li > a') as $appShots ) {
				$appScreenshot = pq( $appShots )->attr( 'href' );
				$appScreenshots[] = $appScreenshot;
			}
			$appURL = $pageURL;
			//App-Daten in Array schreiben
			$appData['id'] = $cacheID;
			$appData['app_id'] = $appID;
			$appData['app_url'] = $appURL;
			$appData['app_icon'] = $appIcon;
			$appData['app_title'] = trim( $appTitle );
			$appData['app_author'] = trim( $appAuthor );
			$appData['app_author_url'] = $appAuthorURL;
			$appData['app_rating'] = $appRating;
			$appData['app_price'] = $appPrice;
			$appData['store_name'] = 'Firefox Add-ons';
			$appData['store_name_css'] = $storeID;
			$appData['app_screenshots'] = $appScreenshots;
			if ( $this->cacheAppData( $appData ) ) { 
				return( $appData ); 
			}
		}
		wpAppbox_errorOutput( 'function: getFirefoxAddon() ---> Get no app information' );
		return( false );
	}
	
	
	/**
	* Informationen aus dem Chrome Web Store auslesen
	*
	* @notice  Keine Screenshots
	*
	* @since   1.0.0
	* @change  3.4.5
	*
	* @param   string  $appID    ID der App
	* @param   string  $storeID  ID des Stores (wird fest vergeben)
	* @return  array   $appData  Array der App-Daten
	*/
	
	function getChromeWebStore( $appID, $storeID = 'chromewebstore' ) {
		$cacheID = md5( $appID . '-' . $storeID );
		if ( $this->checkIfCached( $cacheID ) ) { 
			return( $this->returnCachedData( $cacheID ) ); 
		}
		$pageURL = $this->getStoreURL( $storeID, $appID );
		$thisContent = $this->getContent( $pageURL );
		if ( '301' == $thisContent[1]['http_code'] ) {
			$thisContent = $this->getContent( $thisContent[1]['redirect_url'] );
		} else if ('0' == $thisContent[1]['http_code'] ) {
			$thisContent = $this->getContent( urldecode( 'https://chrome.google.com' . $thisContent[1]['url'] ) );
		}
		//wpAppbox_errorOutput( $thisContent );
		$appData = array();
		if ( isset( $thisContent[0] ) && '200' == $thisContent[1]['http_code'] ) {
			wpAppbox_errorOutput( 'function: getChromeWebStore() ---> Get app information' );
			phpQuery::newDocumentHTML( $thisContent[0] );
			$error_found = pq( "#error-section" )->text();
			if ( $error_found != '' ) {
				return( false );
			}
			$appRating = pq( 'meta[itemprop="ratingValue"]' )->attr( 'content' );
			$appIcon = pq( 'meta[property="og:image"]' )->attr( 'content' );
			$appURL = pq( 'meta[property="og:url"]' )->attr( 'content' );
			$appTitle = pq( 'meta[property="og:title"]' )->attr( 'content' );
			if ( '' != pq( 'a.e-f-y' )->html() ) {
				$appAuthor = pq( 'a.e-f-y' )->html(); 
				$appAuthorURL = pq( 'a.e-f-y' )->attr( 'href' );
			} else if ( '' != pq( 'div.e-f-Me.e-f-Xi-oc' )->html() ) {
				$appAuthor = pq( 'div.e-f-Me.e-f-Xi-oc' )->html();
				$appAuthor = end ( explode( ' ', $appAuthor, 3 ) );
				if ( parse_url( $appAuthor ) ) {
					$appAuthorURL = "http://$appAuthor";
				}
			} else if ( '' != pq( 'span.e-f-Me > a' )->html() ) { 
				$appAuthor = pq( 'span.e-f-Me > a' )->html();
				$appAuthor = end ( explode( ' ', $appAuthor, 3 ) );
				$appAuthorURL = pq( 'a.e-f-y' )->attr( 'href' );
				if ( '' == $appAuthorURL ) {
					$appAuthorURL = $appURL;
				}
			} else if ( '' != pq( 'span.e-f-Me' )->html() ) { 
				$appAuthor = pq( 'span.e-f-Me' )->html();
				$appAuthor = end ( explode( ' ', $appAuthor, 3 ) );
				$appAuthorURL = pq( 'a.e-f-y' )->attr( 'href' );
				if ( '' == $appAuthorURL ) {
					$appAuthorURL = $appURL;
				}
			} else {
				$appAuthor = esc_html__('Unknown', 'wp-appbox');
				$appAuthorURL = $appURL;
			}
			if ( '$0' == pq( 'meta[itemprop="price"]' )->attr( 'content' ) ) {
				$appPrice = '0';
			} else {
				$appPrice = '0';
			}
			$appScreenshots = array();
			foreach ( pq( 'img[aria-hidden="true"]') as $appShots ) {
				$appScreenshot = pq( $appShots )->attr( 'src' );
				$appScreenshots[] = $appScreenshot;
			}
			//App-Daten in Array schreiben
			$appData['id'] = $cacheID;
			$appData['app_id'] = $appID;
			$appData['app_url'] = $appURL;
			$appData['app_icon'] = $appIcon;
			$appData['app_title'] = trim( $appTitle );
			$appData['app_author'] = trim( $appAuthor );
			$appData['app_author_url'] = $appAuthorURL;
			$appData['app_rating'] = $appRating;
			$appData['app_price'] = $appPrice;
			$appData['store_name'] = 'Chrome Web Store';
			$appData['store_name_css'] = $storeID;
			$appData['app_screenshots'] = $appScreenshots;
			if ( $this->cacheAppData( $appData ) ) { 
				return( $appData ); 
			}
			return( $appData ); 
		}
		if ( '503' == $thisContent[1]['http_code'] || '302' == $thisContent[1]['http_code'] ) {
			$appData['app_id'] = '0';
			$appData['app_url'] = $pageURL;
			$appData['app_icon'] = $appIcon;
			$appData['app_title'] = esc_html__('Download', 'wp-appbox');
			$appData['store_name'] = 'Chrome Web Store';
			$appData['store_name_css'] = $storeID;
			$appData['fallback'] = '1';
			return( $appData );
		}
		wpAppbox_errorOutput( 'function: getChromeWebStore() ---> Get no app information' );
		return( false );
	}	
	
	
	/**
	* Informationen aus den XDA Labs auslesen
	*
	* @since   3.4.8
	* @change  n/a
	*
	* @param   string  $appID    ID der App
	* @param   string  $storeID  ID des Stores (wird fest vergeben)
	* @return  array   $appData  Array der App-Daten
	*/
	
	function getXDA( $appID, $storeID = 'xda' ) {
		$cacheID = md5( $appID . '-' . $storeID );
		if ( $this->checkIfCached( $cacheID ) ) { 
			return( $this->returnCachedData( $cacheID ) ); 
		}
		$pageURL = $this->getStoreURL( $storeID, $appID );
		$thisContent = $this->getContent( $pageURL );
		//wpAppbox_errorOutput( $thisContent );
		$appData = array();
		if ( isset( $thisContent[0] ) && '200' == $thisContent[1]['http_code'] ) {
			wpAppbox_errorOutput( 'function: getXDA() ---> Get app information' );
			phpQuery::newDocumentHTML( $thisContent[0] );
			$error_found = pq( "body>h1" )->html();
			if ( 'Not Found' == $error_found ) {
				return( false );
			}
			
			//App-Daten aus der HTML-Seite auslesen
			$appURL = $pageURL;
			$appIcon = pq( 'link[rel="shortcut icon"]' )->attr( 'href' );
			$appTitle = pq( 'h1.app-title' )->html();
			$appAuthor = pq( 'div.app-header-info-wrapper>p>a' )->html();
			$appAuthorURL = 'https://labs.xda-developers.com' . pq( 'div.app-header-info-wrapper>p>a' )->attr( 'href' );
			$appPrice = '0';
			$appRating = pq( 'div.span6.text-right.stats-text' )->html();
			if ( $appRating != '') {
				if ( $appRating != 0) {
					switch ( $appRating ) {
						case ( $appRating < 0.5 ):
						$appRating = 0;
						break;
						case ( $appRating >= 0.5 && $appRating < 1 ):
						$appRating = 0.5;
						break;
						case ( $appRating >= 1 && $appRating < 1.5 ):
						$appRating = 1;
						break;
						case ( $appRating >= 1.5 && $appRating < 2 ):
						$appRating = 1.5;
						break;
						case ( $appRating >= 2 && $appRating < 2.5 ):
						$appRating = 2;
						break;
						case ( $appRating >= 2.5 && $appRating < 3 ):
						$appRating = 2.5;
						break;
						case ( $appRating >= 3 && $appRating < 3.5 ):
						$appRating = 3;
						break;
						case ( $appRating >= 3.5 && $appRating < 4 ):
						$appRating = 3.5;
						break;
						case ( $appRating >= 4 && $appRating < 4.5 ):
						$appRating = 4;
						break;
						case ( $appRating >= 4.5 && $appRating < 5 ):
						$appRating = 4.5;
						break;
						case ( $appRating == 5 ):
						$appRating = 5;
						break;
					}
				}
			}
			$appScreenshots = array();
			foreach ( pq( 'ul#screenshot_entries li img' ) as $appShots ) {
				$appScreenshot = pq( $appShots )->attr( 'src' );
				$appScreenshots[] = $appScreenshot;
			}
			$appURL = $pageURL;
			//App-Daten in Array schreiben
			$appData['id'] = $cacheID;
			$appData['app_id'] = $appID;
			$appData['app_url'] = $appURL;
			$appData['app_icon'] = $appIcon;
			$appData['app_title'] = trim( $appTitle );
			$appData['app_author'] = trim( $appAuthor );
			$appData['app_author_url'] = $appAuthorURL;
			$appData['app_price'] = $appPrice;
			$appData['app_has_iap'] = $appHasIAP;
			$appData['app_rating'] = $appRating;
			$appData['store_name'] = 'XDA Labs';
			$appData['store_name_css'] = $storeID;
			$appData['app_screenshots'] = $appScreenshots;
			if ( $this->cacheAppData( $appData ) ) { 
				return( $appData ); 
			}
		}
		wpAppbox_errorOutput( 'function: getXDA() ---> Get no app information' );
		return( false );
	}
	
	
} /* Class beenden */

?>