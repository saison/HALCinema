<?PHP
	require_once("../module/functions.php");
?>
<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8" />
	<?PHP
		//スタイルシートのファイルパス
		if(file_exists("../module/css/style.css")){
			echo "<link rel='stylesheet' href='../module/css/style.css' />\n";
		}

		//jsのファイルパス
		if(file_exists("../module/js/script.js")){
			echo "<script src='../module/js/script.js'></script>\n";
		}

		$pageTitle="";
	?>
	<title><?PHP if($pageTitle != ""){ echo $pageTitle." | "; } ?>HALCinema</title>
</head>
<body>