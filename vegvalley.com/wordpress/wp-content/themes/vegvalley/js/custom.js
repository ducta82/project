$( document ).ready(function() {
	//search menu header
	var el = $('.input-group');
	var form_s = $('.box-search');
	$(function () {
	    $('.btn-search').click(function (event) {
			if(!form_s.hasClass('search-open')){
		    	console.log('btn-search click!');
		    	event.preventDefault();
		        el.addClass('fadeInDown animated');
		        form_s.addClass('search-open');
		        el.one('webkitAnimationEnd oanimationend msAnimationEnd animationend',
		        function (e) {
		            el.removeClass('fadeInDown animated');
		        });
	    	}else{
	    		console.log('search-open click!');
				el.addClass('fadeOutUp animated');
	        	el.one('webkitAnimationEnd oanimationend msAnimationEnd animationend',
	    		function(e){
	            	el.removeClass('fadeOutUp animated search-open');
		        	form_s.removeClass('search-open');
	        	});
	    	}
	    });
	});
	//menu header
	$('.navbar-toggle').click(function(){
		$('.navbar-collapse.collapse').toggle('fast');
	});
	//scroll
	//$(".nav-tabs").niceScroll();
	//wistlist
	$('.box-product-buttons').children('.clear').remove();
	//qualyti
	$(function() {
	  $(".quantity").append('<span class="inc wc-button">+</span>').prepend('<span class="dec wc-button">-</span>');
	  $(".wc-button").on("click", function() {
	    var $button = $(this);
	    var oldValue = $button.parent().find("input").val();
	    if ($button.text() == "+") {
	  	  var newVal = parseFloat(oldValue) + 1;
	  	} else {
		   // Don't allow decrementing below zero
	      if (oldValue > 0) {
	        var newVal = parseFloat(oldValue) - 1;
		    } else {
	        newVal = 0;
	      }
		  }
	    $button.parent().find("input").val(newVal);
	  });
	});
//share
	//facebook
	(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
	//google plus 
	(function() {
	    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
	    po.src = 'https://apis.google.com/js/platform.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
	  })();
	//menu footer
	 $('.menu-footer ul li.btn-search').remove();
	//ajax
  	var max_paged = $('.view-all').attr('paged');
  	if(max_paged <= 1){
  		$('.view-all').css('display','none');
  	}
  	var page = 2; // What page we are on.
	$('.view-all').click(function(event){
      	event.preventDefault();
    	console.log("outside = " +page);
       	$.ajax({
            url: ajax_object.ajax_url,
            type: 'post',
            data: {
                    action: 'more_post_ajax',
		            paged: page
        		},
            beforeSend: function() {
	        		$('.view-all').attr('disabled',true).css('cursor','not-allowed');
	        		$('.wc-products').append('<i style="font-size:20px;" class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
	             	console.log("beforeSend = " +page);
            },
            success: function( posts ) {
            		page++;
                    $( '.box-product-wrap' ).append( posts );
            	if((page) > max_paged){
        			console.log("paged = "+(page));	            		
        			$('.view-all').css('display','none');
                    $( '.wc-products' ).find( '.fa-spinner' ).remove();
        		}else{
                 	console.log("success = " +page);
                    $( '.wc-products' ).find( '.fa-spinner' ).remove();
            		$('.view-all').attr('disabled',false).css('cursor','pointer');
        		}
            }
       	})
	});
	// ajax wishlist
	$('.yith-wcwl-add-button a').click(function(e){
		var add_url = $(this).attr('href'),
			id = $(this).attr('data-product-id'),
            el_wrap = $( '.add-to-wishlist-' + id );
		var type = $(this).attr('data-product-type');
		e.preventDefault();
		$.ajax({
			url: ajax_object.ajax_url,
			type:'post',
			data:{
				add_to_wishlist: id,
			    product_type: type,
				action: 'add_to_wishlist'
			},
			success:function(response){
				console.log(response);
				var msg = $( '#yith-wcwl-popup-message' ),
                    response_result = response.result,
                    response_message = response.message ;

                if( yith_wcwl_l10n.multi_wishlist && yith_wcwl_l10n.is_user_logged_in ) {
                    var wishlist_select = $( 'select.wishlist-select' );
                    if( typeof $.prettyPhoto != 'undefined' && typeof $.prettyPhoto.close != 'undefined' ) {
                        $.prettyPhoto.close();
                    }

                    wishlist_select.each( function( index ){
                        var t = $(this),
                            wishlist_options = t.find( 'option' );

                        wishlist_options = wishlist_options.slice( 1, wishlist_options.length - 1 );
                        wishlist_options.remove();

                        if( typeof( response.user_wishlists ) != 'undefined' ){
                            var i = 0;
                            for( i in response.user_wishlists ) {
                                if ( response.user_wishlists[i].is_default != "1" ) {
                                    $('<option>')
                                        .val(response.user_wishlists[i].ID)
                                        .html(response.user_wishlists[i].wishlist_name)
                                        .insertBefore(t.find('option:last-child'))
                                }
                            }
                        }
                    } );
                }
                var html_mesage = response_message ? response_message : 'Product add!';
                $( '#yith-wcwl-message' ).html( html_mesage );
                msg.css( 'margin-left', '-' + $( msg ).width() + 'px' ).fadeIn();
                window.setTimeout( function() {
                    msg.fadeOut();
                }, 2000 );

                if( response_result == "true" ) {
                    if( ! yith_wcwl_l10n.multi_wishlist || ! yith_wcwl_l10n.is_user_logged_in || ( yith_wcwl_l10n.multi_wishlist && yith_wcwl_l10n.is_user_logged_in && yith_wcwl_l10n.hide_add_button ) ) {
                        el_wrap.find('.yith-wcwl-add-button').hide().removeClass('show').addClass('hide');
                    }

                    el_wrap.find( '.yith-wcwl-wishlistexistsbrowse').hide().removeClass('show').addClass('hide').find('a').attr('href', response.wishlist_url);
                    el_wrap.find( '.yith-wcwl-wishlistaddedbrowse' ).show().removeClass('hide').addClass('show').find('a').attr('href', response.wishlist_url).html('<i class="fa fa fa-heart" style="color:#f00;margin-right:5px;"></i>');
                	} else if( response_result == "exists" ) {
                    if( ! yith_wcwl_l10n.multi_wishlist || ! yith_wcwl_l10n.is_user_logged_in || ( yith_wcwl_l10n.multi_wishlist && yith_wcwl_l10n.is_user_logged_in && yith_wcwl_l10n.hide_add_button ) ) {
                        el_wrap.find('.yith-wcwl-add-button').hide().removeClass('show').addClass('hide');
                    }

                    el_wrap.find( '.yith-wcwl-wishlistexistsbrowse' ).show().removeClass('hide').addClass('show').find('a').attr('href', response.wishlist_url);
                    el_wrap.find( '.yith-wcwl-wishlistaddedbrowse' ).hide().removeClass('show').addClass('hide').find('a').attr('href', response.wishlist_url);
                } else {
                    el_wrap.find( '.yith-wcwl-add-button' ).show().removeClass('hide').addClass('show');
                    el_wrap.find( '.yith-wcwl-wishlistexistsbrowse' ).hide().removeClass('show').addClass('hide');
                    el_wrap.find( '.yith-wcwl-wishlistaddedbrowse' ).hide().removeClass('show').addClass('hide');
                }
            }
		})
	});

	//share archive product
	$('.product-buttons .share-product i').click(function (e) {
		e.preventDefault();
		$(this).parent().parent().find('.wc-social.social-archive-product').toggle('fast');
	});
	//heart wishlist
	$(function(){
		$('.yith-wcwl-wishlistexistsbrowse.show').find('a').html('<i class="fa fa fa-heart" style="color:#f00;margin-right:5px;"></i>');
	});
});
$(window).load(function() {
	$('#slider').nivoSlider({
	 	animSpeed: 500,                   // Slide transition speed 
		pauseTime: 3000000, 
		directionNav: false,               // Next & Prev navigation 
		controlNav: false,     
	}); 
}); 