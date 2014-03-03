<?PHP
  require_once("../../tokyo/module/functions.php");
?>
<script src="../js/jquery-1.10.2.min.js"></script>
<script>
$(function(){
  $("#mainPhoto").change( function() {
    var imgName = $("#mainPhoto").val();
    document.getElementById("mainPhotoImg").src ="../../tokyo/movie/images/"+imgName;
  });

  $("#subPhoto1").change( function() {
    var imgName = $("#subPhoto1").val();
    document.getElementById("subPhoto1Img").src ="../../tokyo/movie/images/"+imgName;
  });

  $("#subPhoto2").change( function() {
    var imgName = $("#subPhoto2").val();
    document.getElementById("subPhoto2Img").src ="../../tokyo/movie/images/"+imgName;
  });

  $("#subPhoto3").change( function() {
    var imgName = $("#subPhoto3").val();
    document.getElementById("subPhoto3Img").src ="../../tokyo/movie/images/"+imgName;
  });

  $("#subPhoto4").change( function() {
    var imgName = $("#subPhoto4").val();
    document.getElementById("subPhoto4Img").src ="../../tokyo/movie/images/"+imgName;
  });
});
</script>

<?PHP
    $pageTitle="映画登録";
  require_once("../header.php");

  //映画件数取得
    $con = getConnection();
  $movieCountSql = "SELECT COUNT(*) FROM cinema_master";
    $movieCountResult = mysqli_query($con, $movieCountSql);
  $movieCount = mysqli_fetch_array($movieCountResult);

  //映画IDを求める
  $cinemaId="ci";
  for($i=0;$i<(4-mb_strlen(strval($movieCount[0]+1)));$i++){
    $cinemaId .= "0";
  }

  $cinemaId .= strval($movieCount[0]+1);
  $cinemaName = "";
  $startDay ="";
  $endDay ="";
  $runningTime ="";
  $cinemaDescription ="";
  $movieDirector ="";
  $moviePerfomer ="";
  $mainPhoto =NULL;
  $subPhoto1 =NULL;
  $subPhoto2 = NULL;
  $subPhoto3 = NULL;
  $subPhoto4 = NULL;

  if(isset($_GET['error'])){//from registerCheck.php

    $cinemaId = $_SESSION['registerCheckCinemaId'];
    $cinemaName =  $_SESSION['registerCheckCinemaName'];
    $startDay = $_SESSION['registerCheckStartDay'];
    $endDay = $_SESSION['registerCheckEndDay'];
    $runningTime = $_SESSION['registerCheckRunningtime'];
    $cinemaDescription = $_SESSION['registerCheckMovieDescription'];
    $movieDirector = $_SESSION['registerCheckMovieDirector'];
    $moviePerfomer = $_SESSION['registerCheckPerfomer'];
    $mainPhoto = $_SESSION['registerCheckMainPhoto'];
    $subPhoto1 = $_SESSION['registerCheckSubPhoto1'];
    $subPhoto2 = $_SESSION['registerCheckSubPhoto2'];
    $subPhoto3 = $_SESSION['registerCheckSubPhoto3'];
    $subPhoto4 = $_SESSION['registerCheckSubPhoto4'];

  }

  //エラー処理
  $error="";
  if(isset($_GET['mainPhoto'])){$error .="<p>mainPhotoは必ず登録して下さい。</p>";}
  if(isset($_GET['startDay'])){$error .="<p>上映開始日が間違っています。</p>";}
  if(isset($_GET['endDay'])){$error .="<p>上映終了日が間違っています</p>";}
  if(isset($_GET['runningTime'])){$error .="<p>上映時間が間違っています。</p>";}
  if(isset($_GET['startEnd'])){$error .="<p>開始日と終了日が矛盾しています。</p>";}
  if(isset($_GET['cinemaDescription'])){$error .="<p>映画説明文を入力して下さい。</p>";}
  if(isset($_GET['cinemaName'])){$error .="<p>映画名を入力して下さい。</p>";}
  if(isset($_GET['movieDirector'])){$error .="<p>監督名を入力して下さい。</p>";}
  if(isset($_GET['moviePerfomer'])){$error .="<p>出演者を入力して下さい。</p>";}
