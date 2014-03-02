<?PHP
	$pageTitle = "予約一覧 - MyPage";
	require_once("../module/reserveHeader.php");
?>
<div id="content" class="m10 clearfix">
  <div class="reserveTitle">
    <h2>MyPage</h2>
  </div>
  <div id="mypageMein">
    <div class="reserveTitle mtb15">
      <h3>予約一覧</h3>
    </div>
    <?php
    $con = getConnection();
    $count=0;
    mysqli_set_charset($con,'utf8');
    if(isset($_SESSION["userid"])){
      $result =mysqli_query($con,"SELECT * FROM reserve_master WHERE user_id = '".$_SESSION["userid"] ."' ORDER BY reserve_time DESC");
      while($row = mysqli_fetch_array($result)):
        $count++;
    ?>
        <div class='reserveEachBox clearfix'>
          <div class='reserveBoxLeft'>
            <p><?php echo $count; ?></p>
          </div>
          <div class='reserveBoxRight clearfix'>
            <div class='reserveInfoBoxLeft'>
              <p class='reserveTitle'>予約日時</p>
              <p class='reserveDate'><?php echo $row["reserve_time"]; ?></p>
              <p class='reserveTitle'>予約番号</p>
              <p class='reserveNumber'><?php echo $row["reserve_number"]; ?></p>
            </div>
            <div class='reserveInfoBoxRight'>
              <p class='reserveTitle'>予約映画･上映時間</p>
              <?php
              $movieSelectSql = "SELECT show_id FROM movie_reserve_content WHERE reserve_number='".$row["reserve_number"]."' GROUP BY reserve_number";
              $movieSelectResult = mysqli_query($con,$movieSelectSql);
              $movieSelectRow = mysqli_fetch_array($movieSelectResult);
              $scheduleSelectSql = "SELECT show_schedule.show_id AS showID , show_schedule.screen_id AS SID , show_schedule.show_day AS showDay , show_schedule.start_time AS startTime , cinema_master.cinema_name AS movieName FROM show_schedule INNER JOIN cinema_master ON show_schedule.cinema_id=cinema_master.cinema_id WHERE show_schedule.show_id='".$movieSelectRow["show_id"]."'";
              $scheduleSelectResult = mysqli_query($con,$scheduleSelectSql);
              $scheduleSelectRow = mysqli_fetch_array($scheduleSelectResult);
              ?>
              <p class='reserveMovie'>
                <span class="reserveMovieName">
                  <?php echo $scheduleSelectRow["movieName"]; ?>
                </span><br>
                <span class="reserveMovieTime">
                  <?php echo str_replace("-","/",$scheduleSelectRow["showDay"])." ".substr($scheduleSelectRow["startTime"],0,5); ?>
                </span>
              </p>
              <p class='reserveTitle'>スクリーン</p>
              <p class='reserveScreen'>
                SCREEN<?php echo substr($scheduleSelectRow["SID"],-1,1); ?>
              </p>
              <p class='reserveTitle'>座席（座席種別）</p>
              <?php
              $seatSelectSql = "SELECT * FROM movie_reserve_content INNER JOIN movie_price_master ON movie_reserve_content.movie_price_id = movie_price_master.movie_price_id WHERE movie_reserve_content.reserve_number = '".$row["reserve_number"]."'";
              $seatSelectResult = mysqli_query($con,$seatSelectSql);
              while(($seatSelectRow = mysqli_fetch_array($seatSelectResult)) != false):
              ?>
              <p class='reserveEachSeat'>
                <?php echo $seatSelectRow["seat_number"]; ?>
                <span class='microText'>(
                  <?php echo $seatSelectRow["movie_price_name"]; ?>
                )</span>
              </p>
              <?php endwhile; ?>
              </div>
            </div>
          </div>
          <?php
              endwhile;
            }else{
              header('Location: login.php');//ログイン処理無効化
            }
            mysqli_close($con);	

            if($count==0){
              echo "予約された映画はありません";
            }
          ?>
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
	require_once("../module/reserveFooter.php");
?>