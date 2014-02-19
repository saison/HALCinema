<script src="../js/jquery-1.10.2.min.js"></script>
<script>
$(function(){
	$("#mainPhoto").change( function() {
		var imgName = $("#mainPhoto").val();
		document.getElementById("mainPhotoImg").src ="../../tokyo/movie/images/"+imgName;
	});
	
	$("#subPhoto1").change( function() {
		var imgName = $("#subPhoto1").val();
		document.getElementById("subPhoto1Img").src ="../../tokyo/movie/images/"+imgName;
	});
	
	$("#subPhoto2").change( function() {
		var imgName = $("#subPhoto2").val();
		document.getElementById("subPhoto2Img").src ="../../tokyo/movie/images/"+imgName;
	});
	
	$("#subPhoto3").change( function() {
		var imgName = $("#subPhoto3").val();
		document.getElementById("subPhoto3Img").src ="../../tokyo/movie/images/"+imgName;
	});
	
	$("#subPhoto4").change( function() {
		var imgName = $("#subPhoto4").val();
		document.getElementById("subPhoto4Img").src ="../../tokyo/movie/images/"+imgName;
	});
});
</script>

<?PHP
	$pageTitle="映画一覧";
	require_once("../header.php");
	//映画ID取得
	if(isset($_GET['id'])){//from movie/details.php or movie/list.php or schedule/details.php
		$cinemaId = $_GET['id'];
		
		//映画情報取得 
		$con = getConnection();
		$movieSql="SELECT * FROM cinema_master WHERE cinema_id='{$cinemaId}'";
		$movieSelectResult =  mysqli_query($con,$movieSql);
		$rowMovieSelectResult = mysqli_fetch_array($movieSelectResult);
		$cinemaName =  $rowMovieSelectResult['cinema_name'];
		$startDay = $rowMovieSelectResult['start_day'];
		$endDay = $rowMovieSelectResult['end_day'];
		$runningTime = $rowMovieSelectResult['running_time'];
		$cinemaDescription = $rowMovieSelectResult['cinema_description'];
		$movieDirector = $rowMovieSelectResult['movie_director'];
		$moviePerfomer = $rowMovieSelectResult['movie_perfomer'];
		$mainPhoto = $rowMovieSelectResult['main_photo'];
		$subPhoto1 = $rowMovieSelectResult['sub_photo1'];
		$subPhoto2 = $rowMovieSelectResult['sub_photo2'];
		$subPhoto3 = $rowMovieSelectResult['sub_photo3'];
		$subPhoto4 = $rowMovieSelectResult['sub_photo4'];
		mysqli_close($con);
		
	}else if(isset($_GET['error'])){//from editCheck.php
	
		$cinemaId = $_SESSION['editCheckCinemaId'];
		$cinemaName =  $_SESSION['editCheckCinemaName'];
		$startDay = $_SESSION['editCheckStartDay'];
		$endDay = $_SESSION['editCheckEndDay'];
		$runningTime = $_SESSION['editCheckRunningtime'];
		$cinemaDescription = $_SESSION['editCheckMovieDescription'];
		$movieDirector = $_SESSION['editCheckMovieDirector'];
		$moviePerfomer = $_SESSION['editCheckPerfomer'];
		$mainPhoto = $_SESSION['editCheckMainPhoto'];
		$subPhoto1 = $_SESSION['editCheckSubPhoto1'];
		$subPhoto2 = $_SESSION['editCheckSubPhoto2'];
		$subPhoto3 = $_SESSION['editCheckSubPhoto3'];
		$subPhoto4 = $_SESSION['editCheckSubPhoto4'];

	}else{//from other
		header("Loacation:list.php");
	}
	
	//エラー処理
	$error="";
	if(isset($_GET['startDay'])){$error .="<p>上映開始日が間違っています。</p>";}
	if(isset($_GET['endDay'])){$error .="<p>上映終了日が間違っています</p>";}
	if(isset($_GET['runningTime'])){$error .="<p>上映時間が間違っています。</p>";}
	if(isset($_GET['startEnd'])){$error .="<p>開始日と終了日が矛盾しています。</p>";}
	if(isset($_GET['cinemaDescription'])){$error .="<p>映画説明文を入力して下さい。</p>";}
	if(isset($_GET['cinemaName'])){$error .="<p>映画名を入力して下さい。</p>";}
	if(isset($_GET['movieDirector'])){$error .="<p>監督名を入力して下さい。</p>";}
	if(isset($_GET['moviePerfomer'])){$error .="<p>出演者を入力して下さい。</p>";}
