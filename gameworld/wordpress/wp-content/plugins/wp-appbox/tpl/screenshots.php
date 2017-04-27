<?php
/*-------------------------------------------------------------*/
/* SCREENSHOTS-TEMPLATE
/*
/* SINCE 	4.0.0
/* CHANGED	n/a
/*
/* YOU COULD COPY THIS TEMPLATE IN YOUR THEME-FOLDER AND
/* EDIT THIS TEMPLATE.
/*
/* ACCEPTED CUSTOM TEMPLATE-FILES:
/* - YOUR-THEME/wpappbox-screenshots.php
/* - YOUR THEME/wpappbox/screenshots.php
/*
/* AVAILABLE VARIABLES:
/* 
/* WPAPPBOXCSSCLASSES 	=> CSS classes (must have)
/* APPID				=> The id of an app
/* APPIDHASH			=> Unique hash of the app
/* ICON					=> URL of the app icon
/* RELOADLINK 			=> Button for manual refresh (forced)
/* TITLE				=> App title
/* TITLE_ATTR			=> Escaped app title
/* APPLINK				=> URL to the store
/* DEVELOPERLINK		=> Developer and URL (<a ...>DEVELOPER</a>)
/* APPLINK				=> URL to the store
/* PRICE				=> Price of the app
/* RATING				=> Rating stars for the app (<img ... />)
/* QRCODE				=> URL of the QR-Code (<img ... />)
/* DOWNLOADCAPTION		=> Caption for the download-/store-button
/* SCREENSHOTS 			=> List of the app screenshots (<li>...</li>)
/* 
/*-------------------------------------------------------------*/
GLOBAL $is_related, $i; 
if(is_singular('product')){
	if(!$is_related == 10 ){
		?>
			<div class="{WPAPPBOXCSSCLASSES} screenshots">
				<div class="qrcode"><img src="{QRCODE}" alt="{TITLE_ATTR}" /></div>
				<div class="appicon">
					<a href="{APPLINK}"><img src="{ICON}" alt="{TITLE_ATTR}" /></a>
				</div>
				<div class="applinks">
					<div class="appbuttons">
						<a href="{APPLINK}">{DOWNLOADCAPTION}</a>
						<span onMouseOver="jQuery('.wpappbox-{APPIDHASH} .qrcode').show();" onMouseOut="jQuery('.wpappbox-{APPIDHASH} .qrcode').hide();">QR-Code</span>
					</div>
				</div>
				<div class="appdetails">
					<div class="apptitle">{RELOADLINK}<a href="{APPLINK}" class="apptitle">{TITLE}</a></div>
					<div class="developer"><?php _e('Developer', 'wp-appbox'); ?>: {DEVELOPERLINK}</div>
					<div class="price"><span><?php _e('Price', 'wp-appbox'); ?>: {PRICE}</span> {RATING}</div>
				</div>
				<div class="screenshots">
					<div class="slider">
						<ul>{SCREENSHOTS}</ul>
					</div>
				</div>
				<div class="description" itemprop="description">
			      {DESCRIPTION}
			    </div>
				<div style="clear:both;"></div>
			</div>
		<?php
	} else{
		?>
		<div class="{WPAPPBOXCSSCLASSES} element not-animated" data-animate="bounceIn" data-delay="0">
          <ul class="row-container list-unstyled clearfix">
            <li class="row-left">
            <?php $link = get_the_permalink(); ?>
              <a href="<?php echo $link; ?>" class="hoverBorder">
                <span class="hoverBorderWrapper">
                  <img src="{ICON}" class="image-fly img-responsive" alt="{TITLE_ATTR}">
                </span>
              </a>
            </li>
            <li class="row-right text-left parent-fly animMix">
              <div class="group_info">
                <a class="title-5" href="<?php echo $link; ?>">{TITLE}</a>
                <br>
                <a class="col-title" href="./collection.html">
                  XBOX 360
                </a>
                <div class="product-price">
                  <span class="price">
                    <span class="money">{PRICE}</span>
                  </span>
                </div>
              </div>
            </li>
          </ul>
      </div>
<?php }
} else {
	$cls = $i % 5 == 0 ? 'first' : '';
?>
<li class="{WPAPPBOXCSSCLASSES} compact element <?php echo $cls; ?>" data-alpha="{TITLE}" data-price="{PRICE}" >
    <ul class="row-container list-unstyled clearfix">
      <li class="row-left">
        <a href="<?php the_permalink();?>" class="hoverBorder">
          <span class="hoverBorderWrapper">
            <img src="{ICON}" class="image-fly img-responsive" alt="{TITLE_ATTR}">
          </span>
        </a>
      </li>
      <li class="row-right text-left parent-fly animMix">
        <div class="group_info">
          <a class="title-5" href="<?php the_permalink(); ?>">{TITLE}</a>
          <br>
          <a class="col-title" href="./collection.html">
            XBOX 360
          </a>
          <div class="product-price">
            <span class="price">
              <span class="money">{PRICE}</span>
            </span>
          </div>
        </div>
      </li>
    </ul>
</li>
<?php }