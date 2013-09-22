<?PHP
	require_once("../module/functions.php");

	if(!(empty($_SESSION["userId"]) && empty($_SESSION["pass"]) && empty($_SESSION["mail"]) && empty($_SESSION["family"]) && empty($_SESSION["first"]) && empty($_SESSION["prefectures"]) && empty($_SESSION["tel"]))){

		//DB格納
		$userId = mysqli_real_escape_string($con,$_SESSION["userId"]);
		$pass = mysqli_real_escape_string($con,$_SESSION["pass"]);
		$mail = mysqli_real_escape_string($con,$_SESSION["mail"]);
		$family = mysqli_real_escape_string($con,$_SESSION["family"]);
		$first = mysqli_real_escape_string($con,$_SESSION["first"]);
		$prefectures = mysqli_real_escape_string($con,$_SESSION["prefectures"]);
		$tel = mysqli_real_escape_string($con,$_SESSION["tel"]);

		//user_idの重複チェック
		$SelectSql = "SELECT * FROM user_master WHERE user_id = '{$userId}'";
		$SelectResult = mysqli_query($con,$SelectSql);
		$row = mysqli_fetch_array($SelectResult);

		if(!$row){
			$InsertSql = "INSERT INTO user_master(user_id, user_pass, user_mail, family_name, first_name, prefectures, user_tel) VALUES ('{$userId}','{$pass}','{$mail}','{$family}','{$first}','{$prefectures}','{$tel}')";

			$InsertResult = mysqli_query($con,$InsertSql);
			mysqli_close($con);

			if($InsertResult){
				header("Location:finish.php");
			}else{
				//エラー　追加できなかった
				header("Location:new.php?err=111");
			}

		}else{
			//エラー　userIDの重複
			header("Location:new.php?err=2");
		}


	}else{
		//エラー　入力されていないものがある
		header("Location:new.php?err=1");
	}
?>