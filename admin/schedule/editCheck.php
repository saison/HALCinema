<?PHP
	require_once('../../tokyo/module/functions.php');
	if(isset($_POST['send'])){
		
		$year = $_POST['year'];//上映日　年
		$month = $_POST['month'];//上映日　月
		$day = $_POST['day'];//上映日　日
		$startHour = $_POST['startHour'];//開始時間　時
		$startMin = $_POST['startMin'];//開始時間　分
		$screen = $_POST['screen'];//スクリーン
		$cinemaId = $_POST['cinemaId'];
		
		$_SESSION['year'] = $year;
		$_SESSION['month'] = $month;
		$_SESSION['day'] = $day;
		$_SESSION['startHour'] = $startHour;
		$_SESSION['startMin'] = $startMin;
		$_SESSION['scNum'] = $screen;
		$_SESSION['cinemaId'] = $cinemaId;
		
	}else{
		header("Location:list.php");
	}
	
	//入力チェック
	$errorArray=array();

	//数値かどうか
	if(!is_numeric($year)||!is_numeric($month)||!is_numeric($day)||!is_numeric($startHour)||!is_numeric($startMin)){
		$errorArray += array('type'=>'1');
	}
	//上映年
	if($year<=2000||$year>9999){
		$errorArray += array('year'=>'1');
	}
	//上映月
	if($month<1||$month>12){
		$errorArray += array('month'=>'1');
	}
	//上映日
	if($day<1||$day>31){
		$errorArray += array('day'=>'1');
	}
	if($startHour>24||$startHour<1){
		$errorArray += array('startHour'=>'1');	
	}
	if($startMin>60||$startMin<0){
		$errorArray += array('startMin'=>'1');	
	}
	//スクリーン
	if($screen<1||$screen>8){
		$errorArray += array('screen'=>'1');
	}
	
	if(count($errorArray)==0){//エラーなし
		header("Location:confirm.php");
	}else{
		header("Location:edit.php?".http_build_query($errorArray)."");
	}



?>