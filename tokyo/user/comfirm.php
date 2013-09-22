<?PHP

	//前のページからのデータを取得
	if(isset($_POST["send"])){
		$userId = $_POST["userId"];
		$pass = $_POST["pass"];
		$mail = $_POST["mail"];
		$family = $_POST["family"];
		$first = $_POST["first"];
		$prefectures = $_POST["prefectures"];
		$tel = $_POST["tel"];
	}else{
		header("Location:new.php");
		return;
	}





	$pageTitle = "会員登録内容の確認";
	require_once("../module/header.php");

	$_SESSION["userId"] = $userId;
	$_SESSION["pass"] = $pass;
	$_SESSION["mail"] = $mail;
	$_SESSION["family"] = $family;
	$_SESSION["first"] = $first;
	$_SESSION["prefectures"] = $prefectures;
	$_SESSION["tel"] = $tel;
?>
<form action="addUser.php" method="post">
	<p><label>ユーザID:<?PHP echo $userId; ?></label></p>
	<p><label>パスワード:<?PHP echo $pass; ?></label></p>
	<p><label>メールアドレス:<?PHP echo $mail; ?></label></p>
	<p><label>姓:<?PHP echo $family; ?></label></p>
	<p><label>名:<?PHP echo $first; ?></label></p>
	<p><label>お住まい:<?PHP echo $prefectures; ?></label></p>
	<p><label>電話番号:<?PHP echo $tel; ?></label></p>
	<p><input type="submit" value="登録" name="send" /></p>
</form>
<?PHP
	require_once("../module/footer.php");
?>