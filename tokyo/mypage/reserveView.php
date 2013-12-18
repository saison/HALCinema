<?PHP
	$pageTitle = "";
	require_once("../module/reserveHeader.php");
?>
<div id="content" class="clearfix">
	<div id="mypageMein">
<div class="reserveTitle">
  <h3>MyPage（予約一覧）</h3>
</div>

<?php
$con = getConnection();
$count=0;
	//文字コード設定
	if($con!=false){
		mysqli_set_charset($con,'utf8');
		//データベース選択
		$isSuccess =mysqli_select_db($con, 'halcinema');	
		if($isSuccess){
			if(isset($_SESSION["userid"])){
				$result =mysqli_query($con,"SELECT * FROM reserve_master WHERE user_id = '".$_SESSION["userid"] ."' ORDER BY reserve_time DESC");
				while($row = mysqli_fetch_array($result)){
					$count++;
					echo "<div class='reserveEachBox clearfix'><div class='reserveBoxLeft'>$count</div>";
					echo "<div class='reserveBoxRight'><p class='reserveDate'>予約日時：".$row["reserve_time"]."</p>";//予約日時
					echo  "<p class='reserveNumber'>予約番号：".$row["reserve_number"]."</p>";//予約番号
					$result2 =mysqli_query($con,"SELECT * FROM movie_reserve_content WHERE reserve_number = '".$row["reserve_number"] ."'");
					echo  "<p class='reserveDate'>予約映画･予約座席：<br /><br />";//予約番号
					while(($row2 = mysqli_fetch_array($result2)) != false){
						$reserveSelectSql = "SELECT show_schedule.show_id AS showID , show_schedule.screen_id AS SID , show_schedule.show_day AS showDay , show_schedule.start_time AS startTime , cinema_master.cinema_name AS movieName FROM show_schedule INNER JOIN cinema_master ON show_schedule.cinema_id=cinema_master.cinema_id WHERE show_schedule.show_id='".$row2["show_id"]."'";
						$reserveSelectResult = mysqli_query($con,$reserveSelectSql);
						$reserveSelectRow = mysqli_fetch_array($reserveSelectResult);
						$dateAndTime=$reserveSelectRow["showDay"]." ".$reserveSelectRow["startTime"];
						$screenDay=date_parse($dateAndTime);
						echo "　　上映日時：".$screenDay["year"]."年".$screenDay["month"]."月".$screenDay["day"]."日 ".$screenDay["hour"]."：".$screenDay["minute"]."~<br />";
						echo "　　映画名：".$reserveSelectRow["movieName"]."<br />";
						echo "　　座席番号：<b>".$row2["seat_number"]."</b><br>";
					}
					echo "</p></div></div>";
				}
				if($count==0){
						echo "予約された映画はありません";
				}
			}else{
				header('Location: login.php');//ログイン処理無効化
			}
		}		
		//サーバー切断				
		mysqli_close($con);		
	}
	
?>



</div>
<div id="mypageNav">
<nav>
<ul>
<li><a href="mypage.php"><img src="images/mypagetop.png" alt="MypageTOP"></a></li>
<li><a href="reserveView.php"><img src="images/reserveall.png" alt="予約一覧"></a></li>	
<li><a href="show.php"><img src="images/accountinfo.png" alt="アカウント情報"></a></li>	
</ul>	
</nav>
</div>
	</div>
<?PHP
	require_once("../module/reserveFooter.php");
?>