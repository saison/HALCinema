<?PHP
	require_once("../header.php");
?>
	
		<article id="loginArea">
			<h2>HALCinema管理画面ログイン</h2>
            <?php
            	if(!empty($_GET["error"])){
            		switch ($_GET["error"]) {
            			case 'true':
            				print "<p class='error_p alert alert-danger'>IDまたはパスワードが間違っています</p>";
            				break;
            			case 'nouser':
            				print "<p class='error_p alert alert-danger'>IDが入力されていません</p>";
            				break;
            			case 'nopass':
            				print "<p class='error_p alert alert-danger'>パスワードが入力されていません</p>";
            				break;
            			case 'nouserpass':
            				print "<p class='error_p alert alert-danger'>IDとパスワードが入力されていません</p>";
            				break;
            			case 'session':
            				print "<p class='error_p alert alert-danger'>再度ログインをしてください</p>";
            				break;
            		}
            	}
            ?>
            
			<form id="loginForm" action="loginSql.php" method="post">
				<p>ユーザー名<br /><input class="" type="text" name="userID" placeholder="user id" ></p>
				<p>パスワード<br /><input class="" type="password" name="userPass" placeholder="password" ></p>
        <div id="loginButton"><input type="submit" class="btn btn-success" value="ログイン"></div>
			</form>
		</article>

<?PHP
	require_once("../footer.php");
?>
