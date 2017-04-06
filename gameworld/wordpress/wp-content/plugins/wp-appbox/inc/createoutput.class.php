<?php

	
/**
* wpAppbox_CreateOutput
*/
class wpAppbox_CreateOutput {
	
		
	/**
	* Ersetzt HTTP und HTTPS durch // und wandelt Links für Apple und Amazon um
	*
	* @since   3.0.2
	* @change  3.4.6
	*
	* @param   string  $theURL   App-Link
	* @param   string  $storeID  ID des Stores (z.B. "googleplay")
	* @return  string  $theURL   Umgewandelter App-Link
	*/
	
	function cleanURL( $theURL, $storeID ) {
		if ( is_ssl() ) {
			$theURL = str_replace( 'http://', '//', $theURL );
			$theURL = str_replace( 'https://', '//', $theURL );
			if ( strpos( $theURL, '.mzstatic' ) || strpos( $theURL, 'apple.com' ) ) {
				if ( get_option('wpAppbox_sslAppleImages') ) {
					preg_match( '/\/\/([a-z]*)([0-9]+)(.mzstatic.com)(.*)/i', $theURL, $urlMatches );
					/* [0] = URL; [1] = is/a/s; [2] = 1..2..3...; [3] = .mzstatic.com; [4] = /...; */
					if ( 'is' == $urlMatches[1] ) {
						/* Für is*.mzstatic.com/... */
						$theURL = '//' . $urlMatches[1] . $urlMatches[2] . '-ssl' . $urlMatches[3] . $urlMatches[4];
					} else {
						/* Für s*|a*.mzstatic.com/... */
						$theURL = '//s' . $urlMatches[2] . $urlMatches[3] . $urlMatches[4];
					}
				} else {
					$theURL = 'http:' . $theURL;
				}
			} 
			if ( strpos( $theURL, 'amazon.' ) ) {
				$theURL = str_replace( 'ecx.images-amazon.com', 'images-na.ssl-images-amazon.com', $theURL );
				$theURL = 'https:' . $theURL;
			}
		}
		return( $theURL );
	}
	
	
	/**
	* Prüft ob eine gültige Store-ID und App-ID angebeben wurden
	*
	* @since   2.0.0
	* @change  3.2.0
	*
	* @param   array    $attr       Attribute [WordPress]
	* @return  boolean  true/false  TRUE when both
	*/
	
	function checkAttributs( $attr ) {
		if ( '' == $attr['store'] ) {
			return( 'nostore');
		} elseif ( '' == $attr['appid'] ) {
			return( 'noappid' );
		} else {
			return( true );
		}
	}
	
	
	/**
	* Baut den Funktionsnamen zusammen und ruft die Funktion auf
	*
	* @since   2.0.0
	* @change  3.2.0
	*
	* @param   string  $storeID  ID des Stores (z.B. "googleplay")
	* @param   string  $appID    ID der App
	* @return  array   $appData  Array der App-Daten
	*/
	
	function getTheAppData( $storeID, $appID ) {
		$appData = new wpAppbox_GetAppInfoAPI;
		switch ( $storeID ) {
		case 'androidpit':
			$storeID = 'googleplay';
			break;
		case 'windowsphone':
			$storeID = 'windowsstore';
			break;
		}
		$thegetfunction = "get$storeID";
		return( $appData->$thegetfunction( $appID ) );
	}
	
	
	/**
	* Erzeugt die Ausgabe für den Feed
	*
	* @since   2.0.0
	* @change  3.2.0
	*
	* @return  string  output  Feedausgabe
	*/
	
	function getTheFeedOutput() {
		$feedOutput = "<p><strong>WP-Appbox:</strong> <a href=\"{APPLINK}\" title=\"{TITLE}\">{TITLE} ({PRICE}, {STORE}) →</a></p>";
		return( $feedOutput );
	}
	
	
	/**
	* Gibt den QR-Code zurück
	*
	* @since   2.0.0
	* @change  3.2.5
	*
	* @param   string  $appLink   URL der App
	* @param   string  $appTitle  Titel der App
	* @param   string  $size      Bildgröße des QR-Codes [optional]
	* @param   string  $EC_level  Fehlerkorrektur (L, M, Q, H) [optional]
	* @param   string  $margin    Weißer Rahmen um den Code [optional]
	* @return  string             HTML-Ausgabe des QR-Codes
	*
	* @infos   https://developers.google.com/chart/infographics/docs/qr_codes
	*/
	
