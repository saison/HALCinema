<?PHP
	$pageTitle = "MyPage";
	require_once("../module/reserveheader.php");
?>
<div id="content">
<h2>MyPage</h2>
<p>MyPageに入る予定のコンテンツです。以下のリンクで飛びますのでそれでチェックしてください。</p>
<ul>
<li><a href="reserveView.php">予約一覧（現在予約してある・過去の予約）</a></li>
<li><a href="show.php">アカウント情報･アカウント情報修正</a></li>
</ul>
</div>
<?PHP
	require_once("../module/reservefooter.php");
?>