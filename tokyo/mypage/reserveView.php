<?PHP
	$pageTitle = "";
	require_once("../module/reserveHeader.php");
?>
<div id="content">
<div class="reserveTitle">
  <h3>MyPage（予約一覧）</h3>
</div>

<?php
$con=mysqli_connect('localhost','halcinema','halcinema');
$count=0;
	//文字コード設定
	if($con!=false){
		mysqli_set_charset($con,'utf8');
		//データベース選択
		$isSuccess =mysqli_select_db($con, 'halcinema');	
		if($isSuccess){
			if(isset($_SESSION["userid"])){
				$result =mysqli_query($con,"SELECT * FROM reserve_master WHERE  user_id = '".$_SESSION["userid"] ."'ORDER BY reserve_time DESC");
				while(($row = mysqli_fetch_array($result)) != false){
					$count++;
					echo "<div class='reserveEachBox'><div class='reserveBoxLeft'>$count</div>";
					echo "<div class='reserveBoxRight'><p class='reserveDate'>予約日時：".$row["reserve_time"]."</p>";//予約日時
					echo  "<p class='reserveNumber'>予約番号：".$row["reserve_number"]."</p>";//予約番号
					echo "</div><div class='clear'></div></div>";
				}
				if($count==0){
						
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
<?PHP
	require_once("../module/reserveFooter.php");
?>