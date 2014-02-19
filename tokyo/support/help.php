<?PHP
	$pageTitle = "お問い合せ";
	require_once("../module/header.php");
?>

<div class="movieTitle">
  <h2>お問い合わせ<small>Inquiry</small></h2>
</div>
<!--メインコンテンツが先、ナビ部分は後-->
<div id="mainContent" class="mtb20"><!--メインコンテンツ-->
  <div id="menuPB">
    <div id="menuPBContent">
      <div id="menuPBMainContent">
      <!-- MainContent -->
        <div id="aboutHelp" class="contentBox">
          <div class="movieTitle">
            <h3>お問い合わせについて</h3>
          </div>
          <p class="smallText mtb10">当サイトや予約の方法でわからないことがあればいかの方法でお問い合わせください。お問い合わせの前にかならずよくあるご質問もご確認ください。</p>
        </div>
        
        <div id="mailHelp" class="contentBox mtb20">
          <div class="movieTitle">
            <h3>メールでのお問い合わせ</h3>
          </div>
          <p class="smallText mtb10">メールでお問い合わせの場合は、氏名、件名、内容を必ずご記入ください。</p>
          <p class="bigText mtb10">tokyosupport@halcinema.co.jp</p>
        </div>
        
        <div id="telHelp" class="contentBox mtb20">
          <div class="movieTitle">
            <h3>電話でのお問い合わせ</h3>
          </div>
          <p class="smallText mtb10">電話でお問い合わせの場合は…</p>
          <p class="bigText mtb10">03-3344-5551</p>
        </div>
      <!-- MainContent End -->
      </div>
    </div>
    <div id="menuPBSidebar">
    <!-- Sidebar -->
      <div id="subnav">
        <ul>
          <li><a href="#aboutHelp">お問い合わせについて</a></li>
          <li><a href="#mailHelp">メールでのお問い合わせ</a></li>
          <li><a href="#telHelp">電話でのお問い合わせ</a></li>
        </ul>
      </div>
      <!-- Sidebar End -->
    </div>
  </div>
  <div class="clear"></div>
</div>
<!-- / #mainContent -->
<?PHP
	require_once("../module/footer.php");
?>
