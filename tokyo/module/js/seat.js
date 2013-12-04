$(function(){
	//Block切り替え
	//最初はABlockを表示
	$(".Ablock").show();
	$(".Bblock").hide();

	$(".sertChangeLeft").click(function(){
		$(".Ablock").delay(250).fadeIn(200);
		$(".Bblock").fadeOut(200);
	});
	$(".sertChangeRight").click(function(){
		$(".Bblock").delay(250).fadeIn(200);
		$(".Ablock").fadeOut(200);
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
			var dragIconId = ui.draggable.attr("id");
			var formId = $("#postData #"+dragIconId).attr("id");

			if(dragIconId != formId){
				$("#postData").append("<input type='hidden' name='seat[]' id='"+ seatId +"_"+ dragClass +"' value='"+ seatId +"_"+ dragClass +"' />");
			}
		},
		out:function(event, ui){
			var dragId = ui.draggable.attr("id");
			$("#postData #"+dragId).remove();
		}
	});
	$(".dragIcon").draggable({
		opacity:"0.5",
		revert:"invalid",
		helper:"clone"
	});
});
