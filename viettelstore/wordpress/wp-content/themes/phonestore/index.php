<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package phonestore
 */
get_header(); ?>
<!-- Begin Content -->
<div class="container-fluid">
    <div class="row">
        <div class="container container-fixed">
            <div class="row history">
                <div class="text1" style="top: -27px; left: 202px;">
                    <div style="float: left;">
                        <i class="icons hot"></i>
                    </div>
                    <div id="slides_News" style="float: left; padding-left: 8px; padding-top: 2px; display: none;">
                        <a href="/tin-tuc/khuyen-mai-cuc-soc-mung-khai-truong-nid6400.html" class="title-news">Khuyến mãi cực sốc mừng khai trương</a>
                        <a href="/tin-tuc/mung-khai-truong--dien-thoai-gia-soc-nid6534.html" class="title-news">Mừng khai trương - điện thoại giá sốc</a>
                        <a href="/tin-tuc/rat-co-the-htc-sap-tung-ra-smartphone-la-bien-the-cua-htc-10-nid6387.html" class="title-news">Rất có thể HTC sắp tung ra smartphone là biến thể của HTC 10</a>
                        <a href="/tin-tuc/tinh-trang-chay-hang-cua-galaxy-note-7-dang-dien-ra-tren-toan-cau-nid6388.html" class="title-news">Tình trạng “cháy hàng” của Galaxy Note 7 đang diễn ra trên toàn cầu</a>
                        <a href="/tin-tuc/thuong-thuc-dem-nhac-hoanh-trang-va-nhan-qua-tang-hap-dan-tu-viettel-store-nid6545.html" class="title-news">Thưởng thức đêm nhạc hoành tráng và nhận quà tặng hấp dẫn từ Viettel Store</a>
                        <a href="/tin-tuc/xuat-hien-hinh-anh-ro-ri-iphone-7-plus-mau-space-black-nid6384.html" class="title-news">Xuất  hiện hình ảnh rò rỉ iPhone 7 Plus màu Space Black</a>
                        <a href="/tin-tuc/tung-bung-khai-truong-ngap-tran-khuyen-mai-nid6590.html" class="title-news">Tưng bừng khai trương ngập tràn khuyến mại</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--becurm or hot news slide-->
<div class="container" style="background-color: #fff;">
    <div class="row">
        <div class="container container-fixed">
            <div class="row" style="position: relative;">
                <div class="col-lg-2 col-sm-2 hidden-md hidden-sm hidden-xs wapper-menu" style="border-bottom: #dfdfdf solid 1px;">
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
                </div>
                <div class="col-xs-12 col-lg-7 col-md-8 col-sm-12" id="home-slide">
                    <div class="row block-slide">
                        <div id="owl-slide" class="owl-carousel owl-theme"><div class="item">
                                                        <a href="/km-hot/uu-dai-iphone-9">
                                                            <img data-src="<?php echo template_directory;?>/images/Advertises/iphone-giam-gia-2_41641320922092016.jpg" alt="iPhone 5S | 6S Plus ưu đãi cực Khủng" class="lazyOwl" />
                                                        </a>
                                                    </div><div class="item">
                                                        <a href="/landing/sony-xperia-xz.html">
                                                            <img data-src="<?php echo template_directory;?>/images/Advertises/sony-xz-2_59859501026092016.jpg" alt="Đặt Sony Xperia XZ \n Tặng loa 4.290.000đ" class="lazyOwl" />
                                                        </a>
                                                    </div><div class="item">
                                                        <a href="/dien-thoai/huawei-gr5-mini-pid108303.html">
                                                            <img data-src="<?php echo template_directory;?>/images/Advertises/Viettel_750x355_9425241719092016.jpg" alt="Huawei GR5 Mini \n Trả góp 0%" class="lazyOwl" />
                                                        </a>
                                                    </div><div class="item">
                                                        <a href="/landing/samsung-galaxy-j5-j7.html?setview=pc">
                                                            <img data-src="<?php echo template_directory;?>/images/Advertises/chon-samsung-ko-ton-1-xu-3_9917411711082016.jpg" alt="Tặng Sim Bigbang J \n Tài khoản có 1,1 triệu " class="lazyOwl" />
                                                        </a>
                                                    </div><div class="item">
                                                        <a href="/khuyen-mai.html?tab=laptop">
                                                            <img data-src="<?php echo template_directory;?>/images/Advertises/laptop-mung-nam-hoc-2_5214121117092016.jpg" alt="Mua Laptop trúng học bổng đến 15TR" class="lazyOwl" />
                                                        </a>
                                                    </div></div><div id="sync2" class="owl-carousel owl-theme"><div class="item">
                                                        <img src="<?php echo template_directory;?>/Assets/images/select-slide.png" alt="" class="select"/>
                                                        <h3>iPhone 5S | 6S Plus ưu đãi cực Khủng</h3>
                                                  </div><div class="item">
                                                        <img src="<?php echo template_directory;?>/Assets/images/select-slide.png" alt="" class="select"/>
                                                        <h3>Đặt Sony Xperia XZ <br/> Tặng loa 4.290.000đ</h3>
                                                  </div><div class="item">
                                                        <img src="<?php echo template_directory;?>/Assets/images/select-slide.png" alt="" class="select"/>
                                                        <h3>Huawei GR5 Mini <br/> Trả góp 0%</h3>
                                                  </div><div class="item">
                                                        <img src="<?php echo template_directory;?>/Assets/images/select-slide.png" alt="" class="select"/>
                                                        <h3>Tặng Sim Bigbang J <br/> Tài khoản có 1,1 triệu </h3>
                                                  </div><div class="item">
                                                        <img src="<?php echo template_directory;?>/Assets/images/select-slide.png" alt="" class="select"/>
                                                        <h3>Mua Laptop trúng học bổng đến 15TR</h3>
                                                  </div></div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 hidden-sm hidden-xs">
                    <div class="row" style="padding-left: 11px;">
                        <div id="owl-slide-2" class="owl-carousel owl-theme">
                            
                            <div class="item">
                                <a href="/samsung">
                                    <img data-src="<?php echo template_directory;?>/images/Advertises/chuyen-trang-ss-3_5043220904042016.png" alt="Chuyên trang Samsung" class="lazyOwl">
                                </a>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row" style="padding-left: 11px; margin-top: 11px;">
                        <div id="owl-slide-3" class="owl-carousel owl-theme">
                            
                            <div class="item">
                                <a href="/tin-tuc/goi-tha-ga--vi-vu-luot-net-nid6002.html">
                                    <img data-src="<?php echo template_directory;?>/images/Advertises/sim-bigbang-phai-2_78059421109092016.jpg" alt="simbigbang" class="lazyOwl">
                                </a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container container-fixed" style="margin-top: 20px;">
            <div class="row">
                <div class="l-block-new">
                    <a href="/tin-tuc/tin-cong-nghe-012007.html"><i class="icons tt" title="Tin tức công nghệ"></i></a>
                    <a href="/tin-tuc/tin-cong-nghe-012007.html"><h2>TIN CÔNG NGHỆ</h2></a>
                </div>
                <div class="r-block-new">
                    <div class="block-news" style="position: relative;">
                        <div id="owl-news" class="owl-carousel owl-theme ">
                            <div class="item"><div class="news-item"><div class="item-wapper"><div class="float-left img"><a href="/tin-tuc/ly-do-nao-khien-ke-huy-diet-galaxy-j7-prime-dang-de-ban-so-huu-nid6571.html"><img src="<?php echo template_directory;?>/images/news//mua-galaxy-j7-prime_K8CA97X.jpg" alt="Lý do nào khiến “kẻ hủy diệt” Galaxy J7 Prime đáng để bạn sở hữu?"/></a></div><h2 class="float-left text"><a href="/tin-tuc/ly-do-nao-khien-ke-huy-diet-galaxy-j7-prime-dang-de-ban-so-huu-nid6571.html">Lý do nào khiến “kẻ hủy diệt” Galaxy J7 Prime đáng để bạn sở hữu?</a></h2><div class="float-left text2">22/09/2016 | 04:12 PM</div></div></div></div><div class="item"><div class="news-item"><div class="item-wapper"><div class="float-left img"><a href="/tin-tuc/galaxy-j7-prime-bat-ngo-vuot-qua-man-ngam-nuoc-cuc-ky-xuat-sac-nid6604.html"><img src="<?php echo template_directory;?>/images/news//smartphone-chong-nuoc-(1)_g4PJWJG.png" alt="Galaxy J7 Prime bất ngờ vượt qua màn ngâm nước cực kỳ xuất sắc"/></a></div><h2 class="float-left text"><a href="/tin-tuc/galaxy-j7-prime-bat-ngo-vuot-qua-man-ngam-nuoc-cuc-ky-xuat-sac-nid6604.html">Galaxy J7 Prime bất ngờ vượt qua màn ngâm nước cực kỳ xuất sắc</a></h2><div class="float-left text2">26/09/2016 | 05:48 PM</div></div></div></div><div class="item"><div class="news-item"><div class="item-wapper"><div class="float-left img"><a href="/tin-tuc/trong-tam-gia-4-trieu--4-5-trieu-dong-nen-mua-smartphone-nao-tai-viettel-store-nid6605.html"><img src="<?php echo template_directory;?>/images/news//dien-thoai-4-trieu-dang-mua-5_6cDCM87.jpg" alt="Trong tầm giá 4 triệu – 4,5 triệu đồng nên mua smartphone nào tại Viettel Store?"/></a></div><h2 class="float-left text"><a href="/tin-tuc/trong-tam-gia-4-trieu--4-5-trieu-dong-nen-mua-smartphone-nao-tai-viettel-store-nid6605.html">Trong tầm giá 4 triệu – 4,5 triệu đồng nên mua smartphone nào tại Viettel Store?</a></h2><div class="float-left text2">27/09/2016 | 08:58 AM</div></div></div></div><div class="item"><div class="news-item"><div class="item-wapper"><div class="float-left img"><a href="/tin-tuc/10-tien-ich-mo-rong-chrome-ban-nen-tim-hieu-va-su-dung-nid6606.html"><img src="<?php echo template_directory;?>/images/news//tien-ich-Chrome-hay-11_aba5YXz.jpg" alt="10 tiện ích mở rộng Chrome bạn nên tìm hiểu và sử dụng"/></a></div><h2 class="float-left text"><a href="/tin-tuc/10-tien-ich-mo-rong-chrome-ban-nen-tim-hieu-va-su-dung-nid6606.html">10 tiện ích mở rộng Chrome bạn nên tìm hiểu và sử dụng</a></h2><div class="float-left text2">27/09/2016 | 01:49 PM</div></div></div></div><div class="item"><div class="news-item"><div class="item-wapper"><div class="float-left img"><a href="/tin-tuc/2017-se-la-nam-cua-mediatek-khi-hang-nay-tung-ra-chip-x35-cuc-khung-nid6602.html"><img src="<?php echo template_directory;?>/images/news//vi-xu-ly-mediatek-(2)_69nnwrG.jpg" alt="2017 sẽ là năm của MediaTek khi hãng này tung ra chip X35 cực khủng"/></a></div><h2 class="float-left text"><a href="/tin-tuc/2017-se-la-nam-cua-mediatek-khi-hang-nay-tung-ra-chip-x35-cuc-khung-nid6602.html">2017 sẽ là năm của MediaTek khi hãng này tung ra chip X35 cực khủng</a></h2><div class="float-left text2">26/09/2016 | 04:28 PM</div></div></div></div><div class="item"><div class="news-item"><div class="item-wapper"><div class="float-left img"><a href="/tin-tuc/10-ung-dung-va-game-danh-cho-ios-hien-dang-duoc-mien-phi-trong-thoi-gian-ngan-nid6601.html"><img src="<?php echo template_directory;?>/images/news//ung-dung-hay-cho-iOS-11_mZkSZSw.jpg" alt="10 ứng dụng và game dành cho iOS hiện đang được MIỄN PHÍ trong thời gian ngắn"/></a></div><h2 class="float-left text"><a href="/tin-tuc/10-ung-dung-va-game-danh-cho-ios-hien-dang-duoc-mien-phi-trong-thoi-gian-ngan-nid6601.html">10 ứng dụng và game dành cho iOS hiện đang được MIỄN PHÍ trong thời gian ngắn</a></h2><div class="float-left text2">26/09/2016 | 09:57 AM</div></div></div></div>
                        </div>
                        <!--<div style="position: absolute; bottom: 5px; right: -5px; text-align: right; padding-right: 20px;">
                            <a href="/tin-tuc/tin-cong-nghe-012007.html" style="color: #E94D38; text-decoration: underline; font-size: 11px;">Xem thêm <i class="fa fa-angle-right" style="color: #E94D38;"></i></a>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
        <div class="container container-fixed">
            <div class="row phone-wapper">
                
