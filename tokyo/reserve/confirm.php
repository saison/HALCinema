<?php
	$pageTitle="確認";
	require_once("../module/reserveHeader.php");
	
	if(!(isset($_SESSION["userid"]))){
		header("Location:../mypage/login.php");
		return;
	}
	$showid = $_SESSION["showid"];
	$con = getConnection();

	$selectSql = "SELECT show_schedule.show_id as 上映ID,show_schedule.screen_id as ScreenID,show_schedule.start_time as 上映開始時間,show_schedule.show_day as 上映日,cinema_master.cinema_name AS 映画名 FROM show_schedule INNER JOIN cinema_master ON show_schedule.cinema_id=cinema_master.cinema_id WHERE  show_schedule.show_id='{$showid}';";
	$selectResult = mysqli_query($con,$selectSql);
	$movieRow = mysqli_fetch_array($selectResult);

	$reservSql = "SELECT seat_number, movie_price_id FROM seat_reserve_list WHERE show_id = '".$showid."' AND user_id = '".$_SESSION["userid"]."' AND reserve_flag = '0'";
	$reserveResult = mysqli_query($con,$reservSql);

	$adultCount = 0;
	$studentCount = 0;
	$seniorCount = 0;
	$pear1Count  =0;
	$pear2Count =0;
	while($reserveRow = mysqli_fetch_array($reserveResult)){
			$reserveSeat[] = $reserveRow["seat_number"];
			$priceId = $reserveRow["movie_price_id"];
			switch($priceId){
				case 'mp0001':
					$adultCount++;
					break;
				case 'mp0002':
					$studentCount++;
					break;
				case 'mp0005':
					$seniorCount++;
					break;
				case 'mp0003':
					$pear1Count++;
					break;
				case 'mp0004':
					$pear2Count++;
					break;
			}
	}
	$reserveTicket ="";
	if($adultCount!=0){
		$reserveTicket .="大人×".$adultCount."　";
	}
	if($studentCount!=0){
		$reserveTicket .="学生×".$studentCount."　";
	}
	if($seniorCount!=0){
		$reserveTicket .="シニア×".$seniorCount."　";
	}
	if($pear1Count!=0){
		$reserveTicket .="ペアシート（1人）×".$pear1Count."　";
	}
	if($pear2Count!=0){
		$reserveTicket .="ペアシート（2人）×".$pear2Count."　";
	}

  //ユーザ情報取得
	$userSql = "SELECT * FROM user_master WHERE user_id='".$_SESSION["userid"]."'";
	$userResult = mysqli_query($con,$userSql);
	$userRow = mysqli_fetch_array($userResult);
?>

<div id="content" class="m15">
  <div class="reserveTitle">
    <h2>座席予約を行います。以下の内容でよろしいですか？</h2>
  </div>
  
  <div class="boxCol2 clearfix mtb15">
    <div class="boxCol2Left">
      <div class="contentBox">
        <div class="reserveTitle">
          <h3>映画情報</h3>
        </div>
        <div class="confirmTable">
          <table>
            <tr>
              <th>劇場</th>
              <td>HALCinema Tokyo</td>
            </tr>
            <tr>
              <th>作品</th>
              <td><?php echo $movieRow["映画名"];?></td>
            </tr>
            <tr>
              <th>日時</th>
              <td><?php echo str_replace("-","/",$movieRow["上映日"])." ".substr($movieRow["上映開始時間"],0,5)."~";?></td>
            </tr>
          </table>
        </div>
      </div>
      <div class="contentBox mtb30">
        <div class="reserveTitle">
          <h3>スクリーン･座席</h3>
        </div>
        <div class="confirmTable">
          <table>
            <tr>
              <th>スクリーン</th>
              <td>SCREEN<?php echo substr($movieRow["ScreenID"],-1,1); ?></td>
            </tr>
            <tr>
              <th>座席</th>
              <td><?php
                    for($i=0;$i<count($reserveSeat);$i++){
                      echo $reserveSeat[$i]." ";
                    }
                  ?>
              </td>
            </tr>
            <tr>
              <th>枚数</th>
              <td><?php	echo $reserveTicket; ?></td>
            </tr>
          </table>
        </div>
      </div>
      <div class="contentBox mtb30">
        <div class="reserveTitle">
          <h3>決済</h3>
        </div>
        <div class="confirmTable">
          <table>
            <tr>
              <th>決済方法</th>
              <td><?php echo $_POST["sendConfirm"]; ?></td>
            </tr>
            <tr>
              <th>金額</th>
              <td>
              <?php
              $priceSql = "SELECT movie_price_id,movie_price FROM movie_price_master";
              $priceResult = mysqli_query($con,$priceSql);
              $price = 0;
              while($priceRow = mysqli_fetch_array($priceResult)){
                switch($priceRow["movie_price_id"]){
                  case "mp0001":
                    $price += $priceRow["movie_price"] * $adultCount;
                    break;
                  case "mp0002":
                    $price += $priceRow["movie_price"] * $studentCount;
                    break;
                  case "mp0005":
                    $price += $priceRow["movie_price"] * $seniorCount;
                    break;
                  case "mp0003":
                    $price += $priceRow["movie_price"] * $pear1Count;
                    break;
                  case "mp0004":
                    $price += $priceRow["movie_price"] * $pear2Count;
                    break;
                }
              }
              
              echo("¥".$price);
              
              ?>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <div class="boxCol2Right">
      <div class="contentBox">
        <div class="reserveTitle">
          <h3>お客様情報</h3>
        </div>
        <div class="confirmTable">
          <table>
            <tr>
              <th>名前</th>
              <td><?php echo $userRow["family_name"].$userRow["first_name"]; ?></td>
            </tr>
            <tr>
              <th>生年月日</th>
              <td><?php echo $userRow["birthday"]; ?></td>
            </tr>
            <tr>
              <th>電話番号</th>
              <td><?php echo $userRow["user_tel"]; ?></td>
            </tr>
            <tr>
              <th>メールアドレス</th>
              <td><?php echo $userRow["user_mail"]; ?></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div id="yoyakuBtBox" class="clearfix">
    <div id="yoyakuBackBt">
      <form><input type="image" src="images/yoyakuBack.png" alt="送信する"></form>
    </div>
    <div id="yoyakuOkBt">
      <form action="finish.php" method="post"><input type="image" src="images/yoyakuSelect.png" alt="送信する"></form>
    </div>
  </div>

</div>

<?php
	require_once("../module/reserveFooter.php");
?>