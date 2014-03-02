<?PHP
	$pageTitle="TOP";
	require_once("../header.php");
?>
<!-- ▼作成時のみ表示▼ 
<blockquote>
  <p class="bg-info"><a href="../developer/sitemap.php">【開発者専用】サイトマップ(FE/BE)はここから</a></p>
</blockquote>
<blockquote>
  <p class="bg-info"><a href="../developer/frontParts.php">【開発者専用】ユーザ側(FE)パーツリストはここから</a></p>
</blockquote>
<blockquote>
	 <p>PDFの作成については<a href="https://docs.google.com/spreadsheet/ccc?key=0AgvRmkGL_iUQdFl3ZndTVWVzSG0yLVZ3dVhycTYxUVE&usp=drive_web#gid=2" target="_blank" >PDF作成ページの仕様</a>を見てください</p>
  </blockquote>

 ▲作成時のみ表示▲ -->

	<h2>HALCinema管理画面</h2>
			<h3>今日の上映映画</h3>
      
      <?php
      $con=getConnection();
			$todayScheduleSql = "SELECT cinema_master.cinema_name AS cinemaName , cinema_master.cinema_id AS cinemaID , cinema_master.main_photo AS cinemaImage , show_schedule.screen_id AS screenId FROM cinema_master INNER JOIN show_schedule ON cinema_master.cinema_id = show_schedule.cinema_id WHERE show_schedule.show_day='".date("Y-m-d")."' GROUP BY cinema_master.cinema_name ORDER BY show_schedule.screen_id ASC";
			$todayScheduleResult = mysqli_query($con,$todayScheduleSql);
      while($todayScheduleRow = mysqli_fetch_array($todayScheduleResult)):
			?>
      <a href="../movie/details.php?id=<?php echo $todayScheduleRow["cinemaID"]; ?>">
        <div class="todayScheduleEachBox clearfix">
          <div class="todayScheduleEachImage">
            <img src="../../tokyo/movie/images/<?php echo $todayScheduleRow["cinemaImage"]; ?>">
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

<?PHP
	require_once("../footer.php");
?>
