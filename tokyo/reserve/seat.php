<?php

	$showID = $_GET["id"];

	if(!(isset($showID))){
		header("Location:../movie/movie.php");
		return;
	}
	$pageTitle="座席選択&amp;フード･ドリンク選択";
	require_once("../module/reserveHeader.php");

	if(!(isset($_SESSION["userid"]))){
		$loginGet="Location:../mypage/login.php?sid=".$showID;
		header($loginGet);
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
<div id="content100">
  <div class="reserveTitle">
    <h3>座席を選択してください</h3>
  </div>

  <div id="sertChoice"><!-- シートブロック・種類選択 200px-->
  <div id="sertEachChoiceMenu"><img src="images/menuOpen.png" alt="Menuを表示する" /></div>
			<div id="sertChoiceBox">
  <div id="movieInfo"><!-- 映画情報 -->
    <h4>選択映画情報</h4>
    <div class="setEachChoiceContent">
    <h5></h5>
    </div>


    <table>
      <tr>
        <td class="movieInfoTitle">日時</td></tr><tr>
        <td><?php echo $screenDay["year"]."年".$screenDay["month"]."月".$screenDay["day"]."日 ".$screenDay["hour"]."：".$screenDay["minute"]."~"; ?></td></tr><tr>
        <td class="movieInfoTitle">映画</td></tr><tr>
        <td><?php echo $reserveSelectRow["movieName"]; ?></td>
      </tr>
    </table>
  </div>
  <h4>座席選択</h4>
    <div id="sertEachChoice"><!-- シート選択指定 --><!-- 人形は増やしてちょうだい！ -->
      <div class="setEachChoiceContent">
        <h5>大人</h5>
        <ul id="adult">
          <li><img class="dragIcon" src="images/adultImage.png"></li>
          <li><img class="dragIcon" src="images/adultImage.png"></li>
          <li><img class="dragIcon" src="images/adultImage.png"></li>
          <li><img class="dragIcon" src="images/adultImage.png"></li>
          <li><img class="dragIcon" src="images/adultImage.png"></li>
        </ul>
      </div>
      <div class="setEachChoiceContent">
        <h5>学生</h5>
        <ul id="student">
          <li><img class="dragIcon" src="images/studentImage.png"></li>
          <li><img class="dragIcon" src="images/studentImage.png"></li>
          <li><img class="dragIcon" src="images/studentImage.png"></li>
          <li><img class="dragIcon" src="images/studentImage.png"></li>
          <li><img class="dragIcon" src="images/studentImage.png"></li>
        </ul>
      </div>
      <!--  シニアは映画日時を取得して表示（DB接続） -->
      <div class="setEachChoiceContent">
        <h5>シニア</h5>
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
			</div>
	<?php
		if(substr($screenID,-1,1) > "6"){
			require_once("./screenTokyo/SC.php");
		}elseif(substr($screenID,-1,1) > "3"){
			require_once("./screenTokyo/SB.php");
		}else{
			require_once("./screenTokyo/SA.php");
		}
	?>

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
