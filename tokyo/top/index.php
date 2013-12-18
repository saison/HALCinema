<?PHP
	$pageTitle = "";
	require_once("../module/header.php");
	require_once("../module/functions.php");
?>
<!--上映中映画スクロール-->
<div id="nowScheduleScroll" class="clearfix"><p id="nowScheduleScrollTitle">NowShowing!</p>
	<!--上映中映画scroll。.scrollStrongをspanに当てることで太字&色が変わります -->
	<div id="s2" class="es">
    <?php
	//日付取得
	$todayDate=date("Y-m-d");
	//現在の時間
	$nowTime=date("H:i");
	//一時間先の時間（今より一時間より先の映画しか予約できない。）
	$canReserveMovieStartTime=date('H:i', strtotime('+1 hour ' . $nowTime));
	//上映中の映画情報取得
	$con=getConnection();
	$selectShowSheduleSql="SELECT cinema_id , screen_id, MIN(start_time) , show_day FROM show_schedule WHERE show_day >= '{$todayDate}' AND start_time >= '{$canReserveMovieStartTime}' GROUP BY  screen_id ORDER BY  screen_id ";
	$selectResultShowDate = mysqli_query($con,$selectShowSheduleSql);
	while(($row = mysqli_fetch_array($selectResultShowDate)) != false){
		//スクリーン番号
		$scNum=mb_substr($row[1],5,1);
		//cinema_idをもとに上映時間と映画名をもってくる。
		$selectMovieSql ="SELECT cinema_name , running_time FROM cinema_master WHERE cinema_id = '{$row[0]}' ";
		$selectResultMovieDate = mysqli_query($con,$selectMovieSql);
		while(($rowMovie = mysqli_fetch_array($selectResultMovieDate)) != false){
			//上映時間の計算
			$showTime=ceil($rowMovie[1]/10)*10;
			//映画名
			$movieName = $rowMovie[0];
		}
		//上映開始時間
		$startTime = mb_substr($row[2],0,5);
		//上映終了時間
		$showTimeJp=$showTime." minute";
		$endTime = date("H:i",strtotime($showTimeJp,strtotime($startTime)));//上映終了時間
		echo "<span class='screenStrong'>Screen".$scNum."</span>･･･".$startTime."~".$endTime."　<span class='scrollStrong'>".$movieName."　　</span>";
		
	}
	//切断
	 mysqli_close($con);	
    ?>
		　
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