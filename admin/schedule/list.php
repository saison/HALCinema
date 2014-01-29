<?PHP
	$pageTitle="上映スケジュール一覧";
	require_once("../header.php");
	require_once("../../tokyo/module/functions.php");
	$con = getConnection();
	$nowPage=1;//ページング
	if(isset($_GET['nowPage'])){
		$nowPage=$_GET['nowPage'];
	}
	$schedulePerPage = 50; //1ページのスケジュールの件数
?>
	
	<!-- main start -->
		<h2>スケジュールリスト</h2>
		<!-- movie list table -->
		<table class="table table-striped table-bordered table-condensed listTable">
			<thead>
				<tr>
					<th>上映ID</th>
					<th>映画名</th>
					<th>上映日</th>
					<th>上映開始時間</th>
					<th>上映終了時間</th>
					<th>スクリーン</th>
				</tr>
			</thead>
			
			<tbody>
				<!-- ここの中身をループして出してね -->
				<?PHP
					$scheduleCount = 0;//上映スケジュール件数
					$scheduleListSql = "SELECT * FROM show_schedule" ;
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
					<td><a href="details.php?id=<?PHP echo $rowScheduleList[0];?>"><?PHP echo $rowMovieTitleResult[0];?></a></td>
					<td><?PHP echo $rowScheduleList [4]; ?></td>
					<td><?PHP echo $rowScheduleList [3]; ?></td>
					<td><?PHP echo date("H:i",strtotime($showTimeJp,strtotime($rowScheduleList [3])));?></td>
					<td>スクリーン<?PHP echo mb_substr($rowScheduleList[2],5,1); ?></td>
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
				echo "<a class='btn btn-default' href='list.php?nowPage=".$pageCount."'>".$pageCount."</a>";
				echo "　";
			}				
			$pageCount++;
			$pageAllCount--;
		}
		?>
		</div>
		<!-- /movie list table -->
	<!-- main end -->

<?PHP
	require_once("../footer.php");
?>

