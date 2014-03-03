<?PHP
	$pageTitle="上映スケジュール登録";
	require_once("../header.php");
	if(isset($_GET['error'])){//form registerDetailCheck.php
	
		$_SESSION['registerCinemaId'] = $_SESSION['registerCheckCinemaId'];
		$_SESSION['registerShowId'] = $_SESSION['registerCheckShowId'];
		$_SESSION['registerShowDay'] = $_SESSION['registerCheckShowDay'];
	    $_SESSION['registerStartTime'] = $_SESSION['registerCheckStartTime'] .":00";
		$_SESSION['registerScreen'] = "sc000".$_SESSION['registerCheckScNum'];
		
		
		//映画名の取得
		$con = getConnection();
		$movieSql = "SELECT cinema_name FROM cinema_master WHERE cinema_id = '{$_SESSION['registerCheckCinemaId']}'";
		$movieSqlResult = mysqli_query($con,$movieSql);
		$rowMovieSqlResult = mysqli_fetch_array($movieSqlResult);
		
		$cinemaName = $rowMovieSqlResult['cinema_name'];
		$_SESSION['registerCinemaName'] = $cinemaName;
		
		mysqli_close($con);
				
	}else{
		header("Location:list.php");
	}
	
?>
	
	<!-- main start -->
	<h2><?PHP echo "上映スケジュール" ?> - 確認</h2>
		<!-- movie list table -->
		<form action="registerSql.php" method="post">
		<table id="editTable" class="table table-striped table-bordered table-condensed listTable">
        		<tr>
					<th>上映ID</th>
					<td><?PHP echo  $_SESSION['registerShowId'];?></td>
				</tr>
				<tr>
					<th>映画名</th>
					<td><?PHP echo $_SESSION['registerCinemaName'];?></td>
				</tr>
				<tr>
					<th>上映日</th>
					<td><?PHP echo $_SESSION['registerShowDay'];?></td>
				</tr>
				<tr>
					<th>上映開始時間</th>
					<td><?PHP echo $_SESSION['registerCheckStartTime'];?></td>
				</tr>
				<tr>
					<th>スクリーン</th>
					<td><?PHP echo $_SESSION['registerCheckScNum'];?></td>
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

