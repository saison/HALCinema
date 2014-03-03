<?PHP
	require_once('../../tokyo/module/functions.php');
	if(isset($_POST['send'])){// from edit.php
		
		$cinemaId = $_POST['cinemaId'];
		$cinemaName =  $_POST['cinemaName'];
		$startDay = $_POST['startDay'];
		$endDay = $_POST['endDay'];
		$runningTime = $_POST['runningtime'];
		$cinemaDescription = $_POST['movieDescription'];
		$movieDirector = $_POST['movieDirector'];
		$moviePerfomer = $_POST['moviePerfomer'];
		$mainPhoto = $_POST['mainPhoto'];
		$subPhoto1 = $_POST['subPhoto1'];
		$subPhoto2 = $_POST['subPhoto2'];
 		$subPhoto3 = $_POST['subPhoto3'];
		$subPhoto4 = $_POST['subPhoto4'];
		
		//セッションセット
		$_SESSION['editCheckCinemaId'] = $cinemaId;
		$_SESSION['editCheckCinemaName'] = htmlspecialchars($cinemaName);
		$_SESSION['editCheckStartDay'] = $startDay ;
		$_SESSION['editCheckEndDay'] = $endDay;
		$_SESSION['editCheckRunningtime'] =$runningTime;
		$_SESSION['editCheckMovieDescription'] = htmlspecialchars($cinemaDescription);
		$_SESSION['editCheckMovieDirector'] = htmlspecialchars($movieDirector);
		$_SESSION['editCheckPerfomer'] = htmlspecialchars($moviePerfomer);
		$_SESSION['editCheckMainPhoto'] = $mainPhoto;
		$_SESSION['editCheckSubPhoto1'] = $subPhoto1;
		$_SESSION['editCheckSubPhoto2'] = $subPhoto2;
		$_SESSION['editCheckSubPhoto3'] = $subPhoto3;
		$_SESSION['editCheckSubPhoto4'] = $subPhoto4;
		
	}else{//from other
		header("Location:list.php");
	}
	
	//エラー情報を入れる配列
	$errorArray=array();
	
	//上映終了日開始日のエラーフラグ（両方エラーがない場合のみ開始日と終了日の矛盾チェックを行う）
	$startEndErrorFlag = 0;

	//上映日開始日のチェック
	if(!preg_match('/^[0-9]{4}-[0-1][0-9]-[0-3][0-9]$/',$startDay)){//YYYY-MM-DDの形式チェック
	
		$errorArray += array('startDay'=>'1');
		$startEndErrorFlag =1;
		
	}else{//具体的なチェック
	
		$checkStartday = explode('-',$startDay);
		
		//月のチェック
		if($checkStartday[1]>12||$checkStartday[1]<1){
			
			$errorArray += array('startDay'=>'1');
			$startEndErrorFlag =1;
		
		//日チェック
		}else if($checkStartday[1]==2){
			
			//うるう年のチェック
			if($checkStartday[0]%4 == 0 && $checkStartday[0]%100 != 0 || $checkStartday[0]%400 == 0){//うるう年です。
			
				if($checkStartday[2]>29||$checkStartday[2]<1){//29日まで
					
					$errorArray += array('startDay'=>'1');	
					$startEndErrorFlag =1;	
					
				}
			}else{//うるう年じゃない
				
				if($checkStartday[2]>28||$checkStartday[2]<1){//28日まで	
					
					$errorArray += array('startDay'=>'1');
					$startEndErrorFlag =1;		
					
				}	
			}
		}else if($checkStartday[1]==4||$checkStartday[1]==6||$checkStartday[1]==9||$checkStartday[1]==11){
		
			if($checkStartday[2]>30||$checkStartday[2]<1){//30日まで
					
				$errorArray += array('startDay'=>'1');
				$startEndErrorFlag =1;	
					
			}			
		}else{
			if($checkStartday[2]>30||$checkStartday[2]<1){//31日まで
					
				$errorArray += array('startDay'=>'1');
				$startEndErrorFlag =1;		
					
			}	
		}
	}
	//上映終了日のチェック
	if(!preg_match('/^[0-9]{4}-[0-1][0-9]-[0-3][0-9]$/',$endDay)){//YYYY-MM-DDの形式チェック
	
		$errorArray += array('endDay'=>'1');
		$startEndErrorFlag =1;
		
	}else{//具体的なチェック
	
		$checkEndday = explode('-',$endDay);
		
		//月のチェック
		if($checkEndday[1]>12||$checkEndday[1]<1){
			
			$errorArray += array('endDay'=>'1');
			$startEndErrorFlag =1;
		
		//日チェック
		}else if($checkEndday[1]==2){
			
			//うるう年のチェック
			if($checkEndday[0]%4 == 0 && $checkEndday[0]%100 != 0 || $checkEndday[0]%400 == 0){//うるう年です。
			
				if($checkEndday[2]>29||$checkEndday[2]<1){//29日まで
					
					$errorArray += array('endDay'=>'1');
					$startEndErrorFlag =1;	
					
				}
			}else{//うるう年じゃない
				
				if($checkEndday[2]>28||$checkEndday[2]<1){//28日まで	
					
					$errorArray += array('endDay'=>'1');
					$startEndErrorFlag =1;
					
				}	
			}
		}else if($checkEndday[1]==4||$checkEndday[1]==6||$checkEndday[1]==9||$checkEndday[1]==11){
		
			if($checkEndday[2]>30||$checkEndday[2]<1){//30日まで
					
				$errorArray += array('endDay'=>'1');
				$startEndErrorFlag =1;	
					
			}			
		}else{
			if($checkEndday[2]>31||$checkEndday[2]<1){//31日まで
					
				$errorArray += array('endDay'=>'1');
				$startEndErrorFlag =1;	
					
			}	
		}
	}
	
	//上映開始日と終了日の矛盾チェック
	if($startEndErrorFlag==0){
		
		$checkStartday = explode('-',$startDay);
		$checkEndday = explode('-',$endDay);
		
		if($checkStartday[0]>$checkEndday[0]){//年が開始日の方が遅い
		
			$errorArray += array('startEnd'=>'1');
			
		}else if($checkStartday[1] == $checkEndday[1]&&$checkStartday[0]==$checkEndday[0]){//年月が同じ
		
			if($checkStartday[2]>$checkEndday[2]){//日が開始日の方が遅い
			
				$errorArray += array('startEnd'=>'1');
				
			}
			
		}else if($checkStartday[1]>$checkEndday[1]&&$checkStartday[0]==$checkEndday[0]){//月が開始月の方が遅い
		
			$errorArray += array('startEnd'=>'1');
			
		}	
	}
	
	//上映時間のチェック
	if(!preg_match('/^[1-9][0-9]*$/',$runningTime)){
		
		$errorArray += array('runningTime'=>'1');	
	}

	//空白チェック
	//半角と全角の空白を消す
	$cinemaName = str_replace("　","",$cinemaName);
	$cinemaName = str_replace(" ","",$cinemaName);
	if($cinemaName==""){
		$errorArray += array('cinemaName'=>'1');
	}
	
	//空白チェック
	//半角と全角の空白を消す
	$movieDirector = str_replace("　","",$movieDirector);
	$movieDirector = str_replace(" ","",$movieDirector);
	if($movieDirector==""){
		$errorArray += array('movieDirector'=>'1');
	}
	
	//空白チェック
	//半角と全角の空白を消す
	$moviePerfomer = str_replace("　","",$moviePerfomer);
	$moviePerfomer = str_replace(" ","",$moviePerfomer);
	if($moviePerfomer==""){
		$errorArray += array('moviePerfomer'=>'1');
	}
	
	//空白チェック
	//半角と全角の空白を消す
	$cinemaDescription = str_replace("　","",$cinemaDescription);
	$cinemaDescription = str_replace(" ","",$cinemaDescription);
	if($cinemaDescription==""){
		$errorArray += array('cinemaDescription'=>'1');
	}
	
	if(count($errorArray)==0){//エラーなし
		header("Location:editConfirm.php?error=0");
	}else{//エラーあり
		$errorArray += array('error'=>'1');
		header("Location:edit.php?".http_build_query($errorArray)."");
	}

?>