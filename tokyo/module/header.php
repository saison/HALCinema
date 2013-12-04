<?PHP
	require_once("../module/functions.php");
?>
<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8" />
	<link rel="stylesheet" type="text/css" href="../module/css/reset.css">
	<link rel='stylesheet' type='text/css' href='../module/css/base.css' />
	<link rel='stylesheet' type='text/css' href='../module/css/style.css' />
	<?PHP
		//各ファイル名の取得
		$filename = basename($_SERVER["PHP_SELF"],".php");

		//個別CSSの設定
		if(file_exists("../module/css/".$filename.".css")){
			echo "<link rel='stylesheet' href='../module/css/".$filename.".css' />\n";
		}
		/*if($filename=="index"){
			echo "<link rel='stylesheet' href='../module/css/access.css' />\n";
		}*/
	?>

	<link href="../module/css/jquery.bxslider.css" rel="stylesheet" type="text/css">
	<script src="../module/js/jquery-1.9.1.js"></script>
	<script src="../module/js/jquery-ui-1.10.3.custom.min.js"></script>
	<?PHP
		//jsのファイルパス
		if(file_exists("../module/js/script.js")){
			echo "<script src='../module/js/script.js'></script>\n";
		}
		//個別JSの設定
		if(file_exists("../module/js/".$filename.".js")){
			echo "<script src='../module/js/".$filename.".js'></script>\n";
		}

	?>
	<script src="../module/js/jquery.bxslider.min.js"></script>
	<title><?PHP if($pageTitle != ""){ echo $pageTitle." | "; } ?>HALCinema</title>
</head>
<body>
<header>
<div id="headerIn">
<h1><a href="../top/index.php"><img src="../module/images/reserveLogo.png"></a></h1>
<div id="login">
<?php
if(isset($_SESSION["userid"])){
	echo "<p><strong><a href='../mypage/reserveView.php'>ようこそ".$_SESSION["userid"]."さん！</a></strong></p><p id='logout'><a href='../mypage/mypage.php'>MyPage(仮)</a>　<a href='../top/logout.php'>ログアウト</a></p>";
}else{
	echo '<a href="../mypage/login.php"><img src="../module/images/login.png" alt="ログイン&新規会員登録"></a>'."\n";
}
?>
</div>
<div class="clear"></div>
</div>
<nav>
<ul>
<li><a href="../shop/shop.php"><img src="../module/images/menu/theaters.png"></a></li>
<li><a href="../movie/movie.php"><img src="../module/images/menu/workinfo.png"></a></li>
<!--<li><a href="../service/"><img src="../module/images/menu/service.png"></a></li>-->
<li>サービスは消してます</li>
<li><a href="../company/about.php"><img src="../module/images/menu/companyinfo.png"></a></li>
<div class="clear"></div>
</ul>
</nav>
</header>