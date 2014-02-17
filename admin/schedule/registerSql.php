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
		
		$insertSql = "INSERT INTO show_schedule (show_id,cinema_id, show_day,start_time, screen_id) VALUE('{$showId}','{$cinemaId}','{$showDay}','{$startTime}','{$screen}')";

		$insertResult = mysqli_query($con,$insertSql);
		mysqli_close($con);
		header("Location:list.php?register=1");
	}
?>