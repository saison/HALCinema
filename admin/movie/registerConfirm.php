<?PHP
	$pageTitle="映画情報登録確認";
	require_once("../header.php");
	if(isset($_GET['error'])){//form registerCheck.php
	
		$_SESSION['registerCinemaId'] = $_SESSION['registerCheckCinemaId'];
		$_SESSION['registerCinemaName'] = $_SESSION['registerCheckCinemaName'];
		$_SESSION['registerStartDay'] = $_SESSION['registerCheckStartDay'];
		$_SESSION['registerEndDay'] = $_SESSION['registerCheckEndDay'];
		$_SESSION['registerRunningtime'] =$_SESSION['registerCheckRunningtime'];
		$_SESSION['registerMovieDescription'] = $_SESSION['registerCheckMovieDescription'];
		$_SESSION['registerMovieDirector'] = $_SESSION['registerCheckMovieDirector'];
		$_SESSION['registerPerfomer'] = $_SESSION['registerCheckPerfomer'];
		$_SESSION['registerMainPhoto'] = $_SESSION['registerCheckMainPhoto'];
		$_SESSION['registerSubPhoto1'] = $_SESSION['registerCheckSubPhoto1'];
		$_SESSION['registerSubPhoto2'] = $_SESSION['registerCheckSubPhoto2'];
		$_SESSION['registerSubPhoto3'] = $_SESSION['registerCheckSubPhoto3'];
		$_SESSION['registerSubPhoto4'] = $_SESSION['registerCheckSubPhoto4'];
				
	}else{
		header("Location:list.php");
	}
?>
	
	<!-- main start -->
	<h2><?PHP echo $_SESSION['registerCheckCinemaName']; ?> - 確認</h2>
		<!-- movie list table -->
		<form action="registerSql.php" method="post">
			<table id="editTable" class="table table-striped table-bordered table-condensed listTable">
        		<tr>
					<th>映画ID</th>
					<td><?PHP echo $_SESSION['registerCheckCinemaId'];?></td>
				</tr>
				<tr>
					<th>タイトル</th>
					<td><?PHP echo $_SESSION['registerCheckCinemaName'];?></td>
				</tr>
				<tr>
					<th>画像</th>
					<td>
                    <p>mainPhoto</p>
                    
                    <img src="../../tokyo/movie/images/<?PHP echo $_SESSION['registerCheckMainPhoto'];?>" alt="" id="mainPhotoImg">
                    <p><?PHP echo $_SESSION['registerCheckMainPhoto'];?></p>
                   <br />
                    
                    <p>subPhoto</p>
                    
                    <?PHP if($_SESSION['registerCheckSubPhoto1']==NULL ):?>
                    <img src="../../tokyo/movie/images/noImg.png" alt="" >
                    <p>登録なし</p>
                    <?PHP else:?>
                    <img src="../../tokyo/movie/images/<?PHP echo $_SESSION['registerCheckSubPhoto1'];?>" alt="" >
                    <?PHP echo $_SESSION['registerCheckSubPhoto1'];?>
                    <?PHP endif;?>
                    
                    <?PHP if($_SESSION['registerCheckSubPhoto2']==NULL ):?>
                    <img src="../../tokyo/movie/images/noImg.png" alt="" >
                    <p>登録なし</p>
                    <?PHP else:?>
                    <img src="../../tokyo/movie/images/<?PHP echo $_SESSION['registerCheckSubPhoto2'];?>" alt="" >
                    <?PHP echo $_SESSION['registerCheckSubPhoto2'];?>
                    <?PHP endif;?><br />
                    
                    <?PHP if($_SESSION['registerCheckSubPhoto3']==NULL ):?>
                    <img src="../../tokyo/movie/images/noImg.png" alt="" >
                    <p>登録なし</p>
                    <?PHP else:?>
                    <img src="../../tokyo/movie/images/<?PHP echo $_SESSION['registerCheckSubPhoto3'];?>" alt="" >
                    <?PHP echo $_SESSION['registerCheckSubPhoto3'];?>
                    <?PHP endif;?>
                    
                    <?PHP if($_SESSION['registerCheckSubPhoto4']==NULL ):?>
                    <img src="../../tokyo/movie/images/noImg.png" alt="" >
                    <p>登録なし</p>
                    <?PHP else:?>
                    <img src="../../tokyo/movie/images/<?PHP echo $_SESSION['registerCheckSubPhoto4'];?>" alt="" >
                    <?PHP echo $_SESSION['registerCheckSubPhoto4'];?>
                    <?PHP endif;?><br />
                    
                   
                    </td>
				</tr>
				<tr>
					<th>公開開始日</th>
					<td><?PHP echo $_SESSION['registerCheckStartDay'];?></td>
				</tr>
				<tr>
					<th>公開終了日</th>
                    <td><?PHP echo $_SESSION['registerCheckEndDay'];?></td>
				</tr>
				<tr>
					<th>上映時間</th>
					<td><?PHP echo $_SESSION['registerCheckRunningtime'];?>分</td>

				</tr>
				<tr>
					<th>映画説明文</th>
					<td><?PHP echo $_SESSION['registerCheckMovieDescription'];?></td>
				</tr>
				<tr>
					<th>監督</th>
					<td><?PHP echo $_SESSION['registerCheckMovieDirector'];?></td>
				</tr>
                <tr>
					<th>出演者</th>
					<td><?PHP echo $_SESSION['registerCheckPerfomer'];?></td>
				</tr>
		</table>
		<div id="editSend">
			<input type="submit" class="btn btn-primary btn-lg" value="登録する" name="send"></div>
		</form>
		<!-- /movie list table -->
	<!-- main end -->

<?PHP
	require_once("../footer.php");
?>
