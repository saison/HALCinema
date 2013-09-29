$(function(){

	//Block切り替え
	//最初はABlockを表示
	$("#ABlockSeat").show();
	$("#BBlockSeat,#CBlockSeat,#DBlockSeat").hide();

	$("#ablock").click(function(){
		$("#ABlockSeat").delay(250).fadeIn(200);
		$("#BBlockSeat,#CBlockSeat,#DBlockSeat").fadeOut(200);
	});
	$("#bblock").click(function(){
		$("#BBlockSeat").delay(250).fadeIn(200);
		$("#ABlockSeat,#CBlockSeat,#DBlockSeat").fadeOut(200);
	});
	$("#cblock").click(function(){
		$("#CBlockSeat").delay(250).fadeIn(200);
		$("#BBlockSeat,#ABlockSeat,#DBlockSeat").fadeOut(200);
	});
	$("#dblock").click(function(){
		$("#DBlockSeat").delay(250).fadeIn(200);
		$("#BBlockSeat,#CBlockSeat,#ABlockSeat").fadeOut(200);
	});



	//ドラッグアンドドロップの設定
	$(".setEachChoiceContent").droppable({
		tolerance:"fit",
	});
	$(".seat").droppable({
		drop:function(event, ui){
			var seatId = $(this).attr("id");
			var dragClass = ui.draggable.parent().parent().attr("id");
			ui.draggable.attr("id",seatId+"_"+dragClass);
			$("#postData").append("<input type='hidden' id='"+ seatId +"_"+ dragClass +"' value='"+ seatId +"_"+ dragClass +"' />");
		},
		out:function(event, ui){
			var dragId = ui.draggable.attr("id");
			$("#postData #"+dragId).remove();
		}
	});
	$(".dragIcon").draggable({
		opacity:"0.5",
		revert:"invalid"
	});
});
