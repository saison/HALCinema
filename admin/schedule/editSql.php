<?PHP
	require_once("../../tokyo/module/functions.php");
	$con=getConnection();
	if(isset($_POST['send'])){
		$showId = $_SESSION['editShowId'];
		$cinemaId = $_SESSION['editCinemaId'];
		$con=getConnection();			
		$showDay = mysqli_real_escape_string($con,$_SESSION['editShowDay']);
		$startTime = mysqli_real_escape_string($con,$_SESSION['editStartTime']);
		$screen = mysqli_real_escape_string($con,$_SESSION['editScreen']);
		
		$updateSql = "UPDATE show_schedule SET  cinema_id ='{$cinemaId}', show_day='{$showDay}',start_time='{$startTime}', screen_id='{$screen}' WHERE  show_id ='{$showId}'";
			
		$updateResult = mysqli_query($con,$updateSql);
		mysqli_close($con);
		header("Location:details.php?id=".$showId."&&edit=1");
	}
?>