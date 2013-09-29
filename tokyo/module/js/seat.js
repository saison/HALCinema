$(function(){
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
