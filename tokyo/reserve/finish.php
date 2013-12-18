<?php
	$pageTitle="予約を完了しました";
	require_once("../module/reserveHeader.php");
	$con = getConnection();


	//DBかくのう
	$reserveNumber = uniqid($_SESSION["showid"]);
	$reserveSaveSql = "INSERT INTO reserve_master (reserve_id,user_id,reserve_time,reserve_number,settle_flag) VALUES ('','".$_SESSION["userid"]."','','".$reserveNumber."',1);";
	$reserveSaveResult = mysqli_query($con,$reserveSaveSql);

	//ゆーまさんからいわれたやつ
	$reserveSelectSql = "SELECT * FROM seat_reserve_list WHERE show_id='".$_SESSION["showid"]."' AND user_id='".$_SESSION["userid"]."' AND reserve_flag=0";
	$reserveSelectResult = mysqli_query($con,$reserveSelectSql);


	$priceId = "大人";
	$price = 1500;
	while($reserveSelectRow = mysqli_fetch_array($reserveSelectResult)){
		$seatNumber = $reserveSelectRow["seat_number"];
		var_dump($seatNumber);
		$innerSQL = "INSERT INTO movie_reserve_content VALUE ('','".$reserveNumber."','".$_SESSION["showid"]."','".$seatNumber."','".$priceId."',".$price.")";
		$innerSQLResult = mysqli_query($con,$innerSQL);
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
