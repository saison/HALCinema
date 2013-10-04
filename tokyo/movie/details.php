<?PHP
	$pageTitle = "作品案内";//作品名が入ると望ましい
	require_once("../module/header.php");
?>

<div id="mainContent"><!--メインコンテンツ-->
<div class="contentTitle">
	<h2>作品案内<br /><span class="h2En">Work Info.</span></h2>
</div>
<?php
if(!isset($_GET['id'])){ // issetですべてを囲むのではなくて、最初に無かったら飛ばそう
	header("location:../top/error.php");
}		
///今日の日付を取得
$todayDate=date("Y-m-d");
//上映IDを$cinemaに格納
$cinema_id=$_GET['id'];
//MySQLサーバー接続
$con=mysqli_connect('localhost','halcinema','halcinema');
if($con!=false){
	mysqli_set_charset($con,'utf8');
	//データベース選択
	$isSuccess =mysqli_select_db($con, 'halcinema');	
	if($isSuccess){
		$result =mysqli_query($con,"SELECT * FROM cinema_master WHERE cinema_id='$cinema_id'");
		$row = mysqli_fetch_array($result);	
		echo "<div class='movieDetailBox'>";
		echo "<h3>".$row[1]."</h3>";
		echo "<div class='movieDetailImg'>";
		echo "<img src='images/". $row[8] ."'>";
		echo "</div>";
		echo "<div class='movieDetailAbout'>";
		echo"<p class='movieDetailCap'>映画詳細</p>";
		echo"<p>".$row[5]."</p>";
		echo"<p>監督：".$row[6]."</p>";
		echo"<p>出演者：".$row[7]."</p>";
		echo"<p>上映時間：".$row[4]."分</p>";
		echo "</div><div class='clear'></div></div>";
		echo "<div class='moviePhotogallery'>";
		echo"<p class='movieDetailCap'>フォトギャラリー</p>";
		if(!$row[9]==""){
			echo "<img src='images/". $row[9] ."' width='225' height='165'>";
		}else{
			echo "<p>フォトギャラリーはありません</p>";	//sub1に無かったら2-4もないのが大前提
		}
		if(!$row[10]==""){
			echo "<img src='images/". $row[10] ."' width='225' height='165'>";
		}
		if(!$row[11]==""){
			echo "<img src='images/". $row[11] ."' width='225' height='165'>";
		}
		if(!$row[12]==""){
			echo "<img src='images/". $row[12] ."' width='225' height='165'>";
		}
		echo "</div>";
		echo "<div id='movieDatailsSchedule'>";
		echo "<h3>HALCinema TOKYO 上映スケジュール</h3>";
//////////////////////////////////////////////////////////////////////////////////
		echo "<table>\n";
		//日付
		echo "<tr><th class='tableDate'>".date("m/d",strtotime($todayDate))."</th>\n";
		//スクリーン番号取得
		$resultSchedule =mysqli_query($con,"SELECT * FROM show_schedule  WHERE show_day='$todayDate' AND cinema_id = '$row[0]' ORDER BY  start_time ASC");
		while(($rowSchedule = mysqli_fetch_array($resultSchedule)) != false){
			$scN=mb_substr($rowSchedule[2],5,1);
		}
		if(isset($scN)){
			echo "<td class='tableScreen'>SCREEN".$scN."</td>\n";
		}else{
			echo "<td class='tableScreen'>Not Show</td>\n";
		}
		//上映時間の計算　　　例)終了時間の割り出しの際に　135分の映画は140分として計算する。
		$showTime=ceil($row[4]/10)*10;
		//映画のid、本日の日付から上映スケジュールテーブルより映画の開始時間を取得。
		//テーブルカウント
		$countTable=1;	
		$resultSchedule =mysqli_query($con,"SELECT * FROM show_schedule  WHERE show_day='$todayDate' AND cinema_id = '$row[0]' ORDER BY  start_time ASC");
		while(($rowSchedule = mysqli_fetch_array($resultSchedule)) != false){
			//スケジュール表示
			echo"<td class='tableEachMovie'>\n";
			$nowTime=date("H:i");
			if(date("H:i",strtotime($rowSchedule[3]))>=date('H:i', strtotime('+1 hour ' . $nowTime))){
				echo "<a href ='../reserve/seat.php?id=".$rowSchedule[0]."'>\n";
			}else{
				echo "<a href =''>\n";
			}
			echo "<span class='tableEachMovieStart'>".date("H:i",strtotime($rowSchedule[3]))." </span><br />～ ";
			$showTimeJp=$showTime." minute";//上映終了時間計算
			echo date("H:i",strtotime($showTimeJp,strtotime($rowSchedule[3])));//上映終了時間
			$nowTime=date("H:i");
			if(date("H:i",strtotime($rowSchedule[3]))>=date('H:i', strtotime('+1 hour ' . $nowTime))){
			}
			echo "\n</a></td>\n";
			$countTable++;	
		}
		echo "</tr>\n";
		echo "</table>\n";		
		//////////////////////////////////////////////////////////////////////////
		//一週間分の表示
		$dayCount=1;
		while($dayCount<7){
			$Date = date('Y-m-d', strtotime("+ $dayCount days"));
			//日付
			echo "<table>";
			echo "<tr><th class='tableDate'>".date("m/d",strtotime($Date))."</th>";
			$resultSchedule =mysqli_query($con,"SELECT * FROM show_schedule  WHERE show_day='$Date' AND cinema_id = '$row[0]' ORDER BY  start_time ASC");
			while(($rowSchedule = mysqli_fetch_array($resultSchedule)) != false){
				$scN=mb_substr($rowSchedule[2],5,1);
			}
			//スクリーン番号
			if(!empty($scN)){
				echo "<td class='tableScreen'>SCREEN".$scN."</td>";
			}else{
				echo "<td class='tableScreen'>Not Show</td>\n";	
			}
			//上映時間の計算　　　例)終了時間の割り出しの際に　135分の映画は140分として計算する。
			$showTime=ceil($row[4]/10)*10;
			//映画のid、本日の日付から上映スケジュールテーブルより映画の開始時間を取得。
			//テーブルカウント
			$countTable=1;	
			$resultSchedule =mysqli_query($con,"SELECT * FROM show_schedule  WHERE show_day='$Date' AND cinema_id = '$row[0]' ORDER BY  start_time ASC");
			while(($rowSchedule = mysqli_fetch_array($resultSchedule)) != false){
				//スケジュール表示
				echo"<td class='tableEachMovie'><a href ='../reserve/seat.php?id=".$rowSchedule[0]."'><span class='tableEachMovieStart'>".date("H:i",strtotime($rowSchedule[3]))." </span><br />～ ";
				$showTimeJp=$showTime." minute";//上映終了時間計算
				echo date("H:i",strtotime($showTimeJp,strtotime($rowSchedule[3])));//上映終了時間
				echo "</a></td>";
				$countTable++;	
			}
			echo "</tr>";
			echo "</table>";		
			$dayCount++;
		}
	}
	//サーバー切断
	mysqli_close($con);
}
echo "</div>";
echo "<p id='movieTyui'>※上映終了時刻はあくまでも予定です。</p>";

?>

</div>
<?PHP
	require_once("../module/footer.php");
?>