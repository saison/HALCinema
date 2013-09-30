<?PHP
	$pageTitle = "";
	require_once("../module/reserveHeader.php");
?>

<div id="content"><!--メインコンテンツ-->
<div class="reserveTitle">
  <h3>ログイン&amp;新規会員登録</h3>
</div>
<?php
            	if(!empty($_GET["error"])){
            		switch ($_GET["error"]) {
            			case 'true':
            				print "<p class='error_p'>IDまたはパスワードが間違っています</p>";
            				break;
            			case 'nouser':
            				print "<p class='error_p'>IDが入力されていません</p>";
            				break;
            			case 'nopass':
            				print "<p class='error_p'>パスワードが入力されていません</p>";
            				break;
            			case 'nouserpass':
            				print "<p class='error_p'>IDとパスワードが入力されていません</p>";
            				break;
            			case 'session':
            				print "<p class='error_p'>再度ログインをしてください</p>";
            				break;
            		}
            }
            ?>
<div class="login">
<h4>ログイン</h4>
<form action="loginSql.php" method="post">
<table><tr><th>ID</th><td><input type="text" name="userid" /></td></tr>
<tr><th>パスワード</th><td><input type="password" name="pass" /></td></tr>
</table>
<p class="loginButton"><input type="image" src="images/login.png" alt="Login"></p>
</form>
</div>
<div id="newUser">
<h4>新規会員登録</h4>
<p class="loginButton"><a href="../user/new.php"><img src="../mypage/images/newUser.png"></a></p>
</div>
<div class="clear"></div>
</div>
<?PHP
	require_once("../module/reserveFooter.php");
?>