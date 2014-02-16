<?PHP
	require_once("../../tokyo/module/functions.php");
	$con=getConnection();
	if(isset($_GET['id'])){
		$showId = $_GET['id'];	
		$con=getConnection();			
		$deleteSql = "DELETE FROM show_schedule WHERE  show_id = '{$showId}'";

		$deleteResult = mysqli_query($con,$deleteSql);
		mysqli_close($con);
		header("Location:list.php?delete=1");
	}
?>