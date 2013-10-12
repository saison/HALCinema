<?php

	$showID = $_GET["id"];

	if(!(isset($showID))){
		header("Location:../movie/movie.php");
		return;
	}
	$pageTitle="座席選択&amp;フード･ドリンク選択";
	require_once("../module/reserveHeader.php");

	if(!(isset($_SESSION["userid"]))){
		header("Location:../mypage/login.php");
		return;
	}
	$_SESSION["showid"] = $showID;

	$con = getConnection();
	$reserveSelectSql = "SELECT show_schedule.show_id AS showID , show_schedule.screen_id AS SID , show_schedule.show_day AS showDay , show_schedule.start_time AS startTime , cinema_master.cinema_name AS movieName FROM show_schedule INNER JOIN cinema_master ON show_schedule.cinema_id=cinema_master.cinema_id WHERE show_schedule.show_id='".$showID."'";
	$reserveSelectResult = mysqli_query($con,$reserveSelectSql);
	$reserveSelectRow = mysqli_fetch_array($reserveSelectResult);
	$dateAndTime=$reserveSelectRow["showDay"]." ".$reserveSelectRow["startTime"];
	$screenDay=date_parse($dateAndTime);
	$screenID=$reserveSelectRow["SID"];
	$screenSelectSql = "SELECT * FROM screen_master WHERE screen_id='".$screenID."'";
	$screenSelectResult = mysqli_query($con,$screenSelectSql);
	$screenSelect = mysqli_fetch_array($screenSelectResult);
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
      <td><?php echo $screenDay["year"]."年".$screenDay["month"]."月".$screenDay["day"]."日 ".$screenDay["hour"]."：".$screenDay["minute"]."~"; ?></td>
      <td><img src="images/selectWork.png" alt="劇場"></td>
      <td><?php echo $reserveSelectRow["movieName"]; ?></td>
    </tr>
  </table>
</div>
<div class="reserveTitle">
  <h3>座席を選択してください</h3>
</div>
<div id="sertChoice"><!-- シートブロック・種類選択 200px-->
  <div id="sertBlock"><!-- ブロック指定 -->
    <nav>
      <ul>
        <!-- 各リストクリックでjqueryで表示するdivを変える -->
        <li id="ablock"><img src="images/ablock.png" alt="Aブロック"></li>
        <li id="bblock"><img src="images/bblock.png" alt="Bブロック"></li>
        <li id="cblock"><img src="images/cblock.png" alt="Cブロック"></li>
        <li id="dblock"><img src="images/dblock.png" alt="Dブロック"></li>
        <div class="clear"></div>
      </ul>
    </nav>
  </div>
  <p class="blockTyui">Aブロック･･･左前　Bブロック･･･右前<br />
    Cブロック･･･左後　Dブロック･･･右後</p>
  <div id="sertEachChoice"><!-- シート選択指定 --><!-- 人形は増やしてちょうだい！ -->
    <div class="sertEachChoiceTitle">
      <p>大人</p>
    </div>
    <div class="setEachChoiceContent">
    	<ul id="adult">
       		<li><img class="dragIcon" src="images/adultImage.png"></li>
     		<li><img class="dragIcon" src="images/adultImage.png"></li>
    		<li><img class="dragIcon" src="images/adultImage.png"></li>
    		<li><img class="dragIcon" src="images/adultImage.png"></li>
       		<li><img class="dragIcon" src="images/adultImage.png"></li>
    	</ul>
    </div>
    <div class="sertEachChoiceTitle">
      <p>学生</p>
    </div>
    <div class="setEachChoiceContent">
	    <ul id="student">
			<li><img class="dragIcon" src="images/studentImage.png"></li>
			<li><img class="dragIcon" src="images/studentImage.png"></li>
			<li><img class="dragIcon" src="images/studentImage.png"></li>
			<li><img class="dragIcon" src="images/studentImage.png"></li>
			<li><img class="dragIcon" src="images/studentImage.png"></li>
	    </ul>
    </div>
    <!--  シニアは映画日時を取得して表示（DB接続） -->
    <div class="sertEachChoiceTitle">
      <p>シニア</p>
    </div>
	<div class="setEachChoiceContent">
		<ul id="senior">
			<li><img class="dragIcon" src="images/seniorImage.png"></li>
			<li><img class="dragIcon" src="images/seniorImage.png"></li>
			<li><img class="dragIcon" src="images/seniorImage.png"></li>
			<li><img class="dragIcon" src="images/seniorImage.png"></li>
			<li><img class="dragIcon" src="images/seniorImage.png"></li>
		</ul>
	</div>
  </div>
  <p class="blockTyui">各料金タイプ内の人形を選択したい座席にドラック&amp;ドロップしてください</p>
</div>
<div id="sertArrange"><!-- シート配置 floatでレフト 780px -->
  <?php
