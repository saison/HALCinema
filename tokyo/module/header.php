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
  <div id="wrapper">
    <div id="main">
      <div id="content">