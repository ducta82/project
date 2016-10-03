<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package phonestore
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<script src="https://apis.google.com/js/platform.js" async defer></script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- Begin Header -->
<header class="container-fluid">
    <div class="row">
        <div class="container container-fixed">
            <div class="row">
                <div class="col-xs-3 col-sm-4 col-md-3 col-lg-2 bg-logo">
                    <div class="row menu-logo">
                        <div class="nav-menu" id="main_menu" onclick="puMenu();" style="display: none;">
                            <img src="<?php echo template_directory;?>/Assets/images/img-menu.png" alt="ViettelStore.vn" />
                        </div>
                        <h1 id="logo-bg">
                        <a href="/" class="icons" title="ViettelStore.vn, Công ty Thương mại và Xuất Nhập khẩu Viettel">
                            ViettelStore.vn, Công ty Thương mại và Xuất Nhập khẩu Viettel
                        </a></h1>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-5 col-md-6 col-lg-7">
                    <div class="row">
                        <div class="col-xs-11 col-sm-11 col-md-10 col-lg-10 Search">
                            <input type="text" id="txtsearch" class="txtSearch col-lg-11" placeholder="Bạn cần tìm sản phẩm nào ..." />
                            <div class="btnSearch" id="search-cate">
                                <i class="icons sc" ></i>
                            </div>
                            <div class="clsdanhmuc">
                                <span id="select-search" data-stype="1">Sản phẩm</span>
                                <i id="select-ico" class="icons tick"></i>
                                <div class="content">
                                    <p data-stype="1">Sản phẩm</p>
                                    <hr style="margin: 0;" />
                                    <p data-stype="2">Tin tức</p>
                                </div>
                            </div>

                            <ul id="result-autocomplete" class="SearchResult" style="display: none; margin-top: 35px; margin-left: 75px;">
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 menu-right">
                    <div class="row">
                        <div class="col-lg-3 hidden-md hidden-sm hidden-xs">
                        </div>
                        <div class="col-xs-6 col-md-5 col-lg-4 location">
                            <a href="/sieu-thi-gan-nhat.html">
                                <div class="row">
                                    <div class="col-xs-5 col-sm-5 col-md-6 col-lg-5">
                                        <div class="row" style="text-align: center;">
                                            <i class="icons lc"></i>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-6 hidden-sm hidden-xs">
                                        <div class="row">
                                            Siêu thị<br />
                                            gần nhất
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xs-6 col-md-7 col-lg-5">
                            <a href="/gio-hang.html" onclick="reloadGioHangPopup1(); return false;">
                                <div class="row amount">
                                    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 right">
                                        <div class="row">
                                            <i class="icons gh" title="Giỏ hàng"></i>
                                            <div style="border-left: #bebebe solid 1px; height: 19px; position: absolute; top: 10px; left: 2px;"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 hidden-sm hidden-xs">
                                        <div class="row" style="margin-left: -6px;">Giỏ hàng</div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 right">
                                        <div class="row">
                                            <i class="icons bggh" style="margin-top: 4px;"></i>
                                            <span id="cartCount11234">0</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
<div class="container-fluid new-menu">
    <div class="row">
        <div class="container container-fixed">
            <div class="row" style="position: relative;">
                <div class="new-btn-menu" onclick="puMenu();">
                    <div class="l-n-m">
                        <i class="icons mn" title="ViettelStore.vn"></i>
                    </div>
                    <div class="r-n-m">DANH MỤC</div>
                    <input type="hidden" value="0" id="status-btnmenu" />
                </div>
            </div>
        </div>
    </div>
