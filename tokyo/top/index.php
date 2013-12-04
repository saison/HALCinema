<?PHP
	$pageTitle = "";
	require_once("../module/header.php");
?>
<!--上映中映画スクロール-->
<div id="nowScheduleScroll" class="clearfix"><p id="nowScheduleScrollTitle">NowShowing!</p>
	<!--上映中映画scroll。.scrollStrongをspanに当てることで太字&色が変わります -->
	<div id="s2" class="es">
		<span class="screenStrong">Screen1</span>
		･･･12:00~14:30　
		<span class="scrollStrong">スター・トレック　イントゥ・ダークネス</span>　　　　　
		<span class="screenStrong">Screen1</span>
		･･･12:00~14:30　
		<span class="scrollStrong">スター・トレック　イントゥ・ダークネス</span>　　　　　
		<span class="screenStrong">Screen1</span>
		･･･12:00~14:30　
		<span class="scrollStrong">スター・トレック　イントゥ・ダークネス</span>　　　　　
	</div>
</div>
<!--上映中映画スクロール終わり-->
<!--スライダー-->
<div id="sliderBox">
	<div>
		<ul id="topSlider" class="bxslider">
			<li><img src="../module/data/1.png" alt="1" /></li>
			<li><img src="../module/data/2.png" alt="2" /></li>
			<li><img src="../module/data/3.png" alt="3" /></li>
			<li><img src="../module/data/4.png" alt="4" /></li>
            <li><img src="../module/data/5.png" alt="5" /></li>
		</ul><!-- /.bxslider -->
	</div>
	</div>
<!--スライダー終わり-->
<div id="mainContent"><!--メインコンテンツ-->
  <div id="todaySchedule">
    <div class="topTitle">
      <h2><img src="images/nowshowingTitle.png" alt="今日の上映スケジュール"></h2>
    </div>
    <div class="titleBar"></div>
    今日の上映スケジュール（ここに映画予約リンクを貼る） </div>
  <div id="meinContentLeft">
    <div id="comingsoonMovie">
      <div class="topTitle">
        <h2><img src="images/comingsoonTitle.png" alt="今後の上映予定作品"></h2>
      </div>
      <div class="titleBar"></div>
    </div>
    <div id="whatsnew">
      <div class="topTitle">
        <h2><img src="images/infoTitle.png" alt="HALCINEMAからのお知らせ"></h2>
      </div>
      <div class="titleBar"></div>
      <ul>
	      <li>09月20日･･･テストテストテストテスト</li>
	      <li>09月20日･･･テストテストテストテスト</li>
	      <li>09月20日･･･テストテストテストテスト</li>
	      <li>09月20日･･･テストテストテストテスト</li>
	      <li>09月20日･･･テストテストテストテスト</li>
      </ul>
    </div>
  </div>
  <div id="meinContentRight">
    <div id="rankingMovie">
      <div class="topTitle">
        <h2><img src="images/rankingTitle.png" alt="今週の映画ランキング"></h2>
      </div>
      <div class="titleBar"></div>
    </div>
  </div>
  <div class="clear"></div>
</div>
<script src="js/endless_scroll.js" type="text/javascript"></script>
<script type="text/javascript">
    $(window).load(function () {
        $("#s2").endlessScroll({ width: '100%', height: '26px', steps: -2, speed: 30, mousestop: false });
    });
</script>
<?PHP
	require_once("../module/footer.php");
?>