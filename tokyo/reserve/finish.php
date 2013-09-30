<?php
	$pageTitle="予約を完了しました";
	require_once("../module/reserveHeader.php");

	$finishSql = "UPDATE seat_reserve_list SET reserve_flag=1 WHERE user_id='".$_SESSION["userid"]."' AND show_id='".$_SESSION["showid"]."'";
	$finishResult = mysqli_query($con,$finishSql);

?>

<!-- ここ中身 -->
<div id="content">
<!-- 座席予約ナビゲーション --><!-- 横幅980固定 -->
<div id="finishBox">
<h2>予約を完了しました！</h2><p>予約を完了しました。映画館にて発券の際に予約番号が必要となりますのでメモをお取りください。また、予約番号はMyPageからもご確認いただけます。<br /><span id="yoyakuNumber">予約番号：</span><span id="yoyakuNumberText"><?php print "【予約番号】"; ?></span></p>
<p id="finishBoxLink"><a href="../top/index.php">HALCinema TOPページに戻る</a></p>
</div>
</div>

<?php
	require_once("../module/reserveFooter.php");
?>