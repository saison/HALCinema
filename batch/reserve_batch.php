<?PHP
	/**************************
		DBroot = localhost
		DBname = halcinema
	**************************/
	/*
$con = mysqli_connect('localhost','halcinema','halcinema');
	mysqli_set_charset($con,'utf8');
	mysqli_select_db($con,'halcinema');
*/

	$deleteTime = date("s");
	while(true){
		sleep(10);
		$nowTime = date("s");

 		if( ($nowTime - $deleteTime) > 30 ){
	 		/*
$delete = "DROP DATABASE 'halcinema'";
	 		mysqli_query($con,$delete);
*/
			echo($nowTime);
			echo($deleteTime);
	 		$deleteTime = date("s");
 		}
 	}
?>