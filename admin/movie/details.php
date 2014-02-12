<?PHP
  	$pageTitle="映画詳細";
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
		<h2><?PHP echo "映画タイトル" ?> - 詳細<a href="edit.php?id=1" id="editButton" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>編集 & 削除</a>
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
				
                <?PHP
					//MySQLサーバー接続
					$con=mysqli_connect('localhost','halcinema','halcinema');
						//文字コード設定
						if($con!=false){
							mysqli_set_charset($con,'utf8');
						//データベース選択
						$isSuccess =mysqli_select_db($con, 'halcinema');	
						if($isSuccess){
							$result =mysqli_query($con,"SELECT * FROM cinema_master");
							while(($row = mysqli_fetch_array($result)) != false){
								$cinemaId = $row[0];
								$cinemaName = $row[1];
								$startDay = str_replace("-","/",$row[2]);
								$endDay = str_replace("-","/",$row[3]);
								$runningTime = $row[4];
								$cinemaDescription = $row[5];
								$movieDirector = $row[6];
								$moviePerfomer = $row[7];
								$mainPhoto = $row[8];
								$subPhoto1 = $row[9];
								$subPhoto2 = $row[10];
								$subPhoto3 = $row[11];
								$subPhoto4 = $row[12];
								
				  				echo "<tr>";	
				  					echo "<td>".$cinemaId."</td>";
				  					echo "<td>";
				  						echo "<a href='details.php?id=".$cinemaId."'>".$cinemaName."</a>";
				  						/*echo "<span class='label label-success'>公開中</span>";
				  						echo "<span class='label label-default'>終了</span>";
				  						echo "<span class='label label-primary'>公開前</span>";*/
				  					echo "</td>";
				  					echo "<td><img src='../../tokyo/movie/images/".$mainPhoto."' alt=''></td>";
				  					echo "<td>".$startDay."</td>";
				  					echo "<td>".$endDay."</td>";
				  					echo "<td>".$runningTime."分</td>";
				  					echo "<td class='description'>".$cinemaDescription."</td>";
				  					echo "<td>".$movieDirector."</td>";
				  					echo "<td>".$moviePerfomer."</td>";
				  				echo "</tr>";
							}
										
						}
							
					}   
				?>
			</tbody>
		</table>
		
		<h2><?PHP echo "映画タイトル" ?> - スケジュール</h2>
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
					<td><a href="details.php?id=<?PHP echo $rowScheduleList[1];?>"><?PHP echo $rowMovieTitleResult[0];?></a></td>
					<td><?PHP echo $rowScheduleList [4]; ?></td>
					<td><?PHP echo $rowScheduleList [3]; ?></td>
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
					echo "<a class='btn btn-default' href='details.php?nowPage=".$pageCount."'>".$pageCount."</a>";
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