//この先座席表示。tableを使って表示。
//ScreenIDは映画詳細からクエリー文字列で持ってくる←$_GET["screenId"]
//ScreenIDをもとにDBからSELECT。この時に座席種別も得る。
//ペアシートの時はtdを結合で対応。
//<td class="空席チェック(空席と予約されているところで変える）" id="座席番号(A-5 etc.)" >
//
	$seatMax=array();
	$seatA=0;
	echo "<p id='sertTableTitle'>Screen".$screenSelect["screen_number"]."</p>\n";
	$seatSelectSql = "SELECT * FROM seat_list WHERE screen_id='".$screenSelect["screen_number"]."' ORDER BY sheet_number ASC";
	$seatSelectResult = mysqli_query($con,$seatSelectSql);
	while(($seatSelectRow = mysqli_fetch_array($seatSelectResult))  != false ){
		$seatDivision=trim($seatSelectRow["sheet_number"]);
		$seatDivision=explode("-",$seatDivision)."<br />";
		//print $seatDivision[0]."-".$seatDivision[1]."<br />";
		switch($seatDivision[0]){
			case "A":
				if($seatA<$seatDivision[1]){
					$seatA=$seatDivision[1];
				}
				break;
		}
	}
	print $seatA;
?>




<table id="ABlockSeat">
<caption><span class="captionBig">A</span>Block</caption>
	<tr>
		<td id="a-1" class="seat"></td>
		<td id="a-2" class="seat"></td>
		<td id="a-3" class="seat"></td>
		<td id="a-4" class="seat"></td>
		<td id="a-5" class="seat"></td>
		<td id="a-6" class="seat"></td>
		<td id="a-7" class="seat"></td>
		<td id="a-8" class="seat"></td>
		<td id="a-9" class="seat"></td>
		<td id="a-10" class="seat"></td>
	</tr>
	<tr>
		<td id="b-1" class="seat"></td>
		<td id="b-2" class="seat"></td>
		<td id="b-3" class="seat"></td>
		<td id="b-4" class="seat"></td>
		<td id="b-5" class="seat"></td>
		<td id="b-6" class="seat"></td>
		<td id="b-7" class="seat"></td>
		<td id="b-8" class="seat"></td>
		<td id="b-9" class="seat"></td>
		<td id="b-10" class="seat"></td>
	</tr>
	<tr>
		<td id="c-1" class="seat"></td>
		<td id="c-2" class="seat"></td>
		<td id="c-3" class="seat"></td>
		<td id="c-4" class="seat"></td>
		<td id="c-5" class="seat"></td>
		<td id="c-6" class="seat"></td>
		<td id="c-7" class="seat"></td>
		<td id="c-8" class="seat"></td>
		<td id="c-9" class="seat"></td>
		<td id="c-10" class="seat"></td>
	</tr>
	<tr>
		<td id="d-1" class="seat"></td>
		<td id="d-2" class="seat"></td>
		<td id="d-3" class="seat"></td>
		<td id="d-4" class="seat"></td>
		<td id="d-5" class="seat"></td>
		<td id="d-6" class="seat"></td>
		<td id="d-7" class="seat"></td>
		<td id="d-8" class="seat"></td>
		<td id="d-9" class="seat"></td>
		<td id="d-10" class="seat"></td>
	</tr>
</table>


<table id="BBlockSeat">
<caption><span class="captionBig">B</span>Block</caption>
	<tr>
		<td id="a-1" class="seat"></td>
		<td id="a-2" class="seat"></td>
		<td id="a-3" class="seat"></td>
		<td id="a-4" class="seat"></td>
		<td id="a-5" class="seat"></td>
		<td id="a-6" class="seat"></td>
		<td id="a-7" class="seat"></td>
		<td id="a-8" class="seat"></td>
		<td id="a-9" class="seat"></td>
		<td id="a-10" class="seat"></td>
	</tr>
	<tr>
		<td id="b-1" class="seat"></td>
		<td id="b-2" class="seat"></td>
		<td id="b-3" class="seat"></td>
		<td id="b-4" class="seat"></td>
		<td id="b-5" class="seat"></td>
		<td id="b-6" class="seat"></td>
		<td id="b-7" class="seat"></td>
		<td id="b-8" class="seat"></td>
		<td id="b-9" class="seat"></td>
		<td id="b-10" class="seat"></td>
	</tr>
	<tr>
		<td id="c-1" class="seat"></td>
		<td id="c-2" class="seat"></td>
		<td id="c-3" class="seat"></td>
		<td id="c-4" class="seat"></td>
		<td id="c-5" class="seat"></td>
		<td id="c-6" class="seat"></td>
		<td id="c-7" class="seat"></td>
		<td id="c-8" class="seat"></td>
		<td id="c-9" class="seat"></td>
		<td id="c-10" class="seat"></td>
	</tr>
	<tr>
		<td id="d-1" class="seat"></td>
		<td id="d-2" class="seat"></td>
		<td id="d-3" class="seat"></td>
		<td id="d-4" class="seat"></td>
		<td id="d-5" class="seat"></td>
		<td id="d-6" class="seat"></td>
		<td id="d-7" class="seat"></td>
		<td id="d-8" class="seat"></td>
		<td id="d-9" class="seat"></td>
		<td id="d-10" class="seat"></td>
	</tr>
