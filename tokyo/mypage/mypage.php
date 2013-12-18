<?PHP
	$pageTitle = "MyPage";
	require_once("../module/reserveheader.php");
?>
<div id="content" class="clearfux">
<div id="mypageMein">
<h2>MyPage</h2>
<h3>予約一覧（今後上映予定作品のみ）</h3>
<p>MyPageに入る予定のコンテンツです。以下のリンクで飛びますのでそれでチェックしてください。</p>
<ul>
<li><a href="reserveView.php">予約一覧（現在予約してある・過去の予約）</a></li>
<li><a href="show.php">アカウント情報･アカウント情報修正</a></li>
</ul>
</div>
<div id="mypageNav">
<nav>
<ul>
<li><a href="mypage.php"><img src="images/mypagetop.png" alt="MypageTOP"></a></li>
<li><a href="reserveView.php"><img src="images/reserveall.png" alt="予約一覧"></a></li>	
<li><a href="show.php"><img src="images/accountinfo.png" alt="アカウント情報"></a></li>	
</ul>	
</nav>
</div>
</div>
<?PHP
	require_once("../module/reservefooter.php");
?>