<style type="text/css">
    .icons.tratruoc0{background-position:-410px -640px !important;width:69px;height:24px}
    .icons.tratruoc10{background-position:-480px -640px !important;width:69px;height:24px}
</style>
<div class="h-item-active">
    <h2 class="head"><a href="/danh-muc/dien-thoai-010001.html">Điện thoại</a></h2>
    <div class="item-left">
        
        <a href='/danh-muc/dien-thoai-010001.html?manufactId=1'><h4>Apple</h4></a>
        
        <a href='/danh-muc/dien-thoai-010001.html?manufactId=3'><h4>Samsung</h4></a>
        
        <a href='/danh-muc/dien-thoai-010001.html?manufactId=5'><h4>Nokia</h4></a>
        
        <a href='/danh-muc/dien-thoai-010001.html?manufactId=2'><h4>Sony</h4></a>
        
        <a href='/danh-muc/dien-thoai-010001.html?manufactId=34'><h4>Huawei</h4></a>
        
        <a href='/danh-muc/dien-thoai-010001.html?manufactId=8'><h4>Oppo</h4></a>
        
        <a href='/danh-muc/dien-thoai-010001.html?manufactId=6'><h4>Htc</h4></a>
        
        <a href='/danh-muc/dien-thoai-010001.html?manufactId=10'><h4>Viettel</h4></a>
        
        <a href='/danh-muc/dien-thoai-010001.html?manufactId=9'><h4>Asus</h4></a>
        
        <a href='/danh-muc/dien-thoai-010001.html?manufactId=11'><h4>Masstel</h4></a>
        
        <a href='/danh-muc/dien-thoai-010001.html?manufactId=27'><h4>Lenovo</h4></a>
        
        <a href='/danh-muc/dien-thoai-010001.html?manufactId=37'><h4>MobiiStar</h4></a>
        
        <a href='/danh-muc/dien-thoai-010001.html?manufactId=13'><h4>WingCall</h4></a>
        
        <a href='/danh-muc/dien-thoai-010001.html?manufactId=98'><h4>Archos</h4></a>
        
        <a href='/danh-muc/dien-thoai-010001.html?manufactId=91'><h4>Massgo</h4></a>
        
        <a href='/danh-muc/dien-thoai-010001.html?manufactId=68'><h4>Microsoft</h4></a>
        
        <a href='/danh-muc/dien-thoai-010001.html?manufactId=39'><h4>Philips</h4></a>
        

    </div>
</div>



<!-- BEGIN Item2 -->
<div class="h-item h-item-2">
    <a href="/dien-thoai/sony-xperia-xz-pid108336.html">
        <img src="<?php echo template_directory;?>/images/Product/ProductImage//sony-xz.jpg" style="width: 100%; height: 100%" /></a>
</div>
<!-- END Item2 -->

<!-- BEGIN Item1 -->
<div class="h-item">
    <div class="content">
        <div style="height: 22px;width: 27px; position: relative;">
            <!-- BEGIN IsHoting -->
            <div class="title">
                <i class="icons bc"></i>
            </div>
            <!-- END IsHoting -->
            <!-- BEGIN Is_uu_dai_tra_gop -->
            <div class="title">
                <i class="icons tg"></i>
            </div>
            <!-- END Is_uu_dai_tra_gop -->
            
            
            
        </div>
        <div class="img">
            <img src="<?php echo template_directory;?>/images/Product/ProductImage/small/3333535190179.jpg" alt=""/>
        </div>
        <div class="sell">
            <!-- BEGIN GiaGoc -->
            18.490.000 ₫
            <!-- END GiaGoc -->
        </div>
        <div class="price">15.990.000 ₫</div>
        <h3 class="name">iPhone 6s 16GB</h3>
        <a href="/dien-thoai/iphone-6s-16gb-pid99534.html">
            <div class="h-detail">
                <h3>iPhone 6s 16GB</h3>
                <h4>15.990.000 ₫</h4>
                <div class="order" onclick="muahang(99534); return false;">đặt ngay</div>
                <div class="line-top">
                    &bull; M&agrave;n h&igrave;nh: 4.7 inch Retina HD with 3D touch<br/>&bull; CPU:&nbsp;Apple A9 64-bit, Dual-core 1.84 GHz<br/>&bull; RAM/ROM: 2 GB/16 GB<br/>&bull; Camera: 12 MP/5 MP<br/>&bull; Pin: 1715 mAh
                </div>
            </div>
        </a>
    </div>
</div>
<!-- END Item1 -->


<!-- BEGIN Item1 -->
<div class="h-item">
    <div class="content">
        <div style="height: 22px;width: 27px; position: relative;">
            
            
            <!-- BEGIN IsNew -->
            <div class="title">
                <i class="icons mv"></i>
            </div>
            <!-- END IsNew -->
            
            
        </div>
        <div class="img">
            <img src="<?php echo template_directory;?>/images/Product/ProductImage/small/Untitled-1393836663.jpg" alt=""/>
        </div>
        <div class="sell">
            <!-- BEGIN GiaGoc -->
            <!-- Template variable GiaGoc undefined -->
            <!-- END GiaGoc -->
        </div>
        <div class="price">6.290.000 ₫</div>
        <h3 class="name">Samsung Galaxy J7 Prime</h3>
        <a href="/dien-thoai/samsung-galaxy-j7-prime-pid108322.html">
            <div class="h-detail">
                <h3>Samsung Galaxy J7 Prime</h3>
                <h4>6.290.000 ₫</h4>
                <div class="order" onclick="muahang(108322); return false;">đặt ngay</div>
                <div class="line-top">
                    &bull; M&agrave;n h́&igrave;nh: 5.5",&nbsp;PLS LCD<span style="font-size: 14px; background-color: #ffffff; font-family: arial, sans-serif; color: #333333;">&nbsp;</span>, Full HD 1080 x 1920 pixels<br/>&bull; CPU: Octa-Core 1.6GHz<br/>&bull; RAM/ROM: 3 GB/32 GB<br/>&bull; Camera: 13 MP/8 MP<br/>&bull; Pin:&nbsp;Li-Ion 3300 mAh
                </div>
            </div>
        </a>
    </div>
</div>
<!-- END Item1 -->


<!-- BEGIN Item1 -->
<div class="h-item">
    <div class="content">
        <div style="height: 22px;width: 27px; position: relative;">
            <!-- BEGIN IsHoting -->
            <div class="title">
                <i class="icons bc"></i>
            </div>
            <!-- END IsHoting -->
            <!-- BEGIN Is_uu_dai_tra_gop -->
            <div class="title">
                <i class="icons tg"></i>
            </div>
            <!-- END Is_uu_dai_tra_gop -->
            
            
            
        </div>
        <div class="img">
            <img src="<?php echo template_directory;?>/images/Product/ProductImage/small/77777262493902.jpg" alt=""/>
        </div>
        <div class="sell">
            <!-- BEGIN GiaGoc -->
            21.790.000 ₫
            <!-- END GiaGoc -->
        </div>
        <div class="price">17.990.000 ₫</div>
        <h3 class="name">iPhone 6s 64Gb</h3>
        <a href="/dien-thoai/iphone-6s-64gb-pid99535.html">
            <div class="h-detail">
                <h3>iPhone 6s 64Gb</h3>
                <h4>17.990.000 ₫</h4>
                <div class="order" onclick="muahang(99535); return false;">đặt ngay</div>
                <div class="line-top">
                    &bull; M&agrave;n h&igrave;nh: 4.7 inch Retina HD with 3D touch<br/>&bull; CPU:&nbsp;Apple A9 64-bit, Dual-core 1.84 GHz<br/>&bull; RAM/ROM: 2 GB/64 GB<br/>&bull; Camera: 12 MP/5 MP<br/>&bull; Pin: 1715 mAh
                </div>
            </div>
        </a>
    </div>
</div>
<!-- END Item1 -->


<!-- BEGIN Item1 -->
<div class="h-item">
    <div class="content">
        <div style="height: 22px;width: 27px; position: relative;">
            
            
            
            
            
        </div>
        <div class="img">
            <img src="<?php echo template_directory;?>/images/Product/ProductImage/small/Untitledd-1-compressed.jpg" alt=""/>
        </div>
        <div class="sell">
            <!-- BEGIN GiaGoc -->
            <!-- Template variable GiaGoc undefined -->
            <!-- END GiaGoc -->
        </div>
        <div class="price">3.990.000 ₫</div>
        <h3 class="name">Samsung Galaxy J5</h3>
        <a href="/dien-thoai/samsung-galaxy-j5-pid40427.html">
            <div class="h-detail">
                <h3>Samsung Galaxy J5</h3>
                <h4>3.990.000 ₫</h4>
                <div class="order" onclick="muahang(40427); return false;">đặt ngay</div>
                <div class="line-top">
                    &bull; M&agrave;n h&igrave;nh: 5.0" Super AMOLED<br/>&bull; CPU: Snapdragon, Quad-core 1.2 GHz<br/>&bull; RAM/ROM: 1.5 GB/8 GB<br/>&bull; Camera: 13 MP/5 MP<br/>&bull; Pin: 2600 mAh
                </div>
            </div>
        </a>
    </div>
</div>
<!-- END Item1 -->


