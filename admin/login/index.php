<?PHP
	$pageTitle="ログイン";
  session_start();
	//require_once("../header.php");
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="stylesheet" href="../css/style.css" media="all">
	<link rel="stylesheet" href="../css/bootstrap.min.css" media="screen">
	<script src="../js/jquery-1.10.2.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<title>
		<?PHP if($pageTitle != ""){ echo $pageTitle." | "; } ?>HALCinema管理者サイト
	</title>
</head>
<body>
	<!-- header start -->
	<header>
		<div id="headerWrap">
			<h1><a href="../top/index.php"><img src="../images/logo.png" alt="HALCinema 管理者画面" /></a></h1>
			<p id="userId"></p>
		</div>
	</header>
	<!-- header end -->
	<div id="mainWrapper">
	<aside id="sidemenu">
		<nav>
			<ul>

			</ul>
		</nav>
	</aside>
	
	<div id="mainContent">
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