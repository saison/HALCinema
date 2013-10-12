<?PHP
	$pageTitle = "";
	require_once("../module/header.php");
?>
<div id="mainContent"><!--メインコンテンツ-->
  <div class="row-fluid"><!--スライダー（プロトでは未実装）-->
    <div class="pagination-centered">
      <div id="myslider0" class="juicyslider">
        <ul>
          <li><a href=""><img src="../module/data/0.jpg" alt=""></a></li>
          <li><img src="../module/data/2.jpg" alt=""></li>
          <li><img src="../module/data/4.jpg" alt=""></li>
        </ul>
        <div class="nav next"></div>
        <div class="nav prev"></div>
        <div class="mask"></div>
      </div>
    </div>
  </div>
  <!--スライダー終わり-->
  <div id="nowScheduleScroll">現在上映中映画Scroll</div>
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
<?PHP
	require_once("../module/footer.php");
?>