</div>
<div id="full_overlay" onclick="hideDialog1()"></div>
<div id="GioHangPopup1_div">
<!--popup-->
<div id="popup_giohang1" class="dialog1" style="display: none;">
    <div class="signup-ct">
        <div class="signup-header">
            <h4 style="font-size: 20px;">Giỏ hàng của bạn (<span id="cartCount11235" style="color: white; font-size: 20px;">0</span> sản phẩm)</h4>
            <a class="modal_close" href="#" onclick="hideDialog1()"><i class="fa fa-close"></i></a>
        </div>
        <div class="form_payment">

            <div>
                <div>
                    <table class="table_giohang">
                        <tbody><tr class="h">
                            <th>Sản phẩm</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th class="amount">Thành tiền</th>
                            <th></th>
                        </tr>

                        
                    </tbody></table>
                </div>

                <div class="sum_promotion cart_popup">
                    
                    <div class="row last" style="padding-top: 5px;">
                        <div class="col-md-6"></div>
                        <div class="col-md-3"><strong style="color: #4f4f4f; font-size: 16px;">Giá thanh toán</strong></div>
                        <div class="col-md-3 txt_align_right"><strong class="txt_red" style="font-size: 16px; color: #F83015">Liên hệ</strong></div>
                    </div>
                </div>

                <div class="footer_btn">
                    <table style="width: 100%;">
                        <tbody><tr>
                            <td style="width: 50%; padding-right: 10px;"></td>
                            <td style="width: 50%; padding-left: 10px;">
                                <a href="/" class="btn btn-payment btn-bg-continue margin-top-15 margin-left-20">Tiếp tục mua hàng</a>
                            </td>
                        </tr>
                    </tbody></table>
                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    #popup_giohang1 {
        display: none;
        left: 50%;
        margin-left: -370px;
        width: 740px;
        background: white;
    }

        #popup_giohang1 .footer_btn {
            margin-top: 0px;
        }

    .table_giohang {
        width: 100%;
    }

        .table_giohang .h {
            border-bottom: solid 1px #dadada;
        }

            .table_giohang .h th {
                padding-bottom: 10px;
                text-transform: uppercase;
                font-size: 12px;
                color: #4f4f4f;
            }

        .table_giohang .r td {
            padding-top: 15px;
            vertical-align: top;
        }

        .table_giohang .r .product {
            padding-right: 15px;
        }

            .table_giohang .r .product .img {
                float: left;
                width: 110px;
                height: 90px;
                max-height: 90px;
                border: #d5d5d5 solid 1px;
                text-align: center;
                margin-right: 10px;
                padding-top: 10px;
                padding-bottom: 6px;
                vertical-align: middle;
            }

                .table_giohang .r .product .img img {
                    max-width: 90px;
                    max-height: 70px;
                }

            .table_giohang .r .product .n {
                font-size: 14px;
                font-weight: 600;
            }

            .table_giohang .r .product .d {
                font-size: 12px;
                color: #b5b5b5;
            }

        .table_giohang .r .p {
            font-size: 16px;
            color: #f83015;
            font-weight: 600;
        }

        .table_giohang .r .quantity {
            font-size: 14px;
        }

            .table_giohang .r .quantity input {
                width: 45px;
            }

        .table_giohang .r .remove a {
            font-size: 20px;
            color: #c7c7c7;
        }

    .footer_btn {
        margin-bottom: 25px;
    }
</style>

</div>
<script type="text/javascript">
    function showDialog1(id) {
        $('#full_overlay').fadeIn(function () {
            var dlg = $('#' + id);
            dlg.show();
        });
    }
    function hideDialog1() {
        $('.dialog1').hide();
        $('#full_overlay').fadeOut();
    }
    function hidePromotion() {
        $('.tr-km').fadeOut(500);
    }
    function reloadGioHangPopup1(showCart) {
        if (showCart == undefined)
            showCart = true;

        $('#GioHangPopup1_div').load('/Site/_Sys/GetUserControl.aspx', {
            'path': 'Cart!GioHangPopup'
        },
        function () {
            $('#cartCount11234').text($('#cartCount11235').text()).show();
            if (showCart)
                showDialog1('popup_giohang1');
        });
    }
</script>
<!-- End Header -->
<?php 
	if(!is_home()){
		?>
			<!-- Begin Content -->
			<div class="container container-fixed">
			    <div class="row" style="position: relative;">
			        <div class="col-lg-2 col-sm-2 hidden-md hidden-sm hidden-xs wapper-menu">
			            
			    <?php
			    	   /**
			    		* Displays a navigation menu
			    		* @param array $args Arguments
			    		*/
			    		$args = array(
			    			'theme_location' => 'primary',
			    			'container' => 'div',
			    			'container_class' => 'row',
			    			'menu_class' => 'block-menu',
			    			'menu_id' => 'divCatMenuHome112',
			    			'walker' => new myWalkerNav,
			    			'depth' => 0
			    		);
			    	
			    		wp_nav_menu( $args );
			    ?>
			<style type="text/css">
			    .block-menu .item .content .col-xs-3 {
			        padding-left: 20px !important;
			    }
			</style>
			        </div>
			        <div class="col-xs-12 col-lg-7 col-md-8 col-sm-12">
			        </div>
			        <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
			        </div>
			    </div>
			</div>
		<?php
	}
?>