<?PHP
	require_once('../../tokyo/module/functions.php');
	if(isset($_POST['send'])){
		
		$cinemaId = $_POST['cinemaId'];
		$showDay = $_POST['showDay'];
		$startTime =  $_POST['startTime'];
		$screen = $_POST['screen'];
		$showId = $_POST['showId'];
				
		$_SESSION['registerCheckCinemaId'] = $cinemaId;
		$_SESSION['registerCheckShowDay'] = $showDay;
		$_SESSION['registerCheckStartTime'] = $startTime;
		$_SESSION['registerCheckScNum'] = $screen;
		$_SESSION['registerCheckShowId'] = $showId;
		
	}else{
		header("Location:register.php");
	}
	
		
	//エラー情報を入れる配列
	$errorArray=array();

	//上映日のチェック
	if(!preg_match('/^[0-9]{4}-[0-1][0-9]-[0-3][0-9]$/',$showDay)){//YYYY-MM-DDの形式チェック
	
		$errorArray += array('showDay'=>'1');
		
	}else{//具体的なチェック
	
		$checkShowday = explode('-',$showDay);
		
		//月のチェック
		if($checkShowday[1]>12||$checkShowday[1]<1){
			
			$errorArray += array('showDay'=>'1');
		
		//日チェック
		}else if($checkShowday[1]==2){
			
			//うるう年のチェック
			if($checkShowday[0]%4 == 0 && $checkShowday[0]%100 != 0 || $checkShowday[0]%400 == 0){//うるう年です。
			
				if($checkShowday[2]>29||$checkShowday[2]<1){//29日まで
					
					$errorArray += array('showDay'=>'1');		
					
				}
			}else{//うるう年じゃない
				
				if($checkShowday[2]>28||$checkShowday[2]<1){//28日まで	
					
					$errorArray += array('showDay'=>'1');		
					
				}	
			}
		}else if($checkShowday[1]==4||$checkShowday[1]==6||$checkShowday[1]==9||$checkShowday[1]==11){
		
			if($checkShowday[2]>30||$checkShowday[2]<1){//30日まで
					
				$errorArray += array('showDay'=>'1');		
					
			}			
		}else{
			if($checkShowday[2]>30||$checkShowday[2]<1){//31日まで
					
				$errorArray += array('showDay'=>'1');		
					
			}	
		}
	}
	
	//上映開始時間のチェック
	if(!preg_match('/^[0-2][0-9]:[0-5][0-9]$/',$startTime)){
		
		$errorArray += array('startTime'=>'2');	
		
	}else{
		
		$checkStartTime = explode(':',$startTime);
		
		if($checkStartTime[0]>24){
			
			$errorArray += array('startTime'=>'1');		
				
		}	
	}
	
	if(count($errorArray)==0){//エラーなし
		header("Location:registerConfirm.php?error=0");
	}else{
		$errorArray += array('error'=>'1');
		header("Location:registerDetail.php?".http_build_query($errorArray)."");
	}
?>