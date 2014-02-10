<?PHP
	$pageTitle="上映スケジュール編集";
	require_once("../header.php");
	
	if(isset($_GET['id'])){//スケジュール詳細から飛んできた時
		
		$showId = $_SESSION['showId'];
		$cinemaName = $_SESSION['cinemaName'];//映画名
		$showDay = $_SESSION['showDay'];//上映日
		$startTime = $_SESSION['startTime'];//上映開始時間
		$endTime = $_SESSION['endTime'];//上映終了時間
		$screen = $_SESSION['screen'];//スクリーン
		
		$showDay = explode('/',$showDay);
		$year = $showDay[0];
		$month = $showDay[1];
		$day  =  $showDay[2];
		
		$startTime = explode(':',$startTime);
		$startHour = $startTime[0];
		$startMin = $startTime[1];
		
	}else if(isset($_SESSION['year'])){//チェックで戻ってきたとき
	
		$year = $_SESSION['year'];
		$month = $_SESSION['month'];
		$day = $_SESSION['day'];
		$startHour = $_SESSION['startHour'];
		$startMin = $_SESSION['startMin'];
		$screen = $_SESSION['scNum'];
		$cinemaId = $_SESSION['cinemaId'];
		
		$con = getConnection();
		$movieSql = "SELECT * FROM cinema_master WHERE cinema_id = '{$cinemaId}'";
		$movieSqlResult = mysqli_query($con,$movieSql);
		$rowMovieSqlResult = mysqli_fetch_array($movieSqlResult);
		
		$cinemaName = $rowMovieSqlResult['cinema_name'];
		mysqli_close($con);
				
	}
	
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
	if(isset($_GET['startEnd'])){
		$error .="<p>開始時間と終了時間が矛盾しています。</p>";
	}
	if(isset($_GET['startHour'])){
		$error .="<p>開始時間が間違っています。（時）</p>";
	}
	if(isset($_GET['startMin'])){
		$error .="<p>開始時間が間違っています。（分）</p>";
	}
	if(isset($_GET['endHour'])){
		$error .="<p>終了時間が間違っています。（時）</p>";
	}
	if(isset($_GET['endMin'])){
		$error .="<p>終了時間が間違っています。（分）</p>";
	}
	if(isset($_GET['screen'])){
		$error .="<p>スクリーンは1～8の半角数字で入力して下さい。</p>";
	}

?>
	
	<!-- main start -->
	<h2><?PHP echo "映画スケジュール" ?> - 編集</h2>
    <?PHP echo $error;?>
		<!-- movie list table -->
		<form action="editCheck.php" method="post">
		<table id="editTable" class="table table-striped table-bordered table-condensed listTable">
       			 <tr>
					<th>上映ID</th>
					<td><?PHP echo $_SESSION['showId'];?></td>
					<td class="info">映画ID ex)xxxxxxxx </td>
				</tr>
				<tr>
					<th>映画名</th>
					<td><select name="cinemaId">
                    <?PHP
						$con = getConnection();
						$movieSql = "SELECT cinema_name,cinema_id FROM cinema_master ";
						$movieSqlResult = mysqli_query($con,$movieSql);
						while(($rowMovieSqlResult = mysqli_fetch_array($movieSqlResult)) != false){
							if($cinemaName==$rowMovieSqlResult['cinema_name']){
								echo "<option value='".$rowMovieSqlResult['cinema_id']."' selected>".$rowMovieSqlResult['cinema_name']."</option>";		
							}else{
								echo "<option value='".$rowMovieSqlResult['cinema_id']."'>".$rowMovieSqlResult['cinema_name']."</option>";		
							}
						}
						mysqli_close($con);		
					?>
                    </select></td>
					<td class="info">映画ID ex)xxxxxxxx</td>
				</tr>
				<tr>
					<th>上映日</th>
					<td><input type="text" name="year" value="<?PHP echo $year;?>" style="width:50px; text-align:right;"> / <input type="text" name="month" value="<?PHP echo $month;?>"  style="width:25px; text-align:right;"> / <input type="text" name="day" value="<?PHP echo $day;?>"  style="width:25px;"></td>
					<td class="info">映画ID ex)xxxxxxxx</td>
				</tr>
				<tr>
					<th>上映開始時間</th>
					<td><input type="text" name="startHour" value="<?PHP echo $startHour;?>" style="width:25px; text-align:right;">：<input type="text" name="startMin" value="<?PHP echo $startMin;?>"  style="width:25px;"></td>
					<td class="info">映画ID ex)xxxxxxxx</td>
				</tr>
				<tr> 
					<th>スクリーン</th>
					<td><input type="text" name="screen" value="<?PHP echo $screen;?>"></td>
					<td class="info">映画ID ex)xxxxxxxx</td>
				</tr>
		</table>
		<div id="editSend">
			<a href="delete.php" class="btn btn-danger btn-lg"><span class="glyphicon glyphicon-remove"></span>削除する</a>
			<input type="submit" class="btn btn-primary btn-lg" value="確認画面へ" name="send"></div>
		</form>
        <a href="../schedule/edit.php?id=<?PHP echo $_SESSION['showId']; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>デフォルト</a>
		<!-- /movie list table -->
	<!-- main end -->

<?PHP
	require_once("../footer.php");
?>


