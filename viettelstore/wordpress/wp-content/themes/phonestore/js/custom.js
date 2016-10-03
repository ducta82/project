$(document).ready(function(){
	function BindProHover() {
        $('.ProductList3Col_item').unbind('mouseenter').unbind('mouseleave');
        $('.ProductList3Col_item').mouseenter(function () {
            $(this).addClass('dHover');
            $('.dHover .detail').fadeIn(200);
        }).mouseleave(function () {
            $('.dHover .detail').hide();
            $(this).removeClass('dHover');
        });
    }
    $('.content-detail-news .content-left .content .item-bh').hover(function () {
            $(this).addClass('active2');
        }, function () {
            $(this).removeClass('active2');
        });
    function toolbarHide() {
            var a = $('header .container').width() + 30;
            if (($(window).width() - a) > 160) {
                $('#wptoolbar').css('display', 'block');
            } else {
                $('#wptoolbar').css('display', 'none');
            }
        }

        $(function() {
            toolbarHide();
        });
        $(window).resize(function () {
            toolbarHide();
        });

        $('.anhtt .more1 .xem-anh').click(function(){
            $(this).slideUp();
            $(this).parent().find('.content').slideDown();
        });

    /*slide bai viet noi bat*/    
    $("#owl-tin-tuc").owlCarousel({
        items: 3, //10 items above 1000px browser width
        itemsDesktop: [1199, 3], //5 items between 1000px and 901px
        itemsDesktopSmall: [992, 3], // betweem 900px and 601px
        itemsTablet: [991, 2], //2 items between 600 and 0
        itemsMobile: [768, 2],
        navigationText: ["", ""],
        pagination: false,
        navigation: true
    });
        /*
    function view_block(id) {
        var offset;
        if (id == 1) {
            offset = $('.feature').offset();
            active(offset.top);
        }
        if (id == 2) {
            offset = $('.digital').offset();
            active(offset.top);
        }
        if (id == 3) {
            offset = $('.related-news').offset();
            active(offset.top);
        }
        if (id == 4) {
            offset = $('.compare-produce').offset();
            active(offset.top);
        }
        if (id == 5) {
            offset = $('#tabs-comment').offset();
            active(offset.top);
        }
        if (id == 6) {
            offset = $('.hasptt').offset();
            active(offset.top);
        }
    }
    $('.toolbar').scrollToFixed();
    $(function () {
        $(window).on('scroll', function () {
            if ($(window).scrollTop() > 100) {
                $('.scrollToTop').fadeIn();
            } else {
                $('.scrollToTop').fadeOut();
            }
            //active quick menu
            var vt = $(window).scrollTop() + 150;
            if ($('.feature').offset().top < vt) {
                $('#step11').addClass('active');
            } else {
                $('#step11').removeClass('active');
            }
            if ($('.digital').offset().top < vt) {
                $('#step12').addClass('active');
            } else {
                $('#step12').removeClass('active');
            }
            if ($('.related-news').offset().top < vt) {
                $('#step13').addClass('active');
            } else {
                $('#step13').removeClass('active');
            }
            if ($('.compare-produce').offset().top < vt) {
                $('#step14').addClass('active');
            } else {
                $('#step14').removeClass('active');
            }
            if ($('#tabs-comment').offset().top < vt) {
                $('#step15').addClass('active');
            } else {
                $('#step15').removeClass('active');
            }
            if ($('.wapper-pk-detail').offset().top < vt) {
                $('#step16').addClass('active');
            } else {
                $('#step16').removeClass('active');
            }
            if ($('.hasptt').offset().top < vt) {
                $('#step17').addClass('active');
            } else {
                $('#step17').removeClass('active');
            }
            if ($('footer').offset().top < vt + 250) {
                $('#toolbar').fadeOut(300);
            } else {
                $('#toolbar').fadeIn(300);
            }
        });
        $('.scrollToTop').on('click', function () {
            $('html, body').animate({ scrollTop: 0 }, 300, 'linear');
            return false;
        });
    });    */
    /*add to cart popup*/
    $('.order').click(function(e){
        var parent = $(this).parent();
        var productID = parent.find('a.add_to_cart_button').attr('data-product_id');
        var productSku = parent.find('a.add_to_cart_button').attr('data-product_sku');
        var productQuantity = parent.find('a.add_to_cart_button').attr('data-quantity');
        $.ajax({
            url: '/?wc-ajax=add_to_cart',
            type: 'post',
            data: {
                    product_id: productID,
                    product_sku: productSku,
                    quantity: productQuantity
                },
            beforeSend: function() {
                    
            },
            success: function( posts ) {
                var obj = posts.fragments;
                $('#popup_giohang1').css('display','block');
                $.each( obj, function( key, value ) {
                  $('#popup_giohang1').html(value);
                });
            }
        })
    });
    $('p.buttons a.checkout').click(function(e){
        e.preventDefault();
        $('#popup_giohang1').fadeOut(300);
        $('#popup_payment1').fadeIn(300);
    });
    BindProHover();
    $( document ).ajaxComplete(function() {
    BindProHover();
	});

});