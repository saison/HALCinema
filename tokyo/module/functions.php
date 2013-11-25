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
		
		$con = mysqli_connect('localhost','halcinema','halcinema');
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


	//初期ロード時に動く奴
	session_start();
?>