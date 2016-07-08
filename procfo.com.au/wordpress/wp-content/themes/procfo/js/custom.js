$( document ).ready(function() {
	var h = 0;
	var coll_h = $('.navbar-collapse').height();
    $('.navbar-toggle').click(function(){
    		$('.navbar-collapse').toggle('fast');
    });
    var screen = $( window ).width();
	    if(screen <= 800){
			console.log(screen);
			$('.footer_right').append($('.footer-social'));
		}else{
			$(".contact-footer").append($('.footer-social'));
		}
	var $window = $(window);
    function checkWidth() {
        var windowsize = $window.width();
        if(windowsize <= 800){
			console.log(screen);
			$('.footer_right').append($('.footer-social'));
			var items = $('.box-post-content').find('.item-post');
			if(items.length > 0){
				var arr = [];
				items.each(function(i,item){
					arr[i] = item;
				});
				console.log("item");
				$( '.widget_custom_widget' ).insertBefore( $( arr[0] ) );
			}else{
				console.log("entry-header");
				$( '.widget_custom_widget' ).insertBefore( $( '.entry-header' ) );
			}
		}else{
			$(".contact-footer").append($('.footer-social'));
			$( '.widget_custom_widget' ).insertBefore( $( '.box-widget' ) );
		}
    }
    checkWidth();
    $(window).resize(checkWidth);
	$('.faq-title').click(function(){
		var dd = $(this).parent().find('dd');
		var minus = $(this).parent().find('i');
		if(minus.hasClass('fa-plus')){
			minus.removeClass('fa-plus').addClass('fa-minus');
		}else{
			minus.removeClass('fa-minus').addClass('fa-plus');
		}
		dd.slideToggle();
	});

});