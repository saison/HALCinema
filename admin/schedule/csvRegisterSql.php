<?php
	require_once("../../tokyo/module/functions.php");
	$con=getConnection();
	if (!isset($_POST['send'])) {
		header("Location:csvRegister.php");
		exit();
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
	//上映IDを求めるための下準備
	$countSql = "SELECT COUNT(*) FROM show_schedule";
	$countSqlResult = mysqli_query($con,$countSql);
	$showScheduleCount = mysqli_fetch_array($countSqlResult);
	
	$cnt = 1;//上映ID計算用	
	$scheduleData = array();
	foreach ($csv as $valueCsv){
		//上映ID求める
		$showId="sh";
		for($i=0;$i<(8-mb_strlen(strval($showScheduleCount[0]+$cnt)));$i++){
			$showId .= "0";
		}

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

		$scheduleData[]  = array(
			'show_id' 	=> $showId . strval($showScheduleCount[0]+$cnt) ,
			'cinema_id' => $valueCsv[0] ,  'screen_id'=> $valueCsv[1] , 
			'start_time' => $startTime ,
			'start_day' 	=> $starDay);
			
			$cnt++;
	}
	
	foreach($scheduleData as $key=>$val){
		foreach ( $val as $key2=>$val2) {
			switch($key2){
				case "show_id":
					$showId = $val2;
					break;
				case "cinema_id":
					$cinemaId = $val2;
					break;
				case "screen_id":
					$screen = $val2;
					break;
				case "start_time":
					$startTime = $val2;
					break;
				case "start_day":
					$showDay = $val2;
					break;
			}			
		}
		$insertSql = "INSERT INTO show_schedule (show_id,cinema_id, show_day,start_time, screen_id) VALUE('{$showId}','{$cinemaId}','{$showDay}','{$startTime}','{$screen}')";
		$insertResult = mysqli_query($con,$insertSql);
	}

	mysqli_close($con);
	header("Location:list.php?register=1");


?>