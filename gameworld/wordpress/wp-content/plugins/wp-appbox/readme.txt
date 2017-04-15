=== WP-Appbox ===
Contributors: Marcelismus
Donate link: https://www.paypal.me/marcelismus
Tags: google play, google, android, apps, apple, app store, ios, windows, mobile, windows store, appbox, firefox, firefox marketplace, chrome, chrome web store, amazon, amazon apps, wordpress, opera, steam, phg, gog.com, good old games, xda labs
Requires at least: 3.4
Tested up to: 4.6
Stable tag: 4.0.1
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0

Via Shortcode schnell und einfach App-Details von Apps aus einer Reihe an App Stores in Artikeln oder Seiten anzeigen.


== Description ==

"WP-Appbox" ermöglicht es, via Shortcode schnell und einfach App-Details von Apps aus einer Reihe an App Stores in Artikeln oder auf Seiten anzuzeigen. Das Plugin bietet dabei (bisher) folgende App Stores an:

* Amazon App Shop (Android)
* App Store (iPhone, iPad, Apple Watch, Apple TV und App-Bundles) und Mac App Store
* Chrome Web Store
* Firefox Erweiterungen/Add-ons
* Firefox Marketplace
* GOG.com (Good Old Games)
* Google Play Store
* Opera Add-ons
* Steam (nur einzelne Spiele)
* Windows Store (Universal und Xbox Live)
* WordPress-Plugins
* XDA Labs

= Einbindung =

Alle Stores in einem Shortcode integriert und können via Button im Editor von WordPress eingefügt werden. Der Aufbau des Shortcodes ist dabei immer der folgende:

[appbox *storename* *app-id* *format*]

Die Reihenfolge ist dabei egal - solange "appbox" vorne an steht. Die Storenamen sind dabei: amazonapps, appstore, chromewebstore, firefoxaddon, firefoxmarketplace, goodoldgames, googleplay, operaaddons, steam, windowsstore und wordpress. Wie ihr an die ID der entsprechenden Apps kommt, findet sich bebildert in den Einstellungen zu WP-Appbox. Das Format ist standardmäßig "simple", alternativ gibt es auch eine Anzeige mit "compact", "screenshots" und "screenshots-only".

Daneben gibt es noch eine Reihe an Attributen, die verwendet werden können: alterpreis=""/oldprice="".

Für den App Store gibt es eine weitere Besonderheit: Hier kann man bei Universal-Apps entscheiden, ob man Screenshots von iPhone, iPad und der Watch-App angezeigt bekommen möchte, oder zum Beispiel nur vom iPhone, nur vom iPad oder nur von der Watch-App. Dazu reicht es aus, einfach ein "-iphone", "-ipad" oder "-watch" an die ID der App zu hängen. Beispiel: 392502056-ipad.

Die Besonderheit gibt es im übrigen auch für den Windows Store: Auch hier lassen sich wahlweise nur die mobilen Screenshots oder jene der Desktop-Version anzeigen. Dazu muss lediglich ein "-mobile" oder "-desktop" an die App-ID angehangen werden. Beispiel: 392502056-mobile.

= Weitere Features =

* Anzeige des QR-Codes bei MouseOver
* Anpassung an mobile Geräte mit kleineren Displays
* Anpassung an die Feedausgabe
* Caching der Daten zu Performancezwecken
* Nutzung von PHG für den (Mac) App Store
* Nutzung der PartnerNet-ID für Amazon Apps
* Nutzung des Microsoft Private Affiliate Program
* Nutzung benutzerspezifischer Affiliate IDs
* Komplett anpassbar via HTML und CSS

= Systemanforderungen =
* PHP ab 5.3
* WordPress ab 3.4
* Server mit laufendem cURL und mb_eregi
* Ausgehende Anfragen müssen erlaubt sein

