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
	$(".nav-tabs").niceScroll();

});
$(window).load(function() {
	$('#slider').nivoSlider({
	 	animSpeed: 500,                   // Slide transition speed 
		pauseTime: 3000, 
		directionNav: false,               // Next & Prev navigation 
		controlNav: false,     
	}); 
}); 