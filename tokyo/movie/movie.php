<?PHP
	$pageTitle = "";
	require_once("../module/header.php");
?>

<div id="mainContent"><!--メインコンテンツ-->
<div class="contentTitle">
	<h2>作品案内<br /><span class="h2En">Work Info.</span></h2>
</div>
<div id="now">
<?php

	///今日の日付を取得
	$todayDate=date("Y-m-d");
	
	//今日の上映中映画を表示
	
	//MySQLサーバー接続
	$con=mysqli_connect('localhost','halcinema','halcinema');
	//文字コード設定
	if($con!=false){
		mysqli_set_charset($con,'utf8');
		//データベース選択
		$isSuccess =mysqli_select_db($con, 'halcinema');	
		if($isSuccess){
			$result =mysqli_query($con,"SELECT cinema_id, cinema_name, movie_director, movie_perfomer, main_photo FROM cinema_master WHERE start_day <= '$todayDate' AND end_day >= '$todayDate'");
			while(($row = mysqli_fetch_array($result)) != false){
						echo "<a href ='details.php?id=".$row[0]."'><div class='movieBox'>";
							echo "<div class='movieImg'>";
								echo "<img src='images/". $row[4] ."'>";
							echo "</div>";
							echo "<div class='movieAbout'>";
								echo "<h3>".$row[1]."</h3>";
								echo"<p>監督：".$row[2]."</p>";
								echo"<p>出演者：".$row[3]."</p>";
								//echo "<a href ='details.php?id=".$row[0]."'>詳細を見る</a>";
						echo "</div><div class='clear'></div></div></a>";
			}
			
		}		
		//サーバー切断				
		mysqli_close($con);		
	}

?>
</div>				
<div id="coming">
</div>
</div>
<?PHP
	require_once("../module/footer.php");
?>