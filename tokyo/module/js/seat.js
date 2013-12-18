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
		hoverClass:"activeHover"
	});

	$(".seat").droppable({
		drop:function(event, ui){
		//	var seatId = $(this).attr("id");
		//	var dragClass = ui.draggable.attr("id");
		//	ui.draggable.attr("id",seatId+"_"+dragClass);
		//	var dragIconId = ui.draggable.attr("id");
					


			//シートの番号を取得
			var seatId = $(this).attr("id");
			//種別を取得
			var assortId = ui.draggable.attr("id");

			//formに渡す値を作成
			//ex : a-1_adult
			var formValue = seatId + "_" + assortId;

			//formに追加する値のID
			var formId = "#postData #" + formValue;
			
			var clone = ui.draggable.clone();

			//ドロップされた際にオブジェクトにカスタムデータを付与
			ui.draggable.attr("data-seat",formValue);
			clone.attr("data-seat",formValue);

			var cloneFlg = clone.data("flg");
			if (cloneFlg) {
				clone.attr("data-flg",false).addClass("cloneIcon");
				clone.appendTo(this);
			} else {
				ui.draggable.appendTo(this);
			}
			
			
			//$("#"+seatId).append("<br /><img class='dragIcon' src='images/" + dragClass + "Image.png'>");

			
			$(".cloneIcon").draggable({
				opacity:"0.5",
				revert:"invalid"
			}).css({"top":"0","left":"0"});
		
			
			//form内にデータを挿入
			var postDataId = $("#postData");
			$(".cloneIcon").each(function(){
				var seatValue = $(this).attr("data-seat");
				var seatNum = seatValue.split("_");
				postDataId.append("<input type='hidden' name='seat[]' id='"+ seatValue +"' value='"+ seatValue +"' />");
			});
			

			//	//カスタムデータを取得
			//	var custamData = clone.data("seat");
			//	if(custamData != formId){
			//		$("#postData").append("<input type='hidden' name='seat[]' id='"+ formValue +"' value='"+ formValue +"' />");
			//	}
			//
		},
		out:function(event, ui){
			
			//form内全件取得
			$("#postData input[type = hidden]").each(function(){
				$("#"+$(this).attr("id")).remove();
			});
			



			//	//data-seatを取得
			//	var removeValue = ui.draggable.clone().data("seat");
			//	var removeValueOrigin = firstId;
			//	
			//	//data-seatにnotsetを設定
			//	ui.draggable.attr("data-seat","notset");

			//	//削除するpostのIDを設定
			//	//ex) #postData #a-5_adult
			//	var formId = "#postData #" + removeValue;
			//	var originId = "#postData #" + removeValueOrigin;

			//	//remove
			//	$(formId).remove();
			//	$(originId).remove();
			
			//	//debug用
			//	console.log(firstId);
			//	console.log(removeValueOrigin);
			//	console.log(removeValue);
			//	console.log(formId);
		}
	});
	$(".dragIcon").draggable({
			opacity:"0.5",
			revert:"invalid",
			helper:"clone"
	});
});
