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

  $(".pear1").droppable({
    accept : "#pear1"
  });

  $(".pear2").droppable({
    accept : "#pear2"
  });

  $(".seat").droppable({
    accept : "#adult, #student, #senior",
  });


  $(".seat,.pearSeat").droppable({
    drop:function(event, ui){

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


      $(".cloneIcon").draggable({
        opacity:"0.5",
        revert:"invalid"
      }).css({"top":"0","left":"0"});


      var dropCount = 0;

      //form内にデータを挿入
      var postDataId = $("#postData");
      $(".cloneIcon").each(function(){
        var seatValue = $(this).attr("data-seat");
        var seatNum = seatValue.split("_");
        postDataId.append("<input type='hidden' name='seat[]' id='"+ seatValue +"' value='"+ seatValue +"' />");
        dropCount++;
      });

      //ダブルクリックすると消える
      $(".cloneIcon").dblclick(function(){
        $(this).fadeOut(200,function(){
          $(this).remove();
          $("#postData #"+$(this).attr("data-seat")).remove();
          dropCount--;
          var notDrag = $(".setEachChoiceContent, #sertEachChoice h5");
          if (dropCount == 5){
            notDrag.fadeOut(200);
          } else {
            notDrag.fadeIn(200);
          }
        });
      });

      var notDrag = $(".setEachChoiceContent, #sertEachChoice h5");
      if (dropCount == 5){
        notDrag.fadeOut(200);
      } else {
        notDrag.fadeIn(200);
      }
    },
    out:function(event, ui){

      //form内全件削除
      $("#postData input[type = hidden]").each(function(){
        $("#"+$(this).attr("id")).remove();
        console.log($(this).attr("id"));
      });

    }
  });
  $(".dragIcon").draggable({
    opacity:"0.5",
    revert:"invalid",
    helper:"clone",
    drag: function(event, ui) {
      //form内全件削除
      $("#postData input[type = hidden]").each(function(){
        $("#"+$(this).attr("id")).remove();
        console.log($(this).attr("id"));
      });

    }
  });
});
