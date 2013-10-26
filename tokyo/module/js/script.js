$(function(){
	var footer = $("footer");  
    var offset = footer.offset().top + footer.height();  
    var win_h = $(window).height();  
    if( offset < win_h){  
        footer.css({"position":"absolute", "bottom":"0"});  
    } 
});