= Support =
Supportanfragen und Probleme im Idealfall bitte direkt im [Blog](https://tchgdns.de/wp-appbox-app-badge-fuer-google-play-mac-app-store-windows-store-windows-phone-store-co/ "Blog") oder noch besser via [Twitter](https://twitter.com/Marcelismus "Twitter") melden. 

= Übersetzungen =
* Englisch
* Deutsch (Ich :-P)
* French (by Laurent)

If you want to translate, contact me.

= Autor =
* [tchgdns.de](https://tchgdns.de "tchgdns.de")
* [marcelismus.de](http://marcelismus.de "marcelismus.de")
* [Twitter](https://twitter.com/Marcelismus "Twitter")

= Logo =
Das Logo der WP-Appbox stammt von [Till](https://twitter.com/craive "@craive on Twitter"), dem ich dafür zu tiefsten Dank verpflichtet bin. \o/ 

== Screenshots ==

1. Simpler App-Badge
2. App-Badge mit Screenshots
3. Compact App-Badge
4. Artikeleditor mit Buttons
5. WP-Appbox Einstellungen "Info"
6. WP-Appbox Einstellungen "Ausgabe"
7. WP-Appbox Einstellungen "Cache"
8. WP-Appbox Einstellungen "Affiliate IDs"
9. WP-Appbox Einstellungen "Editor-Buttons"
10. WP-Appbox Einstellungen "Store-URLs"
11. WP-Appbox Einstellungen "Erweitert"
12. WP-Appbox Einstellungen "Hilfe"

= Requirements =
* PHP ab 5.3
* WordPress ab 3.4
* Server mit aktiviertem allow_url_fopen, cURL (curl_init und curl_exec) und mb_eregi

= Installation =
1. Downloadpaket entpacken
2. Den Plugin-Ordner nach "/wp-content/plugins/" hochladen
3. Das Plugin in WordPress aktivieren


Einfach in den Plugin-Ordner von WordPress extrahieren und aktivieren.


== Frequently Asked Questions ==
  
= Gibt es Vorraussetzungen für den Server? =
  Ja: Der Server muss mindestens auf PHP 5.3 laufen und cURL, sowie mb_eregi unterstützen.

= Kann man die Ausgabe anpassen? =
  Ja - sämtliche Ausgabeelemente können mittels HTML-Templates und CSS nach belieben angepasst werden.

= Wieso werden die QR-Codes von 400x400 Pixel runterskaliert? =
  Der QR-Code-Generator von Google hat eine kleine Eigenheit, dass die QR-Codes nur im gesamten auf die fixe Größe erstellt werden - je kürzer die URL ist, desto kleiner wird der Code und desto höher ist der Wert "margin". Dies lässt sich derzeit auch mit einer "margin=0" Angabe nicht korrigieren. Ob es ein Feature oder ein Bug ist wird in den Google Groups diskutiert.
  
= Ich bekomme keine App-Icons aus dem (Mac) App Store angezeigt =
  Das Setzen des Häkchen "Kompabilitätsmodus für App-Icons aus dem (Mac) App Store" in den Einstellungen unter "Fehlerbehebung" sollte das Problem lösen.
  
= Der Chrome Web Store zeigt nur den ersten Screenshots =
  "Soll so sein" und lässt sich (zum derzeitigen Stand) leider auch nicht anders lösen, da Google die restlichen Screenshots dynamisch nachlädt.
  
= Wie kann ich eigene Templates nutzen? =
	Wollt ihr eigene Templates zur Ausgabe der Appbox nutzen, reicht es aus, vier Dateien im Theme-Ordner zu erstellen: "wpappbox-simple.php", "wpappbox-screenshots.php", "wpappbox-compact.php" und "wpappbox-screenshots-only.php". Wahlweise können diese auch ohne den Prefix im Ordner "wpappbox" liegen. [Mehr Infos gibt es hier](https://tchgdns.de/wp-appbox-3-2-0/ "WP-Appbox 3.2.0") oder in den Template-Dateien.


== Changelog ==

= 4.0.1 =
* Fix beim User-Agent
* [mehr Infos zu v4.0.0 im Blog](https://tchgdns.de/wp-appbox-4-0-0/ "WP-Appbox 4.0.0")

= 4.0.0 =
* [mehr Infos zu v4.0.0 im Blog](https://tchgdns.de/wp-appbox-4-0-0/ "WP-Appbox 4.0.0")
* Aktualisierung des Cache nun via Cron möglich
* App-Icons können auf dem eigenen Server gespeichert werden
* Screenshots können auf dem eigenen Server gespeichert werden (experimentell)
* Nicht mehr verfügbare Apps verbleiben nun in der Datenbank
* Neue Template-Variable {DEPRECATED} für nicht mehr verfügbare Apps (Zusatz zur Klasse .wpappbox)
* Überarbeitete Abfrage der App-Informationen
* Alexa-Skills haben nun ein eigenes Store-Symbol (CSS-Klasse .amazonalexa)
* Abfragen für nicht gefundene Apps lassen sich nun temporär deaktivieren
* Fehlerausgaben überarbeitet, eigenes Template für "Nicht gefunden"-Meldungen
* Erkennt der Play Store einen Bot, wird die Play-Store-Abfrage für 3 Stunden deaktiviert
* Android-Logo gegen Play-Store-Logo im Editor ausgetauscht
* Anonymisierung ausgehender Links via Anon.to möglich
* (Fehler-)Meldungen können in ein PHP Error Log geschrieben werden
* Fix für die Bewertungen, zeigen nun auch halbe Sterne an
* Rabattierte Apps aus dem Play Store zeigen nun den alten Preis an
* Kleinerer Fix in der URL-Erkennung

= 3.4.9 + 3.4.10 =
* Fix für den Windows Store

= 3.4.8 =
* Unterstützung für Alexa Skills
* XDA Labs hinzugefügt
* Icon für die Apple Watch entfernt
* Fix für PHP7
* Ein paar Grafiken ausgetauscht

= 3.4.7 =
* Fix für die Amazon Product Advertising API

= 3.4.6 =
* Fix für fehlende Amazon-Bilder bei Abfrage via HTTPS und Anzeige via HTTP
* "rel=noopener" zu "target=_blank" hinzufügt

= 3.4.5 =
* Bessere Kompatibilität zu PHP7
* Kleinere Optimierungen im Hintergrund

= 3.4.4 =
* Fix für Apple iMessage-Apps
* Fix für Apple SSL

= 3.4.3 =
* Fix für eigene Templates

= 3.4.2 =
* Unterstützung für Xbox Live Games
* Kleinere Fehlerkorrektur

= 3.4.1 =
* Kleinere Fehlerkorrektur

= 3.4.0 =
* [mehr Infos zu v3.4.0 im Blog](https://tchgdns.de/wp-appbox-3-4-0-integration-der-amazon-product-advertising-api/ "WP-Appbox 3.4.0")
* Es kann nun auch die offizielle Amazon-API genutzt werden
* Fix für Spiele aus dem Windows Store
* Einige Fehlerkorrekturen

= 3.3.4 =
* Fix für die Neugestaltung des Windows Stores
* Microsoft-Country-ID für Norwegen korrigiert
* Auto-Erkennung für den App Store optimiert
* Fix bezüglich der Amazon-Abfrage

= 3.3.3 =
* Readme-Fix

= 3.3.2 =
* Fix für geändertes URL-Muster für den Windows Store
* Automatische Erkennung für iTunes-URLs verbessert

= 3.3.1 =
* Fehlerkorrekturen
 
= 3.3.0 =
* [mehr Infos zu v3.3.0 im Blog](https://tchgdns.de/wp-appbox-3-3-0 "WP-Appbox 3.3.0")
* Einfache Links im Beitrag können nun zu einer Appbox umgewandelt werden (experimentelles Feature)
* Apps für das Apple TV werden nun unterstützt
* Optionen auf "autoload=no"
* Mindestestvorraussetzung auf PHP 5.3 angehoben
* Diverse Fehlerkorrekturen

= 3.2.17 =
* Aktualisierte französische Übersetzung

= 3.2.16 =
* Screenshot-Fix für den Windows Store

= 3.2.15 =
* Entwickler-Fix für den Chrome Web Store
* Preis-Fix für den Windows Store
* Farbige Bewertungssterne (optional)
* Einstellungen im Backend überarbeitet
* Ein paar kleinere Optimierungen

= 3.2.14 =
* SSL-Fix für die Apple-Watch-Icons (experimentell, siehe Version 3.2.13)

= 3.2.13 =
* Bilder aus dem App Store können nun via SSL geladen werden (optional und sehr, sehr experimentell)
* Fix bei der Bewertungsstern-Anzeige auf hochauflösenden Displays

= 3.2.12 =
* App-Store-Links nutzen nun geo.itunes.apple.com (Option deaktivierbar), um den Nutzer immer auf die App-Seite in seiner Sprache weiterzuleiten

= 3.2.11 =
* Fix für Good Old Games
* Fix für Microsoft-Affiliate
* Fix im CSS, welches auf einen falschen Pfad für "stars-sprites@2x.png" verwies

= 3.2.10 =
* [mehr Infos zu v3.2.10 im Blog](https://tchgdns.de/wp-appbox-3-2-10/ "WP-Appbox 3.2.10")
* Unterstützung für das Microsoft Private Affiliate Program bei TradeDoubler
* Amazon-Bilderausgabe nutzt nun HTTPS
* Änderungen an der Buttonimplementierung

= 3.2.9 =
* Anzeige für In-App-Käufe im Windows Store
* Fix für die IAP-Anzeige beim App Store
* Entwickler-Fix für den Windows Store

= 3.2.8 =
* phpQuery überarbeitet
* Ready für WordPress 4.4

= 3.2.7 =
* Aktivierungs-Fix für Multisite-Installationen
* Fix für App-Banner ohne Screenshots (z.B. Chrome Web Store)
* Fix für den Chrome Web Store

= 3.2.6 =
* Fix für Screenshots des (Mac) App Store
* Fix für die Template-Variable {TITLE_ATTR}

= 3.2.5 =
* Affiliate-ID für den QR-Code
* Affiliate-ID für den Entwickler-Link
* Fix für den Amazon App Shop
* Fix für einen selten Bug bezüglich des Windows Store

= 3.2.4 =
* Fix für Icons aus dem Mac App Store

= 3.2.3 =
* Mobile Screenshots aus dem Windows Store ohne Hintergrund
* Fix für den Windows Store (Hintergrundfarbe der App-Icons)
* Diverse Änderungen im Admin-Backend
* Cache-Fix für Apps mit langer Kennung (DB-Version 1.0.2)

= 3.2.2 =
* Kleinere Änderungen im Admin-Backend
* Diverse Anpassungen für Multisite-Installationen

= 3.2.1 =
* Kleiner Fehler in der Update-Abfrage behoben
* Modifizierung der Datenbank-Erstellung
* Laden von CSS in den Footer kann deaktiviert werden

= 3.2.0 =
* [mehr Infos zu v3.2.0 im Blog](https://tchgdns.de/wp-appbox-3-2/ "WP-Appbox 3.2")
* Plugin nutzt nun eine eigene Tabelle in der Datenbank
* Es lassen sich eigene Templates nutzen
* Styles und Fonts werden nur geladen, wenn eine Appbox erstellt wurde
* Icons für Watch-Apps lassen sich ausblenden
* Automatische Erneuerung des Caches lässt sich deaktivieren (nur manuell)
* Wird ein Cache-Plugin genutzt, kann der Artikel-Cache gelöscht werden (wenn verfügbar)
* Entfernung alter Codezeilen
* Backend-Optimierungen

= 3.1.8 =
* Auswahl für Buttons im Backend korrigiert

= 3.1.7 =
* URL-Fix im Backend

= 3.1.6 =
* Preis-Fix für den Amazon App Shop
* Download-Caption lässt sich nun ändern
* Änderungen im Backend

= 3.1.5 =
* Titel-Fix für den Play Store

= 3.1.4 =
* Preis-Fix Windows Store

= 3.1.3 =
* Cache-Seite in den Einstellungen gefixt
* Icon-Fix für den Windows Store
* Bewertungs-Fix für den Apple App Store
* Feed zeigt wieder den Preis an

= 3.1.2 =
* Apple App Store Fix

= 3.1.1 =
* Alte Windows-Phone-Apps besser lokalisiert
* Windows Store Apps nun mit Screenshot-Auswahl für -mobile und -desktop (an die ID hängen)
* Pebble App Store entfernt (keinen Zugriff mehr)

= 3.1.0 =
* [mehr Infos zu v3.1.0 im Blog](https://tchgdns.de/wp-appbox-3-1/ "WP-Appbox 3.1")
* Universal Windows Store implementiert
* Apple App Store auf HTML umgestellt (kontrolliert eure URLs)
* Apple Watch Apps werden nun angezeigt
* Codeoptimierungen im Admin-Panel
* Reload-Links in Vorschau korrigiert
* Kleinere Fehlerkorrekturen

= 3.0.5 =
* Fix für Preisangabe im Apple App Store

= 3.0.4 =
* App Store liefert keine Screenshots per HTTPS aus, daher auf HTTP begrenzt
* Laden von OpenSans lässt sich komplett deaktivieren

= 3.0.3 =
* Font-Optimierung in Bezug auf Probleme mit dem BUCKET-Theme, u.a.

= 3.0.2 =
* HTTPS-Fix für diverse App Stores
* HTTPS-Fix für Google Fonts

= 3.0.1 =
* Button-Fix für den WYSIWYG-Editor

= 3.0.0 =
* [mehr Infos zu v3.0.0 im Blog](https://tchgdns.de/wp-appbox-3-0-wordpress/ "WP-Appbox 3.0 ist da: Neues Design und viele Kleinigkeiten")
* Neues Design der Appboxen
* Liste der gecachten Daten im Backend lässt sich durchsuchen
* Buttons lassen sich nun auch in der Text-Ansicht des Editors einbinden
* URLs der Stores lassen sich nun im Backend ändern
* Interface nun standardmäßig auf Englisch
* Banner- und Video-Box entfernt
* Feed-Ausgabe überarbeitet, reine Textlinks
* Farbige Store-Icons nun optional möglich
* Pebble App Store hinzugefügt
* App-Bundles aus dem App Store hinzugefügt
* Samsung Apps entfernt (kein Zugriff mehr möglich)
* Steam-Spiele nun auch trotz Altersverifikation
* QR-Code verwendetet HTTPS
* Fehlerbehebungen und Optimierungen

= 2.4.12 =
* Fix der Anzeige des QR-Codes

= 2.4.11 =
* Icon-Fix für den Apple App Store

= 2.4.10 =
* AndroidPit entfernt (mehr Infos [in diesem Artikel](https://tchgdns.de/androidpit-alternativer-app-store-fuer-android-macht-dicht-update-fuer-wp-appbox-folgt/ "AndroidPit: Alternativer App-Store für Android macht dicht, Update für WP-Appbox folgt"))

= 2.4.9 =
* Fix für WordPress Plugins

= 2.4.8 =
* Fix für GOG.com
* Fix für Amazon Apps

= 2.4.7 =
* Fix für die neuen AndroidPit-Profile, leider ohne Entwickler-Angabe

= 2.4.6 =
* Fix für Promo-Aktionen im Windows Store

= 2.4.5 =
* Button-Fixes

= 2.4.4 =
* Button-Fix für WordPress 3.9
* Codeoptimierungen

= 2.4.3 =
* TradeDoubler entfernt (mehr Infos [in diesem Artikel](https://tchgdns.de/kurzinfo-in-der-sache-wp-appbox-und-dem-tradedoubler-partnerprogramm/ "Kurzinfo in der Sache WP-Appbox und dem TradeDoubler-Partnerprogramm"))

= 2.4.2 =
* Fix für bestimmte Typen von Apple-/PHG-Links

= 2.4.1 =
* Kleine optische Korrektur bezüglich des PHG-Linkes

= 2.4.0 =
* [mehr Infos zu v2.4.0 im Blog](https://tchgdns.de/wp-appbox-2-4-0-bringt-neues-apple-affiliate-programm-mit-und-entfernt-intel-appup/ "WP-Appbox 2.4.0 bringt neues Apple-Affiliate-Programm mit und entfernt Intel AppUp")
* PHG auch für europäische Nutzer implementiert (mehr Infos [in diesem Artikel](https://tchgdns.de/kurzinfo-in-der-sache-wp-appbox-und-dem-tradedoubler-partnerprogramm/ "Kurzinfo in der Sache WP-Appbox und dem TradeDoubler-Partnerprogramm"))
* Intel AppUp entfernt (schließt Mitte März)

= 2.3.5 =
* Fix für den Amazon App Shop
* Getestet unter WordPress 3.8.1

= 2.3.4 =
* Fix für den Play Store (Entwickler wurde nicht angezeigt)

= 2.3.3 =
* Getestet unter WordPress 3.8

= 2.3.2 =
* Fix für Intel AppUp
* Serbische Übersetzung

= 2.3.1 =
* Fix für AndroidPit

= 2.3.0 =
* [mehr Infos zu v2.3.0 im Blog](https://tchgdns.de/wp-appbox-2-3-0-bringt-unterstuetzung-fuer-good-old-games-gog-com-mit/ "WP-Appbox 2.3.0 bringt Unterstützung für Good Old Games (GOG.com) mit")
* Good Old Games (GOG.com) implementiert
* Codeoptimierungen

= 2.2.3 =
* Lauffähig unter WordPress 3.7
* Fix Amazon App Shop Bug (App-Daten neu laden)
* Codeoptimierungen

= 2.2.2 =
* Korrektur des Autor-Links bei Firefox Addons
* Codeoptimierungen

= 2.2.1 =
* Unterstützung für das PHG-Affiliate-Programm für den (Mac) App Store - nicht für Europa
* Codeoptimierungen

= 2.2.0 =
* [mehr Infos zu v2.2.0 im Blog](https://tchgdns.de/wp-appbox-2-2-0-benutzerspezifische-affiliate-ids-dauerhafter-cache-und-screenshot-only/ "WP-Appbox 2.2.0: Benutzerspezifische Affiliate-IDs und Screenshot-Only")
* Jeder Nutzer kann seine eigenen Affiliate-IDs nutzen
* Neuer "Screenshot Only"-Badge
* Codeoptimierungen

= 2.1.4 =
* Bugfix bezüglich Datenbanktabellen, die nicht das Standard-Prefix "wp_" besitzen

= 2.1.3 =
* Lauffähig unter WordPress 3.6.1
* Kleinere Codeoptimierungen

= 2.1.2 =
* Kleinere Anpassungen der Feed-Ausgabe

= 2.1.1 = 
* Änderung der Versionsnummer ;-)
* Kleine Codeoptimierung bezüglich des Windows Stores

= 2.1.0 = 
* [mehr Infos zu v2.1.0 im Blog](https://tchgdns.de/wp-appbox-2-1-0-bewertungen-aus-den-app-stores-und-hochaufloesendere-app-store-icons/ "WP-Appbox 2.1.0: Bewertungen aus den App Stores und hochauflösendere App-Store-Icons")
* App-Bewertungen aus den App Stores können nun eingeblendet werden
* Hochauflösende Icons eingebaut
* Italienische Übersetzung hinzugefügt
* Kleinere Fehlerbereinigungen

= 2.0.2 = 
* [mehr Infos zu v2.0.0 im Blog](https://tchgdns.de/wp-appbox-2-0-0-is-here-danke-fuer-10-000-downloads/ "WP-Appbox 2.0.0 is here! Danke für 10.000 Downloads.")
* Optimierung bezüglich des Banner-Badge für WordPress-Plugins
* Codeoptimierungen

= 2.0.1 =
* [mehr Infos zu v2.0.0 im Blog](https://tchgdns.de/wp-appbox-2-0-0-is-here-danke-fuer-10-000-downloads/ "WP-Appbox 2.0.0 is here! Danke für 10.000 Downloads.")
* Die Aneinanderreihung der Parameter [... "App-ID" "simple"] gibt keinen Fehler mehr aus

= 2.0.0 =
* [mehr Infos im Blog](https://tchgdns.de/wp-appbox-2-0-0-is-here-danke-fuer-10-000-downloads/ "WP-Appbox 2.0.0 is here! Danke für 10.000 Downloads.")
* Neues Logo - danke an @craive!
* Weite Teile des Codes neu geschrieben
* Intel AppUp hinzugefügt
* Apps im Cache können einzeln gelöscht werden
* Compact Badge eingebaut
* Video-Badge für Steam und Google Play hinzugefügt
* CSS-Sheet des Plugins kann deaktiviert werden
* Neuer Aufbau der Einstellungen
* Stand-Alone-Buttons und "Kombinierter Button" nun zusammen möglich
* Shortcode preis/price entfernt (Cache kann neu geladen werden)
* Korrekturen bezüglich der Icons aus dem Windows Store

= 1.8.15 =
* Getestet unter WordPress 3.6

= 1.8.14 =
* Fehler werden bei Aktivierung abgefangen

= 1.8.13 =
* Kleinere Fehlerkorrekturen

= 1.8.12 =
* Kleinere Korrektur bezüglich des Apple App Stores
* Kleinere Korrektur bezüglich des Windows Phone Store

= 1.8.11 =
* Kleine Anpassung an den Windows Phone Store

= 1.8.10 =
* Kleine Fehlerbehebung im App Store
* Codeanpassungen

= 1.8.9 =
* Screenshots aus dem Chrome Web Store zur Zeit nicht mehr möglich
* Bugfix, es sollten nun wieder alle App-Store-Icons angezeigt werden
* Codeoptimierungen

= 1.8.8 =
* Anpassung an den neuen Play Store und gezwungene Entfernung des Typs "Banner Badge"

= 1.8.7 =
* Codeoptimierungen

= 1.8.6 =
* Fix für App-Store-Icons
* Fix für die Kürzung des App-Titels
* Codeoptimierungen

= 1.8.5 =
* Implementierung von Steam (experimentell, nur ohne Alterscheck)
* Überarbeitung der Pluginbox
* Codeoptimierungen

= 1.8.0 =
* Einfache Anpassung der Store-URLs über Funktionen (siehe F.A.Q.)
* Timeout-Zeit kann manuell hochgesetzt werden

= 1.7.13 =
* TIFF-Icons aus dem App Store werden nun (größtenteils) angezeigt
* Fix siehe Version 1.7.12

= 1.7.12 =
* Verbesserte Update-Methode

= 1.7.11 =
* Bugfix und Codeoptimierungen

= 1.7.10 =
* Bugfix

= 1.7.9 =
* Bei Universal-Apps aus dem App Store können Screenshots nun wahlweise nur vom iPhone oder iPad angezeigt werden
* Das erneute Laden von App-Daten kann (trotz Cache) erzwungen werden (GET-Parameter: "wpappbox_reload_cache")
* Codeoptimierungen

= 1.7.8 =
* Optimierungen bezüglich des App-Icons aus dem App Store (testweise)
* Spanische Sprachdatei hinzugefügt

= 1.7.7 =
* Kleinere CSS-Optimierungen
* Kleinere Optimierung für den Play Store

= 1.7.6 =
* Tempfile Fix

= 1.7.5 =
* Opera Add-ons implementiert (Shortcode: operaaddons)
* QR-Codes können nun auch nur für die mobilen Stores angezeigt werden
* Sprachdateien korrigiert
* Codeoptimierungen

= 1.7.1 =
* Fix der Buttonleiste

= 1.7.0 =
* WordPress Plugin Verzeichnis eingebaut (Shortcode: wordpress)
* Behebung kleinerer Fehler
* Etwas aufgeräumt
* Codeoptimierungen

= 1.6.2 =
* Button für die Amazon Apps sollte nun auch angezeigt werden

= 1.6.1 =
* Beim Banner-Badge (Google Play, AndroidPit & Amazon Apps) wird nun auch der QR-Code vergrößert

= 1.6.0 =
* Implementierung des Amazon App Shop
* Kleinere Fehlerbehebungen
* Codeoptimierungen

= 1.5.3 =
* Der Firefox Marketplace ist wieder implementiert
* CSS-Anpassungen

= 1.5.2 =
* Entfernung der Firefox Marketplace, da  Mozilla [keine Möglichkeit mehr bietet](https://tchgdns.de/mozilla-ueberarbeitet-den-firefox-marketplace-und-was-das-fuer-wp-appbox-bedeutet/ "Mozilla überarbeitet den Firefox Marketplace – und was das für WP-Appbox bedeutet"), auf die Daten zugreifen zu können
* Codeoptimierungen

= 1.5.1 =
* QR-Codes können auch temporär deaktiviert werden (Attribut: noqrcode)
* Der anzuzeigende Preis kann verändert werden (Attribut: preis="" oder price="")
* Es kann ein "alter Preis" angegeben werden (Attribut: alterpreis="" oder oldprice="")
* Codeoptimierungen

= 1.5.0 =
* Samsung Apps implementiert
* Bugfix bezüglich der Kürzung des Entwickler
* Codeoptimierungen (wie immer)

= 1.4.6 =
* Codeoptimierung und Bugfix im Google Play Store
* Der Cache kann temporär deaktiviert werden
* Kürzung des Titels kann optional deaktiviert werden
* Codeoptimierungen

= 1.4.5 =
* Kleinerer Bugfix in Sachen Play Store
* Optimierungen des CSS-Codes
* Die Summe der Versionsziffern ist 10, daher könnte es WP-Appbox X heißen - käme ich aus Cupertino ;)

= 1.4.4 =
* Codeoptimierungen

= 1.4.3 =
* Fix für den Windows Store (neue URL)
* Fix für den Windows Phone Store (neue URL)
* Zu lange App-Titel werden gekürzt
* French translation (by Laurent)
* Codeoptimierungen

= 1.4.2 =
* Kleinere CSS-Optimierungen

= 1.4.1 =
* Fix QR-Code

= 1.4.0 =
* Firefox Addons hinzugefügt
* QR-Codes können deaktiviert werden
* Fix zwecks Sprachdateien

= 1.3.3 =
* Fix für den QR-Code des (Mac) App Store
* Größere App Icons aus dem (Mac) App Store
* Sprachdatei (*.mo & *.po) hinzugefügt
* Entfernung der BlackBerry World, da  BlackBerry keine Möglichkeit mehr bietet, auf die Daten zugreifen zu können

= 1.3.2 =
* Fix für den (Mac) App Store

= 1.3.1 =
* Korrektur des AndroidPit-Links

= 1.3.0 =
* Überarbeitete Optionsseite
* Abfrage des (Mac) App Store via JSON API
* BlackBerry App World in BlackBerry World umbenannt
* Nutzung des AndroidPit-Affiliate-Programmes via Affili.net möglich
* Firefox Marketplace hinzugefügt
* Chrome Web Store hinzugefügt (experimentelles Feature)

= 1.2.2 =
* Fixed AndroidPit-Screenshots
* Bugfixes

= 1.2.1 =
* Fixed "Cache leeren"-Link

= 1.2.0 =
* Nutzung der Transient API von WordPress zum Cachen der Daten
* Cache kann komplett geleert werden
* Bugfix beim Windows Phone Store und Apps mit Umlauten
* Codeoptimierungen

= 1.1.3 =
* Codeoptimierungen

= 1.1.2 =
* Behebung eines Fehlers, dass die Caching-Zeit im Firefox nicht geändert werden konnte

= 1.1.1 =
* Fehlerausgabe eingefügt
* Codeoptimierungen

= 1.0.2 =
* Fehlerkorrektur siehe Version 1.0.1
* "Blank-Page"-Fehler bei der BlackBerry AppWorld behoben

= 1.0.1 =
* Fallback im Falle das die Anfrage an den Play Store als Bot erkannt wird

= 1.0.0 =
* Code-Freeze