<?PHP
	$pageTitle="上映スケジュールCSV登録";
	require_once("../header.php");
	require_once("../../tokyo/module/functions.php");
	$con = getConnection();
	
	if (isset($_POST['send'])){ //from csvRegister.php
		$uploaddir = './csv/';
		$uploadfile = $uploaddir . "uploadCsv.csv";
		if (is_uploaded_file($_FILES['upfile']['tmp_name'])) { 
	
			move_uploaded_file($_FILES['upfile']['tmp_name'], $uploadfile);
		}
	}

	//csvファイルを読み込む
	
	$file = './csv/uploadCsv.csv';
	$data = file_get_contents($file);
	$data = mb_convert_encoding($data, 'UTF-8', 'sjis-win');
	$temp = tmpfile();
	$csv  = array();
	 
	fwrite($temp, $data);
	rewind($temp);
	 
	while (($data = fgetcsv($temp, 0, ",")) !== FALSE) {
	  $csv[] = $data;
	}
	fclose($temp);
	
	//読み込んだデータが型にあっているか
	$csvDateCheck = TRUE;
	foreach ($csv as $valueCsv) {
		
		//映画ID
		if (!preg_match('/^ci[0-9]{4}$/',  $valueCsv[0])) {
			$csvDateCheck = FALSE;
			break;
		}
		
		//スクリーンID
		if (!preg_match('/^sc000[0-8]$/',  $valueCsv[1])) {
			$csvDateCheck = FALSE;
			break;
		}
		//上映開始時間
		if (!preg_match('/^[0-2]{0,1}[0-9]:[0-6][0-9]:00$/',  $valueCsv[2])) {
			$csvDateCheck = FALSE;
			break;
		}
		//具体的にチェック
		$scheduleStartTime = explode(':', $valueCsv[2]);
		if ($scheduleStartTime[0] < 0 || $scheduleStartTime[0] > 12) {
			$csvDateCheck = FALSE;
			break;			
		}
		if ($scheduleStartTime[1] < 0 || $scheduleStartTime[1] > 59) {
			$csvDateCheck = FALSE;
			break;			
		}
		
		/*
		//上映日
		if (!preg_match('/^[0-8]{4}/[0-1]{0,1}[0-9]/[0-3][0-9]$/',  $valueCsv[3])) {
			$csvDateCheck = FALSE;
			break;
		}
		$scheduleStartDay = explode('/', $valueCsv[3]);
		if ($scheduleStartDay[1] < 1 || $scheduleStartDay[1] > 12) {
			$csvDateCheck = FALSE;
			break;
		}
		
		if ($scheduleStartDay[2] < 1 || $scheduleStartDay[2] > 31) {
			$csvDateCheck = FALSE;
			break;
		}
		*/	
	}

	//エラー戻り
	if (!$csvDateCheck) {
			header("Location:csvRegister.php?error=1;");
			exit();
	}
	
	//上映IDを求めるための下準備
	$countSql = "SELECT COUNT(*) FROM show_schedule";
	$countSqlResult = mysqli_query($con,$countSql);
	$showScheduleCount = mysqli_fetch_array($countSqlResult);
	
	
?>
		<!-- main start -->	
		<h2><?PHP //echo "映画タイトル" ?> スケジュール確認（CSV）</h2>
		<table class="table table-striped table-bordered table-condensed listTable">
			<thead>
				<tr>
					<th>上映ID</th>
					<th>映画名</th>
					<th>スクリーン</th>
					<th>上映開始時間</th>
					<th>上映日</th>
				</tr>
			</thead>
			
			<tbody>
				<!-- ここの中身をループして出してね -->
                <?PHP 
					$cnt = 1;//上映ID計算用
				?>
                <?PHP foreach ($csv as $valueCsv): ?>
                <?PHP 
					//上映ID求める
					$showId="sh";
			   		for($i=0;$i<(8-mb_strlen(strval($showScheduleCount[0]+$cnt)));$i++){
						$showId .= "0";
					}
					//映画名求める
					$movieSql = "SELECT cinema_name FROM cinema_master WHERE cinema_id = '{$valueCsv[0]}'";
					$movieSqlResult = mysqli_query($con,$movieSql);
					$rowMovieSqlResult = mysqli_fetch_array($movieSqlResult);
					$cinemaName = $rowMovieSqlResult['cinema_name'];
					//上映開始時間、上映日の一桁の数値に0がついていないときの処理
					//上映開始時間
					$startTime = "";
					$scheduleStartTime = explode(':', $valueCsv[2]);
					//時
					if ($scheduleStartTime[0]<10) {
						$startTime .= "0". $scheduleStartTime[0];		
					} else {
						$startTime .= $scheduleStartTime[0];
					}
					$startTime .= ":";	
					//分
					if ($scheduleStartTime[1]<10) {
						$startTime .= "0". $scheduleStartTime[1];		
					} else {
						$startTime .= $scheduleStartTime[1];
					}
					$startTime .= ":";
					//秒
					$startTime .= $scheduleStartTime[2];
					//上映日(ついでに / を - に)
					$starDay = "";
					$scheduleStartDay = explode('/', $valueCsv[3]);
					//年
					$starDay .= $scheduleStartDay[0];
					$starDay .= "-";
					if ($scheduleStartDay[1]<10) {
						$starDay .= "0" . $scheduleStartDay[1];
					} else {
						$starDay .= $scheduleStartDay[1];
					}
					$starDay .= "-";
					if ($scheduleStartDay[2]<10) {
						$starDay .= "0" . $scheduleStartDay[2];
					} else {
						$starDay .= $scheduleStartDay[2];
					}
						
				
				?>
				<tr>
					<td><?php echo $showId . strval($showScheduleCount[0]+$cnt); //上映ID?></td>
					<td><?php echo $cinemaName; //映画名?></td>
					<td><?php echo "SCREEN" . substr($valueCsv[1],5,1); //スクリーン?></td>
					<td><?php echo $startTime; //上映開始時間?></td>
					<td><?php echo $starDay; //上映日?></td>
				</tr>
                
                <?PHP $cnt++;?>
				<?PHP endforeach; ?>
                <?php mysqli_close($con);?>
				<!-- ここの中身をループして出してね -->
			</tbody>
		</table>
        <form method="post" action="csvRegisterSql.php">
            <p><input type="submit" class="flr btn btn-primary btn-lg" name="send" value="登録する"></p>
        </form>
	<!-- main end -->

<?PHP
	require_once("../footer.php");
?>




