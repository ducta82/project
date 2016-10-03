<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );
?>
<div class="col-lg-9 col-md-9">
<?php
if ( ! empty( $tabs ) ) : ?>
	<div class="row feature close1" id="gioithieu1" style="padding-bottom: 50px; margin-bottom: 20px;">
		<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content wc-tab" id="tab-description">
			<?php call_user_func( 'woocommerce_product_description_tab', 'description', $tab ); ?>
		</div>
	</div>
	<div class="row digital ">
		<h4>Thông số kỹ thuật</h4>
		<?php wc_get_template( 'single-product/short-description.php' );?>
	</div>
	<div class="row related-news ">
    <h4>Tin tức sản phẩm (iPhone 6s 16GB)</h4>
    <div id="owl-related-news" class="owl-carousel owl-theme" style="opacity: 1; display: block;">
        
        <div class="owl-wrapper-outer"><div class="owl-wrapper" style="width: 3344px; left: 0px; display: block;"><div class="owl-item" style="width: 836px;"><div class="item">
            <div class="col-xs-12">
                <div class="col-xs-4">                                    
                    <div class="img">
                        <a href="/tin-tuc/cuoi-nam-2015-apple-van-la-thuong-hieu-dat-gia-nhat-hanh-tinh-nid3868.html"><img src="http://cdn.viettelstore.vn/images/news//Big//thuong-hieu-apple-1)_jbRk1kT.jpg"></a>
                    </div>
                    <div class="text">
                        <a href="/tin-tuc/cuoi-nam-2015-apple-van-la-thuong-hieu-dat-gia-nhat-hanh-tinh-nid3868.html">Cuối năm 2015, Apple vẫn là thương hiệu đắt giá nhất hành tinh!</a>
                    </div>
                </div><div class="col-xs-4">                                    
                    <div class="img">
                        <a href="/tin-tuc/rat-nhieu-ung-dung-da-ho-tro-3d-touch-tren-iphone-moi-nid3838.html"><img src="http://cdn.viettelstore.vn/images/news//Big//3d-touch-tren-iphone-6s-4)_2XsPH50.jpg"></a>
                    </div>
                    <div class="text">
                        <a href="/tin-tuc/rat-nhieu-ung-dung-da-ho-tro-3d-touch-tren-iphone-moi-nid3838.html">Rất nhiều ứng dụng đã hỗ trợ 3D Touch trên iPhone mới</a>
                    </div>
                </div><div class="col-xs-4">                                    
                    <div class="img">
                        <a href="/tin-tuc/iphone-6s-su-dung-cam-ung-3d-touch-de-can-trong-luong-san-pham-nid3818.html"><img src="http://cdn.viettelstore.vn/images/news//Big//3D-Touch-tren-iPhone-6s-01_myYKkMw.jpg"></a>
                    </div>
                    <div class="text">
                        <a href="/tin-tuc/iphone-6s-su-dung-cam-ung-3d-touch-de-can-trong-luong-san-pham-nid3818.html">iPhone 6s sử dụng cảm ứng 3D Touch để cân trọng lượng sản phẩm</a>
                    </div>
                </div>
            </div>
        </div></div><div class="owl-item" style="width: 836px;"><div class="item">
            <div class="col-xs-12">
                <div class="col-xs-4">                                    
                    <div class="img">
                        <a href="/tin-tuc/iphone-6s-de-bep-galaxy-note-5-ngay-tren-san-nha-nid3761.html"><img src="http://cdn.viettelstore.vn/images/news//Big//doanh-so-iphone-6s_Ghtk1j7.jpg"></a>
                    </div>
                    <div class="text">
                        <a href="/tin-tuc/iphone-6s-de-bep-galaxy-note-5-ngay-tren-san-nha-nid3761.html">iPhone 6s “đè bẹp” Galaxy Note 5 ngay trên sân nhà</a>
                    </div>
                </div><div class="col-xs-4">                                    
                    <div class="img">
                        <a href="/tin-tuc/-y-do-cua-apple-khi-thiet-ke-iphone-6s-co-dai-nhua-phia-sau-nid3729.html"><img src="http://cdn.viettelstore.vn/images/news//Big//thiet-ke-iphone-6s_2RNjZWb.jpg"></a>
                    </div>
                    <div class="text">
                        <a href="/tin-tuc/-y-do-cua-apple-khi-thiet-ke-iphone-6s-co-dai-nhua-phia-sau-nid3729.html">"Ý đồ" của Apple khi thiết kế iPhone 6s có dải nhựa phía sau</a>
                    </div>
                </div><div class="col-xs-4">                                    
                    <div class="img">
                        <a href="/tin-tuc/chi-tiet-cau-tao-man-hinh-3d-touch-tren-iphone-6s-nid3709.html"><img src="http://cdn.viettelstore.vn/images/news//Big//cong-nghe-3D-Touch-04_dC535dB.jpg"></a>
                    </div>
                    <div class="text">
                        <a href="/tin-tuc/chi-tiet-cau-tao-man-hinh-3d-touch-tren-iphone-6s-nid3709.html">Chi tiết cấu tạo màn hình 3D Touch trên iPhone 6s</a>
                    </div>
                </div>
            </div>
        </div></div></div></div>
        
        
        
    <div class="owl-controls clickable"><div class="owl-buttons"><div class="owl-prev" style="display: none;"></div><div class="owl-next" style="display: none;"></div></div></div></div>