</table>

<table id="CBlockSeat">
<caption><span class="captionBig">C</span>Block</caption>
	<tr>
		<td id="a-1" class="seat"></td>
		<td id="a-2" class="seat"></td>
		<td id="a-3" class="seat"></td>
		<td id="a-4" class="seat"></td>
		<td id="a-5" class="seat"></td>
		<td id="a-6" class="seat"></td>
		<td id="a-7" class="seat"></td>
		<td id="a-8" class="seat"></td>
		<td id="a-9" class="seat"></td>
		<td id="a-10" class="seat"></td>
	</tr>
	<tr>
		<td id="b-1" class="seat"></td>
		<td id="b-2" class="seat"></td>
		<td id="b-3" class="seat"></td>
		<td id="b-4" class="seat"></td>
		<td id="b-5" class="seat"></td>
		<td id="b-6" class="seat"></td>
		<td id="b-7" class="seat"></td>
		<td id="b-8" class="seat"></td>
		<td id="b-9" class="seat"></td>
		<td id="b-10" class="seat"></td>
	</tr>
	<tr>
		<td id="c-1" class="seat"></td>
		<td id="c-2" class="seat"></td>
		<td id="c-3" class="seat"></td>
		<td id="c-4" class="seat"></td>
		<td id="c-5" class="seat"></td>
		<td id="c-6" class="seat"></td>
		<td id="c-7" class="seat"></td>
		<td id="c-8" class="seat"></td>
		<td id="c-9" class="seat"></td>
		<td id="c-10" class="seat"></td>
	</tr>
	<tr>
		<td id="d-1" class="seat"></td>
		<td id="d-2" class="seat"></td>
		<td id="d-3" class="seat"></td>
		<td id="d-4" class="seat"></td>
		<td id="d-5" class="seat"></td>
		<td id="d-6" class="seat"></td>
		<td id="d-7" class="seat"></td>
		<td id="d-8" class="seat"></td>
		<td id="d-9" class="seat"></td>
		<td id="d-10" class="seat"></td>
	</tr>
</table>

<table id="DBlockSeat">
<caption><span class="captionBig">D</span>Block</caption>
	<tr>
		<td id="a-1" class="seat"></td>
		<td id="a-2" class="seat"></td>
		<td id="a-3" class="seat"></td>
		<td id="a-4" class="seat"></td>
		<td id="a-5" class="seat"></td>
		<td id="a-6" class="seat"></td>
		<td id="a-7" class="seat"></td>
		<td id="a-8" class="seat"></td>
		<td id="a-9" class="seat"></td>
		<td id="a-10" class="seat"></td>
	</tr>
	<tr>
		<td id="b-1" class="seat"></td>
		<td id="b-2" class="seat"></td>
		<td id="b-3" class="seat"></td>
		<td id="b-4" class="seat"></td>
		<td id="b-5" class="seat"></td>
		<td id="b-6" class="seat"></td>
		<td id="b-7" class="seat"></td>
		<td id="b-8" class="seat"></td>
		<td id="b-9" class="seat"></td>
		<td id="b-10" class="seat"></td>
	</tr>
	<tr>
		<td id="c-1" class="seat"></td>
		<td id="c-2" class="seat"></td>
		<td id="c-3" class="seat"></td>
		<td id="c-4" class="seat"></td>
		<td id="c-5" class="seat"></td>
		<td id="c-6" class="seat"></td>
		<td id="c-7" class="seat"></td>
		<td id="c-8" class="seat"></td>
		<td id="c-9" class="seat"></td>
		<td id="c-10" class="seat"></td>
	</tr>
	<tr>
		<td id="d-1" class="seat"></td>
		<td id="d-2" class="seat"></td>
		<td id="d-3" class="seat"></td>
		<td id="d-4" class="seat"></td>
		<td id="d-5" class="seat"></td>
		<td id="d-6" class="seat"></td>
		<td id="d-7" class="seat"></td>
		<td id="d-8" class="seat"></td>
		<td id="d-9" class="seat"></td>
		<td id="d-10" class="seat"></td>
	</tr>
</table>






</div>
<div class="clear"></div>
<div class="reserveTitle">
  <h3>利用規約</h3>
</div>
<div id="kiyaku"> ここに利用規約 </div>
<!-- 利用規約 -テキストエリア表示 -->
<div class="sertDecideButton">
	<form action="proposedReserve.php" method="post" id="postData">
	    <input name="send" id="sendButton" type="submit" value="送信する">
	</form>
</div>
</div>
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
	require_once("../module/reserveFooter.php");
?>
