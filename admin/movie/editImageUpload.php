<?PHP
	$pageTitle="映画一覧";
	require_once("../header.php");
	
	//映画ID取得
	if(isset($_GET['id'])){//from movie/edit.php
		$cinemaId = $_GET['id'];
	}
	
	//UPLOAD
	$uploadResult = "";
	if(isset($_POST['sendMain'])){//from editImageUpload.php
		$cinemaId = $_POST['cinemaId'];
		//main Upload
		if(is_uploaded_file($_FILES['fileMain']['tmp_name'])){
			move_uploaded_file($_FILES['fileMain']['tmp_name'],"../../tokyo/movie/images/".$cinemaId."main.jpg");
			//upload
			$con = getConnection();
			$updateSql="UPDATE cinema_master SET main_photo = '{$cinemaId}main.jpg' WHERE cinema_id='{$cinemaId}'";			
			$updateResult = mysqli_query($con,$updateSql);
			mysqli_close($con);
			$uploadResult="アップロードされました。";
		}
	}
	if(isset($_POST['sendSub1'])){//from editImageUpload.php
		$cinemaId = $_POST['cinemaId'];
		//sub1 Upload
		if(is_uploaded_file($_FILES['fileSub1']['tmp_name'])){
			move_uploaded_file($_FILES['fileSub1']['tmp_name'],"../../tokyo/movie/images/".$cinemaId."sub1.jpg");
			//upload
			$con = getConnection();
			$updateSql="UPDATE cinema_master SET sub_photo1 = '{$cinemaId}sub1.jpg' WHERE cinema_id='{$cinemaId}'";			
			$updateResult = mysqli_query($con,$updateSql);
			mysqli_close($con);
			$uploadResult="アップロードされました。";
		}
	}
	if(isset($_POST['sendSub2'])){//from editImageUpload.php
		$cinemaId = $_POST['cinemaId'];
		//sub2 Upload
		if(is_uploaded_file($_FILES['fileSub2']['tmp_name'])){
			move_uploaded_file($_FILES['fileSub2']['tmp_name'],"../../tokyo/movie/images/".$cinemaId."sub2.jpg");
			//upload
			$con = getConnection();
			$updateSql="UPDATE cinema_master SET sub_photo2 = '{$cinemaId}sub2.jpg' WHERE cinema_id='{$cinemaId}'";			
			$updateResult = mysqli_query($con,$updateSql);
			mysqli_close($con);
			$uploadResult="アップロードされました。";
		}
	}
	if(isset($_POST['sendSub3'])){//from editImageUpload.php
		$cinemaId = $_POST['cinemaId'];
		//sub3 Upload
		if(is_uploaded_file($_FILES['fileSub3']['tmp_name'])){
			move_uploaded_file($_FILES['fileSub3']['tmp_name'],"../../tokyo/movie/images/".$cinemaId."sub3.jpg");
			//upload
			$con = getConnection();
			$updateSql="UPDATE cinema_master SET sub_photo3 = '{$cinemaId}sub3.jpg' WHERE cinema_id='{$cinemaId}'";			
			$updateResult = mysqli_query($con,$updateSql);
			mysqli_close($con);
			$uploadResult="アップロードされました。";
		}
	}
	if(isset($_POST['sendSub4'])){//from editImageUpload.php
		$cinemaId = $_POST['cinemaId'];
		//sub4 Upload
		if(is_uploaded_file($_FILES['fileSub4']['tmp_name'])){
			move_uploaded_file($_FILES['fileSub4']['tmp_name'],"../../tokyo/movie/images/".$cinemaId."sub4.jpg");
			//upload
			$con = getConnection();
			$updateSql="UPDATE cinema_master SET sub_photo4 = '{$cinemaId}sub4.jpg' WHERE cinema_id='{$cinemaId}'";			
			$updateResult = mysqli_query($con,$updateSql);
			mysqli_close($con);
			$uploadResult="アップロードされました。";
		}		
	}
	//映画情報取得 
	$con = getConnection();
	$movieSql="SELECT * FROM cinema_master WHERE cinema_id='{$cinemaId}'";
	$movieSelectResult =  mysqli_query($con,$movieSql);
	$rowMovieSelectResult = mysqli_fetch_array($movieSelectResult);
	$cinemaName =  $rowMovieSelectResult['cinema_name'];
	$mainPhoto = $rowMovieSelectResult['main_photo'];
	$subPhoto1 = $rowMovieSelectResult['sub_photo1'];
	$subPhoto2 = $rowMovieSelectResult['sub_photo2'];
 	$subPhoto3 = $rowMovieSelectResult['sub_photo3'];
	$subPhoto4 = $rowMovieSelectResult['sub_photo4'];
	mysqli_close($con);
