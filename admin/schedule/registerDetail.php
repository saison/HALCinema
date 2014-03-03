<?PHP
	$pageTitle="上映スケジュール登録";
	require_once("../header.php");
	require_once("../../tokyo/module/functions.php");
	$con = getConnection();
	
	if(isset($_GET['id'])){
		
		$cinemaId = $_GET['id'];
		$showDay = "";
		$startTime = "";
		$screen = "";
		//映画名を求める
		$movieSql = "SELECT cinema_name FROM cinema_master WHERE cinema_id = '{$cinemaId}'";
		$movieSqlResult = mysqli_query($con,$movieSql);
		while(($rowMovieSqlResult = mysqli_fetch_array($movieSqlResult))!=false){
			$cinemaName = $rowMovieSqlResult['cinema_name'];
		}
		
	}else if(isset($_GET['error'])){//チェックで戻ってきたとき
		$cinemaId ="";
		$showDay = "";
		$startTime = "";
		$screen = "";
		//映画名を求める
		$movieSql = "SELECT cinema_name FROM cinema_master WHERE cinema_id = '{$cinemaId}'";
		$movieSqlResult = mysqli_query($con,$movieSql);
		while(($rowMovieSqlResult = mysqli_fetch_array($movieSqlResult))!=false){
			$cinemaName = $rowMovieSqlResult['cinema_name'];
		}
		
	}
	
	
	//上映ＩＤを求める
	$scheduleSql = "SELECT COUNT(*) FROM show_schedule";
	$scheduleSqlResult = mysqli_query($con,$scheduleSql);
	$rowScheduleSqlResult = mysqli_fetch_array($scheduleSqlResult);
	$showId="sh";
	for($i=0;$i<(8-mb_strlen(strval($rowScheduleSqlResult[0]+1)));$i++){
		$showId .= "0";
	}
	$showId .= strval($rowScheduleSqlResult[0]+1);
	
		//エラー
	$error="";
	
?>
	
	<!-- main start -->
	<h2><?PHP echo "上映スケジュール" ?> - 新規追加 - 追加詳細</h2>
    <?PHP echo $error;?>
    
		<form action="registerDetailCheck.php" method="post">
		<table id="editTable" class="table table-striped table-bordered table-condensed listTable">
            <tr>
            <th>映画ID</th>
            <td><?PHP echo $cinemaId;?></td>
            </tr>
            <tr>
            <th>映画名</th>
            <td><?PHP echo $cinemaName?></td>
            </tr>
            <tr>
            <th>上映ID</th>
            <td><?PHP echo $showId;?></td>
            </tr>
            
 			<tr>
				<th>上映日</th>
                <?PHP 
					//　※　input type dateは現在Chromeのみ。更にvalueの形式はYYYY-MM-DDでも表示はYYYY/MM/DD(chrome以外だとvalueのYYYY-MM-DDが表示される)
						
					//ブラウザ情報取得
					$agent = getenv("HTTP_USER_AGENT"); 
					//chromeの場合
					if(mb_ereg("Chrome",$agent)):
				?>
				<td><input type="date" name="showDay" value="<?PHP echo $showDay; ?>" required></td>
				<?PHP else: //chrome以外の場合 ?>
                <td><input type="date" name="showDay" value="<?PHP echo $showDay; ?>" required></td>
                <td class="info">ex)   YYYY-MM-DD</td>
                <?PHP endif; ?>                  
			</tr>
			<tr>
				<th>上映開始時間</th>
                <?PHP if(mb_ereg("Chrome",$agent))://chromeの時?>	
                <td><input type="time" name="startTime" value="<?PHP echo $startTime;?>" required></td>
				<?PHP else: //chrome以外の場合 ?>
                <td><input type="time" name="startTime" value="<?PHP echo $startTime;?>" required></td>
                <td class="info">ex)   hh:mm</td>
                <?PHP endif; ?>  	
			</tr>
  			<tr> 
				<th>スクリーン</th>
				<td>
                <select name="screen" class="form-control">
                	<option value="" disabled="disabled">選択して下さい。</option>
                    <?PHP
						//スクリーンの情報を取得
						$con = getConnection();
                        $screenSql = "SELECT screen_number FROM screen_master WHERE theater_id='th0001'";
                        $screenSqlResult = mysqli_query($con,$screenSql);    
                        while(($rowscreenSqlResult = mysqli_fetch_array($screenSqlResult))!=false):
						//もともと登録されている映画情報のスクリーンだった場合
						//もしくは、ユーザーが一度選んで確認画面のエラーで戻ってきたときに、スクリーンの情報があらかじめselectedされているようにする
							
						if($screen==$rowscreenSqlResult['screen_number']):
					?>
					<option value="<?PHP echo $rowscreenSqlResult['screen_number'];?>"selected><?PHP echo $rowscreenSqlResult['screen_number']; ?></option>
					<?PHP else: ?>
					<option value="<?PHP echo $rowscreenSqlResult['screen_number'];?>"><?PHP echo $rowscreenSqlResult['screen_number']; ?></option>
					<?PHP endif; endwhile; mysqli_close($con);?>     
                   </select>        
            	</td>
			</tr>
        </table>
		<div id="editSend">
        	<input type="hidden" name="showId" value="<?PHP echo $showId;?>">
        	<input type="hidden" name="cinemaId" value="<?PHP echo $cinemaId;?>">
			<input type="submit" class="btn btn-primary btn-lg"  name="send" value="確認画面へ">
        </div>
		</form>

	<!-- main end -->

<?PHP
	require_once("../footer.php");
?>