<!-- BEGIN Item1 -->
<div class="h-item">
    <div class="content">
        <div style="height: 22px;width: 27px; position: relative;">
            
            
            
            
            
        </div>
        <div class="img">
            <img src="<?php echo template_directory;?>/images/Product/ProductImage/small/Untitleds-1-compressed.jpg" alt=""/>
        </div>
        <div class="sell">
            <!-- BEGIN GiaGoc -->
            <!-- Template variable GiaGoc undefined -->
            <!-- END GiaGoc -->
        </div>
        <div class="price">4.520.000 ₫</div>
        <h3 class="name">Samsung Galaxy J7</h3>
        <a href="/dien-thoai/samsung-galaxy-j7-pid40428.html">
            <div class="h-detail">
                <h3>Samsung Galaxy J7</h3>
                <h4>4.520.000 ₫</h4>
                <div class="order" onclick="muahang(40428); return false;">đặt ngay</div>
                <div class="line-top">
                    &bull; M&agrave;n h&igrave;nh: 5.5 inch Super AMOLED<br/>&bull; CPU: Octa-Core 1.5GHz<br/>&bull; RAM/ROM: 1.5 GB/16 GB<br/>&bull; Camera: 13 MP/5 MP<br/>&bull; Camera trước g&oacute;c rộng, k&egrave;m flash<br />
<br />
                </div>
            </div>
        </a>
    </div>
</div>
<!-- END Item1 -->


<!-- BEGIN Item1 -->
<div class="h-item">
    <div class="content">
        <div style="height: 22px;width: 27px; position: relative;">
            
            
            
            
            
        </div>
        <div class="img">
            <img src="<?php echo template_directory;?>/images/Product/ProductImage/small/j7.jpg" alt=""/>
        </div>
        <div class="sell">
            <!-- BEGIN GiaGoc -->
            <!-- Template variable GiaGoc undefined -->
            <!-- END GiaGoc -->
        </div>
        <div class="price">5.790.000 ₫</div>
        <h3 class="name">Samsung Galaxy J7 (2016)</h3>
        <a href="/dien-thoai/samsung-galaxy-j7-2016-pid107958.html">
            <div class="h-detail">
                <h3>Samsung Galaxy J7 (2016)</h3>
                <h4>5.790.000 ₫</h4>
                <div class="order" onclick="muahang(107958); return false;">đặt ngay</div>
                <div class="line-top">
                    &bull; M&agrave;n h́&igrave;nh: 5.5'' Super AMOLED<br/>&bull; CPU: Octa-core 1.6 GHz<br/>&bull; RAM/ROM: 2 GB/16 GB<br/>&bull; Camera: 13 MP/5 MP<br/>&bull; Pin: 3300 mAh
                </div>
            </div>
        </a>
    </div>
</div>
<!-- END Item1 -->


<!-- BEGIN Item1 -->
<div class="h-item">
    <div class="content">
        <div style="height: 22px;width: 27px; position: relative;">
            
            
            <!-- BEGIN IsNew -->
            <div class="title">
                <i class="icons mv"></i>
            </div>
            <!-- END IsNew -->
            
            
        </div>
        <div class="img">
            <img src="<?php echo template_directory;?>/images/Product/ProductImage/small/dsdsds.jpg" alt=""/>
        </div>
        <div class="sell">
            <!-- BEGIN GiaGoc -->
            <!-- Template variable GiaGoc undefined -->
            <!-- END GiaGoc -->
        </div>
        <div class="price">5.990.000 ₫</div>
        <h3 class="name">Oppo F1S</h3>
        <a href="/dien-thoai/oppo-f1s-pid108305.html">
            <div class="h-detail">
                <h3>Oppo F1S</h3>
                <h4>5.990.000 ₫</h4>
                <div class="order" onclick="muahang(108305); return false;">đặt ngay</div>
                <div class="line-top">
                    &bull; M&agrave;n h&igrave;nh:&nbsp;5.5", IPS LCD, 720 x 1280 pixels<br/>&bull; CPU: Mediatek MT6750, 8 nh&acirc;n 1.5 GHz<br/>&bull; RAM/ROM: 3 GB/32GB<br/>&bull; Camera: 13 MP/16 MP<br/>&bull; Pin:&nbsp;Lithium - Ion 3075 mAh
                </div>
            </div>
        </a>
    </div>
</div>
<!-- END Item1 -->



<!-- BEGIN Item2 -->
<div class="h-item h-item-2">
    <a href="/dien-thoai/iphone-5s-16gb-pid34.html">
        <img src="<?php echo template_directory;?>/images/Product/ProductImage//5s-3869818091.jpg" style="width: 100%; height: 100%" /></a>
</div>
<!-- END Item2 -->

<!-- BEGIN Item1 -->
<div class="h-item">
    <div class="content">
        <div style="height: 22px;width: 27px; position: relative;">
            
            <!-- BEGIN Is_uu_dai_tra_gop -->
            <div class="title">
                <i class="icons tg"></i>
            </div>
            <!-- END Is_uu_dai_tra_gop -->
            <!-- BEGIN IsNew -->
            <div class="title">
                <i class="icons mv"></i>
            </div>
            <!-- END IsNew -->
            
            
        </div>
        <div class="img">
            <img src="<?php echo template_directory;?>/images/Product/ProductImage/small/xxx.jpg" alt=""/>
        </div>
        <div class="sell">
            <!-- BEGIN GiaGoc -->
            <!-- Template variable GiaGoc undefined -->
            <!-- END GiaGoc -->
        </div>
        <div class="price">3.990.000 ₫</div>
        <h3 class="name">Huawei GR5 Mini</h3>
        <a href="/dien-thoai/huawei-gr5-mini-pid108303.html">
            <div class="h-detail">
                <h3>Huawei GR5 Mini</h3>
                <h4>3.990.000 ₫</h4>
                <div class="order" onclick="muahang(108303); return false;">đặt ngay</div>
                <div class="line-top">
                    &bull; M&agrave;n h́&igrave;nh: 5.2'', IPS LCD, Full HD, 1080 x 1920 pixels<br/>&bull; CPU: Kirin 650, 8 nh&acirc;n, (4 x 1.7GHz + 4 x 2.0GHz)&nbsp;<br/>&bull; RAM/ROM: 2 GB/16 GB<br/>&bull; Camera: 13 MP/8 MP<br/>&bull; Pin:&nbsp;3000mAh
                </div>
            </div>
        </a>
    </div>
</div>
<!-- END Item1 -->




<div class="h-item-active-2">
    <a href="/danh-muc/dien-thoai-010001.html">
    <i class="icons i-phone" title="phone"></i>
    <div style="margin-top: 15px;">
        Xem tất cả<br />
        (<b>454 </b> Điện thoại)
    </div></a>
</div>

            </div>
            <div class="row laptop-wapper">
                
<style type="text/css">
    .icons.tratruoc0{background-position:-410px -640px !important;width:69px;height:24px}
    .icons.tratruoc10{background-position:-480px -640px !important;width:69px;height:24px}
</style>
<div class="h-item-active">
    <h2 class="head"><a href="/danh-muc/laptop-010002.html">Laptop</a></h2>
    <div class="item-left">
        
        <a href='/danh-muc/laptop-010002.html?manufactId=1'><h4>Apple</h4></a>
        
        <a href='/danh-muc/laptop-010002.html?manufactId=69'><h4>Dell</h4></a>
        
        <a href='/danh-muc/laptop-010002.html?manufactId=9'><h4>Asus</h4></a>
        
        <a href='/danh-muc/laptop-010002.html?manufactId=28'><h4>Acer</h4></a>
        
        <a href='/danh-muc/laptop-010002.html?manufactId=27'><h4>Lenovo</h4></a>
        
        <a href='/danh-muc/laptop-010002.html?manufactId=20'><h4>HP</h4></a>
        

    </div>
</div>



<!-- BEGIN Item2 -->
<div class="h-item h-item-2">
    <a href="/laptop/laptop-acer-z1402-nxg80sv009-pid108234.html">
        <img src="<?php echo template_directory;?>/images/Product/ProductImage//Acer-Z1402-22139208434.jpg" style="width: 100%; height: 100%" /></a>
</div>
<!-- END Item2 -->

<!-- BEGIN Item1 -->
<div class="h-item">
    <div class="content">
        <div style="height: 22px;width: 27px; position: relative;">
            
            
            
            
            
        </div>
        <div class="img">
            <img src="<?php echo template_directory;?>/images/Product/ProductImage/small/8784806691397426715.jpeg" alt=""/>
        </div>
        <div class="sell">
            <!-- BEGIN GiaGoc -->
            10.990.000 ₫
            <!-- END GiaGoc -->
        </div>
        <div class="price">10.490.000 ₫</div>
        <h3 class="name">Laptop Dell N3558 - C5I33103</h3>
        <a href="/laptop/laptop-dell-n3558--c5i33103-pid40493.html">
            <div class="h-detail">
                <h3>Laptop Dell N3558 - C5I33103</h3>
                <h4>10.490.000 ₫</h4>
                <div class="order" onclick="muahang(40493); return false;">đặt ngay</div>
                <div class="line-top">
                    &bull; Bộ vi xử l&yacute;: Intel&reg; Core&trade; i3-4005U<br/>&bull; Bộ nhớ: 4GB, DDR3L<br/>&bull; M&agrave;n h&igrave;nh: 15.6'', HD WLED<br/>&bull; Ổ cứng: 500GB, 5400rpm<br/>&bull; Card đồ họa: Nvidia GT820M, 2GB
                </div>
            </div>
        </a>
    </div>
</div>
<!-- END Item1 -->


<!-- BEGIN Item1 -->
<div class="h-item">
    <div class="content">
        <div style="height: 22px;width: 27px; position: relative;">
            
            
            
            
            
        </div>
        <div class="img">
            <img src="<?php echo template_directory;?>/images/Product/ProductImage/small/xcvxcvxcv.jpg" alt=""/>
        </div>
        <div class="sell">
            <!-- BEGIN GiaGoc -->
            8.490.000 ₫
            <!-- END GiaGoc -->
        </div>
        <div class="price">8.290.000 ₫</div>
        <h3 class="name">Laptop Asus F554LA-XX1567D</h3>
        <a href="/laptop/laptop-asus-f554la-xx1567d-pid93648.html">
            <div class="h-detail">
                <h3>Laptop Asus F554LA-XX1567D</h3>
                <h4>8.290.000 ₫</h4>
                <div class="order" onclick="muahang(93648); return false;">đặt ngay</div>
                <div class="line-top">
                    &bull; Bộ vi xử l&yacute;: Intel&reg; Core&trade; i3 4005U (1.7Ghz - 3MB Cache)<br/>&bull; Bộ nhớ: 4GB, DDR3 <br/>&bull; M&agrave;n h&igrave;nh: 15.6'', HD LED <br/>&bull; Ổ cứng: 500GB, 5400rpm <br/>&bull; Card đồ họa:&nbsp;VGA onboard, Intel HD Graphics
                </div>
            </div>
        </a>
    </div>
</div>
<!-- END Item1 -->


<!-- BEGIN Item1 -->
<div class="h-item">
    <div class="content">
        <div style="height: 22px;width: 27px; position: relative;">
            
            
            
            
            
        </div>
        <div class="img">
            <img src="<?php echo template_directory;?>/images/Product/ProductImage/small/1042334143907665991.jpeg" alt=""/>
        </div>
        <div class="sell">
            <!-- BEGIN GiaGoc -->
            <!-- Template variable GiaGoc undefined -->
            <!-- END GiaGoc -->
        </div>
        <div class="price">8.490.000 ₫</div>
        <h3 class="name">Laptop ACER E5-473-39FN (NXMXQSV007)</h3>
        <a href="/laptop/laptop-acer-e5-473-39fn-nxmxqsv007-pid102014.html">
            <div class="h-detail">
                <h3>Laptop ACER E5-473-39FN (NXMXQSV007)</h3>
                <h4>8.490.000 ₫</h4>
                <div class="order" onclick="muahang(102014); return false;">đặt ngay</div>
                <div class="line-top">
                    &bull; Bộ vi xử l&yacute;: Intel&reg; Core&trade; i3-5005U<br/>&bull; Bộ nhớ: 2GB, DDR3L, 1600MHz<br/>&bull; M&agrave;n h&igrave;nh: 14.1'', HD LED<br/>&bull; Ổ cứng: 500GB <br/>&bull; Card đồ họa:&nbsp;Intel HD Graphics 5500
                </div>
            </div>
        </a>
    </div>
