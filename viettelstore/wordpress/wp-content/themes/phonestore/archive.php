<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package phonestore
 */

$catID = the_category_ID($echo=false);
get_header(); 
the_breadcrumb();
?>
	<div id="primary" class="container">
		<div class="row content-detail-news">
			<div class="content-right">
            <div id="owl-tin-tuc" class="owl-carousel owl-theme">
            	<?php $args = array(
					'posts_per_page'   => -1,
					'category'         => $catID
				);
				$posts_array = get_posts( $args ); 
				foreach ( $posts_array as $post ) : setup_postdata( $post ); ?>
					<div class="item col-lg-4 col-md-4 col-sm-6 col-xs-6">
                        <div class="wapper">
                            <div class="clsimg">
                                <?php the_post_thumbnail();?>
                            </div>
                            <div class="txt">
                                <a href="<?php the_permalink();?>"><?php the_title();?></a>
                            </div>
                        </div>
                    </div>
				<?php endforeach; wp_reset_postdata();?>
            </div>
            <div class="clear-both"></div>
            <div class="title">
                <h1 class="le">
                    TIN TỨC
                </h1>
            </div>
            <div class="content">
                <div id="pc-news-block">
                	<table>
                		<tbody>
		<?php
		if ( have_posts() ) : ?>
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
						</tbody>
					</table>
				</div>
			</div>
			</div>
			<div class="content-detail-news">
				<div class="content-left">
					<h3 class="title">DANH MỤC</h3>
					<div class="content">
						<?php  
						$arg = array('exclude'=>1);
						$categories = get_categories($arg);
						foreach ( $categories as $category ) {
							$active = $catID == $category->term_id ? 'active' : '';
						    printf( '<a href="%1$s">
						    	<div class="item-bh %3$s">
				                    %2$s
				                    <i class="icons nav-bh"></i>
				                </div></a>',
						        esc_url( get_category_link( $category->term_id ) ),
						        esc_html( $category->name ),
						        $active
						    );
						}	
						?>
					</div>
				</div>
			</div>
			<div class="content-left">
				<h3 class="title">
                	TIN LIÊN QUAN
            	</h3>
            	<div class="content">
            		<table>
            			<tbody>
            				<tr>
                        <td class="title-3" colspan="2">
                            <h4>
                            <a href="/tin-tuc/mo-hop-sony-xperia-xz-va-nhung-danh-gia-tong-quan-nid6560.html">Mở hộp Sony Xperia XZ và những đánh giá tổng quan</a></h4>
                        </td>
                    </tr>
                    <tr class="line-2">
                        <td class="img">
                            <div><a href="/tin-tuc/mo-hop-sony-xperia-xz-va-nhung-danh-gia-tong-quan-nid6560.html">
                                <img src="http://cdn.viettelstore.vn/images/news//Big//Sony-Xperia-XZ-11_YnKzmDH.jpg" alt="Mở hộp Sony Xperia XZ và những đánh giá tổng quan" style="width: 120px;" /></a>
                            </div>
                        </td>
                        <td class="noi-dung-2">
                            <a href="/tin-tuc/mo-hop-sony-xperia-xz-va-nhung-danh-gia-tong-quan-nid6560.html">
                                <h5>Sẽ không ngoa nếu nói Sony Xperia XZ là sản phẩm tuyệt vời của Sony bởi trên ..</h5>
                            </a>
                            <h6>17/09/2016 | 09:22 AM</h6>
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="title-3" colspan="2">
                            <h4>
                            <a href="/tin-tuc/tuyen-dung-100-nhan-vien-dich-vu-ky-thuat-tren-toan-quoc-nid6561.html">TUYỂN DỤNG 100 NHÂN VIÊN DỊCH VỤ KỸ THUẬT TRÊN TOÀN QUỐC</a></h4>
                        </td>
                    </tr>
                    <tr class="line-2">
                        <td class="img">
                            <div><a href="/tin-tuc/tuyen-dung-100-nhan-vien-dich-vu-ky-thuat-tren-toan-quoc-nid6561.html">
                                <img src="http://cdn.viettelstore.vn/images/news//Big//tuyen-dung-viettel-store-12_FT1pwXr.jpg" alt="TUYỂN DỤNG 100 NHÂN VIÊN DỊCH VỤ KỸ THUẬT TRÊN TOÀN QUỐC" style="width: 120px;" /></a>
                            </div>
                        </td>
                        <td class="noi-dung-2">
                            <a href="/tin-tuc/tuyen-dung-100-nhan-vien-dich-vu-ky-thuat-tren-toan-quoc-nid6561.html">
                                <h5>Nhằm mục tiêu CSKH tốt nhất, Hệ thống bán lẻ Viettelstore cần tuyển dụng 100 Nhân viên ..</h5>
                            </a>
                            <h6>17/09/2016 | 09:44 AM</h6>
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="title-3" colspan="2">
                            <h4>
                            <a href="/tin-tuc/chiem-nguong-hinh-anh-iphone-7-bang-xuong-bang-thit-tai-viet-nam-nid6552.html">Chiêm ngưỡng hình ảnh iPhone 7 “bằng xương bằng thịt” tại Việt Nam</a></h4>
                        </td>
                    </tr>
                    <tr class="line-2">
                        <td class="img">
                            <div><a href="/tin-tuc/chiem-nguong-hinh-anh-iphone-7-bang-xuong-bang-thit-tai-viet-nam-nid6552.html">
                                <img src="http://cdn.viettelstore.vn/images/news//Big//hinh-anh-iphone-7-(5)_5TneAhK.jpg" alt="Chiêm ngưỡng hình ảnh iPhone 7 “bằng xương bằng thịt” tại Việt Nam" style="width: 120px;" /></a>
                            </div>
                        </td>
                        <td class="noi-dung-2">
                            <a href="/tin-tuc/chiem-nguong-hinh-anh-iphone-7-bang-xuong-bang-thit-tai-viet-nam-nid6552.html">
                                <h5>Mặc dù chưa đến ngày mở bán chính thức nhưng hình ảnh iPhone 7 thực tế tại ..</h5>
                            </a>
                            <h6>16/09/2016 | 10:42 AM</h6>
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="title-3" colspan="2">
                            <h4>
                            <a href="/tin-tuc/6-chu-yeu-danh-cho-galaxy-j7-prime--ke-huy-diet-gia-tam-trung-nid6555.html">6 “chữ yêu” dành cho Galaxy J7 Prime - “kẻ hủy diệt” giá tầm trung </a></h4>
                        </td>
                    </tr>
                    <tr class="line-2">
                        <td class="img">
                            <div><a href="/tin-tuc/6-chu-yeu-danh-cho-galaxy-j7-prime--ke-huy-diet-gia-tam-trung-nid6555.html">
                                <img src="http://cdn.viettelstore.vn/images/news//Big//Galaxy-J7-Prime-7_sQaAyse.jpg" alt="6 “chữ yêu” dành cho Galaxy J7 Prime - “kẻ hủy diệt” giá tầm trung " style="width: 120px;" /></a>
                            </div>
                        </td>
                        <td class="noi-dung-2">
                            <a href="/tin-tuc/6-chu-yeu-danh-cho-galaxy-j7-prime--ke-huy-diet-gia-tam-trung-nid6555.html">
                                <h5>Dự kiến ngày 23/9 tới “kẻ hủy diệt” giá tầm trung Galaxy J7 Prime mới chính thức ..</h5>
                            </a>
                            <h6>16/09/2016 | 02:56 PM</h6>
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="title-3" colspan="2">
                            <h4>
                            <a href="/tin-tuc/sap-khai-truong-sieu-thi-tai-tp-chau-doc--tinh-an-giang-nid6558.html">SẮP KHAI TRƯƠNG SIÊU THỊ TẠI TP CHÂU ĐỐC – TỈNH AN GIANG</a></h4>
                        </td>
                    </tr>
                    <tr class="line-2">
                        <td class="img">
                            <div><a href="/tin-tuc/sap-khai-truong-sieu-thi-tai-tp-chau-doc--tinh-an-giang-nid6558.html">
                                <img src="http://cdn.viettelstore.vn/images/news//Big//tuyen-dung-viettel-store-32_Gfk6Gs5.jpg" alt="SẮP KHAI TRƯƠNG SIÊU THỊ TẠI TP CHÂU ĐỐC – TỈNH AN GIANG" style="width: 120px;" /></a>
                            </div>
                        </td>
                        <td class="noi-dung-2">
                            <a href="/tin-tuc/sap-khai-truong-sieu-thi-tai-tp-chau-doc--tinh-an-giang-nid6558.html">
                                <h5>Tuyển dụng gấp 15 Nhân viên Siêu thị làm việc tại An Giang..</h5>
                            </a>
                            <h6>16/09/2016 | 10:00 PM</h6>
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="title-3" colspan="2">
                            <h4>
                            <a href="/tin-tuc/-chay-hang-iphone-7-plus-trong-ngay-dau-mo-ban-tren-toan-cau-nid6559.html">“Cháy hàng” iPhone 7 Plus trong ngày đầu mở bán trên toàn cầu</a></h4>
                        </td>
                    </tr>
                    <tr class="line-2">
                        <td class="img">
                            <div><a href="/tin-tuc/-chay-hang-iphone-7-plus-trong-ngay-dau-mo-ban-tren-toan-cau-nid6559.html">
                                <img src="http://cdn.viettelstore.vn/images/news//Big//dat-hang-iphone-7-(3)_pT23PKY.jpg" alt="“Cháy hàng” iPhone 7 Plus trong ngày đầu mở bán trên toàn cầu" style="width: 120px;" /></a>
                            </div>
                        </td>
                        <td class="noi-dung-2">
                            <a href="/tin-tuc/-chay-hang-iphone-7-plus-trong-ngay-dau-mo-ban-tren-toan-cau-nid6559.html">
                                <h5>Việc đặt hàng iPhone 7 Plus đã bị gián đoạn do Apple đã phát đi thông báo ..</h5>
                            </a>
                            <h6>16/09/2016 | 08:00 PM</h6>
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="title-3" colspan="2">
                            <h4>
                            <a href="/tin-tuc/apple-chinh-thuc-ban-iphone-7-tren-toan-the-gioi-vao-ngay-hom-nay-16-9-nid6553.html">Apple chính thức bán iPhone 7 trên toàn thế giới vào ngày hôm nay (16/9)</a></h4>
                        </td>
                    </tr>
                    <tr class="line-2">
                        <td class="img">
                            <div><a href="/tin-tuc/apple-chinh-thuc-ban-iphone-7-tren-toan-the-gioi-vao-ngay-hom-nay-16-9-nid6553.html">
                                <img src="http://cdn.viettelstore.vn/images/news//Big//ngay-ban-iphone-7-()_QpWs84m.jpg" alt="Apple chính thức bán iPhone 7 trên toàn thế giới vào ngày hôm nay (16/9)" style="width: 120px;" /></a>
                            </div>
                        </td>
                        <td class="noi-dung-2">
                            <a href="/tin-tuc/apple-chinh-thuc-ban-iphone-7-tren-toan-the-gioi-vao-ngay-hom-nay-16-9-nid6553.html">
                                <h5>Sau bao mỏi mòn chờ mong, ngày bán iPhone 7 của Apple đã chính thức diễn ra. ..</h5>
                            </a>
                            <h6>16/09/2016 | 01:35 PM</h6>
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="title-3" colspan="2">
                            <h4>
                            <a href="/tin-tuc/tuan-le-vang-huawei-nid6554.html">Tuần lễ vàng Huawei</a></h4>
                        </td>
                    </tr>
                    <tr class="line-2">
                        <td class="img">
                            <div><a href="/tin-tuc/tuan-le-vang-huawei-nid6554.html">
                                <img src="http://cdn.viettelstore.vn/images/news//Big//huawei_1609_1_hEKzHxr.png" alt="Tuần lễ vàng Huawei" style="width: 120px;" /></a>
                            </div>
                        </td>
                        <td class="noi-dung-2">
                            <a href="/tin-tuc/tuan-le-vang-huawei-nid6554.html">
                                <h5>Từ ngày 16 tới 22/9 quý khách hàng sẽ được mua các sản phẩm từ thương hiệu ..</h5>
                            </a>
                            <h6>16/09/2016 | 11:40 AM</h6>
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="title-3" colspan="2">
                            <h4>
                            <a href="/tin-tuc/sap-khai-truong-sieu-thi-tai-tp-quy-nhon--tinh-binh-dinh-nid6556.html">SẮP KHAI TRƯƠNG SIÊU THỊ TẠI TP QUY NHƠN – TỈNH BÌNH ĐỊNH</a></h4>
                        </td>
                    </tr>
                    <tr class="line-2">
                        <td class="img">
                            <div><a href="/tin-tuc/sap-khai-truong-sieu-thi-tai-tp-quy-nhon--tinh-binh-dinh-nid6556.html">
                                <img src="http://cdn.viettelstore.vn/images/news//Big//tuyen-dung-viettel-store-35_PAdKtq4.jpg" alt="SẮP KHAI TRƯƠNG SIÊU THỊ TẠI TP QUY NHƠN – TỈNH BÌNH ĐỊNH" style="width: 120px;" /></a>
                            </div>
                        </td>
                        <td class="noi-dung-2">
                            <a href="/tin-tuc/sap-khai-truong-sieu-thi-tai-tp-quy-nhon--tinh-binh-dinh-nid6556.html">
                                <h5>Tuyển dụng gấp 15 Nhân viên cho Siêu thị mới tại Bình Định...</h5>
                            </a>
                            <h6>16/09/2016 | 04:15 PM</h6>
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="title-3" colspan="2">
                            <h4>
                            <a href="/tin-tuc/tuan-le-vang-huawei-nid6554.html">Tuần lễ vàng Huawei</a></h4>
                        </td>
                    </tr>
                    <tr class="line-2">
                        <td class="img">
                            <div><a href="/tin-tuc/tuan-le-vang-huawei-nid6554.html">
                                <img src="http://cdn.viettelstore.vn/images/news//Big//huawei_1609_1_hEKzHxr.png" alt="Tuần lễ vàng Huawei" style="width: 120px;" /></a>
                            </div>
                        </td>
                        <td class="noi-dung-2">
                            <a href="/tin-tuc/tuan-le-vang-huawei-nid6554.html">
                                <h5>Từ ngày 16 tới 22/9 quý khách hàng sẽ được mua các sản phẩm từ thương hiệu ..</h5>
                            </a>
                            <h6>16/09/2016 | 11:40 AM</h6>
                        </td>
                    </tr>
            			</tbody>
            		</table>
            	</div>
			</div> 	
		</div><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
