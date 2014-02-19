<?PHP
	$pageTitle="映画登録";
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
?>
	<!-- main start -->
	<h2><?PHP echo $cinemaId; ?> - 画像アップロード<a href="register.php" id="editButton" class="btn btn-primary">映画編集ページに戻る</a></h2>
    <?PHP  echo $uploadResult;?>
 
    <h3>画像アップロード</h3>
    <p>画像を選んで登録して下さい。名前は　<b>cinema_id + "画像の種類".jpg</b>　で勝手に登録されます。もし以前に登録してあれば <b>上書き</b> されます。ご注意ください。</p>	
    
    <h5>mainPhoto<h5>
    <form enctype="multipart/form-data" method="post" action="registerImageUpload.php">
	<input type="file" name="fileMain" required>
    <input type="hidden" name="cinemaId" value="<?PHP echo $cinemaId;?>">
	<input type="submit" name="sendMain" value="アップロード">
	</form>
    <br />
    <h5>subPhoto1<h5>
     <form enctype="multipart/form-data" method="post" action="registerImageUpload.php">
	<input type="file" name="fileSub1" required>
    <input type="hidden" name="cinemaId" value="<?PHP echo $cinemaId;?>">
	<input type="submit" name="sendSub1" value="アップロード">
	</form>
    <br />  
    <h5>subPhoto2<h5>
    <form enctype="multipart/form-data" method="post" action="registerImageUpload.php">
	<input type="file" name="fileSub2" required>
    <input type="hidden" name="cinemaId" value="<?PHP echo $cinemaId;?>">
	<input type="submit" name="sendSub2" value="アップロード">
	</form>
    <br />  
    <h5>subPhoto3<h5>
    <form enctype="multipart/form-data" method="post" action="registerImageUpload.php">
	<input type="file" name="fileSub3" required>
    <input type="hidden" name="cinemaId" value="<?PHP echo $cinemaId;?>">
	<input type="submit" name="sendSub3" value="アップロード">
	</form>
   <br />    
    <h5>subPhoto4<h5>
     <form enctype="multipart/form-data" method="post" action="registerImageUpload.php">
	<input type="file" name="fileSub4" required>
    <input type="hidden" name="cinemaId" value="<?PHP echo $cinemaId;?>">
	<input type="submit" name="sendSub4" value="アップロード">
	</form>
	<!-- main end -->
<?PHP
	require_once("../footer.php");
?>
