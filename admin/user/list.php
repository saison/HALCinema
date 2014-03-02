<?PHP
  $pageTitle="ユーザ一覧";
  require_once("../header.php");
?>

  <!-- main start -->
    <h2>ユーザ一覧</h2>
    <!-- movie list table -->
    <table class="table table-striped table-bordered table-condensed userTable">
      <thead>
        <tr>
          <th>会員ID</th>
          <th>パスワード</th>
          <th>メールアドレス</th>
          <th>姓</th>
          <th>名</th>
          <th>生年月日</th>
          <th>都道府県</th>
          <th>市町村区以降</th>
          <th>HALシネマポイント</th>
          <th>HALメールマガジンflag</th>
          <th>電話番号</th>
                    <th>削除</th>
        </tr>
      </thead>

      <tbody>
        <!-- ここの中身をループして出してね -->
        <?PHP
          //MySQLサーバー接続
          $con=mysqli_connect('localhost','halcinema','halcinema');
            //文字コード設定
            if($con!=false){
              mysqli_set_charset($con,'utf8');
            //データベース選択
            $isSuccess =mysqli_select_db($con, 'halcinema');
            if($isSuccess){
              $result =mysqli_query($con,"SELECT * FROM user_master ORDER BY logic_delete_flag");
              while(($row = mysqli_fetch_array($result)) != false){
                $userId = $row[0];
                $userPass = $row[1];
                $userMail = $row[2];
                $familyName = $row[3];
                $firstName = $row[4];
                $birthday = str_replace("-","/",$row[5]);
                $prefectures = $row[6];
                $userAddress = $row[7];
                $settleFlag = $row[8];
                $halPoint = $row[9];
                $mailFlag = $row[10];
                $deleteFlag = $row[11];
                $userTel = $row[12];

                if($deleteFlag==1){
                    echo "<tr class='deleted'>";
                    echo "<td>".$userId."</td>";
                      echo "<td>".$userPass."</td>";
                      echo "<td>".$userMail."</td>";
                      echo "<td>".$familyName."</td>";
                      echo "<td>".$firstName."</td>";
                      echo "<td>".$birthday."</td>";
                      echo "<td>".$prefectures."</td>";
                      echo "<td>".$userAddress."</td>";
                      echo "<td>".$halPoint."Pt</td>";
                    echo "<td>";
                    if($mailFlag==1){
                      echo "受信する";
                    }else{
                      echo "受信しない";
                    }
                    echo "</td>";
                      echo "<td>".$userTel."</td>";
                      echo "<td><a href='userDelete.php?id=".$userId."' class='btn btn-primary'><span class='glyphicon glyphicon-thumbs-up'></span>REVIVE</a></td>";
                    echo "</tr>";

                  }else{

                    echo "<tr>";
                    echo "<td>".$userId."</td>";
                      echo "<td>".$userPass."</td>";
                      echo "<td>".$userMail."</td>";
                      echo "<td>".$familyName."</td>";
                      echo "<td>".$firstName."</td>";
                      echo "<td>".$birthday."</td>";
                      echo "<td>".$prefectures."</td>";
                      echo "<td>".$userAddress."</td>";
                      echo "<td>".$halPoint."Pt</td>";
                    echo "<td>";
                    if($mailFlag==1){
                      echo "受信する";
                    }else{
                      echo "受信しない";
                    }
                    echo "</td>";
                      echo "<td>".$userTel."</td>";
                      echo "<td><a href='userDelete.php?id=".$userId."' class='btn btn-primary'><span class='glyphicon glyphicon-thumbs-down'></span>DEATH</a></td>";
                    echo "</tr>";
                }
              }
            }
            //サーバー切断
            mysqli_close($con);
          }
        ?>

        <!-- ここの中身をループして出してね -->
      </tbody>

    </table>
    <!-- /movie list table -->
  <!-- main end -->

<?PHP
  require_once("../footer.php");
?>

