<?php
	$pageTitle="座席選択&amp;フード･ドリンク選択";
	require_once("../module/reserveHeader.php");
?>
<div id="nav"></div>
<div id="content">
<!-- 座席予約ナビゲーション --><!-- 横幅980固定 -->

<div id="movieInfo"><!-- 映画情報 -->
  <table>
    <tr>
      <td><img src="images/selectTheatre.png" alt="劇場"></td>
      <td>HALCinema TOKYO</td>
      <td><img src="images/selectDay.png" alt="劇場"></td>
      <td>2013年9月26日(木) 19:10~21:00</td>
      <td><img src="images/selectWork.png" alt="劇場"></td>
      <td>エリジウム</td>
    </tr>
  </table>
</div>
<div class="reserveTitle">
  <h3>座席を選択してください</h3>
</div>
<div id="sertChoice"><!-- シートブロック・種類選択 200px-->
  <div id="serBlock"><!-- ブロック指定 --> 
    ここブロック
    
  </div>
  <p class="blockTyui">Aブロック･･･左前　Bブロック･･･右前<br />Cブロック･･･左後　Dブロック･･･右後</p>
  <div id="sertEachChoice"><!-- シート選択指定 --> 
  <div class="sertEachChoiceTitle"><p>大人</p></div>
  <div class="setEachChoiceContent">ここに人</div>
  <div class="sertEachChoiceTitle"><p>学生</p></div>
  <div class="setEachChoiceContent">ここに人</div>
  <!--  シニアは映画日時を取得して表示（DB接続） -->
  <div class="sertEachChoiceTitle"><p>シニア</p></div>
  <div class="setEachChoiceContent">ここに人</div>
  </div>
    <p class="blockTyui">各料金タイプ内の人形を選択したい座席にドラック&ドロップしてください</p>
</div>
<div id="sertArrange"><!-- シート配置 floatでレフト 780px -->
  <?php
//この先座席表示。tableを使って表示。
//ScreenIDは映画詳細からクエリー文字列で持ってくる←$_GET["screenId"]
//ScreenIDをもとにDBからSELECT。この時に座席種別も得る。
//ペアシートの時はtdを結合で対応。
//<td class="空席チェック(空席と予約されているところで変える）" id="座席番号(A-5 etc.)" >
//


?>
ここシート
</div>
<div class="clear"></div>
<div class="reserveTitle">
  <h3>利用規約</h3>
</div>
<div id="kiyaku">
	ここに利用規約
</div>
<!-- 利用規約 -テキストエリア表示 -->
<div class="sertDecideButton">
<form>
<input type="image" src="images/setButton.png" alt="送信する">
</form></div>
<!-- 映画選択完了ボタン--> 

<!--この先飲食物選択。プロトタイプでは未実装 -->
<!--
<div class="reserveTitle">
  <h3>飲み物･食べ物</h3>
</div>

<div id="sertDrink"></div>-->
<!-- 飲み物 470px m-r 40px -->
<!--
<div id="sertFood"></div>
-->
<!-- 飲み物 470px -->
<!--
<div class="clear"></div>
<div class="sertDecideButton"></div>-->
<!-- 映画選択完了ボタン（上のボタンと一緒）-->
<!--
</div>
-->
<?php
	require_once("../module/footer.php");
?>