	function returnQRCode( $appLink, $appID, $appTitle, $size = '200', $EC_level = 'L', $margin = '0' ) {
		global $ItemInfo;
		$appLink = $this->returnAppLink( $appLink, $appID );
		$qrCode = urlencode( $appLink );
		$qrCode = "https://chart.googleapis.com/chart?cht=qr&chl=$qrCode&chs=$size"."x"."$size&chld=$EC_level|$margin";
		return( "<div class=\"qrcode\"><img src=\"$qrCode\" alt=\"$appTitle\" /></div>" );
	}
	
	
	/**
	* Gibt den Entwickler mitsamt Link zurück
	*
	* @since   2.0.0
	* @change  3.2.5
	*
	* @param   string  $appAuthor     Name des Entwicklers
	* @param   string  $appAuthorURL  URL der Autoren-Seite im Store
	* @param   string  $appLink       Manche Stores haben keine Entwicklerseite... [optional]
	* @return  string                 HTML-Ausgabe (<a></a>) des Entwicklers
	*/
	
	function returnDeveloper( $appAuthor, $appAuthorURL, $appID, $appLink = true ) {
		if ( $appAuthorURL === NULL ||$appAuthorURL == '' || !$appLink ) {
			return( $appAuthor );
		} else {
			$appAuthorURL = $this->returnAppLink( $appAuthorURL, $appID );
			return( '<a href="'.$appAuthorURL.'">'.$appAuthor.'</a>' );
		}
	}
	
	
	/**
	* Gibt das App-Icon zurück
	*
	* @since   2.0.0
	* @change  3.3.5
	*
	* @param   string  $appIcon        URL des App-Icons
	* @param   string  $appStore       ID des Stores (z.B. "windowsstore")
	* @param   string  $appBackground  Windows Store hat teilweise Hintergrundfarben [optional]
	* @return  string                  Rückgabe der Icon-URL (Windows Store mit Hintergrund)
	*/
	
	function returnAppIcon( $appIcon, $appStore, $appBackground = '' ) {
		if ( $appStore == 'windowsstore' && $appBackground != '' ) {
			return( $this->cleanURL( $appIcon, $appStore ).'" style="' . $appBackground . ';');
		} else {
			return( $this->cleanURL( $appIcon, $appStore ) );
		}
	}
	
	
	/**
	* Gibt den Link zum Store zurück (mit Affiliate)
	*
	* @since   2.0.0
	* @change  3.4.0
	*
	* @param   string  $appLink  URL der App
	* @param   string  $appID    ID der App
	* @return  string  $appLink  Rückgabe der URL mit Affiliate-ID
	*/
	
