<?PHP
	$pageTitle = "お問い合せ";
	require_once("../module/header.php");
?>

<!--メインコンテンツが先、ナビ部分は後-->
<div id="mainContent"><!--メインコンテンツ-->
  <div class="contentTitle">
    <h2>お問い合わせ<br />
      <span class="h2En">inquiry</span></h2>
  </div>
  <!-- ここからcontent -->
  <!-- ここh2タイトル -->
  <div class="clearfix">
    <div id="subnav"><!-- w200px -->
    	<ul>
        	<li><a href="#aboutHelp">お問い合わせについて</a></li>
            <li><a href="#mailHelp">メールでのお問い合わせ</a></li>
            <li><a href="#telHelp">電話でのお問い合わせ</a></li>
    	</ul>
    </div>
    <div id="rightMeinContent"><!-- w950px m-l30px -->
      <!-- お問い合わせについて -->
      	<h3 class="ribbon" id="aboutHelp">お問い合わせについて</h3>
      <div class="shopContents">
      	<p>当サイトや予約の方法でわからないことがあれば…</p>
      	<br />
      </div>

      <!-- メールでのお問い合わせ -->
      <div class="shopH3Title">
      	<h3 class="ribbon" id="mailHelp">メールでのお問い合わせ</h3>
      </div>
      <div class="shopContents">
      	<p>メールでお問い合わせの場合は、氏名、件名…</p>
      	<br />
      	<p>tokyosupport@halcinema.co.jp</p>
      </div>

      <!--電話でのお問い合わせ -->
      <div class="shopH3Title">
      	<h3 class="ribbon" id="telHelp">電話でのお問い合わせ</h3>
      </div>
      <div class="shopContents">
      	<p>電話でお問い合わせの場合は…</p>
      	<br />
      	<p>03-3344-5551</p>
      </div>
      
    </div>
  </div>
</div>
<!-- / #mainContent -->
<?PHP
	require_once("../module/footer.php");
?>
