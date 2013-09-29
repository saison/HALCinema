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
		echo '<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.12.0/build/cssreset/cssreset-min.css">'."\n";
		//個別CSSの設定
		if(file_exists("../module/css/".$filename.".css")){
			echo "<link rel='stylesheet' href='../module/css/".$filename.".css' />\n";
		}

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
<h1><img src="../module/images/reserveLogo.png" alt="HALCinema"></h1>
<div id="progressBar">ここにBar</div>
<div class="clear"></div>
</div>
</header>