	function returnAppLink( $appLink, $appID ) {
		/**
		* Link-Umwandlung für iTunes-Affiliate
		*/
		$affiliateID = '';
		if ( strpos( $appLink, 'apple.com' ) ) {
			if ( get_option('wpAppbox_iTunesGeo') ) {
				$appLink = str_replace( '//itunes.apple.com', '//geo.itunes.apple.com', $appLink );
			}
			if ( get_option('wpAppbox_userAffiliate') ) {
				$authorID = get_the_author_meta('id');
				if ( get_option('wpAppbox_user_'.$authorID.'_ownAffiliateApple') ) {
					$affiliateID = Trim( get_option('wpAppbox_user_' . $authorID . '_affiliateApple') );
				}
			}
			if ( '' == $affiliateID ) {
				$affiliateID = get_option('wpAppbox_affiliateApple') ? get_option('wpAppbox_affiliateAppleID') : WPAPPBOX_AFFILIATE_APPLE;
			}
			if ( '' == $affiliateID ) {
				$affiliateID = WPAPPBOX_AFFILIATE_APPLE;
			}
			if ( false !== strpos( $appLink, '?' ) ) {
				$appLink = $appLink . '&amp;at=' . $affiliateID;
			} else {
				$appLink = $appLink . '?at=' . $affiliateID;
			}
		}
		/**
		* Link-Umwandlung für das Amazon PartnerNet
		*/
		if ( strpos( $appLink, 'amazon.' ) ) {
			if ( get_option('wpAppbox_userAffiliate') ) {
				$authorID = get_the_author_meta('id');
				if ( get_option('wpAppbox_user_'.$authorID.'_ownAffiliateAmazon') ) {
					$affiliateID = Trim( get_option('wpAppbox_user_' . $authorID . '_affiliateAmazon') );
				}
				if ( ( wpAppbox_checkAmazonAPI() ) && ( '' != $affiliateID ) ) {
					$appLink = str_replace( get_option( 'wpAppbox_affiliateAmazonID' ), $affiliateID, $appLink );
					return( $appLink );
				}
			}
			if ( '' == $affiliateID ) {
				$affiliateID = get_option('wpAppbox_affiliateAmazon') ? get_option('wpAppbox_affiliateAmazonID') : WPAPPBOX_AFFILIATE_AMAZON;
			}
			if ( '' == $affiliateID ) {
				$affiliateID = WPAPPBOX_AFFILIATE_AMAZON;
			}
			$appLink = $appLink .' ref=as_li_tf_tl?ie=UTF8&camp=1638&creative=6742&creativeASIN=' . $appID . '&linkCode=am2&tag=' . $affiliateID;
		}
		/**
		* Link-Umwandlung für das Microsoft Private Affiliate Program
		*/
		if ( strpos( $appLink, 'microsoft.com' ) ) {
			if ( get_option('wpAppbox_userAffiliate') ) {
				$authorID = get_the_author_meta('id');
				if ( get_option('wpAppbox_user_'.$authorID.'_ownAffiliateMicrosoft') ) {
					$affiliateID = Trim( get_option('wpAppbox_user_' . $authorID . '_affiliateMicrosoft') );
					$programID = Trim( get_option('wpAppbox_user_' . $authorID . '_affiliateMicrosoftProgram') );
				}
			}
			if ( '' == $affiliateID ) {
				$affiliateID = get_option('wpAppbox_affiliateMicrosoft') ? get_option('wpAppbox_affiliateMicrosoftID') : WPAPPBOX_AFFILIATE_MICROSOFT;
				$programID = get_option('wpAppbox_affiliateMicrosoft') ? get_option('wpAppbox_affiliateMicrosoftProgram') : WPAPPBOX_AFFILIATE_MICROSOFT_PROGRAM;
			}
			if ( ( '' == $affiliateID ) || ( '' == $programID ) ) {
				$affiliateID = WPAPPBOX_AFFILIATE_MICROSOFT;
				$programID = WPAPPBOX_AFFILIATE_MICROSOFT_PROGRAM;
			}
			if ( ( '' != $affiliateID ) && ( '' != $programID ) ) {
				$appLink = 'http://clkde.tradedoubler.com/click?p=' . $programID . '&a=' . $affiliateID . '&g=0&url=' . urlencode( $appLink );
			}
		}
		/**
		* Ausgabe des App-Links
		*/
		return( $appLink );
	}
	
	
	/**
	* Gibt die Bewertung zurück
	*
	* @since   2.1.0
	* @change  3.2.0
	*
	* @param   string  $appRating  Bewertung der App
	* @return  string              HTML-Ausgabe der Bewertungssterne
	*/
	
