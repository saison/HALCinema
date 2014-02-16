<?PHP
	require_once("../../tokyo/module/functions.php");
	$con=getConnection();
	if(isset($_POST['send'])){
		
		$cinemaId = $_SESSION['editCinemaId'];
		$startDay = $_SESSION['editStartDay'];
		$endDay = $_SESSION['editEndDay'];
		$runningtime = $_SESSION['editRunningtime'];
		$mainPhoto = $_SESSION['editMainPhoto'];
		
		//NULLの場合
		if($_SESSION['editSubPhoto1']=="noImg.png"){
			$subPhoto1 = NULL;
		}else{
			$subPhoto1 = $_SESSION['editSubPhoto1'];
		}
		//NULLの場合
		if($_SESSION['editSubPhoto2']=="noImg.png"){
			$subPhoto2 = NULL;
		}else{
			$subPhoto2 = $_SESSION['editSubPhoto2'];
		}
		//NULLの場合
		if($_SESSION['editSubPhoto3']=="noImg.png"){
			$subPhoto3 = NULL;
		}else{
			$subPhoto3 = $_SESSION['editSubPhoto3'];
		}
		//NULLの場合
		if($_SESSION['editSubPhoto4']=="noImg.png"){
			$subPhoto4 = NULL;
		}else{
			$subPhoto4 = $_SESSION['editSubPhoto4'];
		}
		
		$con=getConnection();
		$cinemaName = mysqli_real_escape_string($con,$_SESSION['editCinemaName']);
		$cinemaDescripiton = mysqli_real_escape_string($con,$_SESSION['editMovieDescription']);
		$moviDirecter = mysqli_real_escape_string($con,$_SESSION['editMovieDirector']);
		$moviePerfomer = mysqli_real_escape_string($con,$_SESSION['editPerfomer']);
		
		$updateSql = "UPDATE cinema_master SET  cinema_name='{$cinemaName}' , start_day='{$startDay}',end_day='{$endDay}', running_time='{$runningtime}' ,cinema_description='{$cinemaDescripiton}' ,movie_director='{$moviDirecter}',movie_perfomer='{$moviePerfomer}',main_photo='{$mainPhoto}',sub_photo1='{$subPhoto1}',sub_photo2='{$subPhoto2}',sub_photo3='{$subPhoto3}',sub_photo4='{$subPhoto4}' WHERE  cinema_id ='{$cinemaId}'";
			
		$updateResult = mysqli_query($con,$updateSql);
		mysqli_close($con);
		header("Location:list.php?edit=1");
	}
?>