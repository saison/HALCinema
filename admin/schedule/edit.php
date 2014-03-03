<?PHP
	$pageTitle="上映スケジュール一覧";
	require_once("../header.php");
	$con = getConnection();
		
	if(isset($_GET['id'])){	//from details.php
		
		//上映ID
		$showId = $_GET['id'];
		
		$scheduleSql = "SELECT * FROM show_schedule WHERE show_id = '{$showId}'";
		$scheduleSqlResult = mysqli_query($con,$scheduleSql);
		$rowscheduleSqlResult = mysqli_fetch_array($scheduleSqlResult);
		
		$showDay = $rowscheduleSqlResult['show_day'];
		$startTime = $rowscheduleSqlResult['start_time'];
		$screen = substr($rowscheduleSqlResult['screen_id'],5,1);
		$cinemaId = $rowscheduleSqlResult['cinema_id'];
		$movieSql = "SELECT cinema_name FROM cinema_master WHERE cinema_id = '{$cinemaId}'";
		$movieSqlResult = mysqli_query($con,$movieSql);
		$rowMovieSqlResult = mysqli_fetch_array($movieSqlResult);
		
		$cinemaName = $rowMovieSqlResult['cinema_name'];
		
	}else if(isset($_GET['error'])){//from editCheck.php
	
		$showId =  $_SESSION['editCheckShowId'];
		$startTime =  $_SESSION['editCheckStartTime'];
		$showDay = $_SESSION['editCheckShowDay'];
		$screen = $_SESSION['editCheckScNum'];
		$cinemaId = $_SESSION['editCheckCinemaId'];
		
		
		$movieSql = "SELECT cinema_name FROM cinema_master WHERE cinema_id = '{$cinemaId}'";
		$movieSqlResult = mysqli_query($con,$movieSql);
		$rowMovieSqlResult = mysqli_fetch_array($movieSqlResult);
		
		$cinemaName = $rowMovieSqlResult['cinema_name'];
		mysqli_close($con);
				
	}else{ // from other
		header("location:list.php");
	}
	
	//エラー処理
	$error="";
	if(isset($_GET['showDay'])){$error .="<p>上映日が間違っています。</p>";}
	if(isset($_GET['startTime'])){$error .="<p>上映開始時間が間違っています。</p>";}

?>	
	<!-- main start -->
	<h2><?PHP echo $showId; ?> - 編集</h2>
    <?PHP echo $error;?>
		<!-- movie list table -->
		<form action="editCheck.php" method="post">
		<table id="editTable" class="table table-striped table-bordered table-condensed listTable">
       			 <tr>
					<th>上映ID</th>
					<td><?PHP echo $showId;?></td>
				</tr>
				<tr>
					<th>映画名</th>
					<td>
                    <select name="cinemaId">
                    <?PHP
						//映画名をプルダウンメニューで表示
						$con = getConnection();
						$movieSql = "SELECT cinema_name,cinema_id FROM cinema_master ";
						$movieSqlResult = mysqli_query($con,$movieSql);
						while(($rowMovieSqlResult = mysqli_fetch_array($movieSqlResult)) != false):
						//$cinemaNameの映画はあらかじめselectedしておく
						if($cinemaName==$rowMovieSqlResult['cinema_name']):
					?>
                    <option value='<?PHP echo $rowMovieSqlResult['cinema_id']; ?>' selected><?PHP echo $rowMovieSqlResult['cinema_name']; ?></option>
                    <?PHP else: ?>
                    <option value='<?PHP echo $rowMovieSqlResult['cinema_id'];?>'><?PHP echo $rowMovieSqlResult['cinema_name']; ?></option>
                    <?PHP endif; endwhile;	mysqli_close($con);?>	
                    </select>
                    </td>
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
			<a href="deleteSql.php?id=<?PHP echo $showId; ?>" class="btn btn-danger btn-lg"><span class="glyphicon glyphicon-remove"></span>削除する</a>
            <input type="hidden" name="showId" value="<?PHP echo $showId;?>">
			<input type="submit" class="btn btn-primary btn-lg" value="確認画面へ" name="send"></div>
        </form>
        <a href="edit.php?id=<?PHP echo $showId; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>デフォルト</a>
		<!-- /movie list table -->
	<!-- main end -->

<?PHP
	require_once("../footer.php");
?>


