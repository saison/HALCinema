<?PHP
	require_once("../../tokyo/module/functions.php");
	$con=getConnection();
	if(isset($_SESSION['registerShowId'])){
		$showId = $_SESSION['registerShowId'];
		$cinemaId = $_SESSION['registerCinemaId'];
		$con=getConnection();			
		$showDay = mysqli_real_escape_string($con,$_SESSION['registerShowDay']);
		$startTime = mysqli_real_escape_string($con,$_SESSION['registerStartTime']);
		$screen = mysqli_real_escape_string($con,$_SESSION['registerScreen']);
		
		$updateSql = "UPDATE show_schedule SET  cinema_id ='{$cinemaId}', show_day='{$showDay}',start_time='{$startTime}', screen_id='{$screen}' WHERE  show_id ='{$showId}'";
			
		$updateResult = mysqli_query($con,$updateSql);
		mysqli_close($con);
		header("Location:list.php");
	}
?>