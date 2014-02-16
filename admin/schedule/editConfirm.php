<?PHP
	$pageTitle="上映スケジュール確認";
	require_once("../header.php");
	if(isset($_GET['error'])){//form editCheck.php
	
		$_SESSION['editShowId'] = $_SESSION['editCheckShowId'];
		$_SESSION['editCinemaId'] =$_SESSION['editCheckCinemaId'];
		$_SESSION['editShowDay'] =$_SESSION['editCheckShowDay'];
		$_SESSION['editStartTime'] = $_SESSION['editCheckStartTime'] .":00";
		$_SESSION['editScreen'] = "sc000".$_SESSION['editCheckScNum'];
		
		//映画名の取得
		$con = getConnection();
		$movieSql = "SELECT cinema_name FROM cinema_master WHERE cinema_id = '{$_SESSION['editCinemaId']}'";
		$movieSqlResult = mysqli_query($con,$movieSql);
		$rowMovieSqlResult = mysqli_fetch_array($movieSqlResult);
		
		$cinemaName = $rowMovieSqlResult['cinema_name'];
		
		mysqli_close($con);
				
	}else{
		header("Location:list.php");
	}
?>
	
	<!-- main start -->
	<h2><?PHP echo $_SESSION['editCheckShowId']; ?> - 確認</h2>
		<!-- movie list table -->
		<form action="editSql.php" method="post">
		<table id="editTable" class="table table-striped table-bordered table-condensed listTable">
        		<tr>
					<th>上映ID</th>
					<td><?PHP echo  $_SESSION['editCheckShowId'];?></td>
				</tr>
				<tr>
					<th>映画名</th>
					<td><?PHP echo $cinemaName;?></td>
				</tr>
				<tr>
					<th>上映日</th>
					<td><?PHP echo $_SESSION['editCheckShowDay'];?></td>
				</tr>
				<tr>
					<th>上映開始時間</th>
					<td><?PHP echo $_SESSION['editCheckStartTime'];?></td>
				</tr>
				<tr>
					<th>スクリーン</th>
					<td><?PHP echo $_SESSION['editCheckScNum'];?></td>
				</tr>
		</table>
		<div id="editSend">
			<input type="submit" class="btn btn-primary btn-lg" value="登録する" name="send"></div>
		</form>
		<!-- /movie list table -->
	<!-- main end -->

<?PHP
	require_once("../footer.php");
?>



