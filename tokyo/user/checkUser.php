<?PHP
	require_once("../module/functions.php");
	
	//文字数、半角全角等のチェック、生年月日のチェックは行っていません。

	if(!(empty($_POST["userId"]) || empty($_POST["pass"]) || empty($_POST["mail"]) || empty($_POST["family"]) || empty($_POST["first"]) || empty($_POST["prefectures"])  || empty($_POST["year"]) || empty($_POST["month"])  || empty($_POST["day"])|| empty($_POST["tel"]))){
		
		$userId = $_POST["userId"];
		$pass = $_POST["pass"];
		$mail = $_POST["mail"];
		$family = $_POST["family"];
		$first = $_POST["first"];
		$prefectures = $_POST["prefectures"];
		$birthday=$_POST["year"]."-".$_POST["month"]."-".$_POST["day"];
		$address=$_POST["address"];
		$tel = $_POST["tel"];
			
		//user_idの重複チェック
		$con = mysqli_connect('localhost','halcinema','halcinema');
		mysqli_set_charset($con,'utf8');
		mysqli_select_db($con,'halcinema');
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
	
			
			header("Location:comfirm.php");
		}
	}else{
		//エラー　入力されていないものがある
		header("Location:new.php?err=1");
	}
?>