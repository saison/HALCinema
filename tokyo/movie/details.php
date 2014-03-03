<?PHP
  $pageTitle="作品案内";
	require_once("../module/header.php");
  if(!isset($_GET['id'])){
	 header("location:../top/error.php");
  }else{
    $cinema_id=$_GET['id']; //上映IDを$cinemaに格納
  }
?>
<div class="movieTitle">
  <h2>作品案内<small>Work Info.</small></h2>
</div>
<div id="mainContent" class="mtb15"><!--メインコンテンツ-->
<?php	
$todayDate=date("Y-m-d");
$con=getConnection();
mysqli_set_charset($con,'utf8');
$isSuccess =mysqli_select_db($con, 'halcinema');
$result =mysqli_query($con,"SELECT * FROM cinema_master WHERE cinema_id='$cinema_id'");
$row = mysqli_fetch_array($result);	
?>
<div class="movieDetailBox clearfix">
  <div class='movieDetailImg'>
    <img src='images/<?php echo $row["main_photo"]; ?>'>
  </div>
  <div class='movieDetailAbout'>
    <h3><?php echo $row["cinema_name"]; ?></h3>
    <div class="movieTitle">
      <h4>映画詳細</h4>
    </div>
    <p class="smallText mtb5"><?php echo $row["cinema_description"]; ?></p>
    <p class="smallText mtb5"><span class="textCaption">監督</span><?php echo $row["movie_director"]; ?></p>
    <p class="smallText mtb5"><span class="textCaption">出演者</span><?php echo $row["movie_perfomer"]; ?></p>
    <p class="smallText mtb5"><span class="textCaption">上映時間</span><?php echo $row["running_time"]; ?>分</p>
  </div>
</div>
<div class="moviePhotogallery mtb15">
  <div class="movieTitle">
    <h4>フォトギャラリー</h4>
  </div>
  <?php
		if(!$row["sub_photo1"]==""){
			echo "<img src='images/". $row["sub_photo1"] ."' width='225' height='165'>";
		}else{
			echo "<p>フォトギャラリーはありません</p>";	//sub1に無かったら2-4もないのが大前提
		}
		if(!$row["sub_photo2"]==""){
			echo "<img src='images/". $row["sub_photo2"] ."' width='225' height='165'>";
		}
		if(!$row["sub_photo3"]==""){
			echo "<img src='images/". $row["sub_photo3"] ."' width='225' height='165'>";
		}
		if(!$row["sub_photo4"]==""){
			echo "<img src='images/". $row["sub_photo4"] ."' width='225' height='165'>";
		}
  ?>
</div>
<div id='movieDatailsSchedule'>
  <div class="movieTitle">
    <h4>HALCinema Tokyo 上映スケジュール</h4>
  </div>
  <?php
  mysqli_set_charset($con,'utf8');
  $isSuccess =mysqli_select_db($con, 'halcinema');
  $result =mysqli_query($con,"SELECT screen_id FROM show_schedule WHERE cinema_id='$cinema_id' GROUP BY cinema_id");
  $screen = mysqli_fetch_array($result);	
  ?>
  <p id="screen" class="largeText mtb10">
    <?php
      if($screen["screen_id"]==""){
        echo "スクリーン未定";
      }else{
        echo "SCREEN".mb_substr($screen["screen_id"],5,1);
      }
    ?>
  </p>
  
  <!-- ここから上映スケジュール -->
  <?php
  $dayCount=0;
  while($dayCount<7){
    $scheduleFlag = false;
    $Date = date('Y-m-d', strtotime("+ $dayCount days"));//日付
    echo "<div class='movieScheduleEachBox mtb15 clearfix'>";
    echo "<p class='movieScheduleDayTitle'>".date("m/d",strtotime($Date))."</p>";
    //上映時間の計算　　　例)終了時間の割り出しの際に　135分の映画は140分として計算する。
    $showTime=ceil($row[4]/10)*10;
    $resultSchedule =mysqli_query($con,"SELECT * FROM show_schedule  WHERE show_day='$Date' AND cinema_id = '$row[0]' ORDER BY  start_time ASC");
    while(($rowSchedule = mysqli_fetch_array($resultSchedule)) != false){
      $scheduleFlag = true;
      $showTimeJp=$showTime." minute";//上映終了時間計算
      $endTime=date("H:i",strtotime($showTimeJp,strtotime($rowSchedule[3])));//上映終了時間
      if($dayCount==0 and date("H:i")>=date("H:i",strtotime($rowSchedule[3]))){
        echo "<p class='movieScheduleEach mlr10 movieScheduleEachEnd'>";
      }else{
        echo "<p class='movieScheduleEach mlr10'>";
        echo "<a href ='../reserve/seat.php?id=".$rowSchedule[0]."'>";
      }
      echo "<span class='tableEachMovieStart'>".date("H:i",strtotime($rowSchedule[3]))." </span><br />～ ";
      echo $endTime;
      echo "</a>";
      echo "</p>";
    }
    if($scheduleFlag == false){
     echo "<p class='smallText plr10'>上映予定はありません</p>"; 
    }
    echo "</div>";		
    $dayCount++;
  }
	
	//サーバー切断
	mysqli_close($con);
?>
</div>
<p class="smallText mtb10">※上映終了時刻はあくまでも予定です。</p>

</div>
<?PHP
	require_once("../module/footer.php");
?>