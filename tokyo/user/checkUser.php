<?PHP
	require_once("../module/functions.php");
	

	if(!(!preg_match("/^[a-zA-Z0-9]{1,20}$/",$_POST["userId"])|| !preg_match("/^[a-zA-Z0-9]{1,20}$/",$_POST["pass"]) ||empty($_POST["passAgain"])|| empty($_POST["mail"]) || empty($_POST["family"]) || empty($_POST["first"]) || empty($_POST["prefectures"])  || !preg_match("/^[0-9]{4}$/",$_POST["year"])|| !preg_match("/^[0-9]{1,2}$/",$_POST["month"])  || !preg_match("/^[0-9]{1,2}$/",$_POST["day"])||  !preg_match("/^[0-9,-]+$/",$_POST["tel"]))){
		
		//パスワードチェック
		if($_POST["pass"]!=$_POST["passAgain"]){
			header("Location:new.php?err=3");
		}else{
			
			//生年月日チェック
			if($_POST["month"]<1||$_POST["month"]>12||$_POST["day"]>31||$_POST["day"]<1){
				header("Location:new.php?err=1");
			}else{
					
				$userId = $_POST["userId"];
				$pass = $_POST["pass"];
				$mail = $_POST["mail"];
				$family = $_POST["family"];
				$first = $_POST["first"];
				$prefectures = $_POST["prefectures"];
				$birthday=$_POST["year"]."-".$_POST["month"]."-".$_POST["day"];
				$address=$_POST["address"];
				$tel =str_replace("-", "", $_POST["tel"]); 
				$mailMaga = $_POST["mailMaga"];
					
				//user_idの重複チェック
				$con=getConnection();
				$SelectSql = "SELECT * FROM user_master WHERE user_id = '{$userId}'";
				$SelectResult = mysqli_query($con,$SelectSql);
				$row = mysqli_fetch_array($SelectResult);
					
				if($row){
					//エラー　userIDの重複
					header("Location:new.php?err=2");
				}
				else{
					
					$_SESSION["userId"] = $userId;
					$_SESSION["pass"] = $pass;
					$_SESSION["mail"] = $mail;
					$_SESSION["family"] = $family;
					$_SESSION["first"] = $first;
					$_SESSION["prefectures"] = $prefectures;
					$_SESSION["address"]=$address;
					$_SESSION["tel"] = $tel;
					$_SESSION["birthday"] = $birthday;
					$_SESSION["mailMaga"] = $mailMaga;
			
					
					header("Location:comfirm.php");
				}
			}
		}
	}else{
		//エラー　入力されていないものがある
		header("Location:new.php?err=1");
	}
?>