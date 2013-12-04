$(function(){
	var name = "#subnav";

	var footer = $("footer");
    var offset = footer.offset().top + footer.height();
    var win_h = $(window).height();
    if( offset < win_h){
        footer.css({"position":"absolute", "bottom":"0"});
    }

	$("#pagetop a,#subnav ul li a").click(function(){
		$('html,body').stop().animate({ scrollTop: $($(this).attr("href")).offset().top-50 },1500,'easeOutExpo');
		return false;
	});

	//サイドバーをスクロールしてもついてくるように設定
	menuYloc = parseInt($(name).css("top").substring(0,$(name).css("top").indexOf("px")))
	$(window).scroll(function () {
	    offset = menuYloc+$(document).scrollTop()+"px";
	    $(name).animate({top:offset},{duration:900,queue:false});
	});
});
