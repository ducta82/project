<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gameworld
 */

?>
<!doctype html>
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
  <link rel="canonical" href="/" />
  
  <meta name="description" content="" />
  
  <title>GameWorld HTML Template</title>
  
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet" type="text/css">
  
  <link href="<?php echo get_template_directory_uri();?>/assets/stylesheets/cs.animate.css" rel="stylesheet" type="text/css" media="all">
  <link href="<?php echo get_template_directory_uri();?>/assets/stylesheets/application.css" rel="stylesheet" type="text/css" media="all">
  <link href="<?php echo get_template_directory_uri();?>/assets/stylesheets/bootstrap.min.3x.css" rel="stylesheet" type="text/css" media="all">
  <link href="<?php echo get_template_directory_uri();?>/assets/stylesheets/cs.bootstrap.3x.css" rel="stylesheet" type="text/css" media="all">
  <link href="<?php echo get_template_directory_uri();?>/assets/stylesheets/owl.carousel.css" rel="stylesheet" type="text/css" media="all">
  <link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
  <link href="<?php echo get_template_directory_uri();?>/assets/stylesheets/responsive-slider.css" rel="stylesheet" type="text/css" media="all">
  <link href="<?php echo get_template_directory_uri();?>/assets/stylesheets/cs.global.css" rel="stylesheet" type="text/css" media="all">
  <link href="<?php echo get_template_directory_uri();?>/assets/stylesheets/cs.style.css" rel="stylesheet" type="text/css" media="all">
  <link href="<?php echo get_template_directory_uri();?>/assets/stylesheets/cs.media.3x.css" rel="stylesheet" type="text/css" media="all">
  <!--[if IE 8 ]> 
  <link href="./assets/stylesheets/ie8.css" rel="stylesheet" type="text/css" media="all">
  <![endif]-->
  <script src="<?php echo get_template_directory_uri();?>/assets/javascripts/jquery-2.1.0.min.js" type="text/javascript"></script>
  <script src="<?php echo get_template_directory_uri();?>/assets/javascripts/modernizr.js" type="text/javascript"></script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <div class="bg-image-sidebar">
	<a id="bg-left" href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/image_left.png" alt=""></a>
	<a id="bg-right" href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/image_right.png" alt=""></a>
  </div>
  <!-- Header -->
  <header id="top" class="clearfix">
    
    <!--top-other-->
    <div id="top-other">
      <div class="container">
        <div class="row">
          <div class="welcome col-md-9 text-left">
            Welcome to game world
          </div>
          <div class="top-other col-md-15">
            <ul class="list-inline text-right">
              <li class="currencies-switcher">
                <div class="currency-plain">
                  <ul class="currencies list-inline unmargin">
                    <li class="heading">Currency </li>
                    <li class="currency-EUR active">
                      <a href="#">EUR</a>
                      <input type="hidden" value="EUR">
                    </li>
                    <li class="currency-USD">
                      <a href="#">USD</a>
                      <input type="hidden" value="USD">
                    </li>
                    <li class="currency-GBP">
                      <a href="#">GBP</a>
                      <input type="hidden" value="GBP">
                    </li>
                  </ul>
                  <select class="currencies_src hide" name="currencies">
                    <option value="EUR" selected="selected">EUR</option>
                    <option value="USD">USD</option>
                    <option value="GBP">GBP</option>
                  </select>
                </div>
              </li>
              <li class="customer-links">
                <ul id="accounts" class="list-inline">
                  <li class="login">
                    <span id="loginButton" class="dropdown-toggle" data-toggle="dropdown">
                      Login
                      <i class="sub-dropdown1"></i>
                      <i class="sub-dropdown"></i>
                    </span>
                    <div id="loginBox" class="dropdown-menu text-left" style="overflow:hidden;display:none">
                      <form method="post" action="./login.html" id="customer_login" accept-charset="UTF-8">
                        <input name="form_type" type="hidden" value="customer_login">
                        <input name="utf8" type="hidden" value="✓">
                        <div id="bodyBox">
                          <div class="sb-title">Login</div>
                          <ul class="control-container customer-accounts list-unstyled">
                            <li class="clearfix">
                              <label for="customer_email_box" class="control-label">Email Address <span class="req">*</span></label>
                              <input type="email" value="" name="customer[email]" id="customer_email_box" class="form-control">
                            </li>
                            <li class="clearfix">
                              <label for="customer_password_box" class="control-label">Password <span class="req">*</span></label>
                              <input type="password" value="" name="customer[password]" id="customer_password_box" class="form-control password">
                            </li>
                            <li class="clearfix last1">
                              <button class="btn btn-1" type="submit">Login</button>
                            </li>
                            <li>
                              <a class="register" href="./register.html">Creat New Account</a>
                            </li>
                          </ul>
                        </div>
                      </form>
                    </div>
                  </li>
                  <li>or</li>
                  <li class="register">
                    <a href="./register.html" id="customer_register_link">Register</a>
                  </li>
                </ul>
              </li>
              <li class="umbrella">
                <div id="umbrella" class="list-inline unmargin">
                  <div class="cart-link">
                    <div class="dropdown-toggle" data-toggle="dropdown">
                      <i class="sub-dropdown1"></i>
                      <i class="sub-dropdown"></i>
                      <a class="num-items-in-cart link-dropdown" href="./cart.html">
                        <span>My Cart</span>
                        <span class="icon">
                          <span class="number">2</span> items
                          <span class="total"> - <span class="money" >€118.00</span></span>
                        </span>
                      </a>
                    </div>
                    <div id="cart-info" class="dropdown-menu">
                      <div id="cart-content">
                        <div class="sb-title">
                          <a href="/cart">My cart</a>
                        </div>
                        <div class="action">
                          <span>Cart Subtotal:</span>
                          <span class="cart-total-right"><span class="money">€118.00</span></span>
                        </div>
                        <div class="action">
                          <button class="btn btn-1">CHECKOUT</button>
                        </div>
                        <div class="recently">
                          <span>Recently added items</span>
                        </div>
                        <div class="items control-container">
                          <div class="row">
                            <a class="cart-close" title="Remove" href="#">
                              <i class="fa fa-times"></i>
                            </a>
                            <div class="col-md-7 cart-left">
                              <a class="cart-image" href="./product.html">
                                <img src="<?php echo get_template_directory_uri();?>/screen/demos/demo_60x85.png" alt="" title="">
                              </a>
                            </div>
                            <div class="col-md-17 cart-right">
                              <div class="cart-title">
                                <a href="./product.html">Curabitur mattis tellus rutrum enim facilisis - Ferrari / Modern</a>
                              </div>
                              <div class="cart-price">1<span class="x"> x </span><span class="money">€59.00</span></div>
                            </div>
                          </div>
                          <div class="row">
                            <a class="cart-close" title="Remove" href="#">
                              <i class="fa fa-times"></i>
                            </a>
                            <div class="col-md-7 cart-left">
                              <a class="cart-image" href="./product.html">
                                <img src="<?php echo get_template_directory_uri();?>/screen/demos/demo_60x85.png" alt="" title=""></a>
                            </div>
                            <div class="col-md-17 cart-right">
                              <div class="cart-title">
                                <a href="./product.html">Nam at lectus eget mi vista hendrerit tincidunt - action</a>
                              </div>
                              <div class="cart-price">1<span class="x"> x </span><span class="money">€59.00</span></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!--end top-other -->
    
    <div class="container">
      <div class="row">
        <div class="col-md-12 top-logo">
          <a id="site-title" href="./index.html" title="HTML Game Store Theme">
            <img src="<?php echo get_template_directory_uri();?>/assets/images/logo.png" alt="HTML Game Store Theme">
          </a>
        </div>
        <div class="col-md-12 top-support">
          <div class="support">
            <span class="h5 txt_color">Customer Support</span><span>1800-000-GameWorld</span>
            <span class="line"></span>
            <a href="ymsgr:sendIM?quocbao0415">Chat with us</a>
          </div>
          <div class="top-search">
            <form id="header-search" class="search-form" action="./index.html" method="get">
              <input type="hidden" name="type" value="product">
              <input type="text" class="input-block-level" name="q" value="" accesskey="4" autocomplete="off" placeholder="search entire store here">
              <button type="submit" class="search-submit" title="Search">
                <i class="fa fa-search"></i>
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
    
    <div class="container">
      <div class="row top-navigation">
        <nav class="navbar" role="navigation">
          <div class="clearfix">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle main navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <div class="is-mobile visible-xs">
              <ul class="list-inline">
                <li class="is-mobile-menu">
                  <div class="btn-navbar" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar-group">
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </span>
                  </div>
                </li>
                <li class="is-mobile-login">
                  <div class="btn-group">
                    <div class="dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-user"></i>
                    </div>
                    <ul class="customer dropdown-menu">
                      <li class="logout">
                        <a href="./login.html">Log in</a>
                      </li>
                      <li class="account">
                        <a href="./register.html">Register</a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="is-mobile-currency currencies-switcher">
                  <div class="currency btn-group uppercase">
                    <a class="currency_wrapper dropdown-toggle" href="#" data-toggle="dropdown">
                      <i class="sub-dropdown1"></i>
                      <i class="sub-dropdown"></i>
                      <span class="currency_code">EUR</span>
                      &nbsp;<i class="icon-caret-down"></i>
                    </a>
                    <ul class="currencies dropdown-menu text-left">
                      <li class="currency-EUR active">
                        <a href="javascript:">EUR</a>
                        <input type="hidden" value="EUR">
                      </li>
                      <li class="currency-USD">
                        <a href="javascript:">USD</a>
                        <input type="hidden" value="USD">
                      </li>
                      <li class="currency-GBP">
                        <a href="javascript:">GBP</a>
                        <input type="hidden" value="GBP">
                      </li>
                    </ul>
                    <select class="currencies_src hide" name="currencies">
                      <option value="EUR" selected="selected">EUR</option>
                      <option value="USD">USD</option>
                      <option value="GBP">GBP</option>
                    </select>
                  </div>
                </li>
                <li class="is-mobile-cart">
                  <a href="./cart.html"><i class="fa fa-shopping-cart"></i></a>
                </li>
              </ul>
            </div>
            <div class="collapse navbar-collapse">
              <ul class="nav navbar-nav hoverMenuWrapper">
                <li class="dropdown">
                  <a href="./collection.html" class="dropdown-toggle link-dropdown" data-toggle="dropdown">
                    Xbox 360
                    <i class="fa fa-caret-down"></i>
                    <i class="sub-dropdown1 visible-md visible-lg"></i>
                    <i class="sub-dropdown visible-md visible-lg"></i>
                  </a>
                  <ul class="dropdown-menu" style="overflow:hidden;display:none">
                    <li><a tabindex="-1" href="./product.html" title="Curabitur mattis tellus rutrum enim facilisis">Curabitur mattis tellus rutrum enim facilisis</a></li>
                    <li><a tabindex="-1" href="./product.html">Curabitur sollicitudin</a></li>
                    <li><a tabindex="-1" href="./product.html" title="Pellentesque habitant morbi  tristique senectus">Pellentesque habitant morbi tristique senectus</a></li>
                    <li><a tabindex="-1" href="./product.html" title="Suspendisse sed libero consequat">Suspendisse sed libero consequat</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="./collection.html" class="dropdown-toggle link-dropdown" data-toggle="dropdown">
                    PlayStation 3
                    <i class="fa fa-caret-down"></i>
                    <i class="sub-dropdown1 visible-md visible-lg"></i>
                    <i class="sub-dropdown visible-md visible-lg"></i>
                  </a>
                  <ul class="dropdown-menu" style="overflow:hidden;display:none">
                    <li><a tabindex="-1" href="./product.html" title="Cras in nunc non ipsum duo  cursus ultrices">Cras in nunc non ipsum duo cursus ultrices</a></li>
                    <li><a tabindex="-1" href="./product.html" title="Curabitur mattis tellus rutrum enim facilisis">Curabitur mattis tellus rutrum enim facilisis</a></li>
                    <li><a tabindex="-1" href="./product.html">Curabitur sollicitudin</a></li>
                    <li><a tabindex="-1" href="./product.html" title="Nam at lectus eget mi vista  hendrerit tincidunt">Nam at lectus eget mi vista hendrerit tincidunt</a></li>
                    <li><a tabindex="-1" href="./product.html" title="Pellentesque habitant morbi  tristique senectus">Pellentesque habitant morbi tristique senectus</a></li>
                    <li><a tabindex="-1" href="./product.html" title="Suspendisse sed libero consequat">Suspendisse sed libero consequat</a></li>
                    <li><a tabindex="-1" href="./product.html" title="Suspendisse sed libero tesla  magna consequat">Suspendisse sed libero tesla magna consequat</a></li>
                    <li><a tabindex="-1" href="./product.html" title="Auctor semper">Auctor semper</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="./collection.html" class="dropdown-toggle link-dropdown" data-toggle="dropdown">
                    Wii
                    <i class="fa fa-caret-down"></i>
                    <i class="sub-dropdown1 visible-md visible-lg"></i>
                    <i class="sub-dropdown visible-md visible-lg"></i>
                  </a>
                  <ul class="dropdown-menu" style="overflow:hidden;display:none">
                    <li><a tabindex="-1" href="./product.html" title="Suspendisse sed libero tesla  magna consequat">Suspendisse sed libero tesla magna consequat</a></li>
                    <li><a tabindex="-1" href="./product.html" title="Suspendisse sed libero consequat">Suspendisse sed libero consequat</a></li>
                    <li><a tabindex="-1" href="./product.html" title="Auctor semper">Auctor semper</a></li>
                    <li><a tabindex="-1" href="./product.html" title="Nam at lectus eget mi vista  hendrerit tincidunt">Nam at lectus eget mi vista hendrerit tincidunt</a></li>
                  </ul>
                </li>
                <li class="">
                  <a href="./collection.html">
                    3DS
                    <span></span>
                  </a>
                </li>
                <li class="">
                  <a href="./collection.html">
                    PSP
                    <span></span>
                  </a>
                </li>
                <li class="">
                  <a href="./collection.html">
                    PC
                    <span></span>
                  </a>
                </li>
                <li class="">
                  <a href="./collection.html">
                    Gear and Gadgets
                    <span></span>
                  </a>
                </li>
                <li class="">
                  <a href="./product.html">
                    PlayStation 2
                    <span></span>
                  </a>
                </li>
                <li class="">
                  <a href="./product.html">
                    Nintendo GBA
                    <span></span>
                  </a>
                </li>
                <li class="">
                  <a href="./typography.html">
                    Typography
                    <span></span>
                  </a>
                </li>
                <li class="last">
                  <a href="./collection.html">
                    More +
                    <span></span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>
    
    <div class="gr-below-nav">
      <div class="container">
      <?php
        if(is_home()){
          echo '<div class="home_below_nav top-below-nav clearfix">
          <div class="sub_menu">
            <ul class="list-inline list-unstylet text-left clearfix">
              <li class="col-md-5">
                <a href="./collection.html">
                  <span>Downloads</span>
                </a>
                <span>Games &amp; Add-ons</span>
              </li>
              <li class="col-md-5">
                <a href="./collection.html">
                  <span>Pre-owned</span>
                </a>
                <span>Great Values</span>
              </li>
              <li class="col-md-5">
                <a href="./collection.html">
                  <span>Trade-Ins</span>
                </a>
                <span>Great Offers</span>
              </li>
              <li class="col-md-5">
                <a href="./collection.html">
                  <span>Monthly-Deals</span>
                </a>
                <span>Current Sales</span>
              </li>
            </ul>
            <span class="sub_nav"></span>
          </div>
        </div>';
        }else{
          echo '<div class="top-below-nav clearfix">
          <div class="sub_menu">
            <ul class="list-inline list-unstylet text-left clearfix">
              <li class="col-md-5">
                <a href="./collection.html">
                  <span>Downloads</span>
                </a>
                <span>Games &amp; Add-ons</span>
              </li>
              <li class="col-md-5">
                <a href="./collection.html">
                  <span>Pre-owned</span>
                </a>
                <span>Great Values</span>
              </li>
              <li class="col-md-5">
                <a href="./collection.html">
                  <span>Trade-Ins</span>
                </a>
                <span>Great Offers</span>
              </li>
              <li class="col-md-5">
                <a href="./collection.html">
                  <span>Monthly-Deals</span>
                </a>
                <span>Current Sales</span>
              </li>
            </ul>
            <span class="sub_nav"></span>
          </div>
          <div class="social">
            <ul class="list-inline list-unstyle text-right">
              <li class="">
                <a href="#">
                  <img src="./assets/images/bb_nav_right_img_1.png" alt="">
                </a>
              </li>
              <li class="">
                <a href="#">
                  <img src="./assets/images/bb_nav_right_img_2.png" alt="">
                </a>
              </li>
            </ul>
          </div>
        </div>';
        }
      ?>
        
      </div>
    </div>
    
  </header>