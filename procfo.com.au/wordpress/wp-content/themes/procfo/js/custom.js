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
		var content = $('.logo').parent().find('.content .box-btn');
		var btn_text = $('.box-btn .btn');
		var btn_arr = [];
        if(windowsize <= 800){
			console.log(screen);
			$('.footer_right').append($('.footer-social'));
			$( '.container-header' ).append( $( '.logo' ) );
			$('.navbar-default .navbar-collapse').css('display','none');
			var items = $('.box-post-content').find('.item-post');
			btn_text.each(function(i,item){
				$(item).attr('mobi');
				$(item).html($(item).attr('mobi'));
				console.log("mobi ="+$(item).attr('mobi'));
			});
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
			$( '.logo' ).insertBefore( $(content) );
			$( '.widget_custom_widget' ).insertBefore( $( '.box-widget' ) );
			$('.navbar-default .navbar-collapse').css('display','block');
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