</div>
<!-- END Item1 -->


<!-- BEGIN Item1 -->
<div class="h-item">
    <div class="content">
        <div style="height: 22px;width: 27px; position: relative;">
            
            
            
            
            
        </div>
        <div class="img">
            <img src="<?php echo template_directory;?>/images/Product/ProductImage/small/211782313657.jpg" alt=""/>
        </div>
        <div class="sell">
            <!-- BEGIN GiaGoc -->
            8.190.000 ₫
            <!-- END GiaGoc -->
        </div>
        <div class="price">7.490.000 ₫</div>
        <h3 class="name">Laptop Lenovo Ideapad 100 - 14IBD (80RK0018VN)</h3>
        <a href="/laptop/laptop-lenovo-ideapad-100--14ibd-80rk0018vn-pid102018.html">
            <div class="h-detail">
                <h3>Laptop Lenovo Ideapad 100 - 14IBD (80RK0018VN)</h3>
                <h4>7.490.000 ₫</h4>
                <div class="order" onclick="muahang(102018); return false;">đặt ngay</div>
                <div class="line-top">
                    &bull; Bộ vi xử l&yacute;: Intel&reg; Core&trade; i3-5005U Processor<br/>&bull; Bộ nhớ: 2 GB, DDR3L<br/>&bull; M&agrave;n h&igrave;nh: 14'', HD<br/>&bull; Ổ cứng: 500 GB, HDD<br/>&bull; Card đồ họa:&nbsp;Integrated Intel&reg; Graphics
                </div>
            </div>
        </a>
    </div>
</div>
<!-- END Item1 -->


<!-- BEGIN Item1 -->
<div class="h-item">
    <div class="content">
        <div style="height: 22px;width: 27px; position: relative;">
            
            
            
            
            
        </div>
        <div class="img">
            <img src="<?php echo template_directory;?>/images/Product/ProductImage/small/2111.jpg" alt=""/>
        </div>
        <div class="sell">
            <!-- BEGIN GiaGoc -->
            7.490.000 ₫
            <!-- END GiaGoc -->
        </div>
        <div class="price">7.290.000 ₫</div>
        <h3 class="name">Laptop Dell Inspiron 3552 - 70072013</h3>
        <a href="/laptop/laptop-dell-inspiron-3552--70072013-pid107942.html">
            <div class="h-detail">
                <h3>Laptop Dell Inspiron 3552 - 70072013</h3>
                <h4>7.290.000 ₫</h4>
                <div class="order" onclick="muahang(107942); return false;">đặt ngay</div>
                <div class="line-top">
                    &bull; Bộ vi xử l&yacute;: Intel&reg; Pentium Processor N3700 (1.6 GHz, 2MB Cache)<br/>&bull; Bộ nhớ: 4 GB, DDR3L <br/>&bull; M&agrave;n h&igrave;nh: 15.6'' Truelife LED-Backlit Display<br/>&bull; Ổ cứng: 500GB HDD<br/>&bull; Card đồ họa: Intel HD Graphics
                </div>
            </div>
        </a>
    </div>
</div>
<!-- END Item1 -->


<!-- BEGIN Item1 -->
<div class="h-item">
    <div class="content">
        <div style="height: 22px;width: 27px; position: relative;">
            
            
            
            
            
        </div>
        <div class="img">
            <img src="<?php echo template_directory;?>/images/Product/ProductImage/small/Untitled-11233473342.jpg" alt=""/>
        </div>
        <div class="sell">
            <!-- BEGIN GiaGoc -->
            10.990.000 ₫
            <!-- END GiaGoc -->
        </div>
        <div class="price">9.990.000 ₫</div>
        <h3 class="name">Laptop Dell Vostro 3558 - VTI33011</h3>
        <a href="/laptop/laptop-dell-vostro-3558--vti33011-pid40424.html">
            <div class="h-detail">
                <h3>Laptop Dell Vostro 3558 - VTI33011</h3>
                <h4>9.990.000 ₫</h4>
                <div class="order" onclick="muahang(40424); return false;">đặt ngay</div>
                <div class="line-top">
                    &bull; Bộ vi xử l&yacute;: Intel&reg; Core&trade; i3 Haswell 4005U <br/>&bull; Bộ nhớ: 4 GB, DDR3L <br/>&bull; M&agrave;n h&igrave;nh: 15.6", HD <br/>&bull; Ổ cứng: 500 GB, 5400rpm <br/>&bull; Card đồ họa: Intel&reg; HD Graphics 4400, Share
                </div>
            </div>
        </a>
    </div>
</div>
<!-- END Item1 -->


<!-- BEGIN Item1 -->
<div class="h-item">
    <div class="content">
        <div style="height: 22px;width: 27px; position: relative;">
            
            
            
            
            
        </div>
        <div class="img">
            <img src="<?php echo template_directory;?>/images/Product/ProductImage/small/15055861431003233935.jpeg" alt=""/>
        </div>
        <div class="sell">
            <!-- BEGIN GiaGoc -->
            <!-- Template variable GiaGoc undefined -->
            <!-- END GiaGoc -->
        </div>
        <div class="price">59.990.000 ₫</div>
        <h3 class="name">Macbook Pro 15.4 512GB (Retina Display)</h3>
        <a href="/laptop/macbook-pro-15-4-512gb-retina-display-pid38351.html">
            <div class="h-detail">
                <h3>Macbook Pro 15.4 512GB (Retina Display)</h3>
                <h4>59.990.000 ₫</h4>
                <div class="order" onclick="muahang(38351); return false;">đặt ngay</div>
                <div class="line-top">
                    &bull; Bộ vi xử l&yacute;: Intel&reg; Core&trade; &nbsp;i7 <br/>&bull; Bộ nhớ: 16 GB, DDR3L <br/>&bull; M&agrave;n h&igrave;nh: 15.4'', LED-backlit Retina <br/>&bull; Ổ cứng: 512 GB <br/>&bull; Card đồ họa: Intel Iris Pro Graphics
                </div>
            </div>
        </a>
    </div>
</div>
<!-- END Item1 -->



<!-- BEGIN Item2 -->
<div class="h-item h-item-2">
    <a href="/laptop/laptop-lenovo-ideapad-100--80mh0002vn-pid40602.html">
        <img src="<?php echo template_directory;?>/images/Product/ProductImage//Lenovo-Ideapad-100-5.jpg" style="width: 100%; height: 100%" /></a>
</div>
<!-- END Item2 -->

<!-- BEGIN Item1 -->
<div class="h-item">
    <div class="content">
        <div style="height: 22px;width: 27px; position: relative;">
            
            
            <!-- BEGIN IsNew -->
            <div class="title">
                <i class="icons mv"></i>
            </div>
            <!-- END IsNew -->
            
            
        </div>
        <div class="img">
            <img src="<?php echo template_directory;?>/images/Product/ProductImage/small/Untitled-1ddd.jpg" alt=""/>
        </div>
        <div class="sell">
            <!-- BEGIN GiaGoc -->
            12.990.000 ₫
            <!-- END GiaGoc -->
        </div>
        <div class="price">12.490.000 ₫</div>
        <h3 class="name">Laptop Dell N3459 - C3I51105</h3>
        <a href="/laptop/laptop-dell-n3459--c3i51105-pid102054.html">
            <div class="h-detail">
                <h3>Laptop Dell N3459 - C3I51105</h3>
                <h4>12.490.000 ₫</h4>
                <div class="order" onclick="muahang(102054); return false;">đặt ngay</div>
                <div class="line-top">
                    &bull; M&agrave;n h&igrave;nh:&nbsp;14" HD LED<br/>&bull; Bộ vi xử l&yacute;: Intel&reg; Core&trade; i5 6200U<br/>&bull; Bộ nhớ: 4 GB, DDR3L<br/>&bull; Ổ cứng: 500 GB, HDD<br/>&bull; Card đồ họa:&nbsp;Intel HD Graphics
                </div>
            </div>
        </a>
    </div>
</div>
<!-- END Item1 -->




<div class="h-item-active-2">
    <a href="/danh-muc/laptop-010002.html">
    <i class="icons i-laptop" title="laptop"></i>
    <div style="margin-top: 15px;">
        Xem tất cả<br />
        (<b>276 </b> Laptop)
    </div></a>
</div>

            </div>
            <div class="row tablet-wapper">
                
<style type="text/css">
    .icons.tratruoc0{background-position:-410px -640px !important;width:69px;height:24px}
    .icons.tratruoc10{background-position:-480px -640px !important;width:69px;height:24px}
</style>
<div class="h-item-active">
    <h2 class="head"><a href="/danh-muc/may-tinh-bang-010003.html">Máy tính bảng</a></h2>
    <div class="item-left">
        
        <a href='/danh-muc/may-tinh-bang-010003.html?manufactId=1'><h4>Apple</h4></a>
        
        <a href='/danh-muc/may-tinh-bang-010003.html?manufactId=3'><h4>Samsung</h4></a>
        
        <a href='/danh-muc/may-tinh-bang-010003.html?manufactId=69'><h4>Dell</h4></a>
        
        <a href='/danh-muc/may-tinh-bang-010003.html?manufactId=34'><h4>Huawei</h4></a>
        
        <a href='/danh-muc/may-tinh-bang-010003.html?manufactId=9'><h4>Asus</h4></a>
        
        <a href='/danh-muc/may-tinh-bang-010003.html?manufactId=28'><h4>Acer</h4></a>
        
        <a href='/danh-muc/may-tinh-bang-010003.html?manufactId=11'><h4>Masstel</h4></a>
        
        <a href='/danh-muc/may-tinh-bang-010003.html?manufactId=27'><h4>Lenovo</h4></a>
        
        <a href='/danh-muc/may-tinh-bang-010003.html?manufactId=98'><h4>Archos</h4></a>
        

    </div>
</div>



<!-- BEGIN Item2 -->
<div class="h-item h-item-2">
    <a href="/may-tinh-bang/ipad-mini-2-retina-wifi-16gb-pid997.html">
        <img src="<?php echo template_directory;?>/images/Product/ProductImage//iPad-Mini-2-Retina-Wifi-16GB-5.jpg" style="width: 100%; height: 100%" /></a>
</div>
<!-- END Item2 -->

