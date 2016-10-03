function i_ajax(a,d,e){$.ajax({type:"POST",url:"/Site/_Sys/ajax.asmx/"+a,data:JSON.stringify(d),contentType:"application/json; charset=utf-8",dataType:"json",success:function(b){try{e(b.d)}catch(c){console.warn(c)}},error:function(b,c,a){console.warn(b,c,a)}})};


