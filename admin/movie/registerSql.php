<?PHP
	require_once("../../tokyo/module/functions.php");
	$con=getConnection();
	if(isset($_POST['send'])){
		
		$cinemaId = $_SESSION['registerCinemaId'];
		$startDay = $_SESSION['registerStartDay'];
		$endDay = $_SESSION['registerEndDay'];
		$runningtime = $_SESSION['registerRunningtime'];
		$mainPhoto = $_SESSION['registerMainPhoto'];
		
		//NULLの場合
		if($_SESSION['registerSubPhoto1']=="noImg.png"){
			$subPhoto1 = NULL;
		}else{
			$subPhoto1 = $_SESSION['registerSubPhoto1'];
		}
		//NULLの場合
		if($_SESSION['registerSubPhoto2']=="noImg.png"){
			$subPhoto2 = NULL;
		}else{
			$subPhoto2 = $_SESSION['registerSubPhoto2'];
		}
		//NULLの場合
		if($_SESSION['registerSubPhoto3']=="noImg.png"){
			$subPhoto3 = NULL;
		}else{
			$subPhoto3 = $_SESSION['registerSubPhoto3'];
		}
		//NULLの場合
		if($_SESSION['registerSubPhoto4']=="noImg.png"){
			$subPhoto4 = NULL;
		}else{
			$subPhoto4 = $_SESSION['registerSubPhoto4'];
		}
		
		$con=getConnection();
		$cinemaName = mysqli_real_escape_string($con,$_SESSION['registerCinemaName']);
		$cinemaDescripiton = mysqli_real_escape_string($con,$_SESSION['registerMovieDescription']);
		$moviDirecter = mysqli_real_escape_string($con,$_SESSION['registerMovieDirector']);
		$moviePerfomer = mysqli_real_escape_string($con,$_SESSION['registerPerfomer']);
		
		$insertSql = "INSERT INTO cinema_master (cinema_id,cinema_name,start_day,end_day, running_time,cinema_description,movie_director,movie_perfomer,main_photo,sub_photo1,sub_photo2,sub_photo3,sub_photo4) VALUE('{$cinemaId}','{$cinemaName}','{$startDay}','{$endDay}','{$runningtime}','{$cinemaDescripiton}','{$moviDirecter}','{$moviePerfomer}','{$mainPhoto}','{$subPhoto1}','{$subPhoto2}','{$subPhoto3}','{$subPhoto4}')";
			
		$insertResult = mysqli_query($con,$insertSql);
		mysqli_close($con);
		header("Location:list.php?register=1");
	}
?>