?>
	<!-- main start -->
	<h2><?PHP echo $cinemaName; ?> - 画像アップロード<a href="edit.php?id=<?PHP echo $cinemaId;?>" id="editButton" class="btn btn-primary">映画編集ページに戻る</a></h2>
    <?PHP  echo $uploadResult;?>
    <h3>画像登録状況</h3>
    <table id="editTable" class="table table-striped table-bordered table-condensed listTable">
    <thead>
		<tr>
			<th>mainPhoto</th>
			<th>subPhoto1</th>
			<th>subPhoto2</th>
			<th>subPhoto3</th>
            <th>subPhoto4</th>
		</tr>
	</thead>
	<tbody>
    	<tr>
        	<th><?PHP echo $mainPhoto;?></th>
            <th>
            <?PHP 
				//sub1が登録されていたら表示
				if($subPhoto1!=NULL){
					echo $subPhoto1;
				}else{
					echo "×";
				}
			?>
            </th>
            <th>
            <?PHP 
				//sub2が登録されていたら表示
				if($subPhoto2!=NULL){
					echo $subPhoto2;
				}else{
					echo "×";
				}
			?>
            </th>
            <th>
            <?PHP 
				//sub3が登録されていたら表示
				if($subPhoto3!=NULL){
					echo $subPhoto3;
				}else{
					echo "×";
				}
			?>
            </th>
            <th>
           <?PHP 
		  		//sub4が登録されていたら表示
				if($subPhoto4!=NULL){
					echo $subPhoto4;
				}else{
					echo "×";
				}
			?>
            </th>
        </tr>
    </tbody>
    </table>
    <h3>画像アップロード</h3>
    <p>画像を選んで登録して下さい。名前は　<b>cinema_id + "画像の種類".jpg</b>　で勝手に登録されます。もし以前に登録してあれば <b>上書き</b> されます。ご注意ください。</p><br />
    
    <h4 class="mb30">mainPhoto<h4>
    <form enctype="multipart/form-data" method="post" action="editImageUpload.php">
    	<h5 class="mb30">アップロードするファイルを選択してください</h5>
	    <p class="mb30"><input type="file" name="fileMain" required></p>
    	<input type="hidden" name="cinemaId" value="<?PHP echo $cinemaId;?>">
   		<p><input type="submit" name="sendMain" class="btn btn-primary " value="アップロード" /></p>
	</form>
    <br />
    <h4 class="mb30">subPhoto1<h4>
     <form enctype="multipart/form-data" method="post" action="editImageUpload.php">
     	<h5 class="mb30">アップロードするファイルを選択してください</h5>
        <p class="mb30"><input type="file" name="fileSub1" required></p>
        <input type="hidden" name="cinemaId" value="<?PHP echo $cinemaId;?>">
        <p><input type="submit" name="sendSub1" class="btn btn-primary " value="アップロード" /></p>
	</form>
    <br />  
    <h4 class="mb30">subPhoto2<h4>
    <form enctype="multipart/form-data" method="post" action="editImageUpload.php">
        <h5 class="mb30">アップロードするファイルを選択してください</h5>
        <p class="mb30"><input type="file" name="fileSub2" required></p>
        <input type="hidden" name="cinemaId" value="<?PHP echo $cinemaId;?>">
        <p><input type="submit" name="sendSub2" class="btn btn-primary " value="アップロード" /></p>
	</form>
    <br />  
    <h4 class="mb30">subPhoto3<h4>
    <form enctype="multipart/form-data" method="post" action="editImageUpload.php">
        <h5 class="mb30">アップロードするファイルを選択してください</h5>
        <p class="mb30"><input type="file" name="fileSub3" required></p>
        <input type="hidden" name="cinemaId" value="<?PHP echo $cinemaId;?>">
        <p><input type="submit" name="sendSub3" class="btn btn-primary " value="アップロード" /></p>
	</form>
    <br />
    <h4 class="mb30">subPhoto4<h4>   
     <form enctype="multipart/form-data" method="post" action="editImageUpload.php">
         <h5 class="mb30">アップロードするファイルを選択してください</h5>
        <p class="mb30"><input type="file" name="fileSub4" required></p>
        <input type="hidden" name="cinemaId" value="<?PHP echo $cinemaId;?>">
        <p><input type="submit" name="sendSub4" class="btn btn-primary " value="アップロード" /></p>
	</form>
	<!-- main end -->
<?PHP
	require_once("../footer.php");
?>
