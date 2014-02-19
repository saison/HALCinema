<?PHP
	$pageTitle="上映スケジュール登録";
	require_once("../header.php");
	if(isset($_SESSION['registerCheckYear'])){
	
		$year = $_SESSION['registerCheckYear'];
		$month = $_SESSION['registerCheckMonth'];
		if(strlen($month)==1){
			$month="0".$month;
		}
		$day = $_SESSION['registerCheckDay'];
		if(strlen($day)==1){
			$day="0".$day;
		}
		$startHour = $_SESSION['registerCheckStartHour'];
		if(strlen($startHour)==1){
			$startHour="0".$startHour;
		}
		$startMin = $_SESSION['registerCheckStartMin'];
		if(strlen($startMin)==1){
			$startMin="0".$startMin;
		}
		
		$screen = $_SESSION['registerCheckScNum'];
		
		$_SESSION['registerShowDay'] = $year."-".$month."-".$day;
		$_SESSION['registerStartTime'] = $startHour.":".$startMin.":00";
		$_SESSION['registerScreen'] = "sc000".$screen;
				
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

