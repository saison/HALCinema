<?PHP

require_once("../module/functions.php");
	


if(!(/*!preg_match("/^[a-zA-Z0-9]{1,20}$/",$_POST["userId"])|| */!preg_match("/^[a-zA-Z0-9]{1,20}$/",$_POST["pass"]) ||empty($_POST["passAgain"])|| empty($_POST["mail"]) || empty($_POST["family"]) || empty($_POST["first"]) || empty($_POST["prefectures"])  || !preg_match("/^[0-9]{4}$/",$_POST["year"])|| !preg_match("/^[0-9]{1,2}$/",$_POST["month"])  || !preg_match("/^[0-9]{1,2}$/",$_POST["day"])||  !preg_match("/^[0-9,-]+$/",$_POST["tel"]))){
		
		//パスワードチェック
		if($_POST["pass"]!=$_POST["passAgain"]){
			header("Location:show.php?err=000");
		}else{
			
			//生年月日チェック
			if($_POST["month"]<1||$_POST["month"]>12||$_POST["day"]>31||$_POST["day"]<1){
				header("Location:show.php?err=002");
			}else{
				//DB格納
				$con=getConnection();
					
				//$userId = $_SESSION["userId"];
				$userId = 111;//仮
				$birthday = $_POST["year"]."-".$_POST["month"]."-".$_POST["day"];
				$tel = str_replace("-", "", $_POST["tel"]);
				$pass = mysqli_real_escape_string($con,$_POST["pass"]);
				$mail = mysqli_real_escape_string($con,$_POST["mail"]);
				$family = mysqli_real_escape_string($con,$_POST["family"]);
				$first = mysqli_real_escape_string($con,$_POST["first"]);
				$prefectures = mysqli_real_escape_string($con,$_POST["prefectures"]);
				$address = mysqli_real_escape_string($con,$_POST["address"]);
				$tel = mysqli_real_escape_string($con,$tel);
				$birthday = mysqli_real_escape_string($con,$birthday);
				$mailMaga = mysqli_real_escape_string($con,$_POST["mailMaga"]);
				
			
				$InsertSql = "UPDATE user_master SET  user_pass='{$pass}', user_mail='{$mail}', family_name='{$family}', first_name='{$first}',birthday='{$birthday}',prefectures='{$prefectures}',user_address='{$address}', user_tel='{$tel}' ,mail_magazine_flag='{$mailMaga}' WHERE  user_id ='{$userId}'";
			
				$InsertResult = mysqli_query($con,$InsertSql);
				mysqli_close($con);
						
				if($InsertResult){
					echo "完了";//仮
					header("Location:finish.php");
				}else{
					//エラー　編集できなかった
					header("Location:show.php?err=001");
				}
			}
		}
}else{
	header("Location:show.php?err=002");
}
?>