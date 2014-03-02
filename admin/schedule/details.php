<?PHP
  $pageTitle="上映スケジュール一覧";
  require_once("../header.php");
  require_once("../../tokyo/module/functions.php");
  $con = getConnection();

  if(isset($_GET['id'])){
    $showId = $_GET['id'];
  }
   $editResult = "";
   if(isset($_GET['edit'])){

     $editResult= "<p>編集完了しました。</p>";

   }
  //映画のスケジュール情報取得
  $scheduleSql = "SELECT * FROM show_schedule WHERE  show_id = '{$showId}'" ;
  $scheduleSqlResult = mysqli_query($con,$scheduleSql);
  $rowScheduleSqlResult=mysqli_fetch_array($scheduleSqlResult);

  $cinemaId = $rowScheduleSqlResult['cinema_id'];
  $screen =  mb_substr($rowScheduleSqlResult['screen_id'],5,1);
  $startTime =mb_substr($rowScheduleSqlResult['start_time'],0,5);
  $showDay = str_replace("-", "/", $rowScheduleSqlResult['show_day']);

  //映画情報の取得
  $movieSql = "SELECT * FROM cinema_master WHERE cinema_id = '{$cinemaId}'";
  $movieSqlResult = mysqli_query($con,$movieSql);
  $rowMovieSqlResult = mysqli_fetch_array($movieSqlResult);

  $cinemaName = $rowMovieSqlResult['cinema_name'];
  $startDay =  str_replace("-", "/", $rowMovieSqlResult['start_day']);
  $endDay =  str_replace("-", "/", $rowMovieSqlResult['end_day']);
  $runningTime = $rowMovieSqlResult['running_time'];
  $cinemaDescription = $rowMovieSqlResult['cinema_description'];
  $movieDirector = $rowMovieSqlResult['movie_director'];
  $moviePerfomer = $rowMovieSqlResult['movie_perfomer'];
  $mainPhoto =   $rowMovieSqlResult['main_photo'];

  //上映時間の計算　　　例)終了時間の割り出しの際に　135分の映画は140分として計算する。
  $showTime=ceil($runningTime/10)*10;
  $showTimeJp=$showTime." minute";//上映終了時間計算
  $endTime=date("H:i",strtotime($showTimeJp,strtotime($startTime)));

  mysqli_close($con);

  $_SESSION['showId'] = $showId;//上映ＩＤ
  $_SESSION['cinemaName'] = $cinemaName;//映画名
  $_SESSION['showDay'] = $showDay;//上映日
  $_SESSION['startTime'] = $startTime;//上映開始時間
  $_SESSION['endTime'] = $endTime;//上映終了時間
  $_SESSION['screen'] = $screen;//スクリーン


?>

    <!-- main start -->
        <link rel='stylesheet' href='../../tokyo/module/css/seat.css' />
        <script src='../../tokyo/module/js/seat.js' /></script>
        <script src="../../tokyo/module/js/jquery.easing.1.3.js"></script>
    <h2><?PHP echo $cinemaName; ?> - スケジュール<a href="schedulePdf.php?id=<?PHP echo $showId;?>" id="editButton" class="btn btn-danger"><span class="glyphicon glyphicon-align-left"></span>PDF作成</a></h2>
    <table class="table table-striped table-bordered table-condensed listTable">
      <thead>
        <tr>
          <th>上映ID</th>
          <th>映画名</th>
          <th>上映日</th>
          <th>上映開始時間</th>
          <th>上映終了時間</th>
          <th>スクリーン</th>
          <th>アクション</th>
        </tr>
      </thead>

      <tbody>
        <!-- ここの中身をループして出してね -->
        <tr>
          <td><?PHP echo $showId;?></td>
          <td><?PHP echo $cinemaName;?></td>
          <td><?PHP  echo $showDay;?> </td>
          <td><?PHP echo $startTime;?></td>
          <td><?PHP echo $endTime;?></td>
          <td>Screen<?PHP echo $screen; ?></td>
          <td>
            <a href="../schedule/edit.php?id=<?PHP echo $showId; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>編集 & 削除</a>
          </td>
        </tr>
        <!-- ここの中身をループして出してね -->
      </tbody>

    </table>

    <h2><?PHP echo $cinemaName; ?> - 詳細<a href="../movie/edit.php?id=<?PHP echo $cinemaId;?>" id="editButton" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>編集 & 削除</a>
</h2>
    <!-- movie details table -->
    <table class="table table-striped table-bordered table-condensed listTable">
      <thead>
        <tr>
          <th>id</th>
          <th>タイトル</th>
          <th>画像</th>
          <th>公開開始日</th>
          <th>公開終了日</th>
          <th>上映時間</th>
          <th class="description">映画説明文</th>
          <th>監督</th>
          <th>出演者</th>
        </tr>
      </thead>

      <tbody>
        <tr>
          <td><?PHP echo $cinemaId;?></td>
          <td><?PHP echo $cinemaName;?></td>
          <td><?PHP echo "<img src='../../tokyo/movie/images/".$mainPhoto."' alt='".$cinemaName."'>"?></td>
          <td><?PHP echo $startDay;?></td>
          <td><?PHP echo $endDay;?></td>
          <td><?PHP echo $runningTime;?>分</td>
          <td class="description"><?PHP echo $cinemaDescription;?></td>
          <td><?PHP echo $movieDirector;?></td>
          <td><?PHP echo $moviePerfomer;?></td>
        </tr>
      </tbody>
    </table>
    <!-- /movie details table -->
        <?php
    if(substr($rowScheduleSqlResult['screen_id'],-1,1) > "6"){
      require_once("./screenTokyo/SC.php");
    }elseif(substr($rowScheduleSqlResult['screen_id'],-1,1) > "3"){
      require_once("./screenTokyo/SB.php");
    }else{
      require_once("./screenTokyo/SA.php");
    }
  ?>
  <!-- main end -->

<?PHP
  require_once("../footer.php");
?>

