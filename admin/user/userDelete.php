<?PHP
	require_once("../../tokyo/module/functions.php");
	$con=getConnection();
	if(isset($_GET['id'])){
		
		$userId = $_GET['id'];
		$con=getConnection();
		
		//ユーザーの論除フラグを求める
		$selectSql = "SELECT logic_delete_flag FROM user_master WHERE user_id='{$userId}'";
		$selectResult = mysqli_query($con,$selectSql);
		
		while(($rowSelectResult = mysqli_fetch_array($selectResult))!=false){
			$logicDeleteFlag = $rowSelectResult['logic_delete_flag'];
		}
		
		
		//論除フラグが0なら1に　1なら0に
		switch($logicDeleteFlag){
			
			case 1:
			$updateSql = "UPDATE user_master SET logic_delete_flag = '0' WHERE  user_id ='{$userId}'";
			$updateResult = mysqli_query($con,$updateSql);
			mysqli_close($con);
			break;
			
			case 0:
			$updateSql = "UPDATE user_master SET logic_delete_flag = '1' WHERE  user_id ='{$userId}'";
			$updateResult = mysqli_query($con,$updateSql);
			mysqli_close($con);
			break;			
				
		}
		
		
				
		header("Location:list.php");
	}
?>