<!-- BEGIN Item1 -->
<div class="h-item">
    <div class="content">
        <div style="height: 22px;width: 27px; position: relative;">
            
            
            
            
            
        </div>
        <div class="img">
            <img src="<?php echo template_directory;?>/images/Product/ProductImage/small/1148644879179567459.jpeg" alt=""/>
        </div>
        <div class="sell">
            <!-- BEGIN GiaGoc -->
            <!-- Template variable GiaGoc undefined -->
            <!-- END GiaGoc -->
        </div>
        <div class="price">5.490.000 ₫</div>
        <h3 class="name">Samsung Galaxy Tab E T561</h3>
        <a href="/may-tinh-bang/samsung-galaxy-tab-e-t561-pid81842.html">
            <div class="h-detail">
                <h3>Samsung Galaxy Tab E T561</h3>
                <h4>5.490.000 ₫</h4>
                <div class="order" onclick="muahang(81842); return false;">đặt ngay</div>
                <div class="line-top">
                    &bull; M&agrave;n h&igrave;nh: 9.6 inch WXGA TFT<br/>&bull; CPU: Exynos, Quad-core 1.3 GHz<br/>&bull; RAM/ROM: 1.5 GB/8 GB<br/>&bull; Camera: 5 MP/2 MP<br/>&bull; Pin: 5000 mAh
                </div>
            </div>
        </a>
    </div>
</div>
<!-- END Item1 -->


<!-- BEGIN Item1 -->
<div class="h-item">
    <div class="content">
        <div style="height: 22px;width: 27px; position: relative;">
            
            
            
            
            
        </div>
        <div class="img">
            <img src="<?php echo template_directory;?>/images/Product/ProductImage/small/Untitled-1-compressed.jpg" alt=""/>
        </div>
        <div class="sell">
            <!-- BEGIN GiaGoc -->
            <!-- Template variable GiaGoc undefined -->
            <!-- END GiaGoc -->
        </div>
        <div class="price">3.990.000 ₫</div>
        <h3 class="name">Samsung Tab A T285 </h3>
        <a href="/may-tinh-bang/samsung-tab-a-t285-pid107954.html">
            <div class="h-detail">
                <h3>Samsung Tab A T285 </h3>
                <h4>3.990.000 ₫</h4>
                <div class="order" onclick="muahang(107954); return false;">đặt ngay</div>
                <div class="line-top">
                    &bull; M&agrave;n h&igrave;nh: 7'' TFT LCD<br/>&bull; CPU: Quad-core 1.5 GHz<br/>&bull; RAM/ROM: 1.5 GB/8 GB<br/>&bull; Camera: 5 MP/2 MP<br/>&bull; Pin: 4000 mAh
                </div>
            </div>
        </a>
    </div>
</div>
<!-- END Item1 -->


<!-- BEGIN Item1 -->
<div class="h-item">
    <div class="content">
        <div style="height: 22px;width: 27px; position: relative;">
            
            
            
            
            
        </div>
        <div class="img">
            <img src="<?php echo template_directory;?>/images/Product/ProductImage/small/11893053164.jpg" alt=""/>
        </div>
        <div class="sell">
            <!-- BEGIN GiaGoc -->
            <!-- Template variable GiaGoc undefined -->
            <!-- END GiaGoc -->
        </div>
        <div class="price">9.990.000 ₫</div>
        <h3 class="name">Samsung Galaxy Tab S2 (T715)</h3>
        <a href="/may-tinh-bang/samsung-galaxy-tab-s2-t715-pid40677.html">
            <div class="h-detail">
                <h3>Samsung Galaxy Tab S2 (T715)</h3>
                <h4>9.990.000 ₫</h4>
                <div class="order" onclick="muahang(40677); return false;">đặt ngay</div>
                <div class="line-top">
                    &bull; M&agrave;n h&igrave;nh: 8.0 inch Super AMOLED<br/>&bull; CPU: Exynos 5433, Quad-core 1.9GHz + Quad-core 1.3GHz<br/>&bull; RAM/ROM: 3 GB/32 GB<br/>&bull; Camera: 8 MP/2.1MP<br/>&bull; Pin: 4000 mAh
                </div>
            </div>
        </a>
    </div>
</div>
<!-- END Item1 -->


<!-- BEGIN Item1 -->
<div class="h-item">
    <div class="content">
        <div style="height: 22px;width: 27px; position: relative;">
            
            
            
            
            
        </div>
        <div class="img">
            <img src="<?php echo template_directory;?>/images/Product/ProductImage/small/6495542881590593818.jpeg" alt=""/>
        </div>
        <div class="sell">
            <!-- BEGIN GiaGoc -->
            <!-- Template variable GiaGoc undefined -->
            <!-- END GiaGoc -->
        </div>
        <div class="price">2.990.000 ₫</div>
        <h3 class="name">Samsung Galaxy Tab 3V (T116)</h3>
        <a href="/may-tinh-bang/samsung-galaxy-tab-3v-t116-pid1047.html">
            <div class="h-detail">
                <h3>Samsung Galaxy Tab 3V (T116)</h3>
                <h4>2.990.000 ₫</h4>
                <div class="order" onclick="muahang(1047); return false;">đặt ngay</div>
                <div class="line-top">
                    &bull; M&agrave;n h&igrave;nh: 7 inch TFT<br/>&bull; CPU: Spreadtrum SC8830 , Quad-core 1.3 GHz<br/>&bull; RAM/ROM: 1 GB/8 GB<br/>&bull; Camera: 2 MP/2 MP<br/>&bull; Pin: 3600 mAh
                </div>
            </div>
        </a>
    </div>
</div>
<!-- END Item1 -->


<!-- BEGIN Item1 -->
<div class="h-item">
    <div class="content">
        <div style="height: 22px;width: 27px; position: relative;">
            
            
            
            
            
        </div>
        <div class="img">
            <img src="<?php echo template_directory;?>/images/Product/ProductImage/small/Untitled-1835541654.jpg" alt=""/>
        </div>
        <div class="sell">
            <!-- BEGIN GiaGoc -->
            1.890.000 ₫
            <!-- END GiaGoc -->
        </div>
        <div class="price">1.690.000 ₫</div>
        <h3 class="name">Masstel Tab 705</h3>
        <a href="/may-tinh-bang/masstel-tab-705-pid40692.html">
            <div class="h-detail">
                <h3>Masstel Tab 705</h3>
                <h4>1.690.000 ₫</h4>
                <div class="order" onclick="muahang(40692); return false;">đặt ngay</div>
                <div class="line-top">
                    &bull; M&agrave;n h&igrave;nh: 7.0 inch LCD<br/>&bull; CPU: Intel SoFIA 3GR(Z5210RK), Quad-core 1GHz<br/>&bull; RAM/ROM: 1 GB/8 GB<br/>&bull; Camera: 3.2 MP/0.3 MP<br/>&bull; Pin: 2800 mAh
                </div>
            </div>
        </a>
    </div>
</div>
<!-- END Item1 -->


<!-- BEGIN Item1 -->
<div class="h-item">
    <div class="content">
        <div style="height: 22px;width: 27px; position: relative;">
            
            
            
            
            
        </div>
        <div class="img">
            <img src="<?php echo template_directory;?>/images/Product/ProductImage/small/18803639912013327068.jpeg" alt=""/>
        </div>
        <div class="sell">
            <!-- BEGIN GiaGoc -->
            <!-- Template variable GiaGoc undefined -->
            <!-- END GiaGoc -->
        </div>
        <div class="price">2.990.000 ₫</div>
        <h3 class="name">Huawei MediaPad T1 8.0</h3>
        <a href="/may-tinh-bang/huawei-mediapad-t1-8-0-pid38099.html">
            <div class="h-detail">
                <h3>Huawei MediaPad T1 8.0</h3>
                <h4>2.990.000 ₫</h4>
                <div class="order" onclick="muahang(38099); return false;">đặt ngay</div>
                <div class="line-top">
                    &bull; M&agrave;n h&igrave;nh: 8 inch IPS WXGA<br/>&bull; CPU: Quad-core 1.2 GHz<br/>&bull; RAM/ROM: 1 GB/8 GB<br/>&bull; Camera: 5 MP/0.3 MP<br/>&bull; Pin: 4800 mAh
                </div>
            </div>
        </a>
    </div>
</div>
<!-- END Item1 -->



<!-- BEGIN Item2 -->
<div class="h-item h-item-2">
    <a href="/may-tinh-bang/ipad-air-2-64gb-4g-cellular-pid824.html">
        <img src="<?php echo template_directory;?>/images/Product/ProductImage//iPad-Air-2-64GB-4G-Cellular.jpg" style="width: 100%; height: 100%" /></a>
</div>
<!-- END Item2 -->

<!-- BEGIN Item1 -->
<div class="h-item">
    <div class="content">
        <div style="height: 22px;width: 27px; position: relative;">
            
            <!-- BEGIN Is_uu_dai_tra_gop -->
            <div class="title">
                <i class="icons tg"></i>
            </div>
            <!-- END Is_uu_dai_tra_gop -->
            
            
            
        </div>
        <div class="img">
            <img src="<?php echo template_directory;?>/images/Product/ProductImage/small/11534452699.jpeg" alt=""/>
        </div>
        <div class="sell">
            <!-- BEGIN GiaGoc -->
            12.990.000 ₫
            <!-- END GiaGoc -->
        </div>
        <div class="price">11.990.000 ₫</div>
        <h3 class="name">iPad mini 4 Cellular 16Gb 4G</h3>
        <a href="/may-tinh-bang/ipad-mini-4-cellular-16gb-4g-pid81837.html">
            <div class="h-detail">
                <h3>iPad mini 4 Cellular 16Gb 4G</h3>
                <h4>11.990.000 ₫</h4>
                <div class="order" onclick="muahang(81837); return false;">đặt ngay</div>
                <div class="line-top">
                    &bull; M&agrave;n h&igrave;nh:7.9 inch IPS LED-backlit LCD<br/>&bull; CPU: Apple A8, Dual-Core 1.5 GHz<br/>&bull; RAM/ROM: 2 GB/16 GB<br/>&bull; Camera: 8 MP/1.2 MP<br/>&bull; Pin: 19.1 Wh (5162 mAh)
                </div>
            </div>
        </a>
    </div>
</div>
<!-- END Item1 -->


<!-- BEGIN Item1 -->
<div class="h-item">
    <div class="content">
        <div style="height: 22px;width: 27px; position: relative;">
            
            <!-- BEGIN Is_uu_dai_tra_gop -->
            <div class="title">
                <i class="icons tg"></i>
            </div>
            <!-- END Is_uu_dai_tra_gop -->
            
            
            
        </div>
        <div class="img">
            <img src="<?php echo template_directory;?>/images/Product/ProductImage/small/11330958178.jpg" alt=""/>
        </div>
        <div class="sell">
            <!-- BEGIN GiaGoc -->
            26.990.000 ₫
            <!-- END GiaGoc -->
        </div>
        <div class="price">26.490.000 ₫</div>
        <h3 class="name">iPad Pro Wi-Fi 4G 128GB</h3>
        <a href="/may-tinh-bang/ipad-pro-wi-fi-4g-128gb-pid101913.html">
            <div class="h-detail">
                <h3>iPad Pro Wi-Fi 4G 128GB</h3>
                <h4>26.490.000 ₫</h4>
                <div class="order" onclick="muahang(101913); return false;">đặt ngay</div>
                <div class="line-top">
                    &bull; M&agrave;n h&igrave;nh: 12.9'' Retina LED-backlit LCD<br/>&bull; CPU: Apple A9X, Dual-core 2.2 GHz<br/>&bull; RAM/ROM: 4 GB/128 GB<br/>&bull; Camera: 8 MP/1.2 MP<br/>&bull; Pin:&nbsp;38.5 Whrs
                </div>
            </div>
        </a>
    </div>
