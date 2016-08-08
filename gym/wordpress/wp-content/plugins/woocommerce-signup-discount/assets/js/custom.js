jQuery(document).ready(function($) {
    $('.wcsd_content a').click(function(){
        wcsd_setCookie('wcsd_closed', 'yes', 200);
    });
	if( wcsd_getCookie('wcsd_closed') != 'yes' ) {
		setTimeout(function() {
			Custombox.open({
				target: '#wcsd_modal',
			  effect: wcsd.effect,
			  close: function(){
			  	wcsd_setCookie('wcsd_closed', 'yes');
			  }
			});
		}, 3000);
	}


// Set Cookie
function wcsd_setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires +"; path=/";
}

// Get Cookie
function wcsd_getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) != -1) return c.substring(name.length,c.length);
    }
    return "";
}

});	