</div>
<?php endif; ?>
</div>
<div class="col-lg-3 col-md-3">
    <div class="wapper-pk-detail ">
        <div class="title">
            Phụ kiện tương thích
        </div>

        
        <div class="item">
            <div class="image">
                <a href="/pin-du-phong/sac-du-phong-ssk-srbc-525-6000mah-pid130.html">
                    <img src="http://cdn.viettelstore.vn/images/Product/ProductImage/small/31167081031.jpg" alt="" data-original="http://cdn.viettelstore.vn/images/Product/ProductImage/small/31167081031.jpg" style="display: inline;"></a>
            </div>
            <div class="price">300.000 ₫</div>
            <div class="name">Sạc dự phòng SSK SRBC 525 6000mAh</div>
        </div>
        
        <div class="item">
            <div class="image">
                <a href="/pin-du-phong/sac-du-phong-icore-15-000-mah-pid1257.html">
                    <img src="http://cdn.viettelstore.vn/images/Product/ProductImage/small/21259592756.jpg" alt="" data-original="http://cdn.viettelstore.vn/images/Product/ProductImage/small/21259592756.jpg" style="display: inline;"></a>
            </div>
            <div class="price">1.299.000 ₫</div>
            <div class="name">Sạc dự phòng iCore 15.000 mAh</div>
        </div>
        
        <div class="item">
            <div class="image">
                <a href="/pin-du-phong/pin-sac-du-phong-eloop-e9--10000-mah-pid38347.html">
                    <img src="http://cdn.viettelstore.vn/images/Product/ProductImage/small/11042177241.jpg" alt="" data-original="http://cdn.viettelstore.vn/images/Product/ProductImage/small/11042177241.jpg" style="display: inline;"></a>
            </div>
            <div class="price">420.000 ₫</div>
            <div class="name">Pin sạc dự phòng Eloop  E9 - 10000 mAh</div>
        </div>
        
    </div>

    <div class="wapper-pk-detail ">
        <div class="title" style="border-bottom: 0; padding-bottom: 0;">
            Tag
        </div>

        <div class="item tagSanPham">
            
            <a href="/tag-san-pham/iphone-6s.html" title="iphone 6s">
                <h3>iphone 6s</h3>
            </a>
            
            <a href="/tag-san-pham/iphone-6s-16gb.html" title="iphone 6s 16gb">
                <h3>iphone 6s 16gb</h3>
            </a>
            
            <a href="/tag-san-pham/iphone-6s-gold.html" title="iphone 6s gold">
                <h3>iphone 6s gold</h3>
            </a>
            
            <a href="/tag-san-pham/iphone-6s-rose-gold.html" title="iphone 6s rose gold">
                <h3>iphone 6s rose gold</h3>
            </a>
            
            <a href="/tag-san-pham/iphone-6s-space-grey.html" title="iphone 6s space grey">
                <h3>iphone 6s space grey</h3>
            </a>
            
            <a href="/tag-san-pham/Trả-góp-iphone.html" title="Trả góp iphone">
                <h3>Trả góp iphone</h3>
            </a>
            
            <div class="clear-both"></div>
        </div>
    </div>

</div>