</div>
<!-- END Item1 -->




<div class="h-item-active-2">
    <a href="/danh-muc/may-tinh-bang-010003.html">
    <i class="icons i-tablet" title="tablet"></i>
    <div style="margin-top: 15px;">
        Xem tất cả<br />
        (<b>97 </b> Máy tính bảng)
    </div></a>
</div>

            </div>
            <div class="row pk-wapper">
                
<style type="text/css">
    .icons.tratruoc0{background-position:-410px -640px !important;width:69px;height:24px}
    .icons.tratruoc10{background-position:-480px -640px !important;width:69px;height:24px}
</style>
<div class="h-item-active">
    <h2 class="head"><a href="/danh-muc/phu-kien-010005.html">Phụ Kiện</a></h2>
    <div class="item-left">
        
        <a href='/phu-kien/chuot-cid010005006.html'><h4>Thẻ nhớ</h4></a><a href='/phu-kien/tam-dan-cid010005013.html'><h4>Tấm dán</h4></a><a href='/phu-kien/bao-da-op-lung-cid010005012.html'><h4>Bao da/Ốp lưng</h4></a><a href='/phu-kien/loa-cid010005003.html'><h4>Loa</h4></a><a href='/phu-kien/pin-du-phong-cid010005004.html'><h4>Pin dự phòng</h4></a><a href='/phu-kien/tai-nghe-cid010005005.html'><h4>Tai nghe</h4></a><a href='/phu-kien/cap-sac-cid010005014.html'><h4>Cáp/Sạc</h4></a><a href='/phu-kien/usb-cid010005009.html'><h4>USB</h4></a><a href='/phu-kien/de-tan-nhiet-cid010005002.html'><h4>Đế tản nhiệt</h4></a><a href='/phu-kien/tui-dung-laptop-cid010005008.html'><h4>Túi đựng laptop</h4></a><a href='/phu-kien/o-cung-di-dong-cid010005017.html'><h4>Ổ cứng di động</h4></a><a href='/phu-kien/chuot-cid010005001.html'><h4>Chuột</h4></a><a href='/phu-kien/thiet-bi-mang-cid010005015.html'><h4>Thiết bị mạng</h4></a><a href='/phu-kien/dcom3g-cid010005007.html'><h4>DCOM-3G</h4></a>
        

    </div>
</div>


<!-- BEGIN Item1 -->
<div class="h-item">
    <div class="content">
        <div style="height: 22px;width: 27px; position: relative;">
            
            
            
            
            
        </div>
        <div class="img">
            <img src="<?php echo template_directory;?>/images/Product/ProductImage/small/31218148607.jpg" alt=""/>
        </div>
        <div class="sell">
            <!-- BEGIN GiaGoc -->
            <!-- Template variable GiaGoc undefined -->
            <!-- END GiaGoc -->
        </div>
        <div class="price">1.190.000 ₫</div>
        <h3 class="name">Sạc nhanh Samsung Galaxy Note 5</h3>
        <a href="/phu-kien/sac-nhanh-samsung-galaxy-note-5-pid40675.html">
            <div class="h-detail">
                <h3>Sạc nhanh Samsung Galaxy Note 5</h3>
                <h4>1.190.000 ₫</h4>
                <div class="order" onclick="muahang(40675); return false;">đặt ngay</div>
                <div class="line-top">
                    &bull; &Aacute;p dụng c&ocirc;ng nghệ sạc nhanh<br/>&bull; Trọng lượng: 145 g<br/>&bull; Độ d&agrave;y: 9.8 mm<br/>&bull; Dung lượng: 5200 mAh
                </div>
            </div>
        </a>
    </div>
</div>
<!-- END Item1 -->


<!-- BEGIN Item1 -->
<div class="h-item">
    <div class="content">
        <div style="height: 22px;width: 27px; position: relative;">
            
            
            
            
            
        </div>
        <div class="img">
            <img src="<?php echo template_directory;?>/images/Product/ProductImage/small/481850109.jpg" alt=""/>
        </div>
        <div class="sell">
            <!-- BEGIN GiaGoc -->
            <!-- Template variable GiaGoc undefined -->
            <!-- END GiaGoc -->
        </div>
        <div class="price">220.000 ₫</div>
        <h3 class="name"> Đế tản nhiệt DeepCool N17 </h3>
        <a href="/phu-kien/-de-tan-nhiet-deepcool-n17-pid1248.html">
            <div class="h-detail">
                <h3> Đế tản nhiệt DeepCool N17 </h3>
                <h4>220.000 ₫</h4>
                <div class="order" onclick="muahang(1248); return false;">đặt ngay</div>
                <div class="line-top">
                    &bull; Cổng giao tiếp: USB 2.0 <br/>&bull; Tốc độ quạt: 1000&plusmn;10%RPM<br/>&bull; Bảo h&agrave;nh: 6 th&aacute;ng
                </div>
            </div>
        </a>
    </div>
</div>
<!-- END Item1 -->


<!-- BEGIN Item1 -->
<div class="h-item">
    <div class="content">
        <div style="height: 22px;width: 27px; position: relative;">
            
            
            
            
            
        </div>
        <div class="img">
            <img src="<?php echo template_directory;?>/images/Product/ProductImage/small/1112832429966827343.jpeg" alt=""/>
        </div>
        <div class="sell">
            <!-- BEGIN GiaGoc -->
            <!-- Template variable GiaGoc undefined -->
            <!-- END GiaGoc -->
        </div>
        <div class="price">120.000 ₫</div>
        <h3 class="name">Vỏ ốp X-Fitted Crystal Skin iPhone 6/ 6s</h3>
        <a href="/phu-kien/vo-op-x-fitted-crystal-skin-iphone-6-6s-pid38172.html">
            <div class="h-detail">
                <h3>Vỏ ốp X-Fitted Crystal Skin iPhone 6/ 6s</h3>
                <h4>120.000 ₫</h4>
                <div class="order" onclick="muahang(38172); return false;">đặt ngay</div>
                <div class="line-top">
                    <ul class='u1'>
                                <li style='margin-bottom: 10px;'>Giao hàng miễn phí (nếu cách Viettel Store dưới 10km)</li>
                                <li>Bảo hành chính hãng</li>
                            </ul>
                </div>
            </div>
        </a>
    </div>
</div>
<!-- END Item1 -->


<!-- BEGIN Item1 -->
<div class="h-item">
    <div class="content">
        <div style="height: 22px;width: 27px; position: relative;">
            
            
            
            
            
        </div>
        <div class="img">
            <img src="<?php echo template_directory;?>/images/Product/ProductImage/small/4807985247.jpg" alt=""/>
        </div>
        <div class="sell">
            <!-- BEGIN GiaGoc -->
            <!-- Template variable GiaGoc undefined -->
            <!-- END GiaGoc -->
        </div>
        <div class="price">500.000 ₫</div>
        <h3 class="name">Loa Powermax TM01C</h3>
        <a href="/phu-kien/loa-powermax-tm01c-pid40410.html">
            <div class="h-detail">
                <h3>Loa Powermax TM01C</h3>
                <h4>500.000 ₫</h4>
                <div class="order" onclick="muahang(40410); return false;">đặt ngay</div>
                <div class="line-top">
                    &bull; C&ocirc;ng suất: 3W <br/>&bull; K&iacute;ch thước: cao 12cm đường k&iacute;nh 6cm (+- 1,5cm) <br/>&bull; Bảo h&agrave;nh: 12 th&aacute;ng
                </div>
            </div>
        </a>
    </div>
</div>
<!-- END Item1 -->


<!-- BEGIN Item1 -->
<div class="h-item">
    <div class="content">
        <div style="height: 22px;width: 27px; position: relative;">
            
            
            
            
            
        </div>
        <div class="img">
            <img src="<?php echo template_directory;?>/images/Product/ProductImage/small/11813123489.jpg" alt=""/>
        </div>
        <div class="sell">
            <!-- BEGIN GiaGoc -->
            <!-- Template variable GiaGoc undefined -->
            <!-- END GiaGoc -->
        </div>
        <div class="price">1.280.000 ₫</div>
        <h3 class="name">Bộ phát Wireless di động TP LINK M5250 </h3>
        <a href="/phu-kien/bo-phat-wireless-di-dong-tp-link-m5250-pid1007.html">
            <div class="h-detail">
                <h3>Bộ phát Wireless di động TP LINK M5250 </h3>
                <h4>1.280.000 ₫</h4>
                <div class="order" onclick="muahang(1007); return false;">đặt ngay</div>
                <div class="line-top">
                    &bull; Tốc độ: tải xuống: 21.6 Mbps, tải l&ecirc;n: 5.76 Mbps<br/>&bull; Hỗ trợ SIM v&agrave; thẻ nhớ<br/>&bull; K&iacute;ch thước: 94 x 56.7 x 19.8 mm<br/>&bull; Trọng lượng: 92.5 g
                </div>
            </div>
        </a>
    </div>
</div>
<!-- END Item1 -->




<div class="h-item-active-2">
    <a href="/danh-muc/phu-kien-010005.html">
    <i class="icons i-pk" title="pk"></i>
    <div style="margin-top: 15px;">
        Xem tất cả<br />
        (<b>18 </b> Phụ Kiện)
    </div></a>
</div>

</div>
<div class="row co-the-ban-quan-tam content-danh-muc">
    <div class="title-2">
        SẢN PHẨM ĐÃ XEM
    </div>
    <div class="content right">
        <div style="margin-left: -1px;">
<div class="item">
    <div style="height: 22px;width: 27px; position: relative;">
    </div>
    <div class="img">
        <img src="<?php echo template_directory;?>/images/Product/ProductImage/small/Untitled-12086623988.jpg" alt=""/>
    </div>
    <div class="sell">
        <!-- BEGIN PhanTramGiamGia_Block -->
        6.990.000 ₫
        <!-- END PhanTramGiamGia_Block -->
    </div>
    <div class="price">6.490.000 ₫</div>
    <h3 class="name">iPhone 5S 16GB</h3>
    <a href="/dien-thoai/iphone-5s-16gb-pid34.html" class="detail1">
        <div class="h-detail">
            <h5>iPhone 5S 16GB</h5>
            <h4>6.490.000 ₫</h4>
            <div class="order" onclick="muahang(34); return false;">đặt ngay</div>
            <div class="line-top">
                &bull;	3 m&agrave;u sắc sang trọng, cảm biến si&ecirc;u nhạy
<br/>&bull;	Camera 8MP chup h&igrave;nh cực n&eacute;t
<br/>&bull;	Vi xử l&yacute; 64 bit- tốc độ truy cập nhanh
            </div>
        </div>
    </a>
</div>
<div class="item">
    <div style="height: 22px;width: 27px; position: relative;">
    </div>
    <div class="img">
        <img src="<?php echo template_directory;?>/images/Product/ProductImage/small/814870523243071815.jpeg" alt=""/>
    </div>
    <div class="sell">
        <!-- BEGIN PhanTramGiamGia_Block -->
        1.599.000 ₫
        <!-- END PhanTramGiamGia_Block -->
    </div>
    <div class="price">1.349.000 ₫</div>
    <h3 class="name">Microsoft Lumia 430 </h3>
    <a href="/dien-thoai/microsoft-lumia-430-pid38217.html" class="detail1">
        <div class="h-detail">
            <h5>Microsoft Lumia 430 </h5>
            <h4>1.349.000 ₫</h4>
            <div class="order" onclick="muahang(38217); return false;">đặt ngay</div>
            <div class="line-top">
                &bull; M&agrave;n h&igrave;nh: 4.0 inch WVGA&nbsp;LCD<br/>&bull; CPU: Qualcomm Snapdragon 200, Dual-core 1.2 GHz<br/>&bull; RAM/ROM: 1 GB/8 GB<br/>&bull; Camera: 2 MP/0.3 MP<br/>&bull; Pin: 1500 mAh
            </div>
        </div>
    </a>
