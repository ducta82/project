<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gameworld
 */
 
	if ( ! is_active_sidebar( 'sidebar-left' ) ) {
		echo '<div class="col-md-5 sidebar hidden-xs"></div>';
		return;
	}
?>
<!--sidebar-->
  <div class="col-md-5 sidebar hidden-xs">
	<?php
	dynamic_sidebar( 'sidebar-left' ); 
	?>
    <div class="sb-wrapper">
      <div class="sb-title box featured_game">Featured Games</div>
      <ul class="featured-products sb-content list-unstyled list-styled">
        <li>
          <div class="row">
            <div class="col-md-8 row-left unpadding-right">
              <a href="./product.html" class="product-link">
                <img src="<?php echo get_template_directory_uri();?>/screen/demos/demo_60x85.png" class="image-fly img-responsive" alt="Cras in nunc non ipsum duo  cursus ultrices">
              </a>
            </div>
            <div class="col-md-16 row-right parent-fly">
              <div class="product-wrapper">
                <div class="fprod-title">
                  <a href="./product.html">Cras in nunc non ipsum duo cursus ultrices</a>
                </div>
                <a class="col-title" href="./collection.html">
                  XBOX 360
                </a>
                <div class="product-price">
                  <span class="price">
                    <span class="money">€59.00</span>
                  </span>
                </div>
                <div class="clearfix">
                  <form action="/cart/add" method="post" enctype="multipart/form-data">
                    <div class="hide clearfix">
                      <select name="id">
                        <option selected="selected" value="455695565">martial - €59.00</option>
                        <option value="502624265">animation - €65.00</option>
                      </select>
                    </div>
                    <input type="hidden" name="quantity" value="1">
                    <button class="btn add-to-cart" data-parent=".parent-fly" type="submit" name="add">Add to Cart</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li>
          <div class="row">
            <div class="col-md-8 row-left unpadding-right">
              <a href="./product.html" class="product-link">
                <img src="<?php echo get_template_directory_uri();?>/screen/demos/demo_60x85.png" class="image-fly img-responsive" alt="Curabitur mattis tellus rutrum enim facilisis">
              </a>
            </div>
            <div class="col-md-16 row-right parent-fly">
              <div class="product-wrapper">
                <div class="fprod-title">
                  <a href="./product.html">Curabitur mattis tellus rutrum enim facilisis</a>
                </div>
                <a class="col-title" href="./collection.html">
                  XBOX 360
                </a>
                <div class="product-price">
                  <del class="price_compare"> <span class="money">€69.00</span></del>
                  <span class="price_sale"><span class="money">€59.00</span></span>
                </div>
                <div class="clearfix">
                  <form action="/cart/add" method="post" enctype="multipart/form-data">
                    <div class="hide clearfix">
                      <select name="id">
                        <option selected="selected" value="455695609">Ferrari / Modern - €59.00</option>
                        <option value="502625841">Lamborghini / Modern - €70.00</option>
                      </select>
                    </div>
                    <input type="hidden" name="quantity" value="1">
                    <button class="btn add-to-cart" data-parent=".parent-fly" type="submit" name="add">Add to Cart</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li>
          <div class="row">
            <div class="col-md-8 row-left unpadding-right">
              <a href="./product.html" class="product-link">
                <img src="<?php echo get_template_directory_uri();?>/screen/demos/demo_60x85.png" class="image-fly img-responsive" alt="Curabitur sollicitudin">
              </a>
            </div>
            <div class="col-md-16 row-right parent-fly">
              <div class="product-wrapper">
                <div class="fprod-title">
                  <a href="./product.html">Curabitur sollicitudin</a>
                </div>
                <a class="col-title" href="./collection.html">
                  XBOX 360
                </a>
                <div class="product-price">
                  <span class="price">
                    <span class="money">€59.00</span>
                  </span>
                </div>
                <div class="clearfix">
                  <form action="/cart/add" method="post" enctype="multipart/form-data">
                    <div class="hide clearfix">
                      <select name="id">
                        <option selected="selected" value="455695597">animation - €59.00</option>
                      </select>
                    </div>
                    <input type="hidden" name="quantity" value="1">
                    <button class="btn add-to-cart" data-parent=".parent-fly" type="submit" name="add">Add to Cart</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>
    <div class="sb-wrapper">
      <div class="sb-title box text_widget">Welcome</div>
      <ul class="list-unstyled sb-content textwidget list-styled">
        <li><p>Maecenas vitae urna in arcu pla vulputate ut eu dui. Fusce quisst neque vulputate, viverra orci vel, accumsan lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sit amet felis sed tellus</p></li>
      </ul>
    </div>
    <div class="sb-wrapper">
      <div class="sb-title box">Product Vendors</div>
      <ul class="list-unstyled sb-content list-styled">
        <li>
          <a href="./collection.html" title="Vendor 1">Vendor 1</a>
        </li>
        <li>
          <a href="./collection.html" title="Vendor 2">Vendor 2</a>
        </li>
        <li>
          <a href="./collection.html" title="Vendor 3">Vendor 3</a>
        </li>
        <li>
          <a href="./collection.html" title="Vendor 4">Vendor 4</a>
        </li>
      </ul>
    </div>
    <div class="sb-wrapper">
      <div class="sb-title box">Product Types</div>
      <ul class="list-unstyled sb-content list-styled">
        <li>
          <a href="./collection.html" title="CD Key">CD Key</a>
        </li>
        <li>
          <a href="./collection.html" title="Digital Copy">Digital Copy</a>
        </li>
        <li>
          <a href="./collection.html" title="Game Box">Game Box</a>
        </li>
        <li>
          <a href="./collection.html" title="Powerleveling Services">Powerleveling Services</a>
        </li>
      </ul>
    </div>
    <div class="sb-wrapper">
      <div class="sb-title box">Product Categories</div>
      <ul class="list-unstyled sb-content list-styled">
        <li>
          <a href="./collection.html">3DS</a>
        </li>
        <li>
          <a href="./collection.html">Gears and Gadgets</a>
        </li>
        <li>
          <a href="./collection.html">PC</a>
        </li>
        <li>
          <a href="./collection.html">PlayStation 3</a>
        </li>
        <li>
          <a href="./collection.html">PSP</a>
        </li>
        <li>
          <a href="./collection.html">Wii</a>
        </li>
        <li>
          <a href="./collection.html">XBOX 360</a>
        </li>
      </ul>
    </div>
  </div>
  <!--end sidebar-->
