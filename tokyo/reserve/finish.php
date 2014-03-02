<?php
	$pageTitle="予約を完了しました";
	require_once("../module/reserveHeader.php");
	$con = getConnection();
	//日付取得
	$todayDate=date("Y-m-d");
	//現在の時間
	$nowTime=date("H:i");

	//DB格納
	$reserveNumber = uniqid($_SESSION["showid"]);
	$reserveSaveSql = "INSERT INTO reserve_master (reserve_id,user_id,reserve_time,reserve_number,settle_flag) VALUES ('','".$_SESSION["userid"]."','".$todayDate."  ". $nowTime ."','".$reserveNumber."',1);";
	$reserveSaveResult = mysqli_query($con,$reserveSaveSql);
	
	
	//今回予約する座席ひとつひとつを movie_reserve_contentに書き込みます。
	foreach ($_SESSION['reserveSeat'] as $value){
		
		$reserveValue = array();
		$reserveValue = explode('_',$value);
		$reserveSeatNum = $reserveValue[0];//予約のシート番号
		
		//seat_reserve_listとmovie_price_masterを結合。show_idと今回予約した座席をもとに$priceIdと$priceをとる
		$reserveSelectSql ="SELECT seat_reserve_list.movie_price_id, movie_price_master.movie_price FROM seat_reserve_list INNER JOIN movie_price_master ON seat_reserve_list.movie_price_id = movie_price_master.movie_price_id WHERE seat_reserve_list.show_id = '{$_SESSION["showid"]}' AND seat_reserve_list.seat_number = '{$reserveSeatNum}'";	
		$reserveSelectResult = mysqli_query($con,$reserveSelectSql);	
		$rowReserveSelectResult = mysqli_fetch_array($reserveSelectResult);
		
		//movie_reserve_contentに書き込み
		$insertSql = "INSERT INTO movie_reserve_content VALUE ('','".$reserveNumber."','".$_SESSION["showid"]."','".$reserveSeatNum."','".$rowReserveSelectResult[0]."',".$rowReserveSelectResult[1].")";
		$insertSqlResult = mysqli_query($con,$insertSql);
			
	}
	
	//フラグ変更
	$finishSql = "UPDATE seat_reserve_list SET reserve_flag=1 WHERE user_id='".$_SESSION["userid"]."' AND show_id='".$_SESSION["showid"]."'";
	$finishResult = mysqli_query($con,$finishSql);
?>

<!-- ここ中身 -->
<div id="content">
<!-- 座席予約ナビゲーション --><!-- 横幅980固定 -->
<div id="finishBox">
<h2>予約を完了しました！</h2><p>予約を完了しました。映画館にて発券の際に予約番号が必要となりますのでメモをお取りください。また、予約番号はMyPageからもご確認いただけます。<br /><span id="yoyakuNumber">予約番号：</span><span id="yoyakuNumberText"><?php print $reserveNumber; ?></span></p>
<p id="finishBoxLink"><a href="../top/index.php">HALCinema TOPページに戻る</a></p>
</div>
</div>

<?php
	require_once("../module/reserveFooter.php");
?>
