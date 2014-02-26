<?PHP
	require_once('../../tokyo/module/functions.php');
  if (!isset($_SESSION["userID"])) {
    header("location:../login/index.php?error=session");
    exit();
}
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
				<?php
					$pageurl=array("../top/","../movie/list.php","../movie/register.php","../schedule/list.php","../schedule/register.php","../schedule/csvRegister.php","../user/list.php","../pdf/index.php","../developer/sitemap.php","../developer/frontParts.php");
					$paget=array("TOP","映画一覧","映画登録","上映スケジュール一覧","上映スケジュール登録","上映スケジュールCSV登録","ユーザ一覧","PDF出力","【開発者】サイトマップ(FE/BE)","【開発者】パーツ一覧");
				for($i=0;$i<count($paget);$i++){
					if($pageTitle==$paget[$i]){
						echo "<li class='current'>".$paget[$i]."</li>\r\n";
					}else{
						echo "<li><a href='".$pageurl[$i]."'>".$paget[$i]."</a></li>\r\n";
					}
				}
				?>
			</ul>
		</nav>
	</aside>

	<div id="mainContent">
