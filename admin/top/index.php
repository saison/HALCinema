<?PHP
	$pageTitle="TOP";
	require_once("../header.php");
?>

<blockquote>
  <p class="bg-info"><a href="../developer/sitemap.php">【開発者専用】サイトマップ(FE/BE)はここから</a></p>
</blockquote>
	<h2>HALCinema管理画面</h2>

	<div class="row">
  	<div class="col-md-4">
			<h3>現在上映している映画</h3>
      <ul>
      <?php
	//現在の時間
	$nowTime=date("H:i");
	//上映中の映画情報取得
	$con=getConnection();
	$selectShowSheduleSql="SELECT * FROM show_schedule WHERE show_day = '".date("Y-m-d")."' AND start_time < ".date("H:i:s")." GROUP BY screen_id ORDER BY screen_id ASC , start_time DESC";
	$selectResultShowDate = mysqli_query($con,$selectShowSheduleSql);
	while(($row = mysqli_fetch_array($selectResultShowDate)) != false){
		//スクリーン番号
		$scNum=mb_substr($row['screen_id'],5,1);
		//cinema_idをもとに上映時間と映画名をもってくる。
		$selectMovieSql ="SELECT cinema_name , running_time FROM cinema_master WHERE cinema_id = '{$row['cinema_id']}' ";
		$selectResultMovieDate = mysqli_query($con,$selectMovieSql);
		while(($rowMovie = mysqli_fetch_array($selectResultMovieDate)) != false){
			//上映時間の計算
			$showTime=ceil($rowMovie[1]/10)*10;
			//映画名
			$movieName = $rowMovie[0];
		}
		//上映開始時間
		$startTime = mb_substr($row['start_time'],0,5);
		//上映終了時間
		$showTimeJp=$showTime." minute";
		$endTime = date("H:i",strtotime($showTimeJp,strtotime($startTime)));//上映終了時間
		echo "<li><span class='screenStrong'>スクリーン".$scNum."</span>･･･".$startTime."~".$endTime."　<span class='scrollStrong'>".$movieName."　　</span></li>";
		
	}
    ?>
        </ul>
		</div>
  	<div class="col-md-8">
			<h3>今日の上映映画</h3>
      <dl class="dl-horizontal">
      <?php
      $con=getConnection();
      $reserveSelectSql = "SELECT cinema_master.cinema_name AS cinemaName , cinema_master.cinema_id AS cinemaID , show_schedule.screen_id AS SID FROM cinema_master INNER JOIN show_schedule ON cinema_master.cinema_id = show_schedule.cinema_id WHERE show_schedule.show_day='".date("Y-m-d")."' GROUP BY cinema_master.cinema_name ORDER BY show_schedule.screen_id ASC";
      $reserveSelectResult = mysqli_query($con,$reserveSelectSql);
      while(($reserveSelectRow = mysqli_fetch_array($reserveSelectResult)) != false){
        echo "<dt>スクリーン".substr($reserveSelectRow["SID"],-1,1)."　<a href='../movie/details.php?id=".$reserveSelectRow["cinemaID"]."'>";
        echo $reserveSelectRow["cinemaName"];
        echo "</a></dt>";
        $reserveSelectSql2 = "SELECT show_schedule.start_time AS showStart FROM cinema_master INNER JOIN show_schedule ON cinema_master.cinema_id = show_schedule.cinema_id WHERE show_schedule.show_day='".date("Y-m-d")."' AND show_schedule.screen_id='".$reserveSelectRow["SID"]."'";
        $reserveSelectResult2 = mysqli_query($con,$reserveSelectSql2);
        while($reserveSelectRow2 = mysqli_fetch_array($reserveSelectResult2)){
          echo "<dd>".substr($reserveSelectRow2["showStart"],0,5)."</dd>";
        }
      }
      ?>
      </dl>
		</div>
	</div>

<?PHP
	require_once("../footer.php");
?>
