$(function(){
	var footer = $("footer");
    var offset = footer.offset().top + footer.height();
    var win_h = $(window).height();
    if( offset < win_h){
        footer.css({"position":"absolute", "bottom":"0"});
    }
    // start to run when document ready
    $('#myslider0').juicyslider({
        width: '100%',
        height: 350,
        mask : 'none',
        autoplay: 10000,
        shuffle: false,
    });
});