?>

  <!-- main start -->
  <h2><?PHP echo $cinemaId; ?> - 登録<a href="registerImageUpload.php?id=<?PHP echo $cinemaId;?>" id="editButton" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>この映画の画像をアップロード</a></h2>
    <?PHP echo $error;?>
    <!-- movie list table -->
    <form action="registerCheck.php" method="post">
    <table id="editTable" class="table table-striped table-bordered table-condensed listTable">
            <tr>
          <th>映画ＩＤ</th>
          <td><input type="hidden" name="cinemaId" value="<?PHP echo $cinemaId;?>"><?PHP echo $cinemaId;?></td>
        </tr>
        <tr>
          <th>タイトル</th>
          <td><input type="text" name="cinemaName" value="<?PHP echo $cinemaName;?>" required></td>
        </tr>
                <tr>
          <th>画像</th>
          <td>
                    <p>mainPhoto</p>
                    <?php
            //イメージフォルダのファイル取得
            //ディレクトリ
              $dir = '../../tokyo/movie/images/';
            //ディレクトリおーぷん
              $fileList = opendir($dir);
            //ファイルリストを配列に
              $fileListArray = array();
            // "readdir関数が返す値には「.」と「..」が含まれます。また、ディレクトリ名も返されるので返された値がディレクトリ名でないか判別します。"  らしい。
            while(false !== ($fn = readdir($fileList))){
               if($fn !== '.' && $fn !== '..' && !is_dir($dir.$fn)){
                array_push($fileListArray, $fn);
              }
            }
            //ディレクトリを閉じます。
            closedir($fileList);
          ?>
                    <?PHP if($mainPhoto==NULL ):?>
                    <img src="../../tokyo/movie/images/noImg.png" alt="" id="mainPhotoImg">
                    <?PHP else:?>
                    <img src="../../tokyo/movie/images/<?PHP echo $mainPhoto;?>" alt="" id="mainPhotoImg">
                    <?PHP endif;?>
                    <select name="mainPhoto" id="mainPhoto">
                      <option value="noImg.png" >登録なし</option>
                      <?PHP for($i=0;$i<count($fileListArray);$i++):  //mainフォトのみ表示?>
            <?PHP if(preg_match("/main/", $fileListArray[$i]))://mainのフォトなら?>
                        <?PHP if($fileListArray[$i]==$mainPhoto):?>
                        <option value="<?PHP echo $fileListArray[$i];?>" selected><?PHP echo $fileListArray[$i];?></option>
                        <?PHP else:?>
                        <option value="<?PHP echo $fileListArray[$i];?>"><?PHP echo $fileListArray[$i];?></option>
                        <?PHP endif;?>
                        <?PHP endif;?>
                        <?PHP endfor;?>
                    </select><br />

                    <p>subPhoto</p>
                    <?PHP if($subPhoto1==NULL ):?>
                    <img src="../../tokyo/movie/images/noImg.png" alt="" id="subPhoto1Img">
                    <?PHP else:?>
                    <img src="../../tokyo/movie/images/<?PHP echo $subPhoto1;?>" alt="" id="subPhoto1Img">
                    <?PHP endif;?>
                    <select name="subPhoto1" id="subPhoto1">
                    <option value="noImg.png">登録なし</option>
                    <?PHP for($i=0;$i<count($fileListArray);$i++):  //sub1フォトのみ表示?>
          <?PHP if(preg_match("/sub1/", $fileListArray[$i]))://sub1のフォトなら?>
                    <?PHP if($fileListArray[$i]==$subPhoto1):?>
                    <option value="<?PHP echo $fileListArray[$i];?>" selected><?PHP echo $fileListArray[$i];?></option>
                    <?PHP else:?>
                    <option value="<?PHP echo $fileListArray[$i];?>"><?PHP echo $fileListArray[$i];?></option>
                    <?PHP endif;?>
                    <?PHP endif;?>
                    <?PHP endfor;?>
                    </select>

                    <?PHP if($subPhoto2==NULL ):?>
                    <img src="../../tokyo/movie/images/noImg.png" alt="" id="subPhoto2Img">
                    <?PHP else:?>
                    <img src="../../tokyo/movie/images/<?PHP echo $subPhoto2;?>" alt="" id="subPhoto2Img">
                    <?PHP endif;?>
                    <select name="subPhoto2" id="subPhoto2">
                    <option value="noImg.png">登録なし</option>
                    <?PHP for($i=0;$i<count($fileListArray);$i++):  //sub2フォトのみ表示?>
          <?PHP if(preg_match("/sub2/", $fileListArray[$i]))://sub2のフォトなら?>
                    <?PHP if($fileListArray[$i]==$subPhoto2):?>
                    <option value="<?PHP echo $fileListArray[$i];?>" selected><?PHP echo $fileListArray[$i];?></option>
                    <?PHP else:?>
                    <option value="<?PHP echo $fileListArray[$i];?>"><?PHP echo $fileListArray[$i];?></option>
                    <?PHP endif;?>
                    <?PHP endif;?>
                    <?PHP endfor;?>
                    </select><br />

                    <?PHP if($subPhoto3==NULL ):?>
                    <img src="../../tokyo/movie/images/noImg.png" alt="" id="subPhoto3Img">
                    <?PHP else:?>
                    <img src="../../tokyo/movie/images/<?PHP echo $subPhoto3;?>" alt="" id="subPhoto3Img">
                    <?PHP endif;?>
                    <select name="subPhoto3" id="subPhoto3">
                    <option value="noImg.png">登録なし</option>
                    <?PHP for($i=0;$i<count($fileListArray);$i++):  //sub3フォトのみ表示?>
          <?PHP if(preg_match("/sub3/", $fileListArray[$i]))://sub3のフォトなら?>
                    <?PHP if($fileListArray[$i]==$subPhoto3):?>
                    <option value="<?PHP echo $fileListArray[$i];?>" selected><?PHP echo $fileListArray[$i];?></option>
                    <?PHP else:?>
                    <option value="<?PHP echo $fileListArray[$i];?>"><?PHP echo $fileListArray[$i];?></option>
                    <?PHP endif;?>
                    <?PHP endif;?>
                    <?PHP endfor;?>
                    </select>

                    <?PHP if($subPhoto4==NULL ):?>
                    <img src="../../tokyo/movie/images/noImg.png" alt="" id="subPhoto4Img">
                    <?PHP else:?>
                    <img src="../../tokyo/movie/images/<?PHP echo $subPhoto4;?>" alt="" id="subPhoto4Img">
                    <?PHP endif;?>
                    <select name="subPhoto4" id="subPhoto4">
                    <option value="noImg.png">登録なし</option>
                    <?PHP for($i=0;$i<count($fileListArray);$i++):  //sub4フォトのみ表示?>
          <?PHP if(preg_match("/sub4/", $fileListArray[$i]))://sub4のフォトなら?>
                    <?PHP if($fileListArray[$i]==$subPhoto4):?>
                    <option value="<?PHP echo $fileListArray[$i];?>" selected><?PHP echo $fileListArray[$i];?></option>
                    <?PHP else:?>
                    <option value="<?PHP echo $fileListArray[$i];?>"><?PHP echo $fileListArray[$i];?></option>
                    <?PHP endif;?>
                    <?PHP endif;?>
                    <?PHP endfor;?>
                    </select>
                    </td>
        </tr>
        <tr>
          <th>公開開始日</th>
                    <?PHP
            //　※　input type dateは現在Chromeのみ。更にvalueの形式はYYYY-MM-DDでも表示はYYYY/MM/DD(chrome以外だとvalueのYYYY-MM-DDが表示される)

            //ブラウザ情報取得
            $agent = getenv("HTTP_USER_AGENT");
            //chromeの場合
            if(mb_ereg("Chrome",$agent)):
          ?>
          <td><input type="date" name="startDay" value="<?PHP echo $startDay; ?>" required></td>
          <?PHP else: //chrome以外の場合 ?>
                    <td><input type="date" name="startDay" value="<?PHP echo $startDay; ?>" required></td>
                    <td class="info">ex)   YYYY-MM-DD</td>
                    <?PHP endif; ?>
        </tr>
        <tr>
          <th>公開終了日</th>
          <?PHP
            //　※　input type dateは現在Chromeのみ。更にvalueの形式はYYYY-MM-DDでも表示はYYYY/MM/DD(chrome以外だとvalueのYYYY-MM-DDが表示される)

            //chromeの場合
            if(mb_ereg("Chrome",$agent)):
          ?>
          <td><input type="date" name="endDay" value="<?PHP echo $endDay; ?>" required></td>
          <?PHP else: //chrome以外の場合 ?>
                    <td><input type="date" name="endDay" value="<?PHP echo $endDay; ?>" required></td>
                    <td class="info">ex)   YYYY-MM-DD</td>
                    <?PHP endif; ?>
        </tr>
        <tr>
          <th>上映時間</th>
          <td><input type="number" name="runningtime" value = "<?PHP echo $runningTime;?>" required>分</td>
        </tr>
        <tr>
          <th>映画説明文</th>
          <td><textarea name="movieDescription" cols="80" rows="10"  value = "<?PHP echo $cinemaDescription;?>" required><?PHP echo $cinemaDescription;?></textarea></td>
        </tr>
        <tr>
          <th>監督</th>
          <td><input type="text" name="movieDirector" value="<?PHP echo $movieDirector;?>" required></td>
        </tr>
                <tr>
          <th>出演者</th>
          <td><textarea name="moviePerfomer" cols="80" rows="3"  value="<?PHP echo $moviePerfomer;?>" required><?PHP echo $moviePerfomer;?></textarea></td>
        </tr>
    </table>
    <div id="editSend">
      <input type="submit" class="btn btn-primary btn-lg" value="登録する" name="send"></div>
    </form>
    <!-- /movie list table -->
  <!-- main end -->

<?PHP
  require_once("../footer.php");
?>


