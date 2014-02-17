</div>
</div>

<header id="sidebar">
<h1><a href="../top/index.php"><img src="../module/images/logo.png"></a></h1>
<div id="login">
<?php
if(isset($_SESSION["userid"])){
  echo '<p class="loginBt"><a href="../mypage/mypage.php"><img src="../module/images/mypage.png"></a></p>'."\n";
  echo "<p class='loginLink'><a href='../top/logout.php'>＞ ログアウト</a></p>\n";
}else{
  echo '<p class="loginBt"><a href="../mypage/login.php"><img src="../module/images/login.png"></a></p>'."\n";
	echo '<p class="loginBt"><a href="../mypage/login.php"><img src="../module/images/newAccount.png"></a></p>'."\n";
}
?>
</div>
  
<div id="gMenu">
<nav>
<ul class="clearfix">
<li class="theatres"><a href="../shop/shop.php"><img src="../module/images/menu/theaters.png"></a></li>
<li class="workinfo"><a href="../movie/movie.php"><img src="../module/images/menu/workinfo.png"></a></li>
<li class="service"><a href="../shop/serviceday.php"><img src="../module/images/menu/service.png"></a></li>
<li class="companyinfo"><a href="../company/about.php"><img src="../module/images/menu/companyinfo.png"></a></li>
</ul>
</nav>
</div>
</header>

<p id="pagetop"><a href="html"><img src="../module/images/pagetop.png"></a></p>
<footer id="footer" class="clearfix">
<div id="footerLeft">
<nav>
<ul>
<li><a href="../support/faq.php">よくある質問</a></li>	
<li><a href="../support/help.php">お問い合わせ</a></li>	
</ul>	
</nav>
</div>
<div id="footerRight">
<p id="copyright">CopyRight (C) 2013-2014 HALCinema All Rights Reserved.</p>
</div>
</footer>
</div>
</body>
</html>