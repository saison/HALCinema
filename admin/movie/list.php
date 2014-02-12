<?PHP
	$pageTitle="映画一覧";
	require_once("../header.php");
	//今日の日付取得
	$today = date("Y-m-d");
	
	
?>
	
	<!-- main start -->
		<h2>映画一覧<a href="register.php" id="newButton" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>新規登録</a></h2>
		<!-- movie list table -->
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
					<th>アクション</th>
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
								
				  				echo "<tr>";
				  					echo "<td>".$cinemaId;
									echo "<br />";
										if($startDay > $today){
											echo "<span class='label label-primary'>公開前</span>";
										}else if($startDay <= $today && $endDay >= $today){
				  							echo "<span class='label label-success'>公開中</span>";
										}else if($endDay < $today){
											echo "<span class='label label-default'>終了</span>";
										}
									echo "</td>";
									echo "<td><a href='details.php?id=".$cinemaId."'>　".$cinemaName."</a></td>";
				  					echo "<td><img src='../../tokyo/movie/images/".$mainPhoto."' alt=''></td>";
				  					echo "<td>".$startDay."</td>";
				  					echo "<td>".$endDay."</td>";
				  					echo "<td>".$runningTime."分</td>";
				  					echo "<td class='description'>".$cinemaDescription."</td>";
				  					echo "<td>".$movieDirector."</td>";
				  					echo "<td>".$moviePerfomer."</td>";
				  					echo "<td><a href='edit.php?id=".$cinemaId."' class='btn btn-primary'><span class='glyphicon glyphicon-pencil'></span>編集 & 削除</a></td>";
				  				echo "</tr>";
							}
										
						}		
						//サーバー切断				
						mysqli_close($con);		
					}   
				?>
           
			</tbody>

		</table>
		<!-- /movie list table -->
	<!-- main end -->

<?PHP
	require_once("../footer.php");
?>