?>
	<!-- main start -->
	<h2><?PHP echo $cinemaName; ?> - 編集<a href="editImageUpload.php?id=<?PHP echo $cinemaId;?>" id="editButton" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>この映画の画像をアップロード</a></h2>
    	<?PHP echo $error;?>
		<!-- movie list table -->
		<form action="editCheck.php" method="post" enctype="multipart/form-data">
		<table id="editTable" class="table table-striped table-bordered table-condensed listTable">
        		<tr>
					<th>映画ID</th>
					<td><input type="hidden" name="cinemaId" value="<?PHP echo $cinemaId;?>"><?PHP echo $cinemaId;?></td>
				</tr>
				<tr>
					<th>タイトル</th>
					<td><input type="text" name="cinemaName" value="<?PHP echo $cinemaName;?>" required></td>
				</tr>
				<tr>
					<th>画像</th>
					<td>
                    <p>mainPhoto</p>
                    <img src="../../tokyo/movie/images/<?PHP echo $mainPhoto;?>" alt="" id="mainPhotoImg">
                    <?php
						//イメージフォルダのファイル取得
						//ディレクトリ
    					$dir = '../../tokyo/movie/images/';
						//ディレクトリおーぷん
   						$fileList = opendir($dir);
						//ファイルリストを配列に
   					 	$fileListArray = array();
						// "readdir関数が返す値には「.」と「..」が含まれます。また、ディレクトリ名も返されるので返された値がディレクトリ名でないか判別します。"  らしい。
						while(false !== ($fn = readdir($fileList))){
						   if($fn !== '.' && $fn !== '..' && !is_dir($dir.$fn)){
								array_push($fileListArray, $fn);
							}
						}
						//ディレクトリを閉じます。
						closedir($fileList);
					?>
                    <select name="mainPhoto" id="mainPhoto">
                    	<?PHP for($i=0;$i<count($fileListArray);$i++):	//mainフォトのみ表示?>
						<?PHP if(preg_match("/main/", $fileListArray[$i]))://mainのフォトなら?>
                        <?PHP if($fileListArray[$i]==$mainPhoto):?>
                        <option value="<?PHP echo $fileListArray[$i];?>" selected><?PHP echo $fileListArray[$i];?></option>
                        <?PHP else:?>
                        <option value="<?PHP echo $fileListArray[$i];?>"><?PHP echo $fileListArray[$i];?></option>
                        <?PHP endif;?>
                        <?PHP endif;?>
                        <?PHP endfor;?>
                    </select><br />
                    
                    <p>subPhoto</p>
                    <?PHP if($subPhoto1==NULL ):?>
                    <img src="../../tokyo/movie/images/noImg.png" alt="" id="subPhoto1Img">
                    <?PHP else:?>
                    <img src="../../tokyo/movie/images/<?PHP echo $subPhoto1;?>" alt="" id="subPhoto1Img">
                    <?PHP endif;?>
                    <select name="subPhoto1" id="subPhoto1">
                    <option value="noImg.png">登録なし</option>
                    <?PHP for($i=0;$i<count($fileListArray);$i++):	//sub1フォトのみ表示?>
					<?PHP if(preg_match("/sub1/", $fileListArray[$i]))://sub1のフォトなら?>
                    <?PHP if($fileListArray[$i]==$subPhoto1):?>
                    <option value="<?PHP echo $fileListArray[$i];?>" selected><?PHP echo $fileListArray[$i];?></option>
                    <?PHP else:?>
                    <option value="<?PHP echo $fileListArray[$i];?>"><?PHP echo $fileListArray[$i];?></option>
                    <?PHP endif;?>
                    <?PHP endif;?>
                    <?PHP endfor;?>
                    </select>
                    
                    <?PHP if($subPhoto2==NULL ):?>
                    <img src="../../tokyo/movie/images/noImg.png" alt="" id="subPhoto2Img">
                    <?PHP else:?>
                    <img src="../../tokyo/movie/images/<?PHP echo $subPhoto2;?>" alt="" id="subPhoto2Img">
                    <?PHP endif;?>
                    <select name="subPhoto2" id="subPhoto2">
                    <option value="noImg.png">登録なし</option>
                    <?PHP for($i=0;$i<count($fileListArray);$i++):	//sub2フォトのみ表示?>
					<?PHP if(preg_match("/sub2/", $fileListArray[$i]))://sub2のフォトなら?>
                    <?PHP if($fileListArray[$i]==$subPhoto2):?>
                    <option value="<?PHP echo $fileListArray[$i];?>" selected><?PHP echo $fileListArray[$i];?></option>
                    <?PHP else:?>
                    <option value="<?PHP echo $fileListArray[$i];?>"><?PHP echo $fileListArray[$i];?></option>
                    <?PHP endif;?>
                    <?PHP endif;?>
                    <?PHP endfor;?>
                    </select><br />
                    
                    <?PHP if($subPhoto3==NULL ):?>
                    <img src="../../tokyo/movie/images/noImg.png" alt="" id="subPhoto3Img">
                    <?PHP else:?>
                    <img src="../../tokyo/movie/images/<?PHP echo $subPhoto3;?>" alt="" id="subPhoto3Img">
                    <?PHP endif;?>
                    <select name="subPhoto3" id="subPhoto3">
                    <option value="noImg.png">登録なし</option>
                    <?PHP for($i=0;$i<count($fileListArray);$i++):	//sub3フォトのみ表示?>
					<?PHP if(preg_match("/sub3/", $fileListArray[$i]))://sub3のフォトなら?>
                    <?PHP if($fileListArray[$i]==$subPhoto3):?>
                    <option value="<?PHP echo $fileListArray[$i];?>" selected><?PHP echo $fileListArray[$i];?></option>
                    <?PHP else:?>
                    <option value="<?PHP echo $fileListArray[$i];?>"><?PHP echo $fileListArray[$i];?></option>
                    <?PHP endif;?>
                    <?PHP endif;?>
                    <?PHP endfor;?>
                    </select>
                    
                    <?PHP if($subPhoto4==NULL ):?>
                    <img src="../../tokyo/movie/images/noImg.png" alt="" id="subPhoto4Img">
                    <?PHP else:?>
                    <img src="../../tokyo/movie/images/<?PHP echo $subPhoto4;?>" alt="" id="subPhoto4Img">
                    <?PHP endif;?>
                    <select name="subPhoto4" id="subPhoto4">
                    <option value="noImg.png">登録なし</option>
                    <?PHP for($i=0;$i<count($fileListArray);$i++):	//sub4フォトのみ表示?>
					<?PHP if(preg_match("/sub4/", $fileListArray[$i]))://sub4のフォトなら?>
                    <?PHP if($fileListArray[$i]==$subPhoto4):?>
                    <option value="<?PHP echo $fileListArray[$i];?>" selected><?PHP echo $fileListArray[$i];?></option>
                    <?PHP else:?>
                    <option value="<?PHP echo $fileListArray[$i];?>"><?PHP echo $fileListArray[$i];?></option>
                    <?PHP endif;?>
                    <?PHP endif;?>
                    <?PHP endfor;?>
                    </select>
                    </td>
				</tr>
				<tr>
					<th>公開開始日</th>
                    <?PHP 
						//　※　input type dateは現在Chromeのみ。更にvalueの形式はYYYY-MM-DDでも表示はYYYY/MM/DD(chrome以外だとvalueのYYYY-MM-DDが表示される)
						
						//ブラウザ情報取得
						$agent = getenv("HTTP_USER_AGENT"); 
						//chromeの場合
						if(mb_ereg("Chrome",$agent)):
					?>
					<td><input type="date" name="startDay" value="<?PHP echo $startDay; ?>" required></td>
					<?PHP else: //chrome以外の場合 ?>
                    <td><input type="date" name="startDay" value="<?PHP echo $startDay; ?>" required></td>
                    <td class="info">ex)   YYYY-MM-DD</td>
                    <?PHP endif; ?>  
				</tr>
				<tr>
					<th>公開終了日</th>
					<?PHP 
						//　※　input type dateは現在Chromeのみ。更にvalueの形式はYYYY-MM-DDでも表示はYYYY/MM/DD(chrome以外だとvalueのYYYY-MM-DDが表示される)
						
						//chromeの場合
						if(mb_ereg("Chrome",$agent)):
					?>
					<td><input type="date" name="endDay" value="<?PHP echo $endDay; ?>" required></td>
					<?PHP else: //chrome以外の場合 ?>
                    <td><input type="date" name="endDay" value="<?PHP echo $endDay; ?>" required></td>
                    <td class="info">ex)   YYYY-MM-DD</td>
                    <?PHP endif; ?>  
				</tr>
				<tr>
					<th>上映時間</th>
					<td><input type="number" name="runningtime" value = "<?PHP echo $runningTime;?>" required>分</td>
				</tr>
				<tr>
					<th>映画説明文</th>
					<td><textarea name="movieDescription" cols="80" rows="10"  value = "<?PHP echo $cinemaDescription;?>" required><?PHP echo $cinemaDescription;?></textarea></td>
				</tr>
				<tr>
					<th>監督</th>
					<td><input type="text" name="movieDirector" value="<?PHP echo $movieDirector;?>" required></td>
				</tr>
                <tr>
					<th>出演者</th>
					<td><textarea name="moviePerfomer" cols="80" rows="3"  value="<?PHP echo $moviePerfomer;?>" required><?PHP echo $moviePerfomer;?></textarea></td>
				</tr>
		</table>
		<div id="editSend">
			<a href="deleteSql.php?id=<?PHP echo $cinemaId;?>" class="btn btn-danger btn-lg"><span class="glyphicon glyphicon-remove"></span>削除する</a>
			<input type="submit" class="btn btn-primary btn-lg" value="確認画面へ" name="send"></div>
		</form>
        <a href="edit.php?id=<?PHP echo $cinemaId; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>デフォルト</a>
		<!-- /movie list table -->
	<!-- main end -->

<?PHP
	require_once("../footer.php");
?>

