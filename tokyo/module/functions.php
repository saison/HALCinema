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
		$con = mysqli_connect('localhost','root','root');
		mysqli_set_charset($con,'utf8');
		mysqli_select_db($con,'halcinema');
		return $con;
	}


	//初期ロード時に動く奴
	session_start();
?>