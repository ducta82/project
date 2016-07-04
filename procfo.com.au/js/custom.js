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
    $( window ).resize(function() {
			console.log(screen);
		if(screen <= 800){
			console.log(screen);
			$('.footer_right').append($('.footer-social'));
		}else{
			$(".contact-footer").append($('.footer-social'));
		}
	});	
});