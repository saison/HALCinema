$(function(){
	var footer = $("footer");
    var offset = footer.offset().top + footer.height();
    var win_h = $(window).height();
    if( offset < win_h){
        footer.css({"position":"absolute", "bottom":"0"});
    }

	$("#pagetop a").click(function(){
		$('html,body').stop().animate({ scrollTop: $($(this).attr("href")).offset().top-50 },1500,'easeOutExpo');
		return false;
	});
});