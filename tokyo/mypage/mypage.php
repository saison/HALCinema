<?PHP
	$pageTitle = "MyPage";
	require_once("../module/reserveheader.php");
?>
<div id="content" class="m10 clearfix">
  <div class="reserveTitle">
    <h2>MyPage</h2>
  </div>
  <div id="mypageMein">
    <p class="mtb10">ようこそ<?php echo $_SESSION["userid"]; ?>さん！</p>
    <p class="smallText mtb10">MyPageでは予約した映画一覧･アカウント情報の閲覧、修正を行うことが出来ます。</p>
      
    <div class="reserveTitle mtb15">
      <h3>HALCinemaからのお知らせ</h3>
    </div>
    <p class="smallText mtb10">02月27日･･･<a href="">消費税率引き上げに伴う鑑賞料金の改定について</a></p>
  </div>
  <div id="mypageNav" class="mtb15">
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