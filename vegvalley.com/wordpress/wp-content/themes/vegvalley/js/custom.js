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
	  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
	//google plus 
	(function() {
	    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
	    po.src = 'https://apis.google.com/js/platform.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
	  })();
	 
});
$(window).load(function() {
	$('#slider').nivoSlider({
	 	animSpeed: 500,                   // Slide transition speed 
		pauseTime: 3000, 
		directionNav: false,               // Next & Prev navigation 
		controlNav: false,     
	}); 
}); 