	function returnRating( $appRating ) {
		if ( ( '1' == get_option('wpAppbox_showRating') ) || ( '2' == get_option('wpAppbox_showRating') ) ) {
			if ( $appRating == '-1' ) return('');
			$appRating = str_replace( ',', '.', $appRating );
			$appRating = number_format( $appRating, 2 );
			$appRating = round( $appRating, 1 );
			if ( $appRating <= 0.3 ) {
				$appRatingStars = '00';
			} elseif ( $appRating >= 0.4 && $appRating <= 0.7 ) {
				$appRatingStars = '05';
			} elseif ( $appRating >= 0.8 && $appRating <= 1.3 ) {
				$appRatingStars = '10';
			} elseif ( $appRating >= 1.4 && $appRating <= 1.7 ) {
				$appRatingStars = '15';
			} elseif ( $appRating >= 1.8 && $appRating <= 2.3 ) {
				$appRatingStars = '20';
			} elseif ( $appRating >= 2.4 && $appRating <= 2.7 ) {
				$appRatingStars = '25';
			} elseif ( $appRating >= 2.8 && $appRating <= 3.3 ) {
				$appRatingStars = '30';
			} elseif ( $appRating >= 3.4 && $appRating <= 3.7 ) {
				$appRatingStars = '35';
			} elseif ( $appRating >= 3.8 && $appRating <= 4.3 ) {
				$appRatingStars = '40';
			} elseif ( $appRating >= 4.4 && $appRating <= 4.8 ) {
				$appRatingStars = '45';
			} elseif ( $appRating >= 4.9) {
				$appRatingStars = '50';
			} else {
				return( '' );
			}
			if ( '1' == get_option('wpAppbox_showRating') ) {
				$starsColor = 'stars-monochrome';
			} else {
				$starsColor = 'stars-colorful';
			}
			return( '<div title="' . $appRating . ' ' . __('of 5 stars', 'wp-appbox') . '" class="rating-stars ' . $starsColor . ' stars' . $appRatingStars . '"></div>' );
		}
	}
	
	
	/**
	* Gibt die Screenshots zurück
	*
	* @since   2.0.0
	* @change  3.2.6
	*
	* @param   array   $appScreenshots     Array der Screenshots
	* @param   string  $storeID            ID des Stores (z.B. "appstore")
	* @param   string  $appType            Typ der Screenshotausgabe (z.B "iphone") [optional]  
	* @return  string  $outputScreenshots  HTML-Ausgabe der Screenshots (Liste)
	*/
	
	function returnScreenshots( $appScreenshots, $storeID, $appType = '' ) {
		switch ( $storeID ) {
		case 'appstore':
			$appScreenshots['iphone'][] = '';
			$appScreenshots['ipad'][] = '';
			$appScreenshots['watch'][] = '';
			$appScreenshots['appletv'][] = '';
			$appScreenshots[] = '';
			switch ( $appType ) {
			case 'iphone':
				$appScreenshots = $appScreenshots['iphone'];
				break;
			case 'ipad':
				$appScreenshots = $appScreenshots['ipad'];
				break;
			case 'watch':
				$appScreenshots = $appScreenshots['watch'];
				break;
			case 'appletv':
				$appScreenshots = $appScreenshots['appletv'];
				break;
			default:
				$appScreenshots = array_merge( $appScreenshots['iphone'], $appScreenshots['ipad'], $appScreenshots['watch'], $appScreenshots['appletv'] );
				break;
			}
			break;
		case 'windowsstore':
			$appScreenshots['mobile'][] = '';
			$appScreenshots['desktop'][] = '';
			switch ( $appType ) {
			case 'mobile':
				$appScreenshots = $appScreenshots['mobile'];
				break;
			case 'desktop':
				$appScreenshots = $appScreenshots['desktop'];
				break;
			default:
				$appScreenshots = array_merge( $appScreenshots['mobile'], $appScreenshots['desktop'] );
				break;
			}
			break;
		}
		$outputScreenshots = '';
		$i = 0;
		$size = sizeof($appScreenshots);
		foreach ( $appScreenshots as $screenshotID => $screenshotURL ) {
			$screenshotURL = $this->cleanURL( $screenshotURL, $storeID );
			if ( $screenshotURL != '' ) {
				/*$outputScreenshots .= "<li><img src=\"$screenshotURL\" alt=\"" . esc_attr( '{TITLE_ATTR} ' . esc_attr__('Screenshot', 'wp-appbox') ) . "\" title=\"\" /></li>";*/
				$outputScreenshots .= $i == 0 ? '<div class="product-image-wrapper"><a target="_blank" href="'.$screenshotURL.'" class="main-image elevatezoom">
                      <img itemprop="image" class="img-zoom img-responsive image-fly" src="'.$screenshotURL.'" data-zoom-image="'.$screenshotURL.'" alt="'. esc_attr( '{TITLE_ATTR} ' . esc_attr__('Screenshot', 'wp-appbox') ) . '">
                      <span class="main-image-bg"></span>
                    </a>
                    <div id="gallery_main" class="product-image-thumb">' : ''; 	 
				$outputScreenshots .= $i >= 1 ? '<a target="_blank" class="image-thumb active" data-image="'.$screenshotURL.'"data-zoom-image="'.$screenshotURL.'" href="'.$screenshotURL.'">
                    <img src="'.$screenshotURL.'" alt="'. esc_attr( '{TITLE_ATTR} ' . esc_attr__('Screenshot', 'wp-appbox') ) . '">
                  </a>' : '';
                $outputScreenshots .= $i == $size - 1 ? '</div></div><!--end warpper-->' : '';  
			}
			$i++;
		}
		return( $outputScreenshots );
	}
	
	
	/**
	* Gibt den Preis zurück
	*
	* @since   2.0.0
	* @change  3.2.0
	*
	* @param   string   $appPrice   Aktueller Preis der App
	* @param   boolean  $appHasIAP  TRUE when in-app-purchases
	* @param   string   $oldPrice   Alter Preis der App (Shortcode "oldprice=x")
	* @return  string               (HTML-)Ausgabe des Preises
	*/
	
