<?PHP
	require_once("../module/functions.php");

	if(!(empty($_SESSION["userId"]) || empty($_SESSION["pass"]) || empty($_SESSION["mail"]) || empty($_SESSION["family"]) || empty($_SESSION["first"]) ||empty($_SESSION["prefectures"]) || empty($_SESSION["address"]) || empty($_SESSION["birthday"])  || empty($_SESSION["tel"]) || empty($_SESSION["mailMaga"]))){

		//DB格納
		$con=getConnection();
		
		$userId = mysqli_real_escape_string($con,$_SESSION["userId"]);
		$pass = mysqli_real_escape_string($con,$_SESSION["pass"]);
		$mail = mysqli_real_escape_string($con,$_SESSION["mail"]);
		$family = mysqli_real_escape_string($con,$_SESSION["family"]);
		$first = mysqli_real_escape_string($con,$_SESSION["first"]);
		$prefectures = mysqli_real_escape_string($con,$_SESSION["prefectures"]);
		$address = mysqli_real_escape_string($con,$_SESSION["address"]);
		$tel = mysqli_real_escape_string($con,$_SESSION["tel"]);
		$birthday = mysqli_real_escape_string($con,$_SESSION["birthday"]);
		$mailMaga =  mysqli_real_escape_string($con,$_SESSION["mailMaga"]);
	

			$InsertSql = "INSERT INTO user_master(user_id, user_pass, user_mail, family_name, first_name,birthday, prefectures,user_address, user_tel,mail_magazine_flag) VALUES ('{$userId}','{$pass}','{$mail}','{$family}','{$first}','{$birthday}','{$prefectures}','{$address}','{$tel}','{$mailMaga}')";

			$InsertResult = mysqli_query($con,$InsertSql);
			mysqli_close($con);
			
			if($InsertResult){
				echo "完了";
				header("Location:finish.php");
			}else{
				//エラー　追加できなかった
				header("Location:new.php?err=111");
			}

	}else{
		
		header("Location:new.php");
	}
?>