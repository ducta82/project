$(document).ready(function(){
	$('.subcribe').find('.es_textbox_button').addClass('btn_subscribe');
	$('.es_textbox_class').attr('placeholder','Enter your email');
    $('#comments').html('Comments');
    /*$('#commentform').find('#comment').remove();
    $('#commentform').append('<textarea id="comment" name="comment" class="form" placeholder="Massage" tabindex="4" aria-required="true"></textarea>');*/
	//ajax category
	var page = 2; // What page we are on.
	var cat_id = $('#load_more').attr('cat') ? $('#load_more').attr('cat') : '';
    var max_paged = $('#load_more').attr('max-page') ? $('#load_more').attr('max-page') : 1;
	var key = $('#load_more').attr('key') ? $('#load_more').attr('key') : '';
	if(max_paged == 1){
		$('#pbd-alp-load-posts').css('display','none');
	}
	$('#load_more').click(function(event){
      	event.preventDefault();
    	console.log("outside = " +page);
       	$.ajax({
            url: ajax_object.ajax_url,
            type: 'post',
            data: {
                    action: 'more_post_ajax',
		            paged: page,
		            cat:cat_id,
                    key:key,
                    query_vars:ajax_object.query_vars
        		},
            beforeSend: function() {
        		$('#load_more').attr('disabled',true).css('cursor','not-allowed');
        		$('#pbd-alp-load-posts').append('<i style="font-size:20px;" class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
             	console.log("beforeSend = " +page);
            },
            success: function( posts ) {
        		page++;
        		$( '.box-post-content' ).append( posts );
            	if((page) > max_paged){
	                $( '#pbd-alp-load-posts' ).find( '.fa-spinner' ).remove();
        			$('#pbd-alp-load-posts').css('display','none');
            	}else{
	             	console.log("success = " +page);
	                $( '#pbd-alp-load-posts' ).find( '.fa-spinner' ).remove();
	        		$('#load_more').attr('disabled',false).css('cursor','pointer');
            	}
            }
       	})
	});//end ajax category

    //header menu
    $('#menu-icon-mobile').click(function(e){
        e.preventDefault();
            $('#menu-mobie-menu').toggle('fast');
    });
    $(function() {
    $('li.menu-item-has-children>a').click(function() {
        console.log('click');
        $(this).find('.sub-menu').toggle('fast');
        return false;
    }).dblclick(function() {
        console.log('dbclick');
        window.location.href = this.href;
        return false;
    });
    });
});