	function returnPrice( $appPrice, $appHasIAP, $oldPrice ) {
		if ( $appHasIAP) {
			$appIAP = "<sup>+</sup>";
		} else {
			$appIAP = '';
		}
		if ( '0' == $appPrice ) {
			$appPrice = esc_html__('Free', 'wp-appbox');
		}
		if ( $appPrice == $oldPrice || '' == $oldPrice ) {
			return( $appPrice . $appIAP );
		} else {
			return( "<span class=\"oldprice\">$oldPrice</span> " . $appPrice . $appIAP );
		}
	}
	
	
	/**
	* Gibt den Reload-Link zurück
	*
	* @since   2.0.0
	* @change  3.2.9
	*
	* @param   string  $cacheID  Cache-ID der App
	* @return  string            HTML-Ausgabe des Reload-Links (<a></a>)
	*/
	
	function returnReloadLink( $cacheID ) {
		if ( !WPAPPBOX_DISABLE_CACHE && wpAppbox_isUserAuthor() ) {
			return('<a href="'.get_permalink().(is_preview() ? '?preview=true&amp;' : '?').'wpappbox_reload_cache&amp;wpappbox_cacheid='.$cacheID.'" title="'.__('Renew cached data of this app', 'wp-appbox').'" class="reload-link">&#8635;</a> ');
		}
	}
	
	
	/**
	* Ausgabe diverser Fehler (wird überarbeitet)
	*
	* @since   2.0.0
	* @change  3.2.0
	*
	* @param   string  $error_type  Fehlertyp (nostore, noappid, notfound, fallback)
	* @param   string  $storeID     ID des Stores (z.B. "playstore) [optional]
	* @param   string  $appID       ID der App [optional]
	* @param   string  $style       Name des Banner-Styles [optional, Standard = simple]
	* @return  string               HTML-Ausgabe der Fehlermeldung
	*/
	
