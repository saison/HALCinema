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
		</div>
  	<div class="col-md-8">
			<h3>今日の上映映画</h3>
      <ul>
      <?php
      $con=getConnection();
			$reserveSelectSql = "SELECT cinema_master.cinema_name AS cinemaName , cinema_master.cinema_id AS cinemaID , show_schedule.screen_id AS SID FROM cinema_master INNER JOIN show_schedule ON cinema_master.cinema_id = show_schedule.cinema_id WHERE show_schedule.show_day='".date("Y-m-d")."' GROUP BY cinema_master.cinema_name ORDER BY show_schedule.screen_id ASC";
			$reserveSelectResult = mysqli_query($con,$reserveSelectSql);
      while(($reserveSelectRow = mysqli_fetch_array($reserveSelectResult)) != false){
		    echo "<li>スクリーン".substr($reserveSelectRow["SID"],-1,1)."　<a href='../movie/details.php?id=".$reserveSelectRow["cinemaID"]."'>";
			 echo $reserveSelectRow["cinemaName"];
			 echo "</a></li>";
      }
			?>
      </ul>
		</div>
	</div>

<?PHP
	require_once("../footer.php");
?>
