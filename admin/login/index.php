<?PHP
	require_once("../header.php");
?>
	
		<article id="loginArea">
			<h2>HALCinema管理画面ログイン</h2>
			<form id="loginForm" action="" method="post">
				<p>ユーザー名<br /><input class="" type="text" name="userID" placeholder="user id" ></p>
				<p>パスワード<br /><input class="" type="pass" name="userPass" placeholder="password" ></p>
				<button type="button" class="btn btn-success">ログイン</button>	
			</form>
		</article>

<?PHP
	require_once("../footer.php");
?>