	function errorOutput( $error_type, $storeID = '', $appID = '', $style = 'simple' ) {
		switch ( $error_type ) {
		case 'nostore':
			$output = esc_html__('The App Store is not recognized.', 'wp-appbox');
			break;
		case 'noappid':
			$output = esc_html__('The App ID is not recognized.', 'wp-appbox');
			break;
		case 'notfound':
			$output = esc_html__('The app was not found in the store.', 'wp-appbox');
			break;
		case 'fallback':
			if ( $style != 'compact' ) {
				$output = wpAppbox_loadTemplate( 'simple' );
			} else {
				$output = wpAppbox_loadTemplate( 'compact' );
			}
			preg_match( '~(<div class="developer">.*</div>)~i', $output, $replacement );
			$output = str_replace( $replacement[1], '', $output );
			preg_match( '~(<div class="price">.*</div>)~i', $output, $replacement );
			$output = str_replace( $replacement[1], '', $output );
			switch ( $storeID ) {
			case 'googleplay':
				if ( 'compact' == $style ) {
					$fallback_descr = esc_html__('Temporary recognition as a bot', 'wp-appbox');
				} else {
					$fallback_descr = esc_html__('Due to a temporary recognition as a bot can currently unfortunately no app details are displayed.', 'wp-appbox');
				}
				break;
			}
			if ( 'compact' != $style ) {
				$fallback_descr = "<div class=\"fallback\">$fallback_descr</div>";
			}
			preg_match( '~(<a .* class="apptitle">.*</a>)~i', $output, $replacement );
			$output = str_replace( $replacement[1], $replacement[1] . $fallback_descr, $output );
			return( $output );
			break;
		default:
			$output = esc_html__('An unknown error has occurred.', 'wp-appbox');
			break;
		}
		if ( 'notfound' == $error_type ) {
			$appID = str_replace( array( '-iphone', '-ipad', '-universal', '-watch' ), '', $appID );
			if( 'id' == substr( $appID, 0, 2 ) ) {
				$appID = substr($appID, 2);
			}
			$appURL = wpAppbox_GetAppInfoAPI::getStoreURL( $storeID, $appID );
			if( strpos( $appID, "bundle" ) !== false ) {
				$pageURL = str_replace( 'app/id', '', $pageURL );
			}
			$output = '<!-- WP-Appbox (Store: ' . $storeID . ' // ID: ' . $appID . ') --><div class="wpappbox error"><span>' . $output . ' :-( #wpappbox<br /><br /><strong>' . esc_html__('Links', 'wp-appbox') . ':</strong> <a ' . ( get_option('wpAppbox_targetBlank') ? 'target="_blank"' : '' ) . ' ' . ( get_option('wpAppbox_nofollow') ? 'rel="noopener nofollow"' : 'rel="noopener"' ) . ' href="' . $appURL . '">→ ' . esc_html__('Visit Store', 'wp-appbox') . '</a> <a '.(get_option('wpAppbox_targetBlank') ? 'target="_blank"' : '') . ' ' . (get_option('wpAppbox_nofollow') ? 'rel="nofollow"' : '') . ' href="http://www.google.com/search?q=' . $appID . '+' . $storeID . '">→ ' . esc_html__('Search Google', 'wp-appbox') . '</a></span></div><!-- /WP-Appbox -->';
		} elseif ( 'fallback' != $error_type ) {
			$output = "<!-- WP-Appbox (Store: $storeID // ID: $appID) --><div class=\"wpappbox error\"><span>$output :-( #wpappbox</span></div><!-- /WP-Appbox -->";
		}
		if ( get_option('wpAppbox_eOnlyAuthors') == false || wpAppbox_isUserAuthor() || isset ( $_GET['wpappbox_show_errormessages'] ) ) {
			return( $output );
		}
	}
	
	
	/**
	* Rückgabe der eigentlich Appbox
	*
	* @since   2.0.0
	* @change  3.2.7
	*
	* @param   array   $attr      Attribute des Shortcodes [WordPress]
	* @return  string  $template  Rückgabe des fertigen Templates
	*/
	
