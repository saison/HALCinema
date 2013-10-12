<?PHP
	require_once("../module/functions.php");
?>
<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8" />
	<?PHP
		//各ファイル名の取得
		$filename = basename($_SERVER["PHP_SELF"],".php");
	?>
	<link rel='stylesheet' type='text/css' href='../module/css/style.css' />
	<script src="../module/js/jquery-1.9.1.js"></script>
	<script src="../module/js/jquery-ui-1.10.3.custom.min.js"></script>
	<script type="text/javascript" src="../module/js/juicyslider.js"></script>
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
	<title><?PHP if($pageTitle != ""){ echo $pageTitle." | "; } ?>HALCinema</title>
</head>
<body>
<header>
<div id="headerIn">
<h1><a href="../top/index.php"><img src="../module/images/reserveLogo.png"></a></h1>
<div id="login">
<?php
if(isset($_SESSION["userid"])){
	echo "<p><strong><a href='../mypage/reserveView.php'>ようこそ".$_SESSION["userid"]."さん！</a></strong></p><p id='logout'><a href='../top/logout.php'>ログアウト</a></p>";
}else{
	echo '<a href="../mypage/login.php"><img src="../module/images/login.png" alt="ログイン&新規会員登録"></a>'."\n";
}
?>
</div>
<div class="clear"></div>
</div>
<nav>
<ul>
<li><a href="../shop/"><img src="../module/images/menu/theaters.png"></a></li>
<li><a href="../movie/movie.php"><img src="../module/images/menu/workinfo.png"></a></li>
<li><a href="../service/"><img src="../module/images/menu/service.png"></a></li>
<li><a href="../company/about.php"><img src="../module/images/menu/companyinfo.png"></a></li>
<div class="clear"></div>
</ul>
</nav>
</header>