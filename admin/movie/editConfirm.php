<?PHP
	$pageTitle="映画一覧";
	require_once("../header.php");
	if(isset($_GET['error'])){//form editCheck.php
	
		$_SESSION['editCinemaId'] = $_SESSION['editCheckCinemaId'];
		$_SESSION['editCinemaName'] = $_SESSION['editCheckCinemaName'];
		$_SESSION['editStartDay'] = $_SESSION['editCheckStartDay'];
		$_SESSION['editEndDay'] = $_SESSION['editCheckEndDay'];
		$_SESSION['editRunningtime'] =$_SESSION['editCheckRunningtime'];
		$_SESSION['editMovieDescription'] = $_SESSION['editCheckMovieDescription'];
		$_SESSION['editMovieDirector'] = $_SESSION['editCheckMovieDirector'];
		$_SESSION['editPerfomer'] = $_SESSION['editCheckPerfomer'];
		$_SESSION['editMainPhoto'] = $_SESSION['editCheckMainPhoto'];
		$_SESSION['editSubPhoto1'] = $_SESSION['editCheckSubPhoto1'];
		$_SESSION['editSubPhoto2'] = $_SESSION['editCheckSubPhoto2'];
		$_SESSION['editSubPhoto3'] = $_SESSION['editCheckSubPhoto3'];
		$_SESSION['editSubPhoto4'] = $_SESSION['editCheckSubPhoto4'];
				
	}else{
		header("Location:list.php");
	}
?>
	
	<!-- main start -->
	<h2><?PHP echo $_SESSION['editCheckCinemaName']; ?> - 確認</h2>
		<!-- movie list table -->
		<form action="editSql.php" method="post">
			<table id="editTable" class="table table-striped table-bordered table-condensed listTable">
        		<tr>
					<th>映画ID</th>
					<td><?PHP echo $_SESSION['editCheckCinemaId'];?></td>
				</tr>
				<tr>
					<th>タイトル</th>
					<td><?PHP echo $_SESSION['editCheckCinemaName'];?></td>
				</tr>
				<tr>
					<th>画像</th>
					<td>
                    <p>mainPhoto</p>
                    
                    <img src="../../tokyo/movie/images/<?PHP echo $_SESSION['editCheckMainPhoto'];?>" alt="" id="mainPhotoImg">
                    <p><?PHP echo $_SESSION['editCheckMainPhoto'];?></p>
                   <br />
                    
                    <p>subPhoto</p>
                    
                    <?PHP if($_SESSION['editCheckSubPhoto1']==NULL ):?>
                    <img src="../../tokyo/movie/images/noImg.png" alt="" >
                    <p>登録なし</p>
                    <?PHP else:?>
                    <img src="../../tokyo/movie/images/<?PHP echo $_SESSION['editCheckSubPhoto1'];?>" alt="" >
                    <?PHP echo $_SESSION['editCheckSubPhoto1'];?>
                    <?PHP endif;?>
                    
                    <?PHP if($_SESSION['editCheckSubPhoto2']==NULL ):?>
                    <img src="../../tokyo/movie/images/noImg.png" alt="" >
                    <p>登録なし</p>
                    <?PHP else:?>
                    <img src="../../tokyo/movie/images/<?PHP echo $_SESSION['editCheckSubPhoto2'];?>" alt="" >
                    <?PHP echo $_SESSION['editCheckSubPhoto2'];?>
                    <?PHP endif;?><br />
                    
                    <?PHP if($_SESSION['editCheckSubPhoto3']==NULL ):?>
                    <img src="../../tokyo/movie/images/noImg.png" alt="" >
                    <p>登録なし</p>
                    <?PHP else:?>
                    <img src="../../tokyo/movie/images/<?PHP echo $_SESSION['editCheckSubPhoto3'];?>" alt="" >
                    <?PHP echo $_SESSION['editCheckSubPhoto3'];?>
                    <?PHP endif;?>
                    
                    <?PHP if($_SESSION['editCheckSubPhoto4']==NULL ):?>
                    <img src="../../tokyo/movie/images/noImg.png" alt="" >
                    <p>登録なし</p>
                    <?PHP else:?>
                    <img src="../../tokyo/movie/images/<?PHP echo $_SESSION['editCheckSubPhoto4'];?>" alt="" >
                    <?PHP echo $_SESSION['editCheckSubPhoto4'];?>
                    <?PHP endif;?><br />
                    
                   
                    </td>
				</tr>
				<tr>
					<th>公開開始日</th>
					<td><?PHP echo $_SESSION['editCheckStartDay'];?></td>
				</tr>
				<tr>
					<th>公開終了日</th>
                    <td><?PHP echo $_SESSION['editCheckEndDay'];?></td>
				</tr>
				<tr>
					<th>上映時間</th>
					<td><?PHP echo $_SESSION['editCheckRunningtime'];?>分</td>
				</tr>
				<tr>
					<th>映画説明文</th>
					<td><?PHP echo $_SESSION['editCheckMovieDescription'];?></td>
				</tr>
				<tr>
					<th>監督</th>
					<td><?PHP echo $_SESSION['editCheckMovieDirector'];?></td>
				</tr>
                <tr>
					<th>出演者</th>
					<td><?PHP echo $_SESSION['editCheckPerfomer'];?></td>
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