	function theOutput( $attr ) {
		global $wpAppbox_optionsDefault;
		if ( $this->checkAttributs( $attr ) === true ) {
		
			switch ( $attr['store'] ) {
				case 'appstore':
					if ( $attr['bundle'] == true ) {
						$attr['appid'] = 'app-bundle/id' . $attr['appid'];
					}
					if ( preg_match( '/-iphone/', $attr['appid'] ) ) {
						$appType = 'iphone';
					} else if ( preg_match( '/-ipad/', $attr['appid'] ) ) {
						$appType = 'ipad';
					} else if ( preg_match( '/-watch/', $attr['appid'] ) ) {
						$appType = 'watch';
					} else {
						$appType = 'universal';
					}
					$attr['appid'] = str_replace( array( '-iphone', '-ipad', '-universal', '-watch' ), '', $attr['appid'] );
					if( 'id' == substr( $attr['appid'], 0, 2 ) ) {
						$attr['appid'] = substr( $attr['appid'], 2 );
					}
					break;
				case 'windowsstore':
					if ( preg_match( '/-mobile/', $attr['appid'] ) ) {
						$appType = 'mobile';
					}
					else if ( preg_match( '/-desktop/', $attr['appid'] ) ) {
						$appType = 'desktop';
					}
					else {
						$appType = 'all';
					}
					$attr['appid'] = str_replace( array( '-mobile', '-desktop', '-all' ), '', $attr['appid'] );
					break;
			}
		
			$appData = $this->getTheAppData( $attr['store'], $attr['appid'] );
		
			if ( !$appData ) {
				return( $this->errorOutput( 'notfound', $attr['store'], $attr['appid'] ) );
			} elseif ( '1' == $appData['fallback'] ) {
				$template = $this->errorOutput( 'fallback', $appData['storeNameCSS'], $attr['appid'], $attr['style'] );
				return( $template );
				
		} else {
		
			$template = wpAppbox_loadTemplate( $attr['style'] );
			
			if (  'screenshots' == $attr['style'] || 'screenshots-only' == $attr['style'] ) {
				$appScreenshots = $this->returnScreenshots( $appData['app_screenshots'], $appData['store_name_css'], $appType );
			
				if ( ( 'screenshots' === $attr['style'] || 'screenshots-only' === $attr['style'] ) && '' == $appScreenshots ) {
					$attr['style'] = get_option('wpAppbox_defaultStyle');
					if ( ( 'simple' != $attr['style'] ) && ( 'compact' != $attr['style'] ) ) {
						$attr['style'] = 'simple';
					}
					$template = wpAppbox_loadTemplate( $attr['style'] );
				} else {
					$template = str_replace( '{SCREENSHOTS}', $appScreenshots, $template );
				}
			}
			
			if ( is_feed() ) {
				$template = $this->getTheFeedOutput();
			}
			
			$template = str_replace( '{WPAPPBOXVERSION}', WPAPPBOX_PLUGIN_VERSION, $template );
			$template = str_replace( '{DOWNLOADCAPTION}', ( get_option('wpAppbox_downloadCaption') != '' ? get_option('wpAppbox_downloadCaption') : $wpAppbox_optionsDefault['downloadCaption'] ), $template );
			$template = str_replace( '{APPID}', $appData['app_id'], $template );
			$template = str_replace( '{APPIDHASH}', $appData['id'], $template );
			$template = str_replace( '{ICON}', $this->returnAppIcon( $appData['app_icon'], $appData['store_name_css'], ( $attr['store'] == 'windowsstore' ? $appData['app_extend'] : '' ) ), $template );
			$template = str_replace( '{TITLE}', $appData['app_title'], $template );
			$template = str_replace( '{DESCRIPTION}', $appData['app_description'], $template );
			$template = str_replace( '{STORE}', $appData['store_name'], $template );
			$template = str_replace( '{RATING}', $this->returnRating( $appData['app_rating'] ), $template );
			$template = str_replace( '{STORECSS}', ( get_option('wpAppbox_colorfulIcons') == true ? $appData['store_name_css'].' colorful' : $appData['store_name_css'] ), $template );
			$template = str_replace( '{APPLINK}', $this->returnAppLink( $appData['app_url'], $appData['app_id']), $template );
			$template = str_replace( '{DEVELOPERLINK}', $this->returnDeveloper( $appData['app_author'], $appData['app_author_url'], $appData['app_id']), $template );
			$template = str_replace( '{PRICE}', $this->returnPrice( $appData['app_price'], $appData['app_has_iap'], $attr['oldprice']), $template );
			$template = str_replace( '{QRCODE}', $this->returnQRCode( $appData['app_url'], $appData['app_id'], $appData['app_title']), $template );
			$template = str_replace( '"{TITLE}"', esc_attr( $appData['app_title'] ), $template );
			$template = str_replace( '{TITLE_ATTR}', esc_attr( $appData['app_title'] ), $template );
			if ( get_option('wpAppbox_nofollow') ) {
				$template = str_replace( '<a ', '<a rel="nofollow" ', $template );
			}
			if ( get_option('wpAppbox_targetBlank') ) {
				$template = str_replace( '<a ', '<a target="_blank" ', $template ); 
			}
			$template = str_replace( '{RELOADLINK}', $this->returnReloadLink( $appData['id'] ), $template );
			if ( !is_feed() ) {
				$template = '<!-- WP-Appbox (Store: ' . $appData['store_name_css'] . ' // ID: ' . $appData['app_id'] . ') -->' . $template . '<!-- /WP-Appbox -->';
			}
			
			return( $template );
		}
		} else return( $this->errorOutput( $this->checkAttributs( $attr ) ) );
	}
	
		
} /* Class beenden */

?>