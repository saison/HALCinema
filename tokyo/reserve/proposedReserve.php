<?PHP
	require_once("../module/functions.php");

	$con = getConnection();
	$showId = $_SESSION["showid"];

	if(isset($_POST["send"]) && isset($_POST["seat"])){

		foreach ($_POST["seat"] as $value){
			$reserveData = array();
			$reserveData = explode("_",$value);
			switch($reserveData[1]){
				case "adult":
					$priceId = 0;
					break;
				case "student":
					$priceId = 1;
					break;
				case "senior":
					$priceId = 2;
					break;
				//デバック用
				default:
					$priceId = 0;
					
			}
			$insertSql = "INSERT INTO `seat_reserve_list`(`show_id`, `user_id`, `seat_number`, `reserve_flag`, `movie_price_id`) VALUES ('{$showId}','".$_SESSION["userid"]."','{$reserveData[0]}',0,{$priceId})";
			$insertResult = mysqli_query($con,$insertSql);
			/*$row = mysqli_fetch_array($insertResult);*/
		}

		header("Location:pay.php");

	}else{
		header("Location:seat.php?id=".$showId);
	}
?>