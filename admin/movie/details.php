<?PHP
  	$pageTitle="映画一覧";
	require_once("../header.php");
	require_once("../../tokyo/module/functions.php");
	$con = getConnection();
	$nowPage=1;//ページング
	if(isset($_GET['nowPage'])){
		$nowPage=$_GET['nowPage'];
	}
	$schedulePerPage = 50; //1ページのスケジュールの件数

	//映画情報取得 表示
	$con = getConnection();
	$movieSql="SELECT * FROM cinema_master WHERE cinema_id='{$_GET["id"]}'";
	$movieSelectResult =  mysqli_query($con,$movieSql);
	$rowMovieSelectResult = mysqli_fetch_array($movieSelectResult);
	mysqli_close($con);
?>
	
		<!-- main start -->
		<h2><?PHP echo $rowMovieSelectResult['cinema_name']; ?> - 詳細　<a href="edit.php?id=<?PHP echo $_GET['id'];?>" id="editButton" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>編集 & 削除</a><a href="movieDetailPdf.php?id=<?PHP echo $_GET['id']; ?>" id="editButton" class="btn btn-danger"><span class="glyphicon glyphicon-align-left"></span>PDF作成</a>　　　
</h2>
		<!-- movie details table -->
			<table class="table table-striped table-bordered table-condensed listTable">
			<thead>
				<tr>
					<th>id</th>
					<th>タイトル</th>
					<th>画像</th>
					<th>公開開始日</th>
					<th>公開終了日</th>
					<th>上映時間</th>
					<th class="description">映画説明文</th>
					<th>監督</th>
					<th>出演者</th>
				</tr>
			</thead>
			
			<tbody>
         
			<tr>
				<td><?PHP echo $rowMovieSelectResult['cinema_id'];//映画id?></td>
				<td><?PHP echo $rowMovieSelectResult['cinema_name'];?></td>
				<td><img src='../../tokyo/movie/images/<?PHP echo $rowMovieSelectResult['main_photo'];?>'alt=''></td>
				<td><?PHP echo str_replace("-","/",$rowMovieSelectResult['start_day']);?></td>
				<td><?PHP echo str_replace("-","/",$rowMovieSelectResult['end_day']);?></td>
				<td><?PHP echo $rowMovieSelectResult['running_time'];?></td>
				<td class='description'><?PHP echo $rowMovieSelectResult['cinema_description'];?></td>
				<td><?PHP echo $rowMovieSelectResult['movie_director'];?></td>
				<td><?PHP echo $rowMovieSelectResult['movie_perfomer'];?></td>
				<td><a href='edit.php?id=<?PHP echo $rowMovieSelectResult['cinema_id'] ; ?>' class='btn btn-primary'><span class='glyphicon glyphicon-pencil'></span>編集 & 削除</a></td>
			</tr>
			
			</tbody>
		</table>
		
		<h2><?PHP echo $rowMovieSelectResult['cinema_name']; ?> - スケジュール</h2>
		<table class="table table-striped table-bordered table-condensed listTable">
			<thead>
				<tr>
					<th>上映ID</th>
					<th>映画名</th>
					<th>上映日</th>
					<th>上映開始時間</th>
					<th>上映終了時間</th>
					<th>スクリーン</th>
					<th>アクション</th>
				</tr>
			</thead>
			
			<tbody>
				<!-- ここの中身をループして出してね -->
				<?PHP
					$con = getConnection();
					$scheduleCount = 0;//上映スケジュール件数
					$scheduleListSql = "SELECT * FROM show_schedule WHERE cinema_id='{$_GET["id"]}'" ;
					$scheduleListResult = mysqli_query($con,$scheduleListSql);	
					while(($rowScheduleList = mysqli_fetch_array($scheduleListResult)) != false){
					$scheduleCount++;
					}
					
					
					if($scheduleCount%$schedulePerPage==0){//総ページ数取得
						$pageAllCount=intval($scheduleCount / $schedulePerPage);
					}else{
						$pageAllCount=intval($scheduleCount / $schedulePerPage)+1;
					}
		
					$tabelScheduleCount=1;
					$scheduleListResult = mysqli_query($con,$scheduleListSql);	
					while(($rowScheduleList = mysqli_fetch_array($scheduleListResult)) != false):

					$movieTitleGetSql = "SELECT cinema_name,running_time FROM cinema_master WHERE cinema_id = '{$rowScheduleList[1]}'";
					$movieTitleResult = mysqli_query($con,$movieTitleGetSql);
					$rowMovieTitleResult=mysqli_fetch_array($movieTitleResult);
					
					//上映時間の計算　　　例)終了時間の割り出しの際に　135分の映画は140分として計算する。
					$showTime=ceil($rowMovieTitleResult[1]/10)*10;
					$showTimeJp=$showTime." minute";//上映終了時間計算
				
					//ページング
					if((($nowPage-1)*$schedulePerPage+1) <= $tabelScheduleCount &&  $tabelScheduleCount<= $nowPage*$schedulePerPage){				
				?>
				<tr>	
					<td><?PHP echo $rowScheduleList [0]; ?></td>
					<td><a href="details.php?id=<?PHP echo $rowScheduleList[1];?>"><?PHP echo $rowMovieTitleResult[0];?></a></td>
					<td><?PHP echo str_replace('-','/',$rowScheduleList[4]); ?></td>
					<td><?PHP echo substr($rowScheduleList[3],0,5); ?></td>
					<td><?PHP echo date("H:i",strtotime($showTimeJp,strtotime($rowScheduleList [3])));?></td>
					<td>スクリーン<?PHP echo mb_substr($rowScheduleList[2],5,1); ?></td>
                    <td>
						<a href="../schedule/edit.php?id=<?PHP echo $rowScheduleList [0]; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>編集 & 削除</a>
					</td>
				</tr>
				<?PHP 		
					}
					$tabelScheduleCount++; 
					endwhile;
					mysqli_close($con);
				 ?>
				<!-- ここの中身をループして出してね -->
			</tbody>
		</table>
        
        <div class="btn-group">
    	<?php
			$pageCount = 1;//ページ
	    	while($pageAllCount>0){
				if($nowPage==$pageCount){//今見てるページだったとき
					echo "<span class='btn btn-default current'>".$pageCount."</span>";
					echo "　";
				}else{
					echo "<a class='btn btn-default' href='details.php?id=".$_GET['id']."&&nowPage=".$pageCount."'>".$pageCount."</a>";
					echo "　";
				}				
				$pageCount++;
				$pageAllCount--;
			}
		?>
		</div>
		
	
		
		

		<!-- /movie details table -->
	<!-- main end -->

<?PHP
	require_once("../footer.php");
?>
