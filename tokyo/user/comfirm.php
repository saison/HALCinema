<?PHP
	require_once("../module/functions.php");

	//前のページからのデータを取得
	if(!(empty($_SESSION["userId"]) && empty($_SESSION["pass"]) && empty($_SESSION["mail"]) && empty($_SESSION["family"]) && empty($_SESSION["first"]) && empty($_SESSION["prefectures"])&& empty($_SESSION["address"]) && empty($_SESSION["birthday"]) && empty($_SESSION["tel"]))){
		
			$userId=	$_SESSION["userId"] ;
			$pass=$_SESSION["pass"] ;
			$mail=$_SESSION["mail"];
			$family=$_SESSION["family"];
			$first=$_SESSION["first"];
			$prefectures=$_SESSION["prefectures"];
			$address=$_SESSION["address"];
			$birthday=$_SESSION["birthday"];
			$tel=$_SESSION["tel"];
		
	}else{
		
		header("Location:new.php");
		return;
	}

	$pageTitle = "会員登録内容の確認";
	require_once("../module/reserveHeader.php");

?>
<div id="content">
<h2>入力内容確認</h2>
<p id="comfirmUser">入力内容の確認を行って下さい。</p>
<!--  エラー表示時は#newErrorをpタグなどに指定するとCSSが適応されます-->
<form action="addUser.php" method="post">
<div class="confirmTable">
<table>
<tr>
<th>ユーザID:</th>
<td><?PHP echo $userId; ?></td>
</tr>
<tr>
<th>パスワード:</th>
<td><?PHP echo $pass; ?></td>
</tr>
<tr>
<th>メールアドレス:</th>
<td><?PHP echo $mail; ?></td>
</tr>
<tr>
<th>姓:</th>
<td><?PHP echo $family; ?></td>
</tr>
<tr>
<th>名:</th>
<td><?PHP echo $first; ?></td>
</tr>
<tr>
<th>生年月日:</th>
<td><?PHP echo $birthday; ?></td>
</tr>
<tr>
<th>お住まい:</th>
<td><?PHP echo $prefectures.$address; ?></td>
</tr>
<tr>
<th>電話番号:</th>
<td><?PHP echo $tel; ?></td>
</tr>
</table>
</div>
    <!--
    <p><label>ユーザID:<?PHP echo $userId; ?></label></p>
	<p><label>パスワード:<?PHP echo $pass; ?></label></p>
	<p><label>メールアドレス:<?PHP echo $mail; ?></label></p>
	<p><label>姓:<?PHP echo $family; ?></label></p>
	<p><label>名:<?PHP echo $first; ?></label></p>
	<p><label>お住まい:<?PHP echo $prefectures.$address; ?></label></p>
	<p><label>電話番号:<?PHP echo $tel; ?></label></p>-->
	
<p id="sendButton"><input type="submit" value="登録" name="send" /></p>
</form>
</div>
<?PHP
	require_once("../module/reservefooter.php");
?>