</div>
<div class="item">
    <div style="height: 22px;width: 27px; position: relative;">  </div>
    <div class="img">
        <img src="<?php echo template_directory;?>/images/Product/ProductImage/small/3333535190179.jpg" alt=""/>
    </div>
    <div class="sell">
        <!-- BEGIN PhanTramGiamGia_Block -->
        18.490.000 ₫
        <!-- END PhanTramGiamGia_Block -->
    </div>
    <div class="price">15.990.000 ₫</div>
    <h3 class="name">iPhone 6s 16GB</h3>
    <a href="/dien-thoai/iphone-6s-16gb-pid99534.html" class="detail1">
        <div class="h-detail">
            <h5>iPhone 6s 16GB</h5>
            <h4>15.990.000 ₫</h4>
            <div class="order" onclick="muahang(99534); return false;">đặt ngay</div>
            <div class="line-top">
                &bull; M&agrave;n h&igrave;nh: 4.7 inch Retina HD with 3D touch<br/>&bull; CPU:&nbsp;Apple A9 64-bit, Dual-core 1.84 GHz<br/>&bull; RAM/ROM: 2 GB/16 GB<br/>&bull; Camera: 12 MP/5 MP<br/>&bull; Pin: 1715 mAh
            </div>
        </div>
    </a>
</div>



<div class="item">
    <div style="height: 22px;width: 27px; position: relative;">
        
        
        
        
    </div>
    <div class="img">
        <img src="<?php echo template_directory;?>/images/Product/ProductImage/small/Untitledd-1-compressed.jpg" alt=""/>
    </div>
    <div class="sell">
        
    </div>
    <div class="price">3.990.000 ₫</div>
    <h3 class="name">Samsung Galaxy J5</h3>
    <a href="/dien-thoai/samsung-galaxy-j5-pid40427.html" class="detail1">
        <div class="h-detail">
            <h5>Samsung Galaxy J5</h5>
            <h4>3.990.000 ₫</h4>
            <div class="order" onclick="muahang(40427); return false;">đặt ngay</div>
            <div class="line-top">
                &bull; M&agrave;n h&igrave;nh: 5.0" Super AMOLED<br/>&bull; CPU: Snapdragon, Quad-core 1.2 GHz<br/>&bull; RAM/ROM: 1.5 GB/8 GB<br/>&bull; Camera: 13 MP/5 MP<br/>&bull; Pin: 2600 mAh
            </div>
        </div>
    </a>
</div>



<div class="item">
    <div style="height: 22px;width: 27px; position: relative;">
        <!-- BEGIN IsHoting -->
        <div class="title"><i class="icons bc"></i></div>
        <!-- END IsHoting -->
        
        
        
    </div>
    <div class="img">
        <img src="<?php echo template_directory;?>/images/Product/ProductImage/small/625468829-compressed.jpg" alt=""/>
    </div>
    <div class="sell">
        
    </div>
    <div class="price">13.990.000 ₫</div>
    <h3 class="name">Samsung Galaxy Note 5</h3>
    <a href="/dien-thoai/samsung-galaxy-note-5-pid40494.html" class="detail1">
        <div class="h-detail">
            <h5>Samsung Galaxy Note 5</h5>
            <h4>13.990.000 ₫</h4>
            <div class="order" onclick="muahang(40494); return false;">đặt ngay</div>
            <div class="line-top">
                &bull; M&agrave;n h&igrave;nh: 5.7 inch Super AMOLED<br/>&bull; CPU:&nbsp;Exynos 7420, Quad-core 2.1 GHz + Quad-core 1.5 GHz<br/>&bull; RAM/ROM: 4 GB/32 GB<br/>&bull; Camera: 16 MP/5 MP<br/>&bull; Pin: 3000 mAh
            </div>
        </div>
    </a>
</div>



<div class="item">
    <div style="height: 22px;width: 27px; position: relative;">
        
        
        
        
    </div>
    <div class="img">
        <img src="<?php echo template_directory;?>/images/Product/ProductImage/small/Untitleds-1-compressed.jpg" alt=""/>
    </div>
    <div class="sell">
        
    </div>
    <div class="price">4.520.000 ₫</div>
    <h3 class="name">Samsung Galaxy J7</h3>
    <a href="/dien-thoai/samsung-galaxy-j7-pid40428.html" class="detail1">
        <div class="h-detail">
            <h5>Samsung Galaxy J7</h5>
            <h4>4.520.000 ₫</h4>
            <div class="order" onclick="muahang(40428); return false;">đặt ngay</div>
            <div class="line-top">
                &bull; M&agrave;n h&igrave;nh: 5.5 inch Super AMOLED<br/>&bull; CPU: Octa-Core 1.5GHz<br/>&bull; RAM/ROM: 1.5 GB/16 GB<br/>&bull; Camera: 13 MP/5 MP<br/>&bull; Camera trước g&oacute;c rộng, k&egrave;m flash<br />
<br />
            </div>
        </div>
    </a>
</div>





                    </div>
                    <div class="clear-both"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Content -->


<style>
    #cardpayment1 {
        display: block;
    }

        #cardpayment1 > label {
            margin-left: 10px;
        }

    .u1 {
        list-style: none;
        padding: 0;
    }

        .u1 li {
            padding-left: 0;
        }

    #pi_checker {
        margin-bottom: 5px;
    }

    .simSo_showCls {
        display: none;
    }
</style>

<!--popup-->
<div id="popup_payment1" class="dialog1">
    <div class="signup-ct">
        <div class="signup-header">
            <h4>Đặt hàng - nghe tư vấn miễn phí</h4>
            <h6 style="text-align: center; margin-top: -5px; margin-bottom: 3px; color: #fff;">(Mua là quyền của bạn - Tư vấn miễn phí là trách nhiệm của chúng tôi)</h6>
            <a class="modal_close" href="#"><i class="fa fa-close"></i></a>
        </div>
        <div class="form_payment">
            <div class="form_infor margin-right-20 margin-left-10">
                <div class="pro_infor">
                    <h3 id="step1" style="text-transform: none; border-bottom: none;" class="title">Bước 1: Chọn màu</h3>
                    <div id="Gen1spThanhToan"></div>
                    <div class="box_payment_option" style="text-align: left; margin-top: 5px;">
                        <ul class="payment_option">
                            
                            <li id="panel-loai-sim" class="simSo_showCls">
                                <div style="color: #242424; font-size: 12px; font-weight: 600;">LOẠI SIM:</div>
                                <div>
                                    <label>
                                        <input type="radio" value="3" name="ls" checked="checked" />
                                        Sim thường</label>
                                    <label>
                                        <input type="radio" value="2" name="ls" />
                                        Sim micro</label>
                                    <label>
                                        <input type="radio" value="1" name="ls" />
                                        Sim nano</label>
                                </div>
                            </li>
                            <li>
                                <label class="chk123">
                                    <input type="checkbox" value="2" id="chkXuatHoaDonCty" />
                                    Xuất hóa đơn công ty
                                </label>
                                <div class="form-group w-icon chk114">
                                    <input type="text" name="" id="Text2" class="form-control" placeholder="Tên công ty" style="margin-bottom: 10px;" />

                                    <input type="text" name="" id="Text3" class="form-control" placeholder="Địa chỉ" style="margin-bottom: 10px;" />

                                    <input type="text" name="" id="Text4" class="form-control" placeholder="Mã số thuế" />
                                </div>
                            </li>
                            <li>
                                <label class="chk123" style="margin-top: 3px;">
                                    <input type="checkbox" value="2" id="chkHinhThucThanhToan" checked="checked" />
                                    Hình thức thanh toán
                                </label>

                                <div class="form-group w-icon chk114" id="cardpayment1">
                                    
                                    <label class="radio-inline">
                                        <input type="radio" value="1bc34c41-b71f-4b15-b184-1dfe75e163a5" name="card_paymentTypes" class="infor_user">
                                        Thanh toán tại Siêu thị (giữ hàng)
									    
                                    </label>
                                    
                                    
                                    <label class="radio-inline">
                                        <input type="radio" value="fa7aa975-8628-450c-b84b-3304056ccfd7" name="card_paymentTypes" class="infor_user">
                                        Giao hàng thu tiền tại nhà
									    
                                    </label>
                                    
                                    
                                    <label class="radio-inline">
                                        <input type="radio" value="80c49087-1012-4891-b2d4-49c033ace909" name="card_paymentTypes" class="infor_user">
                                        
									    <img alt='back-plus' src='<?php echo template_directory;?>/images/Library/images/bankplus-lg_38549581314112014.png' class='img_bank'>
                                    </label>
                                    <div class='desc'>Xin mời quý khách dùng chức năng BankPlus trên điện thoại để thanh toán đến tài khoản sau:<br/>
