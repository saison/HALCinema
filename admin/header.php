<?PHP
	require_once('../../tokyo/module/functions.php');
	$filename = dirname($_SERVER['PHP_SELF'])."/".basename($_SERVER['PHP_SELF']);
<<<<<<< HEAD
 	var_dump($filename);
	var_dump($_SESSION["userID"]);
//		if (!isset($_SESSION["userID"])) {
//			header("location:../login/index.php?error=session");
//			exit();
//		}
=======
	print $filename;
	if(!$filename=="/HALCinema/admin/login/index.php"){
		print "<br>if通過<br>";
		if(!isset($_SESSION["userID"])){
			header("location:../login/index.php?error=session");
			exit();
		}
	}
>>>>>>> b133f99fbcd398b72f4f118fdba843ed69828db2
?>
<?php 
//	if(isset($_SESSION["userID"])){
//		echo "<br>".$_SESSION["userID"];
//	}
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
				<li><a href="">めにゅー</a></li>
				<li><a href="">めにゅー</a></li>
				<li><a href="">めにゅー</a></li>
				<li><a href="">めにゅー</a></li>
				<li><a href="">めにゅー</a></li>
				<li><a href="">めにゅー</a></li>
				<li><a href="">めにゅー</a></li>
				<li><a href="">めにゅー</a></li>
				<li><a href="">めにゅー</a></li>
			</ul>
		</nav>
	</aside>
	
	<div id="mainContent">
