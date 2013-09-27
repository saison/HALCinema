<div id="nav"></div>
<!-- 座席予約ナビゲーション --><!-- 横幅980固定 -->
<div class="reserveTitle">
  <h3>座席を選択してください</h3>
</div>
<div id="movieInfo"><!-- 映画情報 -->
  <table>
    <tr>
      <th>選択されている映画</th>
    </tr>
    <tr>
      <td>劇場</td>
      <td>HALCinema TOKYO</td>
    </tr>
    <tr>
      <td>日時</td>
      <td>2013年9月26日(木) 19:10~21:00</td>
    </tr>
    <tr>
      <td>作品</td>
      <td>エリジウム</td>
    </tr>
  </table>
</div>
<div id="sertChoice"><!-- シートブロック・種類選択 200px-->
  <div id="serBlock"><!-- ブロック指定 --> 
    
  </div>
  <div id="sertEachChoice"><!-- シート選択指定 --> 
  </div>
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
</div>
<div class="clear"></div>
<div class="reserveTitle">
  <h3>利用規約</h3>
</div>
<div id="kiyaku"></div>
<!-- 利用規約 -テキストエリア表示 -->
<div class="sertDecideButton"></div>
<!-- 映画選択完了ボタン--> 

<!--この先飲食物選択 -->

<div class="reserveTitle">
  <h3>飲み物･食べ物</h3>
</div>
<div id="sertDrink"></div>
<!-- 飲み物 470px m-r 40px -->
<div id="sertFood"></div>
<!-- 飲み物 470px -->
<div class="clear"></div>
<div class="sertDecideButton"></div>
<!-- 映画選択完了ボタン（上のボタンと一緒）-->