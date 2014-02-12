<?PHP
  $pageTitle="上映スケジュール登録";
  require_once("../header.php");
  require_once("../../tokyo/module/functions.php");
  $con = getConnection();

  $pageNow = 1;//映画一覧　ページング
  if(isset($_GET['page'])){
    $pageNow = $_GET['page'];
  }
?>

  <!-- main start -->
  <h2><?PHP echo "上映スケジュール" ?> - 新規追加 - 映画選択<a href="register.php" id="newButton" class="flr btn btn-success"><span class="glyphicon glyphicon-log-in"></span>CSVファイルで追加</a></h2>

    <!-- movie list table -->
    <table id="editTable" class="table table-striped table-bordered table-condensed listTable">
        <?PHP
      //映画件数取得
      $moiveCountPerOnePage =  10;//1ページにつき10件
      $movieSql = "SELECT cinema_id,cinema_name,start_day,end_day,running_time,main_photo FROM cinema_master";
      $movieSqlResult = mysqli_query($con,$movieSql);
      $movieCount = mysqli_num_rows($movieSqlResult);
      $pageCount = intval($movieCount/$moiveCountPerOnePage) + 1; //総ページ数
      $recordsCount = 1;
      $showMovieRecordsCount = $pageNow*$moiveCountPerOnePage;//表示は　$showMovieRecordsCount-($moiveCountPerOnePage-1)~$showMovieRecordsCountのもの
      while(($rowMovieSqlResult = mysqli_fetch_array($movieSqlResult))!=false){
        if($recordsCount>=$showMovieRecordsCount-($moiveCountPerOnePage-1) &&  $recordsCount <= $showMovieRecordsCount){
          echo "<tr>";
          echo   "<td>".$rowMovieSqlResult['cinema_id']."</td>";
          echo   "<td><img src='../../tokyo/movie/images/".$rowMovieSqlResult['main_photo']."'></td>";
          echo   "<td>".$rowMovieSqlResult['cinema_name']."</td>";
          echo   "<td>".$rowMovieSqlResult['start_day']."</td>";
          echo   "<td>".$rowMovieSqlResult['end_day']."</td>";
          echo   "<td>".$rowMovieSqlResult['running_time']."</td>";
          echo   "<td><a href='registerDetail.php?id=".$rowMovieSqlResult['cinema_id']."' class='btn btn-primary'>追加する</a></td>";
          echo  "</tr>";
        }
        $recordsCount++;
      }
      mysqli_close($con);
    ?>
    </table>
    <div style="margin-top:30px;width:100%;text-align:center;">
    <p class='btn-group'>
    <?PHP
      for($i=1;$i<=$pageCount;$i++){
        if($pageNow==$i){
          echo "<span class='btn btn-default current'>".$i."</span>";
        }else{
          echo "  <a class='btn btn-default' href='register.php?page=".$i."'>".$i."</a>  ";
        }
      }
    ?>
    </p></div>
    <div id="editSend">
      <input type="submit" class="btn btn-primary btn-lg" value="確認画面へ"></div>
    </form>
    <!-- /movie list table -->
  <!-- main end -->

<?PHP
  require_once("../footer.php");
?>



