<?PHP
	$pageTitle="上映スケジュール確認";
	require_once("../header.php");
	if(isset($_SESSION['editCheckYear'])){
	
		$year = $_SESSION['editCheckYear'];
		$month = $_SESSION['editCheckMonth'];
		if(strlen($month)==1){
			$month="0".$month;
		}
		$day = $_SESSION['editCheckDay'];
		if(strlen($day)==1){
			$day="0".$day;
		}
		$startHour = $_SESSION['editCheckStartHour'];
		if(strlen($startHour)==1){
			$startHour="0".$startHour;
		}
		$startMin = $_SESSION['editCheckStartMin'];
		if(strlen($startMin)==1){
			$startMin="0".$startMin;
		}
		$cinemaId = $_SESSION['editCheckCinemaId'];
		$con = getConnection();
		$movieSql = "SELECT * FROM cinema_master WHERE cinema_id = '{$cinemaId}'";
		$movieSqlResult = mysqli_query($con,$movieSql);
		$rowMovieSqlResult = mysqli_fetch_array($movieSqlResult);
		
		$cinemaName = $rowMovieSqlResult['cinema_name'];
		mysqli_close($con);
		
		$screen = $_SESSION['editCheckScNum'];
		
		$_SESSION['editShowId'] = $_SESSION['showId'];
		$_SESSION['editCinemaId'] = $cinemaId;
		$_SESSION['editShowDay'] = $year."-".$month."-".$day;
		$_SESSION['editStartTime'] = $startHour.":".$startMin.":00";
		$_SESSION['editScreen'] = "sc000".$screen;
				
	}
?>
	
	<!-- main start -->
	<h2><?PHP echo "上映スケジュール" ?> - 確認</h2>
		<!-- movie list table -->
		<form action="editSql.php" method="post">
		<table id="editTable" class="table table-striped table-bordered table-condensed listTable">
        		<tr>
					<th>上映ID</th>
					<td><?PHP echo  $_SESSION['showId'];?></td>
				</tr>
				<tr>
					<th>映画名</th>
					<td><?PHP echo $cinemaName;?></td>
				</tr>
				<tr>
					<th>上映日</th>
					<td><?PHP echo $year;?>/<?PHP echo $month;?>/<?PHP echo $day;?></td>
				</tr>
				<tr>
					<th>上映開始時間</th>
					<td><?PHP echo $startHour;?>:<?PHP echo $startMin;?></td>
				</tr>
				<tr>
					<th>スクリーン</th>
					<td><?PHP echo $screen;?></td>
				</tr>
		</table>
		<div id="editSend">
			<input type="submit" class="btn btn-primary btn-lg" value="登録する"></div>
		</form>
		<!-- /movie list table -->
	<!-- main end -->

<?PHP
	require_once("../footer.php");
?>


