<?PHP
	$pageTitle = "";
	require_once("../module/header.php");
	require_once("../module/functions.php");
?>
<!--上映中映画スクロール-->
<div id="nowScheduleScroll" class="clearfix"><p id="nowScheduleScrollTitle">Next Movie</p>
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
      <li><img src="../module/data/6.png" alt="6" /></li>
		</ul><!-- /.bxslider -->
	</div>
	</div>
<!--スライダー終わり-->
<div id="mainContent"><!--メインコンテンツ-->
  <div id="todaySchedule" class="clearfix">
    <div id="todayScheduleTitle"><p><span class="microText"><?php echo date("Y"); ?>/</span><span class="bigText"><?php echo date("m/d"); ?></span><br><span class="microText">本日の上映スケジュール</span></p></div>
    <div id="todayScheduleBox" class="clearfix">
      <?php
			$todayScheduleSql = "SELECT cinema_master.cinema_name AS cinemaName , cinema_master.cinema_id AS cinemaID , cinema_master.main_photo AS cinemaImage , show_schedule.screen_id AS screenId FROM cinema_master INNER JOIN show_schedule ON cinema_master.cinema_id = show_schedule.cinema_id WHERE show_schedule.show_day='".date("Y-m-d")."' GROUP BY cinema_master.cinema_name ORDER BY show_schedule.screen_id ASC";
			$todayScheduleResult = mysqli_query($con,$todayScheduleSql);
      while($todayScheduleRow = mysqli_fetch_array($todayScheduleResult)):
			?>
      <a href="../movie/details.php?id=<?php echo $todayScheduleRow["cinemaID"]; ?>">
        <div class="todayScheduleEachBox clearfix">
          <div class="todayScheduleEachImage">
            <img src="../movie/images/<?php echo $todayScheduleRow["cinemaImage"]; ?>">
          </div>
          <div class="todayScheduleEachInfo">
            <p class="todayScheduleEachScreen">
              SCREEN<?php echo substr($todayScheduleRow["screenId"],-1,1); ?>
            </p>
            <p class="todayScheduleEachCinemaName">
              <?php echo $todayScheduleRow["cinemaName"]; ?>
            </p>
            <ul class="todayScheduleEachScheduleTime">
              <?php
              $resultSchedule =mysqli_query($con,"SELECT * FROM show_schedule WHERE show_day='".date('Y-m-d')."' AND cinema_id = '".$todayScheduleRow["cinemaID"]."' ORDER BY  start_time ASC");
              while(($rowSchedule = mysqli_fetch_array($resultSchedule)) != false){
                if(date("H:i")>=date("H:i",strtotime($rowSchedule[3]))){
                  echo "<li class='todayScheduleEachScheduleTimeEnd'>".date("H:i",strtotime($rowSchedule[3]))."</li>";
                }else{
                  echo "<li>".date("H:i",strtotime($rowSchedule[3]))."</li>";
                }
              }
              ?>
            </ul>
          </div>
        </div>
      </a>
      <?php 
        endwhile;
      ?>
    </div>
	</div><!-- todaySchedule End -->
  <div class="clearfix">
    <div id="meinContentLeft">
      <div id="comingsoonMovie">
        <div class="topTitle">
          <h2>今後の上映予定作品<small>Coming soon</small></h2>
        </div>
        <?php
        $comingsoonSql = "SELECT cinema_id, cinema_name, movie_director, movie_perfomer, main_photo ,start_day FROM cinema_master WHERE start_day > '".date("Y-m-d")."' ORDER BY start_day ASC";
        $comingsoonResult = mysqli_query($con,$comingsoonSql);
        while(($comingsoonRow = mysqli_fetch_array($comingsoonResult)) != false):
        ?>
        <a href="../movie/details.php?id=<?php echo $comingsoonRow["cinema_id"]; ?>">
          <div class="comingsoonEachBox clearfix">
            <div class="todayScheduleEachImage">
              <img src="../movie/images/<?php echo $comingsoonRow["main_photo"]; ?>">
            </div>
            <div class="todayScheduleEachInfo">
              <p class="todayScheduleEachScreen">
                <?php echo date("m月d日",strtotime($comingsoonRow["start_day"])); ?>公開予定
              </p>
              <p class="todayScheduleEachCinemaName">
                <?php echo $comingsoonRow["cinema_name"]; ?>
              </p>
            </div>
          </div>
        </a>     					
        <?php
        endwhile;
        mysqli_close($con);
        ?>
      </div>
      <div id="whatsnew">
        <div class="topTitle">
          <h2>HALCinemaからのお知らせ<small>Information.</small></h2>
        </div>
        <ul>
          <li>02月26日･･･「ホビット　竜に奪われた王国」ハイ・フレーム・レート３Ｄ上映決定！</li>
          <li>01月30日･･･消費税率引き上げに伴う鑑賞料金の改定について</li>
          <li>01月20日･･･シアターカルチャーマガジン「H.」生田斗真が表紙に登場！</li>
          <li>01月16日･･･第86回アカデミー賞ノミネート作品発表！最多ノミネートは「アメリカン・ハッスル」＆「ゼロ・グラビティ」！</li>
          <li>09月12日･･･“紙兎ロペ”マジヤバ！フレーバーポップコーン＆ドリンク発売！</li>
        </ul>
      </div>
    </div>
    <div id="meinContentRight">
      <div id="rankingMovie">
        <div class="topTitle">
          <h2>公式Twitter<small>Twitter</small></h2>
        </div>
        <div id="twitterBox">
          <a class="twitter-timeline"  href="https://twitter.com/HALCinema2014"  data-widget-id="440096283261280256">@HALCinema2014 からのツイート</a>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
        </div>
      </div>
    </div>
  </div>
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
