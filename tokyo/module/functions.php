<?PHP
	/*******************
		functions Area
	*******************/


	/*******************************
		DB Connection Function
	*******************************/
	function getConnection(){
		
		/**************************
			DBroot = localhost
			DBname = halcinema
		**************************/
		
		//DB接続軽減モード実装中
		if(!empty($_COOKIE["deve_db"])){
		if($_COOKIE["deve_db"]=="xampp"){
			$con = mysqli_connect('127.0.0.1','halcinema','halcinema');
		}else{
			$con = mysqli_connect('localhost','halcinema','halcinema');
		}
		}else{
			$con = mysqli_connect('localhost','halcinema','halcinema');
		}
		mysqli_set_charset($con,'utf8');
		mysqli_select_db($con,'halcinema');
		
		return $con;
	}
	
	/*********************************
		prefectures checked
	*********************************/
	
	function prefectures($prefecture,$userPrefecture){
		
		if($prefecture == $userPrefecture){
			return  "<option value='".$prefecture."' selected>".$prefecture."</option>";	
		}else{
			return   "<option value='".$prefecture."'>".$prefecture."</option>";
		}
		
	}
	
	/*********************************
		reserve checked
	*********************************/
	/*
		引数
		$seatNum　⇒　シート番号
		$seatArray　⇒　予約シート番号
		$seatValue　⇒　シート番号（表示部分）
		$seatType　⇒　　シート種類
		$marginFlag ⇒　マージン30必要か
		
	*/
	
	function reserve($seatNum,$seatArray,$seatValue,$seatType,$marginFlag){
		
		$reserveFlag = 0;
		
		foreach ($seatArray as $value) {
    		if($seatNum==$value){
				$reserveFlag = 1;
			}
		}
		
		if($reserveFlag==0 && $marginFlag==0){//予約してない
			return "<td id='".$seatNum."' class='".$seatType."'>".$seatValue."</td>";
		}else if($reserveFlag==1 && $marginFlag==0){//予約している
			return "<td id='".$seatNum."' class='reserveSeat'>".$seatValue."</td>";
		}else if($reserveFlag==0 && $marginFlag==1){//予約してない
			return "<td id='".$seatNum."' class='".$seatType."'>".$seatValue."</td>";
		}else if($reserveFlag==1 && $marginFlag==1){//予約している
			return "<td id='".$seatNum."' class='reserveSeat lMargin30'>".$seatValue."</td>";
		}
		
	}


	//初期ロード時に動く奴
	session_start();
?>