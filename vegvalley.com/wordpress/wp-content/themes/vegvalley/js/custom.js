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
});
$(window).load(function() {
	$('#slider').nivoSlider({
	 	animSpeed: 500,                   // Slide transition speed 
		pauseTime: 3000, 
		directionNav: false,               // Next & Prev navigation 
		controlNav: false,     
	}); 
}); 