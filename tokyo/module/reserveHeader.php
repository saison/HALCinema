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

		//スタイルシートのファイルパス
		if(file_exists("../module/css/style.css")){
			echo "<link rel='stylesheet' href='../module/css/reserveStyle.css' />\n";
		}
		echo '<link rel="stylesheet" type="text/css" href="../module/css/reset.css">'."\n";
		//個別CSSの設定
		if(file_exists("../module/css/".$filename.".css")){
			echo "<link rel='stylesheet' href='../module/css/".$filename.".css' />\n";
		}
	?>

	<script src="../module/js/jquery-1.9.1.js"></script>
	<script src="../module/js/jquery-ui-1.10.3.custom.min.js"></script>
	<script src="../module/js/jquery.easing.1.3.js"></script>
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
<h1><a href="../top/index.php"><img src="../module/images/reserveLogo.png" alt="HALCinema"></a></h1>
<div id="progressBar"><!--ここにBar--></div>
<div class="clear"></div>
</div>
</header>