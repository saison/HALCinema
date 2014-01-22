<?PHP
	require_once("../header.php");
?>
	
	<!-- main start -->
	<div id="mainWrapper" class="container">
    
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

		<article id="loginArea">
			<h2>HALCinema管理画面ログイン</h2>
			<form id="loginForm" action="loginSql.php" method="post">
				<p>ユーザー名<br /><input class="" type="text" name="userID" placeholder="user id" ></p>
				<p>パスワード<br /><input class="" type="pass" name="userPass" placeholder="password" ></p>
				<button type="button" class="btn btn-success">ログイン</button>	
			</form>
		</article>
	</div>
	<!-- main end -->

<?PHP
	require_once("../footer.php");
?>