Ngân hàng: <strong>Ngân hàng TM Cổ phần Quân Đội</strong><br/>
Tên tài khoản: Công ty TNHH NN MTV TM & XNK Viettel<br/> 
Số tài khoản: <strong>0051133999888</strong><br/>
</div>
                                    
                                    <label class="radio-inline">
                                        <input type="radio" value="e6551df2-083c-41b2-87e1-c9cc105f8a9c" name="card_paymentTypes" class="infor_user">
                                        Chuyển khoản Ngân hàng
									    
                                    </label>
                                    <div class='desc'>Thông tin tài khoản thụ hưởng của Viettelstore.  Sau khi chuyển khoản, xin vui lòng thông báo cho chúng tôi qua tổng đài <strong>1800 8123</strong> để được phục vụ nhanh nhất.
                                                                    <br>                                                   
                                                                    Ngân hàng: <strong>Ngân hàng TM Cổ phần Quân Đội</strong><br>
                                                                    Chi nhánh: Trần Duy Hưng
                                                                    <br>
                                                                    Tên tài khoản: Công ty TNHH NN MTV TM &amp; XNK Viettel
                                                                    <br>
                                                                    Số tài khoản: <strong>0051133999888</strong></div>
                                    

                                    <p style="margin-top: 10px;">
                                        Hướng dẫn thanh toán xem chi tiết <a href="/tin-tuc/phuong-thuc-thanh-toan-014002.html" style="font-weight: bold; color: #F83015; text-decoration: underline; margin-top: 10px;">tại đây</a>
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="form_infor">
                <h3 id="step2" class="title" style="text-transform: none;">Bước 2: Thông tin người mua</h3>
                <div class="form-group w-icon hidden">
                    <label class="radio-inline" style="padding-left: 0;">
                        <span style="float: left; padding-right: 25px;">Anh</span>
                        <input type="radio" class="infor_user" name="inlineRadioOptions" id="Radio4" value="option1" />
                    </label>
                    <label class="radio-inline" style="padding-left: 0;">
                        <span style="float: left; padding-right: 25px;">Chị</span>
                        <input type="radio" class="infor_user" name="inlineRadioOptions" id="Radio5" value="option2" />
                    </label>
                </div>
                <table>
                    <tr>
                        <td>
                            <div class="box-select" style="margin: 0 10px 10px 0">
                                <select class="drop-city" id="inlineRadioOptions" style="width: 65px">
                                    <option value="1">Anh</option>
                                    <option value="2">Chị</option>
                                </select>
                            </div>
                        </td>
                        <td style="width: 100%">
                            <div class="form-group w-icon">
                                <input type="text" placeholder="Họ và tên (*)" class="form-control" id="popup_payment_inp_hoten" />
                            </div>
                        </td>
                    </tr>
                </table>
                <div class="form-group w-icon">
                    <input type="text" placeholder="Số điện thoại (*)" class="form-control" id="popup_payment_inp_sdt" />
                </div>
                <div class="form-group w-icon simSo_showCls" id="popup_payment_inp_cmnd_div">
                    <input type="text" placeholder="Số Chứng minh nhân dân (*)" class="form-control" id="popup_payment_inp_cmnd" />
                </div>
                <div class="form-group w-icon dienThoai_showCls">
                    <input type="text" placeholder="Email" class="form-control" id="popup_payment_inp_email" />
                </div>

                <div id="payment-online" class="box">

                    <label class="chk123" style="color: #333; display: none;">
                        <input type="checkbox" value="1" id="chkNhapDiaChi" />
                        Nhập địa chỉ, thời gian để NHẬN HÀNG NHANH HƠN
                    </label>

                    <div id="paymentOnline" style="height: auto;" class="chk114">
                        <form>
                            <div class="form-group w-icon">
                                <div class="box-select">
                                    <select class="drop-city" id="popup_payment_inp_tinh">
                                    </select>
                                </div>
                                <div class="box-select margin-left-10">
                                    <select class="drop-city" id="popup_payment_inp_huyen">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group w-icon">
                                <div class="box-select" style="width: 100%">
                                    <select class="drop-city" style="width: 100%" id="popup_payment_inp_phuong">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group w-icon">
                                <input type="text" name="signin_username" id="popup_payment_inp_diachi" class="form-control" placeholder="Nhập số nhà, tên đường để nhận hàng" />
                            </div>
                            <div class="form-group w-icon">
                                <h4 style="color: #4F4F4F; font-size: 15px; font-weight: bold;">Chọn thời gian nhận hàng</h4>
                                <div class="box-select" style="width: 48%;">
                                    <div class="input-group date ">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <input type="text" data-date-format="d-m-yyyy" id="date01" class="form-control date-picker" />
                                    </div>
                                </div>
                                <div class="box-select margin-left-10" style="width: 48%;">
                                    <div class="input-group date ">
                                        <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                        <input type="text" class="form-control time-picker" id="timepicker1" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="divCaptchaTT"></div>
                <input id="hidProductId" value="" type="hidden"/>
                <div class="btn-fld">
                    <a href="javascript:void(0);" id="buynow1" class="btn btn-buynow">Xác nhận</a>
                </div>
                <div class="margin-top-15">
                    <p class="simSo_showCls" style="color: #e90000; font-size: 12px; line-height: 18px;"><b style="text-decoration: underline; color: #e90000; font-size: 12px; line-height: 18px;">*Lưu ý:</b>  Do lượng đặt hàng quá lớn, sim Quý khách lựa chọn có thể bị trùng với sự lựa chọn của khách hàng khác. ViettelStore sẽ kiểm tra và liên hệ lại ngay với Quý khách!</p>
                    <p class="advisory"><i class="icons pop-tu-van" style="margin-top: 0;"></i><span>Tư vấn bán hàng <strong style="color: #F83015; font-size: 18px; font-weight: bold;">1800 8123</strong></span></p>
                    <ul class="u1">
                        <li style="margin-bottom: 10px;"><i class="icons pop-giao-hang"></i>Giao hàng miễn phí (nếu cách Viettel Store dưới 10km)</li>
                        <li><i class="icons pop-bao-hanh"></i>Bảo hành chính hãng</li>
                    </ul>
                </div>
                <br />
            </div>
        </div>
    </div>
</div>

<div id="popup_finish" class="dialog1">
    <div class="signup-ct">
        <div class="signup-header">
            <h4>Đặt hàng - nghe tư vấn miễn phí</h4>
            <a class="modal_close" href="#"><i class="fa fa-close"></i></a>
        </div>
        <div class="form_infor" style="width: 100%">
            <div class="box">
                <div class="" style="height: auto;">
                    <div class="panel-body">
                        <ul class="card-payment ul_finish">
                            <li>
                                <img alt="" src="<?php echo template_directory;?>/Assets/images/icon-cart.png" />
                            </li>
                            <li class="txt_success" style="margin-top: 25px; font-size: 20px; font-weight: 600; margin-bottom: 5px;">Đặt hàng thành công !
                            </li>
                            <li>Cảm ơn bạn <strong id="popup_finish_name"></strong> đã cho chúng tôi cơ hội được phục vụ!
                            </li>
                            <li>Mã đơn hàng của bạn là <strong id="popup_finish_orderCode"></strong>bạn có thể kiểm tra trạng thái đơn hàng <a id="popup_finish_link" href="/thong-tin-don-hang.html" style="font-weight: 600; text-decoration: underline;">tại đây</a>
                            </li>
                            <li>Chúng tôi sẽ liên hệ với bạn trong vòng 30 phút và cam kết giao hàng miễn phí trong 60 phút.
                            </li>
                            <li>
                                <span style=""><i class="fa fa-advisory-new" style="margin-right: 5px; float: none; display: inline-block;"></i>Tư vấn bán hàng <strong style="color: #e41111; font-size: 18px; font-weight: bold;">1800 8123</strong> (08:00 - 22:00 h)</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div id="thanhtoan_bankplus">
                    Bạn sẽ được chuyển tới <a href="javascript:void();">trang thanh toán</a> BankPlus trong <span>10</span> giây nữa
                </div>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo template_directory;?>/Assets/js/cookie.js"></script>
<script type="text/javascript" src="<?php echo template_directory;?>/Assets/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo template_directory;?>/Assets/js/bootstrap-timepicker.js"></script>
<script type="text/javascript" src="<?php echo template_directory;?>/Assets/js/slides.min.jquery.js"></script>
<script type="text/javascript" src="<?php echo template_directory;?>/Assets/js/slidejs.min.js"></script>
<script type="text/javascript" src="<?php echo template_directory;?>/Assets/js/jquery.lazyload.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        // Lazy load
        $(".phone-wapper .h-item img, .laptop-wapper .h-item img, .tablet-wapper .h-item img, .pk-wapper .h-item img, .content-danh-muc .right .item .img img").lazyload({
            effect: "fadeIn"
        });

        $(".phone-wapper .h-item img, .laptop-wapper .h-item img, .tablet-wapper .h-item img, .pk-wapper .h-item img, .content-danh-muc .right .item .img img").each(function () {
            $(this).attr("data-original", $(this).attr("src"));
            
        });

        $('#cartCount11234').text('0').show();
    });
    $(document).ready(function () {

        var sync1 = $("#owl-slide");
        var sync2 = $("#sync2");

        sync1.owlCarousel({
            singleItem: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            autoPlay: true,
            navigation: true,
            navigationText: ["", ""],
            pagination: false,
            afterAction: syncPosition,
            responsiveRefreshRate: 200,
            lazyLoad: true
        });

        sync2.owlCarousel({
            items: 4,
            itemsDesktop: [1199, 4],
            itemsDesktopSmall: [991, 4],
            itemsTablet: [768, 4],
            itemsMobile: [479, 4],
            pagination: false,
            responsiveRefreshRate: 100,
            afterInit: function (el) {
                el.find(".owl-item").eq(0).addClass("synced");
            }
        });

        function syncPosition(el) {
            var current = this.currentItem;
            $("#sync2")
                .find(".owl-item")
                .removeClass("synced")
                .eq(current)
                .addClass("synced");
            if ($("#sync2").data("owlCarousel") !== undefined) {
                center(current);
            }
        }

        $("#sync2").on("click", ".owl-item", function (e) {
            e.preventDefault();
            var number = $(this).data("owlItem");
            sync1.trigger("owl.goTo", number);
        });

        function center(number) {
            var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
            var num = number;
            var found = false;
            for (var i in sync2visible) {
                if (num === sync2visible[i]) {
                    var found = true;
                }
            }

            if (found === false) {
                if (num > sync2visible[sync2visible.length - 1]) {
                    sync2.trigger("owl.goTo", num - sync2visible.length + 2);
                } else {
                    if (num - 1 === -1) {
                        num = 0;
                    }
                    sync2.trigger("owl.goTo", num);
                }
            } else if (num === sync2visible[sync2visible.length - 1]) {
                sync2.trigger("owl.goTo", sync2visible[1]);
            } else if (num === sync2visible[0]) {
                sync2.trigger("owl.goTo", num - 1);
            }

        }

    });
    $(document).ready(function () {
        $("#owl-slide-2").owlCarousel({
            navigation: true, // Show next and prev buttons
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true,
            autoPlay: false,
            pagination: false,
            lazyLoad: true,
            navigationText: ["", ""]
        });
        $("#owl-slide-3").owlCarousel({
            navigation: true, // Show next and prev buttons
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true,
            autoPlay: false,
            pagination: false,
            lazyLoad: true,
            navigationText: ["", ""]
        });
        $("#owl-news").owlCarousel({
            navigation: false, // Show next and prev buttons
            slideSpeed: 300,
            items: 3,
            itemsDesktop: [1199, 3],
            itemsDesktopSmall: [991, 2],
            itemsTablet: [768, 2],
            itemsMobile: [479, 2],
            responsiveRefreshRate: 100,
            pagination: false,
            paginationSpeed: 400,
            autoPlay: false,
            lazyLoad: true,
            navigationText: ["", ""]
        });
        $('.h-item > .content').hover(function () {
            $(this).addClass('hHover');
            $('.hHover .h-detail').fadeIn(200);
        }, function () {
            $(this).removeClass('hHover');
            $('.h-detail').hide();
        });
    });
    function resize() {
        resizeItem($('.phone-wapper'), $('.phone-wapper > .h-item'));
        resizeItem($('.laptop-wapper'), $('.laptop-wapper > .h-item'));
        resizeItem($('.tablet-wapper'), $('.tablet-wapper > .h-item'));
        resizeItem($('.pk-wapper'), $('.pk-wapper > .h-item'));
        }
    $(window).init(function () {
        resize();
    });
    $(document).ready(function () {
        $('.new-btn-menu').click(function () {
            var w = $('header .container').width();
            if (w >= 1140) {
                var a = $('#status-btnmenu').val();
                if (a == 0) {
                    $('#home-slide').css('margin-left', '0');
                } else {
                    $('#home-slide').css('margin-left', '195px');
                }
            }
        });
        // Hot News random
        $("#slides_News").slidesjs({
            navigation: false,
            pagination: false,
            generatePagination: false,
            width: 500,
            height: 10,
            play: {
                active: false,
                auto: true,
                effect: "fade",
                interval: 5000,
                swap: true,
                restartDelay: 2500
            },
            effect: {
                fade: {
                    speed: 600
                }
            }
        });
    });
</script>

<?php get_footer(); ?>


