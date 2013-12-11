// JavaScript Document
var checkFaq1=0;
var checkFaq2=0;
var checkFaq3=0;
var checkFaq4=0;
var checkFaq5=0;
var checkFaq6=0;
var checkFaq7=0;
var checkFaq8=0;
var checkFaq9=0;
var openCount=0;

$(function(){
	
$("#faq p").slideUp(0);
	
$("#faq li:eq(0)").click(
		function(){
			if(checkFaq1==0){//開く時のクリック			
				if(openCount==1){//他の何かが開いている
					$("#faq  p").slideUp(500);//閉じる
					checkFlag2=0;
					checkFlag3=0;
					checkFlag4=0;
					checkFlag5=0;
					checkFlag6=0;
					checkFlag7=0;
					checkFlag8=0;
					checkFlag9=0;	
					//開く
					$("#fContents0").slideDown(500);
					checkFaq1=1;
					openCount=1;
					$(".spanRight").css({"-webkit-transition-duration":"1s"});
					$(".spanRight").css({"-webkit-transform":"rotate(0deg)"});
					$(".spanRight").css({"-moz-transition-duration":"1s"});
					$(".spanRight").css({"-moz-transform":"rotate(0deg)"});
					$(this).children(".spanRight").css({"-webkit-transition-duration":"1s"});
					$(this).children(".spanRight").css({"-webkit-transform":"rotate(180deg)"});
					$(this).children(".spanRight").css({"-moz-transition-duration":"1s"});
					$(this).children(".spanRight").css({"-moz-transform":"rotate(180deg)"});	
					//開く
				}else{//他の何かが開いていない
					$("#fContents0").slideDown(500);
					$(this).children(".spanRight").css({"-webkit-transition-duration":"1s"});
					$(this).children(".spanRight").css({"-webkit-transform":"rotate(180deg)"});
					$(this).children(".spanRight").css({"-moz-transition-duration":"1s"});
					$(this).children(".spanRight").css({"-moz-transform":"rotate(180deg)"});
					checkFaq1=1;
					openCount=1;
				}			
			}else{//閉じる時のクリック
				$("#fContents0").slideUp(500);
				checkFaq1=0;	
				$(this).children(".spanRight").css({"-webkit-transition-duration":"1s"});
				$(this).children(".spanRight").css({"-webkit-transform":"rotate(0deg)"});
				$(this).children(".spanRight").css({"-moz-transition-duration":"1s"});
				$(this).children(".spanRight").css({"-moz-transform":"rotate(0deg)"});
			
			}			
});	
$("#faq li:eq(1)").click(
			function(){
				if(checkFaq2==0){//開く時のクリック			
					if(openCount==1){//他の何かが開いている

						$("#faq  p").slideUp(500);//閉じる
						checkFlag1=0;
						checkFlag3=0;
						checkFlag4=0;
						checkFlag5=0;
						checkFlag6=0;
						checkFlag7=0;
						checkFlag8=0;
						checkFlag9=0;	
						//開く
						$("#fContents1").slideDown(500);
							checkFaq2=1;
							openCount=1;
							$(".spanRight").css({"-webkit-transition-duration":"1s"});
							$(".spanRight").css({"-webkit-transform":"rotate(0deg)"});
							$(".spanRight").css({"-moz-transition-duration":"1s"});
							$(".spanRight").css({"-moz-transform":"rotate(0deg)"});
							$(this).children(".spanRight").css({"-webkit-transition-duration":"1s"});
							$(this).children(".spanRight").css({"-webkit-transform":"rotate(180deg)"});
							$(this).children(".spanRight").css({"-moz-transition-duration":"1s"});
							$(this).children(".spanRight").css({"-moz-transform":"rotate(180deg)"});
						}else{//他の何かが開いていない
						$("#fContents1").slideDown(500);
						checkFaq2=1;
						openCount=1;
						$(this).children(".spanRight").css({"-webkit-transition-duration":"1s"});
						$(this).children(".spanRight").css({"-webkit-transform":"rotate(180deg)"});
						$(this).children(".spanRight").css({"-moz-transition-duration":"1s"});
						$(this).children(".spanRight").css({"-moz-transform":"rotate(180deg)"});
					}			
				}else{//閉じる時のクリック
					$("#fContents1").slideUp(500);
					checkFaq2=0;	
					$(this).children(".spanRight").css({"-webkit-transition-duration":"1s"});
					$(this).children(".spanRight").css({"-webkit-transform":"rotate(0deg)"});
					$(this).children(".spanRight").css({"-moz-transition-duration":"1s"});
					$(this).children(".spanRight").css({"-moz-transform":"rotate(0deg)"});
				}			
});	
$("#faq li:eq(2)").click(
			function(){
				if(checkFaq3==0){//開く時のクリック			
					if(openCount==1){//他の何かが開いている
						$("#faq  p").slideUp(500);//閉じる
						checkFlag1=0;
						checkFlag2=0;
						checkFlag4=0;
						checkFlag5=0;
						checkFlag6=0;
						checkFlag7=0;
						checkFlag8=0;
						checkFlag9=0;	
						//開く
						$("#fContents2").slideDown(500);
						checkFaq3=1;
						openCount=1;
						$(".spanRight").css({"-webkit-transition-duration":"1s"});
						$(".spanRight").css({"-webkit-transform":"rotate(0deg)"});
						$(".spanRight").css({"-moz-transition-duration":"1s"});
						$(".spanRight").css({"-moz-transform":"rotate(0deg)"});
						$(this).children(".spanRight").css({"-webkit-transition-duration":"1s"});
						$(this).children(".spanRight").css({"-webkit-transform":"rotate(180deg)"});
						$(this).children(".spanRight").css({"-moz-transition-duration":"1s"});
						$(this).children(".spanRight").css({"-moz-transform":"rotate(180deg)"});
					}else{//他の何かが開いていない
						$("#fContents2").slideDown(500);
						checkFaq3=1;
						openCount=1;
						$(this).children(".spanRight").css({"-webkit-transition-duration":"1s"});
						$(this).children(".spanRight").css({"-webkit-transform":"rotate(180deg)"});
						$(this).children(".spanRight").css({"-moz-transition-duration":"1s"});
						$(this).children(".spanRight").css({"-moz-transform":"rotate(180deg)"});
					}			
				}else{//閉じる時のクリック
					$("#fContents2").slideUp(500);
					checkFaq3=0;	
					$(this).children(".spanRight").css({"-webkit-transition-duration":"1s"});
					$(this).children(".spanRight").css({"-webkit-transform":"rotate(0deg)"});
					$(this).children(".spanRight").css({"-moz-transition-duration":"1s"});
					$(this).children(".spanRight").css({"-moz-transform":"rotate(0deg)"});
				}			
});	
$("#faq li:eq(3)").click(
			function(){
				if(checkFaq4==0){//開く時のクリック			
					if(openCount==1){//他の何かが開いている
						$("#faq  p").slideUp(500);//閉じる
						checkFlag1=0;
						checkFlag2=0;
						checkFlag3=0;
						checkFlag5=0;
						checkFlag6=0;
						checkFlag7=0;
						checkFlag8=0;
						checkFlag9=0;	
						//開く
						$("#fContents3").slideDown(500);
						checkFaq4=1;
						openCount=1;
						$(".spanRight").css({"-webkit-transition-duration":"1s"});
						$(".spanRight").css({"-webkit-transform":"rotate(0deg)"});
						$(".spanRight").css({"-moz-transition-duration":"1s"});
						$(".spanRight").css({"-moz-transform":"rotate(0deg)"});
						$(this).children(".spanRight").css({"-webkit-transition-duration":"1s"});
						$(this).children(".spanRight").css({"-webkit-transform":"rotate(180deg)"});
						$(this).children(".spanRight").css({"-moz-transition-duration":"1s"});
						$(this).children(".spanRight").css({"-moz-transform":"rotate(180deg)"});
					}else{//他の何かが開いていない
						$("#fContents3").slideDown(500);
						checkFaq4=1;
						openCount=1;
						$(this).children(".spanRight").css({"-webkit-transition-duration":"1s"});
						$(this).children(".spanRight").css({"-webkit-transform":"rotate(180deg)"});
						$(this).children(".spanRight").css({"-moz-transition-duration":"1s"});
						$(this).children(".spanRight").css({"-moz-transform":"rotate(180deg)"});
					}			
				}else{//閉じる時のクリック
					$("#fContents3").slideUp(500);
					checkFaq4=0;	
					$(this).children(".spanRight").css({"-webkit-transition-duration":"1s"});
					$(this).children(".spanRight").css({"-webkit-transform":"rotate(0deg)"});
					$(this).children(".spanRight").css({"-moz-transition-duration":"1s"});
					$(this).children(".spanRight").css({"-moz-transform":"rotate(0deg)"});
				}			
});		
		
$("#faq li:eq(4)").click(
			function(){
				if(checkFaq5==0){//開く時のクリック			
					if(openCount==1){//他の何かが開いている
						$("#faq  p").slideUp(500);//閉じる
						checkFlag1=0;
						checkFlag2=0;
						checkFlag3=0;
						checkFlag4=0;
						checkFlag6=0;
						checkFlag7=0;
						checkFlag8=0;
						checkFlag9=0;	
						//開く
						$("#fContents4").slideDown(500);
						checkFaq5=1;
						openCount=1;
						$(".spanRight").css({"-webkit-transition-duration":"1s"});
						$(".spanRight").css({"-webkit-transform":"rotate(0deg)"});
						$(".spanRight").css({"-moz-transition-duration":"1s"});
						$(".spanRight").css({"-moz-transform":"rotate(0deg)"});
						$(this).children(".spanRight").css({"-webkit-transition-duration":"1s"});
						$(this).children(".spanRight").css({"-webkit-transform":"rotate(180deg)"});
						$(this).children(".spanRight").css({"-moz-transition-duration":"1s"});
						$(this).children(".spanRight").css({"-moz-transform":"rotate(180deg)"});
					}else{//他の何かが開いていない
						$("#fContents4").slideDown(500);
						checkFaq5=1;
						openCount=1;
						$(this).children(".spanRight").css({"-webkit-transition-duration":"1s"});
						$(this).children(".spanRight").css({"-webkit-transform":"rotate(180deg)"});
						$(this).children(".spanRight").css({"-moz-transition-duration":"1s"});
						$(this).children(".spanRight").css({"-moz-transform":"rotate(180deg)"});
					}			
				}else{//閉じる時のクリック
					$("#fContents4").slideUp(500);
					checkFaq5=0;	
					$(this).children(".spanRight").css({"-webkit-transition-duration":"1s"});
					$(this).children(".spanRight").css({"-webkit-transform":"rotate(0deg)"});
					$(this).children(".spanRight").css({"-moz-transition-duration":"1s"});
					$(this).children(".spanRight").css({"-moz-transform":"rotate(0deg)"});
				}			
});	
$("#faq li:eq(5)").click(
			function(){
				if(checkFaq6==0){//開く時のクリック			
					if(openCount==1){//他の何かが開いている

						$("#faq  p").slideUp(500);//閉じる
						checkFlag1=0;
						checkFlag2=0;
						checkFlag3=0;
						checkFlag4=0;
						checkFlag5=0;
						checkFlag7=0;
						checkFlag8=0;
						checkFlag9=0;	
						//開く
						$("#fContents5").slideDown(500);
						checkFaq6=1;
						openCount=1;
						$(".spanRight").css({"-webkit-transition-duration":"1s"});
						$(".spanRight").css({"-webkit-transform":"rotate(0deg)"});
						$(".spanRight").css({"-moz-transition-duration":"1s"});
						$(".spanRight").css({"-moz-transform":"rotate(0deg)"});
						$(this).children(".spanRight").css({"-webkit-transition-duration":"1s"});
						$(this).children(".spanRight").css({"-webkit-transform":"rotate(180deg)"});
						$(this).children(".spanRight").css({"-moz-transition-duration":"1s"});
						$(this).children(".spanRight").css({"-moz-transform":"rotate(180deg)"});
					}else{//他の何かが開いていない
						$("#fContents5").slideDown(500);
						checkFaq6=1;
						openCount=1;
					}			
				}
				else{//閉じる時のクリック
						$("#fContents5").slideUp(500);
						checkFaq6=0;	
						$(this).children(".spanRight").css({"-webkit-transition-duration":"1s"});
						$(this).children(".spanRight").css({"-webkit-transform":"rotate(0deg)"});
						$(this).children(".spanRight").css({"-moz-transition-duration":"1s"});
						$(this).children(".spanRight").css({"-moz-transform":"rotate(0deg)"});
				}			
		　});	
		
$("#faq li:eq(6)").click(
			function(){
				if(checkFaq7==0){//開く時のクリック			
					if(openCount==1){//他の何かが開いている

						$("#faq  p").slideUp(500);//閉じる
						checkFlag1=0;
						checkFlag2=0;
						checkFlag3=0;
						checkFlag4=0;
						checkFlag5=0;
						checkFlag6=0;
						checkFlag8=0;
						checkFlag9=0;	
						//開く
						$("#fContents6").slideDown(500);
						checkFaq7=1;
						openCount=1;
						$(".spanRight").css({"-webkit-transition-duration":"1s"});
						$(".spanRight").css({"-webkit-transform":"rotate(0deg)"});
						$(".spanRight").css({"-moz-transition-duration":"1s"});
						$(".spanRight").css({"-moz-transform":"rotate(0deg)"});
						$(this).children(".spanRight").css({"-webkit-transition-duration":"1s"});
						$(this).children(".spanRight").css({"-webkit-transform":"rotate(180deg)"});
						$(this).children(".spanRight").css({"-moz-transition-duration":"1s"});
						$(this).children(".spanRight").css({"-moz-transform":"rotate(180deg)"});
					}else{//他の何かが開いていない
						$("#fContents6").slideDown(500);
						checkFaq7=1;
						openCount=1;
						$(this).children(".spanRight").css({"-webkit-transition-duration":"1s"});
						$(this).children(".spanRight").css({"-webkit-transform":"rotate(180deg)"});
						$(this).children(".spanRight").css({"-moz-transition-duration":"1s"});
						$(this).children(".spanRight").css({"-moz-transform":"rotate(180deg)"});
					}			
				}else{//閉じる時のクリック
					$("#fContents6").slideUp(500);
					checkFaq7=0;	
					$(this).children(".spanRight").css({"-webkit-transition-duration":"1s"});
					$(this).children(".spanRight").css({"-webkit-transform":"rotate(0deg)"});
					$(this).children(".spanRight").css({"-moz-transition-duration":"1s"});
					$(this).children(".spanRight").css({"-moz-transform":"rotate(0deg)"});
				}			
});	
$("#faq li:eq(7)").click(
			function(){
				if(checkFaq8==0){//開く時のクリック			
					if(openCount==1){//他の何かが開いている

						$("#faq  p").slideUp(500);//閉じる
						checkFlag1=0;
						checkFlag2=0;
						checkFlag3=0;
						checkFlag4=0;
						checkFlag5=0;
						checkFlag6=0;
						checkFlag7=0;
						checkFlag9=0;	
						//開く
						$("#fContents7").slideDown(500);
						checkFaq8=1;
						openCount=1;
						$(".spanRight").css({"-webkit-transition-duration":"1s"});
						$(".spanRight").css({"-webkit-transform":"rotate(0deg)"});
						$(".spanRight").css({"-moz-transition-duration":"1s"});
						$(".spanRight").css({"-moz-transform":"rotate(0deg)"});
						$(this).children(".spanRight").css({"-webkit-transition-duration":"1s"});
						$(this).children(".spanRight").css({"-webkit-transform":"rotate(180deg)"});
						$(this).children(".spanRight").css({"-moz-transition-duration":"1s"});
						$(this).children(".spanRight").css({"-moz-transform":"rotate(180deg)"});
					}else{//他の何かが開いていない
						$("#fContents7").slideDown(500);
						checkFaq8=1;
						openCount=1;
						$(this).children(".spanRight").css({"-webkit-transition-duration":"1s"});
						$(this).children(".spanRight").css({"-webkit-transform":"rotate(180deg)"});
						$(this).children(".spanRight").css({"-moz-transition-duration":"1s"});
						$(this).children(".spanRight").css({"-moz-transform":"rotate(180deg)"});
					}			
				}else{//閉じる時のクリック
					$("#fContents7").slideUp(500);
					checkFaq8=0;	
					$(this).children(".spanRight").css({"-webkit-transition-duration":"1s"});
					$(this).children(".spanRight").css({"-webkit-transform":"rotate(0deg)"});
					$(this).children(".spanRight").css({"-moz-transition-duration":"1s"});
					$(this).children(".spanRight").css({"-moz-transform":"rotate(0deg)"});
				}			
});	
$("#faq li:eq(8)").click(
			function(){
				if(checkFaq9==0){//開く時のクリック			
					if(openCount==1){//他の何かが開いている

						$("#faq  p").slideUp(500);//閉じる
						checkFlag1=0;
						checkFlag2=0;
						checkFlag3=0;
						checkFlag4=0;
						checkFlag5=0;
						checkFlag6=0;
						checkFlag7=0;
						checkFlag8=0;
						//開く
						$("#fContents8").slideDown(500);
						checkFaq9=1;
						openCount=1;
						$(".spanRight").css({"-webkit-transition-duration":"1s"});
						$(".spanRight").css({"-webkit-transform":"rotate(0deg)"});
						$(".spanRight").css({"-moz-transition-duration":"1s"});
						$(".spanRight").css({"-moz-transform":"rotate(0deg)"});
						$(this).children(".spanRight").css({"-webkit-transition-duration":"1s"});
						$(this).children(".spanRight").css({"-webkit-transform":"rotate(180deg)"});
						$(this).children(".spanRight").css({"-moz-transition-duration":"1s"});
						$(this).children(".spanRight").css({"-moz-transform":"rotate(180deg)"});
					}else{//他の何かが開いていない
						$("#fContents8").slideDown(500);
						checkFaq9=1;
						openCount=1;
						$(this).children(".spanRight").css({"-webkit-transition-duration":"1s"});
						$(this).children(".spanRight").css({"-webkit-transform":"rotate(180deg)"});
						$(this).children(".spanRight").css({"-moz-transition-duration":"1s"});
						$(this).children(".spanRight").css({"-moz-transform":"rotate(180deg)"});
					}			
				}else{//閉じる時のクリック
					$("#fContents8").slideUp(500);
					checkFaq9=0;	
					$(this).children(".spanRight").css({"-webkit-transition-duration":"1s"});
					$(this).children(".spanRight").css({"-webkit-transform":"rotate(0deg)"});
					$(this).children(".spanRight").css({"-moz-transition-duration":"1s"});
					$(this).children(".spanRight").css({"-moz-transform":"rotate(0deg)"});
				}			
});	

	
});