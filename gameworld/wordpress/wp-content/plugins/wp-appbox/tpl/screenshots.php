
<div id="product-image" class="col-md-12 product-image">
	{SCREENSHOTS}
</div>
<div id="product-information" class="col-md-12 product-information">

  <div id="product-header" class="clearfix">
  {RELOADLINK}
    <h3 id="page-product-title" itemprop="name">
      <a href="{APPLINK}" title="{TITLE}" class="apptitle">{TITLE}</a>
    </h3>	
	<div class="developer"><?php _e('Developer', 'wp-appbox'); ?>: {DEVELOPERLINK}</div>
	<div class="price"><span><?php _e('Price', 'wp-appbox'); ?>: {PRICE}</span> {RATING}</div>
    <div class="description" itemprop="description">
      {DESCRIPTION}
    </div>

    <div class="sharing">
        <div class="addthis_toolbox addthis_default_style">
            <a class="addthis_button_email"></a>
            <a class="addthis_button_print"></a>
            <a class="addthis_button_facebook"></a>
            <a class="addthis_button_twitter"></a>
            <a class="addthis_button_pinterest_share"></a>
            <a class="addthis_button_compact"></a>
            <a class="addthis_counter addthis_bubble_style"></a></div>
        </div>
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58e25a78ab099727"></script>

    <div class="relative">
      <ul class="list-unstyled">
        <li class="vendor">
          <span>category:</span>
          <?php the_ca ?>
          <a href="./collection.html" title="Vendor 2">Vendor 2</a>
        </li>
        <li class="type">
          <span>Type:</span>
          <a href="./collection.html" title="Digital Copy">Digital Copy</a>
        </li>
        <li class="tags">
          <?php the_tags('<span>Tags:</span>'); ?>
        </li>
      </ul>
    </div>
    <div itemprop="download" itemscope="" itemtype="http://schema.org/Offer">
      <div id="{STORECSS}" class="others-bottom">
            <a href="{APPLINK}" title="">
              <img src="<?php echo THEME_URI;?>/assets/images/ios_icon_135x40.svg" alt="">
            </a>
            <a href="" title="">
              <img src="<?php echo THEME_URI;?>/assets/images/android_icon_135x40.svg" alt="">
            </a>
          </div>
    </div>
  </div>
</div>