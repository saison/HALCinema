<?php
	$pageTitle="確認";
	require_once("../module/reserveHeader.php");
	
	if(!(isset($_SESSION["userid"]))){
		header("Location:../mypage/login.php");
		return;
	}

	$showid = $_SESSION["showid"];
	$con = getConnection();

	$selectSql = "SELECT show_schedule.show_id as 上映ID,show_schedule.screen_id as ScreenID,show_schedule.start_time as 上映開始時間,show_schedule.show_day as 上映日,cinema_master.cinema_name AS 映画名 FROM show_schedule INNER JOIN cinema_master ON show_schedule.cinema_id=cinema_master.cinema_id WHERE  show_schedule.show_id='{$showid}';";
	$selectResult = mysqli_query($con,$selectSql);
	$movieRow = mysqli_fetch_array($selectResult);

	$reservSql = "SELECT  seat_number, movie_price_id FROM seat_reserve_list WHERE show_id = '".$showid."' AND user_id = '".$_SESSION["userid"]."' AND reserve_flag = '0'";
	$reserveResult = mysqli_query($con,$reservSql);

?>

<!-- ここ中身 -->
<div id="content">
<!-- 座席予約ナビゲーション --><!-- 横幅980固定 -->
<div class="reserveTitle">
  <h3>以下の内容でよろしいですか？</h3>
</div>
<div class="confirmTable">
<h4>映画情報</h4>
<table>
<tr>
<th>劇場</th>
<td>HALCinema TOKYO</td>
</tr>
<tr>
<th>作品･日時</th>
<td><?php echo $movieRow["映画名"];?></td>
</tr>
</table>
</div>

<div class="confirmTable">
<h4>座席</h4>
<table>
<tr>
<th>座席</th>
<td>
<?php
	$adultCount = 0;
	$studentCount = 0;
	$seniorCount = 0;
	while($reserveRow = mysqli_fetch_array($reserveResult)){
		echo $reserveRow["seat_number"].",";
		$priceId = $reserveRow["movie_price_id"];
		switch($priceId){
			case '0':
				$adultCount++;
				break;
			case '1':
				$studentCount++;
				break;
			case '2':
				$seniorCount++;
				break;
		}
	}
?>
</td>
</tr>
<tr>
<th>購入枚数</th>
<td>
<?php
	echo "大人×{$adultCount},学生×{$studentCount},シニア{$seniorCount}";
?>
</td>
</tr>
</table>
</div>

<div class="confirmTable">
<h4>決済</h4>
<table>
<tr>
<th>決済方法</th>
<td><?php echo $_POST["sendConfirm"]; ?></td>
</tr>
<tr>
<th>金額</th>
<td>
<?php
	$priceSql = "SELECT movie_price_name,movie_price FROM movie_price_master";
	$priceResult = mysqli_query($con,$priceSql);
	$price = 0;
	while($priceRow = mysqli_fetch_array($priceResult)){
		switch($priceRow["movie_price_name"]){
			case "基本料金":
				$price += $priceRow["movie_price"] * $adultCount;
				break;
			case "子ども":
				$price += $priceRow["movie_price"] * $studentCount;
				break;
			case "シルバーデー":
				$price += $priceRow["movie_price"] * $seniorCount;
				break;
		}
	}

	echo("¥".$price);

?>
</td>
</tr>
</table>
</div>
<?PHP
	$userSql = "SELECT * FROM user_master WHERE user_id='".$_SESSION["userid"]."'";
	$userResult = mysqli_query($con,$userSql);
	$userRow = mysqli_fetch_array($userResult);
?>
<div class="confirmTable">
<h4>お客様情報</h4>
<table>
<tr>
<th>名前</th>
<td><?php echo $userRow["family_name"].$userRow["first_name"]; ?></td>
</tr>
<tr>
<th>生年月日</th>
<td><?php echo $userRow["birthday"]; ?></td>
</tr>
<tr>
<th>電話番号</th>
<td><?php echo $userRow["user_tel"]; ?></td>
</tr>
<tr>
<th>メールアドレス</th>
<td><?php echo $userRow["user_mail"]; ?></td>
</tr>
</table>
</div>

<div id="yoyakuBack"><form><input type="image" src="images/yoyakuBack.png" alt="送信する"></form></div>
<div id="yoyakuSelect"><form action="finish.php" method="post"><input type="image" src="images/yoyakuSelect.png" alt="送信する"></form></div>
<div class="clear"></div>

</div>

<?php
	require_once("../module/reserveFooter.php");
?>