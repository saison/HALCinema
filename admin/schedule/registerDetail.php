<?PHP
	$pageTitle="上映スケジュール登録";
	require_once("../header.php");
	require_once("../../tokyo/module/functions.php");
	$con = getConnection();
	
	if(isset($_GET['id'])){
		
		$cinemaId = $_GET['id'];
		$_SESSION['registerCinemaId']= $cinemaId;
		
	}else if(isset($_GET['error'])){//チェックで戻ってきたとき
	
		$year = $_SESSION['registerCheckYear'];
		$month = $_SESSION['registerCheckMonth'];
		$day = $_SESSION['registerCheckDay'];
		$startHour = $_SESSION['registerCheckStartHour'];
		$startMin = $_SESSION['registerCheckStartMin'];
		$screen = $_SESSION['registerCheckScNum'];
		
	}
	
	$movieSql = "SELECT cinema_name FROM cinema_master WHERE cinema_id = '{$_SESSION['registerCinemaId']}'";
	$movieSqlResult = mysqli_query($con,$movieSql);
	while(($rowMovieSqlResult = mysqli_fetch_array($movieSqlResult))!=false){
		$cinemaName = $rowMovieSqlResult['cinema_name'];
		$_SESSION['registerCinemaName'] = $cinemaName;
	}
	
	$scheduleSql = "SELECT show_id FROM show_schedule";
	$scheduleSqlResult = mysqli_query($con,$scheduleSql);
	$scheduleCount = mysqli_num_rows($scheduleSqlResult);
	
	
	
	//上映ＩＤを求める
	$showId="sh";
	for($i=0;$i<(8-mb_strlen(strval($scheduleCount+1)));$i++){
		$showId .= "0";
	}
	$showId .= strval($scheduleCount+1);
	$_SESSION['registerShowId'] = $showId; 
	
		//エラー
	$error="";
	
	if(isset($_GET['type'])){
		$error .="<p>数値は半角で入力して下さい</p>";
	}
	if(isset($_GET['year'])){
		$error .="<p>上映年は4桁で入力して下さい。</p>";
	}
	if(isset($_GET['month'])){
		$error .="<p>上映月が間違っています。</p>";
	}
	if(isset($_GET['day'])){
		$error .="<p>上映日が間違っています。</p>";
	}
	if(isset($_GET['startHour'])){
		$error .="<p>開始時間が間違っています。（時）</p>";
	}
	if(isset($_GET['startMin'])){
		$error .="<p>開始時間が間違っています。（分）</p>";
	}
	if(isset($_GET['screen'])){
		$error .="<p>スクリーンが選択されていません。</p>";
	}

?>
	
	<!-- main start -->
	<h2><?PHP echo "上映スケジュール" ?> - 新規追加 - 追加詳細</h2>
    <?PHP echo $error;?>
    
		<form action="registerDetailCheck.php" method="post">
		<table id="editTable" class="table table-striped table-bordered table-condensed listTable">
            <tr>
            <th>映画ID</th>
            <td><?PHP echo $_SESSION['registerCinemaId'];?></td>
            </tr>
            <tr>
            <th>映画名</th>
            <td><?PHP echo $_SESSION['registerCinemaName'];?></td>
            </tr>
            <tr>
            <th>上映ID</th>
            <td><?PHP echo $_SESSION['registerShowId'];?></td>
            </tr>
            <tr>
            <th>開始時間</th>
            <td>
            	<?PHP
					if(isset($_GET['error'])){
						echo "<input type='text' name='startHour'  style='width:25px; text-align:right;' value='".$startHour."'>：<input type='text' name='startMin'  style='width:25px;' value='".$startMin."'>";
					}else{
						echo "<input type='text' name='startHour'  style='width:25px; text-align:right;'>：<input type='text' name='startMin'  style='width:25px;'>";
					}
				?>
            </td>
            </tr>
            <tr>
            <th>上映日</th>
            <td>
            	<?PHP
					if(isset($_GET['error'])){
						echo   "<input type='text' name='year' style='width:50px; text-align:right;' value='".$year."'> / <input type='text' name='month'  style='width:25px; text-align:right;' value='".$month."'> / <input type='text' name='day'  style='width:25px;' value='".$day."'>";
					}else{
						echo   "<input type='text' name='year' style='width:50px; text-align:right;'> / <input type='text' name='month'  style='width:25px; text-align:right;'> / <input type='text' name='day'  style='width:25px;'>";
					}         
				?>
			</td>
            </tr>
            <tr>
            <th>スクリーン</th>
            <td>
            	<select name="screen">
                	<?PHP
						if(isset($_GET['error'])){
							if($screen==0){
								echo "<option value='0' selected>選択して下さい。</option>";
							}else{
								echo "<option value='0'>選択して下さい。</option>";
							}
							$screenSql = "SELECT screen_number FROM screen_master WHERE theater_id='th0001'";
							$screenSqlResult = mysqli_query($con,$screenSql);
						
							while(($rowscreenSqlResult = mysqli_fetch_array($screenSqlResult))!=false){
								if($screen==$rowscreenSqlResult['screen_number']){
									echo "<option value='".$rowscreenSqlResult['screen_number']."' selected>".$rowscreenSqlResult['screen_number']."</option>";
								}else{
									echo "<option value='".$rowscreenSqlResult['screen_number']."'>".$rowscreenSqlResult['screen_number']."</option>";
								}
							}
							mysqli_close($con);
							
						}else{
							echo "<option value='0' selected>選択して下さい。</option>";
							$screenSql = "SELECT screen_number FROM screen_master WHERE theater_id='th0001'";
							$screenSqlResult = mysqli_query($con,$screenSql);
						
							while(($rowscreenSqlResult = mysqli_fetch_array($screenSqlResult))!=false){
								echo "<option value='".$rowscreenSqlResult['screen_number']."'>".$rowscreenSqlResult['screen_number']."</option>";
							}
							mysqli_close($con);
						}		
                    ?>
            	</select>        
            </td>
            </tr>
        </table>
		<div id="editSend">
			<input type="submit" class="btn btn-primary btn-lg"  name="send" value="確認画面へ">
        </div>
		</form>

	<!-- main end -->

<?PHP
	require_once("../footer.php");
?>



