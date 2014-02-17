<?PHP
	require_once("../../tokyo/module/functions.php");
	$con=getConnection();
	if(isset($_GET['id'])){
		$cinemaId = $_GET['id'];	
		$con=getConnection();			
		$deleteSql = "DELETE FROM cinema_master WHERE  cinema_id = '{$cinemaId}'";

		$deleteResult = mysqli_query($con,$deleteSql);
		mysqli_close($con);
		header("Location:list.php?delete=1");
	}
?>