<?PHP
  $pageTitle="上映スケジュール一覧";
  require_once("../header.php");
  require_once("../../tokyo/module/functions.php");
  $con = getConnection();
?>

  <!-- main start -->
    <h2>スケジュールリスト</h2>
    <!-- movie list table -->
    <table class="table table-striped table-bordered table-condensed listTable">
      <thead>
        <tr>
          <th>上映ID</th>
          <th>映画名</th>
          <th>上映日</th>
          <th>上映開始時間</th>
          <th>上映終了時間</th>
          <th>スクリーン</th>
        </tr>
      </thead>

      <tbody>
        <?PHP
          //現ページを取得(ない場合は1)
          $index = 1;
          if (isset($_GET["page"])) {
            $index = $_GET["page"];
          }

          $listSelect = "SELECT * FROM show_schedule INNER JOIN cinema_master ON show_schedule.cinema_id = cinema_master.cinema_id ORDER BY show_schedule.show_day DESC , show_schedule.start_time DESC  LIMIT ". $index*50 .",50";
          $listSelectResult = mysqli_query($con, $listSelect);

          if ($listSelectResult != false):
            while(($rowList = mysqli_fetch_array($listSelectResult)) != false):
            //上映時間演算
  					$showTime=ceil($rowList["running_time"]/10)*10;
	  				$showTimeJp=$showTime." minute";//上映終了時間計算

        ?>
        <tr>
          <td><?PHP echo $rowList["show_id"]; ?></td>
          <td><a href="details.php?id=<?PHP echo $rowList["show_id"]; ?>"><?PHP echo $rowList["cinema_name"]; ?></a></td>
          <td><?PHP echo $rowList["start_day"]; ?></td>
          <td><?PHP echo substr($rowList["start_time"],0,5); ?></td>
          <td><?PHP echo date("H:i",strtotime($showTimeJp,strtotime($rowList["start_time"])));?></td>
          <td>スクリーン<?PHP echo substr($rowList["screen_id"],5,1); ?></td>
        </tr>
        <?PHP endwhile; endif; ?>
      </tbody>

    </table>

    <!-- 前へボタン -->
    <div class="btn-group">
    <?PHP if ($_GET["page"] != 1 && isset($_GET["page"])): //もし１ページじゃ無かったら前へを表示?>
    <a class="btn btn-default" href="list.php?page=<?PHP echo $_GET["page"]-1; ?>" >前へ</a>
    <?PHP endif; ?>
    </div>

    <!-- ページングボタン -->
    <div class="btn-group">
    <?php
      //ページング用SQL
      $pageCountSql = "SELECT COUNT(*) FROM show_schedule";
      $pageCountResult = mysqli_query($con, $pageCountSql);
      $rowCount = mysqli_fetch_array($pageCountResult);

      /*------------------------------
               ページング処理
      ------------------------------*/

      $startPage = $index-10;
      if($startPage < 1){
        $startPage = 1;
      }

      for ($count = $startPage; $count < $index; $count++):
    ?>
      <a class='btn btn-default' href='list.php?page=<?PHP echo $count;?>'><?PHP echo $count; ?></a>
    <?PHP endfor; ?>
    <?PHP

      $lastPage = $index+10;
      if ($lastPage > ceil($rowCount[0]/50)) {
        $lastPage = ceil($rowCount[0]/50);
      }

      for ($count = $index; $count < $lastPage; $count++):
    ?>
    <?PHP if ($index == $count): ?>
      <span class='btn btn-default current'><?PHP echo $count; ?></span>
    <?PHP else: ?>
      <a class='btn btn-default' href='list.php?page=<?PHP echo $count;?>'><?PHP echo $count; ?></a>
    <?PHP endif; endfor; ?>
    </div>

    <!-- 次へボタン -->
    <div class="btn-group">
    <?PHP
      if ($_GET["page"] != $count-1): //もし最後のページじゃなかったら表示
        if (isset($_GET["page"])) {
          $afterPage = $_GET["page"];
        } else {
          $afterPage = 1;
        }
    ?>
    <a class="btn btn-default" href="list.php?page=<?PHP echo $afterPage+1; ?>" >次へ</a>
    <?PHP endif; ?>
    </div>
    <!-- /movie list table -->
  <!-- main end -->

<?PHP
  require_once("../footer.php");
?>

